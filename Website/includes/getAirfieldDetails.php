
<?php
	# get the airfields details
	$sql = "SELECT id, airfield_Name, airfield_Coalition ,airfield_Enabled FROM airfields 
			WHERE airfield_Name like '$airfieldName';";

	if(!$result = $camp_link->query($sql)){
		die('There was an error running the query ' . mysqli_error($camp_link));
	}
	
	# load results into variables 
	while ($obj = mysqli_fetch_object($result)) {
		$airfieldName		=($obj->airfield_Name);
		$airfieldCoalition	=($obj->airfield_Coalition);
		$airfieldEnabled	=($obj->airfield_Enabled);
		$airfieldId			=($obj->id);
	}	

?>
