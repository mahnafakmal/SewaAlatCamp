<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- PUBLIC ROUTES ---
Route::get('/', [PageController::class, 'beranda']);

Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// --- STATIC PAGES ---
Route::get('/cara-sewa', [PageController::class, 'caraSewa'])->name('cara-sewa');
Route::get('/peraturan-sewa', [PageController::class, 'peraturan'])->name('peraturan');
Route::get('/info', [PageController::class, 'info'])->name('info');
Route::get('/beranda', [PageController::class, 'beranda'])->name('beranda');


// --- AUTHENTICATED ROUTES ---
Route::middleware(['auth'])->group(function () {

    // BERANDA (CATALOG) - Moved to Public
    // Route::get('/beranda', [PageController::class, 'beranda'])->name('beranda');

    // CART
    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

    // ORDER
    Route::get('/riwayat-pesanan', [OrderController::class, 'index'])->name('orders.index');
    Route::get('/checkout', [OrderController::class, 'checkout'])->name('checkout');
    Route::post('/checkout', [OrderController::class, 'store'])->name('order.store');

    Route::post('/reviews', [App\Http\Controllers\ReviewController::class, 'store'])->name('reviews.store');

    // ADMIN ROUTES
    Route::middleware(['admin'])->group(function () {
        Route::resource('edit-stok', StokController::class, ['names' => 'edit-stok']);
    });
});
