# V1.0
# Stenka 03/10/2013
# Php version of col_10 create vehicles in template_allies.Group
<?php
# require is connecting user peter to stalingrad1 database
# here
require('../connect_db.php');
# next load campaign variable into constants
require('cam_param.php');
# now we will start creating vehicles
# initialise variables
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
$filename = "c:/BOSWAR/template_".$coalition.".Group";
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
{$q = 'SELECT * from col_10 where col_coalition="1"';}
else
{$q = 'SELECT * from col_10 where col_coalition="2"';}
$r = mysqli_query($dbc,$q);
$num = mysqli_num_rows($r);
if ($num > 0)
{
	echo '<br>Records in col_10 table';
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
	echo '<br> peter col moving is '.$col_moving;
# here is where we start writing a record 
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
# for a red
	if ($col_coalition == "1")
	{
		if ($row['col_supplypoint'] == "1")
		{
			$col_XPos = $cam_red_supply_1_x;
			$cam_red_supply_1_x = ($cam_red_supply_1_x + 10*CAM_GROUND_SPACING);
			$col_ZPos = $cam_red_supply_1_z;
			$cam_red_supply_1_z = ($cam_red_supply_1_z - 10*CAM_GROUND_SPACING);
		}
		if ($row['col_supplypoint'] == "2")
		{
			$col_XPos = $cam_red_supply_2_x;
			$cam_red_supply_2_x = ($cam_red_supply_2_x + 10*CAM_GROUND_SPACING);
			$col_ZPos = $cam_red_supply_2_z;
			$cam_red_supply_2_z = ($cam_red_supply_2_z - 10*CAM_GROUND_SPACING);
		}
		if ($row['col_supplypoint'] == "3")
		{
			$col_XPos = $cam_red_supply_3_x;
			$cam_red_supply_3_x = ($cam_red_supply_3_x + 10*CAM_GROUND_SPACING);
			$col_ZPos = $cam_red_supply_3_z;
			$cam_red_supply_3_z = ($cam_red_supply_3_z - 10*CAM_GROUND_SPACING);
		}
	}
# for a blue
	else
	{
		if ($row['col_supplypoint'] == "1")
		{
		$col_XPos = $cam_blue_supply_1_x;
		$cam_blue_supply_1_x = ($cam_blue_supply_1_x + 10*CAM_GROUND_SPACING);
		$col_ZPos = $cam_blue_supply_1_z;
		$cam_blue_supply_1_z = ($cam_blue_supply_1_z - 10*CAM_GROUND_SPACING);
		}
		if ($row['col_supplypoint'] == "2")
		{
			$col_XPos = $cam_blue_supply_2_x;
			$cam_blue_supply_2_x = ($cam_blue_supply_2_x + 10*CAM_GROUND_SPACING);
			$col_ZPos = $cam_blue_supply_2_z;
			$cam_blue_supply_2_z = ($cam_blue_supply_2_z - 10*CAM_GROUND_SPACING);
		}
		if ($row['col_supplypoint'] == "3")
		{
			$col_XPos = $cam_blue_supply_3_x;
			$cam_blue_supply_3_x = ($cam_blue_supply_3_x + 10*CAM_GROUND_SPACING);
			$col_ZPos = $cam_blue_supply_3_z;
			$cam_blue_supply_3_z = ($cam_blue_supply_3_z - 10*CAM_GROUND_SPACING);
		}
	}
	$writestring = '  XPos = '.number_format($col_XPos, 3, '.', '').";\r\n";	

	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZPos = '.number_format($col_ZPos, 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
# here I will write back the x & z to  col_10	
	$q1="UPDATE col_10 set col_XPos = $col_XPos where id = $current_rec";
	$r1= mysqli_query($dbc,$q1);
	if ($r1)
	{
		echo'<br> written x pos back to col_10';
	}
	else
		{echo'<p>'.mysqli_error($dbc).'</p>';} 	
	$q1="UPDATE col_10 set col_ZPos = $col_ZPos where id = $current_rec";
	$r1= mysqli_query($dbc,$q1);
	if ($r1)
	{
		echo'<br> written Z pos back to col_10';
	}
	else
		{echo'<p>'.mysqli_error($dbc).'</p>';} 		
# finished update of col_10 	
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = '.$col_YOri.';'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($col_Model).'.txt";'."\r\n";	
	fwrite($fh,$writestring);
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
	$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\"."$modelpath3"."\\".rtrim($col_Model).'.mgm";'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Desc = "';
	if ($col_coalition == '1')
		{$writestring = $writestring.'Allied  ';}
	else
		{$writestring = $writestring.'Central ';}
	IF ($col_moving == "1")
	{
	$writestring = $writestring.'moving ';
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
	$index_no=($index_no+1);
	}
}
# this is the end of the do while loop	
	
# here we stop write
fclose($fh);
	echo "<br>$num Records";
