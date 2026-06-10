# Aplikasi Blog - Sistem Manajemen Konten (CMS)

## Informasi Mahasiswa

| | |
|---|---|
| **Nama Lengkap** | [ISI NAMA LENGKAP KAMU] |
| **NIM** | [ISI NIM KAMU] |
| **Mata Kuliah** | Pemrograman Web |
| **Semester** | Genap 2025/2026 |

---

## Deskripsi Aplikasi

Aplikasi Blog berbasis Laravel yang terdiri dari dua bagian utama:

1. **CMS (Halaman Administrator)** — Sistem pengelolaan konten yang hanya dapat diakses oleh penulis yang sudah login. Fitur meliputi pengelolaan artikel, penulis, dan kategori artikel (CRUD lengkap).

2. **Halaman Publik Pengunjung** — Halaman yang dapat diakses siapa saja tanpa login, terdiri dari:
   - **Halaman Utama** — Menampilkan 5 artikel terbaru dengan widget kategori di sidebar untuk menyaring artikel berdasarkan kategori.
   - **Halaman Detail Artikel** — Menampilkan isi lengkap artikel beserta 5 artikel terkait dari kategori yang sama di sidebar.

---

## Langkah-Langkah Menjalankan Aplikasi Secara Lokal

### Prasyarat
- PHP >= 8.1
- Composer
- MySQL / MariaDB
- Node.js & NPM (opsional, untuk asset)

### Instalasi

**1. Clone repositori**
```bash
git clone https://github.com/[USERNAME]/aplikasi-blog-[NIM].git
cd aplikasi-blog-[NIM]
```

**2. Install dependensi PHP**
```bash
composer install
```

**3. Salin file environment**
```bash
cp .env.example .env
```

**4. Generate application key**
```bash
php artisan key:generate
```

**5. Konfigurasi database**

Edit file `.env` dan sesuaikan konfigurasi database:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_blog
DB_USERNAME=root
DB_PASSWORD=
```

**6. Buat database `db_blog`** di MySQL/phpMyAdmin terlebih dahulu, kemudian jalankan migrasi:
```bash
php artisan migrate
```

**7. Buat symbolic link untuk storage (foto & gambar artikel)**
```bash
php artisan storage:link
```

**8. Jalankan server lokal**
```bash
php artisan serve
```

Aplikasi dapat diakses di: `http://localhost:8000`

---

## Akses Aplikasi

| Halaman | URL |
|---|---|
| Halaman Utama Pengunjung | `http://localhost:8000/` |
| Detail Artikel | `http://localhost:8000/artikel/{id}` |
| Login CMS | `http://localhost:8000/login` |
| Dashboard CMS | `http://localhost:8000/dashboard` |

---

## Video Demonstrasi YouTube

🎥 [ISI LINK VIDEO YOUTUBE KAMU DI SINI]

---

## Teknologi yang Digunakan

- **Framework**: Laravel 10/11
- **Database**: MySQL (db_blog)
- **Frontend**: Bootstrap 5, Blade Template Engine
- **Storage**: Laravel Storage (public disk)
