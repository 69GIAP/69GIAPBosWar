<?php
// getCountriesFromMissionFile
// given mission file, update campaign rof_countries_file to match
// =69.GIAP=TUSHKA
// Oct 31, 2013
// version 0.1

// define the function 
function get_map_from_mission_file($path,$file) {
	global $camp_link; // link to campaign db

	// get the mission file as an array of lines
	$line = file("$path/$file");
	foreach ($line as $i => $value ) {
		// find the GuiMap line
		if (preg_match('/^  GuiMap/',$value)) {
			if (preg_match('/1918.info/',$value)) {
				$map = 'Western Front';	
			} elseif (preg_match('/channel_/',$value)) {
				$map = 'Channel';
			} elseif (preg_match('/^df3x3lake/',$value)) {
				$map = 'Lake';
			} elseif (preg_match('/^df5x5verdun/',$value)) {
				$map = 'Verdun';
			} elseif (preg_match('/^fis.info/',$value)) {
				$map = 'Island';
			}
			echo "\$map: $map<br />\n";
		}	
	}
/*
	// record the results for one country at a time
	$query = "UPDATE rof_countries SET CoalID = $coalid[$k] WHERE ckey = $ckey[$k]";
//	echo "$query<br />\n";
	if(!$result = mysqli_query($camp_link, $query)) {
		die('getMapFromMissionFile query error [' . $camp_link->error . ']');
	}
*/
}
?>
