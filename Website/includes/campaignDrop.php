
<?php

# Need to put this in here as er have no header included in this page
session_start(); 	

# as we have no regular page structure on this page we need to add some lines
// Make a mysqli connection to the central BOSWAR database
	require ( '../functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
# get the userId from the SESSION		
	$userId = $_SESSION['userId'];
			
	# get campaign database name from previous POST.
	$_SESSION['camp_db'] = $_POST["camp_db"];
	$camp_db = $_SESSION['camp_db'];
	
	if (empty($_SESSION['camp_db']))
		{
			header("Location: ../UserMgmtLoggedOn.php?btn=home");
			unset ($_SESSION['userCoalId']);			
			exit;
		}
	else
		{
			# use it to get remaining variables
			$query = "SELECT campaign, camp_host, camp_user, camp_passwd from campaign_settings where camp_db = '$camp_db';"; 
 
			if(!$result = $dbc->query($query)) {
				die('There was an error running the query [' . $dbc->error . ']');
			}

			if ($result = mysqli_query($dbc, $query)) {
				/* fetch associative array */
				while ($obj = mysqli_fetch_object($result)) {
					$campaign		=($obj->campaign);
					$camp_host		=($obj->camp_host);
					$camp_user		=($obj->camp_user);
					$camp_passwd	=($obj->camp_passwd);
				}
			}

			# drop database
			$query = "DROP DATABASE IF EXISTS `$camp_db`;";
			
				# get assigned users from campaign_users table
				$query1 = "SELECT id from campaign_users where camp_db = '$camp_db';";
				
				if(!$result1 = $dbc->query($query1)) {
					die('There was an error running the query [' . $dbc->error . ']');
				}
				$idList = '';
				if ($result1 = mysqli_query($dbc, $query1)) {
					/* fetch associative array */
					
					while ($obj = mysqli_fetch_object($result1)) {
						$assignedUser	=($obj->id);
						$i				= $assignedUser;
						$idList			= $idList .',' .$i;
					}
				// remove leading comma
				$idList = ltrim($idList, ',');
				}
				
			// add that idList into the query to remove assigned users from campaign_users table
			$query .= "DELETE FROM campaign_users where id in ($idList);";
			
			# delete entry in campaign_settings table
			// this should be the last in the series
			$query .= "DELETE FROM campaign_settings where camp_db = '$camp_db';";		

			# REVOKE CAMPAIGN DB USER RIGHTS ON NEW DB
			$query .= "REVOKE SELECT, INSERT, UPDATE, DELETE, DROP ON `$camp_db`.* FROM '$camp_user'@'$camp_host';";

			# execute SQL query

			# DROP DB INSTANCE
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
			
		}
	unset ($_SESSION['camp_db']);

	# redirect to campaign Management section screen with selected $loadedCampaign variable
	header("Location: ../CampaignDrop.php?btn=home");
?>
