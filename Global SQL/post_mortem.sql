-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2013 at 06:39 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3
# Stenka 6/5/2014 creation

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

-- Stenka 6/5/14
-- Database: `boswar_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `post_mortem`
-- During stats analysis of mission_no # this table will be filled with information of objects that were damaged (0 = untouched 9 = dead)
-- in creation of mission_no #+1 the object will be updated before planning and the processed flag set to 1
-- country and coalition are not used in the processing they are just descriptive in case of reporting 

DROP TABLE IF EXISTS `post_mortem`;
CREATE TABLE IF NOT EXISTS `post_mortem` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `Name` char(31) DEFAULT NULL,
  `Model` char(20) DEFAULT NULL,
  `coalition` int(1) DEFAULT 1,
  `country` int(3) DEFAULT 0,
  `mission_no` int(2) DEFAULT 0,
  `damage` int(1) DEFAULT 0,
  `processed` int(1) DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
