<?php 
#stenka 17/11/13 adding a bit of explanation
# Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();

# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

# Check whether we already have defined campaign db user(s)
$count = $dbc->query("SELECT COUNT(*) FROM campaign_settings;");

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
				<?php
					# start form
					echo "<form id=\"createCampForm\" name=\"login\" action=\"CampaignPrepCreateConfirm.php\" method=\"post\">\n";
					echo "	<fieldset id=\"inputs\">\n";	

					# NEW CAMPAIGN NAME
					echo "<h3>Campaign Name</h3>\n";
					echo "		<input type=\"text\" name=\"newCampaignName\" id=\"database\" placeholder=\"Please enter the campaign's full name\" value='' size=\"24\" maxlength=\"50\" />\n";
					# NEW CAMPAIGN ABBREVIATION
					echo "		<input type=\"text\" name=\"newCampaignAbbrv\" id=\"database\" placeholder=\"Enter an unique 3-7 character abbreviation\" value='' size=\"7\" maxlength=\"7\" />\n";
					# NEW CAMPAIGN DATABASE NAME
					echo "		<input type=\"text\" name=\"newCampaignDatabaseName\" id=\"database\" placeholder=\"Campaign database name (no spaces)\" value='' size=\"24\" maxlength=\"24\" />\n";
					# NEW CAMPAIGN HOST
					echo "<h3>Path from server to database</h3>\n";	
					echo "		<p class=\"indent\">Note: leave this as localhost unless you know what you are doing</p>\n";					
					echo "		<input type=\"text\" name=\"newCampaignDatabaseHost\" id=\"database\" placeholder=\"Please enter the DB host (localhost / IP).\" value='localhost' size=\"24\" maxlength=\"50\" />\n";	
					# CHOOSE CAMPAIGN MAP
					echo "<h3>Campaign Map</h3>\n";
					echo "		<select name=\"campaignMap\" id=\"map\">\n";
					include 'includes/getCampaignMap.php';
					echo "		</select>\n";
				
					if (!$count) {
						echo "<h3>Campaign User</h3>\n";
						# NEW CAMPAIGN DATABASE USER
						echo "		<input type=\"text\" name=\"newCampaignDatabaseUser\" id=\"username\" placeholder=\"Please enter the campaign DB user.\" value='' size=\"24\" maxlength=\"50\" />\n";	
						# NEW CAMPAIGN DATABASE PASSWORD
						echo "		<input type=\"text\" name=\"newCampaignDatabasePassword\" id=\"password\" placeholder=\"Please enter the campaign users password.\" value='' size=\"24\" maxlength=\"50\" />\n";
					}
					else {
						echo "<h3>Either Create New Campaign User</h3>\n";
						# NEW CAMPAIGN DATABASE USER
						echo "		<input type=\"text\" name=\"newCampaignDatabaseUser\" id=\"username\" placeholder=\"Please enter the campaign DB user.\" value='' size=\"24\" maxlength=\"50\" />\n";	
						# NEW CAMPAIGN DATABASE PASSWORD
						echo "		<input type=\"text\" name=\"newCampaignDatabasePassword\" id=\"password\" placeholder=\"Please enter the campaign DB user's password.\" value='' size=\"24\" maxlength=\"50\" />\n";
						$query = "SELECT `camp_host`, `camp_user`, `camp_passwd` from `campaign_settings` WHERE `camp_user` != '' GROUP BY `camp_user` ;";
						echo "<p><h3>OR select an existing one</h3></p>\n";

						echo "		<p class=\"indent\">Note: existing users take precedence over new. Beta testers should use boswar</p>\n";

						if(!$result = $dbc->query($query)) {
							die('There was an error running the query [' . $dbc->error . ']');
						}
						
						if ($result = $dbc->query($query)) {				
							echo "<select id = \"username\" name = \"existing\"><br>\n";
							echo "<option value=\"\" selected>Select existing campaign user </option>\n";	
							/* fetch result array */
							while ($obj = $result->fetch_object()) {
								$host = ($obj->camp_host);
								$user = ($obj->camp_user);
								$passwd	=($obj->camp_passwd);
								// free result set, object oriented style
								$result->close();
								// note hack to pass three variables as one  :)
								echo "<option value=\"".$host."+".$user."+".$passwd."\">".$user."</option>\n";
							}
							echo "</select>\n";	
						}

					echo "	</fieldset>\n";	

					}
				
					# BUTTON	
					echo "<fieldset id=\"actions\">\n";
					echo "		<button type=\"submit\" name =\"createCampaign\" id=\"loginSubmit\" value =\"init\" >Create Campaign</button>\n";	
					echo "	</fieldset>\n";
					echo "</form>\n";          
                ?>
            
            </div>
    
        </div>

		<?php
            # Include the general sidebar
            include ( 'includes/sidebar.php' );
        ?>	

		<div id="clearing"></div>
	</div>

<?php
	# Close the $dbc connection
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
