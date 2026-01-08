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
- ✅ Kode promo/voucher (diskon)

## 🎤 Materi Presentasi (Format Slide)

### Slide 1 — Judul
- Game TopUp: Platform Pembelian Top-Up Game
- Fokus: transaksi top-up, saldo, dan promo diskon

Catatan: Jelaskan bahwa aplikasi ini mensimulasikan pengalaman top-up end-to-end (user) dan kontrol operasional (admin).

### Slide 2 — Masalah
- Top-up game butuh alur yang cepat dan jelas
- Pengguna ingin harga transparan + bukti transaksi
- Admin butuh kontrol harga dan promo tanpa ribet

Catatan: Tekankan 3 pain utama: user butuh proses cepat, butuh bukti, dan admin butuh pengelolaan harga/promo tanpa edit database manual.

### Slide 3 — Solusi
- Katalog game + paket top-up
- Saldo user + pembelian yang aman (DB transaction)
- Promo code/voucher untuk diskon otomatis

Catatan: Jelaskan “aman” di sini artinya proses pembelian dibungkus transaksi database agar saldo & transaksi konsisten.

### Slide 4 — Fitur Utama (User)
- Login/registrasi
- Pilih game → pilih paket → input ID/username game
- (Opsional) input kode promo untuk diskon
- Lihat struk transaksi + riwayat transaksi

Catatan: Demo paling cepat: langsung ke Top Up, pilih game, masukkan akun game, isi promo (opsional), lalu lihat struk.

### Slide 5 — Fitur Utama (Admin)
- Dashboard statistik + monitoring transaksi
- Kelola paket top-up (harga/nominal)
- Kelola kode promo (CRUD: buat, edit, hapus)
- Rekapan transaksi mingguan/bulanan

Catatan: Jelaskan admin bisa membuat promo baru kapan saja (aktif/nonaktif, kuota, periode) tanpa deploy ulang.

### Slide 6 — Demo Flow (Singkat)
- User: top up saldo → beli paket topup → input promo → lihat struk
- Admin: login → kelola promo → cek rekap transaksi

Catatan: Saat demo, pakai 1 kode promo contoh (mis. HEMAT10) supaya terlihat efek diskon dan tercatat di struk.

### Slide 7 — Nilai Tambah
- Diskon otomatis (percent/fixed) + validasi periode/kuota
- Struk menampilkan breakdown harga awal vs diskon
- Rekapan admin memakai status transaksi yang benar

Catatan: Poin penting untuk audiens: transparansi harga (breakdown) dan kontrol promo (aturan jelas).

### Slide 8 — Tech Stack
- Laravel 11 + Blade
- MySQL
- Vite (asset build)
- PHPUnit (tes fitur)

Catatan: Tekankan maintainability: ada service layer, request validation, dan test untuk memastikan diskon berjalan benar.

### Catatan Teknis Singkat (untuk Q&A)
- Promo code divalidasi: aktif, periode (starts/ends), minimal belanja, dan kuota pemakaian
- Diskon mendukung `percent` dan `fixed`, dengan batas `max_discount`
- Transaksi menyimpan `original_price`, `discount`, dan `price` (harga akhir) supaya riwayat tetap akurat
- Admin bisa kelola promo di `/admin/promocodes`

## 🚀 Fitur Utama

### Untuk Pengguna
- Registrasi dan login akun
- Browse daftar game yang tersedia
- Melihat paket top-up dengan harga
- Membeli top-up dengan akun game
- Input kode promo (opsional) untuk diskon
- Melihat riwayat transaksi
- Manajemen profil dan pengaturan

### Untuk Admin
- Panel admin terpisah dengan autentikasi khusus
- Dashboard dengan statistik games, top-up, dan transaksi
- Manajemen katalog games dan paket top-up
- Manajemen kode promo/voucher
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
- `GET /admin/promocodes` - Manajemen kode promo

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
- id, user_id, game_id, topup_id, promo_code_id, promo_code, amount, original_price, discount, price, status, game_account, created_at, updated_at

### Promo Codes
- id, code, type (percent/fixed), value, min_purchase, max_discount, starts_at, ends_at, usage_limit, used_count, is_active, created_at, updated_at

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
