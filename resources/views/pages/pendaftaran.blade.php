@extends('layouts.app')

@section('title', 'Ketentuan & Pendaftaran Antar Jemput Sekolah - Gokidz')

@section('styles')
    <style>
        /* Custom styles for the new split layout */
        .register-layout {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 40px;
            align-items: stretch;
            margin-top: 30px;
        }

        /* Terms Left Column Styles */
        .terms-box {
            background: var(--white);
            border-radius: var(--radius-lg);
            box-shadow: var(--shadow-md);
            border: 3px solid var(--secondary-light);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            height: 100%;
        }

        .terms-header {
            background: linear-gradient(135deg, var(--secondary) 0%, #1d4ed8 100%);
            padding: 30px;
            color: var(--white);
        }

        .terms-header h3 {
            color: var(--white);
            margin-bottom: 5px;
            font-size: 1.6rem;
        }

        .terms-header p {
            color: rgba(255, 255, 255, 0.9);
            font-size: 0.9rem;
        }

        /* Tabs System */
        .terms-tabs {
            display: flex;
            border-bottom: 2px solid var(--secondary-light);
            background: var(--bg-main);
        }

        .tab-btn {
            flex: 1;
            padding: 15px 10px;
            border: none;
            background: transparent;
            font-family: 'Fredoka', sans-serif;
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--text-muted);
            cursor: pointer;
            transition: var(--transition);
            text-align: center;
            outline: none;
        }

        .tab-btn:hover {
            color: var(--secondary);
            background: var(--secondary-light);
        }

        .tab-btn.active {
            color: var(--secondary);
            background: var(--white);
            border-bottom: 4px solid var(--secondary);
        }

        .tab-content {
            display: none;
            padding: 30px;
            overflow-y: auto;
        }

        .tab-content.active {
            display: flex;
            flex-direction: column;
            flex-grow: 1;
        }

        /* Terms list styling */
        .terms-list {
            list-style: none;
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .terms-list li {
            display: grid;
            grid-template-columns: 220px 1fr;
            gap: 10px;
            align-items: start;
            font-size: 0.95rem;
            line-height: 1.6;
        }

        .terms-list li .term-title {
            font-weight: 700;
            color: var(--text-main);
            position: relative;
            padding-left: 26px;
        }

        .terms-list li .term-title::before {
            content: '✓';
            position: absolute;
            left: 0;
            top: 3px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 18px;
            height: 18px;
            background: var(--secondary-light);
            color: var(--secondary);
            border-radius: 50%;
            font-size: 0.7rem;
            font-weight: bold;
        }

        @media (max-width: 768px) {
            .terms-list li {
                grid-template-columns: 1fr;
                gap: 2px;
            }
            .term-title {
                margin-bottom: 2px;
            }
        }

        /* Custom Tables */
        .terms-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            margin-bottom: 20px;
            font-size: 0.9rem;
        }

        .terms-table th,
        .terms-table td {
            border: 1px solid #E2E8F0;
            padding: 10px 14px;
            text-align: left;
        }

        .terms-table th {
            background: var(--bg-main);
            font-weight: 700;
            color: var(--text-main);
        }

        .section-title {
            color: var(--secondary);
            font-size: 1.15rem;
            margin-top: 20px;
            margin-bottom: 10px;
            border-bottom: 2px solid var(--secondary-light);
            padding-bottom: 6px;
        }

        .section-title:first-child {
            margin-top: 0;
        }

        /* Right Column: Form Enhancements */
        .custom-radio-group {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            margin-top: 5px;
        }

        .custom-radio-card {
            border: 2px solid #E2E8F0;
            border-radius: var(--radius-sm);
            padding: 12px 15px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 10px;
            transition: var(--transition);
            font-weight: 700;
            color: var(--text-main);
        }

        .custom-radio-card:hover {
            border-color: var(--primary);
            background: var(--primary-light);
        }

        .custom-radio-card input[type="radio"] {
            accent-color: var(--primary);
            width: 18px;
            height: 18px;
            cursor: pointer;
        }

        .custom-radio-card.active {
            border-color: var(--primary);
            background-color: var(--primary-light);
            box-shadow: 0 0 0 1px var(--primary);
        }

        .shuttle-select-group {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        .shuttle-card {
            border: 2px solid #E2E8F0;
            border-radius: var(--radius-sm);
            padding: 15px;
            cursor: pointer;
            display: flex;
            gap: 12px;
            align-items: flex-start;
            transition: var(--transition);
        }

        .shuttle-card:hover {
            border-color: var(--primary);
            background: var(--primary-light);
        }

        .shuttle-card input[type="radio"] {
            accent-color: var(--primary);
            width: 18px;
            height: 18px;
            margin-top: 3px;
            cursor: pointer;
        }

        .shuttle-card.active {
            border-color: var(--primary);
            background-color: var(--primary-light);
        }

        .shuttle-card-info h4 {
            font-size: 0.95rem;
            margin-bottom: 2px;
            font-family: 'Nunito', sans-serif;
        }

        .shuttle-card-info p {
            font-size: 0.8rem;
            color: var(--text-muted);
            line-height: 1.4;
        }

        .agreement-box {
            display: flex;
            gap: 12px;
            align-items: flex-start;
            margin-top: 25px;
            margin-bottom: 20px;
            padding: 12px;
            border-radius: var(--radius-sm);
            background: var(--secondary-light);
            border: 1px solid rgba(59, 130, 246, 0.2);
        }

        .agreement-box input {
            margin-top: 4px;
            width: 18px;
            height: 18px;
            accent-color: var(--secondary);
            cursor: pointer;
        }

        .agreement-box label {
            font-size: 0.85rem;
            color: var(--text-main);
            font-weight: 600;
            cursor: pointer;
            line-height: 1.5;
        }

        /* ===== RESPONSIVE ===== */

        /* Tablet: stack two columns vertically */
        @media (max-width: 992px) {
            .register-layout {
                grid-template-columns: 1fr;
                gap: 30px;
            }

            .tab-content {
                max-height: none;
                padding: 20px;
            }

            .terms-header {
                padding: 20px;
            }

            .terms-header h3 {
                font-size: 1.3rem;
            }

            /* Scrollable tables on tablet */
            .terms-table {
                display: block;
                overflow-x: auto;
                -webkit-overflow-scrolling: touch;
                white-space: nowrap;
            }
        }

        /* Mobile phones */
        @media (max-width: 600px) {
            /* Tab buttons smaller on mobile */
            .tab-btn {
                padding: 10px 4px;
                font-size: 0.78rem;
            }

            /* Inline child name + class grid -> single column */
            .child-name-class-grid {
                grid-template-columns: 1fr !important;
            }

            /* Gender radio cards -> single column */
            .custom-radio-group {
                grid-template-columns: 1fr;
            }

            /* Section badge & header padding */
            .section-header p {
                font-size: 0.9rem;
            }

            /* Reduce box padding */
            .booking-form-box {
                padding: 20px 15px;
            }

            .terms-table {
                font-size: 0.8rem;
            }

            .terms-table th,
            .terms-table td {
                padding: 7px 9px;
            }
        }
    </style>
@endsection

@section('content')

    <section class="section" style="background: linear-gradient(135deg, var(--primary-light) 0%, #FFF 100%)">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">📝 PENDAFTARAN TP. 2026/2027</span>
                <h2>Pendaftaran Antar-Jemput SDI Abu Dzar</h2>
                <p>Silakan baca Ketentuan Peserta Antar-Jemput di bawah ini secara saksama sebelum mengisi formulir
                    registrasi.</p>
            </div>

            <div class="register-layout">
                <!-- Left Column: Terms & Conditions -->
                <div class="terms-box">
                    <div class="terms-header">
                        <h3>Ketentuan & Informasi Peserta</h3>
                        <p>SD Islam Abu Dzar - Tahun Pelajaran 2026/2027</p>
                    </div>

                    <!-- Navigation Tabs -->
                    <div class="terms-tabs">
                        <button class="tab-btn active" onclick="switchTab(event, 'tab-umum')">📋 Umum</button>
                        <button class="tab-btn" onclick="switchTab(event, 'tab-tarif')">💰 Tarif & Bayar</button>
                        <button class="tab-btn" onclick="switchTab(event, 'tab-jadwal')">🚌 Rute & Jadwal</button>
                    </div>

                    <!-- Tab 1: Ketentuan Umum -->
                    <div id="tab-umum" class="tab-content active">
                        <h4 class="section-title">Ketentuan Umum Pendaftaran</h4>
                        <ul class="terms-list">
                            <li><span class="term-title">Pengelola</span><span class="term-text">Pengelola Antar-Jemput
                                    (Anput) adalah Unit usaha Yayasan ("unit usaha").</span></li>
                            <li><span class="term-title">Prosedur</span><span class="term-text">Pendaftaran/pengunduran diri
                                    dilakukan secara tertulis melalui Front liner / Bagian Administrasi Sekolah atau
                                    fasilitas online ini.</span></li>
                            <li><span class="term-title">Pernyataan</span><span class="term-text">Orang tua/wali mengisi
                                    formulir pendaftaran secara sadar dan bersedia mengikuti semua ketentuan yang
                                    berlaku.</span></li>
                            <li><span class="term-title">Masa Berlaku</span><span class="term-text">Murid akan tetap
                                    terdaftar sebagai peserta untuk 1 (satu) tahun ajaran penuh, kecuali kondisi khusus
                                    dengan persetujuan tertulis Admin.</span></li>
                            <li><span class="term-title">Daftar Ulang</span><span class="term-text">Wali Murid wajib
                                    melakukan Daftar Ulang setiap akhir tahun ajaran untuk kesertaan di tahun
                                    berikutnya.</span></li>
                            <li><span class="term-title">Tanda Pengenal</span><span class="term-text">Sekolah akan
                                    menyiapkan *Name Tag* Khusus bagi siswa yang terdaftar mengikuti antar jemput
                                    sekolah.</span></li>
                            <li><span class="term-title">Pendamping (Wali/Pengasuh)</span><span class="term-text">Jika orang
                                    tua/wali/pengasuh akan ikut naik armada, wajib memberitahu Admin/Driver dan dikenakan
                                    tarif setara dengan murid.</span></li>
                            <li><span class="term-title">Toleransi Tunggu</span><span class="term-text">Driver hanya
                                    menunggu maksimal 5 menit di titik jemput. Lewat dari itu, armada akan berangkat demi
                                    ketepatan jadwal siswa lain.</span></li>
                        </ul>

                        <h4 class="section-title" style="margin-top: 25px;">Alur Pendaftaran Baru</h4>
                        <table class="terms-table">
                            <thead>
                                <tr>
                                    <th style="width: 20%">Tahap</th>
                                    <th>Aktivitas</th>
                                    <th>Estimasi Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>1. Daftar</strong></td>
                                    <td>Mengisi formulir pendaftaran ini (autofill untuk sekolah SDI Abu Dzar)</td>
                                    <td>Langsung</td>
                                </tr>
                                <tr>
                                    <td><strong>2. Mapping</strong></td>
                                    <td>Pemetaan rute & titik penjemputan oleh tim operasional</td>
                                    <td>Maks. 2 Hari Kerja</td>
                                </tr>
                                <tr>
                                    <td><strong>3. Konfirmasi</strong></td>
                                    <td>Informasi biaya final & penugasan driver kepada wali murid</td>
                                    <td>Hari Ke-3</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- Tab 2: Ketentuan Tarif & Pembayaran -->
                    <div id="tab-tarif" class="tab-content">
                        <h4 class="section-title">Ketentuan Pembayaran</h4>
                        <ul class="terms-list" style="margin-bottom: 20px;">
                            <li><span class="term-title">Jatuh Tempo</span><span class="term-text">Pembayaran dimuka setiap
                                    bulan maksimal di tanggal 10</span></li>
                            <li><span class="term-title">Tindakan Keterlambatan</span><span class="term-text">Apabila lewat
                                    bulan bersangkutan tagihan belum dilunasi, pelayanan dihentikan sementara sampai tagihan
                                    diselesaikan.</span></li>
                            <li><span class="term-title">Sistem Pembayaran</span><span class="term-text">Dilakukan
                                    terintegrasi bersamaan dengan pembayaran biaya Sekolah melalui sistem Adzsys</span></li>
                            <li><span class="term-title">Diskon Saudara Kandung</span><span class="term-text">Kepesertaan 2
                                    atau lebih saudara kandung dengan alamat & tujuan sekolah sama mendapatkan potongan
                                    tarif 10%</span></li>
                        </ul>

                        <h4 class="section-title">Daftar Tarif Bulanan (TP. 2026/2027)</h4>
                        <table class="terms-table">
                            <thead>
                                <tr>
                                    <th>Golongan</th>
                                    <th>Jarak Tempuh</th>
                                    <th>Tarif Bulanan (PP)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Golongan I</strong></td>
                                    <td>Jarak dekat &lt; 3 KM</td>
                                    <td><strong>Rp 800.000</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Golongan II</strong></td>
                                    <td>Jarak sedang &gt; 3 - 6 KM</td>
                                    <td><strong>Rp 900.000</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Golongan III</strong></td>
                                    <td>Jarak jauh &gt; 7 - 9 KM</td>
                                    <td><strong>Rp 1.000.000</strong></td>
                                </tr>
                                <tr>
                                    <td><strong>Golongan IV</strong></td>
                                    <td>Jarak luar batas &gt; 9 KM</td>
                                    <td>Tarif Gol. III + Rp 25.000 / KM tambahan</td>
                                </tr>
                            </tbody>
                        </table>

                        <h4 class="section-title">Ketentuan Paket Tarif</h4>
                        <ul class="terms-list">
                            <li><span class="term-title">Layanan Satu Arah</span><span class="term-text">Bagi murid yang
                                    hanya ikut antar (pulang) atau jemput (pergi) saja, membayar <strong>75%</strong> dari
                                    tarif PP.</span></li>
                            <li><span class="term-title">Hadir Penuh (&ge; 6 Hari KBM)</span><span class="term-text">Hadir 6
                                    s.d. 23 hari KBM atau lebih membayar tarif penuh <strong>100%</strong>.</span></li>
                            <li><span class="term-title">Hadir Terbatas (1 - 5 Hari KBM)</span><span
                                    class="term-text">Penggunaan 1 s.d. 5 hari KBM membayar sebesar
                                    <strong>50%</strong>.</span></li>
                        </ul>
                    </div>

                    <!-- Tab 3: Rute & Jadwal Penjemputan -->
                    <div id="tab-jadwal" class="tab-content">
                        <h4 class="section-title">Sistem & Waktu Penjemputan</h4>
                        <ul class="terms-list" style="margin-bottom: 20px;">
                            <li><span class="term-title">Urutan Rute</span><span class="term-text">Penjemputan pagi dimulai
                                    dari rute terjauh. Pengantaran pulang dimulai dari rute terdekat.</span></li>
                            <li><span class="term-title">Ketepatan Waktu</span><span class="term-text">Murid wajib siap di
                                    lokasi penjemputan sebelum mobil tiba. Kesepakatan jam penjemputan dibuat bersama
                                    driver.</span></li>
                            <li><span class="term-title">Toleransi Tunggu</span><span class="term-text">Driver hanya
                                    menunggu maksimal <strong>5 menit</strong> di titik jemput. Lewat dari itu, armada akan
                                    berangkat demi ketepatan jadwal siswa lain.</span></li>
                            <li><span class="term-title">Hari Kerja</span><span class="term-text">Operasional berjalan 5
                                    hari seminggu (Senin - Jumat).</span></li>
                            <li><span class="term-title">Barang Berharga</span><span class="term-text">Dilarang membawa
                                    barang berharga di luar kebutuhan sekolah. Risiko kehilangan bukan tanggung jawab
                                    pengelola.</span></li>
                            <li><span class="term-title">Kesehatan & Sakit</span><span class="term-text">Jika murid
                                    berhalangan hadir/sakit, wali murid wajib memberikan informasi ke Admin/Driver terkait
                                    sebelum jam penjemputan.</span></li>
                        </ul>

                        <h4 class="section-title">Jadwal Kepulangan Siswa SDI Abu Dzar</h4>
                        <table class="terms-table">
                            <thead>
                                <tr>
                                    <th>Level Kelas</th>
                                    <th>Hari</th>
                                    <th>Masuk</th>
                                    <th>Pulang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="2"><strong>Kelas I & II</strong></td>
                                    <td>Senin - Kamis</td>
                                    <td>08.00</td>
                                    <td><strong>13.15</strong></td>
                                </tr>
                                <tr>
                                    <td>Jumat</td>
                                    <td>08.00</td>
                                    <td><strong>11.15</strong></td>
                                </tr>
                                <tr>
                                    <td rowspan="3"><strong>Kelas III & IV</strong></td>
                                    <td>Senin - Rabu</td>
                                    <td>08.00</td>
                                    <td><strong>14.25</strong></td>
                                </tr>
                                <tr>
                                    <td>Kamis</td>
                                    <td>08.00</td>
                                    <td><strong>13.50</strong></td>
                                </tr>
                                <tr>
                                    <td>Jumat</td>
                                    <td>08.00</td>
                                    <td><strong>11.15</strong></td>
                                </tr>
                                <tr>
                                    <td rowspan="3"><strong>Kelas V & VI</strong></td>
                                    <td>Senin - Rabu</td>
                                    <td>08.00</td>
                                    <td><strong>15.00</strong></td>
                                </tr>
                                <tr>
                                    <td>Kamis</td>
                                    <td>08.00</td>
                                    <td><strong>14.25</strong></td>
                                </tr>
                                <tr>
                                    <td>Jumat</td>
                                    <td>08.00</td>
                                    <td><strong>12.50</strong></td>
                                </tr>
                            </tbody>
                        </table>

                        <h4 class="section-title">Kegiatan Mandiri & Khusus</h4>
                        <ul class="terms-list">
                            <li><strong>Ekskul / Jam Tambahan:</strong> Jika kepulangan murid tidak mengikuti jadwal normal
                                (Remedial, ekskul, les tambahan sekolah), dikenakan tarif tambahan sebesar <strong>Rp 25.000
                                    per kehadiran</strong>.</li>
                            <li><strong>Hari Libur:</strong> Kegiatan anput di luar hari kerja efektif (Sabtu/Minggu/Hari
                                Libur Nasional) tidak dilayani oleh pengelola.</li>
                        </ul>
                    </div>
                </div>

                <!-- Right Column: Registration Form -->
                <div class="booking-form-box">
                    <h3>Formulir Registrasi Siswa</h3>

                    @if ($errors->any())
                        <div class="error-list">
                            <strong>Oops! Silakan cek kembali inputan Anda:</strong>
                            <ul style="margin-top: 5px; padding-left: 15px;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('booking.store') }}" method="POST" id="registration-form">
                        @csrf

                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="parent_name">Nama Wali Siswa *</label>
                            <input type="text" id="parent_name" name="parent_name" value="{{ old('parent_name') }}"
                                placeholder="Tuliskan nama lengkap wali siswa" required>
                        </div>

                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="parent_phone">Nomor HP/WA Aktif *</label>
                            <input type="text" id="parent_phone" name="parent_phone" value="{{ old('parent_phone') }}"
                                placeholder="Contoh: 0812XXXXXXXX (wajib WhatsApp aktif)" required>
                        </div>

                        <div class="child-name-class-grid" style="display: grid; grid-template-columns: 1.2fr 0.8fr; gap: 20px; margin-bottom: 20px;">
                            <div class="form-group">
                                <label for="child_name">Nama Lengkap Siswa *</label>
                                <input type="text" id="child_name" name="child_name" value="{{ old('child_name') }}"
                                    placeholder="Tuliskan nama lengkap siswa" required>
                            </div>

                            <div class="form-group">
                                <label for="child_class">Kelas *</label>
                                <input type="text" id="child_class" name="child_class" value="{{ old('child_class') }}"
                                    placeholder="Contoh: 1-A / 4-B" required>
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 20px;">
                            <label>Jenis Kelamin Siswa *</label>
                            <div class="custom-radio-group">
                                <label class="custom-radio-card {{ old('child_gender') == 'Laki-laki' ? 'active' : '' }}"
                                    onclick="selectGender(this)">
                                    <input type="radio" name="child_gender" value="Laki-laki" {{ old('child_gender') == 'Laki-laki' ? 'checked' : '' }} required>
                                    👦 Laki-laki
                                </label>
                                <label class="custom-radio-card {{ old('child_gender') == 'Perempuan' ? 'active' : '' }}"
                                    onclick="selectGender(this)">
                                    <input type="radio" name="child_gender" value="Perempuan" {{ old('child_gender') == 'Perempuan' ? 'checked' : '' }} required>
                                    👧 Perempuan
                                </label>
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 20px;">
                            <label>Pilihan Layanan Jemputan *</label>
                            <div class="shuttle-select-group">
                                <label
                                    class="shuttle-card {{ old('shuttle_type', 'round_trip') == 'round_trip' ? 'active' : '' }}"
                                    onclick="selectShuttle(this)">
                                    <input type="radio" name="shuttle_type" value="round_trip" {{ old('shuttle_type', 'round_trip') == 'round_trip' ? 'checked' : '' }} required>
                                    <div class="shuttle-card-info">
                                        <h4>🔄 Pulang-Pergi (Antar & Jemput)</h4>
                                        <p>Layanan penuh dari rumah ke sekolah (pagi) dan sekolah ke rumah (siang/sore).</p>
                                    </div>
                                </label>

                                <label class="shuttle-card {{ old('shuttle_type') == 'morning_only' ? 'active' : '' }}"
                                    onclick="selectShuttle(this)">
                                    <input type="radio" name="shuttle_type" value="morning_only" {{ old('shuttle_type') == 'morning_only' ? 'checked' : '' }} required>
                                    <div class="shuttle-card-info">
                                        <h4>☀️ Hanya Berangkat (Pergi Pagi)</h4>
                                        <p>Hanya penjemputan dari rumah menuju sekolah di pagi hari. Dikenakan tarif 75%.
                                        </p>
                                    </div>
                                </label>

                                <label class="shuttle-card {{ old('shuttle_type') == 'afternoon_only' ? 'active' : '' }}"
                                    onclick="selectShuttle(this)">
                                    <input type="radio" name="shuttle_type" value="afternoon_only" {{ old('shuttle_type') == 'afternoon_only' ? 'checked' : '' }} required>
                                    <div class="shuttle-card-info">
                                        <h4>🌙 Hanya Pulang (Siang/Sore)</h4>
                                        <p>Hanya pengantaran dari sekolah kembali ke rumah. Dikenakan tarif 75%.</p>
                                    </div>
                                </label>
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 20px;">
                            <label for="pickup_address">Alamat Lengkap Rumah *</label>
                            <textarea id="pickup_address" name="pickup_address" rows="3"
                                placeholder="Masukkan alamat tinggal lengkap beserta kelurahan, kecamatan, dan patokan rumah..."
                                required>{{ old('pickup_address') }}</textarea>
                        </div>

                        <div class="form-group" style="margin-bottom: 10px;">
                            <label for="extracurricular">Kegiatan Ekskul / Les di Sekolah (Opsional)</label>
                            <textarea id="extracurricular" name="extracurricular" rows="2"
                                placeholder="Sebutkan kegiatan ekskul / les di sekolah beserta hari pelaksanaan (jika ada)...">{{ old('extracurricular') }}</textarea>
                        </div>

                        <!-- Agreement Checkbox -->
                        <div class="agreement-box">
                            <input type="checkbox" id="agree-terms" required>
                            <label for="agree-terms">Saya menyatakan data di atas benar dan saya bersedia mengikuti
                                Ketentuan Pendaftaran Antar-Jemput SDI Abu Dzar TP. 2026/2027.</label>
                        </div>

                        <button type="submit" class="cta-btn"
                            style="width: 100%; padding: 15px; font-size: 1.15rem; border: none; border-radius: var(--radius-sm)">
                            Kirim Formulir Pendaftaran
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script>
        // Tab switching functionality
        function switchTab(evt, tabId) {
            // Hide all tab contents
            const tabContents = document.getElementsByClassName("tab-content");
            for (let i = 0; i < tabContents.length; i++) {
                tabContents[i].classList.remove("active");
            }

            // Deactivate all tab buttons
            const tabBtns = document.getElementsByClassName("tab-btn");
            for (let i = 0; i < tabBtns.length; i++) {
                tabBtns[i].classList.remove("active");
            }

            // Show current tab and set active style
            document.getElementById(tabId).classList.add("active");
            evt.currentTarget.classList.add("active");
        }

        // Gender card selection visual highlight
        function selectGender(card) {
            // Remove active class from all gender cards
            const cards = card.closest('.custom-radio-group').querySelectorAll('.custom-radio-card');
            cards.forEach(c => c.classList.remove('active'));

            // Add active class and check radio
            card.classList.add('active');
            const input = card.querySelector('input[type="radio"]');
            input.checked = true;
        }

        // Shuttle card selection visual highlight
        function selectShuttle(card) {
            // Remove active class from all shuttle cards
            const cards = card.closest('.shuttle-select-group').querySelectorAll('.shuttle-card');
            cards.forEach(c => c.classList.remove('active'));

            // Add active class and check radio
            card.classList.add('active');
            const input = card.querySelector('input[type="radio"]');
            input.checked = true;
        }

        // Pre-select styling if old values exist
        document.addEventListener('DOMContentLoaded', function () {
            const checkedGender = document.querySelector('input[name="child_gender"]:checked');
            if (checkedGender) {
                checkedGender.closest('.custom-radio-card').classList.add('active');
            }

            const checkedShuttle = document.querySelector('input[name="shuttle_type"]:checked');
            if (checkedShuttle) {
                checkedShuttle.closest('.shuttle-card').classList.add('active');
            }
        });
    </script>
@endsection