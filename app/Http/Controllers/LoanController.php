<?php

namespace App\Http\Controllers;


use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index()
    {
        $loans = Loan::all();
        return view('librarian.loans', compact('loans'));
    }
}
