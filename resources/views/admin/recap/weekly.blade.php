<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekap Mingguan - Admin GameTopup</title>
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
        .stat-value{font-size:32px;font-weight:700;color:#10b981}
        .stat-label{font-size:14px;color:#94a3b8;margin-bottom:8px}
        .badge{padding:4px 8px;border-radius:4px;font-size:12px;font-weight:600}
        .badge-success{background:#10b98144;color:#10b981}
        .badge-warning{background:#f59e0b44;color:#f59e0b}
        .badge-danger{background:#dc262644;color:#dc2626}
        .chart-bar{background:#1e293b;border-radius:4px;overflow:hidden;margin:8px 0;display:flex;align-items:center}
        .chart-fill{background:linear-gradient(90deg, #10b981, #059669);height:32px;display:flex;align-items:center;justify-content:flex-end;padding:0 8px;font-size:12px;font-weight:600}
        .day-card{background:#111827;border:1px solid #334155;border-radius:6px;padding:1rem;margin:0.5rem 0}
    </style>
</head>
<body>
    <header>
        <div style="display:flex;justify-content:space-between;align-items:center">
            <div style="font-weight:700;color:#38BDF8">Admin - GameTopup</div>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="btn">Kembali ke Dashboard</a>
                <a href="{{ route('admin.promocodes.index') }}" class="btn" style="margin-left:6px;">🏷️ Promo</a>
            </div>
        </div>
    </header>

    <div class="container">
        <h1 style="color:#f8fafc;margin-bottom:0.5rem">📅 Rekap Mingguan</h1>
        <p style="color:#94a3b8;margin-top:0">{{ $startOfWeek->format('d M Y') }} - {{ $endOfWeek->format('d M Y') }}</p>

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
                <div class="stat-label">Rata-rata per Hari</div>
                <div class="stat-value">{{ $totalTransactions > 0 ? number_format($totalTransactions / 7, 1) : 0 }}</div>
            </div>
        </div>

        <!-- Daily Stats -->
        <h2>Statistik Per Hari</h2>
        <div class="section">
            @if($dailyStats->isEmpty())
                <p style="color:#94a3b8">Belum ada data transaksi minggu ini</p>
            @else
                @php
                    $maxRevenue = $dailyStats->max('revenue');
                @endphp
                @foreach($dailyStats as $stat)
                    <div class="day-card">
                        <div style="display:flex;justify-content:space-between;margin-bottom:8px">
                            <span style="font-weight:600;color:#f1f5f9">{{ \Carbon\Carbon::parse($stat->date)->format('l, d M Y') }}</span>
                            <span style="color:#94a3b8">{{ $stat->count }} transaksi</span>
                        </div>
                        <div class="chart-bar">
                            <div class="chart-fill" style="width:{{ $maxRevenue > 0 ? ($stat->revenue / $maxRevenue) * 100 : 0 }}%">
                                Rp {{ number_format($stat->revenue, 0, ',', '.') }}
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        <!-- Top Games -->
        <h2>Top 5 Game Terpopuler</h2>
        <div class="section">
            @if($topGames->isEmpty())
                <p style="color:#94a3b8">Belum ada data transaksi minggu ini</p>
            @else
                <div style="overflow-x:auto">
                    <table>
                        <thead>
                            <tr>
                                <th>Rank</th>
                                <th>Game</th>
                                <th style="text-align:right">Transaksi</th>
                                <th style="text-align:right">Pendapatan</th>
                                <th style="text-align:right">% dari Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($topGames as $index => $item)
                                <tr>
                                    <td>
                                        @if($index === 0)
                                            🥇
                                        @elseif($index === 1)
                                            🥈
                                        @elseif($index === 2)
                                            🥉
                                        @else
                                            {{ $index + 1 }}
                                        @endif
                                    </td>
                                    <td style="font-weight:600">{{ $item->game->name ?? 'Unknown' }}</td>
                                    <td style="text-align:right">{{ $item->count }}</td>
                                    <td style="text-align:right;color:#10b981;font-weight:600">Rp {{ number_format($item->revenue, 0, ',', '.') }}</td>
                                    <td style="text-align:right">{{ number_format(($item->count / $totalTransactions) * 100, 1) }}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @endif
        </div>

        <!-- Recent Transactions -->
        <h2>Transaksi Terbaru (10 Terakhir)</h2>
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

        <!-- Performance Summary -->
        <div class="section" style="background:linear-gradient(135deg, #111827, #0b1220);border:1px solid #10b981">
            <h3 style="margin-top:0;color:#10b981">📈 Ringkasan Performa</h3>
            <div style="display:grid;grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));gap:1.5rem">
                <div>
                    <div style="font-size:13px;color:#94a3b8;margin-bottom:4px">Hari Terbaik</div>
                    <div style="font-weight:600">
                        @if($dailyStats->isNotEmpty())
                            {{ \Carbon\Carbon::parse($dailyStats->sortByDesc('revenue')->first()->date)->format('l, d M') }}
                        @else
                            -
                        @endif
                    </div>
                </div>
                <div>
                    <div style="font-size:13px;color:#94a3b8;margin-bottom:4px">Game Terlaris</div>
                    <div style="font-weight:600">
                        {{ $topGames->first()->game->name ?? '-' }}
                    </div>
                </div>
                <div>
                    <div style="font-size:13px;color:#94a3b8;margin-bottom:4px">Rata-rata Transaksi</div>
                    <div style="font-weight:600">
                        Rp {{ $totalTransactions > 0 ? number_format($totalRevenue / $totalTransactions, 0, ',', '.') : 0 }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
