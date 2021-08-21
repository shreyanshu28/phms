-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 21, 2021 at 09:36 AM
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
-- Database: `production_house`
--

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
(1, 'VALSAD', 'NULL', 396001),
(2, 'Demo', 'NULL', 394521),
(3, 'SURAT', 'testaddress2', 897564),
(4, 'SURAT', 'testaddress22', 983746),
(6, 'Ahmedabad', 'cityarea', 234534);

-- --------------------------------------------------------

--
-- Table structure for table `tbldelivery`
--

CREATE TABLE `tbldelivery` (
  `did` int(10) UNSIGNED NOT NULL COMMENT 'primary key for tblDelivery',
  `oid` int(10) UNSIGNED NOT NULL COMMENT 'tblOrder -> tblDelivery',
  `date` date NOT NULL COMMENT 'date of the delivery',
  `time` time NOT NULL DEFAULT current_timestamp() COMMENT 'time of the delivery'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `uid` int(10) UNSIGNED NOT NULL COMMENT 'tblUser->tblLogin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`lid`, `username`, `password`, `uid`) VALUES
(1, 'kushal', '11111111', 2),
(2, 'testing1', 'testing1', 5),
(5, 'testing2', 'testing2', 6),
(6, 'city', '11111111', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tblorder`
--

CREATE TABLE `tblorder` (
  `oid` int(10) UNSIGNED NOT NULL COMMENT 'primary key for tblOrder',
  `oaid` int(10) UNSIGNED NOT NULL COMMENT 'tblOrderAddress -> tblOrder venue of the order',
  `date` date NOT NULL COMMENT 'date of the order',
  `time` time NOT NULL COMMENT 'time of the order',
  `paymentid` int(10) UNSIGNED NOT NULL COMMENT 'tblPayment->tblOrder',
  `uid` int(10) UNSIGNED NOT NULL COMMENT 'tblUser -> tblOrder'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblorderaddress`
--

CREATE TABLE `tblorderaddress` (
  `oaid` int(10) UNSIGNED NOT NULL COMMENT 'primary key for tblOrderAddress',
  `addressline1` varchar(150) NOT NULL COMMENT 'Flat, House no., Building, Company, Apartment 	',
  `addressline2` varchar(150) DEFAULT NULL COMMENT 'Area, Street, Sector, Village ',
  `landmark` varchar(150) DEFAULT NULL COMMENT 'Landmark',
  `cid` int(10) UNSIGNED NOT NULL COMMENT 'tblCity->tblOrderAddress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblorderemployee`
--

CREATE TABLE `tblorderemployee` (
  `oeid` int(10) UNSIGNED NOT NULL COMMENT 'primary key for tblOrderEmployee',
  `oid` int(10) UNSIGNED NOT NULL COMMENT 'tblOrder -> tblOrderEmployee',
  `eid` int(10) UNSIGNED NOT NULL COMMENT 'tblUser -> tblOrderEmployee user id of those who are employee'
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
-- Table structure for table `tblpayment`
--

CREATE TABLE `tblpayment` (
  `pid` int(10) UNSIGNED NOT NULL COMMENT 'payment id for tblPayment',
  `oid` int(10) UNSIGNED NOT NULL COMMENT 'tblOrder -> tblPayment ',
  `ptid` int(10) UNSIGNED NOT NULL COMMENT 'tblPaymentType -> tblPayment',
  `ptime` time NOT NULL DEFAULT current_timestamp() COMMENT 'time of the payment',
  `pdate` date NOT NULL COMMENT 'date of the payment'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tblpaymenttype`
--

CREATE TABLE `tblpaymenttype` (
  `ptid` int(10) UNSIGNED NOT NULL COMMENT 'primary key of tblPaymentType',
  `ptype` varchar(50) NOT NULL COMMENT 'payment type unique'
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
  `gender` char(1) NOT NULL COMMENT 'gender of the user(m = male, f = female)',
  `contactnumber` bigint(12) UNSIGNED NOT NULL COMMENT 'countrycode + phone number = 12',
  `email` varchar(50) NOT NULL DEFAULT 'example@email.com',
  `active` tinyint(1) NOT NULL DEFAULT 1 COMMENT 'active=1, deactive=0',
  `profileImage` varchar(1000) DEFAULT NULL COMMENT 'contains the path of the profile image of user',
  `utid` int(10) UNSIGNED NOT NULL DEFAULT 2 COMMENT 'tblUserType->tblUser\r\nShows the type of user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`uid`, `fname`, `mname`, `lname`, `dob`, `gender`, `contactnumber`, `email`, `active`, `profileImage`, `utid`) VALUES
(2, 'kushal', 'k', 'gaywala', '1970-12-24', 'M', 928374563712, 'kuga@gmail.com', 1, NULL, 1),
(3, 'shrey', 'middleLorem', 'lastLorem', '1970-12-10', 'M', 918374857362, 'shrey@email.com', 1, NULL, 2),
(4, 'pujan', 'middleLorem1', 'jariwala', '1970-12-09', 'M', 919384738473, 'pujan@email.com', 1, NULL, 3),
(5, 'test1', 'testmiddle1', 'testlast1', '2000-07-05', 'M', 918374837483, 'test1@gmail.com', 1, NULL, 2),
(6, 'test2', 'testmiddle2', 'testlast2', '1998-08-12', 'F', 918475677893, 'test2@mail.com', 1, NULL, 2),
(7, 'city', 'citymiddle', 'citylast', '1999-03-23', 'F', 91, 'city@test.com', 1, NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbluseraddress`
--

CREATE TABLE `tbluseraddress` (
  `caid` int(11) UNSIGNED NOT NULL COMMENT 'primary key of customer address',
  `addressline1` varchar(150) NOT NULL COMMENT 'Flat, House no., Building, Company, Apartment',
  `addressline2` varchar(150) DEFAULT NULL COMMENT 'Area, Street, Sector, Village',
  `landmark` varchar(150) DEFAULT NULL COMMENT 'Landmark',
  `cid` int(11) UNSIGNED NOT NULL COMMENT 'tblCity->tblCustomerAddress',
  `uid` int(11) UNSIGNED NOT NULL COMMENT 'tblUser -> tblCustomerAddress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='user''s personal address is saved here';

--
-- Dumping data for table `tbluseraddress`
--

INSERT INTO `tbluseraddress` (`caid`, `addressline1`, `addressline2`, `landmark`, `cid`, `uid`) VALUES
(1, 'Andheri Gali', 'Shaitan Mahal', 'Shamshan ke piche', 1, 2),
(2, 'Trying inner join query', NULL, NULL, 1, 4),
(3, '123, testaddress1', 'testaddress2', 'textlandmark1', 3, 5),
(4, '78, city', 'cityarea', '', 6, 7);

-- --------------------------------------------------------

--
-- Table structure for table `tblusertype`
--

CREATE TABLE `tblusertype` (
  `tid` int(10) UNSIGNED NOT NULL COMMENT 'Primary key for tblUserType',
  `type` varchar(20) NOT NULL DEFAULT 'customer' COMMENT 'type of the user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblusertype`
--

INSERT INTO `tblusertype` (`tid`, `type`) VALUES
(1, 'admin'),
(2, 'customer'),
(3, 'employee');

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
-- Indexes for table `tbldelivery`
--
ALTER TABLE `tbldelivery`
  ADD PRIMARY KEY (`did`),
  ADD KEY `FK_tblDelivery_tblOrder` (`oid`);

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
  ADD KEY `FK_tblLogin_tblUser` (`uid`);

--
-- Indexes for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD PRIMARY KEY (`oid`),
  ADD KEY `FK_tblOrder_tblOrderAddress` (`oaid`),
  ADD KEY `FK_tblOrder_tblPayment` (`paymentid`),
  ADD KEY `FK_tblOrder_tblUser` (`uid`);

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
  ADD KEY `FK_tblOrderEmployee_tblOrder` (`oid`),
  ADD KEY `FK_tblOrderEmployee_tblUser` (`eid`);

--
-- Indexes for table `tblorderprops`
--
ALTER TABLE `tblorderprops`
  ADD PRIMARY KEY (`opId`),
  ADD KEY `FK_tblOrderProps_tblPropOwnership` (`propOwnerId`);

--
-- Indexes for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `tblpaymenttype`
--
ALTER TABLE `tblpaymenttype`
  ADD PRIMARY KEY (`ptid`),
  ADD UNIQUE KEY `ptype` (`ptype`);

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
-- Indexes for table `tbluseraddress`
--
ALTER TABLE `tbluseraddress`
  ADD PRIMARY KEY (`caid`),
  ADD KEY `FK_tblCustomerAddress_tblCity` (`cid`);

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
  MODIFY `cid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key for tblCity', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblinventorytype`
--
ALTER TABLE `tblinventorytype`
  MODIFY `itid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key for tblInventoryType';

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `lid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key for tblLogin', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tblorder`
--
ALTER TABLE `tblorder`
  MODIFY `oid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key for tblOrder';

--
-- AUTO_INCREMENT for table `tblorderemployee`
--
ALTER TABLE `tblorderemployee`
  MODIFY `oeid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key for tblOrderEmployee';

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
  MODIFY `uid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key for tblUser', AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbluseraddress`
--
ALTER TABLE `tbluseraddress`
  MODIFY `caid` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'primary key of customer address', AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tblusertype`
--
ALTER TABLE `tblusertype`
  MODIFY `tid` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Primary key for tblUserType', AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbldelivery`
--
ALTER TABLE `tbldelivery`
  ADD CONSTRAINT `FK_tblDelivery_tblOrder` FOREIGN KEY (`oid`) REFERENCES `tblorder` (`oid`);

--
-- Constraints for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD CONSTRAINT `FK_tblLogin_tblUser` FOREIGN KEY (`uid`) REFERENCES `tbluser` (`uid`);

--
-- Constraints for table `tblorder`
--
ALTER TABLE `tblorder`
  ADD CONSTRAINT `FK_tblOrder_tblOrderAddress` FOREIGN KEY (`oaid`) REFERENCES `tblorderaddress` (`oaid`),
  ADD CONSTRAINT `FK_tblOrder_tblPayment` FOREIGN KEY (`paymentid`) REFERENCES `tblpayment` (`pid`),
  ADD CONSTRAINT `FK_tblOrder_tblUser` FOREIGN KEY (`uid`) REFERENCES `tbluser` (`uid`);

--
-- Constraints for table `tblorderaddress`
--
ALTER TABLE `tblorderaddress`
  ADD CONSTRAINT `FK_tblOrderAddress_tblCity` FOREIGN KEY (`cid`) REFERENCES `tblcity` (`cid`);

--
-- Constraints for table `tblorderemployee`
--
ALTER TABLE `tblorderemployee`
  ADD CONSTRAINT `FK_tblOrderEmployee_tblOrder` FOREIGN KEY (`oid`) REFERENCES `tblorder` (`oid`),
  ADD CONSTRAINT `FK_tblOrderEmployee_tblUser` FOREIGN KEY (`eid`) REFERENCES `tbluser` (`uid`);

--
-- Constraints for table `tblorderprops`
--
ALTER TABLE `tblorderprops`
  ADD CONSTRAINT `FK_tblOrderProps_tblPropOwnership` FOREIGN KEY (`propOwnerId`) REFERENCES `tblpropownership` (`poid`);

--
-- Constraints for table `tblpayment`
--
ALTER TABLE `tblpayment`
  ADD CONSTRAINT `FK_tblPayment_tblPaymentType` FOREIGN KEY (`pid`) REFERENCES `tblpaymenttype` (`ptid`);

--
-- Constraints for table `tblpropownership`
--
ALTER TABLE `tblpropownership`
  ADD CONSTRAINT `FK_tblPropOwnership_tblInventoryType` FOREIGN KEY (`intId`) REFERENCES `tblinventorytype` (`itid`),
  ADD CONSTRAINT `FK_tblPropOwnership_tblProps` FOREIGN KEY (`propId`) REFERENCES `tblprops` (`pId`);

--
-- Constraints for table `tbluseraddress`
--
ALTER TABLE `tbluseraddress`
  ADD CONSTRAINT `FK_tblCustomerAddress_tblCity` FOREIGN KEY (`cid`) REFERENCES `tblcity` (`cid`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
