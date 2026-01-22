@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Pesanan Masuk</h2>
    </div>

    @if(session('success'))
        <div class="alert alert-success" style="background-color: #d4edda; color: #155724; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card">
        <div class="table-responsive">
            <table class="table" style="width: 100%; border-collapse: collapse;">
                <thead>
                    <tr style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                        <th style="padding: 12px;">ID Pesanan</th>
                        <th style="padding: 12px;">Tanggal</th>
                        <th style="padding: 12px;">Pelanggan</th>
                        <th style="padding: 12px;">Total</th>
                        <th style="padding: 12px;">Status</th>
                        <th style="padding: 12px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr style="border-bottom: 1px solid #dee2e6;">
                            <td style="padding: 12px;">#{{ $order->id }}</td>
                            <td style="padding: 12px;">{{ $order->created_at->format('d M Y H:i') }}</td>
                            <td style="padding: 12px;">
                                <strong>{{ $order->user->name }}</strong><br>
                                <small class="text-muted">{{ $order->user->phone ?? '-' }}</small>
                            </td>
                            <td style="padding: 12px;">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                            <td style="padding: 12px;">
                                @php
                                    $badge = 'secondary';
                                    if ($order->status == 'pending') $badge = 'warning';
                                    elseif ($order->status == 'paid') $badge = 'info';
                                    elseif ($order->status == 'rented') $badge = 'primary';
                                    elseif ($order->status == 'returned') $badge = 'success';
                                    elseif ($order->status == 'cancelled') $badge = 'danger';
                                @endphp
                                <span class="badge badge-{{ $badge }}" style="padding: 5px 10px; border-radius: 4px; color: white; background-color: var(--{{ $badge }}-color, gray);">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td style="padding: 12px;">
                                <form action="{{ route('admin.orders.status', $order->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    <select name="status" onchange="this.form.submit()" style="padding: 5px; border-radius: 4px; border: 1px solid #ced4da;">
                                        <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="paid" {{ $order->status == 'paid' ? 'selected' : '' }}>Dibayar</option>
                                        <option value="rented" {{ $order->status == 'rented' ? 'selected' : '' }}>Disewa</option>
                                        <option value="returned" {{ $order->status == 'returned' ? 'selected' : '' }}>Dikembalikan</option>
                                        <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Batal</option>
                                    </select>
                                </form>
                                <button type="button" class="btn btn-sm btn-info" onclick="toggleDetails({{ $order->id }})" style="margin-left: 5px; font-size: 0.8rem;">Detail</button>
                            </td>
                        </tr>
                        <tr id="details-{{ $order->id }}" style="display: none; background-color: #f8f9fa;">
                            <td colspan="6" style="padding: 15px;">
                                <h5>Detail Barang:</h5>
                                <ul style="list-style: none; padding-left: 0;">
                                    @foreach($order->items as $item)
                                        <li style="display: flex; align-items: center; justify-content: space-between; padding: 10px 0; border-bottom: 1px dashed #ccc;">
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                <img src="{{ $item->barang->image_url }}" alt="{{ $item->barang->nama }}" style="width: 40px; height: 40px; object-fit: cover; border-radius: 4px;">
                                                <div>
                                                    <div style="font-weight: 500;">{{ $item->barang->nama }}</div>
                                                    <small class="text-muted">{{ $item->quantity }} x Rp {{ number_format($item->price, 0, ',', '.') }}</small>
                                                </div>
                                            </div>
                                            <span style="font-weight: 600;">Rp {{ number_format($item->price * $item->quantity, 0, ',', '.') }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                                <div style="margin-top: 10px;">
                                    <strong>Alamat Pengiriman:</strong><br>
                                    {{ $order->user->address ?? 'Tidak ada alamat' }}
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-4">Belum ada pesanan masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function toggleDetails(id) {
        var el = document.getElementById('details-' + id);
        if (el.style.display === 'none') {
            el.style.display = 'table-row';
        } else {
            el.style.display = 'none';
        }
    }
</script>

<style>
    /* Status Colors */
    :root {
        --warning-color: #ffc107;
        --info-color: #17a2b8;
        --primary-color-badge: #007bff;
        --success-color: #28a745;
        --danger-color: #dc3545;
    }
    .badge-warning { background-color: var(--warning-color); color: #212529 !important; }
    .badge-info { background-color: var(--info-color); }
    .badge-primary { background-color: var(--primary-color-badge); }
    .badge-success { background-color: var(--success-color); }
    .badge-danger { background-color: var(--danger-color); }
    
    .table td { vertical-align: middle; }
</style>
@endsection
