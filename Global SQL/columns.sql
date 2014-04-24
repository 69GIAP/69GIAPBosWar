-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2013 at 06:39 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3
# Stenka 14/3/2014 replaced null values for map coordinates with safer 0 value

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
  `Name` char(31) DEFAULT NULL,
  `Moving` enum('0','1') NOT NULL DEFAULT '0',
  `Model` char(20) DEFAULT NULL,
  `moving_becomes` varchar(39) DEFAULT NULL,
  `Description` varchar(80) DEFAULT NULL,
  `ckey` enum('0','101','102','103','104','105','501','502','600','610','620','630','640') DEFAULT NULL,
  `CoalID` enum('1','2') DEFAULT NULL,
  `Supplypoint` tinyint(1) DEFAULT 1,
  `Quantity` int(11) NOT NULL DEFAULT '1',
  `XPos` decimal(12,3) DEFAULT 0,
  `ZPos` decimal(12,3) DEFAULT 0,
  `YOri` decimal(5,2) DEFAULT 0,
  `dest_XPos` decimal(12,3) DEFAULT 0,
  `dest_ZPos` decimal(12,3) DEFAULT 0,
  `col_speed` int(11) DEFAULT 0,
  `col_formation` int(11) NOT NULL DEFAULT '4',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
