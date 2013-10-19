<?php
function GROUPINIT($i) { // AType:11
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $IDS; // plane ID
   global $GID; // group ID
   global $LID; // lead plane ID
   global $numgroups; // total number of groups
   global $Gline; // lines defining groups
      
   // examples
//T:80789 AType:11 GID:2220032 IDS:448512,1991680,2016256 LID:448512
//T:80789 AType:11 GID:2221056 IDS:277528,277530 LID:277528
// These are groups of AI planes.
   // note: T and AType have already been trimmed off

//   echo ("<p>GROUPINIT $Ticks[$i] $Part[1]</p>\n");
   // nibble away from the left side of the line, extracting data as we go
   $Part[1] = substr($Part[1],4); // trim the "GID:" leader off this line
   $Part = explode(" IDS:",$Part[1],2); // split into GID (GroupID) and remainder at " IDS:"
   $GID[$i] = $Part[0];
   $Part = explode(" LID:",$Part[1],2); // split into IDS and LID at " LID:"
   $IDS[$i] = $Part[0];
   $LID[$i] = rtrim($Part[1]);
//   echo ("<p>GROUPINIT $numgroups $Ticks[$i] $GID[$i] $IDS[$i] $LID[$i]</p>\n");
   // note which line number refers to this group
   $Gline[$numgroups] = $i ;
   // add one to running total of groups
   ++$numgroups;
} 
?>
