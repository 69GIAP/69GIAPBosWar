<?php
	# connect2CampaignFunction.php
	# connect to campaign db with assigned host, user, password and db 
	# =69.GIAP=TUSHKA
	# Sept 16, 2013
	# Ver 0.2
	# Sept 18, 2013
	
	function connect2campaign ($host,$user,$password,$db) {		
	# debugging
	print "<p>debugging connect2campaign</p>\n";
	print "<p>host = $host, user = $user, password = $password, db = $db</p><br>\n";
	
	# make connection to campaign with input variables
	$camp_link = mysqli_connect ( "$host", "$user" , "$password" , "$db" )
	OR die ('Connect Error ('.mysqli_connect_errno().') '.mysqli_connect_error());
	
	# force use of utf8 character set
	mysqli_set_charset( $camp_link , 'utf8' ) ;
	
	# return the link
	return $camp_link;
	}
?>
