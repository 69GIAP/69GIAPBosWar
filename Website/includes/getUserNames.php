// Get Username (and ID) for a pulldown list
// 69giapmyata
// ver 1.1
<?php

	# load the query into a variable dependent on the role the user owns

	if ($userRole == "administrator") 
		{
			$query = "SELECT * FROM users";
		}
	if ($userRole == "redGroundAdmin" or $userRole == "redAirAdmin")
		{
			$query = "SELECT * FROM users where role like \"%red%\"";
		}
	if ($userRole == "blueGroundAdmin" or $userRole == "blueAirAdmin")
		{
			$query = "SELECT * FROM users where role like \"%blue%\"";
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
