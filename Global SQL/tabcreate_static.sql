# V1.0 05/10/2013
# Stenka script to create test database
# use for initial create will crush data
# 

SHOW TABLES;

DROP TABLE IF EXISTS static;
CREATE TABLE IF NOT EXISTS static
(
id INT UNIQUE AUTO_INCREMENT,
static_Name CHAR(31) DEFAULT "STATIC 1 Object 1",
static_Model CHAR(20) DEFAULT "leyland",
static_Type ENUM("Vehicle","Block","Flag","Train") DEFAULT "Vehicle",
static_Desc VARCHAR(80),
static_Country ENUM("0","101","102","103","104","105","501","502","600","610","620","630","640") DEFAULT "105",
static_coalition ENUM("1","2") DEFAULT "1",
static_supplypoint ENUM("1","2","3") DEFAULT "1",
static_XPos DEC(12,3) DEFAULT 0,
static_ZPos DEC(12,3) DEFAULT 0,
static_YOri DEC(5,2) DEFAULT 0,
static_updated INT DEFAULT 0
)
;
