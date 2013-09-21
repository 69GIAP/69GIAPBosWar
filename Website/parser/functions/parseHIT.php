<?php
function HIT($i) { // AType:1
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $AMMO; // what hit
   global $AID; // attacker ID in this context
   global $TID; // target ID
   global $numhits; // number of hits
   global $Hline; // lines that define hits

// example
// T:112542 AType:1 AMMO:explosion AID:1252352 TID:874496
   // note: T and AType have already been trimmed off

   $Part[0] = substr($Part[1],5); // trim the "AMMO:" leader off this line
   $Part = explode(" AID:",$Part[0],2); // split into AMMO and remainder at " AID:"
   $AMMO[$i] = $Part[0];
   $Part = explode(" TID:",$Part[1],2); // split into AID and remainder at " TID:"
   $AID[$i] = $Part[0];
   $TID[$i] = rtrim($Part[1]);
   // add line number to Hline array
   $Hline[$numhits] = $i ;
   // add one to running total of kills
   ++$numhits;
// echo ("<p>HIT $Ticks[$i] $AMMO[$i] $AID[$i] $TID[$i]</p>\n");
}
?>
