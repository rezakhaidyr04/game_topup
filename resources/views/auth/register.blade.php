<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Game TopUp</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Figtree', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #2d1b69 50%, #0f172a 100%);
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 450px;
            width: 100%;
        }

        .card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(45, 27, 105, 0.6) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(236, 72, 153, 0.15);
        }

        .logo {
            text-align: center;
            margin-bottom: 30px;
            font-size: 2.5rem;
        }

        h1 {
            color: #e2e8f0;
            font-size: 28px;
            margin-bottom: 10px;
            text-align: center;
        }

        .subtitle {
            color: #94a3b8;
            text-align: center;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            color: #cbd5e1;
            font-weight: 600;
            margin-bottom: 6px;
            font-size: 14px;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 12px 15px;
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 8px;
            color: #e2e8f0;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input[type="text"]:focus,
        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: rgba(236, 72, 153, 0.5);
            background: rgba(15, 23, 42, 0.8);
            box-shadow: 0 0 0 3px rgba(236, 72, 153, 0.1);
        }

        input::placeholder {
            color: #64748b;
        }

        .checkbox-group {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            margin-bottom: 20px;
            margin-top: 15px;
        }

        input[type="checkbox"] {
            cursor: pointer;
            margin-top: 4px;
        }

        .checkbox-label {
            color: #cbd5e1;
            font-size: 13px;
            margin: 0;
            line-height: 1.4;
        }

        .btn-register {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #ec4899 0%, #d946ef 100%);
            color: white;
            border: none;
            border-radius: 8px;
            font-weight: 600;
            font-size: 16px;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 20px;
            margin-bottom: 15px;
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(236, 72, 153, 0.4);
        }

        .password-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 45px;
            cursor: pointer;
            color: #94a3b8;
            font-size: 16px;
            transition: color 0.25s ease;
            user-select: none;
        }

        .password-toggle:hover {
            color: #ec4899;
        }

        .login-link {
            color: #94a3b8;
            text-align: center;
            margin-top: 20px;
            padding-top: 20px;
            border-top: 1px solid rgba(148, 163, 184, 0.1);
        }

        .login-link a {
            color: #ec4899;
            text-decoration: none;
            font-weight: 600;
        }

        .login-link a:hover {
            text-decoration: underline;
        }

        .alert {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #fca5a5;
            padding: 12px;
            border-radius: 8px;
            margin-bottom: 20px;
            font-size: 14px;
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
