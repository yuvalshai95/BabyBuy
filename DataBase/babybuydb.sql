-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: אוקטובר 06, 2021 בזמן 06:40 PM
-- גרסת שרת: 8.0.21
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
-- מבנה טבלה עבור טבלה `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `AdminID` int NOT NULL AUTO_INCREMENT,
  `AdminFirstName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdminLastName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdminAddress` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdminCity` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `AdminPhone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdminEmail` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `AdminPassword` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`AdminID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- הוצאת מידע עבור טבלה `admins`
--

INSERT INTO `admins` (`AdminID`, `AdminFirstName`, `AdminLastName`, `AdminAddress`, `AdminCity`, `AdminPhone`, `AdminEmail`, `AdminPassword`) VALUES
(1, 'Yuval', 'Shai', 'Hamarganyot 13', 'Ramat Yishai', '0528954775', 'yuvalshai95@gmail.com', '123456');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `ArticleID` int NOT NULL AUTO_INCREMENT,
  `ArticleHeader` varchar(40) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ArticleCategory` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ArticleBody` mediumtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ArticleTimeStamp` timestamp NOT NULL,
  `ImageRefrence` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ArticleID`)
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- הוצאת מידע עבור טבלה `articles`
--

INSERT INTO `articles` (`ArticleID`, `ArticleHeader`, `ArticleCategory`, `ArticleBody`, `ArticleTimeStamp`, `ImageRefrence`) VALUES
(49, 'Vacation with kids - What should we take', ' 16 ', '<p><strong>Lorem Ipsum</strong><span>&nbsp;is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</span></p>', '2021-08-15 15:55:06', '192258140'),
(54, 'Best Car Seats of 2021', ' 12 ', '<p><span><strong>Lorem ipsum</strong> dolor sit amet consectetur adipisicing elit. Neque voluptas hic quam rem culpa fuga delectus laudantium laborum praesentium repellendus accusamus, illo commodi ut dignissimos molestias. Facilis eligendi hic odio.</span></p>', '2021-10-01 06:52:23', '1640251324'),
(55, 'Games that help the child develop', ' 1 ', '<p><span><strong>Lorem ipsum</strong> dolor sit amet consectetur adipisicing elit. Neque voluptas hic quam rem culpa fuga delectus laudantium laborum praesentium repellendus accusamus, illo commodi ut dignissimos molestias.</span></p>', '2021-10-01 07:08:23', '2094953873'),
(57, 'Nursery Design - All the Tips!', ' 5 ', '<p><span><strong>Lorem ipsum</strong> dolor sit amet consectetur adipisicing elit. Neque voluptas hic quam rem culpa fuga delectus laudantium laborum praesentium repellendus accusamus, illo commodi ut dignissimos molestias. Facilis eligendi hic odio.</span></p>', '2021-10-01 07:12:22', '2083676316'),
(58, 'Breastfeeding in the first days', ' 18 ', '<p><span><strong>Lorem ipsum</strong> dolor sit amet consectetur adipisicing elit. Neque voluptas hic quam rem culpa fuga delectus laudantium laborum praesentium repellendus accusamus, illo commodi ut dignissimos molestias. Facilis eligendi hic odio.</span></p>', '2021-10-01 07:20:55', '1283458496');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `articles_images`
--

DROP TABLE IF EXISTS `articles_images`;
CREATE TABLE IF NOT EXISTS `articles_images` (
  `ImageID` int NOT NULL AUTO_INCREMENT,
  `ImageName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImagePath` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImageRefrence` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ImageID`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- הוצאת מידע עבור טבלה `articles_images`
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
(71, '6119659575e260.04917933.jpeg', 'Web/6119659575e260.04917933.jpeg', '1904489000'),
(72, '6148d9d8c61592.75848218.jpeg', 'Web/6148d9d8c61592.75848218.jpeg', '1345427714'),
(73, '6148d9d8c63ff1.69113303.jpeg', 'Web/6148d9d8c63ff1.69113303.jpeg', '1345427714'),
(74, '6156d73f6d3c54.02013522.jpg', 'Web/6156d73f6d3c54.02013522.jpg', '1198972748'),
(75, '6156d73f6d8e77.90377869.jpg', 'Web/6156d73f6d8e77.90377869.jpg', '1198972748'),
(76, '6156d73f6d8fe6.17575263.jpg', 'Web/6156d73f6d8fe6.17575263.jpg', '1198972748'),
(77, '6156da571bddb1.12806630.jpg', 'Web/6156da571bddb1.12806630.jpg', '1640251324'),
(78, '6156da571c2a49.96144806.jpg', 'Web/6156da571c2a49.96144806.jpg', '1640251324'),
(79, '6156da571c6267.24308047.jpg', 'Web/6156da571c6267.24308047.jpg', '1640251324'),
(80, '6156de17e67960.02761718.jpg', 'Web/6156de17e67960.02761718.jpg', '2094953873'),
(81, '6156de17e6e282.06575887.jpg', 'Web/6156de17e6e282.06575887.jpg', '2094953873'),
(82, '6156de17e72cc8.05827992.jpg', 'Web/6156de17e72cc8.05827992.jpg', '2094953873'),
(83, '6156de44545eb9.76149835.jpg', 'Web/6156de44545eb9.76149835.jpg', '1109534686'),
(84, '6156de44560488.94933557.jpg', 'Web/6156de44560488.94933557.jpg', '1109534686'),
(85, '6156de44563e70.24353573.jpg', 'Web/6156de44563e70.24353573.jpg', '1109534686'),
(86, '6156df06c870f0.01579473.jpg', 'Web/6156df06c870f0.01579473.jpg', '2083676316'),
(87, '6156df06c8a412.08186835.jpg', 'Web/6156df06c8a412.08186835.jpg', '2083676316'),
(88, '6156df06cebc05.32741150.jpg', 'Web/6156df06cebc05.32741150.jpg', '2083676316'),
(89, '6156e107429257.76074374.jpg', 'Web/6156e107429257.76074374.jpg', '1283458496'),
(90, '6156e10743e669.08157727.jpg', 'Web/6156e10743e669.08157727.jpg', '1283458496'),
(91, '6156e107441593.36007172.jpg', 'Web/6156e107441593.36007172.jpg', '1283458496');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `CategoryID` int NOT NULL AUTO_INCREMENT,
  `CategoryName` varchar(25) NOT NULL,
  PRIMARY KEY (`CategoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `category`
