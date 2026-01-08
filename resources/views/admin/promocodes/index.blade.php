<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola Promo Code - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{--bg:#0f172a;--panel:#0b1220;--muted:#94a3b8;--border:#334155;--accent:#38bdf8;--card:#111827;--text:#f8fafc}
        body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);margin:0}
        header{background:#020617;padding:1rem 2rem;border-bottom:1px solid var(--border)}
        .container{max-width:1100px;margin:2rem auto;padding:0 1rem}
        .toolbar{display:flex;gap:1rem;align-items:center;justify-content:space-between;margin-bottom:16px}
        .filters{display:flex;gap:8px;align-items:center}
        .input,select{background:#071028;border:1px solid var(--border);color:var(--text);padding:8px 10px;border-radius:8px}
        .btn{background:var(--accent);color:#020617;padding:8px 12px;border-radius:8px;text-decoration:none;font-weight:700;border:1px solid rgba(56,189,248,0.12)}
        .panel{background:var(--panel);padding:12px;border-radius:10px;border:1px solid var(--border)}
        .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(260px,1fr));gap:12px}
        .card{background:var(--card);padding:12px;border-radius:10px;border:1px solid var(--border);display:flex;gap:10px;align-items:center}
        .avatar{width:56px;height:56px;border-radius:10px;background:linear-gradient(135deg,#0b1220,#071028);display:flex;align-items:center;justify-content:center;font-weight:800;color:var(--accent);font-size:14px;border:1px solid rgba(56,189,248,0.06)}
        .meta{flex:1}
        .meta .title{font-weight:800;font-size:16px}
        .meta .sub{font-size:13px;color:var(--muted);margin-top:6px;line-height:1.4}
        .badge{display:inline-block;padding:3px 8px;border-radius:999px;font-size:12px;font-weight:700}
        .badge-on{background:#10b98144;color:#10b981}
        .badge-off{background:#dc262644;color:#dc2626}
        .actions{display:flex;gap:8px}
        .danger{background:#ef4444;color:#fff;padding:8px 10px;border-radius:8px;border:none;font-weight:700;cursor:pointer}
        .muted{color:var(--muted)}
        .pager{display:flex;justify-content:space-between;align-items:center;margin-top:12px}
        .pagination{display:flex;gap:8px;align-items:center}
        .page{display:inline-block;padding:6px 10px;border-radius:6px;background:transparent;border:1px solid transparent;color:var(--muted);text-decoration:none}
        .page.current{background:rgba(56,189,248,0.12);color:var(--accent);border-color:rgba(56,189,248,0.12);font-weight:800}
        .page.disabled{opacity:0.5;pointer-events:none}
        @media(max-width:700px){.filters{flex-direction:column;align-items:stretch}}
    </style>
</head>
<body>
    <header>
        <div style="display:flex;justify-content:space-between;align-items:center">
            <div style="font-weight:700;color:var(--accent)">Admin - Kelola Promo</div>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="btn" style="background:transparent;border:1px solid var(--border);color:var(--muted);margin-right:6px;">Dashboard</a>
                <a href="{{ route('admin.promocodes.create') }}" class="btn">+ Tambah Promo</a>
            </div>
        </div>
    </header>

    <div class="container">
        <form method="GET" action="" class="toolbar">
            <div class="filters">
                <input name="q" value="{{ request('q') }}" class="input" placeholder="Cari kode / tipe...">
                <select name="is_active" class="input">
                    <option value="">Semua Status</option>
                    <option value="1" {{ request('is_active') === '1' ? 'selected' : '' }}>Aktif</option>
                    <option value="0" {{ request('is_active') === '0' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                <button type="submit" class="btn">Filter</button>
                <a href="{{ route('admin.promocodes.index') }}" class="btn" style="background:transparent;border:1px solid var(--border);color:var(--muted)">Reset</a>
            </div>
            <div class="muted">Menampilkan {{ $promoCodes->count() }} dari {{ $promoCodes->total() }} promo</div>
        </form>

        @if(session('success'))
            <div style="background:#052e2e;padding:10px;border-radius:6px;margin-bottom:10px">{{ session('success') }}</div>
        @endif

        <div class="panel">
            <div class="grid">
                @forelse($promoCodes as $p)
                    <div class="card">
                        <div class="avatar">{{ $p->type === 'percent' ? ($p->value . '%') : ('Rp' . number_format($p->value,0,',','.')) }}</div>
                        <div class="meta">
                            <div class="title">
                                {{ $p->code }}
                                @if($p->is_active)
                                    <span class="badge badge-on">Aktif</span>
                                @else
                                    <span class="badge badge-off">Nonaktif</span>
                                @endif
                            </div>
                            <div class="sub">
                                Tipe: {{ $p->type }} • Min: {{ is_null($p->min_purchase) ? '-' : ('Rp ' . number_format($p->min_purchase,0,',','.')) }}
                                • Max diskon: {{ is_null($p->max_discount) ? '-' : ('Rp ' . number_format($p->max_discount,0,',','.')) }}
                                <br>
                                Periode: {{ $p->starts_at ? $p->starts_at->format('d M Y') : '-' }} s/d {{ $p->ends_at ? $p->ends_at->format('d M Y') : '-' }}
                                • Kuota: {{ is_null($p->usage_limit) ? '∞' : $p->usage_limit }} • Terpakai: {{ $p->used_count }}
                            </div>
                        </div>
                        <div class="actions">
                            <a href="{{ route('admin.promocodes.edit', $p) }}" class="btn">Edit</a>
                            <form action="{{ route('admin.promocodes.destroy', $p) }}" method="POST" onsubmit="return confirm('Hapus promo ini?')" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="muted">Belum ada promo</div>
                @endforelse
            </div>

            <div class="pager">
                <div class="muted">Halaman {{ $promoCodes->currentPage() }} dari {{ $promoCodes->lastPage() }}</div>
                <div class="pagination" aria-label="Pagination">
                    @if($promoCodes->onFirstPage())
                        <span class="page disabled">&laquo;</span>
                    @else
                        <a href="{{ $promoCodes->previousPageUrl() }}" class="page">&laquo;</a>
                    @endif

                    @for ($i = 1; $i <= $promoCodes->lastPage(); $i++)
                        @if ($i == $promoCodes->currentPage())
                            <span class="page current">{{ $i }}</span>
                        @else
                            <a href="{{ $promoCodes->url($i) }}" class="page">{{ $i }}</a>
                        @endif
                    @endfor

                    @if ($promoCodes->hasMorePages())
                        <a href="{{ $promoCodes->nextPageUrl() }}" class="page">&raquo;</a>
                    @else
                        <span class="page disabled">&raquo;</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>
