-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2021 at 06:56 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `production_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblpackagemaster`
--

CREATE TABLE `tblpackagemaster` (
  `pid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for Packages',
  `packageName` varchar(50) NOT NULL COMMENT 'Different packages names',
  `photoCount` int(11) NOT NULL COMMENT 'The Count of photos per package',
  `videoCount` int(11) NOT NULL COMMENT 'The Count of videos per package',
  `price` decimal(10,2) NOT NULL,
  `type` varchar(20) NOT NULL COMMENT 'The type of the package',
  `description` varchar(50) NOT NULL DEFAULT 'This is package description',
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpackagemaster`
--

INSERT INTO `tblpackagemaster` (`pid`, `packageName`, `photoCount`, `videoCount`, `price`, `type`, `description`, `status`) VALUES
(1, 'Starter Pack', 100, 10, '100.00', 'Cheap', 'This is the package', 1),
(2, 'Intermidiate Pack', 500, 20, '500.00', 'Average', 'This is the package', 1),
(3, 'Pro Pack', 1000, 30, '1000.00', 'Expensive', 'This is the package', 1),
(4, 'Starter and Intermidiate', 250, 5, '500.00', 'MIX', 'This is package description', 1),
(5, 'Intermidiate and Pro', 500, 15, '500.00', 'MIX', 'This is Package description', 1),
(6, 'desctest', 20, 20, '20.00', 'CHEAP', 'This is Package description', 0),
(7, 'test2', 30, 30, '300.00', 'EXPENSIVE', 'here2', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblpackagemaster`
--
ALTER TABLE `tblpackagemaster`
  ADD PRIMARY KEY (`pid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblpackagemaster`
--
ALTER TABLE `tblpackagemaster`
  MODIFY `pid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique identification key for Packages', AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
