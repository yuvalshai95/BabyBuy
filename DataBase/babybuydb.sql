-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 06, 2021 at 01:40 PM
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
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `ArticleID` int(11) NOT NULL AUTO_INCREMENT,
  `ArticleHeader` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ArticleCategory` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ArticleBody` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `ArticleTimeStamp` timestamp NOT NULL,
  `ImageRefrence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ArticleID`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ArticleID`, `ArticleHeader`, `ArticleCategory`, `ArticleBody`, `ArticleTimeStamp`, `ImageRefrence`) VALUES
(34, 'TEST', ' 1 ', '<p>TEST</p>', '2021-07-29 15:17:55', '932698548'),
(35, 'YUVAL', ' 1 ', '<h1><span style=\"text-decoration: underline;\"><span style=\"font-size: 10px;\">asdasdasd</span>S</span></h1>\r\n<h1><span style=\"text-decoration: underline;\">ADASDASDASD</span></h1>\r\n<p><span style=\"text-decoration: underline;\"><br /></span></p>\r\n<p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: large;\"><strong><span style=\"text-decoration: underline;\">dfsdfsdf</span></strong></span></p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 4px; top: 76.7812px;\">&nbsp;</div>', '2021-07-29 15:20:48', '1984400983'),
(36, 'YUVAL', ' 1 ', '<h1><span style=\"text-decoration: underline;\"><span style=\"font-size: 10px;\">asdasdasd</span>S</span></h1>\r\n<h1><span style=\"text-decoration: underline;\">ADASDASDASD</span></h1>\r\n<p><span style=\"text-decoration: underline;\"><br /></span></p>\r\n<p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: large;\"><strong><span style=\"text-decoration: underline;\">dfsdfsdf</span></strong></span></p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 4px; top: 76.7812px;\">&nbsp;</div>', '2021-07-29 15:28:07', '1426813822'),
(37, 'YUVAL', ' 1 ', '<h1><span style=\"text-decoration: underline;\"><span style=\"font-size: 10px;\">asdasdasd</span>S</span></h1>\r\n<h1><span style=\"text-decoration: underline;\">ADASDASDASD</span></h1>\r\n<p><span style=\"text-decoration: underline;\"><br /></span></p>\r\n<p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: large;\"><strong><span style=\"text-decoration: underline;\">dfsdfsdf</span></strong></span></p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 4px; top: 76.7812px;\">&nbsp;</div>', '2021-07-29 15:36:15', '1636908455'),
(38, 'YUVAL', ' 1 ', '<h1><span style=\"text-decoration: underline;\"><span style=\"font-size: 10px;\">asdasdasd</span>S</span></h1>\r\n<h1><span style=\"text-decoration: underline;\">ADASDASDASD</span></h1>\r\n<p><span style=\"text-decoration: underline;\"><br /></span></p>\r\n<p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: large;\"><strong><span style=\"text-decoration: underline;\">dfsdfsdf</span></strong></span></p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 4px; top: 76.7812px;\">&nbsp;</div>', '2021-07-29 15:36:34', '1300088998'),
(39, 'YUVAL', ' 1 ', '<h1><span style=\"text-decoration: underline;\"><span style=\"font-size: 10px;\">asdasdasd</span>S</span></h1>\r\n<h1><span style=\"text-decoration: underline;\">ADASDASDASD</span></h1>\r\n<p><span style=\"text-decoration: underline;\"><br /></span></p>\r\n<p><span style=\"font-family: \'comic sans ms\', sans-serif; font-size: large;\"><strong><span style=\"text-decoration: underline;\">dfsdfsdf</span></strong></span></p>\r\n<div id=\"gtx-trans\" style=\"position: absolute; left: 4px; top: 76.7812px;\">&nbsp;</div>', '2021-07-29 15:36:51', '1642459274');

-- --------------------------------------------------------

--
-- Table structure for table `articles_images`
--

DROP TABLE IF EXISTS `articles_images`;
CREATE TABLE IF NOT EXISTS `articles_images` (
  `ImageID` int(11) NOT NULL AUTO_INCREMENT,
  `ImageName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImagePath` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImageRefrence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ImageID`)
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles_images`
--

INSERT INTO `articles_images` (`ImageID`, `ImageName`, `ImagePath`, `ImageRefrence`) VALUES
(41, '6102f0d33327a9.45365369.png', 'C:/wamp64/www/BabyBuy/admin/Web/6102f0d33327a9.45365369.png', '932698548'),
(42, '6102f0d3334f31.99951486.jpg', 'C:/wamp64/www/BabyBuy/admin/Web/6102f0d3334f31.99951486.jpg', '932698548'),
(43, '6102f0d3336419.18121127.jpeg', 'C:/wamp64/www/BabyBuy/admin/Web/6102f0d3336419.18121127.jpeg', '932698548'),
(44, '6102f180c3b7d9.05751776.jpeg', 'C:/wamp64/www/BabyBuy/admin/Web/6102f180c3b7d9.05751776.jpeg', '1984400983'),
(45, '6102f337baba78.71356909.jpeg', 'C:/wamp64/www/BabyBuy/admin/Web/6102f337baba78.71356909.jpeg', '1426813822'),
(46, '6102f51f885166.00004651.jpeg', 'C:/wamp64/www/BabyBuy/admin/Web/6102f51f885166.00004651.jpeg', '1636908455'),
(47, '6102f532be1be3.97683709.jpeg', 'C:/wamp64/www/BabyBuy/admin/Web/6102f532be1be3.97683709.jpeg', '1300088998'),
(48, '6102f5437044f1.37383289.jpeg', 'C:/wamp64/www/BabyBuy/admin/Web/6102f5437044f1.37383289.jpeg', '1642459274');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(25) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

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
  `ProductTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ProductID`),
  KEY `Product` (`UserID`),
  KEY `Product2` (`ProductCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `UserID`, `ProductCategory`, `ProductName`, `Description`, `PickupOptions`, `Age`, `Price`, `Remarks`, `Status`, `ProductCondition`, `Picture`, `ProductTime`) VALUES
(1, 1, 1, 'Guitar', 'A toy guitar for childrens text text text text text text text text text text text text text text text', 'Local', 5, 50, NULL, 'For Sale', 'New', '', '2021-08-06 12:41:59'),
(2, 1, 1, 'Guitar', 'A toy guitar for childrens text text text text text text text text text text text text text text text', 'Local', 5, 50, NULL, 'For Sale', 'New', '', '2021-08-06 12:41:59');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `City`, `UserEmail`, `UserPassword`, `PhoneNumber`, `Interest`, `Address`) VALUES
(1, 'Yuval', 'Shai', 'Ramat Yishai', 'yuval1234@gmail.com', 'yuval123456', '0528954775', NULL, NULL),
(2, 'Yuval', 'Shai', 'Ramat Yishai', 'yuval1234@gmail.com', 'yuval123456', '0528954775', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users_images`
--

DROP TABLE IF EXISTS `users_images`;
CREATE TABLE IF NOT EXISTS `users_images` (
  `ImageID` int(11) NOT NULL AUTO_INCREMENT,
  `ImageName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImagePath` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImageRefrence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ImageID`)
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
