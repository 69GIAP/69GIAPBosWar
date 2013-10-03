<?php
require('../connect_db.php');
function show_records($dbc)
{
$q='SELECT * FROM colveh_10';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Records in colveh_10 table</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
		{
		echo'<br>'.$row['id'].'|'.$row['column_name'].'|'.$row['column_country'];
		}
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
}
show_records($dbc);
echo '<br>OK Ive shown the records with function now onto a test';
$nametest = 'Regiment x Platoon 1';
echo '<br>test variable has been defined';
$q = "SELECT id,column_name,column_country FROM colveh_10 WHERE column_name = '$nametest' LIMIT 1";
echo "<br>$q";
$r = mysqli_query($dbc,$q);
$num = mysqli_num_rows($r);
if ($num == 1)
{
echo "<br>select has been executed num is true";
}
else
{
echo "<br>select has been executed num is false";
}
if($num)
{
	while($row=mysqli_fetch_array($r,MYSQLI_ASSOC))
	{
		echo'<br>'.$row['id'].'|'.$row['column_name'].'|'.$row['column_country'];
	}
	echo "<br>$num records"; 
	echo '<h1>Record already exists - going into update routine </h1>';
}
else
{
	echo '<p>'.mysqli_error($dbc).'</p>';
}
?>
$q = 'INSERT INTO colveh_10(column_name,column_country)
VALUES
("Regiment 2 Platoon 1","103"),("Regiment 2 Platoon 2","103")';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Records in colveh_10 table</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_ASSOC))
		{
		echo'<br>'.$row['id'].'|'.$row['column_name'].'|'.$row['column_country'];
		}
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
show_records($dbc);
	
mysqli_close($dbc);
?>