<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\TopUpController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SaldoController;
use App\Models\Game;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $games = Game::all();
    return view('welcome', compact('games'));
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
        $user = auth()->user();
        $totalTransactions = \App\Models\Transaction::where('user_id', $user->id)
            ->where('status', 'success')
            ->count();
        $totalSpent = \App\Models\Transaction::where('user_id', $user->id)
            ->where('status', 'success')
            ->sum('price');
        
        return view('profile', compact('totalTransactions', 'totalSpent'));
    })->name('profile');
    Route::get('/settings', function () {
        return view('settings');
    })->name('settings');
    
    // Saldo Routes
    Route::get('/saldo', [SaldoController::class, 'index'])->name('saldo.index');
    Route::post('/saldo/topup', [SaldoController::class, 'topup'])->name('saldo.topup');
    Route::post('/saldo/confirm', [SaldoController::class, 'confirm'])->name('saldo.confirm');
    
    Route::get('/topup', [TopUpController::class, 'index'])->name('topup.index');
    Route::get('/topup/game/{game}', [TopUpController::class, 'show'])->name('topup.show');
    Route::post('/topup/purchase', [TopUpController::class, 'purchase'])->name('topup.purchase');
    Route::get('/topup/receipt/{transaction}', [TopUpController::class, 'receipt'])->name('topup.receipt');
});

// Admin routes
Route::prefix('admin')->name('admin.')->group(function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [\App\Http\Controllers\Admin\AuthController::class, 'showLogin'])->name('login');
        Route::post('/login', [\App\Http\Controllers\Admin\AuthController::class, 'login'])->name('login.post');
    });

    Route::middleware('admin')->group(function () {
        Route::post('/logout', [\App\Http\Controllers\Admin\AuthController::class, 'logout'])->name('logout');
        Route::get('/', [\App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
        Route::get('/recap', [\App\Http\Controllers\Admin\DashboardController::class, 'recap'])->name('recap.index');
        Route::resource('topups', \App\Http\Controllers\Admin\TopUpController::class)->except(['show']);
        Route::resource('promocodes', \App\Http\Controllers\Admin\PromoCodeController::class)->except(['show']);
    });
});
