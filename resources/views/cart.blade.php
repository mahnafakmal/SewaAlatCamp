@extends('layouts.app')

@section('content')
    <div class="container py-16 max-w-4xl mx-auto">
        <h2 class="text-3xl font-black text-slate-900 mb-8 flex items-center gap-3">
            <i class="fa-solid fa-cart-shopping text-green-600"></i> Keranjang Belanja
        </h2>

        @if(empty($cart) || count($cart) == 0)
            <div class="card p-16 text-center">
                <div class="w-20 h-20 bg-slate-100 rounded-3xl flex items-center justify-center text-slate-400 mx-auto mb-6">
                    <i class="fa-solid fa-basket-shopping text-4xl"></i>
                </div>
                <p class="text-slate-500 mb-6 text-base">Keranjang belanja Anda masih kosong.</p>
                <a href="{{ route('beranda') }}" class="btn btn-primary px-8">Mulai Belanja</a>
            </div>
        @else
            <div class="table-responsive bg-white rounded-3xl p-2 border border-slate-100 shadow-sm mb-8">
                <table class="w-full">
                    <thead>
                        <tr class="text-left border-b border-slate-100">
                            <th class="p-4">Nama Alat</th>
                            <th class="p-4">Harga / Hari</th>
                            <th class="p-4">Qty</th>
                            <th class="p-4">Subtotal</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($cart as $item)
                            @php
                                $subtotal = $item['harga'] * $item['qty'];
                                $total += $subtotal;
                            @endphp
                            <tr class="border-b border-slate-50 last:border-0 hover:bg-slate-50">
                                <td class="p-4 font-bold text-slate-800">{{ $item['nama'] }}</td>
                                <td class="p-4 text-slate-500">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                <td class="p-4" style="width: 120px;">
                                    <form action="{{ route('cart.update') }}" method="POST">
                                        @csrf
                                        @method('PATCH')
                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                        <input type="number" name="qty" value="{{ $item['qty'] }}" min="1" class="form-control text-center" onchange="this.form.submit()">
                                    </form>
                                </td>
                                <td class="p-4 font-bold text-green-600">Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                                <td class="p-4 text-center">
                                    <form action="{{ route('cart.remove') }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $item['id'] }}">
                                        <button type="submit" class="btn btn-danger btn-sm bg-red-100 hover:bg-red-200 text-red-600 p-2.5 rounded-xl">
                                            <i class="fa fa-trash text-sm"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr class="bg-slate-50 font-bold border-t border-slate-100">
                            <td colspan="3" class="p-5 text-right text-slate-500 text-base">Total Biaya (1 Hari):</td>
                            <td colspan="2" class="p-5 text-green-600 text-2xl font-black">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="flex flex-col sm:flex-row justify-between items-center gap-4">
                <form action="{{ route('cart.clear') }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin mengosongkan keranjang?');" class="w-full sm:w-auto">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-secondary w-full text-red-500 hover:bg-red-50 hover:text-red-600 hover:border-red-200">Kosongkan Keranjang</button>
                </form>
                <a href="{{ route('checkout') }}" class="btn btn-primary w-full sm:w-auto px-10 py-3.5">Lanjut ke Pembayaran <i class="fa-solid fa-arrow-right"></i></a>
            </div>
        @endif
    </div>
@endsection
