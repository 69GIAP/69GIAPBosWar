<?php
// getTransportSpeed.php
// get ground transport speed from campaign_settings
// =69.GIAP=TUSHKA
// Nov 17, 2013
// BOSWAR version 1.0 

function get_transportspeed() {
global $camp_link; // link to campaign db

	$query = "SELECT ground_transport_speed_kmh FROM campaign_settings;";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->ground_transport_speed_kmh);
		}
	} else {
		echo "$query<br .?\n";
		die('getTransportSpeed query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
