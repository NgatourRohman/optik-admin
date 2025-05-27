<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\DashboardController;

Route::get('/', function () {
    return view('welcome');
});

// Semua route yang butuh login
Route::middleware(['auth'])->group(function () {

    // Dashboard pakai controller
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Modul utama admin
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
    Route::resource('orders', OrderController::class);

    // Profil admin
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
