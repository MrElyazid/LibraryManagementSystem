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
    if ($request->filled('search')) {
        $search = $request->input('search');
        $query->where(function ($query) use ($search) {
            $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('lastname', 'like', '%' . $search . '%');
        });
    }
    $authors = $query->get();
    return view('authors', compact('authors'));
}


}
