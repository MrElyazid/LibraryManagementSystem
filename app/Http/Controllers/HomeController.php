<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class HomeController extends Controller
{
    public function index()
    {
        $latestBooks = Book::orderBy('created_at', 'desc')->take(6)->get();
        
        return view('home', compact('latestBooks'));
    }
}
