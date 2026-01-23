@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Riwayat Pesanan</h2>

        @if($orders->isEmpty())
            <div class="card p-5 text-center">
                <p class="mb-3">Belum ada pesanan.</p>
                <a href="{{ route('beranda') }}" class="btn btn-primary">Mulai Sewa</a>
            </div>
        @else
            <div class="grid" style="grid-template-columns: 1fr; gap: 1.5rem;">
                @foreach($orders as $order)
                    <div class="card p-4">
                        <div
                            style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 1rem; border-bottom: 1px solid #eee; padding-bottom: 0.5rem;">
                            <div>
                                <strong>Order #{{ $order->id }}</strong>
                                <span
                                    style="color: #6b7280; font-size: 0.9rem; margin-left: 10px;">{{ $order->created_at->format('d M Y H:i') }}</span>
                            </div>
                            <div>
                                @if($order->status == 'pending')
                                    <span class="badge badge-warning">Menunggu Konfirmasi</span>
                                @elseif($order->status == 'paid')
                                    <span class="badge badge-info text-white">Sudah Dibayar (Menunggu Barang)</span>
                                @elseif($order->status == 'rented')
                                    <span class="badge badge-primary">Sedang Disewa (Dibawa)</span>
                                @elseif($order->status == 'returned')
                                    <span class="badge badge-success">Dikembalikan (Selesai)</span>
                                @elseif($order->status == 'completed')
                                    <span class="badge badge-success">Selesai</span>
                                @elseif($order->status == 'cancelled')
                                    <span class="badge" style="background: #fee2e2; color: #991b1b;">Dibatalkan</span>
                                @endif
                            </div>
                        </div>

                        <table style="width: 100%; margin-bottom: 1rem;">
                            @foreach($order->items as $item)
                                <tr>
                                    <td style="padding: 5px 0;">
                                        <div>{{ $item->barang->nama_barang ?? 'Item dihapus' }}</div>
                                        @if($order->status == 'completed')
                                            {{-- Review Form Formatted --}}
                                            <form action="{{ route('reviews.store') }}" method="POST"
                                                style="margin-top: 5px; background: #f9fafb; padding: 10px; border-radius: 6px;">
                                                @csrf
                                                <input type="hidden" name="barang_id" value="{{ $item->barang_id }}">
                                                <label style="font-size: 0.8rem; display: block; margin-bottom: 3px;">Beri Ulasan:</label>
                                                <div style="display: flex; gap: 5px; margin-bottom: 5px;">
                                                    <select name="rating"
                                                        style="padding: 2px; border-radius: 4px; border: 1px solid #ccc; font-size: 0.8rem;">
                                                        <option value="5">⭐⭐⭐⭐⭐</option>
                                                        <option value="4">⭐⭐⭐⭐</option>
                                                        <option value="3">⭐⭐⭐</option>
                                                        <option value="2">⭐⭐</option>
                                                        <option value="1">⭐</option>
                                                    </select>
                                                    <input type="text" name="comment" placeholder="Tulis komentar..."
                                                        style="flex: 1; padding: 2px 5px; border-radius: 4px; border: 1px solid #ccc; font-size: 0.8rem;">
                                                    <button type="submit" class="btn btn-primary btn-sm"
                                                        style="padding: 2px 8px; font-size: 0.75rem;">Kirim</button>
                                                </div>
                                            </form>
                                        @endif
                                    </td>
                                    <td style="padding: 5px 0;">x {{ $item->quantity }}</td>
                                    <td style="padding: 5px 0; text-align: right;">Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </td>
                                </tr>
                            @endforeach
                        </table>

                        <div
                            style="display: flex; justify-content: space-between; align-items: center; border-top: 1px solid #eee; padding-top: 1rem;">
                            <span style="font-weight: bold;">Total Bayar</span>
                            <span style="font-weight: bold; color: var(--primary-color);">Rp
                                {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@endsection