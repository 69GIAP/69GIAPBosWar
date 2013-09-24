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
-- Table structure for table `rof_object_roles`
--

DROP TABLE IF EXISTS `rof_object_roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_object_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_class` varchar(10) DEFAULT NULL,
  `role_description` varchar(23) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_object_roles`
--

LOCK TABLES `rof_object_roles` WRITE;
/*!40000 ALTER TABLE `rof_object_roles` DISABLE KEYS */;
INSERT INTO `rof_object_roles` VALUES (1,'ART','Artillery'),(2,'AAA','Artillery:Anti-Aircraft'),(3,'BOT','Bot'),(4,'IMA','Infantry: MG AA'),(5,'IMG','Infantry:Machine Gun'),(6,'INF','Infrastructure'),(7,'NAA','Naval:Anti-Aircraft'),(8,'NAR','Naval:Artillery'),(9,'PBO','Plane:Bomber'),(10,'PFI','Plane:Fighter'),(11,'PFB','Plane:Fighter-Bomber'),(12,'PRE','Plane:Reconnaissance'),(13,'PSE','Plane:Seaplane'),(14,'PTR','Plane:Transport'),(15,'RAA','Rail:Anti-Aircraft'),(16,'RCV','Rail:Civil Train'),(17,'RLO','Rail:Locomotive'),(18,'RWA','Rail:Wagon'),(19,'VRI','Regular Infantry'),(20,'SAA','Ship:Anti-Aircraft'),(21,'SBA','Ship:Battleship'),(22,'SCR','Ship:Cruiser'),(23,'SDE','Ship:Destroyer'),(24,'SPB','Ship:Patrol Boat'),(25,'SSU','Ship:Submarine'),(26,'TAA','Tank:Anti-Aircraft'),(27,'TSP','Tank:Self-Propelled Gun'),(28,'T','Tank:Standard'),(29,'TTD','Tank:Tank Destroyer'),(30,'TUR','Turret'),(31,'VAA','Vehicle:Anti-Aircraft'),(32,'VMI','Vehicle:Mech. Infantry'),(33,'VTR','Vehicle:Transport');
/*!40000 ALTER TABLE `rof_object_roles` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-24 15:22:33
