# V1.0
# Stenka 21/9/13
# loading campaign variables into memory
<?php
# require is connecting user peter to stalingrad1 database
# here
require('require.php');
$q='SELECT * FROM cam_param WHERE id = 1';
$r=mysqli_query($dbc,$q);
$r_data = mysqli_fetch_row($r);
if ($r_data[0]) 
	{
	echo "<br> Zero vari:".$r_data[0];
	echo "<br> One vari:".$r_data[1];
	define('CAM_SIM',$r_data[1]);
	echo "<br> SIM is:".'CAM_SIM';
	define('CAM_MAP',$r_data[2]);	
	echo "<br> MAP is:".'CAM_MAP';
	define('CAM_BOT_LEFT_X',$r_data[3]);	
	echo "<br> Bottom left X of sector is:".'CAM_BOT_LEFT_X';	
	define('CAM_BOT_LEFT_Z',$r_data[4]);	
	echo "<br> Bottom left Z of sector is:".'CAM_BOT_LEFT_Z';		
	define('CAM_TOP_RIGHT_X',$r_data[5]);	
	echo "<br> Top Right X of sector is:".'CAM_TOP_RIGHT_X';	
	define('CAM_TOP_RIGHT_Z',$r_data[6]);	
	echo "<br> Top Right Z of sector is:".'CAM_TOP_RIGHT_Z';	
	define('CAM_RED_SUPPLY_1_X',$r_data[7]);	
	echo "<br> Red Supply 1 x is:".'CAM_RED_SUPPLY_1_X';	
	define('CAM_RED_SUPPLY_1_Z',$r_data[8]);	
	echo "<br> Red Supply 1 z is:".'CAM_RED_SUPPLY_1_Z';
	define('CAM_RED_SUPPLY_2_X',$r_data[9]);	
	echo "<br> Red Supply 2 x is:".'CAM_RED_SUPPLY_2_X';	
	define('CAM_RED_SUPPLY_2_Z',$r_data[10]);	
	echo "<br> Red Supply 2 z is:".'CAM_RED_SUPPLY_2_Z';
	define('CAM_RED_SUPPLY_3_X',$r_data[11]);	
	echo "<br> Red Supply 3 x is:".'CAM_RED_SUPPLY_3_X';	
	define('CAM_RED_SUPPLY_3_Z',$r_data[12]);	
	echo "<br> Red Supply 3 z is:".'CAM_RED_SUPPLY_3_Z';	
		
	define('CAM_BLUE_SUPPLY_1_X',$r_data[13]);	
	echo "<br> Blue Supply 1 x is:".'CAM_BLUE_SUPPLY_1_X';	
	define('CAM_BLUE_SUPPLY_1_Z',$r_data[14]);	
	echo "<br> Blue Supply 1 z is:".'CAM_BLUE_SUPPLY_1_Z';
	define('CAM_BLUE_SUPPLY_2_X',$r_data[15]);	
	echo "<br> Blue Supply 2 x is:".'CAM_BLUE_SUPPLY_2_X';	
	define('CAM_BLUE_SUPPLY_2_Z',$r_data[16]);	
	echo "<br> Blue Supply 2 z is:".'CAM_BLUE_SUPPLY_2_Z';
	define('CAM_BLUE_SUPPLY_3_X',$r_data[17]);	
	echo "<br> Blue Supply 3 x is:".'CAM_BLUE_SUPPLY_3_X';	
	define('CAM_BLUE_SUPPLY_3_Z',$r_data[18]);	
	echo "<br> Blue Supply 3 z is:".'CAM_BLUE_SUPPLY_3_Z';	
	
	define('CAM_DETECT_DIST',$r_data[19]);	
	echo "<br> Detect distance is:".'CAM_DETECT_DIST';
	define('CAM_GROUND_AI_LEVEL',$r_data[20]);	
	echo "<br> Ground ai level is:".'CAM_GROUND_AI_LEVEL';	
	define('CAM_AIR_AI_LEVEL',$r_data[21]);	
	echo "<br> Air ai level is:".'CAM_AIR_AI_LEVEL';
	define('CAM_GROUND_MAX_SPEED',$r_data[22]);	
	echo "<br> Ground max speed is:".'CAM_GROUND_MAX_SPEED';	
	define('CAM_GROUND_TRANSPORT_SPEED',$r_data[23]);	
	echo "<br> Ground transport speed is:".'CAM_GROUND_TRANSPORT_SPEED';		
	define('CAM_GROUND_SPACING',$r_data[24]);	
	echo "<br> Ground spacing is:".'CAM_GROUND_SPACING';	
	define('CAM_LINEUP_TIME',$r_data[25]);	
	echo "<br> Lineup time:".'CAM_LINEUP_TIME';	
	define('CAM_MISSION_TIME',$r_data[26]);	
	echo "<br> Mission time:".'CAM_MISSION_TIME';
	define('CAM_DETECT_GROUND',$r_data[27]);	
	echo "<br> Ground detect radius:".'CAM_DETECT_GROUND';
	define('CAM_DETECT_AIR',$r_data[28]);	
	echo "<br> Air detect radius:".'CAM_DETECT_AIR';
	define('CAM_DETECT_OFF_TIME',$r_data[29]);	
	echo "<br> Deactivate time:".'CAM_DETECT_OFF_TIME';	
	}	
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
#EXIT;