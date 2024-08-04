<?php

namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Book;
use App\Models\Client;
use App\Models\Author;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class StatController extends Controller
{
    public function getSimpleStats()
    {
        $stats = [
            'total_loans' => Loan::count(),
            'total_books' => Book::count(),
            'total_clients' => Client::count(),
        ];

        return response()->json($stats);
    }

    public function getLoansByDay()
    {
        $startDate = Carbon::now()->subMonth();
        $endDate = Carbon::now();

        $loans = Loan::whereBetween('date_borrowed', [$startDate, $endDate])
            ->groupBy('date')
            ->orderBy('date')
            ->get([
                DB::raw('DATE(date_borrowed) as date'),
                DB::raw('COUNT(*) as count')
            ]);

        $dateRange = new \DatePeriod($startDate, new \DateInterval('P1D'), $endDate);

        $data = [];
        foreach ($dateRange as $date) {
            $count = $loans->where('date', $date->format('Y-m-d'))->first()->count ?? 0;
            $data['labels'][] = $date->format('Y-m-d');
            $data['values'][] = $count;
        }

        return response()->json($data);
    }

    public function getTopLoanedBooks()
{
    try {
        $topBooks = DB::table('loans')
            ->join('books', 'loans.book', '=', 'books.id_book')
            ->select('books.title', DB::raw('COUNT(*) as loan_count'))
            ->groupBy('books.id_book', 'books.title')
            ->orderByDesc('loan_count')
            ->limit(10)
            ->get();

        $data = [
            'labels' => $topBooks->pluck('title'),
            'values' => $topBooks->pluck('loan_count'),
        ];

        return response()->json($data);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}

    

    public function getTopAuthors()
    {
        $topAuthors = Author::withCount('books')
            ->orderByDesc('books_count')
            ->limit(5)
            ->get();

        $data = [
            'labels' => $topAuthors->pluck('name'),
            'values' => $topAuthors->pluck('books_count'),
        ];

        return response()->json($data);
    }

    public function getTopUsers()
    {
        $topUsers = Client::withCount('loans')
            ->orderByDesc('loans_count')
            ->limit(5)
            ->get();

        $data = [
            'labels' => $topUsers->pluck('name'),
            'values' => $topUsers->pluck('loans_count'),
        ];

        return response()->json($data);
    }
}
