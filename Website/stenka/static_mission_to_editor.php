# V1.0
# Stenka 05/10/13
# Php version of mission create ststic objects in group file
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
$filename = $path.'static_'. $coalition . "_m".$current_mission.".Group";
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
{
$q = 'SELECT * from static_mission_'.$current_mission. ' WHERE static_coalition = "2"';
echo '<br>select is:'.$q;
}
else
{
$q = 'SELECT * from static_mission_'.$current_mission. ' WHERE static_coalition = "1"';
echo '<br>select is:'.$q;
}
#$q = 'SELECT * from static_mission_1'
$r = mysqli_query($dbc,$q);
$num = mysqli_num_rows($r);
if ($num > 0)
{
	echo '<br>Records in mission table';
	while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
	echo '<br>'.$row['id'].'|'.$row['static_Name'].$row['static_Country'];
	$current_rec = $row['id'];
	$current_Name = $row['static_Name'];
	$static_coalition = $row['static_coalition'];
	$static_YOri = $row['static_YOri'];
	$static_Model = $row['static_Model'];
	$static_Country = $row['static_Country'];
	$static_XPos = $row['static_XPos'];
	$static_ZPos = $row['static_ZPos'];
	$static_Type = $row['static_Type'];	
# must get path for vehicle
	if ($static_Type == 'Vehicle')
	{
		echo '<br> starting to look for vehicle:'.$static_Model;
		$static_Model = rtrim($static_Model);
		$q2 = "SELECT * from Vehicles where Model = '$static_Model'LIMIT 1";
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
		$writestring="Vehicle\r\n";
		fwrite($fh,$writestring);	
	}
	if ($static_Type == 'Block')
	{
		echo '<br> starting to look for Block:'.$static_Model;
		$static_Model = rtrim($static_Model);
		$q2 = "SELECT * from Blocks where Model = '$static_Model'LIMIT 1";
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
		$writestring="Block\r\n";
		fwrite($fh,$writestring);	
	}
	if ($static_Type == 'Train')
	{
		echo '<br> starting to look for Train:'.$static_Model;
		$static_Model = rtrim($static_Model);
		$q2 = "SELECT * from Trains where Model = '$static_Model'LIMIT 1";
		$r2 = mysqli_query($dbc,$q2);
		$r2_data = mysqli_fetch_row($r2);
		if ($r2_data[0]) 
		{
			echo "<br> Model found is".$r2_data[1];
			echo "<br> modelpath2 is".$r2_data[3];
			$modelpath2 = $r2_data[3];
			echo "<br> modelpath3 is".$r2_data[4];
			$modelpath3 = $r2_data[4];			
			
		}	
		else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
		$writestring="Train\r\n";
		fwrite($fh,$writestring);	
	}
	if ($static_Type == 'Flag')
	{
		echo '<br> starting to look for Flag:'.$static_Model;
		$static_Model = rtrim($static_Model);
		$q2 = "SELECT * from Flags where Model = '$static_Model'LIMIT 1";
		$r2 = mysqli_query($dbc,$q2);
		$r2_data = mysqli_fetch_row($r2);
		if ($r2_data[0]) 
		{
			echo "<br> Model found is".$r2_data[1];
			echo "<br> modelpath2 is".$r2_data[3];
			$modelpath2 = $r2_data[3];
		}	
		else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
		$writestring="Flag\r\n";
		fwrite($fh,$writestring);	
	}	
	# end of recovery of path	
	# here is where we start writing a record to outbox_1
	$writestring="{\r\n";
	fwrite($fh,$writestring);
	$writestring = '  Name = "'.$current_Name.'";'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  Index = '.$index_no.";\r\n";	
	fwrite($fh,$writestring);
	$index_no=($index_no+1);
	$writestring = '  LinkTrId = '.($index_no).";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XPos = '.number_format($static_XPos, 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZPos = '.number_format($static_ZPos, 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$q1="INSERT INTO outbox_1 (lin) VALUES ('$writestring')";
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = '.$static_YOri.';'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($static_Model).'.txt";'."\r\n";	
	fwrite($fh,$writestring);
	if ($static_Type == 'Vehicle')
	{	
	$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\"."$modelpath3"."\\".rtrim($static_Model).'.mgm";'."\r\n";
	}
	if ($static_Type == 'Block')
	{
	$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\".rtrim($static_Model).'.mgm";'."\r\n";
	}
	if ($static_Type == 'Train')
	{
	$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\"."$modelpath3"."\\".rtrim($static_Model).'.mgm";'."\r\n";
	}	
	if ($static_Type == 'Flag')
	{
	$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\".rtrim($static_Model).'.mgm";'."\r\n";
	}	
	fwrite($fh,$writestring);
	$writestring = '  Desc = "';
	if ($static_coalition == '1')
		{$writestring = $writestring.'Allied ';}
	else
		{$writestring = $writestring.'Central ';}
	$writestring = $writestring.'static ';
	$writestring = $writestring.rtrim($static_Model).'";'."\r\n";
	fwrite($fh,$writestring);		
	$writestring = '  Country = '.$static_Country.';'."\r\n";
	fwrite($fh,$writestring);
	if ($static_Type == 'Vehicle')
	{	
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
	}
	if ($static_Type == 'Train')
	{	
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
	}
	if ($static_Type == 'Block')
	{	
		$writestring = '  Durability = 25000;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  DamageReport = 50;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  DamageThreshold = 1;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  DeleteAfterDeath = 1;'."\r\n";
		fwrite($fh,$writestring);		
	}	
	if ($static_Type == 'Flag')
	{	
		$writestring = '  StartHeight = 0;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  SpeedFactor = 1;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  BlockThreshold = 1;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Radius = 1;'."\r\n";
		fwrite($fh,$writestring);		
		$writestring = '  Type = 0;'."\r\n";
		fwrite($fh,$writestring);		
		$writestring = '  CountPlanes = 0;'."\r\n";
		fwrite($fh,$writestring);		
		$writestring = '  CountVehicles = 0;'."\r\n";
		fwrite($fh,$writestring);		
	}		
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
	$writestring = '  XPos = '.number_format($static_XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$writestring = '  ZPos = '.number_format($static_ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = '.$static_YOri.';'."\r\n";	
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
	}
}
# this is the end of the do while loop	
fclose($fh);
	echo "<br>$num Records";
