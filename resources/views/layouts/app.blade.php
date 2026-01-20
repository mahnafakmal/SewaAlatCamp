<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>EXplorent Outdoor</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <body>

    {{-- NAVBAR --}}

    <div class="container-fluid">
        <div class="row">

            {{-- CONTENT --}}
            <div class="col-md-9">
                @yield('content')
            </div>

            {{-- KERANJANG --}}
            <div class="col-md-3">
                {{-- kode keranjang --}}
            </div>

        </div>
    </div>

</body>


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
            padding: 16px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            margin-bottom: 12px;
            background: white;
        }

        .cart-item-info {
            flex: 1;
        }

        .cart-item-name {
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 1rem;
            color: #1f2937;
        }

        .cart-item-price {
            color: #dc2626;
            font-weight: 600;
            font-size: 0.875rem;
            margin-bottom: 12px;
        }

        .cart-item-controls {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 12px;
        }

        .cart-item-qty {
            display: flex;
            align-items: center;
            gap: 12px;
            background: #f9fafb;
            padding: 6px 12px;
            border-radius: 6px;
            border: 1px solid #e5e7eb;
        }

        .qty-btn {
            width: 28px;
            height: 28px;
            border: 1px solid #d1d5db;
            background: white;
            border-radius: 4px;
            cursor: pointer;
            font-weight: bold;
            font-size: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .qty-btn:hover {
            background: #e5e7eb;
            border-color: #9ca3af;
        }

        .qty-btn:active {
            transform: scale(0.95);
        }

        .qty-number {
            min-width: 30px;
            text-align: center;
            font-weight: 600;
            color: #1f2937;
        }

        .cart-item-remove {
            background: #fee2e2;
            color: #dc2626;
            border: none;
            padding: 6px 12px;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 500;
            transition: all 0.2s;
        }

        .cart-item-remove:hover {
            background: #fecaca;
        }

        .cart-item-remove:active {
            transform: scale(0.95);
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

            .modal-content {
                width: 95%;
                padding: 24px;
            }
        }

        /* CUSTOM MODAL */
        .custom-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 2000;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(4px);
        }

        .custom-modal.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 16px;
            padding: 32px;
            max-width: 450px;
            width: 90%;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: modalSlideIn 0.3s ease-out;
        }

        @keyframes modalSlideIn {
            from {
                transform: translateY(-50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }

        .modal-header {
            text-align: center;
            margin-bottom: 24px;
        }

        .modal-icon {
            font-size: 64px;
            margin-bottom: 16px;
        }

        .modal-title {
            font-size: 1.5rem;
            font-weight: bold;
            color: #1f2937;
            margin-bottom: 8px;
        }

        .modal-subtitle {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .modal-body {
            background: #f9fafb;
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 24px;
        }

        .modal-info-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 0;
            border-bottom: 1px solid #e5e7eb;
        }

        .modal-info-row:last-child {
            border-bottom: none;
            font-size: 1.25rem;
            font-weight: bold;
            color: #dc2626;
            padding-top: 16px;
        }

        .modal-info-label {
            color: #6b7280;
            font-size: 0.95rem;
        }

        .modal-info-value {
            font-weight: 600;
            color: #1f2937;
        }

        .modal-footer {
            display: flex;
            gap: 12px;
        }

        .modal-btn {
            flex: 1;
            padding: 12px 24px;
            border-radius: 8px;
            border: none;
            font-weight: 600;
            font-size: 1rem;
            cursor: pointer;
            transition: all 0.3s;
        }

        .modal-btn-primary {
            background: linear-gradient(135deg, #dc2626 0%, #b91c1c 100%);
            color: white;
        }

        .modal-btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(220, 38, 38, 0.4);
        }

        .modal-btn-secondary {
            background: #f3f4f6;
            color: #4b5563;
        }

        .modal-btn-secondary:hover {
            background: #e5e7eb;
        }

        /* NOTIFICATION TOAST */
        .notification-toast {
            position: fixed;
            top: 80px;
            right: 24px;
            background: white;
            padding: 16px 24px;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            gap: 12px;
            z-index: 3000;
            animation: slideInRight 0.3s ease-out;
            max-width: 400px;
        }

        @keyframes slideInRight {
            from {
                transform: translateX(400px);
                opacity: 0;
            }
            to {
                transform: translateX(0);
                opacity: 1;
            }
        }

        .notification-toast.success {
            border-left: 4px solid #10b981;
        }

        .notification-toast.error {
            border-left: 4px solid #ef4444;
        }

        .notification-toast.info {
            border-left: 4px solid #3b82f6;
        }

        .notification-icon {
            font-size: 24px;
            flex-shrink: 0;
        }

        .notification-message {
            flex: 1;
            font-weight: 500;
            color: #1f2937;
        }

        .notification-close {
            background: none;
            border: none;
            font-size: 20px;
            color: #9ca3af;
            cursor: pointer;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .notification-close:hover {
            color: #4b5563;
        }

        .logo-image {
        width: 70px;
        height: 65px;
        object-fit: contain;
      }

    </style>
</head>
<body>

<!-- NAVBAR -->
<header class="navbar">
    <div class="navbar-container">
        <div class="navbar-logo">
             <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Hori Club Logo" class="logo-image">
            </a>
                
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

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="/">Aplikasi</a>

                <ul class="navbar-nav ms-auto">
                    @auth
                        <li class="nav-item">
                            <form action="/logout" method="POST">
                                @csrf
                                <button class="btn btn-danger btn-sm">Logout</button>
                            </form>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </nav>

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

<!-- CHECKOUT MODAL -->
<div class="custom-modal" id="checkoutModal">
    <div class="modal-content">
        <div class="modal-header">
            <div class="modal-icon">🎉</div>
            <h2 class="modal-title">Konfirmasi Checkout</h2>
            <p class="modal-subtitle">Fitur checkout akan segera hadir!</p>
        </div>
        
        <div class="modal-body">
            <div class="modal-info-row">
                <span class="modal-info-label">Total Item</span>
                <span class="modal-info-value" id="modalTotalItems">0</span>
            </div>
            <div class="modal-info-row">
                <span class="modal-info-label">Total Harga</span>
                <span class="modal-info-value" id="modalTotalPrice">Rp0</span>
            </div>
        </div>

        <div class="modal-footer">
            <button class="modal-btn modal-btn-secondary" onclick="closeCheckoutModal()">Batal</button>
            <button class="modal-btn modal-btn-primary" onclick="confirmCheckout()">OK</button>
        </div>
    </div>
</div>

<!-- FOOTER -->
<footer>
    © {{ date('Y') }} EXplorent | Designed by kelompok 6
</footer>

<script>
    // CART FUNCTIONALITY
    let cart = [];

    // Load cart from memory (not localStorage)
    function loadCart() {
        // Cart is already initialized as empty array
        console.log('Cart initialized');
    }

    function toggleCart() {
        const sidebar = document.getElementById('cartSidebar');
        const overlay = document.getElementById('cartOverlay');
        sidebar.classList.toggle('active');
        overlay.classList.toggle('active');
    }

    function addToCart(id, nama, harga) {
        console.log('Adding to cart:', id, nama, harga);
        
        const existingItem = cart.find(item => item.id === id);
        
        if (existingItem) {
            existingItem.qty += 1;
            console.log('Item exists, quantity increased:', existingItem);
        } else {
            cart.push({
                id: id,
                nama: nama,
                harga: harga,
                qty: 1
            });
            console.log('New item added');
        }
        
        updateCartUI();
        console.log('Current cart:', cart);
        
        // Show notification
        showNotification(nama + ' berhasil ditambahkan ke keranjang!', 'success');
    }

    function removeFromCart(id) {
        const item = cart.find(item => item.id === id);
        if (item) {
            cart = cart.filter(item => item.id !== id);
            updateCartUI();
            showNotification('Item berhasil dihapus dari keranjang', 'info');
            console.log('Item removed, current cart:', cart);
        }
    }

    function clearCart() {
        if (cart.length === 0) {
            showNotification('Keranjang sudah kosong!', 'info');
            return;
        }
        
        cart = [];
        updateCartUI();
        showNotification('Keranjang telah dikosongkan!', 'success');
    }

    function updateQty(id, change) {
        const item = cart.find(item => item.id === id);
        if (item) {
            const newQty = item.qty + change;
            
            // Jika quantity menjadi 0 atau kurang, hapus item
            if (newQty <= 0) {
                removeFromCart(id);
            } else {
                item.qty = newQty;
                updateCartUI();
                
                // Notifikasi jika menambah
                if (change > 0) {
                    showNotification('Jumlah item bertambah', 'success');
                } else {
                    showNotification('Jumlah item berkurang', 'info');
                }
            }
            
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
                        <div class="cart-item-controls">
                            <div class="cart-item-qty">
                                <button class="qty-btn" onclick="updateQty(${item.id}, -1)" title="Kurangi">−</button>
                                <span class="qty-number">${item.qty}</span>
                                <button class="qty-btn" onclick="updateQty(${item.id}, 1)" title="Tambah">+</button>
                            </div>
                            <button class="cart-item-remove" onclick="removeFromCart(${item.id})">Hapus</button>
                        </div>
                    </div>
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
            showNotification('Keranjang masih kosong!', 'error');
            return;
        }
        
        const totalItems = cart.reduce((sum, item) => sum + item.qty, 0);
        const total = cart.reduce((sum, item) => {
            const price = parseInt(item.harga.replace(/[^0-9]/g, ''));
            return sum + (price * item.qty);
        }, 0);
        
        showCheckoutModal(totalItems, total);
    }

    // SEARCH FUNCTIONALITY
    function searchBarang(event) {
        if (event && event.key !== 'Enter') {
            return;
        }

        const searchInput = document.getElementById('searchInput');
        const searchTerm = searchInput.value.toLowerCase().trim();
        
        if (searchTerm === '') {
            document.querySelectorAll('.produk-card').forEach(card => {
                card.style.display = 'block';
            });
            document.querySelectorAll('table tbody tr').forEach(row => {
                row.style.display = 'table-row';
            });
            return;
        }

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

        const totalFound = foundInCards + foundInTable;
        if (totalFound === 0) {
            showNotification('Tidak ada barang yang ditemukan dengan kata kunci: "' + searchTerm + '"', 'error');
        } else {
            showNotification('Ditemukan ' + totalFound + ' barang', 'success');
        }
    }

    // Initialize cart on page load
    document.addEventListener('DOMContentLoaded', function() {
        loadCart();
        updateCartUI();
        console.log('Cart initialized:', cart);
    });

    // CUSTOM NOTIFICATION FUNCTION
    function showNotification(message, type = 'info') {
        const icons = {
            success: '✅',
            error: '❌',
            info: 'ℹ️'
        };

        const notification = document.createElement('div');
        notification.className = `notification-toast ${type}`;
        notification.innerHTML = `
            <div class="notification-icon">${icons[type]}</div>
            <div class="notification-message">${message}</div>
            <button class="notification-close" onclick="this.parentElement.remove()">×</button>
        `;

        document.body.appendChild(notification);

        setTimeout(() => {
            notification.style.animation = 'slideInRight 0.3s ease-out reverse';
            setTimeout(() => notification.remove(), 300);
        }, 3000);
    }

    // CHECKOUT MODAL FUNCTIONS
    function showCheckoutModal(totalItems, totalPrice) {
        const modal = document.getElementById('checkoutModal');
        document.getElementById('modalTotalItems').textContent = totalItems;
        document.getElementById('modalTotalPrice').textContent = 'Rp' + totalPrice.toLocaleString('id-ID');
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeCheckoutModal() {
        const modal = document.getElementById('checkoutModal');
        modal.classList.remove('active');
        document.body.style.overflow = 'auto';
    }

    function confirmCheckout() {
        closeCheckoutModal();
        showNotification('Terima kasih! Fitur checkout akan segera tersedia.', 'success');
    }
</script>

</body>
</html>