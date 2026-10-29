<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\BookController;
Route::redirect('/', '/books');

//page for displaying all books
Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books.index');

//page for displaying a single book
Route::get('/books/{book}', [App\Http\Controllers\BookController::class, 'show'])->name('books.show');