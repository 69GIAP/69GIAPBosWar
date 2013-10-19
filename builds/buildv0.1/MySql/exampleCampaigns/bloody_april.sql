-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2013 at 11:06 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bloody_april`
--
CREATE DATABASE IF NOT EXISTS `bloody_april` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bloody_april`;

-- --------------------------------------------------------

--
-- Table structure for table `airfields`
--

DROP TABLE IF EXISTS `airfields`;
CREATE TABLE IF NOT EXISTS `airfields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `l1` char(8) DEFAULT 'Airfield',
  `l2` char(1) DEFAULT '{',
  `af_Name` varchar(80) DEFAULT 'Airfield with no name',
  `l3` varchar(200) DEFAULT '  Name = "Airfield with no name";',
  `af_Index` int(11) DEFAULT '1',
  `l4` varchar(200) DEFAULT '  Index = 1;',
  `af_LinkTrid` int(11) DEFAULT '2',
  `l5` varchar(200) DEFAULT '  LinkTrid = 2;',
  `af_Xpos` decimal(12,3) DEFAULT '100.000',
  `l6` varchar(200) DEFAULT '  XPos = 100.000;',
  `af_Ypos` decimal(12,3) DEFAULT '0.000',
  `l7` varchar(200) DEFAULT '  YPos = 0.000;',
  `af_Zpos` decimal(12,3) DEFAULT '0.000',
  `l8` varchar(200) DEFAULT '  ZPos = 100.000;',
  `l9` varchar(200) DEFAULT '  XOri = 0.00;',
  `af_YOri` decimal(5,2) DEFAULT '0.00',
  `l10` varchar(200) DEFAULT '  YOri = 0.00;',
  `l11` varchar(200) DEFAULT '  ZOri = 0.00;',
  `l12` varchar(200) DEFAULT '  Model = "graphicsairfieldsfr_med.mgm";',
  `l13` varchar(200) DEFAULT '  Script = "LuaScriptsWorldObjectsfr_med.txt";',
  `af_Country` char(3) DEFAULT '102',
  `l14` char(16) DEFAULT '  Country = 102;',
  `l15` varchar(200) DEFAULT '  Desc = "";',
  `l16` varchar(200) DEFAULT '  Durability = 25000;',
  `l17` varchar(200) DEFAULT '  DamageReport = 50;',
  `l18` varchar(200) DEFAULT '  DamageThreshold = 1;',
  `l19` varchar(200) DEFAULT '  DeleteAfterDeath = 0;',
  `l20` varchar(200) DEFAULT '  ReturnPlanes = 0;',
  `l21` varchar(200) DEFAULT '  Hydrodrome = 0;',
  `l22` varchar(200) DEFAULT '  RepairFriendlies = 0;',
  `l23` varchar(200) DEFAULT '  RearmFriendlies = 0;',
  `l24` varchar(200) DEFAULT '  RefuelFriendlies = 0;',
  `l25` varchar(200) DEFAULT '  RepairTime = 0;',
  `l26` varchar(200) DEFAULT '  RearmTime = 0;',
  `l27` varchar(200) DEFAULT '  RefuelTime = 0;',
  `l28` varchar(200) DEFAULT '  MaintenanceRadius = 1000;',
  `l29` varchar(200) DEFAULT '}',
  `l30` varchar(200) DEFAULT '',
  `l31` varchar(200) DEFAULT 'MCU_TR_Entity',
  `l32` varchar(200) DEFAULT '{',
  `mcu_Index` int(11) DEFAULT '2',
  `l33` varchar(200) DEFAULT '  Index = 2;',
  `l34` varchar(200) DEFAULT '  Name = "Outines entity";',
  `l35` varchar(200) DEFAULT '  Desc = "";',
  `l36` varchar(200) DEFAULT '  Targets = [];',
  `l37` varchar(200) DEFAULT '  Objects = [];',
  `l38` varchar(200) DEFAULT '  XPos = 100.000;',
  `l39` varchar(200) DEFAULT '  YPos = 0.000;',
  `l40` varchar(200) DEFAULT '  ZPos = 100.000;',
  `l41` varchar(200) DEFAULT '  XOri = 0.00;',
  `l42` varchar(200) DEFAULT '  YOri = 0.00;',
  `l43` varchar(200) DEFAULT '  ZOri = 0.00;',
  `af_Enabled` char(1) DEFAULT '1',
  `l44` varchar(200) DEFAULT '  Enabled = 1;',
  `l45` varchar(200) DEFAULT '  MisObjID = 1;',
  `l46` varchar(200) DEFAULT '}',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `mia_gunner` smallint(1) NOT NULL DEFAULT '50',
  `critical_w_gunner` smallint(1) NOT NULL DEFAULT '30',
  `serious_w_gunner` smallint(1) NOT NULL DEFAULT '20',
  `light_w_gunner` smallint(1) NOT NULL DEFAULT '10',
  `healthy` smallint(1) NOT NULL DEFAULT '0',
  `min_x` mediumint(1) NOT NULL DEFAULT '0',
  `min_z` mediumint(1) NOT NULL DEFAULT '0',
  `max_x` mediumint(9) NOT NULL DEFAULT '100000',
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `campaign` (`campaign`),
  UNIQUE KEY `camp_db` (`camp_db`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `campaign_settings`
--

INSERT INTO `campaign_settings` (`id`, `simulation`, `campaign`, `camp_db`, `camp_host`, `camp_user`, `camp_passwd`, `map`, `map_locations`, `status`, `show_airfield`, `finish_flight_only_landed`, `logpath`, `log_prefix`, `logfile`, `kia_pilot`, `mia_pilot`, `critical_w_pilot`, `serious_w_pilot`, `light_w_pilot`, `kia_gunner`, `mia_gunner`, `critical_w_gunner`, `serious_w_gunner`, `light_w_gunner`, `healthy`, `min_x`, `min_z`, `max_x`, `max_z`, `air_detect_distance`, `ground_detect_distance`, `air_ai_level`, `ground_ai_level`, `ground_max_speed_kmh`, `ground_transport_speed_kmh`, `ground_spacing`, `lineup_minutes`, `mission_minutes`) VALUES
(1, 'RoF', 'Bloody April', 'bloody_april', 'localhost', 'rofwar', 'rofwar', 'Western Front', 'rof_westernfront_locations', '2', 'true', 'true', 'logs', 'missionReportBloodyAprilMission', 'missionReportBloodyAprilMission1', 100, 50, 30, 20, 10, 50, 50, 30, 20, 10, 0, 0, 0, 100000, 100000, 5000, 500, '2', '2', 50, 10, 5, 30, 90);

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
(4, 'moving units'),
(5, 'planning'),
(6, 'built'),
(7, 'analyzing'),
(8, 'scored');

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
-- Table structure for table `rof_airfields`
--

DROP TABLE IF EXISTS `rof_airfields`;
CREATE TABLE IF NOT EXISTS `rof_airfields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `l1` char(8) DEFAULT 'Airfield',
  `l2` char(1) DEFAULT '{',
  `af_Name` varchar(80) DEFAULT 'Airfield with no name',
  `l3` varchar(200) DEFAULT '  Name = "Airfield with no name";',
  `af_Index` int(11) DEFAULT '1',
  `l4` varchar(200) DEFAULT '  Index = 1;',
  `af_LinkTrid` int(11) DEFAULT '2',
  `l5` varchar(200) DEFAULT '  LinkTrid = 2;',
  `af_Xpos` decimal(12,3) DEFAULT '100.000',
  `l6` varchar(200) DEFAULT '  XPos = 100.000;',
  `af_Ypos` decimal(12,3) DEFAULT '0.000',
  `l7` varchar(200) DEFAULT '  YPos = 0.000;',
  `af_Zpos` decimal(12,3) DEFAULT '0.000',
  `l8` varchar(200) DEFAULT '  ZPos = 100.000;',
  `l9` varchar(200) DEFAULT '  XOri = 0.00;',
  `af_YOri` decimal(5,2) DEFAULT '0.00',
  `l10` varchar(200) DEFAULT '  YOri = 0.00;',
  `l11` varchar(200) DEFAULT '  ZOri = 0.00;',
  `l12` varchar(200) DEFAULT '  Model = "graphicsairfieldsfr_med.mgm";',
  `l13` varchar(200) DEFAULT '  Script = "LuaScriptsWorldObjectsfr_med.txt";',
  `af_Country` char(3) DEFAULT '102',
  `l14` char(16) DEFAULT '  Country = 102;',
  `l15` varchar(200) DEFAULT '  Desc = "";',
  `l16` varchar(200) DEFAULT '  Durability = 25000;',
  `l17` varchar(200) DEFAULT '  DamageReport = 50;',
  `l18` varchar(200) DEFAULT '  DamageThreshold = 1;',
  `l19` varchar(200) DEFAULT '  DeleteAfterDeath = 0;',
  `l20` varchar(200) DEFAULT '  ReturnPlanes = 0;',
  `l21` varchar(200) DEFAULT '  Hydrodrome = 0;',
  `l22` varchar(200) DEFAULT '  RepairFriendlies = 0;',
  `l23` varchar(200) DEFAULT '  RearmFriendlies = 0;',
  `l24` varchar(200) DEFAULT '  RefuelFriendlies = 0;',
  `l25` varchar(200) DEFAULT '  RepairTime = 0;',
  `l26` varchar(200) DEFAULT '  RearmTime = 0;',
  `l27` varchar(200) DEFAULT '  RefuelTime = 0;',
  `l28` varchar(200) DEFAULT '  MaintenanceRadius = 1000;',
  `l29` varchar(200) DEFAULT '}',
  `l30` varchar(200) DEFAULT '',
  `l31` varchar(200) DEFAULT 'MCU_TR_Entity',
  `l32` varchar(200) DEFAULT '{',
  `mcu_Index` int(11) DEFAULT '2',
  `l33` varchar(200) DEFAULT '  Index = 2;',
  `l34` varchar(200) DEFAULT '  Name = "Outines entity";',
  `l35` varchar(200) DEFAULT '  Desc = "";',
  `l36` varchar(200) DEFAULT '  Targets = [];',
  `l37` varchar(200) DEFAULT '  Objects = [];',
  `l38` varchar(200) DEFAULT '  XPos = 100.000;',
  `l39` varchar(200) DEFAULT '  YPos = 0.000;',
  `l40` varchar(200) DEFAULT '  ZPos = 100.000;',
  `l41` varchar(200) DEFAULT '  XOri = 0.00;',
  `l42` varchar(200) DEFAULT '  YOri = 0.00;',
  `l43` varchar(200) DEFAULT '  ZOri = 0.00;',
  `af_Enabled` char(1) DEFAULT '1',
  `l44` varchar(200) DEFAULT '  Enabled = 1;',
  `l45` varchar(200) DEFAULT '  MisObjID = 1;',
  `l46` varchar(200) DEFAULT '}',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `rof_airfields`
--

