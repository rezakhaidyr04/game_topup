<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Game TopUp</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #2d1b69 50%, #0f172a 100%);
            background-attachment: fixed;
            color: #e2e8f0;
            min-height: 100vh;
        }

        header {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(45, 27, 105, 0.6) 100%);
            border-bottom: 1px solid rgba(148, 163, 184, 0.2);
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-header {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(135deg, #ec4899, #d946ef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .nav-links a:hover {
            color: #ec4899;
        }

        .btn-logout {
            background: linear-gradient(135deg, #ec4899 0%, #d946ef 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-logout:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(236, 72, 153, 0.3);
        }

        .container {
            max-width: 1200px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .welcome-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(45, 27, 105, 0.6) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 12px;
            padding: 40px;
            margin-bottom: 40px;
            box-shadow: 0 20px 60px rgba(236, 72, 153, 0.15);
        }

        h1 {
            font-size: 32px;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #ec4899, #d946ef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .subtitle {
            color: #94a3b8;
            font-size: 16px;
            margin-bottom: 30px;
        }

        .quick-actions {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(220px, 1fr));
            gap: 20px;
            margin-top: 30px;
        }

        .action-card {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 8px;
            padding: 25px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .action-card:hover {
            transform: translateY(-5px);
            border-color: rgba(236, 72, 153, 0.5);
            box-shadow: 0 10px 25px rgba(236, 72, 153, 0.1);
        }

        .action-card .icon {
            font-size: 40px;
            margin-bottom: 10px;
        }

        .action-card h3 {
            color: #e2e8f0;
            font-size: 18px;
            margin-bottom: 8px;
        }

        .action-card p {
            color: #94a3b8;
            font-size: 14px;
        }

        .action-card a {
            display: inline-block;
            margin-top: 12px;
            color: #ec4899;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
        }

        .action-card a:hover {
            text-decoration: underline;
        }

        .section {
            margin-top: 40px;
        }

        .section h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #e2e8f0;
        }

        .game-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(180px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .game-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.8) 0%, rgba(45, 27, 105, 0.5) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .game-card:hover {
            transform: translateY(-8px);
            border-color: rgba(236, 72, 153, 0.5);
            box-shadow: 0 15px 40px rgba(236, 72, 153, 0.2);
        }

        .game-card .icon {
            font-size: 50px;
            margin-bottom: 10px;
        }

        .game-card h4 {
            color: #e2e8f0;
            margin-bottom: 8px;
            font-size: 16px;
        }

        .game-card p {
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 12px;
        }

        .btn-topup {
            background: linear-gradient(135deg, #ec4899 0%, #d946ef 100%);
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            width: 100%;
            text-decoration: none;
            display: inline-block;
        }

        .btn-topup:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(236, 72, 153, 0.3);
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-header">🎮 Game TopUp</div>
        <div class="nav-links">
            <span style="color: #cbd5e1;">Halo, {{ auth()->user()->name }}! 👋</span>
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
            <h2>📱 Game Populer</h2>
            <div class="game-grid">
                <div class="game-card">
                    <div class="icon">🔥</div>
                    <h4>Mobile Legends</h4>
                    <p>Top Up Diamond</p>
                    <a href="{{ route('topup.index') }}" class="btn-topup">Topup Sekarang</a>
                </div>
                <div class="game-card">
                    <div class="icon">⚔️</div>
                    <h4>PUBG Mobile</h4>
                    <p>Top Up UC</p>
                    <a href="{{ route('topup.index') }}" class="btn-topup">Topup Sekarang</a>
                </div>
                <div class="game-card">
                    <div class="icon">🎮</div>
                    <h4>Free Fire</h4>
                    <p>Top Up Diamond</p>
                    <a href="{{ route('topup.index') }}" class="btn-topup">Topup Sekarang</a>
                </div>
                <div class="game-card">
                    <div class="icon">👾</div>
                    <h4>Call of Duty</h4>
                    <p>Top Up CP</p>
                    <a href="{{ route('topup.index') }}" class="btn-topup">Topup Sekarang</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
