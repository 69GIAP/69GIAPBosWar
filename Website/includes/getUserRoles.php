<?php          
	# load the query into a variable dependent on the role the user owns

	if ($userRole == "administrator") 
		{
			$query = "SELECT * FROM roles";
		}
	if ($userRole == "redGroundAdmin" or $userRole == "redAirAdmin")
		{
			$query = "SELECT * FROM roles where role like \"%red%\"";
		}
	if ($userRole == "blueGroundAdmin" or $userRole == "blueAirAdmin")
		{
			$query = "SELECT * FROM roles where role like \"%blue%\"";
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
					$userRole=($obj->role);
					echo "<option value=\"". $userRole. "\">". $userRole. "</option>\n";
				}
		}
?>