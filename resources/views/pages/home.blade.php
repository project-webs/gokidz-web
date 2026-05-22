@extends('layouts.app')

@section('title', 'Gokidz - Layanan Antar Jemput Sekolah Aman & Ceria')

@section('content')

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <div class="hero-grid">
                <div class="hero-content">
                    <span class="section-badge">🚌 Mitra Terbaik Ayah & Bunda</span>
                    <h1>Antar Jemput Sekolah <span>Aman, Nyaman & Ceria!</span></h1>
                    <p>Gokidz memberikan ketenangan pikiran bagi Orang Tua dengan layanan jemput anak sekolah yang aman dan terpantau real-time. Perjalanan jadi seru dan menyenangkan bagi anak-anak!</p>
                    <div class="hero-buttons">
                        <a href="{{ route('pendaftaran') }}" class="cta-btn">Daftar Sekarang</a>
                        <a href="{{ route('layanan') }}" class="btn-secondary">Lihat Layanan & Tarif</a>
                    </div>
                </div>
                <div class="hero-illustration">
                    <div class="blob-bg"></div>
                    <img src="{{ asset('images/gokidz_islamic_hero.png') }}" class="shuttle-art" alt="Gokidz School Shuttle Bus" style="width: 100%; max-width: 500px; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); z-index: 2;">
                </div>
            </div>
        </div>
    </section>

    <!-- Kenapa Gokidz Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">✨ Keunggulan Kami</span>
                <h2>Mengapa Memilih Gokidz?</h2>
                <p>Kami berkomitmen menyediakan layanan antar jemput dengan standar keselamatan tertinggi dan fasilitas yang disukai anak-anak.</p>
            </div>
            
            <div class="features-grid">
                <!-- Card 1 -->
                <div class="feature-card orange">
                    <div class="feature-icon-wrapper">🔒</div>
                    <h3>Keamanan Utama</h3>
                    <p>Setiap armada/driver dilengkapi dengan aplikasi gokidz dengan GPS tracker aktif  agar Ayah & Bunda bisa memantau posisi anak secara real-time.</p>
                </div>
                <!-- Card 2 -->
                <div class="feature-card blue">
                    <div class="feature-icon-wrapper">🚌</div>
                    <h3>Armada Nyaman & Bersih</h3>
                    <p>Mobil ber-AC, wangi, bersih</p>
                </div>
                <!-- Card 3 -->
                <div class="feature-card yellow">
                    <div class="feature-icon-wrapper">🧑‍✈️</div>
                    <h3>Driver Ramah & Terlatih</h3>
                    <p>Driver kami ramah anak</p>
                </div>
                <!-- Card 4 -->
                <div class="feature-card green">
                    <div class="feature-icon-wrapper">📱</div>
                    <h3>Notifikasi Instan</h3>
                    <p>Pemberitahuan otomatis melalui aplikasi gokidz ketika anak dijemput, sampai di sekolah, dan saat dalam perjalanan pulang.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cara Kerja Section -->
    <section class="section" style="background-color: var(--white); border-top: 3px solid var(--primary-light); border-bottom: 3px solid var(--primary-light)">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">🛠️ Cara Kerja</span>
                <h2>Mudahnya Berlangganan Gokidz</h2>
                <p>Hanya dengan 3 langkah praktis, anak Anda siap menikmati perjalanan sekolah yang aman dan ceria.</p>
            </div>
            
            <div class="steps-layout">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3>Isi Formulir</h3>
                    <p>Isi rute rumah, sekolah anak, serta jadwal penjemputan lewat formulir pendaftaran online kami.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3>Konfirmasi Rute</h3>
                    <p>Tim Gokidz akan mencocokkan rute dan menjadwalkan kunjungan driver untuk perkenalan dengan anak.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3>Siap Berangkat!</h3>
                    <p>Anak Anda dijemput di depan rumah dengan aman dan siap memulai hari sekolah dengan senyuman.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimoni Section -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">💬 Kata Orang Tua</span>
                <h2>Apa Kata Ayah & Bunda?</h2>
                <p>Lebih dari 500+ orang tua mempercayakan perjalanan sekolah buah hatinya kepada Gokidz.</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card" style="text-align: left; background: var(--white)">
                    <div style="font-size: 1.5rem; margin-bottom: 10px; color: var(--accent-yellow)">⭐⭐⭐⭐⭐</div>
                    <p style="font-style: italic; margin-bottom: 20px; color: var(--text-muted)">"Sangat terbantu dengan Gokidz! Saya bekerja kantoran dan tidak sempat mengantar anak. Berkat notifikasi GPS-nya, saya bisa memantau dengan tenang."</p>
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <div style="font-size: 2.2rem;">👩‍💼</div>
                        <div>
                            <h4 style="font-size: 1.05rem;">Bunda Rina W.</h4>
                            <span style="font-size: 0.8rem; color: var(--text-muted)">Ibu dari Kimi (SD N 02)</span>
                        </div>
                    </div>
                </div>
                
                <div class="feature-card" style="text-align: left; background: var(--white)">
                    <div style="font-size: 1.5rem; margin-bottom: 10px; color: var(--accent-yellow)">⭐⭐⭐⭐⭐</div>
                    <p style="font-style: italic; margin-bottom: 20px; color: var(--text-muted)">"Mobilnya bersih sekali dan drivernya sangat ramah anak. Anak saya malah selalu bersemangat menunggu jemputan setiap pagi karena banyak mainannya."</p>
                    <div style="display: flex; align-items: center; gap: 15px;">
                        <div style="font-size: 2.2rem;">👨‍💼</div>
                        <div>
                            <h4 style="font-size: 1.05rem;">Ayah Hartono</h4>
                            <span style="font-size: 0.8rem; color: var(--text-muted)">Ayah dari Naufal (TK Ceria)</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
