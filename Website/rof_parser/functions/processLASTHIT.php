<?php
function LASTHIT($numhits) {
// track last game object/player to hit another game object
// this is used to attribute delayed kills from engine damage, fire, etc.
// in the future consider expanding this to record assists
   global $Hline; // lines that define hits
   global $numgobjects; // number of game objects involved
   global $GOline; // lines defining game objects
   global $ID; // object ID
   global $TID; // target ID
   global $AID; // attacker ID in this context
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $TYPE; // gameobject type in this context
   global $objecttype; // object type from PID/AID/TID
   global $playername; // player name from PLID
   global $Lasthitbyid; // ID of last attacker to hit player
   global $Lasthitby; // name or type of last attacker to hit player
   global $Killticks; // ticks when killed
   
//   echo "LASTHIT<br>\n";
   // loop through gameobjects 
   for ($i = 0; $i < $numgobjects; ++$i) {
      $j = $GOline[$i];
      $Lasthitbyid[$i] = "0";
      $LHTick[$i] = "0";
      // loop through hits
      for ($k = 0; $k < $numhits; ++$k) {
         $l = $Hline[$k];
         // look for last hit - but not after object already killed
         //if (($ID[$j] == $TID[$l]) && ($LHTick[$i] < $Ticks[$l])) {
         if (($ID[$j] == $TID[$l]) && ($LHTick[$i] < $Ticks[$l]) && ($Killticks[$i] >= $Ticks[$l])) {
            // ignore "Intrinsic" hits
            if ($AID[$l] > -1) {
               $Lasthitbyid[$i] = $AID[$l]; 
               $LHTick[$i] = $Ticks[$l];
            }
         }
      }
      $Lasthitby[$i] = "";
      if ($Lasthitbyid[$i] > 0) {
         OBJECTTYPE($Lasthitbyid[$i],$LHTick[$i]);
         playername($Lasthitbyid[$i],$LHTick[$i]);
//         echo "Object $i: Lasthitbyid[$i] = $Lasthitbyid[$i], LHtick[$i] = $LHTick[$i],<br>Ticks[j] =$Ticks[$j], TYPE[l] = $TYPE[$l], TYPE[j] = $TYPE[$j] Killticks[$i] = $Killticks[$i] objecttype = $objecttype playername = $playername<br>\n";
         if ($playername == "Vehicle") {
           $Lasthitby[$i] = $objecttype;
         } else {
           $Lasthitby[$i] = $playername;
         }
      }
   }
}
?>
