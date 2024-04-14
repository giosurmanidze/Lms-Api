<?php

use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {

    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::get('/books', [BookController::class, 'index'])->name('books.index');

    Route::controller(BookController::class)->prefix('books')->middleware('role:admin')->group(function () {
        Route::post('/', 'store');
        Route::put('/{book}', 'update');
        Route::delete('/{book}', 'destroy');
    });

    Route::controller(AuthorController::class)->prefix('authors')->middleware('role:admin')->group(function () {
        Route::post('/', 'store');
    });
});
