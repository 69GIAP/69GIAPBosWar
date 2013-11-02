-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2013 at 06:23 PM
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
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `simulation` enum('RoF','BoS') NOT NULL DEFAULT 'RoF',
  `campaign` varchar(30) NOT NULL DEFAULT 'campaign',
  `abbrv` varchar(7) NOT NULL,
  `camp_db` varchar(30) NOT NULL DEFAULT 'campaign_database',
  `camp_host` varchar(30) NOT NULL DEFAULT 'localhost',
  `camp_user` varchar(30) NOT NULL DEFAULT 'campaign db user',
  `camp_passwd` varchar(30) NOT NULL DEFAULT 'password for campaign user',
  `map` varchar(30) NOT NULL DEFAULT 'map',
  `map_locations` varchar(40) NOT NULL DEFAULT 'map_locations table',
  `status` enum('1','2','3','4') NOT NULL DEFAULT '4',
  `show_airfield` enum('true','false') NOT NULL DEFAULT 'true',
  `finish_flight_only_landed` enum('true','false') NOT NULL DEFAULT 'true',
  `logpath` varchar(60) NOT NULL DEFAULT 'logs',
  `log_prefix` varchar(50) NOT NULL DEFAULT 'missionReport',
  `logfile` varchar(50) NOT NULL DEFAULT 'missionReport',
  `kia_pilot` smallint(1) NOT NULL DEFAULT '100',
  `mia_pilot` smallint(1) NOT NULL DEFAULT '50',
  `critical_w_pilot` smallint(1) NOT NULL DEFAULT '30',
  `serious_w_pilot` smallint(1) NOT NULL DEFAULT '20',
  `light_w_pilot` smallint(1) NOT NULL DEFAULT '10',
  `kia_gunner` smallint(1) NOT NULL DEFAULT '50',
  `critical_w_gunner` smallint(1) NOT NULL DEFAULT '30',
  `serious_w_gunner` smallint(1) NOT NULL DEFAULT '20',
  `light_w_gunner` smallint(1) NOT NULL DEFAULT '10',
  `healthy` smallint(1) NOT NULL DEFAULT '0',
  `min_x` mediumint(1) NOT NULL DEFAULT '0',
  `min_z` mediumint(1) NOT NULL DEFAULT '0',
  `max_x` mediumint(1) NOT NULL DEFAULT '100000',
  `max_z` mediumint(1) NOT NULL DEFAULT '100000',
  `air_detect_distance` smallint(1) unsigned NOT NULL DEFAULT '5000',
  `ground_detect_distance` smallint(1) unsigned NOT NULL DEFAULT '500',
  `air_ai_level` enum('1','2','3') NOT NULL DEFAULT '2',
  `ground_ai_level` enum('1','2','3') NOT NULL DEFAULT '2',
  `ground_max_speed_kmh` tinyint(1) unsigned NOT NULL DEFAULT '50',
  `ground_transport_speed_kmh` tinyint(1) unsigned NOT NULL DEFAULT '10',
  `ground_spacing` tinyint(1) unsigned NOT NULL DEFAULT '5',
  `lineup_minutes` tinyint(1) unsigned NOT NULL DEFAULT '30',
  `mission_minutes` tinyint(1) unsigned NOT NULL DEFAULT '90',
  `detect_off_time` tinyint(1) unsigned NOT NULL DEFAULT '15',
  PRIMARY KEY (`id`),
  UNIQUE KEY `campaign` (`campaign`),
  UNIQUE KEY `camp_db` (`camp_db`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=81 ;

--
-- Dumping data for table `campaign_settings`
--

INSERT INTO `campaign_settings` (`id`, `simulation`, `campaign`, `abbrv`, `camp_db`, `camp_host`, `camp_user`, `camp_passwd`, `map`, `map_locations`, `status`, `show_airfield`, `finish_flight_only_landed`, `logpath`, `log_prefix`, `logfile`, `kia_pilot`, `mia_pilot`, `critical_w_pilot`, `serious_w_pilot`, `light_w_pilot`, `kia_gunner`, `critical_w_gunner`, `serious_w_gunner`, `light_w_gunner`, `healthy`, `min_x`, `min_z`, `max_x`, `max_z`, `air_detect_distance`, `ground_detect_distance`, `air_ai_level`, `ground_ai_level`, `ground_max_speed_kmh`, `ground_transport_speed_kmh`, `ground_spacing`, `lineup_minutes`, `mission_minutes`, `detect_off_time`) VALUES
(2, 'RoF', 'Flanders Eagles', 'FlanE', 'flanders_eagles', 'localhost', 'rofwar', 'rofwar', 'Channel', 'rof_channel_locations', '2', 'true', 'true', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', '2', 0, 0, 0, 30, 90, 15),
(4, 'RoF', 'Skies of the Empires II', 'SOEII', 'skies_of_the_empires_ii', '', '', '', 'Verdun', 'rof_verdun_locations', '2', 'true', 'true', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', '2', 0, 0, 0, 30, 90, 15),
(5, 'BoS', 'Stalingrad', 'Stagrad', 'stalingrad', '', '', '', 'Stalingrad', 'bos_stalingrad_locations', '4', 'true', 'true', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', '2', 0, 0, 0, 30, 90, 15),
(6, 'RoF', 'Yankee Doodle', 'YankDo', 'yankee_doodle', '', '', '', 'Verdun', 'rof_verdun_locations', '2', 'true', 'true', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', '2', 0, 0, 0, 30, 90, 15),
(7, 'RoF', 'Skies of the Empires', 'SoE', 'skies_of_the_empires', 'localhost', 'rofwar', 'rofwar', 'Verdun', 'rof_verdun_locations', '3', 'true', 'true', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', '2', 0, 0, 0, 30, 90, 15),
(8, 'RoF', '1916', '1916', '1916', 'localhost', 'rofwar', 'rofwar', 'Western Front', 'rof_westernfront_locations', '3', 'true', 'true', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', '2', 0, 0, 0, 30, 90, 15),
(9, 'RoF', 'Bloody April', 'BloodyA', 'bloody_april', 'localhost', 'rofwar', 'rofwar', 'Western Front', 'rof_westernfront_locations', '1', 'true', 'true', '', '', '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2', '2', 0, 0, 0, 30, 90, 15);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
