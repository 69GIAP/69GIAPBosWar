# Stenka 12/1/14  this is not ideal it should filter on coalition too
# Myata 10/5/14 correction to filter only planes that are availiable and not yet selected for the actual field

<?php
	# include function getCoalition.ph
	include ( 'functions/getMinCountry.php' );
	
	# use function to get CoalID
	$userCntry = get_mincountry("$userCoalId");
	
	# filter by user role
	# this is a filter for the campaign administrator		
	if ($userRole == 'administrator') {
		# load aircraft list from selected campaign database
		$queryModel = "SELECT object_type 
										FROM object_properties 
										WHERE object_class like 'P%' 
										AND default_country < '600' 
										AND object_type not in (SELECT model_Name FROM airfields_models where airfield_Name = '$airfieldName');";
	}

	elseif ($userRole == 'commander') {
		echo 	"USER COUNTRY ".$userCntry;
		# load aircraft list from selected campaign database
		$queryModel = "SELECT object_type 
						FROM object_properties 
						WHERE object_class like 'P%'
						AND default_country < '600'
						AND object_type not in (SELECT model_Name FROM airfields_models where airfield_Name = '$airfieldName');";
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
