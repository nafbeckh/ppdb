# PPDB
Aplikasi Penerimaan Peserta Didik Baru berbasis web yang dibangun menggunakan <a href="https://laravel.com">Laravel</a>.


## Sistem Yang Dibutuhkan
- PHP ^8.1
- Composer
- Midtrans
- ngrok
- Database Relasional

## Cara Instalasi (Dev)

1. Clone project `https://github.com/nafbeckh/ppdb.git` 
2. Masuk ke direktori project `cd ppdb` 
3. Install semua dependensi `composer update` 
4. Copy file .env `cp .env.example .env`
5. Generate key dengan `php artisan key:generate`
6. Konfigurasi database di file `.env`
7. Migrasi database `php artisan migrate --seed`
8. Copy assets AdminLTE ke public `php artisan vendor:publish --tag=adminlte`
9. Jalankan server `php artisan serv`
10. Jalankan server dengan ngrok `ngrok http 8000` atau `ngrok http http://127.0.0.1:8000`
11. Konfigurasi <a href="https://midtrans.com">Midtrans</a> lalu sesuaikan dengan project ini.

Note: ngrok berfungsi untuk mengubah URL localhost agar dapat diakses oleh midtrans ketika status pembayaran berhasil. Tambahkan endpoint `/api/midtrans-callback`.
