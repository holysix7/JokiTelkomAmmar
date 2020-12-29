-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 29, 2020 at 03:57 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pa_ammar`
--

-- --------------------------------------------------------

--
-- Table structure for table `md_kuah`
--

CREATE TABLE `md_kuah` (
  `id` int(11) NOT NULL,
  `nama_kuah` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `md_kuah`
--

INSERT INTO `md_kuah` (`id`, `nama_kuah`) VALUES
(1, 'Kare'),
(2, 'Oriental'),
(3, 'Tomyan');

-- --------------------------------------------------------

--
-- Table structure for table `md_lv_pedas`
--

CREATE TABLE `md_lv_pedas` (
  `id` int(11) NOT NULL,
  `lvl_pedas` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `md_lv_pedas`
--

INSERT INTO `md_lv_pedas` (`id`, `lvl_pedas`) VALUES
(1, 'Kenalan'),
(2, 'Modus'),
(3, 'Baper'),
(4, 'Harkos'),
(5, 'Putus Cinta');

-- --------------------------------------------------------

--
-- Table structure for table `md_menu`
--

CREATE TABLE `md_menu` (
  `id` int(11) NOT NULL,
  `id_bahan_1` int(11) NOT NULL,
  `id_bahan_2` int(11) NOT NULL,
  `id_bahan_3` int(11) DEFAULT NULL,
  `id_bahan_4` int(11) DEFAULT NULL,
  `id_bahan_5` int(11) DEFAULT NULL,
  `nama_menu` varchar(255) NOT NULL,
  `harga_menu` int(11) NOT NULL,
  `jenis_menu` enum('Makanan','Minuman','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `md_menu`
--

INSERT INTO `md_menu` (`id`, `id_bahan_1`, `id_bahan_2`, `id_bahan_3`, `id_bahan_4`, `id_bahan_5`, `nama_menu`, `harga_menu`, `jenis_menu`) VALUES
(23, 6, 16, 17, 20, 21, 'Ramen Akhir Bulan', 16900, 'Makanan'),
(24, 6, 14, 17, 16, 20, 'Tebasaki Ramen', 24700, 'Makanan'),
(25, 6, 15, 16, 17, 20, 'Karage Ramen', 24700, 'Makanan'),
(26, 6, 12, 16, 10, 20, 'Sausage Ramen', 22100, 'Makanan'),
(27, 6, 11, 16, 20, 17, 'Katsu Ramen', 20800, 'Makanan'),
(28, 27, 28, 0, 0, 0, 'Esteh', 3300, 'Minuman'),
(29, 6, 17, 21, 12, 18, 'Ramen Otaku', 27300, 'Makanan');

-- --------------------------------------------------------

--
-- Table structure for table `md_pelanggan`
--

CREATE TABLE `md_pelanggan` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `customer_phone` varchar(15) NOT NULL,
  `customer_status` enum('Sedang Makan','Belum Makan','Selesai Makan','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `md_pelanggan`
--

INSERT INTO `md_pelanggan` (`id`, `customer_name`, `customer_phone`, `customer_status`) VALUES
(15, 'Dolken', '0825550316', 'Belum Makan'),
(16, 'rangga', '87546546645', 'Belum Makan');

-- --------------------------------------------------------

--
-- Table structure for table `md_stok`
--

CREATE TABLE `md_stok` (
  `id` int(11) NOT NULL,
  `nama_stok` varchar(255) NOT NULL,
  `jumlah_stok` varchar(255) NOT NULL,
  `unit_price` int(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `md_stok`
--

INSERT INTO `md_stok` (`id`, `nama_stok`, `jumlah_stok`, `unit_price`) VALUES
(6, 'Mie ', '9', 5000),
(7, 'Chikua', '30', 5000),
(8, 'Batagor', '30', 2000),
(9, 'Crabstick', '30', 5000),
(10, 'Kerupuk', '29', 2000),
(11, 'Katsu', '30', 5000),
(12, 'Cocktail', '28', 5000),
(13, 'Udang', '30', 5000),
(14, 'Chiken', '21', 8000),
(15, 'Baso', '26', 8000),
(16, 'telur', '10', 3000),
(17, 'Sayur', '10', 1000),
(18, 'Cumi', '29', 8000),
(19, 'Beef', '30', 10000),
(20, 'Somay', '10', 2000),
(21, 'Tahu', '23', 2000),
(27, 'Gula', '22', 1000),
(28, 'Teh celup', '22', 2000);

-- --------------------------------------------------------

--
-- Table structure for table `md_supplier`
--

CREATE TABLE `md_supplier` (
  `id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `md_supplier`
