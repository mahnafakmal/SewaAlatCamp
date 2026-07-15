@extends('layouts.app')

@section('content')
<div class="container py-16">
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4 mb-8">
        <div>
            <h1 class="text-3xl font-black text-slate-900">Pesanan Masuk</h1>
            <p class="text-slate-500 mt-1">Daftar pesanan baru dan riwayat pesanan.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success flex items-center gap-3 mb-6">
            <i class="fa-solid fa-check-circle text-green-600"></i>
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive bg-white rounded-3xl p-2 border border-slate-100 shadow-sm">
        <table>
            <thead>
                <tr>
                    <th>ID Pesanan</th>
                    <th>Tanggal</th>
                    <th>Pelanggan</th>
                    <th>Total</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                    <tr class="border-b border-slate-50 last:border-0 hover:bg-slate-50">
                        <td class="font-semibold text-slate-800">#{{ $order->id }}</td>
                        <td class="text-slate-500">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y H:i') }}</td>
                        <td>
                            <strong class="text-slate-800">{{ $order->user->name }}</strong><br>
                            <span class="text-sm text-slate-500">{{ $order->user->phone ?? '-' }}</span>
                        </td>
                        <td class="font-bold text-green-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                        <td>
                            @php
                                $badgeClass = '';
                                switch ($order->status) {
                                    case 'pending': $badgeClass = 'badge-warning'; break;
                                    case 'paid': $badgeClass = 'badge-info'; break;
                                    case 'rented': $badgeClass = 'badge-primary'; break;
                                    case 'returned': $badgeClass = 'badge-success'; break;
                                    case 'cancelled': $badgeClass = 'badge-danger'; break;
                                    default: $badgeClass = 'badge-secondary'; break;
                                }
                            @endphp
                            <span class="badge {{ $badgeClass }}">{{ ucfirst($order->status) }}</span>
                        </td>
                        <td class="text-center">
                            <div class="flex items-center gap-2 justify-center">
                                <form action="{{ route('admin.orders.status', $order->id) }}" method="POST">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" class="form-control py-2 text-sm rounded-lg border-slate-300">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Dibayar</option>
                                        <option value="rented" {{ $order->status == 'rented' ? 'selected' : '' }}>Disewa</option>
                                        <option value="returned" {{ $order->status == 'returned' ? 'selected' : '' }}>Dikembalikan</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Batal</option>
                                    </select>
                                </form>
                                <button type="button" class="btn btn-info btn-sm" onclick="toggleDetails({{ $order->id }})">
                                    <i class="fa-solid fa-eye"></i> Detail
                                </button>
                            </div>
                        </td>
                    </tr>
                    <tr id="details-{{ $order->id }}" class="hidden bg-slate-50 border-b border-slate-100">
                        <td colspan="6" class="p-6">
                            <h5 class="text-lg font-bold text-slate-800 mb-4">Detail Barang Pesanan:</h5>
                            <ul class="list-disc pl-5 mb-4 space-y-2">
                                @foreach($order->items as $item)
                                    <li class="flex justify-between items-center text-sm text-slate-700">
                                        <div class="flex items-center gap-3">
                                            @if($item->barang)
                                                <img src="{{ $item->barang->image_url }}" alt="{{ $item->barang->nama }}" class="w-10 h-10 object-cover rounded-md border border-slate-200">
                                                <span>{{ $item->barang->nama }} ({{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }})</span>
                                            @else
                                                <div class="w-10 h-10 bg-slate-100 rounded-md flex items-center justify-center text-xl text-slate-400">?</div>
                                                <span class="italic text-slate-500">Item tidak tersedia ({{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }})</span>
                                            @endif
                                        </div>
                                        <span class="font-bold text-green-600">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                                    </li>
                                @endforeach
                            </ul>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm mb-4">
                                <div>
                                    <h6 class="font-bold text-slate-700 mb-2">Informasi Penyewa:</h6>
                                    <p class="text-slate-600"><strong>Nama:</strong> {{ $order->user->name }}</p>
                                    <p class="text-slate-600"><strong>Telepon:</strong> {{ $order->user->phone ?? '-' }}</p>
                                    <p class="text-slate-600"><strong>Alamat:</strong> {{ $order->user->address ?? 'Tidak ada alamat' }}</p>
                                </div>
                                <div>
                                    <h6 class="font-bold text-slate-700 mb-2">Detail Sewa:</h6>
                                    <p class="text-slate-600"><strong>Tanggal Sewa:</strong> {{ \Carbon\Carbon::parse($order->rental_date)->format('d F Y') }}</p>
                                    <p class="text-slate-600"><strong>Waktu Pengambilan:</strong> {{ \Carbon\Carbon::parse($order->pickup_time)->format('H:i') }} WIB</p>
                                    <p class="text-slate-600"><strong>Durasi:</strong> {{ $order->duration }} Hari</p>
                                </div>
                            </div>

                            <div class="mt-4">
                                <h6 class="font-bold text-slate-700 mb-2">Bukti Pembayaran:</h6>
                                @if($order->payment_proof)
                                    <a href="{{ asset('storage/' . $order->payment_proof) }}" target="_blank" class="block w-48 h-48 overflow-hidden rounded-lg border border-slate-200 hover:shadow-md transition">
                                        <img src="{{ asset('storage/' . $order->payment_proof) }}" alt="Bukti Transfer" class="w-full h-full object-cover">
                                    </a>
                                    <small class="text-slate-400 mt-2 block">Klik gambar untuk memperbesar</small>
                                @else
                                    <span class="text-slate-500 italic text-sm">Tidak ada bukti pembayaran (COD / Belum upload)</span>
                                @endif
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-12 text-slate-400">
                            <i class="fa-solid fa-clipboard-list text-3xl mb-3 block opacity-50"></i>
                            Belum ada pesanan masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <script>
        function toggleDetails(id) {
            var el = document.getElementById('details-' + id);
            if (el.classList.contains('hidden')) {
                el.classList.remove('hidden');
            } else {
                el.classList.add('hidden');
            }
        }
    </script>
</div>
@endsection
