<?php
# incorporate connection script
require ('../connect_db_STENKA.php');
if( mysqli_ping( $dbc ))
{ echo 'MySQL Server'.mysqli_get_server_info($dbc).
		'on'.mysqli_get_host_info($dbc);}
		