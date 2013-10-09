<?php
// SHIPS
// translate ship type into more natural description
// BOSWAR version 1.2
// Oct 9, 2013
function SHIPS($type) {
   global $objectdesc; // object description

   if ($type == "ship_stat_pass") { $objectdesc = "stationary passenger ship"; } 
   elseif ($type == "ship_stat_tank") { $objectdesc = "stationary tanker ship"; } 
   elseif ($type == "ship_stat_cargo") { $objectdesc = "stationary cargo ship"; } 
   elseif ($type == "Cargo Ship") { $objectdesc = "cargo ship"; }
   elseif ($type == "Passenger Ship") { $objectdesc = "passenger ship"; }
   elseif ($type == "Tanker Ship") { $objectdesc = "tanker ship"; }
   elseif ($type == "HMS submarine") { $objectdesc = "submarine"; }
   elseif ($type == "GER submarine") { $objectdesc = "submarine"; } 
   elseif ($type == "HMS light cruiser") { $objectdesc = "light cruiser"; }
   elseif ($type == "GER light cruiser") { $objectdesc = "light cruiser"; }
   elseif ($type == "FRpenicheAAA") { $objectdesc = "peniche AAA barge";}
   elseif ($type == "GERpenicheAAA") { $objectdesc = "peniche AAA barge";}
   else { $objectdesc = "unexpected ship type $type<br>"; }
}
?>
