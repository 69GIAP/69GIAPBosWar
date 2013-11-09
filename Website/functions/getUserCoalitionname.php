<?php
// getUsercoalitionname.php
// given Coalition ID, get Coalition Name from boswar_db
// adapted from getCoalitionname.php
// To be used only in boswar_db setting
// =69.GIAP=MYATA
// Nov 7, 2013
// BOSWAR version 1.0 

// define the function 
function get_usercoalitionname($CoalID) {
global $dbc; // link to boswar_db

	$query = "SELECT Coalitionname 
				FROM rof_coalitions 
				WHERE CoalID = '$CoalID';";
	if($result = $dbc->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->Coalitionname);
		}
	} else {
		die('getCoalitionname query error [' . $dbc->error . ']');
	}
		// free result set
	$result->free();
}
?>
