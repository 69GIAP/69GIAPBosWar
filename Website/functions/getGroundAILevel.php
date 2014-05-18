<?php
// getGroundAILevel.php
// get ground_ai_level from campaign_settings
// =69.GIAP=TUSHKA
// Nov 22, 2013
// BOSWAR version 1.01
// May 16, 2014

function get_ground_ai_level() {
global $camp_link; // link to campaign db

	$query = "SELECT ground_ai_level FROM campaign_settings;";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->ground_ai_level);
		}
	} else {
		echo "$query<br />\n";
		die('getGroundAILevel query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
