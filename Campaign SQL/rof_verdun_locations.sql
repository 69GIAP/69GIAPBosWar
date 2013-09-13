-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2013 at 10:00 PM
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
  `LID` int(2) NOT NULL,
  `LX` decimal(15,0) NOT NULL,
  `LZ` decimal(15,0) NOT NULL,
  `LName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rof_verdun_locations`
--

INSERT INTO `rof_verdun_locations` (`LID`, `LX`, `LZ`, `LName`) VALUES
(51, '5200', '6300', 'Evres'),
(51, '7800', '14000', 'St-Endre-en-Barrois'),
(51, '6300', '21600', 'Rambluzin-et-benoit-Vaux'),
(51, '7600', '25900', 'Recourt'),
(51, '7250', '30800', 'Troyon'),
(51, '3900', '34050', 'Lacroix-sur-Meuse'),
(51, '8650', '46800', 'St-Maurice-sous-les-Cotes'),
(51, '18500', '2300', 'Clemont-en-Argonne'),
(10, '18050', '4200', 'Vraincourt'),
(51, '19800', '4400', 'Vraincourt'),
(51, '19200', '14350', 'Blercourt'),
(51, '14000', '17700', 'Lemmes'),
(10, '10100', '17700', 'Lemmes'),
(51, '14700', '28600', 'Dieue-sur-Meuse'),
(51, '19600', '37500', 'Haudiomont'),
(10, '15200', '39700', 'Les Eparges'),
(51, '14150', '40600', 'Les Eparges'),
(51, '17400', '42800', 'Franses-en-Woevre'),
(51, '16500', '46650', 'Marcheville-en-Woevre'),
(10, '19900', '48650', 'Marcheville-en-Woevre'),
(51, '22500', '8600', 'Recicourt'),
(51, '22950', '15850', 'Sivry-la-Perche'),
(10, '23150', '16600', 'Sivry-la-Perche'),
(50, '24700', '25000', 'Verdun'),
(51, '20400', '27900', 'Haudainville'),
(10, '28000', '34000', 'Abaucourt'),
(51, '28650', '36500', 'Abaucourt'),
(20, '35950', '6450', 'Montfaucon-d''Argonne'),
(51, '36050', '7200', 'Montfaucon-d''Argonne'),
(51, '30000', '12450', 'Esnes-en-Argonne'),
(10, '38950', '16850', 'Consenvoye'),
(51, '30900', '17100', 'Chattancourt'),
(51, '38700', '17900', 'Consenvoye'),
(51, '33000', '21200', 'Champneuville'),
(51, '39900', '30550', 'DuBois'),
(10, '40070', '31080', 'DuBois'),
(51, '34100', '34300', 'Maucourt-sur-Orne'),
(51, '37450', '43050', 'Senon'),
(51, '30300', '43550', 'Etain'),
(20, '36950', '44500', 'Senon'),
(51, '38500', '48200', 'Dommary-Baroncourt'),
(51, '43500', '3450', 'Romangne-sous-Montfaucon'),
(51, '46100', '10650', 'Liry-devant-Dun'),
(51, '44100', '13750', 'Vilosnes-Haraumont'),
(51, '44900', '26050', 'Darnyillers'),
(51, '46000', '35800', 'Mangiennes'),
(51, '43600', '38650', 'Billy-sous-Mangiennes'),
(51, '48400', '39000', 'Pillon'),
(51, '42550', '45200', 'Spincourt'),
(52, '24500', '-1000', 'the International Boundary'),
(52, '24500', '1000', 'the International Boundary'),
(52, '24500', '3000', 'the International Boundary'),
(52, '24500', '5000', 'the International Boundary'),
(52, '24500', '7000', 'the International Boundary'),
(52, '24500', '9000', 'the International Boundary'),
(52, '24500', '11000', 'the International Boundary'),
(52, '24500', '13000', 'the International Boundary'),
(52, '24500', '15000', 'the International Boundary'),
(52, '24500', '17000', 'the International Boundary'),
(52, '24500', '19000', 'the International Boundary'),
(52, '24500', '21000', 'the International Boundary'),
(52, '24500', '23000', 'the International Boundary'),
(52, '24500', '25000', 'the International Boundary'),
(52, '24500', '27000', 'the International Boundary'),
(52, '24500', '29000', 'the International Boundary'),
(52, '24500', '31000', 'the International Boundary'),
(52, '24500', '33000', 'the International Boundary'),
(52, '24500', '35000', 'the International Boundary'),
(52, '24500', '37000', 'the International Boundary'),
(52, '24500', '39000', 'the International Boundary'),
(52, '24500', '41000', 'the International Boundary'),
(52, '24500', '43000', 'the International Boundary'),
(52, '24500', '45000', 'the International Boundary'),
(52, '24500', '47000', 'the International Boundary'),
(52, '24500', '49000', 'the International Boundary'),
(52, '24500', '51000', 'the International Boundary'),
(52, '24500', '53000', 'the International Boundary'),
(52, '24400', '-1000', 'the US side of the border'),
(52, '24400', '1000', 'the US side of the border'),
(52, '24400', '3000', 'the US side of the border'),
(52, '24400', '5000', 'the US side of the border'),
(52, '24400', '7000', 'the US side of the border'),
(52, '24400', '9000', 'the US side of the border'),
(52, '24400', '11000', 'the US side of the border'),
(52, '24400', '13000', 'the US side of the border'),
(52, '24400', '15000', 'the US side of the border'),
(52, '24400', '17000', 'the US side of the border'),
(52, '24400', '19000', 'the US side of the border'),
(52, '24400', '21000', 'the US side of the border'),
(52, '24400', '23000', 'the US side of the border'),
(52, '24400', '25000', 'the US side of the border'),
(52, '24400', '27000', 'the US side of the border'),
(52, '24400', '29000', 'the US side of the border'),
(52, '24400', '31000', 'the US side of the border'),
(52, '24400', '33000', 'the US side of the border'),
(52, '24400', '35000', 'the US side of the border'),
(52, '24400', '37000', 'the US side of the border'),
(52, '24400', '39000', 'the US side of the border'),
(52, '24400', '41000', 'the US side of the border'),
(52, '24400', '43000', 'the US side of the border'),
(52, '24400', '45000', 'the US side of the border'),
(52, '24400', '47000', 'the US side of the border'),
(52, '24400', '49000', 'the US side of the border'),
(52, '24400', '51000', 'the US side of the border'),
(52, '24400', '53000', 'the US side of the border'),
(52, '24600', '-1000', 'the Canadian side of the border'),
(52, '24600', '1000', 'the Canadian side of the border'),
(52, '24600', '3000', 'the Canadian side of the border'),
(52, '24600', '5000', 'the Canadian side of the border'),
(52, '24600', '7000', 'the Canadian side of the border'),
(52, '24600', '9000', 'the Canadian side of the border'),
(52, '24600', '11000', 'the Canadian side of the border'),
(52, '24600', '13000', 'the Canadian side of the border'),
(52, '24600', '15000', 'the Canadian side of the border'),
(52, '24600', '17000', 'the Canadian side of the border'),
(52, '24600', '19000', 'the Canadian side of the border'),
(52, '24600', '21000', 'the Canadian side of the border'),
(52, '24600', '23000', 'the Canadian side of the border'),
(52, '24600', '25000', 'the Canadian side of the border'),
(52, '24600', '27000', 'the Canadian side of the border'),
(52, '24600', '29000', 'the Canadian side of the border'),
(52, '24600', '31000', 'the Canadian side of the border'),
(52, '24600', '33000', 'the Canadian side of the border'),
(52, '24600', '35000', 'the Canadian side of the border'),
(52, '24600', '37000', 'the Canadian side of the border'),
(52, '24600', '39000', 'the Canadian side of the border'),
(52, '24600', '41000', 'the Canadian side of the border'),
(52, '24600', '43000', 'the Canadian side of the border'),
(52, '24600', '45000', 'the Canadian side of the border'),
(52, '24600', '47000', 'the Canadian side of the border'),
(52, '24600', '49000', 'the Canadian side of the border'),
(52, '24600', '51000', 'the Canadian side of the border'),
(52, '24600', '53000', 'the Canadian side of the border');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
