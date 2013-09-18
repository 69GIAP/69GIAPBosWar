<?php
# connect2_db.php ver 0.1
# connect with assigned host, user, password and db 
# =69.GIAP=TUSHKA
# Sept 16,2013
#
function connect_campaign ($host,$user,$password,$db) {

# debugging
print "<p>debugging connect2campaign.php</p>\n";
print "<p>host = $host, user = $user, password = $password, db = $db</p><br>\n";

# make connection to campaign with input variables
$camp_link = mysqli_connect ( "$host", "$user" , "$password" , "$db" )
OR die ('Connect Error (' . mysqli_connect_errno() . ') ' . mysqli_connect_error());

mysqli_set_charset( $camp_link , 'utf8' ) ;

return $camp_link;
}
?>
