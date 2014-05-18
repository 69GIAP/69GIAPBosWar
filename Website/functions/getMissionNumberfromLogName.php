<?php
// getMissionNumberfromLogName.php
// given mission log filename, get Mission Number
// =69.GIAP=TUSHKA
// May 16, 2014
// BOSWAR version 1.0 

function get_missionnumberfromlogname($logfilename) {
global $camp_link; // link to campaign db

	$query = "SELECT mission_number FROM campaign_missions WHERE mission_log = '$logfilename';";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->mission_number);
		}
	} else {
		echo "$query<br />\n";
		die('getMissionNumberfromLogName query error [' . $camp_link->error . ']');
	}
		// free result set
	$result->free();
}
?>
