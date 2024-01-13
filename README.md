# E-Ticketing & Pengadaan Barang dengan CodeIgniter

## Deskripsi Proyek
Proyek ini adalah aplikasi web yang dikembangkan oleh kelompok java menggunakan framework CodeIgniter untuk menyediakan layanan e-ticketing dan pengadaan barang. Aplikasi ini dirancang untuk memudahkan pengguna dalam memesan tiket dan melakukan pengadaan barang dengan cara yang efisien dan mudah.

## Kelompok Java
- 1321056 Lidia Angelica Koswara
- 1321046 Finti Sasa Sabila
- 1321052 Aldi Ramadhani
- 1321054 Novrylianto Zundi Ramadhan


## Fitur Utama
1. **E-Ticketing:**
    - Pemesanan tiket secara online.
    - Informasi lengkap tentang acara, termasuk jadwal, lokasi, dan harga tiket.
    - Proses pembayaran yang aman dan nyaman.
2. **Pengadaan Barang:**
    - Pemesanan barang untuk kebutuhan bisnis atau acara.
3. **Autentikasi Pengguna:**
    - Sistem login dan registrasi pengguna.
    - Pengaturan profil pengguna dan manajemen kata sandi.
4. **Manajemen Admin:**
    - Manajemen pengguna dan peran (Admin, Kepala Unit, Kasubag, Teknisi, Manajemen, Customer).
    - Pantauan aktivitas pengguna dan laporan penjualan/pengadaan.

## Instalasi
1. Clone repositori ini ke dalam direktori web server Anda.
   ```bash
   git clone https://github.com/fintisalsabila/stmideskfinal
   ```
2. Buat database dan atur konfigurasi database di file `application/config/perusahaan.php`.
3. Lakukan migrasi database untuk membuat tabel yang diperlukan.
   ```bash
   php index.php migrate
   ```
4. Atur konfigurasi email di file `application/config/email.php` jika ingin menggunakan fitur notifikasi.
5. Buka aplikasi melalui web browser dan lakukan registrasi untuk mendapatkan akses.

## Username dan Password
K0001 = admin = ADMIN
K0009 = 123456 = customer 
K0010 = DEWI = Teknisi
K0002 = 123 = KASUBAG
K0005 = 123 = KEPALA UNIT
K0003 = 123 = MANAJEMEN


## Kontribusi
Jika Anda ingin berkontribusi pada pengembangan proyek ini, silakan buat *pull request* atau laporkan *issues* melalui GitHub.

## Lisensi
Proyek ini dilisensikan di bawah Lisensi MIT - lihat file [LICENSE](LICENSE) untuk detail lebih lanjut.
