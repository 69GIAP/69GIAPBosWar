<?php
function FLYING($pid,$ticks) {
// determine whether a plane has taken off, etc
   global $numtakeoffs; // number of takeoffs
   global $Tline;  // takeoff lines
   global $PID; // plane ID (whether bot or player)
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $numlandings; // number of landings
   global $Lline;  // landing lines
   global $flying;  // on ground, flying, crashing, or already landed/crashed
   
   $flying = 0; // 0 hasn't moved, 1 flying, 2 crashing, 3 already landed/crashed
   // if plane hasn't taken off yet, or has already landed, it isn't flying
   // loop through takeoffs
   for ($i = 0; $i < $numtakeoffs; ++$i) {
      $j = $Tline[$i]; 
      if (($PID[$j] == $pid) && ($Ticks[$j] < $ticks)) { // plane has already taken off
         // loop through landings
         for ($k = 0; $k < $numlandings; ++$k) {
            $l = $Lline[$k];
            if (($PID[$j] == $pid) && ($Ticks[$j] > $ticks)) { // still in air
               $flying = 1;
            } elseif (($PID[$j] == $pid) && ($Ticks[$j] == $ticks)) { // landing/crashing
               $flying = 2;
            } elseif (($PID[$j] == $pid) && ($Ticks[$j] < $ticks)) { // landed/crashed
               $flying = 3;
            }
         } 
      }
   } 
//   echo "FLYING: $flying<br>\n";
// This only works for player pilots, not AI (takeoffs not recorded in log).
}
?>
