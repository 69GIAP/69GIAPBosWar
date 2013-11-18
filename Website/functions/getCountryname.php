<?php
// getCountryadj.php
// given country ID, get Country Name
// =69.GIAP=TUSHKA
// Nov 17, 2013
// BOSWAR version 1.0 

function get_countryname($ckey) {
global $camp_link; // link to campaign db

	$query = "SELECT countryname FROM countries WHERE ckey = '$ckey';";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->countryname);
		}
	} else {
		echo "$query<br .?\n";
		die('getCountryname query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
