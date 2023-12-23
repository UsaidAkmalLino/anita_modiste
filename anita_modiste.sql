-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Des 2023 pada 09.48
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `anita_modiste`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan_jahitan`
--

CREATE TABLE `pesanan_jahitan` (
  `id_pesan` int(11) NOT NULL,
  `customer_name` varchar(100) NOT NULL,
  `customer_address` varchar(100) NOT NULL,
  `nomer_telepon` varchar(30) NOT NULL,
  `desain` varchar(2000) NOT NULL,
  `bahan` varchar(2000) NOT NULL,
  `ukuran` text NOT NULL,
  `jumlah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan_jahitan`
--

INSERT INTO `pesanan_jahitan` (`id_pesan`, `customer_name`, `customer_address`, `nomer_telepon`, `desain`, `bahan`, `ukuran`, `jumlah`) VALUES
(1, 'anam', 'blitar', '098887', 'kain fanel', 'katun', 'grGherHeth', '2'),
(2, 'anam', 'blitar', 'asdasass', 'kain fanel', 'katun', 'dcvsdvv', 'EE'),
(3, 'anam', 'blitar', '098887', 'kain fanel', 'katun', 'gznzn', 'rtjnryjmry');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `akses` text NOT NULL DEFAULT 'karyawan'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_admin`, `username`, `password`, `akses`) VALUES
(1, 'anitamodiste', '12345678', 'admin'),
(3, 'anam', '12345678', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanan_jahitan`
--
ALTER TABLE `pesanan_jahitan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_admin`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `pesanan_jahitan`
--
ALTER TABLE `pesanan_jahitan`
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
