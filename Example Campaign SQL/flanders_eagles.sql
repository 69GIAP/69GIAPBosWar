-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 19, 2013 at 11:54 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flanders_eagles`
--
CREATE DATABASE IF NOT EXISTS `flanders_eagles` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `flanders_eagles`;

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
  `detect_off_time` tinyint(1) unsigned NOT NULL DEFAULT '15',
  PRIMARY KEY (`id`),
  UNIQUE KEY `campaign` (`campaign`),
  UNIQUE KEY `camp_db` (`camp_db`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `campaign_settings`
--

INSERT INTO `campaign_settings` (`id`, `simulation`, `campaign`, `camp_db`, `camp_host`, `camp_user`, `camp_passwd`, `map`, `map_locations`, `status`, `show_airfield`, `finish_flight_only_landed`, `logpath`, `log_prefix`, `logfile`, `kia_pilot`, `mia_pilot`, `critical_w_pilot`, `serious_w_pilot`, `light_w_pilot`, `kia_gunner`, `mia_gunner`, `critical_w_gunner`, `serious_w_gunner`, `light_w_gunner`, `healthy`, `min_x`, `min_z`, `max_x`, `max_z`, `air_detect_distance`, `ground_detect_distance`, `air_ai_level`, `ground_ai_level`, `ground_max_speed_kmh`, `ground_transport_speed_kmh`, `ground_spacing`, `lineup_minutes`, `mission_minutes`, `detect_off_time`) VALUES
(1, 'RoF', 'Flanders Eagles', 'flanders_eagles', 'localhost', 'rofwar', 'rofwar', 'Channel', 'rof_channel_locations', '3', 'true', 'true', 'logs', 'missionReportFlandersEagles', 'missionReportFlandersEagles1', 100, 50, 30, 20, 10, 50, 50, 30, 20, 10, 0, 0, 0, 100000, 100000, 5000, 500, '2', '2', 50, 10, 5, 30, 90, 15);

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
-- Table structure for table `rof_channel_locations`
--

DROP TABLE IF EXISTS `rof_channel_locations`;
CREATE TABLE IF NOT EXISTS `rof_channel_locations` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `LID` smallint(1) unsigned NOT NULL,
  `LX` int(1) NOT NULL,
  `LZ` int(1) NOT NULL,
  `LName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=564 ;

--
-- Dumping data for table `rof_channel_locations`
--

