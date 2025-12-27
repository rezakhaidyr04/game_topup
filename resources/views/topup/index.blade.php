<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Top Up Game - Game TopUp</title>
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

        h1 {
            font-size: 32px;
            margin-bottom: 30px;
            text-align: center;
            background: linear-gradient(135deg, #ec4899, #d946ef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .games-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 50px;
        }

        .game-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.8) 0%, rgba(45, 27, 105, 0.5) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .game-card:hover {
            transform: translateY(-8px);
            border-color: rgba(236, 72, 153, 0.5);
            box-shadow: 0 20px 40px rgba(236, 72, 153, 0.2);
        }

        .game-card .icon {
            font-size: 60px;
            margin-bottom: 10px;
        }

        .game-card h3 {
            color: #e2e8f0;
            margin-bottom: 5px;
            font-size: 18px;
        }

        .game-card p {
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 15px;
        }

        .btn-select {
            background: linear-gradient(135deg, #ec4899 0%, #d946ef 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-select:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(236, 72, 153, 0.3);
        }

        .section-title {
            font-size: 24px;
            margin: 40px 0 20px;
            color: #e2e8f0;
        }

        .transactions-table {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.8) 0%, rgba(45, 27, 105, 0.5) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
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
    </style>
</head>
<body>
    <header>
        <div class="logo-header">🎮 Game TopUp</div>
        <div class="nav-links">
            <a href="{{ route('home') }}">Dashboard</a>
            <a href="{{ route('topup.index') }}">Top Up</a>
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
                    <div class="icon">{{ $game->icon }}</div>
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
