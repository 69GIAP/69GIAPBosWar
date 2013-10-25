<?php
// getCountriesFromMissionFile
// given mission file, update campaign rof_countries_file to match
// =69.GIAP=TUSHKA
// Oct 24, 2013
// version 1.0

// define the function 
function get_countries_from_mission_file($path,$file) {
   global $camp_link; // link to campaign db

   $line = file("$path/$file");
   foreach ($line as $i => $value ) {
	if (preg_match('/^  Countries/',$value)) {
		$cline = $i;
	}
   }
   $k = 0;
   for ($j = $cline+2; $j < $cline+15; $j++) {
	$part = explode(' : ',$line[$j]);
	$ckey[$k] = $part[0];
	$coalid[$k] = substr($part[1],0,1);
	$query = "UPDATE rof_countries SET CoalID = $coalid[$k] WHERE ckey = $ckey[$k]";
//	echo "$query<br />\n";
	if(!$result = mysqli_query($camp_link, $query)) {
	   die('getCountriesFromMissionFile query error [' . $camp_link->error . ']');
	}
	$k++;	 
   }
}
?>
