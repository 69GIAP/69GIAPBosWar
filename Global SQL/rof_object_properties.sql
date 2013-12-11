#STENKA CORRECTION 11/12/13 Always delete table and recreate to apply latest structure-
-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2013 at 10:36 PM
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
-- Table structure for table `rof_object_properties`
--
DROP TABLE IF EXISTS rof_object_properties;
CREATE TABLE IF NOT EXISTS `rof_object_properties` (
  `id` smallint(1) AUTO_INCREMENT,
  `family` varchar(20) DEFAULT NULL,
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
  `default_country` enum('0','101','102','103','104','105','501','502','600','610','620','630','640') DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `object_type` (`object_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=238 ;

--
-- Truncate table before insert `rof_object_properties`
--

TRUNCATE TABLE `rof_object_properties`;
--
-- Dumping data for table `rof_object_properties`
--

INSERT INTO `rof_object_properties` (`id`, `family`, `object_type`, `object_class`, `object_value`, `object_desc`, `Model`, `moving_becomes`, `modelpath2`, `modelpath3`, `max_speed_kmh`, `cruise_speed_kmh`, `range_m`, `default_country`) VALUES
(1, 'Vehicle', '13PdrAAA', 'AAA', 80, '13-pounder AAA', '13pdraaa', 'leylands', 'artillery', '13pdraaa', 0, 0, NULL, '101'),
(2, '', '13PrdaaaAttached', 'AAA', 80, '13-pounder AAA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(3, 'Vehicle', '77mmAAA', 'AAA', 80, '77mm AAA', '77mmaaa', 'daimlermarienfeld_s', 'artillery', '77mmaaa', 0, 0, NULL, '501'),
(4, '', '77mmAAAAttached', 'AAA', 80, '77mm AAA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, ''),
(5, 'Vehicle', '45QF', 'ART', 100, '4.5 in. Quick Fire artillery', '45qf', 'leylands', 'artillery', '45qf', 0, 0, NULL, '102'),
(6, 'Vehicle', '75FG1897', 'ART', 100, '75mm M1897 artillery', '75fg1897', 'leylands', 'artillery', '75fg1897', 0, 0, NULL, '101'),
(7, 'Vehicle', 'FK96', 'ART', 100, 'Feldkanone 96 77mm artillery', 'fk96', 'daimlermarienfeld_s', 'artillery', 'fk96', 0, 0, NULL, '501'),
(8, 'Vehicle', 'm13', 'ART', 100, '15cm schweres Feldhaubitze M13 Lang', 'm13', 'daimlermarienfeld_s', 'artillery', 'm13', 0, 0, NULL, '501'),
(9, 'Aerostat', 'AeType', 'BAL', 50, 'Type Ae observation balloon', 'aetype', NULL, 'balloons', 'aetype', 0, 0, NULL, '101'),
(10, 'Aerostat', 'Caquot', 'BAL', 50, 'Caquot Type R observation balloon', 'caquot', NULL, 'balloons', 'caquot', 0, 0, NULL, '101'),
(11, 'Aerostat', 'Drachen', 'BAL', 50, 'Drachen type observation balloon', 'drachen', NULL, 'balloons', 'drachen', 0, 0, NULL, '501'),
(12, 'Aerostat', 'Parseval', 'BAL', 50, 'Parseval-Sigsfeld kite balloon', 'parseval', NULL, 'balloons', 'parseval', 0, 0, NULL, '501'),
(13, '', 'BotBoatSwain', 'BOT', 0, 'bosun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(14, '', 'BotGunnerBacker', 'BOT', 0, 'Becker gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(15, '', 'BotGunnerBreguet14', 'BOT', 0, 'gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(16, '', 'BotGunnerBW12', 'BOT', 0, 'Brandenburg W12 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(17, '', 'BotGunnerDavis', 'BOT', 0, 'Davis gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(18, '', 'BotGunnerFe2_sing', 'BOT', 0, 'F.E.2b gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(19, '', 'BotGunnerFelix_top-twin', 'BOT', 0, 'Felixstowe F.2A top gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(20, '', 'BotGunnerG5_1', 'BOT', 0, 'gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(21, '', 'BotGunnerG5_2', 'BOT', 0, 'gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(22, '', 'BotGunnerHCL2', 'BOT', 0, 'Halberstadt Cl.II gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(23, '', 'BotGunnerHP400_1', 'BOT', 0, 'nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(24, '', 'BotGunnerHP400_2', 'BOT', 0, 'Handley Page 0/400 dorsal gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(25, '', 'BotGunnerHP400_2_WM', 'BOT', 0, 'Handley Page O/400 dorsal gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(26, '', 'BotGunnerHP400_3', 'BOT', 0, 'Handley Page O/400 belly gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(27, '', 'BotGunnerRE8', 'BOT', 0, 'gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(28, 'Bridge', 'bridge_hw110', 'BRG', 0, '110m road bridge', 'bridge_hw110', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(29, 'Bridge', 'bridge_hw130', 'BRG', 0, '130m road bridge', 'bridge_hw130', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(30, 'Bridge', 'bridge_hw150', 'BRG', 0, '150m road bridge', 'bridge_hw150', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(31, 'Bridge', 'bridge_hw170', 'BRG', 0, '170m road bridge', 'bridge_hw170', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(32, 'Bridge', 'bridge_hw190', 'BRG', 0, '190m road bridge', 'bridge_hw190', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(33, 'Bridge', 'bridge_hw40', 'BRG', 0, '40m road bridge', 'bridge_hw40', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(34, 'Bridge', 'bridge_hw70', 'BRG', 0, '70m road bridge', 'bridge_hw70', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(35, 'Bridge', 'bridge_hw90', 'BRG', 0, '90m road bridge', 'bridge_hw90', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(36, 'Bridge', 'bridge_rr110', 'BRG', 0, '110m rail bridge', 'bridge_rr110', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(37, 'Bridge', 'bridge_rr130', 'BRG', 0, '130m rail bridge', 'bridge_rr130', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(38, 'Bridge', 'bridge_rr150', 'BRG', 0, '150m rail bridge', 'bridge_rr150', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(39, 'Bridge', 'bridge_rr170', 'BRG', 0, '170m rail bridge', 'bridge_rr170', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(40, 'Bridge', 'bridge_rr190', 'BRG', 0, '190m rail bridge', 'bridge_rr190', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(41, 'Bridge', 'bridge_rr70', 'BRG', 0, '70m rail bridge', 'bridge_rr70', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(42, 'Bridge', 'bridge_rr90', 'BRG', 0, '90m rail bridge', 'bridge_rr90', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(43, '', 'Intrinsic', 'DNA', 0, 'Intrinsic', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(44, 'Block', 'factory_01', 'FAC', 0, 'factory', 'factory_01', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(45, 'Block', 'factory_02', 'FAC', 0, 'factory', 'factory_02', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(46, 'Block', 'factory_03', 'FAC', 0, 'factory', 'factory_03', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(47, 'Block', 'factory_04', 'FAC', 0, 'factory', 'factory_04', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(48, 'Block', 'factory_05', 'FAC', 0, 'factory', 'factory_05', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(49, 'Block', 'factory_06', 'FAC', 0, 'factory', 'factory_06', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(50, 'Block', 'factory_07', 'FAC', 0, 'oil tanks', 'factory_07', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(51, 'Block', 'factory_08', 'FAC', 0, 'storage sheds', 'factory_08', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(52, 'Flag', 'Flag', 'FLG', 0, 'flag', 'flag', NULL, 'flag', '', NULL, NULL, NULL, '0'),
(53, 'Flag', 'Windsock', 'FLG', 0, 'windsock', 'windsock', NULL, 'flag', '', NULL, NULL, NULL, '0'),
(54, '', 'Common Bot', 'HUM', 0, 'pilot', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(55, 'Vehicle', 'HotchkissAAA', 'IMA', 80, 'anti-aircraft Hotchkiss machine gun', 'hotchkissaaa', 'leylands', 'artillery', 'machineguns', 0, 0, NULL, '101'),
(56, 'Vehicle', 'LMG08AAA', 'IMA', 80, 'anti-aircraft Maxim machine gun', 'lmg08aaa', 'daimlermarienfeld_s', 'artillery', 'machineguns', 0, 0, NULL, '501'),
(57, 'Vehicle', 'M-Flak', 'IMA', 80, '37mm automatic flak gun', 'mflak', 'daimlermarienfeld_s', 'artillery', 'mflak', 0, 0, NULL, '501'),
(58, 'Vehicle', 'Hotchkiss', 'IMG', 50, 'Hotchkiss machine gun', 'hotchkiss', 'leylands', 'artillery', 'machineguns', 0, 0, NULL, '101'),
(59, 'Vehicle', 'LMGO8', 'IMG', 50, 'Maxim machine gun', 'lmg08', 'daimlermarienfeld_s', 'artillery', 'machineguns', 0, 0, NULL, '501'),
(60, '', 'CappyChateau', 'INF', 0, 'Cappy Chateau', 'cappychateau', NULL, 'buildings', NULL, NULL, NULL, NULL, '0'),
(61, 'Block', 'church_01', 'INF', 0, 'church', 'church_01', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(62, 'Block', 'church_02', 'INF', 0, 'church', 'church_02', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(63, 'Block', 'church_03', 'INF', 0, 'church', 'church_03', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(64, 'Block', 'churchE_01', 'INF', 0, 'church', 'churche_01', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(65, 'Airfield', 'fr_lrg', 'INF', 0, 'airfield', 'fr_lrg', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(66, 'Airfield', 'fr_med', 'INF', 0, 'airfield', 'fr_med', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(67, 'Airfield', 'ger_lrg', 'INF', 0, 'airfield', 'ger_lrg', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(68, 'Airfield', 'ger_med', 'INF', 0, 'airfield', 'ger_med', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(69, 'Vehicle', 'gunpos_g01', 'INF', 0, 'gun position g1', 'gunpos_g01', NULL, 'firingpoint', 'gunpos', NULL, NULL, NULL, '0'),
(70, 'Vehicle', 'gunpos01', 'INF', 0, 'gun position 1', 'gunpos01', NULL, 'firingpoint', 'gunpos', NULL, NULL, NULL, '0'),
(71, 'Block', 'gunpos02', 'INF', 0, 'gun position 2', 'gunpos02', NULL, 'battlefield', '', NULL, NULL, NULL, '0'),
(72, 'Vehicle', 'pillbox01', 'INF', 0, 'pillbox 1', 'pillbox01', NULL, 'firingpoint', 'pillbox', NULL, NULL, NULL, '0'),
(73, 'Vehicle', 'pillbox02', 'INF', 0, 'pillbox 2', 'pillbox02', NULL, 'firingpoint', 'pillbox', NULL, NULL, NULL, '0'),
(74, 'Vehicle', 'pillbox03', 'INF', 0, 'pillbox 3', 'pillbox03', NULL, 'firingpoint', 'pillbox', NULL, NULL, NULL, '0'),
(75, 'Vehicle', 'pillbox04', 'INF', 0, 'pillbox 4', 'pillbox04', NULL, 'firingpoint', 'pillbox', NULL, NULL, NULL, '0'),
(76, 'Block', 'Portal', 'INF', 0, 'rail tunnel', 'portal', NULL, 'bridges', NULL, NULL, NULL, NULL, '0'),
(77, 'Block', 'railwaystation_1', 'INF', 0, 'railway station', 'railwaystation_01', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(78, 'Block', 'railwaystation_2', 'INF', 0, 'railway station', 'railwaystation_02', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(79, 'Block', 'railwaystation_3', 'INF', 0, 'railway station', 'railwaystation_03', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(80, 'Block', 'railwaystation_4', 'INF', 0, 'railway station', 'railwaystation_04', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(81, 'Block', 'railwaystation_5', 'INF', 0, 'railway station', 'railwaystation_05', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(82, 'Airfield', 'river_airbase', 'INF', 0, 'seaplane pier', 'river_airbase', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(83, 'Airfield', 'river_airbase2', 'INF', 0, 'seaplane pier', 'river_airbase2', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(84, 'Airfield', 'river_airbase3', 'INF', 0, 'seaplane pier', 'river_airbase3', NULL, 'airfields', NULL, NULL, NULL, NULL, '0'),
(85, 'Airfield', 'Roucourt', 'INF', 0, 'airfield', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(86, 'Block', 'rwstation', 'INF', 0, 'railway station', 'rwstation', NULL, 'blocks', NULL, NULL, NULL, NULL, '0'),
(87, 'Block', 'tent_camp 1', 'INF', 0, 'tent camp 1', 'tent_camp01', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(88, 'Block', 'tent_camp02', 'INF', 0, 'tent camp 2', 'tent_camp02', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(89, 'Block', 'tent_camp03', 'INF', 0, 'tent camp 3', 'tent_camp03', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(90, 'Block', 'tent_camp04', 'INF', 0, 'tent camp 4', 'tent_camp04', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(91, 'Block', 'tent01', 'INF', 1000, 'HQ tent', 'tent01', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(92, 'Block', 'tent02', 'INF', 0, 'tent 2', 'tent02', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(93, 'Block', 'tent03', 'INF', 0, 'tent 3', 'tent03', NULL, 'battlefield', NULL, NULL, NULL, NULL, '0'),
(94, '', 'GBR Searchlight', 'LGT', 50, 'searchlight', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(95, '', 'GER Ship Searchlight', 'LGT', 50, 'ship searchlight', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(96, '', 'HMS Ship Searchlight', 'LGT', 50, 'ship searchlight', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(97, '', 'British naval 4in AAA gun', 'NAA', 80, '4in naval AAA gun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(98, '', 'British naval 12pdr gun', 'NAR', 0, 'naval 12-pounder gun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(99, '', 'British naval 4in gun', 'NAR', 0, 'naval 4in gun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(100, '', 'British navel 6in gun', 'NAR', 0, 'naval 6in gun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(101, '', 'German naval 105mm gun', 'NAR', 0, 'naval 105mm gun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(102, '', 'German naval 52mm gun', 'NAR', 0, 'naval 52mm gun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(103, 'Plane', 'Gotha G.V', 'PBO', 200, 'Gotha G.V', 'gothag5', 'gothag5', 'planes', 'gothag5', NULL, NULL, NULL, '501'),
(104, 'Plane', 'Handley Page 0-400', 'PBO', 200, 'Handley Page O/400', 'hp400', 'hp400', 'planes', 'hp400', NULL, NULL, NULL, '102'),
(105, 'Plane', 'Airco D.H.2', 'PFI', 100, 'Airco D.H.2', 'dh2', 'dh2', 'planes', 'dh2', NULL, NULL, NULL, '102'),
(106, 'Plane', 'Albatros D.II', 'PFI', 100, 'Albatros D.II', 'albatrosd2', 'albatrosd2', 'planes', 'albatrosd2', NULL, NULL, NULL, '501'),
(107, 'Plane', 'Albatros D.II lt', 'PFI', 100, 'Albatros D.II lt', 'albatrosd2late', 'albatrosd2late', 'planes', 'albatrosd2late', NULL, NULL, NULL, '501'),
(108, 'Plane', 'Albatros D.III', 'PFI', 100, 'Albatros D.III', 'albatrosd3', 'albatrosd3', 'planes', 'albatrosd3', NULL, NULL, NULL, '501'),
(109, 'Plane', 'Albatros D.Va', 'PFI', 100, 'Albatros D.Va', 'albatrosd5', 'albatrosd5', 'planes', 'albatrosd5', NULL, NULL, NULL, '501'),
(110, 'Plane', 'Fokker D.VII', 'PFI', 100, 'Fokker D.VII', 'fokkerd7', 'fokkerd7', 'planes', 'fokkerd7', NULL, NULL, NULL, '501'),
(111, 'Plane', 'Fokker D.VIIF', 'PFI', 100, 'Fokker D.VIIF', 'fokkerd7f', 'fokkerd7f', 'planes', 'fokkerd7f', NULL, NULL, NULL, '501'),
(112, 'Plane', 'Fokker D.VIII', 'PFI', 100, 'Fokker D.VIII', 'fokkerd8', 'fokkerd8', 'planes', 'fokkerd8', NULL, NULL, NULL, '501'),
(113, 'Plane', 'Fokker Dr.I', 'PFI', 100, 'Fokker Dr.I', 'fokkerdr1', 'fokkerdr1', 'planes', 'fokkerdr1', NULL, NULL, NULL, '501'),
(114, 'Plane', 'Fokker E.III', 'PFI', 100, 'Fokker E.III', 'fokkere3', 'fokkere3', 'planes', 'fokkere3', NULL, NULL, NULL, '501'),
(115, 'Plane', 'Halberstadt D.II', 'PFI', 100, 'Halberstadt D.II', 'halberstadtd2', 'halberstadtd2', 'planes', 'halberstadtd2', NULL, NULL, NULL, '501'),
(116, 'Plane', 'Nieuport 11.C1', 'PFI', 100, 'Nieuport 11.C1', 'nieuport11', 'nieuport11', 'planes', 'nieuport11', NULL, NULL, NULL, '101'),
(117, 'Plane', 'Nieuport 17.C1', 'PFI', 100, 'Nieuport 17.C1', 'nieuport17', 'nieuport17', 'planes', 'nieuport17', NULL, NULL, NULL, '101'),
(118, 'Plane', 'Nieuport 17.C1 GBR', 'PFI', 100, 'Nieuport 17.C1 GBR', 'nieuport17brit', 'nieuport17brit', 'planes', 'nieuport17brit', NULL, NULL, NULL, '102'),
(119, 'Plane', 'Nieuport 28.C1', 'PFI', 100, 'Nieuport 28.C1', 'nieuport28', 'nieuport28', 'planes', 'nieuport28', NULL, NULL, NULL, '101'),
(120, 'Plane', 'Pfalz D.IIIa', 'PFI', 100, 'Pfalz D.IIIa', 'pfalzd3a', 'pfalzd3a', 'planes', 'pfalzd3a', NULL, NULL, NULL, '501'),
(121, 'Plane', 'Pfalz D.XII', 'PFI', 100, 'Pfalz D.XII', 'pfalzd12', 'pfalzd12', 'planes', 'pfalzd12', NULL, NULL, NULL, '501'),
(122, 'Plane', 'S.E.5a', 'PFB', 100, 'S.E.5a', 'se5a', 'se5a', 'planes', 'se5a', NULL, NULL, NULL, '102'),
(123, 'Plane', 'Sopwith Camel', 'PFB', 100, 'Sopwith Camel', 'sopcamel', 'sopcamel', 'planes', 'sopcamel', NULL, NULL, NULL, '102'),
(124, 'Plane', 'Sopwith Dolphin', 'PFB', 100, 'Sopwith Dolphin', 'sopdolphin', 'sopdolphin', 'planes', 'sopdolphin', NULL, NULL, NULL, '102'),
(125, 'Plane', 'Sopwith Pup', 'PFI', 100, 'Sopwith Pup', 'soppup', 'soppup', 'planes', 'soppup', NULL, NULL, NULL, '102'),
(126, 'Plane', 'Sopwith Triplane', 'PFI', 100, 'Sopwith Triplane', 'soptriplane', 'soptriplane', 'planes', 'soptriplane', NULL, NULL, NULL, '102'),
(127, 'Plane', 'SPAD 13.C1', 'PFB', 100, 'SPAD 13.C1', 'spad13', 'spad13', 'planes', 'spad13', NULL, NULL, NULL, '101'),
(128, 'Plane', 'SPAD 7.C1 150hp', 'PFI', 100, 'SPAD 7.C1 150hp', 'spad7early', 'spad7early', 'planes', 'spad7early', NULL, NULL, NULL, '101'),
(129, 'Plane', 'SPAD 7.C1 180hp', 'PFI', 100, 'SPAD 7.C1 180hp', 'spad7', 'spad7', 'planes', 'spad7', NULL, NULL, NULL, '101'),
(130, 'Plane', 'Airco D.H.4', 'PRE', 200, 'Airco D.H.4', 'dh4', 'dh4', 'planes', 'dh4', NULL, NULL, NULL, '102'),
(131, 'Plane', 'Breguet 14.B2', 'PRE', 200, 'Breguet 14.B2', 'breguet14', 'breguet14', 'planes', 'breguet14', NULL, NULL, NULL, '101'),
(132, 'Plane', 'Bristol F2B (F.II)', 'PRE', 200, 'Bristol F2B (F.II)', 'bristolf2bf2', 'bristolf2bf2', 'planes', 'bristolf2bf2', NULL, NULL, NULL, '102'),
(133, 'Plane', 'Bristol F2B (F.III)', 'PRE', 200, 'Bristol F2B (F.III)', 'bristolf2bf3', 'bristolf2bf3', 'planes', 'bristolf2bf2', NULL, NULL, NULL, '102'),
(134, 'Plane', 'DFW C.V', 'PRE', 200, 'DFW.C.V', 'dfwc5', 'dfwc5', 'planes', 'dfwc5', NULL, NULL, NULL, '501'),
(135, 'Plane', 'F.E.2b', 'PRE', 200, 'F.E.2b', 'fe2b', 'fe2b', 'planes', 'fe2b', NULL, NULL, NULL, '102'),
(136, 'Plane', 'Halberstadt CL.II', 'PRE', 200, 'Halberstadt CL.II', 'halberstadtcl2', 'halberstadtcl2', 'planes', 'halberstadtcl2', NULL, NULL, NULL, '501'),
(137, 'Plane', 'Halberstadt CL.II 200hp', 'PRE', 200, 'Halberstadt CL.II 200hp', 'halberstadtcl2au', 'halberstadtcl2au', 'planes', 'halberstadtcl2au', NULL, NULL, NULL, '501'),
(138, 'Plane', 'R.E.8', 'PRE', 200, 'R.E.8', 're8', 're8', 'planes', 're8', NULL, NULL, NULL, '102'),
(139, 'Plane', 'Roland C.IIa', 'PRE', 200, 'Roland C.IIa', 'rolc2a', 'rolc2a', 'planes', 'rolc2a', NULL, NULL, NULL, '501'),
(140, 'Plane', 'Brandenburg W12', 'PSE', 200, 'Brandenburg W12', 'brandw12', 'brandw12', 'planes', 'brandw12', NULL, NULL, NULL, '501'),
(141, 'Plane', 'Felixstowe F2A', 'PSE', 200, 'Felixstowe F2A', 'felixf2a', 'felixf2a', 'planes', 'felixf2a', NULL, NULL, NULL, '102'),
(142, 'Train', 'G8', 'RLO', 50, 'locomotive', 'g8', 'g8', 'trains', 'g8', NULL, NULL, NULL, '0'),
(143, 'Train', 'Wagon_BoxB', 'RWA', 25, 'boxcar', 'boxb', 'boxb', 'trains', 'box', NULL, NULL, NULL, '0'),
(144, 'Train', 'Wagon_BoxNB', 'RWA', 25, 'boxcar', 'boxnb', 'boxnb', 'trains', 'box', NULL, NULL, NULL, '0'),
(145, 'Train', 'Wagon_G8T', 'RWA', 25, 'tender', 'g8t', 'g8t', 'trains', 'g8', NULL, NULL, NULL, '0'),
(146, 'Train', 'Wagon_GondolaB', 'RWA', 25, 'covered gondola', 'gondolab', 'gondolab', 'trains', 'platform', NULL, NULL, NULL, '0'),
(147, 'Train', 'Wagon_GondolaNB', 'RWA', 25, 'covered gondola', 'gondolanb', 'gondolanb', 'trains', 'platform', NULL, NULL, NULL, '0'),
(148, 'Train', 'Wagon_Pass', 'RWA', 25, 'passenger railcar', 'pass', 'pass', 'trains', 'pass', NULL, NULL, NULL, '0'),
(149, 'Train', 'Wagon_PassA', 'RWA', -25, 'hospital railcar', 'passa', 'passa', 'trains', 'pass', NULL, NULL, NULL, '0'),
(150, 'Train', 'Wagon_PassAC', 'RWA', -25, 'hospital railcar', 'passac', 'passac', 'trains', 'pass', NULL, NULL, NULL, '0'),
(151, 'Train', 'Wagon_PassC', 'RWA', 25, 'passenger railcar', 'passc', 'passc', 'trains', 'pass', NULL, NULL, NULL, '0'),
(152, 'Train', 'Wagon_PlatformA7V', 'RWA', 25, 'loaded flatcar', 'platforma7v', 'platforma7v', 'trains', 'platform', NULL, NULL, NULL, '0'),
(153, 'Train', 'Wagon_PlatformB', 'RWA', 25, 'loaded flatcar', 'platformb', 'platformb', 'trains', 'platform', NULL, NULL, NULL, '0'),
(154, '', 'Wagon_PlatformEmptyB', 'RWA', 25, 'empty flatcar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(155, '', 'Wagon_PlatformEmptyNB', 'RWA', 25, 'empty flatcar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(156, 'Train', 'Wagon_PlatformMk4', 'RWA', 25, 'loaded flatcar', 'platformmk4', 'platformmk4', 'trains', 'platform', NULL, NULL, NULL, '0'),
(157, 'Train', 'Wagon_PlatformNB', 'RWA', 25, 'loaded flatcar', 'platformnb', 'platformnb', 'trains', 'platform', NULL, NULL, NULL, '0'),
(158, 'Train', 'Wagon_TankB', 'RWA', 25, 'tank railcar', 'tankb', 'tankb', 'trains', 'box', NULL, NULL, NULL, '0'),
(159, 'Train', 'Wagon_TankNB', 'RWA', 25, 'tank railcar', 'tanknb', 'tanknb', 'trains', 'box', NULL, NULL, NULL, '0'),
(160, 'Ship', 'FRpenicheAAA', 'SAA', 80, 'peniche AAA barge', 'frpenicheaaa', 'frpenicheaaa', 'ships', 'frpenicheaaa', NULL, NULL, NULL, '101'),
(161, 'Ship', 'GERpenicheAAA', 'SAA', 80, 'peniche AAA barge', 'gerpenicheaaa', 'gerpenicheaaa', 'ships', 'gerpenicheaaa', NULL, NULL, NULL, '501'),
(162, 'Ship', 'GER light cruiser', 'SCR', 1000, 'light cruiser', 'gercruiser', 'gercruiser', 'ships', 'gerships', NULL, NULL, NULL, '501'),
(163, 'Ship', 'HMS light cruiser', 'SCR', 1000, 'light cruiser', 'hmscruiser', 'hmscruiser', 'ships', 'gbrships', NULL, NULL, NULL, '102'),
(164, 'Ship', 'Passenger Ship', 'SPA', 300, 'passenger ship', 'ship_pass', 'ship_pass', 'ships', 'merchant', NULL, NULL, NULL, '0'),
(165, 'Block', 'ship_stat_pass', 'SPA', 150, 'stationary passenger ship', 'ship_stat_pass', 'ship_pass', 'blocks', NULL, NULL, NULL, NULL, '0'),
(166, 'Ship', 'GER submarine', 'SSU', 500, 'U-boat', 'gersubmarine', 'gersubmarine', 'ships', 'gerships', NULL, NULL, NULL, '501'),
(167, 'Ship', 'HMS submarine', 'SSU', 500, 'submarine', 'hmssubmarine', 'hmssubmarine', 'ships', 'gbrships', NULL, NULL, NULL, '102'),
(168, 'Ship', 'Cargo Ship', 'STR', 300, 'cargo ship', 'ship_cargo', 'ship_cargo', 'ships', 'merchant', NULL, NULL, NULL, '0'),
(169, 'Block', 'ship_stat_cargo', 'STR', 150, 'stationary cargo ship', 'ship_stat_cargo', 'ship_cargo', 'blocks', NULL, NULL, NULL, NULL, '0'),
(170, 'Block', 'ship_stat_tank', 'STR', 150, 'stationary tanker ship', 'ship_stat_tank', 'ship_tank', 'blocks', NULL, NULL, NULL, NULL, '0'),
(171, 'Ship', 'Tanker Ship', 'STR', 300, 'tanker ship', 'ship_tank', 'ship_tank', 'ships', 'merchant', NULL, NULL, NULL, '0'),
(172, '', 'A7V', 'T', 100, 'A7V tank', 'a7v', 'a7v', 'vehicles', 'a7v', 6, 4, NULL, '501'),
(173, 'Vehicle', 'Ca1', 'T', 100, 'Schneider CA1 tank', 'ca1', 'ca1', 'vehicles', 'ca1', 6, 4, NULL, '101'),
(174, 'Vehicle', 'F17M', 'T', 100, 'Renault FT17 machine gun tank', 'ft17m', 'ft17m', 'vehicles', 'ft17', 6, 4, NULL, '101'),
(175, 'Vehicle', 'FT17C', 'T', 100, 'Renault FT17 cannon tank', 'ft17c', 'ft17', 'vehicles', 'ft17', 6, 4, NULL, '101'),
(176, 'Vehicle', 'Mk4F', 'T', 100, 'Mk IV Female tank', 'mk4f', 'mk4f', 'vehicles', 'mk4', 6, 4, NULL, '102'),
(177, 'Vehicle', 'Mk4FGER', 'T', 100, 'Mk IV Female tank', 'mk4fger', 'mk4fger', 'vehicles', 'mk4', 6, 4, NULL, '501'),
(178, 'Vehicle', 'Mk4M', 'T', 100, 'Mk IV Male tank', 'mk4m', 'mk4m', 'vehicles', 'mk4', 6, 4, NULL, '102'),
(179, 'Vehicle', 'MK4MGER', 'T', 100, 'Mk IV Male tank', 'mk4mger', 'mk4mger', 'vehicles', 'mk4', 6, 4, NULL, '501'),
(180, 'Vehicle', 'Mk5F', 'T', 100, 'Mk V Female tank', 'mk5f', 'mk5f', 'vehicles', 'mk5', 6, 4, NULL, '102'),
(181, 'Vehicle', 'Mk5M', 'T', 100, 'Mk V Male tank', 'mk5m', 'mk5m', 'vehicles', 'mk5', 6, 4, NULL, '102'),
(182, 'Vehicle', 'StChamond', 'T', 100, 'Saint-Chamond tank', 'stchamond', 'stchamond', 'vehicles', 'stchamond', 6, 4, NULL, '101'),
(183, 'Vehicle', 'Whippet', 'T', 100, 'Whippet Mk A tank', 'whippet', 'whippet', 'vehicles', 'whippet', 15, 10, NULL, '102'),
(184, '', 'TurretBreguet14_1', 'TUR', 0, 'gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(185, '', 'TurretBristolF2B_1', 'TUR', 0, 'Bristol F2.B gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(186, '', 'TurretBristolF2BF2_1_WM2', 'TUR', 0, 'Bristol F2.B gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(187, '', 'TurretBristolF2BF3_1_WM2', 'TUR', 0, 'Bristol F2.B gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(188, '', 'TurretBW12_1', 'TUR', 0, 'Brandenburg W12 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(189, '', 'TurretBW12_1_WM_Becker_AP', 'TUR', 0, 'Brandenburg W12 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(190, '', 'TurretBW12_1_WM_Becker_HE', 'TUR', 0, 'Brandenburg W12 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(191, '', 'TurretBW12_1_WM_Becker_HEAP', 'TUR', 0, 'Brandenburg W12 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(192, '', 'TurretBW12_1_WM_Twin_Parabellum', 'TUR', 0, 'Brandenburg W12 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(193, '', 'TurretDFWC_1', 'TUR', 0, 'DFW C.V gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(194, '', 'TurretDFWC_1_WM_Becker_AP', 'TUR', 0, 'DFW C.V gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(195, '', 'TurretDFWC_1_WM_Becker_HE', 'TUR', 0, 'DFW C.V gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(196, '', 'TurretDFWC_1_WM_Becker_HEAP', 'TUR', 0, 'DFW C.V gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(197, '', 'TurretDFWC_1_WM_Twin_Parabellum', 'TUR', 0, 'DFW C.V gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(198, '', 'TurretDH4_1', 'TUR', 0, 'D.H.4 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(199, '', 'TurretDH4_1_WM', 'TUR', 0, 'D.H.4 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(200, '', 'TurretFe2b_1', 'TUR', 0, 'F.E.2b gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(201, '', 'TurretFe2b_1_WM', 'TUR', 0, 'F.E.2b gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(202, '', 'TurretFelixF2A_2', 'TUR', 0, 'Felixstowe F.2A gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(203, '', 'TurretFelixF2A_3', 'TUR', 0, 'Felixstowe F.2A gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(204, '', 'TurretFelixF2A_3_WM', 'TUR', 0, 'Felixstowe F.2A gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(205, '', 'TurretGothaG5_1', 'TUR', 0, 'Gotha G.V nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(206, '', 'TurretGothaG5_1_WM_Becker_AP', 'TUR', 0, 'Gotha G.V nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(207, '', 'TurretGothaG5_1_WM_Becker_HE', 'TUR', 0, 'Gotha G.V nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(208, '', 'TurretGothaG5_1_WM_Becker_HEAP', 'TUR', 0, 'Gotha G.V nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(209, '', 'TurretGothaG5_2', 'TUR', 0, 'rear gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(210, '', 'TurretGothaG5_2_WM_Twin_Parabellum', 'TUR', 0, 'rear gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(211, '', 'TurretHalberstadtCL2_1', 'TUR', 0, 'Halberstadt CL.II gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(212, '', 'TurretHalberstadtCL2_1_WM_TwinPar', 'TUR', 0, 'Halberstadt CL.II gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(213, '', 'TurretHalberstadtCL2au_1', 'TUR', 0, 'Halberstadt CL.II gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(214, '', 'TurretHalberstadtCL2au_1_WM_TwinPar', 'TUR', 0, 'Halberstadt CL.II gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(215, '', 'TurretHP400_1', 'TUR', 0, 'Handley Page O/400 nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(216, '', 'TurretHP400_1_WM', 'TUR', 0, 'Handley Page O/400 nose gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(217, '', 'TurretHP400_2', 'TUR', 0, 'Handley Page O/400 dorsal gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(218, '', 'TurretHP400_2_WM', 'TUR', 0, 'Handley Page O/400 dorsal gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(219, '', 'TurretHP400_3', 'TUR', 0, 'Handley Page O/400 belly gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(220, '', 'TurretRE8_1', 'TUR', 0, 'R.E.8 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(221, '', 'TurretRE8_1_WM2', 'TUR', 0, 'R.E.8 gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(222, '', 'TurretRolandC2a_1', 'TUR', 0, 'Roland C.IIa gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(223, '', 'TurretRolandC2a_1_WM_TwinPar', 'TUR', 0, 'Roland C.IIa gunner', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0'),
(224, 'Vehicle', 'DaimlerAAA', 'VAA', 80, '77mm AAA on a Daimler truck', 'daimleraaa', 'daimleraaa', 'artillery', 'daimleraaa', 50, 20, NULL, '501'),
(225, 'Vehicle', 'thornycroftaaa', 'VAA', 80, '13-pounder AAA on a Thornycraft truck', 'thornycroftaaa', 'thornycroftaaa', 'artillery', 'thornycroftaaa', 50, 20, NULL, '102'),
(226, 'Vehicle', 'Benz Searchlight', 'VSL', 50, 'Benz Cargo truck with searchlight', 'benz_p', 'benz_p', 'vehicles', 'benz', 50, 20, NULL, '501'),
(227, 'Vehicle', 'benz_open', 'VTR', 50, 'Benz Cargo open truck', 'benz_open', 'benz_open', 'vehicles', 'benz', 50, 20, NULL, '501'),
(228, 'Vehicle', 'benz_soft', 'VTR', -25, 'Benz Cargo ambulance', 'benz_soft', 'benz_soft', 'vehicles', 'benz', 50, 20, NULL, '501'),
(229, 'Vehicle', 'Crossley', 'VTR', 50, 'Crossley 4X2 Staff Car', 'crossley', 'crossley', 'vehicles', 'crossley', 50, 20, NULL, '102'),
(230, 'Vehicle', 'DaimlerMarienfelde', 'VTR', 50, 'Daimler Marienfelde open truck', 'daimlermarienfelde', 'daimlermarienfelde', 'vehicles', 'daimlermarienfelde', 50, 20, NULL, '501'),
(231, 'Vehicle', 'DaimlerMarienfelde_S', 'VTR', 50, 'Daimler Marienfelde covered truck', 'daimlermarienfelde_s', 'daimlermarienfelde_s', 'vehicles', 'daimlermarienfelde', 50, 20, NULL, '501'),
(232, 'Vehicle', 'Leyland', 'VTR', 50, 'Leyland 3-tonner open truck', 'leyland', 'leyland', 'vehicles', 'leyland', 50, 20, NULL, '102'),
(233, 'Vehicle', 'LeylandS', 'VTR', 50, 'Leyland 3-tonner covered truck', 'leylands', 'leylands', 'vehicles', 'leyland', 50, 20, NULL, '102'),
(234, 'Vehicle', 'Merc22', 'VTR', 50, 'Mercedes 22 Staff Car', 'merc22', 'merc22', 'vehicles', 'merc22', 50, 20, NULL, '501'),
(235, 'Vehicle', 'Quad', 'VTR', 50, 'Jeffery Quad Portee open truck', 'quad', 'quad', 'vehicles', 'quad', 50, 20, NULL, '101'),
(236, 'Vehicle', 'Quad Searchlight', 'VSL', 50, 'Jeffery Quad Portee with searchlight', 'quad_p', 'quad_p', 'vehicles', 'quad', 50, 20, NULL, '101'),
(237, 'Vehicle', 'QuadA', 'VTR', -25, 'Jeffery Quad Portee ambulance', 'quada', 'quada', 'vehicles', 'quad', 50, 20, NULL, '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
