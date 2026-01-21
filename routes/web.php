<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PageController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use Illuminate\Http\Request;

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
| GUEST (BELUM LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login', [AuthController::class, 'loginProcess']);

    Route::get('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/register', [AuthController::class, 'registerProcess']);
});

/*
|--------------------------------------------------------------------------
| AUTH (SUDAH LOGIN)
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {
    Route::get('/beranda', function () {
        return view('beranda');
    });

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
});

/*
|--------------------------------------------------------------------------
| DEFAULT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect('/beranda');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/beranda', function () {
        return view('beranda');
    });
});

Route::get('/login', function () {
    return redirect()->route('login');
});

// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// REGISTER
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// LOGOUT
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// BERANDA (HARUS LOGIN)
Route::get('/beranda', [PageController::class, 'beranda'])
    
    ->name('beranda');

Route::post('/cart/add', function (Request $request) {
    // sementara hanya untuk menghindari error
    // logika keranjang bisa ditambahkan nanti
    return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang');
})->name('cart.add');

// TAMBAH KE KERANJANG
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');

// LIHAT KERANJANG
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');



Route::post('/cart/add', function (Request $request) {
    $cart = session()->get('cart', []);

    $id = $request->id;

    if (isset($cart[$id])) {
        $cart[$id]['qty'] += 1;
    } else {
        $cart[$id] = [
            'id' => $id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'qty' => 1
        ];
    }

    session()->put('cart', $cart);

    return back();
})->name('cart.add');

