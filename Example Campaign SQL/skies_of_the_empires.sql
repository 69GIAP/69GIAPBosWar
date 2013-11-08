-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2013 at 05:51 AM
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
CREATE DATABASE IF NOT EXISTS `skies_of_the_empires` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `skies_of_the_empires`;

-- --------------------------------------------------------

--
-- Table structure for table `airfields`
--

DROP TABLE IF EXISTS `airfields`;
CREATE TABLE IF NOT EXISTS `airfields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airfield_Name` char(31) DEFAULT 'Unknown airfield',
  `airfield_Model` char(20) DEFAULT NULL,
  `airfield_Desc` varchar(80) DEFAULT NULL,
  `airfield_Country` enum('0','101','102','103','104','105','501','502','600','610','620','630','640') DEFAULT '0',
  `airfield_Coalition` enum('0','1','2','3','4','5','6','7') DEFAULT '0',
  `airfield_XPos` decimal(12,3) DEFAULT '0.000',
  `airfield_ZPos` decimal(12,3) DEFAULT '0.000',
  `airfield_YOri` decimal(5,2) DEFAULT '0.00',
  `airfield_Hydrodrome` int(11) DEFAULT '0',
  `airfield_enabled` int(11) DEFAULT '0',
  `airfield_updated` int(11) DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `airfields_models`
--

