-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 25, 2021 at 02:02 PM
-- Server version: 5.7.31
-- PHP Version: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `babybuydb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `AdminID` int(11) NOT NULL AUTO_INCREMENT,
  `AdminFirstName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdminLastName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdminAddress` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdminCity` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdminPhone` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdminEmail` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdminPassword` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`AdminID`, `AdminFirstName`, `AdminLastName`, `AdminAddress`, `AdminCity`, `AdminPhone`, `AdminEmail`, `AdminPassword`) VALUES
(1, 'Yuval', 'Shai', 'Hamarganyot 13', 'Ramat Yishai', '0528954775', 'yuvalshai95@gmail.com', '123456'),
(2, 'Yuval', 'Shai', 'Hamarganyot 13', 'Ramat Yishai', '0528954775', 'yuvalshai95@gmail.com', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(25) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Toys'),
(5, 'Bags'),
(6, 'Dress');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `NotificationID` int(11) NOT NULL AUTO_INCREMENT,
  `NotificationMessage` varchar(500) NOT NULL,
  `TelegramGroupName` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  PRIMARY KEY (`NotificationID`),
  KEY `Notification2` (`CategoryID`),
  KEY `Notification1` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ProductID` int(11) NOT NULL AUTO_INCREMENT,
  `UserID` int(11) NOT NULL,
  `ProductCategory` int(11) NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `PickupOptions` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Remarks` varchar(255) DEFAULT NULL,
  `Status` varchar(20) NOT NULL,
  `ProductCondition` varchar(255) NOT NULL,
  `Picture` varchar(255) NOT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `Product` (`UserID`),
  KEY `Product2` (`ProductCategory`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `sub_category`
--

DROP TABLE IF EXISTS `sub_category`;
CREATE TABLE IF NOT EXISTS `sub_category` (
  `SubCategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryID` int(11) NOT NULL,
  `SubCategoryName` varchar(25) NOT NULL,
  PRIMARY KEY (`SubCategoryID`),
  KEY `SubCategory1` (`CategoryID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserEmail` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserPassword` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhoneNumber` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Interest` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  KEY `Wishlist1` (`ProductID`),
  KEY `Wishlist2` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `Notification1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `Notification2` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Product` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `Product2` FOREIGN KEY (`ProductCategory`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `sub_category`
--
ALTER TABLE `sub_category`
  ADD CONSTRAINT `SubCategory1` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- Constraints for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `Wishlist1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`),
  ADD CONSTRAINT `Wishlist2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
