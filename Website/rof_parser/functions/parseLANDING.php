<?php
function LANDING($i) { // AType:6
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $PID; // plane ID (whether bot or player)
   global $POS; // position x,y,z
   global $numlandings; // number of landings
   global $Lline;  // landing lines
   global $numevents; // number of mission events
   global $EVline; // lines that define mission events

// example
// T:71580 AType:6 PID:223245 POS(243148.469, 24.424, 57384.961)
   // note: T and AType have already been trimmed off

   $Part[0] = substr($Part[1],4); // trim the "PID:" leader off this line
   $Part = explode(" POS",$Part[0],2); // split into PID and POS at " POS"
   $PID[$i] = $Part[0]; 
   $POS[$i] = rtrim($Part[1]);
//   echo ("<p>LANDING $Ticks[$i] $PID[$i] $POS[$i] $numevents</p>\n");
   $Lline[$numlandings] = $i ; 
   ++$numlandings;
   $EVline[$numevents] = $i ;
   ++$numevents;
}
?>
