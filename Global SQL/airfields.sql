-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2013 at 08:59 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `boswar_db`
--

-- --------------------------------------------------------

DROP TABLE IF EXISTS `airfields`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `airfields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `airfield_Name` char(31) DEFAULT 'Unknown airfield',
  `airfield_Model` char(20) DEFAULT NULL,
  `airfield_Desc` varchar(80) DEFAULT NULL,
  `airfield_Country` enum('0','101','102','103','104','105','501','502','600','610','620','630','640') DEFAULT '0',
  `airfield_Coalition` enum('0','1','2','3','4','5','6','7') DEFAULT '0',
  `airfield_XPos` decimal(12,3) DEFAULT '0.000',
  `airfield_ZPos` decimal(12,3) DEFAULT '0.000',
  `airfield_YOri` decimal(5,2) DEFAULT '0.00',
  `airfield_Hydrodrome` int(11) DEFAULT '0',
  `airfield_enabled` int(11) DEFAULT '0',
  `airfield_updated` int(11) DEFAULT '0',
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=601 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;



-- Dump completed on 2013-11-06 16:23:09