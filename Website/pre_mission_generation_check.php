# V1.0
# Stenka 24/03/14
# Php version of mission checking planning data before generating missio
<?php
# connecting user  to campaign database
# here

	$dbc = new mysqli ( "localhost", "root" , "bartok" , "march1" );

# next load campaign variable into constants
require('cam_param.php');
# initialise variables
$time_availiable=CAM_MISSION_TIME+CAM_LINEUP_TIME;
$speed=CAM_GROUND_TRANSPORT_SPEED;
# end of my variables initialisation
# $path is the path to where the user keeps the group files
$path = 'c:/BOSWAR/march-1-groups';
$q = 'SELECT * from columns';
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
	$col_coalition = $row['CoalID'];
	$col_YOri = $row['YOri'];
	$col_Model = $row['Model'];
# search for vehicle object_properties WHERE Model = ('$col_Model')";
	$q2="SELECT * from object_properties WHERE Model = ('$col_Model')";
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
	$q3="SELECT * from object_properties WHERE Model = ('$moving_becomes')";
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
		$dest_ZPos = $ZPos + ($deltax * $fractiontraveled);
	}
# if vehicle destination is not greater than ground spacing *20  set to static and Destination = start
	if ($tripdistance < (CAM_GROUND_SPACING*20))
	{
	$dest_XPos = $XPos;
	$dest_ZPos = $ZPos;
	$col_moving = "0";
	echo '<br> This ones a static x:';
	}
	else
	{$col_moving = "1";}
	echo '<br> This ones moving x:';	
	echo '<br> col moving ends at '.$col_moving;
	echo '<br> Start x:'.$XPos;
	echo '<br> Start Z:'.$ZPos;	
	echo '<br> Final destination x:'.$dest_XPos;
	echo '<br> Final destination Z:'.$dest_ZPos;
# here I will write back the destination x & z to  mission_1	
	echo '<br> im updating col_moving with '.$col_moving;
	$q1="UPDATE columns set 
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
