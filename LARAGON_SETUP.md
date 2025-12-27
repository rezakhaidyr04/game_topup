# 🚀 Setup Game TopUp dengan Laragon

## Langkah-Langkah Setup:

### 1. **Copy Project ke Laragon**
   - Buka File Explorer
   - Arahkan ke: `C:\laragon\www\`
   - Copy folder `game_topup` dari `C:\game_topup` ke sini
   - Atau jalankan di PowerShell (as Administrator):
   ```powershell
   Copy-Item -Path "C:\game_topup" -Destination "C:\laragon\www\game_topup" -Recurse
   ```

### 2. **Buka Laragon**
   - Buka aplikasi Laragon
   - Klik tombol **"Start All"** untuk menjalankan Apache dan MySQL

### 3. **Akses Aplikasi**
   - Buka browser dan ketik: `http://game_topup.test` atau `http://localhost/game_topup/public`
   - Atau untuk Laravel dengan proper setup: `http://game_topup.test`

### 4. **Akses phpMyAdmin**
   - Buka browser: `http://localhost/phpmyadmin`
   - Username: `root`
   - Password: (kosong)
   - Pilih database: `game_topup`

### 5. **Daftar & Login**
   - Halaman utama: `http://game_topup.test`
   - Daftar akun baru
   - Login dan mulai top-up game!

## ✅ Database sudah siap dengan:
- ✓ 6 Games (Mobile Legends, PUBG, Free Fire, CoD, Valorant, Genshin)
- ✓ 28 Top-Up Packages
- ✓ Siap untuk presentasi!

## 📊 Struktur Database:
```
game_topup/
├── games (6 records)
├── top_ups (28 records)
├── transactions (untuk histori)
├── users (untuk login)
└── password_reset_tokens
```

## 🎮 Fitur Aplikasi:
- ✓ Authentication (Login/Register)
- ✓ Browse Games
- ✓ Pilih Paket Top-Up
- ✓ Konfirmasi Pembelian
- ✓ Bukti Transaksi
- ✓ Dashboard & Riwayat

Enjoy! 🚀
