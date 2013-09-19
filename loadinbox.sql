# V1.0
# Stenka's script to load group file into inbox table 9/9/13
# prototype 
USE stalingrad1_db;
SHOW TABLES;
# I create a new table with an id wich gives me a line number starting at 1 big text field
# to recieve each from the group file then a text value field and a numeric value field 
# into which I may parse an interesting value from the line
DROP TABLE IF EXISTS inbox;
CREATE TABLE IF NOT EXISTS inbox
(
id	INT UNIQUE AUTO_INCREMENT,
lin			TEXT,
data_value	VARCHAR(200),
data_dec_value DOUBLE
)
;
# I load the group file received from ROF into the lin field with new line every time
# it encounters a linefeed
LOAD DATA INFILE "c:/Program files/Rise of Flight/data/Multiplayer/Dogfight/airfields_in.Group"
 	INTO TABLE inbox 
	LINES TERMINATED BY "
"
(lin)
;
# Now try and pick out interesting data values from where they occur in the line
# first example, When the line contains "  Name " put everything from character 10 onwards
# into data_value field
UPDATE inbox SET data_value = SUBSTR(lin FROM 10) WHERE lin REGEXP("  Name = ");
UPDATE inbox SET data_value = SUBSTR(lin FROM 10) WHERE lin REGEXP("  Index = ");
UPDATE inbox SET data_value = SUBSTR(lin FROM 13) WHERE lin REGEXP("  LinkTrid = ");
UPDATE inbox SET data_value = SUBSTR(lin FROM 9) WHERE lin REGEXP("  XPos = ");
UPDATE inbox SET data_value = SUBSTR(lin FROM 9) WHERE lin REGEXP("  YPos = ");
UPDATE inbox SET data_value = SUBSTR(lin FROM 9) WHERE lin REGEXP("  ZPos = ");
UPDATE inbox SET data_value = SUBSTR(lin FROM 9) WHERE lin REGEXP("  YOri = ");
UPDATE inbox SET data_value = SUBSTR(lin FROM 9) WHERE lin REGEXP("  Country = ");
# strip off all padding spaces from data_value
UPDATE inbox SET data_value = ltrim(data_value);
UPDATE inbox SET data_value = rtrim(data_value);
# now strip off ";" from end of data_value
UPDATE inbox SET data_value = REPLACE(data_value,';',' ');
UPDATE inbox SET data_value = ltrim(data_value);
# now copy the text value field to a numeric value field
UPDATE inbox SET data_dec_value = cast(data_value AS SIGNED INTEGER);
SELECT data_dec_value from inbox;
# write result with stripped trailing spaces to output file so I can inspect the result in notepad++
# SELECT RTRIM(lin),data_value,FORMAT(data_dec_value,3) FROM inbox INTO OUTFILE "c:/BOSWAR/testout.Group";
# or
# SELECT data_value,FORMAT(data_dec_value,3) FROM inbox INTO OUTFILE "c:/BOSWAR/testout.Group";
