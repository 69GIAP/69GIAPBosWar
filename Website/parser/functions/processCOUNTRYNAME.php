<?php
// COUNTRYNAME
// look up country name from country ID
// and also report the adjective form
// =69.GIAP=TUSHKA
// 2011-2013
// BOSWAR version 1.1
// Nov 12, 2013

function COUNTRYNAME($ckey) {
	global $camp_link;  // link to campaign db
	global $countryname; // country name
	global $countryadj;  // adjective form of country name  
   
	$countryname = "";
	$countrynadj = "";
	$query = "SELECT * FROM countries WHERE ckey = '$ckey'";
	// if no result report error  (could do this as an 'else' clause also)
	if(!$result = $camp_link->query($query)) {
		echo "$query<br />\n";
		die('COUNTRYNAME query error:[' . $camp_link->error . ']'); }
	if ($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			$countryname	=	$obj->countryname;
			$countryadj		=	$obj->countryadj;
		}
		$result->free();
	}

//   echo "ckey = $ckey, countryname = $countryname, countryadj = $countryadj<br>\n";
}
?>
