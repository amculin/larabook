<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
    Route::resource('/members', App\Http\Controllers\MemberController::class);
    Route::resource('/publishers', App\Http\Controllers\PublisherController::class);
    Route::resource('/books', App\Http\Controllers\BookController::class);
    Route::resource('/borrowings', App\Http\Controllers\BorrowingController::class);
    Route::resource('/returnings', App\Http\Controllers\ReturningController::class);
});
