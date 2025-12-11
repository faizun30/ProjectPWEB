-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Des 2025 pada 09.20
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistem_laporan_barang_hilang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang_temuan`
--

CREATE TABLE `barang_temuan` (
  `id` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `lokasi_ditemukan` varchar(100) NOT NULL,
  `tanggal_ditemukan` date NOT NULL,
  `ciri_ciri` text DEFAULT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang_temuan`
--

INSERT INTO `barang_temuan` (`id`, `nama_barang`, `lokasi_ditemukan`, `tanggal_ditemukan`, `ciri_ciri`, `status`) VALUES
(1, 'Dompet', 'Gedung 3 Lantai 1', '2025-12-10', 'Warna coklat , bahan kulit', 'Sudah Diambil'),
(3, 'Jam Tangan', 'kampus H Gedung 4 Lantai 2', '2025-12-05', 'Warna Emas metalic , bahan besi metal', 'Belum Diambil');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang_temuan`
--
ALTER TABLE `barang_temuan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `barang_temuan`
--
ALTER TABLE `barang_temuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
