<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekapan - Admin GameTopup</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; background: #0f172a; color: #f8fafc; margin:0 }
        header{background:#020617;padding:1rem 2rem;border-bottom:1px solid #334155}
        .container{max-width:1400px;margin:2rem auto;padding:0 1rem}
        .tabs{display:flex;gap:0.5rem;margin:1.5rem 0;border-bottom:2px solid #334155}
        .tab{padding:0.75rem 1.5rem;background:transparent;border:none;color:#94a3b8;font-weight:600;cursor:pointer;border-bottom:3px solid transparent;transition:all 0.2s}
        .tab:hover{color:#f8fafc;background:#111827}
        .tab.active{color:#10b981;border-bottom-color:#10b981;background:#111827}
        .tab-content{display:none}
        .tab-content.active{display:block}
        .cards{display:flex;gap:1rem;flex-wrap:wrap;margin:1rem 0 2rem}
        .card{background:#111827;padding:1.5rem;border-radius:8px;border:1px solid #334155;flex:1;min-width:200px}
        table{width:100%;border-collapse:collapse;font-size:14px}
        th,td{padding:10px 8px;text-align:left;border-bottom:1px solid rgba(148,163,184,0.08)}
        th{background:#0b1220;font-weight:600;color:#94a3b8;font-size:13px;text-transform:uppercase;letter-spacing:0.05em}
        a.btn{background:#38bdf8;color:#020617;padding:6px 12px;border-radius:6px;text-decoration:none;font-weight:600;display:inline-block}
        .section{background:#0b1220;padding:1.5rem;border-radius:8px;border:1px solid #334155;margin:1.5rem 0}
        h2{margin-top:2rem;color:#f1f5f9;font-size:20px}
        .stat-value{font-size:32px;font-weight:700}
        .stat-label{font-size:14px;color:#94a3b8;margin-bottom:8px}
        .badge{padding:4px 8px;border-radius:4px;font-size:12px;font-weight:600}
        .badge-success{background:#10b98144;color:#10b981}
        .badge-warning{background:#f59e0b44;color:#f59e0b}
        .badge-danger{background:#dc262644;color:#dc2626}
        .chart-bar{background:#1e293b;border-radius:4px;overflow:hidden;margin:8px 0;display:flex;align-items:center}
        .chart-fill{height:32px;display:flex;align-items:center;justify-content:flex-end;padding:0 8px;font-size:12px;font-weight:600}
        .chart-fill.weekly{background:linear-gradient(90deg, #10b981, #059669)}
        .chart-fill.monthly{background:linear-gradient(90deg, #38bdf8, #3b82f6)}
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
        <h1 style="color:#f8fafc;margin-bottom:0.5rem">📊 Rekapan Transaksi</h1>
        <p style="color:#94a3b8;margin-top:0">Lihat performa transaksi mingguan dan bulanan</p>

        <!-- Tabs -->
        <div class="tabs">
            <button class="tab active" onclick="switchTab('weekly')">📅 Rekap Mingguan</button>
            <button class="tab" onclick="switchTab('monthly')">📆 Rekap Bulanan</button>
        </div>

        <!-- Weekly Tab Content -->
        <div id="weekly-content" class="tab-content active">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem">
                <h2 style="margin:0">Minggu Ini</h2>
                <span style="color:#94a3b8">{{ $startOfWeek->format('d M Y') }} - {{ $endOfWeek->format('d M Y') }}</span>
            </div>

            <!-- Summary Cards -->
            <div class="cards">
                <div class="card">
                    <div class="stat-label">Total Transaksi</div>
                    <div class="stat-value" style="color:#10b981">{{ number_format($weeklyTotalTransactions) }}</div>
                </div>
                <div class="card">
                    <div class="stat-label">Total Pendapatan</div>
                    <div class="stat-value" style="color:#10b981">Rp {{ number_format($weeklyTotalRevenue, 0, ',', '.') }}</div>
                </div>
                <div class="card">
                    <div class="stat-label">Rata-rata per Hari</div>
                    <div class="stat-value" style="color:#10b981">{{ $weeklyTotalTransactions > 0 ? number_format($weeklyTotalTransactions / 7, 1) : 0 }}</div>
                </div>
            </div>

            <!-- Daily Stats -->
            <h2>Statistik Per Hari</h2>
            <div class="section">
                @if($weeklyDailyStats->isEmpty())
                    <p style="color:#94a3b8">Belum ada data transaksi minggu ini</p>
                @else
                    @php
                        $maxWeeklyRevenue = $weeklyDailyStats->max('revenue');
                    @endphp
                    @foreach($weeklyDailyStats as $stat)
                        <div class="day-card">
                            <div style="display:flex;justify-content:space-between;margin-bottom:8px">
                                <span style="font-weight:600;color:#f1f5f9">{{ \Carbon\Carbon::parse($stat->date)->format('l, d M Y') }}</span>
                                <span style="color:#94a3b8">{{ $stat->count }} transaksi</span>
                            </div>
                            <div class="chart-bar">
                                <div class="chart-fill weekly" style="width:{{ $maxWeeklyRevenue > 0 ? ($stat->revenue / $maxWeeklyRevenue) * 100 : 0 }}%">
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
                @if($weeklyTopGames->isEmpty())
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
                                @foreach($weeklyTopGames as $index => $item)
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
                                        <td style="text-align:right">{{ $weeklyTotalTransactions > 0 ? number_format(($item->count / $weeklyTotalTransactions) * 100, 1) : 0 }}%</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
            </div>
        </div>

        <!-- Monthly Tab Content -->
        <div id="monthly-content" class="tab-content">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem">
                <h2 style="margin:0">Bulan Ini</h2>
                <span style="color:#94a3b8">{{ $startOfMonth->format('d M Y') }} - {{ $endOfMonth->format('d M Y') }}</span>
            </div>

            <!-- Summary Cards -->
            <div class="cards">
                <div class="card">
                    <div class="stat-label">Total Transaksi</div>
                    <div class="stat-value" style="color:#38bdf8">{{ number_format($monthlyTotalTransactions) }}</div>
                </div>
                <div class="card">
                    <div class="stat-label">Total Pendapatan</div>
                    <div class="stat-value" style="color:#38bdf8">Rp {{ number_format($monthlyTotalRevenue, 0, ',', '.') }}</div>
                </div>
                <div class="card">
                    <div class="stat-label">Rata-rata per Transaksi</div>
                    <div class="stat-value" style="color:#38bdf8">Rp {{ $monthlyTotalTransactions > 0 ? number_format($monthlyTotalRevenue / $monthlyTotalTransactions, 0, ',', '.') : 0 }}</div>
                </div>
            </div>

            <!-- Status Transaksi -->
            <h2>Status Transaksi</h2>
            <div class="section">
                <div style="display:flex;gap:2rem;flex-wrap:wrap">
                    @foreach($monthlyStatusStats as $stat)
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
                @if($monthlyTopGames->isEmpty())
                    <p style="color:#94a3b8">Belum ada data transaksi bulan ini</p>
                @else
                    @foreach($monthlyTopGames as $index => $item)
                        <div style="margin-bottom:1rem">
                            <div style="display:flex;justify-content:space-between;margin-bottom:4px">
                                <span style="font-weight:600">{{ $index + 1 }}. {{ $item->game->name ?? 'Unknown' }}</span>
                                <span style="color:#94a3b8">{{ $item->count }} transaksi • Rp {{ number_format($item->revenue, 0, ',', '.') }}</span>
                            </div>
                            <div class="chart-bar">
                                <div class="chart-fill monthly" style="width:{{ ($item->count / $monthlyTopGames->max('count')) * 100 }}%">
                                    {{ $monthlyTotalTransactions > 0 ? number_format(($item->count / $monthlyTotalTransactions) * 100, 1) : 0 }}%
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Daily Stats -->
            <h2>Statistik Harian</h2>
            <div class="section">
                @if($monthlyDailyStats->isEmpty())
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
                                @foreach($monthlyDailyStats as $stat)
                                    <tr>
                                        <td>{{ \Carbon\Carbon::parse($stat->date)->format('d M Y (l)') }}</td>
                                        <td style="text-align:right;font-weight:600">{{ $stat->count }}</td>
                                        <td style="text-align:right;color:#38bdf8;font-weight:600">Rp {{ number_format($stat->revenue, 0, ',', '.') }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr style="background:#111827;font-weight:700">
                                    <td>Total</td>
                                    <td style="text-align:right">{{ $monthlyTotalTransactions }}</td>
                                    <td style="text-align:right;color:#38bdf8">Rp {{ number_format($monthlyTotalRevenue, 0, ',', '.') }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
        function switchTab(tabName) {
            // Hide all tab contents
            document.querySelectorAll('.tab-content').forEach(content => {
                content.classList.remove('active');
            });
            
            // Remove active class from all tabs
            document.querySelectorAll('.tab').forEach(tab => {
                tab.classList.remove('active');
            });
            
            // Show selected tab content
            document.getElementById(tabName + '-content').classList.add('active');
            
            // Add active class to clicked tab
            event.target.classList.add('active');
        }
    </script>
</body>
</html>
