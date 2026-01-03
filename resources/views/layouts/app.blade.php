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
            position: relative;
        }

        .navbar-brand {
            color: white !important;
        }
        
        .navbar-brand:hover {
            color: #f0f0f0 !important;
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

        .navbar-right {
            display: flex;
            align-items: center;
            gap: 16px;
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

        /* CART ICON */
        .cart-icon {
            position: relative;
            cursor: pointer;
            color: white;
            font-size: 24px;
            transition: opacity 0.3s;
        }

        .cart-icon:hover {
            opacity: 0.8;
        }

        .cart-badge {
            position: absolute;
            top: -8px;
            right: -8px;
            background-color: #fbbf24;
            color: #1f2937;
            border-radius: 50%;
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 11px;
            font-weight: bold;
        }

        /* CART SIDEBAR */
        .cart-sidebar {
            position: fixed;
            top: 0;
            right: -400px;
            width: 400px;
            height: 100vh;
            background: white;
            box-shadow: -2px 0 10px rgba(0,0,0,0.1);
            transition: right 0.3s ease;
            z-index: 1000;
            display: flex;
            flex-direction: column;
        }

        .cart-sidebar.active {
            right: 0;
        }

        .cart-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: rgba(0,0,0,0.5);
            display: none;
            z-index: 999;
        }

        .cart-overlay.active {
            display: block;
        }

        .cart-header {
            padding: 20px;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .cart-header h3 {
            font-size: 1.25rem;
            font-weight: bold;
        }

        .cart-close {
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: #6b7280;
        }

        .cart-close:hover {
            color: #1f2937;
        }

        .cart-items {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
        }

        .cart-item {
            display: flex;
            gap: 12px;
            padding: 12px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            margin-bottom: 12px;
        }

        .cart-item-info {
            flex: 1;
        }

        .cart-item-name {
            font-weight: 600;
            margin-bottom: 4px;
        }

        .cart-item-price {
            color: #dc2626;
            font-weight: 500;
            font-size: 0.875rem;
        }

        .cart-item-qty {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-top: 8px;
        }

        .qty-btn {
            width: 24px;
            height: 24px;
            border: 1px solid #d1d5db;
            background: white;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
        }

        .qty-btn:hover {
            background: #f3f4f6;
        }

        .cart-item-remove {
            background: #fee2e2;
            color: #dc2626;
            border: none;
            padding: 4px 8px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 12px;
        }

        .cart-item-remove:hover {
            background: #fecaca;
        }

        .cart-empty {
            text-align: center;
            padding: 40px 20px;
            color: #6b7280;
        }

        .cart-footer {
            padding: 20px;
            border-top: 1px solid #e5e7eb;
        }

        .cart-total {
            display: flex;
            justify-content: space-between;
            margin-bottom: 16px;
            font-size: 1.125rem;
            font-weight: bold;
        }

        .btn-checkout {
            width: 100%;
            background-color: #dc2626;
            color: white;
            padding: 12px;
            border-radius: 6px;
            border: none;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn-checkout:hover {
            background-color: #b91c1c;
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

            .cart-sidebar {
                width: 100%;
                right: -100%;
            }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
    <div class="navbar-container">
        <div class="navbar-logo">
            <a class="navbar-brand font-weight-bold" href="/">EXplorent</a>
        </div>

        <nav class="navbar-menu">
            <a href="{{ route('beranda') }}">Beranda</a>
            <a href="{{ route('cara-sewa') }}">Cara Sewa</a>
            <a href="{{ route('peraturan') }}">Peraturan Sewa</a>
            <a href="{{ route('info') }}">Info</a>
        </nav>

        <div class="navbar-right">
            <div class="search-box">
                <input type="text" id="searchInput" placeholder="Cari barang..." onkeyup="searchBarang(event)">
                <button onclick="searchBarang()">Cari</button>
            </div>

            <!-- CART ICON -->
            <div class="cart-icon" onclick="toggleCart()">
                🛒
                <span class="cart-badge" id="cartBadge">0</span>
            </div>
        </div>
    </div>
</header>

<!-- CART OVERLAY -->
<div class="cart-overlay" id="cartOverlay" onclick="toggleCart()"></div>

<!-- CART SIDEBAR -->
<div class="cart-sidebar" id="cartSidebar">
    <div class="cart-header">
        <h3>Keranjang Sewa</h3>
        <button class="cart-close" onclick="toggleCart()">×</button>
    </div>

    <div class="cart-items" id="cartItems">
        <div class="cart-empty">
            <p>Keranjang masih kosong</p>
            <p style="font-size: 0.875rem; margin-top: 8px;">Tambahkan barang untuk mulai menyewa</p>
        </div>
    </div>

    <div class="cart-footer">
        <div class="cart-total">
            <span>Total:</span>
            <span id="cartTotal">Rp0</span>
        </div>
        <button class="btn-checkout" onclick="clearCart()" style="background-color: #dc2626; margin-bottom: 8px;">
            Hapus Semua
        </button>
        <button class="btn-checkout" onclick="checkout()">Checkout</button>
    </div>
</div>

@yield('content')

<!-- FOOTER -->
<footer>
    © {{ date('Y') }} EXplorent | Designed by kelompok 6
</footer>

<script>
    // CART FUNCTIONALITY
    let cart = [];

    // Load cart from localStorage on page load
    function loadCart() {
        try {
            const savedCart = localStorage.getItem('explorent_cart');
            if (savedCart) {
                cart = JSON.parse(savedCart);
            }
        } catch (e) {
            console.error('Error loading cart:', e);
            cart = [];
        }
    }

    function toggleCart() {
        const sidebar = document.getElementById('cartSidebar');
        const overlay = document.getElementById('cartOverlay');
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    }

    function addToCart(id, nama, harga) {
        console.log('Adding to cart:', id, nama, harga); // Debug
        
        const existingItem = cart.find(item => item.id === id);
        
        if (existingItem) {
            existingItem.qty += 1;
            console.log('Item exists, quantity increased:', existingItem); // Debug
        } else {
            cart.push({
                id: id,
                nama: nama,
                harga: harga,
                qty: 1
            });
            console.log('New item added'); // Debug
        }
        
        saveCart();
        updateCartUI();
        
        console.log('Current cart:', cart); // Debug
        
        // Show notification
        alert('✅ ' + nama + ' berhasil ditambahkan ke keranjang!');
    }

    function removeFromCart(id) {
        if (confirm('Hapus item ini dari keranjang?')) {
            cart = cart.filter(item => item.id !== id);
            saveCart();
            updateCartUI();
            console.log('Item removed, current cart:', cart); // Debug
        }
    }

    function clearCart() {
        if (confirm('Hapus semua item dari keranjang?')) {
            cart = [];
            saveCart();
            updateCartUI();
            alert('Keranjang telah dikosongkan!');
        }
    }

    function updateQty(id, change) {
        const item = cart.find(item => item.id === id);
        if (item) {
            item.qty += change;
            if (item.qty <= 0) {
                removeFromCart(id);
            } else {
                saveCart();
                updateCartUI();
            }
        }
    }

    function saveCart() {
        try {
            localStorage.setItem('explorent_cart', JSON.stringify(cart));
            console.log('Cart saved:', cart); // Debug
        } catch (e) {
            console.error('Error saving cart:', e);
        }
    }

    function updateCartUI() {
        const cartItems = document.getElementById('cartItems');
        const cartBadge = document.getElementById('cartBadge');
        const cartTotal = document.getElementById('cartTotal');
        
        // Update badge
        const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
        cartBadge.textContent = totalItems;
        
        // Update items
        if (cart.length === 0) {
            cartItems.innerHTML = `
                <div class="cart-empty">
                    <p>Keranjang masih kosong</p>
                    <p style="font-size: 0.875rem; margin-top: 8px;">Tambahkan barang untuk mulai menyewa</p>
                </div>
            `;
        } else {
            cartItems.innerHTML = cart.map(item => `
                <div class="cart-item">
                    <div class="cart-item-info">
                        <div class="cart-item-name">${item.nama}</div>
                        <div class="cart-item-price">${item.harga} / hari</div>
                        <div class="cart-item-qty">
                            <button class="qty-btn" onclick="updateQty(${item.id}, -1)">−</button>
                            <span>${item.qty}</span>
                            <button class="qty-btn" onclick="updateQty(${item.id}, 1)">+</button>
                        </div>
                    </div>
                    <button class="cart-item-remove" onclick="removeFromCart(${item.id})">Hapus</button>
                </div>
            `).join('');
        }
        
        // Update total
        const total = cart.reduce((sum, item) => {
            const price = parseInt(item.harga.replace(/[^0-9]/g, ''));
            return sum + (price * item.qty);
        }, 0);
        
        cartTotal.textContent = 'Rp' + total.toLocaleString('id-ID');
    }

    function checkout() {
        if (cart.length === 0) {
            alert('Keranjang masih kosong!');
            return;
        }
        
        const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
        const total = cart.reduce((sum, item) => {
            const price = parseInt(item.harga.replace(/[^0-9]/g, ''));
            return sum + (price * item.qty);
        }, 0);
        
        alert('Fitur checkout akan segera hadir!\n\nTotal item: ' + totalItems + '\nTotal harga: Rp' + total.toLocaleString('id-ID'));
    }

    // SEARCH FUNCTIONALITY
    function searchBarang(event) {
        // Jika tekan Enter
        if (event && event.key !== 'Enter') {
            return;
        }

        const searchInput = document.getElementById('searchInput');
        const searchTerm = searchInput.value.toLowerCase().trim();
        
        if (searchTerm === '') {
            // Reset semua card dan row jika search kosong
            document.querySelectorAll('.produk-card').forEach(card => {
                card.style.display = 'block';
            });
            document.querySelectorAll('table tbody tr').forEach(row => {
                row.style.display = 'table-row';
            });
            return;
        }

        // Search di produk cards
        let foundInCards = 0;
        document.querySelectorAll('.produk-card').forEach(card => {
            const cardText = card.textContent.toLowerCase();
            if (cardText.includes(searchTerm)) {
                card.style.display = 'block';
                foundInCards++;
            } else {
                card.style.display = 'none';
            }
        });

        // Search di table
        let foundInTable = 0;
        document.querySelectorAll('table tbody tr').forEach(row => {
            const rowText = row.textContent.toLowerCase();
            if (rowText.includes(searchTerm)) {
                row.style.display = 'table-row';
                foundInTable++;
            } else {
                row.style.display = 'none';
            }
        });

        // Show notification
        const totalFound = foundInCards + foundInTable;
        if (totalFound === 0) {
            alert('Tidak ada barang yang ditemukan dengan kata kunci: "' + searchTerm + '"');
        } else {
            console.log('Ditemukan ' + totalFound + ' barang');
        }
    }

    // Initialize cart on page load
    document.addEventListener('DOMContentLoaded', function() {
        loadCart();
        updateCartUI();
        console.log('Cart initialized:', cart); // Debug
    });
</script>

</body>
</html>