-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Jan 2024 pada 10.46
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
  `jumlah` varchar(100) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pesanan_jahitan`
--

INSERT INTO `pesanan_jahitan` (`id_pesan`, `customer_name`, `customer_address`, `nomer_telepon`, `desain`, `bahan`, `ukuran`, `jumlah`, `status`) VALUES
(10, 'fdtrhcjtc', 'gvjygcyjctyt', 'asdasass', 'fafaf', 'katun', 'lingkar dada = 10 cmlingkar dada = 10 cmlingkar dada = 10 cmlingkar dada = 10 cmlingkar dada = 10 cmlingkar dada = 10 cm', '9', 'Pesanan Sudah Diambil'),
(11, 'anam', 'blitar', '098887', 'kain fanel', 'katun', 'fwrwgvrv', '3', 'Pesanan Sudah Diambil'),
(12, 'anam', 'blitar', '098887', 'kain fanel', 'katun', 'cthrdtydytdjtydf', '43', 'Pesanan Sudah Diambil'),
(13, 'anam', 'blitar', '098887', 'kain fanel', 'katun', 'agsHHHJrtj', '3', 'Pesanan Sudah Diambil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_nota`
--

CREATE TABLE `tabel_nota` (
  `id_nota` int(11) NOT NULL,
  `no_nota` varchar(1000) NOT NULL,
  `nama_customer` varchar(1000) NOT NULL,
  `biaya_bahan` varchar(2000) NOT NULL,
  `biaya_jasa` varchar(2000) NOT NULL,
  `total` varchar(2000) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `tabel_nota`
--

INSERT INTO `tabel_nota` (`id_nota`, `no_nota`, `nama_customer`, `biaya_bahan`, `biaya_jasa`, `total`, `tanggal`) VALUES
(1, '12', 'anam', '21412414', '3241413', '141441', '2024-01-11'),
(2, '12', 'anam', '21412414', '3241413', '141441', '2024-01-11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `akses` text NOT NULL DEFAULT 'karyawan',
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_telepon` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_admin`, `username`, `password`, `akses`, `nama`, `alamat`, `no_telepon`) VALUES
(6, 'admin', 'admin', 'admin', 'anam', 'ponggok', '082132527801'),
(25, 'karyawan', 'karyawan', 'karyawan', 'anam', 'ponggok', '082132527801');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `pesanan_jahitan`
--
ALTER TABLE `pesanan_jahitan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indeks untuk tabel `tabel_nota`
--
ALTER TABLE `tabel_nota`
  ADD PRIMARY KEY (`id_nota`);

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
  MODIFY `id_pesan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `tabel_nota`
--
ALTER TABLE `tabel_nota`
  MODIFY `id_nota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
