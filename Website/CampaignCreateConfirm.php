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
					$newCampaignName 		= $_POST['newCampaignName'];
					$newCampaignDBName 		= $_POST['newCampaignDatabaseName'];
					$newCampaignDBUser 		= $_POST['newCampaignDatabaseUser'];
					$newCampaginDBPassword 	= $_POST['newCampaignDatabasePassword'];
					$campaignMap			= $_POST['campaignMap'];
					
					# load map location
					$query = "SELECT map_locations FROM campaign_maps";
					
					if(!$result = $dbc->query($query))
						{die('There was an error running the query [' . $dbc->error . ']');}
					
					if ($result = mysqli_query($dbc, $query)) 
						{	
						while ($obj = mysqli_fetch_object($result)) 
							{
								$campaignMapLocation	=	($obj->map_locations);
							}
						}
					
					# CREATE CAMPAIGN DB
					$query = "INSERT INTO campaign_settings (simulation, campaign, camp_db, camp_host, camp_user, camp_passwd, map, map_locations, status, show_airfield, finish_flight_only_landed, logpath, log_prefix, logfile, kia_pilot, mia_pilot, critical_w_pilot, serious_w_pilot, light_w_pilot, kia_gunner, mia_gunner, critical_w_gunner, serious_w_gunner, light_w_gunner, healthy, min_x, min_z, max_x, max_z) ";
					$query = $query ."VALUES ('RoF', '$newCampaignName', '$newCampaignDBName', 'localhost', '$newCampaignDBUser', '$newCampaginDBPassword', '$campaignMap', '$campaignMapLocation', 1, 0, 0, '', '', '', 0,0,0,0,0,0,0,0,0,0,0,0,0,0,0) ";
					echo $query
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
