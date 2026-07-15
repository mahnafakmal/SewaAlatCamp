@extends('layouts.app')

@section('content')
    <div class="page-header text-center">
        <div class="container">
            <h1 class="text-white text-4xl mb-4">Tentang Kami</h1>
            <p class="text-green-200 text-lg max-w-2xl mx-auto">Informasi lokasi, kontak, dan layanan yang kami tawarkan untuk mendukung petualangan Anda.</p>
        </div>
    </div>

    <div class="container py-16">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mb-16">
            {{-- ALAMAT --}}
            <div class="card p-8 text-center hover:shadow-lg">
                <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center text-green-600 mx-auto mb-5">
                    <i class="fa-solid fa-location-dot text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-3">Lokasi Store</h3>
                <p class="text-sm text-slate-500 mb-5 leading-relaxed">{{ $alamat }}</p>
                <a href="#" class="btn btn-secondary btn-sm w-full">
                    <i class="fa-solid fa-map"></i> Lihat di Peta
                </a>
            </div>

            {{-- KONTAK --}}
            <div class="card p-8 text-center hover:shadow-lg">
                <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center text-green-600 mx-auto mb-5">
                    <i class="fa-solid fa-phone text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-3">Hubungi Kami</h3>
                <div class="space-y-2 text-sm">
                    <p class="text-slate-600"><span class="text-slate-400">WhatsApp:</span> <a href="https://wa.me/6285147111724" class="text-green-600 font-semibold hover:underline">{{ $nohp }}</a></p>
                    <p class="text-slate-500">{{ $email }}</p>
                </div>
            </div>

            {{-- JAM --}}
            <div class="card p-8 text-center hover:shadow-lg">
                <div class="w-16 h-16 bg-green-100 rounded-2xl flex items-center justify-center text-green-600 mx-auto mb-5">
                    <i class="fa-solid fa-clock text-2xl"></i>
                </div>
                <h3 class="text-lg font-bold text-slate-800 mb-3">Jam Operasional</h3>
                <p class="text-2xl font-bold text-green-600 mb-1">{{ $jam_buka }}</p>
                <p class="text-sm text-slate-400">Buka Setiap Hari</p>
            </div>
        </div>

        <div class="card p-10">
            <h3 class="text-2xl font-bold text-center text-slate-900 mb-8">Layanan & Fasilitas</h3>
            @php
                $services = [
                    ['icon' => 'fa-campground', 'name' => 'Peralatan Camping Terawat'],
                    ['icon' => 'fa-headset', 'name' => 'Konsultasi Gratis untuk Pemula'],
                    ['icon' => 'fa-tags', 'name' => 'Paket Sewa Hemat & Grup'],
                    ['icon' => 'fa-laptop', 'name' => 'Booking Online Mudah'],
                    ['icon' => 'fa-medal', 'name' => 'Diskon Pelanggan Setia'],
                    ['icon' => 'fa-truck', 'name' => 'Jasa Antar Jemput (S&K)'],
                ];
            @endphp
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                @foreach($services as $svc)
                    <div class="flex items-center gap-4 p-4 rounded-xl border border-slate-100 hover:border-green-300 hover:bg-green-50 transition-all duration-200">
                        <div class="flex-shrink-0 w-10 h-10 bg-green-600 rounded-lg flex items-center justify-center text-white">
                            <i class="fa-solid {{ $svc['icon'] }}"></i>
                        </div>
                        <span class="text-sm font-semibold text-slate-700">{{ $svc['name'] }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
