<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'index'])->name('user');
Route::get('/publishers', [App\Http\Controllers\HomeController::class, 'index'])->name('publisher');
Route::get('/books', [App\Http\Controllers\HomeController::class, 'index'])->name('book');
Route::get('/borrowings', [App\Http\Controllers\HomeController::class, 'index'])->name('borrow');
Route::get('/returnings', [App\Http\Controllers\HomeController::class, 'index'])->name('return');


Route::middleware('auth')->group(function () {
    Route::get('/members', [App\Http\Controllers\MemberController::class, 'index'])->name('member.index');
    Route::get('/members/create', [App\Http\Controllers\MemberController::class, 'create'])->name('member.create');
    Route::post('/members/store', [App\Http\Controllers\MemberController::class, 'store'])->name('member.store');
});