INSERT INTO `rof_airfields` (`id`, `l1`, `l2`, `af_Name`, `l3`, `af_Index`, `l4`, `af_LinkTrid`, `l5`, `af_Xpos`, `l6`, `af_Ypos`, `l7`, `af_Zpos`, `l8`, `l9`, `af_YOri`, `l10`, `l11`, `l12`, `l13`, `af_Country`, `l14`, `l15`, `l16`, `l17`, `l18`, `l19`, `l20`, `l21`, `l22`, `l23`, `l24`, `l25`, `l26`, `l27`, `l28`, `l29`, `l30`, `l31`, `l32`, `mcu_Index`, `l33`, `l34`, `l35`, `l36`, `l37`, `l38`, `l39`, `l40`, `l41`, `l42`, `l43`, `af_Enabled`, `l44`, `l45`, `l46`) VALUES
(1, 'Airfield', '{', 'Coxyde', '  Name = "Airfield with no name";', 1, '  Index = 1;', 2, '  LinkTrid = 2;', '100.000', '  XPos = 100.000;', '0.000', '  YPos = 0.000;', '0.000', '  ZPos = 100.000;', '  XOri = 0.00;', '0.00', '  YOri = 0.00;', '  ZOri = 0.00;', '  Model = "graphicsairfieldsfr_med.mgm";', '  Script = "LuaScriptsWorldObjectsfr_med.txt";', '102', '  Country = 102;', '  Desc = "";', '  Durability = 25000;', '  DamageReport = 50;', '  DamageThreshold = 1;', '  DeleteAfterDeath = 0;', '  ReturnPlanes = 0;', '  Hydrodrome = 0;', '  RepairFriendlies = 0;', '  RearmFriendlies = 0;', '  RefuelFriendlies = 0;', '  RepairTime = 0;', '  RearmTime = 0;', '  RefuelTime = 0;', '  MaintenanceRadius = 1000;', '}', '', 'MCU_TR_Entity', '{', 2, '  Index = 2;', '  Name = "Outines entity";', '  Desc = "";', '  Targets = [];', '  Objects = [];', '  XPos = 100.000;', '  YPos = 0.000;', '  ZPos = 100.000;', '  XOri = 0.00;', '  YOri = 0.00;', '  ZOri = 0.00;', '1', '  Enabled = 1;', '  MisObjID = 1;', '}'),
(2, 'Airfield', '{', 'Dunkerque', '  Name = "Airfield with no name";', 1, '  Index = 1;', 2, '  LinkTrid = 2;', '100.000', '  XPos = 100.000;', '0.000', '  YPos = 0.000;', '0.000', '  ZPos = 100.000;', '  XOri = 0.00;', '0.00', '  YOri = 0.00;', '  ZOri = 0.00;', '  Model = "graphicsairfieldsfr_med.mgm";', '  Script = "LuaScriptsWorldObjectsfr_med.txt";', '102', '  Country = 102;', '  Desc = "";', '  Durability = 25000;', '  DamageReport = 50;', '  DamageThreshold = 1;', '  DeleteAfterDeath = 0;', '  ReturnPlanes = 0;', '  Hydrodrome = 0;', '  RepairFriendlies = 0;', '  RearmFriendlies = 0;', '  RefuelFriendlies = 0;', '  RepairTime = 0;', '  RearmTime = 0;', '  RefuelTime = 0;', '  MaintenanceRadius = 1000;', '}', '', 'MCU_TR_Entity', '{', 2, '  Index = 2;', '  Name = "Outines entity";', '  Desc = "";', '  Targets = [];', '  Objects = [];', '  XPos = 100.000;', '  YPos = 0.000;', '  ZPos = 100.000;', '  XOri = 0.00;', '  YOri = 0.00;', '  ZOri = 0.00;', '1', '  Enabled = 1;', '  MisObjID = 1;', '}'),
(3, 'Airfield', '{', 'Harlebeeke', '  Name = "Airfield with no name";', 1, '  Index = 1;', 2, '  LinkTrid = 2;', '100.000', '  XPos = 100.000;', '0.000', '  YPos = 0.000;', '0.000', '  ZPos = 100.000;', '  XOri = 0.00;', '0.00', '  YOri = 0.00;', '  ZOri = 0.00;', '  Model = "graphicsairfieldsfr_med.mgm";', '  Script = "LuaScriptsWorldObjectsfr_med.txt";', '102', '  Country = 102;', '  Desc = "";', '  Durability = 25000;', '  DamageReport = 50;', '  DamageThreshold = 1;', '  DeleteAfterDeath = 0;', '  ReturnPlanes = 0;', '  Hydrodrome = 0;', '  RepairFriendlies = 0;', '  RearmFriendlies = 0;', '  RefuelFriendlies = 0;', '  RepairTime = 0;', '  RearmTime = 0;', '  RefuelTime = 0;', '  MaintenanceRadius = 1000;', '}', '', 'MCU_TR_Entity', '{', 2, '  Index = 2;', '  Name = "Outines entity";', '  Desc = "";', '  Targets = [];', '  Objects = [];', '  XPos = 100.000;', '  YPos = 0.000;', '  ZPos = 100.000;', '  XOri = 0.00;', '  YOri = 0.00;', '  ZOri = 0.00;', '1', '  Enabled = 1;', '  MisObjID = 1;', '}'),
(4, 'Airfield', '{', 'Leffinghe', '  Name = "Airfield with no name";', 1, '  Index = 1;', 2, '  LinkTrid = 2;', '100.000', '  XPos = 100.000;', '0.000', '  YPos = 0.000;', '0.000', '  ZPos = 100.000;', '  XOri = 0.00;', '0.00', '  YOri = 0.00;', '  ZOri = 0.00;', '  Model = "graphicsairfieldsfr_med.mgm";', '  Script = "LuaScriptsWorldObjectsfr_med.txt";', '102', '  Country = 102;', '  Desc = "";', '  Durability = 25000;', '  DamageReport = 50;', '  DamageThreshold = 1;', '  DeleteAfterDeath = 0;', '  ReturnPlanes = 0;', '  Hydrodrome = 0;', '  RepairFriendlies = 0;', '  RearmFriendlies = 0;', '  RefuelFriendlies = 0;', '  RepairTime = 0;', '  RearmTime = 0;', '  RefuelTime = 0;', '  MaintenanceRadius = 1000;', '}', '', 'MCU_TR_Entity', '{', 2, '  Index = 2;', '  Name = "Outines entity";', '  Desc = "";', '  Targets = [];', '  Objects = [];', '  XPos = 100.000;', '  YPos = 0.000;', '  ZPos = 100.000;', '  XOri = 0.00;', '  YOri = 0.00;', '  ZOri = 0.00;', '1', '  Enabled = 1;', '  MisObjID = 1;', '}'),
(5, 'Airfield', '{', 'St. Marie Cappel', '  Name = "Airfield with no name";', 1, '  Index = 1;', 2, '  LinkTrid = 2;', '100.000', '  XPos = 100.000;', '0.000', '  YPos = 0.000;', '0.000', '  ZPos = 100.000;', '  XOri = 0.00;', '0.00', '  YOri = 0.00;', '  ZOri = 0.00;', '  Model = "graphicsairfieldsfr_med.mgm";', '  Script = "LuaScriptsWorldObjectsfr_med.txt";', '102', '  Country = 102;', '  Desc = "";', '  Durability = 25000;', '  DamageReport = 50;', '  DamageThreshold = 1;', '  DeleteAfterDeath = 0;', '  ReturnPlanes = 0;', '  Hydrodrome = 0;', '  RepairFriendlies = 0;', '  RearmFriendlies = 0;', '  RefuelFriendlies = 0;', '  RepairTime = 0;', '  RearmTime = 0;', '  RefuelTime = 0;', '  MaintenanceRadius = 1000;', '}', '', 'MCU_TR_Entity', '{', 2, '  Index = 2;', '  Name = "Outines entity";', '  Desc = "";', '  Targets = [];', '  Objects = [];', '  XPos = 100.000;', '  YPos = 0.000;', '  ZPos = 100.000;', '  XOri = 0.00;', '  YOri = 0.00;', '  ZOri = 0.00;', '1', '  Enabled = 1;', '  MisObjID = 1;', '}'),
(6, 'Airfield', '{', 'Zeebrugge', '  Name = "Airfield with no name";', 1, '  Index = 1;', 2, '  LinkTrid = 2;', '100.000', '  XPos = 100.000;', '0.000', '  YPos = 0.000;', '0.000', '  ZPos = 100.000;', '  XOri = 0.00;', '0.00', '  YOri = 0.00;', '  ZOri = 0.00;', '  Model = "graphicsairfieldsfr_med.mgm";', '  Script = "LuaScriptsWorldObjectsfr_med.txt";', '102', '  Country = 102;', '  Desc = "";', '  Durability = 25000;', '  DamageReport = 50;', '  DamageThreshold = 1;', '  DeleteAfterDeath = 0;', '  ReturnPlanes = 0;', '  Hydrodrome = 0;', '  RepairFriendlies = 0;', '  RearmFriendlies = 0;', '  RefuelFriendlies = 0;', '  RepairTime = 0;', '  RearmTime = 0;', '  RefuelTime = 0;', '  MaintenanceRadius = 1000;', '}', '', 'MCU_TR_Entity', '{', 2, '  Index = 2;', '  Name = "Outines entity";', '  Desc = "";', '  Targets = [];', '  Objects = [];', '  XPos = 100.000;', '  YPos = 0.000;', '  ZPos = 100.000;', '  XOri = 0.00;', '  YOri = 0.00;', '  ZOri = 0.00;', '1', '  Enabled = 1;', '  MisObjID = 1;', '}');

-- --------------------------------------------------------

--
-- Table structure for table `rof_coalitions`
--

