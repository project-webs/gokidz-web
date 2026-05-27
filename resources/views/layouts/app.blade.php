<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gokidz - Antar Jemput Sekolah Aman & Ceria')</title>
    <!-- Favicon placeholder or cute emoji -->
    <link rel="icon" href="data:image/svg+xml,<svg xmlns=%22http://www.w3.org/2000/svg%22 viewBox=%220 0 100 100%22><text y=%22.9em%22 font-size=%2290%22>🚌</text></svg>">
    
    <!-- Custom Gokidz stylesheet -->
    <link rel="stylesheet" href="{{ asset('css/gokidz.css') }}">
    @yield('styles')
</head>
<body>

    <!-- Floating Navigation Bar -->
    <header>
        <div class="container">
            <div class="nav-wrapper">
                <a href="{{ route('home') }}" class="logo">
                    🚌 Gokidz <span class="logo-dot"></span>
                </a>
                
                <button class="mobile-toggle" id="mobile-toggle" aria-label="Toggle Menu">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                
                <ul class="nav-menu" id="nav-menu">
                    <li>
                        <a href="{{ route('home') }}" class="nav-link {{ Route::is('home') ? 'active' : '' }}">Beranda</a>
                    </li>
                    <li>
                        <a href="{{ route('layanan') }}" class="nav-link {{ Route::is('layanan') ? 'active' : '' }}">Layanan & Tarif</a>
                    </li>
                    <li>
                        <a href="{{ route('tentang') }}" class="nav-link {{ Route::is('tentang') ? 'active' : '' }}">Tentang Kami</a>
                    </li>
                    <li>
                        <a href="{{ route('kontak') }}" class="nav-link {{ Route::is('kontak') ? 'active' : '' }}">Hubungi Kami</a>
                    </li>
                    @auth
                        <li>
                            <a href="{{ route('admin.bookings') }}" class="nav-link {{ Route::is('admin.bookings') ? 'active' : '' }}">Admin View</a>
                        </li>
                        <li>
                            <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                                @csrf
                                <button type="submit" class="nav-link" style="background: transparent; border: none; cursor: pointer; font-family: inherit;">Logout</button>
                            </form>
                        </li>
                    @else
                        <li>
                            <a href="{{ route('login') }}" class="nav-link {{ Route::is('login') ? 'active' : '' }}">Login</a>
                        </li>
                    @endauth
                    <li>
                        <a href="{{ route('pendaftaran') }}" class="cta-btn">Daftar Sekarang</a>
                    </li>
                </ul>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-brand">
                    <h3>🚌 Gokidz Shuttle</h3>
                    <p>Penyedia layanan antar jemput sekolah anak yang aman, nyaman, dan menyenangkan. Perjalanan ceria untuk buah hati kesayangan Anda menuju masa depan cemerlang!</p>
                </div>
                <div class="footer-links">
                    <h4>Navigasi</h4>
                    <ul>
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('layanan') }}">Layanan & Tarif</a></li>
                        <li><a href="{{ route('tentang') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('kontak') }}">Hubungi Kami</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Kontak Kami</h4>
                    <ul>
                        <li>📍 Jl. Sumatera Gg.H.Bakri RT.003 / RW.007 Kampung Rawa Lele, Jombang, Kec. Ciputat, Kota Tangerang Selatan, Banten 15414</li>
                        <li>📞 +62 895-3303-43600</li>
                        <li>✉️ info@gokidz.abudzargroup.id</li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; {{ date('Y') }} Gokidz. Dibuat dengan penuh ❤️ untuk anak-anak Indonesia.</p>
            </div>
        </div>
    </footer>

    <!-- Vanilla Javascript for Menu Interactions and Calculator -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Mobile Menu Toggle
            const toggleBtn = document.getElementById('mobile-toggle');
            const navMenu = document.getElementById('nav-menu');

            if (toggleBtn && navMenu) {
                toggleBtn.addEventListener('click', function() {
                    navMenu.classList.toggle('show');
                    // Simple animation for the hamburger bars
                    const spans = toggleBtn.querySelectorAll('span');
                    if (navMenu.classList.contains('show')) {
                        spans[0].style.transform = 'rotate(45deg) translate(6px, 6px)';
                        spans[1].style.opacity = '0';
                        spans[2].style.transform = 'rotate(-45deg) translate(6px, -6px)';
                    } else {
                        spans[0].style.transform = 'none';
                        spans[1].style.opacity = '1';
                        spans[2].style.transform = 'none';
                    }
                });
            }
        });
    </script>
    @yield('scripts')
</body>
</html>
