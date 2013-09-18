CREATE DATABASE  IF NOT EXISTS `boswar_db` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `boswar_db`;
-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2013 at 03:24 AM
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
-- Table structure for table `campaign_status`
--

CREATE TABLE IF NOT EXISTS `campaign_status` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `campaign_status` varchar(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `campaign_status`
--

INSERT INTO `campaign_status` (`id`, `campaign_status`) VALUES
(1, 'Hidden'),
(2, 'Completed'),
(3, 'Active'),
(4, 'Proposed');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
