<?php
function TAKEOFF($i) { // AType:5
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $PID; // plane ID (whether bot or player)
   global $POS; // position x,y,z
   global $numtakeoffs; // number of takeoffs
   global $Tline;  // takeoff lines
   global $numevents; // number of mission events
   global $EVline; // lines that define mission events

// example 
// T:140410 AType:5 PID:223253 POS(246859.891, 42.146, 68843.102)
   // note: T and AType have already been trimmed off

   $Part[0] = substr($Part[1],4); // trim the "PID:" leader off this line
   $Part = explode(" POS",$Part[0],2); // split into PID and POS at " POS"
   $PID[$i] = $Part[0]; 
   $POS[$i] = rtrim($Part[1]);
   $Tline[$numtakeoffs] = $i ; 
   ++$numtakeoffs;
   $EVline[$numevents] = $i ;
   ++$numevents;
//   echo ("<p>TAKEOFF $Ticks[$i] $PID[$i] $POS[$i]</p>\n");
}
?>
