<?php
// getAbbrv.php
// get campaign's abbreviation
// =69.GIAP=TUSHKA
// Nov 11, 2014
// BOSWAR version 1.0

function get_abbrv() {
	global $camp_link;

	$query = "SELECT abbrv FROM campaign_settings;";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->abbrv);
		}
	} else {
		echo "$query<br />\n";
		die('getAbbrv query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
