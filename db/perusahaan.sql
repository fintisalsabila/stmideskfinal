-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 23, 2023 at 03:00 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perusahaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `bagian_departemen`
--

CREATE TABLE `bagian_departemen` (
  `id_bagian_dept` int(11) NOT NULL,
  `nama_bagian_dept` varchar(30) NOT NULL,
  `id_dept` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bagian_departemen`
--

INSERT INTO `bagian_departemen` (`id_bagian_dept`, `nama_bagian_dept`, `id_dept`) VALUES
(5, 'SOFTWARE', 3),
(6, 'LAB', 4);

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` char(11) NOT NULL,
  `nama_barang` varchar(255) NOT NULL,
  `stok` int(11) NOT NULL,
  `jenis_id` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `stok`, `jenis_id`) VALUES
('B001', 'Laptop Acer Aspire', 50, 'J001'),
('B002', 'Printer Epson L3150', 20, 'J002'),
('B003', 'Smartphone Samsung Galaxy S21', 30, 'J003'),
('B004', 'Mouse Logitech MX Master 3', 40, 'J004'),
('B005', 'Monitor Dell Ultrasharp U2719D', 15, 'J005');

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `id_barang_keluar` char(11) NOT NULL,
  `barang_id` char(11) NOT NULL,
  `jumlah_keluar` int(11) NOT NULL,
  `tanggal_keluar` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`id_barang_keluar`, `barang_id`, `jumlah_keluar`, `tanggal_keluar`) VALUES
('BK001', 'B001', 5, '2023-01-11'),
('BK002', 'B004', 10, '2023-01-13'),
('BK003', 'B002', 8, '2023-01-16');

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_barang_masuk` char(11) DEFAULT NULL,
  `barang_id` char(11) NOT NULL,
  `jumlah_masuk` int(11) NOT NULL,
  `tanggal_masuk` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_barang_masuk`, `barang_id`, `jumlah_masuk`, `tanggal_masuk`) VALUES
('BM001', 'B001', 10, '2023-01-10'),
('BM002', 'B003', 20, '2023-01-12'),
('BM003', 'B002', 15, '2023-01-15');

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_dept` int(11) NOT NULL,
  `nama_dept` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_dept`, `nama_dept`) VALUES
(3, 'SIIO'),
(4, 'TIO'),
(5, 'STMI KARIR');

-- --------------------------------------------------------

--
-- Table structure for table `history_feedback`
--

CREATE TABLE `history_feedback` (
  `id_feedback` int(11) NOT NULL,
  `id_ticket` varchar(13) NOT NULL,
  `feedback` int(11) NOT NULL,
  `reported` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `history_feedback`
--

INSERT INTO `history_feedback` (`id_feedback`, `id_ticket`, `feedback`, `reported`) VALUES
(5, 'T201612020001', 1, 'K0001'),
(6, 'T201612020002', 1, 'K0001'),
(7, 'T201612040003', 1, 'K0001'),
(8, 'T201612040004', 0, 'K0001'),
(9, 'T201612180007', 1, 'K0002'),
(10, 'T201612180006', 0, 'K0002'),
(11, 'T201612190008', 1, 'K0001'),
(12, 'T201612190010', 1, 'K0001'),
(13, 'T202312220016', 1, 'K0009'),
(14, 'T202312230018', 1, 'K0009'),
(15, 'T202312230020', 1, 'K0009');

-- --------------------------------------------------------

--
-- Table structure for table `informasi`
--

CREATE TABLE `informasi` (
  `id_informasi` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `subject` varchar(35) NOT NULL,
  `pesan` text NOT NULL,
  `status` decimal(2,0) NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `informasi`
--

INSERT INTO `informasi` (`id_informasi`, `tanggal`, `subject`, `pesan`, `status`, `id_user`) VALUES
(1, '2016-12-04 09:24:28', 'WAJIB MENGISI FEEDBACK', 'FEEDBACK SANGATLAH PENTING GUNA MEMBANTU KAMI DALAM MEMBERIKAN PENILAIAN TERHADAP KINERJA TEKNISI, INI MENYANGKUT DENGAN KEPUASAN ANDA', '1', 'K0001'),
(2, '2016-12-21 13:42:59', 'JIJ', 'NKNJK', '1', 'K0001');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `nama_jabatan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`) VALUES
(1, 'KEPALA BAGIAN'),
(2, 'KEPALA DEPARTEMEN'),
(3, 'KEPALA REGU'),
(4, 'OPERATOR');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` char(11) NOT NULL,
  `nama_jenis` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`) VALUES
