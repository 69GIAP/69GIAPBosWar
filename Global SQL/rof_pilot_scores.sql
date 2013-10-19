-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2013 at 11:29 PM
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
-- Table structure for table `rof_pilot_scores`
--

DROP TABLE IF EXISTS `rof_pilot_scores`;
CREATE TABLE IF NOT EXISTS `rof_pilot_scores` (
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `MissionID` varchar(50) NOT NULL DEFAULT 'missionid',
  `CoalID` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `country` smallint(1) NOT NULL DEFAULT '0',
  `PilotName` varchar(40) NOT NULL DEFAULT 'pilotname',
  `plid` mediumint(1) NOT NULL DEFAULT '0',
  `PilotFate` tinyint(1) NOT NULL DEFAULT '0',
  `PilotHealth` tinyint(1) NOT NULL DEFAULT '0',
  `PilotNegScore` int(1) NOT NULL DEFAULT '0',
  `PilotPosScore` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
