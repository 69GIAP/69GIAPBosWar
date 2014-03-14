# V1.1
# Stenka 13/03/2014
# Php version of columns create vehicles in template_allies or central.Group
# version with parameter for path and coalition
# menu for Admin user will have generate both allied and central extract files to send by post
# menu for allied and central planners will generate only their own
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
$filename = $path.'columns_2_template_'.$coalition.".Group";
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
{$q = 'SELECT * from columns where CoalID="1"';}
else
{$q = 'SELECT * from columns where CoalID="2"';}
$r = mysqli_query($dbc,$q);
$num = mysqli_num_rows($r);
if ($num > 0)
{
	echo '<br>Records in columns table';
	while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
	echo '<br>'.$row['id'].'|'.$row['Name'].$row['ckey'];
	$current_rec = $row['id'];
	$current_Name = $row['Name'];
	$CoalID = $row['CoalID'];
	$YOri = $row['YOri'];
	$Model = $row['Model'];
	$Moving = $row['Moving'];
	$Quantity = $row['Quantity'];
	$ckey = $row['ckey'];
	echo '<br> peter col moving is '.$Moving;
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
# for an allied
	if ($CoalID == "1")
	{
		if ($row['Supplypoint'] == "1")
		{
			$XPos = $cam_allies_supply_1_x;
			$cam_allies_supply_1_x = ($cam_allies_supply_1_x + 10*CAM_GROUND_SPACING);
			$ZPos = $cam_allies_supply_1_z;
			$cam_allies_supply_1_z = ($cam_allies_supply_1_z - 10*CAM_GROUND_SPACING);
		}
		if ($row['Supplypoint'] == "2")
		{
			$XPos = $cam_allies_supply_2_x;
			$cam_allies_supply_2_x = ($cam_allies_supply_2_x + 10*CAM_GROUND_SPACING);
			$ZPos = $cam_allies_supply_2_z;
			$cam_allies_supply_2_z = ($cam_allies_supply_2_z - 10*CAM_GROUND_SPACING);
		}
		if ($row['Supplypoint'] == "3")
		{
			$XPos = $cam_allies_supply_3_x;
			$cam_allies_supply_3_x = ($cam_allies_supply_3_x + 10*CAM_GROUND_SPACING);
			$ZPos = $cam_allies_supply_3_z;
			$cam_allies_supply_3_z = ($cam_allies_supply_3_z - 10*CAM_GROUND_SPACING);
		}
	}
# for a blue
	else
	{
		if ($row['Supplypoint'] == "1")
		{
		$XPos = $cam_central_supply_1_x;
		$cam_central_supply_1_x = ($cam_central_supply_1_x + 10*CAM_GROUND_SPACING);
		$ZPos = $cam_central_supply_1_z;
		$cam_central_supply_1_z = ($cam_central_supply_1_z - 10*CAM_GROUND_SPACING);
		}
		if ($row['Supplypoint'] == "2")
		{
			$XPos = $cam_central_supply_2_x;
			$cam_central_supply_2_x = ($cam_central_supply_2_x + 10*CAM_GROUND_SPACING);
			$ZPos = $cam_central_supply_2_z;
			$cam_central_supply_2_z = ($cam_central_supply_2_z - 10*CAM_GROUND_SPACING);
		}
		if ($row['Supplypoint'] == "3")
		{
			$XPos = $cam_central_supply_3_x;
			$cam_central_supply_3_x = ($cam_central_supply_3_x + 10*CAM_GROUND_SPACING);
			$ZPos = $cam_central_supply_3_z;
			$cam_central_supply_3_z = ($cam_central_supply_3_z - 10*CAM_GROUND_SPACING);
		}
	}
	$writestring = '  XPos = '.number_format($XPos, 3, '.', '').";\r\n";	

	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZPos = '.number_format($ZPos, 3, '.', '').";\r\n";	
	fwrite($fh,$writestring);
# here I will write back the x & z to  columns	
	$q1="UPDATE columns set XPos = $XPos where id = $current_rec";
	$r1= mysqli_query($dbc,$q1);
	if ($r1)
	{
		echo'<br> written x pos back to columns';
	}
	else
		{echo'<p>'.mysqli_error($dbc).'</p>';} 	
	$q1="UPDATE columns set ZPos = $ZPos where id = $current_rec";
	$r1= mysqli_query($dbc,$q1);
	if ($r1)
	{
		echo'<br> written Z pos back to columns';
	}
	else
		{echo'<p>'.mysqli_error($dbc).'</p>';} 		
# finished update of columns 	
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = '.$YOri.';'."\r\n";
	fwrite($fh,$writestring);	
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($Model).'.txt";'."\r\n";	
	fwrite($fh,$writestring);
# must get path for vehicle
	echo '<br> starting to look for vehicle:'.$Model;
	$Model = rtrim($Model);
	$q2 = "SELECT * from object_properties where Model = '$Model'LIMIT 1";
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
# end of recovery of path	
	$writestring = '  Model = "graphics'."\\"."$modelpath2"."\\"."$modelpath3"."\\".rtrim($Model).'.mgm";'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Desc = "';
	if ($CoalID == '1')
		{$writestring = $writestring.'Allied  ';}
	else
		{$writestring = $writestring.'Central ';}
	IF ($Moving == "1")
	{
	$writestring = $writestring.'moving ';
	}
	else
	{
	$writestring = $writestring.'static ';
	}
	$writestring = $writestring.$Quantity.' '.rtrim($Model).'";'."\r\n";
	fwrite($fh,$writestring);		
	$writestring = '  Country = '.$ckey.';'."\r\n";
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
	$writestring = '  XPos = '.number_format($XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$writestring = '  ZPos = '.number_format($ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = '.$YOri.';'."\r\n";	
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
