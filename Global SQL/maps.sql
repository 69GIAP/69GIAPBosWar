-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2013 at 06:21 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rofwar`
--

-- --------------------------------------------------------

--
-- Table structure for table `maps`
--

CREATE TABLE IF NOT EXISTS `maps` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `map` varchar(30) NOT NULL,
  `simulation` varchar(6) NOT NULL,
  `map_locations` varchar(40) CHARACTER SET ascii NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `maps`
--

INSERT INTO `maps` (`id`, `map`, `simulation`, `map_locations`) VALUES
(1, 'Channel', 'RoF', 'rof_channel_locations'),
(2, 'Lake', 'RoF', 'rof_lake_locations'),
(3, 'Stalingrad', 'BoS', 'bos_stalingrad_locations'),
(4, 'Verdun', 'RoF', 'rof_verdun_locations'),
(5, 'Western Front', 'RoF', 'rof_westernfront_locations');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
