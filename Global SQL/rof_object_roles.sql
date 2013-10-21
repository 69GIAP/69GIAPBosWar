-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2013 at 05:58 AM
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
-- Table structure for table `rof_object_roles`
--

DROP TABLE IF EXISTS `rof_object_roles`;
CREATE TABLE IF NOT EXISTS `rof_object_roles` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `unit_class` varchar(8) DEFAULT NULL,
  `role_description` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `unit_class` (`unit_class`),
  UNIQUE KEY `role_description` (`role_description`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `rof_object_roles`
--

INSERT INTO `rof_object_roles` (`id`, `unit_class`, `role_description`) VALUES
(1, 'AAA', 'Artillery:Anti-Aircraft'),
(2, 'ART', 'Artillery'),
(3, 'BOT', 'Bot'),
(4, 'HUM', 'Human'),
(5, 'IMA', 'Infantry: MG AA'),
(6, 'IMG', 'Infantry:Machine Gun'),
(7, 'INF', 'Infrastructure'),
(8, 'NAA', 'Naval:Anti-Aircraft'),
(9, 'NAR', 'Naval:Artillery'),
(10, 'PBO', 'Plane:Bomber'),
(11, 'PFB', 'Plane:Fighter-Bomber'),
(12, 'PFI', 'Plane:Fighter'),
(13, 'PRE', 'Plane:Reconnaissance'),
(14, 'PSE', 'Plane:Seaplane'),
(15, 'PTR', 'Plane:Transport'),
(16, 'RAA', 'Rail:Anti-Aircraft'),
(17, 'RCV', 'Rail:Civil Train'),
(18, 'RLO', 'Rail:Locomotive'),
(19, 'RWA', 'Rail:Wagon'),
(20, 'SAA', 'Ship:Anti-Aircraft'),
(21, 'SBA', 'Ship:Battleship'),
(22, 'SCR', 'Ship:Cruiser'),
(23, 'SDE', 'Ship:Destroyer'),
(24, 'SPB', 'Ship:Patrol Boat'),
(25, 'SSU', 'Ship:Submarine'),
(26, 'T', 'Tank:Standard'),
(27, 'TAA', 'Tank:Anti-Aircraft'),
(28, 'TSP', 'Tank:Self-Propelled Gun'),
(29, 'TTD', 'Tank:Tank Destroyer'),
(30, 'TUR', 'Turret'),
(31, 'VAA', 'Vehicle:Anti-Aircraft'),
(32, 'VMI', 'Vehicle:Mech. Infantry'),
(33, 'VRI', 'Regular Infantry'),
(34, 'VTR', 'Vehicle:Transport'),
(35, 'DNA', 'Intrinsic');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
