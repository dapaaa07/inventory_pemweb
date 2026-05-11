-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2026 at 06:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `si_gudang`
--

-- --------------------------------------------------------

--
-- Table structure for table `detail_pembelian`
--

CREATE TABLE `detail_pembelian` (
  `no_item` int(100) NOT NULL,
  `no_pembelian` varchar(100) DEFAULT NULL,
  `kd_barang` varchar(100) DEFAULT NULL,
  `kode_jenis` varchar(20) DEFAULT NULL,
  `jumlah_barang` int(30) DEFAULT NULL,
  `harga_barang` int(30) DEFAULT NULL,
  `total_harga` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_pembelian`
--

INSERT INTO `detail_pembelian` (`no_item`, `no_pembelian`, `kd_barang`, `kode_jenis`, `jumlah_barang`, `harga_barang`, `total_harga`) VALUES
(1, 'BUY-20260511055230', 'BR-003', 'ATK-001', 50, 4000, 200000),
(2, 'BUY-20260511060507', 'BR-002', 'JN-001', 50, 42000, 2100000),
(3, 'BUY-20260511061016', 'BR-001', 'JN-001', 30, 40000, 1200000),
(4, 'BUY-20260511061053', 'BR-003', 'ATK-001', 10, 4000, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `no_item` int(100) NOT NULL,
  `no_penjualan` varchar(30) DEFAULT NULL,
  `kd_barang` varchar(100) DEFAULT NULL,
  `kode_jenis` varchar(20) DEFAULT NULL,
  `jumlah_barang` int(30) DEFAULT NULL,
  `harga_barang` int(30) DEFAULT NULL,
  `total_harga` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `kd_barang` varchar(100) NOT NULL,
  `kode_jenis` varchar(20) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `stok` int(11) DEFAULT NULL,
  `harga_beli` int(11) DEFAULT NULL,
  `harga_jual` int(11) DEFAULT NULL,
  `gambar_produk` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`kd_barang`, `kode_jenis`, `nama_barang`, `stok`, `harga_beli`, `harga_jual`, `gambar_produk`) VALUES
('BR-001', 'JN-001', 'Oli SPX 2', 150, 40000, 50000, '1777877168_SPX2.jpg-IMAGE.jpg'),
('BR-002', 'JN-001', 'Oli MPX 2', 100, 42000, 45000, '1777877404_Oli-MPX2.jpg'),
('BR-003', 'ATK-001', 'Buku Tulis', 60, 4000, 7000, '1778471547_Buku-Tulis-Campuss-50-Lembar.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `id_customer` varchar(100) NOT NULL,
  `nama_customer` text DEFAULT NULL,
  `jenis_kelamin` varchar(100) DEFAULT NULL,
  `alamat_customer` text DEFAULT NULL,
  `telepon_customer` varchar(100) DEFAULT NULL,
  `email_customer` varchar(100) DEFAULT NULL,
  `pass_customer` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `kode_jenis` varchar(20) NOT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `satuan` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_jenis`
--

INSERT INTO `tb_jenis` (`kode_jenis`, `jenis`, `satuan`) VALUES
('ATK-001', 'Alat Tulis Kantor', 'pcs'),
('JN-001', 'Otomotif', 'Pcs'),
('JN-002', 'Pakaian', 'Lusin');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pembelian`
--

CREATE TABLE `tb_pembelian` (
  `no_pembelian` varchar(100) NOT NULL,
  `tanggal_pembelian` varchar(30) DEFAULT NULL,
  `id_supplier` varchar(100) DEFAULT NULL,
  `total_barangall` int(30) DEFAULT NULL,
  `total_hargaall` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pembelian`
--

INSERT INTO `tb_pembelian` (`no_pembelian`, `tanggal_pembelian`, `id_supplier`, `total_barangall`, `total_hargaall`) VALUES
('BUY-20260511055230', '2026-05-11', '2', 50, 200000),
('BUY-20260511060507', '2026-05-11', '1', 50, 2100000),
('BUY-20260511061016', '2026-05-11', '1', 30, 1200000),
('BUY-20260511061053', '2026-05-11', '2', 10, 40000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_penjualan`
--

CREATE TABLE `tb_penjualan` (
  `no_penjualan` varchar(30) NOT NULL,
  `tanggal_penjualan` varchar(30) DEFAULT NULL,
  `id_customer` varchar(100) DEFAULT NULL,
  `total_barangall` int(30) DEFAULT NULL,
  `total_hargaall` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tb_supplier`
--

CREATE TABLE `tb_supplier` (
  `id_supplier` varchar(100) NOT NULL,
  `nama_supplier` text DEFAULT NULL,
  `alamat_supplier` text DEFAULT NULL,
  `telepon_supplier` varchar(100) DEFAULT NULL,
  `email_supplier` varchar(100) DEFAULT NULL,
  `pass_supplier` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_supplier`
--

INSERT INTO `tb_supplier` (`id_supplier`, `nama_supplier`, `alamat_supplier`, `telepon_supplier`, `email_supplier`, `pass_supplier`) VALUES
('1', 'PT. Indojaya', 'Purwakarta', '081294950241', 'indojaya@gmail.com', NULL),
('2', 'PT. GrahaMas', 'Bandung', '08517245236711', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(55) NOT NULL,
  `password` varchar(55) NOT NULL,
  `tipe_user` varchar(50) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `tipe_user`) VALUES
(8, 'dapa', 'f7304c05a5c5806d5b44ea8b7295e2e6', 'admin'),
(10, 'user', '6ad14ba9986e3615423dfca256d04e3f', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD PRIMARY KEY (`no_item`),
  ADD KEY `no_pembelian` (`no_pembelian`),
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `kode_jenis` (`kode_jenis`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`no_item`),
  ADD KEY `no_penjualan` (`no_penjualan`),
  ADD KEY `kd_barang` (`kd_barang`),
  ADD KEY `kode_jenis` (`kode_jenis`);

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`kd_barang`),
  ADD KEY `kode_jenis` (`kode_jenis`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`kode_jenis`);

--
-- Indexes for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD PRIMARY KEY (`no_pembelian`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indexes for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD PRIMARY KEY (`no_penjualan`),
  ADD KEY `id_customer` (`id_customer`);

--
-- Indexes for table `tb_supplier`
--
ALTER TABLE `tb_supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  MODIFY `no_item` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `detail_pembelian`
--
ALTER TABLE `detail_pembelian`
  ADD CONSTRAINT `detail_pembelian_ibfk_1` FOREIGN KEY (`no_pembelian`) REFERENCES `tb_pembelian` (`no_pembelian`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pembelian_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `tb_barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_pembelian_ibfk_3` FOREIGN KEY (`kode_jenis`) REFERENCES `tb_jenis` (`kode_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD CONSTRAINT `detail_penjualan_ibfk_1` FOREIGN KEY (`no_penjualan`) REFERENCES `tb_penjualan` (`no_penjualan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_ibfk_2` FOREIGN KEY (`kd_barang`) REFERENCES `tb_barang` (`kd_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_penjualan_ibfk_3` FOREIGN KEY (`kode_jenis`) REFERENCES `tb_jenis` (`kode_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD CONSTRAINT `tb_barang_ibfk_1` FOREIGN KEY (`kode_jenis`) REFERENCES `tb_jenis` (`kode_jenis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pembelian`
--
ALTER TABLE `tb_pembelian`
  ADD CONSTRAINT `tb_pembelian_ibfk_1` FOREIGN KEY (`id_supplier`) REFERENCES `tb_supplier` (`id_supplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_penjualan`
--
ALTER TABLE `tb_penjualan`
  ADD CONSTRAINT `tb_penjualan_ibfk_1` FOREIGN KEY (`id_customer`) REFERENCES `tb_customer` (`id_customer`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
