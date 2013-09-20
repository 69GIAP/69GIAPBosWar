-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 20, 2013 at 05:07 PM
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
-- Table structure for table `rof_coalitions`
--

DROP TABLE IF EXISTS `rof_coalitions`;
CREATE TABLE IF NOT EXISTS `rof_coalitions` (
  `CoalID` int(11) NOT NULL,
  `Coalitionname` varchar(40) NOT NULL,
  PRIMARY KEY (`CoalID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rof_coalitions`
--

INSERT INTO `rof_coalitions` (`CoalID`, `Coalitionname`) VALUES
(0, 'Neutral'),
(1, 'Entente'),
(2, 'Central Powers'),
(3, 'War Dogs'),
(4, 'Mercenaries'),
(5, 'Knights'),
(6, 'Corsairs'),
(7, 'Future');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
