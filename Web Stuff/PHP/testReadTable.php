<?php

# Incorporate the MySQL connection script.
require ( '../connect_db.php' );

echo 'List of all currently stored users:<br>';

# load the query into a varibale
$sql = "SELECT * 
		FROM users";

if(!$result = $dbc->query($sql)){
	die('There was an error running the query [' . $dbc->error . ']');
}

# Print out the contents of the entry 
while($row = $result->fetch_assoc()) 
 {
	print "<b>User ID:</b> ".$row['userid'] . " <br> ";
	print "<b>First Name:</b> ".$row['firstname'] . " <br> ";
	print "<b>Surname:</b> ".$row['surname'] . " <br> ";
	print "<b>Callsign:</b> ".$row['callsign'] . " <br> ";
	print "<b>Email Adress:</b> ".$row['email'] . " <br> ";
	print "<b>Encrypted Password:</b> ".$row['password'] . " <br> <br> ";
 }
 
 echo 'Total results: ' . $result->num_rows . " <br> ";
 echo 'Total rows updated: ' . $dbc->affected_rows . " <br> ";

$result->free();

$dbc->close();

?> 