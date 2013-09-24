
<?php

	if ($userRole == "administrator") 
		{
			$query = "SELECT * from users u, campaign_users c, users_roles r
						WHERE r.role_id = u.role_id
						AND u.user_id = c.user_id
						GROUP BY u.user_id";
		}
	if ($userRole == "commander")
		{
			# show commanders, who are assigned to my active campaigns excluding Administrators and viewers, these are the only ones visible
			$query = "SELECT u.user_id, u.username, r.role from users u, campaign_users c, users_roles r
						WHERE r.role_id = u.role_id
						AND u.user_id = c.user_id
						AND u.user_id != 'userId'
						AND u.role_id != 1
						AND u.role_id != 3
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
					$id		=($obj->user_id);
					$name	=($obj->username);
					$role	=($obj->role);
					echo "<option value=\"". $id. "\">".$name. " - ".$role."</option>\n";
				}
		}
		
	mysqli_free_result($result);		
?>
