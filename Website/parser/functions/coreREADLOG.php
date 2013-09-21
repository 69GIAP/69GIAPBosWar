<?php
function READLOG($LOGFILE) {
// Create a line-by-line array from the log file
   global $Log; // log lines
   global $numlines; // number of log lines
   $Log = file("$LOGFILE");
   $numlines = count($Log);
}
?>
