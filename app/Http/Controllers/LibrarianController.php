<?php

namespace App\Http\Controllers;

use Librarian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LibrarianController extends Controller
{

    public function index()
    {
        $librarians = Librarian::all();
        return view('librarian.index', compact('librarians'));
    }

    public function dashboard()
    {
        // Logic for the dashboard can be added here
        return view('librarian.dashboard');
    }
}
