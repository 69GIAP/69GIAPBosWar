-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2013 at 09:08 PM
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
-- Table structure for table `rof_countries`
--

CREATE TABLE IF NOT EXISTS `rof_countries` (
  `id` int(11) NOT NULL,
  `ckey` int(11) NOT NULL,
  `countryname` varchar(30) NOT NULL,
  `countryadj` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rof_countries`
--

INSERT INTO `rof_countries` (`id`, `ckey`, `countryname`, `countryadj`) VALUES
(0, 0, 'Neutral', 'neutral'),
(0, 101, 'France', 'French'),
(0, 102, 'Great Britain', 'British'),
(0, 103, 'USA', 'American'),
(0, 104, 'Italy', 'Italian'),
(0, 105, 'Russia', 'Russian'),
(0, 501, 'Germany', 'German'),
(0, 502, 'Austro-Hungary', 'Austro-Hungarian'),
(0, 600, 'Future Country', 'Future'),
(0, 610, 'War Dogs Country', 'War Dogs'),
(0, 620, 'Mercenaries Country', 'Mercenaries'),
(0, 630, 'Knights Country', 'Knights'),
(0, 640, 'Corsairs Country', 'Corsairs');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
