# V1.0 29/09/2013
# Stenka script to create test database
# use for initial create will crush data
# 
CREATE DATABASE IF NOT EXISTS stalingrad1_db ;
USE stalingrad1_db;
SHOW TABLES;

DROP TABLE IF EXISTS col_10;
CREATE TABLE IF NOT EXISTS col_10
(
id INT UNIQUE AUTO_INCREMENT,
col_Name CHAR(31) DEFAULT "REGIMENT 1 Platoon 1",
col_moving ENUM("0","1") DEFAULT "0",
col_Model CHAR(20) DEFAULT "leyland",
col_Desc VARCHAR(80),
col_Country ENUM("0","101","102","103","104","105","501","502","600","610","620","630","640") DEFAULT "105",
col_coalition ENUM("1","2") DEFAULT "1",
col_supplypoint ENUM("1","2","3") DEFAULT "1",
col_qty INT DEFAULT 1,
col_XPos DEC(12,3) DEFAULT 0,
col_ZPos DEC(12,3) DEFAULT 0,
col_YOri DEC(5,2) DEFAULT 0,
col_dest_XPos DEC(12,3) DEFAULT 0,
col_dest_ZPos DEC(12,3) DEFAULT 0,
col_speed INT DEFAULT 10,
col_formation INT DEFAULT 4
)
;