--

INSERT INTO `category` (`CategoryID`, `CategoryName`) VALUES
(1, 'Toys'),
(5, 'Cribs'),
(12, 'Car Seats'),
(16, 'Travel Gear'),
(17, 'Strollers'),
(18, 'Diapering');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `notification`
--

DROP TABLE IF EXISTS `notification`;
CREATE TABLE IF NOT EXISTS `notification` (
  `NotificationID` int NOT NULL AUTO_INCREMENT,
  `NotificationMessage` varchar(500) NOT NULL,
  `TelegramGroupName` varchar(255) NOT NULL,
  `UserID` int NOT NULL,
  `CategoryID` int NOT NULL,
  PRIMARY KEY (`NotificationID`),
  KEY `Notification2` (`CategoryID`),
  KEY `Notification1` (`UserID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `ProductID` int NOT NULL AUTO_INCREMENT,
  `UserID` int NOT NULL,
  `ProductCategory` int NOT NULL,
  `ProductName` varchar(255) NOT NULL,
  `Description` text NOT NULL,
  `PickupOptions` varchar(20) NOT NULL,
  `Age` int NOT NULL,
  `Price` float NOT NULL,
  `Status` varchar(20) NOT NULL,
  `ProductCondition` varchar(255) NOT NULL,
  `ProductTime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ImageRefrence` varchar(255) NOT NULL,
  PRIMARY KEY (`ProductID`),
  KEY `Product` (`UserID`),
  KEY `Product2` (`ProductCategory`)
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `product`
--

INSERT INTO `product` (`ProductID`, `UserID`, `ProductCategory`, `ProductName`, `Description`, `PickupOptions`, `Age`, `Price`, `Status`, `ProductCondition`, `ProductTime`, `ImageRefrence`) VALUES
(21, 1, 17, 'Single to Double Stroller With Extendable', 'Great opportunity to get this coveted, sleek stroller for your precious cargo. This stroller has all of the bells and whistles you need. Not only does it provide comfort for baby, it provides a smooth push around town. The updated extendable canopy has SPF 50 sun protection and comes with an extendable sunshade to provide full protection. It has enhanced features including the ability to add a second seat (sold separately) for multiple double stroller configurations to work for your growing family, no flat wheels, a front facing/rear facing seat and full recline.\"', 'local', 3, 215, 'Available', 'new', '2021-09-10 11:07:13', '1651021212'),
(22, 1, 16, 'BabyBjorn Baby Carrier One Air', 'The Original Baby Bjorn carrier thatâ€™s been pleasing families for years just got a cool upgrade, and itâ€™s pretty great! With the Baby Bjorn One Air, you can carry your little one from birth to age 3 without the need for an infant insert. It features 4 different carry positions: newborn, facing in, facing out, and back carry, and the wide seat insures an ergonomic and hip healthy alignment for baby. You will appreciate the mesh fabric which allows for airflow, the padded shoulder straps, and supportive waist belt. Carrying Positions: Facing Inward, Facing Outward, Back Carry Baby Size: 8-33 lbs (0-3 years) \"carry', 'shipping', 36, 132, 'Available', 'gently', '2021-09-10 12:03:02', '1617754952'),
(24, 1, 5, 'Babyletto Hudson three in one Crib', 'This sleek and modern crib makes a charming centerpiece in any nursery. It features 4 mattress height settings and converts into a toddler bed and daybed. crib', 'local', 36, 219, 'Available', 'new', '2021-09-27 12:38:06', '1615977015'),
(26, 37, 16, 'Leather Shoes', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', 'local', 3, 65, 'Available', 'barley', '2021-09-25 19:46:25', '1231698138'),
(27, 43, 16, 'Skip Hop Grab And Go Double Bottle Bag', 'This bag makes taking bottles or snacks on the go easy and keeps them cool very stylish and good looking you should buy this bag its fun light and nice. Lorem ipsum is easy to use and lorem ipsum is easy Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'local', 12, 8, 'Available', 'new', '2021-10-01 13:33:22', '2124683641'),
(28, 43, 1, 'A variety of Puzzles for children', 'A variety of puzzles for different characters and TV shows for kids ages 3 and up.12-400 pieces. excellent condition.', 'shipping', 40, 11, 'sold', 'open', '2021-10-01 18:39:47', '47884605'),
(29, 44, 12, 'Nuna Pipa Lite LX Infant Car Seat', 'The Nuna Pipa Lite LX is ultra-portable and seriously protective. It has a lightweight design at only 5.7 pounds. The integrated 5-point harness holders help when buckling baby safely in place. It has a roomy and plush styling to ensure your baby experiences a safe and comfortable ride. The Pipa Lite LX also has a UPF 50+ canopy with Dream drape™ that offers sun protection and lots of coverage so baby stays safe, dry and protected from the sun. Safety features include: Aerospace aluminum; crumple zone within the stability leg absorbs impact and minimizes force to baby; side impact protection\r\n', 'local', 3, 300, 'Available', 'barley', '2021-10-01 14:02:34', '677012958'),
(30, 44, 16, 'Disney Frozen Elsa And Anna Lunch Bag', 'Need to keep your lunches cold? The power of the famous Arendelle Ice queen ought to do the trick! Your little Frozen fan will be delighted to pack their lunch in their very own Elsa and Anna lunchbox. Comes with a shoulder strap for easy carrying', 'shipping', 40, 50, 'Available', 'gently', '2021-10-01 15:38:51', '123315952'),
(31, 44, 5, ' Graco Pack and Play Portable Seat and Changer Playard', 'The Pack \'n Play Portable Seat & Changer Playard moves with you around the home and makes caring for baby even easier. The newborn seat station creates a cozy, dedicated space for baby to play. This playpen grows with baby - from newborn to toddler - thanks to the portable Newborn Seat station, removable infant bassinet and roomy portable playard space.  This Pack \'n Play includes an additional Sproutwise kids mattress that measures 2\" thick with a removable machine-washable cover', 'local', 12, 66, 'Available', 'barley', '2021-10-01 15:44:02', '179037510'),
(32, 44, 1, 'Le Toy Van Sweet Dreams Doll Pram', 'Your child is sure to have a wonderful time pushing around their dolls and stuffed animals in this beautiful pram.', 'local', 40, 36, 'Available', 'open', '2021-10-01 15:48:22', '68267239'),
(33, 39, 16, 'My Brest Friend Inflatable Travel Nursing Pillow', 'The same award-winning design as the original My Brest Friend pillow, but this one is inflatable and perfect for travel! Packs flat to easily fit in a diaper bag or purse. Lorem ipsum is easy to use Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s', 'local', 36, 20, 'Available', 'new', '2021-10-01 15:54:30', '821538422'),
(34, 39, 1, 'Sassy The Mover and Shaker Sensory Toy Gift Set', 'Babies adore toys that help them boost their ever growing senses. This gift set is great for ages 6 months and up and includes a Rainbow Reel, Magnetic Stacking Pals, a Linky Link, and a 5 piece Ring O\' Link set.', 'shipping', 12, 17, 'Available', 'open', '2021-10-01 15:57:04', '1901316867'),
(35, 39, 17, 'Precious Toys Foldable Doll Jogger Stroller Baby Blue', 'Your baby’s baby needs a sweet ride, too! Strap in a doll or stuffie and let your child lead the walk around the neighborhood.', 'shipping', 36, 54, 'Available', 'new', '2021-10-01 15:59:00', '2056913557'),
(36, 39, 18, ' BUNDLE Cloth Diapers The Little Bee Co', 'Want to try out a few different cloth diaper brands and styles without having to commit to one? This set is for you!', 'local', 3, 25, 'Available', 'new', '2021-10-01 16:03:12', '207495171'),
(37, 40, 18, 'Small gDiapers Cloth Diapers', 'A fantastic diapering option that is convenient, environmentally friendly, and affordable.', 'shipping', 3, 9, 'Available', 'gently', '2021-10-01 16:05:42', '341911931'),
(38, 40, 12, 'Cybex Sirona M Convertible Car Seat With Sensor Safe Manhattan Grey', 'Great convertible car seat to last from birth to approximately 4 years of age with multiple additional safety features. The SensorSafe feature provides peace of mind by alerting parents or caregivers of any unsafe conditions. It’s full of other features as well, including a multi-positional headrest, side-impact protection, newborn insert, and rear or front facing options.', 'shipping', 12, 180, 'Available', 'new', '2021-10-01 16:08:26', '97612761'),
(39, 1, 12, ' Maxi Cosi Mico Infant Car Seat Radish Ruby', 'Ultra comfort and added safety features make this seat the best option for your child. It features infant support for even the smallest babies (starts at 5 lbs), a large canopy, and a comfortable handle. One of the best features is that cleaning it is a breeze!', 'local', 12, 143, 'Available', 'gently', '2021-10-01 16:28:30', '1179669010'),
(40, 1, 5, 'KidKraft Racecar Toddler Bed', 'Toddler will love racing off to sleep in this cool big kid bed, can tell it has been used, screws are still intact and wood is chipped. 71\" x 29.75\" x 18.25\r\nVery beautiful and comfortable\r\n', 'shipping', 40, 58, 'Available', 'barley', '2021-10-01 16:31:10', '386079840'),
(41, 42, 5, ' Nook Pebble Pure Mini Crib Mattress', 'As a parent, sleep is sacred. This mattress is designed to provide a sound nights sleep for your little one, and that means you will sleep too! Nook Pebble Pure Mattresses are 100% organic, breathable, antimicrobial, safe, healthy, and beautiful. As if that wasn\'t already great enough, they also come in a rainbow of tantalizing colors to make you smile. Of course when you are finally sleeping through the night, what won\'t make you smile!', 'local', 12, 162, 'Available', 'open', '2021-10-01 16:40:59', '23850176'),
(42, 42, 18, ' Pottery Barn Kids Madison Changing Table System', 'Made with the quality you have come to expect from Pottery Barn Kids this changing table system is versatile and will last your child for years. Features easy glide drawers and a slide out diaper pail tray. Please note, this item is for WAREHOUSE PICKUP ONLY and cannot be delivered.', 'shipping', 12, 280, 'Available', 'open', '2021-10-01 16:44:12', '2010163581'),
(43, 42, 1, ' Little Tikes EasyScore Basketball Hoop', 'All toddlers love to throw! Channel that enthusiasm in positive directions with this great toddler-sized basketball hoop! Oversized rim makes it easy for toddlers to succeed. Base can be weighted with sand, if desired, for stability.', 'local', 40, 18, 'Available', 'gently', '2021-10-01 16:45:57', '848126240'),
(44, 42, 17, ' Mockingbird Single to Double Stroller With Extendable Canopy', 'Great opportunity to get this coveted, sleek stroller for your precious cargo. This stroller has all of the bells and whistles you need. Not only does it provide comfort for baby, it provides a smooth push around town. The updated extendable canopy has SPF 50 sun protection and comes with an extendable sunshade to provide full protection. It has enhanced features including the ability to add a second seat (sold separately) for multiple double stroller configurations to work for your growing family, no flat wheels, a front facing/rear facing seat and full recline.', 'shipping', 3, 315, 'Available', 'new', '2021-10-01 16:48:31', '524512084'),
(45, 38, 17, 'Contours Options Stroller for two', 'This convenient double stroller is easy to maneuver through crowds and doorways thanks to the innovative design and narrow frame. The seats are reversible for 7 different seating configurations to suit your family, and the large storage basket has enough room for everything you need for a day out with the kiddos.', 'local', 36, 129, 'Available', 'gently', '2021-10-01 16:51:28', '624300954'),
(46, 38, 12, 'Chicco Keyfit thirty Infant Car Seat', 'Provide a cozy environment for your new arrival with this car seat. It features a newborn support insert for babies 4-11 lbs, removable canopy, an anti-rebound bar, a simple leveling feature that has indicators for a quick and easy install, and padding for ultimate comfort. Rear facing from 4-30 lbs, up to 30 inches tall.', 'shipping', 3, 146, 'Available', 'open', '2021-10-01 16:53:39', '1001010615'),
(47, 38, 18, 'Changing Table Made of solid wood', 'This crib and changing table combo is almost all you need to create the perfect nursery space. The crib has 4 mattress positions and can convert into a toddler bed and a day bed (conversion kits sold separately). The changing table also functions as a 3 drawer dresser, making it the perfect place to store all your baby’s essentials', 'local', 12, 84, 'Available', 'gently', '2021-10-01 16:56:57', '298410583');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `site_options`
--

DROP TABLE IF EXISTS `site_options`;
CREATE TABLE IF NOT EXISTS `site_options` (
  `id` int NOT NULL AUTO_INCREMENT,
  `facebook` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `copyright` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- הוצאת מידע עבור טבלה `site_options`
--

INSERT INTO `site_options` (`id`, `facebook`, `instagram`, `linkedin`, `copyright`) VALUES
(1, 'https://www.facebook.com/', 'https://www.instagram.com/', 'https://www.linkedin.com/', 'copyright ©2021 Yuval and Adi');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `SliderID` int NOT NULL AUTO_INCREMENT,
  `SliderTitle` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `SliderImage` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`SliderID`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- הוצאת מידע עבור טבלה `slider`
--

INSERT INTO `slider` (`SliderID`, `SliderTitle`, `SliderImage`) VALUES
(26, 'Stroller', 'Web/6148e9c4dd41d0.97903032.jpg'),
(28, 'Special Prices', 'Web/6148eedd7fb7c6.95604054.jpg'),
(29, 'Welcome', 'Web/6148f2689624f4.84033046.jpg');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `UserID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `LastName` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `City` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserEmail` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `UserPassword` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `PhoneNumber` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `Interest` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `Address` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- הוצאת מידע עבור טבלה `users`
--

INSERT INTO `users` (`UserID`, `FirstName`, `LastName`, `City`, `UserEmail`, `UserPassword`, `PhoneNumber`, `Interest`, `Address`) VALUES
(1, 'Yuval', 'Shai', 'Ramat Yishai', 'yuvalshai95@gmail.com', 'Yuval@9530', '0528954775', NULL, 'Hamarganyot 13'),
(2, 'Yuval', 'Cohen', 'Natanya', 'yuval1234@gmail.com', 'yuval123456', '0528954775', NULL, 'dereh dganya 50'),
(37, 'xxx', 'xxx', 'xxx', 'xxx@gmail.com', 'Yuval@9530', '0528954775', 'Shoes', 'xxx'),
(38, 'linoy', 'machloof', 'Natanya kiryat hasharon', 'linoy@gmail.com', 'Linoy@1234', '0524299059', 'Shoes', '50'),
(39, 'linoy', 'attias', 'natanya', 'linoy123@gmail.com', 'Yuval@9530', '0528954775', 'Shoes Toys', 'dganya'),
(40, 'idan', 'shai', 'ramat yishai', 'idan@gmail.com', 'Yuval@9530', '0528954775', 'Bags', 'hamrganyot 13'),
(41, 'test', 'test', 'test', 'test@gmail.com', 'Yuval@9530', '0528954775', 'Shoes,Bags,Toys', 'test'),
(42, 'user', 'user', 'user', 'user@gmail.com', 'Yuval@9530', '0528954775', 'Bags', 'user'),
(43, 'Adi', 'Hemo', 'Tel Aviv', 'adi4hemo@gmail.com', 'Qwe123!@#', '0526682665', 'Diapering,Travel Gear,Toys', 'Herzl 32'),
(44, 'Hanan', 'Lev', 'Haifa', 'Hanan@hlev.co.il', 'Qwe123!@#', '0544727478', 'Diapering,Strollers,Travel Gea', 'Hashalom 2');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `users_products_images`
--

DROP TABLE IF EXISTS `users_products_images`;
CREATE TABLE IF NOT EXISTS `users_products_images` (
  `ImageID` int NOT NULL AUTO_INCREMENT,
  `ImageName` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImagePath` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `ImageRefrence` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`ImageID`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- הוצאת מידע עבור טבלה `users_products_images`
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
(20, '613b248a485a30.30505565.jpg', '../admin/Web/613b248a485a30.30505565.jpg', '1615977015'),
(21, '613dda1c694012.88602899.jpeg', '../admin/Web/613dda1c694012.88602899.jpeg', '973262936'),
(22, '61474e98e45423.68014351.jpg', '../admin/Web/61474e98e45423.68014351.jpg', '875857501'),
(23, '61474e98e49b98.54816961.jpg', '../admin/Web/61474e98e49b98.54816961.jpg', '875857501'),
(24, '61474e98e4c6b9.26525269.jpg', '../admin/Web/61474e98e4c6b9.26525269.jpg', '875857501'),
(25, '61474e98e4ef17.03202571.jpg', '../admin/Web/61474e98e4ef17.03202571.jpg', '875857501'),
(26, '61474ec58350d9.79806848.jpg', '../admin/Web/61474ec58350d9.79806848.jpg', '1231698138'),
(27, '61474ec5838de9.09023979.jpg', '../admin/Web/61474ec5838de9.09023979.jpg', '1231698138'),
(28, '61474ec583bc55.39307904.jpg', '../admin/Web/61474ec583bc55.39307904.jpg', '1231698138'),
(29, '61474ec583e063.34998113.jpg', '../admin/Web/61474ec583e063.34998113.jpg', '1231698138'),
(30, '6156e3f21dede1.64958988.jpg', '../admin/Web/6156e3f21dede1.64958988.jpg', '2124683641'),
(31, '6156e3f21e1a84.09527075.jpg', '../admin/Web/6156e3f21e1a84.09527075.jpg', '2124683641'),
(32, '6156e3f21efaa6.39026792.jpg', '../admin/Web/6156e3f21efaa6.39026792.jpg', '2124683641'),
(33, '6156e3f21f2955.51001478.jpg', '../admin/Web/6156e3f21f2955.51001478.jpg', '2124683641'),
(34, '6156e766acdd42.75296626.jpg', '../admin/Web/6156e766acdd42.75296626.jpg', '47884605'),
(35, '6156e766ad2d14.76562851.jpg', '../admin/Web/6156e766ad2d14.76562851.jpg', '47884605'),
(36, '6156e766ad6e41.16899694.jpg', '../admin/Web/6156e766ad6e41.16899694.jpg', '47884605'),
(37, '6156e766ada584.91375468.jpg', '../admin/Web/6156e766ada584.91375468.jpg', '47884605'),
(38, '6156eacaab8be4.77938675.jpg', '../admin/Web/6156eacaab8be4.77938675.jpg', '677012958'),
(39, '6156eacaabdea2.32913652.jpg', '../admin/Web/6156eacaabdea2.32913652.jpg', '677012958'),
(40, '6156eacaae1949.04841698.jpg', '../admin/Web/6156eacaae1949.04841698.jpg', '677012958'),
(41, '6157015bdbcab9.30466178.jpg', '../admin/Web/6157015bdbcab9.30466178.jpg', '123315952'),
(42, '6157015bdc14b1.21899151.jpg', '../admin/Web/6157015bdc14b1.21899151.jpg', '123315952'),
(43, '6157015bdda418.63653461.jpg', '../admin/Web/6157015bdda418.63653461.jpg', '123315952'),
(44, '6157015bddd4c1.24285380.jpg', '../admin/Web/6157015bddd4c1.24285380.jpg', '123315952'),
(45, '6157029272e524.55775427.jpg', '../admin/Web/6157029272e524.55775427.jpg', '179037510'),
(46, '61570292787323.75349250.jpg', '../admin/Web/61570292787323.75349250.jpg', '179037510'),
(47, '6157029278a034.87692741.jpg', '../admin/Web/6157029278a034.87692741.jpg', '179037510'),
(48, '6157029278d799.77822506.jpg', '../admin/Web/6157029278d799.77822506.jpg', '179037510'),
(49, '61570396860147.26706245.jpg', '../admin/Web/61570396860147.26706245.jpg', '68267239'),
(50, '6157039688ced0.66009621.jpg', '../admin/Web/6157039688ced0.66009621.jpg', '68267239'),
(51, '615703968903e3.16175444.jpg', '../admin/Web/615703968903e3.16175444.jpg', '68267239'),
(52, '61570396893432.75905789.jpg', '../admin/Web/61570396893432.75905789.jpg', '68267239'),
(53, '615705067dbec5.04285973.jpg', '../admin/Web/615705067dbec5.04285973.jpg', '821538422'),
(54, '615705067de817.01933875.jpg', '../admin/Web/615705067de817.01933875.jpg', '821538422'),
(55, '615705067ee3b5.70058250.jpg', '../admin/Web/615705067ee3b5.70058250.jpg', '821538422'),
(56, '615705a077f5b9.10980999.jpg', '../admin/Web/615705a077f5b9.10980999.jpg', '1901316867'),
(57, '615705a0782981.54678924.jpg', '../admin/Web/615705a0782981.54678924.jpg', '1901316867'),
(58, '615705a0784f51.96749757.jpg', '../admin/Web/615705a0784f51.96749757.jpg', '1901316867'),
(59, '615705a0786bb0.14447004.jpg', '../admin/Web/615705a0786bb0.14447004.jpg', '1901316867'),
(60, '61570614754f37.04723539.jpg', '../admin/Web/61570614754f37.04723539.jpg', '2056913557'),
(61, '61570614759251.55997001.jpg', '../admin/Web/61570614759251.55997001.jpg', '2056913557'),
(62, '6157061475c537.33885238.jpg', '../admin/Web/6157061475c537.33885238.jpg', '2056913557'),
(63, '6157061475ed99.42104850.jpg', '../admin/Web/6157061475ed99.42104850.jpg', '2056913557'),
(64, '61570710b64ee3.92221639.jpg', '../admin/Web/61570710b64ee3.92221639.jpg', '207495171'),
(65, '61570710b692e0.98745787.jpg', '../admin/Web/61570710b692e0.98745787.jpg', '207495171'),
(66, '61570710b7db16.65791053.jpg', '../admin/Web/61570710b7db16.65791053.jpg', '207495171'),
(67, '615707a680fc05.74157710.jpg', '../admin/Web/615707a680fc05.74157710.jpg', '341911931'),
(68, '615707a68132c8.74892197.jpg', '../admin/Web/615707a68132c8.74892197.jpg', '341911931'),
(69, '615707a681ec51.96839676.jpg', '../admin/Web/615707a681ec51.96839676.jpg', '341911931'),
(70, '615707a6824358.55897528.jpg', '../admin/Web/615707a6824358.55897528.jpg', '341911931'),
(71, '6157084ad64f03.42282395.jpg', '../admin/Web/6157084ad64f03.42282395.jpg', '97612761'),
(72, '6157084ad68aa5.66194477.jpg', '../admin/Web/6157084ad68aa5.66194477.jpg', '97612761'),
(73, '6157084ad74981.70908365.jpg', '../admin/Web/6157084ad74981.70908365.jpg', '97612761'),
(74, '6157084ad777f9.10318540.jpg', '../admin/Web/6157084ad777f9.10318540.jpg', '97612761'),
(75, '61570cfe384fa1.18925613.jpg', '../admin/Web/61570cfe384fa1.18925613.jpg', '1179669010'),
(76, '61570cfe38b568.92708456.jpg', '../admin/Web/61570cfe38b568.92708456.jpg', '1179669010'),
(77, '61570cfe38eb17.50164892.jpg', '../admin/Web/61570cfe38eb17.50164892.jpg', '1179669010'),
(78, '61570cfe3919e8.09060142.jpg', '../admin/Web/61570cfe3919e8.09060142.jpg', '1179669010'),
(79, '61570d9e946383.84593867.jpg', '../admin/Web/61570d9e946383.84593867.jpg', '386079840'),
(80, '61570d9e949834.06365958.jpg', '../admin/Web/61570d9e949834.06365958.jpg', '386079840'),
(81, '61570d9e95ca06.38143380.jpg', '../admin/Web/61570d9e95ca06.38143380.jpg', '386079840'),
(82, '61570febf058e3.50632176.jpg', '../admin/Web/61570febf058e3.50632176.jpg', '23850176'),
(83, '61570febf09677.22632121.jpg', '../admin/Web/61570febf09677.22632121.jpg', '23850176'),
(84, '61570febf1fc30.14720034.jpg', '../admin/Web/61570febf1fc30.14720034.jpg', '23850176'),
(85, '615710ac2e61d7.93733319.jpg', '../admin/Web/615710ac2e61d7.93733319.jpg', '2010163581'),
(86, '615710ac2ea032.57229199.jpg', '../admin/Web/615710ac2ea032.57229199.jpg', '2010163581'),
(87, '615710ac30d874.95474811.jpg', '../admin/Web/615710ac30d874.95474811.jpg', '2010163581'),
(88, '615710ac310234.05053752.jpg', '../admin/Web/615710ac310234.05053752.jpg', '2010163581'),
(89, '61571115a549b6.25767439.jpg', '../admin/Web/61571115a549b6.25767439.jpg', '848126240'),
(90, '61571115a57cd0.16155725.jpg', '../admin/Web/61571115a57cd0.16155725.jpg', '848126240'),
(91, '61571115a64995.35752469.jpg', '../admin/Web/61571115a64995.35752469.jpg', '848126240'),
(92, '61571115a67386.86482862.jpg', '../admin/Web/61571115a67386.86482862.jpg', '848126240'),
(93, '615711af11c613.59115297.jpg', '../admin/Web/615711af11c613.59115297.jpg', '524512084'),
(94, '615711af120cd5.52919294.jpg', '../admin/Web/615711af120cd5.52919294.jpg', '524512084'),
(95, '615711af129dd0.24124250.jpg', '../admin/Web/615711af129dd0.24124250.jpg', '524512084'),
(96, '615711af12c170.61902704.jpg', '../admin/Web/615711af12c170.61902704.jpg', '524512084'),
(97, '6157126050e195.94307223.jpg', '../admin/Web/6157126050e195.94307223.jpg', '624300954'),
(98, '61571260515221.89856894.jpg', '../admin/Web/61571260515221.89856894.jpg', '624300954'),
(99, '61571260525681.19606134.jpg', '../admin/Web/61571260525681.19606134.jpg', '624300954'),
(100, '61571260527cb8.48307382.jpg', '../admin/Web/61571260527cb8.48307382.jpg', '624300954'),
(101, '615712e3b16b64.71292312.jpg', '../admin/Web/615712e3b16b64.71292312.jpg', '1001010615'),
(102, '615712e3b1ab69.12449832.jpg', '../admin/Web/615712e3b1ab69.12449832.jpg', '1001010615'),
(103, '615712e3b279f1.70761087.jpg', '../admin/Web/615712e3b279f1.70761087.jpg', '1001010615'),
(104, '615712e3b2b121.49969993.jpg', '../admin/Web/615712e3b2b121.49969993.jpg', '1001010615'),
(105, '615713a9044268.63637841.jpg', '../admin/Web/615713a9044268.63637841.jpg', '298410583'),
(106, '615713a90472c2.11874645.jpg', '../admin/Web/615713a90472c2.11874645.jpg', '298410583'),
(107, '615713a9056a16.59964769.jpg', '../admin/Web/615713a9056a16.59964769.jpg', '298410583'),
(108, '615713a9059796.37772118.jpg', '../admin/Web/615713a9059796.37772118.jpg', '298410583'),
(109, '615716632d6ed4.16750363.jpg', '../admin/Web/615716632d6ed4.16750363.jpg', '1177921078'),
(110, '615717caa9cc43.52869424.jpg', '../admin/Web/615717caa9cc43.52869424.jpg', '362995370');

-- --------------------------------------------------------

--
-- מבנה טבלה עבור טבלה `wishlist`
--

DROP TABLE IF EXISTS `wishlist`;
CREATE TABLE IF NOT EXISTS `wishlist` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ProductID` int NOT NULL,
  `UserID` int NOT NULL,
  `UserWishlistId` int NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `Wishlist2` (`UserID`),
  KEY `Wishlist1` (`ProductID`)
) ENGINE=InnoDB AUTO_INCREMENT=142 DEFAULT CHARSET=latin1;

--
-- הוצאת מידע עבור טבלה `wishlist`
--

INSERT INTO `wishlist` (`ID`, `ProductID`, `UserID`, `UserWishlistId`) VALUES
(95, 24, 1, 40),
(97, 22, 1, 40),
(124, 21, 1, 37),
(125, 22, 1, 37),
(132, 22, 1, 42),
(136, 26, 37, 1),
(137, 32, 44, 40),
(138, 28, 43, 38),
(140, 34, 39, 43),
(141, 32, 44, 43);

--
-- הגבלות לטבלאות שהוצאו
--

--
-- הגבלות לטבלה `notification`
--
ALTER TABLE `notification`
  ADD CONSTRAINT `Notification1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `Notification2` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`);

--
-- הגבלות לטבלה `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `Product` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`),
  ADD CONSTRAINT `Product2` FOREIGN KEY (`ProductCategory`) REFERENCES `category` (`CategoryID`);

--
-- הגבלות לטבלה `wishlist`
--
ALTER TABLE `wishlist`
  ADD CONSTRAINT `Wishlist1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ProductID`) ON DELETE CASCADE,
  ADD CONSTRAINT `Wishlist2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
