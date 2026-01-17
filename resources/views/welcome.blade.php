@extends('layouts.app')

@section('content')

{{-- HERO SECTION --}}
<section class="hero position-relative">
    <div class="hero-overlay"></div>
    <div class="container text-white hero-content">
        <h1 class="fw-bold">Persewaan Alat Camping & Hiking</h1>
        <p>
            Menyediakan alat camping, hiking, dan outdoor travelling lengkap
            dengan harga terjangkau.
        </p>
    </div>
</section>

{{-- PRODUK POPULER --}}
<section class="container my-5">
    <h3 class="fw-bold mb-4">Produk Populer</h3>

    <div class="row">

        {{-- PRODUK 1 --}}
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="{{ asset('images/sleepingbag.jpg') }}" class="card-img-top" alt="Sleeping Bag">
                <div class="card-body">
                    <h5 class="card-title">Sleeping Bag Bulu Angsa</h5>
                    <p class="text-danger fw-bold">Rp25.000 / hari</p>

                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="1">
                        <input type="hidden" name="nama" value="Sleeping Bag Bulu Angsa">
                        <input type="hidden" name="harga" value="25000">

                        <button type="submit" class="btn btn-danger w-100">
                            Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- PRODUK 2 --}}
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="{{ asset('images/tenda.jpg') }}" class="card-img-top" alt="Tenda">
                <div class="card-body">
                    <h5 class="card-title">Tenda Dome 4 Orang</h5>
                    <p class="text-danger fw-bold">Rp50.000 / hari</p>

                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="2">
                        <input type="hidden" name="nama" value="Tenda Dome 4 Orang">
                        <input type="hidden" name="harga" value="50000">

                        <button type="submit" class="btn btn-danger w-100">
                            Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>

        {{-- PRODUK 3 --}}
        <div class="col-md-4">
            <div class="card shadow-sm">
                <img src="{{ asset('images/kompor.jpg') }}" class="card-img-top" alt="Kompor">
                <div class="card-body">
                    <h5 class="card-title">Kompor Portable</h5>
                    <p class="text-danger fw-bold">Rp20.000 / hari</p>

                    <form action="{{ route('cart.add') }}" method="POST">
                        @csrf
                        <input type="hidden" name="id" value="3">
                        <input type="hidden" name="nama" value="Kompor Portable">
                        <input type="hidden" name="harga" value="20000">

                        <button type="submit" class="btn btn-danger w-100">
                            Tambah ke Keranjang
                        </button>
                    </form>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection
