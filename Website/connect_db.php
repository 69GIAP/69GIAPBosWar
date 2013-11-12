<?php
// connect_db.php
// This file should be placed OUTSIDE the web direcory for security
// e.g. in a new directory C:/BOSWAR or one or two levels above
// the boswar web home directory.
// Edit functions/connectBOSWAR.php with the proper path to this file.
// Feel free to change any of the arguments as you wish.
// We recommend that you at least change the password
// (both in MySQL and here).  They must match, of course.

function connect_db() {
	// arguments are ( "host", "db user", "password" and "database" )
	$dbc = new mysqli ( "localhost", "boswar" , "boswar" , "boswar_db" );

	if ($dbc->connect_error) {
		die('connect_db error: (' . $dbc->connect_errno . ') '
			. $dbc->connect_error);
	}

	if (!$dbc->set_charset("utf8")) {
		printf("Error loading character set utf8: %s\n", $dbc->error);
	}

	return($dbc);
}
?>
