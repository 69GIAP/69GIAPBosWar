# V1.0
# Stenka 04/10/13
# Php version of creation of mission_1 table from col_10 ready for planning
<?php
# require is connecting user peter to stalingrad1 database
# here
require('../connect_db.php');
$q1="DROP TABLE IF EXISTS mission_1";
	$r1= mysqli_query($dbc,$q1);
	if ($r1)
			{echo '<br> table dropped ';}
	else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
$q1="CREATE TABLE mission_1 LIKE col_10";
	$r1= mysqli_query($dbc,$q1);
	if ($r1)
			{echo '<br> table created ';}
	else
			{echo'<p>'.mysqli_error($dbc).'</p>';}
$q1="INSERT mission_1 SELECT * FROM col_10";
	$r1= mysqli_query($dbc,$q1);
	if ($r1)
			{echo '<br> data copied ';}
	else
			{echo'<p>'.mysqli_error($dbc).'</p>';}



