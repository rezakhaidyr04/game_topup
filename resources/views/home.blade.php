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
            background: #f8f9fa;
            color: #2c3e50;
            min-height: 100vh;
        }

        header {
            background: white;
            border-bottom: 1px solid #e9ecef;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04);
        }

        .logo-header {
            font-size: 1.5rem;
            font-weight: 700;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
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
            color: #2c3e50;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #667eea;
        }

        .user-greeting {
            color: #7f8c8d;
            font-size: 0.95rem;
        }

        .btn-logout {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
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
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .welcome-card {
            background: white;
            border-radius: 12px;
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
            border: 1px solid #e9ecef;
        }

        h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: #2c3e50;
            font-weight: 700;
        }

        .subtitle {
            color: #7f8c8d;
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
            background: linear-gradient(135deg, #f5f7fa 0%, #f0f3fa 100%);
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .action-card:hover {
            transform: translateY(-5px);
            border-color: #667eea;
            box-shadow: 0 12px 24px rgba(102, 126, 234, 0.1);
            background: linear-gradient(135deg, #ffffff 0%, #f8faff 100%);
        }

        .action-card .icon {
            font-size: 2rem;
            margin-bottom: 0.8rem;
        }

        .action-card h3 {
            color: #2c3e50;
            font-size: 1rem;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .action-card p {
            color: #7f8c8d;
            font-size: 0.85rem;
            margin-bottom: 0.8rem;
        }

        .action-card a {
            display: inline-block;
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.85rem;
            transition: all 0.3s ease;
        }

        .action-card a:hover {
            color: #764ba2;
        }

        .section {
            margin-top: 2.5rem;
        }

        .section h2 {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #2c3e50;
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
            background: white;
            border: 1px solid #e9ecef;
            border-radius: 10px;
            padding: 1.5rem;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .game-card:hover {
            transform: translateY(-6px);
            border-color: #667eea;
            box-shadow: 0 12px 28px rgba(102, 126, 234, 0.12);
        }

        .game-card .icon {
            font-size: 2.5rem;
            margin-bottom: 0.8rem;
            display: block;
        }

        .game-card h4 {
            color: #2c3e50;
            margin-bottom: 0.4rem;
            font-size: 0.95rem;
            font-weight: 600;
        }

        .game-card p {
            color: #7f8c8d;
            font-size: 0.8rem;
            margin-bottom: 1rem;
        }

        .btn-topup {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
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
            box-shadow: 0 8px 16px rgba(102, 126, 234, 0.3);
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
                    <a href="#">Coming Soon</a>
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
                    <a href="#">Coming Soon</a>
                </div>
            </div>
        </div>

        <div class="section">
            <h2><i class="fas fa-mobile-alt"></i> Game Populer</h2>
            <div class="game-grid">
                <div class="game-card">
                    <span class="icon">🔥</span>
                    <h4>Mobile Legends</h4>
                    <p>Top Up Diamond</p>
                    <a href="{{ route('topup.index') }}" class="btn-topup">Topup Sekarang</a>
                </div>
                <div class="game-card">
                    <span class="icon">⚔️</span>
                    <h4>PUBG Mobile</h4>
                    <p>Top Up UC</p>
                    <a href="{{ route('topup.index') }}" class="btn-topup">Topup Sekarang</a>
                </div>
                <div class="game-card">
                    <span class="icon">🎮</span>
                    <h4>Free Fire</h4>
                    <p>Top Up Diamond</p>
                    <a href="{{ route('topup.index') }}" class="btn-topup">Topup Sekarang</a>
                </div>
                <div class="game-card">
                    <span class="icon">👾</span>
                    <h4>Call of Duty</h4>
                    <p>Top Up CP</p>
                    <a href="{{ route('topup.index') }}" class="btn-topup">Topup Sekarang</a>
                </div>
                <div class="game-card">
                    <span class="icon">🌟</span>
                    <h4>Genshin Impact</h4>
                    <p>Top Up Crystals</p>
                    <a href="{{ route('topup.index') }}" class="btn-topup">Topup Sekarang</a>
                </div>
                <div class="game-card">
                    <span class="icon">⚡</span>
                    <h4>Honkai Star Rail</h4>
                    <p>Top Up Crystals</p>
                    <a href="{{ route('topup.index') }}" class="btn-topup">Topup Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
