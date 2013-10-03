# V1.1
# Stenka's script to create test table for the active airfields Operational 18/9/13
# use for initial create will crush data
# 
CREATE DATABASE IF NOT EXISTS stalingrad1_db ;
USE stalingrad1_db;
SHOW TABLES;
DROP TABLE IF EXISTS airfields;
CREATE TABLE IF NOT EXISTS airfields
(
id	INT UNIQUE AUTO_INCREMENT,
l1	CHAR(8) DEFAULT "Airfield",
l2	CHAR(1) DEFAULT "{",
af_Name VARCHAR(80) DEFAULT "Airfield with no name",
l3 	VARCHAR(200) DEFAULT '  Name = "Airfield with no name";',
af_Index 	INT DEFAULT 1,
l4	VARCHAR(200) DEFAULT '  Index = 1;',
af_LinkTrid 	INT DEFAULT 2,
l5	VARCHAR(200) DEFAULT "  LinkTrid = 2;",
af_Xpos 		DECIMAL(12,3) DEFAULT 100,
l6	VARCHAR(200) DEFAULT '  XPos = 100.000;',
af_Ypos 		DECIMAL(12,3) DEFAULT 0,
l7	VARCHAR(200) DEFAULT '  YPos = 0.000;',
af_Zpos 		DECIMAL(12,3) DEFAULT 0,
l8	VARCHAR(200) DEFAULT '  ZPos = 100.000;',
l9 	VARCHAR(200) DEFAULT '  XOri = 0.00;',
af_YOri			DECIMAL(5,2) DEFAULT 0,
l10 	VARCHAR(200) DEFAULT '  YOri = 0.00;',
l11 	VARCHAR(200) DEFAULT '  ZOri = 0.00;',
l12 	VARCHAR(200) DEFAULT '  Model = "";',
l13 	VARCHAR(200) DEFAULT '  Script = "";',
af_Country	CHAR(3)	DEFAULT '102',
l14 	VARCHAR(200) DEFAULT '  Country = 102;',
l15 	VARCHAR(200) DEFAULT '  Desc = "";',
l16 	VARCHAR(200) DEFAULT '  Durability = 25000;',
l17 	VARCHAR(200) DEFAULT '  DamageReport = 50;',
l18 	VARCHAR(200) DEFAULT '  DamageThreshold = 1;',
l19 	VARCHAR(200) DEFAULT '  DeleteAfterDeath = 0;',
# this is where I have to check for planes
l20 	VARCHAR(200) DEFAULT '  ReturnPlanes = 0;',
l21 	VARCHAR(200) DEFAULT '  Hydrodrome = 0;',
l22 	VARCHAR(200) DEFAULT '  RepairFriendlies = 0;',
l23 	VARCHAR(200) DEFAULT '  RearmFriendlies = 0;',
l24 	VARCHAR(200) DEFAULT '  RefuelFriendlies = 0;',
l25 	VARCHAR(200) DEFAULT '  RepairTime = 0;',
l26 	VARCHAR(200) DEFAULT '  RearmTime = 0;',
l27 	VARCHAR(200) DEFAULT '  RefuelTime = 0;',
l28 	VARCHAR(200) DEFAULT '  MaintenanceRadius = 1000;',
l29 	VARCHAR(200) DEFAULT '}',
l30 	VARCHAR(200) DEFAULT '',
l31 	VARCHAR(200) DEFAULT 'MCU_TR_Entity',
l32 	VARCHAR(200) DEFAULT '{',
# mcu index must match af_LinkTrid
mcu_Index 	INT DEFAULT 2,
l33 	VARCHAR(200) DEFAULT '  Index = 2;',
l34 	VARCHAR(200) DEFAULT '  Name = "";',
l35 	VARCHAR(200) DEFAULT '  Desc = "";',
l36 	VARCHAR(200) DEFAULT '  Targets = [];',
l37 	VARCHAR(200) DEFAULT '  Objects = [];',
# mcu x & z sould match airfield
l38 	VARCHAR(200) DEFAULT '  XPos = 100.000;',
l39 	VARCHAR(200) DEFAULT '  YPos = 0.000;',
l40 	VARCHAR(200) DEFAULT '  ZPos = 100.000;',
l41 	VARCHAR(200) DEFAULT '  XOri = 0.00;',
l42 	VARCHAR(200) DEFAULT '  YOri = 0.00;',
l43 	VARCHAR(200) DEFAULT '  ZOri = 0.00;',
af_Enabled CHAR(1) DEFAULT "1",
l44 	VARCHAR(200) DEFAULT '  Enabled = 1;',
# MisObjID should match af_Index
l45 	VARCHAR(200) DEFAULT '  MisObjID = 1;',
l46 	VARCHAR(200) DEFAULT '}',
p1_Model	VARCHAR(40),
p1_Number	VARCHAR(3) DEFAULT "-1",
p2_Model	VARCHAR(40),
p2_Number	VARCHAR(3)DEFAULT "-1",
p3_Model	VARCHAR(40),
p3_Number	VARCHAR(3)DEFAULT "-1",
p4_Model	VARCHAR(200),
p4_Number	VARCHAR(3)DEFAULT "-1",
p5_Model	VARCHAR(200),
p5_Number	VARCHAR(3)DEFAULT "-1",
p6_Model	VARCHAR(200),
p6_Number	VARCHAR(3)DEFAULT "-1"
)
;
SHOW TABLES;
EXPLAIN airfields;