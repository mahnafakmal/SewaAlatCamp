<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    public function beranda()
    {
        // Ambil produk populer dari database
        $produk = DB::table('barang')
            ->join('kategori', 'barang.kategori_id', '=', 'kategori.id')
            ->select(
                'barang.nama_barang as nama',
                'barang.harga_per_hari',
                'kategori.nama_kategori'
            )
            ->where('barang.is_populer', true)
            ->where('barang.stok', '>', 0)
            ->get()
            ->map(function($item) {
                return [
                    'nama' => $item->nama,
                    'harga' => 'Rp' . number_format($item->harga_per_hari, 0, ',', '.'),
                    'periode' => '/ hari'
                ];
            });

        // Ambil semua peralatan dari database
        $peralatan = DB::table('barang')
            ->select(
                'barang.id',
                'barang.nama_barang as nama',
                'barang.harga_per_hari',
                'barang.stok',
                'barang.kondisi'
            )
            ->where('barang.stok', '>', 0)
            ->orderBy('barang.id')
            ->get()
            ->map(function($item, $index) {
                return [
                    'no' => $index + 1,
                    'nama' => $item->nama,
                    'harga' => 'Rp' . number_format($item->harga_per_hari, 0, ',', '.'),
                    'stok' => $item->stok,
                    'kondisi' => $item->kondisi
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