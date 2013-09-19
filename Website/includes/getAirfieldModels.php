// Get airfields for a pulldown list
// 69giapmyata
// ver 1.1
<?php

	# load the query into a variable dependent on the role the user owns

	if ($userRole == "administrator") 
		{
			$query = "SELECT * FROM test_airfields";
		}
	if ($userRole == "redGroundAdmin" or $userRole == "redAirAdmin")
		{
			$query = "SELECT * FROM test_airfields where coalition = 1"; # Entente
		}
	if ($userRole == "blueGroundAdmin" or $userRole == "blueAirAdmin")
		{ 
			$query = "SELECT * FROM test_airfields where coalition = 2"; # Central Powers
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
					$airfieldName		=($obj->name);
					$airfieldCoalition	=($obj->coalition);
					$airfieldModel		=($obj->model);
					$airfieldNumber		=($obj->number);					
					echo "<option value=\"". $airfieldModel. "\">". $airfieldModel. "</option>\n";
				}
		}
?>
