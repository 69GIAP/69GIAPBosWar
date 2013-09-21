// Get Aircraft Pool for a pulldown list
// 69giapmyata
// ver 1.1
<?php

	# load aircraft list from selected campaign database
	$query = "SELECT model FROM test_models";
	
	if(!$result = $camp_link->query($query))
		{
			die('There was an error running the query [' . $camp_link->error . ']');
		}
	
	if ($result = mysqli_query($camp_link, $query)) 
		{				
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$aircraftModelPool =	($obj->model);
					echo "<option value=\"". $aircraftModelPool. "\">". $aircraftModelPool. "</option>\n";
				}
		}
	
?>
