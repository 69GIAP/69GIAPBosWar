// Get campaign coalitions for a pulldown list
// 69giapmyata
// ver 1.1
<?php

	# load the campaign coalitions

	$query = "SELECT * FROM rof_coalitions";
	
	if(!$result = $camp_link->query($query))
		{
			die('There was an error running the query [' . $camp_link->error . ']');
		}
	
	if ($result = mysqli_query($camp_link, $query)) 
		{				
			/* fetch associative array */
			while ($obj = mysqli_fetch_object($result)) 
				{
					$coalID			=($obj->CoalID);
					$coalitionName	=($obj->Coalitionname);
					echo "<option value=\"". $coalID. "\">". $coalID. " - " .$coalitionName. "</option>\n";
				}
		}
?>
