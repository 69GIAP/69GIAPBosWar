<?php
function WOUNDS($numplayers) {
// record damage to surviving players
   global $endticks; // time mission ended
   global $Pline;  // lines that define players
   global $numdamage; // number of damage events
   global $Dline;  // lines that define damage events
   global $TID; // target ID
   global $PID; // plane ID (whether bot or player)
   global $Ticks; // time since start of mission in 1/50 sec ticks - begins each log line
   global $POS; // position x,y,z
   global $DMG; // damage
   global $objectname; // object name from PID/AID/TID
   global $Wound; // array holding severity of wound
   global $Woundticks; // ticks when last wounded
   global $Woundpos; // position where last wounded

   // loop through players using $Pline index
//   echo "WOUNDS: (out of $numdamage lines)<br>\n";
   for ($i = 0; $i < $numplayers; ++$i) {
      $Wound[$i] = "0";
      $Woundticks[$i] = $endticks;
      $j = $Pline[$i];
      // now loop through damage, looking for targetID match to playersID
      for($k = 0; $k < $numdamage ; ++$k) {
         $l = $Dline[$k];
         // if TID matches PID, player is wounded... record details
         if ($TID[$l] == $PID[$j]) {
            $Wound[$i] = $Wound[$i] + $DMG[$l];
            $Woundticks[$i] = $Ticks[$l];
            $Woundpos[$i] = $POS[$l];
         } 
      }
//      echo "Player $i total wounds = $Wound[$i]<br>\n";
   }
}
?>
