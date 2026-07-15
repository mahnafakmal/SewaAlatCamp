@extends('layouts.app')

@section('content')
    <div class="page-header text-center">
        <div class="container">
            <h1 class="text-white text-4xl mb-4">Cara Sewa Alat Outdoor</h1>
            <p class="text-green-200 text-lg max-w-2xl mx-auto">Panduan mudah untuk memulai petualangan Anda bersama EXplorent. Ikuti langkah sederhana berikut untuk menyewa peralatan.</p>
        </div>
    </div>

    <div class="container py-16">
        <div class="steps-grid">
            @php
                $steps = [
                    ['icon' => 'fa-magnifying-glass', 'title' => 'Pilih Peralatan', 'desc' => 'Jelajahi katalog lengkap kami. Pilih tenda, carrier, atau perlengkapan masak yang sesuai.'],
                    ['icon' => 'fa-cart-shopping', 'title' => 'Masukkan Keranjang', 'desc' => 'Klik tombol "Tambah ke Keranjang" pada item yang diinginkan. Sewa banyak item sekaligus.'],
                    ['icon' => 'fa-credit-card', 'title' => 'Checkout Pesanan', 'desc' => 'Periksa kembali daftar sewaan Anda di keranjang. Pastikan jumlah dan jenis barang sudah sesuai.'],
                    ['icon' => 'fa-file-invoice', 'title' => 'Isi Data & Bayar', 'desc' => 'Lengkapi data diri untuk administrasi. Lakukan pembayaran atau pilih COD jika tersedia.'],
                    ['icon' => 'fa-location-dot', 'title' => 'Ambil Barang', 'desc' => 'Datang ke lokasi kami. Jangan lupa membawa kartu identitas asli (KTP/SIM) sebagai jaminan.'],
                    ['icon' => 'fa-person-hiking', 'title' => 'Pengembalian', 'desc' => 'Nikmati petualangan! Setelah selesai, kembalikan peralatan tepat waktu dan dalam kondisi baik.'],
                ];
            @endphp

            @foreach($steps as $index => $step)
                <div class="step-card">
                    <div class="step-number">{{ $index + 1 }}</div>
                    <div class="step-icon">
                        <i class="fa-solid {{ $step['icon'] }} text-2xl"></i>
                    </div>
                    <h3>{{ $step['title'] }}</h3>
                    <p>{{ $step['desc'] }}</p>
                </div>
            @endforeach
        </div>

        <div class="text-center mt-16 p-10 bg-green-50 rounded-3xl border border-green-100">
            <h2 class="text-2xl font-bold text-slate-900 mb-4">Siap Berpetualang?</h2>
            <a href="{{ route('beranda') }}" class="btn btn-primary px-10 py-4 text-lg">
                Mulai Sewa Sekarang
            </a>
        </div>
    </div>
@endsection
