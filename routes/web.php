<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Auth Routes
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register'])->name('register.post');
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');
    Route::get('/topup', [TopUpController::class, 'index'])->name('topup.index');
    Route::get('/topup/game/{game}', [TopUpController::class, 'show'])->name('topup.show');
    Route::post('/topup/purchase', [TopUpController::class, 'purchase'])->name('topup.purchase');
    Route::get('/topup/receipt/{transaction}', [TopUpController::class, 'receipt'])->name('topup.receipt');
});
