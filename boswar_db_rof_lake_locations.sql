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
-- Table structure for table `rof_lake_locations`
--

DROP TABLE IF EXISTS `rof_lake_locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `rof_lake_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `LID` int(2) NOT NULL,
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
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2013-09-24 15:22:34
