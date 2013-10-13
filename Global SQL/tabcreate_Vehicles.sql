# V1.0 29/09/2013
# Stenka script to create test database
# use for initial create will crush data
# 

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
moving_becomes,
max_speed_kmh,
cruise_speed_kmh
)
VALUES
('a7v','vehicles','a7v','a7v',6,4),
('benz_open','vehicles','benz','benz_open',50,20),
('benz_p','vehicles','benz','benz_p',50,20),
('benz_soft','vehicles','benz','benz_soft',50,20),
('ca1','vehicles','ca1','ca1',6,4),
('crossley','vehicles','crossley','crossley',50,20),
('daimlermarienfelde','vehicles','daimlermarienfelde','daimlermarienfelde',50,20),
('daimlermarienfelde_s','vehicles','daimlermarienfelde','daimlermarienfelde_s',50,20),
('ft17c','vehicles','ft17','ft17',6,4),
('ft17m','vehicles','ft17','ft17',6,4),
('leyland','vehicles','leyland','leyland',50,20),
('leylands','vehicles','leyland','leylands',50,20),
('mk4f','vehicles','mk4','mk4f',6,4),
('mk4fger','vehicles','mk4','mk4fger',6,4),
('mk4m','vehicles','mk4','mk4m',6,4),
('mk4mger','vehicles','mk4','mk4mger',6,4),
('mk5f','vehicles','mk5','mk5f',6,4),
('mk5m','vehicles','mk5','mk5m',6,4),
('quad','vehicles','quad','quad',50,20),
('quad_p','vehicles','quad','quad_p',50,20),
('quada','vehicles','quad','quada',50,20),
('stchamond','vehicles','stchamond','stchamond',6,4),
('whippet','vehicles','whippet','whippet',15,10)
;
INSERT INTO Vehicles
(
Model,
modelpath2,
modelpath3,
moving_becomes,
max_speed_kmh,
cruise_speed_kmh
)
VALUES
('13pdraaa','artillery','13pdraaa','leylands',0,0),
('45qf','artillery','45qf','leylands',0,0),
('75fg1897','artillery','75fg1897','leylands',0,0),
('77mmaaa','artillery','77mmaaa','daimlermarienfeld_s',0,0),
('daimleraaa','artillery','daimleraaa','daimleraaa',50,20),
('fk96','artillery','fk96','daimlermarienfeld_s',0,0),
('m13','artillery','m13','daimlermarienfelds',0,0),
('hotchkiss','artillery','machineguns','leylands',0,0),
('hotchkissaaa','artillery','machineguns','leylands',0,0),
('lmg08','artillery','machineguns','daimlermarienfeld_s',0,0),
('lmg08aaa','artillery','machineguns','daimlermarienfeld_s',0,0),
('mflak','artillery','mflak','daimlermarienfeld_s',0,0),
('thornycroftaaa','artillery','thornycroftaaa','thornycroftaaa',50,20)
;

