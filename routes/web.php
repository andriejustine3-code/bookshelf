<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthController;
use Illuminate\

//For unauthenticated users
Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'loginForm'])
    Route::post('/login', [AuthController::class, 'login'])->name('login.store');
});

Route::middle('auth')->group(function(){
    Route::post('logout', [App\Http\Controllers\BookController::class, 'logout'])->name('logout');
    // Page for creating a new book
    Route::get('/books/create', [App\Http\Controllers\BookController::class, 'create'])->name('books.create');

    // Page for editing a book
    Route::get('/books/{book}/edit', [App\Http\Controllers\BookController::class, 'edit'])->name('books.edit');

    // Page for updating a book
    Route::put('/books/{book}', [App\Http\Controllers\BookController::class, 'update'])->name('books.update');

    // Page for storing a new book
    Route::post('/books', [App\Http\Controllers\BookController::class, 'store'])->name('books.store');


    //TODO: Add delete function for books
    // Page for deleting a book
    Route::delete('/books/{book}', [App\Http\Controllers\BookController::class, 'destroy'])->name('books.destroy');
})


Route::redirect('/', '/books');

//page for displaying all books
Route::get('/books', [App\Http\Controllers\BookController::class, 'index'])->name('books.index');


//page for displaying a single book
Route::get('/books/{book}', [App\Http\Controllers\BookController::class, 'show'])->name('books.show');