<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index')->with('error', 'Keranjang kosong.');
        }

        return view('checkout', compact('cart'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'phone' => 'required',
            'address' => 'required',
        ]);

        // Update user data if needed (optional)
        $user = Auth::user();
        if (!$user->phone || !$user->address) {
            $user->update([
                'phone' => $request->phone,
                'address' => $request->address
            ]);
        }

        $cart = session()->get('cart', []);
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['harga'] * $item['qty'];
            
            // Cek stok tersedia
            $barang = DB::table('barang')->where('id', $item['id'])->first();
            if (!$barang || $barang->stok < $item['qty']) {
                return back()->with('error', 'Stok barang "' . $item['nama'] . '" tidak mencukupi. Sisa stok: ' . ($barang->stok ?? 0));
            }
        }

        DB::beginTransaction();
        try {
            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => $total,
                'status' => 'pending', // or 'processing'
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'barang_id' => $item['id'], // Assuming ID in cart matches barang ID
                    'quantity' => $item['qty'],
                    'price' => $item['harga'],
                ]);

                // Kurangi stok
                DB::table('barang')->where('id', $item['id'])->decrement('stok', $item['qty']);
            }

            // Clear cart
            session()->forget('cart');

            DB::commit();

            return redirect()->route('orders.index')->with('success', 'Pesanan berhasil dibuat! Silakan hubungi admin untuk pembayaran.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Terjadi kesalahan saat membuat pesanan: ' . $e->getMessage());
        }
    }
    public function index()
    {
        $orders = Order::where('user_id', Auth::id())->with('items.barang')->latest()->get();
        return view('orders.index', compact('orders'));
    }
}
