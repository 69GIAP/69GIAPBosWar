<?php
// connectBOSWAR.php
// establish mysqli connection to the central BOSWAR DB
// by referring to a file OUTSIDE the web directory area (for security)
// that contains the vital link information.
// Be sure to at least change the passwords from the defaults,
// both in MySQL and in your connect_db.php.  They must match, of course!

function connectBOSWAR() {

	// examples:
	// use forward slashes (even on windows!)
	require ( 'C:/BOSWAR/connect_db.php' ); // explicit path
//	require ( '../../connect_db.php' ); // two levels above boswar home dir
//	require ( '../connect_db.php' ); // one level above boswar home dir 

	$dbc = connect_db();
	return($dbc);
}
?>
