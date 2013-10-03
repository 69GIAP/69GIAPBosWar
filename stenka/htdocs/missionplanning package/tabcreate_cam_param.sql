# V1.0 29/09/2013
# Stenka script to create campaign parameters field
# use for initial create will crush data
# 
CREATE DATABASE IF NOT EXISTS stalingrad1_db ;
USE stalingrad1_db;
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
