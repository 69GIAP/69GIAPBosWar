# V1.0 16/10/2013
# Stenka script to create test database
# use for initial create will crush data
# 16/10/13 pointa added
# 
CREATE DATABASE IF NOT EXISTS stalingrad1_db ;
USE stalingrad1_db;
SHOW TABLES;
DROP TABLE IF EXISTS Blocks;
CREATE TABLE IF NOT EXISTS Blocks
(
id	INT UNIQUE AUTO_INCREMENT,
Model	VARCHAR(30) NOT NULL UNIQUE,
game_name		SET('ROF','BOS') DEFAULT 'ROF',
modelpath1		VARCHAR(40) DEFAULT "graphics",
modelpath2		VARCHAR(40),
modelpath3		VARCHAR(40),
points			INT
);
EXPLAIN Blocks;
SHOW TABLES;
INSERT INTO Blocks
(
Model,
modelpath2
)
VALUES
('tent01','battlefield'),
('tent_camp01','battlefield'),
('tent_camp02','battlefield'),
('tent_camp03','battlefield')
;

