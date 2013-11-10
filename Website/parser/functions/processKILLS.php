<?php
function KILLS($numkills) {
// record gameobject kills
// this may supercede DEATHS and simplify or replace DEAD and CRASHED
// because it is more general and uses the same index as gameobjectsinvolved
   global $endticks; // time mission ended
   global $Kline; //  lines that define kills
   global $TID; // target ID
   global $ID; // object ID
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $POS; // position x,y,z
   global $numgobjects; // number of game objects involved
   global $GOline; // lines defining game objects
   global $objectname; // object name from PID/AID/TID
   global $numkills; // number of kills
   global $Killticks; // ticks when killed
   global $Killpos; // position where killed
   global $countryid; // country id
   global $Kcountryid; // country id of a killed object
   global $CoalID; // coalition ID
   global $numententelosses; // number of entente losses
   global $numcplosses; // number of central powers losses

   $numentenelosses = 0;
   $numcplosses = 0;
   // loop through gameobjects using the $GOline index
   for ($i = 0; $i < $numgobjects; ++$i) {
      $Kill[$i] = "0";
      $j = $GOline[$i];
      $Killticks[$i] = $endticks;
      // now loop through kills, looking for targetID match to playersID
      for($k = 0; $k < $numkills ; ++$k) {
         $l = $Kline[$k];
         // if TID matches PID, player/game object is dead... record details
         
         // aha... ID is not unique!  Need to make sure each object only dies once.
         if (($TID[$l] == $ID[$j]) && ($Kill[$i] == "0"))   {
            $Kill[$i] = "1";
            $Killticks[$i] = $Ticks[$l];
            $Killpos[$i] = $POS[$l];
//            echo "KILLS: Object $i, Ticks = $Killticks[$i], Position = $Killpos[$i] <br>\n";
            OBJECTCOUNTRYNAME($ID[$j],$Ticks[$l]);
//            echo "countryid = $countryid <br>\n";
              $Kcountryid[$k] = $countryid;
              COALITION($countryid);
           if ($CoalID == 1) {
              ++$numententelosses;
            }
            elseif ($CoalID == 2) {
              ++$numcplosses;
            }
            else {
               echo "Non-Entente or Central Powers KILLS<br>\n";
               echo "KILLS: Object $i, Ticks = $Killticks[$i], Position = $Killpos[$i] <br>\n";
            }
         }
      }
   }
//   echo "KILLS: numentenete losses = $numententelosses numcplosses = $numcplosses <br>\n";
}
?>
