-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2013 at 05:48 PM
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
-- Table structure for table `campaign_users`
--

DROP TABLE IF EXISTS `campaign_users`;
CREATE TABLE IF NOT EXISTS `campaign_users` (
  `user_id` int(11) NOT NULL,
  `camp_db` varchar(30) NOT NULL,
  `CoalID` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`camp_db`,`user_id`,`CoalID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='This table binds the entries of the user table to the campaigns.\nThis makes it possible to filter what campaign and what coalition the user is in.';

--
-- Dumping data for table `campaign_users`
--

INSERT INTO `campaign_users` (`user_id`, `camp_db`, `CoalID`) VALUES
(1, '1916', 0),
(1, 'flanders_eagles', 0),
(2, 'flanders_eagles', 1),
(4, 'flanders_eagles', 0),
(1, 'skies_of_the_empires', 0),
(2, 'skies_of_the_empires', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
