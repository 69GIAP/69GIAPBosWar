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
					
					$newCampaignName 		= $_POST['newCampaignName'];
					$newCampaignDBName 		= $_POST['newCampaignDatabaseName'];
					$newCampaignDBUser 		= $_POST['newCampaignDatabaseUser'];
					$newCampaginDBPassword 	= $_POST['newCampaignDatabasePassword'];
					$newCampaignDBHost	 	= $_POST['newCampaignDatabaseHost'];					
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
					
					
					# INSERT CAMPAIGN DB INFORMATION TO MASTER TABLE
					$query 	=	"INSERT INTO campaign_settings (simulation, campaign, camp_db, camp_host, camp_user, camp_passwd, map, map_locations, status) ";
					$query .=	"VALUES ('RoF', '$newCampaignName', '$newCampaignDBName', '$newCampaignDBHost', '$newCampaignDBUser', '$newCampaginDBPassword', '$campaignMap', '$campaignMapLocation',1);";
					
					# CREATE CAMPAIGN DB
					$query .= "CREATE DATABASE IF NOT EXISTS $newCampaignDBName ;";

					# GRANT CAMPAIGN DB USER RIGHTS ON NEW DB
					$query .= "GRANT SELECT, INSERT, UPDATE ON $newCampaignDBName.* TO '$newCampaignDBUser' IDENTIFIED BY '$newCampaginDBPassword' ;";
					
					# COPY INITIAL TABLESET FROM BOSWAR_DB TO NEW CAMPAIGN DB
					$query .= "CREATE TABLE $newCampaignDBName.rof_airfields	SELECT * FROM boswar_db.rof_airfields;";
					$query .= "CREATE TABLE $newCampaignDBName.rof_models 		SELECT * FROM boswar_db.rof_models;";

					# CREATE NEW DB INSTANCE
					/* execute multi query */
					if (mysqli_multi_query($dbc, $query)) {
						do {
							/* store first result set */
							if ($result = mysqli_store_result($dbc)) {
								// do nothing as we don't expect feedback
								mysqli_free_result($result);
							}
							/* print divider */
							if (mysqli_more_results($dbc)) {
								// not neede in this case - maybe later use will have it
							}
						} while (mysqli_next_result($dbc));
					}
					
					# forward to campaign configuration screen
					$_SESSION['camp_db'] = $newCampaignDBName;
					header("Location: CampaignConfiguration.php?btn=home");

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
