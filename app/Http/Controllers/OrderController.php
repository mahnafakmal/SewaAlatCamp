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
            'rental_date' => 'required|date|after_or_equal:today',
            'pickup_time' => 'required',
            'duration' => 'required|integer|min:1',
            'payment_proof' => 'nullable|image|max:2048',
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

        $duration = $request->input('duration', 1);
        $total = $total * $duration;

        DB::beginTransaction();
        try {
            // Handle Payment Proof Upload
            $proofPath = null;
            if ($request->hasFile('payment_proof')) {
                $proofPath = $request->file('payment_proof')->store('payment_proofs', 'public');
            }

            $order = Order::create([
                'user_id' => $user->id,
                'total_price' => $total,
                'status' => 'pending', 
                'payment_proof' => $proofPath,
                'rental_date' => $request->rental_date,
                'pickup_time' => $request->pickup_time,
                'duration' => $duration,
            ]);

            foreach ($cart as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'barang_id' => $item['id'], 
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

    // --- ADMIN METHODS ---
    public function adminIndex()
    {
        $orders = Order::with(['user', 'items.barang'])->latest()->get();
        return view('orders.admin_index', compact('orders'));
    }

    public function updateStatus(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:pending,paid,rented,returned,cancelled'
        ]);

        $order->status = $request->status;
        $order->save();

        // Jika status cancelled, kembalikan stok
        if ($request->status == 'cancelled') {
            foreach ($order->items as $item) {
                DB::table('barang')->where('id', $item->barang_id)->increment('stok', $item->quantity);
            }
        }

        return back()->with('success', 'Status pesanan berhasil diperbarui.');
    }
}
