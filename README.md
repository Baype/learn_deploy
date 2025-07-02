# Laravel v12 Project

<p align="center">
  <a href="https://laravel.com" target="_blank">
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
  </a>
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

---

## Instalasi Aplikasi Laravel v12

Aplikasi ini menggunakan Laravel versi 12 dan membutuhkan PHP dengan versi yang kompatibel dengan Laravel 12.

Ikuti langkah-langkah berikut untuk menjalankan aplikasi ini secara lokal:

### 1. Clone atau Download Project

Clone repository ini menggunakan Git:

```
git clone https://github.com/Baype/competency_test_sipatex.git
```
atau download file ZIP lalu ekstrak ke folder yang diinginkan.

### 2. Masuk ke Direktori Project
Buka terminal dan masuk ke folder project:
```
cd nama-folder-project
```

### 3. Konfigurasi File .env
Salin file .env.example menjadi .env (jika belum ada file .env).
```
cp .env.example .env
```
Karena database yang digunakan adalah MySQL, pastikan konfigurasi database di file .env sudah diubah sesuai:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nama_database
DB_USERNAME=user_mysql_anda
DB_PASSWORD=password_mysql_anda
```
Jika sebelumnya menggunakan sqlite, pastikan bagian tersebut dinonaktifkan (comment out) dan gunakan konfigurasi mysql seperti di atas.

### 4. Membuat Database MySQL
Buat database MySQL baru dengan nama yang sesuai dengan DB_DATABASE di file .env. Contoh menggunakan command line:
```
mysql -u root -p
CREATE DATABASE nama_database;
EXIT;
```
### 5. Install Dependencies
Pastikan Anda sudah menginstall Composer dan Node.js / npm.
Install dependencies PHP:
```
composer install
```
Install dependencies frontend (TailwindCSS dan Vite):
```
npm install
```
### 6. Migrasi Database
Jalankan migrasi untuk membuat tabel-tabel database:
```
php artisan migrate
```
### 7. Seed Database
Isi database dengan data contoh untuk memudahkan pengisian data racikan obat:
```
php artisan db:seed --class=DatabaseSeeder
```
Seeder ini akan mengisi tabel user, pasien, obat, dan signa.

### 8. Jalankan Development Server
Untuk menjalankan backend Laravel dan frontend TailwindCSS secara bersamaan, jalankan perintah berikut:
```
npm run dev
```
Cukup menggunakan command diatas, maka server laravel dan tailwindcss akan berjalan secara bersama karena sudah digunakan library concurrently.

Atau bisa dijalankan terpisah menggunakan command
```
php artisan serve
```
### 9. Akses Aplikasi
Buka browser dan akses URL berikut:
```
http://localhost:8000
```
Aplikasi Laravel v12 untuk pengelolaan obat sudah siap digunakan.