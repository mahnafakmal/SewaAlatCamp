@extends('layouts.app')

@section('content')
    <div class="container py-16">
        <h2 class="text-3xl font-black text-slate-900 mb-8 flex items-center gap-3">
            <i class="fa-solid fa-clock-rotate-left text-green-600"></i> Riwayat Pesanan
        </h2>

        @if($orders->isEmpty())
            <div class="card p-16 text-center shadow-sm border border-slate-100">
                <div class="w-20 h-20 bg-slate-100 rounded-3xl flex items-center justify-center mx-auto mb-5">
                    <i class="fa-solid fa-box-open text-3xl text-slate-400"></i>
                </div>
                <p class="text-slate-500 mb-6">Belum ada pesanan. Yuk sewa alat hiking-mu sekarang!</p>
                <a href="{{ route('beranda') }}" class="btn btn-primary px-8">Mulai Sewa</a>
            </div>
        @else
            <div class="space-y-6">
                @foreach($orders as $order)
                    <div class="card p-6 sm:p-8 border border-slate-100 bg-white shadow-sm hover:shadow-md transition-shadow">
                        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-6 border-b border-slate-100 pb-4">
                            <div>
                                <h3 class="text-lg font-bold text-slate-800">
                                    Order <span class="text-green-600">#{{ $order->id }}</span>
                                </h3>
                                <span class="text-sm text-slate-500">{{ \Carbon\Carbon::parse($order->created_at)->format('d M Y H:i') }}</span>
                            </div>
                            <div>
                                @php
                                    $badgeClass = '';
                                    $label = $order->status;
                                    switch ($order->status) {
                                        case 'pending': $badgeClass = 'badge-warning'; $label = 'Menunggu Konfirmasi'; break;
                                        case 'paid': $badgeClass = 'badge-info'; $label = 'Sudah Dibayar'; break;
                                        case 'rented': $badgeClass = 'badge-primary'; $label = 'Sedang Disewa'; break;
                                        case 'returned': $badgeClass = 'badge-success'; $label = 'Dikembalikan (Selesai)'; break;
                                        case 'completed': $badgeClass = 'badge-success'; $label = 'Selesai'; break;
                                        case 'cancelled': $badgeClass = 'badge-danger'; $label = 'Dibatalkan'; break;
                                        default: $badgeClass = 'badge-secondary'; break;
                                    }
                                @endphp
                                <span class="badge {{ $badgeClass }} text-sm">{{ $label }}</span>
                            </div>
                        </div>

                        <div class="space-y-2">
                            @foreach($order->items as $item)
                                <div class="flex justify-between items-center text-sm">
                                    <span class="text-slate-700 font-medium">
                                        {{ $item->barang->nama_barang ?? 'Item dihapus' }}
                                        <span class="text-slate-400 font-normal">x {{ $item->quantity }}</span>
                                    </span>
                                    <span class="font-semibold text-slate-800">Rp {{ number_format($item->price, 0, ',', '.') }}</span>
                                </div>
                            @endforeach
                        </div>

                        <div class="flex justify-between items-center border-t border-slate-100 pt-4 mt-4">
                            <span class="font-bold text-slate-700">Total Bayar</span>
                            <span class="font-black text-xl text-green-600">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>

                        @if($order->status == 'completed')
                            <div class="mt-6 pt-4 border-t border-slate-100">
                                <form action="{{ route('reviews.store') }}" method="POST" class="bg-slate-50 rounded-2xl p-5">
                                    @csrf
                                    <input type="hidden" name="barang_id" value="{{ $item->barang_id }}">
                                    <label class="block text-sm font-bold text-slate-700 mb-2">Beri Ulasan:</label>
                                    <div class="flex flex-col sm:flex-row gap-3">
                                        <select name="rating" class="form-control sm:w-auto">
                                            <option value="5">⭐⭐⭐⭐⭐</option>
                                            <option value="4">⭐⭐⭐⭐</option>
                                            <option value="3">⭐⭐⭐</option>
                                            <option value="2">⭐⭐</option>
                                            <option value="1">⭐</option>
                                        </select>
                                        <input type="text" name="comment" placeholder="Ketik komentar..." class="form-control flex-grow">
                                        <button type="submit" class="btn btn-primary btn-sm whitespace-nowrap">Kirim</button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection
