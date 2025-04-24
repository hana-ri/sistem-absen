# Sistem Absensi PAUD Faqih Usman

Sistem absensi digital berbasis web dan perangkat IoT untuk PAUD Faqih Usman. Aplikasi ini dikembangkan sebagai bagian dari tugas mata kuliah Proyek Konsultasi untuk menyelesaikan masalah nyata di lapangan.

![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white)
![Arduino](https://img.shields.io/badge/Arduino-00979D?style=for-the-badge&logo=Arduino&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-005C84?style=for-the-badge&logo=mysql&logoColor=white)

## Tentang Proyek

Sistem ini terdiri dari dua komponen utama:

1. **Website (Repository Ini)**: Aplikasi web berbasis Laravel untuk manajemen data dan tampilan informasi absensi.
2. **Perangkat Keras**: Arduino dan NodeMCU sebagai perangkat untuk melakukan pembacaan absensi menggunakan teknologi RFID untuk kartu siswa dan KTP untuk tenaga pendidik.

## Fitur Utama

### Manajemen Absensi
- **Sistem Absen Guru**: Monitoring dan pencatatan kehadiran tenaga pendidik menggunakan KTP
- **Sistem Absen Murid**: Monitoring dan pencatatan kehadiran siswa menggunakan kartu RFID
- **Log Absensi**: Pencatatan waktu masuk dan keluar secara detail
- **Laporan Absensi**: Kemampuan ekspor data absensi ke Excel

### Manajemen Data
- **Data Siswa**: Pengelolaan informasi lengkap siswa 
- **Data Tenaga Pendidik**: Pengelolaan informasi guru dan staf
- **Manajemen Kartu**: Pendaftaran dan manajemen kartu RFID
- **Manajemen Perangkat**: Konfigurasi perangkat Arduino dan NodeMCU

### Fitur Admin
- Multi-level pengguna (Admin, Staff, User)
- Dashboard untuk monitoring absensi harian
- Manajemen pengguna sistem

## Teknologi yang Digunakan

### Backend
- Laravel Framework
- PHP
- MySQL Database
- Laravel Excel untuk ekspor data

### Frontend
- Blade Template Engine
- SB Admin 2 Template
- Bootstrap CSS

### IoT & Hardware
- Arduino
- NodeMCU
- Modul RFID (untuk membaca kartu siswa)
- Modul NFC (untuk membaca KTP)

## Instalasi

### Persyaratan Sistem
- PHP >= 7.3
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- MySQL Server

### Langkah Instalasi Website

1. Clone repository ini
```bash
git clone https://github.com/username/sistem-absen.git
cd sistem-absen
```

2. Install dependensi PHP menggunakan Composer
```bash
composer install
```

3. Copy file .env.example menjadi .env
```bash
cp .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Konfigurasi database di file .env
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=sistem_absen
DB_USERNAME=root
DB_PASSWORD=
```

6. Migrasi dan seed database
```bash
php artisan migrate --seed
```

7. Jalankan server lokal
```bash
php artisan serve
```

### Konfigurasi Perangkat

Untuk konfigurasi Arduino dan NodeMCU, silakan merujuk ke repository perangkat keras yang berjalan sebagai komplemen dari sistem ini.

## Struktur Basis Data

Sistem ini memiliki beberapa tabel utama:
- `users`: Pengguna sistem web
- `user_infos`: Informasi lengkap siswa dan tenaga pendidik
- `user_cards`: Data kartu RFID yang terdaftar
- `user_logs`: Catatan absensi masuk dan keluar
- `devices`: Informasi perangkat Arduino/NodeMCU yang terhubung

## Alur Kerja Sistem

1. Perangkat Arduino/NodeMCU membaca kartu RFID siswa atau KTP guru
2. Data dikirim ke server web melalui API
3. Sistem memverifikasi identitas pengguna dan mencatat waktu absensi
4. Data absensi dapat diakses melalui dashboard web
