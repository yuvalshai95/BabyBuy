-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 10, 2021 at 11:49 AM
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`AdminID`, `AdminFirstName`, `AdminLastName`, `AdminAddress`, `AdminCity`, `AdminPhone`, `AdminEmail`, `AdminPassword`) VALUES
(1, 'Yuval', 'Shai', 'Hamarganyot 13', 'Ramat Yishai', '0528954775', 'yuvalshai95@gmail.com', '123456');

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
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`ArticleID`, `ArticleHeader`, `ArticleCategory`, `ArticleBody`, `ArticleTimeStamp`, `ImageRefrence`) VALUES
(47, 'WELCOME', ' 1 ', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2021-08-08 16:33:57', '1551191465'),
(48, 'Buy This Now!', ' 5 ', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2021-08-15 14:07:09', '332800290'),
(49, 'Article Number 3', ' 1 ', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2021-08-15 15:55:06', '192258140'),
(50, 'Article Number 4', ' 1 ', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2021-08-15 15:55:26', '865786994'),
(51, 'Article Number 5', ' 1 ', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2021-08-15 16:05:57', '1904489000');

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
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(48, '6102f5437044f1.37383289.jpeg', 'C:/wamp64/www/BabyBuy/admin/Web/6102f5437044f1.37383289.jpeg', '1642459274'),
(49, '610edc24599188.95595726.jpg', 'C:/wamp64/www/BabyBuy/admin/Web/610edc24599188.95595726.jpg', '1824810603'),
(50, '610edc2459b6e4.39945612.jpg', 'C:/wamp64/www/BabyBuy/admin/Web/610edc2459b6e4.39945612.jpg', '1824810603'),
(51, '610edd15e96f52.10021147.jpg', 'C:/wamp64/www/BabyBuy/admin/Web/610edd15e96f52.10021147.jpg', '1497973016'),
(52, '610ee053900634.78873871.jpeg', 'Web/610ee053900634.78873871.jpeg', '1460656297'),
(53, '610ee088754540.80840461.jpeg', 'Web/610ee088754540.80840461.jpeg', '264318368'),
(54, '6110302c875eb0.31234223.jpg', 'Web/6110302c875eb0.31234223.jpg', '860489407'),
(55, '6110302c878400.37821653.jpg', 'Web/6110302c878400.37821653.jpg', '860489407'),
(56, '6110302c879d35.79214896.jpeg', 'Web/6110302c879d35.79214896.jpeg', '860489407'),
(57, '611030747225b0.84657484.jpg', 'Web/611030747225b0.84657484.jpg', '2056817460'),
(58, '6110308be3a112.26151062.jpg', 'Web/6110308be3a112.26151062.jpg', '1663304770'),
(59, '6110308be3c9d0.56911465.png', 'Web/6110308be3c9d0.56911465.png', '1663304770'),
(60, '611031a5ca5f22.33426084.jpg', 'Web/611031a5ca5f22.33426084.jpg', '1551191465'),
(61, '611031a5ca92d2.72654504.jpeg', 'Web/611031a5ca92d2.72654504.jpeg', '1551191465'),
(62, '611949bdd96e81.08538451.jpeg', 'Web/611949bdd96e81.08538451.jpeg', '332800290'),
(63, '611949bdd990e1.80653723.jpeg', 'Web/611949bdd990e1.80653723.jpeg', '332800290'),
(64, '611949bdd9a982.20129271.jpeg', 'Web/611949bdd9a982.20129271.jpeg', '332800290'),
(65, '6119630a70eee7.28925558.jpg', 'Web/6119630a70eee7.28925558.jpg', '192258140'),
(66, '6119630a7116f6.98832609.jpeg', 'Web/6119630a7116f6.98832609.jpeg', '192258140'),
(67, '6119630a713034.93802408.jpeg', 'Web/6119630a713034.93802408.jpeg', '192258140'),
(68, '6119631e500055.69768306.jpeg', 'Web/6119631e500055.69768306.jpeg', '865786994'),
(69, '6119631e502156.04345126.jpeg', 'Web/6119631e502156.04345126.jpeg', '865786994'),
(70, '6119631e5045d6.15746078.jpeg', 'Web/6119631e5045d6.15746078.jpeg', '865786994'),
(71, '6119659575e260.04917933.jpeg', 'Web/6119659575e260.04917933.jpeg', '1904489000');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int(11) NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(25) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Toys'),
(5, 'Bags'),
(12, 'Shoes');

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
  `Description` text NOT NULL,
  `PickupOptions` varchar(20) NOT NULL,
  `Age` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Status` varchar(20) NOT NULL,
  `ProductCondition` varchar(255) NOT NULL,
  `ProductTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ImageRefrence` varchar(255) NOT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `Product` (`UserID`),
  KEY `Product2` (`ProductCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`ProductID`, `UserID`, `ProductCategory`, `ProductName`, `Description`, `PickupOptions`, `Age`, `Price`, `Status`, `ProductCondition`, `ProductTime`, `ImageRefrence`) VALUES
(20, 37, 12, 'Leather Shoes', 'orem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'local', 3, 99, 'Available', 'new', '2021-09-06 12:58:34', '1109603186'),
(21, 1, 5, 'Single to Double Stroller With Extendable', 'Great opportunity to get this coveted, sleek stroller for your precious cargo. This stroller has all of the bells and whistles you need. Not only does it provide comfort for baby, it provides a smooth push around town. The updated extendable canopy has SPF 50 sun protection and comes with an extendable sunshade to provide full protection. It has enhanced features including the ability to add a second seat (sold separately) for multiple double stroller configurations to work for your growing family, no flat wheels, a front facing/rear facing seat and full recline.\"', 'local', 12, 120, 'Available', 'barley', '2021-09-10 11:07:13', '1651021212'),
(22, 1, 5, 'BabyBjorn Baby Carrier One Air', 'The Original Baby Bjorn carrier thatâ€™s been pleasing families for years just got a cool upgrade, and itâ€™s pretty great! With the Baby Bjorn One Air, you can carry your little one from birth to age 3 without the need for an infant insert. It features 4 different carry positions: newborn, facing in, facing out, and back carry, and the wide seat insures an ergonomic and hip healthy alignment for baby. You will appreciate the mesh fabric which allows for airflow, the padded shoulder straps, and supportive waist belt. Carrying Positions: Facing Inward, Facing Outward, Back Carry Baby Size: 8-33 lbs (0-3 years) \"carry', 'shipping', 36, 132, 'Available', 'gently', '2021-09-10 12:03:02', '1617754952'),
(23, 1, 12, 'Maxi Cosi Mico Max Infant Car Seat', 'Ultra comfort and added safety features make this seat the best option for your child. It features side impact protection, infant support for even the smallest babies (starts at 4 lbs), a large canopy, and a comfortable handle. One of the best features is that cleaning it is a breeze!\" car seat', 'local', 40, 159, 'Available', 'open', '2021-09-10 12:13:09', '1503112379'),
(24, 1, 1, 'Babyletto Hudson three in one Crib', 'This sleek and modern crib makes a charming centerpiece in any nursery. It features 4 mattress height settings and converts into a toddler bed and daybed. crib', 'local', 36, 219, 'Available', 'new', '2021-09-10 12:25:30', '1615977015');

-- --------------------------------------------------------

--
-- Table structure for table `site_options`
--

DROP TABLE IF EXISTS `site_options`;
CREATE TABLE IF NOT EXISTS `site_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `site_options`
--

INSERT INTO `site_options` (`id`, `facebook`, `instagram`, `linkedin`, `copyright`) VALUES
(1, 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', 'copyright Â©2021 Yuval and Adi');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `SliderID` int(11) NOT NULL AUTO_INCREMENT,
  `SliderTitle` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SliderImage` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`SliderID`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`SliderID`, `SliderTitle`, `SliderImage`) VALUES
(22, 'slider4', 'Web/61153afbe03eb2.21436757.jpg'),
(21, 'slider3', 'Web/6115329be24319.40946093.jpg'),
(19, 'slider1', 'Web/6115328e861c37.17563292.jpg'),
(20, 'slider2', 'Web/611532958bbf03.55136033.jpg');

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
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sub_category`
--

INSERT INTO `sub_category` (`SubCategoryID`, `CategoryID`, `SubCategoryName`) VALUES
(7, 1, 'sub1'),
(8, 12, 'sub2'),
(10, 5, 'sub4'),
(11, 5, 'sub5');

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
  `PhoneNumber` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Interest` varchar(30) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `City`, `UserEmail`, `UserPassword`, `PhoneNumber`, `Interest`, `Address`) VALUES
(1, 'Yuval', 'Shai', 'Ramat Yishai', 'yuvalshai95@gmail.com', 'Yuval@9530', '0528954775', NULL, 'Hamarganyot 13'),
(2, 'Yuval', 'Cohen', 'Natanya', 'yuval1234@gmail.com', 'yuval123456', '0528954775', NULL, 'dereh dganya 50'),
(37, 'xxx', 'xxx', 'xxx', 'xxx@gmail.com', 'Yuval@9530', '0528954775', 'Shoes', 'xxx'),
(38, 'linoy', 'machloof', 'Natanya kiryat hasharon', 'linoy@gmail.com', 'Linoy@1234', '0524299059', 'Shoes', '50');

-- --------------------------------------------------------

--
-- Table structure for table `users_products_images`
--

DROP TABLE IF EXISTS `users_products_images`;
CREATE TABLE IF NOT EXISTS `users_products_images` (
  `ImageID` int(11) NOT NULL AUTO_INCREMENT,
  `ImageName` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImagePath` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImageRefrence` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ImageID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users_products_images`
--

INSERT INTO `users_products_images` (`ImageID`, `ImageName`, `ImagePath`, `ImageRefrence`) VALUES
(1, '6135e64af2a1c5.62634135.jpg', '../admin/Web/6135e64af2a1c5.62634135.jpg', '1109603186'),
(2, '6135e64af2d139.35639894.jpg', '../admin/Web/6135e64af2d139.35639894.jpg', '1109603186'),
(3, '6135e64af2f004.73138508.jpg', '../admin/Web/6135e64af2f004.73138508.jpg', '1109603186'),
(4, '6135e64af30a47.21114079.jpg', '../admin/Web/6135e64af30a47.21114079.jpg', '1109603186'),
(5, '613b12311dc918.60417773.jpg', '../admin/Web/613b12311dc918.60417773.jpg', '1651021212'),
(6, '613b12311e5179.45626998.jpg', '../admin/Web/613b12311e5179.45626998.jpg', '1651021212'),
(7, '613b12311e7464.57800346.jpg', '../admin/Web/613b12311e7464.57800346.jpg', '1651021212'),
(8, '613b12311e8cb4.89878721.jpg', '../admin/Web/613b12311e8cb4.89878721.jpg', '1651021212'),
(9, '613b1f46c9f282.44215623.png', '../admin/Web/613b1f46c9f282.44215623.png', '1617754952'),
(10, '613b1f46ca1b97.39533760.png', '../admin/Web/613b1f46ca1b97.39533760.png', '1617754952'),
(11, '613b1f46ca3813.60683968.png', '../admin/Web/613b1f46ca3813.60683968.png', '1617754952'),
(12, '613b1f46ca4fa2.80903776.jpg', '../admin/Web/613b1f46ca4fa2.80903776.jpg', '1617754952'),
(13, '613b21a56d9e49.64738958.jpg', '../admin/Web/613b21a56d9e49.64738958.jpg', '1503112379'),
(14, '613b21a56dcc82.35404454.jpg', '../admin/Web/613b21a56dcc82.35404454.jpg', '1503112379'),
(15, '613b21a56deaa8.43498630.jpg', '../admin/Web/613b21a56deaa8.43498630.jpg', '1503112379'),
(16, '613b21a56e0378.39238643.jpg', '../admin/Web/613b21a56e0378.39238643.jpg', '1503112379'),
(17, '613b248a47edd1.22030171.jpg', '../admin/Web/613b248a47edd1.22030171.jpg', '1615977015'),
(18, '613b248a481ff9.75106788.jpg', '../admin/Web/613b248a481ff9.75106788.jpg', '1615977015'),
(19, '613b248a483e67.17259880.jpg', '../admin/Web/613b248a483e67.17259880.jpg', '1615977015'),
(20, '613b248a485a30.30505565.jpg', '../admin/Web/613b248a485a30.30505565.jpg', '1615977015');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `ProductID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `UserWishlistId` int(11) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Wishlist1` (`ProductID`),
  KEY `Wishlist2` (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=85 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`ID`, `ProductID`, `UserID`, `UserWishlistId`) VALUES
(84, 20, 37, 1);

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
