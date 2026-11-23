<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;

// For unauthenticated users
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'loginForm']);
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

// For authenticated users
Route::middleware('auth')->group(function () {
    Route::post('logout', [BookController::class, 'logout'])->name('logout');
    
    // Page for creating a new book
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

    // Page for editing a book
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit');

    // Page for updating a book
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update');

    // Page for storing a new book
    Route::post('/books', [BookController::class, 'store'])->name('books.store');

    // Page for deleting a book
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');
}); // <-- Added missing semicolon here

Route::redirect('/', '/books');

// Page for displaying all books
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Page for displaying a single book
Route::get('/books/{book}', [BookController::class, 'show'])->name('books.show');