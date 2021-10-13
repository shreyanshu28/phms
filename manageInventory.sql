-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 08, 2021 at 06:40 AM
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

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_city` (IN `cname` VARCHAR(100), IN `area` VARCHAR(100), IN `pincode` INT(6))  INSERT into tblcity(cname, area, pincode) VALUES (cname, area, pincode)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tblcity`
--

CREATE TABLE `tblcity` (
  `cid` int(10) UNSIGNED NOT NULL COMMENT 'primary key for tblCity',
  `cname` varchar(100) NOT NULL COMMENT 'name of the city',
  `area` varchar(100) DEFAULT NULL COMMENT 'area of the city in case area has a unique pincode',
  `pincode` int(6) UNSIGNED NOT NULL COMMENT 'pincode of city/area'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcity`
--

INSERT INTO `tblcity` (`cid`, `cname`, `area`, `pincode`) VALUES
(1, 'Valsad', 'NULL', 396001),
(2, 'Demo', 'NULL', 111111);

-- --------------------------------------------------------

--
-- Table structure for table `tblcustomeraddress`
--

CREATE TABLE `tblcustomeraddress` (
  `caid` int(11) UNSIGNED NOT NULL COMMENT 'primary key of customer address',
  `addressline1` varchar(150) NOT NULL COMMENT 'Flat, House no., Building, Company, Apartment',
  `addressline2` varchar(150) DEFAULT NULL COMMENT 'Area, Street, Sector, Village',
  `landmark` varchar(150) DEFAULT NULL COMMENT 'Landmark',
  `cid` int(11) UNSIGNED NOT NULL COMMENT 'tblCity->tblCustomerAddress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='user''s personal address is saved here';

--
-- Dumping data for table `tblcustomeraddress`
--

INSERT INTO `tblcustomeraddress` (`caid`, `addressline1`, `addressline2`, `landmark`, `cid`) VALUES
(1, 'Andheri Gali', 'Shaitan Mahal', 'Shamshan ke piche', 1),
(2, 'Trying inner join query', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblinventorytype`
--

CREATE TABLE `tblinventorytype` (
  `itid` int(10) UNSIGNED NOT NULL COMMENT 'primary key for tblInventoryType',
  `iType` varchar(50) NOT NULL COMMENT 'Type of goods available in inventory'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `lid` int(10) UNSIGNED NOT NULL COMMENT 'Primary key for tblLogin',
  `username` varchar(50) NOT NULL COMMENT 'username is unique',
  `password` varchar(50) NOT NULL COMMENT 'password',
  `uid` int(10) UNSIGNED NOT NULL COMMENT 'tblUser->tblLogin',
  `tid` int(10) UNSIGNED NOT NULL COMMENT 'tblUserType->tblLogin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblorderprops`
--

CREATE TABLE `tblorderprops` (
  `opId` int(11) UNSIGNED NOT NULL COMMENT 'primary key for tblOrderProps',
  `orderId` int(11) UNSIGNED NOT NULL COMMENT 'tblOrderProp->tblOrder',
  `propOwnerId` int(11) UNSIGNED NOT NULL COMMENT 'tblOrderProp->tblPropOwnership',
  `reserved` int(5) NOT NULL COMMENT 'number of props used per order'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `tblprops`
--

CREATE TABLE `tblprops` (
  `pId` int(11) UNSIGNED NOT NULL COMMENT 'primary key for tblProp',
  `pName` varchar(100) NOT NULL COMMENT 'name of the prop added'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `uid` int(10) UNSIGNED NOT NULL COMMENT 'Primary key for tblUser',
  `fname` varchar(50) NOT NULL DEFAULT 'Lorem' COMMENT 'First name of the user.',
  `mname` varchar(50) DEFAULT 'middleLorem' COMMENT 'Middle name of the user',
  `lname` varchar(50) NOT NULL DEFAULT 'lastLorem' COMMENT 'Last name of the user',
  `dob` date NOT NULL DEFAULT '1970-12-24' COMMENT 'Birth date of the user',
  `contactnumber` bigint(12) UNSIGNED NOT NULL COMMENT 'countrycode + phone number = 12',
  `email` varchar(50) NOT NULL DEFAULT 'example@email.com',
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'active=1, deactive=0',
  `profileImage` varchar(1000) NOT NULL COMMENT 'contains the path of the profile image of user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`uid`, `fname`, `mname`, `lname`, `dob`, `contactnumber`, `email`, `active`, `profileImage`) VALUES
(1, 'Lorem', 'middleLorem', 'lastLorem', '1970-12-24', 917567436829, 'example@email.com', 1, '');

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

CREATE TABLE `tblusertype` (
  `tid` int(10) UNSIGNED NOT NULL COMMENT 'Primary key for tblUserType',
  `type` varchar(20) NOT NULL DEFAULT 'customer' COMMENT 'type of the user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcity`
--
ALTER TABLE `tblcity`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `pincode` (`pincode`);

--
-- Indexes for table `tblcustomeraddress`
--
ALTER TABLE `tblcustomeraddress`
  ADD PRIMARY KEY (`caid`),
  ADD KEY `FK_tblCustomerAddress_tblCity` (`cid`);

--
-- Indexes for table `tblinventorytype`
--
ALTER TABLE `tblinventorytype`
  ADD PRIMARY KEY (`itid`);

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`lid`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `FK_tblLogin_tblUser` (`uid`),
  ADD KEY `FK_tblLogin_tblUserType` (`tid`);

--
-- Indexes for table `tblorderprops`
--
ALTER TABLE `tblorderprops`
  ADD PRIMARY KEY (`opId`),
  ADD KEY `FK_tblOrderProps_tblPropOwnership` (`propOwnerId`);

--
-- Indexes for table `tblpropownership`
--
ALTER TABLE `tblpropownership`
  ADD PRIMARY KEY (`poid`),
  ADD KEY `FK_tblPropOwnership_tblProps` (`propId`),
  ADD KEY `FK_tblPropOwnership_tblInventoryType` (`intId`);

--
-- Indexes for table `tblprops`
--
ALTER TABLE `tblprops`
  ADD PRIMARY KEY (`pId`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `contactnumber` (`contactnumber`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `tblusertype`
--
ALTER TABLE `tblusertype`
  ADD PRIMARY KEY (`tid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblcity`
--
ALTER TABLE `tblcity`
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key for tblCity', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblcustomeraddress`
--
ALTER TABLE `tblcustomeraddress`
  MODIFY `caid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key of customer address', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblinventorytype`
--
ALTER TABLE `tblinventorytype`
  MODIFY `itid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key for tblInventoryType';

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `lid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key for tblLogin';

--
-- AUTO_INCREMENT for table `tblorderprops`
--
ALTER TABLE `tblorderprops`
  MODIFY `opId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key for tblOrderProps';

--
-- AUTO_INCREMENT for table `tblpropownership`
--
ALTER TABLE `tblpropownership`
  MODIFY `poid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key for tblPropOwnership';

--
-- AUTO_INCREMENT for table `tblprops`
--
ALTER TABLE `tblprops`
  MODIFY `pId` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key for tblProp';

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key for tblUser', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tblusertype`
--
ALTER TABLE `tblusertype`
  MODIFY `tid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key for tblUserType';

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblcustomeraddress`
--
ALTER TABLE `tblcustomeraddress`
  ADD CONSTRAINT `FK_tblCustomerAddress_tblCity` FOREIGN KEY (`cid`) REFERENCES `tblcity` (`cid`) ON UPDATE CASCADE;

--
-- Constraints for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD CONSTRAINT `FK_tblLogin_tblUser` FOREIGN KEY (`uid`) REFERENCES `tbluser` (`uid`),
  ADD CONSTRAINT `FK_tblLogin_tblUserType` FOREIGN KEY (`tid`) REFERENCES `tblusertype` (`tid`);

--
-- Constraints for table `tblorderprops`
--
ALTER TABLE `tblorderprops`
  ADD CONSTRAINT `FK_tblOrderProps_tblPropOwnership` FOREIGN KEY (`propOwnerId`) REFERENCES `tblpropownership` (`poid`);

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