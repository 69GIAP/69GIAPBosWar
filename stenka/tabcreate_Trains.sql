# V1.0 16/10/2013
# Stenka script to create test database
# use for initial create will crush data
# 
CREATE DATABASE IF NOT EXISTS stalingrad1_db ;
USE stalingrad1_db;
SHOW TABLES;
DROP TABLE IF EXISTS Trains;
CREATE TABLE IF NOT EXISTS Trains
(
id	INT UNIQUE AUTO_INCREMENT,
Model	VARCHAR(30) NOT NULL UNIQUE,
game_name		SET('ROF','BOS') DEFAULT 'ROF',
modelpath2		VARCHAR(40) DEFAULT 'trains',
modelpath3		VARCHAR(40),
max_speed_kmh	DEC(3) DEFAULT 0,
cruise_speed_kmh	DEC(3) DEFAULT 0 ,
range_m			DEC(4),
points			INT DEFAULT 0,
c1		VARCHAR(30),
c2		VARCHAR(30),
c3		VARCHAR(30),
c4		VARCHAR(30),
c5		VARCHAR(30),
c6		VARCHAR(30),
c7		VARCHAR(30),
c8		VARCHAR(30),
c9		VARCHAR(30),
c10		VARCHAR(30),
c1		VARCHAR(30),
c1		VARCHAR(30),
c1		VARCHAR(30),
c1		VARCHAR(30),
c1		VARCHAR(30)
);
EXPLAIN Trains;
SHOW TABLES;
INSERT INTO Trains
(
Model,
modelpath3,
max_speed_kmh,
cruise_speed_kmh,
points
)
VALUES
('passa','pass',0,0,0),
('boxb','box',0,0,80),
('boxnb','box',0,0,80),
('tankb','box',0,0,80),
('tanknb','box',0,0,80),
('g8','g8',50,30,200),
('g8t','g8',0,0,80),
('pass','pass',0,0,80),
('passac','pass',0,0,80),
('passc','pass',0,0,80),
('gondolab','platform',0,0,80),
('gondolanb','platform',0,0,80),
('platforma7v','platform',0,0,180),
('platformb','platform',0,0,80),
('platformmk4','platform',0,0,180),
('platformnb','platform',0,0,80),
('gondolab','platform',0,0,80)
;
