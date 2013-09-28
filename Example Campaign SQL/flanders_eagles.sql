-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 28, 2013 at 07:44 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `flanders_eagles`
--
CREATE DATABASE IF NOT EXISTS `flanders_eagles` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `flanders_eagles`;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_missions`
--

DROP TABLE IF EXISTS `campaign_missions`;
CREATE TABLE IF NOT EXISTS `campaign_missions` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `mission_number` smallint(5) unsigned NOT NULL,
  `mission_file` varchar(50) NOT NULL,
  `MissionID` varchar(50) NOT NULL,
  `mission_status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mission_file` (`mission_file`),
  UNIQUE KEY `MissionID` (`MissionID`),
  UNIQUE KEY `mission_number` (`mission_number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `campaign_settings`
--

DROP TABLE IF EXISTS `campaign_settings`;
CREATE TABLE IF NOT EXISTS `campaign_settings` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `simulation` varchar(6) NOT NULL,
  `campaign` varchar(30) NOT NULL,
  `camp_db` varchar(30) NOT NULL,
  `camp_host` varchar(30) NOT NULL,
  `camp_user` varchar(30) NOT NULL,
  `camp_passwd` varchar(30) NOT NULL,
  `map` varchar(30) NOT NULL,
  `map_locations` varchar(40) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '4',
  `show_airfield` tinyint(1) NOT NULL,
  `finish_flight_only_landed` tinyint(1) NOT NULL,
  `logpath` varchar(60) NOT NULL,
  `log_prefix` varchar(50) NOT NULL,
  `logfile` varchar(50) NOT NULL,
  `kia_pilot` smallint(1) NOT NULL,
  `mia_pilot` smallint(1) NOT NULL,
  `critical_w_pilot` smallint(1) NOT NULL,
  `serious_w_pilot` smallint(1) NOT NULL,
  `light_w_pilot` smallint(1) NOT NULL,
  `kia_gunner` smallint(1) NOT NULL,
  `mia_gunner` smallint(1) NOT NULL,
  `critical_w_gunner` smallint(1) NOT NULL,
  `serious_w_gunner` smallint(1) NOT NULL,
  `light_w_gunner` smallint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `campaign` (`campaign`),
  UNIQUE KEY `camp_db` (`camp_db`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `campaign_settings`
--

INSERT INTO `campaign_settings` (`id`, `simulation`, `campaign`, `camp_db`, `camp_host`, `camp_user`, `camp_passwd`, `map`, `map_locations`, `status`, `show_airfield`, `finish_flight_only_landed`, `logpath`, `log_prefix`, `logfile`, `kia_pilot`, `mia_pilot`, `critical_w_pilot`, `serious_w_pilot`, `light_w_pilot`, `kia_gunner`, `mia_gunner`, `critical_w_gunner`, `serious_w_gunner`, `light_w_gunner`) VALUES
(2, 'RoF', 'Flanders Eagles', 'flanders_eagles', 'localhost', 'rofwar', 'rofwar', 'Channel', 'rof_channel_locations', 3, 1, 1, 'logs', 'missionReportFlandersEagles', 'missionReportFlandersEagles1.txt', 100, 50, 0, 0, 0, 50, 50, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `mission_status`
--

DROP TABLE IF EXISTS `mission_status`;
CREATE TABLE IF NOT EXISTS `mission_status` (
  `id` tinyint(4) unsigned NOT NULL AUTO_INCREMENT,
  `mission_status` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `mission_status`
--

INSERT INTO `mission_status` (`id`, `mission_status`) VALUES
(1, 'initialized'),
(2, 'moving units'),
(3, 'planning'),
(4, 'built'),
(5, 'analyzed');

-- --------------------------------------------------------

--
-- Table structure for table `player_fate`
--

DROP TABLE IF EXISTS `player_fate`;
CREATE TABLE IF NOT EXISTS `player_fate` (
  `id` tinyint(1) NOT NULL,
  `fate` varchar(30) NOT NULL,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player_fate`
--

INSERT INTO `player_fate` (`id`, `fate`) VALUES
(0, 'did not take off'),
(1, 'landed'),
(2, 'did not land'),
(3, 'crashed'),
(4, 'captured'),
(5, 'killed');

-- --------------------------------------------------------

--
-- Table structure for table `player_health`
--

DROP TABLE IF EXISTS `player_health`;
CREATE TABLE IF NOT EXISTS `player_health` (
  `id` tinyint(4) NOT NULL,
  `health` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `health` (`health`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `player_health`
--

INSERT INTO `player_health` (`id`, `health`) VALUES
(3, 'critical injuries'),
(4, 'dead'),
(0, 'fit as a fiddle'),
(1, 'minor injuries'),
(2, 'serious injuries');

-- --------------------------------------------------------

--
-- Table structure for table `rof_channel_locations`
--

DROP TABLE IF EXISTS `rof_channel_locations`;
CREATE TABLE IF NOT EXISTS `rof_channel_locations` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `LID` smallint(1) unsigned NOT NULL,
  `LX` decimal(15,0) NOT NULL,
  `LZ` decimal(15,0) NOT NULL,
  `LName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=564 ;

--
-- Dumping data for table `rof_channel_locations`
--

INSERT INTO `rof_channel_locations` (`id`, `LID`, `LX`, `LZ`, `LName`) VALUES
(1, 51, '54580', '197540', 'Abeele'),
(2, 10, '54160', '199000', 'Abeele East'),
(3, 10, '55000', '196700', 'Abeele West'),
(4, 10, '60920', '238990', 'Abeelhoek'),
(5, 10, '65400', '232640', 'Abele'),
(6, 51, '101840', '93470', 'Adisham'),
(7, 10, '89220', '225000', 'Aertrycke'),
(8, 51, '88090', '226200', 'Aertrycke'),
(9, 51, '44440', '135510', 'Alincthun'),
(10, 10, '127640', '54440', 'Allhallows'),
(11, 51, '128420', '56760', 'Allhallows'),
(12, 10, '46320', '150580', 'Alquines'),
(13, 51, '45550', '149260', 'Alquines'),
(14, 51, '79840', '64270', 'Appledore Heath'),
(15, 51, '178950', '80050', 'Ardleigh'),
(16, 51, '58050', '148770', 'Ardres'),
(17, 10, '73230', '177240', 'Arembouts'),
(18, 51, '106000', '99350', 'Ash'),
(19, 51, '92110', '70690', 'Ashford'),
(20, 51, '58250', '122320', 'Audinghen'),
(21, 51, '55120', '120900', 'Audresselles'),
(22, 51, '60790', '155330', 'Audrui'),
(23, 51, '81670', '201480', 'Avecapelle'),
(24, 10, '45850', '200850', 'Bailleul'),
(25, 51, '45480', '201620', 'Bailleul'),
(26, 51, '64260', '47650', 'Baldslow'),
(27, 51, '97320', '90670', 'Barham'),
(28, 51, '65510', '129090', 'Bas Escalles'),
(29, 51, '138660', '45360', 'Basildon'),
(30, 51, '66500', '43080', 'Battle'),
(31, 10, '60320', '241360', 'Bavichove'),
(32, 51, '41440', '155920', 'Bayenghem'),
(33, 10, '172200', '93270', 'Beaumont'),
(34, 51, '57960', '221760', 'Becelaere'),
(35, 10, '103170', '90550', 'Bekesbourne'),
(36, 10, '69930', '182040', 'Bergues'),
(37, 51, '71010', '180150', 'Bergues'),
(38, 51, '89720', '62390', 'Bethersden'),
(39, 20, '71550', '230080', 'Beveren'),
(40, 20, '71700', '230370', 'Beveren'),
(41, 51, '146410', '40650', 'Billericay'),
(42, 51, '83670', '73150', 'Bilsington'),
(43, 51, '169440', '68640', 'Birch'),
(44, 51, '117100', '1011110', 'Birchington-on-Sea'),
(45, 10, '55100', '235960', 'Bisseghem'),
(46, 10, '170630', '74930', 'Blackheath Common'),
(47, 51, '109500', '228850', 'Blankenberghe'),
(48, 51, '109100', '83240', 'Blean'),
(49, 10, '46390', '157350', 'Boisdenghem'),
(50, 51, '61840', '147800', 'Boisen Ardres'),
(51, 51, '97550', '85140', 'Bossingham'),
(52, 50, '44000', '121000', 'Boulogne'),
(53, 50, '44000', '122000', 'Boulogne'),
(54, 50, '44000', '123000', 'Boulogne'),
(55, 51, '68440', '163550', 'Bourbourg'),
(56, 51, '156220', '74080', 'Bradwell-on-Sea'),
(57, 10, '173880', '49110', 'Braintree'),
(58, 51, '174220', '50960', 'Braintree'),
(59, 20, '81030', '183710', 'Bray Dunee'),
(60, 51, '68860', '50670', 'Brede'),
(61, 51, '165860', '82650', 'Brightlingsea'),
(62, 51, '70250', '50860', 'Broad Oak'),
(63, 20, '105150', '105400', 'Broad Salts'),
(64, 20, '105080', '105220', 'Broad Salts'),
(65, 20, '105020', '105120', 'Broad Salts'),
(66, 51, '1129890', '47400', 'Brompton'),
(67, 51, '75520', '67840', 'Brookland'),
(68, 10, '163120', '44200', 'Broomfeld Court'),
(69, 10, '115330', '91500', 'Broomfield'),
(70, 50, '99000', '235000', 'Brugge'),
(71, 50, '99000', '236000', 'Brugge'),
(72, 50, '98000', '235000', 'Brugge'),
(73, 50, '98000', '236000', 'Brugge'),
(74, 51, '79110', '195240', 'Bulskamp'),
(75, 10, '146160', '69290', 'Burnham-on-Crouch'),
(76, 51, '145410', '68240', 'Burnham-on-Crouch'),
(77, 10, '43450', '225640', 'Cajebert'),
(78, 50, '69430', '137960', 'Calais'),
(79, 50, '61950', '139000', 'Calais'),
(80, 50, '69800', '138520', 'Calais'),
(81, 50, '70000', '139500', 'Calais'),
(82, 20, '79080', '176220', 'CAM Dunkerque'),
(83, 20, '79480', '175960', 'CAM Dunkerque'),
(84, 10, '56940', '144090', 'Campagne'),
(85, 51, '144560', '62810', 'Canewdon'),
(86, 50, '105820', '85000', 'Canterbury'),
(87, 50, '105480', '85860', 'Canterbury'),
(88, 50, '106440', '85770', 'Canterbury'),
(89, 50, '106690', '84970', 'Canterbury'),
(90, 51, '133460', '52630', 'Canvey Island'),
(91, 10, '86790', '95880', 'Capel-le-Ferne'),
(92, 51, '63560', '165410', 'Cappell-Brouck'),
(93, 10, '74330', '175570', 'Cappelle Le Grand'),
(94, 51, '52290', '183680', 'Cassel'),
(95, 51, '100120', '71260', 'Challock'),
(96, 10, '42420', '226710', 'Chantrelle'),
(97, 51, '98980', '65220', 'Charing'),
(98, 51, '102670', '77850', 'Chartham'),
(99, 51, '118380', '46730', 'Chatham'),
(100, 51, '157480', '44680', 'Chelmsford'),
(101, 10, '163080', '89990', 'Clacton'),
(102, 50, '163540', '91500', 'Clacton-on-Sea'),
(103, 10, '50000', '171250', 'Clairmarais'),
(104, 10, '50000', '171250', 'Clairmarais'),
(105, 51, '48100', '170950', 'Clairmarais'),
(106, 20, '101260', '221470', 'Clemskerke'),
(107, 51, '101700', '222200', 'Clemskerke'),
(108, 20, '101570', '221070', 'Clemskerke'),
(109, 20, '101430', '221310', 'Clemskerke'),
(110, 51, '74460', '213660', 'Clercken'),
(111, 10, '56020', '154730', 'Cocove'),
(112, 51, '173200', '59550', 'Coggeshall'),
(113, 50, '174250', '75300', 'Colchester'),
(114, 50, '174690', '74230', 'Colchester'),
(115, 50, '174540', '73520', 'Colchester'),
(116, 20, '48750', '221600', 'Commines'),
(117, 20, '48740', '221560', 'Commines'),
(118, 20, '48580', '221890', 'Commines'),
(119, 20, '102420', '237340', 'Coolkereke'),
(120, 20, '102300', '236990', 'Coolkereke'),
(121, 20, '102600', '237550', 'Coolkereke'),
(122, 20, '102840', '237260', 'Coolkereke'),
(123, 51, '47970', '234840', 'Coolscamp'),
(124, 51, '77400', '223490', 'Cortemark'),
(125, 51, '85140', '218290', 'Couckelaere'),
(126, 10, '50770', '227220', 'Coucou'),
(127, 20, '74960', '179130', 'Coudekerque'),
(128, 20, '74960', '179260', 'Coudekerque'),
(129, 20, '74720', '178740', 'Coudekerque'),
(130, 20, '74910', '179480', 'Coudekerque'),
(131, 51, '55740', '239290', 'Courtai'),
(132, 51, '56130', '239730', 'Courtai'),
(133, 10, '86220', '194740', 'Coxyde'),
(134, 51, '48710', '176020', 'Creve Couer Farm'),
(135, 10, '49380', '176000', 'Creve Couer Farm'),
(136, 51, '71760', '45950', 'Cripp''s Corner'),
(137, 10, '66220', '178000', 'Crochte'),
(138, 10, '39640', '232450', 'Croix'),
(139, 10, '58310', '240510', 'Cueme'),
(140, 51, '155880', '52290', 'Danbury'),
(141, 51, '104880', '222370', 'De Haan'),
(142, 51, '99550', '107820', 'Deal'),
(143, 10, '65200', '227950', 'Den Aap'),
(144, 20, '109560', '51840', 'Detling'),
(145, 20, '109880', '51960', 'Detling'),
(146, 51, '78260', '210300', 'Dixmude'),
(147, 50, '88750', '100480', 'Dover'),
(148, 50, '89450', '101240', 'Dover'),
(149, 50, '90000', '100800', 'Dover'),
(150, 10, '90340', '102360', 'Dover (Guston Road)'),
(151, 20, '91460', '103920', 'Dover (Swingate)'),
(152, 20, '91570', '103910', 'Dover (Swingate)'),
(153, 20, '57920', '191200', 'Droglandt'),
(154, 20, '57690', '191420', 'Droglandt'),
(155, 10, '49700', '232080', 'Dronkart'),
(156, 10, '83280', '189670', 'Duinhoek'),
(157, 50, '78000', '176000', 'Dunkerque'),
(158, 50, '79000', '175150', 'Dunkerque'),
(159, 50, '79450', '176380', 'Dunkerque'),
(160, 50, '79200', '177670', 'Dunkerque'),
(161, 10, '81650', '81980', 'Dymchurch'),
(162, 51, '77810', '78790', 'Dymchurch'),
(163, 51, '179240', '60510', 'Earls Colne'),
(164, 51, '164480', '80500', 'East Mersea'),
(165, 20, '119580', '69690', 'Eastchurch'),
(166, 51, '120910', '69230', 'Eastchurch'),
(167, 20, '119520', '69680', 'Eastchurch'),
(168, 51, '102700', '101610', 'Eastry'),
(169, 10, '171560', '64150', 'Eastthorpe'),
(170, 51, '171650', '65930', 'Eastthorpe'),
(171, 10, '50290', '190990', 'Eecke'),
(172, 10, '76970', '237800', 'Eeghem'),
(173, 51, '75830', '238220', 'Eeghem'),
(174, 51, '91660', '87170', 'Elham'),
(175, 10, '86530', '222010', 'Engel'),
(176, 10, '61390', '172260', 'Eringhem'),
(177, 51, '182760', '97190', 'Erwarton'),
(178, 10, '40800', '162950', 'Esquerdes'),
(179, 51, '186300', '105120', 'Falkenham'),
(180, 51, '110690', '72020', 'Faversham'),
(181, 50, '182500', '105900', 'Felixstowe'),
(182, 50, '182220', '105070', 'Felixstowe'),
(183, 51, '171890', '42630', 'Felsted'),
(184, 50, '84020', '91580', 'Folkestone'),
(185, 50, '84500', '92000', 'Folkestone'),
(186, 50, '85000', '92440', 'Folkestone'),
(187, 51, '167670', '42290', 'Ford End'),
(188, 51, '187510', '92740', 'Freston'),
(189, 10, '106800', '59110', 'Frinsted'),
(190, 51, '167770', '97900', 'Frinton-on-Sea'),
(191, 51, '82560', '196280', 'Furries'),
(192, 51, '56090', '219920', 'Gheluvelt'),
(193, 10, '54240', '225440', 'Gheluwe'),
(194, 20, '93180', '216750', 'Ghistelles'),
(195, 51, '92010', '217500', 'Ghistelles'),
(196, 20, '93220', '216630', 'Ghistelles'),
(197, 51, '118770', '48520', 'Gillingham'),
(198, 10, '99620', '76280', 'Godmersham Park'),
(199, 10, '158120', '63070', 'Goldhanger'),
(200, 10, '125400', '59620', 'Grain'),
(201, 51, '126890', '60370', 'Grain'),
(202, 51, '73020', '158810', 'Gravelines'),
(203, 51, '169880', '85580', 'Great Bentley'),
(204, 51, '166780', '95250', 'Great Holland'),
(205, 51, '175940', '93730', 'Great Oakley'),
(206, 51, '52349', '151680', 'Guemy'),
(207, 10, '59650', '141410', 'Guines'),
(208, 51, '59560', '140320', 'Guines'),
(209, 10, '191610', '83000', 'Hadleigh'),
(210, 10, '50720', '229620', 'Halluin'),
(211, 51, '181250', '56380', 'Halstead'),
(212, 51, '82910', '69190', 'Hamstreet'),
(213, 20, '75450', '220140', 'Handzaeme'),
(214, 20, '75350', '219640', 'Handzaeme'),
(215, 20, '74740', '219590', 'Handzaeme'),
(216, 20, '74810', '219590', 'Handzaeme'),
(217, 20, '74900', '219920', 'Handzaeme'),
(218, 20, '74990', '219600', 'Handzaeme'),
(219, 20, '75750', '220380', 'Handzaeme'),
(220, 51, '53410', '136460', 'Hardinghen'),
(221, 51, '183700', '93720', 'Harkstead'),
(222, 10, '53860', '241650', 'Harlebeeke'),
(223, 51, '42840', '149100', 'Harlettes'),
(224, 51, '102760', '57710', 'Harrietsham'),
(225, 10, '116040', '72980', 'Harty'),
(226, 50, '180430', '101000', 'Harwich'),
(227, 50, '179590', '100390', 'Harwich'),
(228, 52, '179590', '101770', 'Harwich light'),
(229, 50, '59660', '47200', 'Hastings'),
(230, 50, '60630', '47690', 'Hastings'),
(231, 50, '60260', '48570', 'Hastings'),
(232, 50, '60650', '49600', 'Hastings'),
(233, 50, '60770', '50580', 'Hastings'),
(234, 50, '61340', '51260', 'Hastings'),
(235, 51, '162690', '53320', 'Hatfield Peverel'),
(236, 10, '87680', '91040', 'Hawkinge'),
(237, 51, '43020', '187440', 'Hazebrouck'),
(238, 51, '95020', '53300', 'Headcorn'),
(239, 51, '43250', '139040', 'Henneveux'),
(240, 51, '116200', '88840', 'Herne Bay'),
(241, 10, '44430', '239420', 'Herseaux'),
(242, 10, '37410', '239710', 'Herseaux South'),
(243, 10, '62110', '187840', 'Herzeele'),
(244, 51, '61740', '187640', 'Herzeele'),
(245, 10, '56880', '236220', 'Heule'),
(246, 51, '56700', '236920', 'Heule'),
(247, 10, '50870', '174590', 'Hey'),
(248, 51, '112560', '236540', 'Heyst'),
(249, 51, '185370', '78690', 'Higham'),
(250, 51, '142840', '56550', 'Hockley'),
(251, 20, '73270', '191410', 'Hondschoote'),
(252, 51, '72510', '191040', 'Hondschoote'),
(253, 20, '73410', '191420', 'Hondschoote'),
(254, 51, '72290', '216500', 'Honthulst'),
(255, 10, '54320', '173690', 'Hoog Huys'),
(256, 10, '68670', '237410', 'Hoogte'),
(257, 20, '75530', '193230', 'Houtem'),
(258, 20, '75860', '193200', 'Houtem'),
(259, 20, '75530', '193340', 'Houtem'),
(260, 10, '102840', '227440', 'Houttave'),
(261, 10, '98610', '40520', 'Hunton'),
(262, 51, '82840', '84860', 'Hythe'),
(263, 20, '82760', '224530', 'Ichteghem'),
(264, 20, '82870', '224180', 'Ichteghem'),
(265, 20, '83130', '224230', 'Ichteghem'),
(266, 10, '66980', '239470', 'Ingelmunster'),
(267, 10, '65050', '234830', 'Iseghem'),
(268, 51, '65600', '235210', 'Iseghem'),
(269, 10, '93530', '226100', 'Jabbeke'),
(270, 51, '95120', '226510', 'Jabbeke'),
(271, 51, '169010', '60350', 'Kelvendon'),
(272, 51, '50090', '208330', 'Kemmel'),
(273, 20, '123930', '52950', 'Kingsnorth'),
(274, 51, '88770', '69560', 'Kingsnorth'),
(275, 20, '123830', '52680', 'Kingsnorth'),
(276, 20, '123740', '52400', 'Kingsnorth'),
(277, 20, '124250', '53130', 'Kingsnorth'),
(278, 10, '187900', '101150', 'Kirton'),
(279, 51, '187100', '103260', 'Kirton'),
(280, 51, '113480', '239830', 'Knocke'),
(281, 10, '64490', '240950', 'Kriekhoek'),
(282, 10, '45620', '233560', 'La martiere'),
(283, 10, '84720', '192030', 'La Panne'),
(284, 51, '84990', '191250', 'La Panne'),
(285, 51, '138880', '40470', 'Laindon'),
(286, 10, '62230', '200480', 'Lalovie'),
(287, 51, '57120', '134500', 'Landrethun-le-Nord'),
(288, 51, '64750', '214480', 'Langemarek'),
(289, 51, '150400', '61060', 'Latchingdon'),
(290, 10, '48290', '227980', 'Le Belcamp'),
(291, 10, '42280', '206120', 'Le Creche'),
(292, 10, '54480', '146750', 'Le Fresne'),
(293, 20, '42400', '209680', 'Le Rossignol'),
(294, 20, '42320', '209590', 'Le Rossignol'),
(295, 20, '42000', '209920', 'Le Rossignol'),
(296, 51, '46320', '135870', 'Le Wast'),
(297, 20, '94990', '211510', 'Leffinghe'),
(298, 20, '94750', '211780', 'Leffinghe'),
(299, 10, '79330', '183290', 'Leffrinckhouke'),
(300, 10, '83260', '58310', 'Leigh Green'),
(301, 51, '136790', '55980', 'Leigh-on-Sea'),
(302, 20, '75300', '189290', 'Les Moeres'),
(303, 20, '75360', '189610', 'Les Moeres'),
(304, 20, '74960', '189180', 'Les Moeres'),
(305, 51, '187330', '98710', 'Levington'),
(306, 20, '118510', '74820', 'Leysdown'),
(307, 20, '118680', '75000', 'Leysdown'),
(308, 51, '119690', '74420', 'Leysdown-on-Sea'),
(309, 10, '79460', '229770', 'Lichtervelde'),
(310, 51, '50900', '144660', 'Licques'),
(311, 10, '45610', '226260', 'Linselles'),
(312, 51, '174820', '86000', 'Little Bentley'),
(313, 10, '168540', '91240', 'Little Clacton'),
(314, 51, '164350', '45110', 'Little Waltham'),
(315, 51, '44790', '141240', 'Longueville'),
(316, 51, '64950', '168940', 'Looberghe'),
(317, 51, '74030', '164640', 'Loon'),
(318, 10, '91110', '233340', 'Lophem'),
(319, 51, '92520', '233800', 'Lophem'),
(320, 20, '70800', '73270', 'Lydd'),
(321, 51, '70440', '72680', 'Lydd'),
(322, 20, '70860', '73310', 'Lydd'),
(323, 10, '84240', '80610', 'Lympne'),
(324, 10, '96370', '239540', 'Mael'),
(325, 51, '106360', '46710', 'Maidstone'),
(326, 51, '157290', '58550', 'Maldon'),
(327, 51, '180280', '85430', 'Manningtree'),
(328, 10, '113620', '104440', 'Manston'),
(329, 20, '113600', '104370', 'Manston'),
(330, 51, '68730', '146270', 'Marck'),
(331, 10, '52520', '237000', 'Marcke'),
(332, 10, '94820', '46200', 'Marden'),
(333, 51, '77290', '167230', 'Mardick'),
(334, 50, '117740', '106730', 'Margate'),
(335, 50, '118120', '107350', 'Margate'),
(336, 20, '98210', '211130', 'Mariakerke'),
(337, 20, '98320', '211350', 'Mariakerke'),
(338, 51, '173950', '66680', 'Marks Tey'),
(339, 10, '53840', '127180', 'Marquise'),
(340, 51, '54050', '128360', 'Marquise'),
(341, 10, '101800', '231220', 'Meetkerke'),
(342, 10, '54700', '230130', 'Menin'),
(343, 51, '52090', '229010', 'Menin'),
(344, 51, '69840', '208360', 'Merckem'),
(345, 51, '48770', '213380', 'Messines'),
(346, 10, '70540', '238420', 'Meulbeke'),
(347, 51, '111970', '102040', 'Minster'),
(348, 51, '56870', '232130', 'Moorseele'),
(349, 10, '62500', '225700', 'Moorslede'),
(350, 51, '62660', '224660', 'Moorslede'),
(351, 51, '50960', '161380', 'Moulle'),
(352, 10, '42650', '230450', 'Mouveaux'),
(353, 10, '62030', '230610', 'Nachtegal'),
(354, 51, '184420', '72650', 'Nayland'),
(355, 10, '75070', '75740', 'New Romney'),
(356, 51, '73840', '75230', 'New Romney'),
(357, 51, '89660', '202960', 'Nieuport'),
(358, 10, '138610', '47480', 'North Benfleet'),
(359, 51, '66090', '153630', 'Nouvelle Eglisse'),
(360, 51, '88100', '197440', 'Oost-Dunkerke'),
(361, 10, '91150', '235590', 'Oostcamp'),
(362, 51, '106080', '240740', 'Oostkerke'),
(363, 20, '68020', '222930', 'Oostnieuwkerke'),
(364, 51, '68090', '224870', 'Oostnieuwkerke'),
(365, 20, '68250', '223100', 'Oostnieuwkerke'),
(366, 10, '65420', '242220', 'Oostroosbake'),
(367, 50, '99700', '213380', 'Ostende'),
(368, 50, '100500', '214000', 'Ostende'),
(369, 10, '56010', '184930', 'Oudezeele'),
(370, 51, '41800', '120350', 'Outreau'),
(371, 51, '71950', '152500', 'Oye'),
(372, 10, '72800', '154440', 'Oyeplage'),
(373, 51, '166190', '72880', 'Peldon'),
(374, 20, '39790', '215590', 'Perenchies'),
(375, 20, '40310', '215570', 'Perenchies'),
(376, 20, '40120', '215720', 'Perenchies'),
(377, 20, '39710', '215190', 'Perenchies'),
(378, 10, '76560', '173960', 'Petite Synthe'),
(379, 51, '76420', '171930', 'Petite Synthe'),
(380, 51, '65120', '133790', 'Peuplingues'),
(381, 51, '71540', '201440', 'Pillonchove'),
(382, 51, '66740', '172500', 'Pitga'),
(383, 10, '94900', '61470', 'Pluckley'),
(384, 51, '95380', '62400', 'Pluckley'),
(385, 10, '59800', '200490', 'Poperinghe'),
(386, 51, '58330', '200700', 'Poperinghe'),
(387, 10, '64090', '195210', 'Proven'),
(388, 51, '62110', '195950', 'Proven'),
(389, 51, '152680', '57560', 'Purleigh'),
(390, 10, '44650', '158800', 'Quelmes'),
(391, 10, '43000', '222920', 'Quesnoy'),
(392, 51, '42750', '220390', 'Quesnoy'),
(393, 51, '178740', '96000', 'Ramsey'),
(394, 50, '111910', '108670', 'Ramsgate'),
(395, 50, '112350', '109400', 'Ramsgate'),
(396, 51, '53790', '203980', 'Reninghelst'),
(397, 51, '67940', '187340', 'Rexpoede'),
(398, 10, '139440', '59680', 'Richford'),
(399, 51, '139800', '60950', 'Richford'),
(400, 51, '95380', '106210', 'Ringwould'),
(401, 51, '74410', '42170', 'Robertsbridge'),
(402, 51, '64820', '194050', 'Roesbrugge-Haringe'),
(403, 20, '43930', '209040', 'Romarin'),
(404, 20, '43860', '208900', 'Romarin'),
(405, 51, '40370', '232610', 'Roubaix'),
(406, 50, '68800', '228700', 'Roulers'),
(407, 50, '68800', '229300', 'Roulers'),
(408, 50, '68800', '229800', 'Roulers'),
(409, 51, '93190', '221390', 'Roxem'),
(410, 51, '56830', '174800', 'Rubrouck'),
(411, 10, '68730', '226017', 'Rulers'),
(412, 20, '65890', '230180', 'Rumbeke'),
(413, 20, '65960', '229960', 'Rumbeke'),
(414, 20, '65940', '230520', 'Rumbeke'),
(415, 10, '145760', '47010', 'Runwell'),
(416, 10, '70650', '61930', 'Rye'),
(417, 51, '70250', '60340', 'Rye'),
(418, 51, '67980', '158740', 'Saint-Folquin'),
(419, 20, '78450', '173970', 'Saint-Pol-sur-Mer'),
(420, 51, '77530', '174820', 'Saint-Pol-sur-Mer'),
(421, 20, '78700', '173770', 'Saint-Pol-sur-Mer'),
(422, 20, '78150', '174260', 'Saint-Pol-sur-Mer'),
(423, 20, '78940', '174050', 'Saint-Pol-sur-Mer'),
(424, 20, '78430', '174340', 'Saint-Pol-sur-Mer'),
(425, 51, '62850', '159060', 'Sainte-Marie-Kerque'),
(426, 51, '163630', '68240', 'Salcott'),
(427, 51, '78660', '48329', 'Sandhurst'),
(428, 51, '105370', '103510', 'Sandwich'),
(429, 51, '68160', '132280', 'Sangatte'),
(430, 51, '112840', '96850', 'Sarre'),
(431, 20, '112860', '232170', 'Seeflugstation Flandern I'),
(432, 20, '113260', '232100', 'Seeflugstation Flandern I'),
(433, 20, '100410', '217100', 'Seeflugstation Flandern II'),
(434, 20, '100100', '217330', 'Seeflugstation Flandern II'),
(435, 20, '100370', '217380', 'Seeflugstation Flandern II'),
(436, 51, '42270', '160820', 'Setques'),
(437, 10, '124210', '63760', 'Sheerness'),
(438, 51, '124640', '63410', 'Sheerness'),
(439, 51, '105490', '71460', 'Sheldwich'),
(440, 51, '134710', '65520', 'Shoeburyness'),
(441, 51, '182760', '99720', 'Shotley'),
(442, 10, '182420', '52430', 'Sible Hedingham'),
(443, 51, '96150', '95700', 'Silberswold'),
(444, 51, '114110', '61090', 'Sittingbourne'),
(445, 51, '91230', '209460', 'Slype'),
(446, 51, '88410', '76550', 'Smeeth'),
(447, 10, '94850', '228230', 'Snelleghem'),
(448, 51, '66870', '179360', 'Socx'),
(449, 10, '97910', '79800', 'Sole Street'),
(450, 51, '148700', '54070', 'South Woodham Ferrers'),
(451, 50, '135680', '59700', 'Southend-on-Sea'),
(452, 50, '135610', '60530', 'Southend-on-Sea'),
(453, 51, '149460', '68800', 'Southminster'),
(454, 10, '86600', '225440', 'Sparappelhoek'),
(455, 51, '71210', '173000', 'Spicker'),
(456, 51, '92440', '105560', 'St Margaret''s at Cliffe'),
(457, 51, '92360', '106700', 'St Margarets Bay'),
(458, 51, '164390', '86190', 'St Osyth'),
(459, 10, '60120', '131320', 'St. Ingelvert'),
(460, 20, '45960', '223320', 'St. Marguerite'),
(461, 20, '45650', '223560', 'St. Marguerite'),
(462, 20, '46260', '223240', 'St. Marguerite'),
(463, 10, '50280', '185390', 'St. Marie Cappel'),
(464, 20, '44150', '166390', 'St. Omer'),
(465, 50, '46600', '167940', 'St. Omer'),
(466, 20, '44210', '166460', 'St. Omer'),
(467, 51, '71430', '221590', 'Staden'),
(468, 10, '100710', '224900', 'Stalhille'),
(469, 51, '133380', '40470', 'Stanford-le-Hope'),
(470, 51, '53230', '190670', 'Steenvoorde'),
(471, 10, '40500', '203720', 'Steenwerck'),
(472, 51, '41500', '203510', 'Steenwerck'),
(473, 51, '152910', '67060', 'Steeple'),
(474, 20, '97960', '214070', 'Stene'),
(475, 20, '97810', '214210', 'Stene'),
(476, 20, '97960', '214070', 'Stene'),
(477, 51, '150100', '42350', 'Stock'),
(478, 10, '150880', '55030', 'Stow Maries'),
(479, 51, '183350', '79670', 'Stratford St Mary'),
(480, 51, '119980', '44800', 'Strood'),
(481, 51, '108810', '88280', 'Sturry'),
(482, 10, '92460', '93740', 'Swingfield'),
(483, 51, '83840', '57810', 'Tenterden'),
(484, 51, '165790', '51410', 'Terling'),
(485, 10, '76470', '181400', 'Teteghem'),
(486, 52, '44650', '120210', 'the Boulogne jetty light'),
(487, 52, '71380', '138610', 'the Calais jetty light'),
(488, 52, '65860', '77000', 'the Dungeness light'),
(489, 52, '80800', '174770', 'the Dunkerque jetty light'),
(490, 52, '83600', '93600', 'the Folkestone pier light'),
(491, 52, '59080', '48950', 'the Hastings light'),
(492, 52, '116540', '111020', 'the North Foreland light'),
(493, 52, '101700', '213780', 'the Ostende pier light'),
(494, 52, '111100', '109470', 'the Ramsgate west pier light'),
(495, 51, '77240', '59460', 'The Stocks'),
(496, 52, '114190', '233540', 'the Zeebrugge breakwater light'),
(497, 10, '77120', '241320', 'Thielt'),
(498, 51, '171000', '92420', 'Thorpe-le-Sok'),
(499, 51, '82100', '227290', 'Thourcut'),
(500, 10, '102200', '69280', 'Throwley'),
(501, 51, '153840', '72590', 'Tillingham'),
(502, 51, '49330', '166180', 'Tilques'),
(503, 51, '165940', '63480', 'Tiptree'),
(504, 51, '158800', '70630', 'Tollesbury'),
(505, 51, '161910', '67170', 'Tolleshunt D''Arcy'),
(506, 51, '43750', '231270', 'Tourcoing'),
(507, 51, '185910', '102340', 'Trimley St Martin'),
(508, 20, '108260', '228580', 'Utykerke'),
(509, 20, '108280', '228430', 'Utykerke'),
(510, 10, '97310', '231400', 'Varsenaire'),
(511, 51, '86340', '230830', 'Veldeghem'),
(512, 51, '44640', '153910', 'Vest Beaucourt'),
(513, 20, '103860', '222920', 'Vilsseghem'),
(514, 20, '103480', '222770', 'Vilsseghem'),
(515, 20, '103560', '222850', 'Vilsseghem'),
(516, 51, '178660', '64630', 'Wakes Colne'),
(517, 10, '96570', '107590', 'Walmer'),
(518, 51, '97340', '80590', 'Waltham'),
(519, 51, '169680', '99220', 'Walton-on-the-Naze'),
(520, 51, '183810', '104220', 'Walwon'),
(521, 10, '39680', '225070', 'Wambrechies'),
(522, 51, '171200', '89020', 'Weeley'),
(523, 51, '107730', '225340', 'Wenduyne'),
(524, 51, '50290', '223010', 'Wervicq'),
(525, 10, '50890', '224480', 'Wervicq'),
(526, 10, '65520', '185740', 'West Cappelle'),
(527, 51, '162160', '74360', 'West Mersea'),
(528, 10, '117190', '102830', 'Westgate-on-Sea'),
(529, 51, '117160', '103690', 'Westgate-on-Sea'),
(530, 10, '54240', '233500', 'Wevelghem'),
(531, 51, '169250', '53080', 'White Notley'),
(532, 51, '115050', '81790', 'Whitstable'),
(533, 51, '144160', '47270', 'Wickford'),
(534, 10, '156840', '42960', 'Widford'),
(535, 51, '94910', '208930', 'Wilskerke'),
(536, 51, '48260', '123840', 'Wimille'),
(537, 51, '67320', '58580', 'Winchelsea'),
(538, 51, '105410', '94880', 'Wingham'),
(539, 51, '61350', '126050', 'Wissant'),
(540, 51, '165150', '56330', 'Witham'),
(541, 10, '78160', '57750', 'Wittersham'),
(542, 51, '171330', '78280', 'Wivenhoe'),
(543, 51, '177310', '92010', 'Wix'),
(544, 51, '83410', '63780', 'Woodchurch'),
(545, 51, '61400', '182630', 'Wormhout'),
(546, 10, '180530', '67620', 'Wormingford'),
(547, 10, '157730', '42060', 'Writtle'),
(548, 20, '96570', '73810', 'Wye'),
(549, 20, '96700', '73870', 'Wye'),
(550, 20, '96830', '73970', 'Wye'),
(551, 10, '81750', '238410', 'Wynghene'),
(552, 50, '58000', '212000', 'Ypres'),
(553, 10, '88260', '214360', 'Zande'),
(554, 51, '76680', '217440', 'Zarren'),
(555, 50, '111640', '234380', 'Zeebrugge'),
(556, 50, '111740', '233000', 'Zeebrugge'),
(557, 50, '111300', '232140', 'Zeebrugge'),
(558, 51, '62010', '176890', 'Zegers-Cappel'),
(559, 51, '60220', '218390', 'Zennebeke'),
(560, 51, '81290', '184330', 'Zuydcoote'),
(561, 20, '80810', '183610', 'Zuydcoote'),
(562, 10, '104610', '228520', 'Zuyenkerke'),
(563, 10, '82130', '187050', 'Zuylcoote');

-- --------------------------------------------------------

--
-- Table structure for table `rof_coalitions`
--

DROP TABLE IF EXISTS `rof_coalitions`;
CREATE TABLE IF NOT EXISTS `rof_coalitions` (
  `CoalID` int(11) NOT NULL,
  `Coalitionname` varchar(30) NOT NULL,
  PRIMARY KEY (`CoalID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rof_coalitions`
--

INSERT INTO `rof_coalitions` (`CoalID`, `Coalitionname`) VALUES
(0, 'Neutral'),
(1, 'Entente'),
(2, 'Central Powers'),
(3, 'War Dogs'),
(4, 'Mercenaries'),
(5, 'Knights'),
(6, 'Corsairs'),
(7, 'Future');

-- --------------------------------------------------------

--
-- Table structure for table `rof_countries`
--

DROP TABLE IF EXISTS `rof_countries`;
CREATE TABLE IF NOT EXISTS `rof_countries` (
  `id` tinyint(1) NOT NULL,
  `ckey` smallint(1) NOT NULL,
  `countryname` varchar(30) NOT NULL,
  `countryadj` varchar(30) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `countryname` (`countryname`),
  UNIQUE KEY `countryadj` (`countryadj`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rof_countries`
--

INSERT INTO `rof_countries` (`id`, `ckey`, `countryname`, `countryadj`) VALUES
(1, 0, 'Neutral', 'neutral'),
(2, 101, 'France', 'French'),
(3, 102, 'Great Britain', 'British'),
(4, 103, 'USA', 'American'),
(5, 104, 'Italy', 'Italian'),
(6, 105, 'Russia', 'Russian'),
(7, 501, 'Germany', 'German'),
(8, 502, 'Austro-Hungary', 'Austro-Hungarian'),
(9, 600, 'Future Country', 'Future'),
(10, 610, 'War Dogs Country', 'War Dogs'),
(11, 620, 'Mercenaries Country', 'Mercenaries'),
(12, 630, 'Knights Country', 'Knights'),
(13, 640, 'Corsairs Country', 'Corsairs');

-- --------------------------------------------------------

--
-- Table structure for table `rof_gunner_scores`
--

DROP TABLE IF EXISTS `rof_gunner_scores`;
CREATE TABLE IF NOT EXISTS `rof_gunner_scores` (
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `MissionID` varchar(50) NOT NULL,
  `GunnerName` varchar(40) NOT NULL,
  `mgid` smallint(1) NOT NULL,
  `GunningFor` varchar(40) NOT NULL,
  `GunnerFate` tinyint(1) NOT NULL,
  `GunnerHealth` tinyint(1) NOT NULL,
  `GunnerNegScore` int(1) NOT NULL,
  `GunnerPosScore` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `rof_object_properties`
--

DROP TABLE IF EXISTS `rof_object_properties`;
CREATE TABLE IF NOT EXISTS `rof_object_properties` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `object_type` varchar(128) NOT NULL,
  `object_class` varchar(8) NOT NULL,
  `object_value` smallint(6) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `object_type` (`object_type`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=235 ;

--
-- Dumping data for table `rof_object_properties`
--

INSERT INTO `rof_object_properties` (`id`, `object_type`, `object_class`, `object_value`) VALUES
(1, '13PdrAAA', 'AAA', 80),
(2, '13PrdaaaAttached', 'AAA', 80),
(3, '45QF', 'ART', 100),
(4, '75FG1897', 'ART', 100),
(5, '77mmAAA', 'AAA', 80),
(6, '77mmAAAAttached', 'AAA', 80),
(7, 'A7V', 'T', 100),
(8, 'AeType', 'BAL', 50),
(9, 'Airco D.H.2', 'PFI', 100),
(10, 'Airco D.H.4', 'PRE', 200),
(11, 'Albatros D.II', 'PFI', 199),
(12, 'Albatros D.II lt', 'PFI', 100),
(13, 'Albatros D.Va', 'PFI', 100),
(14, 'Albatros D.III', 'PFI', 100),
(15, 'Benz Searchlight', 'VTR', 50),
(16, 'benz_open', 'VTR', 50),
(17, 'benz_p', 'VTR', 50),
(18, 'benz_soft', 'VTR', 50),
(19, 'BotBoatSwain', 'BOT', 0),
(20, 'BotGunner', 'BOT', 0),
(21, 'BotGunnerBacker', 'BOT', 0),
(22, 'BotGunnerBreguet14', 'BOT', 0),
(23, 'BotGunnerBreguet14_1', 'BOT', 0),
(24, 'BotGunnerBW12', 'BOT', 0),
(25, 'BotGunnerDavis', 'BOT', 0),
(26, 'BotGunnerFe2_sing', 'BOT', 0),
(27, 'BotGunnerFelix_top-twin', 'BOT', 0),
(28, 'BotGunnerG5_1', 'BOT', 0),
(29, 'BotGunnerG5_2', 'BOT', 0),
(30, 'BotGunnerHCL2', 'BOT', 0),
(31, 'BotGunnerHP400_1', 'BOT', 0),
(32, 'BotGunnerHP400_2', 'BOT', 0),
(33, 'BotGunnerHP400_2_WM', 'BOT', 0),
(34, 'BotGunnerHP400_3', 'BOT', 0),
(35, 'BotGunnerRE8', 'BOT', 0),
(36, 'Brandenburg W12', 'PSE', 200),
(37, 'Breguet 14.B2', 'PRE', 200),
(38, 'bridge_hw110', 'INF', 0),
(39, 'bridge_hw130', 'INF', 0),
(40, 'bridge_hw150', 'INF', 0),
(41, 'bridge_hw170', 'INF', 0),
(42, 'bridge_hw190', 'INF', 0),
(43, 'bridge_hw40', 'INF', 0),
(44, 'bridge_hw70', 'INF', 0),
(45, 'bridge_hw90', 'INF', 0),
(46, 'bridge_rr110', 'INF', 0),
(47, 'bridge_rr130', 'INF', 0),
(48, 'bridge_rr150', 'INF', 0),
(49, 'bridge_rr170', 'INF', 0),
(50, 'bridge_rr190', 'INF', 0),
(51, 'bridge_rr70', 'INF', 0),
(52, 'bridge_rr90', 'INF', 0),
(53, 'Bristol F2B (F.II)', 'PRE', 200),
(54, 'Bristol F2B (F.III)', 'PRE', 200),
(55, 'British naval 4in AAA gun', 'NAA', 80),
(56, 'British naval 4in gun', 'NAR', 0),
(57, 'British navel 6in gun', 'NAR', 0),
(58, 'Ca1', 'T', 100),
(59, 'Caquot', 'BAL', 50),
(60, 'Cargo Ship', 'STR', 300),
(61, 'Common Bot', 'BOT', 0),
(62, 'Crossley', 'VTR', 50),
(63, 'DaimlerAAA', 'VAA', 80),
(64, 'DaimlerMarienfelde', 'VTR', 50),
(65, 'DaimlerMarienfelde_S', 'VTR', 50),
(66, 'DFW C.V', 'PRE', 200),
(67, 'Drachen', 'BAL', 50),
(68, 'F.E.2b', 'PRE', 200),
(69, 'F17M', 'T', 100),
(70, 'factory_01', 'INF', 0),
(71, 'factory_02', 'INF', 0),
(72, 'factory_03', 'INF', 0),
(73, 'factory_04', 'INF', 0),
(74, 'factory_05', 'INF', 0),
(75, 'factory_06', 'INF', 0),
(76, 'factory_07', 'INF', 0),
(77, 'factory_08', 'INF', 0),
(78, 'Felixstowe F2A', 'PSE', 200),
(79, 'FK96', 'ART', 100),
(80, 'Flag', 'FLG', 0),
(81, 'Fokker D.VII', 'PFI', 100),
(82, 'Fokker D.VIIF', 'PFI', 100),
(83, 'Fokker D.VIII', 'PFI', 100),
(84, 'Fokker Dr.I', 'PFI', 100),
(85, 'Fokker E.III', 'PFI', 100),
(86, 'FrpenicheAAA', 'SAA', 80),
(87, 'fr_lrg', 'INF', 0),
(88, 'fr_med', 'INF', 0),
(89, 'FT17C', 'T', 100),
(90, 'G8', 'RLO', 50),
(91, 'GER light cruiser', 'SCR', 1000),
(92, 'GER submarine', 'SSU', 500),
(93, 'GERpenicheAAA', 'SAA', 80),
(94, 'ger_lrg', 'INF', 0),
(95, 'ger_med', 'INF', 0),
(96, 'Gotha G.V', 'PBO', 200),
(97, 'gunpos01', 'INF', 0),
(98, 'gunpos_g01', 'INF', 0),
(99, 'Halberstadt CL.II', 'PRE', 200),
(100, 'Halberstadt CL.II 200hp', 'PRE', 200),
(101, 'Halberstadt D.II', 'PFI', 100),
(102, 'Handley Page 0-400', 'PBO', 200),
(103, 'HMS light cruiser', 'SCR', 1000),
(104, 'HMS submarine', 'SSU', 500),
(105, 'Hotchkiss', 'IMG', 50),
(106, 'HotchkissAAA', 'IMA', 80),
(107, 'Leyland', 'VTR', 50),
(108, 'LeylandS', 'VTR', 50),
(109, 'LMG08AAA', 'IMA', 80),
(110, 'LMGO8', 'IMG', 50),
(111, 'M-Flak', 'IMA', 80),
(112, 'm13', 'ART', 100),
(113, 'Merc22', 'VTR', 50),
(114, 'Mk4F', 'T', 100),
(115, 'Mk4FGER', 'T', 100),
(116, 'Mk4M', 'T', 100),
(117, 'MK4MGER', 'T', 100),
(118, 'Mk5F', 'T', 100),
(119, 'Mk5M', 'T', 100),
(120, 'Nieuport 11.C1', 'PFI', 100),
(121, 'Nieuport 17.C1', 'PFI', 100),
(122, 'Nieuport 17.C1 GBR', 'PFI', 100),
(123, 'Nieuport 28.C1', 'PFI', 100),
(124, 'Parseval', 'BAL', 50),
(125, 'Passenger Ship', 'SPA', 300),
(126, 'Pfalz D.IIIa', 'PFI', 100),
(127, 'Pfalz D.XII', 'PFI', 100),
(128, 'pillbox01', 'INF', 0),
(129, 'pillbox02', 'INF', 0),
(130, 'pillbox03', 'INF', 0),
(131, 'pillbox04', 'INF', 0),
(132, 'Portal', 'INF', 0),
(133, 'Quad', 'VTR', 50),
(134, 'Quad Searchlight', 'VTR', 50),
(135, 'QuadA', 'VTR', -50),
(136, 'railwaystation_1', 'INF', 0),
(137, 'railwaystation_2', 'INF', 0),
(138, 'railwaystation_3', 'INF', 0),
(139, 'railwaystation_4', 'INF', 0),
(140, 'railwaystation_5', 'INF', 0),
(141, 'river_airbase', 'INF', 0),
(142, 'river_airbase2', 'INF', 0),
(143, 'river_airbase3', 'INF', 0),
(144, 'Roucourt', 'INF', 0),
(145, 'rwstation', 'INF', 0),
(146, 'S.E.5a', 'PFI', 100),
(147, 'ship_stat_cargo', 'STR', 150),
(148, 'ship_stat_pass', 'SPA', 150),
(149, 'ship_stat_tank', 'STR', 150),
(150, 'Sopwith Triplane', 'PFI', 100),
(151, 'Sopwith Camel', 'PFI', 100),
(152, 'Sopwith Dolphin', 'PFI', 100),
(153, 'SPAD 13.C1', 'PFI', 100),
(154, 'SPAD 7.C1 150hp', 'PFI', 100),
(155, 'SPAD 7.C1 180hp', 'PFI', 100),
(156, 'StChamond', 'T', 100),
(157, 'Tanker Ship', 'STR', 300),
(158, 'tent01', 'INF', 1000),
(159, 'tent02', 'INF', 0),
(160, 'tent03', 'INF', 0),
(161, 'tent_camp01', 'INF', 0),
(162, 'tent_camp02', 'INF', 0),
(163, 'tent_camp03', 'INF', 0),
(164, 'tent_camp04', 'INF', 0),
(165, 'thornycroftaaa', 'VAA', 80),
(166, 'TurretBreguet14_1', 'TUR', 0),
(167, 'TurretBristolF2BF2_1_WM2', 'TUR', 0),
(168, 'TurretBristolF2BF3_1_WM2', 'TUR', 0),
(169, 'TurretBW12_1', 'TUR', 0),
(170, 'TurretBW12_1_WM_Becker_AP', 'TUR', 0),
(171, 'TurretBW12_1_WM_Becker_HE', 'TUR', 0),
(172, 'TurretBW12_1_WM_Becker_HEAP', 'TUR', 0),
(173, 'TurretBW12_1_WM_Twin_Parabellum', 'TUR', 0),
(174, 'TurretDFWC_1', 'TUR', 0),
(175, 'TurretDFWC_1_WM_Becker_AP', 'TUR', 0),
(176, 'TurretDFWC_1_WM_Becker_HE', 'TUR', 0),
(177, 'TurretDFWC_1_WM_Becker_HEAP', 'TUR', 0),
(178, 'TurretDFWC_1_WM_Twin_Parabellum', 'TUR', 0),
(179, 'TurretDH4_1', 'TUR', 0),
(180, 'TurretDH4_1_WM', 'TUR', 0),
(181, 'TurretFe2b_1', 'TUR', 0),
(182, 'TurretFe2b_1_WM', 'TUR', 0),
(183, 'TurretFelixF2A_2', 'TUR', 0),
(184, 'TurretFelixF2A_3', 'TUR', 0),
(185, 'TurretFelixF2A_3_WM', 'TUR', 0),
(186, 'TurretGothaG5_1', 'TUR', 0),
(187, 'TurretGothaG5_1_WM_Becker_AP', 'TUR', 0),
(188, 'TurretGothaG5_1_WM_Becker_HE', 'TUR', 0),
(189, 'TurretGothaG5_1_WM_Becker_HEAP', 'TUR', 0),
(190, 'TurretGothaG5_2', 'TUR', 0),
(191, 'TurretGothaG5_2_WM_Twin_Parabellum', 'TUR', 0),
(192, 'TurretHalberstadtCL2au_1', 'TUR', 0),
(193, 'TurretHalberstadtCL2au_1_WM_TwinPar', 'TUR', 0),
(194, 'TurretHalberstadtCL2_1', 'TUR', 0),
(195, 'TurretHalberstadtCL2_1_WM_TwinPar', 'TUR', 0),
(196, 'TurretHP400_1', 'TUR', 0),
(197, 'TurretHP400_1_WM', 'TUR', 0),
(198, 'TurretHP400_2', 'TUR', 0),
(199, 'TurretHP400_2_WM', 'TUR', 0),
(200, 'TurretHP400_3', 'TUR', 0),
(201, 'TurretRE8_1', 'TUR', 0),
(202, 'TurretRE8_1_WM', 'TUR', 0),
(203, 'TurretRolandC2a_1_WM_Twin_Par', 'TUR', 0),
(204, 'Wagon_BoxB', 'RWA', 25),
(205, 'Wagon_BoxNB', 'RWA', 25),
(206, 'Wagon_G8T', 'RWA', 25),
(207, 'Wagon_GondolaB', 'RWA', 25),
(208, 'Wagon_GondolaNB', 'RWA', 25),
(209, 'Wagon_Pass', 'RWA', 25),
(210, 'Wagon_PassA', 'RWA', -25),
(211, 'Wagon_PassAC', 'RWA', 25),
(212, 'Wagon_PassC', 'RWA', 25),
(213, 'Wagon_PlatformA7V', 'RWA', 25),
(214, 'Wagon_PlatformB', 'RWA', 25),
(215, 'Wagon_PlatformEmptyB', 'RWA', 25),
(216, 'Wagon_PlatformEmptyNB', 'RWA', 25),
(217, 'Wagon_PlatformMk4', 'RWA', 25),
(218, 'Wagon_PlatformNB', 'RWA', 25),
(219, 'Wagon_TankB', 'RWA', 25),
(220, 'Wagon_TankNB', 'RWA', 25),
(221, 'Whippet', 'T', 100),
(222, 'Windsock', 'FLG', 0),
(223, 'Sopwith Pup', 'PFI', 100),
(224, 'German naval 105mm gun', 'NAR', 0),
(226, 'Roland C.IIa', 'PRE', 200),
(227, 'German naval 52mm gun', 'NAR', 0),
(228, 'GER Ship Searchlight', 'LGT', 50),
(229, 'GBR Searchlight', 'LGT', 50),
(230, 'HMS Ship Searchlight', 'LGT', 50),
(231, 'churchE_01', 'INF', 0),
(232, 'CappyChateau', 'INF', 0),
(233, 'British naval 12pdr gun', 'NAR', 0),
(234, 'R.E.8', 'PRE', 200);

-- --------------------------------------------------------

--
-- Table structure for table `rof_object_roles`
--

DROP TABLE IF EXISTS `rof_object_roles`;
CREATE TABLE IF NOT EXISTS `rof_object_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_class` varchar(10) DEFAULT NULL,
  `role_description` varchar(23) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `rof_object_roles`
--

INSERT INTO `rof_object_roles` (`id`, `unit_class`, `role_description`) VALUES
(1, 'ART', 'Artillery'),
(2, 'AAA', 'Artillery:Anti-Aircraft'),
(3, 'BOT', 'Bot'),
(4, 'IMA', 'Infantry: MG AA'),
(5, 'IMG', 'Infantry:Machine Gun'),
(6, 'INF', 'Infrastructure'),
(7, 'NAA', 'Naval:Anti-Aircraft'),
(8, 'NAR', 'Naval:Artillery'),
(9, 'PBO', 'Plane:Bomber'),
(10, 'PFI', 'Plane:Fighter'),
(11, 'PFB', 'Plane:Fighter-Bomber'),
(12, 'PRE', 'Plane:Reconnaissance'),
(13, 'PSE', 'Plane:Seaplane'),
(14, 'PTR', 'Plane:Transport'),
(15, 'RAA', 'Rail:Anti-Aircraft'),
(16, 'RCV', 'Rail:Civil Train'),
(17, 'RLO', 'Rail:Locomotive'),
(18, 'RWA', 'Rail:Wagon'),
(19, 'VRI', 'Regular Infantry'),
(20, 'SAA', 'Ship:Anti-Aircraft'),
(21, 'SBA', 'Ship:Battleship'),
(22, 'SCR', 'Ship:Cruiser'),
(23, 'SDE', 'Ship:Destroyer'),
(24, 'SPB', 'Ship:Patrol Boat'),
(25, 'SSU', 'Ship:Submarine'),
(26, 'TAA', 'Tank:Anti-Aircraft'),
(27, 'TSP', 'Tank:Self-Propelled Gun'),
(28, 'T', 'Tank:Standard'),
(29, 'TTD', 'Tank:Tank Destroyer'),
(30, 'TUR', 'Turret'),
(31, 'VAA', 'Vehicle:Anti-Aircraft'),
(32, 'VMI', 'Vehicle:Mech. Infantry'),
(33, 'VTR', 'Vehicle:Transport');

-- --------------------------------------------------------

--
-- Table structure for table `rof_pilot_scores`
--

DROP TABLE IF EXISTS `rof_pilot_scores`;
CREATE TABLE IF NOT EXISTS `rof_pilot_scores` (
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `MissionID` varchar(50) NOT NULL,
  `PilotName` varchar(40) NOT NULL,
  `mpid` smallint(1) NOT NULL,
  `PilotFate` tinyint(1) NOT NULL,
  `PilotHealth` tinyint(1) NOT NULL,
  `PilotNegScore` int(1) NOT NULL,
  `PilotPosScore` int(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `test_airfields`
--

DROP TABLE IF EXISTS `test_airfields`;
CREATE TABLE IF NOT EXISTS `test_airfields` (
  `name` varchar(45) NOT NULL,
  `coalition` int(1) NOT NULL,
  `model` varchar(45) NOT NULL,
  `number` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`name`,`coalition`,`model`,`number`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_airfields`
--

INSERT INTO `test_airfields` (`name`, `coalition`, `model`, `number`) VALUES
('Coxyde', 1, 'felixf2a.mgm', 8),
('Coxyde', 1, 'gothag5', 8),
('Dunkerque', 1, 'albatrosd5.mgm', 6),
('Harlebeeke', 1, 'gothag5', 20),
('Leffinghe', 2, 'felixf2a.mgm', 10),
('St. Marie Cappel', 1, 'albatrosd5.mgm', 2),
('Zeebrugge', 2, 'felixf2a.mgm', 15);

-- --------------------------------------------------------

--
-- Table structure for table `test_models`
--

DROP TABLE IF EXISTS `test_models`;
CREATE TABLE IF NOT EXISTS `test_models` (
  `model` varchar(45) NOT NULL,
  PRIMARY KEY (`model`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `test_models`
--

INSERT INTO `test_models` (`model`) VALUES
('albatrosd5.mgm'),
('brequet14'),
('dfc5'),
('felixf2a.mgm'),
('fokkerd7'),
('gothag5');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
