
<?php

	# filter by user role
	# this is a filter for the campaign administrator		
	if ($userRole == 'administrator') {
		# load aircraft list from selected campaign database
		$queryModel = "SELECT object_type FROM rof_object_properties where object_class like 'P%'";
	}
	elseif ($userRole == 'commander') {
		# load aircraft list from selected campaign database
		$queryModel = "SELECT object_type 
						FROM rof_object_properties 
						WHERE object_class like 'P%'
						AND coalition = $userCoalId
						AND active = 1";
	}
	
	if(!$resultModel = $camp_link->query($queryModel))
		{
			die('There was an error running the query [' . $camp_link->error . ']');
		}
	
	if ($resultModel = mysqli_query($camp_link, $queryModel)) 
		{	
		echo "<option value=\"\" disabled selected>Select Aircraft Model to Add/Remove</option>\n";			
			/* fetch associative array */
			while ($objModel = mysqli_fetch_object($resultModel)) 
				{
					$aircraftModelPool =	($objModel->object_type);
					echo "<option value=\"". $aircraftModelPool. "\">". $aircraftModelPool. "</option>\n";
				}
		}
	
?>
