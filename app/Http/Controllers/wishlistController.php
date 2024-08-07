<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\wishlist;
use App\Models\Book;

class WishlistController extends Controller
{
    
    public function index()
    {
        $user = Auth::user();
        $wishlists = Wishlist::where('client', $user->id_client)->get();

        return view('backpack.wishlist', compact('wishlists'));
    }

    // public function store(Request $request)
    // {
    //     $user = Auth::user();
    //     $bookId = $request->input('book_id');

    //     // Check if the book is already wishlisted
    //     $wishlist = Wishlist::where('client', $user->id_client)
    //                         ->where('book', $bookId)
    //                         ->first();

    //     if (!$wishlist) {
    //         // Create a new wishlist entry
    //         Wishlist::create([
    //             'book' => $bookId,
    //             'client' => $user->id_client,
    //             'date_added' => now(),
    //         ]);
    //     }

    //     return redirect()->back();
    // }


    public function add($bookId)
{
    $user = Auth::user();

    // Check if the book is already wishlisted
    $wishlist = Wishlist::where('client', $user->id_client)
                        ->where('book', $bookId)
                        ->first();

    if (!$wishlist) {
        // Create a new wishlist entry
        Wishlist::create([
            'book' => $bookId,
            'client' => $user->id_client,
            'date_added' => now(),
        ]);
    }

    return redirect()->back();
}


public function destroy($id)
{
    $user = Auth::user();
    $wishlist = Wishlist::where('id_wishlist', $id)
                        ->where('client', $user->id_client)
                        ->first();

    if ($wishlist) {
        $wishlist->delete();
    }

    return redirect()->back();
}

}
