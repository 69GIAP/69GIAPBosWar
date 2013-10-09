<?php
// TRAINS
// translate railroad object type into more natural description
// BOSWAR version 1.0
// Oct 9, 2013
function TRAINS($type) {
   global $objectdesc; // object description

   if ($type == "G8") { $objectdesc = "locomotive"; } 
   elseif ($type == "Wagon_G8T") { $objectdesc = "tender"; } 
   elseif ($type == "Wagon_BoxB") { $objectdesc = "boxcar"; }
   elseif ($type == "Wagon_BoxNB") { $objectdesc = "boxcar"; }
   elseif ($type == "Wagon_GondolaB") { $objectdesc = "loaded gondola"; }
   elseif ($type == "Wagon_GondolaNB") { $objectdesc = "loaded gondola"; } 
   elseif ($type == "Wagon_Pass") { $objectdesc = "passenger railcar"; }
   elseif ($type == "Wagon_PassA") { $objectdesc = "hospital railcar"; }
   elseif ($type == "Wagon_PassAC") { $objectdesc = "hospital railcar"; }
   elseif ($type == "Wagon_PassC") { $objectdesc = "passenger railcar"; }
   elseif ($type == "Wagon_PlatformA7V") { $objectdesc = "loaded flatcar"; }
   elseif ($type == "Wagon_PlatformB") { $objectdesc = "loaded flatcar"; }
   elseif ($type == "Wagon_PlatformEmptyB") { $objectdesc = "empty flatcar"; } 
   elseif ($type == "Wagon_PlatformEmptyNB") { $objectdesc = "empty flatcar"; } 
   elseif ($type == "Wagon_PlatformMk4") { $objectdesc = "loaded flatcar"; }
   elseif ($type == "Wagon_PlatformNB") { $objectdesc = "loaded flatcar"; }
   elseif ($type == "Wagon_TankB") { $objectdesc = "tank railcar"; }
   elseif ($type == "Wagon_TankNB") { $objectdesc = "tank railcar"; }
   else { $objectdesc = "unexpected railcar type $type<br>"; }
}
?>
