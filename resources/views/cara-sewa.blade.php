@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <div class="text-center mb-5">
            <h1 style="color: var(--primary-color);">Cara Sewa Alat Outdoor</h1>
            <p style="color: #6b7280;">Panduan mudah menyewa peralatan di EXplorent</p>
        </div>

        <div class="grid">
            <div class="card p-4">
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">1. Pilih Peralatan</h3>
                <p style="color: #4b5563;">Cari dan pilih peralatan camping atau hiking yang Anda butuhkan melalui halaman
                    Beranda.</p>
            </div>

            <div class="card p-4">
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">2. Masukkan Keranjang</h3>
                <p style="color: #4b5563;">Klik "Tambah ke Keranjang" untuk alat yang ingin disewa. Anda bisa menyewa lebih
                    dari satu alat.</p>
            </div>

            <div class="card p-4">
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">3. Checkout</h3>
                <p style="color: #4b5563;">Buka keranjang, periksa pesanan Anda, lalu klik "Lanjut ke Pembayaran".</p>
            </div>

            <div class="card p-4">
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">4. Isi Data & Bayar</h3>
                <p style="color: #4b5563;">Lengkapi data diri dan alamat. Lakukan pembayaran sesuai metode yang dipilih.</p>
            </div>

            <div class="card p-4">
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">5. Ambil Alat</h3>
                <p style="color: #4b5563;">Ambil alat di lokasi kami atau tunggu pengiriman (jika tersedia). Jangan lupa
                    bawa ID asli.</p>
            </div>

            <div class="card p-4">
                <h3 style="color: var(--primary-color); margin-bottom: 1rem;">6. Kembalikan</h3>
                <p style="color: #4b5563;">Setelah selesai, kembalikan alat tepat waktu untuk menghindari denda.</p>
            </div>
        </div>
    </div>
@endsection