<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;

Route::get('/', [PageController::class, 'beranda'])->name('beranda');
Route::get('/beranda', [PageController::class, 'beranda'])->name('beranda.index');
Route::get('/cara-sewa', [PageController::class, 'caraSewa'])->name('cara-sewa');
Route::get('/peraturan-sewa', [PageController::class, 'peraturan'])->name('peraturan');
Route::get('/info', [PageController::class, 'info'])->name('info');

