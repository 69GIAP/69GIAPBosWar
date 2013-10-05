<?PHP
	# start form
	echo "<form id=\"airfieldForm\" name=\"login\" action=\"CampaignCreateConfirm.php\" method=\"post\">\n";

	echo "	<fieldset id=\"inputs\">\n";	
# intermedian hardcoding to DB name
	$campName = 'Stalingrad';
	$campDbName = 'stalingrad1_db';
							
	# NEW CAMPAIGN NAME
	echo "<h3>Campaign Name</h3>\n";
	echo "		<input type=\"text\" name=\"newCampaignName\" id=\"database\" placeholder=\"Please enter the campaigns name.\" value=$campName size=\"24\" maxlength=\"50\" />\n";
	# NEW CAMPAIGN DATABASE NAME
	echo "		<input type=\"text\" name=\"newCampaignDatabaseName\" id=\"database\" placeholder=\"Please enter the campaigns database name.\" value='$campDbName' size=\"24\" maxlength=\"50\" />\n";
	echo "<h3>Campaign User</h3>\n";
	# NEW CAMPAIGN DATABASE USER
	echo "		<input type=\"text\" name=\"newCampaignDatabaseUser\" id=\"username\" placeholder=\"Please enter the campaign DB user.\" value='' size=\"24\" maxlength=\"50\" />\n";	
	# NEW CAMPAIGN DATABASE PASSWORD
	echo "		<input type=\"text\" name=\"newCampaignDatabasePassword\" id=\"password\" placeholder=\"Please enter the campaign users password.\" value='' size=\"24\" maxlength=\"50\" />\n";

	echo "<h3>Campaign Map</h3>\n";
	# CHOOSE CAMPAIGN MAP
	echo "		<select name=\"campaignMap\" id=\"world\">\n";
	include 'includes/getCampaignMap.php';
	echo "		</select>\n";
	

	# MASTER AIRFIELD LIST
	include 'includes/getMasterAirfieldInformation.php'; 
	
	# MASTER MODELS LIST
	include 'includes/getMasterModelInformation.php';

	echo "	</fieldset>\n";	

	# BUTTON	
	echo "<fieldset id=\"actions\">\n";
	echo "		<button type=\"submit\" name =\"createCampaign\" id=\"loginSubmit\" value =\"init\" >Initialize Campaign</button>\n";	
	echo "	</fieldset>\n";

	echo "</form>\n";

?>