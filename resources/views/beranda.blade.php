@extends('layouts.app')

@section('content')

    {{-- HERO SECTION --}}
    <section class="hero">
        <div class="container text-center">
            <h1>Persewaan Alat Camping & Hiking</h1>
            <p class="mb-4">
                Menyediakan alat camping, hiking, dan outdoor travelling
                lengkap dengan harga terjangkau.
            </p>
            <style>
                /* =========================================
   RESET & BASE STYLES
   ========================================= */
@import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');

:root {
    --primary-color: #e30613;
    --primary-dark: #b9050f;
    --secondary-color: #111827;
    --text-color: #374151;
    --text-light: #6b7280;
    --bg-light: #f9fafb;
    --white: #ffffff;
    --border-color: #e5e7eb;
    --shadow-sm: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
    --shadow-md: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
    --shadow-lg: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
    --radius: 0.5rem;
    --transition: all 0.2s ease-in-out;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Inter', sans-serif;
    color: var(--text-color);
    background-color: var(--bg-light);
    line-height: 1.5;
    -webkit-font-smoothing: antialiased;
}

a {
    text-decoration: none;
    color: inherit;
    transition: var(--transition);
}

ul {
    list-style: none;
}

img {
    max-width: 100%;
    display: block;
}

h1,
h2,
h3,
h4,
h5,
h6 {
    color: var(--secondary-color);
    font-weight: 700;
    margin-bottom: 0.5rem;
}

/* =========================================
   UTILITIES
   ========================================= */
.container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 1.5rem;
}

.btn {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0.5rem 1rem;
    font-weight: 500;
    border-radius: var(--radius);
    border: 1px solid transparent;
    cursor: pointer;
    transition: var(--transition);
    font-size: 0.875rem;
}

.btn-primary {
    background-color: var(--primary-color);
    color: var(--white);
}

.btn-primary:hover {
    background-color: var(--primary-dark);
}

.btn-secondary {
    background-color: var(--white);
    color: var(--text-color);
    border-color: var(--border-color);
}

.btn-secondary:hover {
    background-color: var(--bg-light);
    border-color: #d1d5db;
}

.btn-block {
    width: 100%;
}

.form-control {
    width: 100%;
    padding: 0.5rem 0.75rem;
    border: 1px solid var(--border-color);
    border-radius: var(--radius);
    font-family: inherit;
    font-size: 0.875rem;
    color: var(--secondary-color);
    transition: var(--transition);
}

.form-control:focus {
    outline: none;
    border-color: var(--primary-color);
    box-shadow: 0 0 0 3px rgba(227, 6, 19, 0.1);
}

.text-center {
    text-align: center;
}

.mt-4 {
    margin-top: 1rem;
}

.mb-4 {
    margin-bottom: 1rem;
}

.py-5 {
    padding-top: 3rem;
    padding-bottom: 3rem;
}

/* =========================================
   NAVBAR
   ========================================= */
.navbar {
    background-color: rgba(255, 255, 255, 0.95);
    backdrop-filter: blur(10px);
    border-bottom: 1px solid var(--border-color);
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 70px;
    display: flex;
    align-items: center;
    z-index: 1000;
}

.navbar .container {
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
}

.nav-brand {
    font-size: 1.25rem;
    font-weight: 800;
    color: var(--primary-color);
    display: flex;
    align-items: center;
    gap: 0.5rem;
}

.nav-brand img {
    height: 32px;
}

.nav-menu {
    display: flex;
    gap: 2rem;
}

.nav-link {
    font-weight: 500;
    color: var(--text-color);
    font-size: 0.925rem;
}

.nav-link:hover,
.nav-link.active {
    color: var(--primary-color);
}

.nav-actions {
    display: flex;
    align-items: center;
    gap: 1rem;
}

/* =========================================
   HERO SECTION
   ========================================= */
.hero {
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('../img/gunung.jpeg');
    /* Ensure you have an image or fallback */
    background-size: cover;
    background-position: center;
    color: var(--white);
    padding: 8rem 0 6rem;
    text-align: center;
    margin-bottom: 3rem;
    border-radius: 0 0 2rem 2rem;
    /* Modern touch */
}

