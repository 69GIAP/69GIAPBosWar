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
					# free result set
					$result->close();
									
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

					# useful stuff goes here
					# close $camp_link
					$camp_link->close();
                ?>
                <p>We need a screen to create a static group of objects vehicles in static. 
                One session should cope with both allied or Central Admin and planners. This is essential for Alpha</p>
            
            </div>
    
        </div>

		<?php
            # Include the general sidebar
            include ( 'includes/sidebar.php' );
        ?>	

		<div id="clearing"></div>
	</div>

<?php
	# close $dbc
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
