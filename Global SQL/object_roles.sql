-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 12, 2013 at 03:43 AM
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
-- Table structure for table `object_roles`
--

DROP TABLE IF EXISTS `object_roles`;
CREATE TABLE IF NOT EXISTS `object_roles` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `unit_class` varchar(8) DEFAULT NULL,
  `role_description` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unit_class` (`unit_class`),
  UNIQUE KEY `role_description` (`role_description`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `object_roles`
--

INSERT INTO `object_roles` (`id`, `unit_class`, `role_description`) VALUES
(1, 'AAA', 'Artillery:Anti-Aircraft'),
(2, 'ART', 'Artillery'),
(3, 'BOT', 'Bot'),
(4, 'BRG', 'Bridge'),
(5, 'DNA', 'Intrinsic'),
(6, 'FAC', 'Factory'),
(7, 'HUM', 'Human'),
(8, 'IMA', 'Infantry: MG AA'),
(9, 'IMG', 'Infantry:Machine Gun'),
(10, 'INF', 'Infrastructure'),
(11, 'NAA', 'Naval:Anti-Aircraft'),
(12, 'NAR', 'Naval:Artillery'),
(13, 'PBO', 'Plane:Bomber'),
(14, 'PFB', 'Plane:Fighter-Bomber'),
(15, 'PFI', 'Plane:Fighter'),
(16, 'PRE', 'Plane:Reconnaissance'),
(17, 'PSE', 'Plane:Seaplane'),
(18, 'PTR', 'Plane:Transport'),
(19, 'RAA', 'Rail:Anti-Aircraft'),
(20, 'RCV', 'Rail:Civil Train'),
(21, 'RLO', 'Rail:Locomotive'),
(22, 'RWA', 'Rail:Wagon'),
(23, 'SAA', 'Ship:Anti-Aircraft'),
(24, 'SBA', 'Ship:Battleship'),
(25, 'SCR', 'Ship:Cruiser'),
(26, 'SDE', 'Ship:Destroyer'),
(27, 'SPB', 'Ship:Patrol Boat'),
(28, 'SSU', 'Ship:Submarine'),
(29, 'T', 'Tank:Standard'),
(30, 'TAA', 'Tank:Anti-Aircraft'),
(31, 'TSP', 'Tank:Self-Propelled Gun'),
(32, 'TTD', 'Tank:Tank Destroyer'),
(33, 'TUR', 'Turret'),
(34, 'VAA', 'Vehicle:Anti-Aircraft'),
(35, 'VMI', 'Vehicle:Mech. Infantry'),
(36, 'VRI', 'Regular Infantry'),
(37, 'VSL', 'Vehicle:Searchlight'),
(38, 'VTR', 'Vehicle:Transport');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
