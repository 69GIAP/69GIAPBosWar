-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2014 at 11:01 PM
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
-- Table structure for table `bos_lapino_locations`
--

DROP TABLE IF EXISTS `bos_lapino_locations`;
CREATE TABLE IF NOT EXISTS `bos_lapino_locations` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `LID` smallint(1) unsigned NOT NULL,
  `LX` decimal(15,0) NOT NULL,
  `LZ` decimal(15,0) NOT NULL,
  `LName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `LName` (`LName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Dumping data for table `bos_lapino_locations`
--

INSERT INTO `bos_lapino_locations` (`id`, `LID`, `LX`, `LZ`, `LName`) VALUES
(1, 10, '22830', '30990', 'Lapino'),
(2, 20, '6890', '41930', 'Nagibaevka'),
(3, 20, '14560', '15260', 'Stepnoy'),
(4, 10, '29090', '20570', 'Jantar'),
(5, 10, '43425', '7600', 'Rodnik'),
(6, 20, '38920', '33350', 'Dubki'),
(7, 51, '5850', '43500', 'Nagibaevka'),
(8, 51, '3880', '37110', 'Beloye'),
(9, 51, '5060', '30880', 'Privetivoye'),
(10, 51, '9590', '30230', 'Lugovoye'),
(11, 51, '13440', '36530', 'Korchma'),
(12, 51, '13420', '34670', 'Sadovoye'),
(13, 51, '15000', '29380', 'Dolgoye'),
(14, 51, '15070', '23700', 'Zayachye'),
(15, 51, '7860', '24120', 'Barakino'),
(16, 51, '4290', '19120', 'Shipovka'),
(17, 51, '7900', '17150', 'Barsukovo'),
(18, 51, '9430', '12540', 'Yarygino'),
(19, 51, '12830', '14270', 'Stepnoy');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
