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
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `logfile` varchar(50) NOT NULL,
  `kia_pilot` int(11) NOT NULL,
  `mia_pilot` int(11) NOT NULL,
  `kia_gunner` int(11) NOT NULL,
  `mia_gunner` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `campaign_settings`
--

LOCK TABLES `campaign_settings` WRITE;
/*!40000 ALTER TABLE `campaign_settings` DISABLE KEYS */;
INSERT INTO `campaign_settings` VALUES (1,'RoF','Bloody April','bloody_april','','','','Western Front','rof_westernfront_locations',2,1,1,'','',0,0,0,0),(2,'RoF','Flanders Eagles','flanders_eagles','localhost','rofwar','rofwar','Channel','rof_channel_locations',3,1,1,'logs','missionReportFlandersEagles1.txt',0,0,0,0),(3,'RoF','Lake','lake','','','','Lake','rof_lake_locations',1,0,1,'','',0,0,0,0),(4,'RoF','Skies of the Empires II','skies_of_the_empires_ii','','','','Verdun','rof_verdun_locations',2,0,1,'','',0,0,0,0),(5,'BoS','Stalingrad','stalingrad','','','','Stalingrad','bos_stalingrad_locations',3,0,1,'','',0,0,0,0),(6,'RoF','Yankee Doodle','yankee_doodle','','','','Verdun','rof_verdun_locations',2,1,1,'','',0,0,0,0),(7,'RoF','Skies of the Empires','skies_of_the_empires','localhost','rofwar','rofwar','Verdun','rof_verdun_locations',3,0,1,'','',0,0,0,0),(8,'RoF','1916','1916','localhost','rofwar','rofwar','Western Front','rof_westernfront_locations',3,1,1,'logs','',0,0,0,0);
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

-- Dump completed on 2013-09-24 15:23:40
