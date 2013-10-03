<?php
require('require.php');
$q='SHOW TABLES';
$r=mysqli_query($dbc,$q);
if($r)
	{echo'<h1>Connected to $dbc OK</h1>';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
	
	
	
mysqli_close($dbc);
