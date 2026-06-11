# Profile RSUP

Sistem Informasi Web Profil untuk Rumah Sakit Umum Pusat (RSUP) yang dibangun menggunakan Framework **Laravel 11**. Aplikasi ini berfungsi sebagai portal informasi utama rumah sakit yang terintegrasi langsung dengan sistem manajemen rumah sakit (SIMRS) untuk menampilkan jadwal dokter dan harga tindakan secara *real-time*.

## 🚀 Fitur Utama

### 1. Portal Informasi Publik
- **Jadwal Dokter Real-time**: Menampilkan jadwal praktek dokter yang diambil secara dinamis dari database SIMRS (`estes`).
- **Berita & Artikel**: Manajemen publikasi berita kesehatan dan informasi rumah sakit.
- **Promo & Layanan**: Menampilkan informasi promo atau paket layanan kesehatan yang sedang berlangsung.
- **Harga Tindakan**: Menampilkan estimasi biaya tindakan medis yang terintegrasi.
- **Integrasi Chatbot**: Layanan asisten virtual interaktif untuk membantu pasien mendapatkan informasi.

### 2. Halaman Administrator
Aplikasi dilengkapi dengan panel admin (`/admin`) yang memiliki fitur:
- **Dashboard**: Menampilkan statistik ringkas seperti total dokter yang aktif.
- **Manajemen Dokter (Hide/Show)**: Mengatur visibilitas dokter tertentu di halaman publik (sinkronisasi data tetap berjalan).
- **Manajemen Berita (News)**: Mengelola artikel, gambar, dan konten berita.
- **Manajemen Promo**: Menambah, mengedit, dan menghapus banner promo.
- **Manajemen Slider/Slides**: Mengelola banner *slideshow* yang tampil di halaman utama beranda.
- **Manajemen Pengguna (Users)**: Menambahkan akun admin atau staf untuk mengelola sistem.

## 🛠 Teknologi yang Digunakan
- **Framework**: Laravel 11 (PHP ^8.3)
- **Database**: MySQL/MariaDB (Mendukung multi-koneksi: `default` dan `estes`)
- **Frontend**: Blade Templating, TailwindCSS / Bootstrap.

## ⚙️ Persyaratan Sistem
Sebelum memulai instalasi, pastikan sistem Anda memenuhi persyaratan berikut:
- PHP >= 8.3
- Composer >= 2.0
- MySQL atau MariaDB
- Node.js & NPM (untuk kompilasi aset frontend)

## 📦 Instalasi & Konfigurasi

Ikuti langkah-langkah di bawah ini untuk menjalankan aplikasi secara lokal:

1. **Clone repositori ini (atau *copy* source code)**:
   ```bash
   git clone https://github.com/whtrianto/profile-rsup.git
   cd profile-rsup
   ```

2. **Install dependency PHP (Composer)**:
   ```bash
   composer install
   ```

3. **Install dependency JavaScript (NPM)**:
   ```bash
   npm install
   npm run build
   ```

4. **Konfigurasi file `.env`**:
   Salin file `.env.example` menjadi `.env`.
   ```bash
   cp .env.example .env
   ```
   Atur koneksi database utama Anda:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=profile_rsup
   DB_USERNAME=root
   DB_PASSWORD=
   ```
   *Catatan penting: Aplikasi ini membutuhkan koneksi database kedua bernama `estes` untuk sinkronisasi jadwal dokter. Pastikan koneksi tersebut juga dikonfigurasi dengan benar di `config/database.php` dan file `.env`.*

5. **Generate Application Key**:
   ```bash
   php artisan key:generate
   ```

6. **Jalankan Migrasi Database**:
   ```bash
   php artisan migrate
   ```
   *(Opsional) Jika terdapat seeder, Anda dapat menjalankannya dengan:* `php artisan db:seed`

7. **Buat Symlink Storage (Jika ada gambar)**:
   ```bash
   php artisan storage:link
   ```

8. **Jalankan Aplikasi Lokal**:
   ```bash
   php artisan serve
   ```
   Aplikasi dapat diakses melalui `http://127.0.0.1:8000`.

## 📂 Struktur Database Kustom
Sistem bergantung pada koneksi external (`estes`) dengan tabel-tabel penting berikut (dibaca saja / read-only):
- `pegawai`: Menyimpan data profil dokter.
- `bagian`: Menyimpan spesialisasi poli.
- `jadwal_dokter`: Menyimpan hari dan jam praktek.
- `pegawai_bagian`: Relasi antara pegawai dan poli.

## 🛡️ Autentikasi Admin
Panel administrator dilindungi oleh *middleware*. 
Untuk masuk, akses URL `/login` menggunakan akun pengguna yang memiliki akses admin.

## 👥 Kontributor
- Tim IT RSUP
