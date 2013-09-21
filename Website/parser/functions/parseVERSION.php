<?php
function VERSION($i) { // AType:15
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $VER; // version (of what?)

// example
// T:0 AType:15 VER:15
   // note: T and AType have already been trimmed off

   $VER[$i] = rtrim(substr($Part[1],4)); // trim the "VER:" leader off this line
// echo ("<p>VERSION $Ticks[$i] $VER[$i]</p>\n");
}
?>
