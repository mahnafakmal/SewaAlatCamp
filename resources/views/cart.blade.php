@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="mb-4">Keranjang Belanja</h2>

        @if(empty($cart) || count($cart) == 0)
            <div class="text-center py-5">
                <p class="mb-4">Keranjang masih kosong.</p>
                <a href="{{ route('beranda') }}" class="btn btn-primary">Mulai Belanja</a>
            </div>
        @else
            <div class="table-responsive mb-4">
                <table>
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($cart as $item)
                            @php $subtotal = $item['harga'] * $item['qty'];
                            $total += $subtotal; @endphp
                            <tr>
                                <td>{{ $item['nama'] }}</td>
                                <td>Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                <td>{{ $item['qty'] }}</td>
                                <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                            </tr>
                        @endforeach
                        <tr style="background-color: #f9fafb; font-weight: bold;">
                            <td colspan="3" style="text-align: right;">Total</td>
                            <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div style="text-align: right;">
                <a href="{{ route('checkout') }}" class="btn btn-primary">Lanjut ke Pembayaran</a>
            </div>
        @endif
    </div>
@endsection