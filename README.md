# E-Ticketing & Pengadaan Barang dengan CodeIgniter

## Deskripsi Proyek
Proyek ini adalah aplikasi web yang dikembangkan oleh kelompok java menggunakan framework CodeIgniter untuk menyediakan layanan e-ticketing dan pengadaan barang. Aplikasi ini dirancang untuk memudahkan pengguna dalam memesan tiket dan melakukan pengadaan barang dengan cara yang efisien dan mudah.

## Fitur Utama
1. **E-Ticketing:**
    - Pemesanan tiket secara online.
    - Informasi lengkap tentang acara, termasuk jadwal, lokasi, dan harga tiket.
    - Proses pembayaran yang aman dan nyaman.
2. **Pengadaan Barang:**
    - Pemesanan barang untuk kebutuhan bisnis atau acara.
    - Monitoring status pengadaan dari pemesanan hingga pengiriman.
    - Manajemen katalog barang dengan deskripsi dan harga.
3. **Autentikasi Pengguna:**
    - Sistem login dan registrasi pengguna.
    - Pengaturan profil pengguna dan manajemen kata sandi.
4. **Manajemen Admin:**
    - Manajemen pengguna dan peran (admin, pengguna biasa).
    - Pantauan aktivitas pengguna dan laporan penjualan/pengadaan.

## Instalasi
1. Clone repositori ini ke dalam direktori web server Anda.
   ```bash
   git clone https://github.com/fintisalsabila/stmideskFinal
   ```
2. Buat database dan atur konfigurasi database di file `application/config/database.php`.
3. Lakukan migrasi database untuk membuat tabel yang diperlukan.
   ```bash
   php index.php migrate
   ```
4. Atur konfigurasi email di file `application/config/email.php` jika ingin menggunakan fitur notifikasi.
5. Buka aplikasi melalui web browser dan lakukan registrasi untuk mendapatkan akses.

## Kontribusi
Jika Anda ingin berkontribusi pada pengembangan proyek ini, silakan buat *pull request* atau laporkan *issues* melalui GitHub.

## Lisensi
Proyek ini dilisensikan di bawah Lisensi MIT - lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.
