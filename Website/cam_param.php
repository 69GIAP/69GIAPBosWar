# V1.1
# Stenka 14/3/14
# loading campaign variables into memory
<?php
# require is connecting user to campaign database
# here
#require('../connect_db.php');
$q='SELECT * FROM campaign_settings WHERE id = 1';
$r=mysqli_query($dbc,$q);
$r_data = mysqli_fetch_row($r);
if ($r_data[0]) 
	{
	echo "<br> Record Number:".$r_data[0];
	define(CAM_SIM,$r_data[1]);
	echo "<br> SIM is:".CAM_SIM;
	define(CAM_CAMPAIGN,$r_data[2]);
	echo "<br> Campaign is:".CAM_CAMPAIGN;	
	define(CAM_MAP,$r_data[8]);
	echo "<br> Map is:".CAM_MAP;		
	define(CAM_BOT_LEFT_X,$r_data[26]);	
	echo "<br> Bottom left X of sector is:".CAM_BOT_LEFT_X;	
	define(CAM_BOT_LEFT_Z,$r_data[27]);	
	echo "<br> Bottom left Z of sector is:".CAM_BOT_LEFT_Z;		
	define(CAM_TOP_RIGHT_X,$r_data[28]);	
	echo "<br> Top Right X of sector is:".CAM_TOP_RIGHT_X;	
	define(CAM_TOP_RIGHT_Z,$r_data[29]);	
	echo "<br> Top Right Z of sector is:".CAM_TOP_RIGHT_Z;	
	define(CAM_AIR_DETECT_DIST,$r_data[30]);	
	echo "<br> Air Detect distance is:".CAM_AIR_DETECT_DIST;
	define(CAM_GROUND_DETECT_DIST,$r_data[31]);	
	echo "<br> Ground Detect distance is:".CAM_GROUND_DETECT_DIST;	
	define(CAM_GROUND_AI_LEVEL,$r_data[33]);	
	echo "<br> Ground ai level is:".CAM_GROUND_AI_LEVEL;	
	define(CAM_AIR_AI_LEVEL,$r_data[32]);	
	echo "<br> Air ai level is:".CAM_AIR_AI_LEVEL;
	define(CAM_GROUND_MAX_SPEED,$r_data[34]);	
	echo "<br> Ground max speed is:".CAM_GROUND_MAX_SPEED;	
	define(CAM_GROUND_TRANSPORT_SPEED,$r_data[35]);	
	echo "<br> Ground transport speed is:".CAM_GROUND_TRANSPORT_SPEED;		
	define(CAM_GROUND_SPACING,$r_data[36]);	
	echo "<br> Ground spacing is:".CAM_GROUND_SPACING;	
	define(CAM_LINEUP_TIME,$r_data[37]);	
	echo "<br> Lineup time:".CAM_LINEUP_TIME;	
	define(CAM_MISSION_TIME,$r_data[38]);	
	echo "<br> Mission time:".CAM_MISSION_TIME;
	define(CAM_DETECT_GROUND,$r_data[31]);	
	echo "<br> Ground detect radius:".CAM_DETECT_GROUND;
	define(CAM_DETECT_AIR,$r_data[30]);	
	echo "<br> Air detect radius:".CAM_DETECT_AIR;
	define(CAM_DETECT_OFF_TIME,$r_data[39]);	
	echo "<br> Deactivate time:".CAM_DETECT_OFF_TIME;	
	}	
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
$q='SELECT * FROM key_points WHERE pointName = "Entente Supply Point 1"';
$r=mysqli_query($dbc,$q);
$r_data = mysqli_fetch_row($r);
if ($r_data[0]) 
	{
	define(CAM_ALLIES_SUPPLY_1_X,$r_data[1]);	
	echo "<br> Allies Supply 1 x is:".CAM_ALLIES_SUPPLY_1_X;	
	define(CAM_ALLIES_SUPPLY_1_Z,$r_data[2]);	
	echo "<br> Allies Supply 1 z is:".CAM_ALLIES_SUPPLY_1_Z;
	}	
else
	{echo'<p>'.mysqli_error($dbc).'</p>';
	define(CAM_ALLIES_SUPPLY_1_X,CAM_BOT_LEFT_X);	
	echo "<br> Allies Supply 1 x is:".CAM_ALLIES_SUPPLY_1_X;
	define(CAM_ALLIES_SUPPLY_1_Z,CAM_BOT_LEFT_Z);
	echo "<br> Allies Supply 1 z is:".CAM_ALLIES_SUPPLY_1_Z;
	}
$q='SELECT * FROM key_points WHERE pointName = "Entente Supply Point 2"';
$r=mysqli_query($dbc,$q);
$r_data = mysqli_fetch_row($r);
if ($r_data[0]) 
	{
	define(CAM_ALLIES_SUPPLY_2_X,$r_data[1]);	
	echo "<br> Allies Supply 2 x is:".CAM_ALLIES_SUPPLY_2_X;	
	define(CAM_ALLIES_SUPPLY_2_Z,$r_data[2]);	
	echo "<br> Allies Supply 2 z is:".CAM_ALLIES_SUPPLY_2_Z;
	}	
