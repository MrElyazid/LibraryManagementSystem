<?php
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\StatController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BackpackController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LibrarianController;


Route::get('/', [HomeController::class, 'index'])->name('home');

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

Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login');
})->name('logout');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');


Route::get('/librarian/loans', [LoanController::class, 'index'])->name('librarian.loans');
Route::get('/librarian/clients', [ClientController::class, 'index'])->name('librarian.clients');
Route::get('/librarian/dashboard', [LibrarianController::class, 'dashboard'])->name('librarian.dashboard');



Route::get('/loans/create/{book}', [LoanController::class, 'create'])->name('loans.create');
Route::post('/loans', [LoanController::class, 'store'])->name('loans.store');


Route::prefix('librarian')->group(function(){
    Route::get('/book/{id}', [BookController::class, 'show'])->name('librarian.showBook');
    Route::get('/book/{id}/edit', [BookController::class, 'edit'])->name('librarian.editBook');
    Route::delete('/book/{id}', [BookController::class, 'destroy'])->name('librarian.destroyBook');
});

Route::put('/librarian/book/{id}', [BookController::class, 'update'])->name('librarian.updateBook');

Route::get('/librarian/book/add', [BookController::class, 'addBookForm'])->name('librarian.addBookForm');
Route::post('/librarian/book/add', [BookController::class, 'addBook'])->name('librarian.addBook');


Route::get('/librarian/loans', [LoanController::class, 'index'])->name('librarian.loans');

Route::get('/backpack', [BackpackController::class, 'index'])->name('backpack.index');


Route::post('/librarian/message-client/{clientId}', [LoanController::class, 'messageClient'])->name('librarian.messageClient');

Route::patch('/librarian/change-due-date/{loanId}', [LoanController::class, 'changeDueDate'])->name('librarian.changeDueDate');
Route::delete('/librarian/delete-loan/{loanId}', [LoanController::class, 'deleteLoan'])->name('librarian.deleteLoan');


Route::get('/librarian/export-loans/{format}', [LoanController::class, 'export'])->name('librarian.exportLoans');


Route::post('/librarian/return-book/{loanId}', [LoanController::class, 'returnBook'])->name('librarian.returnBook');



Route::prefix('librarian')->name('librarian.')->group(function () {
    Route::get('/dashboard', [LibrarianController::class, 'dashboard'])->name('dashboard');
    Route::get('/stats/simple', [StatController::class, 'getSimpleStats'])->name('stats.simple');
    Route::get('/stats/loans-by-day', [StatController::class, 'getLoansByDay'])->name('stats.loansByDay');
    Route::get('/stats/top-loaned-books', [StatController::class, 'getTopLoanedBooks'])->name('stats.topLoanedBooks');
    Route::get('/stats/top-authors', [StatController::class, 'getTopAuthors'])->name('stats.topAuthors');
    Route::get('/stats/top-users', [StatController::class, 'getTopUsers'])->name('stats.topUsers');
});
