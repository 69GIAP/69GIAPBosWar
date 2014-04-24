<?php
require('../connect_db.php');
if( mysqli_ping($dbc))
{echo 'MySQL Server'.mysqli_get_server_info($dbc).
'on'.mysqli_get_host_info($dbc);}
echo "Hello Peter im here in campaign management import confirm 2 about to start reading columns";
echo '<br>Starting update of columns objects flag';
$q1="UPDATE columns set col_formation = 4";
$r1= mysqli_query($dbc,$q1);
if ($r1)
	{echo '<br> col_formation updated';}
else
	{echo'<p>'.mysqli_error($dbc).'</p>';}
