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
-- Table structure for table `rof_object_properties`
--

DROP TABLE IF EXISTS `rof_object_properties`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_object_properties` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `object_type` varchar(128) NOT NULL,
  `object_class` varchar(8) NOT NULL,
  `object_value` smallint(6) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=223 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `rof_object_properties`
--

LOCK TABLES `rof_object_properties` WRITE;
/*!40000 ALTER TABLE `rof_object_properties` DISABLE KEYS */;
INSERT INTO `rof_object_properties` VALUES (1,'13PdrAAA','AAA',80),(2,'13PrdaaaAttached','AAA',80),(3,'45QF','ART',100),(4,'75FG1897','ART',100),(5,'77mmAAA','AAA',80),(6,'77mmAAAAttached','AAA',80),(7,'A7V','T',100),(8,'AeType','BAL',50),(9,'Airco D.H.2','PFI',100),(10,'Airco D.H.4','PRE',200),(11,'Albatros D.II','PFI',199),(12,'Albatros D.II lt','PFI',100),(13,'Albatros D.Va','PFI',100),(14,'Albatross D.III','PFI',100),(15,'Benz Searchlight','VTR',50),(16,'benz_open','VTR',50),(17,'benz_p','VTR',50),(18,'benz_soft','VTR',50),(19,'BotBoatSwain','BOT',0),(20,'BotGunner','BOT',0),(21,'BotGunnerBacker','BOT',0),(22,'BotGunnerBreguet14','BOT',0),(23,'BotGunnerBreguet14_1','BOT',0),(24,'BotGunnerBW12','BOT',0),(25,'BotGunnerDavis','BOT',0),(26,'BotGunnerFe2_sing','BOT',0),(27,'BotGunnerFelix_top-twin','BOT',0),(28,'BotGunnerG5_1','BOT',0),(29,'BotGunnerG5_2','BOT',0),(30,'BotGunnerHCL2','BOT',0),(31,'BotGunnerHP400_1','BOT',0),(32,'BotGunnerHP400_2','BOT',0),(33,'BotGunnerHP400_2_WM','BOT',0),(34,'BotGunnerHP400_3','BOT',0),(35,'BotGunnerRE8','BOT',0),(36,'Brandenburg W12','PSE',200),(37,'Breguet 14.B2','PRE',200),(38,'bridge_hw110','INF',0),(39,'bridge_hw130','INF',0),(40,'bridge_hw150','INF',0),(41,'bridge_hw170','INF',0),(42,'bridge_hw190','INF',0),(43,'bridge_hw40','INF',0),(44,'bridge_hw70','INF',0),(45,'bridge_hw90','INF',0),(46,'bridge_rr110','INF',0),(47,'bridge_rr130','INF',0),(48,'bridge_rr150','INF',0),(49,'bridge_rr170','INF',0),(50,'bridge_rr190','INF',0),(51,'bridge_rr70','INF',0),(52,'bridge_rr90','INF',0),(53,'Bristol F2B (F.II)','PRE',200),(54,'Bristol F2B (F.III)','PRE',200),(55,'British naval 4in AAA gun','NAA',80),(56,'British naval 4in gun','NAR',0),(57,'British navel 6in gun','NAR',0),(58,'Ca1','T',100),(59,'Caquot','BAL',50),(60,'Cargo Ship','STR',300),(61,'Common Bot','BOT',0),(62,'Crossley','VTR',50),(63,'DaimlerAAA','VAA',80),(64,'DaimlerMarienfelde','VTR',50),(65,'DaimlerMarienfelde_S','VTR',50),(66,'DFW C.V','PRE',200),(67,'Drachen','BAL',50),(68,'F.E.2b','PRE',200),(69,'F17M','T',100),(70,'factory_01','INF',0),(71,'factory_02','INF',0),(72,'factory_03','INF',0),(73,'factory_04','INF',0),(74,'factory_05','INF',0),(75,'factory_06','INF',0),(76,'factory_07','INF',0),(77,'factory_08','INF',0),(78,'Felixstowe F2A','PSE',200),(79,'FK96','ART',100),(80,'Flag','FLG',0),(81,'Fokker D.VII','PFI',100),(82,'Fokker D.VIIF','PFI',100),(83,'Fokker D.VIII','PFI',100),(84,'Fokker Dr.I','PFI',100),(85,'Fokker E.III','PFI',100),(86,'FrpenicheAAA','SAA',80),(87,'fr_lrg','INF',0),(88,'fr_med','INF',0),(89,'FT17C','T',100),(90,'G8','RLO',50),(91,'GER light cruiser','SCR',1000),(92,'GER submarine','SSU',500),(93,'GERpenicheAAA','SAA',80),(94,'ger_lrg','INF',0),(95,'ger_med','INF',0),(96,'Gotha G.V','PBO',200),(97,'gunpos01','INF',0),(98,'gunpos_g01','INF',0),(99,'Halberstadt CL.II','PRE',200),(100,'Halberstadt CL.II 200hp','PRE',200),(101,'Halberstadt D.II','PFI',100),(102,'Handley Page 0-400','PBO',200),(103,'HMS light cruiser','SCR',1000),(104,'HMS submarine','SSU',500),(105,'Hotchkiss','IMG',50),(106,'HotchkissAAA','IMA',80),(107,'Leyland','VTR',50),(108,'LeylandS','VTR',50),(109,'LMG08AAA','IMA',80),(110,'LMGO8','IMG',50),(111,'M-Flak','IMA',80),(112,'m13','ART',100),(113,'Merc22','VTR',50),(114,'Mk4F','T',100),(115,'Mk4FGER','T',100),(116,'Mk4M','T',100),(117,'MK4MGER','T',100),(118,'Mk5F','T',100),(119,'Mk5M','T',100),(120,'Nieuport 11.C1','PFI',100),(121,'Nieuport 17.C1','PFI',100),(122,'Nieuport 17.C1 GBR','PFI',100),(123,'Nieuport 28.C1','PFI',100),(124,'Parseval','BAL',50),(125,'Passenger Ship','SPA',300),(126,'Pfalz D.IIIa','PFI',100),(127,'Pfalz D.XII','PFI',100),(128,'pillbox01','INF',0),(129,'pillbox02','INF',0),(130,'pillbox03','INF',0),(131,'pillbox04','INF',0),(132,'Portal','INF',0),(133,'Quad','VTR',50),(134,'Quad Searchlight','VTR',50),(135,'QuadA','VTR',-50),(136,'railwaystation_1','INF',0),(137,'railwaystation_2','INF',0),(138,'railwaystation_3','INF',0),(139,'railwaystation_4','INF',0),(140,'railwaystation_5','INF',0),(141,'river_airbase','INF',0),(142,'river_airbase2','INF',0),(143,'river_airbase3','INF',0),(144,'Roucourt','INF',0),(145,'rwstation','INF',0),(146,'S.E.5a','PFI',100),(147,'ship_stat_cargo','STR',150),(148,'ship_stat_pass','SPA',150),(149,'ship_stat_tank','STR',150),(150,'Sopith Triplane','PFI',100),(151,'Sopwith Camel','PFI',100),(152,'Sopwith Dolphin','PFI',100),(153,'SPAD 13.C1','PFI',100),(154,'SPAD 7.C1 150hp','PFI',100),(155,'SPAD 7.C1 180hp','PFI',100),(156,'StChamond','T',100),(157,'Tanker Ship','STR',300),(158,'tent01','INF',1000),(159,'tent02','INF',0),(160,'tent03','INF',0),(161,'tent_camp01','INF',0),(162,'tent_camp02','INF',0),(163,'tent_camp03','INF',0),(164,'tent_camp04','INF',0),(165,'thornycroftaaa','VAA',80),(166,'TurretBreguet14_1','TUR',0),(167,'TurretBristolF2BF2_1_WM2','TUR',0),(168,'TurretBristolF2BF3_1_WM2','TUR',0),(169,'TurretBW12_1','TUR',0),(170,'TurretBW12_1_WM_Becker_AP','TUR',0),(171,'TurretBW12_1_WM_Becker_HE','TUR',0),(172,'TurretBW12_1_WM_Becker_HEAP','TUR',0),(173,'TurretBW12_1_WM_Twin_Parabellum','TUR',0),(174,'TurretDFWC_1','TUR',0),(175,'TurretDFWC_1_WM_Becker_AP','TUR',0),(176,'TurretDFWC_1_WM_Becker_HE','TUR',0),(177,'TurretDFWC_1_WM_Becker_HEAP','TUR',0),(178,'TurretDFWC_1_WM_Twin_Parabellum','TUR',0),(179,'TurretDH4_1','TUR',0),(180,'TurretDH4_1_WM','TUR',0),(181,'TurretFe2b_1','TUR',0),(182,'TurretFe2b_1_WM','TUR',0),(183,'TurretFelixF2A_2','TUR',0),(184,'TurretFelixF2A_3','TUR',0),(185,'TurretFelixF2A_3_WM','TUR',0),(186,'TurretGothaG5_1','TUR',0),(187,'TurretGothaG5_1_WM_Becker_AP','TUR',0),(188,'TurretGothaG5_1_WM_Becker_HE','TUR',0),(189,'TurretGothaG5_1_WM_Becker_HEAP','TUR',0),(190,'TurretGothaG5_2','TUR',0),(191,'TurretGothaG5_2_WM_Twin_Parabellum','TUR',0),(192,'TurretHalberstadtCL2au_1','TUR',0),(193,'TurretHalberstadtCL2au_1_WM_TwinPar','TUR',0),(194,'TurretHalberstadtCL2_1','TUR',0),(195,'TurretHalberstadtCL2_1_WM_TwinPar','TUR',0),(196,'TurretHP400_1','TUR',0),(197,'TurretHP400_1_WM','TUR',0),(198,'TurretHP400_2','TUR',0),(199,'TurretHP400_2_WM','TUR',0),(200,'TurretHP400_3','TUR',0),(201,'TurretRE8_1','TUR',0),(202,'TurretRE8_1_WM','TUR',0),(203,'TurretRolandC2a_1_WM_Twin_Par','TUR',0),(204,'Wagon_BoxB','RWA',25),(205,'Wagon_BoxNB','RWA',25),(206,'Wagon_G8T','RWA',25),(207,'Wagon_GondolaB','RWA',25),(208,'Wagon_GondolaNB','RWA',25),(209,'Wagon_Pass','RWA',25),(210,'Wagon_PassA','RWA',-25),(211,'Wagon_PassAC','RWA',25),(212,'Wagon_PassC','RWA',25),(213,'Wagon_PlatformA7V','RWA',25),(214,'Wagon_PlatformB','RWA',25),(215,'Wagon_PlatformEmptyB','RWA',25),(216,'Wagon_PlatformEmptyNB','RWA',25),(217,'Wagon_PlatformMk4','RWA',25),(218,'Wagon_PlatformNB','RWA',25),(219,'Wagon_TankB','RWA',25),(220,'Wagon_TankNB','RWA',25),(221,'Whippet','T',100),(222,'Windsock','FLG',0);
/*!40000 ALTER TABLE `rof_object_properties` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-18 18:05:00
