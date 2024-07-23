<?php

// app/Http/Controllers/BookController.php

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
        // Load the default Books view without any search results
        return view('books');
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
}