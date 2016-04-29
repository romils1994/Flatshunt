-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2016 at 07:49 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rent`
--

-- --------------------------------------------------------

--
-- Table structure for table `rent_table`
--

CREATE TABLE IF NOT EXISTS `rent_table` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `Name` varchar(50) NOT NULL,
  `Email_Id` varchar(50) NOT NULL,
  `Contact_No` bigint(10) NOT NULL,
  `City` varchar(75) NOT NULL,
  `Locality` varchar(150) NOT NULL,
  `Address` varchar(300) NOT NULL,
  `Latitude` double(20,10) NOT NULL,
  `Longitude` double(20,10) NOT NULL,
  `Bedrooms` varchar(6) NOT NULL,
  `Bathrooms` varchar(4) NOT NULL,
  `Balconies` varchar(4) NOT NULL,
  `Area` varchar(1000) NOT NULL,
  `Room` varchar(1000) NOT NULL,
  `Total_Area` int(6) NOT NULL,
  `Rent` bigint(10) NOT NULL,
  `Floor` varchar(4) NOT NULL,
  `Total_Floor` varchar(4) NOT NULL,
  `Amenities` varchar(1000) NOT NULL,
  `Furnishing` varchar(20) NOT NULL,
  `Construction_Age` varchar(50) NOT NULL,
  `Preferred_tenant` varchar(30) NOT NULL,
  `Description` varchar(5000) NOT NULL,
  `Image_Path` varchar(10000) NOT NULL,
  `Time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `id` (`ID`),
  KEY `ID_2` (`ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rent_table`
--

INSERT INTO `rent_table` (`ID`, `Name`, `Email_Id`, `Contact_No`, `City`, `Locality`, `Address`, `Latitude`, `Longitude`, `Bedrooms`, `Bathrooms`, `Balconies`, `Area`, `Room`, `Total_Area`, `Rent`, `Floor`, `Total_Floor`, `Amenities`, `Furnishing`, `Construction_Age`, `Preferred_tenant`, `Description`, `Image_Path`, `Time`) VALUES
(5, 'Romil Shah', 'romils1994@gmail.com', 9322244599, 'Mumbai, Maharashtra, India', 'Kandivali West, Mumbai, Maharashtra, India', 'Jansukh Apartments, Trikamdas Rd, Ghanshyam Nagar, Jethava Nagar, Kandivali West, Mumbai, Maharashtra 400067, India', 19.1994259488, 72.8498252355, '1 BHK', '1', '0', 'a:3:{i:0;s:3:"180";i:1;s:3:"150";i:2;s:3:"200";}', 'a:3:{i:0;s:11:"Living Room";i:1;s:7:"Kitchen";i:2;s:8:"Bedroom1";}', 530, 25000, '6', '7', 'a:10:{i:0;s:11:"Car Parking";i:1;s:18:"Children Play Area";i:2;s:11:"Fire Safety";i:3;s:8:"Intercom";i:4;s:4:"Lift";i:5;s:4:"Park";i:6;s:12:"Power Backup";i:7;s:8:"Security";i:8;s:12:"Water Supply";i:9;s:16:"Visitors Parking";}', 'Semi Furnished', 'Above 20 years', 'Bachelors', 'This house is near to all public modes of transport.. In the society all are friendly.. You will enjoy', 'a:3:{i:0;s:55:"uploads/99fbb7a1ed85ce783e60194b8658323c_1461432104.JPG";i:1;s:55:"uploads/5d0593815f93a7876afedbd42921a565_1461432104.jpg";i:2;s:55:"uploads/24a39a5b758a9b835f9e747a3e9f7287_1461432104.jpg";}', '2016-04-23 17:21:44'),
(6, 'Romil Shah', 'romils1994@gmail.com', 9322244599, 'Mumbai, Maharashtra, India', 'Kandivali West, Mumbai, Maharashtra, India', 'Jansukh Apartments, Trikamdas Rd, Ghanshyam Nagar, Jethava Nagar, Kandivali West, Mumbai, Maharashtra 400067, India', 19.1994259488, 72.8498896085, '1 BHK', '1', '0', 'a:3:{i:0;s:3:"180";i:1;s:2:"50";i:2;s:3:"120";}', 'a:3:{i:0;s:11:"Living Room";i:1;s:7:"Kitchen";i:2;s:8:"Bedroom1";}', 350, 20000, '6', '7', 'a:8:{i:0;s:11:"Car Parking";i:1;s:18:"Children Play Area";i:2;s:11:"Fire Safety";i:3;s:8:"Intercom";i:4;s:4:"Lift";i:5;s:12:"Power Backup";i:6;s:8:"Security";i:7;s:16:"Visitors Parking";}', 'Semi Furnished', 'Above 20 years', 'Bachelors', 'This house near to the all public modes of transport. Here all festivals are celebrated..', 'a:3:{i:0;s:55:"uploads/fcd0fbbfa60c9df18147a6ed93cb1158_1461433521.jpg";i:1;s:55:"uploads/93198f6d53af539fb1259f5bc68b82c9_1461433521.jpg";i:2;s:55:"uploads/fe7eefa6022600af636d4e7f48a77c32_1461433521.jpg";}', '2016-04-23 17:45:21');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