.hero h1 {
    color: var(--white);
    font-size: 3rem;
    margin-bottom: 1rem;
}

.hero p {
    font-size: 1.125rem;
    max-width: 600px;
    margin: 0 auto 2rem;
    opacity: 0.9;
}

/* =========================================
   CARDS & GRID
   ========================================= */
.grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
    gap: 2rem;
}

.card {
    background: var(--white);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
    transition: var(--transition);
    border: 1px solid var(--border-color);
}

.card:hover {
    transform: translateY(-4px);
    box-shadow: var(--shadow-lg);
}

.card-img {
    height: 200px;
    overflow: hidden;
    background-color: #f3f4f6;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card-img img {
    height: 100%;
    width: 100%;
    object-fit: cover;
}

.card-body {
    padding: 1.25rem;
}

.card-title {
    font-size: 1.1rem;
    margin-bottom: 0.5rem;
}

.card-price {
    font-weight: 600;
    color: var(--primary-color);
    font-size: 1.1rem;
    margin-bottom: 1rem;
}

.badge {
    padding: 0.25rem 0.5rem;
    border-radius: 9999px;
    font-size: 0.75rem;
    font-weight: 600;
}

.badge-success {
    background-color: #d1fae5;
    color: #065f46;
}

.badge-warning {
    background-color: #fef3c7;
    color: #92400e;
}

/* =========================================
   TABLES (Cart, Orders)
   ========================================= */
.table-responsive {
    overflow-x: auto;
}

table {
    width: 100%;
    border-collapse: collapse;
    background: var(--white);
    border-radius: var(--radius);
    overflow: hidden;
    box-shadow: var(--shadow-sm);
}

th,
td {
    padding: 1rem;
    text-align: left;
    border-bottom: 1px solid var(--border-color);
}

th {
    background-color: #f3f4f6;
    font-weight: 600;
    color: var(--text-color);
    font-size: 0.875rem;
    text-transform: uppercase;
    letter-spacing: 0.05em;
}

/* =========================================
   FOOTER
   ========================================= */
footer {
    background-color: var(--secondary-color);
    color: #9ca3af;
    padding: 4rem 0 2rem;
    margin-top: auto;
}

.footer-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 3rem;
    margin-bottom: 3rem;
}

.footer-title {
    color: var(--white);
    margin-bottom: 1.25rem;
    font-size: 1rem;
}

.footer-links li {
    margin-bottom: 0.75rem;
}

.footer-links a:hover {
    color: var(--white);
}

.copyright {
    text-align: center;
    border-top: 1px solid rgba(255, 255, 255, 0.1);
    padding-top: 2rem;
    font-size: 0.875rem;
}

/* =========================================
   AUTH PAGES
   ========================================= */
/* =========================================
   AUTH PAGES
   ========================================= */
.auth-wrapper {
    min-height: 85vh;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 8rem 1.5rem 4rem;
}

.auth-card {
    display: flex;
    background: var(--white);
    border-radius: 1.5rem;
    box-shadow: var(--shadow-lg);
    overflow: hidden;
    max-width: 1000px;
    width: 100%;
    min-height: 550px;
}

.auth-image {
    flex: 1.2;
    background: linear-gradient(rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)), url('../img/gunung.jpeg');
    background-size: cover;
    background-position: center;
    position: relative;
    display: flex;
    align-items: flex-end;
    padding: 3rem;
}

.auth-image-content {
    color: var(--white);
    position: relative;
    z-index: 2;
}

.auth-image-content h3 {
    color: var(--white);
    font-size: 2rem;
    margin-bottom: 1rem;
    text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
}

.auth-image-content p {
    font-size: 1.1rem;
    opacity: 0.9;
    text-shadow: 0 1px 2px rgba(0, 0, 0, 0.3);
}

.auth-form-container {
    flex: 1;
    padding: 3rem;
    display: flex;
    flex-direction: column;
    justify-content: center;
    background-color: var(--white);
}

