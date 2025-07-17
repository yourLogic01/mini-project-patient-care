# 🚑 Mini Project - patien-care.

Proyek mini berbasis Laravel untuk mengelola proses pendaftaran pasien rawat jalan di rumah sakit. Fitur meliputi CRUD data pasien, pendaftaran kunjungan baru, dan tampilan riwayat kunjungan.

---

## 🛠️ Teknologi

-   Laravel (versi 10)
-   Blade Template Engine
-   Bootstrap 5
-   Trix Editor
-   MySQL

---

## ⚙️ Cara Setup Project (Local Development)

1. **Clone repository**

```bash
git clone https://github.com/yourLogic01/mini-project-patient-care
cd nama-project
```

2. **Install dependency**

```bash
composer install
```

3. **Copy file `.env`**

```bash
cp .env.example .env
```

4. **Atur koneksi database di `.env`**

```
DB_DATABASE=your_database
DB_USERNAME=your_user
DB_PASSWORD=your_password
```

5. **Generate app key**

```bash
php artisan key:generate
```

6. **Migrate database**

```bash
php artisan migrate
```

7. **Jalankan aplikasi**

```bash
php artisan serve
```

Aplikasi dapat diakses melalui: `http://localhost:8000`

---

## 🗂️ Struktur Folder Custom

Project mengikuti struktur default Laravel.

Perubahan di Struktur `resources/views`:

-   📂 `views`
    -   📂 `histories` — page histori daftar kunjungan
        -   `index.blade.php`
        -   `show.blade.php`
    -   📂 `layouts` — template utama
        -   `main.blade.php`
    -   📂 `partials` — navigasi
        -   `navbar.blade.php`
    -   📂 `patients` — CRUD pasien
        -   `index.blade.php`
        -   `create.blade.php`
        -   `edit.blade.php`
    -   📂 `visits` — page pendaftaran kunjungan pasien
        -   `create.blade.php`
    -   `home.blade.php`

Struktur folder tambahan untuk documentation API

-   📂 `docs`
    -   `API-docs.md`

---

## Fitur yang Tersedia

### 📋 CRUD Data Pasien

-   Tambah, edit, hapus, dan lihat daftar pasien
-   Search nama dan nik feature
-   Validasi menggunakan Laravel Form Request

### 📝 Pendaftaran Kunjungan Rawat Jalan

-   Pilih pasien dari dropdown
-   Pilih poli (departemen) dan dokter dari dropdown
-   Input tanggal kunjungan dan keluhan

### 📄 Riwayat Kunjungan

-   Pilih pasien untuk melihat riwayat kunjungan
-   Tabel menampilkan tanggal, poli, dokter, keluhan, dan tombol `Lihat Detail`
-   Halaman detail menampilkan informasi lengkap
