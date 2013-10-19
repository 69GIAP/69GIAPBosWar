<?php
function COUNTRYNAME($ckey) {
// look up country name from ID#
// and also report the adjective form
   global $camp_link;  // link to campaign db
   global $countryname; // country name
   global $countryadj;  // adjective form of country name  
   
   $countryname = "";
   $countrynadj = "";
   $query = "SELECT * FROM rof_countries WHERE ckey = '$ckey'";
   // if no result report error  (could do this as an 'else' clause also)
   if(!$result = $camp_link->query($query)) {
      die('There was an error running the query [' . $camp_link->error . ']'); }
   if ($result = mysqli_query($camp_link, $query)) {
      while ($obj = mysqli_fetch_object($result)) {
         $countryname	=($obj->countryname);
         $countryadj	=($obj->countryadj);
      }
      // free result set
      mysqli_free_result($result);
   }

//   echo "ckey = $ckey, countryname = $countryname, countryadj = $countryadj<br>\n";
}
?>
