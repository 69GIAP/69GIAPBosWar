-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2013 at 03:00 AM
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
-- Table structure for table `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign` varchar(50) NOT NULL,
  `db_name` varchar(30) NOT NULL,
  `map` varchar(30) NOT NULL,
  `simulation` varchar(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`id`, `campaign`, `db_name`, `map`, `simulation`) VALUES
(1, 'Bloody April', 'bloody_april', 'Western Front', 'RoF'),
(2, 'Flanders Eagles', 'flanders_eagles', 'Channel', 'RoF'),
(3, 'Lake', 'lake', 'Lake', 'RoF'),
(4, 'Skies of the Empires', 'skies_of_the_empires', 'Verdun', 'RoF'),
(5, 'Skies of the Empires II', 'skies_of_the_empires_ii', 'Verdun', 'RoF'),
(6, 'Stalingrad', 'stalingrad', 'Stalingrad', 'BoS'),
(7, 'Yankee Doodle', 'yankee_doodle', 'Western Front', 'RoF');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
