<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - Game TopUp</title>
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
            min-height: 100vh;
        }

        header {
            background: #020617;
            border-bottom: 1px solid #334155;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .logo-header {
            font-size: 1.5rem;
            font-weight: 700;
            color: #38BDF8;
            display: flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
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
            background: transparent;
            color: #38BDF8;
            padding: 0.6rem 1.2rem;
            border: 2px solid #38BDF8;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            background: #38BDF8;
            color: #020617;
            transform: translateY(-2px);
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .page-header {
            margin-bottom: 2rem;
        }

        .page-title {
            font-size: 2rem;
            font-weight: 700;
            color: #F8FAFC;
            margin-bottom: 0.5rem;
        }

        .page-subtitle {
            color: #94A3B8;
            font-size: 1rem;
        }

        .profile-section {
            display: grid;
            grid-template-columns: 350px 1fr;
            gap: 2rem;
            margin-bottom: 2.5rem;
        }

        .profile-card {
            background: #1E293B;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            border: 1px solid #334155;
            text-align: center;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 1.5rem;
            font-size: 3rem;
            color: #020617;
            font-weight: 700;
            border: 4px solid #334155;
        }

        .profile-name {
            font-size: 1.5rem;
            font-weight: 700;
            color: #F8FAFC;
            margin-bottom: 0.3rem;
        }

        .profile-email {
            font-size: 0.95rem;
            color: #94A3B8;
            margin-bottom: 1.5rem;
        }

        .profile-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
            margin-top: 1.5rem;
            padding-top: 1.5rem;
            border-top: 1px solid #334155;
        }

        .stat-item {
            text-align: center;
        }

        .stat-value {
            font-size: 1.8rem;
            font-weight: 700;
            color: #38BDF8;
            display: block;
            margin-bottom: 0.3rem;
        }

        .stat-label {
            font-size: 0.85rem;
            color: #94A3B8;
        }

        .profile-actions {
            margin-top: 1.5rem;
            display: flex;
            flex-direction: column;
            gap: 0.8rem;
        }

        .btn-edit-profile {
            background: #38BDF8;
            color: #020617;
            padding: 0.8rem 1.5rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-edit-profile:hover {
            background: #6366F1;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(56, 189, 248, 0.3);
        }

        .btn-change-password {
            background: transparent;
            color: #38BDF8;
            padding: 0.8rem 1.5rem;
            border: 2px solid #38BDF8;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-change-password:hover {
            background: #38BDF8;
            color: #020617;
            transform: translateY(-2px);
        }

        .profile-info {
            background: #1E293B;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            border: 1px solid #334155;
        }

        .info-title {
            font-size: 1.3rem;
            font-weight: 600;
            color: #F8FAFC;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-grid {
            display: grid;
            gap: 1.2rem;
        }

        .info-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background: #0F172A;
            border-radius: 8px;
            border: 1px solid #334155;
            transition: all 0.3s ease;
        }

        .info-item:hover {
            border-color: #38BDF8;
            transform: translateX(5px);
        }

        .info-label {
            font-size: 0.95rem;
            color: #94A3B8;
            display: flex;
            align-items: center;
            gap: 0.7rem;
        }

        .info-label i {
            width: 20px;
            text-align: center;
            color: #38BDF8;
        }

        .info-value {
            font-size: 1rem;
            color: #F8FAFC;
            font-weight: 500;
        }

        .badge {
            display: inline-block;
            padding: 0.4rem 1rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            background: #22C55E;
            color: #020617;
        }

        .badge-gold {
            background: linear-gradient(135deg, #FCD34D 0%, #F59E0B 100%);
        }

        .activity-section {
            margin-top: 2rem;
        }

        .activity-card {
            background: #1E293B;
            border-radius: 12px;
            padding: 2rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            border: 1px solid #334155;
        }

        .activity-item {
            display: flex;
            align-items: center;
            padding: 1rem;
            background: #0F172A;
            border-radius: 8px;
            margin-bottom: 1rem;
            border: 1px solid #334155;
        }

        .activity-item:last-child {
            margin-bottom: 0;
        }

        .activity-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #020617;
            font-size: 1.3rem;
            margin-right: 1rem;
        }

        .activity-content {
            flex: 1;
        }

        .activity-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: #F8FAFC;
            margin-bottom: 0.3rem;
        }

        .activity-time {
            font-size: 0.8rem;
            color: #94A3B8;
        }

        @media (max-width: 968px) {
            .profile-section {
                grid-template-columns: 1fr;
            }
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
            <a href="{{ url('/home') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali
            </a>
        </div>
    </header>

    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Profile Saya</h1>
            <p class="page-subtitle">Kelola informasi akun dan preferensi Anda</p>
        </div>

        <!-- Profile Section -->
        <div class="profile-section">
            <div class="profile-card">
                <div class="profile-avatar">
                    {{ strtoupper(substr(auth()->user()->name, 0, 2)) }}
                </div>
                <div class="profile-name">{{ auth()->user()->name }}</div>
                <div class="profile-email">{{ auth()->user()->email }}</div>
                
                <div class="profile-stats">
                    <div class="stat-item">
                        <span class="stat-value">0</span>
                        <span class="stat-label">Transaksi</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-value">Rp 0</span>
                        <span class="stat-label">Total Belanja</span>
                    </div>
                </div>
                
                <div class="profile-actions">
                    <a href="#" class="btn-edit-profile">
                        <i class="fas fa-user-edit"></i> Edit Profile
                    </a>
                    <a href="#" class="btn-change-password">
                        <i class="fas fa-lock"></i> Ubah Password
                    </a>
                </div>
            </div>

            <div class="profile-info">
                <h3 class="info-title">
                    <i class="fas fa-info-circle"></i>
                    Informasi Akun
                </h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label">
                            <i class="fas fa-user"></i> Username
                        </span>
                        <span class="info-value">{{ auth()->user()->name }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">
                            <i class="fas fa-envelope"></i> Email
                        </span>
                        <span class="info-value">{{ auth()->user()->email }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">
                            <i class="fas fa-calendar-alt"></i> Bergabung Sejak
                        </span>
                        <span class="info-value">{{ auth()->user()->created_at->format('d M Y') }}</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">
                            <i class="fas fa-shield-alt"></i> Status Akun
                        </span>
                        <span class="badge">Aktif</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">
                            <i class="fas fa-crown"></i> Level Member
                        </span>
                        <span class="badge badge-gold">Bronze</span>
                    </div>
                    <div class="info-item">
                        <span class="info-label">
                            <i class="fas fa-coins"></i> Poin Reward
                        </span>
                        <span class="info-value" style="color: #22C55E;">0 Poin</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Activity Section -->
        <div class="activity-section">
            <div class="activity-card">
                <h3 class="info-title">
                    <i class="fas fa-history"></i>
                    Aktivitas Terakhir
                </h3>
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-user-check"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Akun Berhasil Dibuat</div>
                        <div class="activity-time">{{ auth()->user()->created_at->diffForHumans() }}</div>
                    </div>
                </div>
                <div class="activity-item">
                    <div class="activity-icon">
                        <i class="fas fa-sign-in-alt"></i>
                    </div>
                    <div class="activity-content">
                        <div class="activity-title">Login Terakhir</div>
                        <div class="activity-time">Baru saja</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
