<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Game TopUp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0F172A 0%, #020617 100%);
            color: #F8FAFC;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1.6;
            padding: 2rem;
        }

        .container {
            max-width: 520px;
            width: 100%;
            padding: 20px;
        }

        .card {
            background: #1E293B;
            border: 1px solid #334155;
            border-radius: 12px;
            padding: 48px;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.35);
        }

        .logo {
            text-align: center;
            margin-bottom: 18px;
            font-size: 2.5rem;
            color: #38BDF8;
            display: flex;
            justify-content: center;
        }

        h1 {
            color: #F8FAFC;
            font-size: 32px;
            margin-bottom: 6px;
            text-align: center;
            font-weight: 800;
        }

        .subtitle {
            color: #94A3B8;
            text-align: center;
            margin-bottom: 20px;
            font-size: 15px;
        }

        .form-group {
            margin-bottom: 16px;
        }

        label {
            display: block;
            color: #cbd5e1;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 14px;
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(148, 163, 184, 0.08);
            border-radius: 8px;
            color: #F8FAFC;
            font-size: 14px;
            transition: all 0.25s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #38BDF8;
            background: rgba(15, 23, 42, 0.85);
            box-shadow: 0 0 0 6px rgba(56, 189, 248, 0.06);
        }

        input::placeholder {
            color: #94a3b8;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 16px;
        }

        input[type="checkbox"] {
            cursor: pointer;
        }

        .checkbox-label {
            color: #cbd5e1;
            font-size: 14px;
            margin: 0;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: #38BDF8;
            color: #020617;
            border: none;
            border-radius: 8px;
            font-weight: 700;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.25s ease;
            margin-bottom: 12px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(56, 189, 248, 0.18);
            background: #6366F1;
            color: #020617;
        }

        .links {
            text-align: center;
            margin-top: 14px;
        }

        .links a {
            color: #38BDF8;
            text-decoration: none;
            font-size: 14px;
            transition: color 0.25s ease;
        }

        .links a:hover {
            color: #6366F1;
            text-decoration: underline;
        }

        .register-link {
            color: #94a3b8;
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(148, 163, 184, 0.06);
        }

        .register-link a {
            color: #38BDF8;
            font-weight: 700;
        }

        .alert {
            background: rgba(239, 68, 68, 0.08);
            border: 1px solid rgba(239, 68, 68, 0.2);
            color: #fca5a5;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        @media (max-width: 480px) {
            .card {
                padding: 28px;
            }

            h1 { font-size: 22px; }
        }
    </link>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo">🎮</div>
            <h1>Masuk</h1>
            <p class="subtitle">Akses akun Game TopUp Anda</p>

            @if ($errors->any())
                <div class="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('login.post') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password Anda" required>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="remember" name="remember">
                    <label for="remember" class="checkbox-label">Ingat saya</label>
                </div>

                <button type="submit" class="btn-login">Masuk</button>

                <div class="links">
                    <a href="#">Lupa Password?</a>
                </div>
            </form>

            <div class="register-link">
                Belum punya akun? <a href="{{ route('register') }}">Daftar sekarang</a>
            </div>
        </div>
    </div>
</body>
</html>
