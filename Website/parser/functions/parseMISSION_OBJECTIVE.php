<?php
function MISSION_OBJECTIVE($i) { // Atype:8
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $OBJID; // objective ID
   global $COAL; // coalition ID
   global $TYPE; // objective type - primary or secondary
   global $RES; // result - objective achieved or not

// examples
// T:37907 AType:8 OBJID:39 POS(273490.000,32.018,95596.297) COAL:1 TYPE:0 RES:1
// T:37907 AType:8 OBJID:40 POS(273513.000,32.018,95676.203) COAL:2 TYPE:0 RES:0
   // note: T and AType have already been trimmed off

   $Part[1] = substr($Part[1],6); // trim the "OBJID:" leader off this line
   $Part = explode(" POS",$Part[1],2); // split into OBJID and remainder at " POS"
   $OBJID[$i] = $Part[0];
   $Part = explode(" COAL:",$Part[1],2); // split into POS and remainder at " COAL:"
   $POS[$i] = $Part[0];
   $Part = explode(" TYPE:",$Part[1],2); // split into COAL and remainder at " TYPE:"
   $COAL[$i] = $Part[0];
   $Part = explode(" RES:",$Part[1],2); // split into TYPE and RES at " RES:"
   $TYPE[$i] = $Part[0];
   $RES[$i] = rtrim($Part[1]);
//   echo ("<p>MISSION_OBJECTIVE $Ticks[$i] $OBJID[$i] $POS[$i] $COAL[$i] $TYPE[$i] $RES[$i]</p>\n");
}
?>
