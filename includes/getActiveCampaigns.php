<?php          
	# load the query into a varibale
	$query = "SELECT campaign, camp_db FROM campaign_settings where status = 3 and simulation = '$game' ";
	
	if(!$result = $dbc->query($query))
		{
			die('There was an error running the query [' . $dbc->error . ']');
		}
	
	if ($result = mysqli_query($dbc, $query)) 
		{				
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$campaign	=($obj->campaign);					
					$camp_db	=($obj->camp_db);
					echo "<option value=\"". $camp_db. "\">". $camp_db. "</option>\n";
				}
		}
?>