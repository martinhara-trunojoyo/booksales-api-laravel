<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthorController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Book
route::apiResource('/books', BookController::class);
// Genre
route::apiResource('/genres', GenreController::class);
// Author
route::apiResource('/authors', AuthorController::class);