-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2013 at 05:20 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rofwar`
--

-- --------------------------------------------------------

--
-- Table structure for table `campaigns`
--

CREATE TABLE IF NOT EXISTS `campaigns` (
  `campaign` varchar(50) NOT NULL,
  `db_name` varchar(30) NOT NULL,
  `map` varchar(30) NOT NULL,
  `simulation` varchar(6) NOT NULL,
  PRIMARY KEY (`campaign`),
  UNIQUE KEY `db_name` (`db_name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `campaigns`
--

INSERT INTO `campaigns` (`campaign`, `db_name`, `map`, `simulation`) VALUES
('Bloody April', 'bloody_april', 'Western Front', 'RoF'),
('Flanders Eagles', 'flanders_eagles', 'Channel', 'RoF'),
('Lake', 'lake', 'Lake', 'RoF'),
('Skies of the Empires', 'skies_of_the_empires', 'Verdun', 'RoF'),
('Skies of the Empires II', 'skies_of_the_empires_ii', 'Verdun', 'RoF'),
('Stalingrad', 'stalingrad', 'Stalingrad', 'BoS'),
('Yankee Doodle', 'yankee_doodle', 'Western Front', 'RoF');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

