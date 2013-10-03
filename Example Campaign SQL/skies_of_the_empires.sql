-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 03, 2013 at 07:35 PM
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
  `simulation` varchar(6) NOT NULL,
  `campaign` varchar(30) NOT NULL,
  `camp_db` varchar(30) NOT NULL,
  `camp_host` varchar(30) NOT NULL,
  `camp_user` varchar(30) NOT NULL,
  `camp_passwd` varchar(30) NOT NULL,
  `map` varchar(30) NOT NULL,
  `map_locations` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '4',
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
  `healthy` smallint(1) NOT NULL,
  `min_x` mediumint(1) NOT NULL,
  `min_z` mediumint(1) NOT NULL,
  `max_x` mediumint(1) NOT NULL,
  `max_z` mediumint(1) NOT NULL,
  `visibility` smallint(1) NOT NULL,
  `duration` smallint(1) NOT NULL,
  `grounddistance` smallint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `campaign` (`campaign`),
  UNIQUE KEY `camp_db` (`camp_db`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `campaign_settings`
--

INSERT INTO `campaign_settings` (`id`, `simulation`, `campaign`, `camp_db`, `camp_host`, `camp_user`, `camp_passwd`, `map`, `map_locations`, `status`, `show_airfield`, `finish_flight_only_landed`, `logpath`, `log_prefix`, `logfile`, `kia_pilot`, `mia_pilot`, `critical_w_pilot`, `serious_w_pilot`, `light_w_pilot`, `kia_gunner`, `mia_gunner`, `critical_w_gunner`, `serious_w_gunner`, `light_w_gunner`, `healthy`, `min_x`, `min_z`, `max_x`, `max_z`, `visibility`, `duration`, `grounddistance`) VALUES
(7, 'RoF', 'Skies of the Empires', 'skies_of_the_empires', 'localhost', 'rofwar', 'rofwar', 'Verdun', 'rof_verdun_locations', 3, 0, 1, 'logs', 'missionReportSoE', 'missionReportSoE1.txt', 100, 50, 30, 20, 10, 50, 50, 30, 20, 10, 0, 0, 0, 0, 0, 0, 0, 0);

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
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `mission_status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `mission_status`
--

INSERT INTO `mission_status` (`id`, `mission_status`) VALUES
(1, 'initialized'),
(2, 'moving units'),
(3, 'planning'),
(4, 'built'),
(5, 'analyzing'),
(6, 'scored');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `rof_gunner_scores`
--

INSERT INTO `rof_gunner_scores` (`id`, `MissionID`, `CoalID`, `country`, `GunnerName`, `mgid`, `GunningFor`, `GunnerFate`, `GunnerHealth`, `GunnerNegScore`, `GunnerPosScore`) VALUES
(1, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=CAI= Itafolgore', 25, '=CAI= Cix', 5, 4, 50, 0),
(2, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, 'Vladi', 23, '=69.GIAP=STENKA', 5, 4, 50, 0),
(3, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, 'Vladi', 24, '=69.GIAP=TUSHKA', 1, 0, 0, 0),
(4, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '-NW-Rossolini', 25, '=CAI= Cix', 5, 4, 50, 0),
(5, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '-NW-Rossolini', 26, '=CAI= Piddu', 1, 0, 0, 0),
(6, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=CAI= Cix', 27, '=CAI= Itafolgore', 1, 0, 0, 0),
(7, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '-NW-Rossolini', 28, '=CAI= Piddu', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `rof_kills`
--

DROP TABLE IF EXISTS `rof_kills`;
CREATE TABLE IF NOT EXISTS `rof_kills` (
  `id` smallint(1) unsigned NOT NULL,
  `MissionID` varchar(50) NOT NULL,
  `clocktime` time NOT NULL,
  `attackerID` mediumint(1) NOT NULL,
  `attackerName` varchar(50) NOT NULL,
  `attackerCountry` smallint(1) NOT NULL,
  `attackerCoalID` tinyint(1) unsigned NOT NULL,
  `targetID` mediumint(1) NOT NULL,
  `targetName` varchar(50) NOT NULL,
  `targetCountry` smallint(1) unsigned NOT NULL,
  `targetCoalID` tinyint(1) unsigned NOT NULL,
  `targetValue` smallint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=234 ;

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
(11, 'Albatros D.II', 'PFI', 199),
(12, 'Albatros D.II lt', 'PFI', 100),
(13, 'Albatros D.Va', 'PFI', 100),
(14, 'Albatros D.III', 'PFI', 100),
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
(55, 'British naval 4in AAA gun', 'NAA', 80),
(56, 'British naval 4in gun', 'NAR', 0),
(57, 'British navel 6in gun', 'NAR', 0),
(58, 'Ca1', 'T', 100),
(59, 'Caquot', 'BAL', 50),
(60, 'Cargo Ship', 'STR', 300),
(61, 'Common Bot', 'BOT', 0),
(62, 'Crossley', 'VTR', 50),
(63, 'DaimlerAAA', 'VAA', 80),
(64, 'DaimlerMarienfelde', 'VTR', 50),
(65, 'DaimlerMarienfelde_S', 'VTR', 50),
(66, 'DFW C.V', 'PRE', 200),
(67, 'Drachen', 'BAL', 50),
(68, 'F.E.2b', 'PRE', 200),
(69, 'F17M', 'T', 100),
(70, 'factory_01', 'INF', 0),
(71, 'factory_02', 'INF', 0),
(72, 'factory_03', 'INF', 0),
(73, 'factory_04', 'INF', 0),
(74, 'factory_05', 'INF', 0),
(75, 'factory_06', 'INF', 0),
(76, 'factory_07', 'INF', 0),
(77, 'factory_08', 'INF', 0),
(78, 'Felixstowe F2A', 'PSE', 200),
(79, 'FK96', 'ART', 100),
(80, 'Flag', 'FLG', 0),
(81, 'Fokker D.VII', 'PFI', 100),
(82, 'Fokker D.VIIF', 'PFI', 100),
(83, 'Fokker D.VIII', 'PFI', 100),
(84, 'Fokker Dr.I', 'PFI', 100),
(85, 'Fokker E.III', 'PFI', 100),
(86, 'FrpenicheAAA', 'SAA', 80),
(87, 'fr_lrg', 'INF', 0),
(88, 'fr_med', 'INF', 0),
(89, 'FT17C', 'T', 100),
(90, 'G8', 'RLO', 50),
(91, 'GER light cruiser', 'SCR', 1000),
(92, 'GER submarine', 'SSU', 500),
(93, 'GERpenicheAAA', 'SAA', 80),
(94, 'ger_lrg', 'INF', 0),
(95, 'ger_med', 'INF', 0),
(96, 'Gotha G.V', 'PBO', 200),
(97, 'gunpos01', 'INF', 0),
(98, 'gunpos_g01', 'INF', 0),
(99, 'Halberstadt CL.II', 'PRE', 200),
(100, 'Halberstadt CL.II 200hp', 'PRE', 200),
(101, 'Halberstadt D.II', 'PFI', 100),
(102, 'Handley Page 0-400', 'PBO', 200),
(103, 'HMS light cruiser', 'SCR', 1000),
(104, 'HMS submarine', 'SSU', 500),
(105, 'Hotchkiss', 'IMG', 50),
(106, 'HotchkissAAA', 'IMA', 80),
(107, 'Leyland', 'VTR', 50),
(108, 'LeylandS', 'VTR', 50),
(109, 'LMG08AAA', 'IMA', 80),
(110, 'LMGO8', 'IMG', 50),
(111, 'M-Flak', 'IMA', 80),
(112, 'm13', 'ART', 100),
(113, 'Merc22', 'VTR', 50),
(114, 'Mk4F', 'T', 100),
(115, 'Mk4FGER', 'T', 100),
(116, 'Mk4M', 'T', 100),
(117, 'MK4MGER', 'T', 100),
(118, 'Mk5F', 'T', 100),
(119, 'Mk5M', 'T', 100),
(120, 'Nieuport 11.C1', 'PFI', 100),
(121, 'Nieuport 17.C1', 'PFI', 100),
(122, 'Nieuport 17.C1 GBR', 'PFI', 100),
(123, 'Nieuport 28.C1', 'PFI', 100),
(124, 'Parseval', 'BAL', 50),
(125, 'Passenger Ship', 'SPA', 300),
(126, 'Pfalz D.IIIa', 'PFI', 100),
(127, 'Pfalz D.XII', 'PFI', 100),
(128, 'pillbox01', 'INF', 0),
(129, 'pillbox02', 'INF', 0),
(130, 'pillbox03', 'INF', 0),
(131, 'pillbox04', 'INF', 0),
(132, 'Portal', 'INF', 0),
(133, 'Quad', 'VTR', 50),
(134, 'Quad Searchlight', 'VTR', 50),
(135, 'QuadA', 'VTR', -50),
(136, 'railwaystation_1', 'INF', 0),
(137, 'railwaystation_2', 'INF', 0),
(138, 'railwaystation_3', 'INF', 0),
(139, 'railwaystation_4', 'INF', 0),
(140, 'railwaystation_5', 'INF', 0),
(141, 'river_airbase', 'INF', 0),
(142, 'river_airbase2', 'INF', 0),
(143, 'river_airbase3', 'INF', 0),
(144, 'Roucourt', 'INF', 0),
(145, 'rwstation', 'INF', 0),
(146, 'S.E.5a', 'PFI', 100),
(147, 'ship_stat_cargo', 'STR', 150),
(148, 'ship_stat_pass', 'SPA', 150),
(149, 'ship_stat_tank', 'STR', 150),
(150, 'Sopwith Triplane', 'PFI', 100),
(151, 'Sopwith Camel', 'PFI', 100),
(152, 'Sopwith Dolphin', 'PFI', 100),
(153, 'SPAD 13.C1', 'PFI', 100),
(154, 'SPAD 7.C1 150hp', 'PFI', 100),
(155, 'SPAD 7.C1 180hp', 'PFI', 100),
(156, 'StChamond', 'T', 100),
(157, 'Tanker Ship', 'STR', 300),
(158, 'tent01', 'INF', 1000),
(159, 'tent02', 'INF', 0),
(160, 'tent03', 'INF', 0),
(161, 'tent_camp01', 'INF', 0),
(162, 'tent_camp02', 'INF', 0),
(163, 'tent_camp03', 'INF', 0),
(164, 'tent_camp04', 'INF', 0),
(165, 'thornycroftaaa', 'VAA', 80),
(166, 'TurretBreguet14_1', 'TUR', 0),
(167, 'TurretBristolF2BF2_1_WM2', 'TUR', 0),
(168, 'TurretBristolF2BF3_1_WM2', 'TUR', 0),
(169, 'TurretBW12_1', 'TUR', 0),
(170, 'TurretBW12_1_WM_Becker_AP', 'TUR', 0),
(171, 'TurretBW12_1_WM_Becker_HE', 'TUR', 0),
(172, 'TurretBW12_1_WM_Becker_HEAP', 'TUR', 0),
(173, 'TurretBW12_1_WM_Twin_Parabellum', 'TUR', 0),
(174, 'TurretDFWC_1', 'TUR', 0),
(175, 'TurretDFWC_1_WM_Becker_AP', 'TUR', 0),
(176, 'TurretDFWC_1_WM_Becker_HE', 'TUR', 0),
(177, 'TurretDFWC_1_WM_Becker_HEAP', 'TUR', 0),
(178, 'TurretDFWC_1_WM_Twin_Parabellum', 'TUR', 0),
(179, 'TurretDH4_1', 'TUR', 0),
(180, 'TurretDH4_1_WM', 'TUR', 0),
(181, 'TurretFe2b_1', 'TUR', 0),
(182, 'TurretFe2b_1_WM', 'TUR', 0),
(183, 'TurretFelixF2A_2', 'TUR', 0),
(184, 'TurretFelixF2A_3', 'TUR', 0),
(185, 'TurretFelixF2A_3_WM', 'TUR', 0),
(186, 'TurretGothaG5_1', 'TUR', 0),
(187, 'TurretGothaG5_1_WM_Becker_AP', 'TUR', 0),
(188, 'TurretGothaG5_1_WM_Becker_HE', 'TUR', 0),
(189, 'TurretGothaG5_1_WM_Becker_HEAP', 'TUR', 0),
(190, 'TurretGothaG5_2', 'TUR', 0),
(191, 'TurretGothaG5_2_WM_Twin_Parabellum', 'TUR', 0),
(192, 'TurretHalberstadtCL2au_1', 'TUR', 0),
(193, 'TurretHalberstadtCL2au_1_WM_TwinPar', 'TUR', 0),
(194, 'TurretHalberstadtCL2_1', 'TUR', 0),
(195, 'TurretHalberstadtCL2_1_WM_TwinPar', 'TUR', 0),
(196, 'TurretHP400_1', 'TUR', 0),
(197, 'TurretHP400_1_WM', 'TUR', 0),
(198, 'TurretHP400_2', 'TUR', 0),
(199, 'TurretHP400_2_WM', 'TUR', 0),
(200, 'TurretHP400_3', 'TUR', 0),
(201, 'TurretRE8_1', 'TUR', 0),
(202, 'TurretRE8_1_WM', 'TUR', 0),
(203, 'TurretRolandC2a_1_WM_Twin_Par', 'TUR', 0),
(204, 'Wagon_BoxB', 'RWA', 25),
(205, 'Wagon_BoxNB', 'RWA', 25),
(206, 'Wagon_G8T', 'RWA', 25),
(207, 'Wagon_GondolaB', 'RWA', 25),
(208, 'Wagon_GondolaNB', 'RWA', 25),
(209, 'Wagon_Pass', 'RWA', 25),
(210, 'Wagon_PassA', 'RWA', -25),
(211, 'Wagon_PassAC', 'RWA', 25),
(212, 'Wagon_PassC', 'RWA', 25),
(213, 'Wagon_PlatformA7V', 'RWA', 25),
(214, 'Wagon_PlatformB', 'RWA', 25),
(215, 'Wagon_PlatformEmptyB', 'RWA', 25),
(216, 'Wagon_PlatformEmptyNB', 'RWA', 25),
(217, 'Wagon_PlatformMk4', 'RWA', 25),
(218, 'Wagon_PlatformNB', 'RWA', 25),
(219, 'Wagon_TankB', 'RWA', 25),
(220, 'Wagon_TankNB', 'RWA', 25),
(221, 'Whippet', 'T', 100),
(222, 'Windsock', 'FLG', 0),
(223, 'Sopwith Pup', 'PFI', 100),
(224, 'German naval 105mm gun', 'NAR', 0),
(225, 'Roland C.IIa', 'PRE', 200),
(226, 'German naval 52mm gun', 'NAR', 0),
(227, 'GER Ship Searchlight', 'LGT', 50),
(228, 'GBR Searchlight', 'LGT', 50),
(229, 'HMS Ship Searchlight', 'LGT', 50),
(230, 'churchE_01', 'INF', 0),
(231, 'CappyChateau', 'INF', 0),
(232, 'British naval 12pdr gun', 'NAR', 0),
(233, 'R.E.8', 'PRE', 200);

-- --------------------------------------------------------

--
-- Table structure for table `rof_object_roles`
--

DROP TABLE IF EXISTS `rof_object_roles`;
CREATE TABLE IF NOT EXISTS `rof_object_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_class` varchar(10) DEFAULT NULL,
  `role_description` varchar(23) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `rof_object_roles`
--

INSERT INTO `rof_object_roles` (`id`, `unit_class`, `role_description`) VALUES
(1, 'ART', 'Artillery'),
(2, 'AAA', 'Artillery:Anti-Aircraft'),
(3, 'BOT', 'Bot'),
(4, 'IMA', 'Infantry: MG AA'),
(5, 'IMG', 'Infantry:Machine Gun'),
(6, 'INF', 'Infrastructure'),
(7, 'NAA', 'Naval:Anti-Aircraft'),
(8, 'NAR', 'Naval:Artillery'),
(9, 'PBO', 'Plane:Bomber'),
(10, 'PFI', 'Plane:Fighter'),
(11, 'PFB', 'Plane:Fighter-Bomber'),
(12, 'PRE', 'Plane:Reconnaissance'),
(13, 'PSE', 'Plane:Seaplane'),
(14, 'PTR', 'Plane:Transport'),
(15, 'RAA', 'Rail:Anti-Aircraft'),
(16, 'RCV', 'Rail:Civil Train'),
(17, 'RLO', 'Rail:Locomotive'),
(18, 'RWA', 'Rail:Wagon'),
(19, 'VRI', 'Regular Infantry'),
(20, 'SAA', 'Ship:Anti-Aircraft'),
(21, 'SBA', 'Ship:Battleship'),
(22, 'SCR', 'Ship:Cruiser'),
(23, 'SDE', 'Ship:Destroyer'),
(24, 'SPB', 'Ship:Patrol Boat'),
(25, 'SSU', 'Ship:Submarine'),
(26, 'TAA', 'Tank:Anti-Aircraft'),
(27, 'TSP', 'Tank:Self-Propelled Gun'),
(28, 'T', 'Tank:Standard'),
(29, 'TTD', 'Tank:Tank Destroyer'),
(30, 'TUR', 'Turret'),
(31, 'VAA', 'Vehicle:Anti-Aircraft'),
(32, 'VMI', 'Vehicle:Mech. Infantry'),
(33, 'VTR', 'Vehicle:Transport');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `rof_pilot_scores`
--

INSERT INTO `rof_pilot_scores` (`id`, `MissionID`, `CoalID`, `country`, `PilotName`, `mpid`, `PilotFate`, `PilotHealth`, `PilotNegScore`, `PilotPosScore`) VALUES
(1, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=69.GIAP=REDVO', 1, 5, 4, 100, 0),
(2, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, 'Nightwitch', 2, 5, 4, 100, 0),
(3, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, 'Charlie Chap', 4, 1, 0, 0, 0),
(4, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=69.GIAP=BOOS', 5, 5, 4, 100, 0),
(5, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, 'Tanker', 7, 1, 0, 0, 0),
(6, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=69.GIAP=YARICK', 9, 5, 4, 100, 0),
(7, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=69.GIAP=REZNOV', 10, 5, 4, 100, 0),
(8, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '242Sqn_Prof', 15, 1, 0, 0, 0),
(9, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, 'Algy Dunkersworth', 17, 1, 0, 0, 0),
(10, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, 'BSS_DrGlow', 19, 0, 1, 10, 0),
(11, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '-NW-Rossolini', 20, 5, 4, 100, 0),
(12, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=69GIAP=ALEXEJ', 21, 2, 0, 0, 0),
(13, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=CAI= Kampf', 0, 5, 4, 100, 0),
(14, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '_BT_Shogun', 3, 1, 0, 0, 0),
(15, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=CAI= Itafolgore', 6, 5, 4, 100, 0),
(16, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=CAI= Cix', 8, 1, 0, 0, 0),
(17, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, 'BT_Colosky', 11, 1, 0, 0, 0),
(18, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=CAI= Alatriste', 12, 1, 0, 0, 0),
(19, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=CAI= Torec', 13, 1, 0, 0, 0),
(20, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=CAI= Gladio', 14, 1, 0, 0, 0),
(21, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '_BT_Patwar', 16, 1, 0, 0, 0),
(22, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=CAI= Diablo85', 18, 1, 0, 0, 0),
(23, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=CAI= Piddu', 22, 1, 0, 0, 0),
(24, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=CAI= Rudy', 23, 5, 4, 100, 0),
(25, 'SKIES OF THE EMPIRES 1919.mission-1919.10.1-6:10:0', 0, 0, '=CAI= Roby', 24, 0, 1, 10, 0),
(26, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=69.GIAP=STENKA', 0, 5, 4, 100, 0),
(27, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, 'Algy Dunkersworth', 1, 1, 0, 0, 0),
(28, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, 'Charlie Chap', 3, 1, 0, 0, 0),
(29, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=69.GIAP=TUSHKA', 4, 5, 4, 100, 0),
(30, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=69.GIAP=REDVO', 10, 5, 4, 100, 0),
(31, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, 'Tanker', 12, 1, 0, 0, 0),
(32, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, 'BSS_DrGlow', 13, 1, 0, 0, 0),
(33, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=69.GIAP=YARICK', 17, 5, 4, 100, 0),
(34, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '242Sqn_Prof', 18, 1, 0, 0, 0),
(35, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=69.GIAP=GRACH', 19, 0, 1, 10, 0),
(36, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=CAI= Piddu', 2, 1, 0, 0, 0),
(37, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=CAI= Alatriste', 5, 1, 0, 0, 0),
(38, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=CAI= Kampf', 6, 5, 4, 100, 0),
(39, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=CAI= Pochill', 7, 1, 0, 0, 0),
(40, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '_BT_Shogun', 8, 5, 4, 100, 0),
(41, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=CAI= Sonk', 9, 1, 0, 0, 0),
(42, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=CAI= Itafolgore', 11, 1, 0, 0, 0),
(43, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=CAI= Rudy', 14, 1, 0, 0, 0),
(44, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, 'Colosky', 15, 1, 0, 0, 0),
(45, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=CAI= Cix', 16, 5, 4, 100, 0),
(46, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=CAI= Gladio', 20, 0, 1, 10, 0),
(47, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '=CAI= Diablo85', 21, 1, 0, 0, 0),
(48, 'SKIES OF THE EMPIRES 1919.mission-1919.1.2-8:30:0', 0, 0, '-NW-Rossolini', 22, 5, 4, 100, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `test_models`
--

DROP TABLE IF EXISTS `test_models`;
CREATE TABLE IF NOT EXISTS `test_models` (
  `model` varchar(45) NOT NULL,
  PRIMARY KEY (`model`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_models`
--

INSERT INTO `test_models` (`model`) VALUES
('albatrosd5.mgm'),
('brequet14'),
('dfc5'),
('felixf2a.mgm'),
('fokkerd7'),
('gothag5');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
