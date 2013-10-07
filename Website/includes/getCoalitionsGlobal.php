// Get global coalitions for a pulldown list
// 69giapmyata
// ver 1.0
<?php

	# load the campaign coalitions

	$query = "SELECT * FROM rof_coalitions order by CoalID";
	
	if(!$result = $dbc->query($query))
		{
			die('There was an error running the query [' . $dbc->error . ']');
		}
	
	if ($result = mysqli_query($dbc, $query)) 
		{				
			echo "<option value=\"\" disabled selected>Select New Coalition</option>\n";	
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$coalID			=($obj->CoalID);
					$coalitionName	=($obj->Coalitionname);
					echo "<option value=\"". $coalID. "\">". $coalID. " - " .$coalitionName. "</option>\n";
				}
		}
?>
