CREATE DATABASE  IF NOT EXISTS `boswar_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `boswar_db`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 10.0.0.57    Database: boswar_db
-- ------------------------------------------------------
-- Server version	5.6.13

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `airfields`
--

DROP TABLE IF EXISTS `airfields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airfields` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `airfields`
--

LOCK TABLES `airfields` WRITE;
/*!40000 ALTER TABLE `airfields` DISABLE KEYS */;
/*!40000 ALTER TABLE `airfields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `blocks`
--

DROP TABLE IF EXISTS `blocks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Model` varchar(30) NOT NULL,
  `game_name` set('ROF','BOS') DEFAULT 'ROF',
  `modelpath1` varchar(40) DEFAULT 'graphics',
  `modelpath2` varchar(40) DEFAULT NULL,
  `modelpath3` varchar(40) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `Model` (`Model`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `blocks`
--

LOCK TABLES `blocks` WRITE;
/*!40000 ALTER TABLE `blocks` DISABLE KEYS */;
INSERT INTO `blocks` VALUES (1,'tent01','ROF','graphics','battlefield',NULL),(2,'tent_camp01','ROF','graphics','battlefield',NULL),(3,'tent_camp02','ROF','graphics','battlefield',NULL),(4,'tent_camp03','ROF','graphics','battlefield',NULL);
/*!40000 ALTER TABLE `blocks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `bridges`
--

DROP TABLE IF EXISTS `bridges`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `bridges` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `bridges`
--

LOCK TABLES `bridges` WRITE;
/*!40000 ALTER TABLE `bridges` DISABLE KEYS */;
/*!40000 ALTER TABLE `bridges` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cam_param`
--

DROP TABLE IF EXISTS `cam_param`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `cam_param` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cam_param`
--

LOCK TABLES `cam_param` WRITE;
/*!40000 ALTER TABLE `cam_param` DISABLE KEYS */;
INSERT INTO `cam_param` VALUES (1,'RoF','Northern France',0.000,0.000,100000.000,100000.000,100.000,100.000,1100.000,100.000,2100.000,1100.000,100.000,1100.000,1100.000,1100.000,2100.000,1100.000,5000,'2','2',50,10,5,30,90,500,5000,15);
/*!40000 ALTER TABLE `cam_param` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_missions`
--

DROP TABLE IF EXISTS `campaign_missions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_missions` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_missions`
--

LOCK TABLES `campaign_missions` WRITE;
/*!40000 ALTER TABLE `campaign_missions` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign_missions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_settings`
--

DROP TABLE IF EXISTS `campaign_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_settings` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `simulation` enum('RoF','BoS') NOT NULL DEFAULT 'RoF',
  `campaign` varchar(30) NOT NULL DEFAULT 'campaign',
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
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_settings`
--

LOCK TABLES `campaign_settings` WRITE;
/*!40000 ALTER TABLE `campaign_settings` DISABLE KEYS */;
INSERT INTO `campaign_settings` VALUES (2,'RoF','Flanders Eagles','flanders_eagles','localhost','rofwar','rofwar','Channel','rof_channel_locations','2','','','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(3,'RoF','Lake','lake','','','','Lake','rof_lake_locations','4','','','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(4,'RoF','Skies of the Empires II','skies_of_the_empires_ii','','','','Verdun','rof_verdun_locations','2','','','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(5,'BoS','Stalingrad','stalingrad','','','','Stalingrad','bos_stalingrad_locations','4','','','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(6,'RoF','Yankee Doodle','yankee_doodle','','','','Verdun','rof_verdun_locations','2','','','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(7,'RoF','Skies of the Empires','skies_of_the_empires','localhost','rofwar','rofwar','Verdun','rof_verdun_locations','3','','','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(8,'RoF','1916','1916','localhost','rofwar','rofwar','Western Front','rof_westernfront_locations','3','','','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(9,'RoF','Bloody April','bloody_april','localhost','rofwar','rofwar','Western Front','rof_westernfront_locations','1','','','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(57,'RoF','1942','1942','localhost','new_user','new_password','Western Front','rof_westernfront_locations','1','true','true','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,5000,500,'2','2',50,10,5,30,90,15);
/*!40000 ALTER TABLE `campaign_settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_status`
--

DROP TABLE IF EXISTS `campaign_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_status` (
  `id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `campaign_status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_status`
--

LOCK TABLES `campaign_status` WRITE;
/*!40000 ALTER TABLE `campaign_status` DISABLE KEYS */;
INSERT INTO `campaign_status` VALUES (1,'Hidden'),(2,'Completed'),(3,'Active'),(4,'Proposed');
/*!40000 ALTER TABLE `campaign_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_users`
--

DROP TABLE IF EXISTS `campaign_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_users` (
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `user_id` smallint(1) NOT NULL DEFAULT '0',
  `camp_db` varchar(30) NOT NULL DEFAULT 'campaign_database',
  `CoalID` tinyint(1) NOT NULL DEFAULT '0',
  `groupFile_path` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_users`
--

LOCK TABLES `campaign_users` WRITE;
/*!40000 ALTER TABLE `campaign_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `campaign_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `campaign_users_roles`
--

DROP TABLE IF EXISTS `campaign_users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_users_roles` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_users_roles`
--

LOCK TABLES `campaign_users_roles` WRITE;
/*!40000 ALTER TABLE `campaign_users_roles` DISABLE KEYS */;
INSERT INTO `campaign_users_roles` VALUES (1,'administrator'),(2,'commander'),(3,'viewer');
/*!40000 ALTER TABLE `campaign_users_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `col_10`
--

DROP TABLE IF EXISTS `col_10`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `col_10` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `col_10`
--

LOCK TABLES `col_10` WRITE;
/*!40000 ALTER TABLE `col_10` DISABLE KEYS */;
/*!40000 ALTER TABLE `col_10` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `flags`
--

DROP TABLE IF EXISTS `flags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `flags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Model` varchar(30) NOT NULL,
  `game_name` set('RoF','BoS') DEFAULT 'RoF',
  `modelpath2` varchar(40) DEFAULT NULL,
  `modelpath3` varchar(40) DEFAULT NULL,
  UNIQUE KEY `id` (`id`),
  UNIQUE KEY `Model` (`Model`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `flags`
--

LOCK TABLES `flags` WRITE;
/*!40000 ALTER TABLE `flags` DISABLE KEYS */;
INSERT INTO `flags` VALUES (1,'windsock','RoF','flag',NULL);
/*!40000 ALTER TABLE `flags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `inbox`
--

DROP TABLE IF EXISTS `inbox`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `inbox` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lin` text,
  `data_value` varchar(200) DEFAULT NULL,
  `data_dec_value` decimal(20,3) DEFAULT NULL,
  `CoalID` tinyint(3) unsigned NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `inbox`
--

LOCK TABLES `inbox` WRITE;
/*!40000 ALTER TABLE `inbox` DISABLE KEYS */;
/*!40000 ALTER TABLE `inbox` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `maps`
--

DROP TABLE IF EXISTS `maps`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `maps` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `map` varchar(30) NOT NULL,
  `simulation` varchar(6) NOT NULL,
  `map_locations` varchar(40) CHARACTER SET ascii NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `map` (`map`),
  UNIQUE KEY `map_locations` (`map_locations`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `maps`
--

LOCK TABLES `maps` WRITE;
/*!40000 ALTER TABLE `maps` DISABLE KEYS */;
INSERT INTO `maps` VALUES (1,'Channel','RoF','rof_channel_locations'),(2,'Lake','RoF','rof_lake_locations'),(3,'Stalingrad','BoS','bos_stalingrad_locations'),(4,'Verdun','RoF','rof_verdun_locations'),(5,'Western Front','RoF','rof_westernfront_locations');
/*!40000 ALTER TABLE `maps` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mission_status`
--

DROP TABLE IF EXISTS `mission_status`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mission_status` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `mission_status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mission_status`
--

LOCK TABLES `mission_status` WRITE;
/*!40000 ALTER TABLE `mission_status` DISABLE KEYS */;
INSERT INTO `mission_status` VALUES (1,'initialized'),(2,'moving units'),(3,'planning'),(4,'built'),(5,'analyzing'),(6,'scored');
/*!40000 ALTER TABLE `mission_status` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_fate`
--

DROP TABLE IF EXISTS `player_fate`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_fate` (
  `id` tinyint(1) NOT NULL,
  `fate` varchar(30) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_fate`
--

LOCK TABLES `player_fate` WRITE;
/*!40000 ALTER TABLE `player_fate` DISABLE KEYS */;
INSERT INTO `player_fate` VALUES (0,'did not take off'),(1,'landed'),(2,'did not land'),(3,'crashed'),(4,'captured'),(5,'killed');
/*!40000 ALTER TABLE `player_fate` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `player_health`
--

DROP TABLE IF EXISTS `player_health`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `player_health` (
  `id` tinyint(4) NOT NULL,
  `health` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `health` (`health`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `player_health`
--

LOCK TABLES `player_health` WRITE;
/*!40000 ALTER TABLE `player_health` DISABLE KEYS */;
INSERT INTO `player_health` VALUES (3,'critical injuries'),(4,'dead'),(0,'fit as a fiddle'),(1,'minor injuries'),(2,'serious injuries');
/*!40000 ALTER TABLE `player_health` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rof_airfields`
--

DROP TABLE IF EXISTS `rof_airfields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_airfields` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_airfields`
--

LOCK TABLES `rof_airfields` WRITE;
/*!40000 ALTER TABLE `rof_airfields` DISABLE KEYS */;
/*!40000 ALTER TABLE `rof_airfields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rof_channel_locations`
--

DROP TABLE IF EXISTS `rof_channel_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_channel_locations` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `LID` smallint(1) unsigned NOT NULL,
  `LX` decimal(15,0) NOT NULL,
  `LZ` decimal(15,0) NOT NULL,
  `LName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=564 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_channel_locations`
--

LOCK TABLES `rof_channel_locations` WRITE;
/*!40000 ALTER TABLE `rof_channel_locations` DISABLE KEYS */;
INSERT INTO `rof_channel_locations` VALUES (1,51,54580,197540,'Abeele'),(2,10,54160,199000,'Abeele East'),(3,10,55000,196700,'Abeele West'),(4,10,60920,238990,'Abeelhoek'),(5,10,65400,232640,'Abele'),(6,51,101840,93470,'Adisham'),(7,10,89220,225000,'Aertrycke'),(8,51,88090,226200,'Aertrycke'),(9,51,44440,135510,'Alincthun'),(10,10,127640,54440,'Allhallows'),(11,51,128420,56760,'Allhallows'),(12,10,46320,150580,'Alquines'),(13,51,45550,149260,'Alquines'),(14,51,79840,64270,'Appledore Heath'),(15,51,178950,80050,'Ardleigh'),(16,51,58050,148770,'Ardres'),(17,10,73230,177240,'Arembouts'),(18,51,106000,99350,'Ash'),(19,51,92110,70690,'Ashford'),(20,51,58250,122320,'Audinghen'),(21,51,55120,120900,'Audresselles'),(22,51,60790,155330,'Audrui'),(23,51,81670,201480,'Avecapelle'),(24,10,45850,200850,'Bailleul'),(25,51,45480,201620,'Bailleul'),(26,51,64260,47650,'Baldslow'),(27,51,97320,90670,'Barham'),(28,51,65510,129090,'Bas Escalles'),(29,51,138660,45360,'Basildon'),(30,51,66500,43080,'Battle'),(31,10,60320,241360,'Bavichove'),(32,51,41440,155920,'Bayenghem'),(33,10,172200,93270,'Beaumont'),(34,51,57960,221760,'Becelaere'),(35,10,103170,90550,'Bekesbourne'),(36,10,69930,182040,'Bergues'),(37,51,71010,180150,'Bergues'),(38,51,89720,62390,'Bethersden'),(39,20,71550,230080,'Beveren'),(40,20,71700,230370,'Beveren'),(41,51,146410,40650,'Billericay'),(42,51,83670,73150,'Bilsington'),(43,51,169440,68640,'Birch'),(44,51,117100,1011110,'Birchington-on-Sea'),(45,10,55100,235960,'Bisseghem'),(46,10,170630,74930,'Blackheath Common'),(47,51,109500,228850,'Blankenberghe'),(48,51,109100,83240,'Blean'),(49,10,46390,157350,'Boisdenghem'),(50,51,61840,147800,'Boisen Ardres'),(51,51,97550,85140,'Bossingham'),(52,50,44000,121000,'Boulogne'),(53,50,44000,122000,'Boulogne'),(54,50,44000,123000,'Boulogne'),(55,51,68440,163550,'Bourbourg'),(56,51,156220,74080,'Bradwell-on-Sea'),(57,10,173880,49110,'Braintree'),(58,51,174220,50960,'Braintree'),(59,20,81030,183710,'Bray Dunee'),(60,51,68860,50670,'Brede'),(61,51,165860,82650,'Brightlingsea'),(62,51,70250,50860,'Broad Oak'),(63,20,105150,105400,'Broad Salts'),(64,20,105080,105220,'Broad Salts'),(65,20,105020,105120,'Broad Salts'),(66,51,1129890,47400,'Brompton'),(67,51,75520,67840,'Brookland'),(68,10,163120,44200,'Broomfeld Court'),(69,10,115330,91500,'Broomfield'),(70,50,99000,235000,'Brugge'),(71,50,99000,236000,'Brugge'),(72,50,98000,235000,'Brugge'),(73,50,98000,236000,'Brugge'),(74,51,79110,195240,'Bulskamp'),(75,10,146160,69290,'Burnham-on-Crouch'),(76,51,145410,68240,'Burnham-on-Crouch'),(77,10,43450,225640,'Cajebert'),(78,50,69430,137960,'Calais'),(79,50,61950,139000,'Calais'),(80,50,69800,138520,'Calais'),(81,50,70000,139500,'Calais'),(82,20,79080,176220,'CAM Dunkerque'),(83,20,79480,175960,'CAM Dunkerque'),(84,10,56940,144090,'Campagne'),(85,51,144560,62810,'Canewdon'),(86,50,105820,85000,'Canterbury'),(87,50,105480,85860,'Canterbury'),(88,50,106440,85770,'Canterbury'),(89,50,106690,84970,'Canterbury'),(90,51,133460,52630,'Canvey Island'),(91,10,86790,95880,'Capel-le-Ferne'),(92,51,63560,165410,'Cappell-Brouck'),(93,10,74330,175570,'Cappelle Le Grand'),(94,51,52290,183680,'Cassel'),(95,51,100120,71260,'Challock'),(96,10,42420,226710,'Chantrelle'),(97,51,98980,65220,'Charing'),(98,51,102670,77850,'Chartham'),(99,51,118380,46730,'Chatham'),(100,51,157480,44680,'Chelmsford'),(101,10,163080,89990,'Clacton'),(102,50,163540,91500,'Clacton-on-Sea'),(103,10,50000,171250,'Clairmarais'),(104,10,50000,171250,'Clairmarais'),(105,51,48100,170950,'Clairmarais'),(106,20,101260,221470,'Clemskerke'),(107,51,101700,222200,'Clemskerke'),(108,20,101570,221070,'Clemskerke'),(109,20,101430,221310,'Clemskerke'),(110,51,74460,213660,'Clercken'),(111,10,56020,154730,'Cocove'),(112,51,173200,59550,'Coggeshall'),(113,50,174250,75300,'Colchester'),(114,50,174690,74230,'Colchester'),(115,50,174540,73520,'Colchester'),(116,20,48750,221600,'Commines'),(117,20,48740,221560,'Commines'),(118,20,48580,221890,'Commines'),(119,20,102420,237340,'Coolkereke'),(120,20,102300,236990,'Coolkereke'),(121,20,102600,237550,'Coolkereke'),(122,20,102840,237260,'Coolkereke'),(123,51,47970,234840,'Coolscamp'),(124,51,77400,223490,'Cortemark'),(125,51,85140,218290,'Couckelaere'),(126,10,50770,227220,'Coucou'),(127,20,74960,179130,'Coudekerque'),(128,20,74960,179260,'Coudekerque'),(129,20,74720,178740,'Coudekerque'),(130,20,74910,179480,'Coudekerque'),(131,51,55740,239290,'Courtai'),(132,51,56130,239730,'Courtai'),(133,10,86220,194740,'Coxyde'),(134,51,48710,176020,'Creve Couer Farm'),(135,10,49380,176000,'Creve Couer Farm'),(136,51,71760,45950,'Cripp\'s Corner'),(137,10,66220,178000,'Crochte'),(138,10,39640,232450,'Croix'),(139,10,58310,240510,'Cueme'),(140,51,155880,52290,'Danbury'),(141,51,104880,222370,'De Haan'),(142,51,99550,107820,'Deal'),(143,10,65200,227950,'Den Aap'),(144,20,109560,51840,'Detling'),(145,20,109880,51960,'Detling'),(146,51,78260,210300,'Dixmude'),(147,50,88750,100480,'Dover'),(148,50,89450,101240,'Dover'),(149,50,90000,100800,'Dover'),(150,10,90340,102360,'Dover (Guston Road)'),(151,20,91460,103920,'Dover (Swingate)'),(152,20,91570,103910,'Dover (Swingate)'),(153,20,57920,191200,'Droglandt'),(154,20,57690,191420,'Droglandt'),(155,10,49700,232080,'Dronkart'),(156,10,83280,189670,'Duinhoek'),(157,50,78000,176000,'Dunkerque'),(158,50,79000,175150,'Dunkerque'),(159,50,79450,176380,'Dunkerque'),(160,50,79200,177670,'Dunkerque'),(161,10,81650,81980,'Dymchurch'),(162,51,77810,78790,'Dymchurch'),(163,51,179240,60510,'Earls Colne'),(164,51,164480,80500,'East Mersea'),(165,20,119580,69690,'Eastchurch'),(166,51,120910,69230,'Eastchurch'),(167,20,119520,69680,'Eastchurch'),(168,51,102700,101610,'Eastry'),(169,10,171560,64150,'Eastthorpe'),(170,51,171650,65930,'Eastthorpe'),(171,10,50290,190990,'Eecke'),(172,10,76970,237800,'Eeghem'),(173,51,75830,238220,'Eeghem'),(174,51,91660,87170,'Elham'),(175,10,86530,222010,'Engel'),(176,10,61390,172260,'Eringhem'),(177,51,182760,97190,'Erwarton'),(178,10,40800,162950,'Esquerdes'),(179,51,186300,105120,'Falkenham'),(180,51,110690,72020,'Faversham'),(181,50,182500,105900,'Felixstowe'),(182,50,182220,105070,'Felixstowe'),(183,51,171890,42630,'Felsted'),(184,50,84020,91580,'Folkestone'),(185,50,84500,92000,'Folkestone'),(186,50,85000,92440,'Folkestone'),(187,51,167670,42290,'Ford End'),(188,51,187510,92740,'Freston'),(189,10,106800,59110,'Frinsted'),(190,51,167770,97900,'Frinton-on-Sea'),(191,51,82560,196280,'Furries'),(192,51,56090,219920,'Gheluvelt'),(193,10,54240,225440,'Gheluwe'),(194,20,93180,216750,'Ghistelles'),(195,51,92010,217500,'Ghistelles'),(196,20,93220,216630,'Ghistelles'),(197,51,118770,48520,'Gillingham'),(198,10,99620,76280,'Godmersham Park'),(199,10,158120,63070,'Goldhanger'),(200,10,125400,59620,'Grain'),(201,51,126890,60370,'Grain'),(202,51,73020,158810,'Gravelines'),(203,51,169880,85580,'Great Bentley'),(204,51,166780,95250,'Great Holland'),(205,51,175940,93730,'Great Oakley'),(206,51,52349,151680,'Guemy'),(207,10,59650,141410,'Guines'),(208,51,59560,140320,'Guines'),(209,10,191610,83000,'Hadleigh'),(210,10,50720,229620,'Halluin'),(211,51,181250,56380,'Halstead'),(212,51,82910,69190,'Hamstreet'),(213,20,75450,220140,'Handzaeme'),(214,20,75350,219640,'Handzaeme'),(215,20,74740,219590,'Handzaeme'),(216,20,74810,219590,'Handzaeme'),(217,20,74900,219920,'Handzaeme'),(218,20,74990,219600,'Handzaeme'),(219,20,75750,220380,'Handzaeme'),(220,51,53410,136460,'Hardinghen'),(221,51,183700,93720,'Harkstead'),(222,10,53860,241650,'Harlebeeke'),(223,51,42840,149100,'Harlettes'),(224,51,102760,57710,'Harrietsham'),(225,10,116040,72980,'Harty'),(226,50,180430,101000,'Harwich'),(227,50,179590,100390,'Harwich'),(228,52,179590,101770,'Harwich light'),(229,50,59660,47200,'Hastings'),(230,50,60630,47690,'Hastings'),(231,50,60260,48570,'Hastings'),(232,50,60650,49600,'Hastings'),(233,50,60770,50580,'Hastings'),(234,50,61340,51260,'Hastings'),(235,51,162690,53320,'Hatfield Peverel'),(236,10,87680,91040,'Hawkinge'),(237,51,43020,187440,'Hazebrouck'),(238,51,95020,53300,'Headcorn'),(239,51,43250,139040,'Henneveux'),(240,51,116200,88840,'Herne Bay'),(241,10,44430,239420,'Herseaux'),(242,10,37410,239710,'Herseaux South'),(243,10,62110,187840,'Herzeele'),(244,51,61740,187640,'Herzeele'),(245,10,56880,236220,'Heule'),(246,51,56700,236920,'Heule'),(247,10,50870,174590,'Hey'),(248,51,112560,236540,'Heyst'),(249,51,185370,78690,'Higham'),(250,51,142840,56550,'Hockley'),(251,20,73270,191410,'Hondschoote'),(252,51,72510,191040,'Hondschoote'),(253,20,73410,191420,'Hondschoote'),(254,51,72290,216500,'Honthulst'),(255,10,54320,173690,'Hoog Huys'),(256,10,68670,237410,'Hoogte'),(257,20,75530,193230,'Houtem'),(258,20,75860,193200,'Houtem'),(259,20,75530,193340,'Houtem'),(260,10,102840,227440,'Houttave'),(261,10,98610,40520,'Hunton'),(262,51,82840,84860,'Hythe'),(263,20,82760,224530,'Ichteghem'),(264,20,82870,224180,'Ichteghem'),(265,20,83130,224230,'Ichteghem'),(266,10,66980,239470,'Ingelmunster'),(267,10,65050,234830,'Iseghem'),(268,51,65600,235210,'Iseghem'),(269,10,93530,226100,'Jabbeke'),(270,51,95120,226510,'Jabbeke'),(271,51,169010,60350,'Kelvendon'),(272,51,50090,208330,'Kemmel'),(273,20,123930,52950,'Kingsnorth'),(274,51,88770,69560,'Kingsnorth'),(275,20,123830,52680,'Kingsnorth'),(276,20,123740,52400,'Kingsnorth'),(277,20,124250,53130,'Kingsnorth'),(278,10,187900,101150,'Kirton'),(279,51,187100,103260,'Kirton'),(280,51,113480,239830,'Knocke'),(281,10,64490,240950,'Kriekhoek'),(282,10,45620,233560,'La martiere'),(283,10,84720,192030,'La Panne'),(284,51,84990,191250,'La Panne'),(285,51,138880,40470,'Laindon'),(286,10,62230,200480,'Lalovie'),(287,51,57120,134500,'Landrethun-le-Nord'),(288,51,64750,214480,'Langemarek'),(289,51,150400,61060,'Latchingdon'),(290,10,48290,227980,'Le Belcamp'),(291,10,42280,206120,'Le Creche'),(292,10,54480,146750,'Le Fresne'),(293,20,42400,209680,'Le Rossignol'),(294,20,42320,209590,'Le Rossignol'),(295,20,42000,209920,'Le Rossignol'),(296,51,46320,135870,'Le Wast'),(297,20,94990,211510,'Leffinghe'),(298,20,94750,211780,'Leffinghe'),(299,10,79330,183290,'Leffrinckhouke'),(300,10,83260,58310,'Leigh Green'),(301,51,136790,55980,'Leigh-on-Sea'),(302,20,75300,189290,'Les Moeres'),(303,20,75360,189610,'Les Moeres'),(304,20,74960,189180,'Les Moeres'),(305,51,187330,98710,'Levington'),(306,20,118510,74820,'Leysdown'),(307,20,118680,75000,'Leysdown'),(308,51,119690,74420,'Leysdown-on-Sea'),(309,10,79460,229770,'Lichtervelde'),(310,51,50900,144660,'Licques'),(311,10,45610,226260,'Linselles'),(312,51,174820,86000,'Little Bentley'),(313,10,168540,91240,'Little Clacton'),(314,51,164350,45110,'Little Waltham'),(315,51,44790,141240,'Longueville'),(316,51,64950,168940,'Looberghe'),(317,51,74030,164640,'Loon'),(318,10,91110,233340,'Lophem'),(319,51,92520,233800,'Lophem'),(320,20,70800,73270,'Lydd'),(321,51,70440,72680,'Lydd'),(322,20,70860,73310,'Lydd'),(323,10,84240,80610,'Lympne'),(324,10,96370,239540,'Mael'),(325,51,106360,46710,'Maidstone'),(326,51,157290,58550,'Maldon'),(327,51,180280,85430,'Manningtree'),(328,10,113620,104440,'Manston'),(329,20,113600,104370,'Manston'),(330,51,68730,146270,'Marck'),(331,10,52520,237000,'Marcke'),(332,10,94820,46200,'Marden'),(333,51,77290,167230,'Mardick'),(334,50,117740,106730,'Margate'),(335,50,118120,107350,'Margate'),(336,20,98210,211130,'Mariakerke'),(337,20,98320,211350,'Mariakerke'),(338,51,173950,66680,'Marks Tey'),(339,10,53840,127180,'Marquise'),(340,51,54050,128360,'Marquise'),(341,10,101800,231220,'Meetkerke'),(342,10,54700,230130,'Menin'),(343,51,52090,229010,'Menin'),(344,51,69840,208360,'Merckem'),(345,51,48770,213380,'Messines'),(346,10,70540,238420,'Meulbeke'),(347,51,111970,102040,'Minster'),(348,51,56870,232130,'Moorseele'),(349,10,62500,225700,'Moorslede'),(350,51,62660,224660,'Moorslede'),(351,51,50960,161380,'Moulle'),(352,10,42650,230450,'Mouveaux'),(353,10,62030,230610,'Nachtegal'),(354,51,184420,72650,'Nayland'),(355,10,75070,75740,'New Romney'),(356,51,73840,75230,'New Romney'),(357,51,89660,202960,'Nieuport'),(358,10,138610,47480,'North Benfleet'),(359,51,66090,153630,'Nouvelle Eglisse'),(360,51,88100,197440,'Oost-Dunkerke'),(361,10,91150,235590,'Oostcamp'),(362,51,106080,240740,'Oostkerke'),(363,20,68020,222930,'Oostnieuwkerke'),(364,51,68090,224870,'Oostnieuwkerke'),(365,20,68250,223100,'Oostnieuwkerke'),(366,10,65420,242220,'Oostroosbake'),(367,50,99700,213380,'Ostende'),(368,50,100500,214000,'Ostende'),(369,10,56010,184930,'Oudezeele'),(370,51,41800,120350,'Outreau'),(371,51,71950,152500,'Oye'),(372,10,72800,154440,'Oyeplage'),(373,51,166190,72880,'Peldon'),(374,20,39790,215590,'Perenchies'),(375,20,40310,215570,'Perenchies'),(376,20,40120,215720,'Perenchies'),(377,20,39710,215190,'Perenchies'),(378,10,76560,173960,'Petite Synthe'),(379,51,76420,171930,'Petite Synthe'),(380,51,65120,133790,'Peuplingues'),(381,51,71540,201440,'Pillonchove'),(382,51,66740,172500,'Pitga'),(383,10,94900,61470,'Pluckley'),(384,51,95380,62400,'Pluckley'),(385,10,59800,200490,'Poperinghe'),(386,51,58330,200700,'Poperinghe'),(387,10,64090,195210,'Proven'),(388,51,62110,195950,'Proven'),(389,51,152680,57560,'Purleigh'),(390,10,44650,158800,'Quelmes'),(391,10,43000,222920,'Quesnoy'),(392,51,42750,220390,'Quesnoy'),(393,51,178740,96000,'Ramsey'),(394,50,111910,108670,'Ramsgate'),(395,50,112350,109400,'Ramsgate'),(396,51,53790,203980,'Reninghelst'),(397,51,67940,187340,'Rexpoede'),(398,10,139440,59680,'Richford'),(399,51,139800,60950,'Richford'),(400,51,95380,106210,'Ringwould'),(401,51,74410,42170,'Robertsbridge'),(402,51,64820,194050,'Roesbrugge-Haringe'),(403,20,43930,209040,'Romarin'),(404,20,43860,208900,'Romarin'),(405,51,40370,232610,'Roubaix'),(406,50,68800,228700,'Roulers'),(407,50,68800,229300,'Roulers'),(408,50,68800,229800,'Roulers'),(409,51,93190,221390,'Roxem'),(410,51,56830,174800,'Rubrouck'),(411,10,68730,226017,'Rulers'),(412,20,65890,230180,'Rumbeke'),(413,20,65960,229960,'Rumbeke'),(414,20,65940,230520,'Rumbeke'),(415,10,145760,47010,'Runwell'),(416,10,70650,61930,'Rye'),(417,51,70250,60340,'Rye'),(418,51,67980,158740,'Saint-Folquin'),(419,20,78450,173970,'Saint-Pol-sur-Mer'),(420,51,77530,174820,'Saint-Pol-sur-Mer'),(421,20,78700,173770,'Saint-Pol-sur-Mer'),(422,20,78150,174260,'Saint-Pol-sur-Mer'),(423,20,78940,174050,'Saint-Pol-sur-Mer'),(424,20,78430,174340,'Saint-Pol-sur-Mer'),(425,51,62850,159060,'Sainte-Marie-Kerque'),(426,51,163630,68240,'Salcott'),(427,51,78660,48329,'Sandhurst'),(428,51,105370,103510,'Sandwich'),(429,51,68160,132280,'Sangatte'),(430,51,112840,96850,'Sarre'),(431,20,112860,232170,'Seeflugstation Flandern I'),(432,20,113260,232100,'Seeflugstation Flandern I'),(433,20,100410,217100,'Seeflugstation Flandern II'),(434,20,100100,217330,'Seeflugstation Flandern II'),(435,20,100370,217380,'Seeflugstation Flandern II'),(436,51,42270,160820,'Setques'),(437,10,124210,63760,'Sheerness'),(438,51,124640,63410,'Sheerness'),(439,51,105490,71460,'Sheldwich'),(440,51,134710,65520,'Shoeburyness'),(441,51,182760,99720,'Shotley'),(442,10,182420,52430,'Sible Hedingham'),(443,51,96150,95700,'Silberswold'),(444,51,114110,61090,'Sittingbourne'),(445,51,91230,209460,'Slype'),(446,51,88410,76550,'Smeeth'),(447,10,94850,228230,'Snelleghem'),(448,51,66870,179360,'Socx'),(449,10,97910,79800,'Sole Street'),(450,51,148700,54070,'South Woodham Ferrers'),(451,50,135680,59700,'Southend-on-Sea'),(452,50,135610,60530,'Southend-on-Sea'),(453,51,149460,68800,'Southminster'),(454,10,86600,225440,'Sparappelhoek'),(455,51,71210,173000,'Spicker'),(456,51,92440,105560,'St Margaret\'s at Cliffe'),(457,51,92360,106700,'St Margarets Bay'),(458,51,164390,86190,'St Osyth'),(459,10,60120,131320,'St. Ingelvert'),(460,20,45960,223320,'St. Marguerite'),(461,20,45650,223560,'St. Marguerite'),(462,20,46260,223240,'St. Marguerite'),(463,10,50280,185390,'St. Marie Cappel'),(464,20,44150,166390,'St. Omer'),(465,50,46600,167940,'St. Omer'),(466,20,44210,166460,'St. Omer'),(467,51,71430,221590,'Staden'),(468,10,100710,224900,'Stalhille'),(469,51,133380,40470,'Stanford-le-Hope'),(470,51,53230,190670,'Steenvoorde'),(471,10,40500,203720,'Steenwerck'),(472,51,41500,203510,'Steenwerck'),(473,51,152910,67060,'Steeple'),(474,20,97960,214070,'Stene'),(475,20,97810,214210,'Stene'),(476,20,97960,214070,'Stene'),(477,51,150100,42350,'Stock'),(478,10,150880,55030,'Stow Maries'),(479,51,183350,79670,'Stratford St Mary'),(480,51,119980,44800,'Strood'),(481,51,108810,88280,'Sturry'),(482,10,92460,93740,'Swingfield'),(483,51,83840,57810,'Tenterden'),(484,51,165790,51410,'Terling'),(485,10,76470,181400,'Teteghem'),(486,52,44650,120210,'the Boulogne jetty light'),(487,52,71380,138610,'the Calais jetty light'),(488,52,65860,77000,'the Dungeness light'),(489,52,80800,174770,'the Dunkerque jetty light'),(490,52,83600,93600,'the Folkestone pier light'),(491,52,59080,48950,'the Hastings light'),(492,52,116540,111020,'the North Foreland light'),(493,52,101700,213780,'the Ostende pier light'),(494,52,111100,109470,'the Ramsgate west pier light'),(495,51,77240,59460,'The Stocks'),(496,52,114190,233540,'the Zeebrugge breakwater light'),(497,10,77120,241320,'Thielt'),(498,51,171000,92420,'Thorpe-le-Sok'),(499,51,82100,227290,'Thourcut'),(500,10,102200,69280,'Throwley'),(501,51,153840,72590,'Tillingham'),(502,51,49330,166180,'Tilques'),(503,51,165940,63480,'Tiptree'),(504,51,158800,70630,'Tollesbury'),(505,51,161910,67170,'Tolleshunt D\'Arcy'),(506,51,43750,231270,'Tourcoing'),(507,51,185910,102340,'Trimley St Martin'),(508,20,108260,228580,'Utykerke'),(509,20,108280,228430,'Utykerke'),(510,10,97310,231400,'Varsenaire'),(511,51,86340,230830,'Veldeghem'),(512,51,44640,153910,'Vest Beaucourt'),(513,20,103860,222920,'Vilsseghem'),(514,20,103480,222770,'Vilsseghem'),(515,20,103560,222850,'Vilsseghem'),(516,51,178660,64630,'Wakes Colne'),(517,10,96570,107590,'Walmer'),(518,51,97340,80590,'Waltham'),(519,51,169680,99220,'Walton-on-the-Naze'),(520,51,183810,104220,'Walwon'),(521,10,39680,225070,'Wambrechies'),(522,51,171200,89020,'Weeley'),(523,51,107730,225340,'Wenduyne'),(524,51,50290,223010,'Wervicq'),(525,10,50890,224480,'Wervicq'),(526,10,65520,185740,'West Cappelle'),(527,51,162160,74360,'West Mersea'),(528,10,117190,102830,'Westgate-on-Sea'),(529,51,117160,103690,'Westgate-on-Sea'),(530,10,54240,233500,'Wevelghem'),(531,51,169250,53080,'White Notley'),(532,51,115050,81790,'Whitstable'),(533,51,144160,47270,'Wickford'),(534,10,156840,42960,'Widford'),(535,51,94910,208930,'Wilskerke'),(536,51,48260,123840,'Wimille'),(537,51,67320,58580,'Winchelsea'),(538,51,105410,94880,'Wingham'),(539,51,61350,126050,'Wissant'),(540,51,165150,56330,'Witham'),(541,10,78160,57750,'Wittersham'),(542,51,171330,78280,'Wivenhoe'),(543,51,177310,92010,'Wix'),(544,51,83410,63780,'Woodchurch'),(545,51,61400,182630,'Wormhout'),(546,10,180530,67620,'Wormingford'),(547,10,157730,42060,'Writtle'),(548,20,96570,73810,'Wye'),(549,20,96700,73870,'Wye'),(550,20,96830,73970,'Wye'),(551,10,81750,238410,'Wynghene'),(552,50,58000,212000,'Ypres'),(553,10,88260,214360,'Zande'),(554,51,76680,217440,'Zarren'),(555,50,111640,234380,'Zeebrugge'),(556,50,111740,233000,'Zeebrugge'),(557,50,111300,232140,'Zeebrugge'),(558,51,62010,176890,'Zegers-Cappel'),(559,51,60220,218390,'Zennebeke'),(560,51,81290,184330,'Zuydcoote'),(561,20,80810,183610,'Zuydcoote'),(562,10,104610,228520,'Zuyenkerke'),(563,10,82130,187050,'Zuylcoote');
/*!40000 ALTER TABLE `rof_channel_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rof_coalitions`
--

DROP TABLE IF EXISTS `rof_coalitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_coalitions` (
  `CoalID` tinyint(1) unsigned NOT NULL,
  `Coalitionname` varchar(40) NOT NULL,
  PRIMARY KEY (`CoalID`),
  UNIQUE KEY `Coalitionname` (`Coalitionname`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_coalitions`
--

LOCK TABLES `rof_coalitions` WRITE;
/*!40000 ALTER TABLE `rof_coalitions` DISABLE KEYS */;
INSERT INTO `rof_coalitions` VALUES (2,'Central Powers'),(6,'Corsairs'),(1,'Entente'),(7,'Future'),(5,'Knights'),(4,'Mercenaries'),(0,'Neutral'),(3,'War Dogs');
/*!40000 ALTER TABLE `rof_coalitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rof_countries`
--

DROP TABLE IF EXISTS `rof_countries`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_countries` (
  `id` tinyint(1) unsigned NOT NULL,
  `ckey` smallint(1) unsigned NOT NULL,
  `countryname` varchar(30) NOT NULL,
  `countryadj` varchar(30) NOT NULL,
  `CoalID` tinyint(1) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `countryname` (`countryname`),
  UNIQUE KEY `countryadj` (`countryadj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_countries`
--

LOCK TABLES `rof_countries` WRITE;
/*!40000 ALTER TABLE `rof_countries` DISABLE KEYS */;
INSERT INTO `rof_countries` VALUES (1,0,'Neutral','neutral',0),(2,101,'France','French',1),(3,102,'Great Britain','British',1),(4,103,'USA','American',1),(5,104,'Italy','Italian',1),(6,105,'Russia','Russian',1),(7,501,'Germany','German',2),(8,502,'Austro-Hungary','Austro-Hungarian',2),(9,600,'Future Country','Future',3),(10,610,'War Dogs Country','War Dogs',4),(11,620,'Mercenaries Country','Mercenaries',5),(12,630,'Knights Country','Knights',6),(13,640,'Corsairs Country','Corsairs',7);
/*!40000 ALTER TABLE `rof_countries` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rof_gunner_scores`
--

DROP TABLE IF EXISTS `rof_gunner_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_gunner_scores` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_gunner_scores`
--

LOCK TABLES `rof_gunner_scores` WRITE;
/*!40000 ALTER TABLE `rof_gunner_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `rof_gunner_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rof_kills`
--

DROP TABLE IF EXISTS `rof_kills`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_kills` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_kills`
--

LOCK TABLES `rof_kills` WRITE;
/*!40000 ALTER TABLE `rof_kills` DISABLE KEYS */;
/*!40000 ALTER TABLE `rof_kills` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rof_lake_locations`
--

DROP TABLE IF EXISTS `rof_lake_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_lake_locations` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `LID` smallint(1) unsigned NOT NULL,
  `LX` decimal(15,0) NOT NULL,
  `LZ` decimal(15,0) NOT NULL,
  `LName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_lake_locations`
--

LOCK TABLES `rof_lake_locations` WRITE;
/*!40000 ALTER TABLE `rof_lake_locations` DISABLE KEYS */;
INSERT INTO `rof_lake_locations` VALUES (1,51,31976,32281,'Ambrieres'),(2,51,31869,45945,'Ancerville'),(3,51,31769,22675,'Artigoy'),(4,51,20438,18901,'Bally-le-Franc'),(5,51,42732,27329,'Blesme'),(6,51,14118,10647,'Blignicourt'),(7,51,2892,33589,'Blumeray'),(8,51,27357,11458,'Brandonville'),(9,51,21609,30824,'Braucourt'),(10,51,5722,9573,'Brienne-le-Chateau'),(11,51,16577,41970,'Brousseval'),(12,10,23637,26732,'Champaubert'),(13,51,25906,7797,'Chapelaine'),(14,10,18701,12107,'Chavanges'),(15,51,18583,13298,'Chavanges'),(16,51,36039,17670,'Cloyes-sur-Marne'),(17,10,25846,24754,'Der-Chantecoq'),(18,51,9687,41602,'Dommartin'),(19,51,4034,37746,'Doulevant'),(20,51,25715,15453,'Drosnay'),(21,51,18820,21771,'Droyes'),(22,51,27706,34351,'Eclaron-Braucourt'),(23,51,38838,20759,'Ecriennes'),(24,51,27594,46619,'Eurville-Bienville'),(25,51,41881,23822,'Favresse'),(26,51,19911,30234,'Frampas'),(27,51,23493,26007,'Giffaumont-Champaubert'),(28,51,33925,34776,'Hallignicourt'),(29,51,12974,14404,'Hampigny'),(30,51,42248,26009,'Haussigremont'),(31,51,48653,25587,'Heltz'),(32,51,38145,26644,'Hentz-le-Hutier'),(33,51,40466,9802,'Huiron'),(34,52,26750,-1000,'International Boundary'),(35,52,26750,1000,'International Boundary'),(36,52,26750,3000,'International Boundary'),(37,52,26750,5000,'International Boundary'),(38,52,26750,7000,'International Boundary'),(39,52,26750,9000,'International Boundary'),(40,52,26750,11000,'International Boundary'),(41,52,26750,13000,'International Boundary'),(42,52,26750,15000,'International Boundary'),(43,52,26750,17000,'International Boundary'),(44,52,26750,19000,'International Boundary'),(45,52,26750,21000,'International Boundary'),(46,52,26750,23000,'International Boundary'),(47,52,26750,25000,'International Boundary'),(48,52,26750,27000,'International Boundary'),(49,52,26750,29000,'International Boundary'),(50,52,26750,31000,'International Boundary'),(51,52,26750,33000,'International Boundary'),(52,52,26750,35000,'International Boundary'),(53,52,26750,37000,'International Boundary'),(54,52,26750,39000,'International Boundary'),(55,52,26750,41000,'International Boundary'),(56,52,26750,43000,'International Boundary'),(57,52,26750,45000,'International Boundary'),(58,52,26750,47000,'International Boundary'),(59,52,26750,49000,'International Boundary'),(60,52,26750,51000,'International Boundary'),(61,52,26750,53000,'International Boundary'),(62,51,20074,15342,'Joncreuil'),(63,51,8438,14738,'Juzanvigny'),(64,10,29288,25695,'Lac-Nuisement'),(65,51,29247,28799,'Lac-Nuisement'),(66,51,14972,35750,'Laneuville'),(67,51,32571,1709,'Le Meix Tiercelin'),(68,51,15107,14917,'Lentilles'),(69,51,46385,10395,'Loisy-sur-Marne'),(70,51,12384,21180,'Longville-sur-la-Laines'),(71,51,10141,21680,'Louze'),(72,20,8185,24297,'Louze'),(73,51,23749,9142,'Margerie-Hancourt'),(74,51,45742,33468,'Maurupt-le-Montois'),(75,51,9000,36220,'Mertrud'),(76,51,48847,44595,'Mogneville'),(77,51,16297,12287,'Monimorehey-Beaufort'),(78,51,15293,27244,'Montier-en-Der'),(79,51,4629,16887,'Morvillers'),(80,51,10900,49570,'Nomecourt'),(81,51,2882,29864,'Nully'),(82,51,36672,24905,'Orconte'),(83,10,24462,22066,'Outiens'),(84,51,24516,17730,'Outines'),(85,51,9996,10451,'Perthes Les Brienne'),(86,51,18625,29251,'Planrupt'),(87,51,46155,22636,'Ponthion'),(88,20,46979,26428,'Ponthion'),(89,51,42118,19711,'Raims-la-Brulee'),(90,51,9712,31361,'Rozieres'),(91,51,35312,30412,'Sapignicourt'),(92,51,41135,27273,'Scrupt'),(93,51,49427,37958,'Sermaize-les-Bains'),(94,51,7844,32259,'Sommevoire'),(95,51,3515,24624,'Soulaines'),(96,51,32368,12225,'St-Cheron'),(97,10,32085,15349,'St-Cheron'),(98,10,31828,36762,'St-Dizier'),(99,51,33265,40465,'St-Dizier'),(100,51,21088,6301,'St-leger-sous-Margerie'),(101,51,32305,18894,'St-remy-en-Bouzemont'),(102,10,28530,30366,'Ste Liviere'),(103,51,29147,31089,'Ste Liviere'),(104,51,38864,23797,'Thieblemont-Faremont'),(105,51,10629,29188,'Thilleux'),(106,51,3319,27459,'Tremilly'),(107,51,41373,41100,'Trois-fontaines-l\'Abbaye'),(108,51,22520,45581,'Troisfontaines'),(109,51,40526,19276,'Vauclerc'),(110,51,22221,42716,'Villers-aux-Bois'),(111,51,3581,36507,'Villiers-aux-Chenes'),(112,51,36807,35880,'Villiers-en-Lieu'),(113,50,43073,13909,'Vitry-le-Francois'),(114,51,18426,34637,'Voillecomte'),(115,10,18480,40087,'Wassy'),(116,51,17517,40495,'Wassy'),(117,51,15872,6507,'Yevres-le-Petit');
/*!40000 ALTER TABLE `rof_lake_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rof_models`
--

DROP TABLE IF EXISTS `rof_models`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_models` (
  `model` varchar(45) NOT NULL,
  PRIMARY KEY (`model`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_models`
--

LOCK TABLES `rof_models` WRITE;
/*!40000 ALTER TABLE `rof_models` DISABLE KEYS */;
INSERT INTO `rof_models` VALUES ('albatrosd5'),('brequet14'),('dfc5'),('felixf2a'),('fokkerd7'),('gothag5');
/*!40000 ALTER TABLE `rof_models` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rof_object_properties`
--

DROP TABLE IF EXISTS `rof_object_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_object_properties` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `object_type` varchar(50) NOT NULL,
  `object_class` varchar(8) NOT NULL,
  `object_value` smallint(1) NOT NULL,
  `object_desc` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `object_type` (`object_type`)
) ENGINE=InnoDB AUTO_INCREMENT=241 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_object_properties`
--

LOCK TABLES `rof_object_properties` WRITE;
/*!40000 ALTER TABLE `rof_object_properties` DISABLE KEYS */;
INSERT INTO `rof_object_properties` VALUES (1,'13PdrAAA','AAA',80,'13-pounder AAA'),(2,'13PrdaaaAttached','AAA',80,'13-pounder AAA'),(3,'45QF','ART',100,'4.5 in. Quick Fire artillery'),(4,'75FG1897','ART',100,'75mm M1897 artillery'),(5,'77mmAAA','AAA',80,'77mm AAA'),(6,'77mmAAAAttached','AAA',80,'77mm AAA'),(7,'A7V','T',100,'A7V tank'),(8,'AeType','BAL',50,'Type Ae observation balloon'),(9,'Airco D.H.2','PFI',100,'Airco D.H.2'),(10,'Airco D.H.4','PRE',200,'Airco D.H.4'),(11,'Albatros D.II','PFI',100,'Albatros D.II'),(12,'Albatros D.II lt','PFI',100,'Albatros D.II lt'),(13,'Albatros D.III','PFI',100,'Albatros D.III'),(14,'Albatros D.Va','PFI',100,'Albatros D.Va'),(15,'Benz Searchlight','VTR',50,'Benz Cargo truck with searchlight'),(16,'benz_open','VTR',50,'Benz Cargo open truck'),(18,'benz_soft','VTR',50,'Benz Cargo covered truck'),(19,'BotBoatSwain','BOT',0,'bosun'),(21,'BotGunnerBacker','BOT',0,'Becker gunner'),(22,'BotGunnerBreguet14','BOT',0,'gunner'),(24,'BotGunnerBW12','BOT',0,'Brandenburg W12 gunner'),(25,'BotGunnerDavis','BOT',0,'Davis gunner'),(26,'BotGunnerFe2_sing','BOT',0,'F.E.2b gunner'),(27,'BotGunnerFelix_top-twin','BOT',0,'Felixstowe F.2A top gunner'),(28,'BotGunnerG5_1','BOT',0,'gunner'),(29,'BotGunnerG5_2','BOT',0,'gunner'),(30,'BotGunnerHCL2','BOT',0,'Halberstadt Cl.II gunner'),(31,'BotGunnerHP400_1','BOT',0,'nose gunner'),(32,'BotGunnerHP400_2','BOT',0,'Handley Page 0/400 dorsal gunner'),(33,'BotGunnerHP400_2_WM','BOT',0,'Handley Page O/400 dorsal gunner'),(34,'BotGunnerHP400_3','BOT',0,'Handley Page O/400 belly gunner'),(35,'BotGunnerRE8','BOT',0,'gunner'),(36,'Brandenburg W12','PSE',200,'Brandenburg W12'),(37,'Breguet 14.B2','PRE',200,'Breguet 14.B2'),(38,'bridge_hw110','INF',0,'110m road bridge'),(39,'bridge_hw130','INF',0,'130m road bridge'),(40,'bridge_hw150','INF',0,'150m road bridge'),(41,'bridge_hw170','INF',0,'170m road bridge'),(42,'bridge_hw190','INF',0,'190m road bridge'),(43,'bridge_hw40','INF',0,'40m road bridge'),(44,'bridge_hw70','INF',0,'70m road bridge'),(45,'bridge_hw90','INF',0,'90m road bridge'),(46,'bridge_rr110','INF',0,'110m rail bridge'),(47,'bridge_rr130','INF',0,'130m rail bridge'),(48,'bridge_rr150','INF',0,'150m rail bridge'),(49,'bridge_rr170','INF',0,'170m rail bridge'),(50,'bridge_rr190','INF',0,'190m rail bridge'),(51,'bridge_rr70','INF',0,'70m rail bridge'),(52,'bridge_rr90','INF',0,'90m rail bridge'),(53,'Bristol F2B (F.II)','PRE',200,'Bristol F2B (F.II)'),(54,'Bristol F2B (F.III)','PRE',200,'Bristol F2B (F.III)'),(55,'British naval 12pdr gun','NAR',0,'naval 12-pounder gun'),(56,'British naval 4in AAA gun','NAA',80,'4in naval AAA gun'),(57,'British naval 4in gun','NAR',0,'naval 4in gun'),(58,'British navel 6in gun','NAR',0,'naval 6in gun'),(59,'Ca1','T',100,'Schneider CA1 tank'),(60,'CappyChateau','INF',0,'Cappy Chateau'),(61,'Caquot','BAL',50,'Caquot Type R observation balloon'),(62,'Cargo Ship','STR',300,'cargo ship'),(63,'churchE_01','INF',0,'church'),(64,'Common Bot','HUM',0,'pilot'),(65,'Crossley','VTR',50,'Crossley 4X2 Staff Car'),(66,'DaimlerAAA','VAA',80,'77mm AAA on Daimler truck'),(67,'DaimlerMarienfelde','VTR',50,'Daimler Marienfelde truck'),(68,'DaimlerMarienfelde_S','VTR',50,'Daimler Marienfelde truck'),(69,'DFW C.V','PRE',200,'DFW.C.V'),(70,'Drachen','BAL',50,'Drachen type observation balloon'),(71,'F.E.2b','PRE',200,'F.E.2b'),(72,'F17M','T',100,'Renault FT17 machine gun tank'),(73,'factory_01','INF',0,'factory'),(74,'factory_02','INF',0,'factory'),(75,'factory_03','INF',0,'factory'),(76,'factory_04','INF',0,'factory'),(77,'factory_05','INF',0,'factory'),(78,'factory_06','INF',0,'factory'),(79,'factory_07','INF',0,'factory'),(80,'factory_08','INF',0,'factory'),(81,'Felixstowe F2A','PSE',200,'Felixstowe F2A'),(82,'FK96','ART',100,'Feldkanone 96 77mm artillery'),(83,'Flag','FLG',0,'flag'),(84,'Fokker D.VII','PFI',100,'Fokker D.VII'),(85,'Fokker D.VIIF','PFI',100,'Fokker D.VIIF'),(86,'Fokker D.VIII','PFI',100,'Fokker D.VIII'),(87,'Fokker Dr.I','PFI',100,'Fokker Dr.I'),(88,'Fokker E.III','PFI',100,'Fokker E.III'),(89,'FRpenicheAAA','SAA',80,'peniche AAA barge'),(90,'fr_lrg','INF',0,'airfield'),(91,'fr_med','INF',0,'airfield'),(92,'FT17C','T',100,'Renault FT17 cannon tank'),(93,'G8','RLO',50,'locomotive'),(94,'GBR Searchlight','LGT',50,'searchlight'),(95,'GER light cruiser','SCR',1000,'light cruiser'),(96,'GER Ship Searchlight','LGT',50,'ship searchlight'),(97,'GER submarine','SSU',500,'U-boat'),(98,'German naval 105mm gun','NAR',0,'naval 105mm gun'),(99,'German naval 52mm gun','NAR',0,'naval 52mm gun'),(100,'GERpenicheAAA','SAA',80,'peniche AAA barge'),(101,'ger_lrg','INF',0,'airfield'),(102,'ger_med','INF',0,'airfield'),(103,'Gotha G.V','PBO',200,'Gotha G.V'),(104,'gunpos01','INF',0,'gun position'),(105,'gunpos_g01','INF',0,'gun position'),(106,'Halberstadt CL.II','PRE',200,'Halberstadt CL.II'),(107,'Halberstadt CL.II 200hp','PRE',200,'Halberstadt CL.II 200hp'),(108,'Halberstadt D.II','PFI',100,'Halberstadt D.II'),(109,'Handley Page 0-400','PBO',200,'Handley Page O/400'),(110,'HMS light cruiser','SCR',1000,'light cruiser'),(111,'HMS Ship Searchlight','LGT',50,'ship searchlight'),(112,'HMS submarine','SSU',500,'submarine'),(113,'Hotchkiss','IMG',50,'Hotchkiss machine gun'),(114,'HotchkissAAA','IMA',80,'anti-aircraft Hotchkiss machine gun'),(115,'Leyland','VTR',50,'Leyland 3-tonner truck'),(116,'LeylandS','VTR',50,'Leyland 3-tonner truck'),(117,'LMG08AAA','IMA',80,'anti-aircraft Maxim machine gun'),(118,'LMGO8','IMG',50,'Maxim machine gun'),(119,'M-Flak','IMA',80,'37mm automatic flak gun'),(120,'m13','ART',100,'15cm schweres Feldhaubitze M13 Lang'),(121,'Merc22','VTR',50,'Mercedes 22 Staff Car'),(122,'Mk4F','T',100,'Mk IV Female tank'),(123,'Mk4FGER','T',100,'Mk IV Female tank'),(124,'Mk4M','T',100,'Mk IV Male tank'),(125,'MK4MGER','T',100,'Mk IV Male tank'),(126,'Mk5F','T',100,'Mk V Female tank'),(127,'Mk5M','T',100,'Mk V Male tank'),(128,'Nieuport 11.C1','PFI',100,'Nieuport 11.C1'),(129,'Nieuport 17.C1','PFI',100,'Nieuport 17.C1'),(130,'Nieuport 17.C1 GBR','PFI',100,'Nieuport 17.C1 GBR'),(131,'Nieuport 28.C1','PFI',100,'Nieuport 28.C1'),(132,'Parseval','BAL',50,'Parseval-Sigsfeld kite balloon'),(133,'Passenger Ship','SPA',300,'passenger ship'),(134,'Pfalz D.IIIa','PFI',100,'Pfalz D.IIIa'),(135,'Pfalz D.XII','PFI',100,'Pfalz D.XII'),(136,'pillbox01','INF',0,'pillbox'),(137,'pillbox02','INF',0,'pillbox'),(138,'pillbox03','INF',0,'pillbox'),(139,'pillbox04','INF',0,'pillbox'),(140,'Portal','INF',0,'pillbox'),(141,'Quad','VTR',50,'Jeffery Quad Portee open truck'),(142,'Quad Searchlight','VTR',50,'Jeffery Quad Portee with searchlight'),(143,'QuadA','VTR',-50,'Jeffery Quad Portee closed truck'),(144,'R.E.8','PRE',200,'R.E.8'),(145,'railwaystation_1','INF',0,'railway station'),(146,'railwaystation_2','INF',0,'railway station'),(147,'railwaystation_3','INF',0,'railway station'),(148,'railwaystation_4','INF',0,'railway station'),(149,'railwaystation_5','INF',0,'railway station'),(150,'river_airbase','INF',0,'seaplane pier'),(151,'river_airbase2','INF',0,'seaplane pier'),(152,'river_airbase3','INF',0,'seaplane pier'),(153,'Roland C.IIa','PRE',200,'Roland C.IIa'),(154,'Roucourt','INF',0,'airfield'),(155,'rwstation','INF',0,'railway station'),(156,'S.E.5a','PFI',100,'S.E.5a'),(157,'ship_stat_cargo','STR',150,'stationary cargo ship'),(158,'ship_stat_pass','SPA',150,'stationary passenger ship'),(159,'ship_stat_tank','STR',150,'stationary tanker ship'),(160,'Sopwith Camel','PFI',100,'Sopwith Camel'),(161,'Sopwith Dolphin','PFI',100,'Sopwith Dolphin'),(162,'Sopwith Pup','PFI',100,'Sopwith Pup'),(163,'Sopwith Triplane','PFI',100,'Sopwith Triplane'),(164,'SPAD 13.C1','PFI',100,'SPAD 13.C1'),(165,'SPAD 7.C1 150hp','PFI',100,'SPAD 7.C1 150hp'),(166,'SPAD 7.C1 180hp','PFI',100,'SPAD 7.C1 180hp'),(167,'StChamond','T',100,'Saint-Chamond tank'),(168,'Tanker Ship','STR',300,'tanker ship'),(169,'tent01','INF',1000,'the HQ tent'),(170,'tent02','INF',0,'tent'),(171,'tent03','INF',0,'tent'),(172,'tent_camp01','INF',0,'tent emcampment'),(173,'tent_camp02','INF',0,'tent encampment'),(174,'tent_camp03','INF',0,'tent encampment'),(175,'tent_camp04','INF',0,'tent encampment'),(176,'thornycroftaaa','VAA',80,'13-pounder AAA on Thornycraft truck'),(177,'TurretBreguet14_1','TUR',0,'gunner'),(178,'TurretBristolF2BF2_1_WM2','TUR',0,'Bristol F2.B gunner'),(179,'TurretBristolF2BF3_1_WM2','TUR',0,'Bristol F2.B gunner'),(180,'TurretBristolF2B_1','TUR',0,'Bristol F2.B gunner'),(181,'TurretBW12_1','TUR',0,'Brandenburg W12 gunner'),(182,'TurretBW12_1_WM_Becker_AP','TUR',0,'Brandenburg W12 gunner'),(183,'TurretBW12_1_WM_Becker_HE','TUR',0,'Brandenburg W12 gunner'),(184,'TurretBW12_1_WM_Becker_HEAP','TUR',0,'Brandenburg W12 gunner'),(185,'TurretBW12_1_WM_Twin_Parabellum','TUR',0,'Brandenburg W12 gunner'),(186,'TurretDFWC_1','TUR',0,'DFW C.V gunner'),(187,'TurretDFWC_1_WM_Becker_AP','TUR',0,'DFW C.V gunner'),(188,'TurretDFWC_1_WM_Becker_HE','TUR',0,'DFW C.V gunner'),(189,'TurretDFWC_1_WM_Becker_HEAP','TUR',0,'DFW C.V gunner'),(190,'TurretDFWC_1_WM_Twin_Parabellum','TUR',0,'DFW C.V gunner'),(191,'TurretDH4_1','TUR',0,'D.H.4 gunner'),(192,'TurretDH4_1_WM','TUR',0,'D.H.4 gunner'),(193,'TurretFe2b_1','TUR',0,'F.E.2b gunner'),(194,'TurretFe2b_1_WM','TUR',0,'F.E.2b gunner'),(195,'TurretFelixF2A_2','TUR',0,'Felixstowe F.2A gunner'),(196,'TurretFelixF2A_3','TUR',0,'Felixstowe F.2A gunner'),(197,'TurretFelixF2A_3_WM','TUR',0,'Felixstowe F.2A gunner'),(198,'TurretGothaG5_1','TUR',0,'Gotha G.V nose gunner'),(199,'TurretGothaG5_1_WM_Becker_AP','TUR',0,'Gotha G.V nose gunner'),(200,'TurretGothaG5_1_WM_Becker_HE','TUR',0,'Gotha G.V nose gunner'),(201,'TurretGothaG5_1_WM_Becker_HEAP','TUR',0,'Gotha G.V nose gunner'),(202,'TurretGothaG5_2','TUR',0,'rear gunner'),(203,'TurretGothaG5_2_WM_Twin_Parabellum','TUR',0,'rear gunner'),(204,'TurretHalberstadtCL2au_1','TUR',0,'Halberstadt CL.II gunner'),(205,'TurretHalberstadtCL2au_1_WM_TwinPar','TUR',0,'Halberstadt CL.II gunner'),(206,'TurretHalberstadtCL2_1','TUR',0,'Halberstadt CL.II gunner'),(207,'TurretHalberstadtCL2_1_WM_TwinPar','TUR',0,'Halberstadt CL.II gunner'),(208,'TurretHP400_1','TUR',0,'Handley Page O/400 nose gunner'),(209,'TurretHP400_1_WM','TUR',0,'Handley Page O/400 nose gunner'),(210,'TurretHP400_2','TUR',0,'Handley Page O/400 dorsal gunner'),(211,'TurretHP400_2_WM','TUR',0,'Handley Page O/400 dorsal gunner'),(212,'TurretHP400_3','TUR',0,'Handley Page O/400 belly gunner'),(213,'TurretRE8_1','TUR',0,'R.E.8 gunner'),(214,'TurretRE8_1_WM2','TUR',0,'R.E.8 gunner'),(215,'TurretRolandC2a_1','TUR',0,'Roland C.IIa gunner'),(216,'TurretRolandC2a_1_WM_TwinPar','TUR',0,'Roland C.IIa gunner'),(217,'Wagon_BoxB','RWA',25,'boxcar'),(218,'Wagon_BoxNB','RWA',25,'boxcar'),(219,'Wagon_G8T','RWA',25,'tender'),(220,'Wagon_GondolaB','RWA',25,'covered gondola'),(221,'Wagon_GondolaNB','RWA',25,'covered gondola'),(222,'Wagon_Pass','RWA',25,'passenger railcar'),(223,'Wagon_PassA','RWA',-25,'hospital railcar'),(224,'Wagon_PassAC','RWA',25,'hospital railcar'),(225,'Wagon_PassC','RWA',25,'passenger railcar'),(226,'Wagon_PlatformA7V','RWA',25,'loaded flatcar'),(227,'Wagon_PlatformB','RWA',25,'loaded flatcar'),(228,'Wagon_PlatformEmptyB','RWA',25,'empty flatcar'),(229,'Wagon_PlatformEmptyNB','RWA',25,'empty flatcar'),(230,'Wagon_PlatformMk4','RWA',25,'loaded flatcar'),(231,'Wagon_PlatformNB','RWA',25,'loaded flatcar'),(232,'Wagon_TankB','RWA',25,'tank railcar'),(233,'Wagon_TankNB','RWA',25,'tank railcar'),(234,'Whippet','T',100,'Whippet Mk A tank'),(235,'Windsock','FLG',0,'windsock'),(240,'Intrinsic','DNA',0,'Intrinsic');
/*!40000 ALTER TABLE `rof_object_properties` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rof_object_roles`
--

DROP TABLE IF EXISTS `rof_object_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_object_roles` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `unit_class` varchar(10) DEFAULT NULL,
  `role_description` varchar(23) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unit_class` (`unit_class`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_object_roles`
--

LOCK TABLES `rof_object_roles` WRITE;
/*!40000 ALTER TABLE `rof_object_roles` DISABLE KEYS */;
INSERT INTO `rof_object_roles` VALUES (1,'ART','Artillery'),(2,'AAA','Artillery:Anti-Aircraft'),(3,'BOT','Bot'),(4,'IMA','Infantry: MG AA'),(5,'IMG','Infantry:Machine Gun'),(6,'INF','Infrastructure'),(7,'NAA','Naval:Anti-Aircraft'),(8,'NAR','Naval:Artillery'),(9,'PBO','Plane:Bomber'),(10,'PFI','Plane:Fighter'),(11,'PFB','Plane:Fighter-Bomber'),(12,'PRE','Plane:Reconnaissance'),(13,'PSE','Plane:Seaplane'),(14,'PTR','Plane:Transport'),(15,'RAA','Rail:Anti-Aircraft'),(16,'RCV','Rail:Civil Train'),(17,'RLO','Rail:Locomotive'),(18,'RWA','Rail:Wagon'),(19,'VRI','Regular Infantry'),(20,'SAA','Ship:Anti-Aircraft'),(21,'SBA','Ship:Battleship'),(22,'SCR','Ship:Cruiser'),(23,'SDE','Ship:Destroyer'),(24,'SPB','Ship:Patrol Boat'),(25,'SSU','Ship:Submarine'),(26,'TAA','Tank:Anti-Aircraft'),(27,'TSP','Tank:Self-Propelled Gun'),(28,'T','Tank:Standard'),(29,'TTD','Tank:Tank Destroyer'),(30,'TUR','Turret'),(31,'VAA','Vehicle:Anti-Aircraft'),(32,'VMI','Vehicle:Mech. Infantry'),(33,'VTR','Vehicle:Transport'),(34,'LGT','searchlight');
/*!40000 ALTER TABLE `rof_object_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rof_pilot_scores`
--

DROP TABLE IF EXISTS `rof_pilot_scores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_pilot_scores` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_pilot_scores`
--

LOCK TABLES `rof_pilot_scores` WRITE;
/*!40000 ALTER TABLE `rof_pilot_scores` DISABLE KEYS */;
/*!40000 ALTER TABLE `rof_pilot_scores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rof_verdun_locations`
--

DROP TABLE IF EXISTS `rof_verdun_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_verdun_locations` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `LID` smallint(1) unsigned NOT NULL,
  `LX` decimal(15,0) NOT NULL,
  `LZ` decimal(15,0) NOT NULL,
  `LName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=134 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_verdun_locations`
--

LOCK TABLES `rof_verdun_locations` WRITE;
/*!40000 ALTER TABLE `rof_verdun_locations` DISABLE KEYS */;
INSERT INTO `rof_verdun_locations` VALUES (1,10,28000,34000,'Abaucourt'),(2,51,28650,36500,'Abaucourt'),(3,51,43600,38650,'Billy-sous-Mangiennes'),(4,51,19200,14350,'Blercourt'),(5,51,33000,21200,'Champneuville'),(6,51,30900,17100,'Chattancourt'),(7,51,18500,2300,'Clemont-en-Argonne'),(8,10,38950,16850,'Consenvoye'),(9,51,38700,17900,'Consenvoye'),(10,51,44900,26050,'Darnyillers'),(11,51,14700,28600,'Dieue-sur-Meuse'),(12,51,38500,48200,'Dommary-Baroncourt'),(13,51,39900,30550,'DuBois'),(14,10,40070,31080,'DuBois'),(15,51,30000,12450,'Esnes-en-Argonne'),(16,51,30300,43550,'Etain'),(17,51,5200,6300,'Evres'),(18,51,17400,42800,'Franses-en-Woevre'),(19,51,20400,27900,'Haudainville'),(20,51,19600,37500,'Haudiomont'),(21,51,3900,34050,'Lacroix-sur-Meuse'),(22,51,14000,17700,'Lemmes'),(23,10,10100,17700,'Lemmes'),(24,10,15200,39700,'Les Eparges'),(25,51,14150,40600,'Les Eparges'),(26,51,46100,10650,'Liry-devant-Dun'),(27,51,46000,35800,'Mangiennes'),(28,51,16500,46650,'Marcheville-en-Woevre'),(29,10,19900,48650,'Marcheville-en-Woevre'),(30,51,34100,34300,'Maucourt-sur-Orne'),(31,20,35950,6450,'Montfaucon-d\'Argonne'),(32,51,36050,7200,'Montfaucon-d\'Argonne'),(33,51,48400,39000,'Pillon'),(34,51,6300,21600,'Rambluzin-et-benoit-Vaux'),(35,51,22500,8600,'Recicourt'),(36,51,7600,25900,'Recourt'),(37,51,43500,3450,'Romangne-sous-Montfaucon'),(38,51,37450,43050,'Senon'),(39,20,36950,44500,'Senon'),(40,51,22950,15850,'Sivry-la-Perche'),(41,10,23150,16600,'Sivry-la-Perche'),(42,51,42550,45200,'Spincourt'),(43,51,7800,14000,'St-Endre-en-Barrois'),(44,51,8650,46800,'St-Maurice-sous-les-Cotes'),(45,52,24600,-1000,'the Canadian side of the border'),(46,52,24600,1000,'the Canadian side of the border'),(47,52,24600,3000,'the Canadian side of the border'),(48,52,24600,5000,'the Canadian side of the border'),(49,52,24600,7000,'the Canadian side of the border'),(50,52,24600,9000,'the Canadian side of the border'),(51,52,24600,11000,'the Canadian side of the border'),(52,52,24600,13000,'the Canadian side of the border'),(53,52,24600,15000,'the Canadian side of the border'),(54,52,24600,17000,'the Canadian side of the border'),(55,52,24600,19000,'the Canadian side of the border'),(56,52,24600,21000,'the Canadian side of the border'),(57,52,24600,23000,'the Canadian side of the border'),(58,52,24600,25000,'the Canadian side of the border'),(59,52,24600,27000,'the Canadian side of the border'),(60,52,24600,29000,'the Canadian side of the border'),(61,52,24600,31000,'the Canadian side of the border'),(62,52,24600,33000,'the Canadian side of the border'),(63,52,24600,35000,'the Canadian side of the border'),(64,52,24600,37000,'the Canadian side of the border'),(65,52,24600,39000,'the Canadian side of the border'),(66,52,24600,41000,'the Canadian side of the border'),(67,52,24600,43000,'the Canadian side of the border'),(68,52,24600,45000,'the Canadian side of the border'),(69,52,24600,47000,'the Canadian side of the border'),(70,52,24600,49000,'the Canadian side of the border'),(71,52,24600,51000,'the Canadian side of the border'),(72,52,24600,53000,'the Canadian side of the border'),(73,52,24500,-1000,'the International Boundary'),(74,52,24500,1000,'the International Boundary'),(75,52,24500,3000,'the International Boundary'),(76,52,24500,5000,'the International Boundary'),(77,52,24500,7000,'the International Boundary'),(78,52,24500,9000,'the International Boundary'),(79,52,24500,11000,'the International Boundary'),(80,52,24500,13000,'the International Boundary'),(81,52,24500,15000,'the International Boundary'),(82,52,24500,17000,'the International Boundary'),(83,52,24500,19000,'the International Boundary'),(84,52,24500,21000,'the International Boundary'),(85,52,24500,23000,'the International Boundary'),(86,52,24500,25000,'the International Boundary'),(87,52,24500,27000,'the International Boundary'),(88,52,24500,29000,'the International Boundary'),(89,52,24500,31000,'the International Boundary'),(90,52,24500,33000,'the International Boundary'),(91,52,24500,35000,'the International Boundary'),(92,52,24500,37000,'the International Boundary'),(93,52,24500,39000,'the International Boundary'),(94,52,24500,41000,'the International Boundary'),(95,52,24500,43000,'the International Boundary'),(96,52,24500,45000,'the International Boundary'),(97,52,24500,47000,'the International Boundary'),(98,52,24500,49000,'the International Boundary'),(99,52,24500,51000,'the International Boundary'),(100,52,24500,53000,'the International Boundary'),(101,52,24400,-1000,'the US side of the border'),(102,52,24400,1000,'the US side of the border'),(103,52,24400,3000,'the US side of the border'),(104,52,24400,5000,'the US side of the border'),(105,52,24400,7000,'the US side of the border'),(106,52,24400,9000,'the US side of the border'),(107,52,24400,11000,'the US side of the border'),(108,52,24400,13000,'the US side of the border'),(109,52,24400,15000,'the US side of the border'),(110,52,24400,17000,'the US side of the border'),(111,52,24400,19000,'the US side of the border'),(112,52,24400,21000,'the US side of the border'),(113,52,24400,23000,'the US side of the border'),(114,52,24400,25000,'the US side of the border'),(115,52,24400,27000,'the US side of the border'),(116,52,24400,29000,'the US side of the border'),(117,52,24400,31000,'the US side of the border'),(118,52,24400,33000,'the US side of the border'),(119,52,24400,35000,'the US side of the border'),(120,52,24400,37000,'the US side of the border'),(121,52,24400,39000,'the US side of the border'),(122,52,24400,41000,'the US side of the border'),(123,52,24400,43000,'the US side of the border'),(124,52,24400,45000,'the US side of the border'),(125,52,24400,47000,'the US side of the border'),(126,52,24400,49000,'the US side of the border'),(127,52,24400,51000,'the US side of the border'),(128,52,24400,53000,'the US side of the border'),(129,51,7250,30800,'Troyon'),(130,50,24700,25000,'Verdun'),(131,51,44100,13750,'Vilosnes-Haraumont'),(132,10,18050,4200,'Vraincourt'),(133,51,19800,4400,'Vraincourt');
/*!40000 ALTER TABLE `rof_verdun_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `rof_westernfront_locations`
--

DROP TABLE IF EXISTS `rof_westernfront_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_westernfront_locations` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `LID` smallint(1) unsigned NOT NULL,
  `LX` decimal(15,0) NOT NULL,
  `LZ` decimal(15,0) NOT NULL,
  `LName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `LName` (`LName`)
) ENGINE=InnoDB AUTO_INCREMENT=978 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_westernfront_locations`
--

LOCK TABLES `rof_westernfront_locations` WRITE;
/*!40000 ALTER TABLE `rof_westernfront_locations` DISABLE KEYS */;
INSERT INTO `rof_westernfront_locations` VALUES (1,51,171499,60879,'Acheler'),(2,51,174810,2339,'Airaines'),(3,20,174691,1413,'Airaines'),(4,51,261707,6689,'Alquines'),(5,20,262184,7244,'Alquines'),(6,52,214372,114031,'Alunoy'),(7,20,214132,113323,'Alunoy'),(8,52,97183,267124,'Amel-sur-l_Etand'),(9,50,166758,25191,'Amiens'),(10,51,214269,94200,'Aniche'),(11,10,215063,95436,'Aniche'),(12,51,95066,108241,'Arcy-Ste Restitue'),(13,20,95448,108874,'Arcy-Ste Restitue'),(14,50,209926,59536,'Arras'),(15,51,168356,64138,'Assevillers'),(16,20,167514,64559,'Assevillers'),(17,51,236290,37851,'Auchel'),(18,10,235812,39102,'Auchel'),(19,51,130079,30556,'Aussonvillers'),(20,20,130448,29311,'Aussonvillers'),(21,52,145157,133604,'Autremencourt'),(22,20,144922,132525,'Autremencourt'),(23,51,70345,197813,'Auve'),(24,10,69101,197585,'Auve'),(25,51,205474,102988,'Avensnes-le-Sec'),(26,20,205760,103781,'Avensnes-le-Sec'),(27,51,195250,96247,'Awoingt'),(28,20,195009,96845,'Awoingt'),(29,20,176475,41930,'Braizieux'),(30,52,145816,65840,'Balatre'),(31,20,146157,65455,'Balatre,E Roye'),(32,10,43793,233539,'Bar le Duc (Behonne)'),(33,51,42383,231978,'Bar le Duc (Behonne)'),(34,52,275598,98680,'Bavichove'),(35,20,274915,97750,'Bavichove,N Courtrai'),(36,10,50522,128988,'Baye'),(37,51,51153,130152,'Baye'),(38,51,246751,71499,'Beaucamp'),(39,20,246720,68859,'Beaucamp'),(40,10,114733,7021,'Beauvais'),(41,51,116115,8918,'Beauvais'),(42,10,118376,11127,'Beauvais, Tille'),(43,51,119019,10937,'Beauvais, Tille'),(44,52,193390,103248,'Beauvois,E Cambrai'),(45,20,193615,105295,'Beauvois,E Cambrai'),(46,10,62136,233999,'Beauze sur Aire'),(47,51,62937,234583,'Beauze sur Aire'),(48,20,97521,268387,'Bellevue Ferme'),(49,10,51108,241250,'Belrain'),(50,51,50158,241089,'Belrain'),(51,51,277675,29800,'Bergues'),(52,10,277105,29559,'Bergues Coudekerque'),(53,52,168008,82610,'Bernes'),(54,20,166956,82212,'Bernes'),(55,52,232325,89820,'Bersee'),(56,20,230226,89300,'Bersee,NW Douai'),(57,10,174275,25349,'Bertangles'),(58,52,187778,107814,'Bertry'),(59,20,187565,106843,'Bertry 1'),(60,20,186462,109443,'Bertry 2'),(61,52,132891,117129,'Besny-et-Loisy'),(62,20,132263,118129,'Besny-et-Loisy'),(63,52,191700,67851,'Beugnatre'),(64,20,191721,68531,'Beugnatre'),(65,10,91548,104794,'Beugneux'),(66,51,92722,105066,'Beugneux'),(67,10,70681,91675,'Bezu'),(68,51,69403,91253,'Bezu'),(69,51,269328,92231,'Bisseghem'),(70,20,268262,94121,'Bisseghem,Courtrai'),(71,20,29773,189370,'Blaise'),(72,51,30129,190350,'Blaise'),(73,20,207081,18316,'Boffles'),(74,51,207044,18927,'Boffles'),(75,51,176550,107912,'Bohain'),(76,20,176727,107033,'Bohain'),(77,52,194357,100599,'Boistrancourt'),(78,20,193755,100912,'Boistrancourt'),(79,51,134865,143383,'Boncourt'),(80,20,134977,143902,'Boncourt'),(81,10,98452,125309,'Bonne Maisson'),(82,52,144903,78667,'Bonneuil Ferme'),(83,20,144689,79053,'Bonneuil Ferme'),(84,52,175690,91840,'Bony'),(85,10,176714,91027,'Bony'),(86,52,166286,78352,'Bouvincourt'),(87,20,165526,79397,'Bouvincourt'),(88,10,76188,173591,'Bouy'),(89,52,76087,172712,'Bouy'),(90,10,80622,230970,'Brabant en Argonne'),(91,51,80489,230527,'Brabant en Argonne'),(92,20,49489,218466,'Brabant le Roi'),(93,51,50162,218187,'Brabant le Roi'),(94,51,177572,41372,'Braizieux'),(95,20,281419,34366,'Bray Dunes'),(96,51,281063,35186,'Bray Dunes'),(97,52,84233,105277,'Brecy'),(98,20,110397,35096,'Breuil le Sec'),(99,51,108737,34908,'Breuil le Sec'),(100,51,195348,111161,'Briastre'),(101,20,196233,110097,'Briastre'),(102,52,215146,114151,'Briquette'),(103,20,232636,43147,'Bruay'),(104,51,231954,44458,'Bruay'),(105,20,223108,31753,'Bryas'),(106,51,224190,32118,'Bryas'),(107,52,199241,71339,'Bullecourt'),(108,52,181919,109501,'Busigny'),(109,20,183098,107531,'Busigny'),(110,20,162373,37345,'Cachy'),(111,51,161878,38073,'Cachy'),(112,20,164462,37712,'Cachy-Bois I_Abbe'),(113,20,198118,97338,'Cambrai'),(114,50,197167,92533,'Cambrai'),(115,20,30186,160626,'Camp de Mailly'),(116,51,30407,161307,'Camp de Mailly'),(117,51,235117,77733,'Camphin'),(118,51,171272,58840,'Cappy'),(119,20,170799,59573,'Cappy North'),(120,20,168964,59192,'Cappy South'),(121,51,137084,231446,'Carignan'),(122,20,137834,233609,'Carignan'),(123,52,197100,97645,'Cauroir'),(124,20,48270,172998,'Cernon'),(125,51,48854,172398,'Cernon'),(126,20,267553,98826,'Ceune,Courtrai'),(127,20,97879,141542,'Chalons sur Vesle'),(128,51,98966,141025,'Chalons sur Vesle'),(129,52,131800,122191,'Chambry'),(130,20,134094,121354,'Chambry,Laon'),(131,20,52692,130459,'Champaubert'),(132,51,53163,130988,'Champaubert'),(133,20,30447,104207,'Champcouelle'),(134,51,29972,104845,'Champcouelle'),(135,52,144459,65834,'Champien'),(136,20,143015,63843,'Champien'),(137,20,118533,235591,'Charmois,S Stenay'),(138,52,108694,226262,'Chassonge Ferme'),(139,20,107554,226829,'Chassonge Ferme,Stenay/Verdun'),(140,20,67718,106918,'Chateau-Thierry'),(141,20,64245,60989,'Chauconin'),(142,51,64009,62674,'Chauconin'),(143,20,100363,94105,'Chaudun'),(144,51,139312,118669,'Chery-les-Pouilly'),(145,20,140236,118087,'Chery-les-Pouilly,N'),(146,20,139171,119225,'Chery-les-Pouilly,S'),(147,20,264708,27189,'Clairmarais'),(148,51,264211,26843,'Clairmarais'),(149,51,149474,91754,'Clastres'),(150,20,150478,90255,'Clastres'),(151,20,85367,103810,'Coincy'),(152,51,84803,104164,'Coincy'),(153,51,86182,283626,'Conflans'),(154,20,229095,29568,'Conteville'),(155,51,228888,28590,'Conteville'),(156,51,48798,75780,'Corbeville'),(157,20,280249,29009,'Coudekerque'),(158,51,279433,28371,'Coudekerque'),(159,20,71241,95352,'Coupru'),(160,51,70705,94692,'Coupru'),(161,51,222782,78350,'Courcelles-les-Lens'),(162,20,99943,149839,'Courcy'),(163,51,101602,148247,'Courcy'),(164,20,90854,106702,'Cramaille'),(165,52,91259,107513,'Cramaille'),(166,20,94353,67635,'Crapy en Valois'),(167,51,92553,67007,'Crapy en Valois'),(168,51,95895,36960,'Creil'),(169,20,274423,29343,'Crochte'),(170,51,274195,28814,'Crochte'),(171,52,169106,104710,'Croix-Fonsommes'),(172,51,273929,96012,'Cuerne'),(173,52,141950,134059,'Cuirieux'),(174,20,141451,135501,'Cuirieux,Laon'),(175,20,63882,31881,'Dagny'),(176,51,62887,31730,'Dagny'),(177,20,31935,287847,'Dommartin les Toul'),(178,51,31725,288735,'Dommartin les Toul'),(179,52,83807,287989,'Doncourt'),(180,20,82974,288787,'Doncourt'),(181,20,220059,78393,'Douai'),(182,50,219113,81878,'Douai'),(183,20,251362,8771,'Drionville'),(184,51,250554,9078,'Drionville'),(185,20,274421,46987,'Droogland'),(186,52,212274,93546,'Emerchicourt'),(187,20,212233,94101,'Emerchicourt,S Aniche'),(188,51,160883,74628,'Ennemain'),(189,20,160580,73975,'Ennemain,N Nesle'),(190,20,17007,266492,'Epiez'),(191,51,16501,268028,'Epiez'),(192,52,203942,88196,'Epinoy'),(193,20,203364,87321,'Epinoy,NW Cambrai'),(194,20,147803,78653,'Eppeville'),(195,52,148532,79720,'Eppeville'),(196,51,213043,88041,'Erchin'),(197,20,214091,89414,'Erchin'),(198,20,58409,237347,'Erize la Petite'),(199,51,57439,237476,'Erize la Petite'),(200,51,217821,97711,'Erre'),(201,20,218963,97099,'Erre,Somain'),(202,52,183804,111652,'Escaufort,Busigny'),(203,20,184696,111066,'Escaufort,Busigny'),(204,20,141030,23414,'Esquennoy'),(205,51,140535,22312,'Esquennoy'),(206,52,194281,98069,'Estourmel'),(207,20,245594,28055,'Estree-Blanche'),(208,51,244938,28590,'Estree-Blanche'),(209,52,201770,95059,'Eswars'),(210,20,202615,93864,'Eswars'),(211,51,177008,122782,'Etreux'),(212,20,175005,121962,'Etreux,Guise'),(213,20,61871,169623,'Fagnieres'),(214,51,61418,171321,'Fagnieres'),(215,51,158355,73475,'Falvy Peronne'),(216,20,158988,73757,'Falvy,Peronne'),(217,20,117557,20097,'Fay St. Quentin'),(218,52,116902,20557,'Fay St. Quentin'),(219,52,219490,97069,'Fenain'),(220,52,98098,125686,'Ferme Bonne Maison'),(221,20,77103,165582,'Ferme d_Alger'),(222,52,77102,166079,'Ferme d_Alger'),(223,20,114841,58726,'Ferme de Corbeaulieu'),(224,52,115026,58326,'Ferme de Corbeaulieu'),(225,20,102995,95181,'Ferme Gravançon'),(226,52,103170,94828,'Ferme Gravançon'),(227,52,269717,29364,'Ferme Hoog Huys'),(228,20,18625,133727,'Ferme Les Greves'),(229,52,18808,134387,'Ferme Les Greves'),(230,20,192255,21029,'Fienvillers'),(231,51,192758,21357,'Fienvillers'),(232,20,213151,45638,'Filescamp Ferme'),(233,52,213103,46161,'Filescamp Ferme'),(234,51,144524,241791,'Florenville'),(235,20,144578,242573,'Florenville'),(236,20,94006,113177,'Fonfry,N Fere-en-Tardenois'),(237,52,166979,103843,'Fonsomme'),(238,20,166715,103434,'Fonsomme'),(239,52,164539,106664,'Fontaine Notre Dame'),(240,20,162951,105708,'Fontaine Notre Dame'),(241,52,168889,102200,'Fontaine-Uterte'),(242,20,170656,102904,'Fontaine-Uterte'),(243,20,155029,82737,'Foreste'),(244,52,156432,82559,'Foreste'),(245,20,161240,58855,'Foucaucourt en Santerre'),(246,20,120454,18025,'Fouquerollers-Nord'),(247,20,119057,18367,'Fouquerolles'),(248,51,118986,19054,'Fouquerolles'),(249,20,48619,75149,'Francheville sur Marne'),(250,52,122074,266762,'Fresnois-la-Montagne'),(251,20,74984,229747,'Froides'),(252,51,74124,229635,'Froides'),(253,20,21121,303474,'Frolois'),(254,51,19893,303827,'Frolois'),(255,20,280967,36995,'Frontier'),(256,51,281393,36580,'Frontier'),(257,51,190616,22561,'Gandas'),(258,10,35469,286739,'Gengoult Toul'),(259,20,228986,141689,'Ghlin,Mons'),(260,52,86726,286542,'Giraumont'),(261,20,87086,287416,'Giraumont'),(262,20,64086,224621,'Giromancy'),(263,51,64738,225085,'Giromancy'),(264,51,61051,212558,'Givry-en-Argonne'),(265,51,230287,140144,'Glin'),(266,52,145116,79926,'Golancourt'),(267,52,184273,86793,'Gonnelieu,Cambrai'),(268,20,184751,87024,'Gonnelieu,Cambrai'),(269,20,31486,148887,'Gourcancon'),(270,51,32124,148429,'Gourcancon'),(271,52,178196,94220,'Gouy'),(272,51,184199,85283,'Gouzeaucourt'),(273,20,143438,36902,'Grivesnes'),(274,51,143753,37503,'Grivesnes'),(275,51,272762,47191,'Groogland'),(276,52,78804,170873,'Group'),(277,20,217168,85424,'Guesnain,Douai'),(278,51,166679,121392,'Guise,St.Quentin'),(279,20,166546,123239,'Guise,St.Quentin'),(280,20,160065,76850,'Guisecourt(GuIzancourt)'),(281,51,216590,86368,'Guisnain'),(282,51,159261,75048,'Guizancourt'),(283,52,159660,77023,'Guizancourt'),(284,51,266088,86094,'Halluin'),(285,20,265190,87573,'Halluin,N Lille2'),(286,51,149627,80562,'Ham'),(287,20,151122,79451,'Ham'),(288,51,154837,76152,'Ham Matigny'),(289,20,153499,76461,'Ham Matigny'),(290,52,167492,80318,'Hancourt'),(291,20,166998,79843,'Hancourt'),(292,20,273351,97905,'Harlebeke,Bavichove,NE Courtai'),(293,51,273208,98879,'Harlebeke'),(294,51,99600,177071,'Hauvine'),(295,20,98781,176647,'Hauvine'),(296,52,247949,83469,'Helesmes'),(297,20,247744,84529,'Helesmes,N Denain'),(298,52,201413,72181,'Hendecourt-les-Cagnicourt'),(299,20,25526,154763,'Herbisse'),(300,51,25981,155296,'Herbisse'),(301,20,26389,157298,'Herbisse, Est'),(302,51,218329,28288,'Herlin-le-Sec'),(303,20,217638,28814,'Herlinger(Herlin-le-Sec)'),(304,51,190204,80134,'Hermes'),(305,20,190295,79330,'Hermes,Cambrai'),(306,20,138325,5382,'Hetomesnil'),(307,51,138284,4372,'Hetomesnil'),(308,51,271903,93954,'Heule'),(309,20,272097,93000,'Heule,Courtrai'),(310,20,107024,274718,'Hivry-Circourt'),(311,51,106692,275383,'Hivry-Circourt'),(312,20,277554,36092,'Hondschoote'),(313,51,276783,36670,'Hondschoote'),(314,20,270484,28935,'Hoog Huys'),(315,51,15119,301278,'Houdelmont'),(316,20,15468,300368,'Houdelmont'),(317,52,241543,74715,'Houplin'),(318,20,240913,76500,'Houplin,S Lille'),(319,51,204421,99113,'Iwuy'),(320,20,204221,102091,'Iwuy'),(321,20,114566,246890,'Jametz'),(322,52,114734,247451,'Jametz'),(323,20,73247,234025,'Julvecourt'),(324,51,74374,233550,'Julvecourt'),(325,20,217330,82481,'La Brayelle,Douai'),(326,20,178646,93932,'La Catelet'),(327,20,47145,191827,'La Cense'),(328,51,48183,192272,'La Cense'),(329,20,71247,183390,'La Cheppe'),(330,51,72131,183717,'La Cheppe'),(331,20,88495,112064,'La Fere en Tardenois'),(332,51,88774,111100,'La Fere en Tardenois'),(333,52,149107,111986,'La Ferte Ferriere'),(334,20,149495,111878,'La Ferte Ferriere'),(335,20,42735,96505,'La Ferte Gaucher'),(336,51,42436,96319,'La Ferte Gaucher'),(337,52,124480,230578,'La Jolly Ferme'),(338,20,124240,230141,'La Jolly Ferme,Stenay'),(339,20,274372,56742,'La Lovie'),(340,51,275171,57176,'La Lovie'),(341,20,65536,178455,'La Mellette'),(342,52,232661,79297,'La Neuville'),(343,20,233204,79498,'La Neuville'),(344,20,70515,186464,'La Noblette'),(345,52,229827,84189,'La Petrie'),(346,20,230545,83244,'La Petrie'),(347,51,130108,146707,'La Selve'),(348,20,128717,147030,'La Selve'),(349,20,217787,57715,'La Targette'),(350,51,217371,58181,'La Targette'),(351,52,87430,284290,'Labry'),(352,20,194994,72805,'Lagnicourt'),(353,20,74713,56482,'Lagny le Sec'),(354,51,76415,55967,'Lagny le Sec'),(355,51,178038,93356,'Le Catelet'),(356,20,214343,43634,'Le Hameau'),(357,51,213739,44139,'Le Hameau'),(358,51,61627,149331,'Le Mesnil-sur-Oger'),(359,20,79156,55877,'Le Plessis Belleville'),(360,51,78296,57415,'Le Plessis Belleville'),(361,20,185386,41296,'Lealvillers'),(362,51,185692,40835,'Lealvillers'),(363,20,183931,68696,'Lechelle'),(364,52,183811,69357,'Lechelle,S Bertincourt'),(365,52,109236,187044,'Leffincourt'),(366,20,110781,186173,'Leffincourt,E Reims'),(367,20,74742,240480,'Lemmes'),(368,51,75107,241218,'Lemmes'),(369,51,239297,140614,'Lens'),(370,20,239100,139524,'Lens,Mons'),(371,51,17505,133472,'Les Greves'),(372,52,222487,78940,'Les Villers(Douai)'),(373,20,89326,131016,'Lhery'),(374,51,89759,130342,'Lhery'),(375,20,134122,135438,'Liesse'),(376,51,134295,133339,'Liesse-Notre-Dame'),(377,51,208202,100785,'Lieu St.Amand'),(378,20,207292,100942,'Lieu St.Amand'),(379,50,248335,80330,'Lille'),(380,20,55239,227429,'Lisle en Barrois'),(381,51,55627,229545,'Lisle en Barrois'),(382,51,249769,77184,'Lomme'),(383,20,249472,76420,'Lomme,Lille'),(384,20,168762,115084,'Longchamps'),(385,52,168280,115971,'Longchamps'),(386,20,280446,17923,'Loon'),(387,51,280249,16960,'Loon'),(388,20,96972,10090,'Lormaison'),(389,51,96402,9877,'Lormaison'),(390,20,24765,107241,'Louan'),(391,51,25344,108878,'Louan'),(392,20,71231,39319,'Louvres'),(393,51,72093,38522,'Louvres'),(394,20,107271,128827,'Maizy,N Fismes'),(395,51,107767,128267,'Maizy,N Fismes'),(396,20,33255,306031,'Malzeville'),(397,51,34266,306190,'Malzeville'),(398,20,24456,313952,'Mannoncourt en Vermois'),(399,51,24204,312612,'Mannoncourt en Vermois'),(400,51,131623,134271,'Marchais'),(401,20,131246,134785,'Marchais'),(402,52,267493,92380,'Marcke'),(403,20,267072,93812,'Marcke,Courtrai'),(404,20,190059,33938,'Marieux'),(405,52,190381,34763,'Marieux'),(406,51,148783,131026,'Marle-Autremencourt'),(407,20,147541,130797,'Marle-Autremencourt'),(408,20,75668,38143,'Mary la Ville'),(409,51,75691,37756,'Mary la Ville'),(410,52,78535,284617,'Mars-la-Tour'),(411,20,78570,282313,'Mars-la-Tour'),(412,20,56437,185944,'Marson'),(413,51,56183,185289,'Marson'),(414,52,117941,252953,'Marville'),(415,20,115884,254739,'Marville'),(416,51,217088,90651,'Masny'),(417,20,218977,89703,'Masny'),(418,20,64256,165027,'Matougues'),(419,51,65438,165356,'Matougues'),(420,20,62584,66488,'Meaux'),(421,51,62213,65510,'Meaux'),(422,52,62988,65707,'Meaux RW Station'),(423,51,267243,85268,'Menin'),(424,20,268206,86088,'Menin'),(425,52,108476,279762,'Mercy-le-Haut'),(426,20,109245,279477,'Mercy-le-Haut'),(427,20,106847,281405,'Mercy-le-Haut S'),(428,20,154544,69447,'Mesnil le Petit'),(429,20,153282,69478,'Mesnil St George'),(430,20,154842,71155,'Mesnil St Nicaise'),(431,51,166284,73525,'Mesnil-Bruntel'),(432,20,166414,71913,'Mesnil-Bruntel'),(433,52,153682,70002,'Mesnil-le-Petit'),(434,50,81409,305907,'Metz'),(435,52,77188,304252,'Metz-Frescaty'),(436,20,77438,303516,'Metz-Frescaty'),(437,20,64525,46992,'Mitry Mory'),(438,51,65245,46461,'Mitry Mory'),(439,51,177935,73446,'Moislains'),(440,20,176604,74081,'Moislains'),(441,20,95146,39893,'Monchy les Chateau'),(442,51,164814,76854,'Mons-en-Chaussee'),(443,20,164243,78166,'Mons-en-Chaussee'),(444,20,89627,48932,'Mont I_Eveque'),(445,51,88920,47706,'Mont I_Eveque'),(446,20,102147,105186,'Mont Soissons Ferme'),(447,52,102023,104932,'Mont Soissons Ferme'),(448,20,215866,55907,'Mont St. Eloi'),(449,20,169458,3112,'Montagne Fayel'),(450,51,170075,2766,'Montagne Fayel'),(451,52,187211,27385,'Montagne Fayel'),(452,20,102037,81229,'Montgobert'),(453,51,101560,82004,'Montgobert'),(454,20,153209,41956,'Moreuil'),(455,51,152993,38719,'Moreuil'),(456,20,235168,96783,'MouNchin'),(457,52,234877,97834,'Mounchin'),(458,51,135037,224468,'Mouzon'),(459,20,134318,224010,'Mouzon'),(460,20,96066,139243,'Muizon'),(461,51,96947,139308,'Muizon'),(462,20,82417,61304,'Nanteuil le Haudoin'),(463,51,83105,61208,'Nanteuil le Haudoin'),(464,51,68527,106713,'Nesles-la-Montagne'),(465,52,112074,168972,'Neuflize'),(466,20,112592,170074,'Neuflize'),(467,20,193204,111506,'Neuville'),(468,20,193401,114716,'Neuville,Le Cateau'),(469,51,193586,112753,'Neuvilly'),(470,52,178382,77175,'Nurlu,NE Moislains'),(471,20,178621,77748,'Nurlu,NE Moislains'),(472,20,22465,291835,'Ochey'),(473,51,22029,291157,'Ochey'),(474,51,230845,93849,'Orchies'),(475,20,170441,30031,'Petit Camon'),(476,51,169841,30458,'Petit Camon'),(477,20,281373,23669,'Petit Synthe'),(478,51,281379,24106,'Petit Synthe'),(479,51,236869,78242,'Phalempin'),(480,20,235685,78237,'Phalempin,N Douai'),(481,20,47483,148834,'Pierre Morains'),(482,51,48204,148682,'Pierre Morains'),(483,20,104430,74540,'Pierrefonds'),(484,51,105257,74170,'Pierrefonds'),(485,51,156205,148619,'Plomion,SE Vervins'),(486,20,156256,150152,'Plomion,SE Vervins'),(487,52,105639,160465,'Pomacle'),(488,20,105786,161175,'Pomacle'),(489,52,236621,84167,'Pont-a-Marcq'),(490,20,235458,82812,'Pont-a-Marcq'),(491,20,62289,232152,'Pretz en Argonne'),(492,51,61928,231269,'Pretz en Argonne'),(493,52,198221,76126,'Pronville'),(494,20,196899,76653,'Pronville,nr Queant'),(495,51,195749,90656,'Proville,Cambrai'),(496,20,193244,90843,'Proville,Cambrai'),(497,52,133275,123591,'Puisieux Ferme'),(498,20,132917,125668,'Puisieux Ferme,Laon'),(499,52,76101,284778,'Puxieux'),(500,51,255318,78763,'Quesnoy-sur-Deule'),(501,20,129245,33632,'Quinquempoix'),(502,51,128695,32974,'Quinquempoix'),(503,20,48545,214986,'Rancourt'),(504,51,47161,214919,'Rancourt'),(505,20,96545,54994,'Raray'),(506,51,96086,53860,'Raray'),(507,20,125044,39403,'Ravenel'),(508,20,243701,18877,'Reclinghem'),(509,51,244066,18471,'Reclinghem'),(510,50,94738,149795,'Reims'),(511,20,56422,234416,'Rembercourt'),(512,51,56852,234002,'Rembercourt'),(513,20,59809,209547,'Remicourt'),(514,51,61329,211152,'Remicourt'),(515,20,45393,215398,'Remmenecourt'),(516,51,44450,214702,'Remmenecourt'),(517,20,101005,7467,'Ressons I_Abbaye'),(518,51,101392,8623,'Ressons I_Abbaye'),(519,20,97649,8926,'Ressons,Ferme du Val Valereux'),(520,52,97793,8454,'Ressons,Ferme du Val Valereux'),(521,51,124589,38818,'Revenel'),(522,20,198992,71820,'Riencourt,Arras'),(523,51,83713,102755,'Rocourt-St.-Martin'),(524,20,66553,37977,'Roissey en France'),(525,51,67603,39111,'Roissey en France'),(526,51,175804,87220,'Ronssoy'),(527,20,175083,87466,'Ronssoy,SE Epehy'),(528,20,94384,136193,'Rosnay'),(529,51,95117,137538,'Rosnay'),(530,52,215544,87263,'Roucourt'),(531,20,216004,87765,'Roucourt, Bohain'),(532,52,156865,88754,'Roupy'),(533,20,157517,87901,'Roupy,Somme'),(534,20,92281,109956,'Rugny'),(535,52,93555,109565,'Rugny'),(536,20,232470,15022,'Ruisseauville'),(537,52,232302,14101,'Ruisseauville'),(538,51,280437,88052,'Rumbeke, Roulers'),(539,20,280705,87070,'Rumbeke,Roulers'),(540,20,106915,42674,'Sacy le Grand'),(541,51,106651,41932,'Sacy le Grand'),(542,20,125481,33751,'Saint Just'),(543,51,123984,34106,'Saint Just'),(544,20,40584,78972,'Saints'),(545,51,40123,78856,'Saints'),(546,20,90568,109878,'Saponay'),(547,52,90261,109575,'Saponay'),(548,20,218476,45330,'Savy Berlette'),(549,51,217490,44846,'Savy Berlette'),(550,51,239070,78788,'Seclin'),(551,20,64216,221027,'Senard en Argonne'),(552,51,64593,220283,'Senard en Argonne'),(553,20,88772,44474,'Senlis'),(554,51,90101,44964,'Senlis'),(555,52,98278,266510,'Senon'),(556,51,245133,27004,'Serny'),(557,20,246547,26460,'Serny'),(558,51,129927,139625,'Sissonne'),(559,20,129306,137756,'Sissonne'),(560,52,102454,239600,'Sivry'),(561,20,102998,239823,'Sivry'),(562,51,204889,40320,'Sombrin'),(563,20,64556,191018,'Somme Vesle'),(564,51,65244,190746,'Somme Vesle'),(565,20,143236,3508,'Sommereux'),(566,51,143628,2779,'Sommereux'),(567,20,205007,39447,'Soncamp Farm'),(568,20,37453,169721,'Soude Ste Croix'),(569,51,37271,170350,'Soude Ste Croix'),(570,20,71166,241766,'Souilly'),(571,51,70376,241365,'Souilly'),(572,51,216803,55071,'St. Eloi'),(573,51,266416,42994,'St. Marie Cappel'),(574,10,259322,22060,'St. Omer'),(575,52,117123,163340,'St. Loup-en-Champagne'),(576,20,114485,161028,'St. Loup,Champagne'),(577,20,118159,161338,'St. Loup,Champagne'),(578,52,258842,79679,'St. Marguerite'),(579,20,257216,79566,'St. Marguerite'),(580,20,265638,42793,'St. Marie Cappel'),(581,52,112414,164673,'St. Remy-le-Petit'),(582,20,113284,165411,'St. Remy-le-Petit West'),(583,51,121842,233373,'Stenay'),(584,20,121375,234534,'Stenay'),(585,50,55278,260447,'St. Mihiel'),(586,50,160558,96433,'St. Quentin'),(587,52,123629,265461,'Tellancourt'),(588,20,122927,265747,'Tellancourt'),(589,20,279141,31818,'Teteghem'),(590,51,279133,31108,'Teteghem'),(591,20,89176,285445,'Tichemont Castle'),(592,52,87868,285635,'Tichemont Castle.'),(593,20,67622,192772,'Tilloy at Bellay'),(594,51,68168,191702,'Tilloy at Bellay'),(595,20,31491,284867,'Toul'),(596,50,32089,286177,'Toul'),(597,51,30904,285463,'Toul Aerodrom'),(598,52,144455,129202,'Toulis'),(599,20,144163,128427,'Toulis'),(600,20,36718,74474,'Touquin'),(601,51,37828,74963,'Touquin'),(602,50,244871,103968,'Tournay'),(603,20,50782,152450,'Trecon'),(604,51,51951,153557,'Trecon'),(605,20,157513,79489,'Ugny-l Equipee'),(606,52,157460,79975,'Ugny-l Equipee'),(607,20,74679,238539,'Vadelaincourt'),(608,51,74925,239139,'Vadelaincourt'),(609,20,186708,24488,'Valheureux'),(610,52,187740,24728,'Valheureux'),(611,20,95224,75496,'Vauciennes'),(612,51,92857,76508,'Vauciennes'),(613,20,23256,271395,'Vaucouleurs'),(614,51,23645,269848,'Vaucouleurs'),(615,20,144039,160031,'Vaux'),(616,52,144697,160040,'Vaux-les-Rubigny'),(617,20,103156,121822,'Vauxcere'),(618,51,102945,121073,'Vauxcere'),(619,51,190003,73963,'Velu'),(620,20,189623,73272,'Velu'),(621,52,175983,121782,'Venerolles'),(622,20,84954,249955,'Verdun'),(623,50,84931,247837,'Verdun'),(624,52,85484,249647,'Verdun Aerodrome'),(625,51,161462,60507,'Vermandovillers'),(626,10,187641,27585,'Vert Galand'),(627,20,97511,74480,'Vez'),(628,51,96476,73751,'Vez'),(629,51,194755,109127,'Viesly'),(630,52,214242,150356,'Vieux-Reng'),(631,20,42952,13924,'Villacoublay'),(632,51,43208,15615,'Villacoublay'),(633,20,62099,151669,'Villaneuve les Vertus'),(634,20,86535,132899,'Ville en Tardenois'),(635,51,85952,132785,'Ville en Tardenois'),(636,20,97944,121885,'Ville-Savoye'),(637,51,98818,121930,'Ville-Savoye'),(638,20,163811,41480,'Villers Bretonneux'),(639,20,30561,212943,'Villers en Lieu'),(640,51,29405,213264,'Villers en Lieu'),(641,20,27463,103418,'Villers St. George'),(642,51,27757,104064,'Villers St. George'),(643,51,163679,40597,'Villers-Bretonneux'),(644,51,215433,148776,'Villers-sur-Nicole'),(645,20,215075,151455,'Villers-sur-Nicole'),(646,52,143492,83390,'Villeselve'),(647,20,144562,82477,'Villeselve'),(648,20,48523,158975,'Villeseneux'),(649,51,48784,157989,'Villeseneux'),(650,20,51246,159213,'Villeseneux Ferme de Conflans'),(651,51,135150,115583,'Vivaise'),(652,20,135729,116530,'Vivaise'),(653,52,47533,76837,'Voisins'),(654,51,110772,198175,'Vouziers'),(655,20,110656,199477,'Vouziers'),(656,20,163675,46097,'Warfusee'),(657,51,164053,46989,'Warfusee'),(658,51,178808,118781,'Wassigny'),(659,20,179299,119259,'Wassigny'),(660,52,97705,267933,'Bellevue Ferme'),(661,52,280252,68872,'no man\'s land'),(662,52,274996,72853,'no man\'s land'),(663,52,270138,72455,'no man\'s land'),(664,52,265121,69031,'no man\'s land'),(665,52,259865,67358,'no man\'s land'),(666,52,254609,65845,'no man\'s land'),(667,52,250149,62421,'no man\'s land'),(668,52,246167,59235,'no man\'s land'),(669,52,241230,58359,'no man\'s land'),(670,52,236531,59793,'no man\'s land'),(671,52,231434,61147,'no man\'s land'),(672,52,226417,60032,'no man\'s land'),(673,52,221559,61625,'no man\'s land'),(674,52,216925,63536,'no man\'s land'),(675,52,212226,65049,'no man\'s land'),(676,52,207209,64890,'no man\'s land'),(677,52,202669,62819,'no man\'s land'),(678,52,198528,59952,'no man\'s land'),(679,52,194069,57404,'no man\'s land'),(680,52,185468,52705,'no man\'s land'),(681,52,190246,54378,'no man\'s land'),(682,52,180530,52387,'no man\'s land'),(683,52,175354,52944,'no man\'s land'),(684,52,170257,53103,'no man\'s land'),(685,52,165202,53183,'no man\'s land'),(686,52,160185,52227,'no man\'s land'),(687,52,155247,51351,'no man\'s land'),(688,52,150389,51272,'no man\'s land'),(689,52,145531,52068,'no man\'s land'),(690,52,140912,54457,'no man\'s land'),(691,52,137010,57961,'no man\'s land'),(692,52,133984,61943,'no man\'s land'),(693,52,132073,66721,'no man\'s land'),(694,52,130719,71738,'no man\'s land'),(695,52,131037,76756,'no man\'s land'),(696,52,132289,81567,'no man\'s land'),(697,52,133085,86663,'no man\'s land'),(698,52,132607,91760,'no man\'s land'),(699,52,130298,96299,'no man\'s land'),(700,52,126396,99326,'no man\'s land'),(701,52,122732,102909,'no man\'s land'),(702,52,120741,107608,'no man\'s land'),(703,52,119228,112386,'no man\'s land'),(704,52,117556,117324,'no man\'s land'),(705,52,115884,122022,'no man\'s land'),(706,52,114689,127039,'no man\'s land'),(707,52,113574,132056,'no man\'s land'),(708,52,112698,137074,'no man\'s land'),(709,52,111265,142011,'no man\'s land'),(710,52,108238,146073,'no man\'s land'),(711,52,105249,150110,'no man\'s land'),(712,52,102780,154570,'no man\'s land'),(713,52,100471,159029,'no man\'s land'),(714,52,98002,163330,'no man\'s land'),(715,52,95772,167789,'no man\'s land'),(716,52,93781,172408,'no man\'s land'),(717,52,92189,177346,'no man\'s land'),(718,52,91074,182204,'no man\'s land'),(719,52,89322,186982,'no man\'s land'),(720,52,86773,191442,'no man\'s land'),(721,52,84305,195742,'no man\'s land'),(722,52,83827,200839,'no man\'s land'),(723,52,84145,205856,'no man\'s land'),(724,52,85181,210793,'no man\'s land'),(725,52,85897,215651,'no man\'s land'),(726,52,86375,220828,'no man\'s land'),(727,52,87012,225765,'no man\'s land'),(728,52,88366,230667,'no man\'s land'),(729,52,90118,235525,'no man\'s land'),(730,52,91552,240223,'no man\'s land'),(731,52,92348,245241,'no man\'s land'),(732,52,90915,250098,'no man\'s land'),(733,52,89401,255116,'no man\'s land'),(734,52,86375,259097,'no man\'s land'),(735,52,81517,260372,'no man\'s land'),(736,52,76819,261566,'no man\'s land'),(737,52,71961,262283,'no man\'s land'),(738,52,67660,259575,'no man\'s land'),(739,52,62643,260292,'no man\'s land'),(740,52,57865,258381,'no man\'s land'),(741,52,53087,256868,'no man\'s land'),(742,52,50061,261088,'no man\'s land'),(743,52,49742,266265,'no man\'s land'),(744,52,51216,271039,'no man\'s land'),(745,52,52827,276210,'no man\'s land'),(746,52,53768,280845,'no man\'s land'),(747,52,55715,285815,'no man\'s land'),(748,52,56454,290516,'no man\'s land'),(749,52,57529,295687,'no man\'s land'),(750,52,57260,300859,'no man\'s land'),(751,52,53432,304082,'no man\'s land'),(752,52,49379,307112,'no man\'s land'),(753,52,45215,309798,'no man\'s land'),(754,52,40782,312015,'no man\'s land'),(755,52,38028,316313,'no man\'s land'),(756,52,36081,320880,'no man\'s land'),(757,52,34469,325581,'no man\'s land'),(758,52,32723,330350,'no man\'s land'),(759,52,30372,334782,'no man\'s land'),(760,52,27954,339215,'no man\'s land'),(761,52,24663,343043,'no man\'s land'),(762,52,21439,347073,'no man\'s land'),(763,52,18484,351237,'no man\'s land'),(764,52,15261,354998,'no man\'s land'),(765,52,11567,358289,'no man\'s land'),(766,52,280163,63927,'Entente trenches'),(767,52,275122,69522,'Entente trenches'),(768,52,270024,69966,'Entente trenches'),(769,52,265038,66364,'Entente trenches'),(770,52,260052,64259,'Entente trenches'),(771,52,255010,61877,'Entente trenches'),(772,52,250190,58940,'Entente trenches'),(773,52,246146,57167,'Entente trenches'),(774,52,241156,56503,'Entente trenches'),(775,52,236502,58109,'Entente trenches'),(776,52,231516,59938,'Entente trenches'),(777,52,226474,57278,'Entente trenches'),(778,52,221598,57832,'Entente trenches'),(779,52,216944,60159,'Entente trenches'),(780,52,212130,61821,'Entente trenches'),(781,52,207143,61212,'Entente trenches'),(782,52,202767,59162,'Entente trenches'),(783,52,198611,56613,'Entente trenches'),(784,52,194130,53677,'Entente trenches'),(785,52,190031,49522,'Entente trenches'),(786,52,185654,49355,'Entente trenches'),(787,52,180667,49854,'Entente trenches'),(788,52,175127,50464,'Entente trenches'),(789,52,170362,50907,'Entente trenches'),(790,52,165210,50630,'Entente trenches'),(791,52,160334,49078,'Entente trenches'),(792,52,155126,47804,'Entente trenches'),(793,52,150178,48026,'Entente trenches'),(794,52,145136,48524,'Entente trenches'),(795,52,139984,51682,'Entente trenches'),(796,52,135053,55062,'Entente trenches'),(797,52,130842,59938,'Entente trenches'),(798,52,128072,65700,'Entente trenches'),(799,52,126687,71628,'Entente trenches'),(800,52,127352,77002,'Entente trenches'),(801,52,128238,81933,'Entente trenches'),(802,52,129125,86587,'Entente trenches'),(803,52,129069,91351,'Entente trenches'),(804,52,127019,93789,'Entente trenches'),(805,52,122421,97113,'Entente trenches'),(806,52,119041,101989,'Entente trenches'),(807,52,117047,107141,'Entente trenches'),(808,52,115514,112262,'Entente trenches'),(809,52,113298,117082,'Entente trenches'),(810,52,110694,122068,'Entente trenches'),(811,52,110528,126943,'Entente trenches'),(812,52,109918,131819,'Entente trenches'),(813,52,108699,136473,'Entente trenches'),(814,52,107370,141016,'Entente trenches'),(815,52,105818,144617,'Entente trenches'),(816,52,103104,148883,'Entente trenches'),(817,52,100555,153205,'Entente trenches'),(818,52,96455,157194,'Entente trenches'),(819,52,94405,161682,'Entente trenches'),(820,52,93796,166945,'Entente trenches'),(821,52,92134,171931,'Entente trenches'),(822,52,89750,176599,'Entente trenches'),(823,52,87922,181197,'Entente trenches'),(824,52,86758,185907,'Entente trenches'),(825,52,84210,190006,'Entente trenches'),(826,52,81716,194660,'Entente trenches'),(827,52,81273,200478,'Entente trenches'),(828,52,82381,205796,'Entente trenches'),(829,52,83545,210838,'Entente trenches'),(830,52,84542,215714,'Entente trenches'),(831,52,85041,220866,'Entente trenches'),(832,52,85816,225797,'Entente trenches'),(833,52,86758,230961,'Entente trenches'),(834,52,88088,235892,'Entente trenches'),(835,52,88531,240989,'Entente trenches'),(836,52,88088,244867,'Entente trenches'),(837,52,87090,249078,'Entente trenches'),(838,52,84431,251959,'Entente trenches'),(839,52,82603,255117,'Entente trenches'),(840,52,81051,257610,'Entente trenches'),(841,52,76785,259771,'Entente trenches'),(842,52,71910,260990,'Entente trenches'),(843,52,67588,258386,'Entente trenches'),(844,52,62713,259328,'Entente trenches'),(845,52,58280,257278,'Entente trenches'),(846,52,52297,255505,'Entente trenches'),(847,52,48943,260487,'Entente trenches'),(848,52,48888,266194,'Entente trenches'),(849,52,49885,271125,'Entente trenches'),(850,52,51769,276222,'Entente trenches'),(851,52,52821,280931,'Entente trenches'),(852,52,54761,286028,'Entente trenches'),(853,52,55371,290481,'Entente trenches'),(854,52,56258,295578,'Entente trenches'),(855,52,56202,300564,'Entente trenches'),(856,52,52656,302836,'Entente trenches'),(857,52,48834,306160,'Entente trenches'),(858,52,44845,308764,'Entente trenches'),(859,52,40135,310925,'Entente trenches'),(860,52,37310,315689,'Entente trenches'),(861,52,35149,320399,'Entente trenches'),(862,52,33210,325330,'Entente trenches'),(863,52,31548,329817,'Entente trenches'),(864,52,29331,334028,'Entente trenches'),(865,52,27115,338737,'Entente trenches'),(866,52,23990,342391,'Entente trenches'),(867,52,20666,346601,'Entente trenches'),(868,52,17674,350480,'Entente trenches'),(869,52,14627,354302,'Entente trenches'),(870,52,10970,357737,'Entente trenches'),(871,52,280048,72754,'Central Powers trenches'),(872,52,275006,76189,'Central Powers trenches'),(873,52,270076,74527,'Central Powers trenches'),(874,52,265089,71757,'Central Powers trenches'),(875,52,260047,70261,'Central Powers trenches'),(876,52,255061,70039,'Central Powers trenches'),(877,52,249964,67491,'Central Powers trenches'),(878,52,24652,62892,'Central Powers trenches'),(879,52,241363,60067,'Central Powers trenches'),(880,52,236432,61618,'Central Powers trenches'),(881,52,231668,62117,'Central Powers trenches'),(882,52,226571,62338,'Central Powers trenches'),(883,52,222027,65663,'Central Powers trenches'),(884,52,217096,67491,'Central Powers trenches'),(885,52,211667,68765,'Central Powers trenches'),(886,52,206625,68211,'Central Powers trenches'),(887,52,202248,66438,'Central Powers trenches'),(888,52,197066,62671,'Central Powers trenches'),(889,52,192357,60621,'Central Powers trenches'),(890,52,188866,58294,'Central Powers trenches'),(891,52,185320,56355,'Central Powers trenches'),(892,52,180556,55967,'Central Powers trenches'),(893,52,175328,55413,'Central Powers trenches'),(894,52,170231,55302,'Central Powers trenches'),(895,52,164968,55801,'Central Powers trenches'),(896,52,159649,54970,'Central Powers trenches'),(897,52,155161,53751,'Central Powers trenches'),(898,52,150563,53806,'Central Powers trenches'),(899,52,145964,55357,'Central Powers trenches'),(900,52,142265,58460,'Central Powers trenches'),(901,52,139384,60842,'Central Powers trenches'),(902,52,137223,64277,'Central Powers trenches'),(903,52,135228,67491,'Central Powers trenches'),(904,52,134120,72145,'Central Powers trenches'),(905,52,134397,76854,'Central Powers trenches'),(906,52,135450,81730,'Central Powers trenches'),(907,52,136724,86716,'Central Powers trenches'),(908,52,136226,92423,'Central Powers trenches'),(909,52,133954,97963,'Central Powers trenches'),(910,52,130574,102118,'Central Powers trenches'),(911,52,126419,104334,'Central Powers trenches'),(912,52,123479,108420,'Central Powers trenches'),(913,52,122759,112963,'Central Powers trenches'),(914,52,121983,118947,'Central Powers trenches'),(915,52,119767,123434,'Central Powers trenches'),(916,52,118493,128365,'Central Powers trenches'),(917,52,117828,133185,'Central Powers trenches'),(918,52,117551,138559,'Central Powers trenches'),(919,52,114614,144155,'Central Powers trenches'),(920,52,110293,147812,'Central Powers trenches'),(921,52,107393,151689,'Central Powers trenches'),(922,52,104734,155401,'Central Powers trenches'),(923,52,103681,160332,'Central Powers trenches'),(924,52,103127,165761,'Central Powers trenches'),(925,52,97975,168864,'Central Powers trenches'),(926,52,95426,172687,'Central Powers trenches'),(927,52,94597,177774,'Central Powers trenches'),(928,52,93655,182872,'Central Powers trenches'),(929,52,92104,187692,'Central Powers trenches'),(930,52,88835,192789,'Central Powers trenches'),(931,52,86619,196556,'Central Powers trenches'),(932,52,85566,200601,'Central Powers trenches'),(933,52,86508,205818,'Central Powers trenches'),(934,52,86508,210804,'Central Powers trenches'),(935,52,87062,215569,'Central Powers trenches'),(936,52,88170,225597,'Central Powers trenches'),(937,52,90054,230085,'Central Powers trenches'),(938,52,92547,234517,'Central Powers trenches'),(939,52,94874,239448,'Central Powers trenches'),(940,52,96591,245376,'Central Powers trenches'),(941,52,95095,250362,'Central Powers trenches'),(942,52,92547,256623,'Central Powers trenches'),(943,52,90477,262639,'Central Powers trenches'),(944,52,87097,265409,'Central Powers trenches'),(945,52,81557,262750,'Central Powers trenches'),(946,52,77180,263414,'Central Powers trenches'),(947,52,72138,263747,'Central Powers trenches'),(948,52,67872,260866,'Central Powers trenches'),(949,52,62664,261143,'Central Powers trenches'),(950,52,62769,261596,'Central Powers trenches'),(951,52,57949,259712,'Central Powers trenches'),(952,52,53406,258271,'Central Powers trenches'),(953,52,51079,261429,'Central Powers trenches'),(954,52,50802,266139,'Central Powers trenches'),(955,52,52298,271014,'Central Powers trenches'),(956,52,53628,276167,'Central Powers trenches'),(957,52,54706,280720,'Central Powers trenches'),(958,52,56506,285771,'Central Powers trenches'),(959,52,57168,290380,'Central Powers trenches'),(960,52,58210,295438,'Central Powers trenches'),(961,52,58242,301026,'Central Powers trenches'),(962,52,54359,304656,'Central Powers trenches'),(963,52,50413,307939,'Central Powers trenches'),(964,52,45994,310749,'Central Powers trenches'),(965,52,41511,312643,'Central Powers trenches'),(966,52,39014,316667,'Central Powers trenches'),(967,52,36994,321244,'Central Powers trenches'),(968,52,35447,325885,'Central Powers trenches'),(969,52,33711,330809,'Central Powers trenches'),(970,52,31280,335197,'Central Powers trenches'),(971,52,28908,339796,'Central Powers trenches'),(972,52,25467,343678,'Central Powers trenches'),(973,52,22373,347687,'Central Powers trenches'),(974,52,19343,351854,'Central Powers trenches'),(975,52,15951,355940,'Central Powers trenches'),(976,52,12699,358497,'Central Powers trenches'),(977,20,247950,53700,'La Gorgue');
/*!40000 ALTER TABLE `rof_westernfront_locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `static`
--

DROP TABLE IF EXISTS `static`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `static` (
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `static`
--

LOCK TABLES `static` WRITE;
/*!40000 ALTER TABLE `static` DISABLE KEYS */;
/*!40000 ALTER TABLE `static` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `statistics_test`
--

DROP TABLE IF EXISTS `statistics_test`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `statistics_test` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pilot` varchar(45) NOT NULL,
  `pilotrating` varchar(45) NOT NULL,
  `sorties` int(3) NOT NULL,
  `deaths` int(3) NOT NULL,
  `captured` int(3) NOT NULL,
  `airkills` int(3) NOT NULL,
  `groundkills` int(3) NOT NULL,
  `seakills` int(3) NOT NULL,
  `infantrykills` int(3) NOT NULL,
  `grossscore` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `statistics_test`
--

LOCK TABLES `statistics_test` WRITE;
/*!40000 ALTER TABLE `statistics_test` DISABLE KEYS */;
INSERT INTO `statistics_test` VALUES (1,'357th_Codfodder','Average',7,3,0,4,2,0,0,1104),(2,'357th_Yip','Recruit',5,6,8,2,5,6,2,4568),(3,'=69.GIAP=KAZAK','Average',45,8,5,6,9,8,0,45687),(4,'=69.GIAP=KOSHKA','Veteran',4,5,8,5,1,5,6,4568),(5,'=69.GIAP=OZABO','Recruit',4,5,8,7,8,6,2,12345),(6,'=69.GIAP=SHVAK','Recruit',4,6,8,5,2,9,4,1),(7,'=69.GIAP=STENKA','Recruit',5,2,3,0,0,0,1,12),(8,'=69.GIAP=TARAS','Average',7,5,21,6,5,2,5,123458),(9,'=69.GIAP=PAVEL','Average',5,6,8,9,0,9,0,1200),(10,'=69.GIAP=VLADI','Recruit',1,2,54,6,8,9,6,99);
/*!40000 ALTER TABLE `statistics_test` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `supply_points`
--

DROP TABLE IF EXISTS `supply_points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `supply_points` (
  `id` tinyint(1) unsigned NOT NULL AUTO_INCREMENT,
  `xPos` smallint(1) NOT NULL DEFAULT '0',
  `zPos` smallint(6) NOT NULL DEFAULT '0',
  `CoalID` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `supplypointName` varchar(40) NOT NULL DEFAULT 'supplypoint name',
  PRIMARY KEY (`id`),
  UNIQUE KEY `supplypointName` (`supplypointName`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `supply_points`
--

LOCK TABLES `supply_points` WRITE;
/*!40000 ALTER TABLE `supply_points` DISABLE KEYS */;
/*!40000 ALTER TABLE `supply_points` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `test_airfields`
--

DROP TABLE IF EXISTS `test_airfields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_airfields` (
  `name` varchar(45) NOT NULL,
  `coalition` int(1) NOT NULL,
  `model` varchar(45) NOT NULL,
  `number` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`,`coalition`,`model`,`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_airfields`
--

LOCK TABLES `test_airfields` WRITE;
/*!40000 ALTER TABLE `test_airfields` DISABLE KEYS */;
INSERT INTO `test_airfields` VALUES ('Coxyde',1,'albatrosd5',10),('Dunkerque',1,'albatrosd5',6),('Harlebeeke',1,'gothag5',20),('Leffinghe',2,'felixf2a',10),('St. Marie Cappel',1,'albatrosd5',2),('Zeebrugge',2,'felixf2a',15);
/*!40000 ALTER TABLE `test_airfields` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `trains`
--

DROP TABLE IF EXISTS `trains`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trains` (
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trains`
--

LOCK TABLES `trains` WRITE;
/*!40000 ALTER TABLE `trains` DISABLE KEYS */;
INSERT INTO `trains` VALUES (1,'passa','ROF','trains','pass',0,0,NULL);
/*!40000 ALTER TABLE `trains` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `user_id` int(1) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(15) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(45) NOT NULL,
  `role_id` int(1) NOT NULL,
  `phone` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`user_id`,`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='User authentication table.';
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'admin','1d0258c2440a8d19e716292b231e3190','admin@boswar.com',1,'001 234 567 890'),(2,'commander','1d0258c2440a8d19e716292b231e3190','commander@boswar.com',2,'001 234 567 890'),(3,'viewer','1d0258c2440a8d19e716292b231e3190','viewer@boswar.com',3,'001 234 567 890');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users_roles`
--

DROP TABLE IF EXISTS `users_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users_roles` (
  `role_id` tinyint(1) NOT NULL,
  `role` varchar(45) NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users_roles`
--

LOCK TABLES `users_roles` WRITE;
/*!40000 ALTER TABLE `users_roles` DISABLE KEYS */;
INSERT INTO `users_roles` VALUES (1,'administrator'),(2,'commander'),(3,'viewer');
/*!40000 ALTER TABLE `users_roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `vehicles`
--

DROP TABLE IF EXISTS `vehicles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `vehicles` (
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
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `vehicles`
--

LOCK TABLES `vehicles` WRITE;
/*!40000 ALTER TABLE `vehicles` DISABLE KEYS */;
INSERT INTO `vehicles` VALUES (1,'a7v','a7v','ROF','vehicles','a7v',6,4,NULL),(2,'benz_open','benz_open','ROF','vehicles','benz',50,20,NULL),(3,'benz_p','benz_p','ROF','vehicles','benz',50,20,NULL),(4,'benz_soft','benz_soft','ROF','vehicles','benz',50,20,NULL),(5,'ca1','ca1','ROF','vehicles','ca1',6,4,NULL),(6,'crossley','crossley','ROF','vehicles','crossley',50,20,NULL),(7,'daimlermarienfelde','daimlermarienfelde','ROF','vehicles','daimlermarienfelde',50,20,NULL),(8,'daimlermarienfelde_s','daimlermarienfelde_s','ROF','vehicles','daimlermarienfelde',50,20,NULL),(9,'ft17c','ft17','ROF','vehicles','ft17',6,4,NULL),(10,'ft17m','ft17','ROF','vehicles','ft17',6,4,NULL),(11,'leyland','leyland','ROF','vehicles','leyland',50,20,NULL),(12,'leylands','leylands','ROF','vehicles','leyland',50,20,NULL),(13,'mk4f','mk4f','ROF','vehicles','mk4',6,4,NULL),(14,'mk4fger','mk4fger','ROF','vehicles','mk4',6,4,NULL),(15,'mk4m','mk4m','ROF','vehicles','mk4',6,4,NULL),(16,'mk4mger','mk4mger','ROF','vehicles','mk4',6,4,NULL),(17,'mk5f','mk5f','ROF','vehicles','mk5',6,4,NULL),(18,'mk5m','mk5m','ROF','vehicles','mk5',6,4,NULL),(19,'quad','quad','ROF','vehicles','quad',50,20,NULL),(20,'quad_p','quad_p','ROF','vehicles','quad',50,20,NULL),(21,'quada','quada','ROF','vehicles','quad',50,20,NULL),(22,'stchamond','stchamond','ROF','vehicles','stchamond',6,4,NULL),(23,'whippet','whippet','ROF','vehicles','whippet',15,10,NULL),(24,'13pdraaa','leylands','ROF','artillery','13pdraaa',0,0,NULL),(25,'45qf','leylands','ROF','artillery','45qf',0,0,NULL),(26,'75fg1897','leylands','ROF','artillery','75fg1897',0,0,NULL),(27,'77mmaaa','daimlermarienfeld_s','ROF','artillery','77mmaaa',0,0,NULL),(28,'daimleraaa','daimleraaa','ROF','artillery','daimleraaa',50,20,NULL),(29,'fk96','daimlermarienfeld_s','ROF','artillery','fk96',0,0,NULL),(30,'m13','daimlermarienfelds','ROF','artillery','m13',0,0,NULL),(31,'hotchkiss','leylands','ROF','artillery','machineguns',0,0,NULL),(32,'hotchkissaaa','leylands','ROF','artillery','machineguns',0,0,NULL),(33,'lmg08','daimlermarienfeld_s','ROF','artillery','machineguns',0,0,NULL),(34,'lmg08aaa','daimlermarienfeld_s','ROF','artillery','machineguns',0,0,NULL),(35,'mflak','daimlermarienfeld_s','ROF','artillery','mflak',0,0,NULL),(36,'thornycroftaaa','thornycroftaaa','ROF','artillery','thornycroftaaa',50,20,NULL);
/*!40000 ALTER TABLE `vehicles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-10-19 20:03:55
