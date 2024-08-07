<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        
        $latestBooks = Book::orderBy('created_at', 'desc')->take(8)->get();
        
       
        $randomAuthors = Author::inRandomOrder()->take(8)->get();
        
        
        return view('home', compact('latestBooks', 'randomAuthors'));
    }
}
