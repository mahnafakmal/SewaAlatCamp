@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div class="container">
            <h1>Tentang Kami</h1>
            <p>Informasi lokasi, kontak, dan layanan yang kami tawarkan untuk mendukung petualangan Anda.</p>
        </div>
    </div>

    <div class="container">
        <div class="contact-grid">
            {{-- ALAMAT --}}
            <div class="contact-card">
                <div class="contact-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path>
                        <circle cx="12" cy="10" r="3"></circle>
                    </svg>
                </div>
                <h3>Lokasi Store</h3>
                <p class="mt-2 text-muted" style="color: var(--text-light);">{{ $alamat }}</p>
                <a href="#" class="btn btn-secondary btn-sm mt-3">Lihat di Peta</a>
            </div>

            {{-- KONTAK --}}
            <div class="contact-card">
                <div class="contact-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path
                            d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z">
                        </path>
                    </svg>
                </div>
                <h3>Hubungi Kami</h3>
                <div class="mt-2">
                    <p style="margin-bottom: 0.5rem;">WhatsApp: <a href="https://wa.me/6285147111724"
                            style="color: var(--primary-color); font-weight: 500;">{{ $nohp }}</a></p>
                    <p>Email: {{ $email }}</p>
                </div>
            </div>

            {{-- JAM --}}
            <div class="contact-card">
                <div class="contact-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <h3>Jam Operasional</h3>
                <p class="mt-2" style="font-size: 1.1rem; font-weight: 600;">{{ $jam_buka }}</p>
                <p style="font-size: 0.9rem; color: #6b7280;">Buka Setiap Hari</p>
            </div>
        </div>

        <div class="card p-5 mb-5">
            <h3 class="mb-4 text-center">Layanan & Fasilitas</h3>
            <div class="service-list">
                <div class="service-item">
                    <div class="service-check">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <span>Peralatan Camping Terawat</span>
                </div>
                <div class="service-item">
                    <div class="service-check">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <span>Konsultasi Gratis untuk Pemula</span>
                </div>
                <div class="service-item">
                    <div class="service-check">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <span>Paket Sewa Hemat & Grup</span>
                </div>
                <div class="service-item">
                    <div class="service-check">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <span>Booking Online Mudah</span>
                </div>
                <div class="service-item">
                    <div class="service-check">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <span>Diskon Pelanggan Setia</span>
                </div>
                <div class="service-item">
                    <div class="service-check">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <polyline points="20 6 9 17 4 12"></polyline>
                        </svg>
                    </div>
                    <span>Jasa Antar Jemput (S&K)</span>
                </div>
            </div>
        </div>
    </div>
@endsection