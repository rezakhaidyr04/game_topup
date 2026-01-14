# Game TopUp - Platform Pembelian Top-Up Game

Aplikasi web untuk platform penjualan top-up game online yang dibangun dengan Laravel dan Blade Templating Engine.

---

## 📖 Penjelasan Lengkap Kode

### 🏗️ Arsitektur Aplikasi

Aplikasi ini menggunakan arsitektur **MVC (Model-View-Controller)** dengan tambahan **Service Layer** untuk memisahkan business logic dari controller.

```
┌─────────────┐     ┌──────────────┐     ┌─────────────┐     ┌──────────┐
│   Request   │ ──► │  Controller  │ ──► │   Service   │ ──► │  Model   │
└─────────────┘     └──────────────┘     └─────────────┘     └──────────┘
                           │                                       │
                           ▼                                       ▼
                    ┌──────────────┐                        ┌──────────┐
                    │    View      │                        │ Database │
                    └──────────────┘                        └──────────┘
```

---

### 📂 Struktur Folder & Penjelasan File

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php      → Mengatur login, register, logout
│   │   ├── TopUpController.php     → Mengatur proses top-up game
│   │   ├── HomeController.php      → Mengatur halaman dashboard user
│   │   └── Admin/                  → Controller khusus admin
│   │       ├── DashboardController.php
│   │       ├── TopUpController.php
│   │       └── PromoCodeController.php
│   │
│   ├── Requests/
│   │   └── PurchaseTopUpRequest.php → Validasi input pembelian
│   │
│   └── Middleware/
│       └── AdminMiddleware.php     → Cek apakah user adalah admin
│
├── Models/
│   ├── User.php          → Model pengguna (dengan saldo)
│   ├── Game.php          → Model game (ML, PUBG, FF, dll)
│   ├── TopUp.php         → Model paket top-up (Diamond, UC, dll)
│   ├── Transaction.php   → Model transaksi pembelian
│   └── PromoCode.php     → Model kode promo/voucher
│
├── Services/
│   └── TopUpService.php  → Business logic pembelian top-up
│
└── Policies/
    └── TransactionPolicy.php → Authorization (siapa boleh lihat transaksi)
```

---

### 🔍 Penjelasan Model (Database)

#### 1️⃣ **User.php** - Model Pengguna
```php
// Atribut yang bisa diisi
protected $fillable = [
    'name',      // Nama pengguna
    'email',     // Email (unik)
    'password',  // Password (di-hash otomatis)
    'balance',   // Saldo pengguna (untuk beli top-up)
    'role',      // Role: 'user' atau 'admin'
];

// Method untuk menambah saldo
public function addBalance(float $amount): bool

// Method untuk mengurangi saldo
public function deductBalance(float $amount): bool

// Method untuk cek saldo cukup
public function hasSufficientBalance(float $amount): bool
```

#### 2️⃣ **Game.php** - Model Game
```php
// Atribut
protected $fillable = [
    'name',          // Nama game (Mobile Legends, PUBG, dll)
    'icon',          // Path gambar icon
    'currency_type', // Tipe mata uang (Diamond, UC, CP, dll)
    'min_price',     // Harga minimum paket
    'max_price',     // Harga maksimum paket
];

// Relasi: 1 Game punya banyak TopUp
public function topups() {
    return $this->hasMany(TopUp::class);
}
```

#### 3️⃣ **TopUp.php** - Model Paket Top-Up
```php
// Atribut
protected $fillable = [
    'game_id',  // ID game (foreign key)
    'name',     // Nama paket (50 Diamond, 100 UC, dll)
    'amount',   // Jumlah yang didapat
    'price',    // Harga dalam Rupiah
];

// Relasi: TopUp milik 1 Game
public function game() {
    return $this->belongsTo(Game::class);
}
```

#### 4️⃣ **Transaction.php** - Model Transaksi
```php
// Status transaksi
const STATUS_PENDING = 'pending';   // Menunggu
const STATUS_SUCCESS = 'success';   // Berhasil
const STATUS_FAILED = 'failed';     // Gagal

