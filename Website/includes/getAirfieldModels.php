// Get Aircraft Pool for a pulldown list
// 69giapmyata
// ver 1.1
<?php

	# load the query into a variable dependent on the role the user owns

	$query = "SELECT model FROM test_models";
	
	if(!$result = $dbc->query($query))
		{
			die('There was an error running the query [' . $dbc->error . ']');
		}
	
	if ($result = mysqli_query($dbc, $query)) 
		{				
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$aircraftModelPool =	($obj->model);
					echo "<option value=\"". $aircraftModelPool. "\">". $aircraftModelPool. "</option>\n";
				}
		}
?>
