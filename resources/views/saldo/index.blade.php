<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saldo Anda - Game TopUp</title>
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
            background: #0F172A;
            color: #F8FAFC;
            min-height: 100vh;
        }

        header {
            background: #020617;
            border-bottom: 1px solid #334155;
            padding: 1rem 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
        }

        .logo-header {
            font-size: 1.5rem;
            font-weight: 700;
            color: #38BDF8;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .nav-links {
            display: flex;
            gap: 1.5rem;
            align-items: center;
        }

        .nav-links a {
            color: #F8FAFC;
            text-decoration: none;
            font-weight: 500;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .nav-links a:hover {
            color: #38BDF8;
        }

        .btn-back {
            background: #1E293B;
            color: #38BDF8;
            padding: 0.6rem 1.2rem;
            border: 1px solid #38BDF8;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.9rem;
            transition: all 0.3s ease;
            text-decoration: none;
            display: inline-block;
        }

        .btn-back:hover {
            background: #38BDF8;
            color: #020617;
            transform: translateY(-2px);
            box-shadow: 0 8px 16px rgba(56, 189, 248, 0.3);
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .alert {
            padding: 1rem 1.5rem;
            border-radius: 8px;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
            font-weight: 500;
        }

        .alert-success {
            background: rgba(34, 197, 94, 0.1);
            border: 1px solid #22C55E;
            color: #22C55E;
        }

        .balance-card {
            background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
            border-radius: 16px;
            padding: 3rem;
            margin-bottom: 2rem;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
            border: 1px solid #334155;
            text-align: center;
        }

        .balance-label {
            color: #94A3B8;
            font-size: 1rem;
            margin-bottom: 0.5rem;
            font-weight: 500;
        }

        .balance-amount {
            font-size: 3.5rem;
            font-weight: 700;
            color: #38BDF8;
            margin-bottom: 0.5rem;
            text-shadow: 0 4px 16px rgba(56, 189, 248, 0.3);
        }

        .balance-info {
            color: #64748B;
            font-size: 0.9rem;
        }

        .topup-section {
            background: #1E293B;
            border-radius: 12px;
            padding: 2rem;
            border: 1px solid #334155;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.3);
        }

        .section-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #F8FAFC;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            color: #F8FAFC;
            font-weight: 500;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .form-input {
            width: 100%;
            padding: 0.875rem 1rem;
            background: #0F172A;
            border: 1px solid #334155;
            border-radius: 8px;
            color: #F8FAFC;
            font-size: 1rem;
            transition: all 0.3s ease;
        }

        .form-input:focus {
            outline: none;
            border-color: #38BDF8;
            box-shadow: 0 0 0 3px rgba(56, 189, 248, 0.1);
        }

        .amount-presets {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(140px, 1fr));
            gap: 1rem;
            margin-bottom: 1.5rem;
        }

        .preset-btn {
            background: #0F172A;
            border: 2px solid #334155;
            color: #F8FAFC;
            padding: 0.875rem;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 600;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .preset-btn:hover {
            border-color: #38BDF8;
            background: #1E293B;
            transform: translateY(-2px);
        }

        .preset-btn.active {
            border-color: #38BDF8;
            background: #38BDF8;
            color: #020617;
        }

        .btn-submit {
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            color: #020617;
            padding: 1rem 2rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-weight: 700;
            font-size: 1rem;
            transition: all 0.3s ease;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
        }

        .btn-submit:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 28px rgba(56, 189, 248, 0.4);
        }

        .info-box {
            background: rgba(56, 189, 248, 0.1);
            border: 1px solid #38BDF8;
            border-radius: 8px;
            padding: 1rem;
            margin-top: 1.5rem;
        }

        .info-box h4 {
            color: #38BDF8;
            font-size: 0.95rem;
            margin-bottom: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .info-box ul {
            color: #94A3B8;
            font-size: 0.85rem;
            margin-left: 1.5rem;
            line-height: 1.6;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }

            .balance-amount {
                font-size: 2.5rem;
            }

            .amount-presets {
                grid-template-columns: repeat(2, 1fr);
            }
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-header">
            <i class="fas fa-gamepad"></i>
            GameTopup
        </div>
        <div class="nav-links">
            <a href="{{ route('home') }}" class="btn-back">
                <i class="fas fa-arrow-left"></i> Kembali ke Home
            </a>
        </div>
    </header>

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif

        <div class="balance-card">
            <div class="balance-label">
                <i class="fas fa-wallet"></i> Saldo Anda Saat Ini
            </div>
            <div class="balance-amount">
                Rp {{ number_format($user->balance, 0, ',', '.') }}
            </div>
            <div class="balance-info">
                Update terakhir: {{ now()->format('d F Y, H:i') }}
            </div>
        </div>

        <div class="topup-section">
            <h2 class="section-title">
                <i class="fas fa-qrcode"></i>
                Top Up Saldo via QRIS
            </h2>

            <form action="{{ route('saldo.topup') }}" method="POST" id="topupForm">
                @csrf
                <div class="form-group">
                    <label class="form-label">Pilih Nominal Top Up</label>
                    <div class="amount-presets">
                        <button type="button" class="preset-btn" data-amount="10000">
                            Rp 10.000
                        </button>
                        <button type="button" class="preset-btn" data-amount="25000">
                            Rp 25.000
                        </button>
                        <button type="button" class="preset-btn" data-amount="50000">
                            Rp 50.000
                        </button>
                        <button type="button" class="preset-btn" data-amount="100000">
                            Rp 100.000
                        </button>
                        <button type="button" class="preset-btn" data-amount="250000">
                            Rp 250.000
                        </button>
                        <button type="button" class="preset-btn" data-amount="500000">
                            Rp 500.000
                        </button>
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label" for="amount">
                        <i class="fas fa-money-bill-wave"></i>
                        Atau Masukkan Nominal Sendiri
                    </label>
                    <input 
                        type="number" 
                        id="amount" 
                        name="amount" 
                        class="form-input" 
                        placeholder="Masukkan nominal (min. Rp 10.000)"
                        min="10000"
                        max="10000000"
                        required
                    >
                    @error('amount')
                        <small style="color: #EF4444; font-size: 0.85rem; margin-top: 0.25rem; display: block;">
                            {{ $message }}
                        </small>
                    @enderror
                </div>

                <button type="submit" class="btn-submit">
                    <i class="fas fa-qrcode"></i>
                    Generate QRIS & Lanjutkan
                </button>
            </form>

            <div class="info-box">
                <h4>
                    <i class="fas fa-info-circle"></i>
                    Informasi Penting
                </h4>
                <ul>
                    <li>Minimal top up adalah Rp 10.000</li>
                    <li>Maksimal top up adalah Rp 10.000.000 per transaksi</li>
                    <li>QRIS dapat digunakan dengan berbagai aplikasi e-wallet dan mobile banking</li>
                    <li>Saldo akan otomatis masuk setelah pembayaran berhasil</li>
                    <li>Pastikan nominal yang dibayarkan sesuai dengan yang tertera</li>
                </ul>
            </div>
        </div>
    </div>

    <script>
        // Handle preset buttons
        const presetBtns = document.querySelectorAll('.preset-btn');
        const amountInput = document.getElementById('amount');

        presetBtns.forEach(btn => {
            btn.addEventListener('click', function() {
                // Remove active class from all buttons
                presetBtns.forEach(b => b.classList.remove('active'));
                
                // Add active class to clicked button
                this.classList.add('active');
                
                // Set the input value
                const amount = this.getAttribute('data-amount');
                amountInput.value = amount;
            });
        });

        // Clear active state when user types manually
        amountInput.addEventListener('input', function() {
            presetBtns.forEach(b => b.classList.remove('active'));
        });

        // Format number input
        amountInput.addEventListener('blur', function() {
            if (this.value) {
                const value = parseInt(this.value);
                if (value < 10000) {
                    this.value = 10000;
                } else if (value > 10000000) {
                    this.value = 10000000;
                }
            }
        });
    </script>
</body>
</html>
