@extends('layouts.app')

@section('content')
    {{-- HERO SECTION --}}
    <section class="hero min-h-[70vh] flex items-center justify-center relative overflow-hidden bg-slate-900">
        <div class="absolute inset-0 z-0">
            <img src="{{ asset('img/gunung.jpeg') }}" alt="Gunung" class="w-full h-full object-cover opacity-60">
        </div>
        <div class="container relative z-10 text-center text-white px-4">
            <h1 class="text-4xl md:text-7xl font-black mb-6 tracking-tight">Eksplorasi Alam <br> <span class="text-green-400">Tanpa Batas</span></h1>
            <p class="text-lg md:text-xl text-slate-200 mb-10 max-w-2xl mx-auto leading-relaxed">
                Menyediakan peralatan camping, hiking, dan outdoor travelling terlengkap dengan kualitas premium dan harga terjangkau.
            </p>

            <form action="{{ route('beranda') }}" method="GET" class="max-w-xl mx-auto flex gap-3 bg-white p-2 rounded-2xl shadow-xl">
                <input type="text" name="search" class="flex-grow px-4 py-3 bg-transparent text-slate-800 outline-none placeholder:text-slate-400" placeholder="Cari perlengkapan (e.g. Tenda)..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary bg-green-600 hover:bg-green-700 px-8 py-3 rounded-xl font-bold">Cari</button>
            </form>
        </div>
    </section>

    <div class="container py-16">
        {{-- PRODUK POPULER --}}
        <section class="mb-20">
            <div class="flex justify-between items-end mb-10">
                <div>
                    <h2 class="text-3xl font-black text-slate-900">Produk Terpopuler</h2>
                    <p class="text-slate-500 mt-2">Peralatan yang paling banyak disewa petualang lainnya.</p>
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-8">
                @foreach($produk as $item)
                    <div class="card p-0 overflow-hidden hover:shadow-xl transition-all">
                        <div class="card-img aspect-[4/3]">
                            <img src="{{ $item['gambar'] ?? asset('img/placeholder.jpg') }}" alt="{{ $item['nama'] }}" class="w-full h-full object-cover">
                        </div>
                        <div class="p-5">
                            <h3 class="card-title text-lg mb-1">{{ $item['nama'] }}</h3>
                            <p class="text-green-600 font-black text-xl mb-5">Rp {{ number_format($item['harga'], 0, ',', '.') }}<span class="text-xs text-slate-400 font-normal">/hari</span></p>

                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <button type="submit" class="btn btn-primary w-full py-3">
                                    <i class="fa-solid fa-cart-plus"></i> Tambah Keranjang
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- DAFTAR PERALATAN --}}
        <section>
            <h2 class="text-3xl font-black text-slate-900 mb-8">Daftar Lengkap Peralatan</h2>

            <div class="table-responsive bg-white rounded-3xl p-2 border border-slate-100 shadow-sm">
                <table class="w-full">
                    <thead>
                        <tr class="text-left border-b border-slate-100">
                            <th class="p-4">No</th>
                            <th class="p-4">Alat</th>
                            <th class="p-4">Harga</th>
                            <th class="p-4">Status</th>
                            <th class="p-4">Kondisi</th>
                            <th class="p-4 text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peralatan as $item)
                            <tr class="border-b border-slate-50 last:border-0 hover:bg-slate-50">
                                <td class="p-4 text-slate-500">{{ $item['no'] }}</td>
                                <td class="p-4 flex items-center gap-4">
                                    <img src="{{ $item['gambar'] }}" alt="{{ $item['nama'] }}" class="w-12 h-12 rounded-xl object-cover">
                                    <span class="font-bold text-slate-800">{{ $item['nama'] }}</span>
                                </td>
                                <td class="p-4 font-bold text-green-600">Rp {{ number_format($item['harga'], 0, ',', '.') }}</td>
                                <td class="p-4">
                                    <span class="badge {{ $item['stok'] > 0 ? 'badge-success' : 'badge-danger' }}">
                                        {{ $item['stok_label'] }} ({{ $item['stok'] }})
                                    </span>
                                </td>
                                <td class="p-4">
                                    <span class="badge badge-warning">{{ $item['kondisi'] }}</span>
                                </td>
                                <td class="p-4 text-center">
                                    @if($item['stok'] > 0)
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                            <button type="submit" class="btn btn-primary btn-sm px-4">
                                                + Keranjang
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-secondary btn-sm opacity-50 cursor-not-allowed" disabled>
                                            Habis
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </section>
    </div>
@endsection
