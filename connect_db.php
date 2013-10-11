
<?php
# Connect on '10.0.0.57:3306' for user 'manager' 
# with password 'manager' to database 'boswar_db'.
$dbc = mysqli_connect 
# ( 'localhost' , 'peter' , 'grobble5' , 'boswar_db' )
	( '10.0.0.57' , 'manager' , 'manager' , 'boswar_db' )
OR die 
 ( mysqli_connect_error() ) ;
# Set encoding to match PHP script encoding.
mysqli_set_charset( $dbc , 'utf8' ) ;
?>