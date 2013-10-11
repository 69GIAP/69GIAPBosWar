# V1.0
# Stenka 01/10/13
# Php version of mission 1 checking planning data before generating missio
<?php
# next load campaign variable into constants
require('cam_param.php');
# initialise variables
$time_availiable=CAM_MISSION_TIME+CAM_LINEUP_TIME;
$speed=CAM_GROUND_TRANSPORT_SPEED;
# end of my variables initialisation
$current_mission = 1;
$miss = 'mission_'.$current_mission;
# $path is the path to where the user keeps the group files
$path = 'c:/BOSWAR/';
$q = 'SELECT * from '.$miss;
$r = mysqli_query($camp_link,$q);
$num = mysqli_num_rows($r);
if ($num > 0)
{
	echo '<br>Records in mission table';
	while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
	echo '<br>'.$row['id'].'|'.$row['col_Name'].$row['col_Country'];
	$current_rec = $row['id'];
	$current_Name = $row['col_Name'];
	$col_coalition = $row['col_coalition'];
	$col_YOri = $row['col_YOri'];
	$col_Model = $row['col_Model'];
# search for vehicle speed info
	$q2="SELECT * from Vehicles WHERE Model = ('$col_Model')";
	$r2=mysqli_query($camp_link,$q2);
	$r2_data = mysqli_fetch_row($r2);
	if ($r2_data[0]) 
		{
			$Model = $r2_data[1];
			echo '<br> Found the model is a :'.$Model;
			$moving_becomes = $r2_data[2];
			echo '<br> moving becomes is a :'.$Model;
			$game_name = $r2_data[3];
			$modelpath2 = $r2_data[4];
			$modelpath3 = $r2_data[5];
			$max_speed_kmh = $r2_data[6];
			$cruise_speed_kmh = $r2_data[7];
			$range_m = $r2_data[7];			
		}	
	else
		{echo'<p>'.mysqli_error($camp_link).'</p>';}
	if ($Model == $moving_becomes)
	{
	echo '<br>This is a vehicle capable of moving';
	}
	else
	{	
	echo '<br>This is artillery must be loaded into vehicle';
	$q3="SELECT * from Vehicles WHERE Model = ('$moving_becomes')";
	$r3=mysqli_query($camp_link,$q3);
	$r3_data = mysqli_fetch_row($r3);
	if ($r3_data[0]) 
		{
			$Model = $r3_data[1];
			echo '<br> So this is now a :'.$Model;
			$moving_becomes = $r3_data[2];
			$game_name = $r3_data[3];
			$modelpath2 = $r3_data[4];
			$modelpath3 = $r3_data[5];
			$max_speed_kmh = $r3_data[6];
			$cruise_speed_kmh = $r3_data[7];
			$range_m = $r3_data[7];			
		}	
	else
		{echo'<p>'.mysqli_error($camp_link).'</p>';}
	}
# end of grabbing vehicle details start decide what speed
if ($speed > $cruise_speed_kmh)
	{$speed_of_column = $cruise_speed_kmh;}
else
	{$speed_of_column = $speed;}
		echo '<br>Speed of column is : '.$cruise_speed_kmh;
	#end of working out speed
	$col_moving = $row['col_moving'];
	$col_qty = $row['col_qty'];
	$col_Country = $row['col_Country'];
	echo '<br> col moving starts at '.$col_moving;
	$XPos = $row['col_XPos'];
	$ZPos = $row['col_ZPos'];
	$dest_XPos = $row['col_dest_XPos'];
	$dest_ZPos = $row['col_dest_ZPos'];
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
	$q1="UPDATE ".$miss. " set 
	col_dest_XPos = $dest_XPos,
	col_dest_ZPos = $dest_ZPos,
	col_moving = substr($col_moving,1,1)
	where id = $current_rec";
	$r1= mysqli_query($camp_link,$q1);
	if ($r1)
	{
		echo'<br> written destination z x pos back to mission';
	}
	else
		{echo'<p>'.mysqli_error($camp_link).'</p>';} 	
	
	}
}
# this is the end of the do while loop	

	echo "<br>$num Records";