DROP TABLE IF EXISTS `airfields_models`;
CREATE TABLE IF NOT EXISTS `airfields_models` (
  `airfield_Name` char(31) NOT NULL DEFAULT '',
  `model_Name` varchar(30) NOT NULL DEFAULT '',
  `model_Quantity` int(3) DEFAULT NULL,
  PRIMARY KEY (`airfield_Name`,`model_Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `blocks`
--

DROP TABLE IF EXISTS `blocks`;
CREATE TABLE IF NOT EXISTS `blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Model` varchar(30) NOT NULL,
  `game_name` set('ROF','BOS') DEFAULT 'ROF',
  `modelpath1` varchar(40) DEFAULT 'graphics',
  `modelpath2` varchar(40) DEFAULT NULL,
  `modelpath3` varchar(40) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `Model` (`Model`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `blocks`
--

INSERT INTO `blocks` (`id`, `Model`, `game_name`, `modelpath1`, `modelpath2`, `modelpath3`) VALUES
(1, 'tent01', 'ROF', 'graphics', 'battlefield', NULL),
(2, 'tent_camp01', 'ROF', 'graphics', 'battlefield', NULL),
(3, 'tent_camp02', 'ROF', 'graphics', 'battlefield', NULL),
(4, 'tent_camp03', 'ROF', 'graphics', 'battlefield', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `bridges`
--

DROP TABLE IF EXISTS `bridges`;
CREATE TABLE IF NOT EXISTS `bridges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `bridge_Name` char(31) DEFAULT 'Bridge',
  `bridge_Model` char(20) DEFAULT NULL,
  `bridge_Desc` varchar(80) DEFAULT NULL,
  `bridge_Country` enum('0','101','102','103','104','105','501','502','600','610','620','630','640') DEFAULT '0',
  `bridge_coalition` enum('0','1','2') DEFAULT '0',
  `bridge_XPos` decimal(12,3) DEFAULT '0.000',
  `bridge_ZPos` decimal(12,3) DEFAULT '0.000',
  `bridge_YOri` decimal(5,2) DEFAULT '0.00',
  `bridge_updated` int(11) DEFAULT '0',
  `bridge_damage_1` int(11) DEFAULT '0',
  `bridge_damage_2` int(11) DEFAULT '0',
  `bridge_damage_3` int(11) DEFAULT '0',
  `bridge_damage_4` int(11) DEFAULT '0',
  `bridge_damage_5` int(11) DEFAULT '0',
  `bridge_damage_6` int(11) DEFAULT '0',
  `bridge_damage_7` int(11) DEFAULT '0',
  `bridge_damage_8` int(11) DEFAULT '0',
  `bridge_damage_9` int(11) DEFAULT '0',
  `bridge_damage_10` int(11) DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_settings`
--

DROP TABLE IF EXISTS `campaign_settings`;
CREATE TABLE IF NOT EXISTS `campaign_settings` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `simulation` enum('RoF','BoS') NOT NULL,
  `campaign` varchar(30) NOT NULL,
  `abbrv` varchar(7) NOT NULL,
  `camp_db` varchar(30) NOT NULL,
  `camp_host` varchar(30) NOT NULL,
  `camp_user` varchar(30) NOT NULL,
  `camp_passwd` varchar(30) NOT NULL,
  `map` varchar(30) NOT NULL,
  `map_locations` varchar(40) NOT NULL,
  `status` enum('1','2','3','4') NOT NULL DEFAULT '4',
  `show_airfield` enum('true','false') NOT NULL DEFAULT 'true',
  `finish_flight_only_landed` enum('true','false') NOT NULL DEFAULT 'true',
  `logpath` varchar(60) NOT NULL DEFAULT 'logs',
  `log_prefix` varchar(50) NOT NULL DEFAULT 'MissionReport',
  `logfile` varchar(50) NOT NULL DEFAULT 'MissionReport',
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
  `detect_off_time` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `campaign` (`campaign`),
  UNIQUE KEY `camp_db` (`camp_db`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `campaign_settings`
--

INSERT INTO `campaign_settings` (`id`, `simulation`, `campaign`, `abbrv`, `camp_db`, `camp_host`, `camp_user`, `camp_passwd`, `map`, `map_locations`, `status`, `show_airfield`, `finish_flight_only_landed`, `logpath`, `log_prefix`, `logfile`, `kia_pilot`, `mia_pilot`, `critical_w_pilot`, `serious_w_pilot`, `light_w_pilot`, `kia_gunner`, `critical_w_gunner`, `serious_w_gunner`, `light_w_gunner`, `healthy`, `min_x`, `min_z`, `max_x`, `max_z`, `air_detect_distance`, `ground_detect_distance`, `air_ai_level`, `ground_ai_level`, `ground_max_speed_kmh`, `ground_transport_speed_kmh`, `ground_spacing`, `lineup_minutes`, `mission_minutes`, `detect_off_time`) VALUES
(1, 'RoF', 'Skies of the Empires', 'SOEII', 'skies_of_the_empires', 'localhost', 'rofwar', 'rofwar', 'Verdun', 'rof_verdun_locations', '3', 'false', 'true', 'logs', 'missionReportSoE', 'missionReportSoE1', 100, 50, 30, 20, 10, 50, 30, 20, 10, 0, 0, 0, 53000, 53000, 5000, 500, '2', '2', 50, 10, 5, 30, 90, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cam_param`
--

DROP TABLE IF EXISTS `cam_param`;
CREATE TABLE IF NOT EXISTS `cam_param` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cam_sim` enum('RoF','BoS') DEFAULT 'RoF',
  `cam_map` varchar(80) DEFAULT 'Northern France',
  `cam_bot_left_X` decimal(12,3) DEFAULT '0.000',
  `cam_bot_left_Z` decimal(12,3) DEFAULT '0.000',
  `cam_top_right_X` decimal(12,3) DEFAULT '100000.000',
  `cam_top_right_Z` decimal(12,3) DEFAULT '100000.000',
  `cam_red_supply_1_x` decimal(12,3) DEFAULT '100.000',
  `cam_red_supply_1_z` decimal(12,3) DEFAULT '100.000',
  `cam_red_supply_2_x` decimal(12,3) DEFAULT '1100.000',
  `cam_red_supply_2_z` decimal(12,3) DEFAULT '100.000',
  `cam_red_supply_3_x` decimal(12,3) DEFAULT '2100.000',
  `cam_red_supply_3_z` decimal(12,3) DEFAULT '1100.000',
  `cam_blue_supply_1_x` decimal(12,3) DEFAULT '100.000',
  `cam_blue_supply_1_z` decimal(12,3) DEFAULT '1100.000',
  `cam_blue_supply_2_x` decimal(12,3) DEFAULT '1100.000',
  `cam_blue_supply_2_z` decimal(12,3) DEFAULT '1100.000',
  `cam_blue_supply_3_x` decimal(12,3) DEFAULT '2100.000',
  `cam_blue_supply_3_z` decimal(12,3) DEFAULT '1100.000',
  `cam_detect_dist` decimal(4,0) DEFAULT '5000',
  `cam_ground_ai_level` enum('1','2','3') DEFAULT '2',
  `cam_air_ai_level` enum('1','2','3') DEFAULT '2',
  `cam_ground_max_speed_kmh` decimal(3,0) DEFAULT '50',
  `cam_ground_transport_speed_kmh` decimal(3,0) DEFAULT '10',
  `cam_ground_spacing` decimal(3,0) DEFAULT '5',
  `cam_lineup_time` decimal(3,0) DEFAULT '30',
  `cam_mission_time` decimal(3,0) DEFAULT '90',
  `cam_detect_ground` decimal(5,0) DEFAULT '500',
  `cam_detect_air` decimal(5,0) DEFAULT '5000',
  `cam_detect_off_time` decimal(2,0) DEFAULT '15',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `cam_param`
--

INSERT INTO `cam_param` (`id`, `cam_sim`, `cam_map`, `cam_bot_left_X`, `cam_bot_left_Z`, `cam_top_right_X`, `cam_top_right_Z`, `cam_red_supply_1_x`, `cam_red_supply_1_z`, `cam_red_supply_2_x`, `cam_red_supply_2_z`, `cam_red_supply_3_x`, `cam_red_supply_3_z`, `cam_blue_supply_1_x`, `cam_blue_supply_1_z`, `cam_blue_supply_2_x`, `cam_blue_supply_2_z`, `cam_blue_supply_3_x`, `cam_blue_supply_3_z`, `cam_detect_dist`, `cam_ground_ai_level`, `cam_air_ai_level`, `cam_ground_max_speed_kmh`, `cam_ground_transport_speed_kmh`, `cam_ground_spacing`, `cam_lineup_time`, `cam_mission_time`, `cam_detect_ground`, `cam_detect_air`, `cam_detect_off_time`) VALUES
(1, 'RoF', 'Northern France', '0.000', '0.000', '100000.000', '100000.000', '100.000', '100.000', '1100.000', '100.000', '2100.000', '1100.000', '100.000', '1100.000', '1100.000', '1100.000', '2100.000', '1100.000', '5000', '2', '2', '50', '10', '5', '30', '90', '500', '5000', '15');

-- --------------------------------------------------------

--
-- Table structure for table `col_10`
--

DROP TABLE IF EXISTS `col_10`;
CREATE TABLE IF NOT EXISTS `col_10` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `col_Name` char(31) DEFAULT 'REGIMENT 1 Platoon 1',
  `col_moving` enum('0','1') DEFAULT '0',
  `col_Model` char(20) DEFAULT 'leyland',
  `col_Desc` varchar(80) DEFAULT NULL,
  `col_Country` enum('0','101','102','103','104','105','501','502','600','610','620','630','640') DEFAULT '105',
  `col_coalition` enum('1','2') DEFAULT '1',
  `col_supplypoint` enum('1','2','3') DEFAULT '1',
  `col_qty` int(11) DEFAULT '1',
  `col_XPos` decimal(12,3) DEFAULT '0.000',
  `col_ZPos` decimal(12,3) DEFAULT '0.000',
  `col_YOri` decimal(5,2) DEFAULT '0.00',
  `col_dest_XPos` decimal(12,3) DEFAULT '0.000',
  `col_dest_ZPos` decimal(12,3) DEFAULT '0.000',
  `col_speed` int(11) DEFAULT '10',
  `col_formation` int(11) DEFAULT '4',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `flags`
--

DROP TABLE IF EXISTS `flags`;
CREATE TABLE IF NOT EXISTS `flags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Model` varchar(30) NOT NULL,
  `game_name` set('RoF','BoS') DEFAULT 'RoF',
  `modelpath2` varchar(40) DEFAULT NULL,
  `modelpath3` varchar(40) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `Model` (`Model`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `flags`
--

INSERT INTO `flags` (`id`, `Model`, `game_name`, `modelpath2`, `modelpath3`) VALUES
(1, 'windsock', 'RoF', 'flag', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inbox`
--

DROP TABLE IF EXISTS `inbox`;
CREATE TABLE IF NOT EXISTS `inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lin` text,
  `data_value` varchar(200) DEFAULT NULL,
  `data_dec_value` decimal(20,3) DEFAULT NULL,
  `CoalID` tinyint(3) unsigned NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `mission_status`
--

DROP TABLE IF EXISTS `mission_status`;
CREATE TABLE IF NOT EXISTS `mission_status` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `mission_status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `mission_status`
--

INSERT INTO `mission_status` (`id`, `mission_status`) VALUES
(1, 'created'),
(2, 'configured'),
(3, 'initialized'),
(4, 'planning'),
(5, 'built'),
(6, 'analyzing'),
(7, 'scored'),
(8, 'moving units');

-- --------------------------------------------------------

--
-- Table structure for table `player_fate`
--

DROP TABLE IF EXISTS `player_fate`;
CREATE TABLE IF NOT EXISTS `player_fate` (
  `id` tinyint(1) NOT NULL,
  `fate` varchar(30) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player_fate`
--

INSERT INTO `player_fate` (`id`, `fate`) VALUES
(0, 'did not take off'),
(1, 'landed'),
(2, 'did not land'),
(3, 'crashed'),
(4, 'captured'),
(5, 'killed');

-- --------------------------------------------------------

--
-- Table structure for table `player_health`
--

DROP TABLE IF EXISTS `player_health`;
CREATE TABLE IF NOT EXISTS `player_health` (
  `id` tinyint(4) NOT NULL,
  `health` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `health` (`health`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player_health`
--

INSERT INTO `player_health` (`id`, `health`) VALUES
(3, 'critical injuries'),
(4, 'dead'),
(0, 'fit as a fiddle'),
(1, 'minor injuries'),
(2, 'serious injuries');

-- --------------------------------------------------------

--
-- Table structure for table `rof_coalitions`
--

DROP TABLE IF EXISTS `rof_coalitions`;
CREATE TABLE IF NOT EXISTS `rof_coalitions` (
  `CoalID` enum('0','1','2','3','4','5','6','7') NOT NULL,
  `Coalitionname` varchar(40) NOT NULL,
  PRIMARY KEY (`CoalID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rof_coalitions`
--

INSERT INTO `rof_coalitions` (`CoalID`, `Coalitionname`) VALUES
('0', 'Neutral'),
('1', 'British Commonwealth & Allied Forces'),
('2', 'U.S.A. and Central Alliance'),
('3', 'War Dogs'),
('4', 'Mercenaries'),
('5', 'Knights'),
('6', 'Corsairs'),
('7', 'Future');

-- --------------------------------------------------------

--
-- Table structure for table `rof_countries`
--

DROP TABLE IF EXISTS `rof_countries`;
CREATE TABLE IF NOT EXISTS `rof_countries` (
  `id` enum('1','2','3','4','5','6','7','8','9','10','11','12','13') NOT NULL,
  `ckey` enum('0','101','102','103','104','105','501','502','600','610','620','630','640') NOT NULL,
  `countryname` varchar(30) NOT NULL,
  `countryadj` varchar(30) NOT NULL,
  `CoalID` enum('0','1','2','3','4','5','6','7') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `countryname` (`countryname`),
  UNIQUE KEY `countryadj` (`countryadj`),
  UNIQUE KEY `ckey` (`ckey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rof_countries`
--

INSERT INTO `rof_countries` (`id`, `ckey`, `countryname`, `countryadj`, `CoalID`) VALUES
('1', '0', 'Neutral', 'neutral', '0'),
('2', '101', 'France', 'French', '2'),
('3', '102', 'Great Britain', 'British', '1'),
('4', '103', 'USA', 'American', '2'),
('5', '104', 'Italy', 'Italian', '1'),
('6', '105', 'Russia', 'Russian', '1'),
('7', '501', 'Germany', 'German', '2'),
('8', '502', 'Austro-Hungary', 'Austro-Hungarian', '2'),
('9', '600', 'Future Country', 'Future', '3'),
('10', '610', 'War Dogs Country', 'War Dogs', '4'),
('11', '620', 'Mercenaries Country', 'Mercenaries', '5'),
('12', '630', 'Knights Country', 'Knights', '6'),
('13', '640', 'Corsairs Country', 'Corsairs', '7');

-- --------------------------------------------------------

--
-- Table structure for table `rof_gunner_scores`
--

DROP TABLE IF EXISTS `rof_gunner_scores`;
CREATE TABLE IF NOT EXISTS `rof_gunner_scores` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `MissionID` varchar(50) NOT NULL DEFAULT 'missionid',
  `CoalID` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `country` smallint(1) NOT NULL DEFAULT '0',
  `GunnerName` varchar(40) NOT NULL DEFAULT 'gunnername',
  `plid` mediumint(1) NOT NULL DEFAULT '0',
  `GunningFor` varchar(40) NOT NULL DEFAULT 'pilotname',
  `GunnerFate` tinyint(1) NOT NULL DEFAULT '0',
  `GunnerHealth` tinyint(1) NOT NULL DEFAULT '0',
  `GunnerNegScore` int(1) NOT NULL DEFAULT '0',
  `GunnerPosScore` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `rof_gunner_scores`
--

INSERT INTO `rof_gunner_scores` (`id`, `MissionID`, `CoalID`, `country`, `GunnerName`, `plid`, `GunningFor`, `GunnerFate`, `GunnerHealth`, `GunnerNegScore`, `GunnerPosScore`) VALUES
(1, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 103, '=CAI= Itafolgore', 318466, '=CAI= Cix', 5, 4, 50, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rof_kills`
--

DROP TABLE IF EXISTS `rof_kills`;
CREATE TABLE IF NOT EXISTS `rof_kills` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `rof_kills`
--

INSERT INTO `rof_kills` (`id`, `MissionID`, `clocktime`, `attackerID`, `attackerName`, `attackerCountryID`, `attackerCoalID`, `action`, `targetID`, `targetClass`, `targetType`, `targetName`, `targetCountryID`, `targetCoalID`, `targetValue`) VALUES
(1, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:24:46', 297986, '=CAI= Itafolgore', 103, 2, 'destroyed', 297986, 'PRE', 'Breguet 14.B2', '=CAI= Itafolgore', 103, 2, 200),
(2, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:24:46', 297986, '=CAI= Itafolgore', 103, 2, 'killed', 299010, 'HUM', 'Common Bot', '=CAI= Itafolgore', 103, 2, 0),
(3, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:24:46', 297986, '=CAI= Itafolgore', 103, 2, 'killed', 305154, 'BOT', 'BotGunnerBreguet14', 'gunner', 103, 2, 0),
(4, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:31:17', 297986, '=CAI= Itafolgore', 103, 2, 'destroyed', 298009, 'PRE', 'Breguet 14.B2', '=CAI= Cix', 103, 2, 200),
(5, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:31:19', -1, 'Intrinsic', 103, 2, 'was killed', 329730, 'BOT', 'BotGunnerBreguet14', 'gunner', 103, 2, 0),
(6, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:31:23', 297986, '=CAI= Itafolgore', 103, 2, 'killed', 305177, 'BOT', 'BotGunnerBreguet14', 'gunner', 103, 2, 0),
(7, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:31:47', 297986, '=CAI= Itafolgore', 103, 2, 'destroyed', 298005, 'PRE', 'Breguet 14.B2', '=CAI= Gladio', 103, 2, 200),
(8, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:31:48', 297986, '=CAI= Itafolgore', 103, 2, 'killed', 305173, 'BOT', 'BotGunnerBreguet14', 'gunner', 103, 2, 0),
(9, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:36:25', 802816, '77mm AAA on a Daimler truck', 501, 2, 'shot down', 298008, 'PRE', 'Bristol F2B (F.III)', '=69.GIAP=YARICK', 102, 1, 200),
(10, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:36:33', 802816, '77mm AAA on a Daimler truck', 501, 2, 'killed', 299032, 'HUM', 'Common Bot', '=69.GIAP=YARICK', 102, 1, 0),
(11, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:36:33', -1, 'Intrinsic', 102, 1, 'was killed', 305176, 'BOT', 'BotGunnerBreguet14', 'gunner', 102, 1, 0),
(12, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:43:25', 297985, '-NW-Rossolini', 102, 1, 'shot down', 955392, 'BAL', 'Parseval', 'Dirigible USA', 103, 2, 50),
(13, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:47:48', 298011, '=CAI= Alatriste', 501, 2, 'shot down', 297990, 'PFI', 'Sopwith Dolphin', 'Nightwitch', 102, 1, 100),
(14, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:47:55', 298011, '=CAI= Alatriste', 501, 2, 'killed', 299014, 'HUM', 'Common Bot', 'Nightwitch', 102, 1, 0),
(15, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:49:05', 298011, '=CAI= Alatriste', 501, 2, 'shot down', 298010, 'PFI', 'Sopwith Dolphin', '=69.GIAP=REZNOV', 102, 1, 100),
(16, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '06:49:06', 298011, '=CAI= Alatriste', 501, 2, 'killed', 299034, 'HUM', 'Common Bot', '=69.GIAP=REZNOV', 102, 1, 0),
(17, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:01:32', 298013, '=CAI= Torec', 501, 2, 'shot down', 297985, 'PFI', 'S.E.5a', '-NW-Rossolini', 102, 1, 100),
(18, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:01:32', 298013, '=CAI= Torec', 501, 2, 'killed', 299009, 'HUM', 'Common Bot', '-NW-Rossolini', 102, 1, 0),
(19, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:01:58', 298011, '=CAI= Alatriste', 501, 2, 'shot down', 298004, 'PFI', 'S.E.5a', '=69.GIAP=BOOS', 102, 1, 100),
(20, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:01:58', 298011, '=CAI= Alatriste', 501, 2, 'killed', 299028, 'HUM', 'Common Bot', '=69.GIAP=BOOS', 102, 1, 0),
(21, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:02:24', -1, 'Intrinsic', 105, 1, 'crashed', 298002, 'PFI', 'SPAD 7.C1 150hp', 'BSS_DrGlow', 105, 1, 100),
(22, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:09:00', 297993, '242Sqn_Prof', 102, 1, 'shot down', 297997, 'PFI', 'Albatros D.III', '=CAI= Rudy', 501, 2, 100),
(23, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:09:09', 297988, 'Charlie Chap', 102, 1, 'shot down', 297998, 'PFI', 'Albatros D.III', '=CAI= Roby', 501, 2, 100),
(24, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:09:20', 297993, '242Sqn_Prof', 102, 1, 'killed', 299021, 'HUM', 'Common Bot', '=CAI= Rudy', 501, 2, 0),
(25, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:09:33', -1, 'Intrinsic', 102, 1, 'crashed', 298000, 'PFI', 'Sopwith Camel', 'Algy Dunkersworth', 102, 1, 100),
(26, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:11:22', 297988, 'Charlie Chap', 102, 1, 'shot down', 297993, 'PFI', 'Sopwith Camel', '242Sqn_Prof', 102, 1, 100),
(27, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:15:51', 298006, '=CAI= Diablo85', 103, 2, 'shot down', 297999, 'PFI', 'S.E.5a', '=69.GIAP=REDVO', 102, 1, 100),
(28, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:15:52', 298006, '=CAI= Diablo85', 103, 2, 'killed', 299023, 'HUM', 'Common Bot', '=69.GIAP=REDVO', 102, 1, 0),
(29, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:18:20', 297988, 'Charlie Chap', 102, 1, 'shot down', 298007, 'PFI', 'SPAD 13.C1', '=CAI= Kampf', 103, 2, 100),
(30, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:18:21', 297988, 'Charlie Chap', 102, 1, 'killed', 299031, 'HUM', 'Common Bot', '=CAI= Kampf', 103, 2, 0),
(31, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:19:48', 298007, '=CAI= Kampf', 103, 2, 'shot down', 297991, 'PFI', 'Sopwith Camel', 'Tanker', 102, 1, 100),
(32, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', '07:22:26', 298006, '=CAI= Diablo85', 103, 2, 'shot down', 297988, 'PFI', 'Sopwith Camel', 'Charlie Chap', 102, 1, 100);

-- --------------------------------------------------------

--
-- Table structure for table `rof_models`
--

DROP TABLE IF EXISTS `rof_models`;
CREATE TABLE IF NOT EXISTS `rof_models` (
  `model` varchar(45) NOT NULL,
  PRIMARY KEY (`model`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rof_models`
--

INSERT INTO `rof_models` (`model`) VALUES
('albatrosd5'),
('brequet14'),
('dfc5'),
('felixf2a'),
('fokkerd7'),
('gothag5');

-- --------------------------------------------------------

--
-- Table structure for table `rof_object_properties`
--

DROP TABLE IF EXISTS `rof_object_properties`;
CREATE TABLE IF NOT EXISTS `rof_object_properties` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `object_type` varchar(50) NOT NULL,
  `object_class` varchar(8) NOT NULL,
  `object_value` smallint(1) NOT NULL,
  `object_desc` varchar(40) DEFAULT NULL,
  `Model` varchar(30) DEFAULT NULL,
  `moving_becomes` varchar(30) DEFAULT NULL,
  `modelpath2` varchar(20) DEFAULT NULL,
  `modelpath3` varchar(20) DEFAULT NULL,
  `max_speed_kmh` tinyint(3) unsigned DEFAULT NULL,
  `cruise_speed_kmh` tinyint(3) unsigned DEFAULT NULL,
  `range_m` smallint(5) unsigned DEFAULT NULL,
  `default_country` enum('0','101','102','103','104','105','501','502','600','610','620','630','640') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `object_type` (`object_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=238 ;

--
-- Dumping data for table `rof_object_properties`
--

INSERT INTO `rof_object_properties` (`id`, `object_type`, `object_class`, `object_value`, `object_desc`, `Model`, `moving_becomes`, `modelpath2`, `modelpath3`, `max_speed_kmh`, `cruise_speed_kmh`, `range_m`, `default_country`) VALUES
(1, '13PdrAAA', 'AAA', 80, '13-pounder AAA', '13pdraaa', 'leylands', 'artillery', '13pdraaa', 0, 0, NULL, '101'),
(2, '13PrdaaaAttached', 'AAA', 80, '13-pounder AAA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(3, '77mmAAA', 'AAA', 80, '77mm AAA', '77mmaaa', 'daimlermarienfeld_s', 'artillery', '77mmaaa', 0, 0, NULL, '501'),
(4, '77mmAAAAttached', 'AAA', 80, '77mm AAA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(5, '45QF', 'ART', 100, '4.5 in. Quick Fire artillery', '45qf', 'leylands', 'artillery', '45qf', 0, 0, NULL, '102'),
(6, '75FG1897', 'ART', 100, '75mm M1897 artillery', '75fg1897', 'leylands', 'artillery', '75fg1897', 0, 0, NULL, '101'),
(7, 'FK96', 'ART', 100, 'Feldkanone 96 77mm artillery', 'fk96', 'daimlermarienfeld_s', 'artillery', 'fk96', 0, 0, NULL, '501'),
(8, 'm13', 'ART', 100, '15cm schweres Feldhaubitze M13 Lang', 'm13', 'daimlermarienfeld_s', 'artillery', 'm13', 0, 0, NULL, '501'),
(9, 'AeType', 'BAL', 50, 'Type Ae observation balloon', 'aetype', NULL, 'balloons', 'aetype', 0, 0, NULL, '101'),
(10, 'Caquot', 'BAL', 50, 'Caquot Type R observation balloon', 'caquot', NULL, 'balloons', 'caquot', 0, 0, NULL, '101'),
(11, 'Drachen', 'BAL', 50, 'Drachen type observation balloon', 'drachen', NULL, 'balloons', 'drachen', 0, 0, NULL, '501'),
(12, 'Parseval', 'BAL', 50, 'Parseval-Sigsfeld kite balloon', 'parseval', NULL, 'balloons', 'parseval', 0, 0, NULL, '501'),
(13, 'BotBoatSwain', 'BOT', 0, 'bosun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(14, 'BotGunnerBacker', 'BOT', 0, 'Becker gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(15, 'BotGunnerBreguet14', 'BOT', 0, 'gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(16, 'BotGunnerBW12', 'BOT', 0, 'Brandenburg W12 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(17, 'BotGunnerDavis', 'BOT', 0, 'Davis gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(18, 'BotGunnerFe2_sing', 'BOT', 0, 'F.E.2b gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(19, 'BotGunnerFelix_top-twin', 'BOT', 0, 'Felixstowe F.2A top gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(20, 'BotGunnerG5_1', 'BOT', 0, 'gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(21, 'BotGunnerG5_2', 'BOT', 0, 'gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(22, 'BotGunnerHCL2', 'BOT', 0, 'Halberstadt Cl.II gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(23, 'BotGunnerHP400_1', 'BOT', 0, 'nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(24, 'BotGunnerHP400_2', 'BOT', 0, 'Handley Page 0/400 dorsal gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(25, 'BotGunnerHP400_2_WM', 'BOT', 0, 'Handley Page O/400 dorsal gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(26, 'BotGunnerHP400_3', 'BOT', 0, 'Handley Page O/400 belly gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(27, 'BotGunnerRE8', 'BOT', 0, 'gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(28, 'bridge_hw110', 'BRG', 0, '110m road bridge', 'bridge_hw110', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(29, 'bridge_hw130', 'BRG', 0, '130m road bridge', 'bridge_hw130', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(30, 'bridge_hw150', 'BRG', 0, '150m road bridge', 'bridge_hw150', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(31, 'bridge_hw170', 'BRG', 0, '170m road bridge', 'bridge_hw170', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(32, 'bridge_hw190', 'BRG', 0, '190m road bridge', 'bridge_hw190', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(33, 'bridge_hw40', 'BRG', 0, '40m road bridge', 'bridge_hw40', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(34, 'bridge_hw70', 'BRG', 0, '70m road bridge', 'bridge_hw70', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(35, 'bridge_hw90', 'BRG', 0, '90m road bridge', 'bridge_hw90', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(36, 'bridge_rr110', 'BRG', 0, '110m rail bridge', 'bridge_rr110', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(37, 'bridge_rr130', 'BRG', 0, '130m rail bridge', 'bridge_rr130', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(38, 'bridge_rr150', 'BRG', 0, '150m rail bridge', 'bridge_rr150', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(39, 'bridge_rr170', 'BRG', 0, '170m rail bridge', 'bridge_rr170', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(40, 'bridge_rr190', 'BRG', 0, '190m rail bridge', 'bridge_rr190', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(41, 'bridge_rr70', 'BRG', 0, '70m rail bridge', 'bridge_rr70', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(42, 'bridge_rr90', 'BRG', 0, '90m rail bridge', 'bridge_rr90', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(43, 'Intrinsic', 'DNA', 0, 'Intrinsic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(44, 'factory_01', 'FAC', 0, 'factory', 'factory_01', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(45, 'factory_02', 'FAC', 0, 'factory', 'factory_02', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(46, 'factory_03', 'FAC', 0, 'factory', 'factory_03', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(47, 'factory_04', 'FAC', 0, 'factory', 'factory_04', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(48, 'factory_05', 'FAC', 0, 'factory', 'factory_05', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(49, 'factory_06', 'FAC', 0, 'factory', 'factory_06', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(50, 'factory_07', 'FAC', 0, 'oil tanks', 'factory_07', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(51, 'factory_08', 'FAC', 0, 'storage sheds', 'factory_08', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(52, 'Flag', 'FLG', 0, 'flag', 'flag', NULL, 'flag', 'flag', NULL, NULL, NULL, '0'),
(53, 'Windsock', 'FLG', 0, 'windsock', 'windsock', NULL, 'flag', 'windsock', NULL, NULL, NULL, '0'),
(54, 'Common Bot', 'HUM', 0, 'pilot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(55, 'HotchkissAAA', 'IMA', 80, 'anti-aircraft Hotchkiss machine gun', 'hotchkissaaa', 'leylands', 'artillery', 'machineguns', 0, 0, NULL, '101'),
(56, 'LMG08AAA', 'IMA', 80, 'anti-aircraft Maxim machine gun', 'lmg08aaa', 'daimlermarienfeld_s', 'artillery', 'machineguns', 0, 0, NULL, '501'),
(57, 'M-Flak', 'IMA', 80, '37mm automatic flak gun', 'mflak', 'daimlermarienfeld_s', 'artillery', 'mflak', 0, 0, NULL, '501'),
(58, 'Hotchkiss', 'IMG', 50, 'Hotchkiss machine gun', 'hotchkiss', 'leylands', 'artillery', 'machineguns', 0, 0, NULL, '101'),
(59, 'LMGO8', 'IMG', 50, 'Maxim machine gun', 'lmg08', 'daimlermarienfeld_s', 'artillery', 'machineguns', 0, 0, NULL, '501'),
(60, 'CappyChateau', 'INF', 0, 'Cappy Chateau', 'cappychateau', NULL, 'buildings', NULL, NULL, NULL, NULL, '0'),
(61, 'church_01', 'INF', 0, 'church', 'church_01', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(62, 'church_02', 'INF', 0, 'church', 'church_02', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(63, 'church_03', 'INF', 0, 'church', 'church_03', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(64, 'churchE_01', 'INF', 0, 'church', 'churche_01', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(65, 'fr_lrg', 'INF', 0, 'airfield', 'fr_lrg', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(66, 'fr_med', 'INF', 0, 'airfield', 'fr_med', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(67, 'ger_lrg', 'INF', 0, 'airfield', 'ger_lrg', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(68, 'ger_med', 'INF', 0, 'airfield', 'ger_med', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(69, 'gunpos_g01', 'INF', 0, 'gun position', 'gunpos_g01', NULL, 'firingpoint', 'gunpos', NULL, NULL, NULL, '0'),
(70, 'gunpos01', 'INF', 0, 'gun position', 'gunpos01', NULL, 'firingpoint', 'gunpos', NULL, NULL, NULL, '0'),
(71, 'gunpos02', 'INF', 0, 'gun position', 'gunpos02', NULL, 'battlefield', 'gunpos02', NULL, NULL, NULL, '0'),
(72, 'pillbox01', 'INF', 0, 'pillbox', 'pillbox01', NULL, 'firingpoint', 'pillbox', NULL, NULL, NULL, '0'),
(73, 'pillbox02', 'INF', 0, 'pillbox', 'pillbox02', NULL, 'firingpoint', 'pillbox', NULL, NULL, NULL, '0'),
(74, 'pillbox03', 'INF', 0, 'pillbox', 'pillbox03', NULL, 'firingpoint', 'pillbox', NULL, NULL, NULL, '0'),
(75, 'pillbox04', 'INF', 0, 'pillbox', 'pillbox04', NULL, 'firingpoint', 'pillbox', NULL, NULL, NULL, '0'),
(76, 'Portal', 'INF', 0, 'rail tunnel', 'portal', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(77, 'railwaystation_1', 'INF', 0, 'railway station', 'railwaystation_01', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(78, 'railwaystation_2', 'INF', 0, 'railway station', 'railwaystation_02', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(79, 'railwaystation_3', 'INF', 0, 'railway station', 'railwaystation_03', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(80, 'railwaystation_4', 'INF', 0, 'railway station', 'railwaystation_04', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(81, 'railwaystation_5', 'INF', 0, 'railway station', 'railwaystation_05', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(82, 'river_airbase', 'INF', 0, 'seaplane pier', 'river_airbase', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(83, 'river_airbase2', 'INF', 0, 'seaplane pier', 'river_airbase2', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(84, 'river_airbase3', 'INF', 0, 'seaplane pier', 'river_airbase3', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(85, 'Roucourt', 'INF', 0, 'airfield', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(86, 'rwstation', 'INF', 0, 'railway station', 'rwstation', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(87, 'tent_camp01', 'INF', 0, 'tent emcampment', 'tent_camp01', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(88, 'tent_camp02', 'INF', 0, 'tent encampment', 'tent_camp02', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(89, 'tent_camp03', 'INF', 0, 'tent encampment', 'tent_camp03', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(90, 'tent_camp04', 'INF', 0, 'tent encampment', 'tent_camp04', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(91, 'tent01', 'INF', 1000, 'HQ tent', 'tent01', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(92, 'tent02', 'INF', 0, 'tent', 'tent02', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(93, 'tent03', 'INF', 0, 'tent', 'tent03', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(94, 'GBR Searchlight', 'LGT', 50, 'searchlight', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(95, 'GER Ship Searchlight', 'LGT', 50, 'ship searchlight', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(96, 'HMS Ship Searchlight', 'LGT', 50, 'ship searchlight', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(97, 'British naval 4in AAA gun', 'NAA', 80, '4in naval AAA gun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(98, 'British naval 12pdr gun', 'NAR', 0, 'naval 12-pounder gun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(99, 'British naval 4in gun', 'NAR', 0, 'naval 4in gun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(100, 'British navel 6in gun', 'NAR', 0, 'naval 6in gun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(101, 'German naval 105mm gun', 'NAR', 0, 'naval 105mm gun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(102, 'German naval 52mm gun', 'NAR', 0, 'naval 52mm gun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(103, 'Gotha G.V', 'PBO', 200, 'Gotha G.V', 'gothag5', 'gothag5', 'planes', 'gothag5', NULL, NULL, NULL, '501'),
(104, 'Handley Page 0-400', 'PBO', 200, 'Handley Page O/400', 'hp400', 'hp400', 'planes', 'hp400', NULL, NULL, NULL, '102'),
(105, 'Airco D.H.2', 'PFI', 100, 'Airco D.H.2', 'dh2', 'dh2', 'planes', 'dh2', NULL, NULL, NULL, '0'),
(106, 'Albatros D.II', 'PFI', 100, 'Albatros D.II', 'albatrosd2', 'albatrosd2', 'planes', 'albatrosd2', NULL, NULL, NULL, '501'),
(107, 'Albatros D.II lt', 'PFI', 100, 'Albatros D.II lt', 'albatrosd2late', 'albatrosd2late', 'planes', 'albatrosd2late', NULL, NULL, NULL, '501'),
(108, 'Albatros D.III', 'PFI', 100, 'Albatros D.III', 'albatrosd3', 'albatrosd3', 'planes', 'albatrosd3', NULL, NULL, NULL, '501'),
(109, 'Albatros D.Va', 'PFI', 100, 'Albatros D.Va', 'albatrosd5', 'albatrosd5', 'planes', 'albatrosd5', NULL, NULL, NULL, '501'),
(110, 'Fokker D.VII', 'PFI', 100, 'Fokker D.VII', 'fokkerd7', 'fokkerd7', 'planes', 'fokkerd7', NULL, NULL, NULL, '501'),
(111, 'Fokker D.VIIF', 'PFI', 100, 'Fokker D.VIIF', 'fokkerd7f', 'fokkerd7f', 'planes', 'fokkerd7f', NULL, NULL, NULL, '501'),
(112, 'Fokker D.VIII', 'PFI', 100, 'Fokker D.VIII', 'fokkerd8', 'fokkerd8', 'planes', 'fokkerd8', NULL, NULL, NULL, '501'),
(113, 'Fokker Dr.I', 'PFI', 100, 'Fokker Dr.I', 'fokkerdr1', 'fokkerdr1', 'planes', 'fokkerdr1', NULL, NULL, NULL, '501'),
(114, 'Fokker E.III', 'PFI', 100, 'Fokker E.III', 'fokkere3', 'fokkere3', 'planes', 'fokkere3', NULL, NULL, NULL, '501'),
(115, 'Halberstadt D.II', 'PFI', 100, 'Halberstadt D.II', 'halberstadtd2', 'halberstadtd2', 'planes', 'halberstadtd2', NULL, NULL, NULL, '501'),
(116, 'Nieuport 11.C1', 'PFI', 100, 'Nieuport 11.C1', 'nieuport11', 'nieuport11', 'planes', 'nieuport11', NULL, NULL, NULL, '101'),
(117, 'Nieuport 17.C1', 'PFI', 100, 'Nieuport 17.C1', 'nieuport17', 'nieuport17', 'planes', 'nieuport17', NULL, NULL, NULL, '101'),
(118, 'Nieuport 17.C1 GBR', 'PFI', 100, 'Nieuport 17.C1 GBR', 'nieuport17brit', 'nieuport17brit', 'planes', 'nieuport17brit', NULL, NULL, NULL, '102'),
(119, 'Nieuport 28.C1', 'PFI', 100, 'Nieuport 28.C1', 'nieuport28', 'nieuport28', 'planes', 'nieuport28', NULL, NULL, NULL, '101'),
(120, 'Pfalz D.IIIa', 'PFI', 100, 'Pfalz D.IIIa', 'pfalzd3a', 'pfalzd3a', 'planes', 'pfalzd3a', NULL, NULL, NULL, '501'),
(121, 'Pfalz D.XII', 'PFI', 100, 'Pfalz D.XII', 'pfalzd12', 'pfalzd12', 'planes', 'pfalzd12', NULL, NULL, NULL, '501'),
(122, 'S.E.5a', 'PFI', 100, 'S.E.5a', 'se5a', 'se5a', 'planes', 'se5a', NULL, NULL, NULL, '102'),
(123, 'Sopwith Camel', 'PFI', 100, 'Sopwith Camel', 'sopcamel', 'sopcamel', 'planes', 'sopcamel', NULL, NULL, NULL, '102'),
(124, 'Sopwith Dolphin', 'PFI', 100, 'Sopwith Dolphin', 'sopdolphin', 'sopdolphin', 'planes', 'sopdolphin', NULL, NULL, NULL, '102'),
(125, 'Sopwith Pup', 'PFI', 100, 'Sopwith Pup', 'soppup', 'soppup', 'planes', 'soppup', NULL, NULL, NULL, '102'),
(126, 'Sopwith Triplane', 'PFI', 100, 'Sopwith Triplane', 'soptriplane', 'soptriplane', 'planes', 'soptriplane', NULL, NULL, NULL, '102'),
(127, 'SPAD 13.C1', 'PFI', 100, 'SPAD 13.C1', 'spad13', 'spad13', 'planes', 'spad13', NULL, NULL, NULL, '101'),
(128, 'SPAD 7.C1 150hp', 'PFI', 100, 'SPAD 7.C1 150hp', 'spad7early', 'spad7early', 'planes', 'spad7early', NULL, NULL, NULL, '101'),
(129, 'SPAD 7.C1 180hp', 'PFI', 100, 'SPAD 7.C1 180hp', 'spad7', 'spad7', 'planes', 'spad7', NULL, NULL, NULL, '101'),
(130, 'Airco D.H.4', 'PRE', 200, 'Airco D.H.4', 'dh4', 'dh4', 'planes', 'dh4', NULL, NULL, NULL, '102'),
(131, 'Breguet 14.B2', 'PRE', 200, 'Breguet 14.B2', 'breguet14', 'breguet14', 'planes', 'breguet14', NULL, NULL, NULL, '101'),
(132, 'Bristol F2B (F.II)', 'PRE', 200, 'Bristol F2B (F.II)', 'bristolf2bf2', 'bristolf2bf2', 'planes', 'bristolf2bf2', NULL, NULL, NULL, '102'),
(133, 'Bristol F2B (F.III)', 'PRE', 200, 'Bristol F2B (F.III)', 'bristolf2bf3', 'bristolf2bf3', 'planes', 'bristolf2bf2', NULL, NULL, NULL, '102'),
(134, 'DFW C.V', 'PRE', 200, 'DFW.C.V', 'dfwc5', 'dfwc5', 'planes', 'dfwc5', NULL, NULL, NULL, '501'),
(135, 'F.E.2b', 'PRE', 200, 'F.E.2b', 'fe2b', 'fe2b', 'planes', 'fe2b', NULL, NULL, NULL, '102'),
(136, 'Halberstadt CL.II', 'PRE', 200, 'Halberstadt CL.II', 'halberstadtcl2', 'halberstadtcl2', 'planes', 'halberstadtcl2', NULL, NULL, NULL, '501'),
(137, 'Halberstadt CL.II 200hp', 'PRE', 200, 'Halberstadt CL.II 200hp', 'halberstadtcl2au', 'halberstadtcl2au', 'planes', 'halberstadtcl2au', NULL, NULL, NULL, '501'),
(138, 'R.E.8', 'PRE', 200, 'R.E.8', 're8', 're8', 'planes', 're8', NULL, NULL, NULL, '102'),
(139, 'Roland C.IIa', 'PRE', 200, 'Roland C.IIa', 'rolc2a', 'rolc2a', 'planes', 'rolc2a', NULL, NULL, NULL, '501'),
(140, 'Brandenburg W12', 'PSE', 200, 'Brandenburg W12', 'brandw12', 'brandw12', 'planes', 'brandw12', NULL, NULL, NULL, '501'),
(141, 'Felixstowe F2A', 'PSE', 200, 'Felixstowe F2A', 'felixf2a', 'felixf2a', 'planes', 'felixf2a', NULL, NULL, NULL, '102'),
(142, 'G8', 'RLO', 50, 'locomotive', 'g8', 'g8', 'trains', 'g8', NULL, NULL, NULL, '0'),
(143, 'Wagon_BoxB', 'RWA', 25, 'boxcar', 'boxb', 'boxb', 'trains', 'box', NULL, NULL, NULL, '0'),
(144, 'Wagon_BoxNB', 'RWA', 25, 'boxcar', 'boxnb', 'boxnb', 'trains', 'box', NULL, NULL, NULL, '0'),
(145, 'Wagon_G8T', 'RWA', 25, 'tender', 'g8t', 'g8t', 'trains', 'g8', NULL, NULL, NULL, '0'),
(146, 'Wagon_GondolaB', 'RWA', 25, 'covered gondola', 'gondolab', 'gondolab', 'trains', 'platform', NULL, NULL, NULL, '0'),
(147, 'Wagon_GondolaNB', 'RWA', 25, 'covered gondola', 'gondolanb', 'gondolanb', 'trains', 'platform', NULL, NULL, NULL, '0'),
(148, 'Wagon_Pass', 'RWA', 25, 'passenger railcar', 'pass', 'pass', 'trains', 'pass', NULL, NULL, NULL, '0'),
(149, 'Wagon_PassA', 'RWA', -25, 'hospital railcar', 'passa', 'passa', 'trains', 'pass', NULL, NULL, NULL, '0'),
(150, 'Wagon_PassAC', 'RWA', 25, 'hospital railcar', 'passac', 'passac', 'trains', 'pass', NULL, NULL, NULL, '0'),
(151, 'Wagon_PassC', 'RWA', 25, 'passenger railcar', 'passc', 'passc', 'trains', 'pass', NULL, NULL, NULL, '0'),
(152, 'Wagon_PlatformA7V', 'RWA', 25, 'loaded flatcar', 'platforma7v', 'platforma7v', 'trains', 'platform', NULL, NULL, NULL, '0'),
(153, 'Wagon_PlatformB', 'RWA', 25, 'loaded flatcar', 'platformb', 'platformb', 'trains', 'platform', NULL, NULL, NULL, '0'),
(154, 'Wagon_PlatformEmptyB', 'RWA', 25, 'empty flatcar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(155, 'Wagon_PlatformEmptyNB', 'RWA', 25, 'empty flatcar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(156, 'Wagon_PlatformMk4', 'RWA', 25, 'loaded flatcar', 'platformmk4', 'platformmk4', 'trains', 'platform', NULL, NULL, NULL, '0'),
(157, 'Wagon_PlatformNB', 'RWA', 25, 'loaded flatcar', 'platformnb', 'trains', 'platform', NULL, NULL, NULL, NULL, '0'),
(158, 'Wagon_TankB', 'RWA', 25, 'tank railcar', 'tankb', 'tankb', 'trains', 'box', NULL, NULL, NULL, '0'),
(159, 'Wagon_TankNB', 'RWA', 25, 'tank railcar', 'tanknb', 'tanknb', 'trains', 'box', NULL, NULL, NULL, '0'),
(160, 'FRpenicheAAA', 'SAA', 80, 'peniche AAA barge', 'frpenicheaaa', 'frpenicheaaa', 'ships', 'frpenicheaaa', NULL, NULL, NULL, '101'),
(161, 'GERpenicheAAA', 'SAA', 80, 'peniche AAA barge', 'gerpenicheaaa', 'gerpenicheaaa', 'ships', 'gerpenicheaaa', NULL, NULL, NULL, '501'),
(162, 'GER light cruiser', 'SCR', 1000, 'light cruiser', 'gercruiser', 'gercruiser', 'ships', 'gerships', NULL, NULL, NULL, '501'),
(163, 'HMS light cruiser', 'SCR', 1000, 'light cruiser', 'hsmcruiser', 'hmscruiser', 'ships', 'gbrships', NULL, NULL, NULL, '102'),
(164, 'Passenger Ship', 'SPA', 300, 'passenger ship', 'ship_pass', 'ship_pass', 'ships', 'merchant', NULL, NULL, NULL, '0'),
(165, 'ship_stat_pass', 'SPA', 150, 'stationary passenger ship', 'ship_stat_pass', 'ship_pass', 'blocks', NULL, NULL, NULL, NULL, '0'),
(166, 'GER submarine', 'SSU', 500, 'U-boat', 'gersubmarine', 'gersubmarine', 'ships', 'gerships', NULL, NULL, NULL, '501'),
(167, 'HMS submarine', 'SSU', 500, 'submarine', 'hmssubmarine', 'hmssubmarine', 'ships', 'gbrships', NULL, NULL, NULL, '102'),
(168, 'Cargo Ship', 'STR', 300, 'cargo ship', 'ship_cargo', 'ship_cargo', 'ships', 'merchant', NULL, NULL, NULL, '0'),
(169, 'ship_stat_cargo', 'STR', 150, 'stationary cargo ship', 'ship_stat_cargo', 'ship_cargo', 'blocks', NULL, NULL, NULL, NULL, '0'),
(170, 'ship_stat_tank', 'STR', 150, 'stationary tanker ship', 'ship_stat_tank', 'ship_tank', 'blocks', NULL, NULL, NULL, NULL, '0'),
(171, 'Tanker Ship', 'STR', 300, 'tanker ship', 'ship_tank', 'ship_tank', 'ships', 'merchant', NULL, NULL, NULL, '0'),
(172, 'A7V', 'T', 100, 'A7V tank', 'a7v', 'a7v', 'vehicles', 'a7v', 6, 4, NULL, '0'),
(173, 'Ca1', 'T', 100, 'Schneider CA1 tank', 'ca1', 'ca1', 'vehicles', 'ca1', 6, 4, NULL, '101'),
(174, 'F17M', 'T', 100, 'Renault FT17 machine gun tank', 'ft17m', 'ft17m', 'vehicles', 'ft17', 6, 4, NULL, '101'),
(175, 'FT17C', 'T', 100, 'Renault FT17 cannon tank', 'ft17c', 'ft17', 'vehicles', 'ft17', 6, 4, NULL, '101'),
(176, 'Mk4F', 'T', 100, 'Mk IV Female tank', 'mk4f', 'mk4f', 'vehicles', 'mk4', 6, 4, NULL, '102'),
(177, 'Mk4FGER', 'T', 100, 'Mk IV Female tank', 'mk4fger', 'mk4fger', 'vehicles', 'mk4', 6, 4, NULL, '501'),
(178, 'Mk4M', 'T', 100, 'Mk IV Male tank', 'mk4m', 'mk4m', 'vehicles', 'mk4', 6, 4, NULL, '102'),
(179, 'MK4MGER', 'T', 100, 'Mk IV Male tank', 'mk4mger', 'mk4mger', 'vehicles', 'mk4', 6, 4, NULL, '501'),
(180, 'Mk5F', 'T', 100, 'Mk V Female tank', 'mk5f', 'mk5f', 'vehicles', 'mk5', 6, 4, NULL, '102'),
(181, 'Mk5M', 'T', 100, 'Mk V Male tank', 'mk5m', 'mk5m', 'vehicles', 'mk5', 6, 4, NULL, '102'),
(182, 'StChamond', 'T', 100, 'Saint-Chamond tank', 'stchamond', 'stchamond', 'vehicles', 'stchamond', 6, 4, NULL, '101'),
(183, 'Whippet', 'T', 100, 'Whippet Mk A tank', 'whippet', 'whippet', 'vehicles', 'whippet', 15, 10, NULL, '102'),
(184, 'TurretBreguet14_1', 'TUR', 0, 'gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(185, 'TurretBristolF2B_1', 'TUR', 0, 'Bristol F2.B gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(186, 'TurretBristolF2BF2_1_WM2', 'TUR', 0, 'Bristol F2.B gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(187, 'TurretBristolF2BF3_1_WM2', 'TUR', 0, 'Bristol F2.B gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(188, 'TurretBW12_1', 'TUR', 0, 'Brandenburg W12 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(189, 'TurretBW12_1_WM_Becker_AP', 'TUR', 0, 'Brandenburg W12 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(190, 'TurretBW12_1_WM_Becker_HE', 'TUR', 0, 'Brandenburg W12 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(191, 'TurretBW12_1_WM_Becker_HEAP', 'TUR', 0, 'Brandenburg W12 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(192, 'TurretBW12_1_WM_Twin_Parabellum', 'TUR', 0, 'Brandenburg W12 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(193, 'TurretDFWC_1', 'TUR', 0, 'DFW C.V gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(194, 'TurretDFWC_1_WM_Becker_AP', 'TUR', 0, 'DFW C.V gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(195, 'TurretDFWC_1_WM_Becker_HE', 'TUR', 0, 'DFW C.V gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(196, 'TurretDFWC_1_WM_Becker_HEAP', 'TUR', 0, 'DFW C.V gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(197, 'TurretDFWC_1_WM_Twin_Parabellum', 'TUR', 0, 'DFW C.V gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(198, 'TurretDH4_1', 'TUR', 0, 'D.H.4 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(199, 'TurretDH4_1_WM', 'TUR', 0, 'D.H.4 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(200, 'TurretFe2b_1', 'TUR', 0, 'F.E.2b gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(201, 'TurretFe2b_1_WM', 'TUR', 0, 'F.E.2b gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(202, 'TurretFelixF2A_2', 'TUR', 0, 'Felixstowe F.2A gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(203, 'TurretFelixF2A_3', 'TUR', 0, 'Felixstowe F.2A gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(204, 'TurretFelixF2A_3_WM', 'TUR', 0, 'Felixstowe F.2A gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(205, 'TurretGothaG5_1', 'TUR', 0, 'Gotha G.V nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(206, 'TurretGothaG5_1_WM_Becker_AP', 'TUR', 0, 'Gotha G.V nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(207, 'TurretGothaG5_1_WM_Becker_HE', 'TUR', 0, 'Gotha G.V nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(208, 'TurretGothaG5_1_WM_Becker_HEAP', 'TUR', 0, 'Gotha G.V nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(209, 'TurretGothaG5_2', 'TUR', 0, 'rear gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(210, 'TurretGothaG5_2_WM_Twin_Parabellum', 'TUR', 0, 'rear gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(211, 'TurretHalberstadtCL2_1', 'TUR', 0, 'Halberstadt CL.II gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(212, 'TurretHalberstadtCL2_1_WM_TwinPar', 'TUR', 0, 'Halberstadt CL.II gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(213, 'TurretHalberstadtCL2au_1', 'TUR', 0, 'Halberstadt CL.II gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(214, 'TurretHalberstadtCL2au_1_WM_TwinPar', 'TUR', 0, 'Halberstadt CL.II gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(215, 'TurretHP400_1', 'TUR', 0, 'Handley Page O/400 nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(216, 'TurretHP400_1_WM', 'TUR', 0, 'Handley Page O/400 nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(217, 'TurretHP400_2', 'TUR', 0, 'Handley Page O/400 dorsal gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(218, 'TurretHP400_2_WM', 'TUR', 0, 'Handley Page O/400 dorsal gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(219, 'TurretHP400_3', 'TUR', 0, 'Handley Page O/400 belly gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(220, 'TurretRE8_1', 'TUR', 0, 'R.E.8 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(221, 'TurretRE8_1_WM2', 'TUR', 0, 'R.E.8 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(222, 'TurretRolandC2a_1', 'TUR', 0, 'Roland C.IIa gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(223, 'TurretRolandC2a_1_WM_TwinPar', 'TUR', 0, 'Roland C.IIa gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(224, 'DaimlerAAA', 'VAA', 80, '77mm AAA on a Daimler truck', 'daimleraaa', 'daimleraaa', 'artillery', 'daimleraaa', 50, 20, NULL, '501'),
(225, 'thornycroftaaa', 'VAA', 80, '13-pounder AAA on a Thornycraft truck', 'thornycroftaaa', 'thornycroftaaa', 'artillery', 'thornycroftaaa', 50, 20, NULL, '102'),
(226, 'Benz Searchlight', 'VTR', 50, 'Benz Cargo truck with searchlight', 'benz_p', 'benz_p', 'vehicle', 'benz', 50, 20, NULL, '501'),
(227, 'benz_open', 'VTR', 50, 'Benz Cargo open truck', 'benz_open', 'benz_open', 'vehicles', 'benz', 50, 20, NULL, '501'),
(228, 'benz_soft', 'VTR', 50, 'Benz Cargo covered truck', 'benz_soft', 'benz_soft', 'vehicles', 'benz', 50, 20, NULL, '501'),
(229, 'Crossley', 'VTR', 50, 'Crossley 4X2 Staff Car', 'crossley', 'crossley', 'vehicles', 'crossley', 50, 20, NULL, '102'),
(230, 'DaimlerMarienfelde', 'VTR', 50, 'Daimler Marienfelde truck', 'daimlermarienfelde', 'daimlermarienfelde', 'vehicles', 'daimlermarienfelde', 50, 20, NULL, '501'),
(231, 'DaimlerMarienfelde_S', 'VTR', 50, 'Daimler Marienfelde truck', 'daimlermarienfelde_s', 'daimlermarienfelde_s', 'vehicles', 'daimlermarienfelde', 50, 20, NULL, '501'),
(232, 'Leyland', 'VTR', 50, 'Leyland 3-tonner truck', 'leyland', 'leyland', 'vehicles', 'leyland', 50, 20, NULL, '102'),
(233, 'LeylandS', 'VTR', 50, 'Leyland 3-tonner truck', 'leylands', 'leylands', 'vehicles', 'leyland', 50, 20, NULL, '102'),
(234, 'Merc22', 'VTR', 50, 'Mercedes 22 Staff Car', 'merc22', 'merc22', 'vehicles', 'merc22', 50, 20, NULL, '501'),
(235, 'Quad', 'VTR', 50, 'Jeffery Quad Portee open truck', 'quad', 'quad', 'vehicles', 'quad', 50, 20, NULL, '101'),
(236, 'Quad Searchlight', 'VTR', 50, 'Jeffery Quad Portee with searchlight', 'quad_p', 'quad_p', 'vehicles', 'quad', 50, 20, NULL, '101'),
(237, 'QuadA', 'VTR', -50, 'Jeffery Quad Portee closed truck', 'quada', 'quada', 'vehicles', 'quad', 50, 20, NULL, '101');

-- --------------------------------------------------------

--
-- Table structure for table `rof_object_roles`
--

DROP TABLE IF EXISTS `rof_object_roles`;
CREATE TABLE IF NOT EXISTS `rof_object_roles` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `unit_class` varchar(8) DEFAULT NULL,
  `role_description` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unit_class` (`unit_class`),
  UNIQUE KEY `role_description` (`role_description`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `rof_object_roles`
--

INSERT INTO `rof_object_roles` (`id`, `unit_class`, `role_description`) VALUES
(1, 'AAA', 'Artillery:Anti-Aircraft'),
(2, 'ART', 'Artillery'),
(3, 'BOT', 'Bot'),
(4, 'BRG', 'Bridge'),
(5, 'DNA', 'Intrinsic'),
(6, 'FAC', 'Factory'),
(7, 'HUM', 'Human'),
(8, 'IMA', 'Infantry: MG AA'),
(9, 'IMG', 'Infantry:Machine Gun'),
(10, 'INF', 'Infrastructure'),
(11, 'NAA', 'Naval:Anti-Aircraft'),
(12, 'NAR', 'Naval:Artillery'),
(13, 'PBO', 'Plane:Bomber'),
(14, 'PFB', 'Plane:Fighter-Bomber'),
(15, 'PFI', 'Plane:Fighter'),
(16, 'PRE', 'Plane:Reconnaissance'),
(17, 'PSE', 'Plane:Seaplane'),
(18, 'PTR', 'Plane:Transport'),
(19, 'RAA', 'Rail:Anti-Aircraft'),
(20, 'RCV', 'Rail:Civil Train'),
(21, 'RLO', 'Rail:Locomotive'),
(22, 'RWA', 'Rail:Wagon'),
(23, 'SAA', 'Ship:Anti-Aircraft'),
(24, 'SBA', 'Ship:Battleship'),
(25, 'SCR', 'Ship:Cruiser'),
(26, 'SDE', 'Ship:Destroyer'),
(27, 'SPB', 'Ship:Patrol Boat'),
(28, 'SSU', 'Ship:Submarine'),
(29, 'T', 'Tank:Standard'),
(30, 'TAA', 'Tank:Anti-Aircraft'),
(31, 'TSP', 'Tank:Self-Propelled Gun'),
(32, 'TTD', 'Tank:Tank Destroyer'),
(33, 'TUR', 'Turret'),
(34, 'VAA', 'Vehicle:Anti-Aircraft'),
(35, 'VMI', 'Vehicle:Mech. Infantry'),
(36, 'VRI', 'Regular Infantry'),
(37, 'VTR', 'Vehicle:Transport');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `rof_pilot_scores`
--

INSERT INTO `rof_pilot_scores` (`id`, `MissionID`, `CoalID`, `country`, `PilotName`, `plid`, `PilotFate`, `PilotHealth`, `PilotNegScore`, `PilotPosScore`) VALUES
(1, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 1, 102, '=69.GIAP=REDVO', 297999, 5, 4, 100, 0),
(2, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 1, 102, 'Nightwitch', 297990, 5, 4, 100, 0),
(3, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 1, 102, 'Charlie Chap', 297988, 1, 0, 0, 0),
(4, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 1, 102, '=69.GIAP=BOOS', 298004, 5, 4, 100, 0),
(5, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 1, 102, 'Tanker', 297991, 1, 0, 0, 0),
(6, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 1, 102, '=69.GIAP=YARICK', 298008, 5, 4, 100, 0),
(7, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 1, 102, '=69.GIAP=REZNOV', 298010, 5, 4, 100, 0),
(8, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 1, 102, '242Sqn_Prof', 297993, 1, 0, 0, 0),
(9, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 1, 102, 'Algy Dunkersworth', 298000, 1, 0, 0, 0),
(10, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 1, 105, 'BSS_DrGlow', 298002, 0, 1, 10, 0),
(11, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 1, 102, '-NW-Rossolini', 297985, 5, 4, 100, 0),
(12, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 1, 105, '=69GIAP=ALEXEJ', 297992, 2, 0, 0, 0),
(13, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 103, '=CAI= Kampf', 298007, 5, 4, 100, 0),
(14, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 103, '_BT_Shogun', 297995, 1, 0, 0, 0),
(15, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 103, '=CAI= Itafolgore', 297986, 5, 4, 100, 0),
(16, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 103, '=CAI= Cix', 298009, 1, 0, 0, 0),
(17, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 103, 'BT_Colosky', 297994, 1, 0, 0, 0),
(18, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 501, '=CAI= Alatriste', 298011, 1, 0, 0, 0),
(19, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 501, '=CAI= Torec', 298013, 1, 0, 0, 0),
(20, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 103, '=CAI= Gladio', 298005, 1, 0, 0, 0),
(21, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 103, '_BT_Patwar', 297996, 1, 0, 0, 0),
(22, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 103, '=CAI= Diablo85', 298006, 1, 0, 0, 0),
(23, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 501, '=CAI= Piddu', 298001, 1, 0, 0, 0),
(24, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 501, '=CAI= Rudy', 297997, 5, 4, 100, 0),
(25, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 2, 501, '=CAI= Roby', 297998, 0, 1, 10, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rof_verdun_locations`
--

DROP TABLE IF EXISTS `rof_verdun_locations`;
CREATE TABLE IF NOT EXISTS `rof_verdun_locations` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `LID` smallint(1) unsigned NOT NULL,
  `LX` int(1) NOT NULL,
  `LZ` int(1) NOT NULL,
  `LName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `rof_verdun_locations`
--

INSERT INTO `rof_verdun_locations` (`id`, `LID`, `LX`, `LZ`, `LName`) VALUES
(1, 10, 28000, 34000, 'Abaucourt'),
(2, 51, 28650, 36500, 'Abaucourt'),
(3, 51, 43600, 38650, 'Billy-sous-Mangiennes'),
(4, 51, 19200, 14350, 'Blercourt'),
(5, 51, 33000, 21200, 'Champneuville'),
(6, 51, 30900, 17100, 'Chattancourt'),
(7, 51, 18500, 2300, 'Clemont-en-Argonne'),
(8, 10, 38950, 16850, 'Consenvoye'),
(9, 51, 38700, 17900, 'Consenvoye'),
(10, 51, 44900, 26050, 'Darnyillers'),
(11, 51, 14700, 28600, 'Dieue-sur-Meuse'),
(12, 51, 38500, 48200, 'Dommary-Baroncourt'),
(13, 51, 39900, 30550, 'DuBois'),
(14, 10, 40070, 31080, 'DuBois'),
(15, 51, 30000, 12450, 'Esnes-en-Argonne'),
(16, 51, 30300, 43550, 'Etain'),
(17, 51, 5200, 6300, 'Evres'),
(18, 51, 17400, 42800, 'Franses-en-Woevre'),
(19, 51, 20400, 27900, 'Haudainville'),
(20, 51, 19600, 37500, 'Haudiomont'),
(21, 51, 3900, 34050, 'Lacroix-sur-Meuse'),
(22, 51, 14000, 17700, 'Lemmes'),
(23, 10, 10100, 17700, 'Lemmes'),
(24, 10, 15200, 39700, 'Les Eparges'),
(25, 51, 14150, 40600, 'Les Eparges'),
(26, 51, 46100, 10650, 'Liry-devant-Dun'),
(27, 51, 46000, 35800, 'Mangiennes'),
(28, 51, 16500, 46650, 'Marcheville-en-Woevre'),
(29, 10, 19900, 48650, 'Marcheville-en-Woevre'),
(30, 51, 34100, 34300, 'Maucourt-sur-Orne'),
(31, 20, 35950, 6450, 'Montfaucon-d''Argonne'),
(32, 51, 36050, 7200, 'Montfaucon-d''Argonne'),
(33, 51, 48400, 39000, 'Pillon'),
(34, 51, 6300, 21600, 'Rambluzin-et-benoit-Vaux'),
(35, 51, 22500, 8600, 'Recicourt'),
(36, 51, 7600, 25900, 'Recourt'),
(37, 51, 43500, 3450, 'Romangne-sous-Montfaucon'),
(38, 51, 37450, 43050, 'Senon'),
(39, 20, 36950, 44500, 'Senon'),
(40, 51, 22950, 15850, 'Sivry-la-Perche'),
(41, 10, 23150, 16600, 'Sivry-la-Perche'),
(42, 51, 42550, 45200, 'Spincourt'),
(43, 51, 7800, 14000, 'St-Endre-en-Barrois'),
(44, 51, 8650, 46800, 'St-Maurice-sous-les-Cotes'),
(45, 52, 24600, -1000, 'the Canadian side of the border'),
(46, 52, 24600, 1000, 'the Canadian side of the border'),
(47, 52, 24600, 3000, 'the Canadian side of the border'),
(48, 52, 24600, 5000, 'the Canadian side of the border'),
(49, 52, 24600, 7000, 'the Canadian side of the border'),
(50, 52, 24600, 9000, 'the Canadian side of the border'),
(51, 52, 24600, 11000, 'the Canadian side of the border'),
(52, 52, 24600, 13000, 'the Canadian side of the border'),
(53, 52, 24600, 15000, 'the Canadian side of the border'),
(54, 52, 24600, 17000, 'the Canadian side of the border'),
(55, 52, 24600, 19000, 'the Canadian side of the border'),
(56, 52, 24600, 21000, 'the Canadian side of the border'),
(57, 52, 24600, 23000, 'the Canadian side of the border'),
(58, 52, 24600, 25000, 'the Canadian side of the border'),
(59, 52, 24600, 27000, 'the Canadian side of the border'),
(60, 52, 24600, 29000, 'the Canadian side of the border'),
(61, 52, 24600, 31000, 'the Canadian side of the border'),
(62, 52, 24600, 33000, 'the Canadian side of the border'),
(63, 52, 24600, 35000, 'the Canadian side of the border'),
(64, 52, 24600, 37000, 'the Canadian side of the border'),
(65, 52, 24600, 39000, 'the Canadian side of the border'),
(66, 52, 24600, 41000, 'the Canadian side of the border'),
(67, 52, 24600, 43000, 'the Canadian side of the border'),
(68, 52, 24600, 45000, 'the Canadian side of the border'),
(69, 52, 24600, 47000, 'the Canadian side of the border'),
(70, 52, 24600, 49000, 'the Canadian side of the border'),
(71, 52, 24600, 51000, 'the Canadian side of the border'),
(72, 52, 24600, 53000, 'the Canadian side of the border'),
(73, 52, 24500, -1000, 'the International Boundary'),
(74, 52, 24500, 1000, 'the International Boundary'),
(75, 52, 24500, 3000, 'the International Boundary'),
(76, 52, 24500, 5000, 'the International Boundary'),
(77, 52, 24500, 7000, 'the International Boundary'),
(78, 52, 24500, 9000, 'the International Boundary'),
(79, 52, 24500, 11000, 'the International Boundary'),
(80, 52, 24500, 13000, 'the International Boundary'),
(81, 52, 24500, 15000, 'the International Boundary'),
(82, 52, 24500, 17000, 'the International Boundary'),
(83, 52, 24500, 19000, 'the International Boundary'),
(84, 52, 24500, 21000, 'the International Boundary'),
(85, 52, 24500, 23000, 'the International Boundary'),
(86, 52, 24500, 25000, 'the International Boundary'),
(87, 52, 24500, 27000, 'the International Boundary'),
(88, 52, 24500, 29000, 'the International Boundary'),
(89, 52, 24500, 31000, 'the International Boundary'),
(90, 52, 24500, 33000, 'the International Boundary'),
(91, 52, 24500, 35000, 'the International Boundary'),
(92, 52, 24500, 37000, 'the International Boundary'),
(93, 52, 24500, 39000, 'the International Boundary'),
(94, 52, 24500, 41000, 'the International Boundary'),
(95, 52, 24500, 43000, 'the International Boundary'),
(96, 52, 24500, 45000, 'the International Boundary'),
(97, 52, 24500, 47000, 'the International Boundary'),
(98, 52, 24500, 49000, 'the International Boundary'),
(99, 52, 24500, 51000, 'the International Boundary'),
(100, 52, 24500, 53000, 'the International Boundary'),
(101, 52, 24400, -1000, 'the US side of the border'),
(102, 52, 24400, 1000, 'the US side of the border'),
(103, 52, 24400, 3000, 'the US side of the border'),
(104, 52, 24400, 5000, 'the US side of the border'),
(105, 52, 24400, 7000, 'the US side of the border'),
(106, 52, 24400, 9000, 'the US side of the border'),
(107, 52, 24400, 11000, 'the US side of the border'),
(108, 52, 24400, 13000, 'the US side of the border'),
(109, 52, 24400, 15000, 'the US side of the border'),
(110, 52, 24400, 17000, 'the US side of the border'),
(111, 52, 24400, 19000, 'the US side of the border'),
(112, 52, 24400, 21000, 'the US side of the border'),
(113, 52, 24400, 23000, 'the US side of the border'),
(114, 52, 24400, 25000, 'the US side of the border'),
(115, 52, 24400, 27000, 'the US side of the border'),
(116, 52, 24400, 29000, 'the US side of the border'),
(117, 52, 24400, 31000, 'the US side of the border'),
(118, 52, 24400, 33000, 'the US side of the border'),
(119, 52, 24400, 35000, 'the US side of the border'),
(120, 52, 24400, 37000, 'the US side of the border'),
(121, 52, 24400, 39000, 'the US side of the border'),
(122, 52, 24400, 41000, 'the US side of the border'),
(123, 52, 24400, 43000, 'the US side of the border'),
(124, 52, 24400, 45000, 'the US side of the border'),
(125, 52, 24400, 47000, 'the US side of the border'),
(126, 52, 24400, 49000, 'the US side of the border'),
(127, 52, 24400, 51000, 'the US side of the border'),
(128, 52, 24400, 53000, 'the US side of the border'),
(129, 51, 7250, 30800, 'Troyon'),
(130, 50, 24700, 25000, 'Verdun'),
(131, 51, 44100, 13750, 'Vilosnes-Haraumont'),
(132, 10, 18050, 4200, 'Vraincourt'),
(133, 51, 19800, 4400, 'Vraincourt');

-- --------------------------------------------------------

--
-- Table structure for table `static`
--

DROP TABLE IF EXISTS `static`;
CREATE TABLE IF NOT EXISTS `static` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `static_Name` char(31) DEFAULT 'STATIC 1 Object 1',
  `static_Model` char(20) DEFAULT 'leyland',
  `static_Type` enum('Vehicle','Block','Flag','Train') DEFAULT 'Vehicle',
  `static_Desc` varchar(80) DEFAULT NULL,
  `static_Country` enum('0','101','102','103','104','105','501','502','600','610','620','630','640') DEFAULT '105',
  `static_coalition` enum('1','2') DEFAULT '1',
  `static_supplypoint` enum('1','2','3') DEFAULT '1',
  `static_XPos` decimal(12,3) DEFAULT '0.000',
  `static_ZPos` decimal(12,3) DEFAULT '0.000',
  `static_YOri` decimal(5,2) DEFAULT '0.00',
  `static_updated` int(11) DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `supply_points`
--

DROP TABLE IF EXISTS `supply_points`;
CREATE TABLE IF NOT EXISTS `supply_points` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `xPos` smallint(1) NOT NULL DEFAULT '0',
  `zPos` smallint(6) NOT NULL DEFAULT '0',
  `CoalID` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `supplypointName` varchar(40) NOT NULL DEFAULT 'supplypoint name',
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplypointName` (`supplypointName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `trains`
--

DROP TABLE IF EXISTS `trains`;
CREATE TABLE IF NOT EXISTS `trains` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Model` varchar(30) NOT NULL,
  `game_name` set('ROF','BOS') DEFAULT 'ROF',
  `modelpath2` varchar(40) DEFAULT NULL,
  `modelpath3` varchar(40) DEFAULT NULL,
  `max_speed_kmh` decimal(3,0) DEFAULT '50',
  `cruise_speed_kmh` decimal(3,0) DEFAULT '25',
  `range_m` decimal(4,0) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `Model` (`Model`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `trains`
--

INSERT INTO `trains` (`id`, `Model`, `game_name`, `modelpath2`, `modelpath3`, `max_speed_kmh`, `cruise_speed_kmh`, `range_m`) VALUES
(1, 'passa', 'ROF', 'trains', 'pass', '0', '0', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
CREATE TABLE IF NOT EXISTS `vehicles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Model` varchar(30) NOT NULL,
  `moving_becomes` varchar(30) DEFAULT NULL,
  `game_name` set('ROF','BOS') DEFAULT 'ROF',
  `modelpath2` varchar(40) DEFAULT NULL,
  `modelpath3` varchar(40) DEFAULT NULL,
  `max_speed_kmh` decimal(3,0) DEFAULT '20',
  `cruise_speed_kmh` decimal(3,0) DEFAULT '5',
  `range_m` decimal(4,0) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `Model` (`Model`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=37 ;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `Model`, `moving_becomes`, `game_name`, `modelpath2`, `modelpath3`, `max_speed_kmh`, `cruise_speed_kmh`, `range_m`) VALUES
(1, 'a7v', 'a7v', 'ROF', 'vehicles', 'a7v', '6', '4', NULL),
(2, 'benz_open', 'benz_open', 'ROF', 'vehicles', 'benz', '50', '20', NULL),
(3, 'benz_p', 'benz_p', 'ROF', 'vehicles', 'benz', '50', '20', NULL),
(4, 'benz_soft', 'benz_soft', 'ROF', 'vehicles', 'benz', '50', '20', NULL),
(5, 'ca1', 'ca1', 'ROF', 'vehicles', 'ca1', '6', '4', NULL),
(6, 'crossley', 'crossley', 'ROF', 'vehicles', 'crossley', '50', '20', NULL),
(7, 'daimlermarienfelde', 'daimlermarienfelde', 'ROF', 'vehicles', 'daimlermarienfelde', '50', '20', NULL),
(8, 'daimlermarienfelde_s', 'daimlermarienfelde_s', 'ROF', 'vehicles', 'daimlermarienfelde', '50', '20', NULL),
(9, 'ft17c', 'ft17', 'ROF', 'vehicles', 'ft17', '6', '4', NULL),
(10, 'ft17m', 'ft17', 'ROF', 'vehicles', 'ft17', '6', '4', NULL),
(11, 'leyland', 'leyland', 'ROF', 'vehicles', 'leyland', '50', '20', NULL),
(12, 'leylands', 'leylands', 'ROF', 'vehicles', 'leyland', '50', '20', NULL),
(13, 'mk4f', 'mk4f', 'ROF', 'vehicles', 'mk4', '6', '4', NULL),
(14, 'mk4fger', 'mk4fger', 'ROF', 'vehicles', 'mk4', '6', '4', NULL),
(15, 'mk4m', 'mk4m', 'ROF', 'vehicles', 'mk4', '6', '4', NULL),
(16, 'mk4mger', 'mk4mger', 'ROF', 'vehicles', 'mk4', '6', '4', NULL),
(17, 'mk5f', 'mk5f', 'ROF', 'vehicles', 'mk5', '6', '4', NULL),
(18, 'mk5m', 'mk5m', 'ROF', 'vehicles', 'mk5', '6', '4', NULL),
(19, 'quad', 'quad', 'ROF', 'vehicles', 'quad', '50', '20', NULL),
(20, 'quad_p', 'quad_p', 'ROF', 'vehicles', 'quad', '50', '20', NULL),
(21, 'quada', 'quada', 'ROF', 'vehicles', 'quad', '50', '20', NULL),
(22, 'stchamond', 'stchamond', 'ROF', 'vehicles', 'stchamond', '6', '4', NULL),
(23, 'whippet', 'whippet', 'ROF', 'vehicles', 'whippet', '15', '10', NULL),
(24, '13pdraaa', 'leylands', 'ROF', 'artillery', '13pdraaa', '0', '0', NULL),
(25, '45qf', 'leylands', 'ROF', 'artillery', '45qf', '0', '0', NULL),
(26, '75fg1897', 'leylands', 'ROF', 'artillery', '75fg1897', '0', '0', NULL),
(27, '77mmaaa', 'daimlermarienfeld_s', 'ROF', 'artillery', '77mmaaa', '0', '0', NULL),
(28, 'daimleraaa', 'daimleraaa', 'ROF', 'artillery', 'daimleraaa', '50', '20', NULL),
(29, 'fk96', 'daimlermarienfeld_s', 'ROF', 'artillery', 'fk96', '0', '0', NULL),
(30, 'm13', 'daimlermarienfelds', 'ROF', 'artillery', 'm13', '0', '0', NULL),
(31, 'hotchkiss', 'leylands', 'ROF', 'artillery', 'machineguns', '0', '0', NULL),
(32, 'hotchkissaaa', 'leylands', 'ROF', 'artillery', 'machineguns', '0', '0', NULL),
(33, 'lmg08', 'daimlermarienfeld_s', 'ROF', 'artillery', 'machineguns', '0', '0', NULL),
(34, 'lmg08aaa', 'daimlermarienfeld_s', 'ROF', 'artillery', 'machineguns', '0', '0', NULL),
(35, 'mflak', 'daimlermarienfeld_s', 'ROF', 'artillery', 'mflak', '0', '0', NULL),
(36, 'thornycroftaaa', 'thornycroftaaa', 'ROF', 'artillery', 'thornycroftaaa', '50', '20', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
