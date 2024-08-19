<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Loan;
use App\Models\Client;
use App\Exports\LoansExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Response;



class LoanController extends Controller
{
 
    public function index()
    {
        $loans = Loan::all();
        return view('librarian.loans', compact('loans'));
    }
    
    public function create(Book $book)
    {
        $user = Auth::user();
        $alreadyLoaned = Loan::where('client', $user->id_client)
                             ->where('book', $book->id_book)
                             ->whereNull('return_date')
                             ->exists();

        $loanCount = Loan::where('client', $user->id_client)->whereNull('return_date')->count();
        $maxReached = $loanCount >= 5;
        return view('loans.create', compact('book', 'alreadyLoaned', 'maxReached'));
    }

    public function store(Request $request)
    {
        $book = Book::find($request->input('book'));
        $duration = intval($request->input('duration'));
        $borrowDate = Carbon::now();
        $dueDate = $borrowDate->copy()->addWeeks($duration);

        $loan = new Loan();
        $loan->book = $book->id_book;
        $loan->client = Auth::user()->id_client;
        $loan->date_borrowed = $borrowDate;
        $loan->due_date = $dueDate;
        $loan->save();


        $book->quantity -= 1;
        $book->save();

        return $this->generateReceipt($loan);
    }

    private function generateReceipt(Loan $loan)
    {
        $pdf = Pdf::loadView('loans.reciept', ['loan' => $loan]);
        return $pdf->download('loan_receipt_' . $loan->id_loan . '.pdf');
    }
    

public function messageClient(Request $request, $clientId)
{
    $client = Client::findOrFail($clientId);
    $message = $request->input('message');

    try {
        Mail::raw($message, function ($mail) use ($client) {
            $mail->to($client->email)
                 ->subject('Message from Librarian');
        });

        return response()->json(['success' => true, 'message' => 'Message sent successfully']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Failed to send message: ' . $e->getMessage()], 500);
    }
}


public function changeDueDate(Request $request, $loanId)
{
    $request->validate([
        'new_due_date' => 'required|date',
    ]);

    $loan = Loan::findOrFail($loanId);
    $loan->due_date = $request->input('new_due_date');

    try {
        $loan->save();
        return response()->json(['success' => true, 'message' => 'Due date updated successfully']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Failed to update due date: ' . $e->getMessage()], 500);
    }
}



public function deleteLoan($loanId)
{
    $loan = Loan::findOrFail($loanId);

    if (!$loan->return_date || now()->lte($loan->return_date)) {
        return response()->json(['success' => false, 'message' => 'Cannot delete this loan. It has not been returned or the return date has not passed.'], 400);
    }

    try {
        $loan->delete();
        return response()->json(['success' => true, 'message' => 'Loan deleted successfully']);
    } catch (\Exception $e) {
        return response()->json(['success' => false, 'message' => 'Failed to delete loan: ' . $e->getMessage()], 500);
    }
}




public function export($format)
{
    $loans = Loan::all();

    if ($format === 'csv') {
        return $this->exportToCsv($loans);
    } elseif ($format === 'pdf') {
        return $this->exportToPdf($loans);
    }

    return back()->with('error', 'Unsupported export format');
}


private function exportToCsv($loans)
{
    $headers = [
        'Content-Type' => 'text/csv',
        'Content-Disposition' => 'attachment; filename=loans.csv',
    ];

    $callback = function() use ($loans) {
        $file = fopen('php://output', 'w');
        fputcsv($file, ['ID', 'Book', 'Client', 'Date Borrowed', 'Due Date', 'Return Date']);

        foreach ($loans as $loan) {
            fputcsv($file, [
                $loan->id_loan,
                $loan->book->title, 
                $loan->client->name, 
                $loan->date_borrowed,
                $loan->due_date,
                $loan->return_date ?? 'Not returned'
            ]);
        }

        fclose($file);
    };

    return Response::stream($callback, 200, $headers);
}

private function exportToPdf($loans)
{
    $pdf = Pdf::loadView('exports.loans_pdf', compact('loans'));
    return $pdf->download('loans.pdf');
}



public function returnBook($loanId)
{
    $loan = Loan::findOrFail($loanId);

    if ($loan->return_date) {
        return response()->json(['success' => false, 'message' => 'This book has already been returned.'], 400);
    }

    
    $loan->return_date = now();
    $loan->save();

    
    $book = $loan->book;
    $book->quantity += 1;
    $book->save();

    return response()->json(['success' => true, 'message' => 'Book returned successfully.']);
}


}

