<?php
function AIRFIELD($i) { // AType:9
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $AID; // airfield ID in this context
   global $COUNTRY; // country ID
   global $POS; // position x,y,z
   global $IDS; // player profile ID/ plane ID

// example line
// T:10 AType:9 AID:481280 COUNTRY:501 POS(247744.000, 27.389, 84529.102) IDS()
   // note: T and AType have already been trimmed off

   $Part[1] = substr($Part[1],4); // trim the "AID:" leader off this line
   $Part = explode(" COUNTRY:",$Part[1],2); // split into AID and remainder at " COUNTRY:"
   $AID[$i] = $Part[0];
   $Part = explode(" POS",$Part[1],2); // split into COUNTRY and remainder at " POS"
   $COUNTRY[$i] = $Part[0];
   $Part = explode(" IDS",$Part[1],2); // split into POS and IDS at " IDS"
   $POS[$i] = $Part[0];
   $IDS[$i] = rtrim($Part[1]);
// echo ("<p>AIRFIELD $Ticks[$i] $AID[$i] $COUNTRY[$i] $POS[$i] $IDS[$i]</p>\n");
}
?>
