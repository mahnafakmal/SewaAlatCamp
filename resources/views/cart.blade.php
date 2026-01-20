@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Keranjang Belanja</h2>

    @if(empty($cart))
        <p>Keranjang masih kosong.</p>
    @else
        <table border="1" cellpadding="10">
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>

            @foreach($cart as $item)
            <tr>
                <td>{{ $item['nama'] }}</td>
                <td>{{ $item['harga'] }}</td>
                <td>{{ $item['qty'] }}</td>
                <td>{{ $item['harga'] * $item['qty'] }}</td>
            </tr>
            @endforeach
        </table>
    @endif
</div>
@endsection
