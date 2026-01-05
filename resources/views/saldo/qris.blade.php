<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran QRIS - Game TopUp</title>
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

        .container {
            max-width: 800px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        .payment-card {
            background: #1E293B;
            border-radius: 16px;
            padding: 2.5rem;
            border: 1px solid #334155;
            box-shadow: 0 8px 24px rgba(0, 0, 0, 0.4);
        }

        .payment-header {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1.5rem;
            border-bottom: 1px solid #334155;
        }

        .payment-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #F8FAFC;
            margin-bottom: 0.5rem;
        }

        .payment-subtitle {
            color: #94A3B8;
            font-size: 0.95rem;
        }

        .amount-display {
            text-align: center;
            background: linear-gradient(135deg, #1E293B 0%, #0F172A 100%);
            border-radius: 12px;
            padding: 2rem;
            margin-bottom: 2rem;
            border: 1px solid #334155;
        }

        .amount-label {
            color: #94A3B8;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .amount-value {
            font-size: 2.5rem;
            font-weight: 700;
            color: #38BDF8;
            text-shadow: 0 4px 16px rgba(56, 189, 248, 0.3);
        }

        .qris-container {
            background: white;
            border-radius: 12px;
            padding: 2rem;
            text-align: center;
            margin-bottom: 2rem;
        }

        .qris-image {
            width: 300px;
            height: 300px;
            margin: 0 auto 1rem;
            background: linear-gradient(45deg, #38BDF8, #6366F1);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 3rem;
        }

        .qris-info {
            color: #1E293B;
            font-size: 0.9rem;
            font-weight: 500;
        }

        .transaction-info {
            background: rgba(56, 189, 248, 0.1);
            border: 1px solid #38BDF8;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .info-row {
            display: flex;
            justify-content: space-between;
            padding: 0.75rem 0;
            border-bottom: 1px solid rgba(56, 189, 248, 0.2);
        }

        .info-row:last-child {
            border-bottom: none;
        }

        .info-label {
            color: #94A3B8;
            font-size: 0.9rem;
        }

        .info-value {
            color: #F8FAFC;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .payment-instructions {
            background: #0F172A;
            border-radius: 8px;
            padding: 1.5rem;
            margin-bottom: 2rem;
        }

        .payment-instructions h3 {
            color: #38BDF8;
            font-size: 1.1rem;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .payment-instructions ol {
            color: #94A3B8;
            font-size: 0.9rem;
            margin-left: 1.5rem;
            line-height: 1.8;
        }

        .payment-instructions li {
            margin-bottom: 0.5rem;
        }

        .action-buttons {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1rem;
        }

        .btn {
            padding: 1rem;
            border-radius: 8px;
            font-weight: 600;
            font-size: 0.95rem;
            cursor: pointer;
            transition: all 0.3s ease;
            border: none;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #38BDF8 0%, #6366F1 100%);
            color: #020617;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 28px rgba(56, 189, 248, 0.4);
        }

        .btn-secondary {
            background: #1E293B;
            color: #F8FAFC;
            border: 1px solid #334155;
        }

        .btn-secondary:hover {
            border-color: #38BDF8;
            background: #0F172A;
        }

        .timer {
            text-align: center;
            margin-bottom: 2rem;
            padding: 1rem;
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid #EF4444;
            border-radius: 8px;
        }

        .timer-label {
            color: #EF4444;
            font-size: 0.9rem;
            margin-bottom: 0.5rem;
        }

        .timer-value {
            color: #EF4444;
            font-size: 1.5rem;
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .container {
                padding: 0 1rem;
            }

            .payment-card {
                padding: 1.5rem;
            }

            .qris-image {
                width: 250px;
                height: 250px;
            }

            .amount-value {
                font-size: 2rem;
            }

            .action-buttons {
                grid-template-columns: 1fr;
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
    </header>

    <div class="container">
        <div class="payment-card">
            <div class="payment-header">
                <h1 class="payment-title">
                    <i class="fas fa-qrcode"></i>
                    Scan QRIS untuk Bayar
                </h1>
                <p class="payment-subtitle">Scan kode QR di bawah ini menggunakan aplikasi e-wallet atau mobile banking Anda</p>
            </div>

            <div class="timer">
                <div class="timer-label">
                    <i class="fas fa-clock"></i>
                    Waktu Pembayaran Berakhir Dalam
                </div>
                <div class="timer-value" id="countdown">15:00</div>
            </div>

            <div class="amount-display">
                <div class="amount-label">Total Pembayaran</div>
                <div class="amount-value">Rp {{ number_format($amount, 0, ',', '.') }}</div>
            </div>

            <div class="qris-container">
                <div class="qris-image">
                    <i class="fas fa-qrcode"></i>
                </div>
                <p class="qris-info">
                    <i class="fas fa-mobile-alt"></i>
                    Scan dengan aplikasi: GoPay, OVO, Dana, LinkAja, ShopeePay, atau Mobile Banking
                </p>
            </div>

            <div class="transaction-info">
                <div class="info-row">
                    <span class="info-label">ID Transaksi</span>
                    <span class="info-value">{{ $transactionId }}</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Merchant</span>
                    <span class="info-value">GameTopup Indonesia</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Metode Pembayaran</span>
                    <span class="info-value">QRIS</span>
                </div>
                <div class="info-row">
                    <span class="info-label">Waktu Pembuatan</span>
                    <span class="info-value">{{ now()->format('d M Y, H:i') }}</span>
                </div>
            </div>

            <div class="payment-instructions">
                <h3>
                    <i class="fas fa-list-ol"></i>
                    Cara Pembayaran
                </h3>
                <ol>
                    <li>Buka aplikasi e-wallet atau mobile banking Anda (GoPay, OVO, Dana, ShopeePay, dll)</li>
                    <li>Pilih menu "Scan QR" atau "QRIS"</li>
                    <li>Arahkan kamera ke kode QR di atas</li>
                    <li>Pastikan nominal yang muncul sesuai: <strong>Rp {{ number_format($amount, 0, ',', '.') }}</strong></li>
                    <li>Konfirmasi dan selesaikan pembayaran</li>
                    <li>Klik tombol "Saya Sudah Bayar" setelah pembayaran berhasil</li>
                </ol>
            </div>

            <div class="action-buttons">
                <form action="{{ route('saldo.confirm') }}" method="POST" style="margin: 0;">
                    @csrf
                    <input type="hidden" name="transaction_id" value="{{ $transactionId }}">
                    <input type="hidden" name="amount" value="{{ $amount }}">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check-circle"></i>
                        Saya Sudah Bayar
                    </button>
                </form>
                <a href="{{ route('saldo.index') }}" class="btn btn-secondary">
                    <i class="fas fa-times-circle"></i>
                    Batalkan
                </a>
            </div>
        </div>
    </div>

    <script>
        // Countdown timer (15 minutes)
        let timeLeft = 15 * 60; // 15 minutes in seconds
        const countdownElement = document.getElementById('countdown');

        function updateCountdown() {
            const minutes = Math.floor(timeLeft / 60);
            const seconds = timeLeft % 60;
            
            countdownElement.textContent = 
                `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
            
            if (timeLeft <= 0) {
                clearInterval(countdownTimer);
                countdownElement.textContent = '00:00';
                countdownElement.parentElement.innerHTML = 
                    '<div class="timer-label" style="color: #EF4444;"><i class="fas fa-exclamation-circle"></i> Waktu pembayaran telah habis</div>';
            }
            
            timeLeft--;
        }

        // Update every second
        const countdownTimer = setInterval(updateCountdown, 1000);
        updateCountdown(); // Initial call

        // Simulate QR Code generation (in real implementation, use a QR code library)
        // For now, we're just showing an icon as placeholder
    </script>
</body>
</html>
