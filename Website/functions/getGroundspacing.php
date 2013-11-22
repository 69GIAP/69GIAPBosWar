<?php
// getGroundspacing.php
// get ground_spacing from campaign_settings
// =69.GIAP=TUSHKA
// Nov 22, 2013
// BOSWAR version 1.0 

function get_groundspacing() {
global $camp_link; // link to campaign db

	$query = "SELECT ground_spacing FROM campaign_settings;";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->ground_spacing);
		}
	} else {
		echo "$query<br .?\n";
		die('getGroundspacing query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
