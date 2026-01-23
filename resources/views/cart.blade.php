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
                            <th>Aksi</th>
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
                                <td style="width: 100px;">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                        <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" class="form-control text-center" onchange="this.form.submit()">
                                    </form>
                                </td>
                                <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                <td>
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                        <button type="submit" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr style="background-color: #f9fafb; font-weight: bold;">
                            <td colspan="4" style="text-align: right;">Total</td>
                            <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <style>
                .cart-actions {
                    display: flex; 
                    justify-content: space-between; 
                    align-items: center;
                }
                @media (max-width: 600px) {
                    .cart-actions {
                        flex-direction: column;
                        gap: 1rem;
                    }
                    .cart-actions form, .cart-actions a {
                        width: 100%;
                    }
                    .cart-actions .btn {
                        width: 100%;
                        display: block;
                        text-align: center;
                    }
                }
            </style>
            <div class="cart-actions">
                <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengosongkan keranjang?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-outline">Kosongkan Keranjang</button>
                </form>
                <a href="{{ route('checkout') }}" class="btn btn-primary">Lanjut ke Pembayaran</a>
            </div>
        @endif
    </div>
@endsection