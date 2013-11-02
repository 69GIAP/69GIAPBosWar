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
-- Table structure for table `campaign_settings`
--

DROP TABLE IF EXISTS `campaign_settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `campaign_settings` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `simulation` enum('RoF','BoS') NOT NULL DEFAULT 'RoF',
  `campaign` varchar(30) NOT NULL DEFAULT 'campaign',
  `abbrv` varchar(7) DEFAULT NULL,
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
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_settings`
--

LOCK TABLES `campaign_settings` WRITE;
/*!40000 ALTER TABLE `campaign_settings` DISABLE KEYS */;
INSERT INTO `campaign_settings` VALUES (2,'RoF','Flanders Eagles','FlanE','flanders_eagles','localhost','rofwar','rofwar','Channel','rof_channel_locations','2','true','true','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(4,'RoF','Skies of the Empires II','SOEII','skies_of_the_empires_ii','','','','Verdun','rof_verdun_locations','2','true','true','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(5,'BoS','Stalingrad','Stagrad','stalingrad','','','','Stalingrad','bos_stalingrad_locations','4','true','true','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(6,'RoF','Yankee Doodle','YankDo','yankee_doodle','','','','Verdun','rof_verdun_locations','2','true','true','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(7,'RoF','Skies of the Empires','SoE','skies_of_the_empires','localhost','rofwar','rofwar','Verdun','rof_verdun_locations','3','true','true','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(8,'RoF','1916','1916','1916','localhost','rofwar','rofwar','Western Front','rof_westernfront_locations','3','true','true','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(9,'RoF','Bloody April','BloodyA','bloody_april','localhost','rofwar','rofwar','Western Front','rof_westernfront_locations','1','true','true','','','',0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,'2','2',0,0,0,30,90,15),(64,'RoF','Lake','Lake','lake','localhost','rofwar','rofwar','Lake','rof_lake_locations','4','true','true','logs','missionReport','missionReport',100,50,30,20,10,50,30,20,10,0,0,0,100000,100000,5000,500,'2','2',50,10,5,30,90,15),(70,'RoF','1942','1942','1942','localhost','rofwar','rofwar','Western Front','rof_westernfront_locations','1','true','true','logs','missionReport','missionReport',100,50,30,20,10,50,30,20,10,0,0,0,100000,100000,5000,500,'2','2',50,10,5,30,90,15);
/*!40000 ALTER TABLE `campaign_settings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-11-02  8:57:10
