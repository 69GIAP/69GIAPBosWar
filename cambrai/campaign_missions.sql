-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2014 at 05:23 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cambrai`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaign_missions`
--

DROP TABLE IF EXISTS `campaign_missions`;
CREATE TABLE IF NOT EXISTS `campaign_missions` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `mission_number` smallint(1) unsigned NOT NULL DEFAULT '0',
  `mission_file` varchar(50) NOT NULL DEFAULT 'mission_file.mis',
  `mission_log` varchar(50) NOT NULL DEFAULT 'missionReport',
  `MissionID` varchar(50) NOT NULL DEFAULT 'missionid',
  `mission_status` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `mission_file` (`mission_file`),
  UNIQUE KEY `MissionID` (`MissionID`),
  UNIQUE KEY `mission_number` (`mission_number`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `campaign_missions`
--

INSERT INTO `campaign_missions` (`id`, `mission_number`, `mission_file`, `mission_log`, `MissionID`, `mission_status`) VALUES
(6, 1, 'CAMBRAI-mission-1v3.Mission', 'missionReportcambrai1.txt', 'missionid1', 0),
(7, 2, 'CAMBRAQI-mission-2v0.Mission', 'missionReportcambrai2.txt', 'missionid2', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
