# V1.0
# Stenka 04/10/13
# Php version of creation of mission_n+1 table from mission_n ready for planning
<?php
# require is connecting user peter to stalingrad1 database
$current_mission = 1;
$miss_old = 'mission_'.$current_mission;
$miss_new = 'mission_'.($current_mission+1);
require('require.php');
$q1="DROP TABLE IF EXISTS ".$miss_new;
echo '<br>'.$q1;
	$r1= mysqli_query($dbc,$q1);
	if ($r1)
			{echo '<br> table dropped ';}
	else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
$q1="CREATE TABLE ".$miss_new. ' LIKE '.$miss_old;
echo '<br>'.$q1;
	$r1= mysqli_query($dbc,$q1);
	if ($r1)
			{echo '<br> table created ';}
	else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
$q1="INSERT ".$miss_new. ' SELECT * FROM '.$miss_old;
	$r1= mysqli_query($dbc,$q1);
	if ($r1)
			{echo '<br> data copied ';}
	else
			{echo'<p>'.mysqli_error($dbc).'</p>';}



