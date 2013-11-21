-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2013 at 06:00 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

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
  `Name` char(31) DEFAULT NULL,
  `Model` char(20) DEFAULT NULL,
  `Description` varchar(80) DEFAULT NULL,
  `Country` enum('0','101','102','103','104','105','501','502','600','610','620','630','640') DEFAULT NULL,
  `CoalID` enum('0','1','2') DEFAULT NULL,
  `XPos` decimal(12,3) DEFAULT NULL,
  `ZPos` decimal(12,3) DEFAULT NULL,
  `YOri` decimal(5,2) DEFAULT NULL,
  `updated` tinyint(1) DEFAULT NULL,
  `damage_1` tinyint(1) DEFAULT NULL,
  `damage_2` tinyint(1) DEFAULT NULL,
  `damage_3` tinyint(1) DEFAULT NULL,
  `damage_4` tinyint(1) DEFAULT NULL,
  `damage_5` tinyint(1) DEFAULT NULL,
  `damage_6` tinyint(1) DEFAULT NULL,
  `damage_7` tinyint(1) DEFAULT NULL,
  `damage_8` tinyint(1) DEFAULT NULL,
  `damage_9` tinyint(1) DEFAULT NULL,
  `damage_10` tinyint(1) DEFAULT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
