-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2013 at 06:50 PM
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
-- Table structure for table `campaign_settings`
--

DROP TABLE IF EXISTS `campaign_settings`;
CREATE TABLE IF NOT EXISTS `campaign_settings` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `simulation` varchar(6) NOT NULL,
  `campaign` varchar(30) NOT NULL,
  `camp_db` varchar(30) NOT NULL,
  `camp_host` varchar(30) NOT NULL,
  `camp_user` varchar(30) NOT NULL,
  `camp_passwd` varchar(30) NOT NULL,
  `map` varchar(30) NOT NULL,
  `map_locations` varchar(40) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '4',
  `show_airfield` tinyint(1) NOT NULL,
  `finish_flight_only_landed` tinyint(1) NOT NULL,
  `logpath` varchar(60) NOT NULL,
  `log_prefix` varchar(50) NOT NULL,
  `logfile` varchar(50) NOT NULL,
  `kia_pilot` int(1) NOT NULL,
  `mia_pilot` int(1) NOT NULL,
  `critical_w_pilot` int(1) NOT NULL,
  `serious_w_pilot` int(1) NOT NULL,
  `light_w_pilot` int(1) NOT NULL,
  `kia_gunner` int(1) NOT NULL,
  `mia_gunner` int(1) NOT NULL,
  `critical_w_gunner` int(1) NOT NULL,
  `serious_w_gunner` int(1) NOT NULL,
  `light_w_gunner` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `campaign_settings`
--

INSERT INTO `campaign_settings` (`id`, `simulation`, `campaign`, `camp_db`, `camp_host`, `camp_user`, `camp_passwd`, `map`, `map_locations`, `status`, `show_airfield`, `finish_flight_only_landed`, `logpath`, `log_prefix`, `logfile`, `kia_pilot`, `mia_pilot`, `critical_w_pilot`, `serious_w_pilot`, `light_w_pilot`, `kia_gunner`, `mia_gunner`, `critical_w_gunner`, `serious_w_gunner`, `light_w_gunner`) VALUES
(1, 'RoF', 'Bloody April', 'bloody_april', '', '', '', 'Western Front', 'rof_westernfront_locations', 1, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(2, 'RoF', 'Flanders Eagles', 'flanders_eagles', 'localhost', 'rofwar', 'rofwar', 'Channel', 'rof_channel_locations', 2, 0, 0, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(3, 'RoF', 'Lake', 'lake', '', '', '', 'Lake', 'rof_lake_locations', 4, 0, 1, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(4, 'RoF', 'Skies of the Empires II', 'skies_of_the_empires_ii', '', '', '', 'Verdun', 'rof_verdun_locations', 2, 0, 1, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(5, 'BoS', 'Stalingrad', 'stalingrad', '', '', '', 'Stalingrad', 'bos_stalingrad_locations', 4, 0, 1, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(6, 'RoF', 'Yankee Doodle', 'yankee_doodle', '', '', '', 'Verdun', 'rof_verdun_locations', 2, 1, 1, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(7, 'RoF', 'Skies of the Empires', 'skies_of_the_empires', 'localhost', 'rofwar', 'rofwar', 'Verdun', 'rof_verdun_locations', 3, 0, 1, '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0),
(8, 'RoF', '1916', '1916', 'localhost', 'rofwar', 'rofwar', 'Western Front', 'rof_westernfront_locations', 3, 1, 1, 'logs', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
