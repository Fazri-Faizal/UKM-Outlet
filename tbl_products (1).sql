-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 10, 2023 at 03:00 PM
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
-- Table structure for table `tbl_products`
--

CREATE TABLE `tbl_products` (
  `product_Id` int(30) NOT NULL,
  `product_Type` varchar(11) NOT NULL,
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

INSERT INTO `tbl_products` (`product_Id`, `product_Type`, `origin_id`, `pic`, `product_Name`, `product_Description`, `product_Rating`, `product_Review`) VALUES
(1, 'Jersey', 'KIY', 'p001.png', 'Jersey UKM 2022', 'Great jersey that represents UKM', 5, 'Nice Material'),
(2, 'Jersey', 'KBH', 'P002.png', 'Baju KBH', 'KBH punya baju tak cantik', 5, 'bagus ini barang'),
(3, 'Jersey', 'FTSM', 'P003.png', 'Baju FTSM', 'Baju Fakulty', 1, 'buuuuu'),
(4, 'Lanyard', 'KAB', 'P004.png', 'KDO Official Lanyard', 'lorem ipsum dolor sit amet', 4, 'sayaa sukaa sayaa sukaa'),
(5, 'Hoodie', 'FKAB', 'P005.png', 'Awesome KAB Hoodie', 'lorem ipsum dolor sit amet', 3, 'amaatt baguuuss'),
(6, 'Tote Bag', 'FPI', 'P006.png', 'FPI annual tote bag', 'Tote Bag specifically made for FPI and UKM students', 5, 'Very Good products'),
(7, 'Hoodie', 'FPEND', 'P007.png', '\"FIRE FPEND\" Limited edition Jersey', '\"FIRE FPEND\" Limited edition Jersey \r\nmaterial - cotton\r\n', 4, 'too good'),
(8, 'Cap', 'FTSM', 'P008.png', 'PC Cap', 'Programming club SIG cap', 3, 'sangat bagus'),
(9, 'Lanyard', 'FEP', 'P009.png', 'FPER new Lanyard', 'FPER lanyard cantik dan warna warni', 4, 'very colourful'),
(10, 'Tote Bag', 'FSSK', 'P010.png', 'FSSK Sports Tote Bag', 'Tote bag tahunan FSSK', 5, 'cantik banget'),
(11, 'Cap', 'FARMASI', 'P011.png', 'UKM FARMASI capt', 'FARAMASI UKM baseball cap', 5, 'cantik wooo');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_products`
--
ALTER TABLE `tbl_products`
  ADD PRIMARY KEY (`product_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_products`
--
ALTER TABLE `tbl_products`
  MODIFY `product_Id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
