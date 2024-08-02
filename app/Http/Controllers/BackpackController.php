<?php
namespace App\Http\Controllers;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BackpackController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $loans = Loan::where('client', $user->id_client)
            ->whereNull('return_date')
            ->get();

        // Instead of eager loading, we'll use the existing accessor
        return view('backpack.index', compact('loans'));
    }
}