DROP TABLE IF EXISTS `rof_coalitions`;
CREATE TABLE IF NOT EXISTS `rof_coalitions` (
  `CoalID` tinyint(1) unsigned NOT NULL,
  `Coalitionname` varchar(40) NOT NULL,
  PRIMARY KEY (`CoalID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rof_coalitions`
--

INSERT INTO `rof_coalitions` (`CoalID`, `Coalitionname`) VALUES
(0, 'Neutral'),
(1, 'Entente'),
(2, 'Central Powers'),
(3, 'War Dogs'),
(4, 'Mercenaries'),
(5, 'Knights'),
(6, 'Corsairs'),
(7, 'Future');

-- --------------------------------------------------------

--
-- Table structure for table `rof_countries`
--

DROP TABLE IF EXISTS `rof_countries`;
CREATE TABLE IF NOT EXISTS `rof_countries` (
  `id` tinyint(1) unsigned NOT NULL,
  `ckey` smallint(1) unsigned NOT NULL,
  `countryname` varchar(30) NOT NULL,
  `countryadj` varchar(30) NOT NULL,
  `CoalID` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `countryname` (`countryname`),
  UNIQUE KEY `countryadj` (`countryadj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rof_countries`
--

INSERT INTO `rof_countries` (`id`, `ckey`, `countryname`, `countryadj`, `CoalID`) VALUES
(1, 0, 'Neutral', 'neutral', 0),
(2, 101, 'France', 'French', 1),
(3, 102, 'Great Britain', 'British', 1),
(4, 103, 'USA', 'American', 1),
(5, 104, 'Italy', 'Italian', 1),
(6, 105, 'Russia', 'Russian', 1),
(7, 501, 'Germany', 'German', 2),
(8, 502, 'Austro-Hungary', 'Austro-Hungarian', 2),
(9, 600, 'Future Country', 'Future', 3),
(10, 610, 'War Dogs Country', 'War Dogs', 4),
(11, 620, 'Mercenaries Country', 'Mercenaries', 5),
(12, 630, 'Knights Country', 'Knights', 6),
(13, 640, 'Corsairs Country', 'Corsairs', 7);

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
  `mgid` int(1) NOT NULL DEFAULT '0',
  `GunningFor` varchar(40) NOT NULL DEFAULT 'pilotname',
  `GunnerFate` tinyint(1) NOT NULL DEFAULT '0',
  `GunnerHealth` tinyint(1) NOT NULL DEFAULT '0',
  `GunnerNegScore` int(1) NOT NULL DEFAULT '0',
  `GunnerPosScore` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `object_type` (`object_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=241 ;

--
-- Dumping data for table `rof_object_properties`
--

INSERT INTO `rof_object_properties` (`id`, `object_type`, `object_class`, `object_value`, `object_desc`) VALUES
(1, '13PdrAAA', 'AAA', 80, '13-pounder AAA'),
(2, '13PrdaaaAttached', 'AAA', 80, '13-pounder AAA'),
(3, '45QF', 'ART', 100, '4.5 in. Quick Fire artillery'),
(4, '75FG1897', 'ART', 100, '75mm M1897 artillery'),
(5, '77mmAAA', 'AAA', 80, '77mm AAA'),
(6, '77mmAAAAttached', 'AAA', 80, '77mm AAA'),
(7, 'A7V', 'T', 100, 'A7V tank'),
(8, 'AeType', 'BAL', 50, 'Type Ae observation balloon'),
(9, 'Airco D.H.2', 'PFI', 100, 'Airco D.H.2'),
(10, 'Airco D.H.4', 'PRE', 200, 'Airco D.H.4'),
(11, 'Albatros D.II', 'PFI', 100, 'Albatros D.II'),
(12, 'Albatros D.II lt', 'PFI', 100, 'Albatros D.II lt'),
(13, 'Albatros D.III', 'PFI', 100, 'Albatros D.III'),
(14, 'Albatros D.Va', 'PFI', 100, 'Albatros D.Va'),
(15, 'Benz Searchlight', 'VTR', 50, 'Benz Cargo truck with searchlight'),
(16, 'benz_open', 'VTR', 50, 'Benz Cargo open truck'),
(18, 'benz_soft', 'VTR', 50, 'Benz Cargo covered truck'),
(19, 'BotBoatSwain', 'BOT', 0, 'bosun'),
(21, 'BotGunnerBacker', 'BOT', 0, 'Becker gunner'),
(22, 'BotGunnerBreguet14', 'BOT', 0, 'gunner'),
(24, 'BotGunnerBW12', 'BOT', 0, 'Brandenburg W12 gunner'),
(25, 'BotGunnerDavis', 'BOT', 0, 'Davis gunner'),
(26, 'BotGunnerFe2_sing', 'BOT', 0, 'F.E.2b gunner'),
(27, 'BotGunnerFelix_top-twin', 'BOT', 0, 'Felixstowe F.2A top gunner'),
(28, 'BotGunnerG5_1', 'BOT', 0, 'gunner'),
(29, 'BotGunnerG5_2', 'BOT', 0, 'gunner'),
(30, 'BotGunnerHCL2', 'BOT', 0, 'Halberstadt Cl.II gunner'),
(31, 'BotGunnerHP400_1', 'BOT', 0, 'nose gunner'),
(32, 'BotGunnerHP400_2', 'BOT', 0, 'Handley Page 0/400 dorsal gunner'),
(33, 'BotGunnerHP400_2_WM', 'BOT', 0, 'Handley Page O/400 dorsal gunner'),
(34, 'BotGunnerHP400_3', 'BOT', 0, 'Handley Page O/400 belly gunner'),
(35, 'BotGunnerRE8', 'BOT', 0, 'gunner'),
(36, 'Brandenburg W12', 'PSE', 200, 'Brandenburg W12'),
(37, 'Breguet 14.B2', 'PRE', 200, 'Breguet 14.B2'),
(38, 'bridge_hw110', 'INF', 0, '110m road bridge'),
(39, 'bridge_hw130', 'INF', 0, '130m road bridge'),
(40, 'bridge_hw150', 'INF', 0, '150m road bridge'),
(41, 'bridge_hw170', 'INF', 0, '170m road bridge'),
(42, 'bridge_hw190', 'INF', 0, '190m road bridge'),
(43, 'bridge_hw40', 'INF', 0, '40m road bridge'),
(44, 'bridge_hw70', 'INF', 0, '70m road bridge'),
(45, 'bridge_hw90', 'INF', 0, '90m road bridge'),
(46, 'bridge_rr110', 'INF', 0, '110m rail bridge'),
(47, 'bridge_rr130', 'INF', 0, '130m rail bridge'),
(48, 'bridge_rr150', 'INF', 0, '150m rail bridge'),
(49, 'bridge_rr170', 'INF', 0, '170m rail bridge'),
(50, 'bridge_rr190', 'INF', 0, '190m rail bridge'),
(51, 'bridge_rr70', 'INF', 0, '70m rail bridge'),
(52, 'bridge_rr90', 'INF', 0, '90m rail bridge'),
(53, 'Bristol F2B (F.II)', 'PRE', 200, 'Bristol F2B (F.II)'),
(54, 'Bristol F2B (F.III)', 'PRE', 200, 'Bristol F2B (F.III)'),
(55, 'British naval 12pdr gun', 'NAR', 0, 'naval 12-pounder gun'),
(56, 'British naval 4in AAA gun', 'NAA', 80, '4in naval AAA gun'),
(57, 'British naval 4in gun', 'NAR', 0, 'naval 4in gun'),
(58, 'British navel 6in gun', 'NAR', 0, 'naval 6in gun'),
(59, 'Ca1', 'T', 100, 'Schneider CA1 tank'),
(60, 'CappyChateau', 'INF', 0, 'Cappy Chateau'),
(61, 'Caquot', 'BAL', 50, 'Caquot Type R observation balloon'),
(62, 'Cargo Ship', 'STR', 300, 'cargo ship'),
(63, 'churchE_01', 'INF', 0, 'church'),
(64, 'Common Bot', 'HUM', 0, 'pilot'),
(65, 'Crossley', 'VTR', 50, 'Crossley 4X2 Staff Car'),
(66, 'DaimlerAAA', 'VAA', 80, '77mm AAA on Daimler truck'),
(67, 'DaimlerMarienfelde', 'VTR', 50, 'Daimler Marienfelde truck'),
(68, 'DaimlerMarienfelde_S', 'VTR', 50, 'Daimler Marienfelde truck'),
(69, 'DFW C.V', 'PRE', 200, 'DFW.C.V'),
(70, 'Drachen', 'BAL', 50, 'Drachen type observation balloon'),
(71, 'F.E.2b', 'PRE', 200, 'F.E.2b'),
(72, 'F17M', 'T', 100, 'Renault FT17 machine gun tank'),
(73, 'factory_01', 'INF', 0, 'factory'),
(74, 'factory_02', 'INF', 0, 'factory'),
(75, 'factory_03', 'INF', 0, 'factory'),
(76, 'factory_04', 'INF', 0, 'factory'),
(77, 'factory_05', 'INF', 0, 'factory'),
(78, 'factory_06', 'INF', 0, 'factory'),
(79, 'factory_07', 'INF', 0, 'factory'),
(80, 'factory_08', 'INF', 0, 'factory'),
(81, 'Felixstowe F2A', 'PSE', 200, 'Felixstowe F2A'),
(82, 'FK96', 'ART', 100, 'Feldkanone 96 77mm artillery'),
(83, 'Flag', 'FLG', 0, 'flag'),
(84, 'Fokker D.VII', 'PFI', 100, 'Fokker D.VII'),
(85, 'Fokker D.VIIF', 'PFI', 100, 'Fokker D.VIIF'),
(86, 'Fokker D.VIII', 'PFI', 100, 'Fokker D.VIII'),
(87, 'Fokker Dr.I', 'PFI', 100, 'Fokker Dr.I'),
(88, 'Fokker E.III', 'PFI', 100, 'Fokker E.III'),
(89, 'FRpenicheAAA', 'SAA', 80, 'peniche AAA barge'),
(90, 'fr_lrg', 'INF', 0, 'airfield'),
(91, 'fr_med', 'INF', 0, 'airfield'),
(92, 'FT17C', 'T', 100, 'Renault FT17 cannon tank'),
(93, 'G8', 'RLO', 50, 'locomotive'),
(94, 'GBR Searchlight', 'LGT', 50, 'searchlight'),
(95, 'GER light cruiser', 'SCR', 1000, 'light cruiser'),
(96, 'GER Ship Searchlight', 'LGT', 50, 'ship searchlight'),
(97, 'GER submarine', 'SSU', 500, 'U-boat'),
(98, 'German naval 105mm gun', 'NAR', 0, 'naval 105mm gun'),
(99, 'German naval 52mm gun', 'NAR', 0, 'naval 52mm gun'),
(100, 'GERpenicheAAA', 'SAA', 80, 'peniche AAA barge'),
(101, 'ger_lrg', 'INF', 0, 'airfield'),
(102, 'ger_med', 'INF', 0, 'airfield'),
(103, 'Gotha G.V', 'PBO', 200, 'Gotha G.V'),
(104, 'gunpos01', 'INF', 0, 'gun position'),
(105, 'gunpos_g01', 'INF', 0, 'gun position'),
(106, 'Halberstadt CL.II', 'PRE', 200, 'Halberstadt CL.II'),
(107, 'Halberstadt CL.II 200hp', 'PRE', 200, 'Halberstadt CL.II 200hp'),
(108, 'Halberstadt D.II', 'PFI', 100, 'Halberstadt D.II'),
(109, 'Handley Page 0-400', 'PBO', 200, 'Handley Page O/400'),
(110, 'HMS light cruiser', 'SCR', 1000, 'light cruiser'),
(111, 'HMS Ship Searchlight', 'LGT', 50, 'ship searchlight'),
(112, 'HMS submarine', 'SSU', 500, 'submarine'),
(113, 'Hotchkiss', 'IMG', 50, 'Hotchkiss machine gun'),
(114, 'HotchkissAAA', 'IMA', 80, 'anti-aircraft Hotchkiss machine gun'),
(115, 'Leyland', 'VTR', 50, 'Leyland 3-tonner truck'),
(116, 'LeylandS', 'VTR', 50, 'Leyland 3-tonner truck'),
(117, 'LMG08AAA', 'IMA', 80, 'anti-aircraft Maxim machine gun'),
(118, 'LMGO8', 'IMG', 50, 'Maxim machine gun'),
(119, 'M-Flak', 'IMA', 80, '37mm automatic flak gun'),
(120, 'm13', 'ART', 100, '15cm schweres Feldhaubitze M13 Lang'),
(121, 'Merc22', 'VTR', 50, 'Mercedes 22 Staff Car'),
(122, 'Mk4F', 'T', 100, 'Mk IV Female tank'),
(123, 'Mk4FGER', 'T', 100, 'Mk IV Female tank'),
(124, 'Mk4M', 'T', 100, 'Mk IV Male tank'),
(125, 'MK4MGER', 'T', 100, 'Mk IV Male tank'),
(126, 'Mk5F', 'T', 100, 'Mk V Female tank'),
(127, 'Mk5M', 'T', 100, 'Mk V Male tank'),
(128, 'Nieuport 11.C1', 'PFI', 100, 'Nieuport 11.C1'),
(129, 'Nieuport 17.C1', 'PFI', 100, 'Nieuport 17.C1'),
(130, 'Nieuport 17.C1 GBR', 'PFI', 100, 'Nieuport 17.C1 GBR'),
(131, 'Nieuport 28.C1', 'PFI', 100, 'Nieuport 28.C1'),
(132, 'Parseval', 'BAL', 50, 'Parseval-Sigsfeld kite balloon'),
(133, 'Passenger Ship', 'SPA', 300, 'passenger ship'),
(134, 'Pfalz D.IIIa', 'PFI', 100, 'Pfalz D.IIIa'),
(135, 'Pfalz D.XII', 'PFI', 100, 'Pfalz D.XII'),
(136, 'pillbox01', 'INF', 0, 'pillbox'),
(137, 'pillbox02', 'INF', 0, 'pillbox'),
(138, 'pillbox03', 'INF', 0, 'pillbox'),
(139, 'pillbox04', 'INF', 0, 'pillbox'),
(140, 'Portal', 'INF', 0, 'pillbox'),
(141, 'Quad', 'VTR', 50, 'Jeffery Quad Portee open truck'),
(142, 'Quad Searchlight', 'VTR', 50, 'Jeffery Quad Portee with searchlight'),
(143, 'QuadA', 'VTR', -50, 'Jeffery Quad Portee closed truck'),
(144, 'R.E.8', 'PRE', 200, 'R.E.8'),
(145, 'railwaystation_1', 'INF', 0, 'railway station'),
(146, 'railwaystation_2', 'INF', 0, 'railway station'),
(147, 'railwaystation_3', 'INF', 0, 'railway station'),
(148, 'railwaystation_4', 'INF', 0, 'railway station'),
(149, 'railwaystation_5', 'INF', 0, 'railway station'),
(150, 'river_airbase', 'INF', 0, 'seaplane pier'),
(151, 'river_airbase2', 'INF', 0, 'seaplane pier'),
(152, 'river_airbase3', 'INF', 0, 'seaplane pier'),
(153, 'Roland C.IIa', 'PRE', 200, 'Roland C.IIa'),
(154, 'Roucourt', 'INF', 0, 'airfield'),
(155, 'rwstation', 'INF', 0, 'railway station'),
(156, 'S.E.5a', 'PFI', 100, 'S.E.5a'),
(157, 'ship_stat_cargo', 'STR', 150, 'stationary cargo ship'),
(158, 'ship_stat_pass', 'SPA', 150, 'stationary passenger ship'),
(159, 'ship_stat_tank', 'STR', 150, 'stationary tanker ship'),
(160, 'Sopwith Camel', 'PFI', 100, 'Sopwith Camel'),
(161, 'Sopwith Dolphin', 'PFI', 100, 'Sopwith Dolphin'),
(162, 'Sopwith Pup', 'PFI', 100, 'Sopwith Pup'),
(163, 'Sopwith Triplane', 'PFI', 100, 'Sopwith Triplane'),
(164, 'SPAD 13.C1', 'PFI', 100, 'SPAD 13.C1'),
(165, 'SPAD 7.C1 150hp', 'PFI', 100, 'SPAD 7.C1 150hp'),
(166, 'SPAD 7.C1 180hp', 'PFI', 100, 'SPAD 7.C1 180hp'),
(167, 'StChamond', 'T', 100, 'Saint-Chamond tank'),
(168, 'Tanker Ship', 'STR', 300, 'tanker ship'),
(169, 'tent01', 'INF', 1000, 'the HQ tent'),
(170, 'tent02', 'INF', 0, 'tent'),
(171, 'tent03', 'INF', 0, 'tent'),
(172, 'tent_camp01', 'INF', 0, 'tent emcampment'),
(173, 'tent_camp02', 'INF', 0, 'tent encampment'),
(174, 'tent_camp03', 'INF', 0, 'tent encampment'),
(175, 'tent_camp04', 'INF', 0, 'tent encampment'),
(176, 'thornycroftaaa', 'VAA', 80, '13-pounder AAA on Thornycraft truck'),
(177, 'TurretBreguet14_1', 'TUR', 0, 'gunner'),
(178, 'TurretBristolF2BF2_1_WM2', 'TUR', 0, 'Bristol F2.B gunner'),
(179, 'TurretBristolF2BF3_1_WM2', 'TUR', 0, 'Bristol F2.B gunner'),
(180, 'TurretBristolF2B_1', 'TUR', 0, 'Bristol F2.B gunner'),
(181, 'TurretBW12_1', 'TUR', 0, 'Brandenburg W12 gunner'),
(182, 'TurretBW12_1_WM_Becker_AP', 'TUR', 0, 'Brandenburg W12 gunner'),
(183, 'TurretBW12_1_WM_Becker_HE', 'TUR', 0, 'Brandenburg W12 gunner'),
(184, 'TurretBW12_1_WM_Becker_HEAP', 'TUR', 0, 'Brandenburg W12 gunner'),
(185, 'TurretBW12_1_WM_Twin_Parabellum', 'TUR', 0, 'Brandenburg W12 gunner'),
(186, 'TurretDFWC_1', 'TUR', 0, 'DFW C.V gunner'),
(187, 'TurretDFWC_1_WM_Becker_AP', 'TUR', 0, 'DFW C.V gunner'),
(188, 'TurretDFWC_1_WM_Becker_HE', 'TUR', 0, 'DFW C.V gunner'),
(189, 'TurretDFWC_1_WM_Becker_HEAP', 'TUR', 0, 'DFW C.V gunner'),
(190, 'TurretDFWC_1_WM_Twin_Parabellum', 'TUR', 0, 'DFW C.V gunner'),
(191, 'TurretDH4_1', 'TUR', 0, 'D.H.4 gunner'),
(192, 'TurretDH4_1_WM', 'TUR', 0, 'D.H.4 gunner'),
(193, 'TurretFe2b_1', 'TUR', 0, 'F.E.2b gunner'),
(194, 'TurretFe2b_1_WM', 'TUR', 0, 'F.E.2b gunner'),
(195, 'TurretFelixF2A_2', 'TUR', 0, 'Felixstowe F.2A gunner'),
(196, 'TurretFelixF2A_3', 'TUR', 0, 'Felixstowe F.2A gunner'),
(197, 'TurretFelixF2A_3_WM', 'TUR', 0, 'Felixstowe F.2A gunner'),
(198, 'TurretGothaG5_1', 'TUR', 0, 'Gotha G.V nose gunner'),
(199, 'TurretGothaG5_1_WM_Becker_AP', 'TUR', 0, 'Gotha G.V nose gunner'),
(200, 'TurretGothaG5_1_WM_Becker_HE', 'TUR', 0, 'Gotha G.V nose gunner'),
(201, 'TurretGothaG5_1_WM_Becker_HEAP', 'TUR', 0, 'Gotha G.V nose gunner'),
(202, 'TurretGothaG5_2', 'TUR', 0, 'rear gunner'),
(203, 'TurretGothaG5_2_WM_Twin_Parabellum', 'TUR', 0, 'rear gunner'),
(204, 'TurretHalberstadtCL2au_1', 'TUR', 0, 'Halberstadt CL.II gunner'),
(205, 'TurretHalberstadtCL2au_1_WM_TwinPar', 'TUR', 0, 'Halberstadt CL.II gunner'),
(206, 'TurretHalberstadtCL2_1', 'TUR', 0, 'Halberstadt CL.II gunner'),
(207, 'TurretHalberstadtCL2_1_WM_TwinPar', 'TUR', 0, 'Halberstadt CL.II gunner'),
(208, 'TurretHP400_1', 'TUR', 0, 'Handley Page O/400 nose gunner'),
(209, 'TurretHP400_1_WM', 'TUR', 0, 'Handley Page O/400 nose gunner'),
(210, 'TurretHP400_2', 'TUR', 0, 'Handley Page O/400 dorsal gunner'),
(211, 'TurretHP400_2_WM', 'TUR', 0, 'Handley Page O/400 dorsal gunner'),
(212, 'TurretHP400_3', 'TUR', 0, 'Handley Page O/400 belly gunner'),
(213, 'TurretRE8_1', 'TUR', 0, 'R.E.8 gunner'),
(214, 'TurretRE8_1_WM2', 'TUR', 0, 'R.E.8 gunner'),
(215, 'TurretRolandC2a_1', 'TUR', 0, 'Roland C.IIa gunner'),
(216, 'TurretRolandC2a_1_WM_TwinPar', 'TUR', 0, 'Roland C.IIa gunner'),
(217, 'Wagon_BoxB', 'RWA', 25, 'boxcar'),
(218, 'Wagon_BoxNB', 'RWA', 25, 'boxcar'),
(219, 'Wagon_G8T', 'RWA', 25, 'tender'),
(220, 'Wagon_GondolaB', 'RWA', 25, 'covered gondola'),
(221, 'Wagon_GondolaNB', 'RWA', 25, 'covered gondola'),
(222, 'Wagon_Pass', 'RWA', 25, 'passenger railcar'),
(223, 'Wagon_PassA', 'RWA', -25, 'hospital railcar'),
(224, 'Wagon_PassAC', 'RWA', 25, 'hospital railcar'),
(225, 'Wagon_PassC', 'RWA', 25, 'passenger railcar'),
(226, 'Wagon_PlatformA7V', 'RWA', 25, 'loaded flatcar'),
(227, 'Wagon_PlatformB', 'RWA', 25, 'loaded flatcar'),
(228, 'Wagon_PlatformEmptyB', 'RWA', 25, 'empty flatcar'),
(229, 'Wagon_PlatformEmptyNB', 'RWA', 25, 'empty flatcar'),
(230, 'Wagon_PlatformMk4', 'RWA', 25, 'loaded flatcar'),
(231, 'Wagon_PlatformNB', 'RWA', 25, 'loaded flatcar'),
(232, 'Wagon_TankB', 'RWA', 25, 'tank railcar'),
(233, 'Wagon_TankNB', 'RWA', 25, 'tank railcar'),
(234, 'Whippet', 'T', 100, 'Whippet Mk A tank'),
(235, 'Windsock', 'FLG', 0, 'windsock'),
(240, 'Intrinsic', 'DNA', 0, 'Intrinsic');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=35 ;

--
-- Dumping data for table `rof_object_roles`
--

INSERT INTO `rof_object_roles` (`id`, `unit_class`, `role_description`) VALUES
(1, 'AAA', 'Artillery:Anti-Aircraft'),
(2, 'ART', 'Artillery'),
(3, 'BOT', 'Bot'),
(4, 'HUM', 'Human'),
(5, 'IMA', 'Infantry: MG AA'),
(6, 'IMG', 'Infantry:Machine Gun'),
(7, 'INF', 'Infrastructure'),
(8, 'NAA', 'Naval:Anti-Aircraft'),
(9, 'NAR', 'Naval:Artillery'),
(10, 'PBO', 'Plane:Bomber'),
(11, 'PFB', 'Plane:Fighter-Bomber'),
(12, 'PFI', 'Plane:Fighter'),
(13, 'PRE', 'Plane:Reconnaissance'),
(14, 'PSE', 'Plane:Seaplane'),
(15, 'PTR', 'Plane:Transport'),
(16, 'RAA', 'Rail:Anti-Aircraft'),
(17, 'RCV', 'Rail:Civil Train'),
(18, 'RLO', 'Rail:Locomotive'),
(19, 'RWA', 'Rail:Wagon'),
(20, 'SAA', 'Ship:Anti-Aircraft'),
(21, 'SBA', 'Ship:Battleship'),
(22, 'SCR', 'Ship:Cruiser'),
(23, 'SDE', 'Ship:Destroyer'),
(24, 'SPB', 'Ship:Patrol Boat'),
(25, 'SSU', 'Ship:Submarine'),
(26, 'T', 'Tank:Standard'),
(27, 'TAA', 'Tank:Anti-Aircraft'),
(28, 'TSP', 'Tank:Self-Propelled Gun'),
(29, 'TTD', 'Tank:Tank Destroyer'),
(30, 'TUR', 'Turret'),
(31, 'VAA', 'Vehicle:Anti-Aircraft'),
(32, 'VMI', 'Vehicle:Mech. Infantry'),
(33, 'VRI', 'Regular Infantry'),
(34, 'VTR', 'Vehicle:Transport');

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
  `mpid` smallint(1) NOT NULL DEFAULT '0',
  `PilotFate` tinyint(1) NOT NULL DEFAULT '0',
  `PilotHealth` tinyint(1) NOT NULL DEFAULT '0',
  `PilotNegScore` int(1) NOT NULL DEFAULT '0',
  `PilotPosScore` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rof_westernfront_locations`
--

DROP TABLE IF EXISTS `rof_westernfront_locations`;
CREATE TABLE IF NOT EXISTS `rof_westernfront_locations` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `LID` smallint(1) unsigned NOT NULL,
  `LX` int(1) NOT NULL,
  `LZ` int(1) NOT NULL,
  `LName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `LName` (`LName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=978 ;

--
-- Dumping data for table `rof_westernfront_locations`
--

INSERT INTO `rof_westernfront_locations` (`id`, `LID`, `LX`, `LZ`, `LName`) VALUES
(1, 51, 171499, 60879, 'Acheler'),
(2, 51, 174810, 2339, 'Airaines'),
(3, 20, 174691, 1413, 'Airaines'),
(4, 51, 261707, 6689, 'Alquines'),
(5, 20, 262184, 7244, 'Alquines'),
(6, 52, 214372, 114031, 'Alunoy'),
(7, 20, 214132, 113323, 'Alunoy'),
(8, 52, 97183, 267124, 'Amel-sur-l_Etand'),
(9, 50, 166758, 25191, 'Amiens'),
(10, 51, 214269, 94200, 'Aniche'),
(11, 10, 215063, 95436, 'Aniche'),
(12, 51, 95066, 108241, 'Arcy-Ste Restitue'),
(13, 20, 95448, 108874, 'Arcy-Ste Restitue'),
(14, 50, 209926, 59536, 'Arras'),
(15, 51, 168356, 64138, 'Assevillers'),
(16, 20, 167514, 64559, 'Assevillers'),
(17, 51, 236290, 37851, 'Auchel'),
(18, 10, 235812, 39102, 'Auchel'),
(19, 51, 130079, 30556, 'Aussonvillers'),
(20, 20, 130448, 29311, 'Aussonvillers'),
(21, 52, 145157, 133604, 'Autremencourt'),
(22, 20, 144922, 132525, 'Autremencourt'),
(23, 51, 70345, 197813, 'Auve'),
(24, 10, 69101, 197585, 'Auve'),
(25, 51, 205474, 102988, 'Avensnes-le-Sec'),
(26, 20, 205760, 103781, 'Avensnes-le-Sec'),
(27, 51, 195250, 96247, 'Awoingt'),
(28, 20, 195009, 96845, 'Awoingt'),
(29, 20, 176475, 41930, 'Braizieux'),
(30, 52, 145816, 65840, 'Balatre'),
(31, 20, 146157, 65455, 'Balatre,E Roye'),
(32, 10, 43793, 233539, 'Bar le Duc (Behonne)'),
(33, 51, 42383, 231978, 'Bar le Duc (Behonne)'),
(34, 52, 275598, 98680, 'Bavichove'),
(35, 20, 274915, 97750, 'Bavichove,N Courtrai'),
(36, 10, 50522, 128988, 'Baye'),
(37, 51, 51153, 130152, 'Baye'),
(38, 51, 246751, 71499, 'Beaucamp'),
(39, 20, 246720, 68859, 'Beaucamp'),
(40, 10, 114733, 7021, 'Beauvais'),
(41, 51, 116115, 8918, 'Beauvais'),
(42, 10, 118376, 11127, 'Beauvais, Tille'),
(43, 51, 119019, 10937, 'Beauvais, Tille'),
(44, 52, 193390, 103248, 'Beauvois,E Cambrai'),
(45, 20, 193615, 105295, 'Beauvois,E Cambrai'),
(46, 10, 62136, 233999, 'Beauze sur Aire'),
(47, 51, 62937, 234583, 'Beauze sur Aire'),
(48, 20, 97521, 268387, 'Bellevue Ferme'),
(49, 10, 51108, 241250, 'Belrain'),
(50, 51, 50158, 241089, 'Belrain'),
(51, 51, 277675, 29800, 'Bergues'),
(52, 10, 277105, 29559, 'Bergues Coudekerque'),
(53, 52, 168008, 82610, 'Bernes'),
(54, 20, 166956, 82212, 'Bernes'),
(55, 52, 232325, 89820, 'Bersee'),
(56, 20, 230226, 89300, 'Bersee,NW Douai'),
(57, 10, 174275, 25349, 'Bertangles'),
(58, 52, 187778, 107814, 'Bertry'),
(59, 20, 187565, 106843, 'Bertry 1'),
(60, 20, 186462, 109443, 'Bertry 2'),
(61, 52, 132891, 117129, 'Besny-et-Loisy'),
(62, 20, 132263, 118129, 'Besny-et-Loisy'),
(63, 52, 191700, 67851, 'Beugnatre'),
(64, 20, 191721, 68531, 'Beugnatre'),
(65, 10, 91548, 104794, 'Beugneux'),
(66, 51, 92722, 105066, 'Beugneux'),
(67, 10, 70681, 91675, 'Bezu'),
(68, 51, 69403, 91253, 'Bezu'),
(69, 51, 269328, 92231, 'Bisseghem'),
(70, 20, 268262, 94121, 'Bisseghem,Courtrai'),
(71, 20, 29773, 189370, 'Blaise'),
(72, 51, 30129, 190350, 'Blaise'),
(73, 20, 207081, 18316, 'Boffles'),
(74, 51, 207044, 18927, 'Boffles'),
(75, 51, 176550, 107912, 'Bohain'),
(76, 20, 176727, 107033, 'Bohain'),
(77, 52, 194357, 100599, 'Boistrancourt'),
(78, 20, 193755, 100912, 'Boistrancourt'),
(79, 51, 134865, 143383, 'Boncourt'),
(80, 20, 134977, 143902, 'Boncourt'),
(81, 10, 98452, 125309, 'Bonne Maisson'),
(82, 52, 144903, 78667, 'Bonneuil Ferme'),
(83, 20, 144689, 79053, 'Bonneuil Ferme'),
(84, 52, 175690, 91840, 'Bony'),
(85, 10, 176714, 91027, 'Bony'),
(86, 52, 166286, 78352, 'Bouvincourt'),
(87, 20, 165526, 79397, 'Bouvincourt'),
(88, 10, 76188, 173591, 'Bouy'),
(89, 52, 76087, 172712, 'Bouy'),
(90, 10, 80622, 230970, 'Brabant en Argonne'),
(91, 51, 80489, 230527, 'Brabant en Argonne'),
(92, 20, 49489, 218466, 'Brabant le Roi'),
(93, 51, 50162, 218187, 'Brabant le Roi'),
(94, 51, 177572, 41372, 'Braizieux'),
(95, 20, 281419, 34366, 'Bray Dunes'),
(96, 51, 281063, 35186, 'Bray Dunes'),
(97, 52, 84233, 105277, 'Brecy'),
(98, 20, 110397, 35096, 'Breuil le Sec'),
(99, 51, 108737, 34908, 'Breuil le Sec'),
(100, 51, 195348, 111161, 'Briastre'),
(101, 20, 196233, 110097, 'Briastre'),
(102, 52, 215146, 114151, 'Briquette'),
(103, 20, 232636, 43147, 'Bruay'),
(104, 51, 231954, 44458, 'Bruay'),
(105, 20, 223108, 31753, 'Bryas'),
(106, 51, 224190, 32118, 'Bryas'),
(107, 52, 199241, 71339, 'Bullecourt'),
(108, 52, 181919, 109501, 'Busigny'),
(109, 20, 183098, 107531, 'Busigny'),
(110, 20, 162373, 37345, 'Cachy'),
(111, 51, 161878, 38073, 'Cachy'),
(112, 20, 164462, 37712, 'Cachy-Bois I_Abbe'),
(113, 20, 198118, 97338, 'Cambrai'),
(114, 50, 197167, 92533, 'Cambrai'),
(115, 20, 30186, 160626, 'Camp de Mailly'),
(116, 51, 30407, 161307, 'Camp de Mailly'),
(117, 51, 235117, 77733, 'Camphin'),
(118, 51, 171272, 58840, 'Cappy'),
(119, 20, 170799, 59573, 'Cappy North'),
(120, 20, 168964, 59192, 'Cappy South'),
(121, 51, 137084, 231446, 'Carignan'),
(122, 20, 137834, 233609, 'Carignan'),
(123, 52, 197100, 97645, 'Cauroir'),
(124, 20, 48270, 172998, 'Cernon'),
(125, 51, 48854, 172398, 'Cernon'),
(126, 20, 267553, 98826, 'Ceune,Courtrai'),
(127, 20, 97879, 141542, 'Chalons sur Vesle'),
(128, 51, 98966, 141025, 'Chalons sur Vesle'),
(129, 52, 131800, 122191, 'Chambry'),
(130, 20, 134094, 121354, 'Chambry,Laon'),
(131, 20, 52692, 130459, 'Champaubert'),
(132, 51, 53163, 130988, 'Champaubert'),
(133, 20, 30447, 104207, 'Champcouelle'),
(134, 51, 29972, 104845, 'Champcouelle'),
(135, 52, 144459, 65834, 'Champien'),
(136, 20, 143015, 63843, 'Champien'),
(137, 20, 118533, 235591, 'Charmois,S Stenay'),
(138, 52, 108694, 226262, 'Chassonge Ferme'),
(139, 20, 107554, 226829, 'Chassonge Ferme,Stenay/Verdun'),
(140, 20, 67718, 106918, 'Chateau-Thierry'),
(141, 20, 64245, 60989, 'Chauconin'),
(142, 51, 64009, 62674, 'Chauconin'),
(143, 20, 100363, 94105, 'Chaudun'),
(144, 51, 139312, 118669, 'Chery-les-Pouilly'),
(145, 20, 140236, 118087, 'Chery-les-Pouilly,N'),
(146, 20, 139171, 119225, 'Chery-les-Pouilly,S'),
(147, 20, 264708, 27189, 'Clairmarais'),
(148, 51, 264211, 26843, 'Clairmarais'),
(149, 51, 149474, 91754, 'Clastres'),
(150, 20, 150478, 90255, 'Clastres'),
(151, 20, 85367, 103810, 'Coincy'),
(152, 51, 84803, 104164, 'Coincy'),
(153, 51, 86182, 283626, 'Conflans'),
(154, 20, 229095, 29568, 'Conteville'),
(155, 51, 228888, 28590, 'Conteville'),
(156, 51, 48798, 75780, 'Corbeville'),
(157, 20, 280249, 29009, 'Coudekerque'),
(158, 51, 279433, 28371, 'Coudekerque'),
(159, 20, 71241, 95352, 'Coupru'),
(160, 51, 70705, 94692, 'Coupru'),
(161, 51, 222782, 78350, 'Courcelles-les-Lens'),
(162, 20, 99943, 149839, 'Courcy'),
(163, 51, 101602, 148247, 'Courcy'),
(164, 20, 90854, 106702, 'Cramaille'),
(165, 52, 91259, 107513, 'Cramaille'),
(166, 20, 94353, 67635, 'Crapy en Valois'),
(167, 51, 92553, 67007, 'Crapy en Valois'),
(168, 51, 95895, 36960, 'Creil'),
(169, 20, 274423, 29343, 'Crochte'),
(170, 51, 274195, 28814, 'Crochte'),
(171, 52, 169106, 104710, 'Croix-Fonsommes'),
(172, 51, 273929, 96012, 'Cuerne'),
(173, 52, 141950, 134059, 'Cuirieux'),
(174, 20, 141451, 135501, 'Cuirieux,Laon'),
(175, 20, 63882, 31881, 'Dagny'),
(176, 51, 62887, 31730, 'Dagny'),
(177, 20, 31935, 287847, 'Dommartin les Toul'),
(178, 51, 31725, 288735, 'Dommartin les Toul'),
(179, 52, 83807, 287989, 'Doncourt'),
(180, 20, 82974, 288787, 'Doncourt'),
(181, 20, 220059, 78393, 'Douai'),
(182, 50, 219113, 81878, 'Douai'),
(183, 20, 251362, 8771, 'Drionville'),
(184, 51, 250554, 9078, 'Drionville'),
(185, 20, 274421, 46987, 'Droogland'),
(186, 52, 212274, 93546, 'Emerchicourt'),
(187, 20, 212233, 94101, 'Emerchicourt,S Aniche'),
(188, 51, 160883, 74628, 'Ennemain'),
(189, 20, 160580, 73975, 'Ennemain,N Nesle'),
(190, 20, 17007, 266492, 'Epiez'),
(191, 51, 16501, 268028, 'Epiez'),
(192, 52, 203942, 88196, 'Epinoy'),
(193, 20, 203364, 87321, 'Epinoy,NW Cambrai'),
(194, 20, 147803, 78653, 'Eppeville'),
(195, 52, 148532, 79720, 'Eppeville'),
(196, 51, 213043, 88041, 'Erchin'),
(197, 20, 214091, 89414, 'Erchin'),
(198, 20, 58409, 237347, 'Erize la Petite'),
(199, 51, 57439, 237476, 'Erize la Petite'),
(200, 51, 217821, 97711, 'Erre'),
(201, 20, 218963, 97099, 'Erre,Somain'),
(202, 52, 183804, 111652, 'Escaufort,Busigny'),
(203, 20, 184696, 111066, 'Escaufort,Busigny'),
(204, 20, 141030, 23414, 'Esquennoy'),
(205, 51, 140535, 22312, 'Esquennoy'),
(206, 52, 194281, 98069, 'Estourmel'),
(207, 20, 245594, 28055, 'Estree-Blanche'),
(208, 51, 244938, 28590, 'Estree-Blanche'),
(209, 52, 201770, 95059, 'Eswars'),
(210, 20, 202615, 93864, 'Eswars'),
(211, 51, 177008, 122782, 'Etreux'),
(212, 20, 175005, 121962, 'Etreux,Guise'),
(213, 20, 61871, 169623, 'Fagnieres'),
(214, 51, 61418, 171321, 'Fagnieres'),
(215, 51, 158355, 73475, 'Falvy Peronne'),
(216, 20, 158988, 73757, 'Falvy,Peronne'),
(217, 20, 117557, 20097, 'Fay St. Quentin'),
(218, 52, 116902, 20557, 'Fay St. Quentin'),
(219, 52, 219490, 97069, 'Fenain'),
(220, 52, 98098, 125686, 'Ferme Bonne Maison'),
(221, 20, 77103, 165582, 'Ferme d_Alger'),
(222, 52, 77102, 166079, 'Ferme d_Alger'),
(223, 20, 114841, 58726, 'Ferme de Corbeaulieu'),
(224, 52, 115026, 58326, 'Ferme de Corbeaulieu'),
(225, 20, 102995, 95181, 'Ferme Gravançon'),
(226, 52, 103170, 94828, 'Ferme Gravançon'),
(227, 52, 269717, 29364, 'Ferme Hoog Huys'),
(228, 20, 18625, 133727, 'Ferme Les Greves'),
(229, 52, 18808, 134387, 'Ferme Les Greves'),
(230, 20, 192255, 21029, 'Fienvillers'),
(231, 51, 192758, 21357, 'Fienvillers'),
(232, 20, 213151, 45638, 'Filescamp Ferme'),
(233, 52, 213103, 46161, 'Filescamp Ferme'),
(234, 51, 144524, 241791, 'Florenville'),
(235, 20, 144578, 242573, 'Florenville'),
(236, 20, 94006, 113177, 'Fonfry,N Fere-en-Tardenois'),
(237, 52, 166979, 103843, 'Fonsomme'),
(238, 20, 166715, 103434, 'Fonsomme'),
(239, 52, 164539, 106664, 'Fontaine Notre Dame'),
(240, 20, 162951, 105708, 'Fontaine Notre Dame'),
(241, 52, 168889, 102200, 'Fontaine-Uterte'),
(242, 20, 170656, 102904, 'Fontaine-Uterte'),
(243, 20, 155029, 82737, 'Foreste'),
(244, 52, 156432, 82559, 'Foreste'),
(245, 20, 161240, 58855, 'Foucaucourt en Santerre'),
(246, 20, 120454, 18025, 'Fouquerollers-Nord'),
(247, 20, 119057, 18367, 'Fouquerolles'),
(248, 51, 118986, 19054, 'Fouquerolles'),
(249, 20, 48619, 75149, 'Francheville sur Marne'),
(250, 52, 122074, 266762, 'Fresnois-la-Montagne'),
(251, 20, 74984, 229747, 'Froides'),
(252, 51, 74124, 229635, 'Froides'),
(253, 20, 21121, 303474, 'Frolois'),
(254, 51, 19893, 303827, 'Frolois'),
(255, 20, 280967, 36995, 'Frontier'),
(256, 51, 281393, 36580, 'Frontier'),
(257, 51, 190616, 22561, 'Gandas'),
(258, 10, 35469, 286739, 'Gengoult Toul'),
(259, 20, 228986, 141689, 'Ghlin,Mons'),
(260, 52, 86726, 286542, 'Giraumont'),
(261, 20, 87086, 287416, 'Giraumont'),
(262, 20, 64086, 224621, 'Giromancy'),
(263, 51, 64738, 225085, 'Giromancy'),
(264, 51, 61051, 212558, 'Givry-en-Argonne'),
(265, 51, 230287, 140144, 'Glin'),
(266, 52, 145116, 79926, 'Golancourt'),
(267, 52, 184273, 86793, 'Gonnelieu,Cambrai'),
(268, 20, 184751, 87024, 'Gonnelieu,Cambrai'),
(269, 20, 31486, 148887, 'Gourcancon'),
(270, 51, 32124, 148429, 'Gourcancon'),
(271, 52, 178196, 94220, 'Gouy'),
(272, 51, 184199, 85283, 'Gouzeaucourt'),
(273, 20, 143438, 36902, 'Grivesnes'),
(274, 51, 143753, 37503, 'Grivesnes'),
(275, 51, 272762, 47191, 'Groogland'),
(276, 52, 78804, 170873, 'Group'),
(277, 20, 217168, 85424, 'Guesnain,Douai'),
(278, 51, 166679, 121392, 'Guise,St.Quentin'),
(279, 20, 166546, 123239, 'Guise,St.Quentin'),
(280, 20, 160065, 76850, 'Guisecourt(GuIzancourt)'),
(281, 51, 216590, 86368, 'Guisnain'),
(282, 51, 159261, 75048, 'Guizancourt'),
(283, 52, 159660, 77023, 'Guizancourt'),
(284, 51, 266088, 86094, 'Halluin'),
(285, 20, 265190, 87573, 'Halluin,N Lille2'),
(286, 51, 149627, 80562, 'Ham'),
(287, 20, 151122, 79451, 'Ham'),
(288, 51, 154837, 76152, 'Ham Matigny'),
(289, 20, 153499, 76461, 'Ham Matigny'),
(290, 52, 167492, 80318, 'Hancourt'),
(291, 20, 166998, 79843, 'Hancourt'),
(292, 20, 273351, 97905, 'Harlebeke,Bavichove,NE Courtai'),
(293, 51, 273208, 98879, 'Harlebeke'),
(294, 51, 99600, 177071, 'Hauvine'),
(295, 20, 98781, 176647, 'Hauvine'),
(296, 52, 247949, 83469, 'Helesmes'),
(297, 20, 247744, 84529, 'Helesmes,N Denain'),
(298, 52, 201413, 72181, 'Hendecourt-les-Cagnicourt'),
(299, 20, 25526, 154763, 'Herbisse'),
(300, 51, 25981, 155296, 'Herbisse'),
(301, 20, 26389, 157298, 'Herbisse, Est'),
(302, 51, 218329, 28288, 'Herlin-le-Sec'),
(303, 20, 217638, 28814, 'Herlinger(Herlin-le-Sec)'),
(304, 51, 190204, 80134, 'Hermes'),
(305, 20, 190295, 79330, 'Hermes,Cambrai'),
(306, 20, 138325, 5382, 'Hetomesnil'),
(307, 51, 138284, 4372, 'Hetomesnil'),
(308, 51, 271903, 93954, 'Heule'),
(309, 20, 272097, 93000, 'Heule,Courtrai'),
(310, 20, 107024, 274718, 'Hivry-Circourt'),
(311, 51, 106692, 275383, 'Hivry-Circourt'),
(312, 20, 277554, 36092, 'Hondschoote'),
(313, 51, 276783, 36670, 'Hondschoote'),
(314, 20, 270484, 28935, 'Hoog Huys'),
(315, 51, 15119, 301278, 'Houdelmont'),
(316, 20, 15468, 300368, 'Houdelmont'),
(317, 52, 241543, 74715, 'Houplin'),
(318, 20, 240913, 76500, 'Houplin,S Lille'),
(319, 51, 204421, 99113, 'Iwuy'),
(320, 20, 204221, 102091, 'Iwuy'),
(321, 20, 114566, 246890, 'Jametz'),
(322, 52, 114734, 247451, 'Jametz'),
(323, 20, 73247, 234025, 'Julvecourt'),
(324, 51, 74374, 233550, 'Julvecourt'),
(325, 20, 217330, 82481, 'La Brayelle,Douai'),
(326, 20, 178646, 93932, 'La Catelet'),
(327, 20, 47145, 191827, 'La Cense'),
(328, 51, 48183, 192272, 'La Cense'),
(329, 20, 71247, 183390, 'La Cheppe'),
(330, 51, 72131, 183717, 'La Cheppe'),
(331, 20, 88495, 112064, 'La Fere en Tardenois'),
(332, 51, 88774, 111100, 'La Fere en Tardenois'),
(333, 52, 149107, 111986, 'La Ferte Ferriere'),
(334, 20, 149495, 111878, 'La Ferte Ferriere'),
(335, 20, 42735, 96505, 'La Ferte Gaucher'),
(336, 51, 42436, 96319, 'La Ferte Gaucher'),
(337, 52, 124480, 230578, 'La Jolly Ferme'),
(338, 20, 124240, 230141, 'La Jolly Ferme,Stenay'),
(339, 20, 274372, 56742, 'La Lovie'),
(340, 51, 275171, 57176, 'La Lovie'),
(341, 20, 65536, 178455, 'La Mellette'),
(342, 52, 232661, 79297, 'La Neuville'),
(343, 20, 233204, 79498, 'La Neuville'),
(344, 20, 70515, 186464, 'La Noblette'),
(345, 52, 229827, 84189, 'La Petrie'),
(346, 20, 230545, 83244, 'La Petrie'),
(347, 51, 130108, 146707, 'La Selve'),
(348, 20, 128717, 147030, 'La Selve'),
(349, 20, 217787, 57715, 'La Targette'),
(350, 51, 217371, 58181, 'La Targette'),
(351, 52, 87430, 284290, 'Labry'),
(352, 20, 194994, 72805, 'Lagnicourt'),
(353, 20, 74713, 56482, 'Lagny le Sec'),
(354, 51, 76415, 55967, 'Lagny le Sec'),
(355, 51, 178038, 93356, 'Le Catelet'),
(356, 20, 214343, 43634, 'Le Hameau'),
(357, 51, 213739, 44139, 'Le Hameau'),
(358, 51, 61627, 149331, 'Le Mesnil-sur-Oger'),
(359, 20, 79156, 55877, 'Le Plessis Belleville'),
(360, 51, 78296, 57415, 'Le Plessis Belleville'),
(361, 20, 185386, 41296, 'Lealvillers'),
(362, 51, 185692, 40835, 'Lealvillers'),
(363, 20, 183931, 68696, 'Lechelle'),
(364, 52, 183811, 69357, 'Lechelle,S Bertincourt'),
(365, 52, 109236, 187044, 'Leffincourt'),
(366, 20, 110781, 186173, 'Leffincourt,E Reims'),
(367, 20, 74742, 240480, 'Lemmes'),
(368, 51, 75107, 241218, 'Lemmes'),
(369, 51, 239297, 140614, 'Lens'),
(370, 20, 239100, 139524, 'Lens,Mons'),
(371, 51, 17505, 133472, 'Les Greves'),
(372, 52, 222487, 78940, 'Les Villers(Douai)'),
(373, 20, 89326, 131016, 'Lhery'),
(374, 51, 89759, 130342, 'Lhery'),
(375, 20, 134122, 135438, 'Liesse'),
(376, 51, 134295, 133339, 'Liesse-Notre-Dame'),
(377, 51, 208202, 100785, 'Lieu St.Amand'),
(378, 20, 207292, 100942, 'Lieu St.Amand'),
(379, 50, 248335, 80330, 'Lille'),
(380, 20, 55239, 227429, 'Lisle en Barrois'),
(381, 51, 55627, 229545, 'Lisle en Barrois'),
(382, 51, 249769, 77184, 'Lomme'),
(383, 20, 249472, 76420, 'Lomme,Lille'),
(384, 20, 168762, 115084, 'Longchamps'),
(385, 52, 168280, 115971, 'Longchamps'),
(386, 20, 280446, 17923, 'Loon'),
(387, 51, 280249, 16960, 'Loon'),
(388, 20, 96972, 10090, 'Lormaison'),
(389, 51, 96402, 9877, 'Lormaison'),
(390, 20, 24765, 107241, 'Louan'),
(391, 51, 25344, 108878, 'Louan'),
(392, 20, 71231, 39319, 'Louvres'),
(393, 51, 72093, 38522, 'Louvres'),
(394, 20, 107271, 128827, 'Maizy,N Fismes'),
(395, 51, 107767, 128267, 'Maizy,N Fismes'),
(396, 20, 33255, 306031, 'Malzeville'),
(397, 51, 34266, 306190, 'Malzeville'),
(398, 20, 24456, 313952, 'Mannoncourt en Vermois'),
(399, 51, 24204, 312612, 'Mannoncourt en Vermois'),
(400, 51, 131623, 134271, 'Marchais'),
(401, 20, 131246, 134785, 'Marchais'),
(402, 52, 267493, 92380, 'Marcke'),
(403, 20, 267072, 93812, 'Marcke,Courtrai'),
(404, 20, 190059, 33938, 'Marieux'),
(405, 52, 190381, 34763, 'Marieux'),
(406, 51, 148783, 131026, 'Marle-Autremencourt'),
(407, 20, 147541, 130797, 'Marle-Autremencourt'),
(408, 20, 75668, 38143, 'Mary la Ville'),
(409, 51, 75691, 37756, 'Mary la Ville'),
(410, 52, 78535, 284617, 'Mars-la-Tour'),
(411, 20, 78570, 282313, 'Mars-la-Tour'),
(412, 20, 56437, 185944, 'Marson'),
(413, 51, 56183, 185289, 'Marson'),
(414, 52, 117941, 252953, 'Marville'),
(415, 20, 115884, 254739, 'Marville'),
(416, 51, 217088, 90651, 'Masny'),
(417, 20, 218977, 89703, 'Masny'),
(418, 20, 64256, 165027, 'Matougues'),
(419, 51, 65438, 165356, 'Matougues'),
(420, 20, 62584, 66488, 'Meaux'),
(421, 51, 62213, 65510, 'Meaux'),
(422, 52, 62988, 65707, 'Meaux RW Station'),
(423, 51, 267243, 85268, 'Menin'),
(424, 20, 268206, 86088, 'Menin'),
(425, 52, 108476, 279762, 'Mercy-le-Haut'),
(426, 20, 109245, 279477, 'Mercy-le-Haut'),
(427, 20, 106847, 281405, 'Mercy-le-Haut S'),
(428, 20, 154544, 69447, 'Mesnil le Petit'),
(429, 20, 153282, 69478, 'Mesnil St George'),
(430, 20, 154842, 71155, 'Mesnil St Nicaise'),
(431, 51, 166284, 73525, 'Mesnil-Bruntel'),
(432, 20, 166414, 71913, 'Mesnil-Bruntel'),
(433, 52, 153682, 70002, 'Mesnil-le-Petit'),
(434, 50, 81409, 305907, 'Metz'),
(435, 52, 77188, 304252, 'Metz-Frescaty'),
(436, 20, 77438, 303516, 'Metz-Frescaty'),
(437, 20, 64525, 46992, 'Mitry Mory'),
(438, 51, 65245, 46461, 'Mitry Mory'),
(439, 51, 177935, 73446, 'Moislains'),
(440, 20, 176604, 74081, 'Moislains'),
(441, 20, 95146, 39893, 'Monchy les Chateau'),
(442, 51, 164814, 76854, 'Mons-en-Chaussee'),
(443, 20, 164243, 78166, 'Mons-en-Chaussee'),
(444, 20, 89627, 48932, 'Mont I_Eveque'),
(445, 51, 88920, 47706, 'Mont I_Eveque'),
(446, 20, 102147, 105186, 'Mont Soissons Ferme'),
(447, 52, 102023, 104932, 'Mont Soissons Ferme'),
(448, 20, 215866, 55907, 'Mont St. Eloi'),
(449, 20, 169458, 3112, 'Montagne Fayel'),
(450, 51, 170075, 2766, 'Montagne Fayel'),
(451, 52, 187211, 27385, 'Montagne Fayel'),
(452, 20, 102037, 81229, 'Montgobert'),
(453, 51, 101560, 82004, 'Montgobert'),
(454, 20, 153209, 41956, 'Moreuil'),
(455, 51, 152993, 38719, 'Moreuil'),
(456, 20, 235168, 96783, 'MouNchin'),
(457, 52, 234877, 97834, 'Mounchin'),
(458, 51, 135037, 224468, 'Mouzon'),
(459, 20, 134318, 224010, 'Mouzon'),
(460, 20, 96066, 139243, 'Muizon'),
(461, 51, 96947, 139308, 'Muizon'),
(462, 20, 82417, 61304, 'Nanteuil le Haudoin'),
(463, 51, 83105, 61208, 'Nanteuil le Haudoin'),
(464, 51, 68527, 106713, 'Nesles-la-Montagne'),
(465, 52, 112074, 168972, 'Neuflize'),
(466, 20, 112592, 170074, 'Neuflize'),
(467, 20, 193204, 111506, 'Neuville'),
(468, 20, 193401, 114716, 'Neuville,Le Cateau'),
(469, 51, 193586, 112753, 'Neuvilly'),
(470, 52, 178382, 77175, 'Nurlu,NE Moislains'),
(471, 20, 178621, 77748, 'Nurlu,NE Moislains'),
(472, 20, 22465, 291835, 'Ochey'),
(473, 51, 22029, 291157, 'Ochey'),
(474, 51, 230845, 93849, 'Orchies'),
(475, 20, 170441, 30031, 'Petit Camon'),
(476, 51, 169841, 30458, 'Petit Camon'),
(477, 20, 281373, 23669, 'Petit Synthe'),
(478, 51, 281379, 24106, 'Petit Synthe'),
(479, 51, 236869, 78242, 'Phalempin'),
(480, 20, 235685, 78237, 'Phalempin,N Douai'),
(481, 20, 47483, 148834, 'Pierre Morains'),
(482, 51, 48204, 148682, 'Pierre Morains'),
(483, 20, 104430, 74540, 'Pierrefonds'),
(484, 51, 105257, 74170, 'Pierrefonds'),
(485, 51, 156205, 148619, 'Plomion,SE Vervins'),
(486, 20, 156256, 150152, 'Plomion,SE Vervins'),
(487, 52, 105639, 160465, 'Pomacle'),
(488, 20, 105786, 161175, 'Pomacle'),
(489, 52, 236621, 84167, 'Pont-a-Marcq'),
(490, 20, 235458, 82812, 'Pont-a-Marcq'),
(491, 20, 62289, 232152, 'Pretz en Argonne'),
(492, 51, 61928, 231269, 'Pretz en Argonne'),
(493, 52, 198221, 76126, 'Pronville'),
(494, 20, 196899, 76653, 'Pronville,nr Queant'),
(495, 51, 195749, 90656, 'Proville,Cambrai'),
(496, 20, 193244, 90843, 'Proville,Cambrai'),
(497, 52, 133275, 123591, 'Puisieux Ferme'),
(498, 20, 132917, 125668, 'Puisieux Ferme,Laon'),
(499, 52, 76101, 284778, 'Puxieux'),
(500, 51, 255318, 78763, 'Quesnoy-sur-Deule'),
(501, 20, 129245, 33632, 'Quinquempoix'),
(502, 51, 128695, 32974, 'Quinquempoix'),
(503, 20, 48545, 214986, 'Rancourt'),
(504, 51, 47161, 214919, 'Rancourt'),
(505, 20, 96545, 54994, 'Raray'),
(506, 51, 96086, 53860, 'Raray'),
(507, 20, 125044, 39403, 'Ravenel'),
(508, 20, 243701, 18877, 'Reclinghem'),
(509, 51, 244066, 18471, 'Reclinghem'),
(510, 50, 94738, 149795, 'Reims'),
(511, 20, 56422, 234416, 'Rembercourt'),
(512, 51, 56852, 234002, 'Rembercourt'),
(513, 20, 59809, 209547, 'Remicourt'),
(514, 51, 61329, 211152, 'Remicourt'),
(515, 20, 45393, 215398, 'Remmenecourt'),
(516, 51, 44450, 214702, 'Remmenecourt'),
(517, 20, 101005, 7467, 'Ressons I_Abbaye'),
(518, 51, 101392, 8623, 'Ressons I_Abbaye'),
(519, 20, 97649, 8926, 'Ressons,Ferme du Val Valereux'),
(520, 52, 97793, 8454, 'Ressons,Ferme du Val Valereux'),
(521, 51, 124589, 38818, 'Revenel'),
(522, 20, 198992, 71820, 'Riencourt,Arras'),
(523, 51, 83713, 102755, 'Rocourt-St.-Martin'),
(524, 20, 66553, 37977, 'Roissey en France'),
(525, 51, 67603, 39111, 'Roissey en France'),
(526, 51, 175804, 87220, 'Ronssoy'),
(527, 20, 175083, 87466, 'Ronssoy,SE Epehy'),
(528, 20, 94384, 136193, 'Rosnay'),
(529, 51, 95117, 137538, 'Rosnay'),
(530, 52, 215544, 87263, 'Roucourt'),
(531, 20, 216004, 87765, 'Roucourt, Bohain'),
(532, 52, 156865, 88754, 'Roupy'),
(533, 20, 157517, 87901, 'Roupy,Somme'),
(534, 20, 92281, 109956, 'Rugny'),
(535, 52, 93555, 109565, 'Rugny'),
(536, 20, 232470, 15022, 'Ruisseauville'),
(537, 52, 232302, 14101, 'Ruisseauville'),
(538, 51, 280437, 88052, 'Rumbeke, Roulers'),
(539, 20, 280705, 87070, 'Rumbeke,Roulers'),
(540, 20, 106915, 42674, 'Sacy le Grand'),
(541, 51, 106651, 41932, 'Sacy le Grand'),
(542, 20, 125481, 33751, 'Saint Just'),
(543, 51, 123984, 34106, 'Saint Just'),
(544, 20, 40584, 78972, 'Saints'),
(545, 51, 40123, 78856, 'Saints'),
(546, 20, 90568, 109878, 'Saponay'),
(547, 52, 90261, 109575, 'Saponay'),
(548, 20, 218476, 45330, 'Savy Berlette'),
(549, 51, 217490, 44846, 'Savy Berlette'),
(550, 51, 239070, 78788, 'Seclin'),
(551, 20, 64216, 221027, 'Senard en Argonne'),
(552, 51, 64593, 220283, 'Senard en Argonne'),
(553, 20, 88772, 44474, 'Senlis'),
(554, 51, 90101, 44964, 'Senlis'),
(555, 52, 98278, 266510, 'Senon'),
(556, 51, 245133, 27004, 'Serny'),
(557, 20, 246547, 26460, 'Serny'),
(558, 51, 129927, 139625, 'Sissonne'),
(559, 20, 129306, 137756, 'Sissonne'),
(560, 52, 102454, 239600, 'Sivry'),
(561, 20, 102998, 239823, 'Sivry'),
(562, 51, 204889, 40320, 'Sombrin'),
(563, 20, 64556, 191018, 'Somme Vesle'),
(564, 51, 65244, 190746, 'Somme Vesle'),
(565, 20, 143236, 3508, 'Sommereux'),
(566, 51, 143628, 2779, 'Sommereux'),
(567, 20, 205007, 39447, 'Soncamp Farm'),
(568, 20, 37453, 169721, 'Soude Ste Croix'),
(569, 51, 37271, 170350, 'Soude Ste Croix'),
(570, 20, 71166, 241766, 'Souilly'),
(571, 51, 70376, 241365, 'Souilly'),
(572, 51, 216803, 55071, 'St. Eloi'),
(573, 51, 266416, 42994, 'St. Marie Cappel'),
(574, 10, 259322, 22060, 'St. Omer'),
(575, 52, 117123, 163340, 'St. Loup-en-Champagne'),
(576, 20, 114485, 161028, 'St. Loup,Champagne'),
(577, 20, 118159, 161338, 'St. Loup,Champagne'),
(578, 52, 258842, 79679, 'St. Marguerite'),
(579, 20, 257216, 79566, 'St. Marguerite'),
(580, 20, 265638, 42793, 'St. Marie Cappel'),
(581, 52, 112414, 164673, 'St. Remy-le-Petit'),
(582, 20, 113284, 165411, 'St. Remy-le-Petit West'),
(583, 51, 121842, 233373, 'Stenay'),
(584, 20, 121375, 234534, 'Stenay'),
(585, 50, 55278, 260447, 'St. Mihiel'),
(586, 50, 160558, 96433, 'St. Quentin'),
(587, 52, 123629, 265461, 'Tellancourt'),
(588, 20, 122927, 265747, 'Tellancourt'),
(589, 20, 279141, 31818, 'Teteghem'),
(590, 51, 279133, 31108, 'Teteghem'),
(591, 20, 89176, 285445, 'Tichemont Castle'),
(592, 52, 87868, 285635, 'Tichemont Castle.'),
(593, 20, 67622, 192772, 'Tilloy at Bellay'),
(594, 51, 68168, 191702, 'Tilloy at Bellay'),
(595, 20, 31491, 284867, 'Toul'),
(596, 50, 32089, 286177, 'Toul'),
(597, 51, 30904, 285463, 'Toul Aerodrom'),
(598, 52, 144455, 129202, 'Toulis'),
(599, 20, 144163, 128427, 'Toulis'),
(600, 20, 36718, 74474, 'Touquin'),
(601, 51, 37828, 74963, 'Touquin'),
(602, 50, 244871, 103968, 'Tournay'),
(603, 20, 50782, 152450, 'Trecon'),
(604, 51, 51951, 153557, 'Trecon'),
(605, 20, 157513, 79489, 'Ugny-l Equipee'),
(606, 52, 157460, 79975, 'Ugny-l Equipee'),
(607, 20, 74679, 238539, 'Vadelaincourt'),
(608, 51, 74925, 239139, 'Vadelaincourt'),
(609, 20, 186708, 24488, 'Valheureux'),
(610, 52, 187740, 24728, 'Valheureux'),
(611, 20, 95224, 75496, 'Vauciennes'),
(612, 51, 92857, 76508, 'Vauciennes'),
(613, 20, 23256, 271395, 'Vaucouleurs'),
(614, 51, 23645, 269848, 'Vaucouleurs'),
(615, 20, 144039, 160031, 'Vaux'),
(616, 52, 144697, 160040, 'Vaux-les-Rubigny'),
(617, 20, 103156, 121822, 'Vauxcere'),
(618, 51, 102945, 121073, 'Vauxcere'),
(619, 51, 190003, 73963, 'Velu'),
(620, 20, 189623, 73272, 'Velu'),
(621, 52, 175983, 121782, 'Venerolles'),
(622, 20, 84954, 249955, 'Verdun'),
(623, 50, 84931, 247837, 'Verdun'),
(624, 52, 85484, 249647, 'Verdun Aerodrome'),
(625, 51, 161462, 60507, 'Vermandovillers'),
(626, 10, 187641, 27585, 'Vert Galand'),
(627, 20, 97511, 74480, 'Vez'),
(628, 51, 96476, 73751, 'Vez'),
(629, 51, 194755, 109127, 'Viesly'),
(630, 52, 214242, 150356, 'Vieux-Reng'),
(631, 20, 42952, 13924, 'Villacoublay'),
(632, 51, 43208, 15615, 'Villacoublay'),
(633, 20, 62099, 151669, 'Villaneuve les Vertus'),
(634, 20, 86535, 132899, 'Ville en Tardenois'),
(635, 51, 85952, 132785, 'Ville en Tardenois'),
(636, 20, 97944, 121885, 'Ville-Savoye'),
(637, 51, 98818, 121930, 'Ville-Savoye'),
(638, 20, 163811, 41480, 'Villers Bretonneux'),
(639, 20, 30561, 212943, 'Villers en Lieu'),
(640, 51, 29405, 213264, 'Villers en Lieu'),
(641, 20, 27463, 103418, 'Villers St. George'),
(642, 51, 27757, 104064, 'Villers St. George'),
(643, 51, 163679, 40597, 'Villers-Bretonneux'),
(644, 51, 215433, 148776, 'Villers-sur-Nicole'),
(645, 20, 215075, 151455, 'Villers-sur-Nicole'),
(646, 52, 143492, 83390, 'Villeselve'),
(647, 20, 144562, 82477, 'Villeselve'),
(648, 20, 48523, 158975, 'Villeseneux'),
(649, 51, 48784, 157989, 'Villeseneux'),
(650, 20, 51246, 159213, 'Villeseneux Ferme de Conflans'),
(651, 51, 135150, 115583, 'Vivaise'),
(652, 20, 135729, 116530, 'Vivaise'),
(653, 52, 47533, 76837, 'Voisins'),
(654, 51, 110772, 198175, 'Vouziers'),
(655, 20, 110656, 199477, 'Vouziers'),
(656, 20, 163675, 46097, 'Warfusee'),
(657, 51, 164053, 46989, 'Warfusee'),
(658, 51, 178808, 118781, 'Wassigny'),
(659, 20, 179299, 119259, 'Wassigny'),
(660, 52, 97705, 267933, 'Bellevue Ferme'),
(661, 52, 280252, 68872, 'no man''s land'),
(662, 52, 274996, 72853, 'no man''s land'),
(663, 52, 270138, 72455, 'no man''s land'),
(664, 52, 265121, 69031, 'no man''s land'),
(665, 52, 259865, 67358, 'no man''s land'),
(666, 52, 254609, 65845, 'no man''s land'),
(667, 52, 250149, 62421, 'no man''s land'),
(668, 52, 246167, 59235, 'no man''s land'),
(669, 52, 241230, 58359, 'no man''s land'),
(670, 52, 236531, 59793, 'no man''s land'),
(671, 52, 231434, 61147, 'no man''s land'),
(672, 52, 226417, 60032, 'no man''s land'),
(673, 52, 221559, 61625, 'no man''s land'),
(674, 52, 216925, 63536, 'no man''s land'),
(675, 52, 212226, 65049, 'no man''s land'),
(676, 52, 207209, 64890, 'no man''s land'),
(677, 52, 202669, 62819, 'no man''s land'),
(678, 52, 198528, 59952, 'no man''s land'),
(679, 52, 194069, 57404, 'no man''s land'),
(680, 52, 185468, 52705, 'no man''s land'),
(681, 52, 190246, 54378, 'no man''s land'),
(682, 52, 180530, 52387, 'no man''s land'),
(683, 52, 175354, 52944, 'no man''s land'),
(684, 52, 170257, 53103, 'no man''s land'),
(685, 52, 165202, 53183, 'no man''s land'),
(686, 52, 160185, 52227, 'no man''s land'),
(687, 52, 155247, 51351, 'no man''s land'),
(688, 52, 150389, 51272, 'no man''s land'),
(689, 52, 145531, 52068, 'no man''s land'),
(690, 52, 140912, 54457, 'no man''s land'),
(691, 52, 137010, 57961, 'no man''s land'),
(692, 52, 133984, 61943, 'no man''s land'),
(693, 52, 132073, 66721, 'no man''s land'),
(694, 52, 130719, 71738, 'no man''s land'),
(695, 52, 131037, 76756, 'no man''s land'),
(696, 52, 132289, 81567, 'no man''s land'),
(697, 52, 133085, 86663, 'no man''s land'),
(698, 52, 132607, 91760, 'no man''s land'),
(699, 52, 130298, 96299, 'no man''s land'),
(700, 52, 126396, 99326, 'no man''s land'),
(701, 52, 122732, 102909, 'no man''s land'),
(702, 52, 120741, 107608, 'no man''s land'),
(703, 52, 119228, 112386, 'no man''s land'),
(704, 52, 117556, 117324, 'no man''s land'),
(705, 52, 115884, 122022, 'no man''s land'),
(706, 52, 114689, 127039, 'no man''s land'),
(707, 52, 113574, 132056, 'no man''s land'),
(708, 52, 112698, 137074, 'no man''s land'),
(709, 52, 111265, 142011, 'no man''s land'),
(710, 52, 108238, 146073, 'no man''s land'),
(711, 52, 105249, 150110, 'no man''s land'),
(712, 52, 102780, 154570, 'no man''s land'),
(713, 52, 100471, 159029, 'no man''s land'),
(714, 52, 98002, 163330, 'no man''s land'),
(715, 52, 95772, 167789, 'no man''s land'),
(716, 52, 93781, 172408, 'no man''s land'),
(717, 52, 92189, 177346, 'no man''s land'),
(718, 52, 91074, 182204, 'no man''s land'),
(719, 52, 89322, 186982, 'no man''s land'),
(720, 52, 86773, 191442, 'no man''s land'),
(721, 52, 84305, 195742, 'no man''s land'),
(722, 52, 83827, 200839, 'no man''s land'),
(723, 52, 84145, 205856, 'no man''s land'),
(724, 52, 85181, 210793, 'no man''s land'),
(725, 52, 85897, 215651, 'no man''s land'),
(726, 52, 86375, 220828, 'no man''s land'),
(727, 52, 87012, 225765, 'no man''s land'),
(728, 52, 88366, 230667, 'no man''s land'),
(729, 52, 90118, 235525, 'no man''s land'),
(730, 52, 91552, 240223, 'no man''s land'),
(731, 52, 92348, 245241, 'no man''s land'),
(732, 52, 90915, 250098, 'no man''s land'),
(733, 52, 89401, 255116, 'no man''s land'),
(734, 52, 86375, 259097, 'no man''s land'),
(735, 52, 81517, 260372, 'no man''s land'),
(736, 52, 76819, 261566, 'no man''s land'),
(737, 52, 71961, 262283, 'no man''s land'),
(738, 52, 67660, 259575, 'no man''s land'),
(739, 52, 62643, 260292, 'no man''s land'),
(740, 52, 57865, 258381, 'no man''s land'),
(741, 52, 53087, 256868, 'no man''s land'),
(742, 52, 50061, 261088, 'no man''s land'),
(743, 52, 49742, 266265, 'no man''s land'),
(744, 52, 51216, 271039, 'no man''s land'),
(745, 52, 52827, 276210, 'no man''s land'),
(746, 52, 53768, 280845, 'no man''s land'),
(747, 52, 55715, 285815, 'no man''s land'),
(748, 52, 56454, 290516, 'no man''s land'),
(749, 52, 57529, 295687, 'no man''s land'),
(750, 52, 57260, 300859, 'no man''s land'),
(751, 52, 53432, 304082, 'no man''s land'),
(752, 52, 49379, 307112, 'no man''s land'),
(753, 52, 45215, 309798, 'no man''s land'),
(754, 52, 40782, 312015, 'no man''s land'),
(755, 52, 38028, 316313, 'no man''s land'),
(756, 52, 36081, 320880, 'no man''s land'),
(757, 52, 34469, 325581, 'no man''s land'),
(758, 52, 32723, 330350, 'no man''s land'),
(759, 52, 30372, 334782, 'no man''s land'),
(760, 52, 27954, 339215, 'no man''s land'),
(761, 52, 24663, 343043, 'no man''s land'),
(762, 52, 21439, 347073, 'no man''s land'),
(763, 52, 18484, 351237, 'no man''s land'),
(764, 52, 15261, 354998, 'no man''s land'),
(765, 52, 11567, 358289, 'no man''s land'),
(766, 52, 280163, 63927, 'Entente trenches'),
(767, 52, 275122, 69522, 'Entente trenches'),
(768, 52, 270024, 69966, 'Entente trenches'),
(769, 52, 265038, 66364, 'Entente trenches'),
(770, 52, 260052, 64259, 'Entente trenches'),
(771, 52, 255010, 61877, 'Entente trenches'),
(772, 52, 250190, 58940, 'Entente trenches'),
(773, 52, 246146, 57167, 'Entente trenches'),
(774, 52, 241156, 56503, 'Entente trenches'),
(775, 52, 236502, 58109, 'Entente trenches'),
(776, 52, 231516, 59938, 'Entente trenches'),
(777, 52, 226474, 57278, 'Entente trenches'),
(778, 52, 221598, 57832, 'Entente trenches'),
(779, 52, 216944, 60159, 'Entente trenches'),
(780, 52, 212130, 61821, 'Entente trenches'),
(781, 52, 207143, 61212, 'Entente trenches'),
(782, 52, 202767, 59162, 'Entente trenches'),
(783, 52, 198611, 56613, 'Entente trenches'),
(784, 52, 194130, 53677, 'Entente trenches'),
(785, 52, 190031, 49522, 'Entente trenches'),
(786, 52, 185654, 49355, 'Entente trenches'),
(787, 52, 180667, 49854, 'Entente trenches'),
(788, 52, 175127, 50464, 'Entente trenches'),
(789, 52, 170362, 50907, 'Entente trenches'),
(790, 52, 165210, 50630, 'Entente trenches'),
(791, 52, 160334, 49078, 'Entente trenches'),
(792, 52, 155126, 47804, 'Entente trenches'),
(793, 52, 150178, 48026, 'Entente trenches'),
(794, 52, 145136, 48524, 'Entente trenches'),
(795, 52, 139984, 51682, 'Entente trenches'),
(796, 52, 135053, 55062, 'Entente trenches'),
(797, 52, 130842, 59938, 'Entente trenches'),
(798, 52, 128072, 65700, 'Entente trenches'),
(799, 52, 126687, 71628, 'Entente trenches'),
(800, 52, 127352, 77002, 'Entente trenches'),
(801, 52, 128238, 81933, 'Entente trenches'),
(802, 52, 129125, 86587, 'Entente trenches'),
(803, 52, 129069, 91351, 'Entente trenches'),
(804, 52, 127019, 93789, 'Entente trenches'),
(805, 52, 122421, 97113, 'Entente trenches'),
(806, 52, 119041, 101989, 'Entente trenches'),
(807, 52, 117047, 107141, 'Entente trenches'),
(808, 52, 115514, 112262, 'Entente trenches'),
(809, 52, 113298, 117082, 'Entente trenches'),
(810, 52, 110694, 122068, 'Entente trenches'),
(811, 52, 110528, 126943, 'Entente trenches'),
(812, 52, 109918, 131819, 'Entente trenches'),
(813, 52, 108699, 136473, 'Entente trenches'),
(814, 52, 107370, 141016, 'Entente trenches'),
(815, 52, 105818, 144617, 'Entente trenches'),
(816, 52, 103104, 148883, 'Entente trenches'),
(817, 52, 100555, 153205, 'Entente trenches'),
(818, 52, 96455, 157194, 'Entente trenches'),
(819, 52, 94405, 161682, 'Entente trenches'),
(820, 52, 93796, 166945, 'Entente trenches'),
(821, 52, 92134, 171931, 'Entente trenches'),
(822, 52, 89750, 176599, 'Entente trenches'),
(823, 52, 87922, 181197, 'Entente trenches'),
(824, 52, 86758, 185907, 'Entente trenches'),
(825, 52, 84210, 190006, 'Entente trenches'),
(826, 52, 81716, 194660, 'Entente trenches'),
(827, 52, 81273, 200478, 'Entente trenches'),
(828, 52, 82381, 205796, 'Entente trenches'),
(829, 52, 83545, 210838, 'Entente trenches'),
(830, 52, 84542, 215714, 'Entente trenches'),
(831, 52, 85041, 220866, 'Entente trenches'),
(832, 52, 85816, 225797, 'Entente trenches'),
(833, 52, 86758, 230961, 'Entente trenches'),
(834, 52, 88088, 235892, 'Entente trenches'),
(835, 52, 88531, 240989, 'Entente trenches'),
(836, 52, 88088, 244867, 'Entente trenches'),
(837, 52, 87090, 249078, 'Entente trenches'),
(838, 52, 84431, 251959, 'Entente trenches'),
(839, 52, 82603, 255117, 'Entente trenches'),
(840, 52, 81051, 257610, 'Entente trenches'),
(841, 52, 76785, 259771, 'Entente trenches'),
(842, 52, 71910, 260990, 'Entente trenches'),
(843, 52, 67588, 258386, 'Entente trenches'),
(844, 52, 62713, 259328, 'Entente trenches'),
(845, 52, 58280, 257278, 'Entente trenches'),
(846, 52, 52297, 255505, 'Entente trenches'),
(847, 52, 48943, 260487, 'Entente trenches'),
(848, 52, 48888, 266194, 'Entente trenches'),
(849, 52, 49885, 271125, 'Entente trenches'),
(850, 52, 51769, 276222, 'Entente trenches'),
(851, 52, 52821, 280931, 'Entente trenches'),
(852, 52, 54761, 286028, 'Entente trenches'),
(853, 52, 55371, 290481, 'Entente trenches'),
(854, 52, 56258, 295578, 'Entente trenches'),
(855, 52, 56202, 300564, 'Entente trenches'),
(856, 52, 52656, 302836, 'Entente trenches'),
(857, 52, 48834, 306160, 'Entente trenches'),
(858, 52, 44845, 308764, 'Entente trenches'),
(859, 52, 40135, 310925, 'Entente trenches'),
(860, 52, 37310, 315689, 'Entente trenches'),
(861, 52, 35149, 320399, 'Entente trenches'),
(862, 52, 33210, 325330, 'Entente trenches'),
(863, 52, 31548, 329817, 'Entente trenches'),
(864, 52, 29331, 334028, 'Entente trenches'),
(865, 52, 27115, 338737, 'Entente trenches'),
(866, 52, 23990, 342391, 'Entente trenches'),
(867, 52, 20666, 346601, 'Entente trenches'),
(868, 52, 17674, 350480, 'Entente trenches'),
(869, 52, 14627, 354302, 'Entente trenches'),
(870, 52, 10970, 357737, 'Entente trenches'),
(871, 52, 280048, 72754, 'Central Powers trenches'),
(872, 52, 275006, 76189, 'Central Powers trenches'),
(873, 52, 270076, 74527, 'Central Powers trenches'),
(874, 52, 265089, 71757, 'Central Powers trenches'),
(875, 52, 260047, 70261, 'Central Powers trenches'),
(876, 52, 255061, 70039, 'Central Powers trenches'),
(877, 52, 249964, 67491, 'Central Powers trenches'),
(878, 52, 24652, 62892, 'Central Powers trenches'),
(879, 52, 241363, 60067, 'Central Powers trenches'),
(880, 52, 236432, 61618, 'Central Powers trenches'),
(881, 52, 231668, 62117, 'Central Powers trenches'),
(882, 52, 226571, 62338, 'Central Powers trenches'),
(883, 52, 222027, 65663, 'Central Powers trenches'),
(884, 52, 217096, 67491, 'Central Powers trenches'),
(885, 52, 211667, 68765, 'Central Powers trenches'),
(886, 52, 206625, 68211, 'Central Powers trenches'),
(887, 52, 202248, 66438, 'Central Powers trenches'),
(888, 52, 197066, 62671, 'Central Powers trenches'),
(889, 52, 192357, 60621, 'Central Powers trenches'),
(890, 52, 188866, 58294, 'Central Powers trenches'),
(891, 52, 185320, 56355, 'Central Powers trenches'),
(892, 52, 180556, 55967, 'Central Powers trenches'),
(893, 52, 175328, 55413, 'Central Powers trenches'),
(894, 52, 170231, 55302, 'Central Powers trenches'),
(895, 52, 164968, 55801, 'Central Powers trenches'),
(896, 52, 159649, 54970, 'Central Powers trenches'),
(897, 52, 155161, 53751, 'Central Powers trenches'),
(898, 52, 150563, 53806, 'Central Powers trenches'),
(899, 52, 145964, 55357, 'Central Powers trenches'),
(900, 52, 142265, 58460, 'Central Powers trenches'),
(901, 52, 139384, 60842, 'Central Powers trenches'),
(902, 52, 137223, 64277, 'Central Powers trenches'),
(903, 52, 135228, 67491, 'Central Powers trenches'),
(904, 52, 134120, 72145, 'Central Powers trenches'),
(905, 52, 134397, 76854, 'Central Powers trenches'),
(906, 52, 135450, 81730, 'Central Powers trenches'),
(907, 52, 136724, 86716, 'Central Powers trenches'),
(908, 52, 136226, 92423, 'Central Powers trenches'),
(909, 52, 133954, 97963, 'Central Powers trenches'),
(910, 52, 130574, 102118, 'Central Powers trenches'),
(911, 52, 126419, 104334, 'Central Powers trenches'),
(912, 52, 123479, 108420, 'Central Powers trenches'),
(913, 52, 122759, 112963, 'Central Powers trenches'),
(914, 52, 121983, 118947, 'Central Powers trenches'),
(915, 52, 119767, 123434, 'Central Powers trenches'),
(916, 52, 118493, 128365, 'Central Powers trenches'),
(917, 52, 117828, 133185, 'Central Powers trenches'),
(918, 52, 117551, 138559, 'Central Powers trenches'),
(919, 52, 114614, 144155, 'Central Powers trenches'),
(920, 52, 110293, 147812, 'Central Powers trenches'),
(921, 52, 107393, 151689, 'Central Powers trenches'),
(922, 52, 104734, 155401, 'Central Powers trenches'),
(923, 52, 103681, 160332, 'Central Powers trenches'),
(924, 52, 103127, 165761, 'Central Powers trenches'),
(925, 52, 97975, 168864, 'Central Powers trenches'),
(926, 52, 95426, 172687, 'Central Powers trenches'),
(927, 52, 94597, 177774, 'Central Powers trenches'),
(928, 52, 93655, 182872, 'Central Powers trenches'),
(929, 52, 92104, 187692, 'Central Powers trenches'),
(930, 52, 88835, 192789, 'Central Powers trenches'),
(931, 52, 86619, 196556, 'Central Powers trenches'),
(932, 52, 85566, 200601, 'Central Powers trenches'),
(933, 52, 86508, 205818, 'Central Powers trenches'),
(934, 52, 86508, 210804, 'Central Powers trenches'),
(935, 52, 87062, 215569, 'Central Powers trenches'),
(936, 52, 88170, 225597, 'Central Powers trenches'),
(937, 52, 90054, 230085, 'Central Powers trenches'),
(938, 52, 92547, 234517, 'Central Powers trenches'),
(939, 52, 94874, 239448, 'Central Powers trenches'),
(940, 52, 96591, 245376, 'Central Powers trenches'),
(941, 52, 95095, 250362, 'Central Powers trenches'),
(942, 52, 92547, 256623, 'Central Powers trenches'),
(943, 52, 90477, 262639, 'Central Powers trenches'),
(944, 52, 87097, 265409, 'Central Powers trenches'),
(945, 52, 81557, 262750, 'Central Powers trenches'),
(946, 52, 77180, 263414, 'Central Powers trenches'),
(947, 52, 72138, 263747, 'Central Powers trenches'),
(948, 52, 67872, 260866, 'Central Powers trenches'),
(949, 52, 62664, 261143, 'Central Powers trenches'),
(950, 52, 62769, 261596, 'Central Powers trenches'),
(951, 52, 57949, 259712, 'Central Powers trenches'),
(952, 52, 53406, 258271, 'Central Powers trenches'),
(953, 52, 51079, 261429, 'Central Powers trenches'),
(954, 52, 50802, 266139, 'Central Powers trenches'),
(955, 52, 52298, 271014, 'Central Powers trenches'),
(956, 52, 53628, 276167, 'Central Powers trenches'),
(957, 52, 54706, 280720, 'Central Powers trenches'),
(958, 52, 56506, 285771, 'Central Powers trenches'),
(959, 52, 57168, 290380, 'Central Powers trenches'),
(960, 52, 58210, 295438, 'Central Powers trenches'),
(961, 52, 58242, 301026, 'Central Powers trenches'),
(962, 52, 54359, 304656, 'Central Powers trenches'),
(963, 52, 50413, 307939, 'Central Powers trenches'),
(964, 52, 45994, 310749, 'Central Powers trenches'),
(965, 52, 41511, 312643, 'Central Powers trenches'),
(966, 52, 39014, 316667, 'Central Powers trenches'),
(967, 52, 36994, 321244, 'Central Powers trenches'),
(968, 52, 35447, 325885, 'Central Powers trenches'),
(969, 52, 33711, 330809, 'Central Powers trenches'),
(970, 52, 31280, 335197, 'Central Powers trenches'),
(971, 52, 28908, 339796, 'Central Powers trenches'),
(972, 52, 25467, 343678, 'Central Powers trenches'),
(973, 52, 22373, 347687, 'Central Powers trenches'),
(974, 52, 19343, 351854, 'Central Powers trenches'),
(975, 52, 15951, 355940, 'Central Powers trenches'),
(976, 52, 12699, 358497, 'Central Powers trenches'),
(977, 20, 247950, 53700, 'La Gorgue');

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