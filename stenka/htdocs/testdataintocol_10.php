# V1.0
# Stenka 29/09/13
# Load test data into col_10
<?php
require('../connect_db.php');
$q3="INSERT INTO col_10 (col_Name,col_moving,col_Model,col_supplypoint,col_qty,col_coalition) VALUES ('REGIMENT 1 Platoon 1','0','leyland','1',3,'1')";
$r3= mysqli_query($dbc,$q3);
if ($r3)
	{echo'<br>column added';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';} 
$q3="INSERT INTO col_10 (col_Name,col_moving,col_Model,col_supplypoint,col_qty,col_coalition) VALUES ('REGIMENT 1 Platoon 2','0','leyland','1',2,'1')";
$r3= mysqli_query($dbc,$q3);
if ($r3)
	{echo'<br>column added';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';} 
$q3="INSERT INTO col_10 (col_Name,col_moving,col_Model,col_supplypoint,col_qty,col_coalition) VALUES ('REGIMENT 2 Platoon 1','1','leyland','2',4,'1')";
$r3= mysqli_query($dbc,$q3);
if ($r3)
	{echo'<br>column added';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';} 