<?php
// COALITION
// =69.GIAP=TUSHKA
// BOSWAR version 1.0
// Oct 3, 2013
// perhaps I should convert this to db lookup at some point
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