else
	{echo'<p>'.mysqli_error($dbc).'</p>';
	define(CAM_ALLIES_SUPPLY_2_X,CAM_BOT_LEFT_X);	
	echo "<br> Allies Supply 2 x is:".CAM_ALLIES_SUPPLY_2_X;
	define(CAM_ALLIES_SUPPLY_2_Z,CAM_BOT_LEFT_Z);
	echo "<br> Allies Supply 2 z is:".CAM_ALLIES_SUPPLY_2_Z;
	}
$q='SELECT * FROM key_points WHERE pointName = "Entente Supply Point 3"';
$r=mysqli_query($dbc,$q);
$r_data = mysqli_fetch_row($r);
if ($r_data[0]) 
	{
	define(CAM_ALLIES_SUPPLY_3_X,$r_data[1]);	
	echo "<br> Allies Supply 3 x is:".CAM_ALLIES_SUPPLY_3_X;	
	define(CAM_ALLIES_SUPPLY_3_Z,$r_data[2]);	
	echo "<br> Allies Supply 3 z is:".CAM_ALLIES_SUPPLY_3_Z;
	}	
else
	{echo'<p>'.mysqli_error($dbc).'</p>';
	define(CAM_ALLIES_SUPPLY_3_X,CAM_BOT_LEFT_X);	
	echo "<br> Allies Supply 3 x is:".CAM_ALLIES_SUPPLY_3_X;
	define(CAM_ALLIES_SUPPLY_3_Z,CAM_BOT_LEFT_Z);
	echo "<br> Allies Supply 3 z is:".CAM_ALLIES_SUPPLY_3_Z;
	}
	$q='SELECT * FROM key_points WHERE pointName = "Central Powers Supply Point 1"';
$r=mysqli_query($dbc,$q);
$r_data = mysqli_fetch_row($r);
if ($r_data[0]) 
	{
	define(CAM_CENTRAL_SUPPLY_1_X,$r_data[1]);	
	echo "<br> Central Supply 1 x is:".CAM_CENTRAL_SUPPLY_1_X;	
	define(CAM_CENTRAL_SUPPLY_1_Z,$r_data[2]);	
	echo "<br> Central Supply 1 z is:".CAM_CENTRAL_SUPPLY_1_Z;
	}	
else
	{echo'<p>'.mysqli_error($dbc).'</p>';
	define(CAM_CENTRAL_SUPPLY_1_X,CAM_BOT_LEFT_X);	
	echo "<br> Central Supply 1 x is:".CAM_CENTRAL_SUPPLY_1_X;
	define(CAM_CENTRAL_SUPPLY_1_Z,CAM_BOT_LEFT_Z);
	echo "<br> Central Supply 1 z is:".CAM_CENTRAL_SUPPLY_1_Z;
	}
$q='SELECT * FROM key_points WHERE pointName = "Central Powers Supply Point 2"';
$r=mysqli_query($dbc,$q);
$r_data = mysqli_fetch_row($r);
if ($r_data[0]) 
	{
	define(CAM_CENTRAL_SUPPLY_2_X,$r_data[1]);	
	echo "<br> Central Supply 2 x is:".CAM_CENTRAL_SUPPLY_2_X;	
	define(CAM_CENTRAL_SUPPLY_2_Z,$r_data[2]);	
	echo "<br> Central Supply 2 z is:".CAM_CENTRAL_SUPPLY_2_Z;
	}	
else
	{echo'<p>'.mysqli_error($dbc).'</p>';
	define(CAM_CENTRAL_SUPPLY_2_X,CAM_BOT_LEFT_X);	
	echo "<br> Central Supply 2 x is:".CAM_CENTRAL_SUPPLY_2_X;
	define(CAM_CENTRAL_SUPPLY_2_Z,CAM_BOT_LEFT_Z);
	echo "<br> Central Supply 2 z is:".CAM_CENTRAL_SUPPLY_2_Z;
	}
$q='SELECT * FROM key_points WHERE pointName = "Entente Supply Point 3"';
$r=mysqli_query($dbc,$q);
$r_data = mysqli_fetch_row($r);
if ($r_data[0]) 
	{
	define(CAM_CENTRAL_SUPPLY_3_X,$r_data[1]);	
	echo "<br> Central Supply 3 x is:".CAM_CENTRAL_SUPPLY_3_X;	
	define(CAM_CENTRAL_SUPPLY_3_Z,$r_data[2]);	
	echo "<br> Central Supply 3 z is:".CAM_CENTRAL_SUPPLY_3_Z;
	}	
else
	{echo'<p>'.mysqli_error($dbc).'</p>';
	define(CAM_CENTRAL_SUPPLY_3_X,CAM_BOT_LEFT_X);	
	echo "<br> Central Supply 3 x is:".CAM_CENTRAL_SUPPLY_3_X;
	define(CAM_CENTRAL_SUPPLY_3_Z,CAM_BOT_LEFT_Z);
	echo "<br> Central Supply 3 z is:".CAM_CENTRAL_SUPPLY_3_Z;
	}
#EXIT;