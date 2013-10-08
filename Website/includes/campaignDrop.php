
<?php

# Need to put this in here as er have no header included in this page
session_start(); 	

# as we have no regular page structure on this page we need to add some lines
# Incorporate the MySQL connection script.
	require ( '../../connect_db.php' );
# get the userId from the SESSION		
	$userId = $_SESSION['userId'];
			
	# get campaign database name from previous POST.
	$_SESSION['camp_db'] = $_POST["camp_db"];
	$camp_db = $_SESSION['camp_db'];
	
	if (empty($_SESSION['camp_db']))
		{
			header("Location: ../loggedOn.php?btn=home");
			unset ($_SESSION['userCoalId']);			
			exit;
		}
	else
		{
			# use it to get remaining variables
			$query = "SELECT * from campaign_settings where camp_db = '$camp_db'"; 
 
			if(!$result = $dbc->query($query)) {
				die('There was an error running the query [' . $dbc->error . ']');
			}

			if ($result = mysqli_query($dbc, $query)) {
				/* fetch associative array */
				while ($obj = mysqli_fetch_object($result)) {
					$campaign	=($obj->campaign);
					$camp_host	=($obj->camp_host);
					$camp_user	=($obj->camp_user);
				}
			}

			# delete entry in campaign_settings table
			$query = "DELETE FROM campaign_settings where camp_db = '$camp_db'";
			
			# execute SQL query

			if(!$result = $dbc->query($query))
	   		{ die('There was an error running the query '.$query.' [' . $dbc->error . ']'); }			

			# drop database
			$query	= "DROP USER IF EXISTS $camp_user;";
			$query .= "DROP DATABASE IF EXISTS $camp_db;";
			
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
	unset ($camp_db);
	
	# redirect to campaign Management section screen with selected $loadedCampaign variable
	header("Location: ../CampaignSelect.php?btn=home");
?>
