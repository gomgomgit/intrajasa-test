<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TransactionController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('loginProcess');
    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess'])->name('registerProcess');
});

Route::middleware('auth')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');

    Route::prefix('/transactions')->controller(TransactionController::class)->group(function () {
        Route::get('/deposit', 'deposit')->name('deposit');
        Route::get('/withdraw', 'withdraw')->name('withdraw');
        Route::get('/history', 'history')->name('history');

        Route::post('/post/{type}', 'postTransaction')->name('postTransaction');
    });

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
