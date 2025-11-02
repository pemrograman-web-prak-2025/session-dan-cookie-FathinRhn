<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

// Middleware sebagai guest (sebelum login)
Route::middleware('guest')->group(function(){
    Route::get('/', function(){
        return view('initial');
    });
    Route::get('/register', [AuthController::class, 'createRegister']);
    Route::post('/register', [AuthController::class, 'storeRegister']);
    Route::get('/login', [AuthController::class, 'createLogin'])->name("auth.login");
    Route::post('/login', [AuthController::class, 'storeLogin']);
});

// Middleware untuk user yang sudah login
Route::middleware('auth')->group(function (): void {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

    Route::get('/books', [BookController::class, 'index'])->name('book.index');
    Route::get('/create', [BookController::class, 'create'])->name('book.create');
    Route::post('/store', [BookController::class, 'store'])->name('book.store');
    Route::get('/edit/{id}', [BookController::class, 'edit']);
    Route::post('/update/{id}', [BookController::class, 'update'])->name('book.update');
    Route::post('/delete/{id}', [BookController::class, 'delete']);
});