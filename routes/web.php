<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| HALAMAN UTAMA
|--------------------------------------------------------------------------
*/
Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/beranda', [PageController::class, 'beranda'])->name('beranda.index');
Route::get('/cara-sewa', [PageController::class, 'caraSewa'])->name('cara-sewa');
Route::get('/peraturan-sewa', [PageController::class, 'peraturan'])->name('peraturan');
Route::get('/info', [PageController::class, 'info'])->name('info');

/*
|--------------------------------------------------------------------------
| EDIT STOK (ADMIN)
|--------------------------------------------------------------------------
*/
Route::resource('edit-stok', StokController::class, ['names' => 'edit-stok']);

/*
|--------------------------------------------------------------------------
| AUTHENTICATION
|--------------------------------------------------------------------------
*/
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| HALAMAN BERANDA (LOGIN)
|--------------------------------------------------------------------------
*/
Route::get('/beranda-login', function () {
    return view('beranda');
})->middleware('auth');

/*
|--------------------------------------------------------------------------
| KERANJANG SEWA (CART)
|--------------------------------------------------------------------------
*/
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update', [CartController::class, 'update'])->name('cart.update');
Route::get('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::get('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');
