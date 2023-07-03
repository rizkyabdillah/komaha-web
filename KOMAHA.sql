-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 03 Jul 2023 pada 14.26
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
('U-B9A6YERS', 'sa@ad.d', 'ASDD', 'd', 'USER', 'AD', 'LAKI-LAKI', '22', 'd'),
('U-CRJI58YQ', 'asd@ss.s', 'ASDF', 'q', 'USER', 'AA', 'PEREMPUAN', '222', 's'),
('U-ICMIRAOK', 'asdf@as.s', 'RIZKY12', 'asd', 'USER', 'RIZKY ABDILLAH', 'LAKI-LAKI', '213', 'asd');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `USER`
--
ALTER TABLE `USER`
  ADD PRIMARY KEY (`ID_USER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
