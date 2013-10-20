<?php
// LOSSES
// list kills of all types
// =69.GIAP=TUSHKA
// 2011-2013
// BOSWAR version 1.1
// Oct 19, 2013
function LOSSES($i) {
   // $i is kill number
   global $Kline; //  lines that define kills
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $clocktime; // 24 hr time
   global $TID; // target ID
   global $objecttype; // object type from PID/AID/TID
   global $objectname; // object name from PID/AID/TID
   global $playername; // player name from PLID
   global $countryadj;  // adjective form of country name
   global $anora; // an or a
   global $object_desc; // object description from rof_object_properties

   $j = $Kline[$i];
   CLOCKTIME($Ticks[$j]);
   OBJECTTYPE($TID[$j],$Ticks[$j]);
   PLAYERNAME($TID[$j],$Ticks[$j]);
   OBJECTNAME($TID[$j],$Ticks[$j]);
   OBJECTPROPERTIES($objecttype);
   OBJECTCOUNTRYNAME($TID[$j],$Ticks[$j]);

   ANORA($countryadj);
   $a = $anora;

   if ("$objectname" == "Common Bot")  {
      echo ("$clocktime  $countryadj pilot $playername<br>\n");
   } else {
      echo ("$clocktime $a $countryadj $object_desc ($objectname)<br>\n");
   }
}
?>
