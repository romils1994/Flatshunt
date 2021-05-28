-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2016 at 07:56 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sale`
--

-- --------------------------------------------------------

--
-- Table structure for table `sale_table`
--

CREATE TABLE IF NOT EXISTS `sale_table` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email_Id` varchar(50) NOT NULL,
  `Contact_No` bigint(10) unsigned NOT NULL,
  `City` varchar(75) NOT NULL,
  `Locality` varchar(150) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `Bedrooms` varchar(6) NOT NULL,
  `Bathrooms` varchar(4) NOT NULL,
  `Balconies` varchar(4) NOT NULL,
  `Room` varchar(1000) NOT NULL,
  `Area` varchar(1000) NOT NULL,
  `Total_Area` int(6) NOT NULL,
  `Price` bigint(10) NOT NULL,
  `Floor` varchar(4) NOT NULL,
  `Total_Floor` varchar(4) NOT NULL,
  `Amenities` varchar(1000) NOT NULL,
  `Furnishing` varchar(20) NOT NULL,
  `Transaction` varchar(15) NOT NULL,
  `Possession` varchar(30) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Image_Path` varchar(10000) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `id` (`ID`),
  KEY `ID_2` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=46 ;

--
-- Dumping data for table `sale_table`
--

INSERT INTO `sale_table` (`ID`, `Name`, `Email_Id`, `Contact_No`, `City`, `Locality`, `Address`, `Latitude`, `Longitude`, `Bedrooms`, `Bathrooms`, `Balconies`, `Room`, `Area`, `Total_Area`, `Price`, `Floor`, `Total_Floor`, `Amenities`, `Furnishing`, `Transaction`, `Possession`, `Description`, `Image_Path`, `Time`) VALUES
(44, 'Tripti Rijhwani', 'tripti.r2@gmail.com', 9322244599, 'Mumbai, Maharashtra, India', 'Chembur, Mumbai, Maharashtra, India', 'A-3, Mahul Gaon Rd, MMRDA Colony, Chembur, Mumbai, Maharashtra 400074, India', 19.0318, 72.9005, '1 BHK', '1', '0', 'a:3:{i:0;s:11:"Living Room";i:1;s:7:"Kitchen";i:2;s:8:"Bedroom1";}', 'a:3:{i:0;s:3:"100";i:1;s:2:"75";i:2;s:3:"125";}', 300, 5000000, '6', '7', 'a:8:{i:0;s:11:"Car Parking";i:1;s:4:"Club";i:2;s:11:"Fire Safety";i:3;s:17:"Internet Provider";i:4;s:8:"Security";i:5;s:8:"Swimming";i:6;s:6:"Temple";i:7;s:12:"Water Supply";}', 'Semi Furnished', 'Resale', 'Ready to Move', 'This house near to the all public modes of transport. Here all festivals are celebrated..', 'a:3:{i:0;s:55:"uploads/d261b732dc28cafbffad2298bf2d5cad_1461434066.jpg";i:1;s:55:"uploads/c0903602d928f82e4d0e3ffca68e25bb_1461434066.jpg";i:2;s:55:"uploads/96965e643ee50c3e1fa4268077dbd56e_1461434066.jpg";}', '2016-04-23 17:54:26'),
(45, 'Tripti Rijhwani', 'tripti.r2@gmail.com', 9322244599, 'Mumbai, Maharashtra, India', 'Chembur, Mumbai, Maharashtra, India', 'A-3, Mahul Gaon Rd, MMRDA Colony, Chembur, Mumbai, Maharashtra 400074, India', 19.0318, 72.9005, '1 BHK', '1', '0', 'a:3:{i:0;s:11:"Living Room";i:1;s:7:"Kitchen";i:2;s:8:"Bedroom1";}', 'a:3:{i:0;s:3:"200";i:1;s:3:"150";i:2;s:3:"200";}', 550, 5000000, '6', '7', 'a:8:{i:0;s:11:"Car Parking";i:1;s:4:"Club";i:2;s:11:"Fire Safety";i:3;s:17:"Internet Provider";i:4;s:8:"Security";i:5;s:8:"Swimming";i:6;s:6:"Temple";i:7;s:12:"Water Supply";}', 'Semi Furnished', 'Resale', 'Ready to Move', 'This house near to the all public modes of transport. Here all festivals are celebrated..', 'a:3:{i:0;s:55:"uploads/d03099e9c00fa1f1894b2177115be2eb_1461434160.JPG";i:1;s:55:"uploads/4811c3963b9a702304f41d5e4b19c6b2_1461434160.jpg";i:2;s:55:"uploads/28e1c1418af2c4f58a7d1a0362757a35_1461434160.jpg";}', '2016-04-23 17:56:00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
