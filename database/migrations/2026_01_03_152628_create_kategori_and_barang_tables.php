<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Tabel Kategori
        Schema::create('kategori', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kategori', 50);
            $table->text('deskripsi')->nullable();
            $table->timestamps();
        });

        // Tabel Barang
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->nullable()->constrained('kategori')->onDelete('set null');
            $table->string('nama_barang', 100);
            $table->text('deskripsi')->nullable();
            $table->decimal('harga_per_hari', 10, 2);
            $table->integer('stok')->default(0);
            $table->enum('kondisi', ['Baru', 'Baik', 'Cukup Baik'])->default('Baik');
            $table->boolean('is_populer')->default(false);
            $table->string('gambar')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
        Schema::dropIfExists('kategori');
    }
};