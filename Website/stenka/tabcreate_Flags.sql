# V1.0 05/10/2013
# Stenka script to create test database
# use for initial create will crush data
# 
CREATE DATABASE IF NOT EXISTS stalingrad1_db ;
USE stalingrad1_db;
SHOW TABLES;
DROP TABLE IF EXISTS Flags;
CREATE TABLE IF NOT EXISTS Flags
(
id	INT UNIQUE AUTO_INCREMENT,
Model	VARCHAR(30) NOT NULL UNIQUE,
game_name		SET('ROF','BOS') DEFAULT 'ROF',
modelpath2		VARCHAR(40),
modelpath3		VARCHAR(40)
);
EXPLAIN Flags;
SHOW TABLES;
INSERT INTO Flags
(
Model,
modelpath2
)
VALUES
('windsock','flag')
;
