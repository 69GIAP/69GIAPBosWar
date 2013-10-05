
<?php

	# load map
	$query = "SELECT map FROM campaign_maps";
	
	if(!$result = $dbc->query($query))
		{
			die('There was an error running the query [' . $dbc->error . ']');
		}
	
	if ($result = mysqli_query($dbc, $query)) 
		{	
		echo "<option value=\"\" disabled selected>Select Map Location</option>\n";			
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$campaignMap 			=	($obj->map);
					echo "<option value=\"". $campaignMap. "\">". $campaignMap. "</option>\n";
				}
		}
	
?>
