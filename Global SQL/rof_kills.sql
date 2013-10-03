-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 04, 2013 at 12:18 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `skies_of_the_empires`
--

-- --------------------------------------------------------

--
-- Table structure for table `rof_kills`
--

DROP TABLE IF EXISTS `rof_kills`;
CREATE TABLE IF NOT EXISTS `rof_kills` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `MissionID` varchar(60) NOT NULL,
  `clocktime` time NOT NULL,
  `attackerID` mediumint(1) NOT NULL,
  `attackerName` varchar(50) NOT NULL,
  `attackerCountry` smallint(1) NOT NULL,
  `attackerCoalID` tinyint(1) unsigned NOT NULL,
  `action` varchar(20) NOT NULL,
  `targetID` mediumint(1) NOT NULL,
  `targetName` varchar(50) NOT NULL,
  `targetCountry` smallint(1) unsigned NOT NULL,
  `targetCoalID` tinyint(1) unsigned NOT NULL,
  `targetValue` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `rof_kills`
--

INSERT INTO `rof_kills` (`id`, `MissionID`, `clocktime`, `attackerID`, `attackerName`, `attackerCountry`, `attackerCoalID`, `action`, `targetID`, `targetName`, `targetCountry`, `targetCoalID`, `targetValue`) VALUES
(1, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', '08:59:54', -1, 'Intrinsic', 0, 0, '', 0, '', 0, 0, 0),
(2, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', '09:31:13', -1, 'Intrinsic', 0, 0, '', 0, '', 0, 0, 0),
(3, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', '10:00:09', -1, 'Intrinsic', 0, 0, '', 0, '', 0, 0, 0),
(4, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', '10:00:49', -1, 'Intrinsic', 0, 0, '', 0, '', 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
