<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\QuoteController;
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

Route::controller(BookController::class)->group(function () {
    Route::get('/books', 'index');
    Route::post('/book', 'store');
    Route::put('/book/{id}', 'update');
    Route::get('/book/{id}', 'show');
    Route::delete('/book/{id}', 'destroy');
});

Route::controller(AuthorController::class)->group(function () {
    Route::get('/authors/{name}', 'filterByAuthorName');
    Route::post('/author', 'store');
    Route::put('/author/{id}', 'update');
    Route::get('/author/{id}', 'show');
    Route::delete('/author/{id}', 'destroy');
});

Route::controller(GenreController::class)->group(function () {
    Route::get('/genres', 'index');
    Route::post('/genre', 'store');
    Route::put('/genre/{id}', 'update');
    Route::get('/genre/{id}', 'show');
    Route::delete('/genre/{id}', 'destroy');
});

Route::controller(QuoteController::class)->group(function () {
    Route::get('/quotes', 'index');
    Route::post('/quote', 'store');
    Route::put('/quote/{id}', 'update');
    Route::get('/quote/{id}', 'show');
    Route::delete('/quote/{id}', 'destroy');
});
