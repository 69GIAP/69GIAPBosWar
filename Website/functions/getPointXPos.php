<?php
// getPointXPos.php
// given point ID, get point XPox
// =69.GIAP=TUSHKA
// Nov 21, 2013
// BOSWAR version 1.01 
// May 16, 2014

function get_pointxpos($id) {
global $camp_link; // link to campaign db

	$query = "SELECT XPos FROM key_points WHERE id = '$id';";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->XPos);
		}
	} else {
		echo "$query<br />\n";
		die('getPointXPos query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
