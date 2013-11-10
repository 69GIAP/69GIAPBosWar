<?php
// getMinCountry
// given Coalition ID #, get minimum Country ID assigned to the coalition
// =69.GIAP=MYATA
// Nov 10, 2013
// version 1.0 

// define the function 
function get_mincountry($coalID) {
global $camp_link; // link to campaign db

	$ckeyquery = "SELECT MIN(ckey) AS ckey 
				FROM rof_countries
				WHERE CoalID = '$coalID'";
				
	if($ckeyresult = $camp_link->query($ckeyquery)) {
		while ($ckeyobj = $ckeyresult->fetch_object()) {
			return($ckeyobj->ckey);
		}
	} else {
		die('getMinCountry query error [' . $camp_link->error . ']');
	}
		// free result set
	$ckeyresult->free();
}
?>
