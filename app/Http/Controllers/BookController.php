<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Author;
use App\Models\Category;
use Illuminate\Http\Request;
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



public function update(Request $request, $id)
{
    // Validate and update the book details
    $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|exists:categories,id_category',
        'author' => 'required|exists:authors,id_author',
        'status' => 'required|in:Available,Coming Soon,Not Available',
        'quantity' => 'required|integer|min:1',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'isbn' => 'required|string|max:255',
    ]);

    $book = Book::findOrFail($id);
    $book->isbn = $request->input('isbn');
    $book->title = $request->input('title');
    $book->category = $request->input('category');
    $book->author = $request->input('author');
    $book->status = $request->input('status');
    $book->quantity = $request->input('quantity');
    $book->description = $request->input('description');

    if ($request->hasFile('image')) {
        // Handle file upload if needed
        $imagePath = $request->file('image')->store('public/images/covers/');
        $book->image = basename($imagePath);
    }

    $book->save();

    // Return back to the edit page with a success message
    return back()->with('success', 'Book updated successfully');
}



public function edit($id)
{
    $book = Book::findOrFail($id);
    $categories = Category::all(); 
    $authors = Author::all();     

    return view('librarian.editBook', compact('book', 'categories', 'authors'));
}


public function destroy($id)
{
    $book = Book::findOrFail($id);
    $book->delete();
    return response()->json(['message' => 'Book deleted successfully']);
}

public function addBookForm()
{
    $categories = Category::all();
    $authors = Author::all();
    return view('librarian.addBook', compact('categories', 'authors'));
}

public function addBook(Request $request)
{
    // Validate the request data
    $request->validate([
        'isbn' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'category' => 'required|exists:categories,id_category',
        'author' => 'required|exists:authors,id_author',
        'status' => 'required|in:Available,Coming Soon,Not Available',
        'quantity' => 'required|integer|min:1',
        'description' => 'required|string',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Create a new book instance
    $book = new Book();
    $book->isbn = $request->input('isbn');
    $book->title = $request->input('title');
    $book->category = $request->input('category');
    $book->author = $request->input('author');
    $book->status = $request->input('status');
    $book->quantity = $request->input('quantity');
    $book->description = $request->input('description');

    // Handle file upload if needed
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('public/images/covers/');
        $book->image = basename($imagePath);
    }

    // Save the book to the database
    $book->save();

    // Return back to the add book form with a success message
    return back()->with('success', 'Book added successfully!');
}



}
