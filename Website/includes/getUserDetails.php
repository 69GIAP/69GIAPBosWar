<?php
	$q = intval($_GET['q']);
	
# Make a mysqli connection to the central BOSWAR database
	require ( '../functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
	# include getRolename.php
	include ( '../functions/getRolename.php' );	
	# include getCoalitionname.php
	include ( '../functions/getUserCoalitionname.php' );		
	
	if (!$dbc) {
		die('Could not connect: ' . mysqli_error($dbc));
	}
	
	# get the user list
	$sql1 = "SELECT * 
			FROM users
			WHERE user_id = '".$q."'";
	
	# get the selected users asigned campaigns			
	$sql2 = "SELECT * 
			FROM campaign_users
			WHERE user_id = '".$q."'		
			ORDER BY camp_db";			
	
	$result = mysqli_query($dbc,$sql1);
	
	while($row = mysqli_fetch_array($result)) {
		print "<div class=\"userRecordFrame\">";
		print "<p>\n";
		#print "<b>User ID:</b> " . $row['user_id'] . "<br>\n";
		print "<b>Username:</b> ".$row['username'] . " <br>\n";
	
		# get Role Name for Display
		$RoleID = $row['role_id'];
		
		# use function to get the Role name
		$roleName = get_rolename("$RoleID");		
		
		print "<b>User Role: </b> "		.$roleName.		" <br>\n";			
		print "<b>Email Adress: </b> "	.$row['email'].	" <br>\n";
		print "<b>Telephone: </b> "		.$row['phone']. " <br>\n";
		print "</p>\n";
	}
	
	$result = mysqli_query($dbc,$sql2);
	
	while($row = mysqli_fetch_array($result)) {
		$CoalId 		= $row['CoalID'];
		$groupFilePath	= $row['groupFile_path'];
	
		# use function to get the Coalition name
		$CoalName = get_usercoalitionname("$CoalId");

		print "<hr noshade width=\"auto\" size=\"1\" align=\"left\">\n";
		print "<p><b>Campaign DB: </b> ".$row['camp_db'] . " <b>Coalition:</b> ".$CoalName . "<br>\n";
		print "<b>Group File Path: </b>".$groupFilePath."<br>\n";
	}
	print "</div>\n</p>\n";
	
	mysqli_close($dbc);
?>