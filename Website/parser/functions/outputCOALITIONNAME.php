<?php
// COALITIONNAME
// give coalition ID get coalition name
// =69.GIAP=TUSHKA
// Nov 12, 2013
// Now redundant!  Could use functions/getCoalitionname.php

function COALITIONNAME($CoalID) {
// look up coalition name from Coalition ID#
	global $camp_link;  // link to campaign db

	$query = "SELECT Coalitionname FROM coalitions WHERE CoalID = '$CoalID';";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->Coalitionname);
		}
	} else {
		die('COALITIONNAME query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
