<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola TopUp - Admin</title>
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
        .grid{display:grid;grid-template-columns:repeat(auto-fit,minmax(220px,1fr));gap:12px}
        .card{background:var(--card);padding:12px;border-radius:10px;border:1px solid var(--border);display:flex;gap:10px;align-items:center}
        .avatar{width:56px;height:56px;border-radius:10px;background:linear-gradient(135deg,#0b1220,#071028);display:flex;align-items:center;justify-content:center;font-weight:700;color:var(--accent);font-size:18px;border:1px solid rgba(56,189,248,0.06)}
        .card .meta{flex:1}
        .card .meta .game{font-size:13px;color:var(--muted);margin-bottom:4px}
        .card .meta .title{font-weight:700;font-size:16px}
        .card .meta .sub{font-size:13px;color:var(--muted);margin-top:6px}
        .card .actions{display:flex;gap:8px}
        .danger{background:#ef4444;color:#fff;padding:8px 10px;border-radius:8px;border:none}
        .muted{color:var(--muted)}
        .pager{display:flex;justify-content:space-between;align-items:center;margin-top:12px}
        .pagination{display:flex;gap:8px;align-items:center}
        .page{display:inline-block;padding:6px 10px;border-radius:6px;background:transparent;border:1px solid transparent;color:var(--muted);text-decoration:none}
        .page.current{background:rgba(56,189,248,0.12);color:var(--accent);border-color:rgba(56,189,248,0.12);font-weight:700}
        .page.disabled{opacity:0.5;pointer-events:none}
        @media(max-width:700px){.filters{flex-direction:column;align-items:stretch}}
    </style>
</head>
<body>
    <header>
        <div style="display:flex;justify-content:space-between;align-items:center">
            <div style="font-weight:700;color:var(--accent)">Admin - Kelola TopUp</div>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="btn">Dashboard</a>
            </div>
        </div>
    </header>

    <div class="container">
        <form method="GET" action="" class="toolbar">
            <div class="filters">
                <input name="q" value="{{ request('q') }}" class="input" placeholder="Cari paket, game, atau harga...">
                <select name="game_id" class="input">
                    <option value="">Semua Game</option>
                    @foreach($games as $g)
                        <option value="{{ $g->id }}" {{ request('game_id') == $g->id ? 'selected' : '' }}>{{ $g->name }}</option>
                    @endforeach
                </select>
                <input name="min_price" value="{{ request('min_price') }}" class="input" placeholder="Harga min" type="number" min="0">
                <input name="max_price" value="{{ request('max_price') }}" class="input" placeholder="Harga max" type="number" min="0">
                <button type="submit" class="btn">Filter</button>
                <a href="{{ route('admin.topups.index') }}" class="btn" style="background:transparent;border:1px solid var(--border);color:var(--muted)">Reset</a>
            </div>
            <div class="muted">Menampilkan {{ $topups->count() }} dari {{ $topups->total() }} paket</div>
        </form>

        @if(session('success'))
            <div style="background:#052e2e;padding:10px;border-radius:6px;margin-bottom:10px">{{ session('success') }}</div>
        @endif

        <div class="panel">
            <div class="grid">
                @forelse($topups as $t)
                    <div class="card">
                        <div class="avatar">{{ strtoupper(substr($t->game->name ?? '-',0,1)) }}</div>
                        <div class="meta">
                            <div class="game">{{ $t->game->name ?? '-' }}</div>
                            <div class="title">{{ $t->name }}</div>
                            <div class="sub">Jumlah: {{ $t->amount }} • Harga: Rp {{ number_format($t->price,0,',','.') }}</div>
                        </div>
                        <div class="actions">
                            <a href="{{ route('admin.topups.edit', $t) }}" class="btn">Edit</a>
                            <form action="{{ route('admin.topups.destroy', $t) }}" method="POST" onsubmit="return confirm('Hapus paket ini?')" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="danger">Hapus</button>
                            </form>
                        </div>
                    </div>
                @empty
                    <div class="muted">Belum ada paket</div>
                @endforelse
            </div>

            <div class="pager">
                <div class="muted">Halaman {{ $topups->currentPage() }} dari {{ $topups->lastPage() }}</div>
                <div class="pagination" aria-label="Pagination">
                    @if($topups->onFirstPage())
                        <span class="page disabled">&laquo;</span>
                    @else
                        <a href="{{ $topups->previousPageUrl() }}" class="page">&laquo;</a>
                    @endif

                    @for ($i = 1; $i <= $topups->lastPage(); $i++)
                        @if ($i == $topups->currentPage())
                            <span class="page current">{{ $i }}</span>
                        @else
                            <a href="{{ $topups->url($i) }}" class="page">{{ $i }}</a>
                        @endif
                    @endfor

                    @if ($topups->hasMorePages())
                        <a href="{{ $topups->nextPageUrl() }}" class="page">&raquo;</a>
                    @else
                        <span class="page disabled">&raquo;</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</body>
</html>