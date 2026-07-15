@extends('layouts.app')

@section('content')
    <div class="page-header text-center">
        <div class="container">
            <h1 class="text-white text-4xl mb-4">Peraturan & Syarat Sewa</h1>
            <p class="text-green-200 text-lg max-w-2xl mx-auto">Harap dibaca dan dipatuhi demi kenyamanan dan keamanan bersama dalam berpetualang.</p>
        </div>
    </div>

    <div class="container py-16 max-w-4xl mx-auto">
        <div class="card overflow-hidden bg-white shadow-sm">
            @php
                $rules = [
                    [
                        'title' => 'Identitas Asli',
                        'desc' => 'Penyewa wajib meninggalkan identitas asli (KTP/SIM/Paspor) yang masih berlaku sebagai jaminan keamanan selama masa peminjaman alat.',
                        'icon' => 'fa-id-card'
                    ],
                    [
                        'title' => 'Pembayaran Lunas',
                        'desc' => 'Pembayaran biaya sewa wajib dilunasi 100% saat pengambilan alat. Kami menerima pembayaran tunai maupun transfer.',
                        'icon' => 'fa-credit-card'
                    ],
                    [
                        'title' => 'Pemeriksaan Alat',
                        'desc' => 'Wajib melakukan pengecekan kondisi alat bersama admin saat pengambilan dan pengembalian. Pastikan alat berfungsi normal sebelum dibawa.',
                        'icon' => 'fa-clipboard-check'
                    ],
                    [
                        'title' => 'Tanggung Jawab Kerusakan',
                        'desc' => 'Segala kerusakan atau kehilangan alat sepenuhnya menjadi tanggung jawab penyewa.',
                        'icon' => 'fa-shield-halved',
                        'sublist' => ['Kerusakan ringan: Dikenakan biaya servis/perbaikan.', 'Kerusakan berat/Hilang: Wajib mengganti dengan barang yang sama atau uang senilai harga baru.']
                    ],
                    [
                        'title' => 'Keterlambatan',
                        'desc' => 'Keterlambatan pengembalian akan dikenakan denda sesuai tarif harian yang berlaku (dihitung per hari keterlambatan).',
                        'icon' => 'fa-clock'
                    ],
                    [
                        'title' => 'Kebersihan',
                        'desc' => 'Alat wajib dikembalikan dalam keadaan bersih dan kering. Khusus tenda, jika basah karena hujan harap konfirmasi sebelumnya kepada admin.',
                        'icon' => 'fa-broom'
                    ],
                    [
                        'title' => 'Larangan',
                        'desc' => 'Dilarang keras merokok di dalam tenda atau menggunakan kompor/alat masak di dalam tenda karena risiko kebakaran tinggi.',
                        'icon' => 'fa-ban'
                    ],
                ];
            @endphp

            @foreach($rules as $rule)
                <div class="flex gap-5 p-6 border-b border-slate-100 last:border-0 hover:bg-slate-50 transition-colors">
                    <div class="flex-shrink-0 w-12 h-12 bg-green-100 rounded-xl flex items-center justify-center text-green-600">
                        <i class="fa-solid {{ $rule['icon'] }} text-lg"></i>
                    </div>
                    <div class="flex-1">
                        <h4 class="text-base font-bold text-slate-800 mb-1">{{ $rule['title'] }}</h4>
                        <p class="text-sm text-slate-500 leading-relaxed">{{ $rule['desc'] }}</p>
                        @if(isset($rule['sublist']))
                            <ul class="mt-3 space-y-1">
                                @foreach($rule['sublist'] as $item)
                                    <li class="text-sm text-slate-500 flex gap-2 items-start">
                                        <i class="fa-solid fa-chevron-right text-green-500 text-[10px] mt-1.5"></i>
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-8 p-6 bg-red-50 border border-red-200 rounded-2xl flex gap-4 items-start">
            <div class="flex-shrink-0 w-12 h-12 bg-red-100 rounded-xl flex items-center justify-center text-red-600">
                <i class="fa-solid fa-circle-exclamation text-lg"></i>
            </div>
            <div>
                <h5 class="text-base font-bold text-red-800 mb-2">Ketentuan Sewa</h5>
                <p class="text-sm text-slate-600 leading-relaxed m-0">
                    Dengan menyewa peralatan di EXplorent, Anda dianggap telah membaca, memahami, dan menyetujui seluruh syarat dan ketentuan yang berlaku di atas.
                </p>
            </div>
        </div>
    </div>
@endsection
