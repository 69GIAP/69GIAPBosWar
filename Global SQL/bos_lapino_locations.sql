-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 20, 2014 at 04:17 PM
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
-- Table structure for table `bos_lapino_locations`
--

DROP TABLE IF EXISTS `bos_lapino_locations`;
CREATE TABLE IF NOT EXISTS `bos_lapino_locations` (
  `id` smallint(1) unsigned NOT NULL AUTO_INCREMENT,
  `LID` smallint(1) unsigned NOT NULL,
  `LX` decimal(15,0) NOT NULL,
  `LZ` decimal(15,0) NOT NULL,
  `LName` varchar(40) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `LName` (`LName`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=78 ;

--
-- Dumping data for table `bos_lapino_locations`
--

INSERT INTO `bos_lapino_locations` (`id`, `LID`, `LX`, `LZ`, `LName`) VALUES
(1, 10, '23180', '30820', 'Lapino'),
(2, 20, '6890', '41930', 'Nagibaevka'),
(3, 20, '14560', '15260', 'Stepnoy'),
(4, 10, '29250', '20580', 'Jantar'),
(5, 10, '43670', '8280', 'Rodnik'),
(6, 20, '39420', '33940', 'Dubki'),
(7, 51, '5850', '43500', 'Nagibaevka'),
(8, 51, '3880', '37110', 'Beloye'),
(9, 51, '5060', '30880', 'Privetivoye'),
(10, 51, '9590', '30230', 'Lugovoye'),
(11, 51, '13440', '36530', 'Korchma'),
(12, 51, '13420', '34670', 'Sadovoye'),
(13, 51, '15000', '29380', 'Dolgoye'),
(14, 51, '15070', '23700', 'Zayachye'),
(15, 51, '7860', '24120', 'Barakino'),
(16, 51, '4290', '19120', 'Shipovka'),
(17, 51, '7900', '17150', 'Barsukovo'),
(18, 51, '9430', '12540', 'Yarygino'),
(19, 51, '12830', '14270', 'Stepnoy'),
(20, 51, '18780', '21700', 'Veseloye'),
(21, 51, '12370', '6790', 'Kalynovka'),
(22, 51, '17790', '5310', 'Taranovka'),
(23, 51, '10190', '2570', 'Kazachye'),
(24, 51, '5950', '5160', 'Nechayevka'),
(25, 51, '23230', '5500', 'Niva'),
(26, 51, '31540', '5050', 'Tomarovka'),
(27, 51, '24610', '9750', 'Zarechnoye'),
(28, 51, '21010', '10770', 'Posadskoye'),
(29, 51, '20690', '14880', 'Chomoye'),
(30, 51, '26320', '15880', 'Komarovo'),
(31, 51, '25260', '18670', 'Lihoye'),
(32, 51, '28540', '18790', 'Jantar'),
(33, 51, '28750', '22070', 'Sharygino'),
(34, 51, '23020', '21990', 'Razumnoye'),
(35, 51, '23480', '24100', 'Snegovoye'),
(36, 51, '19660', '24320', 'Savino'),
(37, 51, '26280', '25950', 'Polevoye'),
(38, 51, '31430', '24530', 'Gryada'),
(39, 51, '22260', '27460', 'Travniki'),
(40, 51, '24900', '29800', 'Lapino'),
(41, 51, '27590', '30380', 'Varvarkino'),
(42, 51, '20770', '31530', 'Donskoy'),
(43, 51, '22630', '35580', 'Prudki'),
(44, 51, '26770', '33950', 'Usatoye'),
(45, 51, '30950', '35550', 'Kachayevka'),
(46, 51, '28260', '38690', 'Sokoliki'),
(47, 51, '23440', '38870', 'Zadomoye'),
(48, 51, '19600', '45900', 'Romashkovo'),
(49, 51, '28780', '48500', 'Maksimovka'),
(50, 51, '40080', '3820', 'Volnoye'),
(51, 51, '40460', '9710', 'Snegery'),
(52, 51, '34770', '10210', 'Orehovka'),
(53, 51, '36470', '13100', 'Alekseevka'),
(54, 51, '43110', '13410', 'Rodnik'),
(55, 51, '33500', '19060', 'Zarubovka'),
(56, 51, '38400', '19550', 'Spas'),
(57, 51, '45980', '23470', 'Lesnoye'),
(58, 51, '36930', '24450', 'Volkovo'),
(59, 51, '39140', '27030', 'Golubino'),
(60, 51, '40520', '26680', 'Seversk'),
(61, 51, '42770', '28120', 'Ugrada'),
(62, 51, '48230', '28000', 'Borisovka'),
(63, 51, '35870', '29780', 'Povorotnoye'),
(64, 51, '31950', '29870', 'Stepnoye'),
(65, 51, '38280', '32380', 'Sorokino'),
(66, 51, '40150', '34170', 'Dubki'),
(67, 51, '46110', '33690', 'Petrovka'),
(68, 51, '36610', '36910', 'Pravoe'),
(69, 51, '43090', '38280', 'Vasilyevo'),
(70, 51, '45810', '38870', 'Mazikino'),
(71, 51, '41910', '41650', 'Serovo'),
(72, 51, '39040', '42590', 'Shirokoye'),
(73, 51, '35360', '43050', 'Lisovka'),
(74, 51, '32620', '43550', 'Volzanka'),
(75, 51, '43580', '45200', 'Portochke'),
(76, 51, '40360', '45910', 'Adreevka'),
(77, 51, '36480', '46730', 'Yagodka');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
