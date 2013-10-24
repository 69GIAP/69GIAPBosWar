<?php
// getCoalition
// given country key #, get current Coalition ID
// =69.GIAP=TUSHKA
// Oct 22, 2013
// revised Oct 24, 2013
// version 1.1 

// define the function 
function get_coalition($ckey) {
global $camp_link; // link to campaign db

   $query = "SELECT CoalID FROM rof_countries WHERE ckey = '$ckey'";
   if($result = mysqli_query($camp_link, $query)) {
      while ($obj = mysqli_fetch_object($result)) {
	 return($obj->CoalID);
      }
   } else {
      die('getCoalition query error [' . $camp_link->error . ']');
   }
   // free result set
   mysqli_free_result($result);
}
?>
