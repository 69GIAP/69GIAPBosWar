-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2014 at 05:46 PM
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
-- Table structure for table `version`
--

DROP TABLE IF EXISTS `version`;
CREATE TABLE IF NOT EXISTS `version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `simulation` varchar(3) NOT NULL,
  `dbVersion` varchar(10) NOT NULL,
  `buildDate` datetime NOT NULL,
  `description` varchar(45) NOT NULL,
  `remark` text,
  `revisor` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`simulation`,`dbVersion`,`buildDate`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Dumping data for table `version`
--

INSERT INTO `version` (`id`, `simulation`, `dbVersion`, `buildDate`, `description`, `remark`, `revisor`) VALUES
(2, 'BoS', '0.0.0.9', '2013-11-21 11:30:45', 'Pre Alpha Phase: Version ', NULL, NULL),
(3, 'RoF', '0.1.0.9', '2013-12-05 22:37:00', 'Alpha Phase: Version ', NULL, NULL),
(6, 'RoF', '0.1.0.10', '2014-05-18 10:52:46', 'Alpha Phase: Version ', 'campaign configuration tracking introduced that required tables; GitHub: be70091878532f365ce0dac64b9a78cbacd59522 ', 'MYATA'),
(7, 'BoS', '0.0.0.11', '2014-05-18 10:52:46', 'Alpha Phase: Version ', 'sidebar was synched with RoF sidebar', 'MYATA'),
(8, 'BoS', '0.1.0.12', '2014-06-03 23:38:10', 'Alpha Phase: Version ', 'Completed preliminary bos_stalingrad_locations and bos_object_properties.', 'TUSHKA'),
(9, 'BoS', '0.1.0.13', '2014-11-03 22:41:09', 'Alpha Phase: Version ', 'Stenka added ''201'' to countries column of several tables for BoS compatibility.', 'TUSHKA');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
