@extends('layouts.app')

@section('title', 'Pendaftaran Berhasil! - Gokidz')

@section('content')

    <div class="container" style="min-height: 70vh; display: flex; align-items: center; justify-content: center;">
        <div class="success-box">
            <div class="success-icon">🎉</div>
            <h1>Pendaftaran Berhasil!</h1>
            <p>Terima kasih Ayah/Bunda <strong>{{ session('parent_name') }}</strong>! Formulir antar jemput sekolah untuk buah hati Anda telah kami terima.</p>
            
            <div class="success-summary">
                <h3>📋 Ringkasan Pendaftaran</h3>
                
                <div class="success-summary-item">
                    <span>Nama Anak:</span>
                    <span>{{ session('child_name') }}</span>
                </div>
                
                <div class="success-summary-item">
                    <span>Sekolah Tujuan:</span>
                    <span>{{ session('school_name') }}</span>
                </div>
                
                <div class="success-summary-item">
                    <span>Jenis Layanan:</span>
                    <span>
                        @if(session('shuttle_type') == 'round_trip')
                            Pulang-Pergi (Antar & Jemput)
                        @elseif(session('shuttle_type') == 'morning_only')
                            Pergi Saja (Pagi Hari)
                        @else
                            Pulang Saja (Sore Hari)
                        @endif
                    </span>
                </div>

                <div class="success-summary-item">
                    <span>Status Awal:</span>
                    <span style="color: var(--primary)">Menunggu Verifikasi Rute</span>
                </div>
            </div>

            <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 25px;">Tim operasional Gokidz akan segera menghubungi nomor WhatsApp Anda dalam waktu <strong>1x24 jam</strong> untuk melakukan survei rute jalan dan perkenalan driver.</p>
            
            <div style="display: flex; gap: 15px; justify-content: center;">
                <a href="{{ route('home') }}" class="btn-secondary">Kembali ke Beranda</a>
                <a href="https://wa.me/6287887654321?text=Halo%20Gokidz!%20Saya%20baru%20saja%20mendaftar%20antar%20jemput%20untuk%20anak%20saya%20{{ urlencode(session('child_name')) }}." target="_blank" class="cta-btn" style="background-color: var(--accent-green)">
                    Hubungi via WhatsApp 💬
                </a>
            </div>
        </div>
    </div>

@endsection
