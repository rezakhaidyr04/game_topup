<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Paket TopUp - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body{font-family:'Inter',sans-serif;background:#0f172a;color:#f8fafc;margin:0}
        header{background:#020617;padding:1rem 2rem;border-bottom:1px solid #334155}
        .container{max-width:800px;margin:2rem auto;padding:0 1rem}
        .card{background:#0b1220;padding:1rem;border-radius:8px;border:1px solid #334155}
        label{display:block;margin-top:8px;color:#94a3b8}
        input,select{width:100%;padding:8px;margin-top:6px;border-radius:6px;border:1px solid #334155;background:#071028;color:#fff}
        button.btn{background:#38bdf8;color:#020617;padding:8px 12px;border-radius:6px;border:none;margin-top:12px}
    </style>
</head>
<body>
    <header>
        <div style="font-weight:700;color:#38BDF8">Admin - Edit Paket TopUp</div>
    </header>
    <div class="container">
        <a href="{{ route('admin.topups.index') }}" style="color:#94a3b8;display:inline-block;margin-bottom:8px">&larr; Kembali</a>
        <div class="card">
            <form action="{{ route('admin.topups.update', $topup) }}" method="POST">
                @csrf
                @method('PUT')
                <label>Game</label>
                <select name="game_id" required>
                    <option value="">-- Pilih Game --</option>
                    @foreach($games as $g)
                        <option value="{{ $g->id }}" {{ $topup->game_id == $g->id ? 'selected' : '' }}>{{ $g->name }}</option>
                    @endforeach
                </select>

                <label>Nama Paket</label>
                <input type="text" name="name" value="{{ $topup->name }}" required>

                <label>Amount</label>
                <input type="number" name="amount" min="1" value="{{ $topup->amount }}" required>

                <label>Harga (angka)</label>
                <input type="number" step="0.01" name="price" min="0" value="{{ $topup->price }}" required>

                <button class="btn">Perbarui Paket</button>
            </form>
        </div>
    </div>
</body>
</html>
