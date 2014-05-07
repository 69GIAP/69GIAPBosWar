-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2014 at 04:09 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bos`
--

-- --------------------------------------------------------

--
-- Table structure for table `bos_stalingrad_locations`
--

DROP TABLE IF EXISTS `bos_stalingrad_locations`;
CREATE TABLE IF NOT EXISTS `bos_stalingrad_locations` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `LID` smallint(1) unsigned NOT NULL,
  `LX` decimal(15,0) NOT NULL,
  `LZ` decimal(15,0) NOT NULL,
  `LName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `LName` (`LName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `bos_stalingrad_locations`
--

INSERT INTO `bos_stalingrad_locations` (`id`, `LID`, `LX`, `LZ`, `LName`) VALUES
(1, 10, '123350', '177370', 'Kumovka'),
(2, 10, '112620', '185620', 'Verbovka'),
(3, 10, '70000', '243010', 'Plodovitoye'),
(4, 10, '62770', '231750', 'Abganerovo'),
(5, 10, '93820', '54610', 'Morozovskaya'),
(6, 10, '96360', '50320', 'Morozovskaya 2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
