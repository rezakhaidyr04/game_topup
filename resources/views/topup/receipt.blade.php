<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran - Game TopUp</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600,700&display=swap" rel="stylesheet" />
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
            color: #e2e8f0;
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
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(45, 27, 105, 0.6) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 12px;
            padding: 40px;
            box-shadow: 0 25px 50px rgba(236, 72, 153, 0.15);
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
            color: #4ade80;
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
            background: rgba(148, 163, 184, 0.2);
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
            color: #e2e8f0;
            text-align: right;
        }

        .amount-section {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(236, 72, 153, 0.3);
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
            background: linear-gradient(135deg, #ec4899, #d946ef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .receipt-id {
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(148, 163, 184, 0.2);
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
            gap: 10px;
        }

        .btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, #ec4899 0%, #d946ef 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(236, 72, 153, 0.3);
        }

        .btn-secondary {
            background: rgba(15, 23, 42, 0.5);
            color: #cbd5e1;
            border: 1px solid rgba(148, 163, 184, 0.2);
        }

        .btn-secondary:hover {
            border-color: rgba(236, 72, 153, 0.5);
            color: #e2e8f0;
        }

        .status-badge {
            display: inline-block;
            background: rgba(34, 197, 94, 0.2);
            color: #86efac;
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
            </div>

            <div class="divider"></div>

            <div class="amount-section">
                <div class="amount-label">Total Pembayaran</div>
                <div class="amount-value">Rp {{ number_format($transaction->price, 0, ',', '.') }}</div>
            </div>

            <div class="btn-group">
                <a href="{{ route('topup.index') }}" class="btn btn-primary">Top Up Lagi</a>
                <a href="{{ route('home') }}" class="btn btn-secondary">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</body>
</html>
