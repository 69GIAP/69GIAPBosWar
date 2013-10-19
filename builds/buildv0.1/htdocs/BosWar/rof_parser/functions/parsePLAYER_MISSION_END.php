<?php
function PLAYER_MISSION_END($i) { // AType:4
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $PLID; // player plane id 
   global $PID; // plane ID (whether bot or player)
   global $BUL; // # of bullets
   global $SH; // unknown
   global $BOMB; // # of bombs
   global $RCT; // unknown
   global $POS; // position x,y,z
   global $numends; // number of mission ends
   global $Eline; // lines that define mission ends

// example
// T:177981 AType:4 PLID:1282048 PID:1283072 BUL:500 SH:0 BOMB:0 RCT:0 (232645.828,58.892,43200.594)
   // note: T and AType have already been trimmed off

   $Part[0] = substr($Part[1],5); // trim the "PLID:" leader off this line
   $Part = explode(" PID:",$Part[0],2); // split into PLID and remainder at " PID:"
   $PLID[$i] = $Part[0];
   $Part = explode(" BUL:",$Part[1],2); // split into PID and remainder at " BUL:"
   $PID[$i] = $Part[0];
   $Part = explode(" SH:",$Part[1],2); // split into BUL and remainder at " SH:"
   $BUL[$i] = $Part[0];
   $Part = explode(" BOMB:",$Part[1],2); // split into SH and remainder at " BOMB:"
   $SH[$i] = $Part[0];
   $Part = explode(" RCT:",$Part[1],2); // split into SH and remainder at " RCT:"
   $BOMB[$i] = $Part[0];
   $Part = explode(" ",$Part[1],2); // split into RCT and POS at space
   $RCT[$i] = $Part[0];
   $POS[$i] = rtrim($Part[1]);
   // add line number to Eline array
   $Eline[$numends] = $i ;
   // add one to running total of mission ending events
   ++$numends;
// echo ("<p>PLAYER_MISSION_END $Ticks[$i] $PLID[$i] $PID[$i] $BUL[$i] $SH[$i] $BOMB[$i] $RCT[$i] $POS[$i]</p>\n");
}
?>
