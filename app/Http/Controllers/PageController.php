<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function beranda()
    {
        // Ambil produk populer (Eloquent)
        $produk = \App\Models\Barang::where('is_populer', true)
            ->where('stok', '>', 0)
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nama' => $item->nama,
                    'harga' => $item->harga,
                    'gambar' => $item->image_url, // Logic di Model handle public/Barang vs storage
                ];
            });

        // Ambil semua peralatan (Eloquent)
        $query = \App\Models\Barang::where('stok', '>', 0);

        if (request('search')) {
            $query->search(request('search')); // Menggunakan scopeSearch di Model
        }

        $peralatan = $query->orderBy('id')
            ->get()
            ->map(function ($item, $index) {
                return [
                    'id' => $item->id,
                    'no' => $index + 1,
                    'nama' => $item->nama,
                    'harga' => $item->harga,
                    'stok' => $item->stok,
                    'kondisi' => $item->kondisi,
                    'gambar' => $item->image_url
                ];
            });

        return view('beranda', [
            'title' => 'Beranda',
            'produk' => $produk,
            'peralatan' => $peralatan
        ]);
    }

    public function caraSewa()
    {
        return view('cara-sewa', [
            'title' => 'Cara Sewa'
        ]);
    }

    public function peraturan()
    {
        return view('peraturan', [
            'title' => 'Peraturan Sewa'
        ]);
    }

    public function info()
    {
        return view('info', [
            'title' => 'Info',
            'alamat' => 'Jl. Pendaki Gunung No. 42, Semarang, Jawa Tengah 50123',
            'nohp' => '0851-4711-1724',
            'email' => 'info@explorent.com',
            'jam_buka' => '08:00 - 17:00 WIB'
        ]);
    }
}