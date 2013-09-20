
	<form name="input" action="includes/selectCampaign.php" method="post">

<?php
	# getAdminCampaigns.php
	# Get Campaign list for administrator
	# 69giaptushka
	# ver 1.0
	# Sept 14, 2012
	#
	# this whole thing is a single form to pass a database name, etc
	# try it as a radio button list
	
	# get active campaigns
	echo "<h3>Active Campaigns</h3>\n";
	
	# get user_id from current user
	$username 	= $_SESSION['username'];
	$query 		= "SELECT user_id FROM users where username = '$username' ";
	
	if(!$result = $dbc->query($query))
		{ die('There was an error running the query [' . $dbc->error . ']'); }
		
		if ($result = mysqli_query($dbc, $query)) 
		{
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
			{
				$user_id =($obj->user_id);
			}
		}

	# check if commander is assigned to any active campaign
	$query = "SELECT * FROM campaign_settings c
				JOIN campaign_users u
				ON  c.camp_db = u.camp_db
				AND c.status = 3
				AND c.simulation = '$game'
				AND u.user_id = '$user_id'";
	
	if(!$result = $dbc->query($query))
	   { die('There was an error running the query [' . $dbc->error . ']'); }
		
	if ($result = mysqli_query($dbc, $query)) 
		{
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$campaign	=($obj->campaign);
					$camp_db	=($obj->camp_db);
					$map		=($obj->map);
					$simulation	=($obj->simulation);
					# created radio boxes
					echo "<p><input type=\"radio\" name=\"db\" value=$camp_db>";
					echo "<b>".$campaign."</b> -  ".$camp_db." db - ".$map." map (".$simulation.")<br></p>\n";
				}
			echo "<p>If you miss your campaing please contact the administrator to assign you to it as commander!</p>\n";			
		}

?>

<input type="submit" value="Connect">
</form>
