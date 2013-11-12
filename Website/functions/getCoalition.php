<?php
// getCoalition
// given country key #, get current Coalition ID
// =69.GIAP=TUSHKA
// Oct 22, 2013
// revised Nov 11, 2013
// version 1.4 

function get_coalition($ckey) {
	global $camp_link; // link to campaign db

	$query = "SELECT CoalID FROM countries WHERE ckey = '$ckey'";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->CoalID);
		}
	} else {
		echo "$query<br />\n";
		die('getCoalition query error [' . $camp_link->error . ']');
	}
	$result->free();
}
?>
