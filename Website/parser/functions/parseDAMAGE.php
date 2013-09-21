<?php
function DAMAGE($i) { // AType:2
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $DMG; // damage
   global $AID; // attacker ID
   global $TID; // target ID
   global $POS; // position x,y,z
   global $numdamage; // number of damage events
   global $Dline;  // lines that define damage events

// example
// T:172502 AType:2 DMG:0.132 AID:-1 TID:1252352 POS(247666.016,29.535,84503.578)
   // note: T and AType have already been trimmed off

   $Part[0] = substr($Part[1],4); // trim the "DMG:" leader off this line
   $Part = explode(" AID:",$Part[0],2); // split into DMG and remainder at " AID:"
   $DMG[$i] = $Part[0];
   $Part = explode(" TID:",$Part[1],2); // split into AID and remainder at " TID:"
   $AID[$i] = $Part[0];
   $Part = explode(" POS",$Part[1],2); // split into TID and POS at " POS"
   $TID[$i] = $Part[0];
   $POS[$i] = rtrim($Part[1]);
   // add line number to Dline array
   $Dline[$numdamage] = $i ;
   // add one to running total of kills
   ++$numdamage;
// echo ("<p>DAMAGE $Ticks[$i] $DMG[$i] $AID[$i] $TID[$i] $POS[$i]</p>\n");
}
?>
