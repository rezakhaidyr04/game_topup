<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Game - Game TopUp</title>
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

        h1 {
            font-size: 2rem;
            margin-bottom: 0.5rem;
            color: #F8FAFC;
            font-weight: 700;
            text-align: center;
        }

        .games-grid {
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

        .game-card h3 {
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

        .btn-select, .btn-topup {
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

        .btn-select:hover, .btn-topup:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(56, 189, 248, 0.3);
            background: #6366F1;
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
        <h1>Pilih Game untuk Top Up</h1>

        <div class="games-grid">
            @forelse ($games as $game)
                <div class="game-card">
                    @php
                        $gameImages = [
                            'Mobile Legends' => 'ml.png',
                            'PUBG Mobile' => 'PUBG.png',
                            'Free Fire' => 'FF.png',
                            'Genshin Impact' => 'GENSHIN.png',
                            'Call of Duty Mobile' => 'HONKAI.png',
                            'Valorant' => 'AOV.png',
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
</body>
</html>
