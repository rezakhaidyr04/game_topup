<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit Paket TopUp - Admin</title>
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

        .container {
            max-width: 800px;
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
        select:focus,
        textarea:focus {
            outline: none;
            border-color: #6366f1;
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.1);
        }

        .btn-submit {
            background: linear-gradient(135deg, #6366f1 0%, #8b5cf6 100%);
            color: #fff;
            padding: 0.75rem 2rem;
            border-radius: 10px;
            border: none;
            font-weight: 700;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(99, 102, 241, 0.2);
            margin-top: 1.5rem;
        }

        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(99, 102, 241, 0.3);
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
        <a href="{{ route('admin.topups.index') }}" class="back-link">
            <i class="fas fa-arrow-left"></i>
            Kembali ke Daftar
        </a>

        <div class="page-header">
            <h1>Edit Paket TopUp</h1>
            <p>Perbarui informasi paket top up game</p>
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
            <form action="{{ route('admin.topups.update', $topup) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="game_id">Game</label>
                    <select id="game_id" name="game_id" required>
                        <option value="">-- Pilih Game --</option>
                        @foreach($games as $g)
                            <option value="{{ $g->id }}" {{ $topup->game_id == $g->id ? 'selected' : '' }}>{{ $g->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="name">Nama Paket</label>
                    <input type="text" id="name" name="name" value="{{ $topup->name }}" required>
                </div>

                <div class="form-group">
                    <label for="amount">Amount</label>
                    <input type="number" id="amount" name="amount" min="1" value="{{ $topup->amount }}" required>
                </div>

                <div class="form-group">
                    <label for="price">Harga (angka)</label>
                    <input type="number" id="price" name="price" step="0.01" min="0" value="{{ $topup->price }}" required>
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-save"></i>
                    Perbarui Paket
                </button>
            </form>
        </div>
    </div>
</body>
</html>