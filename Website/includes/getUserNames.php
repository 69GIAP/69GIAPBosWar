
<?php

	if ($userRole == "administrator") 
		{
			$query = "SELECT * FROM users";
		}
	if ($userRole == "commander")
		{
			# show users, who are assigned to my active campaigns, are the only ones visible
			$query = "SELECT * from users u, campaign_users c
						WHERE u.role = 'commander'
						AND u.user_id = c.user_id
						AND u.user_id != '$user_id'
						GROUP BY u.user_id";
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
					$Role		=($obj->role);
					echo "<option value=\"". $id. "\">".$username. " - ".$Role."</option>\n";
				}
		}
	mysqli_free_result($result);		
?>
