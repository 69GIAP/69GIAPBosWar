# Myata 05/08/2014 introduced airstart selection based on sim

<?php

	# load options based on sim
	if ($sim == 'RoF') {
	$queryOptions = "SELECT * 
					FROM spawn_position 
					WHERE sim like 'RoF'";
	}
	
	if ($sim == 'BoS') {
	$queryOptions = "SELECT * 
					FROM spawn_position 
					WHERE sim like 'BoS'";
	}

	if(!$resultOptions = $camp_link->query($queryOptions))
		{
			die('There was an error running the query [' . $camp_link->error . ']');
		}
	
	if ($resultOptions = mysqli_query($camp_link, $queryOptions)) 
		{	
			/* fetch associative array */
			while ($objOptions = mysqli_fetch_object($resultOptions)) 
				{
					$airstartPosition 	= ($objOptions->start_type);
					$airstartDescription = ($objOptions->description);
					echo "<option value=\"". $airstartPosition. "\">".$airstartPosition."-".$airstartDescription. "</option>\n";
				}
		}
	
?>

