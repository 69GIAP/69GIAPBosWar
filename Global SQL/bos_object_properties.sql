-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 18, 2014 at 11:04 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `bos_object_properties`
--

INSERT INTO `bos_object_properties` (`id`, `object_type`, `object_class`, `object_value`, `object_desc`, `Model`, `moving_becomes`, `modelpath2`, `modelpath3`, `max_speed_kmh`, `cruise_speed_kmh`, `range_m`, `default_country`) VALUES
(1, 'BM-13', 'ART', 50, 'BM-13', NULL, 'bm13', 'vehicles', 'zis', NULL, NULL, NULL, ''),
(2, 'BotGunner_Ju87D3 ', 'BOT', 0, 'Ju 87 D-3 bot gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(3, 'BotPilot_Bf109 ', 'BOT', 0, 'Bf109 bot pilot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(4, 'BotPilot_LaGG3', 'BOT', 0, 'bot pilot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(5, 'Intrinsic', 'DNA', 0, 'Intrinsic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(6, 'Il-2 mod.1942', 'PFB', 100, 'IL-2 AM 38 (1942)', 'il2m42', NULL, 'planes', 'il2m42', NULL, NULL, NULL, ''),
(7, 'Ju 87 D-3', 'PFB', 100, 'Ju 87 D-3', 'ju87d3', NULL, 'planes', 'ju87d3', NULL, NULL, NULL, ''),
(8, 'Bf 109 F-4 ', 'PFI', 100, 'Bf 109 F-4 ', 'bf109f4', NULL, 'planes', 'bf109f4', NULL, NULL, NULL, ''),
(9, 'Bf 109 G-2', 'PFI', 100, 'Bf 109 G-2', 'bf109g2', NULL, 'planes', 'bf109g2', NULL, NULL, NULL, ''),
(10, 'La-5 ser.8', 'PFI', 100, 'La-5 ser.8', 'la5s8', NULL, 'planes', 'la5s8', NULL, NULL, NULL, ''),
(11, 'LaGG-3 ser.29 ', 'PFI', 100, 'LaGG-3 ser.29', 'lagg3s29', NULL, 'planes', 'lagg3s29', NULL, NULL, NULL, ''),
(12, 'Pe-2 ser.87', 'PFI', 100, 'Pe-2 ser. 87', 'pe2s87', NULL, 'planes', 'pe2s87', NULL, NULL, NULL, ''),
(13, 'Yak-1 ser.69 ', 'PFI', 100, 'Yak-1 ser.69 ', 'yak1s69', NULL, 'planes', 'yak1s69', NULL, NULL, NULL, ''),
(14, 'BA-64 ', 'T ', 100, 'BA-64', 'BA64', 'BA64', 'vehicles', 'BA64', NULL, NULL, NULL, ''),
(15, 'KV-1 mod. 1942', 'T ', 100, 'KV-1 mod. 1942', NULL, 'kv1-42', 'vehicles', 'kv1-42', NULL, NULL, NULL, ''),
(16, 'Pz. III L', 'T ', 100, 'Pz. III L', NULL, 'pziii-l', 'vehicles', 'pziii-l', NULL, NULL, NULL, ''),
(17, 'Pz. IV G', 'T ', 100, 'Pz. IV G', NULL, 'pziv-g', 'vehicles', 'pziv-g', NULL, NULL, NULL, ''),
(18, 'Sd. Kfz. 251', 'T ', 100, 'Sd. Kfz. 251', NULL, 'sdkfz251', 'vehicles', 'sdkfz251', NULL, NULL, NULL, ''),
(19, 'Stug 40 L43', 'T ', 100, 'Stug 40 L43', NULL, 'stug40l43', 'vehicles', 'stug40l43', NULL, NULL, NULL, ''),
(20, 'T-34/76STZ', 'T ', 100, 'T-34/76STZ', NULL, 't34-76stz', 'vehicles', 't34-76stz', NULL, NULL, NULL, ''),
(21, 'T-70', 'T ', 100, 'T-70', NULL, 't70', 'vehicles', 't70', NULL, NULL, NULL, ''),
(22, 'Turret_Il2m42 ', 'TUR', 0, 'Il-2 mod. 1942 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(23, 'Turret_Ju87D3 ', 'TUR', 0, 'Ju 87 D-3 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(24, 'Turret_Pe2s87_1 ', 'TUR', 0, 'Pe-2 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(25, 'Turret_Pe2s87_2 ', 'TUR', 0, 'Pe-2 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(26, 'GAZ-AA-M4-AA', 'VAA', 50, 'GAZ-AA-M4-AA', NULL, 'gaz-aa-m4-aa', 'vehicles', 'gaz', NULL, NULL, NULL, ''),
(27, 'Sd. Kfz. 10 Flak 38', 'VAA', 100, 'Sd. Kfz. 10 Flak 38', NULL, 'sdkfz10-flak38', 'vehicles', 'sdkfz10-flak38', NULL, NULL, NULL, ''),
(28, 'Ford G917', 'VTR', 50, 'Ford G917', NULL, 'ford-g917', 'vehicles', 'ford', NULL, NULL, NULL, ''),
(29, 'GAZ-AA', 'VTR', 100, 'GAZ-AA', NULL, 'gaz-aa', 'vehicles', 'gaz', NULL, NULL, NULL, ''),
(30, 'GAZ-M', 'VTR', 50, 'GAZ-M', NULL, 'gaz-m', 'vehicles', 'gaz', NULL, NULL, NULL, ''),
(31, 'Horch 830 ', 'VTR', 50, 'Horch 830 ', NULL, 'horch830', 'vehicles', 'horch', NULL, NULL, NULL, ''),
(32, 'Opel Blitz', 'VTR', 50, 'Opel Blitz', NULL, 'opel-blitz', 'vehicles', 'opel', NULL, NULL, NULL, ''),
(33, 'ZIS-5', 'VTR', 50, 'ZIS-5', NULL, 'zis5', 'vehicles', 'zis5', NULL, NULL, NULL, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
