# V1.0
# Stenka 29/09/13
# Load test data into col_10
<?php
require('require.php');
$q3="INSERT INTO col_10 (col_Name,col_moving,col_Model,col_supplypoint,col_qty,col_coalition) VALUES ('REGIMENT 1 Platoon 1','0','leyland','1',5,'1')";
$r3= mysqli_query($dbc,$q3);
if ($r3)
	{echo'<br>column added';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';} 
$q3="INSERT INTO col_10 (col_Name,col_moving,col_Model,col_supplypoint,col_qty,col_coalition) VALUES ('REGIMENT 1 Platoon 2','0','a7v','1',2,'1')";
$r3= mysqli_query($dbc,$q3);
if ($r3)
	{echo'<br>column added';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';} 
$q3="INSERT INTO col_10 (col_Name,col_moving,col_Model,col_supplypoint,col_qty,col_coalition) VALUES ('REGIMENT 2 Platoon 1','1','leylands','2',4,'1')";
$r3= mysqli_query($dbc,$q3);
if ($r3)
	{echo'<br>column added';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';} 
$q3="INSERT INTO col_10 (col_Name,col_moving,col_Model,col_supplypoint,col_qty,col_coalition) VALUES ('FLAK 1 Platoon 1','1','thornycroftaaa','3',4,'1')";
$r3= mysqli_query($dbc,$q3);
if ($r3)
	{echo'<br>column added';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';} 
$q3="INSERT INTO col_10 (col_Name,col_moving,col_Model,col_supplypoint,col_qty,col_coalition) VALUES ('FLAK 2 Platoon 1','1','hotchkiss','2',4,'1')";
$r3= mysqli_query($dbc,$q3);
if ($r3)
	{echo'<br>column added';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';} 
$q3="INSERT INTO col_10 (col_Name,col_moving,col_Model,col_supplypoint,col_qty,col_coalition,col_Country) VALUES ('REGIMENT 3 Zug 1','1','hotchkiss','2',4,'2','501')";
$r3= mysqli_query($dbc,$q3);
if ($r3)
	{echo'<br>column added';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';} 