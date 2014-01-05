<?php
// getAirAILevel.php
// get ground_ai_level from campaign_settings
// =69.GIAP=STENKA
// Jan 1, 2014
// BOSWAR version 1.0 

function get_ground_ai_level() {
global $camp_link; // link to campaign db

	$query = "SELECT air_ai_level FROM campaign_settings;";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->air_ai_level);
		}
	} else {
		echo "$query<br .?\n";
		die('getAirAILevel query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
