-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2013 at 12:06 AM
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
-- Table structure for table `campaign_missions`
--

DROP TABLE IF EXISTS `campaign_missions`;
CREATE TABLE IF NOT EXISTS `campaign_missions` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `mission_number` smallint(1) unsigned NOT NULL,
  `mission_file` varchar(50) NOT NULL,
  `mission_log` varchar(50) NOT NULL,
  `MissionID` varchar(50) NOT NULL,
  `mission_status` tinyint(1) NOT NULL,
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
  `show_airfield` tinyint(1) NOT NULL,
  `finish_flight_only_landed` tinyint(1) NOT NULL,
  `logpath` varchar(60) NOT NULL,
  `log_prefix` varchar(50) NOT NULL,
  `logfile` varchar(50) NOT NULL,
  `kia_pilot` smallint(1) NOT NULL,
  `mia_pilot` smallint(1) NOT NULL,
  `critical_w_pilot` smallint(1) NOT NULL,
  `serious_w_pilot` smallint(1) NOT NULL,
  `light_w_pilot` smallint(1) NOT NULL,
  `kia_gunner` smallint(1) NOT NULL,
  `mia_gunner` smallint(1) NOT NULL,
  `critical_w_gunner` smallint(1) NOT NULL,
  `serious_w_gunner` smallint(1) NOT NULL,
  `light_w_gunner` smallint(1) NOT NULL,
  `healthy` smallint(1) NOT NULL DEFAULT '0',
  `min_x` mediumint(1) NOT NULL,
  `min_z` mediumint(1) NOT NULL,
  `max_x` mediumint(1) NOT NULL,
  `max_z` mediumint(1) NOT NULL,
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
(1, 'RoF', 'Skies of the Empires', 'skies_of_the_empires', 'localhost', 'rofwar', 'rofwar', 'Verdun', 'rof_verdun_locations', '3', 0, 1, 'logs', 'missionReportSoE', '', 100, 50, 30, 20, 10, 50, 50, 30, 20, 10, 0, 0, 0, 0, 0, 5000, 500, '2', '2', 50, 10, 5, 30, 90);

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
(1, 'British Commonwealth & Allied Forces'),
(2, 'U.S.A. and Central Alliance'),
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
(2, 101, 'France', 'French', 2),
(3, 102, 'Great Britain', 'British', 1),
(4, 103, 'USA', 'American', 2),
(5, 104, 'Italy', 'Italian', 1),
(6, 105, 'Russia', 'Russian', 1),
(7, 501, 'Germany', 'German', 2),
(8, 502, 'Austro-Hungary', 'Austro-Hungarian', 2),
(9, 600, 'Future Country', 'Future', 0),
(10, 610, 'War Dogs Country', 'War Dogs', 0),
(11, 620, 'Mercenaries Country', 'Mercenaries', 0),
(12, 630, 'Knights Country', 'Knights', 0),
(13, 640, 'Corsairs Country', 'Corsairs', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rof_gunner_scores`
--

DROP TABLE IF EXISTS `rof_gunner_scores`;
CREATE TABLE IF NOT EXISTS `rof_gunner_scores` (
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `MissionID` varchar(50) NOT NULL,
  `CoalID` tinyint(1) unsigned NOT NULL,
  `country` smallint(1) NOT NULL,
  `GunnerName` varchar(40) NOT NULL,
  `mgid` smallint(1) NOT NULL,
  `GunningFor` varchar(40) NOT NULL,
  `GunnerFate` tinyint(1) NOT NULL,
  `GunnerHealth` tinyint(1) NOT NULL,
  `GunnerNegScore` int(1) NOT NULL,
  `GunnerPosScore` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `attackerCountryID` smallint(1) NOT NULL,
  `attackerCoalID` tinyint(1) unsigned NOT NULL,
  `action` varchar(20) NOT NULL,
  `targetID` mediumint(1) NOT NULL,
  `targetClass` varchar(8) NOT NULL,
  `targetType` varchar(50) NOT NULL,
  `targetName` varchar(50) NOT NULL,
  `targetCountryID` smallint(1) unsigned NOT NULL,
  `targetCoalID` tinyint(1) unsigned NOT NULL,
  `targetValue` smallint(1) NOT NULL,
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `object_type` (`object_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=236 ;

--
-- Dumping data for table `rof_object_properties`
--

INSERT INTO `rof_object_properties` (`id`, `object_type`, `object_class`, `object_value`) VALUES
(1, '13PdrAAA', 'AAA', 80),
(2, '13PrdaaaAttached', 'AAA', 80),
(3, '45QF', 'ART', 100),
(4, '75FG1897', 'ART', 100),
(5, '77mmAAA', 'AAA', 80),
(6, '77mmAAAAttached', 'AAA', 80),
(7, 'A7V', 'T', 100),
(8, 'AeType', 'BAL', 50),
(9, 'Airco D.H.2', 'PFI', 100),
(10, 'Airco D.H.4', 'PRE', 200),
(11, 'Albatros D.II', 'PFI', 100),
(12, 'Albatros D.II lt', 'PFI', 100),
(13, 'Albatros D.III', 'PFI', 100),
(14, 'Albatros D.Va', 'PFI', 100),
(15, 'Benz Searchlight', 'VTR', 50),
(16, 'benz_open', 'VTR', 50),
(17, 'benz_p', 'VTR', 50),
(18, 'benz_soft', 'VTR', 50),
(19, 'BotBoatSwain', 'BOT', 0),
(20, 'BotGunner', 'BOT', 0),
(21, 'BotGunnerBacker', 'BOT', 0),
(22, 'BotGunnerBreguet14', 'BOT', 0),
(23, 'BotGunnerBreguet14_1', 'BOT', 0),
(24, 'BotGunnerBW12', 'BOT', 0),
(25, 'BotGunnerDavis', 'BOT', 0),
(26, 'BotGunnerFe2_sing', 'BOT', 0),
(27, 'BotGunnerFelix_top-twin', 'BOT', 0),
(28, 'BotGunnerG5_1', 'BOT', 0),
(29, 'BotGunnerG5_2', 'BOT', 0),
(30, 'BotGunnerHCL2', 'BOT', 0),
(31, 'BotGunnerHP400_1', 'BOT', 0),
(32, 'BotGunnerHP400_2', 'BOT', 0),
(33, 'BotGunnerHP400_2_WM', 'BOT', 0),
(34, 'BotGunnerHP400_3', 'BOT', 0),
(35, 'BotGunnerRE8', 'BOT', 0),
(36, 'Brandenburg W12', 'PSE', 200),
(37, 'Breguet 14.B2', 'PRE', 200),
(38, 'bridge_hw110', 'INF', 0),
(39, 'bridge_hw130', 'INF', 0),
(40, 'bridge_hw150', 'INF', 0),
(41, 'bridge_hw170', 'INF', 0),
(42, 'bridge_hw190', 'INF', 0),
(43, 'bridge_hw40', 'INF', 0),
(44, 'bridge_hw70', 'INF', 0),
(45, 'bridge_hw90', 'INF', 0),
(46, 'bridge_rr110', 'INF', 0),
(47, 'bridge_rr130', 'INF', 0),
(48, 'bridge_rr150', 'INF', 0),
(49, 'bridge_rr170', 'INF', 0),
(50, 'bridge_rr190', 'INF', 0),
(51, 'bridge_rr70', 'INF', 0),
(52, 'bridge_rr90', 'INF', 0),
(53, 'Bristol F2B (F.II)', 'PRE', 200),
(54, 'Bristol F2B (F.III)', 'PRE', 200),
(55, 'British naval 12pdr gun', 'NAR', 0),
(56, 'British naval 4in AAA gun', 'NAA', 80),
(57, 'British naval 4in gun', 'NAR', 0),
(58, 'British navel 6in gun', 'NAR', 0),
(59, 'Ca1', 'T', 100),
(60, 'CappyChateau', 'INF', 0),
(61, 'Caquot', 'BAL', 50),
(62, 'Cargo Ship', 'STR', 300),
(63, 'churchE_01', 'INF', 0),
(64, 'Common Bot', 'HUM', 0),
(65, 'Crossley', 'VTR', 50),
(66, 'DaimlerAAA', 'VAA', 80),
(67, 'DaimlerMarienfelde', 'VTR', 50),
(68, 'DaimlerMarienfelde_S', 'VTR', 50),
(69, 'DFW C.V', 'PRE', 200),
(70, 'Drachen', 'BAL', 50),
(71, 'F.E.2b', 'PRE', 200),
(72, 'F17M', 'T', 100),
(73, 'factory_01', 'INF', 0),
(74, 'factory_02', 'INF', 0),
(75, 'factory_03', 'INF', 0),
(76, 'factory_04', 'INF', 0),
(77, 'factory_05', 'INF', 0),
(78, 'factory_06', 'INF', 0),
(79, 'factory_07', 'INF', 0),
(80, 'factory_08', 'INF', 0),
(81, 'Felixstowe F2A', 'PSE', 200),
(82, 'FK96', 'ART', 100),
(83, 'Flag', 'FLG', 0),
(84, 'Fokker D.VII', 'PFI', 100),
(85, 'Fokker D.VIIF', 'PFI', 100),
(86, 'Fokker D.VIII', 'PFI', 100),
(87, 'Fokker Dr.I', 'PFI', 100),
(88, 'Fokker E.III', 'PFI', 100),
(89, 'FrpenicheAAA', 'SAA', 80),
(90, 'fr_lrg', 'INF', 0),
(91, 'fr_med', 'INF', 0),
(92, 'FT17C', 'T', 100),
(93, 'G8', 'RLO', 50),
(94, 'GBR Searchlight', 'LGT', 50),
(95, 'GER light cruiser', 'SCR', 1000),
(96, 'GER Ship Searchlight', 'LGT', 50),
(97, 'GER submarine', 'SSU', 500),
(98, 'German naval 105mm gun', 'NAR', 0),
(99, 'German naval 52mm gun', 'NAR', 0),
(100, 'GERpenicheAAA', 'SAA', 80),
(101, 'ger_lrg', 'INF', 0),
(102, 'ger_med', 'INF', 0),
(103, 'Gotha G.V', 'PBO', 200),
(104, 'gunpos01', 'INF', 0),
(105, 'gunpos_g01', 'INF', 0),
(106, 'Halberstadt CL.II', 'PRE', 200),
(107, 'Halberstadt CL.II 200hp', 'PRE', 200),
(108, 'Halberstadt D.II', 'PFI', 100),
(109, 'Handley Page 0-400', 'PBO', 200),
(110, 'HMS light cruiser', 'SCR', 1000),
(111, 'HMS Ship Searchlight', 'LGT', 50),
(112, 'HMS submarine', 'SSU', 500),
(113, 'Hotchkiss', 'IMG', 50),
(114, 'HotchkissAAA', 'IMA', 80),
(115, 'Leyland', 'VTR', 50),
(116, 'LeylandS', 'VTR', 50),
(117, 'LMG08AAA', 'IMA', 80),
(118, 'LMGO8', 'IMG', 50),
(119, 'M-Flak', 'IMA', 80),
(120, 'm13', 'ART', 100),
(121, 'Merc22', 'VTR', 50),
(122, 'Mk4F', 'T', 100),
(123, 'Mk4FGER', 'T', 100),
(124, 'Mk4M', 'T', 100),
(125, 'MK4MGER', 'T', 100),
(126, 'Mk5F', 'T', 100),
(127, 'Mk5M', 'T', 100),
(128, 'Nieuport 11.C1', 'PFI', 100),
(129, 'Nieuport 17.C1', 'PFI', 100),
(130, 'Nieuport 17.C1 GBR', 'PFI', 100),
(131, 'Nieuport 28.C1', 'PFI', 100),
(132, 'Parseval', 'BAL', 50),
(133, 'Passenger Ship', 'SPA', 300),
(134, 'Pfalz D.IIIa', 'PFI', 100),
(135, 'Pfalz D.XII', 'PFI', 100),
(136, 'pillbox01', 'INF', 0),
(137, 'pillbox02', 'INF', 0),
(138, 'pillbox03', 'INF', 0),
(139, 'pillbox04', 'INF', 0),
(140, 'Portal', 'INF', 0),
(141, 'Quad', 'VTR', 50),
(142, 'Quad Searchlight', 'VTR', 50),
(143, 'QuadA', 'VTR', -50),
(144, 'R.E.8', 'PRE', 200),
(145, 'railwaystation_1', 'INF', 0),
(146, 'railwaystation_2', 'INF', 0),
(147, 'railwaystation_3', 'INF', 0),
(148, 'railwaystation_4', 'INF', 0),
(149, 'railwaystation_5', 'INF', 0),
(150, 'river_airbase', 'INF', 0),
(151, 'river_airbase2', 'INF', 0),
(152, 'river_airbase3', 'INF', 0),
(153, 'Roland C.IIa', 'PRE', 200),
(154, 'Roucourt', 'INF', 0),
(155, 'rwstation', 'INF', 0),
(156, 'S.E.5a', 'PFI', 100),
(157, 'ship_stat_cargo', 'STR', 150),
(158, 'ship_stat_pass', 'SPA', 150),
(159, 'ship_stat_tank', 'STR', 150),
(160, 'Sopwith Camel', 'PFI', 100),
(161, 'Sopwith Dolphin', 'PFI', 100),
(162, 'Sopwith Pup', 'PFI', 100),
(163, 'Sopwith Triplane', 'PFI', 100),
(164, 'SPAD 13.C1', 'PFI', 100),
(165, 'SPAD 7.C1 150hp', 'PFI', 100),
(166, 'SPAD 7.C1 180hp', 'PFI', 100),
(167, 'StChamond', 'T', 100),
(168, 'Tanker Ship', 'STR', 300),
(169, 'tent01', 'INF', 1000),
(170, 'tent02', 'INF', 0),
(171, 'tent03', 'INF', 0),
(172, 'tent_camp01', 'INF', 0),
(173, 'tent_camp02', 'INF', 0),
(174, 'tent_camp03', 'INF', 0),
(175, 'tent_camp04', 'INF', 0),
(176, 'thornycroftaaa', 'VAA', 80),
(177, 'TurretBreguet14_1', 'TUR', 0),
(178, 'TurretBristolF2BF2_1_WM2', 'TUR', 0),
(179, 'TurretBristolF2BF3_1_WM2', 'TUR', 0),
(180, 'TurretBristolF2B_1', 'TUR', 0),
(181, 'TurretBW12_1', 'TUR', 0),
(182, 'TurretBW12_1_WM_Becker_AP', 'TUR', 0),
(183, 'TurretBW12_1_WM_Becker_HE', 'TUR', 0),
(184, 'TurretBW12_1_WM_Becker_HEAP', 'TUR', 0),
(185, 'TurretBW12_1_WM_Twin_Parabellum', 'TUR', 0),
(186, 'TurretDFWC_1', 'TUR', 0),
(187, 'TurretDFWC_1_WM_Becker_AP', 'TUR', 0),
(188, 'TurretDFWC_1_WM_Becker_HE', 'TUR', 0),
(189, 'TurretDFWC_1_WM_Becker_HEAP', 'TUR', 0),
(190, 'TurretDFWC_1_WM_Twin_Parabellum', 'TUR', 0),
(191, 'TurretDH4_1', 'TUR', 0),
(192, 'TurretDH4_1_WM', 'TUR', 0),
(193, 'TurretFe2b_1', 'TUR', 0),
(194, 'TurretFe2b_1_WM', 'TUR', 0),
(195, 'TurretFelixF2A_2', 'TUR', 0),
(196, 'TurretFelixF2A_3', 'TUR', 0),
(197, 'TurretFelixF2A_3_WM', 'TUR', 0),
(198, 'TurretGothaG5_1', 'TUR', 0),
(199, 'TurretGothaG5_1_WM_Becker_AP', 'TUR', 0),
(200, 'TurretGothaG5_1_WM_Becker_HE', 'TUR', 0),
(201, 'TurretGothaG5_1_WM_Becker_HEAP', 'TUR', 0),
(202, 'TurretGothaG5_2', 'TUR', 0),
(203, 'TurretGothaG5_2_WM_Twin_Parabellum', 'TUR', 0),
(204, 'TurretHalberstadtCL2au_1', 'TUR', 0),
(205, 'TurretHalberstadtCL2au_1_WM_TwinPar', 'TUR', 0),
(206, 'TurretHalberstadtCL2_1', 'TUR', 0),
(207, 'TurretHalberstadtCL2_1_WM_TwinPar', 'TUR', 0),
(208, 'TurretHP400_1', 'TUR', 0),
(209, 'TurretHP400_1_WM', 'TUR', 0),
(210, 'TurretHP400_2', 'TUR', 0),
(211, 'TurretHP400_2_WM', 'TUR', 0),
(212, 'TurretHP400_3', 'TUR', 0),
(213, 'TurretRE8_1', 'TUR', 0),
(214, 'TurretRE8_1_WM', 'TUR', 0),
(215, 'TurretRolandC2a_1', 'TUR', 0),
(216, 'TurretRolandC2a_1_WM_TwinPar', 'TUR', 0),
(217, 'Wagon_BoxB', 'RWA', 25),
(218, 'Wagon_BoxNB', 'RWA', 25),
(219, 'Wagon_G8T', 'RWA', 25),
(220, 'Wagon_GondolaB', 'RWA', 25),
(221, 'Wagon_GondolaNB', 'RWA', 25),
(222, 'Wagon_Pass', 'RWA', 25),
(223, 'Wagon_PassA', 'RWA', -25),
(224, 'Wagon_PassAC', 'RWA', 25),
(225, 'Wagon_PassC', 'RWA', 25),
(226, 'Wagon_PlatformA7V', 'RWA', 25),
(227, 'Wagon_PlatformB', 'RWA', 25),
(228, 'Wagon_PlatformEmptyB', 'RWA', 25),
(229, 'Wagon_PlatformEmptyNB', 'RWA', 25),
(230, 'Wagon_PlatformMk4', 'RWA', 25),
(231, 'Wagon_PlatformNB', 'RWA', 25),
(232, 'Wagon_TankB', 'RWA', 25),
(233, 'Wagon_TankNB', 'RWA', 25),
(234, 'Whippet', 'T', 100),
(235, 'Windsock', 'FLG', 0);

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
  `MissionID` varchar(50) NOT NULL,
  `CoalID` tinyint(3) unsigned NOT NULL,
  `country` smallint(1) NOT NULL,
  `PilotName` varchar(40) NOT NULL,
  `mpid` smallint(1) NOT NULL,
  `PilotFate` tinyint(1) NOT NULL,
  `PilotHealth` tinyint(1) NOT NULL,
  `PilotNegScore` int(1) NOT NULL,
  `PilotPosScore` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
-- Table structure for table `supply_points`
--

DROP TABLE IF EXISTS `supply_points`;
CREATE TABLE IF NOT EXISTS `supply_points` (
  `id` tinyint(1) NOT NULL,
  `xPos` smallint(1) NOT NULL,
  `zPos` smallint(6) NOT NULL,
  `CoalID` smallint(6) NOT NULL,
  `supplypointName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplypointName` (`supplypointName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
