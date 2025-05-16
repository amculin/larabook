<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'index'])->name('user');
Route::get('/borrowings', [App\Http\Controllers\HomeController::class, 'index'])->name('borrow');
Route::get('/returnings', [App\Http\Controllers\HomeController::class, 'index'])->name('return');


Route::middleware('auth')->group(function () {
    Route::resource('/members', App\Http\Controllers\MemberController::class);
    Route::resource('/publishers', App\Http\Controllers\PublisherController::class);
    Route::resource('/books', App\Http\Controllers\BookController::class);
});
