-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 11:44 AM
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
(1, 'KIY', 'P001.png', 'Jersey UKM 2022', 'Great jersey that represents UKM', 5, 'Nice Material'),
(2, 'KBH', 'P002.png', 'Baju KBH', 'KBH punya baju tak cantik', 5, 'bagus ini barang'),
(3, 'FTSM', 'P003.png', 'Baju FTSM', 'Baju Fakulty', 1, 'buuuuu'),
(4, 'FTSM', 'P004.png', 'Baju Programming Club', 'weewoooo', 4, 'cantikk');

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
  `fld_image_13` varchar(50) NOT NULL,
  `fld_image_14` varchar(50) NOT NULL,
  `fld_image_15` varchar(50) NOT NULL,
  `fld_image_16` varchar(50) NOT NULL,
  `fld_image_17` varchar(50) NOT NULL,
  `fld_image_18` varchar(50) NOT NULL,
  `fld_image_19` varchar(50) NOT NULL,
  `fld_image_20` varchar(50) NOT NULL,
  `fld_image_21` varchar(50) NOT NULL,
  `fld_image_22` varchar(50) NOT NULL,
  `fld_image_23` varchar(50) NOT NULL,
  `fld_image_24` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_product_3d_pic`
--

INSERT INTO `tbl_product_3d_pic` (`fld_product_id`, `fld_image_1`, `fld_image_2`, `fld_image_3`, `fld_image_4`, `fld_image_5`, `fld_image_6`, `fld_image_7`, `fld_image_8`, `fld_image_9`, `fld_image_10`, `fld_image_11`, `fld_image_12`, `fld_image_13`, `fld_image_14`, `fld_image_15`, `fld_image_16`, `fld_image_17`, `fld_image_18`, `fld_image_19`, `fld_image_20`, `fld_image_21`, `fld_image_22`, `fld_image_23`, `fld_image_24`) VALUES
(1, 'kiy1.png', 'kiy2.png', 'kiy3.png', 'kiy4.png', 'kiy5.png', 'kiy6.png', 'kiy7.png', 'kiy8.png', 'kiy9.png', 'kiy10.png', 'kiy11.png', 'kiy12.png', 'kiy13.png', 'kiy14.png', 'kiy15.png', 'kiy16.png', 'kiy17.png', 'kiy18.png', 'kiy19.png', 'kiy20.png', 'kiy21.png', 'kiy22.png', 'kiy23.png', 'kiy24.png'),
(2, 'kbh1.png', 'kbh2.png', 'kbh3.png', 'kbh4.png', 'kbh5.png', 'kbh6.png', 'kbh7.png', 'kbh8.png', 'kbh9.png', 'kbh10.png', 'kbh11.png', 'kbh12.png', 'kbh13.png', 'kbh14.png', 'kbh15.png', 'kbh16.png', 'kbh17.png', 'kbh18.png', 'kbh19.png', 'kbh20.png', 'kbh21.png', 'kbh22.png', 'kbh23.png', 'kbh24.png'),
(3, 'vic1.png', 'vic2.png', 'vic3.png', 'vic4.png', 'vic5.png', 'vic6.png', 'vic7.png', 'vic8.png', 'vic9.png', 'vic10.png', 'vic11.png', 'vic12.png', 'vic13.png', 'vic14.png', 'vic15.png', 'vic16.png', 'vic17.png', 'vic18.png', 'vic19.png', 'vic20.png', 'vic21.png', 'vic22.png', 'vic23.png', 'vic24.png'),
(4, '1.png', '2.png', '3.png', '4.png', '5.png', '6.png', '7.png', '8.png', '9.png', '10.png', '11.png', '12.png', '13.png', '14.png', '15.png', '16.png', '17.png', '18.png', '19.png', '20.png', '21.png', '22.png', '23.png', '24.png');

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
(12, 1, 'XL', 'FFC107', 12, 75),
(13, 2, 'S', '8BC34A', 12, 60),
(14, 2, 'L', 'FFC107', 12, 70),
(15, 3, 'S', 'FF5722', 12, 60),
(16, 3, 'M', '8BC34A', 12, 50),
(17, 4, 'S', 'FF5722', 12, 60),
(18, 4, 'M', '8BC34A', 12, 50);

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
-- Indexes for table `tbl_product_variation`
--
ALTER TABLE `tbl_product_variation`
  ADD PRIMARY KEY (`num`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_Id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_product_3d_pic`
--
ALTER TABLE `tbl_product_3d_pic`
  MODIFY `fld_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_product_variation`
--
ALTER TABLE `tbl_product_variation`
  MODIFY `num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
