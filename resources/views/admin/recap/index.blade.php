<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rekapan - Admin GameTopup</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body { 
            font-family: 'Inter', sans-serif; 
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 50%, #dee2e6 100%);
            background-attachment: fixed;
            color: #2d3748; 
            margin: 0;
            min-height: 100vh;
            position: relative;
            overflow-x: hidden;
        }

        body::before {
            content: '';
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: 
                radial-gradient(circle at 20% 30%, rgba(99, 102, 241, 0.03) 0%, transparent 50%),
                radial-gradient(circle at 80% 70%, rgba(139, 92, 246, 0.03) 0%, transparent 50%);
            z-index: 0;
            pointer-events: none;
        }

        header {
            background: rgba(255, 255, 255, 0.95);
            padding: 1.5rem 2rem;
            border-bottom: 1px solid rgba(99, 102, 241, 0.1);
            box-shadow: 0 2px 20px rgba(99, 102, 241, 0.08);
            backdrop-filter: blur(20px);
            position: relative;
            z-index: 10;
        }

        header::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(90deg, transparent, rgba(99, 102, 241, 0.3), rgba(139, 92, 246, 0.3), transparent);
        }

        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            max-width: 1400px;
            margin: 0 auto;
        }

        .logo-header {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: #6366f1;
            display: flex;
            align-items: center;
            gap: 0.7rem;
            letter-spacing: -0.5px;
        }

        .logo-header i {
            color: #8b5cf6;
            font-size: 1.8rem;
        }

        .nav-buttons {
            display: flex;
            gap: 0.6rem;
            align-items: center;
        }

        a.btn {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: #fff;
            padding: 0.65rem 1.2rem;
            border-radius: 10px;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.875rem;
            transition: all 0.3s ease;
            border: none;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        a.btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(99, 102, 241, 0.3);
        }

        a.btn.btn-success {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.2);
        }

        a.btn.btn-success:hover {
            box-shadow: 0 6px 16px rgba(16, 185, 129, 0.3);
        }

        a.btn.btn-warning {
            background: linear-gradient(135deg, #f59e0b 0%, #d97706 100%);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.2);
        }

        a.btn.btn-warning:hover {
            box-shadow: 0 6px 16px rgba(245, 158, 11, 0.3);
        }

        .btn-logout {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%);
            color: #fff;
            border: none;
            padding: 0.65rem 1.2rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            box-shadow: 0 4px 12px rgba(239, 68, 68, 0.2);
            transition: all 0.3s ease;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-logout:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(239, 68, 68, 0.3);
        }

        .container {
            max-width: 1400px;
            margin: 2rem auto;
            padding: 0 2rem;
            position: relative;
            z-index: 1;
        }

        .welcome-section {
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(99, 102, 241, 0.15);
            border-radius: 20px;
            padding: 2.5rem;
            margin-bottom: 2.5rem;
            backdrop-filter: blur(20px);
            box-shadow: 0 8px 32px rgba(99, 102, 241, 0.08);
            position: relative;
            overflow: hidden;
        }

        .welcome-section::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .welcome-section h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 2.2rem;
            font-weight: 700;
            color: #6366f1;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .welcome-section p {
            color: #64748b;
            font-size: 1.05rem;
            font-weight: 500;
            position: relative;
            z-index: 1;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0;
        }

        .card {
            background: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 18px;
            border: 1px solid rgba(99, 102, 241, 0.15);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            backdrop-filter: blur(20px);
            position: relative;
            overflow: hidden;
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.06);
        }

        .card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #6366f1, #8b5cf6, #ec4899);
            opacity: 0;
            transition: opacity 0.4s;
        }

        .card:hover {
            transform: translateY(-8px);
            border-color: rgba(99, 102, 241, 0.3);
            box-shadow: 0 12px 40px rgba(99, 102, 241, 0.15);
        }

        .card:hover::before {
            opacity: 1;
        }

        .card-icon {
            font-size: 2.5rem;
            margin-bottom: 1rem;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            filter: drop-shadow(0 2px 4px rgba(99, 102, 241, 0.2));
        }

        .card-label {
            font-size: 0.875rem;
            color: #94a3b8;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-bottom: 0.5rem;
        }

        .card-value {
            font-size: 2.5rem;
            font-weight: 800;
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .section-title {
            font-family: 'Poppins', sans-serif;
            font-size: 1.75rem;
            margin: 3rem 0 1.5rem;
            color: #6366f1;
            font-weight: 700;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .section-title i {
            color: #8b5cf6;
        }

        .table-container {
            background: rgba(255, 255, 255, 0.8);
            padding: 1.5rem;
            border-radius: 18px;
            border: 1px solid rgba(99, 102, 241, 0.15);
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.06);
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th {
            padding: 1rem;
            text-align: left;
            border-bottom: 2px solid rgba(99, 102, 241, 0.15);
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            font-size: 0.8rem;
            color: #6366f1;
        }

        td {
            padding: 1rem;
            border-bottom: 1px solid rgba(148, 163, 184, 0.1);
            color: #475569;
        }

        tbody tr {
            transition: all 0.3s ease;
        }

        tbody tr:hover {
            background: rgba(99, 102, 241, 0.04);
        }

        .status-badge {
            padding: 0.4rem 0.9rem;
            border-radius: 20px;
            font-size: 0.8rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
        }

        .status-success {
            background: rgba(16, 185, 129, 0.15);
            color: #059669;
        }

        .status-pending {
            background: rgba(245, 158, 11, 0.15);
            color: #d97706;
        }

        .status-failed {
            background: rgba(239, 68, 68, 0.15);
            color: #dc2626;
        }

        .chart-bar {
            width: 100%;
            height: 8px;
            background: rgba(148, 163, 184, 0.2);
            border-radius: 4px;
            overflow: hidden;
            margin-top: 0.5rem;
        }

        .chart-fill {
            height: 100%;
            border-radius: 4px;
            background: linear-gradient(90deg, #6366f1, #8b5cf6);
            transition: width 0.8s ease;
            position: relative;
        }

        .chart-fill.weekly {
            background: linear-gradient(90deg, #10b981, #059669);
        }

        .chart-fill.monthly {
            background: linear-gradient(90deg, #f59e0b, #d97706);
        }

        .chart-fill::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(90deg, rgba(255,255,255,0.3), transparent);
            border-radius: inherit;
        }

        /* Menu Grid Styles */
        .menu-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 1.5rem;
            margin: 2rem 0 3rem;
        }

        .menu-card {
            background: rgba(255, 255, 255, 0.8);
            padding: 2rem;
            border-radius: 18px;
            border: 1px solid rgba(99, 102, 241, 0.15);
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 20px rgba(99, 102, 241, 0.06);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 1.5rem;
            position: relative;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .menu-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #6366f1, #8b5cf6);
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }

        .menu-card.menu-success::before {
            background: linear-gradient(90deg, #10b981, #059669);
        }

        .menu-card.menu-warning::before {
            background: linear-gradient(90deg, #f59e0b, #d97706);
        }

        .menu-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 40px rgba(99, 102, 241, 0.15);
            border-color: rgba(99, 102, 241, 0.3);
        }

        .menu-card:hover::before {
            transform: scaleX(1);
        }

        .menu-icon {
            width: 60px;
            height: 60px;
            border-radius: 14px;
            background: linear-gradient(135deg, #6366f1, #8b5cf6);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: white;
            flex-shrink: 0;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
            transition: all 0.3s ease;
        }

        .menu-card.menu-success .menu-icon {
            background: linear-gradient(135deg, #10b981, #059669);
            box-shadow: 0 4px 12px rgba(16, 185, 129, 0.3);
        }

        .menu-card.menu-warning .menu-icon {
            background: linear-gradient(135deg, #f59e0b, #d97706);
            box-shadow: 0 4px 12px rgba(245, 158, 11, 0.3);
        }

        .menu-card:hover .menu-icon {
            transform: rotate(5deg) scale(1.1);
        }

        .menu-content {
            flex: 1;
        }

        .menu-content h3 {
            font-family: 'Poppins', sans-serif;
            font-size: 1.25rem;
            font-weight: 700;
            color: #1e293b;
            margin-bottom: 0.4rem;
        }

        .menu-content p {
            font-size: 0.875rem;
            color: #64748b;
            margin: 0;
        }

        .menu-arrow {
            font-size: 1.2rem;
            color: #cbd5bd;
            transition: all 0.3s ease;
        }

        .menu-card:hover .menu-arrow {
            color: #6366f1;
            transform: translateX(5px);
        }

        .menu-card.menu-success:hover .menu-arrow {
            color: #10b981;
        }

        .menu-card.menu-warning:hover .menu-arrow {
            color: #f59e0b;
        }

        .divider {
            margin: 3rem 0 1.5rem;
        }

        .divider-text {
            font-family: 'Poppins', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            color: #6366f1;
            display: flex;
            align-items: center;
            gap: 0.8rem;
        }

        .divider-text i {
            color: #8b5cf6;
        }

        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
                gap: 1rem;
            }

            .nav-buttons {
                flex-wrap: wrap;
                justify-content: center;
            }

            .container {
                padding: 0 1rem;
            }

            .welcome-section h1 {
                font-size: 1.6rem;
            }

            .cards {
                grid-template-columns: 1fr;
            }

            .menu-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo-header">
                <i class="fas fa-shield-halved"></i>
                Admin Panel
            </div>
            <div class="nav-buttons">
                <a href="{{ route('admin.dashboard') }}" class="btn btn-success">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('admin.topups.index') }}" class="btn">
                    <i class="fas fa-coins"></i> Kelola Harga
                </a>
                <a href="{{ route('admin.promocodes.index') }}" class="btn btn-warning">
                    <i class="fas fa-tags"></i> Promo
                </a>
            </div>
        </div>
    </header>

    <div class="container">
        <h1 style="color:#f8fafc;margin-bottom:0.5rem">📊 Rekapan Transaksi</h1>
        <p style="color:#94a3b8;margin-top:0">Lihat performa transaksi mingguan dan bulanan</p>

        <div style="display:flex;gap:0.5rem;margin:1.5rem 0;border-bottom:2px solid rgba(99,102,241,0.15);padding-bottom:1rem;">
            <button class="tab active" onclick="switchTab('weekly')" style="padding:0.75rem 1.5rem;background:transparent;border:none;color:#64748b;font-weight:600;cursor:pointer;border-bottom:3px solid transparent;transition:all 0.2s;">📅 Rekap Mingguan</button>
            <button class="tab" onclick="switchTab('monthly')" style="padding:0.75rem 1.5rem;background:transparent;border:none;color:#64748b;font-weight:600;cursor:pointer;border-bottom:3px solid transparent;transition:all 0.2s;">📆 Rekap Bulanan</button>
        </div>

        <!-- Weekly Tab Content -->
        <div id="weekly-content" class="tab-content active">
            <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem">
                <h2 style="margin:0">Minggu Ini</h2>
                <span style="color:#94a3b8">{{ $startOfWeek->format('d M Y') }} - {{ $endOfWeek->format('d M Y') }}</span>
            </div>

            <!-- Summary Cards -->
            <div class="cards" style="margin:2rem 0;">
                <div class="card">
                    <div class="card-icon"><i class="fas fa-shopping-cart"></i></div>
                    <div class="card-label">Total Transaksi</div>
                    <div class="card-value" style="color:#38bdf8">{{ number_format($weeklyTotalTransactions) }}</div>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fas fa-dollar-sign"></i></div>
                    <div class="card-label">Total Pendapatan</div>
                    <div class="card-value" style="color:#38bdf8">Rp {{ number_format($weeklyTotalRevenue, 0, ',', '.') }}</div>
                </div>
                <div class="card">
                    <div class="card-icon"><i class="fas fa-chart-line"></i></div>
                    <div class="card-label">Rata-rata per Hari</div>
                    <div class="card-value" style="color:#38bdf8">{{ $weeklyTotalTransactions > 0 ? number_format($weeklyTotalTransactions / 7, 1) : 0 }}</div>
                </div>
            </div>

            <!-- Daily Stats -->
            <h2 class="section-title">
                <i class="fas fa-calendar-day"></i>
                Statistik Per Hari
            </h2>
            <div class="table-container">
                @if($weeklyDailyStats->isEmpty())
                    <p style="color:#94a3b8;text-align:center;padding:2rem;">Belum ada data transaksi minggu ini</p>
                @else
                    @php
                        $maxWeeklyRevenue = $weeklyDailyStats->max('revenue');
                    @endphp
                    @foreach($weeklyDailyStats as $stat)
                        <div style="background:rgba(255,255,255,0.8);padding:1rem;border-radius:8px;border:1px solid rgba(99,102,241,0.15);margin-bottom:1rem;">
                            <div style="display:flex;justify-content:space-between;margin-bottom:8px">
                                <span style="font-weight:600;color:#1e293b">{{ \Carbon\Carbon::parse($stat->date)->format('l, d M Y') }}</span>
                                <span style="color:#64748b">{{ $stat->count }} transaksi</span>
                            </div>
                            <div style="background:#e5e7eb;border-radius:4px;overflow:hidden;">
                                <div style="height:32px;display:flex;align-items:center;justify-content:flex-end;padding:0 8px;font-size:12px;font-weight:600;background:linear-gradient(90deg, #10b981, #059669);color:white;width:{{ $maxWeeklyRevenue > 0 ? ($stat->revenue / $maxWeeklyRevenue) * 100 : 0 }}%">
                                    Rp {{ number_format($stat->revenue, 0, ',', '.') }}
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Top Games -->
            <div class="section-title">
                <i class="fas fa-trophy"></i>
                Top 5 Game Terpopuler
            </div>
            <div class="section">
                @if($weeklyTopGames->isEmpty())
                    <p style="color:#94a3b8">Belum ada data transaksi minggu ini</p>
                @else
                    <div class="table-container">
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
                                        <td style="text-align:right;color:#38bdf8;font-weight:600">Rp {{ number_format($item->revenue, 0, ',', '.') }}</td>
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
            <div class="section-title">
                <i class="fas fa-chart-pie"></i>
                Status Transaksi
            </div>
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
            <div class="section-title">
                <i class="fas fa-trophy"></i>
                Top 10 Game Terpopuler
            </div>
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
            <div class="section-title">
                <i class="fas fa-calendar-day"></i>
                Statistik Harian
            </div>
            <div class="section">
                @if($monthlyDailyStats->isEmpty())
                    <p style="color:#94a3b8">Belum ada data transaksi harian</p>
                @else
                    <div class="table-container">
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
                                <tr style="background:rgba(99, 102, 241, 0.1);font-weight:700">
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
