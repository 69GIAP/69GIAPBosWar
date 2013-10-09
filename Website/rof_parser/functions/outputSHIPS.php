<?php
// SHIPS
// translate ship type into more natural description
// BOSWAR version 1.0
// Oct 6, 2013
function SHIPS($type) {
   global $targetdesc; // target description

   if ($type == "ship_stat_pass") { $targetdesc = "stationary passenger ship"; } 
   elseif ($type == "ship_stat_tank") { $targetdesc = "stationary tanker ship"; } 
   elseif ($type == "ship_stat_cargo") { $targetdesc = "stationary cargo ship"; } 
   elseif ($type == "Cargo Ship") { $targetdesc = "cargo ship"; }
   elseif ($type == "Passenger Ship") { $targetdesc = "passenger ship"; }
   elseif ($type == "Tanker Ship") { $targetdesc = "tanker ship"; }
   elseif ($type == "HMS submarine") { $targetdesc = "submarine"; }
   elseif ($type == "GER submarine") { $targetdesc = "submarine"; } 
   elseif ($type == "HMS cruiser") { $targetdesc = "cruiser"; }
   elseif ($type == "GER cruiser") { $targetdesc = "cruiser"; }
   elseif ($type == "GER light cruiser") { $targetdesc = "light cruiser"; }
   elseif ($type == "frpenicheaaa") { $targetdesc = "peniche AAA barge";}
   elseif ($type == "gerpenicheaaa") { $targetdesc = "peniche AAA barge";}
   else { $targetdesc = "unexpected ship type $type<br>"; }

}
?>
