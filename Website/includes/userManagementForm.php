<!-- include the dynamic AJAX script -->
<script type="text/javascript" src="js/getUserDetails.js"></script>

<!-- form for changing information in the users table -->
<?PHP
	# start form
	echo "<form id=\"airfieldForm\" name=\"login\" action=\"UserManagementModify.php\" method=\"post\">\n";
	echo "	<fieldset id=\"inputs\">\n";
	
	# SELECT USER
	echo "		<select name=\"userId\" id=\"username\" onchange=\"showUser(this.value)\">\n";
	# include the drop down list
	include 'includes/getUserNamesAJAX.php'; 
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
	# NEW COALITION
	echo "		<select name=\"userCoalitionIdNew\" id=\"world\">\n";
	# include the drop down list
	include 'includes/getCoalitionsGlobal.php'; 	
	echo "	</select>\n";
	echo "	</fieldset>\n";
	echo "	<fieldset id=\"actions\">";
	# BUTTON ADD
	echo "		<button type=\"modify\" name =\"modify\" id=\"submitHalfsize\" value =\"3\" >Assign/Update</button>\n";
	# BUTTON REMOVE
	echo "		<button type=\"modify\" name =\"modify\" id=\"submitHalfsize\" value =\"4\" >Remove</button>\n";
	echo "	</fieldset>\n";

	# BUTTON DELETE USER
	echo "		<button type=\"modify\" name =\"modify\" id=\"loginSubmit\" value =\"0\" >!! Delete User !!</button>\n";
	
	echo "	</fieldset>\n";
	echo "</form>\n"; 
	
	echo "<div id=\"userDetails\"></div>\n";         
?>