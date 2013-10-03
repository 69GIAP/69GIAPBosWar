# V1.0
# Stenka 10/9/13
# Php version of inbox table to load into airfields table runs after inbox load
<?php
# require is connecting user peter to stalingrad1 database
# here
require('../connect_db_STENKA.php');
$count = 0;
$current_object = "Unknown";
$current_Name = "Unknown";
$filename = "c:/BOSWAR/allied_m1_back.Group";
$dest_XPos = 0;
$dest_ZPos = 0;
$fp = fopen( $filename, "r" ) or die("Couldn't open $filename");
while ( ! feof( $fp ) ) {
	$line = fgets( $fp, 1024 );
#	print "$line<br>";
	if (substr($line,0,7) == 'Vehicle')
	{
	$current_object = 'Vehicle';
	echo '<br> Found a :'.$current_object;
	$count = 0;
	}
	if (substr($line,0,9) == 'Artillery')
	{
	$current_object = 'Artillery';
	echo '<br> Found a :'.$current_object;
	$count = 0;
	}	
	if (substr($line,0,9) == 'MCU_TR_Entity')
	{
	$current_object = 'MCU_TR_Entity';
	echo '<br> Found a :'.$current_object;
	$count = 0;
	}		
	if (substr($line,0,12) == 'MCU_Waypoint')
	{
	$current_object = 'MCU_Waypoint';
	echo '<br> Found a :'.$current_object;
	$count = 0;
	}		
	if (substr($line,0,9)=="  Name = ")
	{
	$current_Name = substr($line,10,50);
	$current_Name = rtrim($current_Name);
	$current_Name = substr($current_Name,0,-2);
	echo '<br> Name is :'.$current_Name;
	}
	if ($current_object=='MCU_Waypoint')
	{
		if (substr($line,0,9)=="  XPos = ")
		{
		$dest_XPos = substr($line,9,50);
		$dest_XPos = rtrim($dest_XPos);
		$dest_XPos = substr($dest_XPos,0,-1);
		$dest_XPos = floatval($dest_XPos);
		echo '<br> Destination Xpos is :'.$dest_XPos;
		}
		if (substr($line,0,9)=="  ZPos = ")
		{
		$dest_ZPos = substr($line,9,50);
		$dest_ZPos = rtrim($dest_ZPos);
		$dest_ZPos = substr($dest_ZPos,0,-1);
		$dest_ZPos = floatval($dest_ZPos);
		echo '<br> Destination ZPos is :'.$dest_ZPos;
		}
	}
	else
	{
		if (substr($line,0,9)=="  XPos = ")
		{
		$XPos = substr($line,9,50);
		$XPos = rtrim($XPos);
		$XPos = substr($XPos,0,-1);
		$XPos = floatval($XPos);
		echo '<br> Xpos is :'.$XPos;
		}
		if (substr($line,0,9)=="  ZPos = ")
		{
		$ZPos = substr($line,9,50);
		$ZPos = rtrim($ZPos);
		$ZPos = substr($ZPos,0,-1);
		$ZPos = floatval($ZPos);
		echo '<br> ZPos is :'.$ZPos;
		}
	}
	if (substr($line,0,9)=="  YOri = ")
	{
	$YOri = substr($line,9,50);
	$YOri = rtrim($YOri);
	$YOri = substr($YOri,0,-1);
	$YOri = floatval($YOri);
	echo '<br> YOri is :'.$YOri;
	}
	if (substr($line,0,1)=='}')
	{
	echo '<br> Updating Vehicle or Artillery';
	$q1="UPDATE mission_1 set 
#	col_XPos = $XPos,
#	col_ZPos = $ZPos,
#	col_YOri = $YOri,
	col_dest_XPos = $dest_XPos,
	col_dest_ZPos = $dest_ZPos
	where col_Name = '$current_Name'";
	$r1= mysqli_query($dbc,$q1);
	if ($r1)
			{echo '<br> updated';}
	else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
	}	
	$count = 1+$count;
}
