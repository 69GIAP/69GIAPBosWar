# V1.0 20/10/2013
# Stenka script to create test database
# use for initial create will crush data
# 
CREATE DATABASE IF NOT EXISTS boswar_db ;
USE boswar_db;
SHOW TABLES;

DROP TABLE IF EXISTS Airfield;
CREATE TABLE IF NOT EXISTS Airfield
(
id INT UNIQUE AUTO_INCREMENT,
airfield_Name CHAR(31) DEFAULT "Unknown airfield",
airfield_Model CHAR(20),
airfield_Desc VARCHAR(80),
airfield_Country ENUM("0","101","102","103","104","105","501","502","600","610","620","630","640") DEFAULT "0",
airfield_coalition ENUM("0","1","2","3","4","5","6","7") DEFAULT "0",
airfield_XPos DEC(12,3) DEFAULT 0,
airfield_ZPos DEC(12,3) DEFAULT 0,
airfield_YOri DEC(5,2) DEFAULT 0,
airfield_Hydrodrome INT DEFAULT 0,
airfield_enabled INT default 0,
airfield_updated INT DEFAULT 0
)
;
