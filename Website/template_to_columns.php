# V1.1
# Stenka 15/3/14
# Php version of inbox table to load into Columns from template_2_columns_allies.Group or template_2_columns_central.Group
# for admin user attach to menu and read either allied or central received by e-mail
# for central or allied planner just reads their side
<?php
# connecting user  to campaign database
# here

	$dbc = new mysqli ( "localhost", "root" , "bartok" , "march1" );

# next load campaign variable into constants
# require('cam_param.php');
# $path is the path to where the user keeps the group files
$path = 'c:/BOSWAR/march-1-groups/';
# are we inputting an allied or central
$coalition="allies";
#$coalition="central";
# end coalition select
$count = 0;
$current_object = "Unknown";
$current_Name = "Unknown";
$filename = $path.'template_2_columns_'.$coalition.".Group";
echo '<br>Filename is :'.$filename;
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
	if (substr($line,0,9)=="  Name = ")
	{
	$current_Name = substr($line,10,50);
	$current_Name = rtrim($current_Name);
	$current_Name = substr($current_Name,0,-2);
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
	if (substr($line,0,1)=='}')
	{
	echo '<br> Updating Vehicle or Artillery';
	$q1="UPDATE columns set XPos = $XPos,ZPos = $ZPos,YOri = $YOri where Name = '$current_Name'";
	$r1= mysqli_query($dbc,$q1);
	if ($r1)
			{echo '<br> updated';}
	else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
	}	
	$count = 1+$count;
}
