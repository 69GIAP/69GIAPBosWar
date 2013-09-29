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
	WHERE column_duration <> 0;
UPDATE colveh_10 SET column_endz = column_destz
	WHERE column_duration <> 0;
UPDATE colveh_10 SET column_endx = column_startx + (column_deltax*column_fractrav)
	WHERE column_triptime < mission_duration AND column_duration <> 0;
UPDATE colveh_10 SET column_endz = column_startz + (column_deltaz*column_fractrav)
	WHERE column_triptime < mission_duration AND column_duration <> 0;	
SELECT column_startx,column_startz,column_endx,column_endz FROM colveh_10;
# end of destination calculate
# set the first vehicle X & Z = column start position
UPDATE colveh_10 SET veh_01_startx = column_startx;
UPDATE colveh_10 SET veh_01_startz = column_startz;
SELECT column_name,veh_01_startx,veh_01_startz FROM colveh_10;
# set second vehicle x & z = vehicle 1 plus spacing
UPDATE colveh_10 SET veh_02_startx = (veh_01_startx + column_spacex);
UPDATE colveh_10 SET veh_02_startz = (veh_01_startz + column_spacez);
UPDATE colveh_10 SET veh_02_startx = (veh_01_startx - column_spacex)
	WHERE column_vector > 0 AND column_vector <= 180;
UPDATE colveh_10 SET veh_02_startz = (veh_01_startz - column_spacez)
	WHERE column_vector > 90 AND column_vector <= 270;
SELECT column_name,veh_02_startx,veh_02_startz FROM colveh_10;
# set third vehicle x & z = vehicle 2 plus spacing
UPDATE colveh_10 SET veh_03_startx = (veh_02_startx + column_spacex);
UPDATE colveh_10 SET veh_03_startz = (veh_02_startz + column_spacez);
UPDATE colveh_10 SET veh_03_startx = (veh_02_startx - column_spacex)
	WHERE column_vector > 0 AND column_vector <= 180;
UPDATE colveh_10 SET veh_03_startz = (veh_02_startz - column_spacez)
	WHERE column_vector > 90 AND column_vector <= 270;
SELECT column_name,veh_03_startx,veh_03_startz FROM colveh_10;
# set 4th vehicle x & z = vehicle 3 plus spacing
UPDATE colveh_10 SET veh_04_startx = (veh_03_startx + column_spacex);
UPDATE colveh_10 SET veh_04_startz = (veh_03_startz + column_spacez);
UPDATE colveh_10 SET veh_04_startx = (veh_03_startx - column_spacex)
	WHERE column_vector > 0 AND column_vector <= 180;
UPDATE colveh_10 SET veh_04_startz = (veh_03_startz - column_spacez)
	WHERE column_vector > 90 AND column_vector <= 270;
SELECT column_name,veh_04_startx,veh_04_startz FROM colveh_10;
# set 5th vehicle x & z = vehicle 4 plus spacing
UPDATE colveh_10 SET veh_05_startx = (veh_04_startx + column_spacex);
UPDATE colveh_10 SET veh_05_startz = (veh_04_startz + column_spacez);
UPDATE colveh_10 SET veh_05_startx = (veh_04_startx - column_spacex)
	WHERE column_vector > 0 AND column_vector <= 180;
UPDATE colveh_10 SET veh_05_startz = (veh_04_startz - column_spacez)
	WHERE column_vector > 90 AND column_vector <= 270;
SELECT column_name,veh_05_startx,veh_05_startz FROM colveh_10;
# set 6th vehicle x & z = vehicle 5 plus spacing
UPDATE colveh_10 SET veh_06_startx = (veh_05_startx + column_spacex);
UPDATE colveh_10 SET veh_06_startz = (veh_05_startz + column_spacez);
UPDATE colveh_10 SET veh_06_startx = (veh_05_startx - column_spacex)
	WHERE column_vector > 0 AND column_vector <= 180;
UPDATE colveh_10 SET veh_06_startz = (veh_05_startz - column_spacez)
	WHERE column_vector > 90 AND column_vector <= 270;
