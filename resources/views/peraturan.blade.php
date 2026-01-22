@extends('layouts.app')

@section('content')
    <div class="page-header">
        <div class="container">
            <h1>Peraturan & Syarat Sewa</h1>
            <p>Harap dibaca dan dipatuhi demi kenyamanan dan keamanan bersama dalam berpetualang.</p>
        </div>
    </div>

    <div class="container" style="max-width: 900px;">
        <div class="card p-0 overflow-hidden">
            <div class="rule-item">
                <div class="rule-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <div class="rule-content">
                    <h4>Identitas Asli</h4>
                    <p>Penyewa wajib meninggalkan identitas asli (KTP/SIM/Paspor) yang masih berlaku sebagai jaminan
                        keamanan selama masa peminjaman alat.</p>
                </div>
            </div>

            <div class="rule-item">
                <div class="rule-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect>
                        <line x1="1" y1="10" x2="23" y2="10"></line>
                    </svg>
                </div>
                <div class="rule-content">
                    <h4>Pembayaran Lunas</h4>
                    <p>Pembayaran biaya sewa wajib dilunasi 100% saat pengambilan alat. Kami menerima pembayaran tunai
                        maupun transfer.</p>
                </div>
            </div>

            <div class="rule-item">
                <div class="rule-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
                        <polyline points="22 4 12 14.01 9 11.01"></polyline>
                    </svg>
                </div>
                <div class="rule-content">
                    <h4>Pemeriksaan Alat</h4>
                    <p>Wajib melakukan pengecekan kondisi alat bersama admin saat pengambilan dan pengembalian. Pastikan
                        alat berfungsi normal sebelum dibawa.</p>
                </div>
            </div>

            <div class="rule-item">
                <div class="rule-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z">
                        </path>
                        <line x1="12" y1="9" x2="12" y2="13"></line>
                        <line x1="12" y1="17" x2="12.01" y2="17"></line>
                    </svg>
                </div>
                <div class="rule-content">
                    <h4>Tanggung Jawab Kerusakan</h4>
                    <p>Segala kerusakan atau kehilangan alat sepenuhnya menjadi tanggung jawab penyewa.</p>
                    <ul
                        style="margin-top: 5px; margin-left: 20px; list-style-type: disc; font-size: 0.9rem; color: var(--text-light);">
                        <li>Kerusakan ringan: Dikenakan biaya servis/perbaikan.</li>
                        <li>Kerusakan berat/Hilang: Wajib mengganti dengan barang yang sama atau uang senilai harga baru.
                        </li>
                    </ul>
                </div>
            </div>

            <div class="rule-item">
                <div class="rule-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <polyline points="12 6 12 12 16 14"></polyline>
                    </svg>
                </div>
                <div class="rule-content">
                    <h4>Keterlambatan</h4>
                    <p>Keterlambatan pengembalian akan dikenakan denda sesuai tarif harian yang berlaku (dihitung per hari
                        keterlambatan).</p>
                </div>
            </div>

            <div class="rule-item">
                <div class="rule-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 2.69l5.66 5.66a8 8 0 1 1-11.31 0z"></path>
                    </svg>
                </div>
                <div class="rule-content">
                    <h4>Kebersihan</h4>
                    <p>Alat wajib dikembalikan dalam keadaan bersih dan kering. Khusus tenda, jika basah karena hujan harap
                        konfirmasi sebelumnya kepada admin.</p>
                </div>
            </div>

            <div class="rule-item">
                <div class="rule-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <circle cx="12" cy="12" r="10"></circle>
                        <line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line>
                    </svg>
                </div>
                <div class="rule-content">
                    <h4>Larangan</h4>
                    <p>Dilarang keras merokok di dalam tenda atau menggunakan kompor/alat masak di dalam tenda karena risiko
                        kebakaran tinggi.</p>
                </div>
            </div>
        </div>

        <div class="agreement-box mb-5">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                <path
                    d="M14 9V5a3 3 0 0 0-3-3l-4 9v11h11.28a2 2 0 0 0 2-1.7l1.38-9a2 2 0 0 0-2-2.3zM7 22H4a2 2 0 0 1-2-2v-7a2 2 0 0 1 2-2h3">
                </path>
            </svg>
            <div>
                <h5 style="margin-bottom: 0.5rem; color: #991b1b; font-weight: 700;">Ketentuan Sewa</h5>
                <p style="margin: 0; font-size: 0.95rem;">Dengan menyewa peralatan di EXplorent, Anda dianggap telah
                    membaca, memahami, dan menyetujui seluruh syarat dan ketentuan yang berlaku di atas.</p>
            </div>
        </div>
    </div>
@endsection