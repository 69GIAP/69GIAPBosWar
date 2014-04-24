# V1.1
# Stenka 15/03/2014
# Php version of static create static objects in static_2_planner_allies or static_2_planner_central.Group
# version with parameter for path and coalition
# This goes on the admin menu generating both central and allied which would be sent by e-mail to the allied and central planners
# It will also appear on the central planners menu and the allied planners menu but only generating their files
<?php
# connecting user  to campaign database
# here

	$dbc = new mysqli ( "localhost", "root" , "bartok" , "march1" );

# next load campaign variable into constants
require('cam_param.php');

# now we will start creating vehicles
# initialise variables 
# $path is the path to where the user keeps the group files
$path = 'c:/BOSWAR/march-1-groups/';
# are we outputting an allied or central
$coalition="allies";
#$coalition="central";
# $index_no is the index number 
$index_no = 1;
# x and z pos of supply positions
$cam_allies_supply_1_x = CAM_ALLIES_SUPPLY_1_X;
$cam_allies_supply_1_z = CAM_ALLIES_SUPPLY_1_Z;
$cam_allies_supply_2_x = CAM_ALLIES_SUPPLY_2_X;
$cam_allies_supply_2_z = CAM_ALLIES_SUPPLY_2_Z;
$cam_allies_supply_3_x = CAM_ALLIES_SUPPLY_3_X;
$cam_allies_supply_3_z = CAM_ALLIES_SUPPLY_3_Z;
$cam_central_supply_1_x = CAM_ALLIES_SUPPLY_1_X;
$cam_central_supply_1_z = CAM_CENTRAL_SUPPLY_1_Z;
$cam_central_supply_2_x = CAM_CENTRAL_SUPPLY_2_X;
$cam_central_supply_2_z = CAM_CENTRAL_SUPPLY_2_Z;
$cam_central_supply_3_x = CAM_CENTRAL_SUPPLY_3_X;
$cam_central_supply_3_z = CAM_CENTRAL_SUPPLY_3_Z;
# end of my variables initialisation
#prepare datafile for output

$filename = $path.'static_2_planner_'.$coalition.".Group";
echo '<br>Filename is :'.$filename;
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

