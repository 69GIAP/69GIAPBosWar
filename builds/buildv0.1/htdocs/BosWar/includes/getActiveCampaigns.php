<?php          
	
	# distinguish query due to user role
	if ($userRole == "commander")
		{	
			# load all campaigns the user is assigned to
			$query ="SELECT camp_db FROM campaign_users WHERE user_id = $userId";
		}
	else
		{
			$query = "SELECT camp_db FROM campaign_settings where status = 3 and simulation = '$game' ";
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
					$camp_db	=($obj->camp_db);
					echo "<option value=\"". $camp_db. "\">". $camp_db. "</option>\n";
				}
		}
		
	mysqli_free_result($result);		
?>