<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Game TopUp</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: #ffffff;
            color: #020617;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            line-height: 1.6;
            padding: 2rem;
        }

        .container {
            max-width: 560px;
            width: 100%;
            padding: 20px;
        }

        .card {
            background: linear-gradient(180deg, #111827 0%, #0b1220 100%);
            border: 1px solid rgba(51,65,85,0.6);
            border-radius: 16px;
            padding: 56px;
            box-shadow: 0 20px 50px rgba(2, 6, 23, 0.6);
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .card:hover {
            transform: translateY(-6px);
            box-shadow: 0 30px 70px rgba(2, 6, 23, 0.75);
        }

        .brand {
            display: flex;
            gap: 0.75rem;
            align-items: center;
            justify-content: center;
            color: #38BDF8;
            margin-bottom: 12px;
            font-weight: 700;
            font-size: 1.2rem;
        }

        .logo {
            font-size: 2.4rem;
            color: #38BDF8;
            display:flex;
            justify-content:center;
            margin-bottom: 12px;
        }

        h1 {
            color: #F8FAFC;
            font-size: 36px;
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
            position: relative;
        }

        label {
            display: block;
            color: #cbd5e1;
            font-weight: 600;
            margin-bottom: 8px;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(148, 163, 184, 0.06);
            border-radius: 10px;
            color: #F8FAFC;
            font-size: 15px;
            transition: all 0.25s ease;
            box-shadow: inset 0 -6px 18px rgba(0,0,0,0.45);
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #38BDF8;
            background: rgba(15, 23, 42, 0.88);
            box-shadow: 0 8px 30px rgba(56, 189, 248, 0.12);
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

        .btn-register {
            width: 100%;
            padding: 14px;
            background: linear-gradient(90deg, #38BDF8 0%, #6366F1 100%);
            color: #020617;
            border: none;
            border-radius: 12px;
            font-weight: 800;
            font-size: 16px;
            cursor: pointer;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            margin-bottom: 12px;
            box-shadow: 0 12px 30px rgba(56, 189, 248, 0.12);
        }

        .btn-register:hover {
            transform: translateY(-3px);
            box-shadow: 0 20px 40px rgba(56, 189, 248, 0.18);
            background: linear-gradient(90deg, #36C6EE 0%, #6366F1 100%);
        }

        .login-link {
            color: #94a3b8;
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(148, 163, 184, 0.06);
        }

        .login-link a {
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
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="logo">🎮</div>
            <h1>Daftar</h1>
            <p class="subtitle">Buat akun Game TopUp baru Anda</p>

            @if ($errors->any())
                <div class="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('register.post') }}">
                @csrf

                <div class="form-group">
                    <label for="name">Nama Lengkap</label>
                    <input type="text" id="name" name="name" placeholder="Masukkan nama Anda" required>
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email Anda" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-group">
                        <input type="password" id="password" name="password" placeholder="Minimal 8 karakter" required>
                        <span class="password-toggle" onclick="togglePasswordVisibility('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Konfirmasi Password</label>
                    <div class="password-group">
                        <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Ulangi password Anda" required>
                        <span class="password-toggle" onclick="togglePasswordVisibility('password_confirmation')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <div class="checkbox-group">
                    <input type="checkbox" id="agree" name="agree" required>
                    <label for="agree" class="checkbox-label">Saya setuju dengan syarat dan ketentuan layanan</label>
                </div>

                <button type="submit" class="btn-register">Daftar Sekarang</button>
            </form>

            <div class="login-link">
                Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
            </div>
        </div>
    </div>

    <script>
        function togglePasswordVisibility(fieldId) {
            const field = document.getElementById(fieldId);
            const icon = event.target.closest('.password-toggle');
            
            if (field.type === 'password') {
                field.type = 'text';
                icon.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                field.type = 'password';
                icon.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }
    </script>
</body>
</html>
