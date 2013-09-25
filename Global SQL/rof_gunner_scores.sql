-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2013 at 07:12 PM
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
-- Table structure for table `rof_gunner_scores`
--

DROP TABLE IF EXISTS `rof_gunner_scores`;
CREATE TABLE IF NOT EXISTS `rof_gunner_scores` (
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `MissionID` varchar(50) NOT NULL,
  `GunnerName` varchar(40) NOT NULL,
  `mgid` smallint(1) NOT NULL,
  `GunningFor` varchar(40) NOT NULL,
  `GunnerFate` tinyint(1) NOT NULL,
  `GunnerHealth` tinyint(1) NOT NULL,
  `GunnerNegScore` int(1) NOT NULL,
  `GunnerPosScore` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
