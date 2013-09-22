<?php
function OBJECTTYPE ($id,$ticks) {
// get object TYPE from ID
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $ID; // object ID
   global $TYPE; // type of object in this context
   global $objecttype; // object type from PID/AID/TID
   global $numgobjects; // number of game objects involved
   global $GOline; // lines defining game objects
   
   // T:36590 AType:12 ID:223250 TYPE:Albatros D.III COUNTRY:501 NAME:Plane PID:-1^M
   $objecttype = "";
   $found = "0";
   for ($i = 0; $i < $numgobjects; ++$i) {
      $j = $GOline[$i];
      if (("$ID[$j]" == "$id") && ($Ticks[$j] <= $ticks)) {
         $objecttype = $TYPE[$j];
         $found = "1";
      }
   }
   if ( $id == "-1") {
      $objecttype = "Intrinsic";
   } elseif (!$found) {
      $objecttype = "Uknown Object";
   }
}

?>
