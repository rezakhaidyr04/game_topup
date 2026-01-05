<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Game TopUp</title>
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
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
            background: linear-gradient(135deg, #0F172A 0%, #020617 100%);
            background-image: radial-gradient(circle at 10% 10%, rgba(56,189,248,0.03), transparent 15%), radial-gradient(circle at 90% 90%, rgba(99,102,241,0.02), transparent 25%);
            color: #F8FAFC;
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

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            background: rgba(15, 23, 42, 0.6);
            border: 1px solid rgba(51, 65, 85, 0.6);
            border-radius: 8px;
            color: #F8FAFC;
            font-size: 16px;
            transition: border-color 0.25s ease, box-shadow 0.25s ease;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            outline: none;
            border-color: #38BDF8;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.1);
        }

        input[type="email"]::placeholder,
        input[type="password"]::placeholder {
            color: #64748B;
        }

        .password-group {
            position: relative;
        }

        .password-toggle {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #64748B;
            cursor: pointer;
            transition: color 0.25s ease;
            user-select: none;
        }

        .password-toggle:hover {
            color: #38BDF8;
        }

        .checkbox-group {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }

        input[type="checkbox"] {
            width: 16px;
            height: 16px;
            accent-color: #38BDF8;
        }

        .checkbox-label {
            color: #cbd5e1;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-login {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #38BDF8 0%, #0EA5E9 100%);
            border: none;
            border-radius: 8px;
            color: #FFFFFF;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
            margin-bottom: 16px;
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(56, 189, 248, 0.3);
        }

        .btn-admin {
            width: 100%;
            padding: 12px;
            background: linear-gradient(135deg, #7C3AED 0%, #A855F7 100%);
            border: none;
            border-radius: 8px;
            color: #FFFFFF;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: transform 0.25s ease, box-shadow 0.25s ease;
        }

        .btn-admin:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px rgba(124, 58, 237, 0.3);
        }

        .links {
            text-align: center;
            margin-top: 16px;
        }

        .links a {
            color: #38BDF8;
            text-decoration: none;
            font-size: 14px;
        }

        .links a:hover {
            text-decoration: underline;
        }

        .register-link {
            text-align: center;
            margin-top: 24px;
            color: #94A3B8;
            font-size: 14px;
        }

        .register-link a {
            color: #38BDF8;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
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
            <div class="brand">
                <div class="logo">🛡️</div>
                <span>GameTopup Admin</span>
            </div>
            <h1>Masuk</h1>
            <p class="subtitle">Akses panel admin Game TopUp</p>

            @if ($errors->any())
                <div class="alert">
                    {{ $errors->first() }}
                </div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email admin" required>
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <div class="password-group">
                        <input type="password" id="password" name="password" placeholder="Masukkan password admin" required>
                        <span class="password-toggle" onclick="togglePasswordVisibility('password')">
                            <i class="fas fa-eye"></i>
                        </span>
                    </div>
                </div>

                <button type="submit" class="btn-admin">Masuk sebagai Admin</button>
            </form>

            <div class="register-link">
                <a href="{{ route('welcome') }}">Kembali ke halaman utama</a>
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