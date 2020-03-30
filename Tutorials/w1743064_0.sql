-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Mar 30, 2020 at 08:07 PM
-- Server version: 5.7.24
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `w1743064_0`
--

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `orderNo` int(4) NOT NULL AUTO_INCREMENT,
  `userId` int(4) NOT NULL,
  `orderDateTime` datetime NOT NULL,
  `orderTotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `orderStatus` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`orderNo`),
  KEY `userId` (`userId`),
  KEY `userId_2` (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`orderNo`, `userId`, `orderDateTime`, `orderTotal`, `orderStatus`) VALUES
(3, 3, '2020-03-21 07:06:56', '2399.00', 'Placed'),
(12, 3, '2020-03-21 07:17:03', '729.00', 'Placed'),
(16, 3, '2020-03-21 07:27:41', '219.00', 'Placed'),
(17, 3, '2020-03-21 07:44:42', '2916.00', 'Placed'),
(18, 3, '2020-03-21 07:45:58', '7635.00', 'Placed'),
(19, 3, '2020-03-21 17:15:46', '15286.00', 'Placed'),
(20, 3, '2020-03-21 17:40:11', '0.00', 'Placed'),
(21, 3, '2020-03-30 17:57:19', '14994.00', 'Placed');

-- --------------------------------------------------------

--
-- Table structure for table `order_line`
--

DROP TABLE IF EXISTS `order_line`;
CREATE TABLE IF NOT EXISTS `order_line` (
  `orderLineId` int(4) NOT NULL AUTO_INCREMENT,
  `orderNo` int(4) NOT NULL,
  `prodId` int(4) NOT NULL,
  `quantityOrdered` int(4) NOT NULL,
  `subTotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`orderLineId`),
  KEY `orderNo` (`orderNo`),
  KEY `prodId` (`prodId`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_line`
--

INSERT INTO `order_line` (`orderLineId`, `orderNo`, `prodId`, `quantityOrdered`, `subTotal`) VALUES
(1, 17, 4, 4, '2916.00'),
(2, 18, 1, 3, '7197.00'),
(3, 18, 3, 2, '438.00'),
(4, 19, 1, 4, '9596.00'),
(5, 19, 3, 3, '657.00'),
(6, 19, 2, 7, '5033.00'),
(7, 21, 1, 6, '14994.00');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `prodId` int(4) NOT NULL AUTO_INCREMENT,
  `prodName` varchar(30) NOT NULL,
  `prodPicNameSmall` varchar(100) NOT NULL,
  `prodPicNameLarge` varchar(100) NOT NULL,
  `prodDescripShort` varchar(1000) DEFAULT NULL,
  `prodDescripLong` varchar(3000) DEFAULT NULL,
  `prodPrice` decimal(6,2) NOT NULL,
  `prodQuantity` int(4) NOT NULL,
  PRIMARY KEY (`prodId`),
  UNIQUE KEY `prodName` (`prodName`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodId`, `prodName`, `prodPicNameSmall`, `prodPicNameLarge`, `prodDescripShort`, `prodDescripLong`, `prodPrice`, `prodQuantity`) VALUES
