-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 10, 2021 at 06:48 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_phms`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblpropownership`
--

CREATE TABLE `tblpropownership` (
  `poid` int(11) UNSIGNED NOT NULL COMMENT 'primary key for tblPropOwnership',
  `propId` int(11) UNSIGNED NOT NULL COMMENT 'tblPropOwnership(propId)->tblProp(pId)',
  `qty` int(5) UNSIGNED NOT NULL COMMENT 'total number of props available',
  `price` decimal(10,2) UNSIGNED NOT NULL COMMENT 'price is as per one prop',
  `ownership` varchar(20) NOT NULL COMMENT 'owner of the prop if owned or rented',
  `intId` int(11) UNSIGNED NOT NULL COMMENT 'tblPropOwnership(intId)->tblInventoryType(iType)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpropownership`
--

INSERT INTO `tblpropownership` (`poid`, `propId`, `qty`, `price`, `ownership`, `intId`) VALUES
(1, 1, 4, '23000.00', 'owner', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblpropownership`
--
ALTER TABLE `tblpropownership`
  ADD PRIMARY KEY (`poid`),
  ADD KEY `FK_tblPropOwnership_tblProps` (`propId`),
  ADD KEY `FK_tblPropOwnership_tblInventoryType` (`intId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblpropownership`
--
ALTER TABLE `tblpropownership`
  MODIFY `poid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key for tblPropOwnership', AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblpropownership`
--
ALTER TABLE `tblpropownership`
  ADD CONSTRAINT `FK_tblPropOwnership_tblInventoryType` FOREIGN KEY (`intId`) REFERENCES `tblinventorytype` (`itid`),
  ADD CONSTRAINT `FK_tblPropOwnership_tblProps` FOREIGN KEY (`propId`) REFERENCES `tblprops` (`pId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
