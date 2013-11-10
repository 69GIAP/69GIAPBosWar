<?php
function DEAD($pid,$ticks) {
// determine if a player is dead at a given time
   global $Death; // dead players numbers
   global $Deathticks; // ticks when died
   global $numplayers; // number of players
   global $numgobjects; // number of gameobjects
   global $Pline;  // lines that define players
   global $GOline; // lines defining game objects
   global $PID; // plane ID (whether bot or player)
   global $PLID; // player plane id 
   global $ID; // object ID
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $dead; // true or false

   $dead = 0;
   for ($i = 0; $i < $numgobjects; ++$i) {
      $j = $GOline[$i];
      for ($k = 0; $k < $numplayers; ++$k) {
         $l = $Pline[$k];
         if ($ID[$j] == $pid) { // if object ID matches plane ID
            // if playerplane ID matches plane ID and time is at or after death
            // player is dead at this time
            if (($PLID[$l] == $pid) && ($Deathticks[$k] == 0 )) {
               $dead = 0;
            } elseif (($PLID[$l] == $pid) && ($ticks >= $Deathticks[$k])) {
//            echo "pid = $pid, ticks = $ticks, dead = $dead, ID[$j] = $ID[$j], PLID[$l] = $PLID[$l], deathticks = $Deathticks[$k]<br>\n";
               $dead = 1;
            }
         }
      }
   }
//   echo "pid = $pid, ticks = $ticks, dead = $dead<br>\n";
}
?>
