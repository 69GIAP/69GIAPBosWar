-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2013 at 04:35 AM
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
-- Table structure for table `rof_countries`
--

DROP TABLE IF EXISTS `rof_countries`;
CREATE TABLE IF NOT EXISTS `rof_countries` (
  `id` enum('1','2','3','4','5','6','7','8','9','10','11','12','13') NOT NULL,
  `ckey` enum('0','101','102','103','104','105','501','502','600','610','620','630','640') NOT NULL,
  `countryname` varchar(30) NOT NULL,
  `countryadj` varchar(30) NOT NULL,
  `CoalID` enum('0','1','2','3','4','5','6','7') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `countryname` (`countryname`),
  UNIQUE KEY `countryadj` (`countryadj`),
  UNIQUE KEY `ckey` (`ckey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rof_countries`
--

INSERT INTO `rof_countries` (`id`, `ckey`, `countryname`, `countryadj`, `CoalID`) VALUES
('1', '0', 'Neutral', 'neutral', '0'),
('2', '101', 'France', 'French', '1'),
('3', '102', 'Great Britain', 'British', '1'),
('4', '103', 'USA', 'American', '1'),
('5', '104', 'Italy', 'Italian', '1'),
('6', '105', 'Russia', 'Russian', '1'),
('7', '501', 'Germany', 'German', '2'),
('8', '502', 'Austro-Hungary', 'Austro-Hungarian', '2'),
('9', '600', 'Future Country', 'Future', '3'),
('10', '610', 'War Dogs Country', 'War Dogs', '4'),
('11', '620', 'Mercenaries Country', 'Mercenaries', '5'),
('12', '630', 'Knights Country', 'Knights', '6'),
('13', '640', 'Corsairs Country', 'Corsairs', '7');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
