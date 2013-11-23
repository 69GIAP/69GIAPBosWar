-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2013 at 08:00 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3
#Stenka change of supply point from enum to varchar

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `boswar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `columns`
--

DROP TABLE IF EXISTS `columns`;
CREATE TABLE IF NOT EXISTS `columns` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `columnID` int(1) NOT NULL,
  `Name` char(31) DEFAULT 'REGIMENT 1 Platoon 1',
  `Moving` enum('0','1') DEFAULT '0',
  `Model` char(20) DEFAULT 'leyland',
  `moving_becomes` varchar(39) NOT NULL,
  `Description` varchar(80) DEFAULT NULL,
  `ckey` enum('0','101','102','103','104','105','501','502','600','610','620','630','640') DEFAULT '105',
  `CoalID` enum('1','2') DEFAULT '1',
  `Supplypoint` varchar(1) DEFAULT '1',
  `Quantity` int(11) DEFAULT '1',
  `XPos` decimal(12,3) DEFAULT '0.000',
  `ZPos` decimal(12,3) DEFAULT '0.000',
  `YOri` decimal(5,2) DEFAULT '0.00',
  `dest_XPos` decimal(12,3) DEFAULT '0.000',
  `dest_ZPos` decimal(12,3) DEFAULT '0.000',
  `col_speed` int(11) DEFAULT '10',
  `col_formation` int(11) DEFAULT '4',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
