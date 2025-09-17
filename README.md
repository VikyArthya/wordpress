# Proyek WordPress - Manajemen Event

Sebuah proyek WordPress yang telah dikonfigurasi untuk mendemonstrasikan fitur manajemen event kustom. Proyek ini mencakup tema, plugin, dan database yang sudah terisi konten.

---

## ## Prasyarat

- Lingkungan server lokal seperti **Laragon** atau **XAMPP** sudah terinstal dan berjalan (Service Apache & MySQL aktif).

---

## ## Instruksi Instalasi

Untuk menjalankan proyek ini, ikuti langkah-langkah berikut:

1.  **Clone Repository**
    Buka terminal atau Git Bash di direktori kerja Anda (misalnya `C:/laragon/www/` atau `C:/xampp/htdocs/`) dan jalankan perintah berikut:

    ```bash
    git clone [https://github.com/VikyArthya/wordpress.git](https://github.com/VikyArthya/wordpress.git)
    ```

2.  **Impor Database**

    - Buka **phpMyAdmin** dari panel kontrol server lokal Anda.
    - Buat database baru dengan nama **`testalenta`**.
    - Pilih database `testalenta` yang baru dibuat, lalu klik tab **Impor**.
    - Klik "Choose File" dan unggah file **`testalenta.sql`** yang tersedia di dalam folder repository ini.
    - Klik tombol **Go / Kirim** di bagian bawah untuk memulai proses impor.

3.  **Konfigurasi Database (Jika Perlu)**
    - Buka file **`wp-config.php`** yang ada di dalam folder `wordpress`.
    - Pastikan detail koneksi database sudah sesuai dengan pengaturan lokal Anda. Pengaturan default biasanya seperti ini:
    ```php
    define( 'DB_NAME', 'testalenta' );
    define( 'DB_USER', 'root' );
    define( 'DB_PASSWORD', '' );
    ```

---

## ## Menjalankan Proyek

Setelah instalasi selesai, Anda bisa langsung mengakses proyek.

- **Buka Situs**: Kunjungi URL `http://localhost/wordpress` di browser Anda.

- **Login Admin**: Untuk masuk ke dashboard, kunjungi `http://localhost/wordpress/wp-admin` dan gunakan kredensial berikut:
  - **Username**: `admin`
  - **Password**: `admin`

Sistem akan langsung berjalan tanpa error. 👍
