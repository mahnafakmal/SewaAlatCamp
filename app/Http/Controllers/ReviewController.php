<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required|exists:barang,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
        ]);

        // Optional: Check if user has ordered this item and status is completed
        // For simplicity now, we just allow review if logged in (middleware will handle auth)

        \App\Models\Review::create([
            'user_id' => auth()->id(),
            'barang_id' => $request->barang_id,
            'rating' => $request->rating,
            'comment' => $request->comment,
        ]);

        return back()->with('success', 'Terima kasih atas ulasan Anda!');
    }
}
