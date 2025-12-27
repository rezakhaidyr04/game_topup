<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $game->name }} - Game TopUp</title>
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
        }

        header {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(45, 27, 105, 0.6) 100%);
            border-bottom: 1px solid rgba(148, 163, 184, 0.2);
            padding: 20px 40px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo-header {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(135deg, #ec4899, #d946ef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .nav-links {
            display: flex;
            gap: 20px;
            align-items: center;
        }

        .nav-links a {
            color: #cbd5e1;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .nav-links a:hover {
            color: #ec4899;
        }

        .btn-logout {
            background: linear-gradient(135deg, #ec4899 0%, #d946ef 100%);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s ease;
            font-size: 14px;
        }

        .btn-logout:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(236, 72, 153, 0.3);
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 20px;
        }

        .back-link {
            color: #ec4899;
            text-decoration: none;
            font-weight: 600;
            margin-bottom: 20px;
            display: inline-block;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        .game-header {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.8) 0%, rgba(45, 27, 105, 0.5) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 12px;
            padding: 40px;
            text-align: center;
            margin-bottom: 40px;
        }

        .game-icon {
            font-size: 80px;
            margin-bottom: 20px;
        }

        .game-header h1 {
            font-size: 32px;
            margin-bottom: 10px;
            background: linear-gradient(135deg, #ec4899, #d946ef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .game-header p {
            color: #94a3b8;
            font-size: 16px;
        }

        .topups-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin-bottom: 40px;
        }

        .topup-card {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.8) 0%, rgba(45, 27, 105, 0.5) 100%);
            border: 2px solid rgba(148, 163, 184, 0.2);
            border-radius: 12px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .topup-card:hover {
            border-color: rgba(236, 72, 153, 0.5);
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(236, 72, 153, 0.2);
        }

        .topup-card h3 {
            font-size: 20px;
            margin-bottom: 5px;
            color: #e2e8f0;
        }

        .topup-card .amount {
            color: #94a3b8;
            font-size: 14px;
            margin-bottom: 15px;
        }

        .topup-card .price {
            font-size: 24px;
            font-weight: 700;
            background: linear-gradient(135deg, #ec4899, #d946ef);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            margin-bottom: 15px;
        }

        .btn-buy {
            background: linear-gradient(135deg, #ec4899 0%, #d946ef 100%);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
        }

        .btn-buy:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(236, 72, 153, 0.3);
        }

        .form-section {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.8) 0%, rgba(45, 27, 105, 0.5) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 12px;
            padding: 30px;
            margin-top: 40px;
        }

        .form-section h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #e2e8f0;
        }

        .form-group {
            margin-bottom: 20px;
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
        input[type="password"],
        select {
            width: 100%;
            padding: 12px 15px;
            background: rgba(15, 23, 42, 0.5);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 8px;
            color: #e2e8f0;
            font-size: 14px;
            transition: all 0.3s ease;
        }

        input:focus,
        select:focus {
            outline: none;
            border-color: rgba(236, 72, 153, 0.5);
            background: rgba(15, 23, 42, 0.8);
        }

        input::placeholder {
            color: #64748b;
        }

        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.7);
            justify-content: center;
            align-items: center;
            z-index: 1000;
        }

        .modal.active {
            display: flex;
        }

        .modal-content {
            background: linear-gradient(135deg, rgba(30, 41, 59, 0.95) 0%, rgba(45, 27, 105, 0.6) 100%);
            border: 1px solid rgba(148, 163, 184, 0.2);
            border-radius: 12px;
            padding: 40px;
            max-width: 500px;
            width: 90%;
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.3);
        }

        .modal h2 {
            color: #e2e8f0;
            margin-bottom: 20px;
            font-size: 24px;
        }

        .modal-close {
            background: none;
            border: none;
            color: #cbd5e1;
            font-size: 24px;
            cursor: pointer;
            float: right;
            transition: color 0.3s ease;
        }

        .modal-close:hover {
            color: #ec4899;
        }

        .btn-submit {
            background: linear-gradient(135deg, #ec4899 0%, #d946ef 100%);
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            width: 100%;
            transition: all 0.3s ease;
            margin-top: 20px;
        }

        .btn-submit:hover {
            transform: scale(1.02);
            box-shadow: 0 5px 15px rgba(236, 72, 153, 0.3);
        }
    </style>
</head>
<body>
    <header>
        <div class="logo-header">🎮 Game TopUp</div>
        <div class="nav-links">
            <a href="{{ route('home') }}">Dashboard</a>
            <a href="{{ route('topup.index') }}">Top Up</a>
            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                @csrf
                <button type="submit" class="btn-logout">Logout</button>
            </form>
        </div>
    </header>

    <div class="container">
        <a href="{{ route('topup.index') }}" class="back-link">← Kembali</a>

        <div class="game-header">
            <div class="game-icon">{{ $game->icon }}</div>
            <h1>{{ $game->name }}</h1>
            <p>Pilih nominal top-up yang ingin dibeli</p>
        </div>

        <div class="topups-grid">
            @forelse ($topups as $topup)
                <div class="topup-card" onclick="openModal({{ $topup->id }}, '{{ $topup->name }}', {{ $topup->price }})">
                    <h3>{{ $topup->name }}</h3>
                    <div class="amount">{{ $topup->amount }} {{ $game->currency_type }}</div>
                    <div class="price">Rp {{ number_format($topup->price, 0, ',', '.') }}</div>
                    <button type="button" class="btn-buy">Beli Sekarang</button>
                </div>
            @empty
                <p style="color: #94a3b8; grid-column: 1/-1; text-align: center;">Belum ada paket top-up tersedia</p>
            @endforelse
        </div>
    </div>

    <!-- Purchase Modal -->
    <div class="modal" id="purchaseModal">
        <div class="modal-content">
            <button class="modal-close" onclick="closeModal()">&times;</button>
            <h2>Konfirmasi Pembelian</h2>
            
            <form method="POST" action="{{ route('topup.purchase') }}">
                @csrf
                
                <input type="hidden" name="game_id" value="{{ $game->id }}">
                <input type="hidden" name="topup_id" id="topup_id">

                <div class="form-group">
                    <label>Paket: <span id="topup_name"></span></label>
                    <input type="text" value="" disabled style="color: #94a3b8;">
                </div>

                <div class="form-group">
                    <label>Total Harga: Rp <span id="topup_price">0</span></label>
                    <input type="text" value="" disabled style="color: #94a3b8;">
                </div>

                <div class="form-group">
                    <label for="game_account">ID/Username Game *</label>
                    <input type="text" id="game_account" name="game_account" placeholder="Masukkan ID atau username game Anda" required>
                </div>

                <button type="submit" class="btn-submit">Lanjutkan Pembayaran</button>
            </form>
        </div>
    </div>

    <script>
        function openModal(topupId, topupName, topupPrice) {
            document.getElementById('topup_id').value = topupId;
            document.getElementById('topup_name').textContent = topupName;
            document.getElementById('topup_price').textContent = new Intl.NumberFormat('id-ID').format(topupPrice);
            document.getElementById('purchaseModal').classList.add('active');
        }

        function closeModal() {
            document.getElementById('purchaseModal').classList.remove('active');
        }

        window.onclick = function(event) {
            const modal = document.getElementById('purchaseModal');
            if (event.target === modal) {
                modal.classList.remove('active');
            }
        }
    </script>
</body>
</html>
