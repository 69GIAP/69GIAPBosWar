
<?php

	# load aircraft list from selected campaign database
	$queryModel = "SELECT model FROM test_models";
	
	if(!$resultModel = $camp_link->query($queryModel))
		{
			die('There was an error running the query [' . $camp_link->error . ']');
		}
	
	if ($resultModel = mysqli_query($camp_link, $queryModel)) 
		{				
			/* fetch associative array */
			while ($objModel = mysqli_fetch_object($resultModel)) 
				{
					$aircraftModelPool =	($objModel->model);
					echo "<option value=\"". $aircraftModelPool. "\">". $aircraftModelPool. "</option>\n";
				}
		}
	
?>
