<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - GameTopup</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #0f172a; color: #f8fafc; margin:0 }
        header{background:#020617;padding:1rem 2rem;border-bottom:1px solid #334155}
        .container{max-width:1100px;margin:2rem auto;padding:0 1rem}
        .cards{display:flex;gap:1rem;flex-wrap:wrap}
        .card{background:#111827;padding:1rem;border-radius:8px;border:1px solid #334155;flex:1;min-width:200px}
        table{width:100%;border-collapse:collapse}
        th,td{padding:8px;text-align:left;border-bottom:1px solid rgba(148,163,184,0.06)}
        a.btn{background:#38bdf8;color:#020617;padding:6px 10px;border-radius:6px;text-decoration:none;font-weight:600}
    </style>
</head>
<body>
    <header>
        <div style="display:flex;justify-content:space-between;align-items:center">
            <div style="font-weight:700;color:#38BDF8">Admin - GameTopup</div>
            <div>
                <a href="{{ route('admin.recap.index') }}" class="btn" style="background:#10b981;margin-right:4px;">📊 Rekapan</a>
                <a href="{{ route('admin.topups.index') }}" class="btn">Kelola Harga</a>
                <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" style="background:#dc2626;color:#fff;border:none;padding:6px 10px;border-radius:6px;font-weight:600;cursor:pointer;">Logout</button>
                </form>
            </div>
        </div>
    </header>

    <div class="container">
        <h1>Dashboard</h1>
        <div class="cards" style="margin:1rem 0 2rem">
            <div class="card">
                <div style="font-size:14px;color:#94a3b8">Games</div>
                <div style="font-size:28px;font-weight:700">{{ $gamesCount }}</div>
            </div>
            <div class="card">
                <div style="font-size:14px;color:#94a3b8">Paket TopUp</div>
                <div style="font-size:28px;font-weight:700">{{ $topupsCount }}</div>
            </div>
            <div class="card">
                <div style="font-size:14px;color:#94a3b8">Transaksi</div>
                <div style="font-size:28px;font-weight:700">{{ $transactionsCount }}</div>
            </div>
        </div>

        <h2>Transaksi Terbaru</h2>
        <div style="background:#0b1220;padding:1rem;border-radius:8px;border:1px solid #334155;margin-top:0.5rem">
            @if($recentTransactions->isEmpty())
                <p style="color:#94a3b8">Belum ada transaksi</p>
            @else
            <table>
                <thead>
                    <tr><th>Game</th><th>Paket</th><th>Harga</th><th>Status</th><th>Tanggal</th></tr>
                </thead>
                <tbody>
                    @foreach($recentTransactions as $t)
                        <tr>
                            <td>{{ $t->game->name ?? '-' }}</td>
                            <td>{{ $t->topup->name ?? $t->amount }}</td>
                            <td>Rp {{ number_format($t->price,0,',','.') }}</td>
                            <td>{{ ucfirst($t->status) }}</td>
                            <td>{{ $t->created_at->format('d M Y H:i') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>
</body>
</html>
