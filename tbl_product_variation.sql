-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 06:16 PM
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
-- Database: `ukmoutlet`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_variation`
--

CREATE TABLE `tbl_product_variation` (
  `num` int(11) NOT NULL,
  `fld_product_id` int(11) NOT NULL,
  `fld_product_size` varchar(50) NOT NULL,
  `fld_product_color` varchar(50) NOT NULL,
  `fld_produk_stock` int(11) NOT NULL,
  `fld_producy_price` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_variation`
--

INSERT INTO `tbl_product_variation` (`num`, `fld_product_id`, `fld_product_size`, `fld_product_color`, `fld_produk_stock`, `fld_producy_price`) VALUES
(1, 1, 'S', 'FF5722', 12, 60),
(2, 1, 'S', 'FFC107', 12, 60),
(3, 1, 'S', '8BC34A', 12, 60),
(4, 1, 'M', 'FF5722', 12, 65),
(5, 1, 'M', 'FFC107', 12, 65),
(6, 1, 'M', '8BC34A', 12, 65),
(7, 1, 'L', 'FF5722', 12, 70),
(8, 1, 'L', 'FFC107', 12, 70),
(9, 1, 'L', '8BC34A', 12, 70),
(10, 1, 'XL', 'FF5722', 12, 75),
(11, 1, 'XL', 'FFC107', 12, 75),
(12, 1, 'XL', 'FFC107', 12, 75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product_variation`
--
ALTER TABLE `tbl_product_variation`
  ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product_variation`
--
ALTER TABLE `tbl_product_variation`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
