# V1.0
# peter's script to create test database
# use for loading a test column into database 1 crossley + 2 leyland then 1 crossley + 3 Leyland
# country numbers need validating
USE stalingrad1_db;
SHOW TABLES;
# calculation of end x and y on metres map when speed is in Km/h and duration in minutes and vector in degrees
UPDATE colveh_10 SET column_endx = column_startx + (((column_speed * 1000)*(column_duration / 60))* cos(RADIANS(column_vector)))
	WHERE column_duration <> 0;
UPDATE colveh_10 SET column_endz = column_startz + (((column_speed * 1000)*(column_duration / 60))* sin(RADIANS(column_vector)))
	WHERE column_duration <> 0;
UPDATE colveh_10 SET column_comment = "planning method time on vector"
	WHERE column_duration <> 0;
SELECT column_startx,column_startz,column_vector,column_speed,column_duration FROM colveh_10;
SELECT column_endx,column_endz FROM colveh_10;
SELECT column_comment FROM colveh_10;
# calculation of end x and z when destination is specified
UPDATE colveh_10 SET column_deltax = column_destx - column_startx;
UPDATE colveh_10 SET column_deltaz = column_destz - column_startz;
UPDATE colveh_10 SET column_tripdist = SQRT((column_deltax*column_deltax)+(column_deltaz*column_deltaz));
UPDATE colveh_10 SET column_triptime = ((column_tripdist/1000)*60)/column_speed;
SELECT column_tripdist,column_speed,column_triptime FROM colveh_10;
UPDATE colveh_10 SET column_fractrav = column_triptime/column_duration;
SELECT column_triptime,column_duration,column_fractrav FROM colveh_10;
UPDATE colveh_10 SET column_endx = column_destx
	WHERE column_duration = 0;
UPDATE colveh_10 SET column_endz = column_destz
	WHERE column_duration = 0;
UPDATE colveh_10 SET column_endx = column_startx + (column_deltax*column_fractrav)
	WHERE column_triptime < mission_duration AND column_duration = 0;
UPDATE colveh_10 SET column_endz = column_startz + (column_deltaz*column_fractrav)
	WHERE column_triptime < mission_duration AND column_duration = 0;	
UPDATE colveh_10 SET column_comment = "planning method destination"
	WHERE column_duration = 0;		
SELECT column_startx,column_startz,column_endx,column_endz FROM colveh_10;
# end of destination calculate





