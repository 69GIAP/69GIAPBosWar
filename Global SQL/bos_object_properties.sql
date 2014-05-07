-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 07, 2014 at 04:14 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `bos`
--

-- --------------------------------------------------------

--
-- Table structure for table `bos_object_properties`
--

DROP TABLE IF EXISTS `bos_object_properties`;
CREATE TABLE IF NOT EXISTS `bos_object_properties` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `object_type` varchar(50) NOT NULL,
  `object_class` varchar(8) NOT NULL,
  `object_value` smallint(1) NOT NULL,
  `object_desc` varchar(40) DEFAULT NULL,
  `Model` varchar(30) DEFAULT NULL,
  `moving_becomes` varchar(30) DEFAULT NULL,
  `modelpath2` varchar(20) DEFAULT NULL,
  `modelpath3` varchar(20) DEFAULT NULL,
  `max_speed_kmh` tinyint(3) unsigned DEFAULT NULL,
  `cruise_speed_kmh` tinyint(3) unsigned DEFAULT NULL,
  `range_m` smallint(5) unsigned DEFAULT NULL,
  `default_country` enum('0','101','201') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `object_type` (`object_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `bos_object_properties`
--

INSERT INTO `bos_object_properties` (`id`, `object_type`, `object_class`, `object_value`, `object_desc`, `Model`, `moving_becomes`, `modelpath2`, `modelpath3`, `max_speed_kmh`, `cruise_speed_kmh`, `range_m`, `default_country`) VALUES
(1, 'Intrinsic', 'DNA', 0, 'Intrinsic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(2, 'LaGG-3 ser.29 ', 'PFI', 100, 'LaGG-3 ser.29', 'lagg3s29', NULL, 'planes', 'lagg3s29', NULL, NULL, NULL, ''),
(3, 'Il-2 mod.1942', 'PFB', 100, 'IL-2 AM 38 (1942)', 'il2m42', NULL, 'planes', 'il2m42', NULL, NULL, NULL, ''),
(4, 'BotPilot_LaGG3', 'BOT', 0, 'bot pilot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(5, 'Ju 87 D-3', 'PFB', 100, 'Ju 87 D-3', 'ju87d3', NULL, 'planes', 'ju87d3', NULL, NULL, NULL, ''),
(6, 'Horch 830 ', 'VTR', 50, 'Horch 830 ', NULL, 'horch830', 'vehicles', 'horch830', NULL, NULL, NULL, ''),
(7, 'BotPilot_Bf109 ', 'BOT', 0, 'Bf109 bot pilot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(8, 'BotGunner_Ju87D3 ', 'BOT', 0, 'Ju 87 D-3 bot gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(9, 'Bf 109 F-4 ', 'PFI', 100, 'Bf 109 F-4 ', 'bf109f4', NULL, 'planes', 'bf109f4', NULL, NULL, NULL, ''),
(10, 'Turret_Il2m42 ', 'TUR', 0, 'Il-2 mod. 1942 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(11, 'Turret_Ju87D3 ', 'TUR', 0, 'Ju 87 D-3 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(12, 'BA-64 ', 'T ', 100, 'BA-64', 'BA64', 'BA64', 'vehicles', 'BA64', NULL, NULL, NULL, ''),
(13, 'Pe-2 ser.87', 'PFI', 100, 'Pe-2 ser. 87', 'pe2s87', NULL, 'planes', 'pe2s87', NULL, NULL, NULL, ''),
(14, 'Turret_Pe2s87_1 ', 'TUR', 0, 'Pe-2 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(15, 'Turret_Pe2s87_2 ', 'TUR', 0, 'Pe-2 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(16, 'Yak-1 ser.69 ', 'PFI', 100, 'Yak-1 ser.69 ', 'yak1s69', NULL, 'planes', 'yak1s69', NULL, NULL, NULL, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
