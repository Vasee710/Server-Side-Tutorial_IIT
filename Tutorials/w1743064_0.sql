-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 27, 2020 at 09:04 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

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
  PRIMARY KEY (`prodId`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`prodId`, `prodName`, `prodPicNameSmall`, `prodPicNameLarge`, `prodDescripShort`, `prodDescripLong`, `prodPrice`, `prodQuantity`) VALUES
(1, 'MacBook Pro 16\"', 'macbookpro16-small.png', 'macbookpro16-large.jpeg', '2019 Apple MacBook Pro 16\" Touch Bar, Intel Core i7 Processor, 16GB RAM, 512 SSD, Radeon Pro 5300M, Space Grey', 'The (2019) MacBook Pro 16\" with Apple\'s cutting edge Touch Bar technology and Retina display has been created with a 9th generation Intel Core i7 processor, 16GB RAM and a Radeon Pro 5300M GPU. It\'s been designed and built to aid the ideas you have and for the work you do every day.\r\n\r\nThe power of Intel Core i7\r\nWith an Intel Core i7 processor, your device will easily handle day-to-day tasks such as work assignments, coursework or browsing the net. Power hungry programs like image manipulation and video editing software will see processing times reduced, enabling better productivity.\r\n\r\nDepending on the complexity of the task being worked on, the processor in this model can fluctuate speed from 2.6GHz to 4.5GHz.', '2399.00', 50),
(2, 'iPad Pro 11\"', 'ipadpro11-small.jpg', 'ipadpro11-large.jpg', '2018 Apple iPad Pro 11\", A12X Bionic, iOS, Wi-Fi, 64GB, Space Grey', 'All screen and all-powerful, the iPad Pro 11\" has been completely redesigned and is packed with advanced Apple technology. Featuring Face ID log-in, its edge-to-edge Liquid Retina display offers a stunning visual and touch-response experience, whichever way you hold it. Powered by the A12X Bionic chip, it\'s faster than many PC laptops, so multitasking, playing games or watching Ultra HD videos handle like a dream.\r\n\r\nThe 2018 iPad Pro includes Face ID log-in, so there\'s no need for the Home Button, meaning the bezel edges have been slimmed down so that screen size is maximized. It also includes a USB-C port rather than a lightning connector, and is powered by the ultra-fast A12X Bionic processor.', '719.00', 50),
(3, 'Powerbeats Pro', 'powerbeatspro-small.jpg', 'powerbeatspro-large.jpg', 'Powerbeats Pro True Wireless Bluetooth In-Ear Sport Headphones with Mic/Remote, Black', 'The totally wireless Powerbeats Pro earphones are built to revolutionise your workouts. With no wires to hold you back, these adjustable, secure-fit ear hooks are customisable for extended comfort and stability. A reinforced design for sweat and water resistance lets you max out your exercise. Each earbud has full volume and track controls and up to 9 hours of listening time to fuel your training with the powerful, balanced sound of Beats.', '219.00', 50),
(4, 'iPhone 11', 'iphone11white-small.jpg', 'iphone11white-large.jpg', 'Apple iPhone 11, iOS, 6.1\", 4G LTE, SIM Free, 64GB, Green', 'Just the right amount of everything. Shoot 4K videos, beautiful portraits and sweeping landscapes with the all-new dual-camera system. Capture your best low-light photos with Night mode. See true-to-life colour in your photos, videos and games on the 6.1-inch Liquid Retina display. Experience unprecedented performance with A13. Bionic for gaming, augmented reality (AR) and photography. Do more and charge less with all-day battery life.\r\n\r\nWater and dust resistant (2 metres for up to 30 minutes, IP68).\r\n\r\nDual-camera system with 12MP Ultra Wide and Wide cameras, Night mode, Portrait mode, and 4K video up to 60 fps. 12MP TrueDepth front camera with Portrait mode, 4K video and slo-mo.\r\n\r\nFace ID for secure authentication and Apple Pay.\r\n\r\niOS 13 with Dark Mode, new tools for editing photos and video, and brand-new privacy features.', '729.00', 50);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `userId` int(4) NOT NULL AUTO_INCREMENT,
  `userType` varchar(1) DEFAULT NULL,
  `userFName` varchar(50) NOT NULL,
  `userSName` varchar(50) NOT NULL,
  `userAddress` varchar(50) NOT NULL,
  `userPostCode` varchar(50) NOT NULL,
  `userTelNo` varchar(50) NOT NULL,
  `userEmail` varchar(50) NOT NULL,
  `userPassword` varchar(50) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `userType`, `userFName`, `userSName`, `userAddress`, `userPostCode`, `userTelNo`, `userEmail`, `userPassword`) VALUES
(1, NULL, 'Varatharajah', 'Vaseekaran', '4101  University Street', '98101', '2063479650', 'vaseekaran.2018617@iit.ac.lk', '123'),
(2, NULL, 'Donald', 'Duck', '32, Elf Street', '01300', '123456789', 'donaldduck@disney.com', '1234');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
