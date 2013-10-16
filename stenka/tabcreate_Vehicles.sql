# V1.0 16/10/2013
# Stenka script to create test database
# use for initial create will crush data
# 16/10/13 points added
CREATE DATABASE IF NOT EXISTS stalingrad1_db ;
USE stalingrad1_db;
SHOW TABLES;
DROP TABLE IF EXISTS Vehicles;
CREATE TABLE IF NOT EXISTS Vehicles
(
id	INT UNIQUE AUTO_INCREMENT,
Model	VARCHAR(30) NOT NULL UNIQUE,
moving_becomes VARCHAR(30),
game_name		SET('ROF','BOS') DEFAULT 'ROF',
modelpath2		VARCHAR(40),
modelpath3		VARCHAR(40),
max_speed_kmh	DEC(3) DEFAULT 20,
cruise_speed_kmh	DEC(3) DEFAULT 5 ,
range_m			DEC(4),
points			INT 
);
EXPLAIN Vehicles;
SHOW TABLES;
INSERT INTO Vehicles
(
Model,
modelpath2,
modelpath3,
moving_becomes,
max_speed_kmh,
cruise_speed_kmh,
points
)
VALUES
('a7v','vehicles','a7v','a7v',6,4,100),
('benz_open','vehicles','benz','benz_open',50,20,50),
('benz_p','vehicles','benz','benz_p',50,20,50),
('benz_soft','vehicles','benz','benz_soft',50,20,50),
('ca1','vehicles','ca1','ca1',6,4,50),
('crossley','vehicles','crossley','crossley',50,20,100),
('daimlermarienfelde','vehicles','daimlermarienfelde','daimlermarienfelde',50,20,50),
('daimlermarienfelde_s','vehicles','daimlermarienfelde','daimlermarienfelde_s',50,20,50),
('ft17c','vehicles','ft17','ft17',6,4,50),
('ft17m','vehicles','ft17','ft17',6,4,50),
('leyland','vehicles','leyland','leyland',50,20,50),
('leylands','vehicles','leyland','leylands',50,20,50),
('mk4f','vehicles','mk4','mk4f',6,4,100),
('mk4fger','vehicles','mk4','mk4fger',6,4,100),
('mk4m','vehicles','mk4','mk4m',6,4,100),
('mk4mger','vehicles','mk4','mk4mger',6,4,100),
('mk5f','vehicles','mk5','mk5f',6,4,110),
('mk5m','vehicles','mk5','mk5m',6,4,110),
('quad','vehicles','quad','quad',50,20,50),
('quad_p','vehicles','quad','quad_p',50,20,80),
('quada','vehicles','quad','quada',50,20,50),
('stchamond','vehicles','stchamond','stchamond',6,4,100),
('whippet','vehicles','whippet','whippet',15,10,100)
;
INSERT INTO Vehicles
(
Model,
modelpath2,
modelpath3,
moving_becomes,
max_speed_kmh,
cruise_speed_kmh,
points
)
VALUES
('13pdraaa','artillery','13pdraaa','leylands',0,0,80),
('45qf','artillery','45qf','leylands',0,0,80),
('75fg1897','artillery','75fg1897','leylands',0,0,80),
('77mmaaa','artillery','77mmaaa','daimlermarienfeld_s',0,0,80),
('daimleraaa','artillery','daimleraaa','daimleraaa',50,20,100),
('fk96','artillery','fk96','daimlermarienfeld_s',0,0,80),
('m13','artillery','m13','daimlermarienfelds',0,0,80),
('hotchkiss','artillery','machineguns','leylands',0,0,80),
('hotchkissaaa','artillery','machineguns','leylands',0,0,80),
('lmg08','artillery','machineguns','daimlermarienfeld_s',0,0,80),
('lmg08aaa','artillery','machineguns','daimlermarienfeld_s',0,0,80),
('mflak','artillery','mflak','daimlermarienfeld_s',0,0,80),
('thornycroftaaa','artillery','thornycroftaaa','thornycroftaaa',50,20,100)
;

