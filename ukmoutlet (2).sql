-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2023 at 12:09 PM
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
-- Table structure for table `tbl_college`
--

CREATE TABLE `tbl_college` (
  `college_Id` varchar(10) NOT NULL,
  `college_Name` varchar(255) NOT NULL,
  `college_SName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_college`
--

INSERT INTO `tbl_college` (`college_Id`, `college_Name`, `college_SName`) VALUES
('KBH', 'Kolej Burhanuddin Helmi', 'KBH'),
('KIY', 'Kolej Ibrahim Yaakub', 'KIY'),
('KUO', 'Kolej Ungku Omar', 'KUO');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_faculty`
--

CREATE TABLE `tbl_faculty` (
  `faculty_Id` varchar(10) NOT NULL,
  `faculty_Name` varchar(255) NOT NULL,
  `faculty_SName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_faculty`
--

INSERT INTO `tbl_faculty` (`faculty_Id`, `faculty_Name`, `faculty_SName`) VALUES
('FEP', 'Fakulti Ekonomi Perundangan', 'FEP'),
('FPI', 'Fakulti Pendidikan Islam', 'FPI'),
('FTSM', 'Fakulti Teknologi dan Sains Maklumat', 'FTSM');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_Id` int(30) NOT NULL,
  `origin_id` varchar(50) NOT NULL,
  `pic` varchar(10) NOT NULL,
  `product_Name` varchar(255) NOT NULL,
  `product_Description` varchar(255) NOT NULL,
  `product_Rating` int(11) NOT NULL,
  `product_Review` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_products`
--

INSERT INTO `tbl_products` (`product_Id`, `origin_id`, `pic`, `product_Name`, `product_Description`, `product_Rating`, `product_Review`) VALUES
(1, 'KIY', 'p001.png', 'Jersey UKM 2022', 'Great jersey that represents UKM', 5, 'Nice Material'),
(2, 'KBH', 'P002.png', 'Baju KBH', 'KBH punya baju tak cantik', 5, 'bagus ini barang'),
(3, 'FTSM', 'P003.png', 'Baju FTSM', 'Baju Fakulty', 1, 'buuuuu');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_3d_pic`
--

CREATE TABLE `tbl_product_3d_pic` (
  `fld_product_id` int(11) NOT NULL,
  `fld_image_1` varchar(50) NOT NULL,
  `fld_image_2` varchar(50) NOT NULL,
  `fld_image_3` varchar(50) NOT NULL,
  `fld_image_4` varchar(50) NOT NULL,
  `fld_image_5` varchar(50) NOT NULL,
  `fld_image_6` varchar(50) NOT NULL,
  `fld_image_7` varchar(50) NOT NULL,
  `fld_image_8` varchar(50) NOT NULL,
  `fld_image_9` varchar(50) NOT NULL,
  `fld_image_10` varchar(50) NOT NULL,
  `fld_image_11` varchar(50) NOT NULL,
  `fld_image_12` varchar(50) NOT NULL,
  `fld_image_13` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_3d_pic`
--

INSERT INTO `tbl_product_3d_pic` (`fld_product_id`, `fld_image_1`, `fld_image_2`, `fld_image_3`, `fld_image_4`, `fld_image_5`, `fld_image_6`, `fld_image_7`, `fld_image_8`, `fld_image_9`, `fld_image_10`, `fld_image_11`, `fld_image_12`, `fld_image_13`) VALUES
(1, '3d01.png', '3d02.png', '3d03.png', '3d04.png', '3d05.png', '3d06.png', '3d07.png', '3d08.png', '3d09.png', '3d10.png', '3d11.png', '3d12.png', '3d13.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product_variation`
--

CREATE TABLE `tbl_product_variation` (
  `fld_product_id` int(11) NOT NULL,
  `fld_product_size` varchar(50) NOT NULL,
  `fld_product_color` varchar(50) NOT NULL,
  `fld_produk_stock` int(11) NOT NULL,
  `fld_producy_price` decimal(11,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_variation`
--

INSERT INTO `tbl_product_variation` (`fld_product_id`, `fld_product_size`, `fld_product_color`, `fld_produk_stock`, `fld_producy_price`) VALUES
(1, 'S', 'Yellow', 12, 60),
(1, 'S', 'Red', 12, 60),
(1, 'S', 'Green', 12, 60),
(1, 'M', 'Yellow', 12, 65),
(1, 'M', 'Red', 12, 65),
(1, 'M', 'Green', 12, 65),
(1, 'L', 'Yellow', 12, 70),
(1, 'L', 'Red', 12, 70),
(1, 'L', 'Green', 12, 70),
(1, 'XL', 'Yellow', 12, 75),
(1, 'XL', 'Red', 12, 75),
(1, 'XL', 'Red', 12, 75);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_college`
--
ALTER TABLE `tbl_college`
  ADD PRIMARY KEY (`college_Id`);

--
-- Indexes for table `tbl_faculty`
--
ALTER TABLE `tbl_faculty`
  ADD PRIMARY KEY (`faculty_Id`);

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_Id`);

--
-- Indexes for table `tbl_product_3d_pic`
--
ALTER TABLE `tbl_product_3d_pic`
  ADD PRIMARY KEY (`fld_product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_Id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_product_3d_pic`
--
ALTER TABLE `tbl_product_3d_pic`
  MODIFY `fld_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
