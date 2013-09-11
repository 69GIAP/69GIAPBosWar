
<?php

# Incorporate the MySQL connection script.
require ( '../connect_db.php' ) ;

# Display MySQL version and host.
if( mysqli_ping( $dbc ) ) 
{ echo 'MySQL Server ' . mysqli_get_server_info( $dbc ).
' on ' . mysqli_get_host_info( $dbc ) ; }

?>