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
                <p>A column is a group of 1-99 vehicles of the same type which may be moving or may be stationary. Columns of more than 10 vehicles may cause performance problems in the mission. Be cautious and test. If during the planning process a destination has been set the column will be written to the mission with all required links and waypoints.
				It will travel at the average column speed set in the campaign parameters or the maximum vehicle speed whichever is lower. By default it will try to follow a major road. Artillery will be loaded into trucks for transit. If a column is not moving
				it will be written to the mission with a complex trigger that activates it when aircraft or enemy ground forces are nearby. So a stationary column takes up less mission resources. If everything is moving performance will suffer.</p>

            
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
