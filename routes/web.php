<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('welcome');
    return "Hello World!";
});

Route::get('/books', function () {
    return view('welcome');
});