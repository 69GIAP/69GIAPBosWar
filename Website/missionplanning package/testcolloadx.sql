# V1.0
# peter's script to create test database
# use for loading a test column into database 1 crossley + 2 leyland then 1 crossley + 3 Leyland
# country numbers need validating
USE stalingrad1_db;
SHOW TABLES;
INSERT INTO colveh_10
(
column_name,
colum_ailevel,
column_country,
column_startx,
column_startz,
column_activate,
column_vector,
column_duration,
column_speed,
column_spacex,
column_spacez,
veh_01_type,
veh_02_type,
veh_03_type
)
VALUES
(
"Regiment 1 Platoon 1",
"3",
"102",
300,
200,
3,
46,
3,
5,
5,
10,
"crossley",
"leyland",
""
)
,
(
"Regiment 1 Platoon 2",
"3",
"102",
300,
200,
3,
46,
3,
5,
5,
10,
"crossley",
"leyland",
"leyland"
)





;

