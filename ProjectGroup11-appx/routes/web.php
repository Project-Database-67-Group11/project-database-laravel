<?php

use App\Http\Controllers\CartController;
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

// Route::get('/cart', function () {
//     return view('cart.cart');
// })->name('cart.cart');

Route::get('/store', [ProductController::class, 'showTrendingProducts'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');
// Route::get('/store', function () {
//     return "<h1>Welcome to store</h1>";
// });

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile/address', [ProfileController::class, 'editAddress'])->name('profile.address');
    Route::get('/profile/address/edit', [ProfileController::class, 'editAddressForm'])->name('profile.editAddress');
    Route::patch('/profile/address', [ProfileController::class, 'updateAddress'])->name('profile.updateAddress');


    // Routes for orders
    Route::get('/profile/index', [ProfileController::class, 'Order_index'])->name('profile.Order_index');
    Route::get('/profile/pending', [ProfileController::class, 'Order_pending'])->name('profile.Order_pending');
    Route::get('/profile/completed', [ProfileController::class, 'Order_completed'])->name('profile.Order_completed');
    Route::get('/profile/cancelled', [ProfileController::class, 'Order_cancelled'])->name('profile.Order_cancelled');
    

    // Route::get('/profile/orders', [OrderController::class, 'index'])->name('profile.orders.index');
    // Route::get('/profile/orders/pending', [OrderController::class, 'pending'])->name('profile.orders.pending');
    // Route::get('/profile/orders/completed', [OrderController::class, 'completed'])->name('profile.orders.completed');
    // Route::get('/profile/orders/cancelled', [OrderController::class, 'cancelled'])->name('profile.orders.cancelled');
});


Route::fallback(function () {
    return "<h1>wwwww</h1>";
});

Route::get('/namo', function () {
    return view('namo');
});

// Add Product
Route::get('/add-product', [ProductController::class, 'addProduct']);

// for Route Orders
// Route::get('/orders', [OrderController::class, 'index']);
// Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');
// Route::get('/orders/pending', [OrderController::class, 'pending'])->name('orders.pending');
// Route::get('/orders/completed', [OrderController::class, 'completed'])->name('orders.completed');
// Route::get('/orders/cancelled', [OrderController::class, 'cancelled'])->name('orders.cancelled');


// show product
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');


// Cart
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add')->middleware('auth');
Route::delete('/cart/removed', [CartController::class, 'removed'])->name('cart.removed');
Route::post('/cart/update/{product_id}', [CartController::class, 'update'])->name('cart.update');

// CheckOut
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('cart.placeOrder');

Route::get('/information', function () {
    return view('information.index');
});

Route::get('/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function () {
    Route::get('/profile/resetpassword', [ProfileController::class, 'resetPasswordForm'])->name('profile.resetpassword');
    Route::post('/profile/resetpassword', [ProfileController::class, 'resetPassword'])->name('profile.resetpassword.update');
});
