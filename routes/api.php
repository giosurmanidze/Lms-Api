<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // Route::put("/books", [BookController::class,"update"]);
    Route::apiResource('/books', BookController::class);
    Route::apiResource('/authors', AuthorController::class);
});
