<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekap Bulanan - Admin GameTopup</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #0f172a; color: #f8fafc; margin:0 }
        header{background:#020617;padding:1rem 2rem;border-bottom:1px solid #334155}
        .container{max-width:1200px;margin:2rem auto;padding:0 1rem}
        .cards{display:flex;gap:1rem;flex-wrap:wrap;margin:1rem 0 2rem}
        .card{background:#111827;padding:1.5rem;border-radius:8px;border:1px solid #334155;flex:1;min-width:200px}
        table{width:100%;border-collapse:collapse;font-size:14px}
        th,td{padding:10px 8px;text-align:left;border-bottom:1px solid rgba(148,163,184,0.08)}
        th{background:#0b1220;font-weight:600;color:#94a3b8;font-size:13px;text-transform:uppercase;letter-spacing:0.05em}
        a.btn{background:#38bdf8;color:#020617;padding:6px 12px;border-radius:6px;text-decoration:none;font-weight:600;display:inline-block}
        .section{background:#0b1220;padding:1.5rem;border-radius:8px;border:1px solid #334155;margin:1.5rem 0}
        h2{margin-top:2rem;color:#f1f5f9}
        .stat-value{font-size:32px;font-weight:700;color:#38bdf8}
        .stat-label{font-size:14px;color:#94a3b8;margin-bottom:8px}
        .badge{padding:4px 8px;border-radius:4px;font-size:12px;font-weight:600}
        .badge-success{background:#10b98144;color:#10b981}
        .badge-warning{background:#f59e0b44;color:#f59e0b}
        .badge-danger{background:#dc262644;color:#dc2626}
        .chart-bar{background:#1e293b;border-radius:4px;overflow:hidden;margin:8px 0;display:flex;align-items:center}
        .chart-fill{background:linear-gradient(90deg, #38bdf8, #3b82f6);height:32px;display:flex;align-items:center;justify-content:flex-end;padding:0 8px;font-size:12px;font-weight:600}
    </style>
</head>
<body>
    <header>
        <div style="display:flex;justify-content:space-between;align-items:center">
            <div style="font-weight:700;color:#38BDF8">Admin - GameTopup</div>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="btn">Kembali ke Dashboard</a>
            </div>
        </div>
    </header>

    <div class="container">
        <h1 style="color:#f8fafc;margin-bottom:0.5rem">📊 Rekap Bulanan</h1>
        <p style="color:#94a3b8;margin-top:0">{{ $startOfMonth->format('d M Y') }} - {{ $endOfMonth->format('d M Y') }}</p>

        <!-- Summary Cards -->
        <div class="cards">
            <div class="card">
                <div class="stat-label">Total Transaksi</div>
                <div class="stat-value">{{ number_format($totalTransactions) }}</div>
            </div>
            <div class="card">
                <div class="stat-label">Total Pendapatan</div>
                <div class="stat-value">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</div>
            </div>
            <div class="card">
                <div class="stat-label">Rata-rata per Transaksi</div>
                <div class="stat-value">Rp {{ $totalTransactions > 0 ? number_format($totalRevenue / $totalTransactions, 0, ',', '.') : 0 }}</div>
            </div>
        </div>

        <!-- Status Transaksi -->
        <h2>Status Transaksi</h2>
        <div class="section">
            <div style="display:flex;gap:2rem;flex-wrap:wrap">
                @foreach($statusStats as $stat)
                    <div style="flex:1;min-width:150px">
                        <div style="font-size:24px;font-weight:700;color:#f1f5f9">{{ $stat->count }}</div>
                        <div style="font-size:14px;color:#94a3b8;text-transform:capitalize">{{ $stat->status }}</div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Top Games -->
        <h2>Top 10 Game Terpopuler</h2>
        <div class="section">
            @if($topGames->isEmpty())
                <p style="color:#94a3b8">Belum ada data transaksi bulan ini</p>
            @else
                @foreach($topGames as $index => $item)
                    <div style="margin-bottom:1rem">
                        <div style="display:flex;justify-content:space-between;margin-bottom:4px">
                            <span style="font-weight:600">{{ $index + 1 }}. {{ $item->game->name ?? 'Unknown' }}</span>
                            <span style="color:#94a3b8">{{ $item->count }} transaksi • Rp {{ number_format($item->revenue, 0, ',', '.') }}</span>
                        </div>
                        <div class="chart-bar">
                            <div class="chart-fill" style="width:{{ ($item->count / $topGames->max('count')) * 100 }}%">
                                {{ number_format(($item->count / $totalTransactions) * 100, 1) }}%
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Daily Stats -->
        <h2>Statistik Harian</h2>
        <div class="section">
            @if($dailyStats->isEmpty())
                <p style="color:#94a3b8">Belum ada data transaksi harian</p>
            @else
                <div style="overflow-x:auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th style="text-align:right">Transaksi</th>
                                <th style="text-align:right">Pendapatan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($dailyStats as $stat)
                                <tr>
                                    <td>{{ \Carbon\Carbon::parse($stat->date)->format('d M Y (l)') }}</td>
                                    <td style="text-align:right;font-weight:600">{{ $stat->count }}</td>
                                    <td style="text-align:right;color:#10b981;font-weight:600">Rp {{ number_format($stat->revenue, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr style="background:#111827;font-weight:700">
                                <td>Total</td>
                                <td style="text-align:right">{{ $totalTransactions }}</td>
                                <td style="text-align:right;color:#10b981">Rp {{ number_format($totalRevenue, 0, ',', '.') }}</td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            @endif
        </div>

        <!-- Recent Transactions -->
        <h2>Transaksi Terbaru (15 Terakhir)</h2>
        <div class="section">
            @if($recentTransactions->isEmpty())
                <p style="color:#94a3b8">Belum ada transaksi</p>
            @else
                <div style="overflow-x:auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>User</th>
                                <th>Game</th>
                                <th>Paket</th>
                                <th style="text-align:right">Harga</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentTransactions as $t)
                                <tr>
                                    <td style="font-size:13px">{{ $t->created_at->format('d M Y H:i') }}</td>
                                    <td>{{ $t->user->name ?? '-' }}</td>
                                    <td>{{ $t->game->name ?? '-' }}</td>
                                    <td>{{ $t->topup->name ?? $t->amount }}</td>
                                    <td style="text-align:right;font-weight:600">Rp {{ number_format($t->price, 0, ',', '.') }}</td>
                                    <td>
                                        @if($t->status === 'completed')
                                            <span class="badge badge-success">Selesai</span>
                                        @elseif($t->status === 'pending')
                                            <span class="badge badge-warning">Pending</span>
                                        @else
                                            <span class="badge badge-danger">{{ ucfirst($t->status) }}</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>
    </div>
</body>
</html>