(1, 'MacBook Pro 16\"', 'macbookpro16-small.png', 'macbookpro16-large.jpeg', '2019 Apple MacBook Pro 16\" Touch Bar, Intel Core i7 Processor, 16GB RAM, 512 SSD, Radeon Pro 5300M, Space Grey', 'The (2019) MacBook Pro 16\" with Apple\'s cutting edge Touch Bar technology and Retina display has been created with a 9th generation Intel Core i7 processor, 16GB RAM and a Radeon Pro 5300M GPU. It\'s been designed and built to aid the ideas you have and for the work you do every day.\r\n\r\nThe power of Intel Core i7\r\nWith an Intel Core i7 processor, your device will easily handle day-to-day tasks such as work assignments, coursework or browsing the net. Power hungry programs like image manipulation and video editing software will see processing times reduced, enabling better productivity.\r\n\r\nDepending on the complexity of the task being worked on, the processor in this model can fluctuate speed from 2.6GHz to 4.5GHz.', '2499.00', 60),
(2, 'iPad Pro 11\"', 'ipadpro11-small.jpg', 'ipadpro11-large.jpg', '2018 Apple iPad Pro 11\", A12X Bionic, iOS, Wi-Fi, 64GB, Space Grey', 'All screen and all-powerful, the iPad Pro 11\" has been completely redesigned and is packed with advanced Apple technology. Featuring Face ID log-in, its edge-to-edge Liquid Retina display offers a stunning visual and touch-response experience, whichever way you hold it. Powered by the A12X Bionic chip, it\'s faster than many PC laptops, so multitasking, playing games or watching Ultra HD videos handle like a dream.\r\n\r\nThe 2018 iPad Pro includes Face ID log-in, so there\'s no need for the Home Button, meaning the bezel edges have been slimmed down so that screen size is maximized. It also includes a USB-C port rather than a lightning connector, and is powered by the ultra-fast A12X Bionic processor.', '1234.00', 53),
(3, 'Powerbeats Pro', 'powerbeatspro-small.jpg', 'powerbeatspro-large.jpg', 'Powerbeats Pro True Wireless Bluetooth In-Ear Sport Headphones with Mic/Remote, Black', 'The totally wireless Powerbeats Pro earphones are built to revolutionise your workouts. With no wires to hold you back, these adjustable, secure-fit ear hooks are customisable for extended comfort and stability. A reinforced design for sweat and water resistance lets you max out your exercise. Each earbud has full volume and track controls and up to 9 hours of listening time to fuel your training with the powerful, balanced sound of Beats.', '219.00', 50),
(4, 'iPhone 11', 'iphone11white-small.jpg', 'iphone11white-large.jpg', 'Apple iPhone 11, iOS, 6.1\", 4G LTE, SIM Free, 64GB, Green', 'Just the right amount of everything. Shoot 4K videos, beautiful portraits and sweeping landscapes with the all-new dual-camera system. Capture your best low-light photos with Night mode. See true-to-life colour in your photos, videos and games on the 6.1-inch Liquid Retina display. Experience unprecedented performance with A13. Bionic for gaming, augmented reality (AR) and photography. Do more and charge less with all-day battery life.\r\n\r\nWater and dust resistant (2 metres for up to 30 minutes, IP68).\r\n\r\nDual-camera system with 12MP Ultra Wide and Wide cameras, Night mode, Portrait mode, and 4K video up to 60 fps. 12MP TrueDepth front camera with Portrait mode, 4K video and slo-mo.\r\n\r\nFace ID for secure authentication and Apple Pay.\r\n\r\niOS 13 with Dark Mode, new tools for editing photos and video, and brand-new privacy features.', '729.00', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(4) NOT NULL AUTO_INCREMENT,
  `userType` varchar(50) DEFAULT NULL,
  `userFName` varchar(50) NOT NULL,
  `userSName` varchar(50) NOT NULL,
  `userAddress` varchar(50) NOT NULL,
  `userPostCode` varchar(50) NOT NULL,
  `userTelNo` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  PRIMARY KEY (`userId`),
  UNIQUE KEY `userEmail` (`userEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userType`, `userFName`, `userSName`, `userAddress`, `userPostCode`, `userTelNo`, `userEmail`, `userPassword`) VALUES
(2, 'Hometeq Customer', 'Donald', 'Duck', '32, Elf Street', '01300', '123456789', 'donaldduck@disney.com', '1234'),
(3, 'Hometeq Customer', 'Varatharajah', 'Vaseekaran', '4101  University Street', '98101', '2063479650', 'ssefd@gmail.com', '1234'),
(6, 'Hometeq Customer', 'Vaseekaran', 'Varatharajah', '4101  University Street', '98101', '2063479650', 'vvasee1996@gmail.com', '1234'),
(9, 'Hometeq Customer', 'Donald', 'Varatharajah', '4101  University Street', '98101', '2063479650', 'fgerwg@eh.com', '1234'),
(14, 'Hometeq Customer', 'Vaseekaran', 'Varatharajah', '4101  University Street', '98101', '2063479650', 'vaseekaran.2018617@iit.ac.lk', '1234'),
(15, 'Admin', 'Paul', 'Sneed', '115, New Cavendish Street, London', 'W1E 6UW', '02079115000', 'ps@hometeq.com', '123');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `users` (`userId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `order_line`
--
ALTER TABLE `order_line`
  ADD CONSTRAINT `order_line_ibfk_1` FOREIGN KEY (`orderNo`) REFERENCES `orders` (`orderNo`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_line_ibfk_2` FOREIGN KEY (`prodId`) REFERENCES `product` (`prodId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
