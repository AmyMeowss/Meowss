<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// Auth
Route::controller(AuthController::class)->prefix('auth')->middleware('guest')->group(function () {
    Route::get('/login', 'LoginPage')->name('login');
    Route::post('/login', 'LoginForm');
});