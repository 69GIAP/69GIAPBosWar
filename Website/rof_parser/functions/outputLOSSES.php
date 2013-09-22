<?php
function LOSSES($i) {
   // $i is kill number
   global $Kline; //  lines that define kills
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $clocktime; // 24 hr time
   global $ID; // object ID
   global $TID; // target ID
   global $AID; // attacker ID in this context
   global $POS; // position x,y,z
   global $objecttype; // object type from PID/AID/TID
   global $objectname; // object name from PID/AID/TID
   global $playername; // player name from PLID
   global $countryadj;  // adjective form of country name
   global $anora; // an or a
   global $numgobjects; // number of game objects involved
   global $GOline; // lines defining game objects

   $j = $Kline[$i];
   CLOCKTIME($Ticks[$j]);
   OBJECTTYPE($TID[$j],$Ticks[$j]);
   PLAYERNAME($TID[$j],$Ticks[$j]);
   OBJECTNAME($TID[$j],$Ticks[$j]);
   OBJECTCOUNTRYNAME($TID[$j],$Ticks[$j]);
//   echo "$i in line # $j, $AID[$j] $TID[$j] in $POS[$j]<br>\n";
//   echo "objecttype = $objecttype, playername = $playername, objectname = $objectname<br>\n";
   ANORA($countryadj);
   $a = $anora;
   // get objectnumber for target object
   for ($k = 0; $k < $numgobjects; ++$k) {
      $l = $GOline[$k];
      if ($ID[$l] == $TID[$j]) {
         $tonum = $k;
      }
   }
//   echo "flying = $flying<br>\n";
//   echo "attackertype = $attackertype, attackerobject = $attackerobject, aplayername= $aplayername, objecttype = $objecttype, playername = $playername, objectname = $objectname<br>\n";
   if ("$objectname" == "Common Bot")  {
      $objectname = $playername;
      echo ("$clocktime  $countryadj pilot $objectname<br>\n");
   } elseif ($objecttype == "BotGunnerG5_1") { // used in DFW also
      echo ("$clocktime $a $countryadj gunner ($playername)<br>\n");
   } elseif ($objecttype == "BotGunnerG5_2") { // used in DFW also
      echo ("$clocktime $a $countryadj gunner ($playername)<br>\n");
   } elseif ($objecttype == "BotGunnerDavis") { // used in HP and Felixstow
      echo ("$clocktime $a $countryadj Davis gunner ($playername)<br>\n");
   } elseif ($objecttype == "BotGunnerFe2_sing") {
      echo ("$clocktime $a $countryadj F.E.2b gunner ($playername)<br>\n");
   } elseif ($objecttype == "BotGunnerHP400_1") {
      echo ("$clocktime $a $countryadj nose gunner ($playername)<br>\n"); // also used in Felixstowe F2A
   } elseif ($objecttype == "BotGunnerBacker") {
      echo ("$clocktime $a $countryadj Gotha G.V gunner ($playername)<br>\n");
   } elseif ($objecttype == "BotGunnerBW12") {
      echo ("$clocktime $a $countryadj Brandenburg W12 gunner ($playername)<br>\n");
   } elseif ($objecttype == "BotGunnerHCL2") {
      echo ("$clocktime $a $countryadj Halberstadt CL.II gunner ($playername)<br>\n");
   } elseif ($objecttype == "BotGunnerHP400_2") {
      echo ("$clocktime $a $countryadj Handley Page 0/400 dorsal gunner ($playername)<br>\n");
   } elseif ($objecttype == "BotGunnerHP400_2_WM") {
      echo ("$clocktime $a $countryadj Handley Page 0/400 dorsal gunner ($playername)<br>\n");
   } elseif ($objecttype == "BotGunnerHP400_3") {
      echo ("$clocktime $a $countryadj Handley Page 0/400 ventral gunner ($playername)<br>\n");
   } elseif ($objecttype == "BotGunnerBreguet14") { // also used in Bristol F2B and F.E.2b
      echo ("$clocktime $a $countryadj gunner ($playername)<br>\n");
   } elseif ($objecttype == "BotGunnerRE8") {
      echo ("$clocktime $a $countryadj gunner ($playername)<br>\n");
   } elseif ($objecttype == "BotGunnerFelix_top-twin") {
      echo ("$clocktime $a $countryadj Felixstowe F2A top gunner ($playername)<br>\n");
   } elseif (preg_match('/^British/',$objecttype)) { // don't need $countryadj
   echo ("$clocktime $a $objecttype ($objectname)<br>\n");
   } elseif (preg_match('/^German/',$objecttype)) { // don't need $countryadj
   echo ("$clocktime $a $objecttype ($objectname)<br>\n");
   } elseif ($objecttype == "ship_stat_pass") {
   echo ("$clocktime $a stationary $countryadj passenger ship ($objectname)<br>\n");
   } elseif ($objecttype == "GER submarine") {
   echo ("$clocktime $a surfaced $countryadj submarine ($objectname)<br>\n");
   } elseif ($objecttype == "GER Ship Searchlight") {
   echo ("$clocktime $a $countryadj ship searchlight ($objectname)<br>\n");
   } elseif ($objecttype == "GBR Searchlight") {
   echo ("$clocktime $a $countryadj searchlight ($objectname)<br>\n");
   } elseif ($objecttype == "ship_stat_cargo") {
   echo ("$clocktime $a stationary $countryadj cargo ship ($objectname)<br>\n");
   } elseif ($objecttype == "ship_stat_tank") {
   echo ("$clocktime $a stationary $countryadj tanker ship ($objectname)<br>\n");
   } elseif ($objecttype == "ger_med") {
   echo ("$clocktime $a $countryadj airfield ($objectname)<br>\n");
   } else {
   echo ("$clocktime $a $countryadj $objecttype ($objectname)<br>\n");
   }
//  echo ("C* $clocktime $attackertype $attackername $aplayername $objecttype $objectname $playername<br>\n");
}
?>
