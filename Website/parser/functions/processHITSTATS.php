<?php
function HITSTATS($numplayers) {
// record hit statistics for each player
// note that turrets are recorded separately from player-pilots
   global $Pline;  // lines that define players
   global $BUL; // # of bullets
   global $BOMB; // # of bombs
   global $numhits; // number of hits
   global $Hline; // lines that define hits
   global $EndBUL; // unexpended bullets
   global $EndBOMB; // undropped bombs
   global $ShotBUL; // shot bullets
   global $DroppedBOMB; // dropped bombs
   global $HitBOMB; // bomb hits
   global $HitBUL; // bullet hits
   global $PLID; // player plane id 
   global $AID; // attacker ID in this context
   global $AMMO; // what hit

//   echo "HITSTATS:<br>\n";
   // loop through players
   for ($i = 0; $i < $numplayers; ++$i) {
      // work out how many bullets and bombs were expended
      $HitBOMB[$i] = 0;
      $HitBUL[$i] = 0;
      $j = $Pline[$i];
      $ShotBUL[$i] = $BUL[$j] - $EndBUL[$i];
      $DroppedBOMB[$i] = $BOMB[$j] - $EndBOMB[$i];
      // now total hits from bombs if any were carried.
      if ($BOMB[$j]) {
         // loop through hits, looking for explosions
         for ($k = 0; $k < $numhits; ++$k) {
            $l = $Hline[$k];
            if (($PLID[$j] == $AID[$l]) && ($AMMO[$l] == "explosion")) {
               ++$HitBOMB[$i];
            }
         }
         // avoid accuracy > 100%
         if ($HitBOMB[$i] > $DroppedBOMB[$i]) {
            $HitBOMB[$i] = $DroppedBOMB[$i];
         }
      }
      // loop through hits again (for all players this time), looking for BULLET hits
      for ($k = 0; $k < $numhits; ++$k) {
         $l = $Hline[$k];
         // look for bullet hits as attacker
         if (($PLID[$j] == $AID[$l]) && (substr($AMMO[$l],0,6) == "BULLET")) {
            ++$HitBUL[$i];
         }
      }
      // avoid accuracy > 100%
      if ($HitBUL[$i] > $ShotBUL[$i]) {
         $HitBUL[$i] = $ShotBUL[$i];
      }
   }
}
?>
