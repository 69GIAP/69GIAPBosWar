<?php
$q = intval($_GET['q']);

# Incorporate the MySQL connection script.
	require ( '../../connect_db.php' );
	
if (!$dbc)
  {
  die('Could not connect: ' . mysqli_error($dbc));
  }

# get the user list
$sql1 = "SELECT * FROM users
			WHERE user_id = '".$q."'		
			ORDER BY  username";
			
# get the selected users asigned campaigns			
$sql2 = "SELECT * FROM campaign_users
			WHERE user_id = '".$q."'		
			ORDER BY camp_db";			

$result = mysqli_query($dbc,$sql1);
		
while($row = mysqli_fetch_array($result))
  {
	  	print "<div class=\"userRecordFrame\">";
		print "<p>\n";
  		print "<b>User ID:</b> " . $row['user_id'] . "<br>\n";
        print "<b>Username:</b> ".$row['username'] . " <br>\n";	
        print "<b>Email Adress:</b> ".$row['email'] . " <br>\n";
        print "<b>Telephone:</b> ".$row['phone'] . " <br>\n";
  }

$result = mysqli_query($dbc,$sql2);

while($row = mysqli_fetch_array($result))
  {
        print "<b>Campaign DB:</b> ".$row['camp_db'] . " <b>Coalition:</b> ".$row['CoalID'] . "<br>\n";
  }
		print "</p>\n";
		print "</div>\n";

mysqli_close($dbc);
?>