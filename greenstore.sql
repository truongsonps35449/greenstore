-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 20, 2023 at 03:33 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `greenstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luan`
--

CREATE TABLE `binh_luan` (
  `ma_bl` int NOT NULL,
  `noi_dung` text COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ma_sp` int NOT NULL,
  `ma_tk` int NOT NULL,
  `ngay_bl` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ct_don_hang`
--

CREATE TABLE `ct_don_hang` (
  `ma_ctdh` int NOT NULL,
  `ma_dh` int NOT NULL,
  `ma_tk` int NOT NULL,
  `vourcher` varchar(10) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ptt` set('COD','Card','momo','') COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Phi_ship` int NOT NULL,
  `Tong_tien_ctdh` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `danh_muc`
--

CREATE TABLE `danh_muc` (
  `ma_dm` int NOT NULL,
  `ten_dm` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `don_hang`
--

CREATE TABLE `don_hang` (
  `ma_dh` int NOT NULL,
  `ma_sp` int NOT NULL,
  `ngay_lap` datetime NOT NULL,
  `so_luong_mua` int NOT NULL,
  `tong_tien` int NOT NULL,
  `trang_thai` set('Xác nhận đơn hàng','Đang giao hàng','Giao hàng thành công','Giao hàng thất bại') COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `san_pham`
--

CREATE TABLE `san_pham` (
  `Ma_sp` int NOT NULL,
  `Ten_sp` varchar(225) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Gia` int NOT NULL,
  `Luot_xem` int NOT NULL DEFAULT '0',
  `Hinh_sp` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Hinh_sp_nho_1` varchar(225) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Hinh_sp_nho_2` varchar(225) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Ngay_nhap` date NOT NULL,
  `Mo_ta_ngan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `Mo_ta_ct` int NOT NULL,
  `ma_dm` int NOT NULL,
  `so_luong` int NOT NULL DEFAULT '0',
  `da_ban` int NOT NULL DEFAULT '0',
  `Ghim` int DEFAULT '0' COMMENT 'khác 0 sp đc ghim lên trang chủ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `ma_tk` int NOT NULL,
  `mat_khau` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `ten_tk` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `quyen` int NOT NULL,
  `email` varchar(50) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `dia_chi` text COLLATE utf8mb4_unicode_520_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD PRIMARY KEY (`ma_bl`),
  ADD KEY `ma_sp` (`ma_sp`),
  ADD KEY `ma_tk` (`ma_tk`);

--
-- Indexes for table `ct_don_hang`
--
ALTER TABLE `ct_don_hang`
  ADD PRIMARY KEY (`ma_ctdh`),
  ADD KEY `ma_dh` (`ma_dh`),
  ADD KEY `ct_don_hang_ibfk_2` (`ma_tk`);

--
-- Indexes for table `danh_muc`
--
ALTER TABLE `danh_muc`
  ADD PRIMARY KEY (`ma_dm`);

--
-- Indexes for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD PRIMARY KEY (`ma_dh`),
  ADD KEY `don_hang_ibfk_1` (`ma_sp`);

--
-- Indexes for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD PRIMARY KEY (`Ma_sp`),
  ADD KEY `ma_dm` (`ma_dm`);

--
-- Indexes for table `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`ma_tk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `san_pham`
--
ALTER TABLE `san_pham`
  MODIFY `Ma_sp` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luan`
--
ALTER TABLE `binh_luan`
  ADD CONSTRAINT `binh_luan_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`Ma_sp`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `binh_luan_ibfk_2` FOREIGN KEY (`ma_tk`) REFERENCES `tai_khoan` (`ma_tk`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `ct_don_hang`
--
ALTER TABLE `ct_don_hang`
  ADD CONSTRAINT `ct_don_hang_ibfk_1` FOREIGN KEY (`ma_dh`) REFERENCES `don_hang` (`ma_dh`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `ct_don_hang_ibfk_2` FOREIGN KEY (`ma_tk`) REFERENCES `tai_khoan` (`ma_tk`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `don_hang`
--
ALTER TABLE `don_hang`
  ADD CONSTRAINT `don_hang_ibfk_1` FOREIGN KEY (`ma_sp`) REFERENCES `san_pham` (`Ma_sp`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Constraints for table `san_pham`
--
ALTER TABLE `san_pham`
  ADD CONSTRAINT `san_pham_ibfk_1` FOREIGN KEY (`ma_dm`) REFERENCES `danh_muc` (`ma_dm`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
