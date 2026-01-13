<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Dashboard - GameTopup</title>
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
                <form method="POST" action="{{ route('admin.logout') }}" style="display:inline;">
                    @csrf
                    <button type="submit" class="btn-logout">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="welcome-section">
            <h1>👋 Halo, Admin!</h1>
            <p>Selamat datang kembali di Dashboard Admin GameTopup</p>
        </div>

        <!-- Menu Navigation -->
        <div class="menu-grid">
            <a href="{{ route('admin.recap.index') }}" class="menu-card menu-success">
                <div class="menu-icon">
                    <i class="fas fa-chart-line"></i>
                </div>
                <div class="menu-content">
                    <h3>Rekapan</h3>
                    <p>Lihat laporan & statistik transaksi</p>
                </div>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
            <a href="{{ route('admin.topups.index') }}" class="menu-card menu-primary">
                <div class="menu-icon">
                    <i class="fas fa-coins"></i>
                </div>
                <div class="menu-content">
                    <h3>Kelola Harga</h3>
                    <p>Atur harga paket top up game</p>
                </div>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
            <a href="{{ route('admin.promocodes.index') }}" class="menu-card menu-warning">
                <div class="menu-icon">
                    <i class="fas fa-tags"></i>
                </div>
                <div class="menu-content">
                    <h3>Promo Code</h3>
                    <p>Kelola kode promo & diskon</p>
                </div>
                <i class="fas fa-arrow-right menu-arrow"></i>
            </a>
        </div>

        <!-- Divider -->
        <div class="divider">
            <h2 class="divider-text">
                <i class="fas fa-chart-pie"></i>
                Statistik Dashboard
            </h2>
        </div>

        <div class="cards">
            <div class="card">
                <div class="card-icon"><i class="fas fa-gamepad"></i></div>
                <div class="card-label">Total Games</div>
                <div class="card-value">{{ $gamesCount }}</div>
            </div>
            <div class="card">
                <div class="card-icon"><i class="fas fa-layer-group"></i></div>
                <div class="card-label">Paket TopUp</div>
                <div class="card-value">{{ $topupsCount }}</div>
            </div>
            <div class="card">
                <div class="card-icon"><i class="fas fa-receipt"></i></div>
                <div class="card-label">Total Transaksi</div>
                <div class="card-value">{{ $transactionsCount }}</div>
            </div>
        </div>

        <h2 class="section-title">
            <i class="fas fa-history"></i>
            Transaksi Terbaru
        </h2>
        <div class="table-container">
            @if($recentTransactions->isEmpty())
                <p style="color:#94a3b8;text-align:center;padding:2rem;">Belum ada transaksi</p>
            @else
            <table>
                <thead>
                    <tr>
                        <th><i class="fas fa-gamepad"></i> Game</th>
                        <th><i class="fas fa-box"></i> Paket</th>
                        <th><i class="fas fa-money-bill"></i> Harga</th>
                        <th><i class="fas fa-info-circle"></i> Status</th>
                        <th><i class="fas fa-calendar"></i> Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($recentTransactions as $t)
                        <tr>
                            <td><strong>{{ $t->game->name ?? '-' }}</strong></td>
                            <td>{{ $t->topup->name ?? $t->amount }}</td>
                            <td><strong>Rp {{ number_format($t->price,0,',','.') }}</strong></td>
                            <td>
                                <span class="status-badge status-{{ strtolower($t->status) }}">
                                    {{ ucfirst($t->status) }}
                                </span>
                            </td>
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
