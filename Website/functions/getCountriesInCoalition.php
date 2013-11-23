<?php
// getCountriesInCoalition
// given Coalition ID, get countries in it as an array
// =69.GIAP=TUSHKA
// Nov 23, 2013
// BOSWAR version 1.0 

function get_countries_in_coalition($CoalID) {
	global $camp_link; // link to campaign db

	$i =0;
	$query = "SELECT ckey FROM countries WHERE CoalID = '$CoalID'";
	if($result = $camp_link->query($query)) {
		while ($country = $result->fetch_array()) {
				$countries[$i] = $country[0];
				++$i;
		}
		return($countries);
	} else {
		echo "$query<br />\n";
		die('getCountriesInCoalition query error [' . $camp_link->error . ']');
	}
	$result->free();
}
?>
