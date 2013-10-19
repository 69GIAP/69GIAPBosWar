<?php
function OBJECTNAME ($id,$ticks) {
// given ID, find an object's name
   global $numlines; // number of log lines
   global $AType; // category of information contained in this line
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $ID; // object ID
   global $NAME; // player profile name
   global $TYPE; // type object in this context
   global $objectname; // object name from PID/AID/TID
   global $numgobjects; // number of game objects involved
   global $GOline; // lines defining game objects
   
   // T:36590 AType:12 ID:223250 TYPE:Albatros D.III COUNTRY:501 NAME:Plane PID:-1^M
   $found = "0";
   $objectname = "";
   if ( $id == "-1") {
      $objectname = "Intrinsic";
      $found = "1";
   }
   else { 
      for ($i = 0; $i < $numgobjects; ++$i) {
         $j = $GOline[$i];
         if (("$AType[$j]" == "12") && ("$ID[$j]" == "$id") && ($Ticks[$j] <= $ticks)) {
            $objectname = "$NAME[$j]";
            $found = "1";
            if ($NAME[$j] == "") { 
               $objectname = "$TYPE[$j]";
//               echo "OBJECTNAME: blank NAME, objectname = $objectname<br>\n";
            }
//            echo "OBJECTNAME: id = $id, Ticks[$j] = $Ticks[$j], ticks = $ticks, NAME = $NAME[$j], objectname = $objectname, found = $found<br>\n";
         }
      }
   }
   if (!$found) {
      $objectname = "";
   }
}
?>
