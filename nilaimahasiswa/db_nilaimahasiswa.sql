-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jan 2021 pada 06.07
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_nilaimahasiswa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `students_data`
--

CREATE TABLE `students_data` (
  `kode` int(11) NOT NULL,
  `nama` text NOT NULL,
  `nim` int(11) NOT NULL,
  `department` text NOT NULL,
  `score` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `students_data`
--

INSERT INTO `students_data` (`kode`, `nama`, `nim`, `department`, `score`) VALUES
(32, 'nova', 73, 'TEKNIK INFORMATIKA', 99),
(33, 'rahmat', 72, 'TEKNIK INFORMATIKA', 89),
(34, 'nugi', 43, 'TEKNIK INFORMATIKA', 88);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `students_data`
--
ALTER TABLE `students_data`
  ADD PRIMARY KEY (`kode`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `students_data`
--
ALTER TABLE `students_data`
  MODIFY `kode` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