INSERT INTO `rof_channel_locations` (`id`, `LID`, `LX`, `LZ`, `LName`) VALUES
(1, 51, 54580, 197540, 'Abeele'),
(2, 10, 54160, 199000, 'Abeele East'),
(3, 10, 55000, 196700, 'Abeele West'),
(4, 10, 60920, 238990, 'Abeelhoek'),
(5, 10, 65400, 232640, 'Abele'),
(6, 51, 101840, 93470, 'Adisham'),
(7, 10, 89220, 225000, 'Aertrycke'),
(8, 51, 88090, 226200, 'Aertrycke'),
(9, 51, 44440, 135510, 'Alincthun'),
(10, 10, 127640, 54440, 'Allhallows'),
(11, 51, 128420, 56760, 'Allhallows'),
(12, 10, 46320, 150580, 'Alquines'),
(13, 51, 45550, 149260, 'Alquines'),
(14, 51, 79840, 64270, 'Appledore Heath'),
(15, 51, 178950, 80050, 'Ardleigh'),
(16, 51, 58050, 148770, 'Ardres'),
(17, 10, 73230, 177240, 'Arembouts'),
(18, 51, 106000, 99350, 'Ash'),
(19, 51, 92110, 70690, 'Ashford'),
(20, 51, 58250, 122320, 'Audinghen'),
(21, 51, 55120, 120900, 'Audresselles'),
(22, 51, 60790, 155330, 'Audrui'),
(23, 51, 81670, 201480, 'Avecapelle'),
(24, 10, 45850, 200850, 'Bailleul'),
(25, 51, 45480, 201620, 'Bailleul'),
(26, 51, 64260, 47650, 'Baldslow'),
(27, 51, 97320, 90670, 'Barham'),
(28, 51, 65510, 129090, 'Bas Escalles'),
(29, 51, 138660, 45360, 'Basildon'),
(30, 51, 66500, 43080, 'Battle'),
(31, 10, 60320, 241360, 'Bavichove'),
(32, 51, 41440, 155920, 'Bayenghem'),
(33, 10, 172200, 93270, 'Beaumont'),
(34, 51, 57960, 221760, 'Becelaere'),
(35, 10, 103170, 90550, 'Bekesbourne'),
(36, 10, 69930, 182040, 'Bergues'),
(37, 51, 71010, 180150, 'Bergues'),
(38, 51, 89720, 62390, 'Bethersden'),
(39, 20, 71550, 230080, 'Beveren'),
(40, 20, 71700, 230370, 'Beveren'),
(41, 51, 146410, 40650, 'Billericay'),
(42, 51, 83670, 73150, 'Bilsington'),
(43, 51, 169440, 68640, 'Birch'),
(44, 51, 117100, 1011110, 'Birchington-on-Sea'),
(45, 10, 55100, 235960, 'Bisseghem'),
(46, 10, 170630, 74930, 'Blackheath Common'),
(47, 51, 109500, 228850, 'Blankenberghe'),
(48, 51, 109100, 83240, 'Blean'),
(49, 10, 46390, 157350, 'Boisdenghem'),
(50, 51, 61840, 147800, 'Boisen Ardres'),
(51, 51, 97550, 85140, 'Bossingham'),
(52, 50, 44000, 121000, 'Boulogne'),
(53, 50, 44000, 122000, 'Boulogne'),
(54, 50, 44000, 123000, 'Boulogne'),
(55, 51, 68440, 163550, 'Bourbourg'),
(56, 51, 156220, 74080, 'Bradwell-on-Sea'),
(57, 10, 173880, 49110, 'Braintree'),
(58, 51, 174220, 50960, 'Braintree'),
(59, 20, 81030, 183710, 'Bray Dunee'),
(60, 51, 68860, 50670, 'Brede'),
(61, 51, 165860, 82650, 'Brightlingsea'),
(62, 51, 70250, 50860, 'Broad Oak'),
(63, 20, 105150, 105400, 'Broad Salts'),
(64, 20, 105080, 105220, 'Broad Salts'),
(65, 20, 105020, 105120, 'Broad Salts'),
(66, 51, 1129890, 47400, 'Brompton'),
(67, 51, 75520, 67840, 'Brookland'),
(68, 10, 163120, 44200, 'Broomfeld Court'),
(69, 10, 115330, 91500, 'Broomfield'),
(70, 50, 99000, 235000, 'Brugge'),
(71, 50, 99000, 236000, 'Brugge'),
(72, 50, 98000, 235000, 'Brugge'),
(73, 50, 98000, 236000, 'Brugge'),
(74, 51, 79110, 195240, 'Bulskamp'),
(75, 10, 146160, 69290, 'Burnham-on-Crouch'),
(76, 51, 145410, 68240, 'Burnham-on-Crouch'),
(77, 10, 43450, 225640, 'Cajebert'),
(78, 50, 69430, 137960, 'Calais'),
(79, 50, 61950, 139000, 'Calais'),
(80, 50, 69800, 138520, 'Calais'),
(81, 50, 70000, 139500, 'Calais'),
(82, 20, 79080, 176220, 'CAM Dunkerque'),
(83, 20, 79480, 175960, 'CAM Dunkerque'),
(84, 10, 56940, 144090, 'Campagne'),
(85, 51, 144560, 62810, 'Canewdon'),
(86, 50, 105820, 85000, 'Canterbury'),
(87, 50, 105480, 85860, 'Canterbury'),
(88, 50, 106440, 85770, 'Canterbury'),
(89, 50, 106690, 84970, 'Canterbury'),
(90, 51, 133460, 52630, 'Canvey Island'),
(91, 10, 86790, 95880, 'Capel-le-Ferne'),
(92, 51, 63560, 165410, 'Cappell-Brouck'),
(93, 10, 74330, 175570, 'Cappelle Le Grand'),
(94, 51, 52290, 183680, 'Cassel'),
(95, 51, 100120, 71260, 'Challock'),
(96, 10, 42420, 226710, 'Chantrelle'),
(97, 51, 98980, 65220, 'Charing'),
(98, 51, 102670, 77850, 'Chartham'),
(99, 51, 118380, 46730, 'Chatham'),
(100, 51, 157480, 44680, 'Chelmsford'),
(101, 10, 163080, 89990, 'Clacton'),
(102, 50, 163540, 91500, 'Clacton-on-Sea'),
(103, 10, 50000, 171250, 'Clairmarais'),
(104, 10, 50000, 171250, 'Clairmarais'),
(105, 51, 48100, 170950, 'Clairmarais'),
(106, 20, 101260, 221470, 'Clemskerke'),
(107, 51, 101700, 222200, 'Clemskerke'),
(108, 20, 101570, 221070, 'Clemskerke'),
(109, 20, 101430, 221310, 'Clemskerke'),
(110, 51, 74460, 213660, 'Clercken'),
(111, 10, 56020, 154730, 'Cocove'),
(112, 51, 173200, 59550, 'Coggeshall'),
(113, 50, 174250, 75300, 'Colchester'),
(114, 50, 174690, 74230, 'Colchester'),
(115, 50, 174540, 73520, 'Colchester'),
(116, 20, 48750, 221600, 'Commines'),
(117, 20, 48740, 221560, 'Commines'),
(118, 20, 48580, 221890, 'Commines'),
(119, 20, 102420, 237340, 'Coolkereke'),
(120, 20, 102300, 236990, 'Coolkereke'),
(121, 20, 102600, 237550, 'Coolkereke'),
(122, 20, 102840, 237260, 'Coolkereke'),
(123, 51, 47970, 234840, 'Coolscamp'),
(124, 51, 77400, 223490, 'Cortemark'),
(125, 51, 85140, 218290, 'Couckelaere'),
(126, 10, 50770, 227220, 'Coucou'),
(127, 20, 74960, 179130, 'Coudekerque'),
(128, 20, 74960, 179260, 'Coudekerque'),
(129, 20, 74720, 178740, 'Coudekerque'),
(130, 20, 74910, 179480, 'Coudekerque'),
(131, 51, 55740, 239290, 'Courtai'),
(132, 51, 56130, 239730, 'Courtai'),
(133, 10, 86220, 194740, 'Coxyde'),
(134, 51, 48710, 176020, 'Creve Couer Farm'),
(135, 10, 49380, 176000, 'Creve Couer Farm'),
(136, 51, 71760, 45950, 'Cripp''s Corner'),
(137, 10, 66220, 178000, 'Crochte'),
(138, 10, 39640, 232450, 'Croix'),
(139, 10, 58310, 240510, 'Cueme'),
(140, 51, 155880, 52290, 'Danbury'),
(141, 51, 104880, 222370, 'De Haan'),
(142, 51, 99550, 107820, 'Deal'),
(143, 10, 65200, 227950, 'Den Aap'),
(144, 20, 109560, 51840, 'Detling'),
(145, 20, 109880, 51960, 'Detling'),
(146, 51, 78260, 210300, 'Dixmude'),
(147, 50, 88750, 100480, 'Dover'),
(148, 50, 89450, 101240, 'Dover'),
(149, 50, 90000, 100800, 'Dover'),
(150, 10, 90340, 102360, 'Dover (Guston Road)'),
(151, 20, 91460, 103920, 'Dover (Swingate)'),
(152, 20, 91570, 103910, 'Dover (Swingate)'),
(153, 20, 57920, 191200, 'Droglandt'),
(154, 20, 57690, 191420, 'Droglandt'),
(155, 10, 49700, 232080, 'Dronkart'),
(156, 10, 83280, 189670, 'Duinhoek'),
(157, 50, 78000, 176000, 'Dunkerque'),
(158, 50, 79000, 175150, 'Dunkerque'),
(159, 50, 79450, 176380, 'Dunkerque'),
(160, 50, 79200, 177670, 'Dunkerque'),
(161, 10, 81650, 81980, 'Dymchurch'),
(162, 51, 77810, 78790, 'Dymchurch'),
(163, 51, 179240, 60510, 'Earls Colne'),
(164, 51, 164480, 80500, 'East Mersea'),
(165, 20, 119580, 69690, 'Eastchurch'),
(166, 51, 120910, 69230, 'Eastchurch'),
(167, 20, 119520, 69680, 'Eastchurch'),
(168, 51, 102700, 101610, 'Eastry'),
(169, 10, 171560, 64150, 'Eastthorpe'),
(170, 51, 171650, 65930, 'Eastthorpe'),
(171, 10, 50290, 190990, 'Eecke'),
(172, 10, 76970, 237800, 'Eeghem'),
(173, 51, 75830, 238220, 'Eeghem'),
(174, 51, 91660, 87170, 'Elham'),
(175, 10, 86530, 222010, 'Engel'),
(176, 10, 61390, 172260, 'Eringhem'),
(177, 51, 182760, 97190, 'Erwarton'),
(178, 10, 40800, 162950, 'Esquerdes'),
(179, 51, 186300, 105120, 'Falkenham'),
(180, 51, 110690, 72020, 'Faversham'),
(181, 50, 182500, 105900, 'Felixstowe'),
(182, 50, 182220, 105070, 'Felixstowe'),
(183, 51, 171890, 42630, 'Felsted'),
(184, 50, 84020, 91580, 'Folkestone'),
(185, 50, 84500, 92000, 'Folkestone'),
(186, 50, 85000, 92440, 'Folkestone'),
(187, 51, 167670, 42290, 'Ford End'),
(188, 51, 187510, 92740, 'Freston'),
(189, 10, 106800, 59110, 'Frinsted'),
(190, 51, 167770, 97900, 'Frinton-on-Sea'),
(191, 51, 82560, 196280, 'Furries'),
(192, 51, 56090, 219920, 'Gheluvelt'),
(193, 10, 54240, 225440, 'Gheluwe'),
(194, 20, 93180, 216750, 'Ghistelles'),
(195, 51, 92010, 217500, 'Ghistelles'),
(196, 20, 93220, 216630, 'Ghistelles'),
(197, 51, 118770, 48520, 'Gillingham'),
(198, 10, 99620, 76280, 'Godmersham Park'),
(199, 10, 158120, 63070, 'Goldhanger'),
(200, 10, 125400, 59620, 'Grain'),
(201, 51, 126890, 60370, 'Grain'),
(202, 51, 73020, 158810, 'Gravelines'),
(203, 51, 169880, 85580, 'Great Bentley'),
(204, 51, 166780, 95250, 'Great Holland'),
(205, 51, 175940, 93730, 'Great Oakley'),
(206, 51, 52349, 151680, 'Guemy'),
(207, 10, 59650, 141410, 'Guines'),
(208, 51, 59560, 140320, 'Guines'),
(209, 10, 191610, 83000, 'Hadleigh'),
(210, 10, 50720, 229620, 'Halluin'),
(211, 51, 181250, 56380, 'Halstead'),
(212, 51, 82910, 69190, 'Hamstreet'),
(213, 20, 75450, 220140, 'Handzaeme'),
(214, 20, 75350, 219640, 'Handzaeme'),
(215, 20, 74740, 219590, 'Handzaeme'),
(216, 20, 74810, 219590, 'Handzaeme'),
(217, 20, 74900, 219920, 'Handzaeme'),
(218, 20, 74990, 219600, 'Handzaeme'),
(219, 20, 75750, 220380, 'Handzaeme'),
(220, 51, 53410, 136460, 'Hardinghen'),
(221, 51, 183700, 93720, 'Harkstead'),
(222, 10, 53860, 241650, 'Harlebeeke'),
(223, 51, 42840, 149100, 'Harlettes'),
(224, 51, 102760, 57710, 'Harrietsham'),
(225, 10, 116040, 72980, 'Harty'),
(226, 50, 180430, 101000, 'Harwich'),
(227, 50, 179590, 100390, 'Harwich'),
(228, 52, 179590, 101770, 'Harwich light'),
(229, 50, 59660, 47200, 'Hastings'),
(230, 50, 60630, 47690, 'Hastings'),
(231, 50, 60260, 48570, 'Hastings'),
(232, 50, 60650, 49600, 'Hastings'),
(233, 50, 60770, 50580, 'Hastings'),
(234, 50, 61340, 51260, 'Hastings'),
(235, 51, 162690, 53320, 'Hatfield Peverel'),
(236, 10, 87680, 91040, 'Hawkinge'),
(237, 51, 43020, 187440, 'Hazebrouck'),
(238, 51, 95020, 53300, 'Headcorn'),
(239, 51, 43250, 139040, 'Henneveux'),
(240, 51, 116200, 88840, 'Herne Bay'),
(241, 10, 44430, 239420, 'Herseaux'),
(242, 10, 37410, 239710, 'Herseaux South'),
(243, 10, 62110, 187840, 'Herzeele'),
(244, 51, 61740, 187640, 'Herzeele'),
(245, 10, 56880, 236220, 'Heule'),
(246, 51, 56700, 236920, 'Heule'),
(247, 10, 50870, 174590, 'Hey'),
(248, 51, 112560, 236540, 'Heyst'),
(249, 51, 185370, 78690, 'Higham'),
(250, 51, 142840, 56550, 'Hockley'),
(251, 20, 73270, 191410, 'Hondschoote'),
(252, 51, 72510, 191040, 'Hondschoote'),
(253, 20, 73410, 191420, 'Hondschoote'),
(254, 51, 72290, 216500, 'Honthulst'),
(255, 10, 54320, 173690, 'Hoog Huys'),
(256, 10, 68670, 237410, 'Hoogte'),
(257, 20, 75530, 193230, 'Houtem'),
(258, 20, 75860, 193200, 'Houtem'),
(259, 20, 75530, 193340, 'Houtem'),
(260, 10, 102840, 227440, 'Houttave'),
(261, 10, 98610, 40520, 'Hunton'),
(262, 51, 82840, 84860, 'Hythe'),
(263, 20, 82760, 224530, 'Ichteghem'),
(264, 20, 82870, 224180, 'Ichteghem'),
(265, 20, 83130, 224230, 'Ichteghem'),
(266, 10, 66980, 239470, 'Ingelmunster'),
(267, 10, 65050, 234830, 'Iseghem'),
(268, 51, 65600, 235210, 'Iseghem'),
(269, 10, 93530, 226100, 'Jabbeke'),
(270, 51, 95120, 226510, 'Jabbeke'),
(271, 51, 169010, 60350, 'Kelvendon'),
(272, 51, 50090, 208330, 'Kemmel'),
(273, 20, 123930, 52950, 'Kingsnorth'),
(274, 51, 88770, 69560, 'Kingsnorth'),
(275, 20, 123830, 52680, 'Kingsnorth'),
(276, 20, 123740, 52400, 'Kingsnorth'),
(277, 20, 124250, 53130, 'Kingsnorth'),
(278, 10, 187900, 101150, 'Kirton'),
(279, 51, 187100, 103260, 'Kirton'),
(280, 51, 113480, 239830, 'Knocke'),
(281, 10, 64490, 240950, 'Kriekhoek'),
(282, 10, 45620, 233560, 'La martiere'),
(283, 10, 84720, 192030, 'La Panne'),
(284, 51, 84990, 191250, 'La Panne'),
(285, 51, 138880, 40470, 'Laindon'),
(286, 10, 62230, 200480, 'Lalovie'),
(287, 51, 57120, 134500, 'Landrethun-le-Nord'),
(288, 51, 64750, 214480, 'Langemarek'),
(289, 51, 150400, 61060, 'Latchingdon'),
(290, 10, 48290, 227980, 'Le Belcamp'),
(291, 10, 42280, 206120, 'Le Creche'),
(292, 10, 54480, 146750, 'Le Fresne'),
(293, 20, 42400, 209680, 'Le Rossignol'),
(294, 20, 42320, 209590, 'Le Rossignol'),
(295, 20, 42000, 209920, 'Le Rossignol'),
(296, 51, 46320, 135870, 'Le Wast'),
(297, 20, 94990, 211510, 'Leffinghe'),
(298, 20, 94750, 211780, 'Leffinghe'),
(299, 10, 79330, 183290, 'Leffrinckhouke'),
(300, 10, 83260, 58310, 'Leigh Green'),
(301, 51, 136790, 55980, 'Leigh-on-Sea'),
(302, 20, 75300, 189290, 'Les Moeres'),
(303, 20, 75360, 189610, 'Les Moeres'),
(304, 20, 74960, 189180, 'Les Moeres'),
(305, 51, 187330, 98710, 'Levington'),
(306, 20, 118510, 74820, 'Leysdown'),
(307, 20, 118680, 75000, 'Leysdown'),
(308, 51, 119690, 74420, 'Leysdown-on-Sea'),
(309, 10, 79460, 229770, 'Lichtervelde'),
(310, 51, 50900, 144660, 'Licques'),
(311, 10, 45610, 226260, 'Linselles'),
(312, 51, 174820, 86000, 'Little Bentley'),
(313, 10, 168540, 91240, 'Little Clacton'),
(314, 51, 164350, 45110, 'Little Waltham'),
(315, 51, 44790, 141240, 'Longueville'),
(316, 51, 64950, 168940, 'Looberghe'),
(317, 51, 74030, 164640, 'Loon'),
(318, 10, 91110, 233340, 'Lophem'),
(319, 51, 92520, 233800, 'Lophem'),
(320, 20, 70800, 73270, 'Lydd'),
(321, 51, 70440, 72680, 'Lydd'),
(322, 20, 70860, 73310, 'Lydd'),
(323, 10, 84240, 80610, 'Lympne'),
(324, 10, 96370, 239540, 'Mael'),
(325, 51, 106360, 46710, 'Maidstone'),
(326, 51, 157290, 58550, 'Maldon'),
(327, 51, 180280, 85430, 'Manningtree'),
(328, 10, 113620, 104440, 'Manston'),
(329, 20, 113600, 104370, 'Manston'),
(330, 51, 68730, 146270, 'Marck'),
(331, 10, 52520, 237000, 'Marcke'),
(332, 10, 94820, 46200, 'Marden'),
(333, 51, 77290, 167230, 'Mardick'),
(334, 50, 117740, 106730, 'Margate'),
(335, 50, 118120, 107350, 'Margate'),
(336, 20, 98210, 211130, 'Mariakerke'),
(337, 20, 98320, 211350, 'Mariakerke'),
(338, 51, 173950, 66680, 'Marks Tey'),
(339, 10, 53840, 127180, 'Marquise'),
(340, 51, 54050, 128360, 'Marquise'),
(341, 10, 101800, 231220, 'Meetkerke'),
(342, 10, 54700, 230130, 'Menin'),
(343, 51, 52090, 229010, 'Menin'),
(344, 51, 69840, 208360, 'Merckem'),
(345, 51, 48770, 213380, 'Messines'),
(346, 10, 70540, 238420, 'Meulbeke'),
(347, 51, 111970, 102040, 'Minster'),
(348, 51, 56870, 232130, 'Moorseele'),
(349, 10, 62500, 225700, 'Moorslede'),
(350, 51, 62660, 224660, 'Moorslede'),
(351, 51, 50960, 161380, 'Moulle'),
(352, 10, 42650, 230450, 'Mouveaux'),
(353, 10, 62030, 230610, 'Nachtegal'),
(354, 51, 184420, 72650, 'Nayland'),
(355, 10, 75070, 75740, 'New Romney'),
(356, 51, 73840, 75230, 'New Romney'),
(357, 51, 89660, 202960, 'Nieuport'),
(358, 10, 138610, 47480, 'North Benfleet'),
(359, 51, 66090, 153630, 'Nouvelle Eglisse'),
(360, 51, 88100, 197440, 'Oost-Dunkerke'),
(361, 10, 91150, 235590, 'Oostcamp'),
(362, 51, 106080, 240740, 'Oostkerke'),
(363, 20, 68020, 222930, 'Oostnieuwkerke'),
(364, 51, 68090, 224870, 'Oostnieuwkerke'),
(365, 20, 68250, 223100, 'Oostnieuwkerke'),
(366, 10, 65420, 242220, 'Oostroosbake'),
(367, 50, 99700, 213380, 'Ostende'),
(368, 50, 100500, 214000, 'Ostende'),
(369, 10, 56010, 184930, 'Oudezeele'),
(370, 51, 41800, 120350, 'Outreau'),
(371, 51, 71950, 152500, 'Oye'),
(372, 10, 72800, 154440, 'Oyeplage'),
(373, 51, 166190, 72880, 'Peldon'),
(374, 20, 39790, 215590, 'Perenchies'),
(375, 20, 40310, 215570, 'Perenchies'),
(376, 20, 40120, 215720, 'Perenchies'),
(377, 20, 39710, 215190, 'Perenchies'),
(378, 10, 76560, 173960, 'Petite Synthe'),
(379, 51, 76420, 171930, 'Petite Synthe'),
(380, 51, 65120, 133790, 'Peuplingues'),
(381, 51, 71540, 201440, 'Pillonchove'),
(382, 51, 66740, 172500, 'Pitga'),
(383, 10, 94900, 61470, 'Pluckley'),
(384, 51, 95380, 62400, 'Pluckley'),
(385, 10, 59800, 200490, 'Poperinghe'),
(386, 51, 58330, 200700, 'Poperinghe'),
(387, 10, 64090, 195210, 'Proven'),
(388, 51, 62110, 195950, 'Proven'),
(389, 51, 152680, 57560, 'Purleigh'),
(390, 10, 44650, 158800, 'Quelmes'),
(391, 10, 43000, 222920, 'Quesnoy'),
(392, 51, 42750, 220390, 'Quesnoy'),
(393, 51, 178740, 96000, 'Ramsey'),
(394, 50, 111910, 108670, 'Ramsgate'),
(395, 50, 112350, 109400, 'Ramsgate'),
(396, 51, 53790, 203980, 'Reninghelst'),
(397, 51, 67940, 187340, 'Rexpoede'),
(398, 10, 139440, 59680, 'Richford'),
(399, 51, 139800, 60950, 'Richford'),
(400, 51, 95380, 106210, 'Ringwould'),
(401, 51, 74410, 42170, 'Robertsbridge'),
(402, 51, 64820, 194050, 'Roesbrugge-Haringe'),
(403, 20, 43930, 209040, 'Romarin'),
(404, 20, 43860, 208900, 'Romarin'),
(405, 51, 40370, 232610, 'Roubaix'),
(406, 50, 68800, 228700, 'Roulers'),
(407, 50, 68800, 229300, 'Roulers'),
(408, 50, 68800, 229800, 'Roulers'),
(409, 51, 93190, 221390, 'Roxem'),
(410, 51, 56830, 174800, 'Rubrouck'),
(411, 10, 68730, 226017, 'Rulers'),
(412, 20, 65890, 230180, 'Rumbeke'),
(413, 20, 65960, 229960, 'Rumbeke'),
(414, 20, 65940, 230520, 'Rumbeke'),
(415, 10, 145760, 47010, 'Runwell'),
(416, 10, 70650, 61930, 'Rye'),
(417, 51, 70250, 60340, 'Rye'),
(418, 51, 67980, 158740, 'Saint-Folquin'),
(419, 20, 78450, 173970, 'Saint-Pol-sur-Mer'),
(420, 51, 77530, 174820, 'Saint-Pol-sur-Mer'),
(421, 20, 78700, 173770, 'Saint-Pol-sur-Mer'),
(422, 20, 78150, 174260, 'Saint-Pol-sur-Mer'),
(423, 20, 78940, 174050, 'Saint-Pol-sur-Mer'),
(424, 20, 78430, 174340, 'Saint-Pol-sur-Mer'),
(425, 51, 62850, 159060, 'Sainte-Marie-Kerque'),
(426, 51, 163630, 68240, 'Salcott'),
(427, 51, 78660, 48329, 'Sandhurst'),
(428, 51, 105370, 103510, 'Sandwich'),
(429, 51, 68160, 132280, 'Sangatte'),
(430, 51, 112840, 96850, 'Sarre'),
(431, 20, 112860, 232170, 'Seeflugstation Flandern I'),
(432, 20, 113260, 232100, 'Seeflugstation Flandern I'),
(433, 20, 100410, 217100, 'Seeflugstation Flandern II'),
(434, 20, 100100, 217330, 'Seeflugstation Flandern II'),
(435, 20, 100370, 217380, 'Seeflugstation Flandern II'),
(436, 51, 42270, 160820, 'Setques'),
(437, 10, 124210, 63760, 'Sheerness'),
(438, 51, 124640, 63410, 'Sheerness'),
(439, 51, 105490, 71460, 'Sheldwich'),
(440, 51, 134710, 65520, 'Shoeburyness'),
(441, 51, 182760, 99720, 'Shotley'),
(442, 10, 182420, 52430, 'Sible Hedingham'),
(443, 51, 96150, 95700, 'Silberswold'),
(444, 51, 114110, 61090, 'Sittingbourne'),
(445, 51, 91230, 209460, 'Slype'),
(446, 51, 88410, 76550, 'Smeeth'),
(447, 10, 94850, 228230, 'Snelleghem'),
(448, 51, 66870, 179360, 'Socx'),
(449, 10, 97910, 79800, 'Sole Street'),
(450, 51, 148700, 54070, 'South Woodham Ferrers'),
(451, 50, 135680, 59700, 'Southend-on-Sea'),
(452, 50, 135610, 60530, 'Southend-on-Sea'),
(453, 51, 149460, 68800, 'Southminster'),
(454, 10, 86600, 225440, 'Sparappelhoek'),
(455, 51, 71210, 173000, 'Spicker'),
(456, 51, 92440, 105560, 'St Margaret''s at Cliffe'),
(457, 51, 92360, 106700, 'St Margarets Bay'),
(458, 51, 164390, 86190, 'St Osyth'),
(459, 10, 60120, 131320, 'St. Ingelvert'),
(460, 20, 45960, 223320, 'St. Marguerite'),
(461, 20, 45650, 223560, 'St. Marguerite'),
(462, 20, 46260, 223240, 'St. Marguerite'),
(463, 10, 50280, 185390, 'St. Marie Cappel'),
(464, 20, 44150, 166390, 'St. Omer'),
(465, 50, 46600, 167940, 'St. Omer'),
(466, 20, 44210, 166460, 'St. Omer'),
(467, 51, 71430, 221590, 'Staden'),
(468, 10, 100710, 224900, 'Stalhille'),
(469, 51, 133380, 40470, 'Stanford-le-Hope'),
(470, 51, 53230, 190670, 'Steenvoorde'),
(471, 10, 40500, 203720, 'Steenwerck'),
(472, 51, 41500, 203510, 'Steenwerck'),
(473, 51, 152910, 67060, 'Steeple'),
(474, 20, 97960, 214070, 'Stene'),
(475, 20, 97810, 214210, 'Stene'),
(476, 20, 97960, 214070, 'Stene'),
(477, 51, 150100, 42350, 'Stock'),
(478, 10, 150880, 55030, 'Stow Maries'),
(479, 51, 183350, 79670, 'Stratford St Mary'),
(480, 51, 119980, 44800, 'Strood'),
(481, 51, 108810, 88280, 'Sturry'),
(482, 10, 92460, 93740, 'Swingfield'),
(483, 51, 83840, 57810, 'Tenterden'),
(484, 51, 165790, 51410, 'Terling'),
(485, 10, 76470, 181400, 'Teteghem'),
(486, 52, 44650, 120210, 'the Boulogne jetty light'),
(487, 52, 71380, 138610, 'the Calais jetty light'),
(488, 52, 65860, 77000, 'the Dungeness light'),
(489, 52, 80800, 174770, 'the Dunkerque jetty light'),
(490, 52, 83600, 93600, 'the Folkestone pier light'),
(491, 52, 59080, 48950, 'the Hastings light'),
(492, 52, 116540, 111020, 'the North Foreland light'),
(493, 52, 101700, 213780, 'the Ostende pier light'),
(494, 52, 111100, 109470, 'the Ramsgate west pier light'),
(495, 51, 77240, 59460, 'The Stocks'),
(496, 52, 114190, 233540, 'the Zeebrugge breakwater light'),
(497, 10, 77120, 241320, 'Thielt'),
(498, 51, 171000, 92420, 'Thorpe-le-Sok'),
(499, 51, 82100, 227290, 'Thourcut'),
(500, 10, 102200, 69280, 'Throwley'),
(501, 51, 153840, 72590, 'Tillingham'),
(502, 51, 49330, 166180, 'Tilques'),
(503, 51, 165940, 63480, 'Tiptree'),
(504, 51, 158800, 70630, 'Tollesbury'),
(505, 51, 161910, 67170, 'Tolleshunt D''Arcy'),
(506, 51, 43750, 231270, 'Tourcoing'),
(507, 51, 185910, 102340, 'Trimley St Martin'),
(508, 20, 108260, 228580, 'Utykerke'),
(509, 20, 108280, 228430, 'Utykerke'),
(510, 10, 97310, 231400, 'Varsenaire'),
(511, 51, 86340, 230830, 'Veldeghem'),
(512, 51, 44640, 153910, 'Vest Beaucourt'),
(513, 20, 103860, 222920, 'Vilsseghem'),
(514, 20, 103480, 222770, 'Vilsseghem'),
(515, 20, 103560, 222850, 'Vilsseghem'),
(516, 51, 178660, 64630, 'Wakes Colne'),
(517, 10, 96570, 107590, 'Walmer'),
(518, 51, 97340, 80590, 'Waltham'),
(519, 51, 169680, 99220, 'Walton-on-the-Naze'),
(520, 51, 183810, 104220, 'Walwon'),
(521, 10, 39680, 225070, 'Wambrechies'),
(522, 51, 171200, 89020, 'Weeley'),
(523, 51, 107730, 225340, 'Wenduyne'),
(524, 51, 50290, 223010, 'Wervicq'),
(525, 10, 50890, 224480, 'Wervicq'),
(526, 10, 65520, 185740, 'West Cappelle'),
(527, 51, 162160, 74360, 'West Mersea'),
(528, 10, 117190, 102830, 'Westgate-on-Sea'),
(529, 51, 117160, 103690, 'Westgate-on-Sea'),
(530, 10, 54240, 233500, 'Wevelghem'),
(531, 51, 169250, 53080, 'White Notley'),
(532, 51, 115050, 81790, 'Whitstable'),
(533, 51, 144160, 47270, 'Wickford'),
(534, 10, 156840, 42960, 'Widford'),
(535, 51, 94910, 208930, 'Wilskerke'),
(536, 51, 48260, 123840, 'Wimille'),
(537, 51, 67320, 58580, 'Winchelsea'),
(538, 51, 105410, 94880, 'Wingham'),
(539, 51, 61350, 126050, 'Wissant'),
(540, 51, 165150, 56330, 'Witham'),
(541, 10, 78160, 57750, 'Wittersham'),
(542, 51, 171330, 78280, 'Wivenhoe'),
(543, 51, 177310, 92010, 'Wix'),
(544, 51, 83410, 63780, 'Woodchurch'),
(545, 51, 61400, 182630, 'Wormhout'),
(546, 10, 180530, 67620, 'Wormingford'),
(547, 10, 157730, 42060, 'Writtle'),
(548, 20, 96570, 73810, 'Wye'),
(549, 20, 96700, 73870, 'Wye'),
(550, 20, 96830, 73970, 'Wye'),
(551, 10, 81750, 238410, 'Wynghene'),
(552, 50, 58000, 212000, 'Ypres'),
(553, 10, 88260, 214360, 'Zande'),
(554, 51, 76680, 217440, 'Zarren'),
(555, 50, 111640, 234380, 'Zeebrugge'),
(556, 50, 111740, 233000, 'Zeebrugge'),
(557, 50, 111300, 232140, 'Zeebrugge'),
(558, 51, 62010, 176890, 'Zegers-Cappel'),
(559, 51, 60220, 218390, 'Zennebeke'),
(560, 51, 81290, 184330, 'Zuydcoote'),
(561, 20, 80810, 183610, 'Zuydcoote'),
(562, 10, 104610, 228520, 'Zuyenkerke'),
(563, 10, 82130, 187050, 'Zuylcoote');

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
  `plid` mediumint(1) NOT NULL DEFAULT '0',
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
  `plid` mediumint(1) NOT NULL DEFAULT '0',
  `PilotFate` tinyint(1) NOT NULL DEFAULT '0',
  `PilotHealth` tinyint(1) NOT NULL DEFAULT '0',
  `PilotNegScore` int(1) NOT NULL DEFAULT '0',
  `PilotPosScore` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
