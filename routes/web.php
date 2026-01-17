<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\AuthController;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/beranda', [PageController::class, 'beranda'])->name('beranda.index');
Route::get('/cara-sewa', [PageController::class, 'caraSewa'])->name('cara-sewa');
Route::get('/peraturan-sewa', [PageController::class, 'peraturan'])->name('peraturan');
Route::get('/info', [PageController::class, 'info'])->name('info');
Route::resource('edit-stok', StokController::class, ['names' => 'edit-stok']);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'loginProcess']);

Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'registerProcess']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/beranda', function () {
    return view('beranda');
})->middleware('auth');