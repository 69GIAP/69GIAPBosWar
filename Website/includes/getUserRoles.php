<?php          
	# load the query into a variable dependent on the role the user owns

	if ($userRole == "administrator") 
		{	
			$query = "SELECT role FROM campaign_users_roles";
		}
	
	if ($userRole == "commander")
		{
			$query = "SELECT role FROM campaign_users_roles where role like \"%commander%\"";
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
					$newRole=($obj->role);
					echo "<option value=\"". $newRole. "\">". $newRole. "</option>\n";
				}
		}
		
	mysqli_free_result($result);
?>