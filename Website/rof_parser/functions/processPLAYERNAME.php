<?php
// PLAYERNAME
// get player's name from PLID
// may call OBJECTNAME - probably obsolete
// =69.GIAP=TUSHKA
// 2011-2013
// BOSWAR version 1.1
// Oct 22, 2013
function PLAYERNAME($plid,$ticks) {
   global $PLID; // player plane id 
   global $PID; // plane ID (whether bot or player)
   global $NAME; // player profile name
   global $numplayers; // number of players
   global $Pline;  // lines that define players
   global $objectname; // object name from PID/AID/TID
   global $playername; // player name from PLID
   global $playerplaneid; // ID of player's plane

   $playerplaneid = 0;
   $playername = "";
   $found = "0";
   if ($plid == "-1") {
      $playername = "Intrinsic";
      $found = "1";
//      echo "PLAYERNAME 1- playername = $playername<br>\n"; 
   } else {
      for ($i = 0; $i < $numplayers; ++$i) {
         $j = $Pline[$i];
         if (("$PLID[$j]" == "$plid") || ("$PID[$j]" == "$plid")) {
            $playername = $NAME[$j];
            $found = "1";
//            echo "PLAYERNAME 2- playername = $playername<br>\n"; 
         }
         if ("$PID[$j]" == "$plid") {
	    $playerplaneid = $PLID[$j];
	 }
      }
   }
   if (!$found) {
      $objectname = "";
      OBJECTNAME($plid,$ticks);
      $playername = $objectname;
      $found = "1";
//      echo "PLAYERNAME 3- playername = $playername<br>\n"; 
   }
}
?>

