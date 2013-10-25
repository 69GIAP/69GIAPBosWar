<?php
// getCountriesFromMissionFile
// given mission file, update campaign rof_countries_file to match
// =69.GIAP=TUSHKA
// Oct 24, 2013
// revised Oct 25, 2013
// version 1.2

// define the function 
function get_countries_from_mission_file($path,$file) {
   global $camp_link; // link to campaign db

   // get the mission file as an array of lines
   $line = file("$path/$file");
   foreach ($line as $i => $value ) {
	// find the beginning of Countries section
	if (preg_match('/^  Countries/',$value)) {
		$cline = $i;
	}
   }
   $k = 0;
   for ($j = $cline+2; ; $j++) {
 	// stop the for loop when come to end of Countries section
	if (preg_match('/^  }/',$line[$j])) {
	   break; 
	}
	$part = explode(' : ',$line[$j]);
	$ckey[$k] = $part[0];
	// trim off semicolon and EOL
	$coalid[$k] = rtrim($part[1],"\x3B\r\n");
	// record the results for one country at a time
	$query = "UPDATE rof_countries SET CoalID = $coalid[$k] WHERE ckey = $ckey[$k]";
//	echo "$query<br />\n";
	if(!$result = mysqli_query($camp_link, $query)) {
	   die('getCountriesFromMissionFile query error [' . $camp_link->error . ']');
	}
	$k++;	 
   }
}
?>
