<?php
function BOTID($i) { // AType:16
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $BOTID; // Bot ID?
   global $POS; // position x,y,z

// example
// T:21544 AType:16 BOTID:303114 POS(69075.984,168.115,197697.703)
// seems to be a despawn of a plane after pilot finishes (or disconnects)?
// often follows PLAYER_MISSION_END
// don't currently see a need for this information
// though it might be needed for multiple sorties.
   // note: T and AType have already been trimmed off

//   echo ("$Ticks[$i] $Part[1]<br>\n");
   $Part[1] = rtrim(substr($Part[1],6)); // trim the "BOTID:" leader off this line
//   echo ("BOTID $Ticks[$i] $Part[1]<br>\n");
   $Part = explode(" POS",$Part[1],2); // split into BOTID and POS at " POS"
   $BOTID[$i] = $Part[0];
   $POS[$i] = rtrim($Part[1]);
//   echo ("BOTID $Ticks[$i] $BOTID[$i] $POS[$i]<br>\n");
}
?>
