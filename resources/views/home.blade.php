<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Game TopUp</title>
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

        .user-greeting {
            color: #94A3B8;
            font-size: 0.95rem;
        }

        .btn-logout {
            background: #38BDF8;
            color: #020617;
            padding: 0.6rem 1.2rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(56, 189, 248, 0.3);
            background: #6366F1;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .welcome-card {
            background: #1E293B;
            border-radius: 12px;
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
            border: 1px solid #334155;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: #F8FAFC;
            font-weight: 700;
        }

        .subtitle {
            color: #94A3B8;
            font-size: 1rem;
            margin-bottom: 1.5rem;
            font-weight: 400;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .action-card {
            background: #1E293B;
            border: 1px solid #334155;
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .action-card:hover {
            transform: translateY(-5px);
            border-color: #38BDF8;
            box-shadow: 0 12px 24px rgba(56, 189, 248, 0.2);
            background: #1E293B;
        }

        .action-card .icon {
            font-size: 2rem;
            margin-bottom: 0.8rem;
        }

        .action-card h3 {
            color: #F8FAFC;
            font-size: 1rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .action-card p {
            color: #94A3B8;
            font-size: 0.85rem;
            margin-bottom: 0.8rem;
        }

        .action-card a {
            display: inline-block;
            color: #38BDF8;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .action-card a:hover {
            color: #6366F1;
        }

        .section {
            margin-top: 2.5rem;
        }

        .section h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #F8FAFC;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .game-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(160px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .game-card {
            background: #1E293B;
            border: 1px solid #334155;
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .game-card:hover {
            transform: translateY(-6px);
            border-color: #38BDF8;
            box-shadow: 0 12px 28px rgba(56, 189, 248, 0.2);
        }

        .game-card .icon {
            font-size: 2.5rem;
            margin-bottom: 0.8rem;
            display: block;
        }

        .game-card h4 {
            color: #F8FAFC;
            margin-bottom: 0.4rem;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .game-card p {
            color: #94A3B8;
            font-size: 0.8rem;
            margin-bottom: 1rem;
        }

        .btn-topup {
            background: #38BDF8;
            color: #020617;
            padding: 0.6rem 1rem;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.8rem;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            text-decoration: none;
            display: inline-block;
        }

        .btn-topup:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(56, 189, 248, 0.3);
            background: #6366F1;
        }
        .profile-icon-link {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #020617;
            font-weight: 700;
            font-size: 0.9rem;
            text-decoration: none;
            transition: all 0.3s ease;
            border: 2px solid #334155;
        }

        .profile-icon-link:hover {
            transform: scale(1.1);
            box-shadow: 0 4px 12px rgba(56, 189, 248, 0.4);
            border-color: #38BDF8;
        }
        @media (max-width: 768px) {
            header {
                flex-direction: column;
                gap: 1rem;
            }

            .container {
                padding: 0 1rem;
            }

            h1 {
                font-size: 1.5rem;
            }

            .game-grid {
                grid-template-columns: repeat(auto-fill, minmax(140px, 1fr));
                gap: 1rem;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-header">
            <i class="fas fa-gamepad"></i>
            GameTopup
        </div>
        <div class="nav-links">
            <span class="user-greeting">Halo, {{ auth()->user()->name }}! 👋</span>
            <a href="{{ route('topup.index') }}">Top Up</a>
            <a href="{{ route('profile') }}" class="profile-icon-link" title="Profile Saya">
                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
            </a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </header>

    <div class="container">
        <div class="welcome-card">
            <h1>Selamat Datang! 🎮</h1>
            <p class="subtitle">Nikmati kemudahan top up game favorit Anda kapan saja</p>
            
            <div class="quick-actions">
                <div class="action-card">
                    <div class="icon">💳</div>
                    <h3>Top Up Sekarang</h3>
                    <p>Isi saldo game Anda</p>
                    <a href="{{ route('topup.index') }}">Mulai Topup →</a>
                </div>
                <div class="action-card">
                    <div class="icon">💰</div>
                    <h3>Lihat Saldo</h3>
                    <p>Cek saldo akun Anda</p>
                    <a href="{{ route('saldo.index') }}">Lihat Saldo →</a>
                </div>
                <div class="action-card">
                    <div class="icon">📊</div>
                    <h3>Riwayat</h3>
                    <p>Lihat histori pembelian</p>
                    <a href="{{ route('topup.index') }}">Lihat Riwayat →</a>
                </div>
                <div class="action-card">
                    <div class="icon">⚙️</div>
                    <h3>Pengaturan</h3>
                    <p>Kelola akun Anda</p>
                    <a href="{{ url('/settings') }}">Pengaturan →</a>
                </div>
            </div>
        </div>

        <div class="section">
            <h2><i class="fas fa-mobile-alt"></i> Game Populer</h2>
            <div class="game-grid">
                @forelse ($games as $game)
                    <div class="game-card">
                        @php
                            $gameImages = [
                                'Mobile Legends' => 'ml.png',
                                'PUBG Mobile' => 'PUBG.png',
                                'Free Fire' => 'FF.png',
                                'Genshin Impact' => 'GENSHIN.png',
                                'Call of Duty Mobile' => 'COD.png',
                                'Arena of Valor' => 'AOV.png',
                                'Honkai Star Rail' => 'HONKAI.png',
                                'Valorant' => 'valo.png',
                            ];
                            $imgFile = $gameImages[$game->name] ?? null;
                        @endphp
                        
                        @if ($imgFile && file_exists(public_path('images/games/' . $imgFile)))
                            <span class="icon"><img src="{{ asset('images/games/' . $imgFile) }}" alt="{{ $game->name }}" style="width: 100%; height: 100%; object-fit: contain;"></span>
                        @else
                            <div class="icon">{{ $game->icon }}</div>
                        @endif
                        
                        <h4>{{ $game->name }}</h4>
                        <p>Top Up {{ $game->currency_type }}</p>
                        <a href="{{ route('topup.show', $game) }}" class="btn-topup">Topup Sekarang</a>
                    </div>
                @empty
                    <p style="color: #94a3b8; grid-column: 1/-1; text-align: center;">Belum ada game tersedia</p>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
