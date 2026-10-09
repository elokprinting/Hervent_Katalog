# Hervent ERP

Hervent ERP adalah aplikasi Laravel untuk mendukung katalog publik Hervent dan fondasi proses operasional ERP. Repository ini memisahkan area publik dari domain operasional, role, permission, unit bisnis, dan order.

## Teknologi

- PHP 8.3+
- Laravel 13
- Laravel Eloquent ORM
- MySQL/MariaDB untuk lingkungan utama
- SQLite untuk pengujian lokal
- Vite untuk asset frontend

## Arsitektur repository

```text
app/
├── Http/
│   ├── Controllers/       Controller website publik dan area produksi
│   └── Middleware/        Bahasa, security header, dan proteksi area produksi
├── Models/                Model katalog, blog, user, ERP, role, permission, dan order
├── Policies/              Authorization berbasis permission dan unit bisnis
└── Providers/             Registrasi policy dan konfigurasi aplikasi

database/
├── migrations/            Struktur database dan perubahan skema bertahap
├── seeders/               Data awal katalog, blog, unit bisnis, role, dan permission
└── factories/             Factory untuk kebutuhan pengujian

resources/
├── views/                 Blade templates website dan area produksi
├── css/                   Styling aplikasi
└── js/                    Entry point JavaScript/Vite

routes/
└── web.php                Route website publik, blog, dan area produksi

tests/
├── Feature/               Pengujian alur dan authorization
└── Unit/                  Pengujian unit
```

## Domain ERP Tahap 1

Fondasi ERP berada pada migration `2026_10_09_000001_create_erp_foundation_tables.php` dan terdiri dari:

- `business_units`: HerVent, Gudang Flashdisk, dan Raya Pro.
- `departments`: Sales, Produksi, QC, Logistik, dan After Sales.
- `roles`: Admin Sistem serta role operasional.
- `permissions`: Aksi granular pada order dan proses operasional.
- `role_permissions`: Relasi role dengan permission.
- `role_assignments`: Relasi pengguna dengan role dan scope unit bisnis.
- `orders`: Order yang wajib terikat ke satu unit bisnis.

### Aturan scope akses

Setiap role operasional wajib memiliki `business_unit_id`. Dengan begitu, seorang pengguna dapat memiliki role yang sama atau berbeda pada beberapa unit bisnis, tetapi hanya dapat melihat dan menjalankan aksi pada unit yang ditugaskan.

Role Admin Sistem bersifat global. Admin dapat digabungkan dengan role operasional dan memiliki akses lintas unit bisnis.

Daftar order dapat dibatasi dengan query scope berikut:

```php
Order::visibleTo($user)->latest()->get();
```

Authorization untuk aksi order didaftarkan melalui `OrderPolicy`, termasuk:

- melihat detail order;
- membuat, mengubah, mengirim, dan merevisi quotation;
- closing dan cancel order;
- produksi, material, dan rework;
- pemeriksaan QC;
- pengiriman dan after sales;
- pengelolaan dan penilaian komplain.

Semua role operasional awal memiliki permission `order.view`, sehingga dapat melihat detail order termasuk harga dan quotation selama order berada pada unit bisnis yang menjadi scope-nya.

## Instalasi lokal

Salin konfigurasi environment dan isi kredensial database sesuai mesin lokal:

```bash
copy .env.example .env
php artisan key:generate
composer install
npm install
php artisan migrate --seed
npm run build
```

Untuk pengembangan frontend, jalankan:

```bash
npm run dev
```

Jalankan server Laravel dengan:

```bash
php artisan serve
```

## Seeder ERP

`DatabaseSeeder` memanggil `ErpFoundationSeeder`, sehingga data awal ERP dibuat bersama data katalog dan blog:

```bash
php artisan db:seed --class=ErpFoundationSeeder
```

Seeder tidak membuat akun pengguna operasional secara otomatis. Assignment role harus dibuat setelah akun pengguna dibuat dan unit bisnis yang sesuai sudah ditentukan.

## Pengujian

Jalankan test suite dengan:

```bash
php artisan test
```

Test ERP memverifikasi:

- isolasi akses order antar-unit bisnis;
- kombinasi beberapa role untuk satu pengguna;
- akses global Admin Sistem;
- pembatasan role operasional tanpa unit bisnis;
- pembatasan query daftar order berdasarkan scope pengguna.

## Area produksi yang sudah ada

Area `/production` memiliki login berbasis password hash dan proteksi middleware untuk editor blog serta katalog. Perubahan ERP pada tahap ini tidak mengubah route website publik maupun alur area produksi yang sudah tersedia.

## Keamanan konfigurasi

Jangan commit file `.env`, password, token, atau credential lain. Gunakan `.env.example` sebagai template konfigurasi dan simpan secret hanya pada environment deployment.

## Status implementasi

Fondasi Struktur Organisasi, Akun & Role, dan Hak Akses Order Tahap 1 sudah tersedia. Workflow lanjutan seperti lead, quotation versioning, approval desain, produksi, QC, pengiriman, dan after sales dapat dibangun di atas model dan policy ini pada tahap berikutnya.
