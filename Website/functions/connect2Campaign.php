<?php
// connect2CampaignFunction.php
// connect to campaign db with assigned host, user, password and db 
// =69.GIAP=TUSHKA
// Sept 16, 2013
// Ver 1.3
// Oct 24, 2013
	
function connect2campaign ($host,$user,$password,$db) {	

// debugging database connection
include ( 'includes/debugging/debuggingDbConnection.php' );

// make connection to campaign with input variables
$camp_link = mysqli_connect ( "$host", "$user" , "$password" , "$db" )
OR die ('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());

// force use of utf8 character set
mysqli_set_charset( $camp_link , 'utf8' ) ;

// return the link
return $camp_link;
}
?>
