<?php          
	# load the query into a varibale
	$query = "SELECT * FROM roles";
	
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