SELECT column_name,veh_06_startx,veh_06_startz FROM colveh_10;
# set 7th vehicle x & z = vehicle 6 plus spacing
UPDATE colveh_10 SET veh_07_startx = (veh_06_startx + column_spacex);
UPDATE colveh_10 SET veh_07_startz = (veh_06_startz + column_spacez);
UPDATE colveh_10 SET veh_07_startx = (veh_06_startx - column_spacex)
	WHERE column_vector > 0 AND column_vector <= 180;
UPDATE colveh_10 SET veh_07_startz = (veh_06_startz - column_spacez)
	WHERE column_vector > 90 AND column_vector <= 270;
SELECT column_name,veh_07_startx,veh_07_startz FROM colveh_10;
# set 8th vehicle x & z = vehicle 7 plus spacing
UPDATE colveh_10 SET veh_08_startx = (veh_07_startx + column_spacex);
UPDATE colveh_10 SET veh_08_startz = (veh_07_startz + column_spacez);
UPDATE colveh_10 SET veh_08_startx = (veh_07_startx - column_spacex)
	WHERE column_vector > 0 AND column_vector <= 180;
UPDATE colveh_10 SET veh_08_startz = (veh_07_startz - column_spacez)
	WHERE column_vector > 90 AND column_vector <= 270;
SELECT column_name,veh_08_startx,veh_08_startz FROM colveh_10;
# set 9th vehicle x & z = vehicle 8 plus spacing
UPDATE colveh_10 SET veh_09_startx = (veh_08_startx + column_spacex);
UPDATE colveh_10 SET veh_09_startz = (veh_08_startz + column_spacez);
UPDATE colveh_10 SET veh_09_startx = (veh_08_startx - column_spacex)
	WHERE column_vector > 0 AND column_vector <= 180;
UPDATE colveh_10 SET veh_09_startz = (veh_08_startz - column_spacez)
	WHERE column_vector > 90 AND column_vector <= 270;
SELECT column_name,veh_09_startx,veh_09_startz FROM colveh_10;
# set 10th vehicle x & z = vehicle 9 plus spacing
UPDATE colveh_10 SET veh_10_startx = (veh_09_startx + column_spacex);
UPDATE colveh_10 SET veh_10_startz = (veh_09_startz + column_spacez);
UPDATE colveh_10 SET veh_10_startx = (veh_09_startx - column_spacex)
	WHERE column_vector > 0 AND column_vector <= 180;
UPDATE colveh_10 SET veh_10_startz = (veh_09_startz - column_spacez)
	WHERE column_vector > 90 AND column_vector <= 270;
SELECT column_name,veh_10_startx,veh_10_startz FROM colveh_10;



# calculation of end x and z when destination is specified
UPDATE colveh_10 SET column_deltax = column_destx - column_startx;
UPDATE colveh_10 SET column_deltaz = column_destz - column_startz;
UPDATE colveh_10 SET column_tripdist = SQRT((column_deltax*column_deltax)+(column_deltaz*column_deltaz));
UPDATE colveh_10 SET column_triptime = ((column_tripdist/1000)*60)/column_speed;
SELECT column_tripdist,column_speed,column_triptime FROM colveh_10;
UPDATE colveh_10 SET column_fractrav = column_triptime/column_duration;
SELECT column_triptime,column_duration,column_fractrav FROM colveh_10;
UPDATE colveh_10 SET column_endx = column_destx
	WHERE column_duration <> 0;
UPDATE colveh_10 SET column_endz = column_destz
	WHERE column_duration <> 0;
UPDATE colveh_10 SET column_endx = column_startx + (column_deltax*column_fractrav)
	WHERE column_triptime < mission_duration AND column_duration <> 0;
UPDATE colveh_10 SET column_endz = column_startz + (column_deltaz*column_fractrav)
	WHERE column_triptime < mission_duration AND column_duration <> 0;	
SELECT column_startx,column_startz,column_endx,column_endz FROM colveh_10;












