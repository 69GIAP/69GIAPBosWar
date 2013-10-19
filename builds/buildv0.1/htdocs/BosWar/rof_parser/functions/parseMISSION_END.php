<?php
function MISSION_END($i) { // AType:7
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $endticks; // time mission ended
   global $numevents; // number of mission events
   global $EVline; // lines that define mission events

// example
// T:177981 AType:7 
   // note: T and AType have already been trimmed off
 
   $endticks = $Ticks[$i]; 
   $EVline[$numevents] = $i ;
   ++$numevents;
// echo ("<p>MISSION_END $endticks</p>\n");
}
?>
