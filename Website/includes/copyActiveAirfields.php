<?php
	echo "<p>This page will copy the active airfields into the airfields_models table.</p>\n";
	$result = '';
	$query	= '';
	
	$query .= "DELETE FROM airfields_models; ";
	
	$query .= "INSERT INTO airfields_models (airfield_Name, airfield_Coalition) SELECT airfield_Name, airfield_Coalition FROM airfields WHERE airfield_enabled = 1;";
	#echo $query;
	
	if(!$result = $camp_link->query($query))
		{
			die('There was an error running the query [' . $camp_link->error . ']');
		}
	
	/* execute multi query */
	if ($camp_link->multi_query($query)) {
		do {
			/* store first result set */
			if ($result = $camp_link->store_result()) {
				// do nothing as we don't expect feedback
				$result->free();
			}
		// need to include more_results to avoid strict checking warning
		} while ($camp_link->more_results() && $camp_link->next_result());
	}
	if ($camp_link->errno) { 
		echo "Copy process from airfields to airfields_models multi_query execution ended prematurely.\n";
		var_dump($camp_link->error);
	}
?>