// Atribut
protected $fillable = [
    'user_id',        // ID user yang beli
    'game_id',        // ID game yang dibeli
    'topup_id',       // ID paket top-up
    'promo_code_id',  // ID promo (jika pakai)
    'promo_code',     // Kode promo yang dipakai
    'amount',         // Jumlah item yang dibeli
    'original_price', // Harga asli sebelum diskon
    'discount',       // Jumlah diskon
    'price',          // Harga akhir setelah diskon
    'status',         // Status transaksi
    'game_account',   // ID akun game pembeli
];
```

#### 5️⃣ **PromoCode.php** - Model Kode Promo
```php
// Tipe diskon
const TYPE_PERCENT = 'percent';  // Diskon persentase (10%, 20%, dll)
const TYPE_FIXED = 'fixed';      // Diskon nominal (Rp 5.000, Rp 10.000, dll)

// Atribut
protected $fillable = [
    'code',          // Kode promo (HEMAT10, DISKON50K, dll)
    'type',          // Tipe: 'percent' atau 'fixed'
    'value',         // Nilai diskon (10 = 10% atau 10000 = Rp 10.000)
    'min_purchase',  // Minimal pembelian untuk pakai promo
    'max_discount',  // Maksimal diskon (untuk tipe percent)
    'starts_at',     // Tanggal mulai berlaku
    'ends_at',       // Tanggal berakhir
    'usage_limit',   // Batas penggunaan
    'used_count',    // Jumlah sudah dipakai
    'is_active',     // Status aktif/nonaktif
];
```

---

### ⚙️ Penjelasan Service Layer

#### **TopUpService.php** - Logic Pembelian

```php
class TopUpService
{
    /**
     * Proses pembelian top-up dengan langkah:
     * 1. Validasi game ada
     * 2. Validasi paket top-up ada
     * 3. Validasi & hitung promo (jika ada)
     * 4. Cek saldo user cukup
     * 5. Kurangi saldo user
     * 6. Buat record transaksi
     * 7. Return transaksi
     */
    public function processPurchase(array $data): Transaction
    {
        // Gunakan DB Transaction untuk keamanan
        return DB::transaction(function () use ($data) {
            
            // 1. Ambil data game
            $game = Game::findOrFail($data['game_id']);
            
            // 2. Ambil data paket top-up
            $topup = TopUp::where('id', $data['topup_id'])
                ->where('game_id', $game->id)
                ->firstOrFail();
            
            // 3. Hitung harga
            $originalPrice = $topup->price;
            $discount = 0;
            
            // 4. Jika ada promo code
            if (!empty($data['promo_code'])) {
                // Validasi promo:
                // - Apakah aktif?
                // - Apakah dalam periode berlaku?
                // - Apakah minimal pembelian terpenuhi?
                // - Apakah kuota masih ada?
                
                // Hitung diskon berdasarkan tipe
                if ($promo->type === 'percent') {
                    $discount = $originalPrice * $promo->value / 100;
                } else {
                    $discount = $promo->value;
                }
                
                // Batasi diskon maksimal
                if ($promo->max_discount) {
                    $discount = min($discount, $promo->max_discount);
                }
            }
            
            // 5. Hitung harga akhir
            $finalPrice = $originalPrice - $discount;
            
            // 6. Cek & kurangi saldo
            $user->deductBalance($finalPrice);
            
            // 7. Buat transaksi
            return Transaction::create([...]);
        });
    }
}
```

**Kenapa pakai `DB::transaction()`?**
- Jika ada error di tengah proses, semua perubahan dibatalkan
- Mencegah data tidak konsisten (misal: saldo terpotong tapi transaksi gagal)

---

### 🎮 Penjelasan Controller

#### **TopUpController.php**

```php
class TopUpController extends Controller
{
    // Dependency Injection - Service diinject otomatis
    private TopUpService $topUpService;

