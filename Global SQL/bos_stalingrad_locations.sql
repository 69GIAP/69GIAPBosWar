-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2014 at 04:08 PM
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
-- Table structure for table `bos_stalingrad_locations`
--

DROP TABLE IF EXISTS `bos_stalingrad_locations`;
CREATE TABLE IF NOT EXISTS `bos_stalingrad_locations` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `LID` smallint(1) unsigned NOT NULL,
  `LX` decimal(15,0) NOT NULL,
  `LZ` decimal(15,0) NOT NULL,
  `LName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `LName` (`LName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `bos_stalingrad_locations`
--

INSERT INTO `bos_stalingrad_locations` (`id`, `LID`, `LX`, `LZ`, `LName`) VALUES
(1, 10, '123500', '178210', 'Kumovka'),
(2, 51, '123230', '180070', 'Kumovka'),
(3, 10, '112260', '184900', 'Verbovka'),
(4, 51, '110560', '185660', 'Verbovka'),
(5, 10, '70000', '243010', 'Plodovitoye'),
(6, 10, '62620', '231280', 'Abganerovo'),
(7, 51, '62750', '228750', 'Abganerovo'),
(8, 51, '61500', '228250', 'Abganerovo'),
(9, 51, '60750', '228500', 'Abganerovo'),
(10, 10, '94020', '55350', 'Morozovskaya south'),
(11, 10, '95910', '50970', 'Morozovskaya west'),
(12, 10, '79440', '12060', 'Tatchinskaya'),
(13, 51, '96320', '54500', 'Morozovskaya'),
(14, 51, '80700', '12980', 'Tatchinskaya'),
(15, 10, '105420', '86440', 'Chernishevskiy'),
(16, 51, '103680', '84140', 'Chernishevskiy'),
(17, 20, '116500', '103270', 'Oblivskaya'),
(18, 20, '117150', '102670', 'Oblivskaya'),
(19, 51, '115240', '105150', 'Oblivskaya'),
(20, 10, '125160', '108910', 'Frolov'),
(21, 51, '125360', '106560', 'Frolov'),
(22, 10, '122190', '118460', 'Sekretev'),
(23, 51, '121460', '117420', 'Sekretev'),
(24, 10, '74600', '120560', 'Tormosin'),
(25, 51, '74000', '122730', 'Tormosin'),
(26, 10, '121020', '130650', 'Surovkino'),
(27, 51, '122000', '131410', 'Surovkino'),
(28, 10, '125560', '154200', 'Zriyaninskiy'),
(29, 51, '124520', '155260', 'Zriyaninskiy'),
(30, 10, '119860', '157460', 'Tusov'),
(31, 51, '119800', '155360', 'Tusov'),
(32, 20, '91000', '143870', 'Kamishyn'),
(33, 20, '90130', '143550', 'Kamishyn'),
(34, 51, '89050', '147900', 'Lipovskiy'),
(35, 10, '91320', '148260', 'Lipovskiy'),
(36, 10, '33860', '148350', 'Safronov'),
(37, 51, '33330', '145250', 'Safronov'),
(38, 10, '16550', '156160', 'Kotelnikovo'),
(39, 20, '12860', '152750', 'Kotelnikovskiy'),
(40, 20, '12270', '153420', 'Kotelnikovskiy'),
(41, 20, '133210', '185520', 'Kalach'),
(42, 20, '132310', '185210', 'Kalach'),
(43, 51, '130000', '180420', 'Kalach'),
(44, 10, '77450', '186420', 'Gromoslavka'),
(45, 51, '75450', '187670', 'Gromoslavka'),
(46, 10, '50310', '190750', 'Zhutovo'),
(47, 51, '49380', '188550', 'Zhutovo'),
(48, 20, '131530', '203060', 'Marinovka'),
(49, 20, '130930', '203750', 'Marinovka'),
(50, 51, '129780', '202960', 'Marinovka'),
(51, 10, '105250', '206740', 'Buzynovka'),
(52, 51, '108810', '208380', 'Buzynovka'),
(53, 20, '88080', '216890', 'Zety'),
(54, 20, '88400', '217250', 'Zety'),
(55, 51, '88330', '219450', 'Zety'),
(56, 10, '50250', '210370', 'Aksay'),
(57, 51, '48700', '213000', 'Aksay'),
(58, 10, '22340', '233040', 'Umantchevo'),
(59, 51, '23280', '235000', 'Umantchevo'),
(60, 10, '83750', '238560', 'Tinguta'),
(61, 51, '84310', '235910', 'Tinguta'),
(62, 10, '127330', '2287870', 'Basargino'),
(63, 10, '160360', '115960', 'Karaichev'),
(64, 51, '160650', '114320', 'Karaichev'),
(65, 10, '163040', '136480', 'Manoylin'),
(66, 51, '166940', '136350', 'Manoylin'),
(67, 10, '197970', '194340', 'Kletskaya'),
(68, 51, '199910', '148740', 'Kletskaya'),
(69, 10, '144860', '158870', 'Skvorin'),
(70, 51, '145240', '160460', 'Skvorin'),
(71, 10, '143590', '163580', 'Berezovskiy'),
(72, 51, '143840', '162590', 'Berezovskiy'),
(73, 10, '186050', '165540', 'Ventsy'),
(74, 51, '185280', '167470', 'Ventsy'),
(75, 10, '148020', '180530', 'Golubinskiy'),
(76, 51, '147810', '184640', 'Golubinskiy'),
(77, 10, '153790', '184480', 'Malogolubaya'),
(78, 51, '153710', '186740', 'Malogolubaya'),
(79, 10, '163100', '188250', 'Evlampiyevskiy'),
(80, 51, '162620', '189850', 'Evlampiyevskiy'),
(81, 20, '187220', '192000', 'Zimovskiy'),
(82, 20, '187370', '192550', 'Zimovskiy'),
(83, 51, '188250', '194290', 'Zimovskiy'),
(84, 10, '152220', '204500', 'Peskatovka'),
(85, 51, '153990', '202070', 'Peskatovka'),
(86, 20, '135180', '214720', 'Karpovka'),
(87, 20, '134280', '214370', 'Karpovka'),
(88, 51, '131420', '214630', 'Karpovka'),
(89, 10, '172020', '218870', 'Kachalinskaya'),
(90, 51, '175820', '218620', 'Kachalinskaya'),
(91, 10, '194600', '226110', 'Illarionovskiy'),
(92, 10, '142290', '228430', 'Bolshaya'),
(93, 51, '144930', '228090', 'Bolshaya'),
(94, 20, '136170', '233890', 'Pitomnik'),
(95, 20, '135790', '233910', 'Pitomnik'),
(96, 51, '134650', '231630', 'Pitomnik'),
(97, 10, '159280', '234520', 'Kotluban'),
(98, 51, '158220', '232640', 'Kotluban'),
(99, 20, '214850', '238760', 'Bolshaya Ivanovka'),
(100, 20, '214340', '239500', 'Bolshaya Ivanovka'),
(101, 51, '214680', '241390', 'Bolshaya Ivanovka');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
