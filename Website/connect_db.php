<?php
# Connect on '10.0.0.57:3306' for user 'manager' 
# with password 'manager' to database 'boswar'.
# Or as recommended, 'localhost', 'boswar' , 'boswar', 'boswar_db'
# now using object oriented style

$dbc = new mysqli ( "localhost", "boswar" , "boswar" , "boswar_db" );

if ($dbc->connect_error) {
	die('Connect Error (' . $dbc->connect_errno . ') '
		. $dbc->connect_error);
}

if (!$dbc->set_charset("utf8")) {
	printf("Error loading character set utf8: %s\n", $dbc->error);
}
?>
