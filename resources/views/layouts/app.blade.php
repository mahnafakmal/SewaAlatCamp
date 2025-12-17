<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>EXplorent Outdoor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- CSS INTERNAL --}}
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            line-height: 1.6;
            color: #333;
        }

        /* NAVBAR */
        .navbar {
            background-color: #e30613;
            padding: 14px 24px;
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
            transition: opacity 0.3s;
        }

        .navbar-menu a:hover {
            opacity: 0.8;
        }

        .search-box {
            display: flex;
            align-items: center;
        }

        .search-box input {
            padding: 6px 12px;
            border-radius: 9999px;
            border: none;
            outline: none;
        }

        .search-box button {
            background: white;
            color: #e30613;
            padding: 6px 14px;
            border-radius: 9999px;
            font-weight: 600;
            margin-left: 6px;
            border: none;
            cursor: pointer;
            transition: opacity 0.3s;
        }

        .search-box button:hover {
            opacity: 0.9;
        }

        /* HERO SECTION */
        .hero-section {
            height: 60vh;
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            background-image: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('{{ asset("img/gunung.jpeg") }}');
            display: flex;
            align-items: center;
            color: white;
        }

        .hero-content {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 24px;
            width: 100%;
        }

        .hero-content h2 {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 16px;
        }

        .hero-content p {
            font-size: 1.1rem;
            color: #e5e7eb;
        }

        /* MAIN CONTENT */
        main {
            max-width: 1280px;
            margin: 0 auto;
            padding: 32px;
        }

        main h2 {
            font-size: 1.875rem;
            font-weight: bold;
            margin-bottom: 32px;
            color: #1f2937;
        }

        /* GRID PRODUK */
        .produk-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 24px;
            margin-bottom: 48px;
        }

        .produk-card {
            border: 1px solid #d1d5db;
            padding: 16px;
            border-radius: 8px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            transition: box-shadow 0.3s;
        }

        .produk-card:hover {
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
        }

        .produk-card h3 {
            font-weight: bold;
            margin-bottom: 8px;
            font-size: 1.1rem;
        }

        .produk-card p {
            font-size: 0.875rem;
            color: #6b7280;
            margin-bottom: 12px;
        }

        .btn-sewa {
            display: inline-block;
            background-color: #dc2626;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            text-decoration: none;
            font-size: 0.875rem;
            font-weight: 500;
            transition: background-color 0.3s;
            border: none;
            cursor: pointer;
        }

        .btn-sewa:hover {
            background-color: #b91c1c;
        }

        /* TABLE STYLING */
        table {
            width: 100%;
            border-collapse: collapse;
            border: 2px solid #d1d5db;
            margin-top: 20px;
        }

        table thead {
            background-color: #dc2626;
            color: white;
        }

        table th {
            padding: 12px;
            text-align: left;
            border: 2px solid #d1d5db;
            font-weight: 600;
        }

        table td {
            padding: 12px;
            border: 2px solid #d1d5db;
        }

        table tbody tr:hover {
            background-color: #f3f4f6;
        }

        .badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 9999px;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .badge-green {
            background-color: #dcfce7;
            color: #166534;
        }

        .badge-blue {
            background-color: #dbeafe;
            color: #1e40af;
        }

        .harga {
            font-weight: 600;
            color: #dc2626;
        }

        /* STEP STYLING */
        .step {
            border-left: 4px solid #e30613;
            padding-left: 16px;
            margin-bottom: 24px;
        }

        .step h3 {
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 1.05rem;
        }

        .step p {
            color: #4b5563;
        }

        /* FOOTER */
        footer {
            background: #111827;
            color: #9ca3af;
            text-align: center;
            padding: 16px;
            font-size: 12px;
            margin-top: 40px;
        }

        /* RESPONSIVE */
        @media (max-width: 768px) {
            .navbar-menu {
                gap: 12px;
                font-size: 11px;
            }

            .hero-content h2 {
                font-size: 1.875rem;
            }

            main {
                padding: 16px;
            }

            main h2 {
                font-size: 1.5rem;
            }

            .search-box {
                display: none;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
    <div class="navbar-container">
        <div class="navbar-logo">
            <span>EXplorent</span>
        </div>

        <nav class="navbar-menu">
            <a href="{{ route('beranda') }}">Beranda</a>
            <a href="{{ route('cara-sewa') }}">Cara Sewa</a>
            <a href="{{ route('peraturan') }}">Peraturan Sewa</a>
            <a href="{{ route('info') }}">Info</a>
        </nav>

        <div class="search-box">
            <input type="text" placeholder="Search...">
            <button>Cari</button>
        </div>
    </div>
</header>

@yield('content')

<!-- FOOTER -->
<footer>
    © {{ date('Y') }} EXplorent | Designed by kelompok 6
</footer>

</body>
</html>