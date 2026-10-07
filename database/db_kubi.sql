-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2026 at 09:35 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kubi`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `nama`, `email`, `password`) VALUES
(1, 'Admin Kubi', 'admin@kubi.com', 'admin123');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pesanan`
--

CREATE TABLE `detail_pesanan` (
  `id_detail` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pesanan`
--

INSERT INTO `detail_pesanan` (`id_detail`, `id_pesanan`, `id_produk`, `jumlah`, `harga`, `subtotal`) VALUES
(1, 1, 1, 1, 6000.00, 6000.00),
(2, 1, 2, 1, 8000.00, 8000.00),
(3, 1, 2, 2, 8000.00, 16000.00),
(4, 2, 4, 1, 12000.00, 12000.00),
(5, 3, 1, 1, 6000.00, 6000.00),
(6, 4, 1, 1, 6000.00, 6000.00),
(7, 4, 1, 1, 6000.00, 6000.00),
(8, 5, 1, 1, 6000.00, 6000.00),
(9, 6, 5, 1, 6000.00, 6000.00),
(10, 7, 4, 1, 12000.00, 12000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `no_telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama`, `no_telepon`, `alamat`) VALUES
(1, 'tyas', '039377323', NULL),
(2, 'kania', '8383393', NULL),
(3, 'nevi', '838339389', NULL),
(4, 'putri', '039373922973', NULL),
(5, 'aziz', '02182836382', 'bojonggede, bogor'),
(6, 'aziz', '02182836382', ''),
(7, 'bella', '08987464622', 'cibinong');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pesanan` int(11) DEFAULT NULL,
  `metode_pembayaran` varchar(20) DEFAULT NULL,
  `status_pembayaran` varchar(20) DEFAULT 'menunggu',
  `tanggal_pembayaran` datetime DEFAULT current_timestamp(),
  `jumlah_bayar` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pesanan`, `metode_pembayaran`, `status_pembayaran`, `tanggal_pembayaran`, `jumlah_bayar`) VALUES
(1, 1, 'QRIS', 'lunas', '2026-09-27 17:16:11', 30000.00),
(2, 2, 'QRIS', 'lunas', '2026-09-27 17:16:38', 12000.00),
(3, 3, 'Cash', 'lunas', '2026-10-01 16:46:09', 6000.00),
(4, 4, 'QRIS', 'lunas', '2026-10-03 16:47:36', 12000.00),
(5, 5, 'QRIS', 'lunas', '2026-10-03 17:01:13', 11000.00),
(6, 7, 'QRIS', 'lunas', '2026-10-03 17:04:40', 17000.00);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tanggal_pesan` datetime DEFAULT current_timestamp(),
  `status` varchar(30) DEFAULT 'diproses',
  `total_harga` decimal(10,2) DEFAULT NULL,
  `metode_pengambilan` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_pelanggan`, `tanggal_pesan`, `status`, `total_harga`, `metode_pengambilan`) VALUES
(1, 1, '2026-09-27 17:16:06', 'dibayar', 30000.00, 'Pick Up'),
(2, 2, '2026-09-27 17:16:31', 'selesai', 12000.00, 'Delivery'),
(3, 3, '2026-10-01 16:45:53', 'dibayar', 6000.00, 'Pick Up'),
(4, 4, '2026-10-03 16:47:31', 'dibayar', 12000.00, 'Pick Up'),
(5, 5, '2026-10-03 17:00:58', 'dibayar', 11000.00, 'Delivery'),
(6, 6, '2026-10-03 17:01:31', 'diproses', 6000.00, 'Pick Up'),
(7, 7, '2026-10-03 17:04:26', 'dibayar', 17000.00, 'Delivery');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `harga` decimal(10,2) DEFAULT NULL,
  `kategori` varchar(50) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'tersedia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama`, `deskripsi`, `harga`, `kategori`, `stok`, `gambar`, `status`) VALUES
(1, 'Es Ubi Ungu Creamy Original', 'Minuman segar berbahan dasar ubi ungu yang lembut dan creamy', 6000.00, 'original', 28, NULL, 'tersedia'),
(2, 'Es Ubi Ungu Creamy Keju', 'Minuman ubi ungu creamy dengan topping keju untuk rasa gurih', 8000.00, 'keju', 20, NULL, 'tersedia'),
(3, 'Es Ubi Ungu Creamy Jumbo Original', 'Versi Jumbo dari Es Ubi Ungu Creamy Original, porsi lebih besar', 10000.00, 'Jumbo', 15, NULL, 'tersedia'),
(4, 'Es Ubi Ungu Creamy Jumbo Full', 'Versi jumbo dengan topping lengkap', 12000.00, 'Jumbo', 15, NULL, 'tersedia'),
(5, 'Es Jagung Hawai', 'Minuman manis segar berbahan dasar jagung', 6000.00, 'Jagung', 20, NULL, 'tersedia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_pesanan` (`id_pesanan`),
  ADD KEY `id_produk` (`id_produk`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_pelanggan` (`id_pelanggan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pesanan`
--
ALTER TABLE `detail_pesanan`
  ADD CONSTRAINT `detail_pesanan_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`),
  ADD CONSTRAINT `detail_pesanan_ibfk_2` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Constraints for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `pesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
