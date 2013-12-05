<?php
// getObjectdescription.php
// given object_type, get object_desc 
// =69.GIAP=TUSHKA
// Nov 21, 2013
// BOSWAR version 1.1 
// Dec 4, 2013

function get_objectdescription($object_type) {
global $camp_link; // link to campaign db

	$query = "SELECT object_desc FROM object_properties WHERE object_type = '$object_type';";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->object_desc);
		}
	} else {
		echo "$query<br .?\n";
		die('getObjectdescription query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
