# Find It: Lost & Found UNIMED

Find It: Lost & Found UNIMED adalah aplikasi berbasis web untuk membantu sivitas akademika Universitas Negeri Medan (UNIMED) melaporkan dan mencari informasi barang hilang maupun barang yang ditemukan di lingkungan kampus.

## Fitur Utama

* Registrasi, login, dan logout pengguna.
* Pelaporan barang hilang dan barang ditemukan beserta informasi barang dan foto.
* Pencarian dan penyaringan laporan berdasarkan informasi yang tersedia.
* Halaman detail laporan barang.
* Kontak WhatsApp untuk membantu komunikasi antara pengguna dan pelapor.
* Pengelolaan laporan milik pengguna.
* Penghapusan akun beserta laporan milik pengguna.
* Dashboard admin untuk mengelola laporan dan akun pengguna.
* Pengaturan peran pengguna oleh admin.

## Teknologi yang Digunakan

* **Back-end:** Laravel dan PHP.
* **Database:** MySQL.
* **Front-end:** HTML, CSS, dan JavaScript.
* **Dependency Management:** Composer dan npm.

## Persyaratan Sistem

Pastikan perangkat telah memiliki:

* PHP dengan versi yang sesuai dengan kebutuhan proyek.
* Composer.
* MySQL dan layanan database yang berjalan.
* Node.js dan npm.
* Git.

## Cara Menjalankan Proyek

1. Clone repository:

   ```bash
   git clone https://github.com/annisanurulhayatI/find-it-lost-found-unimed.git
   ```

2. Masuk ke direktori proyek:

   ```bash
   cd find-it-lost-found
   ```

3. Instal dependensi PHP:

   ```bash
   composer install
   ```

4. Salin file konfigurasi lingkungan:

   ```bash
   copy .env.example .env
   ```

5. Buat application key:

   ```bash
   php artisan key:generate
   ```

6. Buat database MySQL untuk proyek, kemudian sesuaikan konfigurasi database pada file `.env`.

7. Jalankan migrasi database:

   ```bash
   php artisan migrate
   ```

8. Instal dependensi front-end:

   ```bash
   npm install
   ```

9. Jalankan proses build front-end:

   ```bash
   npm run build
   ```

10. Jalankan aplikasi:

    ```bash
    php artisan serve
    ```

11. Buka alamat lokal yang ditampilkan oleh terminal pada browser.

## Catatan

* File `.env` tidak disertakan dalam repository karena berisi konfigurasi lingkungan dan informasi sensitif.
* Sesuaikan konfigurasi database sebelum menjalankan migrasi.
* Jika aplikasi membutuhkan penyimpanan foto melalui Laravel Storage, jalankan `php artisan storage:link` apabila symbolic link tersebut belum tersedia.
* Akun admin harus disiapkan melalui mekanisme pengelolaan akun yang digunakan oleh proyek.

## Tujuan Proyek

Proyek ini dikembangkan sebagai bagian dari tugas perkuliahan untuk menerapkan pengembangan aplikasi web menggunakan Laravel serta membantu proses pencarian dan pelaporan barang hilang di lingkungan Universitas Negeri Medan.
