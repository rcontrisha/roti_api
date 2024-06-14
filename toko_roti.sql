-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jun 2024 pada 01.32
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_roti`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `access_rights`
--

CREATE TABLE `access_rights` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `can_manage_account` tinyint(1) NOT NULL DEFAULT 0,
  `can_manage_items` tinyint(1) NOT NULL DEFAULT 0,
  `can_manage_transactions` tinyint(1) NOT NULL DEFAULT 0,
  `can_manage_reports` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `access_rights`
--

INSERT INTO `access_rights` (`id`, `username`, `can_manage_account`, `can_manage_items`, `can_manage_transactions`, `can_manage_reports`) VALUES
(4, 'alice123', 1, 1, 1, 1),
(5, 'asep123', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `posisi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `nama_user`, `email`, `username`, `password`, `posisi`) VALUES
(4, 'Anice', 'alice@example.com', 'alice123', '$2y$10$Qpec2ORE0wDA3LKhlKs9UOjqeoQb2vEg.D5Y.7Or6ODNC2Xo5MbVS', 'Admin'),
(5, 'Asep', 'asep1234@example.com', 'asep123', '$2y$10$Qpec2ORE0wDA3LKhlKs9UOjqeoQb2vEg.D5Y.7Or6ODNC2Xo5MbVS', 'Cashier');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `harga` decimal(10,2) NOT NULL,
  `stok` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`, `stok`, `id_kategori`) VALUES
(1, 'Roti Tawar Pandan', 16000.00, 50, 1),
(2, 'Roti Gandum', 13000.00, 30, 1),
(3, 'Donat Cokelat', 8000.00, 20, 2),
(4, 'Bolu Pandan', 15000.00, 15, 3),
(5, 'Croissant Keju', 18000.00, 25, 2),
(6, 'Roti Isi Ayam', 14000.00, 40, 4),
(7, 'Kue Lapis', 16000.00, 10, 5),
(8, 'Roti Isi Sosis', 15000.00, 35, 4),
(9, 'Kue Lumpur', 13000.00, 20, 5),
(10, 'Biskuit Kelapa', 10000.00, 50, 3),
(12, 'Roti Tawar Coklat', 15000.00, 50, 1),
(13, 'Aqua 600ml', 5000.00, 40, 9);

-- --------------------------------------------------------

--
-- Struktur dari tabel `daily_transactions`
--

CREATE TABLE `daily_transactions` (
  `transaction_id` int(11) NOT NULL,
  `transaction_date` date NOT NULL,
  `total_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `daily_transactions`
--

INSERT INTO `daily_transactions` (`transaction_id`, `transaction_date`, `total_amount`) VALUES
(1, '2024-05-01', 500000.00),
(2, '2024-05-02', 700000.00),
(3, '2024-05-03', 300000.00),
(4, '2024-06-01', 600000.00),
(5, '2024-06-02', 800000.00),
(6, '2024-06-03', 400000.00),
(7, '2024-07-01', 550000.00),
(8, '2024-07-02', 750000.00),
(9, '2024-07-03', 350000.00),
(11, '2024-05-31', 28000.00),
(12, '2024-06-03', 30000.00),
(13, '2024-06-06', 57000.00),
(14, '2024-06-06', 57000.00),
(15, '2024-06-06', 57000.00),
(16, '2024-06-06', 57000.00),
(17, '2024-06-06', 57000.00),
(18, '2024-06-11', 0.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Roti Tawar'),
(2, 'Roti Manis'),
(3, 'Kue Kering'),
(4, 'Roti Isi'),
(5, 'Kue Basah'),
(6, 'Kue'),
(9, 'Minuman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `monthly_transactions`
--

CREATE TABLE `monthly_transactions` (
  `transaction_id` int(11) NOT NULL,
  `transaction_month` varchar(20) NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `average_amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `monthly_transactions`
--

INSERT INTO `monthly_transactions` (`transaction_id`, `transaction_month`, `total_amount`, `average_amount`) VALUES
(1, 'Mei 2024', 1500000.00, 500000.00),
(2, 'Juni 2024', 1800000.00, 600000.00),
(3, 'Juli 2024', 1650000.00, 550000.00);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(50) NOT NULL,
  `transaction_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `transaction_date`, `total_price`) VALUES
(2, 'AW-2024052580924595', '2024-05-25 08:26:01', 31000.00),
(3, 'AW-2024052580924596', '2024-05-25 08:26:01', 31000.00),
(4, 'AW-2024053140830194', '2024-05-31 07:58:43', 28000.00),
(5, 'AW-2024060353207595', '2024-06-03 06:46:19', 30000.00),
(6, 'AW-2024060599913828', '2024-06-04 21:45:29', 56000.00),
(7, 'AW-2024060558493823', '2024-06-04 21:51:43', 39000.00),
(8, 'AW-2024060670041298', '2024-06-06 05:27:32', 29000.00),
(9, 'AW-2024060685904956', '2024-06-06 06:37:15', 14000.00),
(10, 'AW-2024060685904956', '2024-06-06 06:37:17', 14000.00),
(11, 'AW-2024060626130407', '2024-06-06 10:40:45', 29000.00),
(12, 'AW-2024060622125131', '2024-06-06 10:41:10', 27000.00),
(13, 'AW-2024060619438464', '2024-06-06 10:52:09', 46000.00),
(14, 'AW-2024060619438464', '2024-06-06 10:52:10', 46000.00),
(15, 'AW-2024061167138215', '2024-06-10 18:59:37', 27000.00),
(16, 'AW-2024061151772000', '2024-06-10 19:01:02', 79000.00);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `access_rights`
--
ALTER TABLE `access_rights`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_username` (`username`);

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `barang_ibfk_1` (`id_kategori`);

--
-- Indeks untuk tabel `daily_transactions`
--
ALTER TABLE `daily_transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `monthly_transactions`
--
ALTER TABLE `monthly_transactions`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indeks untuk tabel `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `access_rights`
--
ALTER TABLE `access_rights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `daily_transactions`
--
ALTER TABLE `daily_transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `monthly_transactions`
--
ALTER TABLE `monthly_transactions`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `access_rights`
--
ALTER TABLE `access_rights`
  ADD CONSTRAINT `fk_username` FOREIGN KEY (`username`) REFERENCES `akun` (`username`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
