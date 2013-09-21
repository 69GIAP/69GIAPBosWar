<?php
function COALITION($ckey) {
// look up coalitionID from country ID#
   global $CoCoal; // array of coalition names
   global $COUNTRY; // country ID
   global $CoalID; // coalition ID

   $CoalID = "";
   asort ($CoCoal);
   while (list ($key, $val) = each ($CoCoal)) {
      if ($ckey == $key) {
         $CoalID = $val;
      }
   }
}
?>
