# V1.1
# Stenka 12/3/14
# Php version of inbox table to load into static from static_template_allies_back.Group or static_template_central_back.Group
# This goes on the admin menu reading central or allied which would be received by e-mail from the allied and central planners
# It will also appear on the central planners menu and the allied planners menu but only reading their files
<?php
# connecting user  to campaign database
# here

	$dbc = new mysqli ( "localhost", "root" , "bartok" , "march1" );

# $path is the path to where the user keeps the group files
$path = 'c:/BOSWAR/march-1-groups/';
# are we inputting an allied or central
$coalition="allies";
#$coalition="central";
# end coalition select
# set update flags to zero
if ($coalition == "allies")
{$q1="UPDATE static set static_updated = 0 where static_coalition = '1'";}
else
{$q1="UPDATE static set static_updated = 0 where static_coalition = '2'";}
$r1= mysqli_query($dbc,$q1);
if ($r1)
	{echo '<br> update flag updated';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
$count = 0;
$current_object = "Unknown";
$current_Name = "Unknown";
$filename = $path.'static_template_'.$coalition."_back.Group";
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
	if (substr($line,0,9)== "  Model =")
	{
	$Model = substr(strrchr($line, "\\"), 1);
	$Model = rtrim($Model);
	$Model = substr($Model,0,-6);
	echo '<br>Model is :'.$Model;
	}
	if (substr($line,0,1)=='}' AND ($current_object != 'MCU_TR_Entity'))
	{
	echo '<br> Updating';
# check if corresponding record exists in static
	$id = 0;
	$q2="SELECT * from static where static_Name = '$current_Name' AND static_Model = '$Model' AND static_updated = 0 LIMIT 1";
	echo '<br> My select is:'.$q2;
	$r2=mysqli_query($dbc,$q2);
	$r2_data = mysqli_fetch_row($r2);
	if ($r2_data[0]) 
		{
			$id = $r2_data[0];
			echo '<br>I found record no:'.$id;
			$q1="UPDATE static set static_XPos = $XPos,static_ZPos = $ZPos,static_YOri = $YOri,static_updated=1 where id = $id";
			echo '<br> My update select is:'.$q1;
			$r1= mysqli_query($dbc,$q1);
			if ($r1)
				{echo '<br> updated record'.$id;}
			else
				{echo'<p>'.mysqli_error($dbc).'</p>';}
		}	
			
	}	
	else
		{echo'<p>'.mysqli_error($dbc).'</p>';}
}	
