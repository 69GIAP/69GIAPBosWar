<?php
// connect2CampaignFunction.php
// connect to campaign db with assigned host, user, password and db 
// =69.GIAP=TUSHKA
// Sept 16, 2013
// Ver 1.4
// Oct 28, 2013
	
function connect2campaign ($host,$user,$password,$db) {	

	// debugging database connection
	include ( 'includes/debugging/debuggingDbConnection.php' );

	// make connection to campaign with input variables, object oriented style
	$camp_link = new mysqli ( "$host", "$user" , "$password" , "$db" );

	if ($camp_link->connect_error) {
		die('Connect Error (' . $camp_link->connect_errno . ') '
			. $camp_link->connect_error);
	}

	// change character set to utf8, object oriented style
	if (!$camp_link->set_charset("utf8")) {
		printf("Error loading character set utf8: %s\n", $camp_link->error);
	}

	// return the link
	return $camp_link;
}
?>
