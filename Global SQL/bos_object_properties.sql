-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2014 at 02:26 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=48 ;

--
-- Dumping data for table `bos_object_properties`
--

INSERT INTO `bos_object_properties` (`id`, `object_type`, `object_class`, `object_value`, `object_desc`, `Model`, `moving_becomes`, `modelpath2`, `modelpath3`, `max_speed_kmh`, `cruise_speed_kmh`, `range_m`, `default_country`) VALUES
(1, '52-K', 'AAA', 100, '85mm AAA', '52k', 'zis5', 'artillery', '52k', NULL, NULL, NULL, ''),
(2, '61-K', 'AAA', 100, '61-K 37 mm AA', '61k', 'zis5', 'artillery', '61k', NULL, NULL, NULL, ''),
(3, 'Flak 37', 'AAA', 100, 'Flak 37 88 mm AAA', 'flak37', 'opel-blitz', 'artillery', 'flak37', NULL, NULL, NULL, ''),
(4, 'Flak 38', 'AAA', 100, 'Flak 38 20 mm AA', 'flak38', 'opel-blitz', 'artillery', 'flak38', NULL, NULL, NULL, ''),
(5, 'BM-13', 'ART', 50, 'BM-13', 'bm13', 'bm13', 'vehicles', 'zis', NULL, NULL, NULL, ''),
(6, 'leFH 18', 'ART', 100, 'LeFH 18 105 mm howitzer', 'lefh18', 'opel-blitz', 'artillery', 'lefh18', NULL, NULL, NULL, ''),
(7, 'ML-20', 'ART', 100, 'ML-20 152 mm howitzer', 'ml20', 'zis5', 'artillery', 'ml20', NULL, NULL, NULL, ''),
(8, 'Pak 40', 'ART', 100, 'Pak 40 75 mm anti-tank gun', 'pak40', 'opel-blitz', 'artillery', 'pak40', NULL, NULL, NULL, ''),
(9, 'ZiS-3', 'ART', 100, 'ZiS-3 76 mm field gun', 'zis3gun', 'zis5', 'artillery', 'zis3gun', NULL, NULL, NULL, ''),
(10, 'BotGunner_Ju87D3 ', 'BOT', 0, 'Ju 87 D-3 bot gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(11, 'BotPilot_Bf109 ', 'BOT', 0, 'Bf109 bot pilot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(12, 'BotPilot_LaGG3', 'BOT', 0, 'bot pilot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(13, 'Intrinsic', 'DNA', 0, 'Intrinsic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(14, 'Maksim-4 AA', 'IMA', 50, 'Maksim-4 AA', 'maksim4-aa', 'zis5', 'artillery', 'maksim4-aa', NULL, NULL, NULL, ''),
(15, 'MG 34 AA', 'IMA', 50, 'MG 34 AA', 'mg34-aa', 'opel-blitz', 'artillery', 'mg34-aa', NULL, NULL, NULL, ''),
(16, 'DsHK', 'IMG', 50, 'DshK heavy machine gun', 'dshk', 'zis5', 'artillery', 'dshk', NULL, NULL, NULL, ''),
(17, 'MG 34', 'IMG', 50, 'MG 34 machine gun', 'mg34', 'opel-blitz', 'artillery', 'mg34', NULL, NULL, NULL, ''),
(18, 'Il-2 mod.1942', 'PFB', 100, 'IL-2 AM 38 (1942)', 'il2m42', NULL, 'planes', 'il2m42', NULL, NULL, NULL, ''),
(19, 'Ju 87 D-3', 'PFB', 100, 'Ju 87 D-3', 'ju87d3', NULL, 'planes', 'ju87d3', NULL, NULL, NULL, ''),
(20, 'Bf 109 F-4 ', 'PFI', 100, 'Bf 109 F-4 ', 'bf109f4', NULL, 'planes', 'bf109f4', NULL, NULL, NULL, ''),
(21, 'Bf 109 G-2', 'PFI', 100, 'Bf 109 G-2', 'bf109g2', NULL, 'planes', 'bf109g2', NULL, NULL, NULL, ''),
(22, 'La-5 ser.8', 'PFI', 100, 'La-5 ser.8', 'la5s8', NULL, 'planes', 'la5s8', NULL, NULL, NULL, ''),
(23, 'LaGG-3 ser.29 ', 'PFI', 100, 'LaGG-3 ser.29', 'lagg3s29', NULL, 'planes', 'lagg3s29', NULL, NULL, NULL, ''),
(24, 'Pe-2 ser.87', 'PFI', 100, 'Pe-2 ser. 87', 'pe2s87', NULL, 'planes', 'pe2s87', NULL, NULL, NULL, ''),
(25, 'Yak-1 ser.69 ', 'PFI', 100, 'Yak-1 ser.69 ', 'yak1s69', NULL, 'planes', 'yak1s69', NULL, NULL, NULL, ''),
(26, 'BA64', 'T ', 100, 'BA-64', 'BA64', 'BA64', 'vehicles', 'BA64', NULL, NULL, NULL, ''),
(27, 'KV-1 mod.1942', 'T ', 100, 'KV-1 mod. 1942', 'kv1-42', 'kv1-42', 'vehicles', 'kv1-42', NULL, NULL, NULL, ''),
(28, 'Pz. III L', 'T ', 100, 'Pz. III L', 'pziii-l', 'pziii-l', 'vehicles', 'pziii-l', NULL, NULL, NULL, ''),
(29, 'Pz. IV G', 'T ', 100, 'Pz. IV G', 'pziv-g', 'pziv-g', 'vehicles', 'pziv-g', NULL, NULL, NULL, ''),
(30, 'Stug 40 L43', 'T ', 100, 'Stug 40 L43', 'stug40l43', 'stug40l43', 'vehicles', 'stug40l43', NULL, NULL, NULL, ''),
(31, 'T-34/76STZ', 'T ', 100, 'T-34/76STZ', 't34-76stz', 't34-76stz', 'vehicles', 't34-76stz', NULL, NULL, NULL, ''),
(32, 'T-70', 'T ', 100, 'T-70', 't70', 't70', 'vehicles', 't70', NULL, NULL, NULL, ''),
(33, 'Turret_Il2m42 ', 'TUR', 0, 'Il-2 mod. 1942 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(34, 'Turret_Ju87D3 ', 'TUR', 0, 'Ju 87 D-3 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(35, 'Turret_Pe2s87_1 ', 'TUR', 0, 'Pe-2 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(36, 'Turret_Pe2s87_2 ', 'TUR', 0, 'Pe-2 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(37, 'GAZ-AA-M4-AA', 'VAA', 50, 'GAZ-AA-M4-AA', 'gaz-aa-m4-aa', 'gaz-aa-m4-aa', 'vehicles', 'gaz', NULL, NULL, NULL, ''),
(38, 'Sd. Kfz. 10 Flak 38', 'VAA', 100, 'Sd. Kfz. 10 Flak 38', 'sdkfz10-flak38', 'sdkfz10-flak38', 'vehicles', 'sdkfz10-flak38', NULL, NULL, NULL, ''),
(39, 'searchlightger', 'VSL', 50, 'Searchlight', 'searchlightger', 'opel-blitz', 'artillery', 'searchlightger', NULL, NULL, NULL, ''),
(40, 'searchlightsu', 'VSL', 50, 'Searchlight', 'searchlightsu', 'zis5', 'artillery', 'searchlightsu', NULL, NULL, NULL, ''),
(41, 'Ford G917', 'VTR', 50, 'Ford G917 half-track', 'ford-g917', 'ford-g917', 'vehicles', 'ford', NULL, NULL, NULL, ''),
(42, 'GAZ-AA', 'VTR', 50, 'GAZ-AA truck', 'gaz-aa', 'gaz-aa', 'vehicles', 'gaz', NULL, NULL, NULL, ''),
(43, 'GAZ-M', 'VTR', 50, 'GAZ-M staff car', 'gaz-m', 'gaz-m', 'vehicles', 'gaz', NULL, NULL, NULL, ''),
(44, 'Horch 830 ', 'VTR', 50, 'Horch 830 staff car', 'horch830', 'horch830', 'vehicles', 'horch', NULL, NULL, NULL, ''),
(45, 'Opel Blitz', 'VTR', 50, 'Opel Blitz truck', 'opel-blitz', 'opel-blitz', 'vehicles', 'opel', NULL, NULL, NULL, ''),
(46, 'Sd. Kfz. 251', 'VTR', 50, 'Sd. Kfz. 251 half-track', 'sdkfz251', 'sdkfz251', 'vehicles', 'sdkfz251', NULL, NULL, NULL, ''),
(47, 'ZIS-5', 'VTR', 50, 'ZIS-5 truck', 'zis5', 'zis5', 'vehicles', 'zis5', NULL, NULL, NULL, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
