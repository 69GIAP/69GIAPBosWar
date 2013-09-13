<?php
// Get Campaign List
// 69giaptushka
// ver 1.0
      	# load the query into a variable
	$query = "SELECT * FROM campaigns";
	
	if(!$result = $dbc->query($query))
		{
			die('There was an error running the query [' . $dbc->error . ']');
		}
	
	if ($result = mysqli_query($dbc, $query)) 
		{				
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$campaign=($obj->campaign);
					$map=($obj->map);
					$simulation=($obj->simulation);
					echo "<b>".$campaign."</b> -  ".$map." map (".$simulation.")<br>\n";

				}
		}
?>
