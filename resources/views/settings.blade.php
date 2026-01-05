<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - Game TopUp</title>
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
            background: linear-gradient(135deg, #0F172A 0%, #1E293B 50%, #0F172A 100%);
            background-attachment: fixed;
            color: #F8FAFC;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle at 20% 50%, rgba(56, 189, 248, 0.08) 0%, transparent 50%),
                        radial-gradient(circle at 80% 80%, rgba(99, 102, 241, 0.08) 0%, transparent 50%);
            pointer-events: none;
            z-index: 0;
        }

        header {
            background: rgba(2, 6, 23, 0.8);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(56, 189, 248, 0.1);
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .logo-header {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
            filter: drop-shadow(0 0 20px rgba(56, 189, 248, 0.3));
            transition: all 0.3s ease;
        }

        .logo-header:hover {
            filter: drop-shadow(0 0 30px rgba(56, 189, 248, 0.5));
            transform: translateY(-2px);
        }

        .logo-header i {
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-links a {
            color: #F8FAFC;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #38BDF8;
        }

        .btn-back {
            background: rgba(56, 189, 248, 0.1);
            backdrop-filter: blur(10px);
            color: #38BDF8;
            padding: 0.7rem 1.5rem;
            border: 2px solid rgba(56, 189, 248, 0.5);
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .btn-back::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.2), transparent);
            transition: left 0.5s ease;
        }

        .btn-back:hover::before {
            left: 100%;
        }

        .btn-back:hover {
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            color: #F8FAFC;
            border-color: transparent;
            transform: translateY(-2px) scale(1.05);
            box-shadow: 0 4px 20px rgba(56, 189, 248, 0.4);
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
            position: relative;
            z-index: 1;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #F8FAFC 0%, #38BDF8 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 0.5rem;
            letter-spacing: -0.02em;
        }

        .page-subtitle {
            color: #94A3B8;
            font-size: 1rem;
        }

        .settings-grid {
            display: grid;
            gap: 1.5rem;
        }

        .settings-card {
            background: rgba(30, 41, 59, 0.6);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3),
                        0 0 0 1px rgba(56, 189, 248, 0.1);
            border: 1px solid rgba(51, 65, 85, 0.5);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .settings-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 2px;
            background: linear-gradient(90deg, transparent, #38BDF8, #6366F1, transparent);
            opacity: 0;
            transition: opacity 0.4s ease;
        }

        .settings-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 60px rgba(56, 189, 248, 0.15),
                        0 0 0 1px rgba(56, 189, 248, 0.2);
            border-color: rgba(56, 189, 248, 0.3);
        }

        .settings-card:hover::before {
            opacity: 1;
        }

        .card-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: #F8FAFC;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            letter-spacing: -0.01em;
        }

        .card-title i {
            font-size: 1.4rem;
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 0 10px rgba(56, 189, 248, 0.3));
        }

        .setting-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1.5rem;
            background: rgba(15, 23, 42, 0.6);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            margin-bottom: 1rem;
            border: 1px solid rgba(51, 65, 85, 0.5);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            overflow: hidden;
        }

        .setting-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(56, 189, 248, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .setting-item:hover::before {
            left: 100%;
        }

        .setting-item:last-child {
            margin-bottom: 0;
        }

        .setting-item:hover {
            border-color: rgba(56, 189, 248, 0.5);
            transform: translateX(8px) scale(1.02);
            background: rgba(15, 23, 42, 0.8);
            box-shadow: 0 4px 20px rgba(56, 189, 248, 0.1);
        }

        .setting-info {
            flex: 1;
        }

        .setting-label {
            font-size: 1rem;
            font-weight: 600;
            color: #F8FAFC;
            margin-bottom: 0.3rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .setting-label i {
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            width: 20px;
            text-align: center;
            filter: drop-shadow(0 2px 4px rgba(56, 189, 248, 0.3));
        }

        .setting-description {
            font-size: 0.85rem;
            color: #94A3B8;
        }

        .setting-action {
            margin-left: 1rem;
        }

        .btn-setting {
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            color: #F8FAFC;
            padding: 0.7rem 1.5rem;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(56, 189, 248, 0.3);
        }

        .btn-setting::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn-setting:hover::before {
            left: 100%;
        }

        .btn-setting:hover {
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 30px rgba(56, 189, 248, 0.5),
                        0 0 20px rgba(99, 102, 241, 0.3);
        }

        .btn-setting:active {
            transform: translateY(-1px) scale(1.02);
        }

        .btn-secondary {
            background: rgba(56, 189, 248, 0.1);
            backdrop-filter: blur(10px);
            color: #38BDF8;
            padding: 0.7rem 1.5rem;
            border: 2px solid rgba(56, 189, 248, 0.5);
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .btn-secondary::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(56, 189, 248, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .btn-secondary:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-secondary:hover {
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            color: #F8FAFC;
            border-color: transparent;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(56, 189, 248, 0.4);
        }

        .btn-danger {
            background: rgba(239, 68, 68, 0.1);
            backdrop-filter: blur(10px);
            color: #EF4444;
            padding: 0.7rem 1.5rem;
            border: 2px solid rgba(239, 68, 68, 0.5);
            border-radius: 10px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            text-decoration: none;
            display: inline-block;
            position: relative;
            overflow: hidden;
        }

        .btn-danger::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(239, 68, 68, 0.2);
            transform: translate(-50%, -50%);
            transition: width 0.6s ease, height 0.6s ease;
        }

        .btn-danger:hover::before {
            width: 300px;
            height: 300px;
        }

        .btn-danger:hover {
            background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
            color: #F8FAFC;
            border-color: transparent;
            transform: translateY(-3px) scale(1.05);
            box-shadow: 0 8px 25px rgba(239, 68, 68, 0.4);
        }

        .toggle-switch {
            position: relative;
            width: 50px;
            height: 26px;
        }

        .toggle-switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #334155 0%, #1E293B 100%);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 26px;
            box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 18px;
            width: 18px;
            left: 4px;
            bottom: 4px;
            background: linear-gradient(135deg, #F8FAFC 0%, #E2E8F0 100%);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            border-radius: 50%;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        input:checked + .slider {
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            box-shadow: 0 0 20px rgba(56, 189, 248, 0.4),
                        inset 0 2px 4px rgba(0, 0, 0, 0.2);
        }

        input:checked + .slider:before {
            transform: translateX(24px);
            box-shadow: 0 4px 12px rgba(56, 189, 248, 0.4);
        }

        .slider:hover {
            transform: scale(1.05);
        }

        .danger-zone {
            border: 2px solid rgba(239, 68, 68, 0.5);
            background: rgba(239, 68, 68, 0.05);
            position: relative;
        }

        .danger-zone::before {
            background: linear-gradient(90deg, transparent, #EF4444, #DC2626, transparent);
        }

        .danger-zone:hover {
            border-color: rgba(239, 68, 68, 0.7);
            box-shadow: 0 20px 60px rgba(239, 68, 68, 0.2),
                        0 0 0 1px rgba(239, 68, 68, 0.3);
        }

        .danger-zone .card-title {
            background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .danger-zone .card-title i {
            background: linear-gradient(135deg, #EF4444 0%, #DC2626 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 0 10px rgba(239, 68, 68, 0.4));
        }

        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 1rem;
            }

            .container {
                padding: 0 1rem;
            }

            .page-title {
                font-size: 1.5rem;
            }

            .setting-item {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .setting-action {
                margin-left: 0;
                width: 100%;
            }

            .btn-setting,
            .btn-secondary,
            .btn-danger {
                width: 100%;
                text-align: center;
            }
        }
    </style>
</head>
<body>
    <header>
        <a href="{{ url('/home') }}" class="logo-header">
            <i class="fas fa-gamepad"></i>
            GameTopup
        </a>
        <div class="nav-links">
            <a href="{{ url('/home') }}">Dashboard</a>
            <a href="{{ route('topup.index') }}">Top Up</a>
            <a href="{{ route('profile') }}">Profile</a>
            <a href="{{ url('/home') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </header>

    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Pengaturan</h1>
            <p class="page-subtitle">Kelola preferensi dan keamanan akun Anda</p>
        </div>

        <div class="settings-grid">
            <!-- Account Settings -->
            <div class="settings-card">
                <h3 class="card-title">
                    <i class="fas fa-user-cog"></i>
                    Pengaturan Akun
                </h3>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">
                            <i class="fas fa-user-edit"></i>
                            Edit Profile
                        </div>
                        <div class="setting-description">Ubah nama, email, dan informasi profil lainnya</div>
                    </div>
                    <div class="setting-action">
                        <a href="#" class="btn-setting">Edit</a>
                    </div>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">
                            <i class="fas fa-lock"></i>
                            Ubah Password
                        </div>
                        <div class="setting-description">Perbarui password untuk keamanan akun</div>
                    </div>
                    <div class="setting-action">
                        <a href="#" class="btn-setting">Ubah</a>
                    </div>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">
                            <i class="fas fa-envelope"></i>
                            Verifikasi Email
                        </div>
                        <div class="setting-description">Status: <span style="color: #22C55E;">Terverifikasi</span></div>
                    </div>
                    <div class="setting-action">
                        <button class="btn-secondary" disabled>Verified</button>
                    </div>
                </div>
            </div>

            <!-- Notification Settings -->
            <div class="settings-card">
                <h3 class="card-title">
                    <i class="fas fa-bell"></i>
                    Notifikasi
                </h3>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">
                            <i class="fas fa-envelope-open-text"></i>
                            Email Notifikasi
                        </div>
                        <div class="setting-description">Terima notifikasi transaksi via email</div>
                    </div>
                    <div class="setting-action">
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">
                            <i class="fas fa-gift"></i>
                            Promo & Penawaran
                        </div>
                        <div class="setting-description">Dapatkan info promo dan diskon terbaru</div>
                    </div>
                    <div class="setting-action">
                        <label class="toggle-switch">
                            <input type="checkbox" checked>
                            <span class="slider"></span>
                        </label>
                    </div>
                </div>
            </div>

            <!-- Privacy Settings -->
            <div class="settings-card">
                <h3 class="card-title">
                    <i class="fas fa-shield-alt"></i>
                    Privasi & Keamanan
                </h3>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">
                            <i class="fas fa-history"></i>
                            Riwayat Login
                        </div>
                        <div class="setting-description">Lihat aktivitas login akun Anda</div>
                    </div>
                    <div class="setting-action">
                        <a href="#" class="btn-setting">Lihat</a>
                    </div>
                </div>
            </div>

            <!-- Payment Settings -->
            <div class="settings-card">
                <h3 class="card-title">
                    <i class="fas fa-credit-card"></i>
                    Metode Pembayaran
                </h3>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">
                            <i class="fas fa-wallet"></i>
                            E-Wallet Tersimpan
                        </div>
                        <div class="setting-description">Kelola metode pembayaran yang tersimpan</div>
                    </div>
                    <div class="setting-action">
                        <a href="#" class="btn-setting">Kelola</a>
                    </div>
                </div>

                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">
                            <i class="fas fa-receipt"></i>
                            Riwayat Transaksi
                        </div>
                        <div class="setting-description">Lihat semua transaksi Anda</div>
                    </div>
                    <div class="setting-action">
                        <a href="#" class="btn-setting">Lihat</a>
                    </div>
                </div>
            </div>

            <!-- Danger Zone -->
            <div class="settings-card danger-zone">
                <h3 class="card-title">
                    <i class="fas fa-exclamation-triangle"></i>
                    Zona Berbahaya
                </h3>
                
                <div class="setting-item">
                    <div class="setting-info">
                        <div class="setting-label">
                            <i class="fas fa-trash-alt"></i>
                            Hapus Akun
                        </div>
                        <div class="setting-description">Hapus akun secara permanen (tidak dapat dibatalkan)</div>
                    </div>
                    <div class="setting-action">
                        <button class="btn-danger">Hapus Akun</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
