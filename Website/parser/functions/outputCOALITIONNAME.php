<?php
function COALITIONNAME($CoalID) {
// look up coalition name from Coalition ID#
   global $camp_link;  // link to campaign db
   global $Coalitions; // array of coalition names
   global $Coalitionname; // this coalition name 

   $query = "SELECT * FROM rof_coalitions WHERE CoalID = '$CoalID'";
   // if no result report error  (could do this as an 'else' clause also)
   if(!$result = $camp_link->query($query)) {
      die('There was an error running the query [' . $camp_link->error . ']'); }
   if ($result = mysqli_query($camp_link, $query)) {
      while ($obj = mysqli_fetch_object($result)) {
         $Coalitionname	=($obj->Coalitionname);
      }
      // free result set
      mysqli_free_result($result);
   }
}
?>
