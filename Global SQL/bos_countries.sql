-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2014 at 04:08 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

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
-- Table structure for table `bos_countries`
--

DROP TABLE IF EXISTS `bos_countries`;
CREATE TABLE IF NOT EXISTS `bos_countries` (
  `id` enum('1','2','3') NOT NULL,
  `ckey` enum('0','101','201') NOT NULL,
  `countryname` varchar(30) NOT NULL,
  `countryadj` varchar(30) NOT NULL,
  `CoalID` enum('0','1','2') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `countryname` (`countryname`),
  UNIQUE KEY `countryadj` (`countryadj`),
  UNIQUE KEY `ckey` (`ckey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bos_countries`
--

INSERT INTO `bos_countries` (`id`, `ckey`, `countryname`, `countryadj`, `CoalID`) VALUES
('1', '0', 'Neutral', 'neutral', '0'),
('2', '101', 'Russia', 'Russian', '1'),
('3', '', 'Germany', 'German', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
