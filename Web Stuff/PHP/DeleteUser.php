
<?php

# Incorporate the MySQL connection script
require ( '../connect_db.php' );

$sql = "DELETE FROM users 
		WHERE
		'$_POST[userid]' = userid";

# Feedback success or failure
if (!mysqli_query($dbc,$sql))
  {
  	die('<br>Error: ' . mysqli_error($dbc));
  }
 
echo "<br>Record {$_POST['userid']} deleted successfully!";

mysqli_close($dbc);

?>