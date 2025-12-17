@extends('layouts.app')

@section('content')
<!-- HERO SECTION DENGAN BACKGROUND GAMBAR -->
<section class="hero-section">
    <div class="hero-content">
        <h2>Persewaan Alat Camping & Hiking</h2>
        <p>Menyediakan alat camping, hiking, dan outdoor travelling lengkap dengan harga terjangkau.</p>
    </div>
</section>

<!-- CONTENT -->
<main>
    <!-- SECTION PRODUK POPULER -->
    <section>
        <h2>Produk Populer</h2>
        <div class="produk-grid">
            @foreach($produk as $item)
            <div class="produk-card">
                <h3>{{ $item['nama'] }}</h3>
                <p>Mulai {{ $item['harga'] }} {{ $item['periode'] }}</p>
                <a href="{{ route('cara-sewa') }}" class="btn-sewa">Sewa Sekarang</a>
            </div>
            @endforeach
        </div>
    </section>

    <!-- SECTION DAFTAR LENGKAP PERALATAN -->
    <section>
        <h2>Daftar Lengkap Peralatan</h2>
        <table>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Peralatan</th>
                    <th>Harga / Hari</th>
                    <th>Stok</th>
                    <th>Kondisi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($peralatan as $item)
                <tr>
                    <td>{{ $item['no'] }}</td>
                    <td>{{ $item['nama'] }}</td>
                    <td class="harga">{{ $item['harga'] }}</td>
                    <td><span class="badge badge-green">{{ $item['stok'] }} unit</span></td>
                    <td><span class="badge badge-blue">{{ $item['kondisi'] }}</span></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </section>
</main>
@endsection