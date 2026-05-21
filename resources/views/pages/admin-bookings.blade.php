@extends('layouts.app')

@section('title', 'Admin Dashboard Pendaftaran - Gokidz')

@section('content')

    <section class="section">
        <div class="container">
            <div class="admin-title-row">
                <div>
                    <span class="section-badge">📊 Data Internal</span>
                    <h2>Daftar Pendaftaran Calon Siswa</h2>
                    <p>Halaman ini menampilkan seluruh data pendaftaran yang tersimpan di dalam database SQLite.</p>
                </div>
                <a href="{{ route('kontak') }}" class="cta-btn">+ Tambah Pendaftaran</a>
            </div>

            @if(session('success'))
                <div style="background-color: var(--accent-green-light); border: 2px solid var(--accent-green); color: var(--accent-green); padding: 15px 20px; border-radius: var(--radius-sm); margin-bottom: 30px; font-weight: 700;">
                    {{ session('success') }}
                </div>
            @endif

            @if($bookings->isEmpty())
                <div style="background: var(--white); padding: 60px 40px; border-radius: var(--radius-lg); text-align: center; box-shadow: var(--shadow-sm); border: 3px dashed var(--primary-light)">
                    <div style="font-size: 3rem; margin-bottom: 20px;">📭</div>
                    <h3 style="font-size: 1.5rem; margin-bottom: 10px;">Belum Ada Pendaftaran</h3>
                    <p style="color: var(--text-muted); margin-bottom: 30px; max-width: 500px; margin-left: auto; margin-right: auto;">
                        Belum ada orang tua murid yang mengisi formulir registrasi. Silakan coba mendaftar terlebih dahulu di halaman Hubungi Kami.
                    </p>
                    <a href="{{ route('kontak') }}" class="cta-btn">Mulai Uji Coba Pendaftaran</a>
                </div>
            @else
                <div class="table-wrapper">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Orang Tua</th>
                                <th>Anak (Umur)</th>
                                <th>Sekolah</th>
                                <th>Alamat Jemput</th>
                                <th>Layanan</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($bookings as $booking)
                                <tr>
                                    <td style="color: var(--text-muted); font-size: 0.85rem">
                                        {{ $booking->created_at->format('d M Y') }}<br>
                                        {{ $booking->created_at->format('H:i') }} WIB
                                    </td>
                                    <td>
                                        <strong>{{ $booking->parent_name }}</strong><br>
                                        <span style="color: var(--text-muted); font-size: 0.85rem">{{ $booking->parent_phone }}</span>
                                    </td>
                                    <td>
                                        <strong>{{ $booking->child_name }}</strong><br>
                                        <span style="color: var(--text-muted); font-size: 0.85rem">{{ $booking->child_age }} tahun</span>
                                    </td>
                                    <td>{{ $booking->school_name }}</td>
                                    <td style="max-width: 250px; font-size: 0.85rem; color: var(--text-muted)">
                                        {{ $booking->pickup_address }}
                                    </td>
                                    <td>
                                        @if($booking->shuttle_type == 'round_trip')
                                            <span style="background: var(--primary-light); color: var(--primary); padding: 4px 10px; border-radius: 50px; font-size: 0.8rem; font-weight: 700;">Pulang-Pergi</span>
                                        @elseif($booking->shuttle_type == 'morning_only')
                                            <span style="background: var(--secondary-light); color: var(--secondary); padding: 4px 10px; border-radius: 50px; font-size: 0.8rem; font-weight: 700;">Pergi Pagi</span>
                                        @else
                                            <span style="background: #FCE7F3; color: #DB2777; padding: 4px 10px; border-radius: 50px; font-size: 0.8rem; font-weight: 700;">Pulang Sore</span>
                                        @endif
                                    </td>
                                    <td>
                                        <span class="status-badge {{ $booking->status }}">
                                            {{ $booking->status == 'pending' ? 'Tertunda' : $booking->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->parent_phone) }}?text=Halo%20{{ urlencode($booking->parent_name) }},%20kami%20dari%20Gokidz%20ingin%20mengonfirmasi%20rute%20antar%20jemput%20untuk%20anak%20Anda%20{{ urlencode($booking->child_name) }}." target="_blank" class="cta-btn" style="padding: 6px 14px; font-size: 0.85rem; background-color: var(--accent-green); box-shadow: none">
                                            Hubungi WA
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </section>

@endsection
