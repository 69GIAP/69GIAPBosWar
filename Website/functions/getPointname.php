<?php
// getPointname.php
// given point ID, get point Name
// =69.GIAP=TUSHKA
// Nov 21, 2013
// BOSWAR version 1.0 

function get_pointname($id) {
global $camp_link; // link to campaign db

	$query = "SELECT pointName FROM key_points WHERE id = '$id';";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->pointName);
		}
	} else {
		echo "$query<br .?\n";
		die('getPointname query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
