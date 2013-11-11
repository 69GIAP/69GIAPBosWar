-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 11, 2013 at 06:52 AM
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
-- Table structure for table `kills`
--

DROP TABLE IF EXISTS `kills`;
CREATE TABLE IF NOT EXISTS `kills` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `MissionID` varchar(60) NOT NULL DEFAULT 'missionid',
  `clocktime` time NOT NULL DEFAULT '00:00:00',
  `attackerID` mediumint(1) NOT NULL DEFAULT '0',
  `attackerName` varchar(50) NOT NULL DEFAULT 'attacker name',
  `attackerCountryID` smallint(1) NOT NULL DEFAULT '0',
  `attackerCoalID` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `action` varchar(20) NOT NULL DEFAULT 'action',
  `targetID` mediumint(1) NOT NULL DEFAULT '0',
  `targetClass` varchar(8) NOT NULL DEFAULT 'xxx',
  `targetType` varchar(50) NOT NULL DEFAULT 'target type',
  `targetName` varchar(50) NOT NULL DEFAULT 'target name',
  `targetCountryID` smallint(1) unsigned NOT NULL DEFAULT '0',
  `targetCoalID` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `targetValue` smallint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
