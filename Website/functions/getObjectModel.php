<?php
// getObjectModel.php
// given object_type, get Model 
// =69.GIAP=STENKA
// Nov 21, 2013
// BOSWAR version 1.1 
// 14/5/14

function get_objectModel($object_type) {
global $camp_link; // link to campaign db

	$query = "SELECT Model FROM object_properties WHERE object_type = '$object_type';";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->Model);
		}
	} else {
		echo "$query<br .?\n";
		die('getObjectModel query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
