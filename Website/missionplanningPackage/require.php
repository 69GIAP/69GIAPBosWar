<?php
# incorporate connection script
require ('../connect_db.php');
if( mysqli_ping( $camp_link ))
{ echo 'MySQL Server'.mysqli_get_server_info($camp_link).
		'on'.mysqli_get_host_info($camp_link);}
		