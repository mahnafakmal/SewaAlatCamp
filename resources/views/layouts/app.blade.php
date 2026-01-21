<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>EXplorent Outdoor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            color: #333;
        }

        /* ================= NAVBAR ================= */
        .navbar {
            background-color: #e30613;
            padding: 14px 24px;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 9999;
        }

        .navbar-container {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .navbar-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        .navbar-menu {
            display: flex;
            gap: 24px;
            list-style: none;
        }

        .navbar-menu a {
            color: white;
            font-size: 13px;
            text-transform: uppercase;
            text-decoration: none;
        }

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .search-box input {
            padding: 6px 12px;
            border-radius: 9999px;
            border: none;
        }

        .search-box button {
            background: white;
            color: #e30613;
            padding: 6px 14px;
            border-radius: 9999px;
            border: none;
            cursor: pointer;
            font-weight: 600;
        }

        .logo-image {
            width: 70px;
            height: 65px;
            object-fit: contain;
        }

        /* ================= CONTENT ================= */
        .page-content {
            margin-top: 100px; /* tinggi navbar */
        }

        /* ================= FOOTER ================= */
        footer {
            background: #111827;
            color: #9ca3af;
            text-align: center;
            padding: 16px;
            font-size: 12px;
            margin-top: 40px;
        }
    </style>
</head>

<body>

<header class="navbar">
    <div class="navbar-container">

        <div class="navbar-logo">
            <a href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" class="logo-image" alt="EXplorent">
            </a>
            <a href="/" style="color:white;text-decoration:none;">EXplorent</a>
        </div>

        <nav class="navbar-menu">
            <a href="{{ route('beranda') }}">Beranda</a>
            <a href="{{ route('cara-sewa') }}">Cara Sewa</a>
            <a href="{{ route('peraturan') }}">Peraturan</a>
            <a href="{{ route('info') }}">Info</a>

            @auth
                <a href="{{ route('logout') }}">Logout</a>
            @else
                <a href="{{ route('login') }}">Login</a>
                <a href="{{ route('register') }}">Register</a>
            @endauth
        </nav>

        <div class="navbar-right">
            <div class="search-box">
                <input type="text" placeholder="Cari barang...">
                <button>Cari</button>
            </div>
        </div>

    </div>
</header>

<div class="page-content">
    @yield('content')
</div>

<footer>
    © {{ date('Y') }} EXplorent | Designed by Kelompok 6
</footer>

</body>
</html>
