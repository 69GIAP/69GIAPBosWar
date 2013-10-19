<?php
function CRASHED($pid,$ticks) {
// determine if a player's plane has crashed by a given time
   global $numkills; // number of kills
   global $Kline; //  lines that define kills
   global $TID; // target ID
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $crashed; // player's plane has crashed, true or false

   $crashed = 0;
   for ($i = 0; $i < $numkills; ++$i) {
      $j = $Kline[$i];
      // if kill TID matches pid and time is at or after crash plane is crashed/destroyed at this time
//      echo "pid = $pid, ticks = $ticks, TID = $TID[$j], Ticks[$j] = $Ticks[$j]<br>\n";
      if (($TID[$j] == $pid) && ($ticks >= ($Ticks[$j] - 50))) { // 1 sec fudge-factor
         $crashed = 1;
      }
   }
//   echo "pid = $pid, ticks = $ticks, crashed = $crashed<br>\n";
}
?>
