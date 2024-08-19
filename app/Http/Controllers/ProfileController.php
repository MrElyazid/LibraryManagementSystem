<?php

// app/Http/Controllers/ProfileController.php
namespace App\Http\Controllers;

use App\Models\Loan;
use App\Models\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $client = Client::find($user->id_client); // Assuming the user's ID is the same as the client's ID
        $totalBooksLoaned = $client->loans()->count();

        $loanCount = Loan::where('client', $user->id_client)->whereNull('return_date')->count();
        
        return view('profile', compact('client', 'totalBooksLoaned', 'loanCount'));
    }
}

