-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2013 at 05:01 AM
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
  `id` smallint(1) NOT NULL AUTO_INCREMENT,
  `user_id` smallint(1) NOT NULL DEFAULT '0',
  `camp_db` varchar(30) NOT NULL DEFAULT 'campaign_database',
  `CoalID` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `campaign_users`
--

INSERT INTO `campaign_users` (`id`, `user_id`, `camp_db`, `CoalID`) VALUES
(1, 1, '1916', 0),
(2, 1, 'flanders_eagles', 0),
(3, 2, 'flanders_eagles', 1),
(4, 4, 'flanders_eagles', 0),
(5, 1, 'skies_of_the_empires', 0),
(6, 2, 'skies_of_the_empires', 2);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
