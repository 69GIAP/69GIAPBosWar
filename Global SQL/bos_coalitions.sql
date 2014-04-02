-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 02, 2014 at 04:11 PM
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
-- Table structure for table `bos_coalitions`
--

DROP TABLE IF EXISTS `bos_coalitions`;
CREATE TABLE IF NOT EXISTS `bos_coalitions` (
  `CoalID` enum('0','1','2') NOT NULL,
  `Coalitionname` varchar(40) NOT NULL,
  PRIMARY KEY (`CoalID`),
  UNIQUE KEY `Coalitionname` (`Coalitionname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bos_coalitions`
--

INSERT INTO `bos_coalitions` (`CoalID`, `Coalitionname`) VALUES
('2', 'Germany'),
('0', 'Neutral'),
('1', 'Russia');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
