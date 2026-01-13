# 🎮 Game TopUp - Setup dengan Laragon

## ✅ Quick Start dengan Laragon

### Step 1: Copy Project ke Laragon
**Option A - Menggunakan Batch File (Recommended):**
1. Double-click file `setup_laragon.bat` di folder ini
2. Tunggu proses selesai (akan otomatis copy ke `C:\laragon\www\game_topup`)

**Option B - Manual:**
1. Buka File Explorer
2. Navigate ke `C:\laragon\www`
3. Copy folder `C:\game_topup` ke sini

### Step 2: Start Laragon Server
1. Buka aplikasi **Laragon**
2. Klik tombol **"Start All"** (warna hijau)
3. Tunggu sampai Apache & MySQL berjalan

### Step 3: Akses Aplikasi
**Option 1 - Akses via Localhost:**
```
http://localhost/game_topup/public
```

**Option 2 - Akses via Virtual Host (jika sudah setup):**
```
http://game_topup.test
```

### Step 4: Akses Database (phpMyAdmin)
```
URL: http://localhost/phpmyadmin
Username: root
Password: (kosong)
Database: game_topup
```

---

## 📊 Database Structure

### Tables yang sudah dibuat:
- **users** - User account (untuk login/register)
- **games** - Daftar game (6 games)
- **top_ups** - Paket top-up (28 packages)
- **transactions** - Riwayat transaksi
- **password_reset_tokens** - Token reset password
- **failed_jobs** - Job queue
- **personal_access_tokens** - API tokens

### Data yang tersedia:

#### Games (6):
1. 🔥 Mobile Legends (Diamond)
2. ⚔️ PUBG Mobile (UC)
3. 🎮 Free Fire (Diamond)
4. 👾 Call of Duty Mobile (CP)
5. 🌟 Valorant (VP)
6. 💎 Genshin Impact (Primogems)

#### Top-Up Packages (28):
- Setiap game memiliki 4-6 paket dengan berbagai nominal
- Harga mulai dari Rp 5,000 hingga Rp 499,000

---

## 🚀 Features

### Landing Page
- Welcome section dengan hero banner
- Feature highlight (Transaksi Cepat, Keamanan, Metode Pembayaran, dll)
- Game populer showcase
- CTA buttons untuk Login/Register

### Authentication
- **Register** - Buat akun baru
  - Masukkan nama lengkap
  - Email & password
  - Konfirmasi password
  
- **Login** - Masuk ke akun
  - Email & password
  - Remember me option

### Dashboard
- Greeting dengan nama user
- Quick action cards (Top Up, Lihat Saldo, Riwayat, Pengaturan)
- Featured games dengan tombol top-up

### Top-Up Flow
1. **Pilih Game** - Browse semua game yang tersedia
2. **Pilih Paket** - Lihat nominal dan harga
3. **Konfirmasi** - Masukkan ID/Username game
4. **Receipt** - Bukti pembayaran & nomor transaksi

---

## 🎨 Design Features

- **Modern Gradient** - Warna ungu-pink yang eye-catching
- **Responsive** - Mobile-friendly design
- **Smooth Animations** - Hover effects & transitions
- **Interactive Modal** - Untuk konfirmasi pembelian
- **Status Badges** - Untuk status transaksi

---

## 🔧 Tech Stack

- **Framework**: Laravel 11
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, Vanilla JavaScript
- **Icons**: Emoji (no font files needed!)
- **Styling**: Inline CSS (easy to customize)

---

## 📝 Test Account (Setelah Daftar)

Buat akun baru lewat halaman register untuk testing:
- Email: `test@example.com`
- Password: `password` (minimal 6 karakter)
- Username: `Test User`

---

## ❓ Troubleshooting

### Halaman Blank / 404
- Pastikan Laragon sudah "Start All"
- Cek apakah folder ada di `C:\laragon\www\game_topup`
- Akses: `http://localhost/game_topup/public`

### Database Connection Error
- Buka phpMyAdmin: `http://localhost/phpmyadmin`
- Cek apakah database `game_topup` sudah ada
- Check `.env` file untuk DB config yang benar

### Game tidak muncul / "Belum ada game tersedia"
- Jalankan: `php artisan db:seed --class=GameSeeder`
- Atau jalankan ulang semuanya: `php artisan migrate:fresh --seed`

### CSS/JS tidak load
- Buka Developer Console (F12)
- Cek apakah ada error
- Clear browser cache (Ctrl+Shift+Del)

---

## 📱 Browser Recommendations
- Chrome (recommended)
- Firefox
- Edge
- Safari (untuk Mac/iOS)

---

## 💡 Tips untuk Presentasi

1. **Pre-load halaman** sebelum presentasi
2. **Buat test account** untuk demo flow
3. **Siapkan 2-3 scenario** untuk presentasikan
4. **Show database** di phpMyAdmin untuk kredibilitas
5. **Responsif testing** - tunjukkan di mobile view

---

**Selamat! Database & aplikasi sudah siap untuk presentasi!** 🚀

Jika ada pertanyaan, cek kembali step-by-step di atas.
