@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div class="container">
            <h1>Cara Sewa Alat Outdoor</h1>
            <p>Panduan mudah untuk memulai petualangan Anda bersama EXplorent. Ikuti langkah sederhana berikut untuk menyewa
                peralatan.</p>
        </div>
    </div>

    <div class="container">
        <div class="steps-grid">
            <div class="step-card">
                <div class="step-number">1</div>
                <div class="step-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="11" cy="11" r="8"></circle>
                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                    </svg>
                </div>
                <h3>Pilih Peralatan</h3>
                <p>Jelajahi katalog lengkap kami. Pilih tenda, carrier, atau perlengkapan masak yang sesuai dengan kebutuhan
                    petualangan Anda.</p>
            </div>

            <div class="step-card">
                <div class="step-number">2</div>
                <div class="step-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                </div>
                <h3>Masukkan Keranjang</h3>
                <p>Klik tombol "Tambah ke Keranjang" pada item yang diinginkan. Anda dapat menyewa beberapa item sekaligus
                    dalam satu transaksi.</p>
            </div>

            <div class="step-card">
                <div class="step-number">3</div>
                <div class="step-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path>
                        <line x1="3" y1="6" x2="21" y2="6"></line>
                        <path d="M16 10a4 4 0 0 1-8 0"></path>
                    </svg>
                </div>
                <h3>Checkout Pesanan</h3>
                <p>Periksa kembali daftar sewaan Anda di keranjang. Pastikan jumlah dan jenis barang sudah sesuai sebelum
                    melanjutkan.</p>
            </div>

            <div class="step-card">
                <div class="step-number">4</div>
                <div class="step-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>
                </div>
                <h3>Isi Data & Bayar</h3>
                <p>Lengkapi data diri untuk keperluan administrasi. Lakukan pembayaran atau pilih metode bayar di tempat
                    (COD) jika tersedia.</p>
            </div>

            <div class="step-card">
                <div class="step-number">5</div>
                <div class="step-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                </div>
                <h3>Ambil Barang</h3>
                <p>Datang ke lokasi kami untuk mengambil barang. Jangan lupa membawa kartu identitas asli (KTP/SIM) sebagai
                    jaminan.</p>
            </div>

            <div class="step-card">
                <div class="step-number">6</div>
                <div class="step-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <polyline points="23 4 23 10 17 10"></polyline>
                        <path d="M20.49 15a9 9 0 1 1-2.12-9.36L23 10"></path>
                    </svg>
                </div>
                <h3>Pengembalian</h3>
                <p>Nikmati petualangan Anda! Setelah selesai, kembalikan peralatan tepat waktu dan dalam kondisi baik.</p>
            </div>
        </div>

        <div class="text-center mb-5">
            <h2 class="mb-4">Siap Berpetualang?</h2>
            <a href="{{ route('beranda') }}" class="btn btn-primary" style="padding: 1rem 2rem; font-size: 1.1rem;">
                Mulai Sewa Sekarang
            </a>
        </div>
    </div>
@endsection