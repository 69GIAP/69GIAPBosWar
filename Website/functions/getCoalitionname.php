<?php
// getCoalitionname.php
// given Coalition ID, get Coalition Name
// =69.GIAP=TUSHKA
// Nov 7, 2013
// BOSWAR version 1.0 

// define the function 
function get_coalitionname($CoalID) {
global $camp_link; // link to campaign db

	$query = "SELECT Coalitionname FROM rof_coalitions WHERE CoalID = '$CoalID';";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->Coalitionname);
		}
	} else {
		die('getCoalitionname query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
