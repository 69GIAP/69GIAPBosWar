<?php
	echo "<p>This page will copy the active airfields into the airfields_models table.</p>\n";
	$result = '';
	$query1	= '';
	$query2	= '';
	
	$query1 = "DELETE FROM airfields_models; ";
	
	$query2 = "INSERT INTO airfields_models (airfield_Name, model_Name) SELECT airfields.airfield_Name, '' FROM airfields WHERE airfields.airfield_enabled = 1;";
	
	if(!$result = $camp_link->query($query1)) {
		echo "$query1<br>\n";
		die('copyActiveAirfields query error [' . $camp_link->error . ']');
	}

	if(!$result = $camp_link->query($query2)) {
		echo "$query2<br>\n";
		die('copyActiveAirfields query error [' . $camp_link->error . ']');
	}
?>

