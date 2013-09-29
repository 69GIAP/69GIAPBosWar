# V1.0 29/09/2013
# Stenka script to create test database
# use for initial create will crush data
# 
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
range_m			DEC(4)
);
EXPLAIN Vehicles;
SHOW TABLES;
INSERT INTO Vehicles
(
Model,
modelpath2,
modelpath3,
moving_becomes
)
VALUES
('a7v','vehicles','a7v','a7v'),
('benz_open','vehicles','benz','benz_open'),
('benz_p','vehicles','benz','benz_p'),
('benz_soft','vehicles','benz','benz_soft'),
('ca1','vehicles','ca1','ca1'),
('crossley','vehicles','crossley','crossley'),
('daimlermarienfelde','vehicles','daimlermarienfelde','daimlermarienfelde'),
('daimlermarienfelde_s','vehicles','daimlermarienfelde','daimlermarienfelde'),
('ft17c','vehicles','ft17','ft17'),
('ft17m','vehicles','ft17','ft17'),
('leyland','vehicles','leyland','leyland'),
('leylands','vehicles','leyland','leylands'),
('mk4f','vehicles','mk4','mk4f'),
('mk4fger','vehicles','mk4','mk4fger'),
('mk4m','vehicles','mk4','mk4m'),
('mk4mger','vehicles','mk4','mk4mger'),
('mk5f','vehicles','mk5','mk5f'),
('mk5m','vehicles','mk5','mk5m'),
('quad','vehicles','quad','quad'),
('quad_p','vehicles','quad','quad_p'),
('quada','vehicles','quad','quada'),
('stchamond','vehicles','stchamond','stchamond'),
('whippet','vehicles','whippet','whippet')
;
INSERT INTO Vehicles
(
Model,
modelpath2,
modelpath3,
moving_becomes
)
VALUES
('13pdraaa','artillery','13pdraaa','leylands'),
('45qf','artillery','45qf','leyland_s'),
('75fg1897','artillery','75fg1897','leyland_s'),
('77mmaaa','artillery','77mmaaa','daimlermarienfeld_s'),
('daimleraaa','artillery','daimleraaa','daimleraaa'),
('fk96','artillery','fk96','daimlermarienfeld_s'),
('m13','artillery','m13','daimlermarienfeld_s'),
('hotchkiss','artillery','machineguns','leyland_s'),
('hotchkissaaa','artillery','machineguns','leyland_s'),
('lmg08','artillery','machineguns','daimlermarienfeld_s'),
('lmg08aaa','artillery','machineguns','daimlermarienfeld_s'),
('mflak','artillery','mflak','daimlermarienfeld_s'),
('thornycroftaaa','artillery','thornycroftaaa','thornycroftaaa')
;

