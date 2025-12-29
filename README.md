# Game TopUp - Platform Pembelian Top-Up Game

Aplikasi web untuk platform penjualan top-up game online yang dibangun dengan Laravel dan Blade Templating Engine.

## 📋 Tentang Proyek

**Game TopUp** adalah platform modern untuk pembelian top-up game dengan fitur-fitur lengkap seperti:

- ✅ Sistem autentikasi pengguna (login, register, logout)
- ✅ Katalog game dan paket top-up
- ✅ Proses pembelian top-up yang aman
- ✅ Riwayat transaksi pengguna
- ✅ Manajemen profil pengguna
- ✅ Sistem pembayaran (terintegrasi)

## 🚀 Fitur Utama

### Untuk Pengguna
- Registrasi dan login akun
- Browse daftar game yang tersedia
- Melihat paket top-up dengan harga
- Membeli top-up dengan akun game
- Melihat riwayat transaksi
- Manajemen profil dan pengaturan

### Untuk Developer
- Struktur kode yang bersih dan terorganisir
- Service layer untuk business logic
- Form request validation
- Authorization policies
- Database transactions untuk keamanan
- Eager loading untuk optimasi query

## 🔧 Teknologi yang Digunakan

- **Framework**: Laravel 11
- **Database**: MySQL
- **Frontend**: Blade Template, Tailwind CSS
- **Build Tool**: Vite
- **Package Manager**: Composer, NPM

## 📦 Instalasi

### Prasyarat
- PHP 8.1+
- Composer
- MySQL
- Node.js & NPM

### Langkah Instalasi

1. **Clone repository**
```bash
git clone <repository-url>
cd game_topup
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install Node dependencies**
```bash
npm install
```

4. **Setup environment**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Konfigurasi database di `.env`**
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=game_topup
DB_USERNAME=root
DB_PASSWORD=
```

6. **Jalankan migrasi database**
```bash
php artisan migrate
```

7. **Seed data (opsional)**
```bash
php artisan db:seed
```

8. **Jalankan server**
```bash
php artisan serve
npm run dev
```

Aplikasi akan berjalan di `http://localhost:8000`

## 📁 Struktur Direktori

```
game_topup/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── AuthController.php
│   │   │   └── TopUpController.php
│   │   ├── Requests/
│   │   │   └── PurchaseTopUpRequest.php
│   │   └── Middleware/
│   ├── Models/
│   │   ├── User.php
│   │   ├── Game.php
│   │   ├── TopUp.php
│   │   └── Transaction.php
│   ├── Services/
│   │   └── TopUpService.php
│   └── Policies/
│       └── TransactionPolicy.php
├── database/
│   ├── migrations/
│   └── seeders/
├── resources/
│   ├── views/
│   ├── css/
│   └── js/
├── routes/
│   ├── web.php
│   └── api.php
└── tests/
```

## 🔑 Endpoint Utama

### Autentikasi
- `GET /login` - Form login
- `POST /login` - Proses login
- `GET /register` - Form registrasi
- `POST /register` - Proses registrasi
- `POST /logout` - Logout

### Top-Up
- `GET /topup` - Daftar game dan transaksi terbaru
- `GET /topup/game/{game}` - Detail game dan paket top-up
- `POST /topup/purchase` - Proses pembelian
- `GET /topup/receipt/{transaction}` - Struk transaksi

### Pengguna
- `GET /home` - Dashboard
- `GET /profile` - Profil pengguna
- `GET /settings` - Pengaturan akun

## 💾 Database Schema

### Users
- id, name, email, email_verified_at, password, remember_token, created_at, updated_at

### Games
- id, name, icon, currency_type, min_price, max_price, created_at, updated_at

### TopUps
- id, game_id, name, amount, price, created_at, updated_at

### Transactions
- id, user_id, game_id, topup_id, amount, price, status, game_account, created_at, updated_at

## 🛡️ Keamanan

- ✅ Password hashing dengan bcrypt
- ✅ CSRF protection
- ✅ Authorization policies
- ✅ Database transactions
- ✅ Input validation
- ✅ Session security

## 📝 Lisensi

MIT License - lihat file [LICENSE](LICENSE) untuk detail

## 👥 Kontribusi

Kontribusi sangat diterima! Silakan buat pull request atau buka issue untuk saran dan perbaikan.

## 📞 Support

Untuk bantuan dan pertanyaan, silakan hubungi tim development.
