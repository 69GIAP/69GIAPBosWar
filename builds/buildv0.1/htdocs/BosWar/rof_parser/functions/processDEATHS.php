<?php
function DEATHS($numplayers) {
// record player deaths
   global $Pline;  // lines that define players
   global $endticks; // time mission ended
   global $numkills; // number of kills
   global $Kline; //  lines that define kills
   global $TID; // target ID
   global $PID; // plane ID (whether bot or player)
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $POS; // position x,y,z
   global $objectname; // object name from PID/AID/TID
   global $Death; // dead players numbers
   global $Deathticks; // ticks when died
   global $Deathpos; // position where died

   // loop through players using $Pline index
   for ($i = 0; $i < $numplayers; ++$i) {
      $Death[$i] = "0";
      $j = $Pline[$i];
      $Deathticks[$i] = $endticks;
      // now loop through kills, looking for targetID match to playersID
      for($k = 0; $k < $numkills ; ++$k) {
         $l = $Kline[$k];
         // if TID matches PID, player is dead... record details
         // aha... PID is not unique!  Need to involve time.
         if (($TID[$l] == $PID[$j]) && ($Ticks[$l] >= $Ticks[$j]))         {
            $Death[$i] = "1";
            $Deathticks[$i] = $Ticks[$l];
            $Deathpos[$i] = $POS[$l];
         } 
      }
   }
}
?>
