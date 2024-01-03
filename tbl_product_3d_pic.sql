-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2023 at 07:34 PM
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
(1, 'kiy1.png', 'kiy2.png', 'kiy3.png', 'kiy4.png', 'kiy5.png', 'kiy6.png', 'kiy7.png', 'kiy8.png', 'kiy9.png', 'kiy10.png', 'kiy11.png', 'kiy12.png', 'kiy13.png', 'kiy14.png', 'kiy15.png', 'kiy16.png', 'kiy17.png', 'kiy18.png', 'kiy19.png', 'kiy20.png', 'kiy21.png', 'kiy22.png', 'kiy23.png', 'kiy24.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_product_3d_pic`
--
ALTER TABLE `tbl_product_3d_pic`
  ADD PRIMARY KEY (`fld_product_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_product_3d_pic`
--
ALTER TABLE `tbl_product_3d_pic`
  MODIFY `fld_product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
