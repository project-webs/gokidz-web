@extends('layouts.app')

@section('title', 'Hubungi Kami - Gokidz Shuttle')

@section('styles')
<style>
    /* Styling khusus Hubungi Kami */
    .contact-layout {
        display: grid;
        grid-template-columns: 1fr 1.2fr;
        gap: 40px;
        align-items: stretch;
        margin-top: 30px;
    }

    .contact-info-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 40px;
        box-shadow: var(--shadow-lg);
        border: 3px solid var(--primary-light);
        display: flex;
        flex-direction: column;
        gap: 30px;
    }

    .contact-form-card {
        background: var(--white);
        border-radius: var(--radius-lg);
        padding: 40px;
        box-shadow: var(--shadow-lg);
        border: 3px solid var(--secondary-light);
    }

    .info-item {
        display: flex;
        gap: 20px;
        align-items: flex-start;
    }

    .info-icon {
        width: 50px;
        height: 50px;
        border-radius: var(--radius-sm);
        background: var(--primary-light);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        flex-shrink: 0;
    }

    .info-content h4 {
        font-size: 1.1rem;
        margin-bottom: 5px;
        color: var(--text-main);
    }

    .info-content p {
        font-size: 0.95rem;
        color: var(--text-muted);
        line-height: 1.5;
    }

    /* Form control custom styling */
    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-weight: 700;
        margin-bottom: 8px;
        font-size: 0.95rem;
        color: var(--text-main);
    }

    .form-group input, .form-group select, .form-group textarea {
        width: 100%;
        padding: 12px 18px;
        border: 2px solid #E2E8F0;
        border-radius: var(--radius-sm);
        font-family: inherit;
        font-size: 0.95rem;
        transition: var(--transition);
        outline: none;
    }

    .form-group input:focus, .form-group select:focus, .form-group textarea:focus {
        border-color: var(--secondary);
        background: var(--secondary-light);
        box-shadow: 0 0 0 1px var(--secondary);
    }

    .submit-btn {
        background: var(--secondary);
        color: var(--white);
        font-weight: 700;
        padding: 12px 30px;
        border-radius: 50px;
        border: none;
        cursor: pointer;
        box-shadow: var(--shadow-md);
        transition: var(--transition);
        display: inline-block;
        width: 100%;
        text-align: center;
        font-size: 1rem;
    }

    .submit-btn:hover {
        background: #2563EB;
        transform: translateY(-3px) scale(1.02);
        box-shadow: 0 12px 20px -5px rgba(59, 130, 246, 0.35);
    }

    .social-links {
        display: flex;
        gap: 15px;
        margin-top: 10px;
    }

    .social-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--bg-main);
        color: var(--text-muted);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
        transition: var(--transition);
    }

    .social-icon:hover {
        background: var(--primary);
        color: var(--white);
        transform: translateY(-3px);
    }

    @media (max-width: 992px) {
        .contact-layout {
            grid-template-columns: 1fr;
            gap: 30px;
        }
    }
</style>
@endsection

@section('content')
    <section class="section" style="background: linear-gradient(135deg, var(--secondary-light) 0%, #FFF 100%)">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">&nbsp;📞 HUBUNGI KAMI&nbsp;</span>
                <h2>Hubungi Tim Layanan Gokidz</h2>
                <p>Ada pertanyaan mengenai rute, tarif, atau layanan kami? Silakan hubungi kami melalui form di bawah ini atau melalui kontak resmi kami.</p>
            </div>

            <div class="contact-layout">
                <!-- Left Column: Contact Info & Map -->
                <div class="contact-info-card">
                    <div>
                        <h3 style="font-size: 1.5rem; margin-bottom: 15px; color: var(--primary);">Informasi Kontak</h3>
                        <p style="color: var(--text-muted); font-size: 0.95rem;">Kami siap melayani kebutuhan transportasi sekolah buah hati Anda dengan sepenuh hati.</p>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">📍</div>
                        <div class="info-content">
                            <h4>Alamat Kantor</h4>
                            <p>Jl. Sumatera Gg.H.Bakri RT.003 / RW.007 Kampung Rawa Lele, Jombang, Kec. Ciputat, Kota Tangerang Selatan, Banten 15414</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">📞</div>
                        <div class="info-content">
                            <h4>WhatsApp & Telepon</h4>
                            <p>+62 895-3303-43600</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">✉️</div>
                        <div class="info-content">
                            <h4>Email Resmi</h4>
                            <p>info@gokidz.abudzargroup.id</p>
                        </div>
                    </div>

                    <div class="info-item">
                        <div class="info-icon">🕒</div>
                        <div class="info-content">
                            <h4>Jam Operasional</h4>
                            <p>Senin - Jumat: 07.00 - 17.00 WIB<br><small style="color: var(--text-muted)">Sabtu, Minggu & Hari Libur Nasional: Tutup</small></p>
                        </div>
                    </div>

                    <div>
                        <h4 style="font-size: 1rem; margin-bottom: 10px; color: var(--text-main);">Ikuti Media Sosial Kami</h4>
                        <div class="social-links">
                            <a href="#" class="social-icon" title="Instagram">📸</a>
                            <a href="#" class="social-icon" title="Facebook">👥</a>
                            <a href="#" class="social-icon" title="YouTube">📺</a>
                        </div>
                    </div>
                </div>

                <!-- Right Column: Contact Form -->
                <div class="contact-form-card">
                    <h3 style="font-size: 1.5rem; margin-bottom: 25px; color: var(--secondary);">Kirim Pesan Anda</h3>

                    @if(session('success'))
                        <div style="background-color: var(--accent-green-light); border: 2px solid var(--accent-green); color: var(--accent-green); padding: 15px 20px; border-radius: var(--radius-sm); margin-bottom: 25px; font-weight: 700; font-size: 0.95rem;">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('kontak.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Lengkap *</label>
                            <input type="text" name="name" id="name" placeholder="Tuliskan nama lengkap Anda" required value="{{ old('name') }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Alamat Email *</label>
                            <input type="email" name="email" id="email" placeholder="Contoh: nama@domain.com" required value="{{ old('email') }}">
                        </div>

                        <div class="form-group">
                            <label for="phone">Nomor WhatsApp Aktif *</label>
                            <input type="text" name="phone" id="phone" placeholder="Contoh: 0812XXXXXXXX" required value="{{ old('phone') }}">
                        </div>

                        <div class="form-group">
                            <label for="subject">Subjek Pesan *</label>
                            <select name="subject" id="subject" required>
                                <option value="" disabled selected>Pilih subjek pesan</option>
                                <option value="Tanya Rute & Tarif" {{ old('subject') == 'Tanya Rute & Tarif' ? 'selected' : '' }}>Tanya Rute & Tarif</option>
                                <option value="Keluhan Layanan" {{ old('subject') == 'Keluhan Layanan' ? 'selected' : '' }}>Keluhan Layanan</option>
                                <option value="Kemitraan Sekolah" {{ old('subject') == 'Kemitraan Sekolah' ? 'selected' : '' }}>Kemitraan Sekolah</option>
                                <option value="Lainnya" {{ old('subject') == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="message">Pesan Anda *</label>
                            <textarea name="message" id="message" rows="5" placeholder="Tuliskan detail pertanyaan atau pesan Anda di sini..." required>{{ old('message') }}</textarea>
                        </div>

                        <button type="submit" class="submit-btn">Kirim Pesan Sekarang 🚀</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
