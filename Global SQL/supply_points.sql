-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2013 at 05:12 AM
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
-- Table structure for table `supply_points`
--

DROP TABLE IF EXISTS `supply_points`;
CREATE TABLE IF NOT EXISTS `supply_points` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `xPos` smallint(1) NOT NULL DEFAULT '0',
  `zPos` smallint(6) NOT NULL DEFAULT '0',
  `CoalID` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `supplypointName` varchar(40) NOT NULL DEFAULT 'supplypoint name',
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplypointName` (`supplypointName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
