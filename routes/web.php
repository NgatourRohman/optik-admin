<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth'])->group(function () {
<<<<<<< HEAD
    Route::resource('categories', CategoryController::class);
=======
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('products', ProductController::class);
>>>>>>> feature/product-views
});
