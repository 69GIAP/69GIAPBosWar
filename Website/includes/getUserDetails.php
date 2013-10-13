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
			WHERE user_id = '".$q."'";
			
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
        
		# get Role Name for Display
		$RoleID = $row['role_id'];			
		$sql3 = "SELECT role from users_roles where role_id = $RoleID";
			$result1 = mysqli_query($dbc,$sql3);
			while($row1 = mysqli_fetch_array($result1))
			{
				$roleName = $row1['role'];
			}
        print "<b>User Role:</b> ".$roleName." <br>\n";			
        print "<b>Email Adress:</b> ".$row['email'] . " <br>\n";
        print "<b>Telephone:</b> ".$row['phone'] . " <br>\n";
  }

$result = mysqli_query($dbc,$sql2);

while($row = mysqli_fetch_array($result))
  {
	  $CoalId = $row['CoalID'];
	  $sql4 = "SELECT Coalitionname from rof_coalitions where CoalId = $CoalId";
			$result2 = mysqli_query($dbc,$sql4);
			while($row2 = mysqli_fetch_array($result2))
			{
				$CoalName = $row2['Coalitionname'];
			}
		print "<b>Campaign DB:</b> ".$row['camp_db'] . " <b>Coalition:</b> ".$CoalName . "<br>\n";
	}
		print "</p>\n";
		print "</div>\n";

mysqli_close($dbc);
?>