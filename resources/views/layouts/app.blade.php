<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'EXplorent') }} - Sewa Alat Outdoor</title>

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Icons if needed (e.g. phosphors or fontawesome) - for now using text -->
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ url('/') }}" class="nav-brand">
                <span style="color: var(--primary-color)">EX</span>plorent
            </a>

            <button class="mobile-toggle" aria-label="Toggle navigation">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </button>

            <div class="nav-menu">
                <a href="{{ route('beranda') }}"
                    class="nav-link {{ request()->routeIs('beranda*') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('cara-sewa') }}"
                    class="nav-link {{ request()->routeIs('cara-sewa') ? 'active' : '' }}">Cara Sewa</a>
                <a href="{{ route('peraturan') }}"
                    class="nav-link {{ request()->routeIs('peraturan') ? 'active' : '' }}">Peraturan</a>
                <a href="{{ route('info') }}" class="nav-link {{ request()->routeIs('info') ? 'active' : '' }}">Info</a>

                {{-- Move Actions to Menu on Mobile --}}
                <div class="mobile-actions">
                    @auth
                        <a href="{{ route('orders.index') }}" class="nav-link">Riwayat</a>
                        <a href="{{ route('cart.index') }}" class="nav-link">Keranjang @if(session('cart'))
                        ({{ count(session('cart')) }}) @endif</a>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link"
                                style="background:none; border:none; padding:0; cursor:pointer;">Logout</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="nav-link">Masuk</a>
                        <a href="{{ route('register') }}" class="nav-link">Daftar</a>
                    @endauth
                </div>
            </div>

            <div class="nav-actions desktop-only">
                @auth
                    <a href="{{ route('orders.index') }}" class="nav-link">Riwayat</a>
                    <a href="{{ route('cart.index') }}" class="btn btn-secondary" style="padding: 0.4rem 0.8rem;">
                        Keranjang
                        @if(session('cart'))
                            <span class="badge badge-success" style="margin-left:5px">{{ count(session('cart')) }}</span>
                        @endif
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-primary" style="margin-left: 10px;">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <script>
        document.querySelector('.mobile-toggle').addEventListener('click', function () {
            document.querySelector('.nav-menu').classList.toggle('active');
        });
    </script>

    <!-- MAIN CONTENT -->
    <main style="min-height: 80vh; padding-top: 80px;">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div>
                    <h3 class="footer-title">EXplorent</h3>
                    <p>Platform penyewaan alat outdoor terpercaya untuk petualanganmu. Mudah, Murah, Lengkap.</p>
                </div>
                <div>
                    <h3 class="footer-title">Navigasi</h3>
                    <ul class="footer-links">
                        <li><a href="{{ route('beranda') }}">Beranda</a></li>
                        <li><a href="{{ route('cara-sewa') }}">Cara Sewa</a></li>
                        <li><a href="{{ route('peraturan') }}">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="footer-title">Kontak</h3>
                    <ul class="footer-links">
                        <li>Email: support@explorent.com</li>
                        <li>WA: 0812-3456-7890</li>
                        <li>Lokasi: Yogyakarta</li>
                    </ul>
                </div>
            </div>
            <div class="copyright">
                &copy; {{ date('Y') }} EXplorent Outdoor. All rights reserved.
            </div>
        </div>
    </footer>

</body>

</html>