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
					$newCampaignAbbrv		= $_POST['newCampaignAbbrv'];
					$newCampaignDBName 		= $_POST['newCampaignDatabaseName'];
					$newCampaignDBUser 		= $_POST['newCampaignDatabaseUser'];
					$newCampaignDBPassword 	= $_POST['newCampaignDatabasePassword'];
					$newCampaignDBHost	 	= $_POST['newCampaignDatabaseHost'];					
					$campaignMap			= $_POST['campaignMap'];

					// If selected, $existing contains host, user, and passwd
					$existing = $_POST['existing'];
					// check to see if 'existing' was the selected option
					if ($existing) { // selected if not empty
						// split 'existing' into three parts at the '+'
						$Part = explode('+',$existing,3);
						$newCampaignDBHost		= $Part[0];
						$newCampaignDBUser		= $Part[1];
						$newCampaignDBPassword	= $Part[2];
					}

					# load map location
					$query = "SELECT map_locations FROM maps WHERE map = '$campaignMap';";
					
					if(!$result = $dbc->query($query)) {
						die('CampaignMgmtCreateConfirm.php query error [' . $dbc->error . ']');
					}
					
					if ($result = $dbc->query($query)) {	
						while ($obj = $result->fetch_object()) {
								$campaignMapLocations	=	($obj->map_locations);
//								echo "\$campaignMapLocations: $campaignMapLocations<br />\n";
						}
					}
// Tushka has removed 49 spaces of indentation for readability's sake
# CREATE CAMPAIGN DB
$query = "CREATE DATABASE IF NOT EXISTS `$newCampaignDBName` ;";
					
# GRANT CAMPAIGN DB USER RIGHTS ON NEW DB
$query .= "GRANT SELECT, INSERT, UPDATE, DELETE, DROP ON `$newCampaignDBName`.* TO '$newCampaignDBUser'@'$newCampaignDBHost' IDENTIFIED BY '$newCampaignDBPassword' ;";

// GRANT GLOBAL FILE PRIVILEGE to db user so can read and write group files
$query .= "GRANT FILE ON *.* TO '$newCampaignDBUser'@'$newCampaignDBHost' ;";

# COPY INITIAL TABLESET FROM BOSWAR_DB TO NEW CAMPAIGN DB
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.airfields LIKE boswar_db.airfields;";
$query .= "INSERT INTO `$newCampaignDBName`.airfields SELECT * FROM boswar_db.airfields;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.airfields_models LIKE boswar_db.airfields_models;";

// Do the remainder of the empty tables that we need
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.campaign_missions LIKE boswar_db.campaign_missions;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.inbox LIKE boswar_db.inbox;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.rof_gunner_scores LIKE boswar_db.rof_gunner_scores;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.rof_kills LIKE boswar_db.rof_kills;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.rof_pilot_scores LIKE boswar_db.rof_pilot_scores;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.supply_points LIKE boswar_db.supply_points;";
// Now do the rest of the tables that need to be populated
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.mission_status LIKE boswar_db.mission_status;";
$query .= "INSERT INTO `$newCampaignDBName`.mission_status SELECT * FROM boswar_db.mission_status;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.player_fate LIKE boswar_db.player_fate;";
$query .= "INSERT INTO `$newCampaignDBName`.player_fate SELECT * FROM boswar_db.player_fate;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.player_health LIKE boswar_db.player_health;";
$query .= "INSERT INTO `$newCampaignDBName`.player_health SELECT * FROM boswar_db.player_health;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.rof_coalitions LIKE boswar_db.rof_coalitions;";
$query .= "INSERT INTO `$newCampaignDBName`.rof_coalitions SELECT * FROM boswar_db.rof_coalitions;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.rof_countries LIKE boswar_db.rof_countries;";
$query .= "INSERT INTO `$newCampaignDBName`.rof_countries SELECT * FROM boswar_db.rof_countries;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.rof_object_properties LIKE boswar_db.rof_object_properties;";
$query .= "INSERT INTO `$newCampaignDBName`.rof_object_properties SELECT * FROM boswar_db.rof_object_properties;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.rof_object_roles LIKE boswar_db.rof_object_roles;";
$query .= "INSERT INTO `$newCampaignDBName`.rof_object_roles SELECT * FROM boswar_db.rof_object_roles;";
// create the selected map_locations table
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.$campaignMapLocations LIKE boswar_db.$campaignMapLocations;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.campaign_settings LIKE boswar_db.campaign_settings;";
$query .= "INSERT INTO `$newCampaignDBName`.campaign_settings (simulation, campaign, abbrv, camp_db, camp_host, camp_user, camp_passwd, map, map_locations, status) ";
$query .= "VALUES ('RoF', '$newCampaignName', '$newCampaignAbbrv', '$newCampaignDBName', '$newCampaignDBHost', '$newCampaignDBUser', '$newCampaignDBPassword', '$campaignMap', '$campaignMapLocations',1);";
// create tables necessary for group files
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.col_10 LIKE boswar_db.col_10;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.Trains LIKE boswar_db.trains;";
$query .= "INSERT INTO `$newCampaignDBName`.trains SELECT * FROM boswar_db.trains;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.blocks LIKE boswar_db.blocks;";
$query .= "INSERT INTO `$newCampaignDBName`.blocks SELECT * FROM boswar_db.blocks;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.vehicles LIKE boswar_db.vehicles;";
$query .= "INSERT INTO `$newCampaignDBName`.vehicles SELECT * FROM boswar_db.vehicles;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.static LIKE boswar_db.static;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.cam_param LIKE boswar_db.cam_param;";
$query .= "INSERT INTO `$newCampaignDBName`.cam_param SELECT * FROM boswar_db.cam_param;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.flags LIKE boswar_db.flags;";
$query .= "INSERT INTO `$newCampaignDBName`.flags SELECT * FROM boswar_db.flags;";
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.bridges LIKE boswar_db.bridges;";
//$query .= "INSERT INTO `$newCampaignDBName`.bridges SELECT * FROM boswar_db.bridges;";

# INSERT CAMPAIGN DB INFORMATION TO MASTER TABLE
// this should be at the end of the creation chain
// so it won't be created if there is an error
$query .= "INSERT INTO campaign_settings (simulation, campaign, abbrv, camp_db, camp_host, camp_user, camp_passwd, map, map_locations, status) ";
$query .= "VALUES ('RoF', '$newCampaignName', '$newCampaignAbbrv','$newCampaignDBName', '$newCampaignDBHost', '$newCampaignDBUser', '$newCampaignDBPassword', '$campaignMap', '$campaignMapLocations',1);";

# Add user to the campaign_users table
$query .="INSERT INTO campaign_users (user_id, camp_db, CoalID, groupFile_path) VALUES ($userId, '$newCampaignDBName', 0, '' );";

// Tushka now returns you to your original indentation scheme

					# CREATE NEW DB INSTANCE
					/* execute multi query */
					if ($dbc->multi_query($query)) {
						do {
							/* store first result set */
							if ($result = $dbc->store_result()) {
								// do nothing as we don't expect feedback
								$result->free();
							}
						// need to include more_results to avoid strict checking warning
						} while ($dbc->more_results() && $dbc->next_result());
					}
					if ($dbc->errno) { 
						echo "CampaignMgmtCreateConfirm multi_query execution ended prematurely.\n";
						var_dump($dbc->error); 
					} 

					
					# forward to campaign configuration screen
					$_SESSION['camp_db'] = "$newCampaignDBName";

					header("Location: CampaignMgmtConfigure.php?btn=campMgmt");

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