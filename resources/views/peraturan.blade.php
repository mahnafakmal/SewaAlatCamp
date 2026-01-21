@extends('layouts.app')

@section('content')
    <div class="container py-5">
        <h2 class="text-center mb-5"
            style="border-bottom: 2px solid var(--primary-color); display: inline-block; padding-bottom: 10px;">Peraturan &
            Syarat Sewa</h2>

        <div class="card p-5">
            <ol style="list-style-type: decimal; padding-left: 1.5rem; line-height: 1.8;">
                <li class="mb-3">
                    <strong>Identitas Asli:</strong> Penyewa wajib meninggalkan identitas asli (KTP/SIM) yang masih berlaku
                    sebagai jaminan saat pengambilan alat.
                </li>
                <li class="mb-3">
                    <strong>Pembayaran:</strong> Pembayaran sewa wajib lunas saat pengambilan alat.
                </li>
                <li class="mb-3">
                    <strong>Pemeriksaan Alat:</strong> Cek kondisi alat bersama admin saat pengambilan dan pengembalian.
                </li>
                <li class="mb-3">
                    <strong>Tanggung Jawab Kerusakan:</strong> Kerusakan atau kehilangan alat selama masa sewa menjadi
                    tanggung jawab penyewa sepenuhnya.
                    <ul style="list-style-type: circle; margin-left: 20px; color: #6b7280; font-size: 0.9rem;">
                        <li>Kerusakan ringan: Biaya perbaikan.</li>
                        <li>Kerusakan berat/Hilang: Mengganti dengan barang yang sama atau uang senilai harga barang baru.
                        </li>
                    </ul>
                </li>
                <li class="mb-3">
                    <strong>Keterlambatan:</strong> Keterlambatan pengembalian dikenakan denda sesuai tarif harian yang
                    berlaku.
                </li>
                <li class="mb-3">
                    <strong>Kebersihan:</strong> Alat wajib dikembalikan dalam keadaan bersih dan kering. (Kecuali tenda
                    basah karena hujan, harap konfirmasi).
                </li>
                <li class="mb-3">
                    <strong>Larangan:</strong> Dilarang merokok di dalam tenda atau menggunakan alat masakan di dalam tenda.
                </li>
            </ol>

            <div class="mt-4"
                style="background-color: #fef2f2; padding: 15px; border-left: 4px solid #ef4444; border-radius: 4px;">
                <p style="color: #991b1b; margin: 0; font-weight: 500;">
                    ⚠️ Dengan menyewa, Anda dianggap menyetujui seluruh peraturan di atas.
                </p>
            </div>
        </div>
    </div>
@endsection