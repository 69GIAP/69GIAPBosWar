# V1.0
# peter's script to create test database
# use for initial create will crush data
# country numbers need validating
CREATE DATABASE IF NOT EXISTS stalingrad1_db ;
USE stalingrad1_db;
SHOW TABLES;
DROP TABLE IF EXISTS inbox;
CREATE TABLE IF NOT EXISTS inbox
(
id	INT UNIQUE AUTO_INCREMENT,
lin			TEXT
)
;
SHOW TABLES;
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
