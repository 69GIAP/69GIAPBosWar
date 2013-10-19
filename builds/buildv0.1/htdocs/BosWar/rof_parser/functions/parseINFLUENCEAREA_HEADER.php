<?php
function INFLUENCEAREA_HEADER($i) { // AType:13
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $AID; // area ID in this context
   global $COUNTRY; // country ID
   global $ENABLED; // influence area enabled or not
   global $BC; // By Coalition inflight count of planes in area
   global $numiaheaders; // number of influence area headers
   global $IAHline; // lines defining Influence Area Headers

// example 
// T:174445 AType:13 AID:1239040 COUNTRY:501 ENABLED:1 BC(0,0,2,0,0,0,0,0)
   // note: T and AType have already been trimmed off

   $Part[1] = substr($Part[1],4); // trim the "AID:" leader off this line
   $Part = explode(" COUNTRY:",$Part[1],2); // split into AID and remainder at " COUNTRY:"
   $AID[$i] = $Part[0];
   $Part = explode(" ENABLED:",$Part[1],2); // split into COUNTRY and remainder at " ENABLED:"
   $COUNTRY[$i] = $Part[0];
   $Part = explode(" BC",$Part[1],2); // split into ENABLED and BC at " BC"
   $ENABLED[$i] = $Part[0];
   $BC[$i] = rtrim($Part[1]);
   // note which line number refers to this Influence Area Header
   $IAHline[$numiaheaders] = $i ;
   // add one to running total of influence area headers count
   ++$numiaheaders;
// echo ("INFLUENCEAREA_HEADER $Ticks[$i] $AID[$i] $COUNTRY[$i] $ENABLED[$i] $BC[$i]</p>\n");
}
?>
