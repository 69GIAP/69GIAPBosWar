# V1.0
# Stenka 06/10/13
# Php version of mission 1 write
<?php
# require is connecting user peter to stalingrad1 database
# here
require('../connect_db.php');
# next load campaign variable into constants
require('cam_param.php');
echo '<br>ground transport speed is '. CAM_GROUND_TRANSPORT_SPEED;
# initialise variables
$current_mission = 1;
$miss = 'mission_'.$current_mission;
$coalition = "allies";
#$coalition == "central"
if ($coalition == "allies")
{$coa = 1;}
else
{$coa = 2;}
# $path is the path to where the user keeps the group files
$path = 'c:/BOSWAR/';
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
if ($coalition == "allies")
{$q1="UPDATE static_".$miss." set static_updated = 0 where static_coalition = '1'";}
else
{$q1="UPDATE static_".$miss." set static_updated = 0 where static_coalition = '2'";}
$r1= mysqli_query($dbc,$q1);
if ($r1)
	{echo '<br> update flag updated';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
#prepare datafile for output
#$filename = "c:/BOSWAR/allied_m1_final.Group";
$filename = $path.$coalition.'_static_'.$miss.".Group";
echo'<br> filename is:'.$filename;
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
# now we write the static vehicles
$q = 'SELECT * from static_'.$miss. ' where static_Type = "Vehicle" ORDER BY static_coalition,static_Name';
$r = mysqli_query($dbc,$q);
$num = mysqli_num_rows($r);
$list_of_mcus ="";
if ($num > 0)
{
	echo '<br>static vehicles in mission table';
	while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
	echo '<br>'.$row['id'].'|'.$row['static_Name'].$row['static_Country'];
	$search_Name = $row['static_Name'];
	$q5 = 'SELECT * from static_'.$miss. ' where static_Type = "Vehicle" AND static_Name = "'.$search_Name.'" AND static_updated = 0 AND static_coalition = '.$coa ;
	echo '<br>Select:'.$q5;
	$r5 = mysqli_query($dbc,$q5);
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
# need to save lead vehicle index number here
			$lead_veh_indexno = $index_no;
			$lead_mcu= ($index_no+1);
			$lead=1;
# we need to collect the Vehicle information from the Vehicle Table
			$q2="SELECT * from Vehicles WHERE Model = ('$static_Model')";
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
			$q1="IOutput VALUES ('$writestring')";
			$writestring = '  XOri = 0.00;'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  YOri = '.$static_YOri.';'."\r\n";
			fwrite($fh,$writestring);	
			$writestring = '  ZOri = 0.00;'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  Script = "LuaScripts'."\\".'WorldObjects'."\\".rtrim($Model).'.txt";'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  Model = "graphics'."\\"."$modelpath2\\"."$modelpath3"."\\"."$Model".'.mgm";'."\r\n";	
			fwrite($fh,$writestring);
			$writestring = '  Desc = "';
			if ($static_coalition == '1')
				{$writestring = $writestring.'Allied ';}
			else
				{$writestring = $writestring.'Central ';}
			$writestring = $writestring.'static ';
			$writestring = $writestring.' '.rtrim($static_Model).'";'."\r\n";
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
			$static_XPos = $static_XPos + (2*CAM_GROUND_SPACING) + rand(-CAM_GROUND_SPACING,CAM_GROUND_SPACING);
			$static_ZPos = $static_ZPos - (2*CAM_GROUND_SPACING) + rand(-CAM_GROUND_SPACING,CAM_GROUND_SPACING);
			echo '<br> Updating Vehicle or Artillery';
			$q6="UPDATE static_".$miss." set static_updated = 1 where id = ".$current_rec;
			$r6= mysqli_query($dbc,$q6);
			if ($r6)
				{echo '<br> updated';}
			else
				{echo'<p>'.mysqli_error($dbc).'</p>';}
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
		$static_XPos = $static_XPos + CAM_GROUND_SPACING;
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
		$static_XPos = $static_XPos + CAM_GROUND_SPACING;
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
		$writestring = '  Time = '.(CAM_DETECT_OFF_TIME*60).';'."\r\n";	
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
		$writestring = '  Radius = '.CAM_DETECT_GROUND.';'."\r\n";	
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
		$writestring = '  Radius = '.CAM_DETECT_AIR.';'."\r\n";	
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
if ($coalition=="central")
{
$q = 'SELECT * from static_mission_'.$current_mission. ' WHERE static_coalition = "2" AND static_updated = 0';
echo '<br>select is:'.$q;
}
else
{
$q = 'SELECT * from static_mission_'.$current_mission. ' WHERE static_coalition = "1"AND static_updated = 0';
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
