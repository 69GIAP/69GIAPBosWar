# V1.0 21/10/2013
# Stenka script to create test database
# use for initial create will crush data
# 
CREATE DATABASE IF NOT EXISTS boswar_db ;
USE boswar_db;
SHOW TABLES;

DROP TABLE IF EXISTS Planes_on_field;
CREATE TABLE IF NOT EXISTS Planes_on_field
(
id INT UNIQUE AUTO_INCREMENT,
airfield_Name CHAR(31) DEFAULT "Unknown airfield",
Plane_Model VARCHAR(30),
Plane_Name VARCHAR(35),
Plane_Qty INT,
Plane_Altitude INT DEFAULT 0
)
;
#Test data load
INSERT INTO Planes_on_field (airfield_Name,Plane_Model,Plane_Name,Plane_Qty,Plane_Altitude)
VALUES
('GB Airstart','se5a','RED 1',-1,2000),
('GB Airstart','se5a','RED 2',5,0),
('GB Airstart','spad13','YELLOW 1',3,0)