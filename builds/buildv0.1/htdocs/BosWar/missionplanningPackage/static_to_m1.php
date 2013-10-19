# V1.0<br />
# Stenka 05/10/13<br />
# Php version of creation of static_mission_1 table from static ready for planning.<br />
<?php
# require is connecting user peter to stalingrad1 database
# here
require('../connect_db.php');
$q1="DROP TABLE IF EXISTS static_mission_1";
	$r1= mysqli_query($camp_link,$q1);
	if ($r1)
			{echo '<br> table dropped ';}
	else
			{echo'<p>'.mysqli_error($camp_link).'</p>';}
$q1="CREATE TABLE static_mission_1 LIKE static";
	$r1= mysqli_query($camp_link,$q1);
	if ($r1)
			{echo '<br> table created ';}
	else
			{echo'<p>'.mysqli_error($camp_link).'</p>';}
$q1="INSERT static_mission_1 SELECT * FROM static";
	$r1= mysqli_query($camp_link,$q1);
	if ($r1)
			{echo '<br> data copied ';}
	else
			{echo'<p>'.mysqli_error($camp_link).'</p>';}



