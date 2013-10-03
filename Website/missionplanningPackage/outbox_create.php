# V1.1
# Stenka 18/9/13 Operational
# Php version creating an empty outbox
<?php
# require is connecting user peter to stalingrad1 database
# the user must have all rights to the database as we will change structure
require('require.php');
# stick up database structure on screen
$q='SHOW TABLES';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Tables on Stalingrad1_db database</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
		echo'<br>'.$row[0];
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
# drop table outbox so I can recreate with the auto increment restarting at 1
$q='DROP TABLE IF EXISTS outbox_1';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Dropping table outbox_1</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
# stick on screen to see if it's gone
	$q='SHOW TABLES';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Tables on Stalingrad1_db database</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
		echo'<br>'.$row[0];
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
# recreate table
$q='CREATE TABLE IF NOT EXISTS outbox_1
(
id	INT UNIQUE AUTO_INCREMENT,
lin			TEXT
)';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Creating table outbox_1 with auto increment at 1</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
# put on screen again 
$q='SHOW TABLES';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Tables on Stalingrad1_db database</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
		echo'<br>'.$row[0];
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}		
# OK so we now have a clean outbox_1 let's do the same for outbox_2
# 
# stick up database structure on screen
$q='SHOW TABLES';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Tables on Stalingrad1_db database</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
		echo'<br>'.$row[0];
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
# drop table outbox so I can recreate with the auto increment restarting at 1
$q='DROP TABLE IF EXISTS outbox_2';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Dropping table outbox_2</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
# stick on screen to see if it's gone
	$q='SHOW TABLES';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Tables on Stalingrad1_db database</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
		echo'<br>'.$row[0];
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}	
# recreate table
$q='CREATE TABLE IF NOT EXISTS outbox_2
(
id	INT UNIQUE AUTO_INCREMENT,
lin			TEXT
)';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Creating table outbox_2 with auto increment at 1</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
# put on screen again 
$q='SHOW TABLES';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>Tables on Stalingrad1_db database</h1>';
		while ($row = mysqli_fetch_array($r,MYSQLI_NUM))
		{
		echo'<br>'.$row[0];
		}
		mysqli_free_result($r);
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}		