('J001', 'Laptop'),
('J002', 'Printer'),
('J003', 'Smartphone'),
('J004', 'Mouse'),
('J005', 'Monitor');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `nip` varchar(5) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `alamat` text NOT NULL,
  `jk` varchar(10) NOT NULL,
  `id_bagian_dept` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`nip`, `nama`, `alamat`, `jk`, `id_bagian_dept`, `id_jabatan`) VALUES
('K0001', 'ADMIN - NUR', 'TANGERANG', 'LAKI-LAKI', 5, 2),
('K0002', 'KASUBAG - DESI', 'JAKARTA', 'PEREMPUAN', 5, 3),
('K0003', 'MANAJEMEN - MUHLISON', 'TANGERANG', 'LAKI-LAKI', 5, 4),
('K0005', 'KEPALA UNIT - RIO', 'TANGERANG', 'LAKI-LAKI', 5, 2),
('K0006', 'DENI', 'TANGERANG', 'LAKI-LAKI', 6, 4),
('K0007', 'DOSEN', 'TES', 'LAKI-LAKI', 5, 1),
('K0008', 'JAVALICIOUS', 'BANDUNG, JAWA BARAT', 'LAKI-LAKI', 5, 2),
('K0009', 'CUSTOMER - BAYU', 'BANDUNG', 'LAKI-LAKI', 5, 1),
('K0010', 'TEKNISI - DEWI', 'BOGOR', 'PEREMPUAN', 5, 4),
('K0011', 'COMRO', 'BANDUNG', 'LAKI-LAKI', 5, 4),
('K0012', 'SAMSUL', 'JAKARTA', 'LAKI-LAKI', 6, 3),
('K0013', 'GALIH', 'HSUSAHSNHSN', 'LAKI-LAKI', 5, 4);

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'Pengadaan Barang'),
(5, 'Perbaikan Barang');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `nama_kondisi` varchar(30) NOT NULL,
  `waktu_respon` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `nama_kondisi`, `waktu_respon`) VALUES
(1, 'MENDESAK', '1');

-- --------------------------------------------------------

--
-- Table structure for table `sub_kategori`
--

