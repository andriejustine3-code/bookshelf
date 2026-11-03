<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BookController;
Route::redirect('/', '/books');

//page for displaying all books
Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books.index');

//page for displaying a single book
Route::get('/books/{book}', [App\Http\Controllers\BookController::class, 'show'])->name('books.show');

// Page for creating a new book
Route::get('/books/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create');

// Page for storing a new book
Route::post('/books', [App\Http\Controllers\BookController::class, 'store'])->name('books.store');

// Page for editing a book
Route::get('/books/{book}/edit', [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');

// Page for updating a book
Route::put('/books/{book}', [App\Http\Controllers\BookController::class, 'update'])->name('books.update');

// Page for deleting a book
Route::delete('/books/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');