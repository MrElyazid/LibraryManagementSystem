<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;

class BookController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        // Fetch the latest books (adjust the logic as necessary)
        $latestBooks = Book::with('imagePic')->latest()->limit(12)->get(); // Fetch the latest 12 books

        return view('books', compact('latestBooks'));
    }

    /**
    * Perform a search for books by title or author name.
    */

    public function search(Request $request)
    {
        $query = $request->input('query');

        // Join the authors table to perform the search
        $books = Book::join('authors', 'books.author', '=', 'authors.id_author')
            ->where('books.title', 'like', "%{$query}%")
            ->orWhere('authors.name', 'like', "%{$query}%")
            ->select('books.*', 'authors.name as author_name')
            ->get();

        // Return the view with the search results
        return view('books', compact('books'));
    }

    public function show($id)
    {
        $book = Book::with(['author', 'category'])->findOrFail($id);
        return view('book', compact('book'));
    }
    
}
