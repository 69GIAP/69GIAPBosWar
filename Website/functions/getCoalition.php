<?php
// getCoalition
// given country key #, get current Coalition ID
// =69.GIAP=TUSHKA
// Oct 22, 2013
// revised Nov 8, 2013
// version 1.3 

// define the function 
function get_coalition($ckey) {
global $camp_link; // link to campaign db

	$coalquery = "SELECT CoalID FROM rof_countries WHERE ckey = '$ckey'";
	if($coalresult = $camp_link->query($coalquery)) {
		while ($coalobj = $coalresult->fetch_object()) {
			return($coalobj->CoalID);
		}
	} else {
		die('getCoalition query error [' . $camp_link->error . ']');
	}
		// free result set
	$coalresult->free();
}
?>
