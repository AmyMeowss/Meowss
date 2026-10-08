<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home')->middleware('guest');
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware('auth');
Route::post('/dashboard/post', [DashboardController::class, 'CreatePost'])->name('dashboard.createpost')->middleware('auth');

// Auth
Route::controller(AuthController::class)->prefix('auth')->middleware('guest')->group(function () {
    // Login
    Route::get('/login', 'LoginPage')->name('login');
    Route::post('/login', 'LoginForm');

    // Register
    Route::get('/register', 'RegisterPage')->name('register');
    Route::post('/register', 'RegisterForm');
});