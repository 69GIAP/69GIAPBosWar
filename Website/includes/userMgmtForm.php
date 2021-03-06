<!-- include the dynamic AJAX script -->
<script type="text/javascript" src="js/getUserDetails.js"></script>

<!-- form for changing information in the users table -->
<?PHP
	# start form
	echo "<form id=\"airfieldForm\" name=\"login\" action=\"UserMgmtModify.php\" method=\"post\">\n";
	echo "	<fieldset id=\"inputs\">\n";
	
	# SELECT USER
	echo "		<select name=\"userId\" id=\"username\" onchange=\"showUser(this.value)\">\n";
	# include the drop down list
	include 'includes/getUserNames.php'; 
	echo "		</select>\n";

	
	# NEW PASSWORD
	echo "		<input id=\"password\" type=\"password\"  name=\"password\" placeholder=\"Password\" >\n";
	echo "	</fieldset>\n";
	echo "	<fieldset id=\"actions\">";
	# BUTTON
	echo "		<button type=\"modify\" name =\"modify\" id=\"loginSubmit\" value =\"1\" >Update Password</button>\n";	
	echo "	</fieldset>\n";
	
	# exclude these form fields from display for commanders
	if ($userRole == 'administrator') {
		
		echo "	<fieldset id=\"inputs\">\n";
			
		# SELECT ROLE
		echo "		<select name=\"newUserRole\" id=\"username\">\n";
		# include the drop down list
		include 'includes/getUserRoles.php'; 
		echo "		</select>\n";
		echo "	</fieldset>\n";
		echo "	<fieldset id=\"actions\">";
		# BUTTON
		echo "		<button type=\"modify\" name =\"modify\" id=\"loginSubmit\" value =\"2\" >Update Role</button>\n";	
		echo "	</fieldset>\n";
		echo "	<fieldset id=\"inputs\">\n";
		
		# The following is only displayed if the administrator is not connected to a campaign
		if (empty ($loadedCampaign)) {
			# ASSIGN / REMOVE USER
			echo "		<select name=\"campdb\" id=\"aircraft\">\n";
			# include the drop down list
			include 'includes/getActiveCampaigns.php'; 
			echo "	</select>\n";
		}
		
		# NEW COALITION
		echo "		<select name=\"userCoalitionIdNew\" id=\"world\">\n";
		# include the drop down list
		include 'includes/getCoalitionsGlobal.php'; 	
		echo "	</select>\n";
		echo "	</fieldset>\n";
		echo "	<fieldset id=\"actions\">";
		# BUTTON ADD
		echo "		<button type=\"modify\" name =\"modify\" id=\"submitHalfsize1\" value =\"3\" >Assign/Update</button>\n";
		# BUTTON REMOVE
		echo "		<button type=\"modify\" name =\"modify\" id=\"submitHalfsize2\" value =\"4\" >Remove</button>\n";
		echo "	</fieldset>\n";
		echo "	<fieldset id=\"actions\">";
		# BUTTON DELETE USER
		echo "		<button type=\"modify\" name =\"modify\" id=\"loginSubmit\" value =\"0\" >!! Delete User !!</button>\n";
		echo "	</fieldset>\n";
	}
	// show Group File Folder Form only if administrator is connected to a campaign
	if ($loadedCampaign != '')
	{
/*
		echo "<h3>Choose the default folder for your Group Files:</h3>\n";
		
		if ($userRole == 'administrator') {
				echo "<p>The file path is stored for the logged on user and the campaign:<br>\n";
				echo "<b>$loadedCampaign</b><br> \n";
				echo "You cannot change the folder path for any other user! \n";
				echo "It is also not possible to change the folder path for any other campaign then the one actually connected to.</p>\n";
			}
		else {
				echo "<p>It is not possible to change the folder path for any other user!</p>\n";
			}
			
		# get actual folder path
		$query = "SELECT groupFile_path from campaign_users 
					WHERE user_id = $userId
					AND camp_db = '$loadedCampaign'";
					
		if ($result = $dbc->query($query)) 					
		{				
			// fetch associative array //
			while ($obj = mysqli_fetch_object($result)) 
				{
					$groupFilePath=($obj->groupFile_path);
				}
		}
		if (empty($groupFilePath)) {
			echo "	<fieldset id=\"inputs\">\n";
			echo "		<input id=\"file\" type=\"text\"  size = \"60\" maxlength = \"100\" name=\"groupFilePath\" placeholder=\"Please insert a folder path.\" >\n";
		}
		else {
			echo "	<fieldset id=\"inputs\">\n";
			echo "		<input id=\"file\" type=\"text\" size = \"60\" maxlength = \"100\" name=\"groupFilePath\" value=\"$groupFilePath\" >\n";
		}
		echo "	<fieldset id=\"actions\">";
		# BUTTON SAVE
		echo "		<button type=\"modify\" name =\"modify\" id=\"loginSubmit\" value =\"6\" >SAVE</button>\n";		
		echo "	</fieldset>\n";
*/
	}
	echo "</form>\n"; 
	
	# display of user deatils of selected user
	echo "<div id=\"userDetails\"></div>\n";         
?>
