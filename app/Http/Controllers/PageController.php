<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function beranda()
    {
        $produk = [
            [
                'nama' => 'Tenda Dome',
                'harga' => 'Rp35.000',
                'periode' => '/ hari'
            ],
            [
                'nama' => 'Carrier 60L',
                'harga' => 'Rp25.000',
                'periode' => '/ hari'
            ],
            [
                'nama' => 'Sleeping Bag',
                'harga' => 'Rp10.000',
                'periode' => '/ hari'
            ],
            [
                'nama' => 'Matras Camping',
                'harga' => 'Rp8.000',
                'periode' => '/ hari'
            ],
            [
                'nama' => 'Headlamp',
                'harga' => 'Rp5.000',
                'periode' => '/ hari'
            ],
            [
                'nama' => 'Cooking Set',
                'harga' => 'Rp15.000',
                'periode' => '/ hari'
            ]
        ];

        $peralatan = [
            ['no' => 1, 'nama' => 'Tenda Dome', 'harga' => 'Rp35.000', 'stok' => 5, 'kondisi' => 'Baik'],
            ['no' => 2, 'nama' => 'Carrier 60L', 'harga' => 'Rp25.000', 'stok' => 8, 'kondisi' => 'Baik'],
            ['no' => 3, 'nama' => 'Sleeping Bag', 'harga' => 'Rp10.000', 'stok' => 12, 'kondisi' => 'Baik'],
            ['no' => 4, 'nama' => 'Matras Camping', 'harga' => 'Rp8.000', 'stok' => 15, 'kondisi' => 'Baik'],
            ['no' => 5, 'nama' => 'Headlamp', 'harga' => 'Rp5.000', 'stok' => 20, 'kondisi' => 'Baik'],
            ['no' => 6, 'nama' => 'Cooking Set', 'harga' => 'Rp15.000', 'stok' => 6, 'kondisi' => 'Baik'],
        ];

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