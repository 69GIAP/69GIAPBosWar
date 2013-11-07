
<?php
	# get the airfields details
	$sql = "SELECT id, airfield_Name, airfield_Coalition ,airfield_Enabled FROM airfields 
			WHERE airfield_Name like '$airfieldName';";

	if(!$result = $camp_link->query($sql)){
		die('There was an error running the query ' . mysqli_error($camp_link));
	}
	
	# check if there are multiple entries having same airfield_Name in the result
	if ($result->num_rows > 1) {
		$error = 1;
	}
	
	while ($obj = mysqli_fetch_object($result)) {
		$airfieldName		=($obj->airfield_Name);
		$airfieldCoalitionId=($obj->airfield_Coalition);
		$airfieldEnabled	=($obj->airfield_Enabled);
		$airfieldId			=($obj->id);
	}	
	
	# debug
#	echo "\$airfieldName: ".$airfieldName."<br>\n" ;
#	echo "\$airfieldCoalition : ".$airfieldCoalitionId."<br>\n" ;
#	echo "\$airfieldEnabled : " .$airfieldEnabled."<br>\n" ;
#	echo "\$airfieldId: ".$airfieldId."<br>\n" ;
?>
