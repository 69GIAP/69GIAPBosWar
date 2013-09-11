
<?php

# Incorporate the MySQL connection script.
require ( '../connect_db.php' );

# Encrypt password
$password=md5($_POST['password']); // Encrypted Password

# buid query
$sql="INSERT INTO users (firstname, surname, callsign, email, password)
VALUES
('$_POST[firstname]','$_POST[surname]','$_POST[callsign]','$_POST[email]','$password')";

if (!mysqli_query($dbc,$sql))
  {
  die('Error: ' . mysqli_error($dbc));
  }
echo "1 record added";

mysqli_close($dbc);
?>