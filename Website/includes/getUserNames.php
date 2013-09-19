// Get Username (and ID) for a pulldown list
// 69giaptushka
// ver 1.0
<?php          	# load the query into a variable
	$query = "SELECT * FROM users";
	
	if(!$result = $dbc->query($query))
		{
			die('There was an error running the query [' . $dbc->error . ']');
		}
	
	if ($result = mysqli_query($dbc, $query)) 
		{				
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$id=($obj->user_id);
					$username=($obj->username);
					$userRole=($obj->role);
					echo "<option value=\"". $id. "\">".$username. " - ".$userRole."</option>\n";
				}
		}
?>
