<?php

use Illuminate\Support\Facades\Route;
use App\Book;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', function () {
    $books = Book::findAll();
    return view('getallbook', ['books' => $books]);
});

Route::get('/books/{id}', function ($id) {
    $book = Book::findById($id);
    return view('searchbyid', ['book' => $book]);
    // return response()->json($book);
});

Route::get('/books/genre/{genre}', function ($genre) {
    $books = Book::findByGenre($genre);
    return view('searchbygenre', ['books' => $books]);
});