-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 18 Jul 2023 pada 10.40
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `KOMAHA`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `CATERING`
--

CREATE TABLE `CATERING` (
  `ID_CATERING` char(15) NOT NULL,
  `NAMA_MENU` varchar(150) NOT NULL,
  `KATEGORI` enum('AYAM','SEAFOOD','SAPI','STEAK','KAMBING') NOT NULL,
  `DESKRIPSI` text NOT NULL,
  `HARGA` int(11) NOT NULL,
  `GAMBAR` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `CATERING`
--

INSERT INTO `CATERING` (`ID_CATERING`, `NAMA_MENU`, `KATEGORI`, `DESKRIPSI`, `HARGA`, `GAMBAR`) VALUES
('CTR-CWX36NRPIKU', 'NASI KEBULI AYAM', 'AYAM', 'Isi dalam box berupa Nasi, Ayam Goreng, Sambal, Lalapan, Acar|Harga untuk per 1 kotak/box|Pemesanan minimal H-1', 23000, '16894329621689432962_aaf4ab70ba7293502591.jpg'),
('CTR-VAP183CD5MA', 'DAGING SAPI LADA HITAM', 'SAPI', 'Isi dalam box berupa Nasi, Sapi Panggang, Sambal, Lalapan, Acar, Jamur Crispi|Harga untuk per 1 kotak/box|Pemesanan minimal H-1', 35000, '16894330431689433043_70b214649828d91de937.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `CLEANING_SERVICE`
--

CREATE TABLE `CLEANING_SERVICE` (
  `ID_CLEANING_SERVICE` char(15) NOT NULL,
  `NAMA_SERVICE` varchar(100) NOT NULL,
  `DURASI` varchar(15) NOT NULL,
  `HARGA` int(11) NOT NULL,
  `DESKRIPSI` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `CLEANING_SERVICE`
--

INSERT INTO `CLEANING_SERVICE` (`ID_CLEANING_SERVICE`, `NAMA_SERVICE`, `DURASI`, `HARGA`, `DESKRIPSI`) VALUES
('CSS-HGMZCWSOY6U', 'PAKET 1 JAM INCLUDE PERALATAN', '1', 55000, 'Pemesan tidak perlu menyiapkan peralatan kerja|Peralatan yang disediakan meliputi sapu lantai, alat pel, kain pel, sabun pembersih, kemucing|Area yang dibersihkan meliputi menyapu lantai, dan membersihkan kamar mandi'),
('CSS-UVQM7GKW2DX', 'PAKET 1 JAM TANPA PERALATAN', '1', 45000, 'Pemesan harus menyiapkan keperluan untuk kebersihan|Peralatan yang dibutuhkan meliputi sapu lantai, alat pel, kain pel, sabun pembersih, kemucing|Area yang dibersihkan meliputi menyapu lantai, dan membersihkan kamar mandi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `KOST`
--

CREATE TABLE `KOST` (
  `ID_KOST` char(15) NOT NULL,
  `FASILITAS` text NOT NULL,
  `HARGA` int(11) NOT NULL,
  `JENIS_KOST` enum('PUTRA','PUTRI') NOT NULL,
  `NAMA_KOST` varchar(150) NOT NULL,
  `AREA` enum('KLOJEN','LOWOKWARU','SUKUN','BLIMBING') NOT NULL,
  `PERIODE` enum('HARI','MINGGU','BULAN','TAHUN') NOT NULL,
  `GAMBAR` text NOT NULL,
  `REKOMENDASI` enum('YA','TIDAK') NOT NULL DEFAULT 'TIDAK',
  `TERSEDIA` int(11) NOT NULL DEFAULT 0,
  `ALAMAT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `KOST`
--

INSERT INTO `KOST` (`ID_KOST`, `FASILITAS`, `HARGA`, `JENIS_KOST`, `NAMA_KOST`, `AREA`, `PERIODE`, `GAMBAR`, `REKOMENDASI`, `TERSEDIA`, `ALAMAT`) VALUES
('KST-DRLLERVWYQ3', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower', 8500000, 'PUTRA', 'KOST PAK HARTONO', 'KLOJEN', 'TAHUN', '16894229601689422960_2de1985494fbaceaab96.jpg', 'YA', 10, 'Jl. Terusan Surabaya, No. 32'),
('KST-HBFBZPMIW0S', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower', 700000, 'PUTRA', 'KOST PAK BUDI', 'SUKUN', 'BULAN', '16894231011689423101_9de2532b7f5b5c3a5871.webp', 'YA', 12, 'Jl. Teluk Mandar, No. 43'),
('KST-IAKQGTHP1DV', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower', 900000, 'PUTRI', 'KOST IBU MARIAH', 'LOWOKWARU', 'BULAN', '16894230531689423053_133073f876d4e4554895.jpg', 'YA', 1, 'Jl. Candi Panggung Indah, No. 49'),
('KST-IDTQQSB2Z7K', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower|AC dalam kamar', 950000, 'PUTRA', 'KOST HAJI SAID', 'KLOJEN', 'BULAN', '16894232351689423235_a0e8fb03c48b956dda86.jpg', 'TIDAK', 4, 'Jl. Surabaya, No. 50, Belakang UM'),
('KST-WF9J3GQA7IW', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower', 350000, 'PUTRI', 'KOST SIDOMORO', 'LOWOKWARU', 'MINGGU', '16894231881689423188_1ffe48efb20a004f2157.jpg', 'YA', 7, 'Jl. Terusan Soekarno Hatta, No. 56'),
('KST-WN97PXYKLF5', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower', 95000, 'PUTRI', 'KOST DAMAI', 'BLIMBING', 'HARI', '16894231431689423143_f3be2dd3e153e259aa72.webp', 'YA', 6, 'Jl. Danau Toba, No.33'),
('KST-WPLGJ9ZOURF', 'Dekat dengan UB, UM, Polinema|Kamar mandi dalam|Terdapat shower', 6500000, 'PUTRI', 'KOST IBU MELANIS', 'KLOJEN', 'TAHUN', '16894207591689420759_fc853d4857e2eb4e0d09.jpg', 'YA', 15, 'Jl. Candi panggung indah, No.32');

-- --------------------------------------------------------

--
-- Struktur dari tabel `TRANSAKSI_CATERING`
--

CREATE TABLE `TRANSAKSI_CATERING` (
  `ID_TRANSAKSI` char(20) NOT NULL,
  `ID_CATERING` char(15) NOT NULL,
  `ID_USER` char(10) NOT NULL,
  `BANK_PEMBAYARAN` enum('BRI','BNI','MANDIRI','BCA') NOT NULL,
  `TANGGAL_PENGIRIMAN` date NOT NULL,
  `WAKTU_PENGIRIMAN` time NOT NULL,
  `QUANTITY` int(11) NOT NULL,
  `TOTAL` int(11) NOT NULL,
  `BUKTI_PEMBAYARAN` text DEFAULT NULL,
  `STATUS_PEMBAYARAN` enum('BELUM BAYAR','MENUNGGU KONFIRMASI','DIKONFIRMASI','KONFIRMASI DITOLAK') NOT NULL DEFAULT 'BELUM BAYAR',
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TRANSAKSI_CATERING`
--

INSERT INTO `TRANSAKSI_CATERING` (`ID_TRANSAKSI`, `ID_CATERING`, `ID_USER`, `BANK_PEMBAYARAN`, `TANGGAL_PENGIRIMAN`, `WAKTU_PENGIRIMAN`, `QUANTITY`, `TOTAL`, `BUKTI_PEMBAYARAN`, `STATUS_PEMBAYARAN`, `CREATED_AT`) VALUES
('TRX-QOMCSO9RTXMALXLH', 'CTR-VAP183CD5MA', 'U-YDIBSGOA', 'MANDIRI', '2023-07-18', '08:00:00', 1, 35000, NULL, 'BELUM BAYAR', '2023-07-18 07:24:44'),
('TRX-SXQF4NVCLXRHBQTT', 'CTR-CWX36NRPIKU', 'U-YDIBSGOA', 'BCA', '2023-07-20', '00:00:00', 8, 184000, '16896052321689605232_2661c4672ab22ba6f633.jpg', 'DIKONFIRMASI', '2023-07-17 14:27:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `TRANSAKSI_CS`
--

CREATE TABLE `TRANSAKSI_CS` (
  `ID_TRANSAKSI` char(20) NOT NULL,
  `ID_CLEANING_SERVICE` char(15) NOT NULL,
  `ID_USER` char(10) NOT NULL,
  `BANK_PEMBAYARAN` enum('BRI','BNI','MANDIRI','BCA') NOT NULL,
  `TANGGAL_BOOKING` date NOT NULL,
  `WAKTU_BOOKING` time NOT NULL,
  `TOTAL` int(11) NOT NULL,
  `BUKTI_PEMBAYARAN` text DEFAULT NULL,
  `STATUS_PEMBAYARAN` enum('BELUM BAYAR','MENUNGGU KONFIRMASI','DIKONFIRMASI','KONFIRMASI DITOLAK') NOT NULL DEFAULT 'BELUM BAYAR',
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TRANSAKSI_CS`
--

INSERT INTO `TRANSAKSI_CS` (`ID_TRANSAKSI`, `ID_CLEANING_SERVICE`, `ID_USER`, `BANK_PEMBAYARAN`, `TANGGAL_BOOKING`, `WAKTU_BOOKING`, `TOTAL`, `BUKTI_PEMBAYARAN`, `STATUS_PEMBAYARAN`, `CREATED_AT`) VALUES
('TRX-SC0GT3UCIQ7VLNFU', 'CSS-UVQM7GKW2DX', 'U-YDIBSGOA', 'MANDIRI', '2023-07-18', '08:00:00', 45000, '16896671311689667131_6d69b033957f8992f4e5.jpg', 'DIKONFIRMASI', '2023-07-18 07:51:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `TRANSAKSI_KOST`
--

CREATE TABLE `TRANSAKSI_KOST` (
  `ID_TRANSAKSI` char(20) NOT NULL,
  `ID_KOST` char(15) NOT NULL,
  `ID_USER` char(10) NOT NULL,
  `TANGGAL_AWAL_MASUK` date NOT NULL,
  `TOTAL` int(11) NOT NULL,
  `BANK_PEMBAYARAN` enum('BRI','BNI','MANDIRI','BCA') NOT NULL,
  `BUKTI_PEMBAYARAN` text DEFAULT NULL,
  `STATUS_PEMBAYARAN` enum('BELUM BAYAR','MENUNGGU KONFIRMASI','DIKONFIRMASI','KONFIRMASI DITOLAK') NOT NULL DEFAULT 'BELUM BAYAR',
  `CREATED_AT` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `TRANSAKSI_KOST`
--

INSERT INTO `TRANSAKSI_KOST` (`ID_TRANSAKSI`, `ID_KOST`, `ID_USER`, `TANGGAL_AWAL_MASUK`, `TOTAL`, `BANK_PEMBAYARAN`, `BUKTI_PEMBAYARAN`, `STATUS_PEMBAYARAN`, `CREATED_AT`) VALUES
('TRX-EH5VRANLJMEJIBB3', 'KST-IAKQGTHP1DV', 'U-YDIBSGOA', '2023-07-17', 900000, 'BRI', '16895831991689583199_10e33d5a7ecd8b23a425.png', 'KONFIRMASI DITOLAK', '2023-07-17 08:16:33'),
('TRX-OQNDF5GFEQSZOB2U', 'KST-IAKQGTHP1DV', 'U-YDIBSGOA', '2023-07-17', 900000, 'BRI', '16895933361689593336_7bd7420cb073b96c9bad.jpg', 'DIKONFIRMASI', '2023-07-17 06:59:59');

-- --------------------------------------------------------

--
-- Struktur dari tabel `USER`
--

CREATE TABLE `USER` (
  `ID_USER` char(10) NOT NULL,
  `EMAIL` varchar(100) NOT NULL,
  `USERNAME` varchar(100) NOT NULL,
  `PASSWORD` varchar(100) NOT NULL,
  `LEVEL` enum('USER','ADMIN') NOT NULL,
  `NAMA_LENGKAP` varchar(150) NOT NULL,
  `JENIS_KELAMIN` enum('LAKI-LAKI','PEREMPUAN') NOT NULL,
  `TELEPON` char(13) NOT NULL,
  `ALAMAT` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `USER`
--

INSERT INTO `USER` (`ID_USER`, `EMAIL`, `USERNAME`, `PASSWORD`, `LEVEL`, `NAMA_LENGKAP`, `JENIS_KELAMIN`, `TELEPON`, `ALAMAT`) VALUES
('U-00001111', '-', 'ADMIN', 'ADMIN', 'ADMIN', 'ADMINISTRATOR', 'LAKI-LAKI', '000', '-'),
('U-YDIBSGOA', 'rizkyaks@gmail.com', 'RIZKY12', 'qwe', 'USER', 'RIZKY ABDILLAH', 'LAKI-LAKI', '089521130005', 'Jl. Terusan Surabaya, Klojen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `CATERING`
--
ALTER TABLE `CATERING`
  ADD PRIMARY KEY (`ID_CATERING`);

--
-- Indeks untuk tabel `CLEANING_SERVICE`
--
ALTER TABLE `CLEANING_SERVICE`
  ADD PRIMARY KEY (`ID_CLEANING_SERVICE`);

--
-- Indeks untuk tabel `KOST`
--
ALTER TABLE `KOST`
  ADD PRIMARY KEY (`ID_KOST`);

--
-- Indeks untuk tabel `TRANSAKSI_CATERING`
--
ALTER TABLE `TRANSAKSI_CATERING`
  ADD PRIMARY KEY (`ID_TRANSAKSI`);

--
-- Indeks untuk tabel `TRANSAKSI_CS`
--
ALTER TABLE `TRANSAKSI_CS`
  ADD PRIMARY KEY (`ID_TRANSAKSI`);

--
-- Indeks untuk tabel `TRANSAKSI_KOST`
--
ALTER TABLE `TRANSAKSI_KOST`
  ADD PRIMARY KEY (`ID_TRANSAKSI`);

--
-- Indeks untuk tabel `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`ID_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
