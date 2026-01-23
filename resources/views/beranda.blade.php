@extends('layouts.app')

@section('content')

    {{-- HERO SECTION --}}
    <section class="hero">
        <div class="container text-center">
            <h1>Persewaan Alat Camping & Hiking</h1>
            <p class="mb-4">
                Menyediakan alat camping, hiking, dan outdoor travelling
                lengkap dengan harga terjangkau.
            </p>
            <style>
                .hero-search {
                    max-width: 500px;
                    margin: 0 auto;
                    display: flex;
                    gap: 10px;
                }
                @media(max-width: 480px) {
                    .hero-search {
                        flex-direction: column;
                    }
                    .hero-search button {
                        width: 100%;
                    }
                }
            </style>
            <form action="{{ route('beranda') }}" method="GET" class="hero-search">
                <input type="text" name="search" class="form-control" placeholder="Cari perlengkapan..."
                    value="{{ request('search') }}">
                <button type="submit" class="btn btn-primary" style="white-space: nowrap;">Cari</button>
            </form>
        </div>
    </section>

    <div class="container">

        {{-- PRODUK POPULER --}}
        <section class="mb-4">
            <h2 class="text-center mb-4">Produk Populer</h2>

            <div class="grid">
                @foreach($produk as $item)
                    <div class="card">
                        <div class="card-img">
                            {{-- Placeholder image if none provided --}}
                            <img src="{{ $item['gambar'] ?? asset('img/placeholder.jpg') }}" alt="{{ $item['nama'] }}">
                        </div>
                        <div class="card-body text-center">
                            <h3 class="card-title">{{ $item['nama'] }}</h3>
                            <p class="card-price">Rp {{ number_format($item['harga'], 0, ',', '.') }}</p>

                            <form action="{{ route('cart.add') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item['id'] }}">
                                <input type="hidden" name="nama" value="{{ $item['nama'] }}">
                                <input type="hidden" name="harga" value="{{ $item['harga'] }}">

                                <button type="submit" class="btn btn-primary btn-block">
                                    Tambah ke Keranjang
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- DAFTAR PERALATAN --}}
        <section class="py-5">
            <h2 class="mb-4">Daftar Lengkap Peralatan</h2>

            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Kondisi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($peralatan as $item)
                            <tr>
                                <td>{{ $item['no'] }}</td>
                                <td>
                                    <img src="{{ $item['gambar'] }}" alt="{{ $item['nama'] }}"
                                        style="width: 50px; height: 50px; object-fit: cover; border-radius: 4px;">
                                </td>
                                <td style="font-weight: 500;">{{ $item['nama'] }}</td>
                                <td style="color: var(--primary-color); font-weight: 600;">
                                    Rp {{ number_format($item['harga'], 0, ',', '.') }}
                                </td>
                                <td>
                                    <span class="badge badge-{{ $item['stok_status'] }}">{{ $item['stok_label'] }}
                                        ({{ $item['stok'] }})</span>
                                </td>
                                <td>
                                    <span class="badge badge-warning">{{ $item['kondisi'] }}</span>
                                </td>
                                <td>
                                    @if($item['stok'] > 0)
                                        <form action="{{ route('cart.add') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $item['id'] }}">
                                            <input type="hidden" name="nama" value="{{ $item['nama'] }}">
                                            <input type="hidden" name="harga" value="{{ $item['harga'] }}">

                                            <button type="submit" class="btn btn-primary btn-sm">
                                                + Keranjang
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-secondary btn-sm" disabled
                                            style="opacity: 0.6; cursor: not-allowed;">
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