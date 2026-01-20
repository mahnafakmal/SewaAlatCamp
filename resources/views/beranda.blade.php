@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
<section class="hero-section">
    <div class="hero-content">
        <h2 style="font-size: 3rem; font-weight: bold;">Persewaan Alat Camping & Hiking</h2>
        <p style="font-size: 1.25rem;">
            Menyediakan alat camping, hiking, dan outdoor travelling lengkap dengan harga terjangkau.
        </p>
    </div>
</section>

<main class="container" style="padding-bottom: 60px;">

{{-- PRODUK POPULER --}}
<section style="margin-bottom: 60px;">
    <h2 style="text-align:center; font-size:2rem; font-weight:bold; margin-bottom:30px;">
        Produk Populer
    </h2>
    <div class="produk-grid"
        style="display:grid; grid-template-columns:repeat(auto-fit,minmax(300px,1fr)); gap:24px;">

        @foreach($produk as $item)
        <div class="produk-card"
            style="background:white; border:1px solid #e5e7eb; border-radius:8px;
            padding:24px; text-align:center; box-shadow:0 4px 6px rgba(0,0,0,0.1);">

            <h3 style="font-size:1.25rem; font-weight:600;">{{ $item['nama'] }}</h3>

            <p style="color:#dc2626; font-weight:bold;">
                Mulai {{ $item['harga'] }} {{ $item['periode'] }}
            </p>
<form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $item['id'] }}">
    <input type="hidden" name="nama" value="{{ $item['nama'] }}">
    <input type="hidden" name="harga" value="{{ $item['harga'] }}">

    <button type="submit" class="btn-sewa"
                style="background:#dc2626; color:white; border:none;
                padding:10px 20px; border-radius:6px; width:100%;">
                Tambah ke Keranjang
            </button>

</form>

        </div>
        @endforeach

    </div>
</section>

{{-- DAFTAR PERALATAN --}}
<section>
    <h2 style="font-size:1.5rem; font-weight:bold; margin-bottom:24px;">
        Daftar Lengkap Peralatan
    </h2>

    <div style="overflow-x:auto; background:white; border-radius:8px;">
        <table style="width:100%; border-collapse:collapse;">
            <thead style="background:#f9fafb;">
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Kondisi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peralatan as $item)
                
                <tr style="border-bottom: 1px solid #e5e7eb; hover:bg-gray-50;">
                        <td style="padding: 16px 24px; color: #6b7280;">{{ $item['no'] }}</td>
                        <td style="padding: 16px 24px; font-weight: 500; color: #111827;">{{ $item['nama'] }}</td>
                        <td style="padding: 16px 24px; color: #059669; font-weight: 600;">{{ $item['harga'] }}</td>
                        <td style="padding: 16px 24px;">
                            <span style="background-color: #ecfdf5; color: #065f46; padding: 4px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 600;">{{ $item['stok'] }} unit</span>
                        </td>
                        <td style="padding: 16px 24px;">
                            <span style="background-color: #eff6ff; color: #1e40af; padding: 4px 10px; border-radius: 9999px; font-size: 0.75rem; font-weight: 600;">{{ $item['kondisi'] }}</span>
                        </td>
                        <td style="padding: 16px 24px; text-align: center;">
<form action="{{ route('cart.add') }}" method="POST">
    @csrf
    <input type="hidden" name="id" value="{{ $item['id'] }}">
    <input type="hidden" name="nama" value="{{ $item['nama'] }}">
    <input type="hidden" name="harga" value="{{ $item['harga'] }}">

    <button type="submit" class="btn btn-primary">
                                style="background-color:#2563eb; color:white; border:none;
                                padding:6px 16px; border-radius:6px; cursor:pointer;
                                font-size:0.875rem; font-weight:500;">
                                + Keranjang
                            </button>
</form>

                        </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>

</main>

@endsection
