@extends('layouts.app')

@section('title', 'Admin Dashboard Pendaftaran - Gokidz')

@section('content')

    <section class="section">
        <div class="container">
            <div class="admin-title-row">
                <div>
                    <span class="section-badge">📊 Data Internal</span>
                    <h2>Daftar Pendaftaran Calon Siswa</h2>
                    <p>Halaman ini menampilkan seluruh data pendaftaran yang tersimpan di dalam database.</p>
                </div>
                <a href="{{ route('pendaftaran') }}" class="cta-btn">+ Tambah Pendaftaran</a>
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
                    <a href="{{ route('pendaftaran') }}" class="cta-btn">Mulai Uji Coba Pendaftaran</a>
                </div>
            @else
                <div class="table-wrapper">
                    <table class="admin-table">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Orang Tua</th>
                                <th>Siswa (Kelas/Gender)</th>
                                <th>Ekskul / Catatan</th>
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
                                        <strong>{{ $booking->child_name }}</strong>
                                        @if($booking->child_gender)
                                            <span style="font-size: 0.8rem; font-weight: 700; color: var(--secondary); background: var(--secondary-light); padding: 2px 6px; border-radius: 4px; margin-left: 4px;">
                                                {{ $booking->child_gender == 'Laki-laki' ? 'L' : 'P' }}
                                            </span>
                                        @endif
                                        <br>
                                        @if($booking->child_class)
                                            <span style="color: var(--text-muted); font-size: 0.85rem">Kelas: {{ $booking->child_class }}</span>
                                        @elseif($booking->child_age)
                                            <span style="color: var(--text-muted); font-size: 0.85rem">{{ $booking->child_age }} tahun</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($booking->extracurricular)
                                            <div style="font-size: 0.85rem; max-width: 180px; word-wrap: break-word;">{{ $booking->extracurricular }}</div>
                                        @else
                                            <span style="color: var(--text-muted); font-size: 0.85rem">-</span>
                                        @endif
                                        @if($booking->school_name && $booking->school_name != 'SDI Abu Dzar')
                                            <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 4px;">({{ $booking->school_name }})</div>
                                        @endif
                                    </td>
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
                                            @if($booking->status == 'pending')
                                                Tertunda
                                            @elseif($booking->status == 'done')
                                                Selesai
                                            @else
                                                {{ ucfirst($booking->status) }}
                                            @endif
                                        </span>
                                    </td>
                                    <td>
                                        <div style="display: flex; gap: 8px;">
                                            <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $booking->parent_phone) }}?text=Halo%20{{ urlencode($booking->parent_name) }},%20kami%20dari%20Gokidz%20ingin%20mengonfirmasi%20rute%20antar%20jemput%20untuk%20anak%20Anda%20{{ urlencode($booking->child_name) }}." target="_blank" class="cta-btn" style="padding: 6px 14px; font-size: 0.85rem; background-color: var(--accent-green); box-shadow: none">
                                                Hubungi WA
                                            </a>
                                            @if($booking->status == 'pending')
                                                <form action="{{ route('admin.bookings.done', $booking->id) }}" method="POST" style="display: inline;">
                                                    @csrf
                                                    @method('PATCH')
                                                    <button type="submit" class="cta-btn" style="padding: 6px 14px; font-size: 0.85rem; background-color: var(--secondary); box-shadow: none">
                                                        Selesai
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
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
