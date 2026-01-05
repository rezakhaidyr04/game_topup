<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Paket TopUp - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{--bg:#0f172a;--panel:#0b1220;--muted:#94a3b8;--border:#334155;--accent:#38bdf8;--text:#f8fafc}
        body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);margin:0}
        header{background:#020617;padding:1rem 2rem;border-bottom:1px solid var(--border)}
        .container{max-width:720px;margin:2rem auto;padding:0 1rem}
        .card{background:var(--panel);padding:1.25rem;border-radius:10px;border:1px solid var(--border)}
        label{display:block;margin-top:8px;color:var(--muted);font-weight:600}
        input,select{width:100%;padding:10px;margin-top:6px;border-radius:8px;border:1px solid var(--border);background:#071028;color:var(--text)}
        .btn{background:var(--accent);color:#020617;padding:10px 14px;border-radius:8px;border:none;margin-top:12px;font-weight:700}
        .error{background:#3b0f0f;padding:10px;border-radius:6px;margin-bottom:10px;color:#fff}
        a.back{color:var(--muted);display:inline-block;margin-bottom:8px}
    </style>
</head>
<body>
    <header>
        <div style="font-weight:700;color:var(--accent)">Admin - Buat Paket TopUp</div>
    </header>
    <div class="container">
        <a href="{{ route('admin.topups.index') }}" class="back">&larr; Kembali</a>

        @if($errors->any())
            <div class="error">
                <strong>Terdapat kesalahan:</strong>
                <ul style="margin:8px 0 0;padding-left:18px">
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="card">
            <form action="{{ route('admin.topups.store') }}" method="POST">
                @csrf
                <label>Game</label>
                <select name="game_id" required>
                    <option value="">-- Pilih Game --</option>
                    @foreach($games as $g)
                        <option value="{{ $g->id }}">{{ $g->name }}</option>
                    @endforeach
                </select>

                <label>Nama Paket</label>
                <input type="text" name="name" required>

                <label>Amount</label>
                <input type="number" name="amount" min="1" required>

                <label>Harga (angka)</label>
                <input type="number" step="0.01" name="price" min="0" required>

                <button class="btn">Simpan Paket</button>
            </form>
        </div>
    </div>
</body>
</html>