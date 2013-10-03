# V1.0 29/09/2013
# Stenka script to create campaign parameters field
# use for initial create will crush data
# 
CREATE DATABASE IF NOT EXISTS stalingrad1_db ;
USE stalingrad1_db;
SHOW TABLES;
DROP TABLE IF EXISTS outbox;
CREATE TABLE IF NOT EXISTS outbox
(
id	INT UNIQUE AUTO_INCREMENT,
lin			TEXT
)
;
SHOW TABLES;
DROP TABLE IF EXISTS cam_param;
CREATE TABLE IF NOT EXISTS cam_param
(
id	INT UNIQUE AUTO_INCREMENT,
cam_sim ENUM("ROF","BOS") DEFAULT "ROF",
cam_map VARCHAR(80) DEFAULT "Northern France",
cam_bot_left_X	DEC(12,3) DEFAULT 0,
cam_bot_left_Z	DEC(12,3) DEFAULT 0,
cam_top_right_X	DEC(12,3) DEFAULT 100000,
cam_top_right_Z	DEC(12,3) DEFAULT 100000,
cam_red_supply_1_x DEC(12,3) DEFAULT 100,
cam_red_supply_1_z DEC(12,3) DEFAULT 100,
cam_red_supply_2_x DEC(12,3) DEFAULT 1100,
cam_red_supply_2_z DEC(12,3) DEFAULT 100,
cam_red_supply_3_x DEC(12,3) DEFAULT 2100,
cam_red_supply_3_z DEC(12,3) DEFAULT 1100,
cam_blue_supply_1_x DEC(12,3) DEFAULT 100,
cam_blue_supply_1_z DEC(12,3) DEFAULT 1100,
cam_blue_supply_2_x DEC(12,3) DEFAULT 1100,
cam_blue_supply_2_z DEC(12,3) DEFAULT 1100,
cam_blue_supply_3_x DEC(12,3) DEFAULT 2100,
cam_blue_supply_3_z DEC(12,3) DEFAULT 1100,
cam_detect_dist DEC(4) DEFAULT 5000,
cam_ground_ai_level ENUM("1","2","3") DEFAULT "2",
cam_air_ai_level ENUM("1","2","3") DEFAULT "2",
cam_ground_max_speed_kmh DEC(3) DEFAULT 50,
cam_ground_transport_speed_kmh DEC(3) DEFAULT 10,
cam_ground_spacing DEC(3) DEFAULT 5,
cam_lineup_time DEC(3) DEFAULT 30,
cam_mission_time DEC(3) DEFAULT 90
)
;
SHOW TABLES;
INSERT INTO cam_param (id) VALUES (1);
DROP TABLE IF EXISTS col_10;
CREATE TABLE IF NOT EXISTS col_10
(
id	INT UNIQUE AUTO_INCREMENT,
col_name VARCHAR(80) DEFAULT "REGIMENT 1 Platoon 1",
col_type  ENUM("Vehicle","Artillery","Aerostat") DEFAULT "Artillery",
col_ikon_type ENUM("Transport","Armour","Flak","Baloon") DEFAULT "Flak",
col_moving ENUM("0","1") DEFAULT "0",
col_country ENUM("0","101","102","103","104","105","501","502","600","610","620","630","640"),
col_Xpos DEC(12,3) DEFAULT 0,
col_Zpos DEC(12,3) DEFAULT 0,
col_YOri DEC(5,2) DEFAULT 0,
)
;

DROP TABLE IF EXISTS vehicles;
CREATE TABLE IF NOT EXISTS vehicles
( 
id	INT UNIQUE AUTO_INCREMENT,
vehicle_name	CHAR(20) NOT NULL UNIQUE,
game_name		SET('ROF','BOS'),
model			CHAR(100) UNIQUE,
script			CHAR(100) UNIQUE,
max_speed_kmh	DEC(3),
cruise_speed_kmh	DEC(3),
range_m			DEC(4)
);
EXPLAIN vehicles;
SHOW TABLES;
DROP TABLE IF EXISTS artillery;
CREATE TABLE IF NOT EXISTS artillery
(
id	INT UNIQUE AUTO_INCREMENT,
vehicle_name	CHAR(20) NOT NULL UNIQUE,
game_name		SET('ROF','BOS'),
model			CHAR(100) UNIQUE,
script			CHAR(100) UNIQUE,
max_speed_kmh	DEC(3),
cruise_speed_kmh	DEC(3),
range_m			DEC(4)
);
EXPLAIN artillery;
SHOW TABLES;
DROP TABLE IF EXISTS colveh_10;
CREATE TABLE IF NOT EXISTS colveh_10
(
id	INT UNIQUE AUTO_INCREMENT,
column_name	CHAR(31) NOT NULL UNIQUE,
column__type	ENUM("Supply","Armour","Artillery","Engineer") DEFAULT "Supply",
column_static	SET("1","0") DEFAULT "1",
column_ailevel	ENUM("1","2","3") DEFAULT "2",
column_country	SET("101","102","103") DEFAULT "102",
column_startx	DEC(8,3),
column_startz	DEC(8,3),
column_activate	INT(3),
column_vector	DEC(6,3),
column_duration	INT(3),
mission_duration 	INT(3),
column_speed	INT(3),
column_destx	DEC(8,3),
column_destz	DEC(8,3),
column_deltax	DEC(8,3),
column_deltaz	DEC(8,3),
column_tripdist	DEC(8,3),
column_triptime	DOUBLE,
column_fractrav	DOUBLE,
column_endx	DEC(8,3),
column_endz	DEC(8,3),
column_spacex	DEC(8,3),
column_spacez	DEC(8,3),
veh_01_type	CHAR(20),
veh_01_startx	DEC(8,3),
veh_01_startz	DEC(8,3),
veh_02_type	CHAR(20),
veh_02_startx	DEC(8,3),
veh_02_startz	DEC(8,3),
veh_03_type	CHAR(20),
veh_03_startx	DEC(8,3),
veh_03_startz	DEC(8,3),
veh_04_type	CHAR(20),
veh_04_startx	DEC(8,3),
veh_04_startz	DEC(8,3),
veh_05_type	CHAR(20),
veh_05_startx	DEC(8,3),
veh_05_startz	DEC(8,3),
veh_06_type	CHAR(20),
veh_06_startx	DEC(8,3),
veh_06_startz	DEC(8,3),
veh_07_type	CHAR(20),
veh_07_startx	DEC(8,3),
veh_07_startz	DEC(8,3),
veh_08_type	CHAR(20),
veh_08_startx	DEC(8,3),
veh_08_startz	DEC(8,3),
veh_09_type	CHAR(20),
veh_09_startx	DEC(8,3),
veh_09_startz	DEC(8,3),
veh_10_type	CHAR(20),
veh_10_startx	DEC(8,3),
veh_10_startz	DEC(8,3),
column_comment CHAR(40)
);
EXPLAIN colveh_10;