    public function __construct(TopUpService $topUpService)
    {
        $this->topUpService = $topUpService;
    }

    // GET /topup - Tampilkan daftar game
    public function index()
    {
        $games = Game::with('topups')->take(6)->get();
        return view('topup.index', compact('games'));
    }

    // GET /topup/game/{game} - Detail game & paket
    public function show(Game $game)
    {
        $topups = $game->topups;
        return view('topup.show', compact('game', 'topups'));
    }

    // POST /topup/purchase - Proses pembelian
    public function purchase(PurchaseTopUpRequest $request)
    {
        try {
            $transaction = $this->topUpService->processPurchase(
                $request->validated()
            );
            return redirect()->route('topup.receipt', $transaction);
        } catch (Exception $e) {
            return back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    // GET /topup/receipt/{transaction} - Struk transaksi
    public function receipt(Transaction $transaction)
    {
        // Cek authorization - hanya pemilik yang boleh lihat
        $this->authorize('view', $transaction);
        return view('topup.receipt', compact('transaction'));
    }
}
```

---

### ✅ Penjelasan Request Validation

#### **PurchaseTopUpRequest.php**

```php
class PurchaseTopUpRequest extends FormRequest
{
    // Aturan validasi input
    public function rules(): array
    {
        return [
            'game_id' => 'required|exists:games,id',
            'topup_id' => 'required|exists:top_ups,id',
            'game_account' => 'required|string|max:100',
            'promo_code' => 'nullable|string|max:50',
        ];
    }

    // Pesan error custom (bahasa Indonesia)
    public function messages(): array
    {
        return [
            'game_id.required' => 'Game harus dipilih',
            'topup_id.required' => 'Paket top-up harus dipilih',
            'game_account.required' => 'ID akun game harus diisi',
        ];
    }
}
```

---

### 🔐 Penjelasan Authorization Policy

#### **TransactionPolicy.php**

```php
class TransactionPolicy
{
    // Cek apakah user boleh melihat transaksi
    public function view(User $user, Transaction $transaction): bool
    {
        // Hanya pemilik transaksi yang boleh lihat
        return $user->id === $transaction->user_id;
    }
}
```

**Cara pakai di Controller:**
```php
$this->authorize('view', $transaction);
// Jika bukan pemilik, akan return 403 Forbidden
```

---

### 🗄️ Penjelasan Database Migration

#### **create_transactions_table.php**

```php
Schema::create('transactions', function (Blueprint $table) {
    $table->id();                                    // Primary key
    $table->foreignId('user_id')->constrained();    // Foreign key ke users
    $table->foreignId('game_id')->constrained();    // Foreign key ke games
    $table->foreignId('topup_id')->constrained();   // Foreign key ke top_ups
    $table->foreignId('promo_code_id')->nullable(); // FK ke promo_codes (opsional)
    $table->string('promo_code')->nullable();       // Kode promo yang dipakai
    $table->integer('amount');                      // Jumlah item
    $table->integer('original_price');              // Harga asli
    $table->integer('discount')->default(0);        // Diskon
    $table->integer('price');                       // Harga akhir
    $table->string('status')->default('pending');   // Status transaksi
    $table->string('game_account');                 // ID akun game
    $table->timestamps();                           // created_at, updated_at
});
```

---

### 🌐 Penjelasan Routes

#### **routes/web.php**

```php
// ==================== PUBLIC ROUTES ====================
Route::get('/', [LandingController::class, 'index']);

// ==================== AUTH ROUTES ====================
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister']);
    Route::post('/register', [AuthController::class, 'register']);
});

// ==================== USER ROUTES (HARUS LOGIN) ====================
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/home', [HomeController::class, 'index']);
    
    // Top-Up Routes
    Route::get('/topup', [TopUpController::class, 'index']);
    Route::get('/topup/game/{game}', [TopUpController::class, 'show']);
    Route::post('/topup/purchase', [TopUpController::class, 'purchase']);
    Route::get('/topup/receipt/{transaction}', [TopUpController::class, 'receipt']);
});

