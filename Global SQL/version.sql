CREATE DATABASE  IF NOT EXISTS `boswar_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `boswar_db`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win32 (x86)
--
-- Host: 10.0.0.27    Database: boswar_db
-- ------------------------------------------------------
-- Server version	5.6.15

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
-- Table structure for table `version`
--

DROP TABLE IF EXISTS `version`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `version` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `simulation` varchar(3) NOT NULL,
  `dbVersion` varchar(10) NOT NULL,
  `buildDate` datetime NOT NULL,
  `description` varchar(45) NOT NULL,
  `remark` text,
  `revisor` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`,`simulation`,`dbVersion`,`buildDate`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `version`
--

LOCK TABLES `version` WRITE;
/*!40000 ALTER TABLE `version` DISABLE KEYS */;
INSERT INTO `version` VALUES (2,'BoS','0.0.0.9','2013-11-21 11:30:45','Pre Alpha Phase: Version ',NULL,NULL),(3,'RoF','0.1.0.9','2013-12-05 22:37:00','Alpha Phase: Version ',NULL,NULL),(6,'RoF','0.1.0.10','2014-05-18 10:52:46','Alpha Phase: Version ','campaign configuration tracking introduced that required tables; GitHub: be70091878532f365ce0dac64b9a78cbacd59522 ','MYATA'),(7,'BoS','0.0.0.11','2014-05-18 10:52:46','Alpha Phase: Version ','sidebar was synched with RoF sidebar','MYATA'),(8,'BoS','0.1.0.12','2014-06-03 23:38:10','Alpha Phase: Version ','Completed preliminary bos_stalingrad_locations and bos_object_properties.','TUSHKA'),(9,'BoS','0.1.0.13','2014-11-03 22:41:09','Alpha Phase: Version ','Stenka added \'201\' to countries column of several tables for BoS compatibility.','TUSHKA'),(10,'RoF','0.1.0.11','2014-08-06 10:42:15','Alpha Phase: Version ','new aircraft assignment interface created','MYATA');
/*!40000 ALTER TABLE `version` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-08-06 10:42:51
