
<?php 
#Stenka 23/4/14
#Stenka 26/4/14 debug z position of column
// Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
		
// Include the webside header
	include ( 'includes/header.php' );
	
// Include the navigation on top
	include ( 'includes/navigation.php' );


?>
	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
<?php
			echo "<h2>Final Mission preparation</h2>\n";
			echo "<p>We will now generate all the files with which to generate the next Mission.<br>\n
			The database contains the Z X starting positions and angle of both static groups and columns. Additionally the start of the next mission and the destination Z X positions for columns are stored as well.</p>\n";
			echo "<p>The destination values will now be validated against the length of the mission and transit speeds then corrected. Columns that have a significant destination will be
determined to be moving and generated with waypoints. If the destination was not significant they will be created with complex triggers which wake them up if players or enemy vehicles approach.
Artillery which is not self propelled will be loaded into trucks for transit so will not be able to fire.<p>\n";
			echo "<p>Static groups will be generated with complex triggers.</p>\n";
			
			echo "<p>The administrator that will assemble the mission should start in the mission editor with a clean template mission containing the latest influence areas, buildings, villages towns etc. but no 
airfields or bridges. He will need to set the date, weather and time to suit the mission then Import from file the group file(s) which we will generate here and download from the server to this PC.</p>\n";

// require connect2CampaignFunction.php
require ( 'functions/connect2Campaign.php' );

// include getCampaignVariables.php
include ( 'includes/getCampaignVariables.php' );

// use this information to connect to campaign 
$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

// require getAbbrv.php
require ('functions/getAbbrv.php');
// require getPointXPos.php
require ('functions/getPointXPos.php');
// require getPointZPos.php
require ('functions/getPointZPos.php');
// require getGroundAILevel.php
require ('functions/getGroundAILevel.php');
// require getGroundspacing.php
require ('functions/getGroundspacing.php');
// require getCoalitionname.php
require ('functions/getCoalitionname.php');
// require getObjectModel.php
require ( 'functions/getObjectModel.php' );
# here starts the groupfile sequence
echo "<br><br>Hello Peter im in the groupfile sequence<br><br>";
# pre mission generation check
# initialise variables
$time_availiable=$mission_minutes+$lineup_minutes;
echo "Time Available is :".$time_availiable;
$speed=$ground_transport_speed_kmh;
# end of my variables initialisation
$q = "SELECT * from $loadedCampaign.columns";
$r = mysqli_query($dbc,$q);
$num = mysqli_num_rows($r);
if ($num > 0)
{
	echo '<br>Records in columns';
	while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
	echo '<br>'.$row['id'].'|'.$row['Name'].$row['ckey'];
	$current_rec = $row['id'];
	$current_Name = $row['Name'];
	$col_coalition = $row['CoalID'];
	$col_YOri = $row['YOri'];
	$col_Model = $row['Model'];
# search for vehicle speed info
	$q2="SELECT * from $loadedCampaign.object_properties WHERE Model = ('$col_Model')";
	$r2=mysqli_query($dbc,$q2);
	$r2_data = mysqli_fetch_row($r2);
	if ($r2_data[0]) 
		{
			$Model = $r2_data[6];
			echo '<br> Found the model is a :'.$Model;
			$moving_becomes = $r2_data[7];
			echo '<br> moving becomes is a :'.$Model;
			$modelpath2 = $r2_data[8];
			$modelpath3 = $r2_data[9];
			$max_speed_kmh = $r2_data[10];
			$cruise_speed_kmh = $r2_data[11];
			$range_m = $r2_data[12];			
		}	
	else
		{echo'<p>'.mysqli_error($dbc).'</p>';}
	if ($Model == $moving_becomes)
	{
	echo '<br>This is a vehicle capable of moving';
	}
	else
	{	
	echo '<br>This is artillery must be loaded into vehicle';
	$q3="SELECT * from $loadedCampaign.object_properties WHERE Model = ('$moving_becomes')";
	$r3=mysqli_query($dbc,$q3);
	$r3_data = mysqli_fetch_row($r3);
	if ($r3_data[0]) 
		{
			$Model = $r3_data[6];
			echo '<br> So this is now a :'.$Model;
			$moving_becomes = $r3_data[7];
			$modelpath2 = $r3_data[8];
			$modelpath3 = $r3_data[9];
			$max_speed_kmh = $r3_data[10];
			$cruise_speed_kmh = $r3_data[11];
			$range_m = $r3_data[12];			
		}	
	else
		{echo'<p>'.mysqli_error($dbc).'</p>';}
	}
# end of grabbing vehicle details start decide what speed
if ($speed > $cruise_speed_kmh)
	{$speed_of_column = $cruise_speed_kmh;}
else
	{$speed_of_column = $speed;}
		echo '<br>Speed of column is : '.$cruise_speed_kmh;
# for a train make sure indicated waypoint is not changed
if ($modelpath2 == "trains")
	{$speed_of_column = 9999;}
	#end of working out speed
	$col_moving = $row['Moving'];
	$col_qty = $row['Quantity'];
	$col_Country = $row['ckey'];
	echo '<br> col moving starts at '.$col_moving;
	$XPos = $row['XPos'];
	$ZPos = $row['ZPos'];
	$dest_XPos = $row['dest_XPos'];
	$dest_ZPos = $row['dest_ZPos'];
	$distance_possible = 0;
	$deltax = ($dest_XPos-$XPos);
	$deltaz = ($dest_ZPos-$ZPos);
	$tripdistance = sqrt(($deltax*$deltax) + ($deltaz*$deltaz));
	echo '<br> tripdistance :'.$tripdistance;
	$triptime_hr = ($tripdistance/1000)/$speed_of_column;
	echo '<br> time in hours: '.$triptime_hr;
	$triptime_min = $triptime_hr*60;
	echo '<br> time in mins: '.$triptime_min; 
	if ($time_availiable < $triptime_min)
	{
		$fractiontraveled = ($time_availiable/$triptime_min);
		$dest_XPos = $XPos + ($deltax * $fractiontraveled);
		$dest_ZPos = $ZPos + ($deltaz * $fractiontraveled);
	}
# if vehicle destination is not greater than ground spacing *20  set to static and Destination = start
	if ($tripdistance < ($ground_spacing*20))
	{
	$dest_XPos = $XPos;
	$dest_ZPos = $ZPos;
	$col_moving = "0";
	echo '<br> This ones a static x:';
	}
	else
	{$col_moving = "1";}
	echo '<br> This ones moving ';	
	echo '<br> col moving ends at '.$col_moving;
	echo '<br> Start x:'.$XPos;
	echo '<br> Start Z:'.$ZPos;	
	echo '<br> Final destination x:'.$dest_XPos;
	echo '<br> Final destination Z:'.$dest_ZPos;
# here I will write back the destination x & z to columns	
	echo '<br> im updating col_moving with '.$col_moving;
	$q1="UPDATE $loadedCampaign.columns set 
	dest_XPos = $dest_XPos,
	dest_ZPos = $dest_ZPos,
	Moving = substr($col_moving,1,1)
	where id = $current_rec";
	$r1= mysqli_query($dbc,$q1);
	if ($r1)
	{
		echo'<br> written destination z x pos back to mission';
	}
	else
		{echo'<p>'.mysqli_error($dbc).'</p>';} 	
	
	}
}
# this is the end of the do while loop	

	echo "<br>$num Records";
# end of pre mission generation check
# Now we will open the output file
#				echo "<br />\$abbrv: $abbrv<br />\n";
// define $DownloadDir
$DownloadDir = 'downloads/';
// make sure $DownloadDir exists
if (!is_dir($DownloadDir)) {
	if (mkdir($DownloadDir)) {
		echo "$DownloadDir created.<br />\n";
	} else {
		echo "$DownloadDir WAS NOT created.<br />\n";
		return(false);
			}
	}
$filename = "$abbrv"."_New_Mission.Group";
$filename = "$DownloadDir"."$filename";
echo "Filename to download: $filename<br><br />\n";
// remove any earlier version of this file
if (file_exists($filename))
	{
	unlink($filename);
	echo "Old version of $filename has been deleted.<br><br />";
	}
// index number
$index_no = 1;
// open file for business
$fh = fopen("$filename",'w') or die("Can not open $filename");
// start writing bridges
$query = "SELECT * from bridges";
if(!$result = $camp_link->query($query)) 
	{
	echo "$query<br />\n";
	die('exportBridges query error [' . $camp_link->error . ']');
	}
$result = $camp_link->query($query);
$num = $result->num_rows;
if ($num > 0) 
	{
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
		{
		$current_rec = $row['id'];
		$current_Name = $row['Name'];
		$Model = $row['Model'];
		$Description = $row['Description'];
		$Country = $row['Country'];
		$CoalID = $row['CoalID'];
		$XPos = $row['XPos'];			
		$ZPos = $row['ZPos'];				
		$YOri = $row['YOri'];
		$damage_0 = $row['damage_0'];						
		$damage_1 = $row['damage_1'];
		$damage_2 = $row['damage_2'];			
		$damage_3 = $row['damage_3'];			
		$damage_4 = $row['damage_4'];			
		$damage_5 = $row['damage_5'];
		$damage_6 = $row['damage_6'];
		$damage_7 = $row['damage_7'];
		$damage_8 = $row['damage_8'];			
		$damage_9 = $row['damage_9'];			
		$damage_10 = $row['damage_10'];	
		$damaged = $damage_0 + $damage_1 + $damage_2 + $damage_3 + $damage_4 + $damage_5 + $damage_6 + $damage_7 + $damage_8 + $damage_8 + $damage_9 + $damage_10;
#		echo "damaged is :".$damaged."<br>";
#		echo "damaged 1 is:".$damage_1;
		// here is where we start writing a record
		$writestring="Bridge\r\n";
		fwrite($fh,$writestring);
		$writestring="{\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Name = "'.$current_Name.'";'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Index = '.$index_no.";\r\n";
		fwrite($fh,$writestring);
		$index_no=($index_no+1);
		$writestring = '  LinkTrId = 0;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  XPos = '.number_format($XPos, 3, '.', '').";\r\n";
		fwrite($fh,$writestring);
		$writestring = '  YPos = 0.000;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  ZPos = '.number_format($ZPos, 3, '.', '').";\r\n";
		fwrite($fh,$writestring);
		$writestring = '  XOri = 0.00;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  YOri = ' .number_format($YOri, 2, '.', '').";\r\n";
		fwrite($fh,$writestring);
		$writestring = '  ZOri = 0.00;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Model = "graphics'."\\".'bridges'."\\".rtrim($Model).'.mgm";'."\r\n";			
		fwrite($fh,$writestring);
		if ($sim == "RoF")
		{
		$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($Model).'.txt";'."\r\n";
		}
		else
		{
		$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Bridges\\".rtrim($Model).'.txt";'."\r\n";
		}		
		
		fwrite($fh,$writestring);
		$writestring = '  Country = '.$Country.';'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Desc = "";'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Durability = 25000;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  DamageReport = 50;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  DamageThreshold = 1;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  DeleteAfterDeath = 1;'."\r\n";
		fwrite($fh,$writestring);
		if ($damaged > 0) 
			{
			$writestring = '  Damaged'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  {'."\r\n";
			fwrite($fh,$writestring);
			if ($damage_0 > 0)
				{
				$writestring = '    0 = 1'.";\r\n";
				fwrite($fh,$writestring);
				}
			if ($damage_1 > 0)
				{
				$writestring = '    1 = 1'.";\r\n";
				fwrite($fh,$writestring);
				}
			if ($damage_2 > 0)
				{
				$writestring = '    2 = 1'.";\r\n";
				fwrite($fh,$writestring);
				}
			if ($damage_3 > 0)
				{
				$writestring = '    3 = 1'.";\r\n";
				fwrite($fh,$writestring);
				}
			if ($damage_4 > 0)
				{
				$writestring = '    4 = 1'.";\r\n";
				fwrite($fh,$writestring);
				}
			if ($damage_5 > 0)
				{
				$writestring = '    5 = 1'.";\r\n";
				fwrite($fh,$writestring);
				}
			if ($damage_6 > 0)
				{
				$writestring = '    6 = 1'.";\r\n";
				fwrite($fh,$writestring);
				}
			if ($damage_7 > 0)
				{
				$writestring = '    7 = 1'.";\r\n";
				fwrite($fh,$writestring);
				}
			if ($damage_8 > 0)
				{
				$writestring = '    8 = 1'.";\r\n";
				fwrite($fh,$writestring);
				}
			if ($damage_9 > 0)
				{
				$writestring = '    9 = 1'.";\r\n";
				fwrite($fh,$writestring);
				}
			if ($damage_10 > 0)
				{
				$writestring = '    10 = 1'.";\r\n";
				fwrite($fh,$writestring);
				}
			$writestring = '  }'."\r\n";
			fwrite($fh,$writestring);			
			}
		$writestring = '}'."\r\n";
		fwrite($fh,$writestring);
		$index_no=($index_no+1);
		}
	}
$result->free();
echo "$num Bridge records processed<br />\n";
// end of exporting bridges
// start of exporting airfields
$query = "SELECT * from airfields";
if(!$result = $camp_link->query($query)) {
	echo "$query<br />\n";
	die('exportAirfields query error [' . $camp_link->error . ']');
	}
$result = $camp_link->query($query);
$num = $result->num_rows;
if ($num > 0) 
	{
	while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
		{
		$current_rec = $row['id'];
		$current_Name = $row['airfield_Name'];
		$Model = $row['airfield_Model'];
		$Description = $row['airfield_Desc'];
		$Country = $row['airfield_Country'];
		$CoalID = $row['airfield_Coalition'];
		$XPos = $row['airfield_XPos'];			
		$ZPos = $row['airfield_ZPos'];				
		$YOri = $row['airfield_YOri'];
		$airfield_Hydrodrome = $row['airfield_Hydrodrome'];						
		$airfield_Enabled = $row['airfield_Enabled'];
		// here is where we start writing a record
		$writestring="Airfield\r\n";
		fwrite($fh,$writestring);
		$writestring="{\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Name = "'.$current_Name.'";'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Index = '.$index_no.";\r\n";
		fwrite($fh,$writestring);
		$index_no=($index_no+1);
		if ($airfield_Enabled == 0)
			{
			$writestring = '  LinkTrId = 0;'."\r\n";
			}
		else
			{
			$writestring = '  LinkTrId = '.$index_no.';'."\r\n";
			}
		fwrite($fh,$writestring);
		$writestring = '  XPos = '.number_format($XPos, 3, '.', '').";\r\n";
		fwrite($fh,$writestring);
		$writestring = '  YPos = 0.000;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  ZPos = '.number_format($ZPos, 3, '.', '').";\r\n";
		fwrite($fh,$writestring);
		$writestring = '  XOri = 0.00;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  YOri = ' .number_format($YOri, 2, '.', '').";\r\n";
		fwrite($fh,$writestring);
		$writestring = '  ZOri = 0.00;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Model = "graphics'."\\".'airfields'."\\".rtrim($Model).'.mgm";'."\r\n";			
		fwrite($fh,$writestring);
		if ($sim == "RoF")
		{
		$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($Model).'.txt";'."\r\n";
		}
		else
		{
		$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Airfields\\".rtrim($Model).'.txt";'."\r\n";
		}		
		
		fwrite($fh,$writestring);
		$writestring = '  Country = '.$Country.';'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Desc = "";'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Durability = 25000;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  DamageReport = 50;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  DamageThreshold = 1;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  DeleteAfterDeath = 1;'."\r\n";
		fwrite($fh,$writestring);
		// here are the planes 
		$query2 = 'SELECT * from airfields_models where airfield_Name = "'.$current_Name.'" and model_Quantity <> 0';
		if(!$result2 = $camp_link->query($query2)) 
			{
			echo "$query2<br />\n";
			die('exportAirfields query error [' . $camp_link->error . ']');
			}
		$result2 = $camp_link->query($query2);
		$num2 = $result2->num_rows;
		if ($num2 > 0) 
			{
			$writestring = '  Planes'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  {'."\r\n";
			fwrite($fh,$writestring);							
			while ($row2 = $result2->fetch_array(MYSQLI_ASSOC)) 
				{
				$Plane_Model = $row2['model_Name'];
				$Plane_Name = $row2['model_Flight'];
				$Plane_Qty = $row2['model_Quantity'];
				$Plane_Altitude = $row2['model_Altitude'];
				echo "got a plane:".$Plane_Model."<br>";
				$writestring = '    Plane'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '    {'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '      SetIndex = 0;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '      Number = '. $Plane_Qty.';'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '      AILevel = '.$air_ai_level.';'."\r\n";
				fwrite($fh,$writestring);
				if ($Plane_Altitude == 0)
					{
					$writestring = '      StartInAir = 0;'."\r\n";
					fwrite($fh,$writestring);
					}
				else
					{
					$writestring = '      StartInAir = 1;'."\r\n";
					fwrite($fh,$writestring);
					}
				$writestring = '      Engageable = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '      Vulnerable = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '      LimitAmmo = 1;'."\r\n";
				fwrite($fh,$writestring);
				if ($sim == "BoS")
				{
				$writestring = '      WMMask = 1;'."\r\n";
				fwrite($fh,$writestring);
				}
				$writestring = '      AIRTBDecision = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '      Renewable = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '      PayloadId = 0;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '      Fuel = 1;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '      RouteTime = 0;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '      RenewTime = 1800;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '      Altitude = '.$Plane_Altitude.';'."\r\n";
				fwrite($fh,$writestring);
# pick out model variable from object propertries
				$objectModel = get_ObjectModel($Plane_Model);
###
				$writestring = '      Model = "graphics'."\\planes\\".$objectModel."\\".$objectModel.'.mgm";'."\r\n";
				fwrite($fh,$writestring);
				if ($sim == "RoF")
				{
				$writestring = '      Script = "LuaScripts'."\\WorldObjects\\".$objectModel.'.txt";'."\r\n";
				}
				else
				{
				$writestring = '      Script = "LuaScripts'."\\WorldObjects\\Planes\\".$objectModel.'.txt";'."\r\n";
				}				
				fwrite($fh,$writestring);
				$writestring = '      Name = "'.$Plane_Name.'";'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '      Skin = "";'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '    }'."\r\n";
				fwrite($fh,$writestring);
				}
			$writestring = '  }'."\r\n";
			fwrite($fh,$writestring);
			}
			if ($sim == "BoS")
			{
			$writestring = '    Callsign = 0;'."\r\n";
			fwrite($fh,$writestring);			
			$writestring = '    Callnum = 0;'."\r\n";
			fwrite($fh,$writestring);						
			}
			$writestring = '  ReturnPlanes = 0;'."\r\n";
			fwrite($fh,$writestring);
			if ($airfield_Hydrodrome == 0)
				{
				$writestring = '  Hydrodrome = 0;'."\r\n";
				}
			else
				{
				$writestring = '  Hydrodrome = 1;'."\r\n";
				}
			fwrite($fh,$writestring);
			$writestring = '  RepairFriendlies = 0;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  RepairTime = 0;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  RearmTime = 0;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  RefuelTime = 0;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  MaintenanceRadius = 1000;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '}'."\r\n";
			fwrite($fh,$writestring);
			if ($airfield_Enabled == 1)
				{
				$writestring = ''."\r\n";
				fwrite($fh,$writestring);
				$writestring = 'MCU_TR_Entity'."\r\n";
				fwrite($fh,$writestring);
				$writestring="{\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Index = '.$index_no.";\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Name = "Airfield entity";'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Desc = "";'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Targets = [];'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Objects = [];'."\r\n";
				fwrite($fh,$writestring);
				fwrite($fh,$writestring);
				$writestring = '  XPos = '.number_format($XPos, 3, '.', '').";\r\n";
				fwrite($fh,$writestring);
				$writestring = '  YPos = 0.000;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  ZPos = '.number_format($ZPos, 3, '.', '').";\r\n";
				fwrite($fh,$writestring);
				$writestring = '  XOri = 0.00;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  YOri = ' .number_format($YOri, 2, '.', '').";\r\n";
				fwrite($fh,$writestring);
				$writestring = '  ZOri = 0.00;'."\r\n";
				fwrite($fh,$writestring);
				$writestring = '  Enabled = 1;'."\r\n";
				fwrite($fh,$writestring);
				$index_no=($index_no-1);
				$writestring = '  MisObjID = '.$index_no.";\r\n";
				fwrite($fh,$writestring);
				$index_no=($index_no+2);
				$writestring = '}'."\r\n";
				fwrite($fh,$writestring);
				}
		}
	}
$result->free();
echo "$num Airfield records processed<br />\n";
// end of exporting airfields

// start of export of statics
# now we write the static vehicles
# set update flags to 0
$q1="UPDATE $loadedCampaign.statics set static_updated = 0";
$r1= mysqli_query($dbc,$q1);
if ($r1)
	{echo '<br> static flag updated';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}

$q = 'SELECT * from statics where static_Type = "Vehicle" ORDER BY static_coalition,static_Name';
$r = mysqli_query($camp_link,$q);
$num = mysqli_num_rows($r);
$list_of_mcus ="";
if ($num > 0)
{
	echo '<br>static vehicles in mission table';
	while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
	echo '<br>'.$row['id'].'|'.$row['static_Name'].$row['static_Country'].$row['static_coalition'];
	$coa = $row['static_coalition']; 
	$search_Name = $row['static_Name'];
	$q5 = 'SELECT * from statics where static_Type = "Vehicle" AND static_Name = "'.$search_Name.'" AND static_updated = 0 AND static_coalition = '.$coa ;
	echo '<br>Select static vehicle search:'.$q5;
	$r5 = mysqli_query($camp_link,$q5);
	$num5 = mysqli_num_rows($r5);
	$list_of_mcus ="";
	if ($num5 > 0)
	{
		while ($row5 = mysqli_fetch_array($r5,MYSQLI_ASSOC))
		{
			$current_rec = $row5['id'];
			$current_Name = $row5['static_Name'];
			$static_coalition = $row5['static_coalition'];
			$static_YOri = $row5['static_YOri'];
			$static_Model = $row5['static_Model'];
			$static_Country = $row5['static_Country'];
			$static_XPos = $row5['static_XPos'];
			$static_ZPos = $row5['static_ZPos'];
			$static_Desc = $row5['static_Desc'];			
# need to save lead vehicle index number here
			$lead_veh_indexno = $index_no;
			$lead_mcu= ($index_no+1);
			$lead=1;
# we need to collect the Vehicle information from the object properties Table
			$q2="SELECT * from object_properties WHERE Model = ('$static_Model') LIMIT 1";
			$r2=mysqli_query($camp_link,$q2);
			$r2_data = mysqli_fetch_row($r2);
			if ($r2_data[0]) 
			{
				$Model = $r2_data[6];
				$moving_becomes = $r2_data[7];
				$modelpath2 = $r2_data[8];
				$modelpath3 = $r2_data[9];
				$max_speed_kmh = $r2_data[10];
				$cruise_speed_kmh = $r2_data[11];
				$range_m = $r2_data[11];			
			}	
			else
				{echo'<p>'.mysqli_error($camp_link).'</p>';}
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
			$writestring = '  XPos = '.number_format($static_XPos, 3, '.', '').";\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  YPos = 0.000;'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  ZPos = '.number_format($static_ZPos, 3, '.', '').";\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  XOri = 0.00;'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  YOri = '.$static_YOri.';'."\r\n";
			fwrite($fh,$writestring);	
			$writestring = '  ZOri = 0.00;'."\r\n";	
			fwrite($fh,$writestring);
			if ($sim == "RoF")
			{
			$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($Model).'.txt";'."\r\n";	
			}
			else
			{
			$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Vehicles\\".rtrim($Model).'.txt";'."\r\n";	
			}			
			
			fwrite($fh,$writestring);
			$writestring = '  Model = "graphics'."\\"."$modelpath2\\"."$modelpath3"."\\"."$Model".'.mgm";'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  Desc = "'.$static_Desc.'";'."\r\n";
			fwrite($fh,$writestring);		
			$writestring = '  Country = '.$static_Country.';'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  NumberInFormation = 0;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Vulnerable = 1;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Engageable = 1;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  LimitAmmo = 1;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  AILevel = '.$ground_ai_level.';'."\r\n";		
			fwrite($fh,$writestring);	
			$writestring = '  DamageReport = 50;'."\r\n";		
			fwrite($fh,$writestring);
			$writestring = '  DamageThreshold = 1;'."\r\n";				
			fwrite($fh,$writestring);			
			$writestring = '  DeleteAfterDeath = 1;'."\r\n";				
			fwrite($fh,$writestring);	
			if ($sim == "BoS")
			{
			$writestring = '  CoopStart = 0;'."\r\n";				
			fwrite($fh,$writestring);	
			$writestring = '  Spotter = -1;'."\r\n";				
			fwrite($fh,$writestring);
			$writestring = '  BeaconChannel = 0;'."\r\n";				
			fwrite($fh,$writestring);		
			$writestring = '  Callsign = 0;'."\r\n";				
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
			$list_of_mcus = $list_of_mcus.$index_no.',';
			$writestring = '  Name = "'.$current_Name.' entity'.'"'.';'."\r\n";		
			fwrite($fh,$writestring);
			$writestring = '  Desc = "";'."\r\n";		
			fwrite($fh,$writestring);
			IF ($lead==1)
				{$writestring = '  Targets = [];'."\r\n";}
			ELSE	
				{$writestring = '  Targets = ['.$lead_mcu.'];'."\r\n";}
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
			$lead=0;
			echo '<br> Updating Vehicle or Artillery';
			$q6="UPDATE $loadedCampaign.statics set static_updated = 1 where id = ".$current_rec;
			$r6= mysqli_query($camp_link,$q6);
			if ($r6)
				{echo '<br> updated';}
			else
				{echo'<p>'.mysqli_error($camp_link).'</p>';}
		}
		$list_of_mcus = substr($list_of_mcus,0,-1);
		echo '<br> list of mcus:'.$list_of_mcus;
		# start of activate
		$writestring = 'MCU_Activate'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '{'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Index = '.$index_no.';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Name = "Trigger Activate"'.';'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Desc = "";'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Targets = [];'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Objects = ['.$list_of_mcus.'];'."\r\n";		
		fwrite($fh,$writestring);
		$static_XPos = $static_XPos + $ground_spacing;
		$writestring = '  XPos = '.number_format($static_XPos, 3, '.', '').';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  YPos = 0.000;'."\r\n";	
		fwrite($fh,$writestring); 	
		$writestring = '  ZPos = '.number_format($static_ZPos, 3, '.', '').';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  XOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  YOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  ZOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '}'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = ''."\r\n";	
		fwrite($fh,$writestring);
		$index_no=($index_no+1);
# end of activate start of disactivate
		$writestring = 'MCU_Deactivate'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '{'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Index = '.$index_no.';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Name = "Trigger Deactivate"'.';'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Desc = "";'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Targets = ['.($index_no+1).'];'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Objects = ['.$list_of_mcus.'];'."\r\n";		
		fwrite($fh,$writestring);
		$static_XPos = $static_XPos + $ground_spacing;
		$writestring = '  XPos = '.number_format($static_XPos, 3, '.', '').';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  YPos = 0.000;'."\r\n";	
		fwrite($fh,$writestring); 	
		$writestring = '  ZPos = '.number_format($static_ZPos, 3, '.', '').';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  XOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  YOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  ZOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '}'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = ''."\r\n";	
		fwrite($fh,$writestring);
		$index_no=($index_no+1);
# end of deactivate start of timer
		$writestring = 'MCU_Timer'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '{'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Index = '.$index_no.';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Name = "Trigger Timer"'.';'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Desc = "";'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Targets = ['.($index_no-1).'];'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Objects = [];'."\r\n";		
		fwrite($fh,$writestring);
		$static_XPos = ($static_XPos+10);
		$writestring = '  XPos = '.number_format($static_XPos, 3, '.', '').';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  YPos = 0.000;'."\r\n";	
		fwrite($fh,$writestring); 	
		$static_ZPos = ($static_ZPos+5);	
		$writestring = '  ZPos = '.number_format($static_ZPos, 3, '.', '').';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  XOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  YOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  ZOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Time = '.($detect_off_time*60).';'."\r\n";	
		fwrite($fh,$writestring);		
		$writestring = '}'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = ''."\r\n";	
		fwrite($fh,$writestring);
		$index_no=($index_no+1);
# end of timer start of trigger
		$writestring = 'MCU_TR_ComplexTrigger'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '{'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Index = '.$index_no.';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Name = "Translator Complex Trigger"'.';'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Desc = "";'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Targets = [];'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Objects = [];'."\r\n";		
		fwrite($fh,$writestring);
		$static_XPos = ($static_XPos+15);
		$writestring = '  XPos = '.number_format($static_XPos, 3, '.', '').';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  YPos = 0.000;'."\r\n";	
		fwrite($fh,$writestring); 	
		$static_ZPos = ($static_ZPos+5);	
		$writestring = '  ZPos = '.number_format($static_ZPos, 3, '.', '').';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  XOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  YOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  ZOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Enabled = 1;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Enabled = 1;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Cylinder = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Radius = '.$ground_detect_distance.';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  DamageThreshold = 1;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  DamageReport = 50;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  CheckEntities = 1;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  CheckVehicles = 1;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterSpawned = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterEnteredSimple = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterEnteredAlive = 1;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterLeftSimple = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterLeftAlive = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterFinishedSimple = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterFinishedAlive = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterStationaryAndAlive = 1;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterFinishedStationaryAndAlive = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterTookOff = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterDamaged = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterCriticallyDamaged = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterRepaired = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterKilled = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterDropedBombs = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterFiredFlare = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterFiredRockets = 0;'."\r\n";	
		if ($static_coalition == '1')
			{
			$writestring = '  Country = 501;'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  Country = 502;'."\r\n";	
			fwrite($fh,$writestring);
			}
		else
			{
			$writestring = '  Country = 101;'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  Country = 102;'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  Country = 103;'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  Country = 104;'."\r\n";
			fwrite($fh,$writestring);		
			$writestring = '  Country = 105;'."\r\n";	
			fwrite($fh,$writestring);
			}
		$writestring = '  OnEvents'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  {'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    OnEvent'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    {'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '      Type = 59;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '      TarId = '.($index_no-3).';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    }'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    OnEvent'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    {'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '      Type = 64;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '      TarId = '.($index_no-3).';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    }'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    OnEvent'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    {'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '      Type = 59;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '      TarId = '.($index_no-1).';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    }'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    OnEvent'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    {'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '      Type = 59;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '      TarId = '.($index_no-1).';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    }'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  }'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '}'."\r\n";	
		fwrite($fh,$writestring);
		$index_no=($index_no+1);
# end of first trigger
		$writestring = 'MCU_TR_ComplexTrigger'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '{'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Index = '.$index_no.';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Name = "Translator Complex Trigger"'.';'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Desc = "";'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Targets = [];'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Objects = [];'."\r\n";		
		fwrite($fh,$writestring);
		$static_XPos = ($static_XPos+15);
		$writestring = '  XPos = '.number_format($static_XPos, 3, '.', '').';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  YPos = 0.000;'."\r\n";	
		fwrite($fh,$writestring); 	
		$static_ZPos = ($static_ZPos+5);	
		$writestring = '  ZPos = '.number_format($static_ZPos, 3, '.', '').';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  XOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  YOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  ZOri = 0.00;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Enabled = 1;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Enabled = 1;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Cylinder = 1;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Radius = '.$air_detect_distance.';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  DamageThreshold = 1;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  DamageReport = 50;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  CheckEntities = 1;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  CheckVehicles = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterSpawned = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterEnteredSimple = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterEnteredAlive = 1;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterLeftSimple = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterLeftAlive = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterFinishedSimple = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterFinishedAlive = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterStationaryAndAlive = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterFinishedStationaryAndAlive = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterTookOff = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterDamaged = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterCriticallyDamaged = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterRepaired = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterKilled = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterDropedBombs = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterFiredFlare = 0;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  EventsFilterFiredRockets = 0;'."\r\n";	
		$writestring = '  OnEvents'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  {'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    OnEvent'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    {'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '      Type = 59;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '      TarId = '.($index_no-4).';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    }'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    OnEvent'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    {'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '      Type = 59;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '      TarId = '.($index_no-2).';'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '    }'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  }'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '}'."\r\n";	
		fwrite($fh,$writestring);
		$index_no=($index_no+1);
	}

#end of second trigger	
	}
}
# this is the end of the do while loop	
# finished vehicles now the rest
$q = 'SELECT * from statics where static_updated = 0 ORDER BY static_coalition,static_Name';
#echo '<br>select is:'.$q;
#$q = 'SELECT * from static_mission_1'
$r = mysqli_query($camp_link,$q);
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
	$static_Desc = $row['static_Desc'];
	
	if ($static_Type == 'Block')
	{
		echo '<br> starting to look for Block:'.$static_Model;
		$static_Model = rtrim($static_Model);
		$q2 = "SELECT * from object_properties where Model = '$static_Model'LIMIT 1";
		$r2 = mysqli_query($camp_link,$q2);
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
			{echo'<p>'.mysqli_error($camp_link).'</p>';}
		$writestring="Block\r\n";
		fwrite($fh,$writestring);	
	}
	if ($static_Type == 'Train')
	{
		echo '<br> starting to look for Train:'.$static_Model;
		$static_Model = rtrim($static_Model);
		$q2 = "SELECT * from object_properties where Model = '$static_Model'LIMIT 1";
		$r2 = mysqli_query($camp_link,$q2);
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
			{echo'<p>'.mysqli_error($camp_link).'</p>';}
		$writestring="Train\r\n";
		fwrite($fh,$writestring);	
	}
	if ($static_Type == 'Flag')
	{
		echo '<br> starting to look for Flag:'.$static_Model;
		$static_Model = rtrim($static_Model);
		$q2 = "SELECT * from object_properties where Model = '$static_Model'LIMIT 1";
		$r2 = mysqli_query($camp_link,$q2);
		$r2_data = mysqli_fetch_row($r2);
		if ($r2_data[0]) 
		{
			echo "<br> Model found is".$r2_data[6];
			echo "<br> modelpath2 is".$r2_data[8];
			$modelpath2 = $r2_data[8];
		}	
		else
			{echo'<p>'.mysqli_error($camp_link).'</p>';}
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
	if ($sim == "RoF")
	{
	$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($static_Model).'.txt";'."\r\n";	
	}
	else
	{
		if ($static_Type == 'Block')
		{
		$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Blocks\\".rtrim($static_Model).'.txt";'."\r\n";	
		}
		if ($static_Type == 'Train')
		{
		$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Trains\\".rtrim($static_Model).'.txt";'."\r\n";	
		}
		if ($static_Type == 'Flag')
		{
		$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Flags\\".rtrim($static_Model).'.txt";'."\r\n";	
		}
		if ($static_Type == 'Vehicle')
		{
		$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Vehicles\\".rtrim($static_Model).'.txt";'."\r\n";	
		}
	}
	fwrite($fh,$writestring);
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
	$writestring = '  Desc = "'.$static_Desc.'";'."\r\n";
	fwrite($fh,$writestring);		
	$writestring = '  Country = '.$static_Country.';'."\r\n";
	fwrite($fh,$writestring);
	if ($static_Type == 'Train')
	{	
		$writestring = '  Vulnerable = 1;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Engageable = 1;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  LimitAmmo = 1;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  AILevel = '.$ground_ai_level.';'."\r\n";		
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
	$index_no=($index_no+1);
	}
}
# this is the end of the do while loop
#$result->free();
// end export of statics

// start download of moving columns
###########################################################################################
$q = 'SELECT * from columns where Moving = "1"';
$r = mysqli_query($camp_link,$q);
$num = mysqli_num_rows($r);
if ($num > 0)
{
	echo '<br>Moving columns in mission table';
	while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
		echo '<br>'.$row['id'].'|'.$row['Name'].$row['ckey'];
		$current_rec = $row['id'];
		$current_Name = $row['Name'];
		$col_coalition = $row['CoalID'];
		$col_YOri = $row['YOri'];
		$col_Model = $row['Model'];
		$col_moving = $row['Moving'];
		$col_qty = $row['Quantity'];
		$col_Country = $row['ckey'];
		$col_XPos = $row['XPos'];
		$col_ZPos = $row['ZPos'];	
		$col_dest_XPos = $row['dest_XPos'];
		$col_dest_ZPos = $row['dest_ZPos'];
		$col_formation = $row['col_formation'];
		# need to save lead vehicle index number here
		$lead_veh_indexno = $index_no;
		$lead_mcu= ($index_no+1);
		$lead=1;
		echo '<br>col moving is '.$col_moving;
		# we need to collect the Vehicle information from the Vehicle Table
		$q2="SELECT * from object_properties WHERE Model = ('$col_Model')";
		$r2=mysqli_query($camp_link,$q2);
		$r2_data = mysqli_fetch_row($r2);
		if ($r2_data[0]) 
		{
			$Model = $r2_data[6];
			$moving_becomes = $r2_data[7];
			$modelpath2 = $r2_data[8];
			$modelpath3 = $r2_data[9];
			$max_speed_kmh = $r2_data[10];
			$cruise_speed_kmh = $r2_data[11];
			$range_m = $r2_data[12];			
		}	
		else
		{echo'<p>'.mysqli_error($dbc).'</p>';}
		if ($Model == $moving_becomes)
		{
			echo '<br>This is a vehicle capable of moving';
		}
		else
		{	
			echo '<br>This is artillery must be loaded into vehicle';
			$q3="SELECT * from object_properties WHERE Model = ('$moving_becomes')";
			$r3=mysqli_query($camp_link,$q3);
			$r3_data = mysqli_fetch_row($r3);
			if ($r3_data[0]) 
			{
				$Model = $r3_data[6];
				$modelpath2 = $r3_data[8];
				$modelpath3 = $r3_data[9];
				$max_speed_kmh = $r3_data[10];
				$cruise_speed_kmh = $r3_data[11];
				$range_m = $r3_data[12];			
			}	
			else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
		}
		# here is where we start writing a record to group file
		# start a while loop that will carry on till qty of vehicles is 0
		while ($col_qty > 0)
		{
			if ($modelpath2 == 'trains')
			{
				$writestring="Train\r\n";		
			}
			else
			{
				$writestring="Vehicle\r\n";
			}
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
			$writestring = '  XOri = 0.00;'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  YOri = '.$col_YOri.';'."\r\n";
			fwrite($fh,$writestring);	
			$writestring = '  ZOri = 0.00;'."\r\n";	
			fwrite($fh,$writestring);
			if ($sim == "RoF")
			{
			$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($Model).'.txt";'."\r\n";	
			}
			else
			{
				if ($modelpath2 == 'trains')
				{
				$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Trains\\".rtrim($Model).'.txt";'."\r\n";	
				}
				else
				{
				$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Vehicles\\".rtrim($Model).'.txt";'."\r\n";	
				}
			}
			fwrite($fh,$writestring);
			$writestring = '  Model = "graphics'."\\"."$modelpath2\\"."$modelpath3"."\\"."$Model".'.mgm";'."\r\n";	
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
			if ($modelpath2 != 'trains')
			{$writestring = '  NumberInFormation = 0;'."\r\n";
			fwrite($fh,$writestring);}
			$writestring = '  Vulnerable = 1;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  Engageable = 1;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  LimitAmmo = 1;'."\r\n";
			fwrite($fh,$writestring);
			$writestring = '  AILevel = '.$ground_ai_level.';'."\r\n";		
			fwrite($fh,$writestring);	
			$writestring = '  DamageReport = 50;'."\r\n";		
			fwrite($fh,$writestring);
			$writestring = '  DamageThreshold = 1;'."\r\n";				
			fwrite($fh,$writestring);			
			$writestring = '  DeleteAfterDeath = 1;'."\r\n";				
			fwrite($fh,$writestring);
			if ($sim == "BoS")
			{
			$writestring = '  CoopStart = 0;'."\r\n";				
			fwrite($fh,$writestring);	
			$writestring = '  Spotter = -1;'."\r\n";				
			fwrite($fh,$writestring);
			$writestring = '  BeaconChannel = 0;'."\r\n";				
			fwrite($fh,$writestring);		
			$writestring = '  Callsign = 0;'."\r\n";				
			fwrite($fh,$writestring);
			}
			# carriages write sequence
			if ($modelpath2 == 'trains')
			{
				# make sure train column is only one train
				$col_qty = 0;
				# need to find if carriages exist	
				$q9 = 'SELECT * from trains where Name = "standard"';
				$r9 = mysqli_query($camp_link,$q9);
				$num9 = mysqli_num_rows($r);
				if ($num9 > 0)
				{
					# this one has carriages
					$writestring = '  Carriages'."\r\n";
					fwrite($fh,$writestring);
					$writestring = '  {'."\r\n";
					fwrite($fh,$writestring);
					while ($row = mysqli_fetch_array($r9,MYSQLI_ASSOC))
					{
						$carriage = $row['Model'];
						$writestring = '    "LuaScripts\\WorldObjects\\Trains\\'.$carriage.'.txt"'."\r\n";
						fwrite($fh,$writestring);
					}
					$writestring = '  }'."\r\n";				
					fwrite($fh,$writestring);
				}
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
		IF ($lead==1)
			{$writestring = '  Targets = [];'."\r\n";}
		ELSE	
			{$writestring = '  Targets = ['.$lead_mcu.'];'."\r\n";}
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
		$col_qty = $col_qty - 1;
		$index_no=($index_no+1);
		$lead=0;
		$col_XPos = $col_XPos + $ground_spacing ;
		$col_ZPos = $col_ZPos - $ground_spacing ;		
		}
# start of the waypoint write
	$writestring = 'MCU_Waypoint'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '{'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Index = '.$index_no.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Name = "Trigger Waypoint"'.';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Desc = "";'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Targets = [];'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Objects = ['.$lead_mcu.'];'."\r\n";		
	fwrite($fh,$writestring);
	$way_XPos = $col_dest_XPos;
	$writestring = '  XPos = '.number_format($way_XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$way_ZPos = $col_dest_ZPos;	
	$writestring = '  ZPos = '.number_format($way_ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Area = 20;'."\r\n";	
	fwrite($fh,$writestring);	
	$tranport_speed = $ground_transport_speed_kmh;
	if ($tranport_speed > $cruise_speed_kmh)
		{$speed_of_column = $cruise_speed_kmh;}
	else
		{$speed_of_column = $tranport_speed;}
	$writestring = '  Speed = '.$speed_of_column.';'."\r\n";	
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
# end of waypoint start of mission begin
	$writestring = 'MCU_TR_MissionBegin'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '{'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Index = '.$index_no.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Name = "Translator Mission Begin"'.';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Desc = "";'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Targets = ['.($index_no+1).'];'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Objects = [];'."\r\n";		
	fwrite($fh,$writestring);
	$way_XPos = ($col_dest_XPos+5);
	$writestring = '  XPos = '.number_format($way_XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$way_ZPos = ($col_dest_ZPos+5);	
	$writestring = '  ZPos = '.number_format($way_ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Enabled = 1;'."\r\n";	
	fwrite($fh,$writestring);		
	$writestring = '}'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);
	$index_no=($index_no+1);
# end of mission begin start of timer
	$writestring = 'MCU_Timer'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '{'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Index = '.$index_no.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Name = "Trigger Timer"'.';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Desc = "";'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Targets = ['.($index_no-2).','. ($index_no+1).'];'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Objects = [];'."\r\n";		
	fwrite($fh,$writestring);
	$way_XPos = ($col_dest_XPos+10);
	$writestring = '  XPos = '.number_format($way_XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$way_ZPos = ($col_dest_ZPos+5);	
	$writestring = '  ZPos = '.number_format($way_ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Time = '.(rand(1,($lineup_minutes*60))).';'."\r\n";	
	fwrite($fh,$writestring);		
	$writestring = '}'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);
	$index_no=($index_no+1);
# end of timer start of formation (not needeed if  a train)
	if ($modelpath2 != 'trains')
	{
	$writestring = 'MCU_CMD_Formation'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '{'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Index = '.$index_no.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Name = "Command Formation"'.';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Desc = "";'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Targets = [];'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Objects = ['.$lead_mcu.'];'."\r\n";		
	fwrite($fh,$writestring);
	$way_XPos = ($col_dest_XPos+15);
	$writestring = '  XPos = '.number_format($way_XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$way_ZPos = ($col_dest_ZPos+5);	
	$writestring = '  ZPos = '.number_format($way_ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  FormationType = 4;'."\r\n";	
	fwrite($fh,$writestring);	
	$writestring = '  FormationDensity = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '}'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);
	$index_no=($index_no+1);
	}
	}
}
# this is the end of the do while loop	
// end download of moving columns
// start download of static columns
$q = 'SELECT * from columns where Moving = "0"';
$r = mysqli_query($camp_link,$q);
$num = mysqli_num_rows($r);
if ($num > 0)
{
	echo '<br>static columns in mission table';
	while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
	echo '<br>'.$row['id'].'|'.$row['Name'].$row['ckey'];
	$current_rec = $row['id'];
	$current_Name = $row['Name'];
	$col_coalition = $row['CoalID'];
	$col_YOri = $row['YOri'];
	$col_Model = $row['Model'];
	$col_moving = $row['Moving'];
	$col_qty = $row['Quantity'];
	$col_Country = $row['ckey'];
	$col_XPos = $row['XPos'];
	$col_ZPos = $row['ZPos'];	
	$col_dest_XPos = $row['dest_XPos'];
	$col_dest_ZPos = $row['dest_ZPos'];		
# need to save lead vehicle index number here
	$lead_veh_indexno = $index_no;
	$lead_mcu= ($index_no+1);
	$lead=1;
#	
	echo '<br>col moving is '.$col_moving;
# we need to collect the Vehicle information from the object properties Table
	$q2="SELECT * from object_properties WHERE Model = ('$col_Model') LIMIT 1";
	$r2=mysqli_query($camp_link,$q2);
	$r2_data = mysqli_fetch_row($r2);
	if ($r2_data[0]) 
		{
			$Model = $r2_data[6];
			$moving_becomes = $r2_data[7];
			$modelpath2 = $r2_data[8];
			$modelpath3 = $r2_data[9];
			$max_speed_kmh = $r2_data[10];
			$cruise_speed_kmh = $r2_data[11];
			$range_m = $r2_data[12];			
		}	
	else
		{echo'<p>'.mysqli_error($dbc).'</p>';}

# here is where we start writing a record to group file
$list_of_mcus ="";
# start a while loop that will carry on till qty of vehicles is 0
	while ($col_qty > 0)
		{
		if ($modelpath2 == "trains")
		{$writestring="Train\r\n";}
		else
		{$writestring="Vehicle\r\n";}
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
		if ($sim == "RoF")
		{
			$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($Model).'.txt";'."\r\n";	
		}
		else
		{
			if ($modelpath2 == "trains")
			{
			$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Trains\\".rtrim($Model).'.txt";'."\r\n";
			}
			else
			{
			$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\Vehicles\\".rtrim($Model).'.txt";'."\r\n";
			}
		}
		fwrite($fh,$writestring);
		$writestring = '  Model = "graphics'."\\"."$modelpath2\\"."$modelpath3"."\\"."$Model".'.mgm";'."\r\n";	
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
		if ($modelpath2 != 'trains')
		{$writestring = '  NumberInFormation = 0;'."\r\n";
		fwrite($fh,$writestring);}
		$writestring = '  Vulnerable = 1;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  Engageable = 1;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  LimitAmmo = 1;'."\r\n";
		fwrite($fh,$writestring);
		$writestring = '  AILevel = '.$ground_ai_level.';'."\r\n";		
		fwrite($fh,$writestring);	
		$writestring = '  DamageReport = 50;'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  DamageThreshold = 1;'."\r\n";				
		fwrite($fh,$writestring);			
		$writestring = '  DeleteAfterDeath = 1;'."\r\n";				
		fwrite($fh,$writestring);
		if ($sim == "BoS")
		{
		$writestring = '  CoopStart = 0;'."\r\n";				
		fwrite($fh,$writestring);	
		$writestring = '  Spotter = -1;'."\r\n";				
		fwrite($fh,$writestring);
		$writestring = '  BeaconChannel = 0;'."\r\n";				
		fwrite($fh,$writestring);		
		$writestring = '  Callsign = 0;'."\r\n";				
		fwrite($fh,$writestring);
		}
			# carriages write sequence
			if ($modelpath2 == 'trains')
			{
				# make sure train column is only one train
				$col_qty = 0;
				# need to find if carriages exist	
				$q9 = 'SELECT * from trains where Name = "standard"';
				$r9 = mysqli_query($camp_link,$q9);
				$num9 = mysqli_num_rows($r);
				if ($num9 > 0)
				{
					# this one has carriages
					$writestring = '  Carriages'."\r\n";
					fwrite($fh,$writestring);
					$writestring = '  {'."\r\n";
					fwrite($fh,$writestring);
					while ($row = mysqli_fetch_array($r9,MYSQLI_ASSOC))
					{
						$carriage = $row['Model'];
						$writestring = '    "LuaScripts\\WorldObjects\\Trains\\'.$carriage.'.txt"'."\r\n";
						fwrite($fh,$writestring);
					}
					$writestring = '  }'."\r\n";				
					fwrite($fh,$writestring);
				}
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
		$list_of_mcus = $list_of_mcus.$index_no.',';
		$writestring = '  Name = "'.$current_Name.' entity'.'"'.';'."\r\n";		
		fwrite($fh,$writestring);
		$writestring = '  Desc = "";'."\r\n";		
		fwrite($fh,$writestring);
		IF ($lead==1)
			{$writestring = '  Targets = [];'."\r\n";}
		ELSE	
			{$writestring = '  Targets = ['.$lead_mcu.'];'."\r\n";}
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
		$col_qty = $col_qty - 1;
		$index_no=($index_no+1);
		$lead=0;
		$col_XPos = $col_XPos + (2*$ground_spacing) + rand(-$ground_spacing,$ground_spacing);
		$col_ZPos = $col_ZPos - (2*$ground_spacing) + rand(-$ground_spacing,$ground_spacing);		
		}
		$list_of_mcus = substr($list_of_mcus,0,-1);
		echo '<br> list of mcus:'.$list_of_mcus;
# end of waypoint start of activate
	$writestring = 'MCU_Activate'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '{'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Index = '.$index_no.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Name = "Trigger Activate"'.';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Desc = "";'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Targets = ['.($index_no+1).'];'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Objects = ['.$list_of_mcus.'];'."\r\n";		
	fwrite($fh,$writestring);
	$col_XPos = $col_XPos + $ground_spacing;
	$writestring = '  XPos = '.number_format($col_XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$writestring = '  ZPos = '.number_format($col_ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '}'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);
	$index_no=($index_no+1);
# end of activate start of disactivate
	$writestring = 'MCU_Deactivate'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '{'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Index = '.$index_no.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Name = "Trigger Deactivate"'.';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Desc = "";'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Targets = ['.($index_no+1).'];'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Objects = ['.$list_of_mcus.'];'."\r\n";		
	fwrite($fh,$writestring);
	$col_XPos = $col_XPos + $ground_spacing;
	$writestring = '  XPos = '.number_format($col_XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$writestring = '  ZPos = '.number_format($col_ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '}'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);
	$index_no=($index_no+1);
# end of deactivate start of timer
	$writestring = 'MCU_Timer'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '{'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Index = '.$index_no.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Name = "Trigger Timer"'.';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Desc = "";'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Targets = ['.($index_no-1).'];'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Objects = [];'."\r\n";		
	fwrite($fh,$writestring);
	$way_XPos = ($col_dest_XPos+10);
	$writestring = '  XPos = '.number_format($way_XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$way_ZPos = ($col_dest_ZPos+5);	
	$writestring = '  ZPos = '.number_format($way_ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Time = '.($detect_off_time*60).';'."\r\n";	
	fwrite($fh,$writestring);		
	$writestring = '}'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);
	$index_no=($index_no+1);
# end of timer start of trigger
	$writestring = 'MCU_TR_ComplexTrigger'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '{'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Index = '.$index_no.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Name = "Translator Complex Trigger"'.';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Desc = "";'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Targets = [];'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Objects = [];'."\r\n";		
	fwrite($fh,$writestring);
	$way_XPos = ($col_dest_XPos+15);
	$writestring = '  XPos = '.number_format($way_XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$way_ZPos = ($col_dest_ZPos+5);	
	$writestring = '  ZPos = '.number_format($way_ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Enabled = 1;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Enabled = 1;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Cylinder = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Radius = '.$ground_detect_distance.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  DamageThreshold = 1;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  DamageReport = 50;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  CheckEntities = 1;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  CheckVehicles = 1;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterSpawned = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterEnteredSimple = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterEnteredAlive = 1;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterLeftSimple = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterLeftAlive = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterFinishedSimple = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterFinishedAlive = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterStationaryAndAlive = 1;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterFinishedStationaryAndAlive = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterTookOff = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterDamaged = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterCriticallyDamaged = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterRepaired = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterKilled = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterDropedBombs = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterFiredFlare = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterFiredRockets = 0;'."\r\n";	
	if ($col_coalition == '1')
		{
		$writestring = '  Country = 501;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Country = 502;'."\r\n";	
		fwrite($fh,$writestring);
		}
	else
	{
		$writestring = '  Country = 101;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Country = 102;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Country = 103;'."\r\n";	
		fwrite($fh,$writestring);
		$writestring = '  Country = 104;'."\r\n";
		fwrite($fh,$writestring);		
		$writestring = '  Country = 105;'."\r\n";	
		fwrite($fh,$writestring);
	}
	$writestring = '  OnEvents'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  {'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    OnEvent'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    {'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '      Type = 59;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '      TarId = '.($index_no-3).';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    }'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    OnEvent'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    {'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '      Type = 64;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '      TarId = '.($index_no-3).';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    }'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    OnEvent'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    {'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '      Type = 59;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '      TarId = '.($index_no-1).';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    }'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    OnEvent'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    {'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '      Type = 59;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '      TarId = '.($index_no-1).';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    }'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  }'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '}'."\r\n";	
	fwrite($fh,$writestring);
	$index_no=($index_no+1);
# end of first trigger
	$writestring = 'MCU_TR_ComplexTrigger'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '{'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Index = '.$index_no.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Name = "Translator Complex Trigger"'.';'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Desc = "";'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Targets = [];'."\r\n";		
	fwrite($fh,$writestring);
	$writestring = '  Objects = [];'."\r\n";		
	fwrite($fh,$writestring);
	$way_XPos = ($col_dest_XPos+15);
	$writestring = '  XPos = '.number_format($way_XPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YPos = 0.000;'."\r\n";	
	fwrite($fh,$writestring); 	
	$way_ZPos = ($col_dest_ZPos+5);	
	$writestring = '  ZPos = '.number_format($way_ZPos, 3, '.', '').';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  XOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  YOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  ZOri = 0.00;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Enabled = 1;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Enabled = 1;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Cylinder = 1;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  Radius = '.$air_detect_distance.';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  DamageThreshold = 1;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  DamageReport = 50;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  CheckEntities = 1;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  CheckVehicles = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterSpawned = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterEnteredSimple = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterEnteredAlive = 1;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterLeftSimple = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterLeftAlive = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterFinishedSimple = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterFinishedAlive = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterStationaryAndAlive = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterFinishedStationaryAndAlive = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterTookOff = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterDamaged = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterCriticallyDamaged = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterRepaired = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterKilled = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterDropedBombs = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterFiredFlare = 0;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  EventsFilterFiredRockets = 0;'."\r\n";	
	$writestring = '  OnEvents'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  {'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    OnEvent'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    {'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '      Type = 59;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '      TarId = '.($index_no-4).';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    }'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    OnEvent'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    {'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '      Type = 59;'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '      TarId = '.($index_no-2).';'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '    }'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '  }'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = '}'."\r\n";	
	fwrite($fh,$writestring);
	$index_no=($index_no+1);


#end of second trigger	
	}
}
# this is the end of the do while loop	



// end download of static colums
fclose($fh);
# here ends the groupfile sequence
// actually do the downloads
echo "We are now ready to download the <b>" .$abbrv. "_New_Mission.Group</b> file to your PC, then import it into a clean template in the mission editor!<br><br />\n";
echo "<form id=\"campaignMgmtDLFile\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtDLFile.php?btn=campStp&sde=campCol\" method=\"post\">\n";
$DownloadDir = 'downloads/';
print "<select name=\"dlfile\">\n";
// get list of files as array, removing '.' and '..' from the list
$files=array_diff(scandir($DownloadDir), array('.','..'));
// sort the array in natural fashion
natsort($files);
// print the list of files that contains $abbrv
// make each an element of a pulldown list
echo "<option value=\"\">Select file to download</option>\n";
$abbrv = get_abbrv();
while (list ($key, $value) = each ($files)) 
{
   if (preg_match("/^$abbrv/","$value")) 
   {
	echo "<option value=\"$value\">$value</option>\n";
	}
}
echo "</p><input type=\"submit\" value=\"Go\"><br>\n";
// close $camp_link
$camp_link->close();
?>

            </div>
    
        </div>

		<?php
            # Include the general sidebar
            include ( 'includes/sidebar.php' );
        ?>	

		<div id="clearing"></div>
	</div>

<?php
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