// ==================== ADMIN ROUTES ====================
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/', [AdminDashboardController::class, 'index']);
    Route::resource('topups', AdminTopUpController::class);
    Route::resource('promocodes', AdminPromoCodeController::class);
});
```

---

### 🔄 Alur Kerja Aplikasi

#### **Alur Pembelian Top-Up:**

```
┌──────────────────────────────────────────────────────────────────────────┐
│                         ALUR PEMBELIAN TOP-UP                            │
└──────────────────────────────────────────────────────────────────────────┘

1. USER BUKA HALAMAN TOP-UP
   └─► GET /topup
       └─► TopUpController@index()
           └─► Tampilkan daftar game

2. USER PILIH GAME
   └─► GET /topup/game/1 (Mobile Legends)
       └─► TopUpController@show()
           └─► Tampilkan paket top-up

3. USER ISI FORM PEMBELIAN
   ┌─────────────────────────────────────┐
   │  Game: Mobile Legends               │
   │  Paket: 100 Diamond - Rp 25.000     │
   │  ID Akun: 123456789                 │
   │  Promo: HEMAT10 (opsional)          │
   │                                     │
   │  [BELI SEKARANG]                    │
   └─────────────────────────────────────┘

4. SUBMIT FORM
   └─► POST /topup/purchase
       └─► PurchaseTopUpRequest (validasi)
           └─► TopUpController@purchase()
               └─► TopUpService@processPurchase()
                   │
                   ├─► Validasi game & paket
                   ├─► Validasi promo code (jika ada)
                   ├─► Hitung diskon
                   ├─► Cek saldo user
                   ├─► Kurangi saldo
                   └─► Buat transaksi

5. TAMPILKAN STRUK
   └─► GET /topup/receipt/1
       └─► TopUpController@receipt()
           └─► Tampilkan detail transaksi

   ┌─────────────────────────────────────┐
   │  ✅ TRANSAKSI BERHASIL              │
   │                                     │
   │  No. Transaksi: TXN-001             │
   │  Game: Mobile Legends               │
   │  Paket: 100 Diamond                 │
   │  ID Akun: 123456789                 │
   │                                     │
   │  Harga Asli: Rp 25.000              │
   │  Diskon (HEMAT10): -Rp 2.500        │
   │  ─────────────────────              │
   │  Total Bayar: Rp 22.500             │
   └─────────────────────────────────────┘
```

---

### 💡 Konsep Penting dalam Kode

#### 1️⃣ **Eloquent ORM**
```php
// Tanpa Eloquent (SQL mentah):
$result = DB::select('SELECT * FROM games WHERE id = ?', [1]);

// Dengan Eloquent (lebih mudah):
$game = Game::find(1);
$game = Game::where('name', 'Mobile Legends')->first();
```

#### 2️⃣ **Eager Loading** (Mencegah N+1 Query Problem)
```php
// ❌ BURUK - Query banyak (N+1 problem)
$games = Game::all();
foreach ($games as $game) {
    echo $game->topups->count(); // Query per game!
}

// ✅ BAIK - Query sedikit (eager loading)
$games = Game::with('topups')->get();
foreach ($games as $game) {
    echo $game->topups->count(); // Sudah di-load!
}
```

#### 3️⃣ **Mass Assignment Protection**
```php
// Di Model, tentukan field yang boleh diisi:
protected $fillable = ['name', 'email', 'password'];

// Field lain tidak bisa diisi mass assignment
// Mencegah hacker inject field seperti 'role' atau 'balance'
```

#### 4️⃣ **Database Transaction**
```php
DB::transaction(function () {
    // Semua query di sini atomic
    // Jika ada error, semuanya rollback
    $user->deductBalance(100000);
    Transaction::create([...]);
});
```

---

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
