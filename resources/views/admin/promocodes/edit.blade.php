<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Promo Code - Admin</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root{--bg:#0f172a;--panel:#0b1220;--muted:#94a3b8;--border:#334155;--accent:#38bdf8;--card:#111827;--text:#f8fafc}
        body{font-family:'Inter',sans-serif;background:var(--bg);color:var(--text);margin:0}
        header{background:#020617;padding:1rem 2rem;border-bottom:1px solid var(--border)}
        .container{max-width:760px;margin:2rem auto;padding:0 1rem}
        .panel{background:var(--panel);padding:16px;border-radius:10px;border:1px solid var(--border)}
        .row{display:grid;grid-template-columns:1fr 1fr;gap:12px}
        .field{margin-bottom:12px}
        label{display:block;font-weight:700;font-size:13px;color:var(--muted);margin-bottom:6px}
        .input,select{width:100%;background:#071028;border:1px solid var(--border);color:var(--text);padding:10px 12px;border-radius:8px}
        .btn{background:var(--accent);color:#020617;padding:10px 12px;border-radius:8px;text-decoration:none;font-weight:800;border:1px solid rgba(56,189,248,0.12);cursor:pointer}
        .btn-secondary{background:transparent;border:1px solid var(--border);color:var(--muted)}
        .danger{background:#ef4444;color:#fff;border:none}
        .error{background:#3f1d1d;border:1px solid #7f1d1d;padding:10px;border-radius:8px;margin-bottom:12px;color:#fecaca}
        .muted{color:var(--muted);font-size:13px}
        @media(max-width:700px){.row{grid-template-columns:1fr}}
    </style>
</head>
<body>
    <header>
        <div style="display:flex;justify-content:space-between;align-items:center">
            <div style="font-weight:700;color:var(--accent)">Admin - Edit Promo</div>
            <div>
                <a href="{{ route('admin.promocodes.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </header>

    <div class="container">
        <div class="panel">
            @if ($errors->any())
                <div class="error">
                    <div style="font-weight:800;margin-bottom:6px">Periksa input:</div>
                    <ul style="margin:0;padding-left:18px">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('admin.promocodes.update', $promoCode) }}">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="field">
                        <label for="code">Kode</label>
                        <input class="input" id="code" name="code" value="{{ old('code', $promoCode->code) }}" required>
                    </div>

                    <div class="field">
                        <label for="type">Tipe</label>
                        <select class="input" id="type" name="type" required>
                            <option value="percent" {{ old('type', $promoCode->type) === 'percent' ? 'selected' : '' }}>percent</option>
                            <option value="fixed" {{ old('type', $promoCode->type) === 'fixed' ? 'selected' : '' }}>fixed</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="field">
                        <label for="value">Nilai</label>
                        <input class="input" id="value" name="value" type="number" min="1" value="{{ old('value', $promoCode->value) }}" required>
                    </div>

                    <div class="field">
                        <label for="usage_limit">Kuota (opsional)</label>
                        <input class="input" id="usage_limit" name="usage_limit" type="number" min="1" value="{{ old('usage_limit', $promoCode->usage_limit) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="field">
                        <label for="min_purchase">Minimal Pembelian (opsional)</label>
                        <input class="input" id="min_purchase" name="min_purchase" type="number" min="0" value="{{ old('min_purchase', $promoCode->min_purchase) }}">
                    </div>

                    <div class="field">
                        <label for="max_discount">Max Diskon (opsional)</label>
                        <input class="input" id="max_discount" name="max_discount" type="number" min="0" value="{{ old('max_discount', $promoCode->max_discount) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="field">
                        <label for="starts_at">Mulai (opsional)</label>
                        <input class="input" id="starts_at" name="starts_at" type="datetime-local" value="{{ old('starts_at', $promoCode->starts_at ? $promoCode->starts_at->format('Y-m-d\\TH:i') : '') }}">
                    </div>

                    <div class="field">
                        <label for="ends_at">Selesai (opsional)</label>
                        <input class="input" id="ends_at" name="ends_at" type="datetime-local" value="{{ old('ends_at', $promoCode->ends_at ? $promoCode->ends_at->format('Y-m-d\\TH:i') : '') }}">
                    </div>
                </div>

                <div class="row">
                    <div class="field">
                        <label for="used_count">Terpakai</label>
                        <input class="input" id="used_count" name="used_count" type="number" min="0" value="{{ old('used_count', $promoCode->used_count) }}">
                        <div class="muted">Gunakan untuk koreksi manual bila dibutuhkan.</div>
                    </div>

                    <div class="field">
                        <label style="display:flex;gap:10px;align-items:center;color:var(--text);margin-top:24px">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', $promoCode->is_active) ? 'checked' : '' }}>
                            Aktif
                        </label>
                    </div>
                </div>

                <div style="display:flex;gap:10px;justify-content:space-between;align-items:center;margin-top:6px">
                    <form action="{{ route('admin.promocodes.destroy', $promoCode) }}" method="POST" onsubmit="return confirm('Hapus promo ini?')" style="display:inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn danger">Hapus</button>
                    </form>

                    <div style="display:flex;gap:10px">
                        <a href="{{ route('admin.promocodes.index') }}" class="btn btn-secondary">Batal</a>
                        <button type="submit" class="btn">Simpan Perubahan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
