-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Mar 2022 pada 06.43
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel_serasa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(228) NOT NULL,
  `level` enum('tamu','administrator','resepsionis','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `nama_admin`, `username`, `password`, `level`) VALUES
(1, 'fajar hidayatuloh', 'fajar', '123456', 'resepsionis'),
(3, 'Samsul Hamdan', 'samjuljaja', 'samsul', 'resepsionis'),
(4, 'admin', 'admin', 'admin', 'administrator'),
(6, 'dsadsa', 'dsadsa', 'dsadsa', 'resepsionis'),
(7, 'fajar', 'fajarh', '123456', 'tamu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_hotel`
--

CREATE TABLE `fasilitas_hotel` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(255) NOT NULL,
  `foto_fasilitas` varchar(255) NOT NULL,
  `deskripsi_fasilitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_hotel`
--

INSERT INTO `fasilitas_hotel` (`id_fasilitas`, `nama_fasilitas`, `foto_fasilitas`, `deskripsi_fasilitas`) VALUES
(4, 'Kolam Berenang', 'kolam.jpg', 'kolam renang sepi\r\n'),
(6, 'restauran', 'restouran.jpg', 'yyyhhhhyhyhhy');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas_kamar`
--

CREATE TABLE `fasilitas_kamar` (
  `id_fasilitas_k` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `nama_fasilitas` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas_kamar`
--

INSERT INTO `fasilitas_kamar` (`id_fasilitas_k`, `id_kamar`, `nama_fasilitas`) VALUES
(14, 1, 'AC');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(255) NOT NULL,
  `foto_kamar` varchar(255) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `harga_kamar` int(11) NOT NULL,
  `deskripsi_kamar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `nama_kamar`, `foto_kamar`, `jumlah_kamar`, `harga_kamar`, `deskripsi_kamar`) VALUES
(2, 'fggggf', 'curved8.jpg', 7, 600000, 'fggfgfgf'),
(5, 'kamar 1', 'keqing_genshin_impact_character_png_by_deg5270_de911b7-fullview.png', 6, 7678888, 'hjjgfddfsgdfdghf'),
(6, 'Superior Room', '1.png', 10, 5000000, 'kamar orang kaya'),
(7, 'Deluxe Room', '2.png', 12, 1200000, 'kamar sukses good'),
(8, 'Signature Room', '3.png', 8, 1500000, 'kamar orang kaya'),
(9, 'Couple Room', '4.png', 5, 2000000, 'khusus yang sudah ,menikah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar_hotel`
--

CREATE TABLE `kamar_hotel` (
  `id_kamar` int(11) NOT NULL,
  `nama_kamar` varchar(100) NOT NULL,
  `foto_kamar` varchar(255) NOT NULL,
  `jumlah_kamar` int(11) NOT NULL,
  `harga_kamar` int(11) NOT NULL,
  `deskripsi_kamar` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar_hotel`
--

INSERT INTO `kamar_hotel` (`id_kamar`, `nama_kamar`, `foto_kamar`, `jumlah_kamar`, `harga_kamar`, `deskripsi_kamar`) VALUES
(1, 'Couple Room', '4.png', 5, 2000000, 'khusus yang sudah ,menikah'),
(2, 'Signature Room', '3.png', 8, 1500000, 'kamar orang kaya'),
(3, 'Deluxe Room', '2.png', 10, 1230000, 'kamar sukses good'),
(4, 'Superior Room', '1.png', 11, 170000, 'kamar sukses good');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int(11) NOT NULL,
  `id_kamar` int(11) NOT NULL,
  `tanggal_chekin` date NOT NULL,
  `tanggal_chekout` date NOT NULL,
  `jumlah_pesan` int(11) NOT NULL,
  `nama_pemesan` varchar(255) NOT NULL,
  `email_pemesan` varchar(128) NOT NULL,
  `no_hp` varchar(50) NOT NULL,
  `nama_tamu` varchar(255) NOT NULL,
  `status_pemesan` enum('dipesan','peroses','batal','') NOT NULL,
  `tanggal_pesan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_kamar`, `tanggal_chekin`, `tanggal_chekout`, `jumlah_pesan`, `nama_pemesan`, `email_pemesan`, `no_hp`, `nama_tamu`, `status_pemesan`, `tanggal_pesan`) VALUES
(1, 1, '2022-03-09', '2022-03-11', 1, 'fajar', 'fjrhdytlh22@gmail.com', '09277435627', 'faizal', 'dipesan', '2022-03-08 05:42:01'),
(2, 1, '2022-03-09', '2022-03-10', 2, 'fajar', 'fjrhdytlh22@gmail.com', '21243211233', 'faizal', 'dipesan', '2022-03-08 01:12:08');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD PRIMARY KEY (`id_fasilitas_k`),
  ADD KEY `id_kamar` (`id_kamar`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `kamar_hotel`
--
ALTER TABLE `kamar_hotel`
  ADD PRIMARY KEY (`id_kamar`);

--
-- Indeks untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `pemesanan_ibfk_1` (`id_kamar`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_hotel`
--
ALTER TABLE `fasilitas_hotel`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  MODIFY `id_fasilitas_k` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `kamar_hotel`
--
ALTER TABLE `kamar_hotel`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fasilitas_kamar`
--
ALTER TABLE `fasilitas_kamar`
  ADD CONSTRAINT `fasilitas_kamar_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar_hotel` (`id_kamar`);

--
-- Ketidakleluasaan untuk tabel `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_kamar`) REFERENCES `kamar_hotel` (`id_kamar`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
