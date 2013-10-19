<?php
// WHOSEGUNNER
// given gunner id, find pilot player name
// =69.GIAP=TUSHKA
// 2011-2013
// BOSWAR version 1.1
// Oct 19, 2013
function WHOSEGUNNER($gunnerid) { // input is plid of a gunner
   global $ID; // object ID
   global $PID; // plane ID (whether bot or player)
   global $PLID; // player plane id 
   global $NAME; // player profile name
   global $numgobjects; // number of game objects involved
   global $GOline; // lines defining game objects
   global $numplayers; // number of players
   global $Pline;  // lines that define players
   global $Whosegunner; // player piloting this gunner
   
   $pid = 0;
   $Whosegunner = "";
   for ($i = 0; $i < $numgobjects; ++$i) {
      $j = $GOline[$i];
      if ($gunnerid == $ID[$j]) { // found match
         if ($PID[$j] == "-1" ) { // certainly not a gunner
	    $Whosegunner = '';
	 } else { // might be a gunner
            $pid = $PID[$j]; // save game object pid (which is pilot's plid)
            for ($k = 0; $k < $numplayers; ++$k) {
               $l = $Pline[$k];
               if ($pid == $PLID[$l]) {
                  $Whosegunner = "$NAME[$l]";
	       }
            }
         } 
      }
   }
//  echo "WHOSEGUNNER: ID=$id, PID = $pid whosegunner = $Whosegunner<br>\n";
}
?>
