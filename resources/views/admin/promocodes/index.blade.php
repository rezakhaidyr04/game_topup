<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Promo Code - Admin</title>
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
                <a href="{{ route('admin.dashboard') }}" class="btn btn-success">
                    <i class="fas fa-home"></i> Dashboard
                </a>
                <a href="{{ route('admin.recap.index') }}" class="btn">
                    <i class="fas fa-chart-line"></i> Rekap
                </a>
                <a href="{{ route('admin.topups.index') }}" class="btn">
                    <i class="fas fa-coins"></i> Kelola TopUp
                </a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="welcome-section">
            <h1>🎟️ Kelola Promo Code</h1>
            <p>Kelola kode promo & diskon untuk meningkatkan penjualan</p>
        </div>

        <div class="toolbar" style="display:flex;gap:1rem;align-items:flex-start;justify-content:space-between;margin-bottom:2rem;flex-wrap:wrap;">
            <form action="{{ route('admin.promocodes.index') }}" method="GET" class="filter-form" style="display:flex;gap:0.75rem;align-items:center;flex-wrap:wrap;flex:1;">
                <div style="position:relative;flex:1;min-width:200px;">
                    <i class="fas fa-search" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:0.85rem;"></i>
                    <input name="q" value="{{ request('q') }}" class="input" placeholder="Cari kode promo..." style="padding:0.75rem 0.75rem 0.75rem 38px;border:2px solid rgba(99,102,241,0.15);border-radius:12px;background:rgba(255,255,255,0.95);color:#475569;width:100%;font-size:0.9rem;transition:all 0.3s ease;outline:none;" onfocus="this.style.borderColor='rgba(99,102,241,0.5)';this.style.boxShadow='0 0 0 4px rgba(99,102,241,0.1)'" onblur="this.style.borderColor='rgba(99,102,241,0.15)';this.style.boxShadow='none'">
                </div>
                <div style="position:relative;min-width:140px;">
                    <i class="fas fa-info-circle" style="position:absolute;left:12px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:0.85rem;z-index:1;"></i>
                    <select name="is_active" class="input" style="padding:0.75rem 0.75rem 0.75rem 38px;border:2px solid rgba(99,102,241,0.15);border-radius:12px;background:rgba(255,255,255,0.95);color:#475569;font-size:0.9rem;cursor:pointer;transition:all 0.3s ease;outline:none;appearance:none;padding-right:35px;min-width:140px;" onfocus="this.style.borderColor='rgba(99,102,241,0.5)';this.style.boxShadow='0 0 0 4px rgba(99,102,241,0.1)'" onblur="this.style.borderColor='rgba(99,102,241,0.15)';this.style.boxShadow='none'">
                        <option value="">Semua Status</option>
                        <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>Aktif</option>
                        <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>Nonaktif</option>
                    </select>
                    <i class="fas fa-chevron-down" style="position:absolute;right:12px;top:50%;transform:translateY(-50%);color:#94a3b8;font-size:0.7rem;pointer-events:none;"></i>
                </div>
                <div style="display:flex;gap:0.5rem;">
                    <button type="submit" style="background:linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);color:#fff;padding:0.75rem 1.5rem;border-radius:12px;border:none;font-weight:600;font-size:0.9rem;cursor:pointer;display:inline-flex;align-items:center;gap:0.5rem;box-shadow:0 4px 15px rgba(99,102,241,0.3);transition:all 0.3s ease;" onmouseover="this.style.transform='translateY(-2px)';this.style.boxShadow='0 6px 20px rgba(99,102,241,0.4)'" onmouseout="this.style.transform='translateY(0)';this.style.boxShadow='0 4px 15px rgba(99,102,241,0.3)'">
                        <i class="fas fa-filter"></i> Filter
                    </button>
                    <a href="{{ route('admin.promocodes.index') }}" style="background:rgba(255,255,255,0.9);border:2px solid rgba(99,102,241,0.2);color:#64748b;padding:0.75rem 1.25rem;border-radius:12px;text-decoration:none;font-weight:600;font-size:0.9rem;display:inline-flex;align-items:center;gap:0.5rem;transition:all 0.3s ease;" onmouseover="this.style.borderColor='rgba(239,68,68,0.4)';this.style.color='#ef4444';this.style.background='rgba(239,68,68,0.05)'" onmouseout="this.style.borderColor='rgba(99,102,241,0.2)';this.style.color='#64748b';this.style.background='rgba(255,255,255,0.9)'">
                        <i class="fas fa-times"></i> Reset
                    </a>
                </div>
            </form>
            <a href="{{ route('admin.promocodes.create') }}" class="btn" style="white-space:nowrap;">
                <i class="fas fa-plus"></i> Tambah Promo
            </a>
        </div>

        @if(session('success'))
            <div style="background:rgba(16,185,129,0.1);color:#059669;padding:1rem;border-radius:8px;margin-bottom:1rem;border:1px solid rgba(16,185,129,0.2);">{{ session('success') }}</div>
        @endif

        <div class="table-container">
            @if($promoCodes->isEmpty())
                <p style="color:#94a3b8;text-align:center;padding:2rem;">Belum ada promo code</p>
            @else
            <table>
                <thead>
                    <tr>
                        <th><i class="fas fa-tag"></i> Kode Promo</th>
                        <th><i class="fas fa-percent"></i> Tipe & Nilai</th>
                        <th><i class="fas fa-calendar"></i> Periode</th>
                        <th><i class="fas fa-users"></i> Kuota</th>
                        <th><i class="fas fa-info-circle"></i> Status</th>
                        <th><i class="fas fa-cogs"></i> Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($promoCodes as $p)
                        <tr>
                            <td><strong>{{ $p->code }}</strong></td>
                            <td>
                                {{ $p->type === 'percent' ? ($p->value . '%') : ('Rp ' . number_format($p->value,0,',','.')) }}
                                @if($p->min_purchase) <br><small style="color:#64748b;">Min: Rp {{ number_format($p->min_purchase,0,',','.') }}</small> @endif
                                @if($p->max_discount) <br><small style="color:#64748b;">Max: Rp {{ number_format($p->max_discount,0,',','.') }}</small> @endif
                            </td>
                            <td>
                                {{ $p->starts_at ? $p->starts_at->format('d M Y') : '-' }}<br>
                                <small style="color:#64748b;">s/d {{ $p->ends_at ? $p->ends_at->format('d M Y') : '-' }}</small>
                            </td>
                            <td>
                                {{ is_null($p->usage_limit) ? '∞' : $p->usage_limit }}<br>
                                <small style="color:#64748b;">Terpakai: {{ $p->used_count }}</small>
                            </td>
                            <td>
                                <span class="status-badge {{ $p->is_active ? 'status-success' : 'status-failed' }}">
                                    {{ $p->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('admin.promocodes.edit', $p) }}" class="btn btn-warning" style="padding:0.4rem 0.8rem;font-size:0.8rem;">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <form action="{{ route('admin.promocodes.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus promo ini?')" style="display:inline;margin-left:0.5rem;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-logout" style="padding:0.4rem 0.8rem;font-size:0.8rem;">
                                        <i class="fas fa-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>

        @if($promoCodes->hasPages())
        <div style="display:flex;justify-content:space-between;align-items:center;margin-top:2rem;">
            <div style="color:#64748b;">Menampilkan {{ $promoCodes->count() }} dari {{ $promoCodes->total() }} promo</div>
            <div style="display:flex;gap:0.5rem;">
                @if($promoCodes->onFirstPage())
                    <span style="padding:0.5rem 1rem;border:1px solid rgba(99,102,241,0.2);border-radius:6px;color:#cbd5e1;">&laquo;</span>
                @else
                    <a href="{{ $promoCodes->previousPageUrl() }}" style="padding:0.5rem 1rem;border:1px solid rgba(99,102,241,0.2);border-radius:6px;color:#6366f1;text-decoration:none;">&laquo;</a>
                @endif

                @for ($i = max(1, $promoCodes->currentPage() - 2); $i <= min($promoCodes->lastPage(), $promoCodes->currentPage() + 2); $i++)
                    @if ($i == $promoCodes->currentPage())
                        <span style="padding:0.5rem 1rem;border:1px solid rgba(99,102,241,0.3);border-radius:6px;background:rgba(99,102,241,0.1);color:#6366f1;font-weight:600;">{{ $i }}</span>
                    @else
                        <a href="{{ $promoCodes->url($i) }}" style="padding:0.5rem 1rem;border:1px solid rgba(99,102,241,0.2);border-radius:6px;color:#64748b;text-decoration:none;">{{ $i }}</a>
                    @endif
                @endfor

                @if ($promoCodes->hasMorePages())
                    <a href="{{ $promoCodes->nextPageUrl() }}" style="padding:0.5rem 1rem;border:1px solid rgba(99,102,241,0.2);border-radius:6px;color:#6366f1;text-decoration:none;">&raquo;</a>
                @else
                    <span style="padding:0.5rem 1rem;border:1px solid rgba(99,102,241,0.2);border-radius:6px;color:#cbd5e1;">&raquo;</span>
                @endif
            </div>
        </div>
        @endif
    </div>
</body>
</html>
