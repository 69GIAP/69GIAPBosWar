-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 27, 2014 at 10:21 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=73 ;

--
-- Dumping data for table `bos_object_properties`
--

INSERT INTO `bos_object_properties` (`id`, `object_type`, `object_class`, `object_value`, `object_desc`, `Model`, `moving_becomes`, `modelpath2`, `modelpath3`, `max_speed_kmh`, `cruise_speed_kmh`, `range_m`, `default_country`) VALUES
(1, '52-K', 'AAA', 100, '52-K 85 mm AAA', '52k', 'zis5', 'artillery', '52k', NULL, NULL, NULL, '101'),
(2, '61-K', 'AAA', 100, '61-K 37 mm AA', '61k', 'zis5', 'artillery', '61k', NULL, NULL, NULL, '101'),
(3, 'Flak 37', 'AAA', 100, 'Flak 37 88 mm AAA', 'flak37', 'opel-blitz', 'artillery', 'flak37', NULL, NULL, NULL, '201'),
(4, 'Flak 38', 'AAA', 100, 'Flak 38 20 mm AA', 'flak38', 'opel-blitz', 'artillery', 'flak38', NULL, NULL, NULL, '201'),
(5, 'leFH 18', 'ART', 100, 'LeFH 18 105 mm howitzer', 'lefh18', 'opel-blitz', 'artillery', 'lefh18', NULL, NULL, NULL, '201'),
(6, 'ML-20', 'ART', 100, 'ML-20 152 mm howitzer', 'ml20', 'zis5', 'artillery', 'ml20', NULL, NULL, NULL, '101'),
(7, 'Pak 40', 'ART', 100, 'Pak 40 75 mm anti-tank gun', 'pak40', 'opel-blitz', 'artillery', 'pak40', NULL, NULL, NULL, '201'),
(8, 'Sd Kfz 251 Wurfrahmen 40', 'ART', 50, 'Sd Kfz 251 Wurfrahmen 40', 'sdkfz251-szf', 'sdkfz251-szf', 'vehicles', 'sdkfz251', NULL, NULL, NULL, '201'),
(9, 'ZiS-3', 'ART', 100, 'ZiS-3 76 mm field gun', 'zis3gun', 'zis5', 'artillery', 'zis3gun', NULL, NULL, NULL, '101'),
(10, 'ZiS-6 BM-13', 'ART', 50, 'ZiS-6 BM-13', 'bm13', 'bm13', 'vehicles', 'zis', NULL, NULL, NULL, '101'),
(11, 'BotGunner_Ju87D3 ', 'BOT', 0, 'Ju 87 D-3 bot gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '201'),
(12, 'BotPilot_Bf109 ', 'BOT', 0, 'Bf109 bot pilot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '201'),
(13, 'BotPilot_LaGG3', 'BOT', 0, 'bot pilot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101'),
(14, 'BotPilot_Pe2', 'BOT', 0, 'Pe2 bot pilot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101'),
(15, 'Intrinsic', 'DNA', 0, 'Intrinsic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(16, 'M4', 'IMA', 50, 'Maksim-4 AA', 'maksim4-aa', 'zis5', 'artillery', 'maksim4-aa', NULL, NULL, NULL, '101'),
(17, 'MG 34 AA', 'IMA', 50, 'MG 34 AA', 'mg34-aa', 'opel-blitz', 'artillery', 'mg34-aa', NULL, NULL, NULL, '201'),
(18, 'DsHK', 'IMG', 50, 'DshK heavy machine gun', 'dshk', 'zis5', 'artillery', 'dshk', NULL, NULL, NULL, '101'),
(19, 'MG 34', 'IMG', 50, 'MG 34 machine gun', 'mg34', 'opel-blitz', 'artillery', 'mg34', NULL, NULL, NULL, '201'),
(20, 'Searchlight', 'LGT', 0, 'Searchlight', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(21, 'static_he111', 'PBO', 100, 'parked He 111', 'static_he111', NULL, 'Blocks', NULL, NULL, NULL, NULL, '201'),
(22, 'static_he111_open', 'PBO', 100, 'parked He 111', 'static_he111_open', NULL, 'Blocks', NULL, NULL, NULL, NULL, '201'),
(23, 'Il-2 mod.1942', 'PFB', 100, 'IL-2 AM 38 (1942)', 'il2m42', NULL, 'planes', 'il2m42', NULL, NULL, NULL, '101'),
(24, 'Ju 87 D-3', 'PFB', 100, 'Ju 87 D-3', 'ju87d3', NULL, 'planes', 'ju87d3', NULL, NULL, NULL, '201'),
(25, 'Pe-2 ser.87', 'PFB', 100, 'Pe-2 ser. 87', 'pe2s87', NULL, 'planes', 'pe2s87', NULL, NULL, NULL, '101'),
(26, 'static_il2', 'PFB', 100, 'parked IL-2', 'static_il2', NULL, 'Blocks', NULL, NULL, NULL, NULL, '101'),
(27, 'static_il2_net', 'PFB', 100, 'parked IL-2', 'static_il2_net', NULL, 'Blocks', NULL, NULL, NULL, NULL, '101'),
(28, 'static_ju87', 'PFB', 100, 'parked Ju 87', 'static_ju87', NULL, 'Blocks', NULL, NULL, NULL, NULL, '201'),
(29, 'static_ju87_net', 'PFB', 100, 'parked Ju 87', 'static_ju87_net', NULL, 'Blocks', NULL, NULL, NULL, NULL, '201'),
(30, 'static_ju87_open', 'PFB', 100, 'parked Ju 87', 'static_ju87_open', NULL, 'Blocks', NULL, NULL, NULL, NULL, '201'),
(31, 'static_pe2 ', 'PFB', 100, 'parked Pe-2', 'static_pe2 ', NULL, 'Blocks', NULL, NULL, NULL, NULL, '101'),
(32, 'static_pe2_open', 'PFB', 100, 'parked Pe-2', 'static_pe2_open', NULL, 'Blocks', NULL, NULL, NULL, NULL, '101'),
(33, 'Bf 109 F-4 ', 'PFI', 100, 'Bf 109 F-4 ', 'bf109f4', NULL, 'planes', 'bf109f4', NULL, NULL, NULL, '201'),
(34, 'Bf 109 G-2', 'PFI', 100, 'Bf 109 G-2', 'bf109g2', NULL, 'planes', 'bf109g2', NULL, NULL, NULL, '201'),
(35, 'La-5 ser.8', 'PFI', 100, 'La-5 ser.8', 'la5s8', NULL, 'planes', 'la5s8', NULL, NULL, NULL, '101'),
(36, 'LaGG-3 ser.29 ', 'PFI', 100, 'LaGG-3 ser.29', 'lagg3s29', NULL, 'planes', 'lagg3s29', NULL, NULL, NULL, '101'),
(37, 'static_bf109 ', 'PFI', 100, 'parked Bf 109', 'static_bf109', NULL, 'Blocks', NULL, NULL, NULL, NULL, '101'),
(38, 'static_bf109_net', 'PFI', 100, 'parked Bf 109', 'static_bf109_net', NULL, 'Blocks', NULL, NULL, NULL, NULL, '201'),
(39, 'static_bf109_open', 'PFI', 100, 'parked Bf 109', 'static_bf109_open', NULL, 'Blocks', NULL, NULL, NULL, NULL, '201'),
(40, 'static_lagg3', 'PFI', 100, 'parked LaGG-3', 'static_lagg3', NULL, 'Blocks', NULL, NULL, NULL, NULL, '201'),
(41, 'static_lagg3_net', 'PFI', 100, 'parked LaGG-3', 'static_lagg3_net', NULL, 'Blocks', NULL, NULL, NULL, NULL, '101'),
(42, 'static_lagg3_w1', 'PFI', 100, 'parked LaGG-3', 'static_lagg3_w1', NULL, 'Blocks', NULL, NULL, NULL, NULL, '101'),
(43, 'static_lagg3_w2', 'PFI', 100, 'parked LaGG-3', 'static_lagg3_w2', NULL, 'Blocks', NULL, NULL, NULL, NULL, '101'),
(44, 'static_Yak1', 'PFI', 100, 'parked Yak-1', 'static_yak1', NULL, 'Blocks', NULL, NULL, NULL, NULL, '101'),
(45, 'static_Yak1_net', 'PFI', 100, 'parked Yak-1', 'static_yak1_net', NULL, 'Blocks', NULL, NULL, NULL, NULL, '101'),
(46, 'static_Yak1_open', 'PFI', 100, 'parked Yak-1', 'static_yak1_open', NULL, 'Blocks', NULL, NULL, NULL, NULL, '101'),
(47, 'Yak-1 ser.69 ', 'PFI', 100, 'Yak-1 ser.69 ', 'yak1s69', NULL, 'planes', 'yak1s69', NULL, NULL, NULL, '101'),
(48, 'BA-64', 'T ', 100, 'BA-64', 'BA64', 'BA64', 'vehicles', 'BA64', NULL, NULL, NULL, '101'),
(49, 'KV-1-42', 'T ', 100, 'KV-1-42', 'kv1-42', 'kv1-42', 'vehicles', 'kv1-42', NULL, NULL, NULL, '101'),
(50, 'PzKpfw III Ausf.L', 'T ', 100, 'PzKpfw III Ausf.L', 'pziii-l', 'pziii-l', 'vehicles', 'pziii-l', NULL, NULL, NULL, '201'),
(51, 'PzKpfw IV Ausf.G', 'T ', 100, 'PzKpfw IV Ausf.G', 'pziv-g', 'pziv-g', 'vehicles', 'pziv-g', NULL, NULL, NULL, '201'),
(52, 'StuG III Ausf.F', 'T ', 100, 'StuG III Ausf.F', 'stug40l43', 'stug40l43', 'vehicles', 'stug40l43', NULL, NULL, NULL, '201'),
(53, 'T-34-76 STZ', 'T ', 100, 'T-34-76 STZ', 't34-76stz', 't34-76stz', 'vehicles', 't34-76stz', NULL, NULL, NULL, '101'),
(54, 'T-70', 'T ', 100, 'T-70', 't70', 't70', 'vehicles', 't70', NULL, NULL, NULL, '101'),
(55, 'Turret_Il2m42 ', 'TUR', 0, 'Il-2 mod. 1942 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101'),
(56, 'Turret_Ju87D3 ', 'TUR', 0, 'Ju 87 D-3 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '201'),
(57, 'Turret_Pe2s87_1 ', 'TUR', 0, 'Pe-2 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101'),
(58, 'Turret_Pe2s87_2 ', 'TUR', 0, 'Pe-2 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '101'),
(59, 'GAZ-AA M4', 'VAA', 50, 'GAZ-AA M4', 'gaz-aa-m4-aa', 'gaz-aa-m4-aa', 'vehicles', 'gaz', NULL, NULL, NULL, '101'),
(60, 'Sd Kfz 10 Flak 38', 'VAA', 100, 'Sd Kfz 10 Flak 38', 'sdkfz10-flak38', 'sdkfz10-flak38', 'vehicles', 'sdkfz10-flak38', NULL, NULL, NULL, '201'),
(61, 'German Searchlight', 'VSL', 50, 'Searchlight', 'searchlightger', 'opel-blitz', 'artillery', 'searchlightger', NULL, NULL, NULL, '201'),
(62, 'Soviet Searchlight', 'VSL', 50, 'Searchlight', 'searchlightsu', 'zis5', 'artillery', 'searchlightsu', NULL, NULL, NULL, '101'),
(63, 'Ford G917', 'VTR', 50, 'Ford G917 half-track', 'ford-g917', 'ford-g917', 'vehicles', 'ford', NULL, NULL, NULL, '101'),
(64, 'GAZ-AA', 'VTR', 50, 'GAZ-AA truck', 'gaz-aa', 'gaz-aa', 'vehicles', 'gaz', NULL, NULL, NULL, '101'),
(65, 'GAZ-M', 'VTR', 50, 'GAZ-M staff car', 'gaz-m', 'gaz-m', 'vehicles', 'gaz', NULL, NULL, NULL, '101'),
(66, 'Horch 830 ', 'VTR', 50, 'Horch 830 staff car', 'horch830', 'horch830', 'vehicles', 'horch', NULL, NULL, NULL, '201'),
(67, 'Opel Blitz', 'VTR', 50, 'Opel Blitz truck', 'opel-blitz', 'opel-blitz', 'vehicles', 'opel', NULL, NULL, NULL, '201'),
(68, 'Sd Kfz 251-1 Ausf.C', 'VTR', 50, 'Sd Kfz 251-1 Ausf.C', 'sdkfz251-1c', 'sdkfz251-1c', 'vehicles', 'sdkfz251', NULL, NULL, NULL, '201'),
(69, 'static_opel', 'VTR', 50, 'parked Opel Blitz truck', 'static_opel', 'opel-blitz', 'Blocks', NULL, NULL, NULL, NULL, '201'),
(70, 'static_zis ', 'VTR', 50, 'parked ZIS truck', 'static_zis ', 'zis5', 'Blocks', NULL, NULL, NULL, NULL, '101'),
(71, 'static_zis_fuel', 'VTR', 50, 'parked ZIS fuel truck', 'static_zis_fuel', 'zis5', 'Blocks', NULL, NULL, NULL, NULL, '101'),
(72, 'ZIS-5', 'VTR', 50, 'ZIS-5 truck', 'zis5', 'zis5', 'vehicles', 'zis5', NULL, NULL, NULL, '101');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
