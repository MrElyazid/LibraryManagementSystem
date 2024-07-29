<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the clients.
     *
     * 
     */
    public function index()
    {
        $clients = Client::all();
        return view('librarian.clients', compact('clients'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:clients',
            'password' => 'required|min:6|confirmed',
            'student' => 'boolean'
        ]);

        $validatedData['password'] = bcrypt($validatedData['password']);
        Client::create($validatedData);

        return redirect()->route('clients.index');
    }

}
