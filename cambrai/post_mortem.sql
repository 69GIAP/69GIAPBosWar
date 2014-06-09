-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2014 at 05:20 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cambrai`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_mortem`
--

DROP TABLE IF EXISTS `post_mortem`;
CREATE TABLE IF NOT EXISTS `post_mortem` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `Name` char(31) DEFAULT NULL,
  `Model` char(20) DEFAULT NULL,
  `coalition` int(1) DEFAULT '1',
  `country` int(3) DEFAULT '0',
  `mission_no` int(2) DEFAULT '0',
  `damage` int(1) DEFAULT '0',
  `processed` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=217 ;

--
-- Dumping data for table `post_mortem`
--

INSERT INTO `post_mortem` (`id`, `Name`, `Model`, `coalition`, `country`, `mission_no`, `damage`, `processed`) VALUES
(61, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(62, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(63, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(64, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(65, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(66, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(67, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(68, 'Bat 1 Co 1 Pl 6', 'mk4f', 1, 102, 1, 9, 0),
(69, 'noname', 'sopstr', 1, 102, 1, 9, 0),
(70, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 1, 9, 0),
(71, 'noname', 'sopcamel', 1, 102, 1, 9, 0),
(72, 'noname', 'sopstr', 1, 102, 1, 9, 0),
(73, 'Bat 1 Co 1 Pl 5', 'g8', 1, 102, 1, 9, 0),
(74, 'Wagon', 'pass', 1, 102, 1, 9, 0),
(75, 'Wagon', 'pass', 1, 102, 1, 9, 0),
(76, 'Wagon', 'pass', 1, 102, 1, 9, 0),
(77, 'Wagon', 'tankb', 1, 102, 1, 9, 0),
(78, 'Wagon', 'tankb', 1, 102, 1, 9, 0),
(79, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 1, 9, 0),
(80, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 1, 9, 0),
(81, 'noname', 'sopstr', 1, 102, 1, 9, 0),
(82, 'Bat 1 Co 2 Pl 8', 'mk4f', 1, 102, 1, 9, 0),
(83, 'Bat 1 Co 2 Pl 8', 'mk4f', 1, 102, 1, 9, 0),
(84, 'Bat 1 Co 2 Pl 8', 'mk4f', 1, 102, 1, 9, 0),
(85, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 1, 9, 0),
(86, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 1, 9, 0),
(87, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 1, 9, 0),
(88, 'Central artillery 5', 'fk96', 2, 501, 1, 9, 0),
(89, 'Central artillery 5', 'fk96', 2, 501, 1, 9, 0),
(90, 'Central artillery 5', 'fk96', 2, 501, 1, 9, 0),
(91, 'noname', 'dfwc5', 2, 501, 1, 9, 0),
(92, 'Central artillery 5', 'fk96', 2, 501, 1, 9, 0),
(93, 'Central artillery 5', 'fk96', 2, 501, 1, 9, 0),
(94, 'Central artillery 5', 'fk96', 2, 501, 1, 9, 0),
(95, 'Central artillery 1b', 'daimlermarienfelde_s', 2, 501, 1, 9, 0),
(96, 'Central artillery 1b', 'daimlermarienfelde_s', 2, 501, 1, 9, 0),
(97, 'Central Heavy Artillery 1', 'm13', 2, 501, 1, 9, 0),
(98, 'Central artillery 1b', 'daimlermarienfelde_s', 2, 501, 1, 9, 0),
(99, 'Central artillery 1', 'fk96', 2, 501, 1, 9, 0),
(100, 'Central artillery 1', 'fk96', 2, 501, 1, 9, 0),
(101, 'Central artillery 1b', 'daimlermarienfelde_s', 2, 501, 1, 9, 0),
(102, 'Central artillery 1', 'fk96', 2, 501, 1, 9, 0),
(103, 'noname', 'fokkerdr1', 2, 501, 1, 9, 0),
(104, 'noname', 'dfwc5', 2, 501, 1, 9, 0),
(105, 'Central artillery 3', 'fk96', 2, 501, 1, 9, 0),
(106, 'Central artillery 2', 'fk96', 2, 501, 1, 9, 0),
(107, 'Central artillery 2', 'benz_open', 2, 501, 1, 9, 0),
(108, 'Central artillery 2', 'fk96', 2, 501, 1, 9, 0),
(109, 'noname', 'pfalzd3a', 2, 501, 1, 9, 0),
(110, 'noname', 'pfalzd3a', 2, 501, 1, 9, 0),
(111, 'noname', 'dfwc5', 2, 501, 1, 9, 0),
(112, 'Armored trucks', 'benz_open', 2, 501, 1, 9, 0),
(113, 'Armored trucks', 'daimleraaa', 2, 501, 1, 9, 0),
(114, 'Armored trucks', 'benz_p', 2, 501, 1, 9, 0),
(115, 'Central Heavy Artillery 1', 'm13', 2, 501, 1, 9, 0),
(116, 'Armored trucks', 'benz_open', 2, 501, 1, 9, 0),
(117, 'noname', 'fokkerdr1', 2, 501, 1, 9, 0),
(118, 'noname', 'dfwc5', 2, 501, 1, 9, 0),
(119, 'noname', 'pfalzd3a', 2, 501, 1, 9, 0),
(120, 'noname', 'dfwc5', 2, 501, 1, 9, 0),
(121, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 2, 9, 0),
(122, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 2, 9, 0),
(123, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 2, 9, 0),
(124, 'Bat 1 Co 1 Pl 4', 'mk4m', 1, 102, 2, 9, 0),
(125, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 2, 9, 0),
(126, 'Bat 1 Co 1 Pl 4', 'mk4m', 1, 102, 2, 9, 0),
(127, 'Bat 1 Co 3 Pl 2', 'mk4f', 1, 102, 2, 9, 0),
(128, 'Bat 1 Co 1 Pl 6', 'mk4f', 1, 102, 2, 9, 0),
(129, 'Bat 1 Co 3 Pl 2', 'mk4f', 1, 102, 2, 9, 0),
(130, 'Bat 1 Co 1 Pl 4', 'mk4m', 1, 102, 2, 9, 0),
(131, 'Bat 1 Co 1 Pl 6', 'mk4f', 1, 102, 2, 9, 0),
(132, 'Bat 1 Co 3 Pl 2', 'mk4f', 1, 102, 2, 9, 0),
(133, 'Bat 1 Co 3 Pl 2', 'mk4f', 1, 102, 2, 9, 0),
(134, 'Bat 1 Co 2 Pl 8', 'mk4f', 1, 102, 2, 9, 0),
(135, 'Bat 1 Co 2 Pl 8', 'mk4f', 1, 102, 2, 9, 0),
(136, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 2, 9, 0),
(137, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 2, 9, 0),
(138, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 2, 9, 0),
(139, 'Bat 1 Co 2 Pl 5', 'mk4m', 1, 102, 2, 9, 0),
(140, 'Bat 1 Co 2 Pl 5', 'mk4m', 1, 102, 2, 9, 0),
(141, 'Bat 1 Co 2 Pl 5', 'mk4m', 1, 102, 2, 9, 0),
(142, 'Bat 1 Co 2 Pl 5', 'mk4m', 1, 102, 2, 9, 0),
(143, 'Bat 1 Co 2 Pl 5', 'mk4m', 1, 102, 2, 9, 0),
(144, 'Bat 1 Co 2 Pl 4', 'mk4f', 1, 102, 2, 9, 0),
(145, 'Bat 1 Co 2 Pl 4', 'mk4f', 1, 102, 2, 9, 0),
(146, 'Bat 1 Co 2 Pl 4', 'mk4f', 1, 102, 2, 9, 0),
(147, 'Bat 1 Co 2 Pl 4', 'mk4f', 1, 102, 2, 9, 0),
(148, 'Bat 1 Co 2 Pl 4', 'mk4f', 1, 102, 2, 9, 0),
(149, 'Bat 1 Co 2 Pl 4', 'mk4f', 1, 102, 2, 9, 0),
(150, 'noname', 'sopstr', 1, 102, 2, 9, 0),
(151, 'Bat 1 Co 2 Pl 4', 'mk4f', 1, 102, 2, 9, 0),
(152, 'Bat 1 Co 2 Pl 4', 'mk4f', 1, 102, 2, 9, 0),
(153, 'Bat 1 Co 2 Pl 4', 'mk4f', 1, 102, 2, 9, 0),
(154, 'Bat 1 Co 2 Pl 4', 'mk4f', 1, 102, 2, 9, 0),
(155, 'Bat 1 Co 2 Pl 3', 'mk4f', 1, 102, 2, 9, 0),
(156, 'Bat 1 Co 2 Pl 3', 'mk4f', 1, 102, 2, 9, 0),
(157, 'Bat 1 Co 2 Pl 3', 'mk4f', 1, 102, 2, 9, 0),
(158, 'Bat 1 Co 2 Pl 3', 'mk4f', 1, 102, 2, 9, 0),
(159, 'Bat 1 Co 2 Pl 3', 'mk4f', 1, 102, 2, 9, 0),
(160, 'Bat 1 Co 2 Pl 3', 'mk4f', 1, 102, 2, 9, 0),
(161, 'Bat 1 Co 2 Pl 3', 'mk4f', 1, 102, 2, 9, 0),
(162, 'Bat 1 Co 2 Pl 3', 'mk4f', 1, 102, 2, 9, 0),
(163, 'Bat 1 Co 2 Pl 3', 'mk4f', 1, 102, 2, 9, 0),
(164, 'Bat 1 Co 2 Pl 3', 'mk4f', 1, 102, 2, 9, 0),
(165, 'noname', 'sopstr', 1, 102, 2, 9, 0),
(166, 'noname', 'dfwc5', 2, 501, 2, 9, 0),
(167, 'Armored trucks', 'benz_soft', 2, 501, 2, 9, 0),
(168, 'Central Heavy Artillery 1', 'm13', 2, 501, 2, 9, 0),
(169, 'Armored trucks', 'daimlermarienfelde_s', 2, 501, 2, 9, 0),
(170, 'Central Heavy Artillery 1', 'm13', 2, 501, 2, 9, 0),
(171, 'Armored trucks', 'daimlermarienfelde_s', 2, 501, 2, 9, 0),
(172, 'Central Heavy Artillery 1', 'm13', 2, 501, 2, 9, 0),
(173, 'Central Heavy Artillery 1', 'm13', 2, 501, 2, 9, 0),
(174, 'Central artillery 1b', 'daimlermarienfelde_s', 2, 501, 2, 9, 0),
(175, 'Central Heavy Artillery 1', 'm13', 2, 501, 2, 9, 0),
(176, 'Central Heavy Artillery 1', 'm13', 2, 501, 2, 9, 0),
(177, 'Central artillery 1', 'fk96', 2, 501, 2, 9, 0),
(178, 'Central artillery 1b', 'daimlermarienfelde_s', 2, 501, 2, 9, 0),
(179, 'Central artillery 3', 'fk96', 2, 501, 2, 9, 0),
(180, 'Central artillery 3', 'fk96', 2, 501, 2, 9, 0),
(181, 'Armored trucks', 'lmg08aaa', 2, 501, 2, 9, 0),
(182, 'Armored trucks', 'merc22', 2, 501, 2, 9, 0),
(183, 'Armored trucks', 'benz_soft', 2, 501, 2, 9, 0),
(184, 'Central artillery 3', 'fk96', 2, 501, 2, 9, 0),
(185, 'Central artillery 3', 'fk96', 2, 501, 2, 9, 0),
(186, 'Central artillery 2', 'fk96', 2, 501, 2, 9, 0),
(187, 'Central artillery 3', 'fk96', 2, 501, 2, 9, 0),
(188, 'Central artillery 2', 'fk96', 2, 501, 2, 9, 0),
(189, 'Central artillery 2', 'fk96', 2, 501, 2, 9, 0),
(190, 'Central artillery 2', 'fk96', 2, 501, 2, 9, 0),
(191, 'Central artillery 2', 'fk96', 2, 501, 2, 9, 0),
(192, 'noname', 'dfwc5', 2, 501, 2, 9, 0),
(193, 'Central artillery 2', 'fk96', 2, 501, 2, 9, 0),
(194, 'noname', 'pfalzd3a', 2, 501, 2, 9, 0),
(195, 'Central artillery 2', 'benz_open', 2, 501, 2, 9, 0),
(196, 'Central artillery 1', 'fk96', 2, 501, 2, 9, 0),
(197, 'Central artillery 1', 'fk96', 2, 501, 2, 9, 0),
(198, 'Central artillery 1b', 'daimlermarienfelde_s', 2, 501, 2, 9, 0),
(199, 'noname', 'fokkerdr1', 2, 501, 2, 9, 0),
(200, 'noname', 'pfalzd3a', 2, 501, 2, 9, 0),
(201, 'noname', 'dfwc5', 2, 501, 2, 9, 0),
(202, 'Central artillery 1', 'fk96', 2, 501, 2, 9, 0),
(203, 'Central artillery 1', 'fk96', 2, 501, 2, 9, 0),
(204, 'noname', 'dfwc5', 2, 501, 2, 9, 0),
(205, 'Abt 1 Ko 1 Zug 1', 'benz_open', 2, 501, 2, 9, 0),
(206, 'Abt 1 Ko 1 Zug 1', 'benz_open', 2, 501, 2, 9, 0),
(207, 'Central artillery 2', 'benz_open', 2, 501, 2, 9, 0),
(208, 'Abt 1 Ko 1 Zug 1', 'benz_open', 2, 501, 2, 9, 0),
(209, 'Abt 1 Ko 1 Zug 1', 'benz_open', 2, 501, 2, 9, 0),
(210, 'Abt 1 Ko 1 Zug 1', 'benz_open', 2, 501, 2, 9, 0),
(211, 'Abt 1 Ko 1 Zug 1', 'benz_open', 2, 501, 2, 9, 0),
(212, 'Abt 1 Ko 1 Zug 1', 'benz_open', 2, 501, 2, 9, 0),
(213, 'Abt 1 Ko 1 Zug 1', 'benz_open', 2, 501, 2, 9, 0),
(214, 'Central artillery 2', 'benz_open', 2, 501, 2, 9, 0),
(215, 'Central artillery 2', 'benz_open', 2, 501, 2, 9, 0),
(216, 'Central artillery 2', 'benz_open', 2, 501, 2, 9, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
