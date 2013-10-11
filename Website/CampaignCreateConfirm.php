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
					$newCampaignDBPassword 	= $_POST['newCampaignDatabasePassword'];
					$newCampaignDBHost	 	= $_POST['newCampaignDatabaseHost'];					
					$campaignMap			= $_POST['campaignMap'];

// Tushka is skipping the extra indentation while testing
// If selected, $existing contains host, user, and passwd
$existing = $_POST['existing'];
// check to see if 'existing' was the selected option
if ($existing) { // selected if not empty
	// split 'existing' into three parts at the '+'
	$Part = explode('+',$existing,3);
	$newCampaignDBHost = $Part[0];
	$newCampaignDBUser = $Part[1];
	$newCampaignDBPassword = $Part[2];
}
// Tushka now returns you to the extra indentation

					# load map location
					$query = "SELECT map_locations FROM maps";
					
					if(!$result = $dbc->query($query))
						{die('There was an error running the query [' . $dbc->error . ']');}
					
					if ($result = mysqli_query($dbc, $query)) 
						{	
						while ($obj = mysqli_fetch_object($result)) 
							{
								$campaignMapLocations	=	($obj->map_locations);
							}
						}
// Tushka has removed 49 spaces of indentation for readability's sake
# CREATE CAMPAIGN DB
$query = "CREATE DATABASE IF NOT EXISTS `$newCampaignDBName` ;";
					
# GRANT CAMPAIGN DB USER RIGHTS ON NEW DB
$query .= "GRANT SELECT, INSERT, UPDATE, DELETE ON `$newCampaignDBName`.* TO '$newCampaignDBUser'@'$newCampaignDBHost' IDENTIFIED BY '$newCampaignDBPassword' ;";

// GRANT GLOBAL FILE PRIVILEGE to db user so can read and write group files
$query .= "GRANT FILE ON *.* TO '$newCampaignDBUser'@'$newCampaignDBHost' ;";

# COPY INITIAL TABLESET FROM BOSWAR_DB TO NEW CAMPAIGN DB
$query .= "CREATE TABLE `$newCampaignDBName`.rof_airfields	SELECT * FROM boswar_db.rof_airfields;";
$query .= "CREATE TABLE `$newCampaignDBName`.rof_models 		SELECT * FROM boswar_db.rof_models;";

// Note that the simple CREATE TABLE method used above does not recreate indices, etc
// To get those, use CREATE TABLE...LIKE
// Here is an example with rof_airfields2... compare to rof_airfields above
// I know we don't need both, but the comparison is enlightening
// Compare structure for 'id'
$query .= "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.rof_airfields2 LIKE boswar_db.rof_airfields;";
// Populate the new table with data from rof_airfields just for fun
$query .= "INSERT INTO `$newCampaignDBName`.rof_airfields2 SELECT * FROM boswar_db.rof_airfields;";
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
$query .= "INSERT INTO `$newCampaignDBName`.campaign_settings (simulation, campaign, camp_db, camp_host, camp_user, camp_passwd, map, map_locations, status) ";
$query .= "VALUES ('RoF', '$newCampaignName', '$newCampaignDBName', '$newCampaignDBHost', '$newCampaignDBUser', '$newCampaignDBPassword', '$campaignMap', '$campaignMapLocations',1);";
# INSERT CAMPAIGN DB INFORMATION TO MASTER TABLE
// this should be at the end of the creation chain
// so it won't be created if there is an error
$query .= "INSERT INTO campaign_settings (simulation, campaign, camp_db, camp_host, camp_user, camp_passwd, map, map_locations, status) ";
$query .= "VALUES ('RoF', '$newCampaignName', '$newCampaignDBName', '$newCampaignDBHost', '$newCampaignDBUser', '$newCampaignDBPassword', '$campaignMap', '$campaignMapLocations',1);";

// Tushka now returns you to your original indentation scheme

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
					$_SESSION['camp_db'] = "$newCampaignDBName";

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
