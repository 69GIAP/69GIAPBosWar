<?php

function PROCESS() {
// massage the raw data into more useful (and smaller) arrays
// variables we need
   global $CNTRS; // countries and their coalitions as a string
   global $Part; // array to hold parts of log lines
   global $GTime; // game time at start of mission e.g. 6:30:0
   global $Startticks; // game start time in number of ticks since midnight
   global $numplayers; // number of players
   global $numhits; // number of hits
   global $numkills; // number of kills

//   echo "<p>PROCESSING...</p>\n"; 

   // calculate game time in ticks where 1 sec = 50 tick thus 1 min = 3000 ticks and 1 hr = 180000 ticks
   // start by calculating ticks equivalent of the starting time, eg: 6:30:0
   $Part = explode(":",$GTime,3); // split GTime into three parts at ":"
   $Startticks = ($Part[0] * 180000) + ($Part[1] * 3000) + ($Part[2] * 50);
   // call other functions needed to produce SEOW-like stats
   CNTRS($CNTRS);
   DEATHS($numplayers);
   WOUNDS($numplayers);
   ENDS($numplayers);
   HITSTATS($numplayers);
   KILLS($numkills);
   LASTHIT($numhits);
}
?>
