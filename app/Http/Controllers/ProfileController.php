<?php

// app/Http/Controllers/ProfileController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Client;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $client = Client::find($user->id_client); // Assuming the user's ID is the same as the client's ID
        $totalBooksLoaned = $client->loans()->count();

        return view('profile', compact('client', 'totalBooksLoaned'));
    }
}

