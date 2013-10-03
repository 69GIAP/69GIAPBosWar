# V1.0
# Stenkas script to add column to database or in fact any structural change to a table14/9/13
# if you are adding the key unique index it's best to dump the table to an csv file 
# then drop the table
# then recreate table then load csv
# writing a csv could also be use in backup
# you would pause and check your csv in spreadsheet before dropping the table which is irreversible
# this should be executed as a root user 
CREATE DATABASE IF NOT EXISTS stalingrad1_db ;
USE stalingrad1_db;
SHOW TABLES;
DROP TABLE IF EXISTS vegetables;
CREATE TABLE vegetables
(
veg_type	CHAR(10),
veg_desc	TEXT,
veg_qty		DEC(10,2)
)
;
SHOW TABLES;
EXPLAIN vegetables;
INSERT INTO vegetables 
(veg_type,veg_desc,veg_qty)
VALUES
("apples","round and red",10),
("oranges","round and orange",13.4),
("grapes","best put in wine",11000)
;
SELECT * FROM vegetables;
# now we dump to a file
SELECT * FROM vegetables INTO OUTFILE "c:/BOSWAR/vegetables.csv" 
FIELDS TERMINATED BY ','
# ENCLOSED BY '"'
LINES TERMINATED BY "\r"
;
# check the result before next step
DROP TABLE IF EXISTS vegetables;
SHOW TABLES;
CREATE TABLE IF NOT EXISTS vegetables
(
id			INT AUTO_INCREMENT PRIMARY KEY,
veg_type	CHAR(10),
veg_desc	TEXT,
veg_qty		DEC(10,2)
)
;
SHOW TABLES;
EXPLAIN vegetables;
# now we load back our data
LOAD DATA INFILE "c:/BOSWAR/vegetables.csv"
INTO TABLE vegetables 
FIELDS TERMINATED BY ','
# ENCLOSED BY '"'
LINES TERMINATED BY "\r"
(veg_type,veg_desc,veg_qty)
;
SELECT * FROM vegetables;