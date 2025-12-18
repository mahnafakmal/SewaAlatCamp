@extends('layouts.app')

@section('content')
<main>
    <h2>Informasi & Kontak</h2>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 24px; margin-top: 24px;">
        
        <!-- CARD ALAMAT -->
        <div style="background-color: white; padding: 24px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-left: 4px solid #e30613;">
            <h3 style="color: #dc2626; margin-top: 0; display: flex; align-items: center;">
                📍 Alamat
            </h3>
            <p style="color: #4b5563; margin: 0; font-size: 1.05rem;">
                {{ $alamat }}
            </p>
        </div>

        <!-- CARD WHATSAPP -->
        <div style="background-color: white; padding: 24px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-left: 4px solid #25d366;">
            <h3 style="color: #25d366; margin-top: 0; display: flex; align-items: center;">
                💬 WhatsApp
            </h3>
            <p style="color: #4b5563; margin: 0; font-size: 1.05rem;">
                {{ $nohp }}
            </p>
            <a href="https://wa.me/62{{ substr($nohp, 1) }}" style="display: inline-block; margin-top: 12px; background-color: #25d366; color: white; padding: 8px 16px; text-decoration: none; border-radius: 6px; font-weight: 500;">
                Chat via WhatsApp
            </a>
        </div>

        <!-- CARD EMAIL -->
        <div style="background-color: white; padding: 24px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-left: 4px solid #0066cc;">
            <h3 style="color: #0066cc; margin-top: 0; display: flex; align-items: center;">
                ✉️ Email
            </h3>
            <p style="color: #4b5563; margin: 0; font-size: 1.05rem;">
                {{ $email }}
            </p>
            <a href="mailto:{{ $email }}" style="display: inline-block; margin-top: 12px; background-color: #0066cc; color: white; padding: 8px 16px; text-decoration: none; border-radius: 6px; font-weight: 500;">
                Kirim Email
            </a>
        </div>

        <!-- CARD JAM OPERASIONAL -->
        <div style="background-color: white; padding: 24px; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); border-left: 4px solid #f59e0b;">
            <h3 style="color: #f59e0b; margin-top: 0; display: flex; align-items: center;">
                🕐 Jam Operasional
            </h3>
            <p style="color: #4b5563; margin: 0; font-size: 1.05rem;">
                {{ $jam_buka }}
            </p>
            <p style="color: #9ca3af; margin: 12px 0 0 0; font-size: 0.9rem;">
                Buka setiap hari (Senin - Minggu)
            </p>
        </div>

    </div>

    <!-- SECTION TAMBAHAN -->
    <section style="margin-top: 48px; padding: 24px; background-color: #f9fafb; border-radius: 8px; border: 2px solid #dc2626;">
        <h3 style="color: #1f2937; margin-top: 0;">Pertanyaan Lebih Lanjut?</h3>
        <p style="color: #4b5563; margin-bottom: 16px;">
            Hubungi kami melalui salah satu saluran komunikasi di atas. Tim kami siap membantu Anda 24/7 untuk menjawab pertanyaan, konfirmasi stok peralatan, atau melakukan pemesanan.
        </p>
        
        <h4 style="color: #1f2937; margin: 20px 0 12px 0;">Layanan Kami:</h4>
        <ul style="color: #4b5563; padding-left: 24px; line-height: 1.8;">
            <li>Penyewaan Peralatan Camping & Hiking</li>
            <li>Konsultasi Peralatan Outdoor</li>
            <li>Paket Grup & Corporate</li>
            <li>Pengiriman Peralatan (Area Semarang)</li>
        </ul>
    </section>

        <!-- SECTION LOKASI MAP -->
    <section style="margin-top: 48px;">
        <h3 style="color: #1f2937;">Lokasi Kami</h3>
        <div style="width: 100%; height: 400px; background-color: #e5e7eb; border-radius: 8px; display: flex; align-items: center; justify-content: center; color: #6b7280;">
            <p style="text-align: center;">
                <strong>Peta akan ditampilkan di sini</strong><br>
                Jl. Pendaki Gunung No. 42, Semarang, Jawa Tengah 50123
            </p>
        </div>
    </section>


</main>
@endsection