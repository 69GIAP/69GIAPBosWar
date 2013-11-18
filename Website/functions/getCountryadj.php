<?php
// getCountryname.php
// given country ID, get adjective form of Country Name
// =69.GIAP=TUSHKA
// Nov 17, 2013
// BOSWAR version 1.0 

function get_countryadj($ckey) {
global $camp_link; // link to campaign db

	$query = "SELECT countryadj FROM countries WHERE ckey = '$ckey';";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->countryadj);
		}
	} else {
		echo "$query<br .?\n";
		die('getCountryadj query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
