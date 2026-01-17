<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    // 🔹 Tambah item ke keranjang
    public function add(Request $request)
    {
        $cart = session()->get('cart', []);

        $id = $request->id;

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'nama' => $request->nama,
                'harga' => $request->harga,
                'qty' => 1
            ];
        }

        session()->put('cart', $cart);

        return back();
    }

    // 🔹 Update jumlah (+ / -)
    public function update(Request $request)
    {
        $cart = session()->get('cart');

        if (isset($cart[$request->id])) {
            $cart[$request->id]['qty'] = $request->qty;
            session()->put('cart', $cart);
        }

        return back();
    }

    // 🔹 Hapus 1 item
    public function remove($id)
    {
        $cart = session()->get('cart');

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session()->put('cart', $cart);
        }

        return back();
    }

    // 🔹 Hapus semua
    public function clear()
    {
        session()->forget('cart');
        return back();
    }
}
