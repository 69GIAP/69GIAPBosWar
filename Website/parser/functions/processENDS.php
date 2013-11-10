<?php
function ENDS($numplayers) {
// record player mission end events (where available)
   global $Pline;  // lines that define players
   global $numends; // number of mission ends
   global $Eline; // lines that define mission ends
   global $PLID; // player plane id 
   global $BUL; // # of bullets
   global $BOMB; // # of bombs
   global $End; // player ended (or not)
   global $EndBUL; // unexpended bullets
   global $EndBOMB; // undropped bombs

   // loop through players
   for ($i = 0; $i < $numplayers; ++$i) {
      $End[$i] = "0";
      $EndBUL[$i] = "0";
      $EndBOMB[$i] = "0";
      $j = $Pline[$i];
      // loop through ends
      for ($k = 0; $k < $numends; ++$k) {
         $l = $Eline[$k];
         if ( $PLID[$j] == $PLID[$l] ) {
            $End[$i] = "1";
            $EndBUL[$i] = $BUL[$l];
            $EndBOMB[$i] = $BOMB[$l];
         }
      }
      if ("$End[$i]" == "0") {
         $EndBUL[$i] = $BUL[$j]; 
         $EndBOMB[$i] = $BOMB[$j];
      }  
   }
}
?>
