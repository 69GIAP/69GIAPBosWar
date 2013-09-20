
<?php

	if ($userRole == "administrator") 
		{
			$query = "SELECT * FROM users";
		}
	if ($userRole == "commander")
		{
			# show users who are assigned to my active campaigns are visible only
			$query = "SELECT * from users u
					JOIN campaign_users c
					ON u.user_id = c.user_id 
					AND c.camp_db in (SELECT camp_db from campaign_users WHERE user_id = '$user_id')
					and u.user_id != '$user_id'";
		}	
	
	if(!$result = $dbc->query($query))
		{
			die('There was an error running the query [' . $dbc->error . ']');
		}	
	
	if ($result = mysqli_query($dbc, $query)) 
		{				
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$id			=($obj->user_id);
					$username	=($obj->username);
					$userRole	=($obj->role);
					echo "<option value=\"". $id. "\">".$username. " - ".$userRole."</option>\n";
				}
		}
?>
