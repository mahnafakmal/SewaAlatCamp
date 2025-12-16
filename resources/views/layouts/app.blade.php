<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Pandanan Outdoor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Tailwind CDN --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.4.4/dist/tailwind.min.css" rel="stylesheet">

    {{-- CSS INTERNAL --}}
    <style>
        body {
            font-family: 'Inter', sans-serif;
            margin: 0;
        }

        /* NAVBAR */
        .navbar {
            background-color: #e30613;
        }

        .navbar-container {
            max-width: 1200px;
            margin: auto;
            padding: 14px 24px;
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
        }

        .navbar-menu a {
            color: white;
            font-size: 13px;
            text-transform: uppercase;
        }

        .navbar-menu a:hover {
            opacity: 0.8;
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
            font-weight: 600;
            margin-left: 6px;
        }

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

<!-- NAVBAR -->
<header class="navbar">
    <div class="navbar-container">
        <div class="navbar-logo">
            <span>PANDANAN OUTDOOR</span>
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

<!-- CONTENT -->
<main class="max-w-7xl mx-auto p-8">
    <h1 class="text-3xl font-bold mb-4">
        Persewaan Alat Camping & Hiking
    </h1>
    <p class="text-gray-600">
        Menyediakan alat camping, hiking, dan outdoor travelling lengkap dengan harga terjangkau.
    </p>

    <div class="grid md:grid-cols-3 gap-6 mt-8">
        <div class="border p-4 rounded shadow">
            <h3 class="font-bold">Tenda Dome</h3>
            <p class="text-sm text-gray-500">Mulai Rp35.000 / hari</p>
        </div>
        <div class="border p-4 rounded shadow">
            <h3 class="font-bold">Carrier 60L</h3>
            <p class="text-sm text-gray-500">Mulai Rp25.000 / hari</p>
        </div>
        <div class="border p-4 rounded shadow">
            <h3 class="font-bold">Sleeping Bag</h3>
            <p class="text-sm text-gray-500">Mulai Rp10.000 / hari</p>
        </div>
    </div>
</main>

<!-- FOOTER -->
<footer>
    © {{ date('Y') }} Pandanan Outdoor Travelling
</footer>

</body>
</html>
