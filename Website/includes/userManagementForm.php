<!-- form for changing information in the users table -->
<?PHP
	# start form
	echo "<form id=\"airfieldForm\" name=\"login\" action=\"UserManagementModify.php\" method=\"post\">\n";
	echo "	<fieldset id=\"inputs\">\n";
	
	# SELECT USER
	echo "		<select name=\"userId\" id=\"username\">\n";
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
	# ASSIGN / REMOVE USER
	echo "		<select name=\"campdb\" id=\"aircraft\">\n";
	# include the drop down list
	include 'includes/getActiveCampaigns.php'; 
	echo "	</select>\n";
	# BUTTON ADD
	echo "		<button type=\"modify\" name =\"modify\" id=\"submitHalfsize\" value =\"3\" >Assign</button>\n";
	# BUTTON REMOVE
	echo "		<button type=\"modify\" name =\"modify\" id=\"submitHalfsize\" value =\"4\" >Remove</button>\n";
	echo "	<fieldset id=\"actions\">";
	# NEW COALITION
	echo "		<select name=\"userCoalitionIdNew\" id=\"world\">\n";
	# include the drop down list
	include 'includes/getCoalitionsGlobal.php'; 
	echo "		</select>\n";
	# BUTTON COALITION
	echo "		<button type=\"modify\" name =\"modify\" id=\"loginSubmit\" value =\"5\" >Update Coalition</button>\n";
	echo "	</fieldset>\n";
	# BUTTON DELETE USER
	echo "		<button type=\"modify\" name =\"modify\" id=\"loginSubmit\" value =\"0\" >!! Delete User !!</button>\n";
	echo "	</fieldset>\n";
	echo "</form>\n";        
?>