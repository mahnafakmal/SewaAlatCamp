@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Checkout</h2>

        <div class="grid" style="grid-template-columns: 2fr 1fr;">
            {{-- FORM CHECKOUT --}}
            <div>
                <div class="card p-4">
                    <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h3 class="mb-4">Informasi Penyewa</h3>

                        <div class="mb-4">
                            <label class="block mb-2">Nama Lengkap</label>
                            <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2">Nomor Telepon / WA</label>
                            <input type="text" name="phone" class="form-control" value="{{ auth()->user()->phone ?? '' }}"
                                required placeholder="0812...">
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2">Alamat Lengkap</label>
                            <textarea name="address" class="form-control" rows="3" required
                                placeholder="Alamat lengkap...">{{ auth()->user()->address ?? '' }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="block mb-2">Metode Pembayaran</label>
                            <select name="payment_method" id="payment_method" class="form-control" onchange="toggleProof()">
                                <option value="transfer">Transfer Bank (BCA - 12345678)</option>
                                <option value="cod">Bayar di Tempat (COD)</option>
                            </select>
                        </div>

                        <div class="mb-4" id="proof_container">
                            <label class="block mb-2">Bukti Transfer (Screenshot)</label>
                            <input type="file" name="payment_proof" class="form-control" accept="image/*">
                            <small class="text-muted">Silakan upload bukti transfer jika memilih metode Transfer Bank.</small>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Buat Pesanan</button>
                    </form>

                    <script>
                        function toggleProof() {
                            var method = document.getElementById('payment_method').value;
                            var container = document.getElementById('proof_container');
                            if (method === 'transfer') {
                                container.style.display = 'block';
                            } else {
                                container.style.display = 'none';
                            }
                        }
                        // Init
                        toggleProof();
                    </script>
                </div>
            </div>

            {{-- RINGKASAN PESANAN --}}
            <div>
                <div class="card p-4">
                    <h3 class="mb-4">Ringkasan Pesanan</h3>

                    <table class="w-100 mb-4" style="width: 100%; font-size: 0.9rem;">
                        @foreach($cart as $item)
                            <tr>
                                <td style="padding: 5px 0;">{{ $item['nama'] }} x {{ $item['qty'] }}</td>
                                <td style="text-align: right;">Rp
                                    {{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr style="border-top: 1px solid #eee;">
                            <td style="padding-top: 10px; font-weight: bold;">Total</td>
                            <td
                                style="padding-top: 10px; text-align: right; font-weight: bold; color: var(--primary-color);">
                                Rp
                                {{ number_format(array_reduce($cart, function ($carry, $item) {
        return $carry + ($item['harga'] * $item['qty']); }, 0), 0, ',', '.') }}
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection