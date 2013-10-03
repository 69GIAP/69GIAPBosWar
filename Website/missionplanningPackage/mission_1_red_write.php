# V1.0
# Stenka 02/10/13
# Php version of mission 1 write
<?php
# require is connecting user peter to stalingrad1 database
# here
require('require.php');
# next load campaign variable into constants
require('cam_param.php');
# pre process columns
# require('pre_mission_generation_check.php');
# now we will start creating columns
# initialise variables
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
$filename = "c:/BOSWAR/red_m1_final.Group";
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
$q = 'SELECT * from mission_1 where col_moving = "1"';
$r = mysqli_query($dbc,$q);
$num = mysqli_num_rows($r);
if ($num > 0)
{
	echo '<br>Moving columns in mission_1 table';
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
	$col_dest_XPos = $row['col_dest_XPos'];
	$col_dest_ZPos = $row['col_dest_ZPos'];		
# need to save lead vehicle index number here
	$lead_veh_indexno = $index_no;
	$lead_mcu= ($index_no+1);
	$lead=1;
#	
	echo '<br>col moving is '.$col_moving;
# we need to collect the Vehicle information from the Vehicle Table
	$q2="SELECT * from Vehicles WHERE Model = ('$col_Model')";
	$r2=mysqli_query($dbc,$q2);
	$r2_data = mysqli_fetch_row($r2);
	if ($r2_data[0]) 
		{
			$Model = $r2_data[1];
			$moving_becomes = $r2_data[2];
			$game_name = $r2_data[3];
			$modelpath2 = $r2_data[4];
			$modelpath3 = $r2_data[5];
			$max_speed_kmh = $r2_data[6];
			$cruise_speed_kmh = $r2_data[7];
			$range_m = $r2_data[7];			
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
	$q3="SELECT * from Vehicles WHERE Model = ('$moving_becomes')";
	$r3=mysqli_query($dbc,$q3);
	$r3_data = mysqli_fetch_row($r3);
	if ($r3_data[0]) 
		{
			$Model = $r3_data[1];
			$moving_becomes = $r3_data[2];
			$game_name = $r3_data[3];
			$modelpath2 = $r3_data[4];
			$modelpath3 = $r3_data[5];
			$max_speed_kmh = $r3_data[6];
			$cruise_speed_kmh = $r3_data[7];
			$range_m = $r3_data[7];			
		}	
	else
		{echo'<p>'.mysqli_error($dbc).'</p>';}
	}
# here is where we start writing a record to group file
# start a while loop that will carry on till qty of vehicles is 0
	while ($col_qty > 0)
		{
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
		$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($Model).'.txt";'."\r\n";	
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
		$col_XPos = $col_XPos + CAM_GROUND_SPACING ;
		$col_ZPos = $col_ZPos - CAM_GROUND_SPACING ;		
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
	if (CAM_GROUND_TRANSPORT_SPEED > $cruise_speed_kmh)
		{$speed_of_column = $cruise_speed_kmh;}
	else
		{$speed_of_column = $CAM_GROUND_TRANSPORT_SPEED;}
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
	$writestring = '  Time = '.(rand(1,(CAM_LINEUP_TIME*60))).';'."\r\n";	
	fwrite($fh,$writestring);		
	$writestring = '}'."\r\n";	
	fwrite($fh,$writestring);
	$writestring = ''."\r\n";	
	fwrite($fh,$writestring);
	$index_no=($index_no+1);
# end of timer start of formation
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
# this is the end of the do while loop	
	
# here we stop write to outbox_1
fclose($fh);
	echo "<br>$num Records";