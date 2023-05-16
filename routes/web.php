<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\WeatherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/world', function () {
    return "Hello, World";
});

/*  Single Route */ /* Group and Single Same work */
/* 
Route::get('/books', [BookController::class, 'books']);
Route::get('/books/{id}', [BookController::class, 'getbook'])->whereNumber('id');
Route::get('/books/{id}/{field}', [BookController::class, 'getbookField'])->whereNumber('id')->whereIn('field', ['author', 'title']);
*/

/* Group Route */
Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'books');
    Route::get('/books/{id}', 'getbook')->whereNumber('id');
    Route::get('/books/{id}/{field}', 'getbookField')->whereNumber('id')->whereIn('field', ['author', 'title']);

    Route::post('/books', 'createBook');
    Route::post('/header', 'getHeader');
});


Route::get('/weather/{city?}', [WeatherController::class, 'weather'])->whereAlpha('city');