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

    public function update(Request $request)
    {
        if($request->id && $request->qty){
            $cart = session()->get('cart');
            
            // Check stock if increasing quantity
            if ($request->qty > $cart[$request->id]['qty']) {
                $barang = \Illuminate\Support\Facades\DB::table('barang')->where('id', $request->id)->first();
                if (!$barang || $barang->stok < $request->qty) {
                    return back()->with('error', 'Stok tidak mencukupi! Sisa stok: ' . ($barang->stok ?? 0));
                }
            }

            $cart[$request->id]['qty'] = $request->qty;
            session()->put('cart', $cart);
            return back()->with('success', 'Jumlah barang berhasil diperbarui');
        }
    }

    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            return back()->with('success', 'Barang berhasil dihapus dari keranjang.');
        }
    }

    public function clear()
    {
        session()->forget('cart');
        return back()->with('success', 'Keranjang berhasil dikosongkan.');
    }
}
