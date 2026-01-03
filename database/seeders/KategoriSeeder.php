<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kategori')->insert([
            [
                'nama_kategori' => 'Tenda',
                'deskripsi' => 'Berbagai jenis tenda untuk camping',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Carrier',
                'deskripsi' => 'Tas gunung dan carrier berbagai ukuran',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Sleeping Bag',
                'deskripsi' => 'Sleeping bag dan matras',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Kompor & Peralatan Masak',
                'deskripsi' => 'Kompor portable dan peralatan masak outdoor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Lampu & Penerangan',
                'deskripsi' => 'Lampu camping dan senter',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Peralatan Pendakian',
                'deskripsi' => 'Peralatan khusus untuk mendaki gunung',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_kategori' => 'Pakaian & Alas Kaki',
                'deskripsi' => 'Jaket, sepatu, dan perlengkapan outdoor lainnya',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);

        echo "✅ Kategori berhasil di-seed!\n";
    }
}