<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    /**
    * Display a listing of the resource.
    */
    public function index()
    {
        // Fetch the latest books
        $latestBooks = Book::latest()->limit(12)->get(); // Fetch the latest 12 books
    
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
    // Raw SQL query to get the book data along with author and category details
    $book = DB::select("
    SELECT books.*, authors.name as author_name, authors.lastname as author_lastname, authors.birth_date as author_birth_date, categories.name as category_name
    FROM books
    LEFT JOIN authors ON books.author = authors.id_author
    LEFT JOIN categories ON books.category = categories.id_category
    WHERE books.id_book = ?
    ", [$id]);
    

    // Ensure you get the first result since `DB::select` returns an array
    if (!empty($book)) {
        $book = $book[0];
    } else {
        abort(404, 'Book not found');
    }

    return view('book', compact('book'));
}

}
