<?php
require('require.php');
$q='USE Stalingrad1_db';
$r=mysqli_query($dbc,$q);
if($r)
	{
	echo'<h1>selected Stalingrad1_db OK</h1>';
	}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
mysqli_close($dbc);

