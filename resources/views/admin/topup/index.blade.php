@extends('')
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kelola TopUp - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body{font-family:'Inter',sans-serif;background:#0f172a;color:#f8fafc;margin:0}
        header{background:#020617;padding:1rem 2rem;border-bottom:1px solid #334155}
        .container{max-width:1100px;margin:2rem auto;padding:0 1rem}
        .card{background:#0b1220;padding:1rem;border-radius:8px;border:1px solid #334155}
        table{width:100%;border-collapse:collapse}
        th,td{padding:10px;text-align:left;border-bottom:1px solid rgba(148,163,184,0.06)}
        a.btn{background:#38bdf8;color:#020617;padding:6px 10px;border-radius:6px;text-decoration:none;font-weight:600}
        form.inline{display:inline}
    </style>
</head>
<body>
    <header>
        <div style="display:flex;justify-content:space-between;align-items:center">
            <div style="font-weight:700;color:#38BDF8">Admin - Kelola TopUp</div>
            <div>
                <a href="{{ route('admin.dashboard') }}" class="btn">Dashboard</a>
            </div>
        </div>
    </header>
    <div class="container">
        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:1rem">
            <h1>Daftar Paket TopUp</h1>
            <a href="{{ route('admin.topups.create') }}" class="btn">Buat Paket Baru</a>
        </div>

        @if(session('success'))
            <div style="background:#052e2e;padding:10px;border-radius:6px;margin-bottom:10px">{{ session('success') }}</div>
        @endif

        <div class="card">
            <table>
                <thead>
                    <tr><th>ID</th><th>Game</th><th>Nama</th><th>Amount</th><th>Harga</th><th>Aksi</th></tr>
                </thead>
                <tbody>
                    @forelse($topups as $t)
                        <tr>
                            <td>{{ $t->id }}</td>
                            <td>{{ $t->game->name ?? '-' }}</td>
                            <td>{{ $t->name }}</td>
                            <td>{{ $t->amount }}</td>
                            <td>Rp {{ number_format($t->price,0,',','.') }}</td>
                            <td>
                                <a href="{{ route('admin.topups.edit', $t) }}" class="btn">Edit</a>
                                <form action="{{ route('admin.topups.destroy', $t) }}" method="POST" class="inline" onsubmit="return confirm('Hapus paket ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" style="margin-left:8px;background:#ef4444;color:#fff;padding:6px 10px;border-radius:6px;border:none;cursor:pointer">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" style="color:#94a3b8">Belum ada paket</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div style="margin-top:1rem">{{ $topups->links() }}</div>
    </div>
</body>
</html>
