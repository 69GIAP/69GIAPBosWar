-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2013 at 06:00 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3
-- Stenka 21/12/13 inclusion of damage_0 and removal of null

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skies_of_the_empires`
--

-- --------------------------------------------------------

--
-- Table structure for table `bridges`
--

DROP TABLE IF EXISTS `bridges`;
CREATE TABLE IF NOT EXISTS `bridges` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `Name` char(31) PRIMARY KEY,
  `Model` char(20) DEFAULT NULL,
  `Description` varchar(80) DEFAULT NULL,
  `Country` enum('0','101','102','103','104','105','501','502','600','610','620','630','640') DEFAULT NULL,
  `CoalID` enum('0','1','2') DEFAULT NULL,
  `XPos` decimal(12,3) DEFAULT NULL,
  `ZPos` decimal(12,3) DEFAULT NULL,
  `YOri` decimal(5,2) DEFAULT NULL,
  `updated` tinyint(1) DEFAULT NULL,
  `damage_0` tinyint(1) DEFAULT 0,  
  `damage_1` tinyint(1) DEFAULT 0,
  `damage_2` tinyint(1) DEFAULT 0,
  `damage_3` tinyint(1) DEFAULT 0,
  `damage_4` tinyint(1) DEFAULT 0,
  `damage_5` tinyint(1) DEFAULT 0,
  `damage_6` tinyint(1) DEFAULT 0,
  `damage_7` tinyint(1) DEFAULT 0,
  `damage_8` tinyint(1) DEFAULT 0,
  `damage_9` tinyint(1) DEFAULT 0,
  `damage_10` tinyint(1) DEFAULT 0,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
