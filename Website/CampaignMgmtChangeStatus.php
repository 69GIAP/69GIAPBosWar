<?php 

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );
		
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );


?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
				<?php
					# include connect2CampaignFunction.php
					include ( 'functions/connect2Campaign.php' );
		
					# use it to get remaining variables
					$query = "SELECT * from campaign_settings where camp_db = '$loadedCampaign'";  
		 
					if(!$result = $dbc->query($query)) {
						die('There was an error running the query [' . $dbc->error . ']');
					}
		
					if ($result = mysqli_query($dbc, $query)) {
						/* fetch associative array */
						while ($obj = mysqli_fetch_object($result)) {
							$campaign	=($obj->campaign);
							$camp_host	=($obj->camp_host);
							$camp_user	=($obj->camp_user);
							$camp_passwd=($obj->camp_passwd);
							$camp_status_id=($obj->status);
							
							# get campaign status
							$sql="SELECT campaign_status FROM campaign_status where id = $camp_status_id";
							if ($result = mysqli_query($dbc, $sql)) {
							/* fetch associative array */
							while ($obj = mysqli_fetch_object($result)) {
								$camp_status=($obj->campaign_status);
								}
							}
						}
					} 
									
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
					
					# start form
					echo "<form id=\"airfieldForm\" name=\"login\" action=\"CampaignConfigureConfirm.php\" method=\"post\">\n";
				
					echo "	<fieldset id=\"inputs\">\n";
					echo "		<p>The current status of the campaign is: <b>$camp_status</b></p>\n";
					echo "		<select name=\"newCampStatus\" id=\"database\">\n";
					# CHANGE CAMPAIGN STATUS
					include 'includes/getCampaignStatusGlobal.php'; 
					echo "		</select>\n";
					echo "	</fieldset>\n";
					# BUTTON	
					echo "<fieldset id=\"actions\">\n";
					echo "		<button type=\"submit\" name =\"createCampaign\" id=\"loginSubmit\" value =\"1\" >Change Campaign Status</button>\n";	
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
