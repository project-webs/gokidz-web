@extends('layouts.app')

@section('title', 'Pendaftaran Antar Jemput Sekolah - Gokidz')

@section('content')

    <section class="section" style="background: linear-gradient(135deg, var(--primary-light) 0%, #FFF 100%)">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">📝 Pendaftaran</span>
                <h2>Hubungi Kami & Daftarkan Anak Anda</h2>
                <p>Isi formulir pendaftaran di bawah ini untuk memesan kursi antar jemput sekolah bagi buah hati Anda.</p>
            </div>

            <div class="contact-layout">
                <!-- Info Column -->
                <div class="contact-info">
                    <div class="info-item">
                        <div class="info-icon">📍</div>
                        <div class="info-content">
                            <h4>Kantor Pusat Gokidz</h4>
                            <p>Jl. Sumatera Gg.H.Bakri RT.003 / RW.007 Kampung Rawa Lele, Jombang, Kec. Ciputat, Kota Tangerang Selatan, Banten 15414</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">📞</div>
                        <div class="info-content">
                            <h4>Hubungi Layanan Pelanggan</h4>
                            <p>+62 895-3303-43600 (Senin - Jumat 07:00 - 17:00)</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">💬</div>
                        <div class="info-content">
                            <h4>WhatsApp Cepat</h4>
                            <p>+62 878-8765-4321 (Tanya jawab 24 Jam via Chat)</p>
                        </div>
                    </div>

                    <!-- Small FAQ for parents -->
                    <div style="background: var(--white); padding: 30px; border-radius: var(--radius-lg); box-shadow: var(--shadow-sm); border-top: 5px solid var(--secondary)">
                        <h3 style="font-size: 1.25rem; margin-bottom: 15px; color: var(--secondary)">❓ FAQ Singkat</h3>
                        <div style="display: flex; flex-direction: column; gap: 15px;">
                            <div>
                                <h4 style="font-size: 0.95rem; margin-bottom: 3px;">Kapan penjemputan dimulai?</h4>
                                <p style="font-size: 0.85rem; color: var(--text-muted)">Penjemputan disesuaikan dengan jam masuk sekolah anak, biasanya 45 - 60 menit sebelum bel berbunyi.</p>
                            </div>
                            <div>
                                <h4 style="font-size: 0.95rem; margin-bottom: 3px;">Bagaimana jika anak sakit?</h4>
                                <p style="font-size: 0.85rem; color: var(--text-muted)">Ayah & Bunda cukup memberi tahu kru pendamping via WhatsApp maksimal 1 jam sebelum jadwal jemput.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Form Column -->
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

                    <form action="{{ route('booking.store') }}" method="POST">
                        @csrf
                        
                        <div style="display: grid; grid-template-cols: 1fr 1fr; gap: 20px; margin-bottom: 20px;">
                            <div class="form-group">
                                <label for="parent_name">Nama Ayah / Bunda *</label>
                                <input type="text" id="parent_name" name="parent_name" value="{{ old('parent_name') }}" placeholder="Contoh: Riana Lestari" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="parent_phone">No. WhatsApp Aktif *</label>
                                <input type="text" id="parent_phone" name="parent_phone" value="{{ old('parent_phone') }}" placeholder="Contoh: 081234567890" required>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-cols: 1.5fr 0.5fr; gap: 20px; margin-bottom: 20px;">
                            <div class="form-group">
                                <label for="child_name">Nama Lengkap Anak *</label>
                                <input type="text" id="child_name" name="child_name" value="{{ old('child_name') }}" placeholder="Contoh: Kimi Wijaya" required>
                            </div>
                            
                            <div class="form-group">
                                <label for="child_age">Umur (Tahun) *</label>
                                <input type="number" id="child_age" name="child_age" min="2" max="18" value="{{ old('child_age', 6) }}" required>
                            </div>
                        </div>

                        <div style="display: grid; grid-template-cols: 1.1fr 0.9fr; gap: 20px; margin-bottom: 20px;">
                            <div class="form-group">
                                <label for="school_name">Nama Sekolah Anak *</label>
                                <input type="text" id="school_name" name="school_name" value="{{ old('school_name') }}" placeholder="Contoh: SD Nusantara 01" required>
                            </div>

                            <div class="form-group">
                                <label for="shuttle_type">Jenis Layanan Antar Jemput *</label>
                                <select id="shuttle_type" name="shuttle_type" required>
                                    <option value="round_trip" {{ old('shuttle_type') == 'round_trip' ? 'selected' : '' }}>Pulang-Pergi (Antar & Jemput)</option>
                                    <option value="morning_only" {{ old('shuttle_type') == 'morning_only' ? 'selected' : '' }}>Pergi Saja (Pagi Hari)</option>
                                    <option value="afternoon_only" {{ old('shuttle_type') == 'afternoon_only' ? 'selected' : '' }}>Pulang Saja (Sore Hari)</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 25px;">
                            <label for="pickup_address">Alamat Lengkap Rumah (Penjemputan) *</label>
                            <textarea id="pickup_address" name="pickup_address" rows="3" placeholder="Tuliskan alamat lengkap beserta patokan rumah Anda..." required>{{ old('pickup_address') }}</textarea>
                        </div>

                        <button type="submit" class="cta-btn" style="width: 100%; padding: 15px; font-size: 1.1rem; border: none; border-radius: var(--radius-sm)">
                            Kirim Formulir Pendaftaran 🚀
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
