@extends('layouts.app')

@section('title', 'Tentang Kami & Standar Keamanan - Gokidz')

@section('content')

    <!-- Visi Misi Section -->
    <section class="section" style="background: linear-gradient(135deg, #FFF4E5 0%, #FFF 100%)">
        <div class="container">
            <div class="hero-grid" style="align-items: center;">
                <div>
                    <span class="section-badge">❤️ Cerita Gokidz</span>
                    <h2 style="font-size: 2.5rem; margin-bottom: 20px;">Menghadirkan Keamanan & Keceriaan Bagi Anak</h2>
                    <p style="color: var(--text-muted); font-size: 1.1rem; margin-bottom: 20px;">Gokidz lahir dari kekhawatiran para orang tua akan keselamatan anak saat berangkat dan pulang sekolah. Kami sadar bahwa perjalanan sekolah bukan sekadar memindahkan anak dari titik A ke titik B, melainkan juga bagian dari tumbuh kembang mereka.</p>
                    <p style="color: var(--text-muted); font-size: 1.1rem;">Oleh karena itu, Gokidz merancang konsep antar jemput sekolah ramah anak yang menyenangkan di dalam perjalanan, namun tetap memprioritaskan keamanan ketat sebagai standar utama operasional kami.</p>
                </div>
                <div style="background: var(--white); padding: 40px; border-radius: var(--radius-lg); box-shadow: var(--shadow-lg); border-left: 6px solid var(--primary)">
                    <h3 style="font-size: 1.5rem; color: var(--primary); margin-bottom: 15px;">Visi & Misi Kami</h3>
                    <p style="font-weight: 700; margin-bottom: 10px;">Visi:</p>
                    <p style="color: var(--text-muted); margin-bottom: 20px;">Menjadi mitra terpercaya orang tua nomor satu di Indonesia untuk transportasi anak sekolah yang aman dan edukatif.</p>
                    <p style="font-weight: 700; margin-bottom: 10px;">Misi:</p>
                    <ul style="color: var(--text-muted); padding-left: 20px; display: flex; flex-direction: column; gap: 8px;">
                        <li>Menerapkan protokol keselamatan jalan raya berstandar internasional.</li>
                        <li>Melatih driver dan pendamping secara berkala dalam penanganan anak dan P3K.</li>
                        <li>Menciptakan ekosistem perjalanan sekolah yang bersih, ceria, dan bebas perundungan (bullying).</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Standar Keamanan Prosedur -->
    <section class="section">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">🛡️ Protokol 5S</span>
                <h2>Standar Keamanan Armada & Kru</h2>
                <p>Keselamatan anak Anda adalah prioritas mutlak kami. Setiap rute dipantau dengan protokol ketat.</p>
            </div>
            
            <div class="features-grid">
                <div class="feature-card orange">
                    <div style="font-size: 2.2rem; margin-bottom: 15px;">🔍</div>
                    <h3>Seleksi & Latar Belakang</h3>
                    <p>Semua kru driver dan pendamping wajib melewati tes kesehatan medis, tes narkoba, serta pemeriksaan latar belakang kriminal dan kepribadian (SKCK).</p>
                </div>
                
                <div class="feature-card blue">
                    <div style="font-size: 2.2rem; margin-bottom: 15px;">🛡️</div>
                    <h3>Sabuk Pengaman & Child Lock</h3>
                    <p>Pintu mobil terkunci otomatis dengan fitur Child Safety Lock. Kursi depan dibatasi, dan anak-anak balita disediakan kursi khusus (car seat).</p>
                </div>
                
                <div class="feature-card yellow">
                    <div style="font-size: 2.2rem; margin-bottom: 15px;">🧰</div>
                    <h3>Pemeriksaan Harian Armada</h3>
                    <p>Kendaraan kami diservis berkala di bengkel resmi. Setiap pagi driver melakukan inspeksi rem, ban, lampu, AC, serta kebersihan kabin.</p>
                </div>
                
                <div class="feature-card green">
                    <div style="font-size: 2.2rem; margin-bottom: 15px;">🩹</div>
                    <h3>Pelatihan P3K & Medis</h3>
                    <p>Kru pendamping kami dibekali keterampilan Pertolongan Pertama Pada Kecelakaan dan CPR khusus anak-anak untuk mengantisipasi keadaan darurat.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Driver Team Grid -->
    <section class="section" style="background-color: var(--white); border-top: 3px solid var(--primary-light)">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">🧑‍✈️ Kru Gokidz</span>
                <h2>Berkenalan Dengan Tim Gokidz</h2>
                <p>Inilah wajah-wajah ramah yang menyapa buah hati Anda setiap pagi dan sore hari.</p>
            </div>
            
            <div class="team-grid">
                <!-- Driver 1 -->
                <div class="team-card">
                    <div class="team-avatar">👨‍✈️</div>
                    <h3>Pak Budi Santoso</h3>
                    <span class="team-badge">Driver Profesional</span>
                    <p style="color: var(--text-muted); font-size: 0.9rem">Berpengalaman berkendara selama lebih dari 12 tahun dengan catatan mengemudi yang bersih dan bersertifikat Defensive Driving.</p>
                </div>
                
                <!-- Driver 2 -->
                <div class="team-card">
                    <div class="team-avatar">👩</div>
                    <h3>Kak Indah Lestari</h3>
                    <span class="team-badge">Pendamping Armada</span>
                    <p style="color: var(--text-muted); font-size: 0.9rem">Lulusan Pendidikan Guru PAUD, sangat menyukai anak-anak, telaten membimbing balita masuk dan keluar dari kendaraan.</p>
                </div>
                
                <!-- Driver 3 -->
                <div class="team-card">
                    <div class="team-avatar">👨</div>
                    <h3>Kak Soni Irawan</h3>
                    <span class="team-badge">Pendamping & Rescue Team</span>
                    <p style="color: var(--text-muted); font-size: 0.9rem">Kru tanggap darurat yang menguasai teknik P3K bersertifikat PMI dan bertanggung jawab memastikan kepatuhan protokol keamanan.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
