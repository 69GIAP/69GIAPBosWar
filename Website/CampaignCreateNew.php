<?php 

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );

# clear some SESSION variables
#	unset ($_SESSION['camp_db']);
#	unset ($_SESSION['airfieldName']);
		
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

# Check whether we already have defined campaign db user(s)
$count = mysqli_query($dbc,"SELECT COUNT(*) FROM campaign_settings;");

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
				<?php
					# start form
					echo "<form id=\"airfieldForm\" name=\"login\" action=\"CampaignCreateConfirm.php\" method=\"post\">\n";
//					echo "<form id=\"airfieldForm\" name=\"login\" action=\"testPost.php\" method=\"post\">\n";
				
					echo "	<fieldset id=\"inputs\">\n";	

					# NEW CAMPAIGN NAME
					echo "<h3>Campaign Name</h3>\n";
					echo "		<input type=\"text\" name=\"newCampaignName\" id=\"database\" placeholder=\"Please enter the campaigns name.\" value='' size=\"24\" maxlength=\"50\" />\n";
					# NEW CAMPAIGN DATABASE NAME
					echo "		<input type=\"text\" name=\"newCampaignDatabaseName\" id=\"database\" placeholder=\"Please enter the campaigns database name.\" value='' size=\"24\" maxlength=\"50\" />\n";
					# NEW CAMPAIGN HOST
					echo "		<input type=\"text\" name=\"newCampaignDatabaseHost\" id=\"database\" placeholder=\"Please enter the host (localhost / IP).\" value='' size=\"24\" maxlength=\"50\" />\n";	
					# CHOOSE CAMPAIGN MAP
					echo "<h3>Campaign Map</h3>\n";
					echo "		<select name=\"campaignMap\" id=\"world\">\n";
					include 'includes/getCampaignMap.php';
					echo "		</select>\n";
				
                                        if (!$count) {
					   echo "<h3>Campaign User</h3>\n";
					   # NEW CAMPAIGN DATABASE USER
					   echo "		<input type=\"text\" name=\"newCampaignDatabaseUser\" id=\"username\" placeholder=\"Please enter the campaign DB user.\" value='' size=\"24\" maxlength=\"50\" />\n";	
					   # NEW CAMPAIGN DATABASE PASSWORD
					   echo "		<input type=\"text\" name=\"newCampaignDatabasePassword\" id=\"password\" placeholder=\"Please enter the campaign users password.\" value='' size=\"24\" maxlength=\"50\" />\n";
					} else {
					   echo "<h3>Either Create New Campaign User</h3>\n";
					   # NEW CAMPAIGN DATABASE USER
					   echo "		<input type=\"text\" name=\"newCampaignDatabaseUser\" id=\"username\" placeholder=\"Please enter the campaign DB user.\" value='' size=\"24\" maxlength=\"50\" />\n";	
					   # NEW CAMPAIGN DATABASE PASSWORD
					   echo "		<input type=\"text\" name=\"newCampaignDatabasePassword\" id=\"password\" placeholder=\"Please enter the campaign users password.\" value='' size=\"24\" maxlength=\"50\" />\n";
$query = "SELECT `camp_host`, `camp_user`, `camp_passwd` from `campaign_settings` WHERE `camp_user` != '';";
					   echo "<p><h3>OR select an existing one</h3></p>\n";
					   echo "<p>Note: existing users take precedence over new.</p>\n";

// removing indentation for clarity
if(!$result = $dbc->query($query)) {
	die('There was an error running the query [' . $dbc->error . ']');
}
mysqli_free_result($result);	

if ($result = mysqli_query($dbc, $query)) {				
	echo "<select id = \"existing\" name = \"existing\"><br>\n";
	echo "<option value=\"\" selected>Select existing campaign user </option>\n";	
	/* fetch result array */
	while ($obj = mysqli_fetch_object($result)) {
		$host = ($obj->camp_host);
		$user = ($obj->camp_user);
		$passwd	=($obj->camp_passwd);
		// note hack to pass three variables as one  :)
		echo "<option value=\"".$host."+".$user."+".$passwd."\">".$user."</option>\n";
	}
	echo "</select>\n";	
}
		
mysqli_free_result($result);
// we now return to our original indentation

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
	# Include the footer
	include ( 'includes/footer.php' );
?>
