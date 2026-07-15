<!DOCTYPE html>
<html lang="id" class="h-full">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'EXplorent') }} - Sewa Alat Outdoor</title>

    <!-- Google Fonts: Plus Jakarta Sans -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- CSS / Vite -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="flex flex-col min-h-screen bg-slate-50 text-slate-800 antialiased font-sans">

    <!-- NAVBAR -->
    <nav class="navbar">
        <div class="container">
            <a href="{{ url('/') }}" class="nav-brand">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
                <span class="text-green-600 font-extrabold text-xl tracking-tight">EXplorent</span>
            </a>

            <button class="mobile-toggle group" aria-label="Toggle navigation">
                <span class="bar group-[.active]:rotate-45 group-[.active]:translate-y-1.5"></span>
                <span class="bar group-[.active]:opacity-0"></span>
                <span class="bar group-[.active]:-rotate-45 group-[.active]:-translate-y-1.5"></span>
            </button>

            <!-- Desktop Menu -->
            <div class="nav-menu">
                <a href="{{ route('beranda') }}"
                    class="nav-link {{ request()->routeIs('beranda*') ? 'active' : '' }}">Beranda</a>
                <a href="{{ route('cara-sewa') }}"
                    class="nav-link {{ request()->routeIs('cara-sewa') ? 'active' : '' }}">Cara Sewa</a>
                <a href="{{ route('peraturan') }}"
                    class="nav-link {{ request()->routeIs('peraturan') ? 'active' : '' }}">Peraturan</a>
                <a href="{{ route('info') }}" class="nav-link {{ request()->routeIs('info') ? 'active' : '' }}">Info</a>
            </div>

            <!-- Desktop Actions -->
            <div class="nav-actions desktop-only">
                @auth
                    <a href="{{ route('orders.index') }}" class="nav-link">Riwayat</a>

                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('edit-stok.index') }}" class="nav-link text-green-600 font-semibold">
                            Stok
                        </a>
                        <a href="{{ route('admin.orders') }}" class="nav-link text-green-600 font-semibold">
                            Pesanan
                        </a>
                    @endif

                    <a href="{{ route('cart.index') }}" class="btn btn-secondary relative p-2.5 min-w-[45px] hover:text-green-600">
                        <i class="fa-solid fa-cart-shopping text-base"></i>
                        @if(session('cart'))
                            <span class="absolute -top-1.5 -right-1.5 bg-green-600 text-white rounded-full text-[10px] w-5 h-5 flex items-center justify-center font-bold border-2 border-white shadow-sm">{{ count(session('cart')) }}</span>
                        @endif
                    </a>

                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="btn btn-primary bg-red-600 hover:bg-red-700 ml-2" title="Logout">
                            <i class="fa-solid fa-right-from-bracket"></i>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="nav-link mr-2">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary">Daftar</a>
                @endauth
            </div>
        </div>

        <!-- Mobile Slide Menu -->
        <div id="mobileMenu" class="hidden md:hidden absolute top-16 left-0 right-0 bg-white border-b border-slate-200 shadow-xl p-6 flex flex-col gap-4 animate-in fade-in slide-in-from-top duration-200">
            <a href="{{ route('beranda') }}"
                class="nav-link text-base {{ request()->routeIs('beranda*') ? 'active' : '' }}">Beranda</a>
            <a href="{{ route('cara-sewa') }}"
                class="nav-link text-base {{ request()->routeIs('cara-sewa') ? 'active' : '' }}">Cara Sewa</a>
            <a href="{{ route('peraturan') }}"
                class="nav-link text-base {{ request()->routeIs('peraturan') ? 'active' : '' }}">Peraturan</a>
            <a href="{{ route('info') }}" class="nav-link text-base {{ request()->routeIs('info') ? 'active' : '' }}">Info</a>

            <div class="border-t border-slate-100 pt-4 flex flex-col gap-3">
                @auth
                    @if(auth()->user()->role === 'admin')
                        <a href="{{ route('edit-stok.index') }}" class="nav-link text-green-600 font-semibold">Stok Barang</a>
                        <a href="{{ route('admin.orders') }}" class="nav-link text-green-600 font-semibold">Pesanan Masuk</a>
                    @endif
                    <a href="{{ route('orders.index') }}" class="nav-link">Riwayat</a>
                    <a href="{{ route('cart.index') }}" class="btn btn-secondary justify-start w-full gap-3">
                        <i class="fa-solid fa-cart-shopping"></i>
                        <span>Keranjang</span>
                        @if(session('cart'))
                            <span class="ml-auto bg-green-600 text-white text-xs px-2.5 py-0.5 rounded-full font-bold">{{ count(session('cart')) }}</span>
                        @endif
                    </a>
                    <form action="{{ route('logout') }}" method="POST" class="w-full">
                        @csrf
                        <button type="submit" class="btn btn-primary bg-red-600 hover:bg-red-700 w-full gap-2">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span>Keluar</span>
                        </button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="btn btn-secondary w-full">Masuk</a>
                    <a href="{{ route('register') }}" class="btn btn-primary w-full">Daftar</a>
                @endauth
            </div>
        </div>
    </nav>

    <script>
        const toggleBtn = document.querySelector('.mobile-toggle');
        const mobileMenu = document.getElementById('mobileMenu');

        toggleBtn.addEventListener('click', function () {
            this.classList.toggle('active');
            mobileMenu.classList.toggle('hidden');
        });
    </script>

    <!-- MAIN CONTENT -->
    <main class="flex-grow pt-20">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-slate-950 text-slate-400 mt-20">
        <div class="container">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 pb-12">
                <div class="space-y-4">
                    <div class="flex items-center gap-2">
                        <img src="{{ asset('img/logo.png') }}" alt="Logo" class="w-8 h-8 object-contain">
                        <span class="text-white font-extrabold text-xl tracking-tight">EXplorent</span>
                    </div>
                    <p class="text-sm leading-relaxed text-slate-400 max-w-sm">
                        Penyedia rental alat camping & hiking terpercaya di Yogyakarta. Membantu Anda mengeksplorasi keindahan alam Indonesia dengan perlengkapan terbaik.
                    </p>
                </div>
                <div>
                    <h3 class="text-white font-bold text-base mb-4 tracking-wider uppercase">Menu Navigasi</h3>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('beranda') }}" class="text-slate-400 text-sm hover:text-green-500 hover:underline transition">Beranda</a></li>
                        <li><a href="{{ route('cara-sewa') }}" class="text-slate-400 text-sm hover:text-green-500 hover:underline transition">Cara Sewa</a></li>
                        <li><a href="{{ route('peraturan') }}" class="text-slate-400 text-sm hover:text-green-500 hover:underline transition">Syarat & Ketentuan</a></li>
                        <li><a href="{{ route('info') }}" class="text-slate-400 text-sm hover:text-green-500 hover:underline transition">Kontak & Lokasi</a></li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-white font-bold text-base mb-4 tracking-wider uppercase">Hubungi Kami</h3>
                    <ul class="space-y-3">
                        <li class="flex items-center gap-3 text-sm">
                            <i class="fa-solid fa-envelope text-green-500 w-5 text-center"></i>
                            <span>support@explorent.com</span>
                        </li>
                        <li class="flex items-center gap-3 text-sm">
                            <i class="fa-solid fa-phone text-green-500 w-5 text-center"></i>
                            <span>0812-3456-7890</span>
                        </li>
                        <li class="flex items-center gap-3 text-sm">
                            <i class="fa-solid fa-location-dot text-green-500 w-5 text-center"></i>
                            <span>Sleman, Yogyakarta</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-slate-900 pt-8 mt-4 text-center flex flex-col md:flex-row justify-between items-center gap-4 text-sm text-slate-500">
                <p>&copy; {{ date('Y') }} EXplorent Outdoor. Kelompok 6.</p>
                <div class="flex gap-4">
                    <a href="#" class="hover:text-green-500 transition"><i class="fa-brands fa-instagram text-lg"></i></a>
                    <a href="#" class="hover:text-green-500 transition"><i class="fa-brands fa-facebook text-lg"></i></a>
                    <a href="#" class="hover:text-green-500 transition"><i class="fa-brands fa-whatsapp text-lg"></i></a>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>