if ($coalition == 'allies')
{$q = 'SELECT * from statics where static_coalition="1"';}
else
{$q = 'SELECT * from statics where static_coalition="2"';}
$r = mysqli_query($dbc,$q);
$num = mysqli_num_rows($r);
if ($num > 0)
{
	echo '<br>Records in static table';
	while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
	echo '<br>'.$row['id'].'|'.$row['static_Name'].$row['static_Country'];
	$current_rec = $row['id'];
	$current_Name = $row['static_Name'];
	$static_coalition = $row['static_coalition'];
	$static_YOri = $row['static_YOri'];
	$static_XPos = $row['static_XPos'];
	$static_ZPos = $row['static_ZPos'];
	$static_Model = $row['static_Model'];
	$static_Country = $row['static_Country'];
	$static_Type = $row['static_Type'];
# here is where we start writing a record 
	$writestring= $static_Type."\r\n";
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
	$writestring = '  XPos = '.number_format($static_XPos, 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZPos = '.number_format($static_ZPos, 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = '.number_format($static_YOri, 2, '.', '').";\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($static_Model).'.txt";'."\r\n";	
	fwrite($fh,$writestring);
# must get path for vehicle
	if ($static_Type == "Vehicle")
	{
		echo '<br> starting to look for vehicle:'.$static_Model;
		$static_Model = rtrim($static_Model);
		$q2 = "SELECT * from object_properties where Model = '$static_Model'LIMIT 1";
		$r2 = mysqli_query($dbc,$q2);
		$r2_data = mysqli_fetch_row($r2);
		if ($r2_data[0]) 
		{
			echo "<br> Model found is".$r2_data[6];
			echo "<br> modelpath2 is".$r2_data[8];
			$modelpath2 = $r2_data[8];
			echo "<br> modelpath3 is".$r2_data[9];
			$modelpath3 = $r2_data[9];		
		}	
		else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
		$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\"."$modelpath3"."\\".rtrim($static_Model).'.mgm";'."\r\n";	
		fwrite($fh,$writestring);
	}
# end of recovery of vehicle	
# must get path for Block
	if ($static_Type == "Block")
	{
		echo '<br> starting to look for Block:'.$static_Model;
		$static_Model = rtrim($static_Model);
		$q2 = "SELECT * from object_properties where Model = '$static_Model'LIMIT 1";
		$r2 = mysqli_query($dbc,$q2);
		$r2_data = mysqli_fetch_row($r2);
		if ($r2_data[0]) 
		{
			echo "<br> Model found is".$r2_data[6];
			echo "<br> modelpath2 is".$r2_data[8];
			$modelpath2 = $r2_data[8];
			echo "<br> modelpath3 is".$r2_data[9];
			$modelpath3 = $r2_data[9];		
		}	
		else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
		$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\".rtrim($static_Model).'.mgm";'."\r\n";	
		fwrite($fh,$writestring);
	}
# end of recovery of block	
# must get path for train
	if ($static_Type == "Train")
	{
		echo '<br> starting to look for Train:'.$static_Model;
		$static_Model = rtrim($static_Model);
		$q2 = "SELECT * from object_properties where Model = '$static_Model'LIMIT 1";
		$r2 = mysqli_query($dbc,$q2);
		$r2_data = mysqli_fetch_row($r2);
		if ($r2_data[0]) 
		{
			echo "<br> Model found is".$r2_data[6];
			echo "<br> modelpath2 is".$r2_data[8];
			$modelpath2 = $r2_data[8];
			echo "<br> modelpath3 is".$r2_data[9];
			$modelpath3 = $r2_data[9];		
		}	
		else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
		$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\"."$modelpath3"."\\".rtrim($static_Model).'.mgm";'."\r\n";	
		fwrite($fh,$writestring);
	}
# end of recovery of train	
# must get path for flag
	if ($static_Type == "Flag")
	{
		echo '<br> starting to look for Flag:'.$static_Model;
		$static_Model = rtrim($static_Model);
		$q2 = "SELECT * from object_properties where Model = '$static_Model'LIMIT 1";
		$r2 = mysqli_query($dbc,$q2);
		$r2_data = mysqli_fetch_row($r2);
		if ($r2_data[0]) 
		{
			echo "<br> Model found is".$r2_data[6];
			echo "<br> modelpath2 is".$r2_data[8];
			$modelpath2 = $r2_data[8];
		}	
		else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
		$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\".rtrim($static_Model).'.mgm";'."\r\n";	
		fwrite($fh,$writestring);
	}
# end of recovery of flag
	$writestring = '  Desc = "';
	if ($static_coalition == '1')
		{$writestring = $writestring.'Allied  ';}
	else
		{$writestring = $writestring.'Central ';}
	$writestring = $writestring.'static ';
	$writestring = $writestring.' '.rtrim($static_Model).'";'."\r\n";
	fwrite($fh,$writestring);	
	
	$writestring = '  Country = '.$static_Country.';'."\r\n";
	fwrite($fh,$writestring);
	if ($static_Type == "Train")
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
	if ($static_Type == "Block")
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
	if ($static_Type == "Flag")
	{
		$writestring = '  StartHeight = 0;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  SpeedFactor = 1;'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  BlockThreshold = 1;'."\r\n";				
		fwrite($fh,$writestring);			
		$writestring = '  Radius = 1000;'."\r\n";				
		fwrite($fh,$writestring);	
		$writestring = '  Type = 0;'."\r\n";				
		fwrite($fh,$writestring);
		$writestring = '  CountPlanes = 0;'."\r\n";				
		fwrite($fh,$writestring);
		$writestring = '  CountVehicles = 0;'."\r\n";				
		fwrite($fh,$writestring);
	}
	if ($static_Type == "Vehicle")
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
	$writestring = '}'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);
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
	$index_no=($index_no+1);
	}
}
# this is the end of the do while loop	
	
# here we stop write
fclose($fh);
	echo "<br>$num Records";
EXIT;