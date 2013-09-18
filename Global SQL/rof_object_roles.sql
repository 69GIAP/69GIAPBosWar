CREATE DATABASE  IF NOT EXISTS `boswar_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `boswar_db`;
-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2013 at 02:34 AM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rofwar_campaign`
--

-- --------------------------------------------------------

--
-- Table structure for table `rof_object_roles`
--

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

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
