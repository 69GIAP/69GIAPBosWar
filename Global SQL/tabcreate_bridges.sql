
CREATE DATABASE IF NOT EXISTS boswar_db ;
USE boswar;
SHOW TABLES;

DROP TABLE IF EXISTS bridges;
CREATE TABLE IF NOT EXISTS bridges
(
id INT UNIQUE AUTO_INCREMENT,
bridge_Name CHAR(31) DEFAULT "Bridge",
bridge_Model CHAR(20),
bridge_Desc VARCHAR(80),
bridge_Country ENUM("0","101","102","103","104","105","501","502","600","610","620","630","640") DEFAULT "0",
bridge_coalition ENUM("0","1","2") DEFAULT "0",
bridge_XPos DEC(12,3) DEFAULT 0,
bridge_ZPos DEC(12,3) DEFAULT 0,
bridge_YOri DEC(5,2) DEFAULT 0,
bridge_updated INT DEFAULT 0,
bridge_damage_1 INT DEFAULT 0,
bridge_damage_2 INT DEFAULT 0,
bridge_damage_3 INT DEFAULT 0,
bridge_damage_4 INT DEFAULT 0,
bridge_damage_5 INT DEFAULT 0,
bridge_damage_6 INT DEFAULT 0,
bridge_damage_7 INT DEFAULT 0,
bridge_damage_8 INT DEFAULT 0,
bridge_damage_9 INT DEFAULT 0,
bridge_damage_10 INT DEFAULT 0
)
;
