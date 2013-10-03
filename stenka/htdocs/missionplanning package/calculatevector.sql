# V1.0
# peter's script to create test database
# use for loading a test column into database 1 crossley + 2 leyland then 1 crossley + 3 Leyland
# country numbers need validating
USE stalingrad1_db;
SHOW TABLES;
# calculation of end x and y on metres map when speed is in Km/h and duration in minutes and vector in degrees
UPDATE colveh_10 SET column_endx = column_startx + (((column_speed * 1000)*(column_duration / 60))* cos(RADIANS(column_vector)))
UPDATE colveh_10 SET column_endz = column_startz + (((column_speed * 1000)*(column_duration / 60))* sin(RADIANS(column_vector)))
UPDATE colveh_10 SET column_comment = "planning method time on vector"
SELECT column_startx,column_startz,column_vector,column_speed,column_duration FROM colveh_10;
SELECT column_endx,column_endz FROM colveh_10;
SELECT column_comment FROM colveh_10;






