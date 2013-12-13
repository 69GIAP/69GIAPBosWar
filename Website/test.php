<?php 

// Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
$databasename = 'tessst';
$q = "SHOW DATABASES LIKE '$databasename'";
$r = mysqli_query($dbc,$q);
$num = mysqli_num_rows($r);
if($num > 0)
{echo 'Database exists<br>';}
else
{echo 'Database does not exist<br>';}
