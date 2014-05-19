-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2014 at 11:19 PM
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
-- Table structure for table `maps`
--

DROP TABLE IF EXISTS `maps`;
CREATE TABLE IF NOT EXISTS `maps` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `map` varchar(30) NOT NULL,
  `simulation` varchar(6) NOT NULL,
  `map_locations` varchar(40) CHARACTER SET ascii NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `map` (`map`),
  UNIQUE KEY `map_locations` (`map_locations`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id`, `map`, `simulation`, `map_locations`) VALUES
(1, 'Channel', 'RoF', 'rof_channel_locations'),
(2, 'Lake', 'RoF', 'rof_lake_locations'),
(3, 'Stalingrad', 'BoS', 'bos_stalingrad_locations'),
(4, 'Verdun', 'RoF', 'rof_verdun_locations'),
(5, 'Western Front', 'RoF', 'rof_westernfront_locations'),
(6, 'Lapino', 'BoS', 'bos_lapino_locations');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
