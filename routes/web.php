<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;


Route::get('/', function () {
    return view('home');
});


Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/profile', [ProfileController::class, 'show'])->name('profile');
Route::get('/authors', [AuthorController::class, 'fetchAuthors'])->name('authors.fetch');


Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/search', [BookController::class, 'search'])->name('books.search');
Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');


Route::get('/book/{id}', [BookController::class, 'show']);

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');


Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
