# Stenka 12/1/14 correction to filter only planes that are availiable this is not ideal it should filter on coalition too
<?php
	# include function getCoalition.ph
	include ( 'functions/getMinCountry.php' );
	
	# use function to get CoalID
	$userCntry = get_mincountry("$userCoalId");
	
	# filter by user role
	# this is a filter for the campaign administrator		
	if ($userRole == 'administrator') {
		# load aircraft list from selected campaign database
		$queryModel = "SELECT object_type FROM object_properties where object_class like 'P%' and default_country < '600'";
	}

	elseif ($userRole == 'commander') {
		echo 	"USER COUNTRY ".$userCntry;
		# load aircraft list from selected campaign database
		$queryModel = "SELECT object_type 
						FROM object_properties 
						WHERE object_class like 'P%'
						and default_country < '600'";
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
