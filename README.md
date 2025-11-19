# InventoryKu - Sistem Manajemen Inventaris Modern

![InventoryKu Banner](public/images/inventoryku_logo.png)

**InventoryKu** adalah aplikasi web manajemen inventaris (Inventory Management System) yang dirancang untuk membantu bisnis mengelola stok barang, pemasok (suppliers), dan kategori produk secara efisien. Aplikasi ini mencatat riwayat transaksi barang masuk (restock) dan barang keluar (penjualan/pemakaian) secara *real-time* dengan validasi stok yang ketat.

## 🚀 Fitur Utama

* **Dashboard Interaktif:** Ringkasan navigasi yang mudah.
* **Manajemen Produk (CRUD):**
    * Tambah produk dengan SKU unik.
    * Relasi otomatis ke Kategori dan Supplier.
    * Indikator stok visual (Warna merah jika stok habis).
* **Master Data:**
    * Manajemen Supplier & Kategori Produk.
* **Transaksi Stok (Core Logic):**
    * **Stock In (Barang Masuk):** Menambah stok otomatis dan mencatat riwayat.
    * **Stock Out (Barang Keluar):** Mengurangi stok dengan validasi (mencegah stok minus).
* **Riwayat Transaksi:** Log aktivitas lengkap dengan penanda warna (Hijau/Merah) untuk audit stok.
* **Keamanan:** Autentikasi pengguna (Login/Register) terintegrasi.

## 🛠️ Teknologi yang Digunakan

* **Framework:** [Laravel 10/11](https://laravel.com) (PHP Framework)
* **Database:** PostgreSQL
* **Frontend:** Blade Templates & Tailwind CSS
* **Authentication:** Laravel Breeze
* **Server Environment:** Apache/Nginx (via XAMPP/Laragon)

## 📸 Screenshots

**

## 📦 Cara Instalasi (Lokal)

1.  **Clone Repositori**
    ```bash
    git clone [https://github.com/username-anda/inventoryku.git](https://github.com/username-anda/inventoryku.git)
    cd inventoryku
    ```

2.  **Install Dependensi**
    ```bash
    composer install
    npm install
    ```

3.  **Setup Environment**
    * Duplikat file `.env.example` menjadi `.env`
    * Atur konfigurasi database di file `.env` (DB_DATABASE, DB_USERNAME, dll).

4.  **Generate Key & Migrasi Database**
    ```bash
    php artisan key:generate
    php artisan migrate
    ```

5.  **Jalankan Server**
    ```bash
    npm run dev
    php artisan serve
    ```

## 👨‍💻 Pengembang

Dibuat dengan ❤️ untuk Portofolio Web Development.