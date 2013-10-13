
<?php

	if ($userRole == "administrator") 
		{
			$query = "SELECT u.user_id, u.username, u.email, u.phone, c.camp_db, r.role_id, r.role from users u
						LEFT JOIN campaign_users c
						ON u.user_id = c.user_id
						LEFT JOIN users_roles r
						ON r.role_id = u.role_id
						GROUP BY u.user_id;";
		}
	if ($userRole == "commander")
		{
			# show commanders, who are assigned to my active campaigns excluding me, administrators and viewers, these are the only ones visible
			$query = "SELECT u.user_id, u.username, u.email, u.phone, r.role from users u, campaign_users c, users_roles r
						WHERE r.role_id = u.role_id
						AND u.user_id = c.user_id
						AND u.user_id != 'userId'
						AND u.role_id != 1
						AND u.role_id != 3
						AND u.user_id != $userId
						GROUP BY u.user_id";
		}	
	
	if(!$result = $dbc->query($query))
		{
			die('There was an error running the query [' . $dbc->error . ']');
		}	
	
	if ($result = mysqli_query($dbc, $query)) 
		{				
			echo "<option value=\"\" disabled selected>Select User</option>\n";	
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$id		=($obj->user_id);
					$name	=($obj->username);
					echo "<option value=\"". $id. "\">".$name."</option>\n";
				}
		}
		
	mysqli_free_result($result);		
?>
