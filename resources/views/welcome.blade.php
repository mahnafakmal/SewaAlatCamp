@extends('layouts.app')

@section('content')

    {{-- HERO SECTION --}}
    <section class="hero">
        <div class="container">
            <h1>Persewaan Alat Camping & Hiking</h1>
            <p>
                Menyediakan alat camping, hiking, dan outdoor travelling lengkap
                dengan harga terjangkau.
            </p>
            @guest
                <a href="{{ route('register') }}" class="btn btn-primary" style="margin-top: 1rem;">Mulai Petualangan</a>
            @endguest
        </div>
    </section>

    <div class="container">
        {{-- PRODUK POPULER --}}
        <section class="mb-4">
            <h2 class="text-center mb-4">Produk Populer</h2>

            <div class="grid">

                {{-- PRODUK 1 --}}
                <div class="card">
                    <div class="card-img">
                        <img src="{{ asset('images/sleepingbag.jpg') }}" alt="Sleeping Bag">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title">Sleeping Bag Bulu Angsa</h3>
                        <p class="card-price">Rp 25.000 / hari</p>

                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="1">
                            <input type="hidden" name="nama" value="Sleeping Bag Bulu Angsa">
                            <input type="hidden" name="harga" value="25000">

                            <button type="submit" class="btn btn-primary btn-block">
                                Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>

                {{-- PRODUK 2 --}}
                <div class="card">
                    <div class="card-img">
                        <img src="{{ asset('images/tenda.jpg') }}" alt="Tenda">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title">Tenda Dome 4 Orang</h3>
                        <p class="card-price">Rp 50.000 / hari</p>

                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="2">
                            <input type="hidden" name="nama" value="Tenda Dome 4 Orang">
                            <input type="hidden" name="harga" value="50000">

                            <button type="submit" class="btn btn-primary btn-block">
                                Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>

                {{-- PRODUK 3 --}}
                <div class="card">
                    <div class="card-img">
                        <img src="{{ asset('images/kompor.jpg') }}" alt="Kompor">
                    </div>
                    <div class="card-body text-center">
                        <h3 class="card-title">Kompor Portable</h3>
                        <p class="card-price">Rp 20.000 / hari</p>

                        <form action="{{ route('cart.add') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id" value="3">
                            <input type="hidden" name="nama" value="Kompor Portable">
                            <input type="hidden" name="harga" value="20000">

                            <button type="submit" class="btn btn-primary btn-block">
                                Tambah ke Keranjang
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </section>
    </div>
@endsection