--

INSERT INTO `md_supplier` (`id`, `supplier_name`, `address`, `phone`) VALUES
(9, 'Burung Layang Terbang', ' Jl. Laswi no 90', '0822897654'),
(10, 'Bu haji daging', ' Jl. Laswi no 100', '08556478913');

-- --------------------------------------------------------

--
-- Table structure for table `md_table`
--

CREATE TABLE `md_table` (
  `id` int(11) NOT NULL,
  `table_number` varchar(111) NOT NULL,
  `table_type` varchar(255) NOT NULL,
  `table_status` enum('Tidak Diisi','Sedang Diisi','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `md_table`
--

INSERT INTO `md_table` (`id`, `table_number`, `table_type`, `table_status`) VALUES
(1, '001', 'Untuk Berdua', 'Tidak Diisi'),
(2, '002', 'Untuk Berdua', 'Tidak Diisi'),
(3, '003', 'Untuk Berempat', 'Tidak Diisi'),
(4, '004', 'Untuk Berempat', 'Tidak Diisi'),
(5, '005', 'Untuk Berenam', 'Tidak Diisi'),
(6, '006', 'Untuk Berenam', 'Tidak Diisi'),
(7, '007', 'Untuk Berempat', 'Tidak Diisi');

-- --------------------------------------------------------

--
-- Table structure for table `tr_penjualan`
--

CREATE TABLE `tr_penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_pedas` int(11) DEFAULT NULL,
  `id_kuah` int(11) DEFAULT NULL,
  `id_meja` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_penjualan` datetime NOT NULL,
  `status_penjualan` enum('Show','Hide','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_penjualan`
--

INSERT INTO `tr_penjualan` (`id_penjualan`, `id_pelanggan`, `id_menu`, `id_pedas`, `id_kuah`, `id_meja`, `jumlah`, `total_harga`, `tanggal_penjualan`, `status_penjualan`) VALUES
(28, 16, 23, 5, 1, 1, 2, 33800, '2020-12-29 08:33:15', 'Hide'),
(29, 15, 23, 1, 1, 1, 2, 33800, '2020-12-29 09:35:59', 'Hide'),
(30, 16, 23, 1, 1, 1, 2, 33800, '2020-12-29 09:37:16', ''),
(31, 16, 26, 2, 1, 2, 1, 22100, '2020-12-29 09:45:07', ''),
(32, 16, 28, 2, 1, 7, 1, 3300, '2020-12-29 09:48:19', ''),
(33, 15, 25, 2, 1, 4, 1, 24700, '2020-12-29 09:52:27', ''),
(34, 15, 25, 3, 1, 1, 2, 49400, '2020-12-29 09:56:22', ''),
(35, 15, 25, 2, 1, 4, 1, 24700, '2020-12-29 09:56:31', ''),
(36, 16, 24, 1, 1, 2, 1, 24700, '2020-12-29 09:56:47', ''),
(37, 16, 24, 1, 1, 4, 2, 49400, '2020-12-29 09:57:06', '');

-- --------------------------------------------------------

--
-- Table structure for table `tr_persediaan`
--

CREATE TABLE `tr_persediaan` (
  `id` int(11) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `id_stok` int(11) NOT NULL,
  `amount` int(15) NOT NULL,
  `total_price` int(15) NOT NULL,
  `purchase_date` date NOT NULL,
  `expired_date` date NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tr_persediaan`
--

INSERT INTO `tr_persediaan` (`id`, `id_supplier`, `id_stok`, `amount`, `total_price`, `purchase_date`, `expired_date`, `status`) VALUES
(17, 9, 6, 30, 150000, '2020-12-28', '2021-03-31', 'Disetujui'),
(18, 9, 7, 30, 150000, '2020-12-28', '2021-03-31', 'Disetujui'),
(20, 9, 8, 30, 60000, '2020-12-28', '2021-03-31', 'Disetujui'),
(21, 9, 9, 30, 150000, '2020-12-28', '2021-03-31', 'Disetujui'),
(22, 9, 10, 30, 60000, '2020-12-28', '2021-03-31', 'Disetujui'),
(23, 9, 11, 30, 150000, '2020-12-28', '2021-03-31', 'Disetujui'),
(24, 9, 12, 30, 150000, '2020-12-28', '2021-03-31', 'Disetujui'),
(25, 10, 13, 30, 150000, '2020-12-28', '2021-03-31', 'Disetujui'),
(26, 10, 14, 30, 240000, '2020-12-28', '2021-03-31', 'Disetujui'),
(27, 10, 15, 30, 240000, '2020-12-28', '2021-03-31', 'Disetujui'),
(28, 10, 16, 30, 90000, '2020-12-28', '2021-03-31', 'Disetujui'),
(29, 9, 17, 30, 30000, '2020-12-28', '2021-03-31', 'Disetujui'),
(30, 10, 18, 30, 240000, '2020-12-28', '2021-03-31', 'Disetujui'),
(31, 10, 19, 30, 300000, '2020-12-28', '2021-03-31', 'Disetujui'),
(32, 9, 20, 30, 60000, '2020-12-28', '2021-03-31', 'Disetujui'),
(34, 9, 21, 30, 60000, '2020-12-28', '2021-03-31', 'Disetujui'),
(35, 9, 22, 30, 150000, '2020-12-28', '2021-03-31', 'Disetujui'),
(36, 9, 23, 30, 150000, '2020-12-28', '2021-03-31', 'Disetujui'),
(37, 9, 24, 30, 150000, '2020-12-28', '2021-03-30', 'Disetujui'),
(38, 9, 25, 30, 150000, '2020-12-28', '2021-03-31', 'Disetujui'),
(39, 9, 26, 30, 150000, '2020-12-28', '2021-03-31', 'Disetujui'),
(40, 9, 27, 30, 30000, '2020-12-28', '2021-03-31', 'Disetujui'),
(41, 9, 28, 30, 60000, '2020-12-28', '2021-03-31', 'Disetujui');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `name`, `role`) VALUES
(9, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'superadmin'),
(10, 'fikri', '5d4864249b21de08642aa6ff4178b346', 'fikri', 'karyawan'),
(11, 'udin', '25d55ad283aa400af464c76d713c07ad', 'udin', 'karyawan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `md_kuah`
--
ALTER TABLE `md_kuah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_lv_pedas`
--
ALTER TABLE `md_lv_pedas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_menu`
--
ALTER TABLE `md_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_pelanggan`
--
ALTER TABLE `md_pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_stok`
--
ALTER TABLE `md_stok`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_supplier`
--
ALTER TABLE `md_supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_table`
--
ALTER TABLE `md_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tr_penjualan`
--
ALTER TABLE `tr_penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `tr_persediaan`
--
ALTER TABLE `tr_persediaan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `md_kuah`
--
ALTER TABLE `md_kuah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `md_lv_pedas`
--
ALTER TABLE `md_lv_pedas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `md_menu`
--
ALTER TABLE `md_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `md_pelanggan`
--
ALTER TABLE `md_pelanggan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `md_stok`
--
ALTER TABLE `md_stok`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `md_supplier`
--
ALTER TABLE `md_supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `md_table`
--
ALTER TABLE `md_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tr_penjualan`
--
ALTER TABLE `tr_penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `tr_persediaan`
--
ALTER TABLE `tr_persediaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
