<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Panggil seeder lain secara berurutan
        $this->call([
            KategoriSeeder::class,
            BarangSeeder::class,
            AdminUserSeeder::class,
        ]);

        echo "\n🎉 Semua data berhasil di-seed!\n";
    }
}