-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2013 at 10:01 PM
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
-- Table structure for table `rof_lake_locations`
--

CREATE TABLE IF NOT EXISTS `rof_lake_locations` (
  `LID` int(2) NOT NULL,
  `LX` decimal(15,0) NOT NULL,
  `LZ` decimal(15,0) NOT NULL,
  `LName` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rof_lake_locations`
--

INSERT INTO `rof_lake_locations` (`LID`, `LX`, `LZ`, `LName`) VALUES
(51, '5722', '9573', 'Brienne-le-Chateau'),
(51, '4629', '16887', 'Morvillers'),
(51, '3515', '24624', 'Soulaines'),
(51, '3319', '27459', 'Tremilly'),
(51, '2882', '29864', 'Nully'),
(51, '2892', '33589', 'Blumeray'),
(51, '3581', '36507', 'Villiers-aux-Chenes'),
(51, '4034', '37746', 'Doulevant'),
(51, '9996', '10451', 'Perthes Les Brienne'),
(51, '8438', '14738', 'Juzanvigny'),
(51, '10141', '21680', 'Louze'),
(20, '8185', '24297', 'Louze'),
(51, '10629', '29188', 'Thilleux'),
(51, '9712', '31361', 'Rozieres'),
(51, '7844', '32259', 'Sommevoire'),
(51, '9000', '36220', 'Mertrud'),
(51, '9687', '41602', 'Dommartin'),
(51, '10900', '49570', 'Nomecourt'),
(51, '15872', '6507', 'Yevres-le-Petit'),
(51, '14118', '10647', 'Blignicourt'),
(51, '16297', '12287', 'Monimorehey-Beaufort'),
(51, '12974', '14404', 'Hampigny'),
(51, '15107', '14917', 'Lentilles'),
(51, '12384', '21180', 'Longville-sur-la-Laines'),
(51, '15293', '27244', 'Montier-en-Der'),
(51, '14972', '35750', 'Laneuville'),
(51, '16577', '41970', 'Brousseval'),
(51, '21088', '6301', 'St-leger-sous-Margerie'),
(10, '18701', '12107', 'Chavanges'),
(51, '18583', '13298', 'Chavanges'),
(51, '20074', '15342', 'Joncreuil'),
(51, '20438', '18901', 'Bally-le-Franc'),
(51, '18820', '21771', 'Droyes'),
(51, '18625', '29251', 'Planrupt'),
(51, '19911', '30234', 'Frampas'),
(51, '21609', '30824', 'Braucourt'),
(51, '18426', '34637', 'Voillecomte'),
(10, '18480', '40087', 'Wassy'),
(51, '17517', '40495', 'Wassy'),
(51, '22221', '42716', 'Villers-aux-Bois'),
(51, '22520', '45581', 'Troisfontaines'),
(51, '25906', '7797', 'Chapelaine'),
(51, '23749', '9142', 'Margerie-Hancourt'),
(51, '27357', '11458', 'Brandonville'),
(51, '25715', '15453', 'Drosnay'),
(51, '24516', '17730', 'Outines'),
(10, '24462', '22066', 'Outiens'),
(10, '25846', '24754', 'Der-Chantecoq'),
(51, '23493', '26007', 'Giffaumont-Champaubert'),
(10, '23637', '26732', 'Champaubert'),
(51, '27706', '34351', 'Eclaron-Braucourt'),
(51, '27594', '46619', 'Eurville-Bienville'),
(51, '32571', '1709', 'Le Meix Tiercelin'),
(51, '32368', '12225', 'St-Cheron'),
(10, '32085', '15349', 'St-Cheron'),
(51, '32305', '18894', 'St-remy-en-Bouzemont'),
(51, '31769', '22675', 'Artigoy'),
(10, '29288', '25695', 'Lac-Nuisement'),
(51, '29247', '28799', 'Lac-Nuisement'),
(10, '28530', '30366', 'Ste Liviere'),
(51, '29147', '31089', 'Ste Liviere'),
(51, '31976', '32281', 'Ambrieres'),
(10, '31828', '36762', 'St-Dizier'),
(51, '33265', '40465', 'St-Dizier'),
(51, '31869', '45945', 'Ancerville'),
(51, '36039', '17670', 'Cloyes-sur-Marne'),
(51, '38838', '20759', 'Ecriennes'),
(51, '38864', '23797', 'Thieblemont-Faremont'),
(51, '36672', '24905', 'Orconte'),
(51, '38145', '26644', 'Hentz-le-Hutier'),
(51, '35312', '30412', 'Sapignicourt'),
(51, '33925', '34776', 'Hallignicourt'),
(51, '36807', '35880', 'Villiers-en-Lieu'),
(51, '40466', '9802', 'Huiron'),
(50, '43073', '13909', 'Vitry-le-Francois'),
(51, '40526', '19276', 'Vauclerc'),
(51, '42118', '19711', 'Raims-la-Brulee'),
(51, '41881', '23822', 'Favresse'),
(51, '42248', '26009', 'Haussigremont'),
(51, '42732', '27329', 'Blesme'),
(51, '41135', '27273', 'Scrupt'),
(51, '41373', '41100', 'Trois-fontaines-l''Abbaye'),
(51, '46385', '10395', 'Loisy-sur-Marne'),
(51, '46155', '22636', 'Ponthion'),
(51, '48653', '25587', 'Heltz'),
(20, '46979', '26428', 'Ponthion'),
(51, '45742', '33468', 'Maurupt-le-Montois'),
(51, '49427', '37958', 'Sermaize-les-Bains'),
(51, '48847', '44595', 'Mogneville'),
(52, '26750', '-1000', 'International Boundary'),
(52, '26750', '1000', 'International Boundary'),
(52, '26750', '3000', 'International Boundary'),
(52, '26750', '5000', 'International Boundary'),
(52, '26750', '7000', 'International Boundary'),
(52, '26750', '9000', 'International Boundary'),
(52, '26750', '11000', 'International Boundary'),
(52, '26750', '13000', 'International Boundary'),
(52, '26750', '15000', 'International Boundary'),
(52, '26750', '17000', 'International Boundary'),
(52, '26750', '19000', 'International Boundary'),
(52, '26750', '21000', 'International Boundary'),
(52, '26750', '23000', 'International Boundary'),
(52, '26750', '25000', 'International Boundary'),
(52, '26750', '27000', 'International Boundary'),
(52, '26750', '29000', 'International Boundary'),
(52, '26750', '31000', 'International Boundary'),
(52, '26750', '33000', 'International Boundary'),
(52, '26750', '35000', 'International Boundary'),
(52, '26750', '37000', 'International Boundary'),
(52, '26750', '39000', 'International Boundary'),
(52, '26750', '41000', 'International Boundary'),
(52, '26750', '43000', 'International Boundary'),
(52, '26750', '45000', 'International Boundary'),
(52, '26750', '47000', 'International Boundary'),
(52, '26750', '49000', 'International Boundary'),
(52, '26750', '51000', 'International Boundary'),
(52, '26750', '53000', 'International Boundary');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
