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
                'barang.id',
                'barang.nama_barang as nama',
                'barang.harga_per_hari as harga',
                'barang.gambar', // Assuming this column exists or will be added
                'kategori.nama_kategori'
            )
            ->where('barang.is_populer', true)
            ->where('barang.stok', '>', 0);

        if (request('search')) {
            // Jika search ada, kita filter juga produk populer atau biarkan default
            // Tapi biasanya search mencakup semua. Kita akan fokus search di $peralatan
        }

        $produk = $produk->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'nama' => $item->nama,
                    'harga' => $item->harga,
                    'gambar' => $item->gambar,
                ];
            });

        // Ambil semua peralatan dari database (Main Catalog)
        $query = DB::table('barang')
            ->select(
                'barang.id',
                'barang.nama_barang as nama',
                'barang.harga_per_hari as harga',
                'barang.stok',
                'barang.kondisi'
            )
            ->where('barang.stok', '>', 0);

        if (request('search')) {
            $query->where('barang.nama_barang', 'like', '%' . request('search') . '%');
        }

        $peralatan = $query->orderBy('barang.id')
            ->get()
            ->map(function ($item, $index) {
                return [
                    'id' => $item->id,
                    'no' => $index + 1,
                    'nama' => $item->nama,
                    'harga' => $item->harga,
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