.auth-header {
    text-align: left;
    margin-bottom: 2rem;
}

.auth-header h2 {
    color: var(--secondary-color);
    font-size: 2rem;
    margin-bottom: 0.5rem;
}

.auth-header p {
    color: var(--text-light);
}

@media (max-width: 768px) {
    .auth-card {
        flex-direction: column;
        max-width: 450px;
    }

    .auth-image {
        display: none;
    }

    .auth-form-container {
        padding: 2rem;
    }
}

/* =========================================
   RESPONSIVE
   ========================================= */
/* =========================================
   RESPONSIVE
   ========================================= */
.mobile-toggle {
    display: none;
    flex-direction: column;
    gap: 5px;
    background: none;
    border: none;
    cursor: pointer;
    padding: 5px;
}

.mobile-toggle .bar {
    width: 25px;
    height: 3px;
    background-color: var(--secondary-color);
    border-radius: 2px;
}

.mobile-actions {
    display: none;
}

@media (max-width: 768px) {
    .nav-actions.desktop-only {
        display: none;
    }

    .mobile-toggle {
        display: flex;
    }

    .nav-menu {
        position: absolute;
        top: 70px;
        left: 0;
        width: 100%;
        background-color: var(--white);
        flex-direction: column;
        padding: 1rem;
        gap: 1rem;
        box-shadow: var(--shadow-md);
        transform: translateY(-150%);
        transition: transform 0.3s ease;
        z-index: 999;
    }

    .nav-menu.active {
        transform: translateY(0);
    }

    .mobile-actions {
        display: flex;
        flex-direction: column;
        gap: 1rem;
        border-top: 1px solid var(--border-color);
        padding-top: 1rem;
        margin-top: 0.5rem;
    }
}

/* =========================================
   PAGE HEADERS (Non-Hero)
   ========================================= */
.page-header {
    background-color: var(--secondary-color);
    color: var(--white);
    padding: 6rem 0 3rem;
    text-align: center;
    margin-bottom: 3rem;
}

.page-header h1 {
    color: var(--white);
    font-size: 2.5rem;
    margin-bottom: 1rem;
}

.page-header p {
    font-size: 1.1rem;
    opacity: 0.8;
    max-width: 600px;
    margin: 0 auto;
}

/* =========================================
   STEPS / FEATURES
   ========================================= */
.steps-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 4rem;
}

.step-card {
    background: var(--white);
    padding: 2rem;
    border-radius: 1rem;
    text-align: center;
    border: 1px solid var(--border-color);
    transition: var(--transition);
    position: relative;
    overflow: hidden;
}

.step-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
    border-color: var(--primary-color);
}

.step-number {
    background: var(--primary-color);
    color: var(--white);
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 700;
    font-size: 1.2rem;
    margin: 0 auto 1.5rem;
}

.step-icon {
    font-size: 3rem;
    margin-bottom: 1.5rem;
    color: var(--secondary-color);
}

.step-card h3 {
    margin-bottom: 1rem;
    font-size: 1.25rem;
}

.step-card p {
    color: var(--text-light);
    font-size: 0.95rem;
}

/* =========================================
   RULES PAGE
   ========================================= */
.rule-item {
    display: flex;
    gap: 1.5rem;
    padding: 1.5rem;
    border-bottom: 1px solid var(--border-color);
}

.rule-item:last-child {
    border-bottom: none;
}

.rule-icon {
    flex-shrink: 0;
    width: 48px;
    height: 48px;
    background-color: #fef2f2;
    color: var(--primary-color);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.rule-content h4 {
    margin-bottom: 0.5rem;
    color: var(--secondary-color);
}

.rule-content p {
    color: var(--text-light);
    font-size: 0.95rem;
}

.agreement-box {
    background-color: #fff1f2;
    border: 1px solid #fecaca;
    color: #9f1239;
    padding: 1.5rem;
    border-radius: var(--radius);
    display: flex;
    gap: 1rem;
    align-items: flex-start;
    margin-top: 2rem;
}

/* =========================================
   INFO PAGE
   ========================================= */
.contact-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 2rem;
    margin-bottom: 3rem;
}

