<?php
// WHERE
// find closest named location and vaguely describe distance from it
// if $fieldonly is 1 check airfields only
// =69.GIAP=TUSHKA
// BOSWAR version 1.1
// Oct 19. 2013
function WHERE($x,$z,$fieldonly) {
   global $camp_link;  // link to campaign db
   global $Locs; // locations
   global $playername; // player name from PLID
   global $numlocs; // number of locations
   global $LID; // location ID
   global $LX; // location X coordinate
   global $LZ; // location Z coordinate
   global $LName; // location name
   global $where; // position in english

   // set starting conditions
   $mindist = 20001; // 20 km plus a meter
   $minname = "";
   $mintype = 0;
   $minfield = "";

   $query = "SELECT * FROM ".map_locations;
   // if no result report error  (could do this as an 'else' clause also)
   if(!$result = $camp_link->query($query)) {
      die('outputWHERE: error running a query [' . $camp_link->error . ']');
   }

// find closest location using brute force... only 660/743 locations to check.  :)
 // Tried to see if restricting calculations to a certain square helped any.
 // It didn't :)
   if ($fieldonly) {
      if ($result = mysqli_query($camp_link, $query)) {
         while ($obj = mysqli_fetch_object($result)) {
            $LID=($obj->LID);
            $LX	=($obj->LX);
            $LZ	=($obj->LZ);
            $LName =($obj->LName);

	    // check airfields only
            if (( $LID == "10" ) || ( $LID == "20" )) {
	       // check if this location is closer
               $distance = sqrt(pow($x -$LX,2) + pow($z - $LZ,2));
               if ( $mindist > $distance) {
                  $mintype = $LID;
                  $mindist = $distance;
                  $minname = $LName;
//                 echo "$mindist from $LName<br>\n";
	       }
	    }
         }
      }
   } else {
      if ($result = mysqli_query($camp_link, $query)) {
         while ($obj = mysqli_fetch_object($result)) {
            $LID=($obj->LID);
            $LX	=($obj->LX);
            $LZ	=($obj->LZ);
            $LName =($obj->LName);

	    // check if this location is closer
            $distance = sqrt(pow($x -$LX,2) + pow($z - $LZ,2));
            if ( $mindist > $distance) {
               $mintype = $LID;
               $mindist = $distance;
               $minname = $LName;
//               echo "$mindist from $LName<br>\n";
	    }
         }
      }
   }
   // free result set
   mysqli_free_result($result);

   //echo "$mindist from $minname<br>\n";
   // translate distances into appropriate but vague modifiers
   if ($mindist < 750) { $desc = "at"; }
   elseif ($mindist < 1500.0) { $desc = "next to"; }
   elseif ($mindist < 2500.0) { $desc = "near"; }
   elseif ($mindist < 5000.0) { $desc = "within sight of"; }
   elseif ($mindist < 10000.0) { $desc = "a good way from"; }
   elseif ($mindist < 20000.0) { $desc = "far from"; }
   else { $desc = "in the middle of nowhere"; }
   // if small airfield or regular airfield add airfield to location name
   if ( $mindist >= 20000.0 ) {
     $where = $desc;
   } elseif (( $mintype == "10" ) || ( $mintype == "20" )) {
     if (SHOWAF == 'true') { 
       $where = $desc . " " . $minname . " airfield";
     } else { // don't name the airfield
       $where = $desc . " " . "an undisclosed airfield";
     }
   } else {
     $where = $desc . " " . $minname;
   }
//   echo "$desc<br>";
}
?>
