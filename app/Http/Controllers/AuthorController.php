<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    // Rename the index method to fetchAuthors to match the route definition
    public function fetchAuthors()
    {
        $authors = Author::all();
        return view('authors', compact('authors'));
    }

    public function index(Request $request)
{
    $query = Author::query();

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->input('name') . '%');
    }

    if ($request->filled('lastname')) {
        $query->where('lastname', 'like', '%' . $request->input('lastname') . '%');
    }

    $authors = $query->get();

    return view('authors', compact('authors'));
}
}
