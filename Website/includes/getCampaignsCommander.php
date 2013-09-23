
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
	
	# check if commander is assigned to any active campaign
	$query = "SELECT * FROM campaign_settings c
				JOIN campaign_users u
				ON  c.camp_db = u.camp_db
				AND c.status = 3
				AND c.simulation = '$game'
				AND u.user_id = '$userId'";
	
	if(!$result = $dbc->query($query))
	   { die('There was an error running the query [' . $dbc->error . ']'); }
	
	if(mysqli_num_rows($result)!=0)
		{
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
					echo "	<input type=\"submit\" value=\"Connect\"><br>\n";
					echo "</form><br>\n";
				}
		}
	else
		{
			echo "<p>If you miss your campaign in the list or you not even see a list, then please contact your administrator to assign you as commander!</p>\n";
		}

?>

	</form>


