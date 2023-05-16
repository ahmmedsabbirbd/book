<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\WeatherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
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