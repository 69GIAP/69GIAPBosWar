<?php 
// CampaignPrepCreateConfirm.php
// create a new campaign
// =69.GIAP=MYATA and =69.GIAP=TUSHKA
// Oct 5, 2013
// BOSWAR version 1.17
// Nov 12, 2013

// Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();

// Include the webside header
	include ( 'includes/header.php' );
	
// Include the navigation on top
	include ( 'includes/navigation.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
				<?php
					$game	=	$_SESSION['game'];	
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

					// load map location
					$query = "SELECT map_locations FROM maps WHERE map = '$campaignMap';";
				    // include doit.php	
					include ('includes/doit.php');
					
					if ($result = $dbc->query($query)) {	
						while ($obj = $result->fetch_object()) {
								$campaignMapLocations	=	($obj->map_locations);
//								echo "\$campaignMapLocations: $campaignMapLocations<br />\n";
						}
					}
// Tushka has removed 49 spaces of indentation for readability's sake
// CREATE CAMPAIGN DB
$query = "CREATE DATABASE IF NOT EXISTS `$newCampaignDBName` ;";
include ('includes/doit.php');
echo "$newCampaignDBName created<br />\n";

// GRANT CAMPAIGN DB USER RIGHTS ON NEW DB
$query = "GRANT SELECT, INSERT, UPDATE, DELETE, DROP ON `$newCampaignDBName`.* TO '$newCampaignDBUser'@'$newCampaignDBHost' IDENTIFIED BY '$newCampaignDBPassword' ;";
include ('includes/doit.php');
echo "$newCampaignDBUser granted rights on $newCampaignDBName<br />\n";

// GRANT GLOBAL FILE PRIVILEGE to db user so can read and write group files
$query = "GRANT FILE ON *.* TO '$newCampaignDBUser'@'$newCampaignDBHost' ;";
include ('includes/doit.php');
echo "$newCampaignDBUser granted FILE privs<br />\n";

// COPY INITIAL TABLESET FROM BOSWAR_DB TO NEW CAMPAIGN DB
// Start with those that differ between RoF and BoS

if ($game == 'RoF') {

	$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.coalitions LIKE rof_coalitions;";
	include ('includes/doit.php');
	echo "coalitions created<br />\n";

	$query = "INSERT INTO `$newCampaignDBName`.coalitions SELECT * FROM rof_coalitions;";
	include ('includes/doit.php');
	echo "coalitions populated from rof_coalitions<br />\n";

	$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.countries LIKE rof_countries;";
	include ('includes/doit.php');
	echo "countries created<br />\n";

	$query = "INSERT INTO `$newCampaignDBName`.countries SELECT * FROM rof_countries;";
	include ('includes/doit.php');
	echo "countries populated from rof_countries<br />\n";

	$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.object_properties LIKE rof_object_properties;";
	include ('includes/doit.php');
	echo "object_properties created<br />\n";

	$query = "INSERT INTO `$newCampaignDBName`.object_properties SELECT * FROM rof_object_properties;";
	include ('includes/doit.php');
	echo "object_properties populated from rof_object_properties<br />\n";

} else { // must be BoS

	$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.coalitions LIKE bos_coalitions;";
	include ('includes/doit.php');
	echo "coalitions created<br />\n";

	$query = "INSERT INTO `$newCampaignDBName`.coalitions SELECT * FROM bos_coalitions;";
	include ('includes/doit.php');
	echo "coalitions populated from bos_coalitions<br />\n";

	$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.countries LIKE bos_countries;";
	include ('includes/doit.php');
	echo "countries created<br />\n";

	$query = "INSERT INTO `$newCampaignDBName`.countries SELECT * FROM bos_countries;";
	include ('includes/doit.php');
	echo "countries populated from bos_countries<br />\n";

	$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.object_properties LIKE bos_object_properties;";
	include ('includes/doit.php');
	echo "object_properties created<br />\n";

	$query = "INSERT INTO `$newCampaignDBName`.object_properties SELECT * FROM bos_object_properties;";
	include ('includes/doit.php');
	echo "object_properties populated from bos_object_properties<br />\n";

}

$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.airfields LIKE airfields;";
include ('includes/doit.php');
echo "airfields created<br />\n";

$query = "INSERT INTO `$newCampaignDBName`.airfields SELECT * FROM airfields;";
include ('includes/doit.php');
echo "airfields populated<br />\n";

$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.airfields_models LIKE airfields_models;";
include ('includes/doit.php');
echo "airfields_models created<br />\n";

// Do the remainder of the empty tables that we need
$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.campaign_missions LIKE campaign_missions;";
include ('includes/doit.php');
echo "campaign_missions created<br />\n";

$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.gunner_scores LIKE gunner_scores;";
include ('includes/doit.php');
echo "gunner_scores created<br />\n";

$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.kills LIKE kills;";
include ('includes/doit.php');
echo "kills created<br />\n";

$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.pilot_scores LIKE pilot_scores;";
include ('includes/doit.php');
echo "pilot_scores created<br />\n";

$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.key_points LIKE key_points;";
include ('includes/doit.php');
echo "key_points created<br />\n";

// Now do the rest of the tables that need to be populated
$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.mission_status LIKE mission_status;";
include ('includes/doit.php');
echo "mission_status created<br />\n";

$query = "INSERT INTO `$newCampaignDBName`.mission_status SELECT * FROM mission_status;";
include ('includes/doit.php');
echo "mission_status populated<br />\n";

$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.player_fate LIKE player_fate;";
include ('includes/doit.php');
echo "player_fate created<br />\n";

$query = "INSERT INTO `$newCampaignDBName`.player_fate SELECT * FROM player_fate;";
include ('includes/doit.php');
echo "player_fate populated<br />\n";

$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.player_health LIKE player_health;";
include ('includes/doit.php');
echo "player_health created<br />\n";

$query = "INSERT INTO `$newCampaignDBName`.player_health SELECT * FROM player_health;";
include ('includes/doit.php');
echo "player_health populated<br />\n";

$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.object_roles LIKE object_roles;";
include ('includes/doit.php');
echo "object_roles created<br />\n";

$query = "INSERT INTO `$newCampaignDBName`.object_roles SELECT * FROM object_roles;";
include ('includes/doit.php');
echo "object_roles populated<br />\n";

// create the selected map_locations table
$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.$campaignMapLocations LIKE $campaignMapLocations;";
include ('includes/doit.php');
echo "$campaignMapLocations created<br />\n";

$query = "INSERT INTO `$newCampaignDBName`.$campaignMapLocations SELECT * FROM $campaignMapLocations;";
include ('includes/doit.php');
echo "$campaignMapLocations populated<br />\n";

$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.campaign_settings LIKE campaign_settings;";
include ('includes/doit.php');
echo "campaign_settings created<br />\n";

$query = "INSERT INTO `$newCampaignDBName`.campaign_settings (simulation, campaign, abbrv, camp_db, camp_host, camp_user, camp_passwd, map, map_locations, status) ";
$query .= "VALUES ('$game', '$newCampaignName', '$newCampaignAbbrv', '$newCampaignDBName', '$newCampaignDBHost', '$newCampaignDBUser', '$newCampaignDBPassword', '$campaignMap', '$campaignMapLocations',1);";
include ('includes/doit.php');
echo "campaign_settings populated<br />\n";

// create tables necessary for group files
$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.col_10 LIKE col_10;";
include ('includes/doit.php');
echo "col_10 created<br />\n";

$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.columns LIKE columns;";
include ('includes/doit.php');
echo "columns created<br />\n";

$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.static LIKE static;";
include ('includes/doit.php');
echo "static created<br />\n";

$query = "CREATE TABLE IF NOT EXISTS `$newCampaignDBName`.bridges LIKE bridges;";
include ('includes/doit.php');
echo "bridges created<br />\n";

//$query .= "INSERT INTO `$newCampaignDBName`.bridges SELECT * FROM bridges;";

// INSERT CAMPAIGN DB INFORMATION TO MASTER TABLE
// this should be at the end of the creation chain
// so it won't be created if there is an error
$query = "INSERT INTO campaign_settings (simulation, campaign, abbrv, camp_db, camp_host, camp_user, camp_passwd, map, map_locations, status) ";
$query .= "VALUES ('$game', '$newCampaignName', '$newCampaignAbbrv','$newCampaignDBName', '$newCampaignDBHost', '$newCampaignDBUser', '$newCampaignDBPassword', '$campaignMap', '$campaignMapLocations',1);";
include ('includes/doit.php');
echo "master campaign_settings updated<br />\n";

// Add user to the campaign_users table
$query ="INSERT INTO campaign_users (user_id, camp_db, CoalID, groupFile_path) VALUES ($userId, '$newCampaignDBName', 0, '' );";
include ('includes/doit.php');
echo "master campaign_users updated<br />\n";
echo " Done!<br />\n";

// Tushka now returns you to your original indentation scheme
/*
					# CREATE NEW DB INSTANCE
					# execute multi query 
					if ($dbc->multi_query($query)) {
						do {
							# store first result set 
							if ($result = $dbc->store_result()) {
								// do nothing as we don't expect feedback
								$result->free();
							}
						// need to include more_results to avoid strict checking warning
						} while ($dbc->more_results() && $dbc->next_result());
					}
					
					if ($dbc->errno) {
						# DROP database
						$rollback  = "DROP DATABASE IF EXISTS `$newCampaignDBName`;";
						# REVOKE CAMPAIGN DB USER RIGHTS ON NEW DB
						$rollback .= "REVOKE DELETE, DROP, INSERT, SELECT, UPDATE ON `$newCampaignDBName`.* FROM '$newCampaignDBUser'@'$newCampaignDBHost';";

						# execute multi query for full rollback
						if ($dbc->multi_query($rollback)) {
						do {
							# store first result set
							if ($result = $dbc->store_result()) {
								// do nothing as we don't expect feedback
								$result->free();
								}
							// need to include more_results to avoid strict checking warning
							} while ($dbc->more_results() && $dbc->next_result());
						}
						if ($dbc->errno) {
							echo "<p>Campaign creation Rollback multi_query execution ended prematurely.<br>\n";
							header("Location: CampaignMgmt.php?btn=campMgmt");
						}
						
						echo "Therefor campaign creation multi_query execution also ended prematurely.<br><br>\n";
						echo "<b>Error:</b><br></p>\n";
						var_dump($dbc->error); 
						
					} 
*/					
					// forward to campaign configuration screen
					$_SESSION['camp_db'] = "$newCampaignDBName";
					echo "<form id=\"campaignPrepCreateDone\" name=\"campaignSetup\" action=\"CampaignMgmtConfigure.php?btn=campMgmt\" method=\"post\">\n";
					# BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" name =\"Setup\" id=\"SetupDone\" value =\"true\" >Next</button>\n"; # the value defines the action after the button was pressed
					echo "	</fieldset>\n";
					echo "</form>\n";

//					header("Location: CampaignMgmtConfigure.php?btn=campMgmt");

                ?>
            
            </div>
    
        </div>

		<?php
            // Include the general sidebar
            include ( 'includes/sidebar.php' );
        ?>	

		<div id="clearing"></div>
	</div>

<?php
	$dbc->close();

	// Include the footer
	include ( 'includes/footer.php' );
?>
