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

### Untuk Admin
- Panel admin terpisah dengan autentikasi khusus
- Dashboard dengan statistik games, top-up, dan transaksi
- Manajemen katalog games dan paket top-up
- Monitoring semua transaksi pengguna
- Akses penuh ke data sistem

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

7. **Jalankan migrasi dan seed data**
```bash
php artisan migrate
php artisan db:seed
```

**Catatan:** Command `db:seed` akan otomatis membuat akun admin dengan email `admin@game-topup.com` dan password `admin123`.

8. **Jalankan server**
```bash
php artisan serve
npm run dev
```

Aplikasi akan berjalan di `http://localhost:8000`

## � Akun Admin

Setelah instalasi selesai, Anda dapat login sebagai admin dengan kredensial berikut:

### **Email:** `admin@game-topup.com`
### **Password:** `admin123`

### Cara Login Admin:
1. **Dari Website Utama:** Scroll ke bagian paling bawah dan klik tombol "Masuk sebagai Admin"
2. **Langsung:** Kunjungi `http://localhost:8000/admin/login`

### Fitur Admin:
- Dashboard dengan statistik lengkap
- Manajemen games dan paket top-up
- Monitoring transaksi
- Panel admin terpisah dari user biasa
### Untuk Kontributor GitHub:
Jika Anda clone repository ini dari GitHub, ikuti langkah berikut untuk setup akun admin:

1. **Pastikan database sudah di-migrasi:**
```bash
php artisan migrate
```

2. **Jalankan seeder untuk membuat akun admin:**
```bash
php artisan db:seed
# atau spesifik untuk admin:
php artisan db:seed --class=AdminUserSeeder
```

3. **Akun admin akan otomatis dibuat** dengan email `admin@game-topup.com` dan password `admin123`

4. **Login sebagai admin** melalui salah satu cara di atas.

**Catatan:** Seeder menggunakan `updateOrCreate`, jadi aman dijalankan berkali-kali tanpa duplikasi data.
## �📁 Struktur Direktori

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
- `GET /login` - Form login pengguna
- `POST /login` - Proses login pengguna
- `GET /register` - Form registrasi
- `POST /register` - Proses registrasi
- `POST /logout` - Logout

### Admin
- `GET /admin/login` - Form login admin
- `POST /admin/login` - Proses login admin
- `GET /admin` - Dashboard admin
- `GET /admin/topups` - Manajemen paket top-up

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
- id, name, email, email_verified_at, password, balance, role, remember_token, created_at, updated_at

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

### Setup untuk Kontributor:
1. **Clone repository** dan ikuti langkah instalasi di atas
2. **Setup akun admin** dengan menjalankan `php artisan db:seed`
3. **Login sebagai admin** untuk testing fitur admin
4. **Akses panel admin** di `http://localhost:8000/admin` untuk development

### Development Admin Panel:
- **Dashboard Admin:** `http://localhost:8000/admin`
- **Manajemen Top-Up:** `http://localhost:8000/admin/topups`
- **Login Admin:** `http://localhost:8000/admin/login`

Akun admin default: `admin@game-topup.com` / `admin123`

## 📞 Support

Untuk bantuan dan pertanyaan, silakan hubungi tim development.
