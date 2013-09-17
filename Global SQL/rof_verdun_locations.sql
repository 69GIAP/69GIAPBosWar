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
-- Table structure for table `rof_verdun_locations`
--

CREATE TABLE IF NOT EXISTS `rof_verdun_locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `LID` int(2) NOT NULL,
  `LX` decimal(15,0) NOT NULL,
  `LZ` decimal(15,0) NOT NULL,
  `LName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=134 ;

--
-- Dumping data for table `rof_verdun_locations`
--

INSERT INTO `rof_verdun_locations` (`id`, `LID`, `LX`, `LZ`, `LName`) VALUES
(1, 10, '28000', '34000', 'Abaucourt'),
(2, 51, '28650', '36500', 'Abaucourt'),
(3, 51, '43600', '38650', 'Billy-sous-Mangiennes'),
(4, 51, '19200', '14350', 'Blercourt'),
(5, 51, '33000', '21200', 'Champneuville'),
(6, 51, '30900', '17100', 'Chattancourt'),
(7, 51, '18500', '2300', 'Clemont-en-Argonne'),
(8, 10, '38950', '16850', 'Consenvoye'),
(9, 51, '38700', '17900', 'Consenvoye'),
(10, 51, '44900', '26050', 'Darnyillers'),
(11, 51, '14700', '28600', 'Dieue-sur-Meuse'),
(12, 51, '38500', '48200', 'Dommary-Baroncourt'),
(13, 51, '39900', '30550', 'DuBois'),
(14, 10, '40070', '31080', 'DuBois'),
(15, 51, '30000', '12450', 'Esnes-en-Argonne'),
(16, 51, '30300', '43550', 'Etain'),
(17, 51, '5200', '6300', 'Evres'),
(18, 51, '17400', '42800', 'Franses-en-Woevre'),
(19, 51, '20400', '27900', 'Haudainville'),
(20, 51, '19600', '37500', 'Haudiomont'),
(21, 51, '3900', '34050', 'Lacroix-sur-Meuse'),
(22, 51, '14000', '17700', 'Lemmes'),
(23, 10, '10100', '17700', 'Lemmes'),
(24, 10, '15200', '39700', 'Les Eparges'),
(25, 51, '14150', '40600', 'Les Eparges'),
(26, 51, '46100', '10650', 'Liry-devant-Dun'),
(27, 51, '46000', '35800', 'Mangiennes'),
(28, 51, '16500', '46650', 'Marcheville-en-Woevre'),
(29, 10, '19900', '48650', 'Marcheville-en-Woevre'),
(30, 51, '34100', '34300', 'Maucourt-sur-Orne'),
(31, 20, '35950', '6450', 'Montfaucon-d''Argonne'),
(32, 51, '36050', '7200', 'Montfaucon-d''Argonne'),
(33, 51, '48400', '39000', 'Pillon'),
(34, 51, '6300', '21600', 'Rambluzin-et-benoit-Vaux'),
(35, 51, '22500', '8600', 'Recicourt'),
(36, 51, '7600', '25900', 'Recourt'),
(37, 51, '43500', '3450', 'Romangne-sous-Montfaucon'),
(38, 51, '37450', '43050', 'Senon'),
(39, 20, '36950', '44500', 'Senon'),
(40, 51, '22950', '15850', 'Sivry-la-Perche'),
(41, 10, '23150', '16600', 'Sivry-la-Perche'),
(42, 51, '42550', '45200', 'Spincourt'),
(43, 51, '7800', '14000', 'St-Endre-en-Barrois'),
(44, 51, '8650', '46800', 'St-Maurice-sous-les-Cotes'),
(45, 52, '24600', '-1000', 'the Canadian side of the border'),
(46, 52, '24600', '1000', 'the Canadian side of the border'),
(47, 52, '24600', '3000', 'the Canadian side of the border'),
(48, 52, '24600', '5000', 'the Canadian side of the border'),
(49, 52, '24600', '7000', 'the Canadian side of the border'),
(50, 52, '24600', '9000', 'the Canadian side of the border'),
(51, 52, '24600', '11000', 'the Canadian side of the border'),
(52, 52, '24600', '13000', 'the Canadian side of the border'),
(53, 52, '24600', '15000', 'the Canadian side of the border'),
(54, 52, '24600', '17000', 'the Canadian side of the border'),
(55, 52, '24600', '19000', 'the Canadian side of the border'),
(56, 52, '24600', '21000', 'the Canadian side of the border'),
(57, 52, '24600', '23000', 'the Canadian side of the border'),
(58, 52, '24600', '25000', 'the Canadian side of the border'),
(59, 52, '24600', '27000', 'the Canadian side of the border'),
(60, 52, '24600', '29000', 'the Canadian side of the border'),
(61, 52, '24600', '31000', 'the Canadian side of the border'),
(62, 52, '24600', '33000', 'the Canadian side of the border'),
(63, 52, '24600', '35000', 'the Canadian side of the border'),
(64, 52, '24600', '37000', 'the Canadian side of the border'),
(65, 52, '24600', '39000', 'the Canadian side of the border'),
(66, 52, '24600', '41000', 'the Canadian side of the border'),
(67, 52, '24600', '43000', 'the Canadian side of the border'),
(68, 52, '24600', '45000', 'the Canadian side of the border'),
(69, 52, '24600', '47000', 'the Canadian side of the border'),
(70, 52, '24600', '49000', 'the Canadian side of the border'),
(71, 52, '24600', '51000', 'the Canadian side of the border'),
(72, 52, '24600', '53000', 'the Canadian side of the border'),
(73, 52, '24500', '-1000', 'the International Boundary'),
(74, 52, '24500', '1000', 'the International Boundary'),
(75, 52, '24500', '3000', 'the International Boundary'),
(76, 52, '24500', '5000', 'the International Boundary'),
(77, 52, '24500', '7000', 'the International Boundary'),
(78, 52, '24500', '9000', 'the International Boundary'),
(79, 52, '24500', '11000', 'the International Boundary'),
(80, 52, '24500', '13000', 'the International Boundary'),
(81, 52, '24500', '15000', 'the International Boundary'),
(82, 52, '24500', '17000', 'the International Boundary'),
(83, 52, '24500', '19000', 'the International Boundary'),
(84, 52, '24500', '21000', 'the International Boundary'),
(85, 52, '24500', '23000', 'the International Boundary'),
(86, 52, '24500', '25000', 'the International Boundary'),
(87, 52, '24500', '27000', 'the International Boundary'),
(88, 52, '24500', '29000', 'the International Boundary'),
(89, 52, '24500', '31000', 'the International Boundary'),
(90, 52, '24500', '33000', 'the International Boundary'),
(91, 52, '24500', '35000', 'the International Boundary'),
(92, 52, '24500', '37000', 'the International Boundary'),
(93, 52, '24500', '39000', 'the International Boundary'),
(94, 52, '24500', '41000', 'the International Boundary'),
(95, 52, '24500', '43000', 'the International Boundary'),
(96, 52, '24500', '45000', 'the International Boundary'),
(97, 52, '24500', '47000', 'the International Boundary'),
(98, 52, '24500', '49000', 'the International Boundary'),
(99, 52, '24500', '51000', 'the International Boundary'),
(100, 52, '24500', '53000', 'the International Boundary'),
(101, 52, '24400', '-1000', 'the US side of the border'),
(102, 52, '24400', '1000', 'the US side of the border'),
(103, 52, '24400', '3000', 'the US side of the border'),
(104, 52, '24400', '5000', 'the US side of the border'),
(105, 52, '24400', '7000', 'the US side of the border'),
(106, 52, '24400', '9000', 'the US side of the border'),
(107, 52, '24400', '11000', 'the US side of the border'),
(108, 52, '24400', '13000', 'the US side of the border'),
(109, 52, '24400', '15000', 'the US side of the border'),
(110, 52, '24400', '17000', 'the US side of the border'),
(111, 52, '24400', '19000', 'the US side of the border'),
(112, 52, '24400', '21000', 'the US side of the border'),
(113, 52, '24400', '23000', 'the US side of the border'),
(114, 52, '24400', '25000', 'the US side of the border'),
(115, 52, '24400', '27000', 'the US side of the border'),
(116, 52, '24400', '29000', 'the US side of the border'),
(117, 52, '24400', '31000', 'the US side of the border'),
(118, 52, '24400', '33000', 'the US side of the border'),
(119, 52, '24400', '35000', 'the US side of the border'),
(120, 52, '24400', '37000', 'the US side of the border'),
(121, 52, '24400', '39000', 'the US side of the border'),
(122, 52, '24400', '41000', 'the US side of the border'),
(123, 52, '24400', '43000', 'the US side of the border'),
(124, 52, '24400', '45000', 'the US side of the border'),
(125, 52, '24400', '47000', 'the US side of the border'),
(126, 52, '24400', '49000', 'the US side of the border'),
(127, 52, '24400', '51000', 'the US side of the border'),
(128, 52, '24400', '53000', 'the US side of the border'),
(129, 51, '7250', '30800', 'Troyon'),
(130, 50, '24700', '25000', 'Verdun'),
(131, 51, '44100', '13750', 'Vilosnes-Haraumont'),
(132, 10, '18050', '4200', 'Vraincourt'),
(133, 51, '19800', '4400', 'Vraincourt');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
