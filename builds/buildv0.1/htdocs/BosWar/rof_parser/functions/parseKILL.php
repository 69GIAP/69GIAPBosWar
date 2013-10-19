<?php
function KILL($i) { // AType:3
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $AID; // attacker ID in this context
   global $TID; // target ID
   global $POS; // position x,y,z
   global $numkills; // number of kills
   global $Kline; //  lines that define kills
   global $numevents; // number of mission events
   global $EVline; // lines that define mission events

// example
// T:85853 AType:3 AID:-1 TID:223244 POS(242985.125,292.674,59563.691)
   // note: T and AType have already been trimmed off

   $Part[0] = substr($Part[1],4); // trim the "AID:" leader off this line
   $Part = explode(" TID:",$Part[0],2); // split into AID and remainder at " TID:"
   $AID[$i] = $Part[0];
   $Part = explode(" POS",$Part[1],2); // split into TID and POS at " POS"
   $TID[$i] = $Part[0];
   $POS[$i] = rtrim($Part[1]);
   // add line number to Kline array
   $Kline[$numkills] = $i ;
   // add one to running total of kills
   ++$numkills;
   $EVline[$numevents] = $i ;
   ++$numevents;
//   echo ("<p>KILL $Ticks[$i] $AID[$i] $TID[$i] $POS[$i]</p>\n");
}
?>
