<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;

        if (isset($cart[$id])) {
            // jika sudah ada, tambah qty
            $cart[$id]['qty'] += 1;
        } else {
            // jika belum ada, tambahkan baru
            $cart[$id] = [
                'id'    => $request->id,
                'nama'  => $request->nama,
                'harga' => $request->harga,
                'qty'   => 1,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Produk ditambahkan ke keranjang');
    }

    public function index()
    {
        $cart = session()->get('cart', []);
        return view('cart', compact('cart'));
    }
}
