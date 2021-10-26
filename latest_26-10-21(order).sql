-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 26, 2021 at 06:31 PM
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
-- Table structure for table `tblcart`
--

CREATE TABLE `tblcart` (
  `cartid` int(10) UNSIGNED NOT NULL COMMENT 'Unique Identification key for cart',
  `cid` int(10) UNSIGNED NOT NULL COMMENT 'Unique Identification key for User(customer)',
  `pid` int(10) UNSIGNED NOT NULL COMMENT 'Unique Identification key for Package',
  `qty` int(10) UNSIGNED NOT NULL DEFAULT 1 COMMENT 'Quantity of package in cart',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'If the cart is already checkout or not'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblcart`
--

INSERT INTO `tblcart` (`cartid`, `cid`, `pid`, `qty`, `status`) VALUES
(1, 8, 2, 5, 0),
(2, 8, 3, 1, 0),
(3, 8, 1, 2, 0),
(4, 8, 5, 2, 0),
(5, 8, 4, 2, 0),
(6, 8, 2, 1, 1);

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
  `cid` int(10) UNSIGNED NOT NULL,
  `poid` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblordermaster`
--

INSERT INTO `tblordermaster` (`oid`, `date`, `time`, `cid`, `poid`) VALUES
(1, '2021-10-26', '05:44:20', 8, 1),
(2, '2021-10-26', '05:59:18', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tblordertransaction`
--

CREATE TABLE `tblordertransaction` (
  `oeid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for tblOrderTransaction',
  `oid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for orders',
  `cid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for customer',
  `poid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for the payment of order'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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

-- --------------------------------------------------------

--
-- Table structure for table `tblpackagepaymentorder`
--

CREATE TABLE `tblpackagepaymentorder` (
  `ppoid` int(11) UNSIGNED NOT NULL COMMENT 'Unique Identification key for the Payment Package Order',
  `pid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for the Package',
  `poid` int(11) UNSIGNED NOT NULL COMMENT 'Unique identification key for the Payment Order',
  `qty` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpackagepaymentorder`
--

INSERT INTO `tblpackagepaymentorder` (`ppoid`, `pid`, `poid`, `qty`) VALUES
(1, 2, 1, 5),
(2, 3, 1, 1),
(3, 1, 1, 2),
(4, 5, 1, 2),
(5, 4, 1, 2),
(6, 2, 2, 5),
(7, 3, 2, 1),
(8, 1, 2, 2),
(9, 5, 2, 2),
(10, 4, 2, 2);

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
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '‘1’ if the payment is done, ''0'' if the payment is pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymentorder1`
--

CREATE TABLE `tblpaymentorder1` (
  `poid` int(10) UNSIGNED NOT NULL,
  `method` varchar(10) NOT NULL,
  `refid` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `time` time NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpaymentorder1`
--

INSERT INTO `tblpaymentorder1` (`poid`, `method`, `refid`, `date`, `time`, `amount`, `status`) VALUES
(1, 'ONLINE', '', '2021-10-26', '05:44:20', '5700.00', 1),
(2, 'ONLINE', '', '2021-10-26', '05:59:18', '5700.00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tblphotovideomaster`
--

CREATE TABLE `tblphotovideomaster` (
  `pvid` int(10) UNSIGNED NOT NULL COMMENT 'Unique Identification key for Photo and Video',
  `path` varchar(100) NOT NULL COMMENT 'Path of Photo and Video',
  `subject` varchar(100) NOT NULL COMMENT 'subject of photo and video'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblphotovideoorder`
--

CREATE TABLE `tblphotovideoorder` (
  `pvoid` int(10) UNSIGNED NOT NULL COMMENT 'Unique Identification key for Photo Video Order',
  `pvid` int(10) UNSIGNED NOT NULL COMMENT 'Unique Identification key for Photo Video',
  `oid` int(10) UNSIGNED NOT NULL COMMENT 'Unique Identification key for Order'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblproductmaster`
--

CREATE TABLE `tblproductmaster` (
  `pid` int(10) UNSIGNED NOT NULL COMMENT 'Unique identification key for products',
  `productName` varchar(20) NOT NULL COMMENT 'Name of the Product in inventory',
  `qty` int(11) UNSIGNED NOT NULL DEFAULT 0 COMMENT 'Quantity of the products in inventory',
  `price` decimal(10,2) UNSIGNED NOT NULL DEFAULT 0.00 COMMENT 'Price of the product \r\ni.e. price/product',
  `type` varchar(20) NOT NULL COMMENT 'type of the product'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblproductmaster`
--

INSERT INTO `tblproductmaster` (`pid`, `productName`, `qty`, `price`, `type`) VALUES
(1, 'canon35d', 1, '100000.00', 'CAMERA'),
(2, 'so54ny', 1, '10000.00', 'CAMERA'),
(3, 'sony1000nits', 1, '100.00', 'LIGHT'),
(5, 'dell15t', 5, '125000.00', 'CAMERA'),
(6, 'sa35ung', 2, '20000.00', 'DISPLAY'),
(7, 'secretlab100f', 2, '100000.00', 'CHAIR');

-- --------------------------------------------------------

--
-- Table structure for table `tblrole`
--

CREATE TABLE `tblrole` (
  `rid` int(10) UNSIGNED NOT NULL,
  `role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblrole`
--

INSERT INTO `tblrole` (`rid`, `role`) VALUES
(1, 'Admin'),
(2, 'Customer'),
(3, 'Designer'),
(4, 'Editor');

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraddress`
--

CREATE TABLE `tbluseraddress` (
  `uaid` int(10) UNSIGNED NOT NULL COMMENT 'primary key of customer address',
  `addressline1` varchar(100) NOT NULL COMMENT 'Flat, House no., Building, Company, Apartment',
  `addressline2` varchar(100) DEFAULT NULL COMMENT 'Area, Street, Sector, Village',
  `city` varchar(30) NOT NULL COMMENT 'City the user live in',
  `pincode` int(6) NOT NULL COMMENT 'Pincode of the Area user live in',
  `uid` int(10) UNSIGNED NOT NULL COMMENT 'Unique identification key for user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='user''s personal address is saved here';

--
-- Dumping data for table `tbluseraddress`
--

INSERT INTO `tbluseraddress` (`uaid`, `addressline1`, `addressline2`, `city`, `pincode`, `uid`) VALUES
(1, 'Andheri Gali', 'Shaitan Mahal', 'VALSAD', 123456, 2),
(2, 'Trying inner join query', '', 'VAPI', 123241, 4),
(3, '123, testaddress1', 'testaddress2', 'AHMENDABAD', 123456, 5),
(4, '78, city', 'cityarea', 'GANDHINAGAR', 123456, 7),
(5, '123, kushal', '', 'SURAT', 123456, 8),
(7, 'here', 'here', 'SURAT', 123456, 11),
(8, 'here', NULL, 'SURAT', 123455, 12),
(9, '123', NULL, 'VALSAD', 534533, 14),
(10, '123', '', 'VALSAD', 948382, 15),
(11, 'BMIIT', NULL, 'AHMENDABAD', 392039, 16);

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
  `contactNumber` bigint(12) DEFAULT NULL COMMENT 'countrycode + phone number = 12',
  `email` varchar(128) NOT NULL COMMENT 'Email id of the User Unique and Must used for login',
  `password` varchar(255) NOT NULL COMMENT 'Password of the user for Login',
  `role` varchar(20) NOT NULL DEFAULT 'C' COMMENT 'Role for the User\r\nDefault(''C''),\r\n''C'' for Customer,\r\n''E'' for Editor,\r\n''P'' for Photographer',
  `profilePhoto` varchar(255) DEFAULT NULL COMMENT 'The path of the Users profile photo',
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 if active and 0 if not'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusermaster`
--

INSERT INTO `tblusermaster` (`uid`, `firstName`, `middleName`, `lastName`, `dob`, `gender`, `contactNumber`, `email`, `password`, `role`, `profilePhoto`, `status`) VALUES
(2, 'kushal', 'k', 'gaywala', '1970-12-24', 'M', 928374563712, 'admin@gmail.com', '$2y$10$nRpBGx4CNNMiX2/qJc1DwO/nqW4NTbXXFYw1oW/kedCsTFTY2UFZq', 'Admin', '1', 1),
(3, 'shrey', 'middleLorem', 'lastLorem', '1970-12-10', 'M', 918374857362, 'shrey@email.com', '', 'Customer', '1', 1),
(4, 'pujan', 'middleLorem1', 'jariwala', '1970-12-09', 'M', 919384738473, 'pujan@email.com', '', 'Admin', '1', 1),
(5, 'test1', 'testmiddle1', 'testlast1', '2000-07-05', 'M', 918374837483, 'test1@gmail.com', '', 'Customer', '1', 1),
(6, 'test2', 'testmiddle2', 'testlast2', '1998-08-12', 'F', 918475677893, 'test2@mail.com', '', 'Customer', '1', 1),
(7, 'city', 'citymiddle', 'citylast', '1999-03-23', 'F', 91, 'city@test.com', '', 'Customer', '1', 1),
(8, 'Kushal', '', 'kushallast', '2000-11-21', 'M', 919123456789, 'kushalgaywala@gmail.com', '$2y$10$64mUUd8HN8KJk1jcR6qo7.J24Hnwb2YoEzDIwMlydBYl1reqksNpm', 'Customer', NULL, 1),
(11, 'here', 'here', 'here', '1111-11-11', 'M', 918993948374, 'here@gmail.com', '$2y$10$h4CnSUOndskwYQ/m4fXXJeMJAUZRPQ3KGWd/8d4Vq8N.tAnLP5iK2', 'Customer', NULL, 1),
(12, 'ku', 'sh', 'al', '2000-02-12', 'M', 918393939393, 'kushal8217@gmail.com', '$2y$10$FViJIeIxUxHh6BGTJb2qu.fA3Nhb5zanb.T1opot.m8BtiH0eOLWu', 'Customer', NULL, 1),
(14, 'pujan', 'j', 'jariwala', '2001-12-21', 'M', 919283492837, 'kushalgaiwala@gmail.com', '$2y$10$djCbtsU0ANxneGGD7GUskeOOXBCW92zLjzb43Hf0I3EnJgxXqZ.dK', 'Customer', NULL, 1),
(15, 'kushalw', 'ki', 'gai', '2000-03-12', 'M', 910342342342, '19bmiit096@gmail.com', '$2y$10$xUHu3KWVBUiZKVi19ZZA0OgNF/c/Opk4aYM5076YTd8GFXZoG5zPG', 'Customer', NULL, 1),
(16, 'sahil', 'h ', 'patel', '2000-12-12', 'M', 917869503429, '19bmiit052@gmail.com', '$2y$10$9E4qO4HkE0MF/4u51BL3guotR0bH4L3qGoesRlgjRXxlWf2ZyFMCq', 'Customer', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblcart`
--
ALTER TABLE `tblcart`
  ADD PRIMARY KEY (`cartid`);

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
  ADD PRIMARY KEY (`oid`),
  ADD KEY `FK_tblOrderMaster_tblUserMaster_Customer` (`cid`),
  ADD KEY `FK_tblOrderMaster_tblPaymentOrder` (`poid`);

--
-- Indexes for table `tblordertransaction`
--
ALTER TABLE `tblordertransaction`
  ADD PRIMARY KEY (`oeid`),
  ADD KEY `FK_tblOrderTransaction_tblOrderMaster` (`oid`),
  ADD KEY `FK_tblOrderTransaction_tblUserMaster_Customer` (`cid`),
  ADD KEY `FK_tblOrderTransaction_tblPaymentOrder` (`poid`);

--
-- Indexes for table `tblpackagemaster`
--
ALTER TABLE `tblpackagemaster`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tblpackagepaymentorder`
--
ALTER TABLE `tblpackagepaymentorder`
  ADD PRIMARY KEY (`ppoid`),
  ADD KEY `FK_tblPackagePaymentOrder_tblPackageMaster` (`pid`),
  ADD KEY `FK_tblPackagePaymentOrder_tblPaymentOrder` (`poid`);

--
-- Indexes for table `tblpaymentorder`
--
ALTER TABLE `tblpaymentorder`
  ADD PRIMARY KEY (`poid`);

--
-- Indexes for table `tblpaymentorder1`
--
ALTER TABLE `tblpaymentorder1`
  ADD PRIMARY KEY (`poid`);

--
-- Indexes for table `tblphotovideomaster`
--
ALTER TABLE `tblphotovideomaster`
  ADD PRIMARY KEY (`pvid`);

--
-- Indexes for table `tblphotovideoorder`
--
ALTER TABLE `tblphotovideoorder`
  ADD PRIMARY KEY (`pvoid`),
  ADD KEY `FK_tblPhotoVideoOrder_tblPhotoVideoMaster` (`pvid`),
  ADD KEY `FK_tblPhotoVideoOrder_tblOrderMaster` (`oid`);

--
-- Indexes for table `tblproductmaster`
--
ALTER TABLE `tblproductmaster`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tblrole`
--
ALTER TABLE `tblrole`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `tbluseraddress`
--
ALTER TABLE `tbluseraddress`
  ADD PRIMARY KEY (`uaid`),
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
-- AUTO_INCREMENT for table `tblcart`
--
ALTER TABLE `tblcart`
  MODIFY `cartid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique Identification key for cart', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblorderemployee`
--
ALTER TABLE `tblorderemployee`
  MODIFY `oeid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique Identification key for Order Employee';

--
-- AUTO_INCREMENT for table `tblordermaster`
--
ALTER TABLE `tblordermaster`
  MODIFY `oid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique identification key for orders', AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblordertransaction`
--
ALTER TABLE `tblordertransaction`
  MODIFY `oeid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique identification key for tblOrderTransaction', AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tblpackagemaster`
--
ALTER TABLE `tblpackagemaster`
  MODIFY `pid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique identification key for Packages', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tblpackagepaymentorder`
--
ALTER TABLE `tblpackagepaymentorder`
  MODIFY `ppoid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique Identification key for the Payment Package Order', AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblpaymentorder1`
--
ALTER TABLE `tblpaymentorder1`
  MODIFY `poid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tblphotovideomaster`
--
ALTER TABLE `tblphotovideomaster`
  MODIFY `pvid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique Identification key for Photo and Video';

--
-- AUTO_INCREMENT for table `tblphotovideoorder`
--
ALTER TABLE `tblphotovideoorder`
  MODIFY `pvoid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique Identification key for Photo Video Order';

--
-- AUTO_INCREMENT for table `tblproductmaster`
--
ALTER TABLE `tblproductmaster`
  MODIFY `pid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Unique identification key for products', AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tblrole`
--
ALTER TABLE `tblrole`
  MODIFY `rid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbluseraddress`
--
ALTER TABLE `tbluseraddress`
  MODIFY `uaid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key of customer address', AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tblusermaster`
--
ALTER TABLE `tblusermaster`
  MODIFY `uid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key for tblUser', AUTO_INCREMENT=17;

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
-- Constraints for table `tblordermaster`
--
ALTER TABLE `tblordermaster`
  ADD CONSTRAINT `FK_tblOrderMaster_tblPaymentOrder` FOREIGN KEY (`poid`) REFERENCES `tblpaymentorder1` (`poid`),
  ADD CONSTRAINT `FK_tblOrderMaster_tblUserMaster_Customer` FOREIGN KEY (`cid`) REFERENCES `tblusermaster` (`uid`);

--
-- Constraints for table `tblordertransaction`
--
ALTER TABLE `tblordertransaction`
  ADD CONSTRAINT `FK_tblOrderTransaction_tblOrderMaster` FOREIGN KEY (`oid`) REFERENCES `tblordermaster` (`oid`),
  ADD CONSTRAINT `FK_tblOrderTransaction_tblPaymentOrder` FOREIGN KEY (`poid`) REFERENCES `tblpaymentorder` (`poid`),
  ADD CONSTRAINT `FK_tblOrderTransaction_tblUserMaster_Customer` FOREIGN KEY (`cid`) REFERENCES `tblusermaster` (`uid`);

--
-- Constraints for table `tblpackagepaymentorder`
--
ALTER TABLE `tblpackagepaymentorder`
  ADD CONSTRAINT `FK_tblPackagePaymentOrder_tblPackageMaster` FOREIGN KEY (`pid`) REFERENCES `tblpackagemaster` (`pid`),
  ADD CONSTRAINT `FK_tblPackagePaymentOrder_tblPaymentOrder` FOREIGN KEY (`poid`) REFERENCES `tblpaymentorder1` (`poid`);

--
-- Constraints for table `tblpaymentorder`
--
ALTER TABLE `tblpaymentorder`
  ADD CONSTRAINT `FK_tblPayment_tblPaymentType` FOREIGN KEY (`poid`) REFERENCES `new_production_house`.`tblpaymenttype` (`ptid`);

--
-- Constraints for table `tblphotovideoorder`
--
ALTER TABLE `tblphotovideoorder`
  ADD CONSTRAINT `FK_tblPhotoVideoOrder_tblOrderMaster` FOREIGN KEY (`oid`) REFERENCES `tblordermaster` (`oid`),
  ADD CONSTRAINT `FK_tblPhotoVideoOrder_tblPhotoVideoMaster` FOREIGN KEY (`pvid`) REFERENCES `tblphotovideomaster` (`pvid`);

--
-- Constraints for table `tbluseraddress`
--
ALTER TABLE `tbluseraddress`
  ADD CONSTRAINT `FK_tblUserAddress_tblUserMaster` FOREIGN KEY (`uid`) REFERENCES `tblusermaster` (`uid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
