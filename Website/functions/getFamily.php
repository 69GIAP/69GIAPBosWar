<?php
// getFamily.php
// given Model, get family from object_properties
// =69.GIAP=TUSHKA
// Dec 4, 2013
// BOSWAR version 1.01
// May 16, 2014

function get_family($Model) {
global $camp_link; // link to campaign db

	$query = "SELECT family FROM object_properties WHERE Model = '$Model';";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->family);
		}
	} else {
		echo "$query<br />\n";
		die('getFamily query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
