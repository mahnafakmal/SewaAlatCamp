@extends('layouts.app')

@section('content')
<main class="max-w-4xl mx-auto p-8">
    <h1 class="text-3xl font-bold mb-6">Cara Sewa Alat Outdoor</h1>

    <div class="space-y-6">
        <div class="step">
            <h3 class="font-semibold">1. Pilih Peralatan</h3>
            <p class="text-gray-600">Pilih alat camping/hiking sesuai kebutuhan.</p>
        </div>
        <div class="step">
            <h3 class="font-semibold">2. Hubungi Admin</h3>
            <p class="text-gray-600">Konfirmasi stok dan jadwal sewa.</p>
        </div>
        <div class="step">
            <h3 class="font-semibold">3. Pembayaran</h3>
            <p class="text-gray-600">Lakukan pembayaran DP atau lunas.</p>
        </div>
        <div class="step">
            <h3 class="font-semibold">4. Pengambilan Alat</h3>
            <p class="text-gray-600">Ambil alat sesuai waktu yang disepakati.</p>
        </div>
        <div class="step">
            <h3 class="font-semibold">5. Pengembalian</h3>
            <p class="text-gray-600">Kembalikan alat dalam kondisi baik.</p>
        </div>
    </div>
</main>
@endsection