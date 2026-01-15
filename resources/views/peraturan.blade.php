@extends('layouts.app')

@section('content')
<main>
    <h2>Peraturan Sewa</h2>

    <div style="background-color: #f9fafb; padding: 24px; border-radius: 8px; border-left: 4px solid #e30613;">
        <ol style="list-style-type: decimal; padding-left: 24px; line-height: 2;">
            <li style="margin-bottom: 16px;">
                <strong>Identitas</strong> - Penyewa wajib meninggalkan identitas asli (KTP) saat pengambilan alat.
            </li>
            <li style="margin-bottom: 16px;">
                <strong>Tanggung Jawab</strong> - Kerusakan atau kehilangan alat menjadi tanggung jawab penyewa sepenuhnya.
            </li>
            <li style="margin-bottom: 16px;">
                <strong>Pengembalian Tepat Waktu</strong> - Alat harus dikembalikan sesuai jadwal yang telah disepakati.
            </li>
            <li style="margin-bottom: 16px;">
                <strong>Larangan Modifikasi</strong> - Dilarang memodifikasi, membongkar, atau mengubah kondisi alat sewaan.
            </li>
            <li style="margin-bottom: 16px;">
                <strong>Denda Keterlambatan</strong> - Keterlambatan pengembalian akan dikenakan denda Rp 50.000 per jam.
            </li>
            <li style="margin-bottom: 16px;">
                <strong>Pembersihan Alat</strong> - Penyewa wajib membersihkan alat sebelum pengembalian dalam kondisi bersih.
            </li>
            <li style="margin-bottom: 16px;">
                <strong>Biaya Kerusakan Ringan</strong> - Kerusakan ringan akan dikenakan biaya perbaikan sesuai dengan jenis kerusakan.
            </li>
            <li style="margin-bottom: 16px;">
                <strong>Biaya Kerusakan Berat</strong> - Kerusakan berat atau kehilangan alat akan dikenakan biaya penggantian alat baru.
            </li>
            <li style="margin-bottom: 16px;">
                <strong>Larangan Konsumsi</strong> - Minuman beralkohol dan merokok tidak diperbolehkan di sekitar penyimpanan alat.
            </li>
            <li style="margin-bottom: 16px;">
                <strong>Penggunaan Sesuai Fungsi</strong> - Alat hanya boleh digunakan sesuai dengan fungsi dan instruksi yang diberikan.
            </li>
        </ol>
    </div>

    <div style="margin-top: 32px; padding: 20px; background-color: #fef2f2; border: 2px solid #dc2626; border-radius: 8px;">
        <h3 style="color: #dc2626; margin-top: 0;">⚠️ Penting</h3>
        <p style="margin: 10px 0;">
            Dengan melakukan penyewaan alat di EXplorent, Anda dianggap telah membaca, memahami, dan setuju dengan semua peraturan sewa di atas.
        </p>
        
    </div>
</main>
@endsection