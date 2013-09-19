// Get coalitions for a pulldown list
// 69giapmyata
// ver 1.1
<?php

	# load the query into a variable dependent on the role the user owns

	if ($userRole == "administrator"
		or $userRole == "redGroundAdmin" or $userRole == "redAirAdmin"
		or $userRole == "blueGroundAdmin" or $userRole == "blueAirAdmin") # everybody can see all coalitions
		{
			$query = "SELECT * FROM rof_coalitions";
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
					$coalID			=($obj->CoalID);
					$coalitionName	=($obj->Coalitionname);
					echo "<option value=\"". $coalID. "\">". $coalID. " - " .$coalitionName. "</option>\n";
				}
		}
?>
