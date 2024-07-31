<?php

namespace App\Http\Controllers;


use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class LoanController extends Controller
{
 

    public function index()
    {
        $loans = Loan::all();
        return view('librarian.loans', compact('loans'));
    }
    
    

    public function store(Request $request)
{
    $book = Book::find($request->input('book'));
    $duration = $request->input('duration');
    $borrowDate = Carbon::now();
    $dueDate = $borrowDate->addWeeks($duration);
    
    $loan = new Loan();
    $loan->book = $book->id_book;
    $loan->client = Auth::user()->id_client;
    $loan->date_borrowed = $borrowDate;
    $loan->due_date = $dueDate;
    $loan->save();
    
    return redirect()->route('books.index');
}

}