CREATE TABLE `sub_kategori` (
  `id_sub_kategori` int(11) NOT NULL,
  `nama_sub_kategori` varchar(35) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_kategori`
--

INSERT INTO `sub_kategori` (`id_sub_kategori`, `nama_sub_kategori`, `id_kategori`) VALUES
(2, 'KERUSAKAN KOMPONEN MONITOR', 4),
(3, 'KERUSAKAN MOUSE', 4),
(4, 'KERUSAKAN KEYBOARD', 4),
(5, 'WINDOWS BLUE SCREEN', 5);

-- --------------------------------------------------------

--
-- Table structure for table `teknisi`
--

CREATE TABLE `teknisi` (
  `id_teknisi` varchar(5) NOT NULL,
  `nip` varchar(5) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `point` decimal(2,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teknisi`
--

INSERT INTO `teknisi` (`id_teknisi`, `nip`, `id_kategori`, `status`, `point`) VALUES
('T0002', 'K0010', 5, '', '3');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id_ticket` varchar(13) NOT NULL,
  `tanggal` datetime NOT NULL,
  `tanggal_proses` datetime NOT NULL,
  `tanggal_solved` datetime NOT NULL,
  `reported` varchar(5) NOT NULL,
  `id_sub_kategori` int(11) NOT NULL,
  `problem_summary` varchar(50) NOT NULL,
  `problem_detail` text NOT NULL,
  `id_teknisi` varchar(5) NOT NULL,
  `status` int(11) NOT NULL,
  `progress` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`id_ticket`, `tanggal`, `tanggal_proses`, `tanggal_solved`, `reported`, `id_sub_kategori`, `problem_summary`, `problem_detail`, `id_teknisi`, `status`, `progress`) VALUES
('T201612020001', '2016-12-02 16:59:18', '2016-12-02 17:00:39', '0000-00-00 00:00:00', 'K0001', 2, 'SASAS', 'NBNB', 'T0002', 6, '90'),
('T201612020002', '2016-12-02 17:05:29', '2016-12-02 17:09:06', '0000-00-00 00:00:00', 'K0001', 2, 'CXZCX', 'CXZC', 'T0002', 6, '100'),
('T201612040003', '2016-12-04 07:06:47', '2016-12-04 08:20:29', '2016-12-04 08:22:11', 'K0001', 4, 'KLKL', 'ASA', 'T0002', 6, '100'),
('T201612040004', '2016-12-04 08:24:44', '2016-12-04 08:25:57', '2016-12-04 09:47:27', 'K0001', 2, 'KLKL', 'BBB', 'T0002', 6, '100'),
('T201612040005', '2016-12-04 09:43:02', '2016-12-04 09:46:50', '0000-00-00 00:00:00', 'K0001', 2, 'SASAS', 'NJKHKJK', 'T0002', 4, '0'),
('T201612180006', '2016-12-18 07:00:49', '2016-12-18 07:25:21', '2016-12-18 07:26:11', 'K0002', 4, 'TES', 'TES', 'T0001', 6, '100'),
('T201612180007', '2016-12-18 08:09:25', '2016-12-18 08:17:45', '2016-12-18 08:20:37', 'K0002', 2, 'RUSAK MONITOR', 'TOLONG CEPAT DI PROSES KARENA TIDAK ADA MONITOR BACKUP', 'T0001', 6, '0'),
('T201612190008', '2016-12-19 13:02:25', '2016-12-19 13:03:37', '2016-12-19 13:03:54', 'K0001', 4, 'NH', 'NH', 'T0001', 6, '100'),
('T201612190009', '2016-12-19 14:09:09', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0001', 4, 'GDGFGHH', 'ASDFGHJKL', '', 2, '0'),
('T201612190010', '2016-12-19 14:35:33', '2016-12-19 15:09:27', '2016-12-19 15:09:59', 'K0001', 2, '35535', '53', 'T0001', 6, '100'),
('T201612280011', '2016-12-28 15:15:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0001', 2, '6UYUGTY', 'NJHJHJHJHJHJHJ BHGHJG B JHJHJ JHJHJNN', 'T0001', 3, '0'),
('T202311220012', '2023-11-22 03:03:51', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0009', 4, 'KERUSAKAN', 'DETAIL', '', 2, '0'),
('T202311220013', '2023-11-22 03:15:48', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0009', 4, 'DFS', 'ASF', '', 2, '0'),
('T202311300014', '2023-11-30 03:04:44', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0001', 4, 'CONTOH1', 'CONTOH', 'T0001', 3, '0'),
('T202311300015', '2023-11-30 03:32:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0001', 4, 'CONTOH1', 'CIDSAD', '', 1, '0'),
('T202312220016', '2023-12-22 08:22:07', '2023-12-22 08:24:14', '2023-12-22 12:59:58', 'K0009', 5, 'AA', 'A', 'T0002', 6, '100'),
('T202312220017', '2023-12-22 13:02:32', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0009', 5, 'S', 'S', '', 2, '0'),
('T202312230018', '2023-12-23 14:14:30', '2023-12-23 14:18:09', '2023-12-23 14:20:31', 'K0009', 5, 'AA', 'A', 'T0002', 6, '100'),
('T202312230019', '2023-12-23 14:15:39', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 'K0005', 2, 'A', 'A', '', 1, '0'),
('T202312230020', '2023-12-23 14:25:27', '2023-12-23 14:28:50', '2023-12-23 14:32:41', 'K0009', 5, 'ALDI', 'ALDI', 'T0002', 6, '100');

-- --------------------------------------------------------

--
-- Table structure for table `tracking`
--

CREATE TABLE `tracking` (
  `id_tracking` int(11) NOT NULL,
  `id_ticket` varchar(13) NOT NULL,
  `tanggal` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL,
  `id_user` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tracking`
--

INSERT INTO `tracking` (`id_tracking`, `id_ticket`, `tanggal`, `status`, `deskripsi`, `id_user`) VALUES
(1, 'T201612020001', '2016-12-02 16:59:18', 'Created Ticket', '', 'K0001'),
(2, 'T201612020001', '2016-12-02 16:59:34', 'Ticket disetujui', '', 'K0001'),
(3, 'T201612020001', '2016-12-02 16:59:55', 'Pemilihan Teknisi', 'Ticket Anda sudah di berikan kepada Teknisi', 'K0001'),
(4, 'T201612020001', '2016-12-02 17:00:39', 'Diproses oleh teknisi', '', 'K0001'),
(5, 'T201612020001', '2016-12-02 17:01:32', 'Up Progress To 100 %', 'SELESAI SILAHKAN AMBIL', 'K0001'),
(6, 'T201612020002', '2016-12-02 17:05:29', 'Created Ticket', '', 'K0001'),
(7, 'T201612020002', '2016-12-02 17:05:41', 'Ticket tidak disetujui', '', 'K0001'),
(8, 'T201612020002', '2016-12-02 17:05:47', 'Ticket dikembalikan ke posisi belum di setujui', '', 'K0001'),
(9, 'T201612020002', '2016-12-02 17:05:48', 'Ticket disetujui', '', 'K0001'),
(10, 'T201612020002', '2016-12-02 17:06:08', 'Pemilihan Teknisi', 'Ticket Anda sudah di berikan kepada Teknisi', 'K0001'),
(11, 'T201612020002', '2016-12-02 17:06:35', 'Pending oleh teknisi', '', 'K0001'),
(12, 'T201612020002', '2016-12-02 17:09:06', 'Diproses oleh teknisi', '', 'K0001'),
(13, 'T201612020002', '2016-12-02 17:09:32', 'Up Progress To 90 %', '', 'K0001'),
(14, 'T201612020002', '2016-12-04 06:32:39', 'Up Progress To 100 %', '', 'K0001'),
(15, 'T201612040003', '2016-12-04 07:06:47', 'Created Ticket', '', 'K0001'),
(16, 'T201612040003', '2016-12-04 08:19:03', 'Ticket disetujui', '', 'K0001'),
(17, 'T201612040003', '2016-12-04 08:19:17', 'Pemilihan Teknisi', 'Ticket Anda sudah di berikan kepada Teknisi', 'K0001'),
(18, 'T201612040003', '2016-12-04 08:20:29', 'Diproses oleh teknisi', '', 'K0001'),
(19, 'T201612040003', '2016-12-04 08:21:14', 'Up Progress To 10 %', '', 'K0001'),
(20, 'T201612040003', '2016-12-04 08:22:11', 'Up Progress To 100 %', '', 'K0001'),
(21, 'T201612040004', '2016-12-04 08:24:44', 'Created Ticket', '', 'K0001'),
(22, 'T201612040004', '2016-12-04 08:25:04', 'Ticket disetujui', '', 'K0001'),
(23, 'T201612040004', '2016-12-04 08:25:35', 'Pemilihan Teknisi', 'Ticket Anda sudah di berikan kepada Teknisi', 'K0001'),
(24, 'T201612040004', '2016-12-04 08:25:57', 'Diproses oleh teknisi', '', 'K0001'),
(25, 'T201612040004', '2016-12-04 08:43:02', 'Up Progress To 10 %', 'MENUNGGU KOMPONEN MAINBOARD', 'K0001'),
(26, 'T201612040005', '2016-12-04 09:43:02', 'Created Ticket', '', 'K0001'),
(27, 'T201612040005', '2016-12-04 09:44:22', 'Ticket tidak disetujui', '', 'K0001'),
(28, 'T201612040005', '2016-12-04 09:44:23', 'Ticket tidak disetujui', '', 'K0001'),
(29, 'T201612040005', '2016-12-04 09:44:35', 'Ticket dikembalikan ke posisi belum di setujui', '', 'K0001'),
(30, 'T201612040005', '2016-12-04 09:44:37', 'Ticket disetujui', '', 'K0001'),
(31, 'T201612040005', '2016-12-04 09:45:31', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(32, 'T201612040005', '2016-12-04 09:45:58', 'Pending oleh teknisi', '', 'K0001'),
(33, 'T201612040005', '2016-12-04 09:46:50', 'Diproses oleh teknisi', '', 'K0001'),
(34, 'T201612040004', '2016-12-04 09:47:27', 'Up Progress To 100 %', '', 'K0001'),
(35, 'T201612180006', '2016-12-18 07:00:49', 'Created Ticket', '', 'K0002'),
(36, 'T201612180006', '2016-12-18 07:01:49', 'Ticket disetujui', '', 'K0001'),
(37, 'T201612180006', '2016-12-18 07:23:02', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(38, 'T201612180006', '2016-12-18 07:25:21', 'Diproses oleh teknisi', '', 'K0003'),
(39, 'T201612180006', '2016-12-18 07:25:48', 'Up Progress To 10 %', '', 'K0003'),
(40, 'T201612180006', '2016-12-18 07:25:58', 'Up Progress To 70 %', '', 'K0003'),
(41, 'T201612180006', '2016-12-18 07:26:11', 'Up Progress To 100 %', 'SELESAI', 'K0003'),
(42, 'T201612180007', '2016-12-18 08:09:25', 'Created Ticket', '', 'K0002'),
(43, 'T201612180007', '2016-12-18 08:11:12', 'Ticket disetujui', '', 'K0005'),
(44, 'T201612180007', '2016-12-18 08:16:57', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(45, 'T201612180007', '2016-12-18 08:17:45', 'Diproses oleh teknisi', '', 'K0003'),
(46, 'T201612180007', '2016-12-18 08:18:21', 'Up Progress To 70 %', 'TINGGAL TUNGGU KOMPONEN', 'K0003'),
(47, 'T201612180007', '2016-12-18 08:20:37', 'Up Progress To 100 %', 'SOLVED TINGGAL AMBIL', 'K0003'),
(48, 'T201612190008', '2016-12-19 13:02:25', 'Created Ticket', '', 'K0001'),
(49, 'T201612190008', '2016-12-19 13:02:36', 'Ticket disetujui', '', 'K0001'),
(50, 'T201612190008', '2016-12-19 13:02:53', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(51, 'T201612190008', '2016-12-19 13:03:37', 'Diproses oleh teknisi', '', 'K0003'),
(52, 'T201612190008', '2016-12-19 13:03:54', 'Up Progress To 100 %', 'SELESAI', 'K0003'),
(53, 'T201612190009', '2016-12-19 14:09:09', 'Created Ticket', '', 'K0001'),
(54, 'T201612190009', '2016-12-19 14:11:49', 'Ticket disetujui', '', 'K0001'),
(55, 'T201612190010', '2016-12-19 14:35:33', 'Created Ticket', '', 'K0001'),
(56, 'T201612190010', '2016-12-19 14:35:38', 'Ticket disetujui', '', 'K0001'),
(57, 'T201612190010', '2016-12-19 14:47:17', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(58, 'T201612190010', '2016-12-19 15:09:27', 'Diproses oleh teknisi', '', 'K0003'),
(59, 'T201612190010', '2016-12-19 15:09:44', 'Up Progress To 50 %', 'TGGU KOMP', 'K0003'),
(60, 'T201612190010', '2016-12-19 15:09:59', 'Up Progress To 100 %', 'OKJE', 'K0003'),
(61, 'T201612280011', '2016-12-28 15:15:32', 'Created Ticket', '', 'K0001'),
(62, 'T201612280011', '2016-12-28 15:15:54', 'Ticket disetujui', '', 'K0001'),
(63, 'T201612280011', '2016-12-28 15:16:46', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0001'),
(64, 'T202311220012', '2023-11-22 03:03:51', 'Created Ticket', '', 'K0009'),
(65, 'T202311220012', '2023-11-22 03:06:01', 'Ticket disetujui', '', 'K0005'),
(66, 'T202311220013', '2023-11-22 03:15:48', 'Created Ticket', '', 'K0009'),
(67, 'T202311300014', '2023-11-30 03:04:44', 'Created Ticket', '', 'K0001'),
(68, 'T202311300015', '2023-11-30 03:32:36', 'Created Ticket', '', 'K0001'),
(69, 'T202311220013', '2023-11-30 03:41:22', 'Ticket disetujui', '', 'K0005'),
(70, 'T202311300014', '2023-11-30 03:41:25', 'Ticket disetujui', '', 'K0005'),
(71, 'T202311300014', '2023-12-22 08:17:17', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0002'),
(72, 'T202312220016', '2023-12-22 08:22:07', 'Created Ticket', '', 'K0009'),
(73, 'T202312220016', '2023-12-22 08:22:53', 'Ticket disetujui', '', 'K0005'),
(74, 'T202312220016', '2023-12-22 08:23:37', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0002'),
(75, 'T202312220016', '2023-12-22 08:24:14', 'Diproses oleh teknisi', '', 'K0010'),
(76, 'T202312220016', '2023-12-22 08:24:30', 'Up Progress To 30 %', 'MAAF BARANG NYA SEDANG SAYA PERBAIKI YA PAK', 'K0010'),
(77, 'T202312220016', '2023-12-22 12:59:58', 'Up Progress To 100 %', '', 'K0010'),
(78, 'T202312220017', '2023-12-22 13:02:32', 'Created Ticket', '', 'K0009'),
(79, 'T202312220017', '2023-12-22 13:04:11', 'Ticket disetujui', '', 'K0005'),
(80, 'T202312230018', '2023-12-23 14:14:30', 'Created Ticket', '', 'K0009'),
(81, 'T202312230019', '2023-12-23 14:15:39', 'Created Ticket', '', 'K0005'),
(82, 'T202312230018', '2023-12-23 14:15:47', 'Ticket disetujui', '', 'K0005'),
(83, 'T202312230018', '2023-12-23 14:16:25', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0002'),
(84, 'T202312230018', '2023-12-23 14:18:09', 'Diproses oleh teknisi', '', 'K0010'),
(85, 'T202312230018', '2023-12-23 14:18:44', 'Up Progress To 30 %', 'MAAF PAK SEDANG BERPROSESS', 'K0010'),
(86, 'T202312230018', '2023-12-23 14:20:31', 'Up Progress To 100 %', 'SUDAH KELAR PAK SILAHKAN DIPAKAI', 'K0009'),
(87, 'T202312230020', '2023-12-23 14:25:27', 'Created Ticket', '', 'K0009'),
(88, 'T202312230020', '2023-12-23 14:26:10', 'Ticket disetujui', '', 'K0005'),
(89, 'T202312230020', '2023-12-23 14:27:57', 'Pemilihan Teknisi', 'TICKET DIBERIKAN KEPADA TEKNISI', 'K0002'),
(90, 'T202312230020', '2023-12-23 14:28:50', 'Diproses oleh teknisi', '', 'K0010'),
(91, 'T202312230020', '2023-12-23 14:29:12', 'Up Progress To 40 %', 'MAAF PAK BARANG SULIT, HARAP TUNGGU SEBENTAR', 'K0010'),
(92, 'T202312230020', '2023-12-23 14:32:41', 'Up Progress To 100 %', 'SUDAH KELAR PAK', 'K0010');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(5) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(2, 'K0003', '202cb962ac59075b964b07152d234b70', 'MANAJEMEN'),
(3, 'K0002', '202cb962ac59075b964b07152d234b70', 'KASUBAG'),
(4, 'K0005', '202cb962ac59075b964b07152d234b70', 'KEPALAUNIT'),
(6, 'K0001', '21232f297a57a5a743894a0e4a801fc3', 'ADMIN'),
(11, 'K0009', 'e10adc3949ba59abbe56e057f20f883e', 'CUSTOMER'),
(13, 'K0010', 'f8a7f5d7ad69505e97391b94665555c6', 'TEKNISI'),
(15, 'K0012', 'e10adc3949ba59abbe56e057f20f883e', 'TEKNISI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bagian_departemen`
--
ALTER TABLE `bagian_departemen`
  ADD PRIMARY KEY (`id_bagian_dept`);

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_dept`);

--
-- Indexes for table `history_feedback`
--
ALTER TABLE `history_feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`id_informasi`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`);

--
-- Indexes for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  ADD PRIMARY KEY (`id_sub_kategori`);

--
-- Indexes for table `teknisi`
--
ALTER TABLE `teknisi`
  ADD PRIMARY KEY (`id_teknisi`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id_ticket`);

--
-- Indexes for table `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`id_tracking`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bagian_departemen`
--
ALTER TABLE `bagian_departemen`
  MODIFY `id_bagian_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `departemen`
--
ALTER TABLE `departemen`
  MODIFY `id_dept` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `history_feedback`
--
ALTER TABLE `history_feedback`
  MODIFY `id_feedback` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `id_informasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sub_kategori`
--
ALTER TABLE `sub_kategori`
  MODIFY `id_sub_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tracking`
--
ALTER TABLE `tracking`
  MODIFY `id_tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=93;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
