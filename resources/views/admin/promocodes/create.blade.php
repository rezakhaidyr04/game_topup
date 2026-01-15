<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Buat Promo Code - Admin</title>
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
            cursor: pointer;
        }

        a.btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(99, 102, 241, 0.3);
        }

        a.btn.btn-secondary {
            background: rgba(99, 102, 241, 0.1);
            color: #6366f1;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.1);
        }

        a.btn.btn-secondary:hover {
            background: rgba(99, 102, 241, 0.15);
            box-shadow: 0 6px 16px rgba(99, 102, 241, 0.15);
        }

        button.btn {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: #fff;
            padding: 0.65rem 1.2rem;
            border-radius: 10px;
            border: none;
            font-weight: 600;
            font-size: 0.875rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
        }

        button.btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(99, 102, 241, 0.3);
        }

        .container {
            max-width: 900px;
            margin: 2rem auto;
            padding: 0 2rem;
            position: relative;
            z-index: 1;
        }

        .page-header {
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

        .page-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 300px;
            height: 300px;
            background: radial-gradient(circle, rgba(139, 92, 246, 0.1) 0%, transparent 70%);
            border-radius: 50%;
        }

        .page-header h1 {
            font-family: 'Poppins', sans-serif;
            font-size: 2rem;
            font-weight: 700;
            color: #6366f1;
            margin-bottom: 0.5rem;
            position: relative;
            z-index: 1;
        }

        .page-header p {
            color: #64748b;
            font-size: 1rem;
            font-weight: 500;
            position: relative;
            z-index: 1;
        }

        .back-link {
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            color: #6366f1;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 1.5rem;
            transition: all 0.3s ease;
        }

        .back-link:hover {
            gap: 0.8rem;
            color: #8b5cf6;
        }

        .form-card {
            background: rgba(255, 255, 255, 0.7);
            border: 1px solid rgba(99, 102, 241, 0.15);
            border-radius: 20px;
            padding: 2.5rem;
            backdrop-filter: blur(20px);
            box-shadow: 0 8px 32px rgba(99, 102, 241, 0.08);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group:last-child {
            margin-bottom: 0;
        }

        .form-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.5rem;
        }

        @media (max-width: 768px) {
            .form-row {
                grid-template-columns: 1fr;
            }
        }

        label {
            display: block;
            font-weight: 600;
            color: #2d3748;
            margin-bottom: 0.6rem;
            font-size: 0.95rem;
        }

        input[type="text"],
        input[type="number"],
        input[type="email"],
        input[type="password"],
        input[type="datetime-local"],
        select,
        textarea {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid rgba(99, 102, 241, 0.2);
            border-radius: 10px;
            font-family: 'Inter', sans-serif;
            font-size: 0.95rem;
            color: #2d3748;
            background: rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="number"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus,
        input[type="datetime-local"]:focus,
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #6366f1;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        input[type="checkbox"] {
            width: 18px;
            height: 18px;
            cursor: pointer;
            accent-color: #6366f1;
        }

        .checkbox-label {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            color: #2d3748;
            font-weight: 500;
            margin-bottom: 0;
            cursor: pointer;
        }

        .form-actions {
            display: flex;
            gap: 1rem;
            justify-content: flex-end;
            margin-top: 2rem;
            padding-top: 2rem;
            border-top: 1px solid rgba(99, 102, 241, 0.15);
        }

        .alert {
            padding: 1.25rem;
            border-radius: 10px;
            margin-bottom: 1.5rem;
            border-left: 4px solid;
        }

        .alert-danger {
            background: rgba(239, 68, 68, 0.1);
            border-left-color: #ef4444;
            color: #991b1b;
        }

        .alert-danger strong {
            color: #dc2626;
        }

        .alert-danger ul {
            margin: 0.5rem 0 0;
            padding-left: 1.5rem;
        }

        .alert-danger li {
            margin-bottom: 0.3rem;
        }

        .help-text {
            display: block;
            margin-top: 0.5rem;
            font-size: 0.875rem;
            color: #94a3b8;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content">
            <div class="logo-header">
                <i class="fas fa-crown"></i>
                Admin Panel
            </div>
        </div>
    </header>

    <div class="container">
        <a href="{{ route('admin.promocodes.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Daftar
        </a>

        <div class="page-header">
            <h1>Buat Promo Code Baru</h1>
            <p>Tambahkan kode promo dan diskon untuk meningkatkan penjualan</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger">
                <strong><i class="fas fa-exclamation-circle"></i> Terdapat kesalahan:</strong>
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="form-card">
            <form method="POST" action="{{ route('admin.promocodes.store') }}">
                @csrf

                <div class="form-row">
                    <div class="form-group">
                        <label for="code">Kode Promo</label>
                        <input type="text" id="code" name="code" value="{{ old('code') }}" placeholder="HEMAT10" required>
                        <span class="help-text">Akan disimpan sebagai UPPERCASE</span>
                    </div>

                    <div class="form-group">
                        <label for="type">Tipe Diskon</label>
                        <select id="type" name="type" required>
                            <option value="">-- Pilih Tipe --</option>
                            <option value="percent" {{ old('type') === 'percent' ? 'selected' : '' }}>Persentase (%)</option>
                            <option value="fixed" {{ old('type') === 'fixed' ? 'selected' : '' }}>Nominal (Rp)</option>
                        </select>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="value">Nilai Diskon</label>
                        <input type="number" id="value" name="value" min="1" value="{{ old('value') }}" placeholder="10" required>
                        <span class="help-text">Percent: 10 = 10%. Fixed: 5000 = Rp 5.000</span>
                    </div>

                    <div class="form-group">
                        <label for="usage_limit">Kuota Penggunaan (opsional)</label>
                        <input type="number" id="usage_limit" name="usage_limit" min="1" value="{{ old('usage_limit') }}" placeholder="100">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="min_purchase">Pembelian Minimal (opsional)</label>
                        <input type="number" id="min_purchase" name="min_purchase" min="0" value="{{ old('min_purchase') }}" placeholder="20000">
                    </div>

                    <div class="form-group">
                        <label for="max_discount">Diskon Maksimal (opsional)</label>
                        <input type="number" id="max_discount" name="max_discount" min="0" value="{{ old('max_discount') }}" placeholder="20000">
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="starts_at">Tanggal Mulai (opsional)</label>
                        <input type="datetime-local" id="starts_at" name="starts_at" value="{{ old('starts_at') }}">
                    </div>

                    <div class="form-group">
                        <label for="ends_at">Tanggal Berakhir (opsional)</label>
                        <input type="datetime-local" id="ends_at" name="ends_at" value="{{ old('ends_at') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="checkbox-label">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', '1') ? 'checked' : '' }}>
                        <span>Aktifkan Promo</span>
                    </label>
                </div>

                <div class="form-actions">
                    <a href="{{ route('admin.promocodes.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times"></i> Batal
                    </a>
                    <button type="submit" class="btn">
                        <i class="fas fa-plus"></i> Buat Promo
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
