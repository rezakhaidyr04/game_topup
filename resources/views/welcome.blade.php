<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>GameTopup - Top Up Game Aman & Terpercaya</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
                background: #0F172A;
                color: #F8FAFC;
                line-height: 1.6;
            }

            /* Navigation */
            nav {
                position: fixed;
                top: 0;
                width: 100%;
                background: rgba(2, 6, 23, 0.95);
                backdrop-filter: blur(10px);
                z-index: 1000;
                box-shadow: 0 2px 12px rgba(56, 189, 248, 0.08);
            }

            .navbar-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 1rem 2rem;
                display: flex;
                justify-content: space-between;
                align-items: center;
            }

            .logo {
                font-size: 1.5rem;
                font-weight: 700;
                color: #38BDF8;
                text-decoration: none;
                display: flex;
                align-items: center;
                gap: 0.5rem;
            }

            .nav-links {
                display: flex;
                gap: 2rem;
                align-items: center;
                list-style: none;
            }

            .nav-links a {
                text-decoration: none;
                color: #F8FAFC;
                font-weight: 500;
                transition: color 0.3s ease;
                font-size: 0.95rem;
            }

            .nav-links a:hover {
                color: #38BDF8;
            }

            .btn {
                padding: 0.6rem 1.2rem;
                border: none;
                border-radius: 6px;
                font-weight: 600;
                cursor: pointer;
                transition: all 0.3s ease;
                text-decoration: none;
                display: inline-block;
                font-size: 0.9rem;
            }

            .btn-primary {
                background: #38BDF8;
                color: #020617;
            }

            .btn-primary:hover {
                transform: translateY(-2px);
                box-shadow: 0 8px 16px rgba(56, 189, 248, 0.3);
                background: #6366F1;
            }

            .btn-secondary {
                background: transparent;
                color: #38BDF8;
                border: 2px solid #38BDF8;
            }

            .btn-secondary:hover {
                background: #38BDF8;
                color: #020617;
            }

            /* Hero Section */
            .hero {
                margin-top: 80px;
                padding: 6rem 2rem;
                text-align: center;
                min-height: calc(100vh - 80px);
                display: flex;
                align-items: center;
                justify-content: center;
                background: linear-gradient(135deg, #0F172A 0%, #020617 100%);
            }

            .hero-content h1 {
                font-size: 3.5rem;
                font-weight: 800;
                margin-bottom: 1rem;
                line-height: 1.1;
                color: #F8FAFC;
            }

            .hero-content p {
                font-size: 1.2rem;
                color: #94A3B8;
                margin-bottom: 2rem;
                max-width: 600px;
                margin-left: auto;
                margin-right: auto;
            }

            .hero-buttons {
                display: flex;
                gap: 1rem;
                justify-content: center;
                flex-wrap: wrap;
            }

            /* Features Section */
            .features {
                padding: 6rem 2rem;
                max-width: 1200px;
                margin: 0 auto;
            }

            .section-title {
                text-align: center;
                font-size: 2.5rem;
                font-weight: 700;
                margin-bottom: 1rem;
                color: #F8FAFC;
            }

            .section-subtitle {
                text-align: center;
                color: #94A3B8;
                font-size: 1.1rem;
                margin-bottom: 4rem;
            }

            .features-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 2rem;
            }

            .feature-card {
                background: #1E293B;
                padding: 2rem;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
                border: 1px solid #334155;
                transition: all 0.3s ease;
                text-align: center;
            }

            .feature-card:hover {
                transform: translateY(-6px);
                box-shadow: 0 12px 28px rgba(56, 189, 248, 0.2);
                border-color: #38BDF8;
                background: #1E293B;
            }

            .feature-icon {
                width: 60px;
                height: 60px;
                margin: 0 auto 1.5rem;
                background: #38BDF8;
                border-radius: 10px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: #020617;
                font-size: 1.8rem;
            }

            .feature-card h3 {
                font-size: 1.2rem;
                margin-bottom: 0.8rem;
                color: #F8FAFC;
                font-weight: 600;
            }

            .feature-card p {
                color: #94A3B8;
                line-height: 1.8;
                font-size: 0.95rem;
            }

            /* Games Section */
            .games {
                padding: 6rem 2rem;
                background: #020617;
            }

            .games-container {
                max-width: 1200px;
                margin: 0 auto;
            }

            .games-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(180px, 1fr));
                gap: 1.5rem;
                margin-top: 3rem;
            }

            .game-card {
                background: #1E293B;
                padding: 1.5rem;
                border-radius: 10px;
                text-align: center;
                transition: all 0.3s ease;
                cursor: pointer;
                border: 1px solid #334155;
            }

            .game-card:hover {
                border-color: #38BDF8;
                transform: translateY(-6px);
                box-shadow: 0 12px 28px rgba(56, 189, 248, 0.2);
            }

            .game-icon {
                font-size: 2.5rem;
                margin-bottom: 1rem;
            }

            .game-card h4 {
                font-size: 1rem;
                color: #F8FAFC;
                margin-bottom: 0.4rem;
                font-weight: 600;
            }

            .game-card p {
                color: #94A3B8;
                font-size: 0.85rem;
                margin-bottom: 0;
            }

            /* Pricing Section */
            .pricing {
                padding: 6rem 2rem;
                max-width: 1200px;
                margin: 0 auto;
            }

            .pricing-grid {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
                gap: 2rem;
                margin-top: 3rem;
            }

            .pricing-card {
                background: #1E293B;
                padding: 2.5rem 2rem;
                border-radius: 10px;
                box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
                border: 2px solid #334155;
                transition: all 0.3s ease;
                text-align: center;
            }

            .pricing-card.featured {
                border-color: #38BDF8;
                transform: scale(1.05);
                box-shadow: 0 12px 40px rgba(56, 189, 248, 0.25);
                background: #1E293B;
            }

            .pricing-card h3 {
                font-size: 1.3rem;
                margin-bottom: 1rem;
                color: #F8FAFC;
                font-weight: 600;
            }

            .price {
                font-size: 2.2rem;
                font-weight: 700;
                color: #22C55E;
                margin-bottom: 0.5rem;
            }

            .price-period {
                color: #94A3B8;
                margin-bottom: 1.5rem;
                font-size: 0.9rem;
            }

            .features-list {
                list-style: none;
                margin-bottom: 1.5rem;
                text-align: left;
            }

            .features-list li {
                padding: 0.6rem 0;
                color: #94A3B8;
                border-bottom: 1px solid #334155;
                display: flex;
                align-items: center;
                gap: 0.5rem;
                font-size: 0.9rem;
            }

            .features-list li:before {
                content: "✓";
                color: #22C55E;
                font-weight: bold;
                font-size: 1rem;
            }

            /* CTA Section */
            .cta {
                background: #38BDF8;
                padding: 4rem 2rem;
                text-align: center;
                margin: 6rem 2rem;
                border-radius: 12px;
                color: #020617;
                max-width: 1200px;
                margin-left: auto;
                margin-right: auto;
            }

            .cta h2 {
                font-size: 2rem;
                margin-bottom: 1rem;
                font-weight: 700;
                color: #020617;
            }

            .cta p {
                font-size: 1.1rem;
                margin-bottom: 2rem;
                color: #020617;
            }

            /* Footer */
            footer {
                background: #020617;
                color: white;
                padding: 3rem 2rem 1rem;
            }

            .footer-content {
                max-width: 1200px;
                margin: 0 auto;
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 2rem;
                margin-bottom: 2rem;
            }

            .footer-section h4 {
                margin-bottom: 1rem;
                color: #F8FAFC;
                font-size: 1rem;
                font-weight: 600;
            }

            .footer-section a {
                display: block;
                color: #94A3B8;
                text-decoration: none;
                margin-bottom: 0.5rem;
                transition: color 0.3s ease;
                font-size: 0.9rem;
            }

            .footer-section a:hover {
                color: #38BDF8;
            }

            .footer-section p {
                color: #94A3B8;
                font-size: 0.9rem;
                line-height: 1.8;
            }

            .footer-bottom {
                border-top: 1px solid rgba(255, 255, 255, 0.1);
                padding-top: 2rem;
                color: #64748B;
                text-align: center;
                font-size: 0.85rem;
            }

            /* Responsive */
            @media (max-width: 768px) {
                .hero-content h1 {
                    font-size: 2.2rem;
                }

                .hero-content p {
                    font-size: 1rem;
                }

                .section-title {
                    font-size: 1.8rem;
                }

                .nav-links {
                    gap: 1rem;
                }

                .hero-buttons {
                    flex-direction: column;
                    align-items: center;
                }

                .cta h2 {
                    font-size: 1.6rem;
                }

                .navbar-container {
                    flex-direction: column;
                    gap: 1rem;
                }

                .pricing-card.featured {
                    transform: scale(1);
                }
            }
        </style>
    </head>
    <body>
        <!-- Navigation -->
        <nav>
            <div class="navbar-container">
                <a href="#home" class="logo">
                    <i class="fas fa-gamepad"></i>
                    GameTopup
                </a>
                <ul class="nav-links">
                    <li><a href="#features">Fitur</a></li>
                    <li><a href="#games">Game</a></li>
                    <li><a href="#pricing">Harga</a></li>
                    <li><a href="#contact">Kontak</a></li>
                    @if (Route::has('login'))
                        @auth
                            <li><a href="{{ url('/home') }}" class="btn btn-primary">Dashboard</a></li>
                        @else
                            <li><a href="{{ route('login') }}" class="btn btn-secondary">Login</a></li>
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>

        <!-- Hero Section -->
        <section class="hero" id="home">
            <div>
                <div class="hero-content">
                    <h1>Top Up Game Aman & Terpercaya</h1>
                    <p>Layanan top up game online tercepat dengan harga paling kompetitif. Proses instan, aman, dan terjamin 100%</p>
                    <div class="hero-buttons">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url('/dashboard') }}" class="btn btn-primary">Mulai Top Up</a>
                            @else
                                <a href="{{ route('register') }}" class="btn btn-primary">Daftar Sekarang</a>
                                <a href="{{ route('login') }}" class="btn btn-secondary">Login</a>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </section>

        <!-- Features Section -->
        <section class="features" id="features">
            <h2 class="section-title">Mengapa Memilih Kami?</h2>
            <p class="section-subtitle">Kami menyediakan solusi terbaik untuk kebutuhan top up game Anda</p>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-bolt"></i>
                    </div>
                    <h3>Proses Instan</h3>
                    <p>Top up diproses secara otomatis dalam hitungan detik tanpa perlu menunggu lama</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3>Aman & Terpercaya</h3>
                    <p>Transaksi Anda dilindungi dengan enkripsi tingkat bank dan sistem keamanan berlapis</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-tag"></i>
                    </div>
                    <h3>Harga Kompetitif</h3>
                    <p>Dapatkan harga terbaik dengan berbagai paket menarik dan diskon eksklusif</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-headset"></i>
                    </div>
                    <h3>Support 24/7</h3>
                    <p>Tim support kami siap membantu Anda kapan saja dengan respons cepat</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-credit-card"></i>
                    </div>
                    <h3>Banyak Metode Pembayaran</h3>
                    <p>Transfer bank, e-wallet, pulsa, dan berbagai metode pembayaran lainnya</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-gem"></i>
                    </div>
                    <h3>Bonus & Reward</h3>
                    <p>Dapatkan poin reward setiap transaksi yang dapat ditukar dengan hadiah menarik</p>
                </div>
            </div>
        </section>

        <!-- Games Section -->
        <section class="games" id="games">
            <div class="games-container">
                <h2 class="section-title">Game yang Tersedia</h2>
                <p class="section-subtitle">Ribuan game siap untuk di-top up dengan mudah</p>
                <div class="games-grid">
                    <div class="game-card">
                        <div class="game-icon"><img src="{{ asset('images/games/ml.png') }}" alt="Mobile Legends" style="width: 100%; height: 100%; object-fit: contain;"></div>
                        <h4>Mobile Legends</h4>
                        <p>Diamonds & Bonus</p>
                    </div>
                    <div class="game-card">
                        <div class="game-icon"><img src="{{ asset('images/games/PUBG.png') }}" alt="PUBG Mobile" style="width: 100%; height: 100%; object-fit: contain;"></div>
                        <h4>PUBG Mobile</h4>
                        <p>UC & Battle Pass</p>
                    </div>
                    <div class="game-card">
                        <div class="game-icon"><img src="{{ asset('images/games/FF.png') }}" alt="Free Fire" style="width: 100%; height: 100%; object-fit: contain;"></div>
                        <h4>Free Fire</h4>
                        <p>Diamond & Voucher</p>
                    </div>
                    <div class="game-card">
                        <div class="game-icon"><img src="{{ asset('images/games/AOV.png') }}" alt="Arena of Valor" style="width: 100%; height: 100%; object-fit: contain;"></div>
                        <h4>Arena of Valor</h4>
                        <p>Valor Pass & Voucher</p>
                    </div>
                    <div class="game-card">
                        <div class="game-icon"><img src="{{ asset('images/games/HONKAI.png') }}" alt="Honkai Star Rail" style="width: 100%; height: 100%; object-fit: contain;"></div>
                        <h4>Honkai Star Rail</h4>
                        <p>Crystal & Pass</p>
                    </div>
                    <div class="game-card">
                        <div class="game-icon"><img src="{{ asset('images/games/GENSHIN.png') }}" alt="Genshin Impact" style="width: 100%; height: 100%; object-fit: contain;"></div>
                        <h4>Genshin Impact</h4>
                        <p>Genesis Crystal</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="cta">
            <h2>Siap Bermain Lebih Seru?</h2>
            <p>Bergabunglah dengan ribuan pengguna yang telah mempercayai GameTopup</p>
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="btn btn-secondary">Buka Dashboard</a>
                @else
                    <a href="{{ route('register') }}" class="btn btn-secondary">Daftar Gratis</a>
                @endauth
            @endif
        </section>

        <!-- Pricing Section -->
        <section class="pricing" id="pricing">
            <h2 class="section-title">Paket Harga</h2>
            <p class="section-subtitle">Pilih paket yang sesuai dengan kebutuhan Anda</p>
            <div class="pricing-grid">
                <div class="pricing-card">
                    <h3>Starter</h3>
                    <div class="price">Rp 10K</div>
                    <div class="price-period">Paket Terkecil</div>
                    <ul class="features-list">
                        <li>10.000 Rupiah Top Up</li>
                        <li>Bonus 1.000 Poin</li>
                        <li>Proses Instan</li>
                        <li>Gratis Ongkir</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Pilih Paket</a>
                </div>
                <div class="pricing-card featured">
                    <h3>Professional</h3>
                    <div class="price">Rp 50K</div>
                    <div class="price-period">Paket Populer</div>
                    <ul class="features-list">
                        <li>50.000 Rupiah Top Up</li>
                        <li>Bonus 7.500 Poin</li>
                        <li>Proses Instan</li>
                        <li>Diskon 5%</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Pilih Paket</a>
                </div>
                <div class="pricing-card">
                    <h3>Premium</h3>
                    <div class="price">Rp 100K</div>
                    <div class="price-period">Paket Hemat</div>
                    <ul class="features-list">
                        <li>100.000 Rupiah Top Up</li>
                        <li>Bonus 20.000 Poin</li>
                        <li>Proses Instan</li>
                        <li>Diskon 10%</li>
                    </ul>
                    <a href="#" class="btn btn-primary">Pilih Paket</a>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer id="contact">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Tentang Kami</h4>
                    <a href="#">Tentang GameTopup</a>
                    <a href="#">Cara Kerja</a>
                    <a href="#">Kebijakan Privasi</a>
                    <a href="#">Syarat & Ketentuan</a>
                </div>
                <div class="footer-section">
                    <h4>Layanan</h4>
                    <a href="#">Top Up Game</a>
                    <a href="#">Voucher Game</a>
                    <a href="#">Jual Akun Game</a>
                    <a href="#">Promo & Diskon</a>
                </div>
                <div class="footer-section">
                    <h4>Hubungi Kami</h4>
                    <a href="mailto:support@gametopup.com">support@gametopup.com</a>
                    <a href="https://wa.me/6281234567890">WhatsApp: 0812-3456-7890</a>
                    <a href="#">Instagram: @gametopup.id</a>
                    <a href="#">Facebook: GameTopup Official</a>
                </div>
                <div class="footer-section">
                    <h4>Metode Pembayaran</h4>
                    <p style="color: #bdc3c7; margin-bottom: 1rem;">
                        <i class="fas fa-university"></i> Transfer Bank<br>
                        <i class="fas fa-wallet"></i> E-Wallet<br>
                        <i class="fas fa-mobile-alt"></i> Pulsa & Paket<br>
                        <i class="fas fa-qrcode"></i> QRIS
                    </p>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2024 GameTopup. Semua Hak Dilindungi. | Dibuat dengan <i class="fas fa-heart" style="color: #e74c3c;"></i> untuk gamer Indonesia</p>
            </div>
        </footer>

        <script>
            // Smooth scroll untuk anchor links
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });
        </script>
    </body>
</html>
