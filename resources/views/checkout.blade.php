@extends('layouts.app')

@section('content')
    <div class="container py-16 max-w-6xl mx-auto">
        <h2 class="text-3xl font-black text-slate-900 mb-8 flex items-center gap-3">
            <i class="fa-solid fa-square-check text-green-600"></i> Checkout Pesanan
        </h2>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 items-start">
            {{-- FORM CHECKOUT --}}
            <div class="lg:col-span-2">
                <div class="card p-8 bg-white border border-slate-100 shadow-sm">
                    <form action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <h3 class="text-xl font-bold text-slate-800 mb-6 pb-3 border-b border-slate-100">Informasi Penyewa</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Nama Lengkap</label>
                                <input type="text" name="name" class="form-control" value="{{ auth()->user()->name }}" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Nomor Telepon / WA</label>
                                <input type="text" name="phone" class="form-control" value="{{ auth()->user()->phone ?? '' }}"
                                    required placeholder="Contoh: 0812345678">
                            </div>
                        </div>

                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-semibold text-slate-700">Alamat Lengkap</label>
                            <textarea name="address" class="form-control" rows="3" required
                                placeholder="Tulis alamat lengkap penjemputan/jaminan...">{{ auth()->user()->address ?? '' }}</textarea>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Tanggal Sewa</label>
                                <input type="date" name="rental_date" class="form-control" required min="{{ date('Y-m-d') }}">
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Jam Pengambilan</label>
                                <input type="time" name="pickup_time" class="form-control" required>
                            </div>
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Durasi Sewa (Hari)</label>
                                <input type="number" name="duration" id="duration" class="form-control" min="1" value="1" required onchange="updateTotal()" onkeyup="updateTotal()">
                            </div>
                        </div>

                        <h3 class="text-xl font-bold text-slate-800 mb-6 mt-10 pb-3 border-b border-slate-100">Pembayaran</h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                            <div>
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Metode Pembayaran</label>
                                <select name="payment_method" id="payment_method" class="form-control" onchange="toggleProof()">
                                    <option value="transfer">Transfer Bank (BCA - 12345678)</option>
                                    <option value="cod">Bayar di Tempat (COD)</option>
                                </select>
                            </div>
                            <div id="proof_container">
                                <label class="block mb-2 text-sm font-semibold text-slate-700">Bukti Transfer (Screenshot)</label>
                                <input type="file" name="payment_proof" class="form-control" accept="image/*">
                                <small class="text-slate-400 d-block mt-2">Upload bukti pembayaran jika memilih Transfer Bank.</small>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary w-full py-4 text-base mt-6">Buat Pesanan Sekarang</button>
                    </form>

                    <script>
                        @php
                            $baseTotal = array_reduce($cart, function ($carry, $item) {
                                return $carry + ($item['harga'] * $item['qty']);
                            }, 0);
                        @endphp
                        const baseTotal = {{ $baseTotal }};

                        function updateTotal() {
                            const duration = parseInt(document.getElementById('duration').value) || 1;
                            const total = baseTotal * duration;
                            document.getElementById('total_display').innerText = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
                        }

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
                <div class="card p-8 bg-slate-900 text-white border-0 shadow-lg sticky top-24">
                    <h3 class="text-xl font-bold mb-6 pb-3 border-b border-slate-800">Ringkasan Pesanan</h3>

                    <div class="space-y-4 mb-8">
                        @foreach($cart as $item)
                            <div class="flex justify-between items-start gap-4">
                                <div class="flex-grow">
                                    <h4 class="font-bold text-sm text-slate-200">{{ $item['nama'] }}</h4>
                                    <div class="flex items-center gap-3 mt-1.5">
                                        <form action="{{ route('cart.update') }}" method="POST" class="inline-flex items-center">
                                            @csrf
                                            @method('PATCH')
                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                            <input type="number" name="qty" value="{{ $item['qty'] }}" min="1"
                                                class="w-12 text-center bg-slate-800 text-white border border-slate-700 rounded-lg text-xs py-1" onchange="this.form.submit()">
                                        </form>
                                        <span class="text-xs text-slate-400">x Rp {{ number_format($item['harga'], 0, ',', '.') }}</span>
                                    </div>
                                </div>
                                <span class="font-bold text-sm text-green-400 flex-shrink-0">Rp {{ number_format($item['harga'] * $item['qty'], 0, ',', '.') }}</span>
                            </div>
                        @endforeach
                    </div>

                    <div class="border-t border-slate-850 pt-6 flex justify-between items-end">
                        <div>
                            <span class="text-xs text-slate-400 block mb-1">Total Biaya (Sewa / Hari)</span>
                            <span class="text-xl font-black text-green-400" id="total_display">
                                Rp {{ number_format(array_reduce($cart, function ($carry, $item) {
                                    return $carry + ($item['harga'] * $item['qty']);
                                }, 0), 0, ',', '.') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
