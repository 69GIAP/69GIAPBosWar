-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2013 at 07:57 PM
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
-- Table structure for table `key_points`
--

DROP TABLE IF EXISTS `key_points`;
CREATE TABLE IF NOT EXISTS `key_points` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `xPos` mediumint(1) NOT NULL DEFAULT '0',
  `zPos` mediumint(1) NOT NULL DEFAULT '0',
  `CoalID` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `pointName` varchar(40) NOT NULL DEFAULT 'point name',
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplypointName` (`pointName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