.contact-card {
    background: var(--white);
    padding: 2.5rem 2rem;
    border-radius: 1.5rem;
    text-align: center;
    box-shadow: var(--shadow-sm);
    border: 1px solid var(--border-color);
    transition: var(--transition);
}

.contact-card:hover {
    transform: translateY(-5px);
    box-shadow: var(--shadow-lg);
}

.contact-icon {
    width: 64px;
    height: 64px;
    background: var(--bg-light);
    color: var(--primary-color);
    border-radius: 50%;
    margin: 0 auto 1.5rem;
    display: flex;
    align-items: center;
    justify-content: center;
}

.contact-card h3 {
    margin-bottom: 0.5rem;
}

.service-list {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
    gap: 1.5rem;
}

.service-item {
    display: flex;
    align-items: center;
    gap: 1rem;
    padding: 1rem;
    background: var(--bg-light);
    border-radius: var(--radius);
}

.service-check {
    color: var(--primary-color);
    flex-shrink: 0;
}
                .hero-search {
                    max-width: 500px;
                    margin: 0 auto;
                    display: flex;
                    gap: 10px;
                }
                @media(max-width: 480px) {
                    .hero-search {
                        flex-direction: column;
                    }
                    .hero-search button {
                        width: 100%;
                    }
                }
            </style>
            <form action="{{ route('beranda') }}" method="GET" class="hero-search">
                <input type="text" name="search" class="form-control" placeholder="Cari perlengkapan..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary" style="white-space: nowrap;">Cari</button>
            </form>
        </div>
    </section>

    <div class="container">

        {{-- PRODUK POPULER --}}
        <section class="mb-4">
            <h2 class="text-center mb-4">Produk Populer</h2>

            <div class="grid">
                @foreach($produk as $item)
                    <div class="card">
                        <div class="card-img">
                            {{-- Placeholder image if none provided --}}
                            <img src="{{ $item['gambar'] ?? asset('img/placeholder.jpg') }}" alt="{{ $item['nama'] }}">
                        </div>
                        <div class="card-body text-center">
                            <h3 class="card-title">{{ $item['nama'] }}</h3>
                            <p class="card-price">Rp {{ number_format($item['harga'], 0, ',', '.') }}</p>

                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <input type="hidden" name="nama" value="{{ $item['nama'] }}">
                                <input type="hidden" name="harga" value="{{ $item['harga'] }}">

                                <button type="submit" class="btn btn-primary btn-block">
                                    Tambah ke Keranjang
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- DAFTAR PERALATAN --}}
        <section class="py-5">
            <h2 class="mb-4">Daftar Lengkap Peralatan</h2>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Kondisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peralatan as $item)
                            <tr>
                                <td>{{ $item['no'] }}</td>
                                <td>
                                    <img src="{{ $item['gambar'] }}" alt="{{ $item['nama'] }}"
                                        style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                </td>
                                <td style="font-weight: 500;">{{ $item['nama'] }}</td>
                                <td style="color: var(--primary-color); font-weight: 600;">
                                    Rp {{ number_format($item['harga'], 0, ',', '.') }}
                                </td>
                                <td>
                                    <span class="badge badge-{{ $item['stok_status'] }}">{{ $item['stok_label'] }}
                                        ({{ $item['stok'] }})</span>
                                </td>
                                <td>
                                    <span class="badge badge-warning">{{ $item['kondisi'] }}</span>
                                </td>
                                <td>
                                    @if($item['stok'] > 0)
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                            <input type="hidden" name="nama" value="{{ $item['nama'] }}">
                                            <input type="hidden" name="harga" value="{{ $item['harga'] }}">

                                            <button type="submit" class="btn btn-primary btn-sm">
                                                + Keranjang
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-secondary btn-sm" disabled
                                            style="opacity: 0.6; cursor: not-allowed;">
                                            Habis
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>

    </div>
@endsection