CREATE DATABASE  IF NOT EXISTS `skies_of_the_empires` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `skies_of_the_empires`;
-- MySQL dump 10.13  Distrib 5.6.13, for Win32 (x86)
--
-- Host: 10.0.0.57    Database: skies_of_the_empires
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
-- Table structure for table `test_airfields`
--

DROP TABLE IF EXISTS `test_airfields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `test_airfields` (
  `name` varchar(45) NOT NULL,
  `coalition` int(1) NOT NULL DEFAULT '0',
  `model` varchar(45) NOT NULL DEFAULT 'Sky albatrosd5',
  `number` int(11) DEFAULT NULL,
  PRIMARY KEY (`name`,`coalition`,`model`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `test_airfields`
--

LOCK TABLES `test_airfields` WRITE;
/*!40000 ALTER TABLE `test_airfields` DISABLE KEYS */;
INSERT INTO `test_airfields` VALUES ('Sky Coxyde',0,'Sky albatrosd5',10),('Sky Dunkerque',0,'albatrosd5',NULL),('Sky Harlebeeke',0,'albatrosd5',NULL),('Sky Leffinghe',0,'albatrosd5',NULL),('Sky St. Marie Cappel',0,'albatrosd5',NULL),('Sky Zeebrugge',0,'albatrosd5',NULL);
/*!40000 ALTER TABLE `test_airfields` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-22 19:48:16
