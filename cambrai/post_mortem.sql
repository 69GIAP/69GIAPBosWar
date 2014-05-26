-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 26, 2014 at 05:45 PM
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `post_mortem`
--

INSERT INTO `post_mortem` (`id`, `Name`, `Model`, `coalition`, `country`, `mission_no`, `damage`, `processed`) VALUES
(1, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(2, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(3, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(4, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(5, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(6, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(7, 'Bat 1 Co 3 Pl 1', 'mk4m', 1, 102, 1, 9, 0),
(8, 'Bat 1 Co 1 Pl 6', 'mk4f', 1, 102, 1, 9, 0),
(9, 'noname', 'sopstr', 1, 102, 1, 9, 0),
(10, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 1, 9, 0),
(11, 'noname', 'sopcamel', 1, 102, 1, 9, 0),
(12, 'noname', 'sopstr', 1, 102, 1, 9, 0),
(13, 'Bat 1 Co 1 Pl 5', 'g8', 1, 102, 1, 9, 0),
(14, 'Wagon', 'pass', 1, 102, 1, 9, 0),
(15, 'Wagon', 'pass', 1, 102, 1, 9, 0),
(16, 'Wagon', 'pass', 1, 102, 1, 9, 0),
(17, 'Wagon', 'tankb', 1, 102, 1, 9, 0),
(18, 'Wagon', 'tankb', 1, 102, 1, 9, 0),
(19, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 1, 9, 0),
(20, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 1, 9, 0),
(21, 'noname', 'sopstr', 1, 102, 1, 9, 0),
(22, 'Bat 1 Co 2 Pl 8', 'mk4f', 1, 102, 1, 9, 0),
(23, 'Bat 1 Co 2 Pl 8', 'mk4f', 1, 102, 1, 9, 0),
(24, 'Bat 1 Co 2 Pl 8', 'mk4f', 1, 102, 1, 9, 0),
(25, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 1, 9, 0),
(26, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 1, 9, 0),
(27, 'Bat 1 Co 2 Pl 2', 'mk4m', 1, 102, 1, 9, 0),
(28, 'Central artillery 5', 'fk96', 2, 501, 1, 9, 0),
(29, 'Central artillery 5', 'fk96', 2, 501, 1, 9, 0),
(30, 'Central artillery 5', 'fk96', 2, 501, 1, 9, 0),
(31, 'noname', 'dfwc5', 2, 501, 1, 9, 0),
(32, 'Central artillery 5', 'fk96', 2, 501, 1, 9, 0),
(33, 'Central artillery 5', 'fk96', 2, 501, 1, 9, 0),
(34, 'Central artillery 5', 'fk96', 2, 501, 1, 9, 0),
(35, 'Central artillery 1b', 'daimlermarienfelde_s', 2, 501, 1, 9, 0),
(36, 'Central artillery 1b', 'daimlermarienfelde_s', 2, 501, 1, 9, 0),
(37, 'Central Heavy Artillery 1', 'm13', 2, 501, 1, 9, 0),
(38, 'Central artillery 1b', 'daimlermarienfelde_s', 2, 501, 1, 9, 0),
(39, 'Central artillery 1', 'fk96', 2, 501, 1, 9, 0),
(40, 'Central artillery 1', 'fk96', 2, 501, 1, 9, 0),
(41, 'Central artillery 1b', 'daimlermarienfelde_s', 2, 501, 1, 9, 0),
(42, 'Central artillery 1', 'fk96', 2, 501, 1, 9, 0),
(43, 'noname', 'fokkerdr1', 2, 501, 1, 9, 0),
(44, 'noname', 'dfwc5', 2, 501, 1, 9, 0),
(45, 'Central artillery 3', 'fk96', 2, 501, 1, 9, 0),
(46, 'Central artillery 2', 'fk96', 2, 501, 1, 9, 0),
(47, 'Central artillery 2', 'benz_open', 2, 501, 1, 9, 0),
(48, 'Central artillery 2', 'fk96', 2, 501, 1, 9, 0),
(49, 'noname', 'pfalzd3a', 2, 501, 1, 9, 0),
(50, 'noname', 'pfalzd3a', 2, 501, 1, 9, 0),
(51, 'noname', 'dfwc5', 2, 501, 1, 9, 0),
(52, 'Armored trucks', 'benz_open', 2, 501, 1, 9, 0),
(53, 'Armored trucks', 'daimleraaa', 2, 501, 1, 9, 0),
(54, 'Armored trucks', 'benz_p', 2, 501, 1, 9, 0),
(55, 'Central Heavy Artillery 1', 'm13', 2, 501, 1, 9, 0),
(56, 'Armored trucks', 'benz_open', 2, 501, 1, 9, 0),
(57, 'noname', 'fokkerdr1', 2, 501, 1, 9, 0),
(58, 'noname', 'dfwc5', 2, 501, 1, 9, 0),
(59, 'noname', 'pfalzd3a', 2, 501, 1, 9, 0),
(60, 'noname', 'dfwc5', 2, 501, 1, 9, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
