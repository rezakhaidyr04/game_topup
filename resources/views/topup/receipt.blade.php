<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran - Game TopUp</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: #0f172a;
            color: #f8fafc;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .container {
            max-width: 500px;
            width: 100%;
        }

        .receipt-card {
            background: #111827;
            border: 1px solid rgba(148, 163, 184, 0.06);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        }

        .success-icon {
            text-align: center;
            font-size: 64px;
            margin-bottom: 20px;
            animation: bounce 1s ease-in-out;
        }

        @keyframes bounce {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.1); }
        }

        h1 {
            text-align: center;
            color: #f8fafc;
            margin-bottom: 10px;
            font-size: 28px;
        }

        .subtitle {
            text-align: center;
            color: #94a3b8;
            margin-bottom: 30px;
            font-size: 14px;
        }

        .divider {
            height: 1px;
            background: rgba(148, 163, 184, 0.06);
            margin: 30px 0;
        }

        .receipt-details {
            margin-bottom: 30px;
        }

        .detail-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 14px;
        }

        .detail-label {
            color: #cbd5e1;
            font-weight: 600;
        }

        .detail-value {
            color: #f8fafc;
            text-align: right;
        }

        .amount-section {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(148, 163, 184, 0.06);
            border-radius: 8px;
            padding: 20px;
            margin: 30px 0;
            text-align: center;
        }

        .amount-label {
            color: #94a3b8;
            font-size: 13px;
            margin-bottom: 8px;
        }

        .amount-value {
            font-size: 32px;
            font-weight: 700;
            color: #38BDF8;
        }

        .receipt-id {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(148, 163, 184, 0.06);
            border-radius: 8px;
            padding: 12px;
            text-align: center;
            margin-bottom: 30px;
            font-size: 13px;
            color: #cbd5e1;
        }

        .receipt-id label {
            display: block;
            color: #94a3b8;
            margin-bottom: 4px;
            font-size: 12px;
        }

        .btn-group {
            display: flex;
            gap: 15px;
            margin-top: 30px;
        }

        .btn {
            flex: 1;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
            text-decoration: none;
            text-align: center;
        }

        .btn-primary {
            background: #38BDF8;
            color: #020617;
        }

        .btn-primary:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(56, 189, 248, 0.18);
        }

        .btn-secondary {
            background: transparent;
            color: #38BDF8;
            border: 1px solid #38BDF8;
        }

        .btn-secondary:hover {
            background: rgba(56, 189, 248, 0.1);
            transform: scale(1.02);
        }

        .status-badge {
            display: inline-block;
            background: rgba(56, 189, 248, 0.1);
            color: #38BDF8;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="receipt-card">
            <div class="success-icon">✅</div>
            <h1>Transaksi Berhasil!</h1>
            <p class="subtitle">Top-up game Anda sedang diproses</p>

            <div style="text-align: center; margin-bottom: 20px;">
                <span class="status-badge">{{ ucfirst($transaction->status) }}</span>
            </div>

            <div class="receipt-id">
                <label>Nomor Transaksi</label>
                <strong>#{{ str_pad($transaction->id, 6, '0', STR_PAD_LEFT) }}</strong>
            </div>

            <div class="divider"></div>

            <div class="receipt-details">
                <div class="detail-row">
                    <span class="detail-label">🎮 Game</span>
                    <span class="detail-value">{{ $transaction->game->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">📦 Paket</span>
                    <span class="detail-value">{{ $transaction->topup->name }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">💎 Nominal</span>
                    <span class="detail-value">{{ $transaction->amount }} {{ $transaction->game->currency_type }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">👤 Akun Game</span>
                    <span class="detail-value">{{ $transaction->game_account }}</span>
                </div>
                <div class="detail-row">
                    <span class="detail-label">📅 Waktu</span>
                    <span class="detail-value">{{ $transaction->created_at->format('d M Y H:i') }}</span>
                </div>

                @if(!empty($transaction->promo_code))
                    <div class="detail-row">
                        <span class="detail-label">🏷️ Promo</span>
                        <span class="detail-value">{{ $transaction->promo_code }}</span>
                    </div>
                @endif
            </div>

            <div class="divider"></div>

            <div class="amount-section">
                <div class="amount-label">Total Pembayaran</div>
                <div class="amount-value">Rp {{ number_format($transaction->price, 0, ',', '.') }}</div>
                @if(($transaction->discount ?? 0) > 0)
                    <div style="margin-top:10px;color:#94a3b8;font-size:13px">
                        Harga awal: Rp {{ number_format($transaction->original_price, 0, ',', '.') }} • Diskon: Rp {{ number_format($transaction->discount, 0, ',', '.') }}
                    </div>
                @endif
            </div>

            <div class="btn-group">
                <a href="{{ route('topup.index') }}" class="btn btn-primary">Top Up Lagi</a>
                <a href="{{ route('home') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
