# Booking Futsal Fadil Arena

# Deskripsi
Booking Futsal Fadil Arena adalah aplikasi berbasis web yang dikembangkan menggunakan framework Laravel. Aplikasi ini digunakan untuk mengelola proses penyewaan lapangan futsal, mulai dari data pelanggan, data lapangan, pemesanan, hingga pembayaran.

# Fitur
- Dashboard
- Manajemen Data Customer
- Manajemen Data Lapangan
- Manajemen Booking
- Manajemen Pembayaran

# Teknologi yang Digunakan
- Laravel
- PHP
- MySQL
- Composer
- Node.js
- Bootstrap

# Cara Menjalankan Project

# 1. Clone Repository

```bash
git clone https://github.com/fadhilnajmi551-lab/uas_pemweb2_fadhil.git
```

# 2. Masuk ke Folder Project

```bash
cd uas_pemweb2_fadhil
```

# 3. Install Dependency

```bash
composer install
```

# 4. Install Frontend

```bash
npm install
```

# 5. Salin File Environment

```bash
copy .env.example .env
```

# 6. Generate Application Key

```bash
php artisan key:generate
```

# 7. Konfigurasi Database

Buat database MySQL dengan nama:

```
booking_futsal
```

Kemudian sesuaikan konfigurasi pada file `.env`.

# 8. Jalankan Aplikasi

```bash
php artisan serve
```

Kemudian buka browser:

```
http://127.0.0.1:8000
```

# Struktur Menu

- Dashboard
- Customer
- Lapangan
- Booking
- Pembayaran

# Catatan

Project ini dibuat untuk memenuhi tugas **UAS Mata Kuliah Pemrograman Web II**.


# Developer

**Nama:** Fadhil Najmi Syafarian

**Repository GitHub:** https://github.com/fadhilnajmi551-lab/uas_pemweb2_fadhil