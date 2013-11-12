<?php 

# Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
		
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
		
					if ($result = $dbc->query($query)) {
						/* fetch associative array */
						while ($obj = $result->fetch_object()) {
							$campaign	=($obj->campaign);
							$camp_host	=($obj->camp_host);
							$camp_user	=($obj->camp_user);
							$camp_passwd=($obj->camp_passwd);
							$camp_status_id=($obj->status);
							
							# get campaign status
							$sql="SELECT campaign_status FROM campaign_status where id = $camp_status_id";
							if ($result = $dbc->query($sql)) {
							/* fetch associative array */
							while ($obj = $result->fetch_object()) {
								$camp_status=($obj->campaign_status);
								}
							}
						}
					} 
									
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
                ?>
                <p>We need a screen to edit a bridge status to declare it as damaged or repaired, can be hit with sql for the moment not needed for Beta</p>

            
            </div>
    
        </div>

		<?php
            # Include the general sidebar
            include ( 'includes/sidebar.php' );
        ?>	

		<div id="clearing"></div>
	</div>

<?php
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
