@extends('layouts.app')

@section('title', 'Tarif & Layanan Antar Jemput Sekolah - Gokidz')

@section('content')

    <section class="section" style="background: linear-gradient(to bottom, var(--secondary-light) 0%, var(--bg-main) 100%)">
        <div class="container">
            <div class="section-header">
                <span class="section-badge">💰 Tarif Bersahabat</span>
                <h2>Pilihan Paket Layanan Gokidz</h2>
                <p>Pilih paket berlangganan antar jemput yang paling pas untuk kebutuhan sekolah buah hati Anda.</p>
            </div>
            
            <div class="pricing-grid">
                <!-- Paket Harian -->
                <div class="pricing-card">
                    <h3 class="pricing-title">Paket Harian</h3>
                    <div class="pricing-price">Rp 45.000 <span>/ hari</span></div>
                    <p style="color: var(--text-muted); margin-bottom: 20px; font-size: 0.9rem">Pilihan fleksibel jika Ayah & Bunda memiliki urusan mendadak.</p>
                    <ul class="pricing-features">
                        <li>Jarak maksimal 8 Km</li>
                        <li>Antar & Jemput (Pulang Pergi)</li>
                        <li>Notifikasi real-time via Gokidz web apps</li>
                        <li>Driver berlisensi profesional</li>
                        <li>Armada ber-AC & bersih</li>
                    </ul>
                    <a href="{{ route('kontak') }}" class="cta-btn" style="text-align: center; margin-top: auto">Pilih Paket</a>
                </div>

                <!-- Paket Bulanan (Dekat) -->
                <div class="pricing-card featured">
                    <h3 class="pricing-title">Bulanan (Dekat)</h3>
                    <div class="pricing-price">Rp 650.000 <span>/ bulan</span></div>
                    <p style="color: var(--text-muted); margin-bottom: 20px; font-size: 0.9rem">Paling disukai! Sangat ideal untuk rute sekolah dekat.</p>
                    <ul class="pricing-features">
                        <li>Jarak maksimal 5 Km</li>
                        <li>Antar & Jemput (Pulang Pergi)</li>
                        <li>Notifikasi real-time via Gokidz apps</li>
                        <li>Driver berpengalaman</li>
                        <li>Jaminan Keterlambatan</li>
                    </ul>
                    <a href="{{ route('kontak') }}" class="cta-btn" style="text-align: center; margin-top: auto">Pilih Paket</a>
                </div>

                <!-- Paket Bulanan (Jauh) -->
                <div class="pricing-card">
                    <h3 class="pricing-title">Bulanan (Jauh)</h3>
                    <div class="pricing-price">Rp 950.000 <span>/ bulan</span></div>
                    <p style="color: var(--text-muted); margin-bottom: 20px; font-size: 0.9rem">Layanan antar jemput rute jauh antar-kecamatan.</p>
                    <ul class="pricing-features">
                        <li>Jarak 5 Km s.d 12 Km</li>
                        <li>Antar & Jemput (Pulang Pergi)</li>
                        <li>Notifikasi real-time via Gokidz apps</li>
                        <li>Driver berpengalaman</li>
                    </ul>
                    <a href="{{ route('kontak') }}" class="cta-btn" style="text-align: center; margin-top: auto">Pilih Paket</a>
                </div>
            </div>

            <!-- Pricing Estimator Widget -->
            <div class="calc-wrapper">
                <h3 class="calc-title">🧮 Estimator Tarif Bulanan</h3>
                <p style="text-align: center; color: var(--text-muted); margin-bottom: 25px">Hitung perkiraan biaya langganan bulanan Anda sesuai jarak dan jenis jemputan.</p>
                
                <div class="calc-grid">
                    <div class="form-group">
                        <label for="distance-slider">Jarak Rumah ke Sekolah: <span id="distance-label" style="color: var(--primary)">5 Km</span></label>
                        <input type="range" id="distance-slider" min="1" max="15" value="5" step="1" style="cursor: pointer; accent-color: var(--primary)">
                        <span style="display:flex; justify-content: space-between; font-size: 0.8rem; color: var(--text-muted)">
                            <span>1 Km</span>
                            <span>15 Km</span>
                        </span>
                    </div>

                    <div class="form-group">
                        <label for="trip-type">Jenis Penjemputan</label>
                        <select id="trip-type">
                            <option value="round_trip">Pulang-Pergi (Antar & Jemput)</option>
                            <option value="one_way">Satu Arah Saja (Pergi / Pulang)</option>
                        </select>
                    </div>
                </div>

                <div class="calc-result">
                    <h4>Perkiraan Tarif Bulanan Anda:</h4>
                    <div class="calc-amount" id="calc-amount">Rp 650.000</div>
                    <p style="font-size: 0.8rem; color: var(--text-muted); margin-top: 10px">*Tarif ini hanyalah estimasi awal. Harga final ditentukan setelah survei rute oleh tim kami.</p>
                </div>
                
                <div style="text-align: center; margin-top: 25px">
                    <a href="{{ route('kontak') }}" class="cta-btn">Daftar Sekarang & Kunci Rute Anda</a>
                </div>
            </div>
        </div>
    </section>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const distanceSlider = document.getElementById('distance-slider');
        const distanceLabel = document.getElementById('distance-label');
        const tripTypeSelect = document.getElementById('trip-type');
        const calcAmount = document.getElementById('calc-amount');

        function calculatePrice() {
            const distance = parseInt(distanceSlider.value);
            const tripType = tripTypeSelect.value;
            
            distanceLabel.textContent = distance + ' Km';

            // Pricing logic
            let basePrice = 0;
            let kmMultiplier = 0;

            if (tripType === 'round_trip') {
                basePrice = 450000;
                // Add 40.000 per km
                kmMultiplier = 40000;
            } else {
                basePrice = 280000;
                // Add 25.000 per km
                kmMultiplier = 25000;
            }

            // Calculation: base + (distance * kmMultiplier)
            let totalPrice = basePrice + (distance * kmMultiplier);

            // Format number
            const formatter = new Intl.NumberFormat('id-ID', {
                style: 'currency',
                currency: 'IDR',
                minimumFractionDigits: 0,
                maximumFractionDigits: 0
            });

            calcAmount.textContent = formatter.format(totalPrice).replace('Rp', 'Rp ');
        }

        distanceSlider.addEventListener('input', calculatePrice);
        tripTypeSelect.addEventListener('change', calculatePrice);
        
        // Initial run
        calculatePrice();
    });
</script>
@endsection
