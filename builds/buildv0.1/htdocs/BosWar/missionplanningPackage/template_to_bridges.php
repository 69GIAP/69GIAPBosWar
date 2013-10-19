# V1.0
# Stenka 11/10/13
# Php version of template read in of bridges
<?php
# $groupFilePath is the path to where the user keeps the group files
$sql = "SELECT groupFile_path FROM campaign_users 
		WHERE user_id = $userId 
		AND camp_db = '$loadedCampaign';";
if ($result = mysqli_query($dbc, $sql)) 
		{				
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$groupFilePath	=($obj->groupFile_path);
				}
		}
# set update flags to zero
$q1="DELETE FROM bridges";
$r1= mysqli_query($camp_link,$q1);
if ($r1)
	{echo '<br> deleted all existing bridges';}
else
	{echo'<p>'.mysqli_error($camp_link).'</p>';}
$count = 0;
$current_object = "Unknown";
$current_Name = "Unknown";
$filename = $groupFilePath.'template_bridges.Group';
$count1 = 1;
echo '<br>Filename is :'.$filename;
$fp = fopen( $filename, "r" ) or die("Couldn't open $filename");
while ( ! feof( $fp ) ) 
{
	$line = fgets( $fp, 1024 );
#	print "$line<br>";
	if (substr($line,0,7) == 'Vehicle')
	{
	$current_object = 'Vehicle';
	echo '<br> Found a :'.$current_object;
	$count = 0;
	}
	if (substr($line,0,4) == 'Flag')
	{
	$current_object = 'Flag';
	echo '<br> Found a :'.$current_object;
	$count = 0;
	}	
	if (substr($line,0,5) == 'Block')
	{
	$current_object = 'Block';
	echo '<br> Found a :'.$current_object;
	$count = 0;
	}		
	if (substr($line,0,5) == 'Train')
	{
	$current_object = 'Train';
	echo '<br> Found a :'.$current_object;
	$count = 0;
	}
	if (substr($line,0,6) == 'Bridge')
	{
	$current_object = 'Bridge';
	echo '<br> Found a :'.$current_object;
	$d1 = 0;
	$d2 = 0;
	$d3 = 0;
	$d4 = 0;
	$d5 = 0;
	$d6 = 0;
	$d7 = 0;
	$d8 = 0;
	$d9 = 0;
	$d10 = 0;
	$count = 0;
	}
	if (substr($line,0,13) == 'MCU_TR_Entity')
	{
	$current_object = 'MCU_TR_Entity';
	echo '<br> Found a :'.$current_object;
	$count = 0;
	}		
	if (substr($line,0,9)=="  Name = ")
	{
	$current_Name = substr($line,10,50);
	$current_Name = rtrim($current_Name);
	$current_Name = substr($current_Name,0,-2);
	if ($current_Name == "Bridge")
		{$current_Name = $current_Name." ".$count1;}
	echo '<br> Name is :'.$current_Name;
	}
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
	if (substr($line,0,9)=="  YOri = ")
	{
	$YOri = substr($line,9,50);
	$YOri = rtrim($YOri);
	$YOri = substr($YOri,0,-1);
	$YOri = floatval($YOri);
	echo '<br> YOri is :'.$YOri;
	}
	if (substr($line,0,9)== "  Model =")
	{
	$Model = substr(strrchr($line, "\\"), 1);
	$Model = rtrim($Model);
	$Model = substr($Model,0,-6);
	echo '<br>Model is :'.$Model;
	}
	if (substr($line,0,10)== "    1 = 1;")
		{$d1 = 1;}
	if (substr($line,0,10)== "    2 = 1;")
		{$d2 = 1;}	
	if (substr($line,0,10)== "    3 = 1;")
		{$d3 = 1;}
	if (substr($line,0,10)== "    4 = 1;")
		{$d4 = 1;}
	if (substr($line,0,10)== "    5 = 1;")
		{$d5 = 1;}
	if (substr($line,0,10)== "    6 = 1;")
		{$d6 = 1;}
	if (substr($line,0,10)== "    7 = 1;")
		{$d7 = 1;}
	if (substr($line,0,10)== "    8 = 1;")
		{$d8 = 1;}
	if (substr($line,0,10)== "    9 = 1;")
		{$d9 = 1;}
	if (substr($line,0,11)== "    10 = 1;")
		{$d10 = 1;}
	if (substr($line,0,1)=='}' AND ($current_object == 'Bridge'))
	{
	echo '<br> Updating';
# insert record
	$id = 0;
	$q2="INSERT INTO bridges (bridge_Name,bridge_Model,bridge_XPos,bridge_ZPos,bridge_YOri,bridge_damage_1,bridge_damage_2,bridge_damage_3,bridge_damage_4,bridge_damage_5,bridge_damage_6,bridge_damage_7,bridge_damage_8,bridge_damage_9,bridge_damage_10) 
	values ('".$current_Name."','".$Model."',$XPos,$ZPos,$YOri,$d1,$d2,$d3,$d4,$d5,$d6,$d7,$d8,$d9,$d10)";
	echo '<br> My select is:'.$q2;
	$r2=mysqli_query($camp_link,$q2);
	if ($r2) 
		{
			echo '<br>Bridge added:';
			$count1 = $count1 + 1;
		}
	else
		{echo'<p>'.mysqli_error($camp_link).'</p>';}
	}	
			
}	

