-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2013 at 03:46 AM
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
-- Table structure for table `rof_object_roles`
--

CREATE TABLE IF NOT EXISTS `rof_object_roles` (
  `COL 1` varchar(10) DEFAULT NULL,
  `COL 2` varchar(23) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rof_object_roles`
--

INSERT INTO `rof_object_roles` (`COL 1`, `COL 2`) VALUES
('UNIT_CLASS', 'ROLE_DESCRIPTION'),
('AAA', 'Artillery:Anti-Aircraft'),
('ART', 'Artillery'),
('BOT', 'Bot'),
('IMA', 'Infantry: MG AA'),
('IMG', 'Infantry:Machine Gun'),
('INF', 'Infrastructure'),
('NAA', 'Naval:Anti-Aircraft'),
('NAR', 'Naval:Artillery'),
('PBO', 'Plane:Bomber'),
('PFB', 'Plane:Fighter-Bomber'),
('PFI', 'Plane:Fighter'),
('PRE', 'Plane:Reconnaissance'),
('PSE', 'Plane:Seaplane'),
('PTR', 'Plane:Transport'),
('RAA', 'Rail:Anti-Aircraft'),
('RCV', 'Rail:Civil Train'),
('RLO', 'Rail:Locomotive'),
('RWA', 'Rail:Wagon'),
('SAA', 'Ship:Anti-Aircraft'),
('SBA', 'Ship:Battleship'),
('SCR', 'Ship:Cruiser'),
('SDE', 'Ship:Destroyer'),
('SPB', 'Ship:Patrol Boat'),
('SSU', 'Ship:Submarine'),
('T', 'Tank:Standard'),
('TAA', 'Tank:Anti-Aircraft'),
('TSP', 'Tank:Self-Propelled Gun'),
('TTD', 'Tank:Tank Destroyer'),
('TUR', 'Turret'),
('VAA', 'Vehicle:Anti-Aircraft'),
('VMI', 'Vehicle:Mech. Infantry'),
('VRI', 'Regular Infantry'),
('VTR', 'Vehicle:Transport');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
