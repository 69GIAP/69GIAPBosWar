
<?php

# Need to put this in here as er have no header included in this page
session_start(); 	

# as we have no regular page structure on this page we need to add some lines
# Incorporate the MySQL connection script.
	require ( '../../connect_db.php' );
# get the userId from the SESSION		
	$userId = $_SESSION['userId'];
			
	# get campaign database name from previous POST.
	$_SESSION['camp_db'] = $_POST["camp_db"]; # changed from db to camp_db
	$camp_db = $_SESSION['camp_db'];
	
	if (empty($_SESSION['camp_db']))
		{
			header("Location: ../loggedOn.php?btn=home");
			unset ($_SESSION['userCoalId']);			
			exit;
		}
	else
		{
			# get coalition the user is assigned to	in this camapign
			$query = "SELECT coalId FROM campaign_users WHERE user_id = '$userId' and camp_db = '$camp_db'";
			# execute SQL query

			if(!$result = $dbc->query($query))
	   		{ die('There was an error running the query '.$query.' [' . $dbc->error . ']'); }			

			$row 	= mysqli_fetch_object($result);
			
			#  bind coalition to SESSION
			$_SESSION['userCoalId'] = ($row->coalId);
		}
		
	# redirect to campaign Management section screen with selected $loadedCampaign variable
	header("Location: ../CampaignManagment.php?btn=campmgmt");
?>
