<?php          
	# load the query into a variable dependent on the role the user owns

	if ($userRole == "administrator") 
		{	
			$query = "SELECT role FROM users_roles";
		}
	
	if ($userRole == "commander")
		{
			$query = "SELECT role FROM users_roles where role like \"%commander%\"";
		}
		
	if(!$result = $dbc->query($query))
		{
			die('There was an error running the query [' . $dbc->error . ']');
		}
	
	if ($result = mysqli_query($dbc, $query)) 
		{				
			echo "<option value=\"\" disabled selected>Select New Role</option>\n";	
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$newUserRole=($obj->role);
					echo "<option value=\"". $newUserRole. "\">". $newUserRole. "</option>\n";
				}
		}

	mysqli_free_result($result);

?>