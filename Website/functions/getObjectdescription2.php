<?php
// getObjectdescription2.php
// given Model, get object_desc 
// =69.GIAP=TUSHKA
// Dec 4, 2013
// BOSWAR version 1.1 

function get_objectdescription2($Model) {
global $camp_link; // link to campaign db

	$query = "SELECT object_desc FROM object_properties WHERE Model = '$Model';";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->object_desc);
		}
	} else {
		echo "$query<br .?\n";
		die('getObjectdescription2 query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
