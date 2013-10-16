# V1.0
# Stenka 04/10/13
# Php version of mission create vehicles in group file
<?php
# require is connecting user peter to stalingrad1 database
# here
require('../connect_db.php');
# next load campaign variable into constants
require('cam_param.php');
# initialise variables
$current_mission = 1;
$miss = 'mission_'.$current_mission;
# $path is the path to where the user keeps the group files
$path = 'c:/BOSWAR/';
# are we outputting an allied or central
$coalition="allies";
#$coalition="central";
# $index_no is the index number 
$index_no = 1;
# x and z pos of supply positions
$cam_red_supply_1_x = CAM_RED_SUPPLY_1_X;
$cam_red_supply_1_z = CAM_RED_SUPPLY_1_Z;
$cam_red_supply_2_x = CAM_RED_SUPPLY_2_X;
$cam_red_supply_2_z = CAM_RED_SUPPLY_2_Z;
$cam_red_supply_3_x = CAM_RED_SUPPLY_3_X;
$cam_red_supply_3_z = CAM_RED_SUPPLY_3_Z;
$cam_blue_supply_1_x = CAM_RED_SUPPLY_1_X;
$cam_blue_supply_1_z = CAM_BLUE_SUPPLY_1_Z;
$cam_blue_supply_2_x = CAM_BLUE_SUPPLY_2_X;
$cam_blue_supply_2_z = CAM_BLUE_SUPPLY_2_Z;
$cam_blue_supply_3_x = CAM_BLUE_SUPPLY_3_X;
$cam_blue_supply_3_z = CAM_BLUE_SUPPLY_3_Z;
# end of my variables initialisation
#prepare datafile for output
$filename = $path. $coalition . "_m".$current_mission.".Group";
echo '<br> File:'.$filename;
if (file_exists($filename)) 
{
    echo "<p>The file $filename exists";
	unlink($filename);
	echo "<p>I try to delete it";
} 
else 
{
    echo "<p>The file $filename does not exist";
}
if (file_exists($filename)) 
{
    echo "<p>The file $filename exists";
} 
else 
{
    echo "<p>The file $filename does not exist";
}
# OK open file for business
$fh = fopen($filename,'w') or die("Can not open file");


#
if ($coalition=="central")
{$q = 'SELECT * from mission_'.$current_mission. ' WHERE col_coalition = "2"';}
else
{$q = 'SELECT * from mission_'.$current_mission. ' WHERE col_coalition = "1"';}
$r = mysqli_query($dbc,$q);
$num = mysqli_num_rows($r);
if ($num > 0)
{
	echo '<br>Records in mission table';
	while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
	echo '<br>'.$row['id'].'|'.$row['col_Name'].$row['col_Country'];
	$current_rec = $row['id'];
	$current_Name = $row['col_Name'];
	$col_coalition = $row['col_coalition'];
	$col_YOri = $row['col_YOri'];
	$col_Model = $row['col_Model'];
	$col_moving = $row['col_moving'];
	$col_qty = $row['col_qty'];
	$col_Country = $row['col_Country'];
	$col_XPos = $row['col_XPos'];
	$col_ZPos = $row['col_ZPos'];
	echo '<br> peter col moving is '.$col_moving;
# must get path for vehicle
	echo '<br> starting to look for vehicle:'.$col_Model;
	$col_Model = rtrim($col_Model);
	$q2 = "SELECT * from Vehicles where Model = '$col_Model'LIMIT 1";
	$r2 = mysqli_query($dbc,$q2);
	$r2_data = mysqli_fetch_row($r2);
	if ($r2_data[0]) 
	{
		echo "<br> Model found is".$r2_data[1];
		echo "<br> modelpath2 is".$r2_data[4];
		$modelpath2 = $r2_data[4];
		echo "<br> modelpath3 is".$r2_data[5];
		$modelpath3 = $r2_data[5];		
	}	
	else
		{echo'<p>'.mysqli_error($dbc).'</p>';}
# end of recovery of path	
	# here is where we start writing a record to outbox_1
	$writestring="Vehicle\r\n";
	fwrite($fh,$writestring);		
	$writestring="{\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Name = "'.$current_Name.'";'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  Index = '.$index_no.";\r\n";	
	fwrite($fh,$writestring);
	$index_no=($index_no+1);
	$writestring = '  LinkTrId = '.($index_no).";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XPos = '.number_format($col_XPos, 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZPos = '.number_format($col_ZPos, 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$q1="INSERT INTO outbox_1 (lin) VALUES ('$writestring')";
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = '.$col_YOri.';'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($col_Model).'.txt";'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\"."$modelpath3"."\\".rtrim($col_Model).'.mgm";'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Desc = "';
	if ($col_coalition == '1')
		{$writestring = $writestring.'Allied ';}
	else
		{$writestring = $writestring.'Central ';}
	IF ($col_moving == "1")
	{
	$writestring = $writestring.'moving  ';
	}
	else
	{
	$writestring = $writestring.'static ';
	}
	$writestring = $writestring.$col_qty.' '.rtrim($col_Model).'";'."\r\n";
	fwrite($fh,$writestring);		
	$writestring = '  Country = '.$col_Country.';'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  NumberInFormation = 0;'."\r\n";
	fwrite($fh,$writestring);

	$writestring = '  Vulnerable = 1;'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Engageable = 1;'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  LimitAmmo = 1;'."\r\n";
	fwrite($fh,$writestring);
	$writestring = '  AILevel = '.CAM_GROUND_AI_LEVEL.';'."\r\n";		
	fwrite($fh,$writestring);	
	$writestring = '  DamageReport = 50;'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  DamageThreshold = 1;'."\r\n";				
	fwrite($fh,$writestring);			
	$writestring = '  DeleteAfterDeath = 1;'."\r\n";				
	fwrite($fh,$writestring);	
	$writestring = '}'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);
# start of the mcu write
	$writestring = 'MCU_TR_Entity'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '{'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Index = '.$index_no.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Name = "'.$current_Name.' entity'.'"'.';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Desc = "";'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Targets = [];'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Objects = [];'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  XPos = '.number_format($col_XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$writestring = '  ZPos = '.number_format($col_ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = '.$col_YOri.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Enabled = 1;'."\r\n";	
	fwrite($fh,$writestring);		
	$writestring = '  MisObjID = '.($index_no-1).';'."\r\n";	
	fwrite($fh,$writestring);		
	$writestring = '}'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);
# start of the waypoint write
	$index_no=($index_no+1);
	$writestring = 'MCU_Waypoint'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '{'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Index = '.$index_no.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Name = "'.$current_Name.'"'.';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Desc = "";'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Targets = [];'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Objects = ['.($index_no-1).'];'."\r\n";		
	fwrite($fh,$writestring);
	$way_XPos = ($col_XPos+(CAM_GROUND_SPACING*10));
	$writestring = '  XPos = '.number_format($way_XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$way_ZPos = ($col_ZPos+(CAM_GROUND_SPACING*10));	
	$writestring = '  ZPos = '.number_format($way_ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = '.$col_YOri.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Area = 20;'."\r\n";	
	fwrite($fh,$writestring);		
	$writestring = '  Speed = '.CAM_GROUND_TRANSPORT_SPEED.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Priority = 1;'."\r\n";	
	fwrite($fh,$writestring);	
	$writestring = '  GoalType = 0;'."\r\n";	
	fwrite($fh,$writestring);	
	$writestring = '}'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);
	$index_no=($index_no+1);
	}
}
# this is the end of the do while loop	
fclose($fh);
	echo "<br>$num Records";
