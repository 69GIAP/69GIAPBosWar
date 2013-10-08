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


?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
				<?php
					# start form
					echo "<form id=\"airfieldForm\" name=\"login\" action=\"CampaignCreateConfirm.php\" method=\"post\">\n";
				
					echo "	<fieldset id=\"inputs\">\n";	

					# NEW CAMPAIGN NAME
					echo "<h3>Campaign Name</h3>\n";
					echo "		<input type=\"text\" name=\"newCampaignName\" id=\"database\" placeholder=\"Please enter the campaigns name.\" value='' size=\"24\" maxlength=\"50\" />\n";
					# NEW CAMPAIGN DATABASE NAME
					echo "		<input type=\"text\" name=\"newCampaignDatabaseName\" id=\"database\" placeholder=\"Please enter the campaigns database name.\" value='' size=\"24\" maxlength=\"50\" />\n";
					# NEW CAMPAIGN HOST
					echo "		<input type=\"text\" name=\"newCampaignDatabaseHost\" id=\"database\" placeholder=\"Please enter the host (localhost / IP).\" value='' size=\"24\" maxlength=\"50\" />\n";	
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
				
					echo "	</fieldset>\n";	
				
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
