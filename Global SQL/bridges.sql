# Stenka update 7/4/2014 debugging briges
# Stenka bugfix BoS countries 11/6/14
use boswar_db;
DROP TABLE IF EXISTS `bridges`;
CREATE TABLE IF NOT EXISTS `bridges` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `Name` char(31) PRIMARY KEY,
  `Model` char(20) DEFAULT NULL,
  `Description` varchar(80) DEFAULT NULL,
  `Country` enum('0','101','102','103','104','105','201','501','502','600','610','620','630','640') DEFAULT NULL,
  `CoalID` enum('0','1','2') DEFAULT NULL,
  `XPos` decimal(12,3) DEFAULT NULL,
  `ZPos` decimal(12,3) DEFAULT NULL,
  `YOri` decimal(5,2) DEFAULT NULL,
  `updated` tinyint(1) DEFAULT NULL,
  `damage_0` tinyint(1) DEFAULT 0,  
  `damage_1` tinyint(1) DEFAULT 0,
  `damage_2` tinyint(1) DEFAULT 0,
  `damage_3` tinyint(1) DEFAULT 0,
  `damage_4` tinyint(1) DEFAULT 0,
  `damage_5` tinyint(1) DEFAULT 0,
  `damage_6` tinyint(1) DEFAULT 0,
  `damage_7` tinyint(1) DEFAULT 0,
  `damage_8` tinyint(1) DEFAULT 0,
  `damage_9` tinyint(1) DEFAULT 0,
  `damage_10` tinyint(1) DEFAULT 0,
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;
