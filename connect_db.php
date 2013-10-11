
<?php
# Connect on 'localhost' (with configured default port) for user 'boswar_hq' 
# with password 'boswar_password' to database 'boswar_db'.
$dbc = mysqli_connect 
  ( 'localhost' , 'boswar_hq', 'boswar_password', 'boswar_db' )
# ( 'localhost' , 'peter' , 'grobble5' , 'boswar_db' )
# ( '10.0.0.57' , 'manager' , 'manager' , 'boswar_db' )
OR die 
 ( mysqli_connect_error() ) ;
# Set encoding to match PHP script encoding.
mysqli_set_charset( $dbc , 'utf8' ) ;
?>
