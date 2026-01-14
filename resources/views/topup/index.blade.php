<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Game - Game TopUp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;500;600;700;800;900&family=Rajdhani:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Rajdhani', 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0f0f23 0%, #1a1a3e 50%, #0f0f23 100%);
            color: #e2e8f0;
            min-height: 100vh;
        }

        header {
            background: linear-gradient(135deg, rgba(15, 15, 35, 0.98) 0%, rgba(26, 26, 62, 0.98) 100%);
            border-bottom: 1px solid rgba(37, 99, 235, 0.3);
            padding: 1.2rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 4px 24px rgba(30, 58, 138, 0.2);
            backdrop-filter: blur(20px);
            position: relative;
            z-index: 10;
        }

        header::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, rgba(37, 99, 235, 0.6), rgba(6, 182, 212, 0.6), transparent);
            opacity: 0.8;
        }

        .logo-header {
            font-family: 'Orbitron', sans-serif;
            font-size: 1.8rem;
            font-weight: 900;
            background: linear-gradient(135deg, #3b82f6, #2563eb, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            transition: all 0.3s ease;
            filter: drop-shadow(0 0 15px rgba(37, 99, 235, 0.3));
        }

        .logo-header:hover {
            background: linear-gradient(135deg, #60a5fa, #3b82f6, #22d3ee);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 0 25px rgba(37, 99, 235, 0.5));
        }

        .logo-header i {
            color: #3b82f6;
            transition: all 0.3s ease;
            filter: drop-shadow(0 0 10px rgba(37, 99, 235, 0.5));
        }

        .logo-header:hover i {
            color: #60a5fa;
            transform: rotate(15deg);
            filter: drop-shadow(0 0 15px rgba(37, 99, 235, 0.8));
        }

        .nav-links {
            display: flex;
            gap: 2rem;
            align-items: center;
        }

        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 600;
            font-size: 1rem;
            transition: all 0.3s ease;
            position: relative;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        .nav-links a::before {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background: linear-gradient(90deg, #3b82f6, #06b6d4);
            transition: width 0.3s ease;
        }

        .nav-links a:hover::before {
            width: 100%;
        }

        .nav-links a:hover {
            color: #60a5fa;
        }

        .user-greeting {
            color: #cbd5e1;
            font-size: 1rem;
            font-weight: 500;
            padding: 0.5rem 1rem;
            background: linear-gradient(135deg, rgba(30, 58, 138, 0.15), rgba(37, 99, 235, 0.15));
            border-radius: 8px;
            border: 1px solid rgba(37, 99, 235, 0.4);
        }

        .btn-logout {
            background: linear-gradient(135deg, #2563eb, #1e40af);
            color: #fff;
            padding: 0.7rem 1.5rem;
            border: 1px solid rgba(37, 99, 235, 0.5);
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            border-color: rgba(59, 130, 246, 0.6);
            box-shadow: 0 6px 20px rgba(37, 99, 235, 0.5);
        }

        .container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 2rem;
            position: relative;
            z-index: 1;
        }

        h1 {
            font-family: 'Orbitron', sans-serif;
            font-size: 2.8rem;
            margin-bottom: 2rem;
            background: linear-gradient(135deg, #fff, #60a5fa, #3b82f6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            font-weight: 900;
            text-transform: uppercase;
            letter-spacing: 3px;
            filter: drop-shadow(0 2px 10px rgba(37, 99, 235, 0.3));
            text-align: center;
        }

        .games-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .game-card {
            background: linear-gradient(145deg, rgba(30, 41, 59, 0.7) 0%, rgba(15, 23, 42, 0.9) 100%);
            border: 2px solid rgba(37, 99, 235, 0.4);
            border-radius: 20px;
            padding: 0;
            text-align: center;
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            cursor: pointer;
            position: relative;
            overflow: hidden;
            backdrop-filter: blur(15px);
        }

        .game-card::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: repeating-linear-gradient(
                45deg,
                transparent,
                transparent 10px,
                rgba(37, 99, 235, 0.03) 10px,
                rgba(37, 99, 235, 0.03) 20px
            );
            opacity: 0;
            transition: opacity 0.5s;
            z-index: 1;
            pointer-events: none;
        }

        .game-card::after {
            content: '';
            position: absolute;
            inset: -2px;
            background: linear-gradient(135deg, #3b82f6, #2563eb, #06b6d4, #3b82f6);
            background-size: 200% 200%;
            border-radius: 20px;
            opacity: 0;
            z-index: -1;
            transition: opacity 0.5s;
            animation: gradientShift 3s ease infinite;
            pointer-events: none;
        }

        @keyframes gradientShift {
            0%, 100% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
        }

        .game-card:hover::before {
            opacity: 1;
        }

        .game-card:hover::after {
            opacity: 0.6;
        }

        .game-card:hover {
            transform: translateY(-15px) scale(1.03);
            border-color: rgba(59, 130, 246, 0.8);
            box-shadow: 0 20px 50px rgba(37, 99, 235, 0.4),
                        0 0 30px rgba(6, 182, 212, 0.3);
        }

        .game-card .icon {
            font-size: 4.5rem;
            margin-bottom: 1rem;
            display: block;
            color: #64748b;
            filter: drop-shadow(0 4px 12px rgba(0, 0, 0, 0.5));
            transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
            position: relative;
            z-index: 2;
            padding: 2rem 1.5rem 1.5rem;
        }

        .game-card:hover .icon {
            transform: scale(1.15);
            color: #94a3b8;
            filter: drop-shadow(0 8px 20px rgba(100, 116, 139, 0.6));
        }

        .game-card h3 {
            position: relative;
            z-index: 2;
            color: #fff;
            margin-bottom: 0.5rem;
            font-size: 1.15rem;
            font-weight: 800;
            text-transform: uppercase;
            letter-spacing: 1.5px;
            transition: all 0.3s ease;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.3);
        }

        .game-card:hover h3 {
            color: #fff;
            transform: translateX(2px);
        }

        .game-card p {
            position: relative;
            z-index: 2;
            color: #94a3b8;
            font-size: 0.85rem;
            margin-bottom: 1rem;
            font-weight: 500;
            transition: color 0.3s ease;
            padding: 0 1.5rem;
        }

        .game-card:hover p {
            color: #cbd5e1;
        }

        .btn-select, .btn-topup {
            position: relative;
            z-index: 2;
            background: linear-gradient(135deg, #3b82f6, #2563eb);
            color: #fff;
            padding: 0.9rem 1.5rem;
            border: 1px solid rgba(59, 130, 246, 0.5);
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.9rem;
            font-weight: 700;
            transition: all 0.3s ease;
            width: calc(100% - 3rem);
            text-decoration: none;
            display: inline-block;
            margin: 0 1.5rem 1.5rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            box-shadow: 0 4px 15px rgba(37, 99, 235, 0.3);
        }

        .btn-select:hover, .btn-topup:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 20px rgba(37, 99, 235, 0.5);
            border-color: rgba(59, 130, 246, 0.8);
        }

        .section-title {
            font-size: 1.5rem;
            margin-bottom: 1.5rem;
            color: #F8FAFC;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .transactions-table {
            background: #1E293B;
            border: 1px solid #334155;
            border-radius: 12px;
            overflow: hidden;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            padding: 15px;
            text-align: left;
            border-bottom: 1px solid rgba(148, 163, 184, 0.1);
        }

        th {
            background: rgba(15, 23, 42, 0.5);
            font-weight: 600;
            color: #cbd5e1;
            font-size: 14px;
        }

        td {
            color: #cbd5e1;
            font-size: 14px;
        }

        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
        }

        .status-success {
            background: rgba(34, 197, 94, 0.2);
            color: #86efac;
        }

        .status-pending {
            background: rgba(251, 146, 60, 0.2);
            color: #fdba74;
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

        @media (max-width: 1200px) {
            .games-grid {
                grid-template-columns: repeat(4, 1fr);
                gap: 1.5rem;
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

            h1 {
                font-size: 1.5rem;
            }

            .games-grid {
                grid-template-columns: repeat(3, 1fr);
                gap: 1.5rem;
            }
        }

        @media (max-width: 480px) {
            .games-grid {
                grid-template-columns: repeat(2, 1fr);
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
            <a href="{{ route('home') }}">Beranda</a>
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
        <h1>Pilih Game untuk Top Up</h1>

        <div class="games-grid">
            @forelse ($games as $game)
                <div class="game-card" data-href="{{ route('topup.show', $game) }}" role="link" tabindex="0">
                    @php
                        $gameImages = [
                            'Mobile Legends' => 'ml.png',
                            'PUBG Mobile' => 'PUBG.png',
                            'Free Fire' => 'FF.png',
                            'Genshin Impact' => 'GENSHIN.png',
                            'Call of Duty Mobile' => 'COD.png',
                            'Valorant' => 'valo.png',
                        ];
                        $imgFile = $gameImages[$game->name] ?? null;
                    @endphp

                    @if ($imgFile && file_exists(public_path('images/games/' . $imgFile)))
                        <span class="icon"><img src="{{ asset('images/games/' . $imgFile) }}" alt="{{ $game->name }}" style="width: 100%; height: 100%; object-fit: contain;"></span>
                    @else
                        <div class="icon">{{ $game->icon }}</div>
                    @endif

                    <h3>{{ $game->name }}</h3>
                    <p>{{ $game->currency_type }}</p>
                    <a href="{{ route('topup.show', $game) }}" class="btn-select">Pilih Game</a>
                </div>
            @empty
                <p style="color: #94a3b8; grid-column: 1/-1; text-align: center;">Belum ada game tersedia</p>
            @endforelse
        </div>

        @if ($userTransactions->count() > 0)
            <h2 class="section-title">📊 Riwayat Transaksi Terakhir</h2>
            <div class="transactions-table">
                <table>
                    <thead>
                        <tr>
                            <th>Game</th>
                            <th>Nominal</th>
                            <th>Harga</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($userTransactions as $transaction)
                            <tr>
                                <td>{{ $transaction->game->name }}</td>
                                <td>{{ $transaction->amount }} {{ $transaction->game->currency_type }}</td>
                                <td>Rp {{ number_format($transaction->price, 0, ',', '.') }}</td>
                                <td>
                                    <span class="status-badge status-{{ $transaction->status }}">
                                        {{ ucfirst($transaction->status) }}
                                    </span>
                                </td>
                                <td>{{ $transaction->created_at->format('d M Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <script>
        // Make the entire game card clickable (keyboard accessible too)
        document.querySelectorAll('.game-card[data-href]').forEach((card) => {
            const href = card.getAttribute('data-href');

            card.addEventListener('click', (e) => {
                if (e.target.closest('a, button, form, input, select, textarea')) return;
                window.location.href = href;
            });

            card.addEventListener('keydown', (e) => {
                if (e.key === 'Enter' || e.key === ' ') {
                    e.preventDefault();
                    window.location.href = href;
                }
            });
        });
    </script>
</body>
</html>
