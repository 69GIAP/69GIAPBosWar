# V1.0 05/10/2013
# Stenka script to create test database
# use for initial create will crush data
# 

SHOW TABLES;
DROP TABLE IF EXISTS Trains;
CREATE TABLE IF NOT EXISTS Trains
(
id	INT UNIQUE AUTO_INCREMENT,
Model	VARCHAR(30) NOT NULL UNIQUE,
game_name		SET('ROF','BOS') DEFAULT 'ROF',
modelpath2		VARCHAR(40),
modelpath3		VARCHAR(40),
max_speed_kmh	DEC(3) DEFAULT 50,
cruise_speed_kmh	DEC(3) DEFAULT 25 ,
range_m			DEC(4)
);
EXPLAIN Trains;
SHOW TABLES;
INSERT INTO Trains
(
Model,
modelpath2,
modelpath3,
max_speed_kmh,
cruise_speed_kmh
)
VALUES
('passa','trains','pass',0,0)
;
