@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-5">Hubungi Kami</h2>

        <div class="grid mb-5">
            {{-- ALAMAT --}}
            <div class="card p-4 text-center">
                <h3 style="color: var(--primary-color);">Lokasi</h3>
                <p class="mt-2">{{ $alamat }}</p>
            </div>

            {{-- KONTAK --}}
            <div class="card p-4 text-center">
                <h3 style="color: var(--primary-color);">Kontak</h3>
                <p class="mt-2">WA: <a href="https://wa.me/6285147111724" style="color: var(--text-color);">{{ $nohp }}</a>
                </p>
                <p>Email: {{ $email }}</p>
            </div>

            {{-- JAM --}}
            <div class="card p-4 text-center">
                <h3 style="color: var(--primary-color);">Jam Buka</h3>
                <p class="mt-2">{{ $jam_buka }}</p>
                <p style="font-size: 0.9rem; color: #6b7280;">Buka Setiap Hari</p>
            </div>
        </div>

        <div class="card p-4">
            <h3 class="mb-3">Layanan Kami</h3>
            <ul style="list-style-type: disc; margin-left: 1.5rem;">
                <li class="mb-2">Penyewaan Peralatan Camping & Hiking Lengkap</li>
                <li class="mb-2">Konsultasi Peralatan Outdoor untuk Pemula</li>
                <li class="mb-2">Paket Sewa Hemat untuk Grup / Open Trip</li>
                <li class="mb-2">Jasa Antar Jemput Alat (S&K Berlaku)</li>
            </ul>
        </div>
    </div>
@endsection