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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-24 15:22:34
