<?php
function WHOSEGUNNER($id) {
// no longer used?
// given gunner id, find pilot player name
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
      if ($id == $ID[$j]) {
         $pid = $PID[$j];
         for ($k = 0; $k < $numplayers; ++$k) {
            $l = $Pline[$k];
            if ($pid == $PLID[$l]) {
               $Whosegunner = "$NAME[$l]";
            }
         } 
      }
   }
   if ($Whosegunner == "")
      {
         $Whosegunner = "an unpiloted plane's AI";
      }
//  echo "WHOSEGUNNER: ID=$id, PID = $pid whosegunner = $Whosegunner<br>\n";
}
?>
