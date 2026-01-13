<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola TopUp - Admin</title>
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
            margin-bottom: 2rem;
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
                <a href="{{ route('admin.recap.index') }}" class="btn">
                    <i class="fas fa-chart-line"></i> Rekap
                </a>
                <a href="{{ route('admin.promocodes.index') }}" class="btn">
                    <i class="fas fa-tags"></i> Promo
                </a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="welcome-section">
            <h1>⚙️ Kelola Harga Top Up</h1>
            <p>Atur harga paket top up untuk setiap game</p>
        </div>

        <div class="toolbar" style="display:flex;gap:1rem;align-items:center;justify-content:space-between;margin-bottom:2rem;">
            <div class="filters" style="display:flex;gap:0.5rem;align-items:center;">
                <input name="q" value="{{ request('q') }}" class="input" placeholder="Cari paket, game, atau harga..." style="padding:0.5rem;border:1px solid rgba(99,102,241,0.2);border-radius:8px;background:rgba(255,255,255,0.8);color:#475569;">
                <select name="game_id" class="input" style="padding:0.5rem;border:1px solid rgba(99,102,241,0.2);border-radius:8px;background:rgba(255,255,255,0.8);color:#475569;">
                    <option value="">Semua Game</option>
                    @foreach($games as $g)
                        <option value="{{ $g->id }}" {{ request('game_id') == $g->id ? 'selected' : '' }}>{{ $g->name }}</option>
                    @endforeach
                </select>
                <input name="min_price" value="{{ request('min_price') }}" class="input" placeholder="Harga min" type="number" min="0" style="padding:0.5rem;border:1px solid rgba(99,102,241,0.2);border-radius:8px;background:rgba(255,255,255,0.8);color:#475569;">
                <input name="max_price" value="{{ request('max_price') }}" class="input" placeholder="Harga max" type="number" min="0" style="padding:0.5rem;border:1px solid rgba(99,102,241,0.2);border-radius:8px;background:rgba(255,255,255,0.8);color:#475569;">
                <button type="submit" class="btn" style="padding:0.5rem 1rem;">Filter</button>
                <a href="{{ route('admin.topups.index') }}" class="btn" style="background:transparent;border:1px solid rgba(99,102,241,0.2);color:#64748b;">Reset</a>
            </div>
            <a href="{{ route('admin.topups.create') }}" class="btn">
                <i class="fas fa-plus"></i> Tambah Paket
            </a>
        </div>

        @if(session('success'))
            <div style="background:rgba(16,185,129,0.1);color:#059669;padding:1rem;border-radius:8px;margin-bottom:1rem;border:1px solid rgba(16,185,129,0.2);">{{ session('success') }}</div>
        @endif

        @php
            $groupedTopups = $topups->groupBy('game.name');
        @endphp
        @forelse($groupedTopups as $gameName => $gameTopups)
            <div class="section-title">
                <i class="fas fa-gamepad"></i>
                {{ $gameName }}
            </div>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th><i class="fas fa-coins"></i> Diamond</th>
                            <th><i class="fas fa-money-bill"></i> Harga</th>
                            <th><i class="fas fa-cogs"></i> Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($gameTopups as $t)
                            <tr>
                                <td><strong>{{ $t->name }} ({{ $t->amount }})</strong></td>
                                <td><strong>Rp {{ number_format($t->price,0,',','.') }}</strong></td>
                                <td>
                                    <a href="{{ route('admin.topups.edit', $t) }}" class="btn btn-warning" style="padding:0.4rem 0.8rem;font-size:0.8rem;">
                                        <i class="fas fa-edit"></i> Update
                                    </a>
                                    <form action="{{ route('admin.topups.destroy', $t) }}" method="POST" onsubmit="return confirm('Hapus paket ini?')" style="display:inline;margin-left:0.5rem;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn-logout" style="padding:0.4rem 0.8rem;font-size:0.8rem;">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr><td colspan="3" style="color:#94a3b8;text-align:center;padding:2rem;">Belum ada paket untuk game ini</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        @empty
            <p style="color:#94a3b8;text-align:center;padding:2rem;">Belum ada paket top up</p>
        @endforelse

        @if($topups->hasPages())
        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:2rem;">
            <div style="color:#64748b;">Menampilkan {{ $topups->count() }} dari {{ $topups->total() }} paket</div>
            <div style="display:flex;gap:0.5rem;">
                @if($topups->onFirstPage())
                    <span style="padding:0.5rem 1rem;border:1px solid rgba(99,102,241,0.2);border-radius:6px;color:#cbd5e1;">&laquo;</span>
                @else
                    <a href="{{ $topups->previousPageUrl() }}" style="padding:0.5rem 1rem;border:1px solid rgba(99,102,241,0.2);border-radius:6px;color:#6366f1;text-decoration:none;">&laquo;</a>
                @endif

                @for ($i = max(1, $topups->currentPage() - 2); $i <= min($topups->lastPage(), $topups->currentPage() + 2); $i++)
                    @if ($i == $topups->currentPage())
                        <span style="padding:0.5rem 1rem;border:1px solid rgba(99,102,241,0.3);border-radius:6px;background:rgba(99,102,241,0.1);color:#6366f1;font-weight:600;">{{ $i }}</span>
                    @else
                        <a href="{{ $topups->url($i) }}" style="padding:0.5rem 1rem;border:1px solid rgba(99,102,241,0.2);border-radius:6px;color:#64748b;text-decoration:none;">{{ $i }}</a>
                    @endif
                @endfor

                @if ($topups->hasMorePages())
                    <a href="{{ $topups->nextPageUrl() }}" style="padding:0.5rem 1rem;border:1px solid rgba(99,102,241,0.2);border-radius:6px;color:#6366f1;text-decoration:none;">&raquo;</a>
                @else
                    <span style="padding:0.5rem 1rem;border:1px solid rgba(99,102,241,0.2);border-radius:6px;color:#cbd5e1;">&raquo;</span>
                @endif
            </div>
        </div>
        @endif
    </div>
</body>
</html>