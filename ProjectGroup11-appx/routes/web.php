<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', function () {
    return "<h1>Welcome</h1>";
});

Route::get('/checkout', function () {
    return view('checkout.checkout');
})->name('checkout.checkout');

Route::get('/cart', function () {
    return view('cart.cart');
})->name('cart.cart');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/store', function () {
    return "<h1>Welcome to store</h1>";
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::fallback(function () {
    return "<h1>wwwww</h1>";
});

Route::get('/namo', function () {
    return view('namo');
});

// Add Product
Route::get('/add-product', [ProductController::class, 'addProduct']);
Route::get('/orders', [OrderController::class, 'index']);

require __DIR__.'/auth.php';
