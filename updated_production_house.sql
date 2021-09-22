-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 22, 2021 at 05:19 PM
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
-- Database: `updated_production_house`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblorderaddress`
--

CREATE TABLE `tblorderaddress` (
  `oaid` int(10) UNSIGNED NOT NULL COMMENT 'primary key for tblOrderAddress',
  `addressline1` varchar(100) NOT NULL COMMENT 'Flat, House no., Building, Company, Apartment 	',
  `addressline2` varchar(100) NOT NULL COMMENT 'Area, Street, Sector, Village ',
  `city` varchar(30) NOT NULL COMMENT 'City of area where order going to take place',
  `pincode` int(6) NOT NULL COMMENT 'Pincode of area where order going to take place',
  `cid` int(10) UNSIGNED NOT NULL COMMENT 'Unique identification key for order address'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblorderemployee`
--

CREATE TABLE `tblorderemployee` (
  `oeid` int(10) UNSIGNED NOT NULL COMMENT 'Unique Identification key for Order Employee',
  `oid` int(10) UNSIGNED NOT NULL COMMENT 'Unique Identification key for Order',
  `eid` int(10) UNSIGNED NOT NULL COMMENT 'Unique Identification key for Employee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblordermaster`
--

CREATE TABLE `tblordermaster` (
  `oid` int(10) UNSIGNED NOT NULL COMMENT 'Unique identification key for orders',
  `date` date NOT NULL COMMENT 'Date when order is going to take placed',
  `time` time NOT NULL COMMENT 'Time when order is going to take placed',
  `payment` char(1) NOT NULL DEFAULT 'N' COMMENT 'Default(‘N’)\r\npayment if done ''D'' and if not ''N'''
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblordertransaction`
--

CREATE TABLE `tblordertransaction` (
  `oeid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for tblOrderTransaction',
  `oid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for orders',
  `eid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for employee',
  `cid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for customer',
  `pid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for package selected',
  `poid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for the payment of order'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpackagemaster`
--

CREATE TABLE `tblpackagemaster` (
  `pid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for Packages',
  `packageName` varchar(20) NOT NULL COMMENT 'Different packages names',
  `photoCount` int(11) NOT NULL COMMENT 'The Count of photos per package',
  `videoCount` int(11) NOT NULL COMMENT 'The Count of videos per package',
  `type` varchar(20) NOT NULL COMMENT 'The type of the package'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymentorder`
--

CREATE TABLE `tblpaymentorder` (
  `poid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for Payment''s Order',
  `method` varchar(10) NOT NULL COMMENT 'The method used for payment of order',
  `refid` varchar(30) NOT NULL COMMENT 'Unique reference id generated during payment',
  `date` date NOT NULL COMMENT 'Date at the time of payment',
  `time` time NOT NULL COMMENT 'Time at the time of payment',
  `amount` decimal(10,2) NOT NULL COMMENT 'The Amount paid during payment',
  `status` char(1) NOT NULL DEFAULT 'P' COMMENT '‘D’ if the payment is done, ''P'' if the payment is pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblproductmaster`
--

CREATE TABLE `tblproductmaster` (
  `pid` int(10) UNSIGNED NOT NULL COMMENT 'Unique identification key for products',
  `name` varchar(20) NOT NULL COMMENT 'Name of the Product in inventory',
  `qty` int(11) NOT NULL COMMENT 'Quantity of the products in inventory',
  `price` decimal(10,2) NOT NULL COMMENT 'Price of the product \r\ni.e. price/product',
  `type` varchar(20) NOT NULL COMMENT 'type of the product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraddress`
--

CREATE TABLE `tbluseraddress` (
  `caid` int(10) UNSIGNED NOT NULL COMMENT 'primary key of customer address',
  `addressline1` varchar(100) NOT NULL COMMENT 'Flat, House no., Building, Company, Apartment',
  `addressline2` varchar(100) NOT NULL COMMENT 'Area, Street, Sector, Village',
  `city` varchar(30) NOT NULL COMMENT 'City the user live in',
  `pincode` int(6) NOT NULL COMMENT 'Pincode of the Area user live in',
  `uid` int(10) UNSIGNED NOT NULL COMMENT 'Unique identification key for user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='user''s personal address is saved here';

--
-- Dumping data for table `tbluseraddress`
--

INSERT INTO `tbluseraddress` (`caid`, `addressline1`, `addressline2`, `city`, `pincode`, `uid`) VALUES
(1, 'Andheri Gali', 'Shaitan Mahal', 'Shamshan ke piche', 0, 2),
(2, 'Trying inner join query', '', '', 0, 4),
(3, '123, testaddress1', 'testaddress2', 'textlandmark1', 0, 5),
(4, '78, city', 'cityarea', '', 0, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tblusermaster`
--

CREATE TABLE `tblusermaster` (
  `uid` int(11) UNSIGNED NOT NULL COMMENT 'Primary key for tblUser',
  `firstName` varchar(50) NOT NULL COMMENT 'First name of the user.',
  `middleName` varchar(50) DEFAULT NULL COMMENT 'Middle name of the user',
  `lastName` varchar(50) NOT NULL COMMENT 'Last name of the user',
  `dob` date NOT NULL COMMENT 'Birth date of the user',
  `gender` char(1) NOT NULL DEFAULT 'M' COMMENT 'Gender of user\r\nDefault(''M''),\r\n''M'' for Male and\r\n''F'' for Female',
  `contactNumber` bigint(12) UNSIGNED DEFAULT NULL COMMENT 'countrycode + phone number = 12',
  `email` varchar(128) NOT NULL COMMENT 'Email id of the User Unique and Must used for login',
  `password` varchar(255) NOT NULL COMMENT 'Password of the user for Login',
  `profilePhoto` varchar(255) DEFAULT NULL COMMENT 'The path of the Users profile photo',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 if active and 0 if not'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusermaster`
--

INSERT INTO `tblusermaster` (`uid`, `firstName`, `middleName`, `lastName`, `dob`, `gender`, `contactNumber`, `email`, `password`, `profilePhoto`, `status`) VALUES
(2, 'kushal', 'k', 'gaywala', '1970-12-24', 'M', 928374563712, 'kuga@gmail.com', '', '1', 1),
(3, 'shrey', 'middleLorem', 'lastLorem', '1970-12-10', 'M', 918374857362, 'shrey@email.com', '', '1', 1),
(4, 'pujan', 'middleLorem1', 'jariwala', '1970-12-09', 'M', 919384738473, 'pujan@email.com', '', '1', 1),
(5, 'test1', 'testmiddle1', 'testlast1', '2000-07-05', 'M', 918374837483, 'test1@gmail.com', '', '1', 1),
(6, 'test2', 'testmiddle2', 'testlast2', '1998-08-12', 'F', 918475677893, 'test2@mail.com', '', '1', 1),
(7, 'city', 'citymiddle', 'citylast', '1999-03-23', 'F', 91, 'city@test.com', '', '1', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblorderaddress`
--
ALTER TABLE `tblorderaddress`
  ADD PRIMARY KEY (`oaid`),
  ADD KEY `FK_tblOrderAddress_tblCity` (`cid`);

--
-- Indexes for table `tblorderemployee`
--
ALTER TABLE `tblorderemployee`
  ADD PRIMARY KEY (`oeid`),
  ADD KEY `FK_tblOrderEmployee_tblOrderMaster` (`oid`),
  ADD KEY `FK_tblOrderEmployee_tblUserMaster_Employee` (`eid`);

--
-- Indexes for table `tblordermaster`
--
ALTER TABLE `tblordermaster`
  ADD PRIMARY KEY (`oid`);

--
-- Indexes for table `tblordertransaction`
--
ALTER TABLE `tblordertransaction`
  ADD PRIMARY KEY (`oeid`),
  ADD KEY `FK_tblOrderTransaction_tblOrderMaster` (`oid`),
  ADD KEY `FK_tblOrderTransaction_tblUserMaster_Employee` (`eid`),
  ADD KEY `FK_tblOrderTransaction_tblUserMaster_Customer` (`cid`),
  ADD KEY `FK_tblOrderTransaction_tblPackageMaster` (`pid`),
  ADD KEY `FK_tblOrderTransaction_tblPaymentOrder` (`poid`);

--
-- Indexes for table `tblpackagemaster`
--
ALTER TABLE `tblpackagemaster`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tblpaymentorder`
--
ALTER TABLE `tblpaymentorder`
  ADD PRIMARY KEY (`poid`);

--
-- Indexes for table `tblproductmaster`
--
ALTER TABLE `tblproductmaster`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tbluseraddress`
--
ALTER TABLE `tbluseraddress`
  ADD PRIMARY KEY (`caid`),
  ADD KEY `FK_tblUserAddress_tblUserMaster` (`uid`);

--
-- Indexes for table `tblusermaster`
--
ALTER TABLE `tblusermaster`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `contactnumber` (`contactNumber`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblorderemployee`
--
ALTER TABLE `tblorderemployee`
  MODIFY `oeid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique Identification key for Order Employee';

--
-- AUTO_INCREMENT for table `tblordermaster`
--
ALTER TABLE `tblordermaster`
  MODIFY `oid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique identification key for orders';

--
-- AUTO_INCREMENT for table `tblordertransaction`
--
ALTER TABLE `tblordertransaction`
  MODIFY `oeid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique identification key for tblOrderTransaction';

--
-- AUTO_INCREMENT for table `tblpackagemaster`
--
ALTER TABLE `tblpackagemaster`
  MODIFY `pid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique identification key for Packages';

--
-- AUTO_INCREMENT for table `tblproductmaster`
--
ALTER TABLE `tblproductmaster`
  MODIFY `pid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique identification key for products';

--
-- AUTO_INCREMENT for table `tbluseraddress`
--
ALTER TABLE `tbluseraddress`
  MODIFY `caid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key of customer address', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblusermaster`
--
ALTER TABLE `tblusermaster`
  MODIFY `uid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key for tblUser', AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblorderaddress`
--
ALTER TABLE `tblorderaddress`
  ADD CONSTRAINT `FK_tblOrderAddress_tblCity` FOREIGN KEY (`cid`) REFERENCES `new_production_house`.`tblcity` (`cid`);

--
-- Constraints for table `tblorderemployee`
--
ALTER TABLE `tblorderemployee`
  ADD CONSTRAINT `FK_tblOrderEmployee_tblOrderMaster` FOREIGN KEY (`oid`) REFERENCES `tblordermaster` (`oid`),
  ADD CONSTRAINT `FK_tblOrderEmployee_tblUserMaster_Employee` FOREIGN KEY (`eid`) REFERENCES `tblusermaster` (`uid`);

--
-- Constraints for table `tblordertransaction`
--
ALTER TABLE `tblordertransaction`
  ADD CONSTRAINT `FK_tblOrderTransaction_tblOrderMaster` FOREIGN KEY (`oid`) REFERENCES `tblordermaster` (`oid`),
  ADD CONSTRAINT `FK_tblOrderTransaction_tblPackageMaster` FOREIGN KEY (`pid`) REFERENCES `tblpackagemaster` (`pid`),
  ADD CONSTRAINT `FK_tblOrderTransaction_tblPaymentOrder` FOREIGN KEY (`poid`) REFERENCES `tblpaymentorder` (`poid`),
  ADD CONSTRAINT `FK_tblOrderTransaction_tblUserMaster_Customer` FOREIGN KEY (`cid`) REFERENCES `tblusermaster` (`uid`),
  ADD CONSTRAINT `FK_tblOrderTransaction_tblUserMaster_Employee` FOREIGN KEY (`eid`) REFERENCES `tblusermaster` (`uid`);

--
-- Constraints for table `tblpaymentorder`
--
ALTER TABLE `tblpaymentorder`
  ADD CONSTRAINT `FK_tblPayment_tblPaymentType` FOREIGN KEY (`poid`) REFERENCES `new_production_house`.`tblpaymenttype` (`ptid`);

--
-- Constraints for table `tbluseraddress`
--
ALTER TABLE `tbluseraddress`
  ADD CONSTRAINT `FK_tblUserAddress_tblUserMaster` FOREIGN KEY (`uid`) REFERENCES `tblusermaster` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
