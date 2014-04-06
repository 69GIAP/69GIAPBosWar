<?php
// parsePLANEPOS
// Parese the AType 17 lines - which seem to be plane positions
// =69.GIAP=TUSHKA
// 2014
// BOSWAR version 0.01
// Apr 6, 2014

function PLANEPOS($i) { // AType:17
	global $Ticks; // time since start of mission in 1/50 sec ticks
	global $Part; // parts of log lines
	global $PID; // plane ID (whether bot or player)
	global $POS; // position x,y,z
	global $numplanepos; // number of plane position reports
	global $PPline;  // Plane Position lines

// example (bos only)
// T:8875 AType:17 ID:131071 POS(90519.578,304.054,144957.422)

	$Part[0] = substr($Part[1],3); // trim the "ID:" leader off this line
	$Part = explode(" POS",$Part[0],2); // split into PID and POS at " POS"
	$PID[$i] = $Part[0]; 
	$POS[$i] = rtrim($Part[1]);
//	echo ("<p>PLANEPOS $Ticks[$i] $PID[$i] $POS[$i] $numplanepos</p>\n");
	$PPline[$numplanepos] = $i ; 
	++$numplanepos;
}
?>
