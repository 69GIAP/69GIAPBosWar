<?PHP
	# start form
	echo "<form id=\"airfieldForm\" name=\"login\" action=\"airfieldManagementModify.php\" method=\"post\">\n";

	echo "	<fieldset id=\"inputs\">\n";	
# intermedian hardcoding to DB name
	$campName = 'Stalingrad';
	$campDbName = 'stalingrad1_db';
							
	# NEW CAMPAIGN NAME
	echo "		<input type=\"text\" name=\"newCampaignName\" id=\"number\" placeholder=\"Please enter the campaigns name.\" value=$campName size=\"24\" maxlength=\"50\" />\n";
	# NEW CAMPAIGN DATABSE NAME
	echo "		<input type=\"text\" name=\"newCampaignDatabaseName\" id=\"number\" placeholder=\"Please enter the campaigns database name.\" value='$campDbName' size=\"24\" maxlength=\"50\" />\n";		
	echo "	</fieldset>\n";
		
	# MASTER AIRFIELD LIST
	include 'includes/getMasterAirfieldInformation.php'; 
	
	# MASTER MODELS LIST
	include 'includes/getMasterModelInformation.php';
		

	echo "</form>\n";

?>