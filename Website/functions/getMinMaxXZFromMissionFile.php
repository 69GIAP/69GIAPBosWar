<?php
// getMinMaxXZFromMissionFile
// given mission file, update campaign min, max X and Z to match
// =69.GIAP=TUSHKA
// Oct 25, 2013
// version 1.0

// define the function 
function get_minmaxxz_from_mission_file($path,$file) {
   global $camp_link; // link to campaign db
   // initialize variables with improbable values
   $min_x = 10000000;
   $min_z = 10000000;
   $max_x = -10000000;
   $max_z = -10000000;
   // get the mission file as an array of lines
   $line = file("$path/$file");
   $boundarycount = 0;
   foreach ($line as $i => $value ) {
      // find Boundary (should be two or more)
      if (preg_match('/^  Boundary/',$value)) {
         $bline = $i;
	 $boundarycount++;
//	 echo "\$bline = $bline, \$boundarycount = $boundarycount<br />\n";
	 for ($j = $bline+2; ; $j++) {
   	    // we don't know how many boundary points there will be, so
	    // stop the for loop when come to end of Boundary definition
	    if (preg_match('/^  }/',$line[$j])) {
	       break; 
	    }
	    $part = explode(', ',$line[$j]);
	    $x = $part[0];
	    // trim off semicolon and EOL
	    $z = rtrim($part[1],"\x3B\r\n");
//	    echo "\$x = $x, \$z = $z<br \>\n";
	    if ($x < $min_x) { $min_x = $x; }
	    if ($z < $min_z) { $min_z = $z; }
	    if ($x > $max_x) { $max_x = $x; }
	    if ($z > $max_z) { $max_z = $z; }
//	    echo "\$min_x:$min_x \$min_z:$min_z \$max_x:$max_x \$max_z:$max_z<br />\n"; 
	 }
//	 echo "\$min_x:$min_x \$min_z:$min_z \$max_x:$max_x \$max_z:$max_z<br />\n"; 
      }
   }
//   echo "\$boundarycount: $boundarycount<br />\n";
   if ($boundarycount == 0) { 
      echo "<b><font color=\"red\">getMinMaxXZFromMissionFile reports error: $file has no Influence Areas defined.</font></b><br />\n"; 
      return;
   }
// record the results in the campaign_settings table
   $query = "UPDATE campaign_settings SET min_x=$min_x, min_z=$min_z, max_x=$max_x, max_z=$max_z;";
//   echo "$query<br />\n";
   if(!$result = mysqli_query($camp_link, $query)) {
      die('getMinMaxXZFromMissionFile query error [' . $camp_link->error . ']');
   }
}
?>
