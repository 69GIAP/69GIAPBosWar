<?php
// parseBOTKILL
// Parse the AType 18 lines - which seem to report killed bots
// =69.GIAP=TUSHKA
// 2014
// BOSWAR version 0.01
// Apr 22, 2014

function BOTKILL($i) { // AType:18
	global $Ticks; // time since start of mission in 1/50 sec ticks
	global $Part; // parts of log lines
	global $BOTID; // Bot ID
	global $PARENTID; // Parent of Bot ID
	global $POS; // position x,y,z
	global $numbotkills; // number of bot kill position reports
	global $BKline;  // Bot Kill lines

// example (bos only)
// BOTID:18431 PARENTID:17407 POS(112018.117,1310.607,184001.391)

	$Part[1] = substr($Part[1],6); // trim the "BOTID:" leader off this line
	$Part = explode(" PARENTID:",$Part[1],2); // split into BOTID and remainder at " PARENTID:"
	$BOTID[$i] = $Part[0]; 
	$Part = explode(" POS",$Part[1],2); // split into PARENTID and POS at " POS"
	$PARENTID[$i] = $Part[0]; 
	$POS[$i] = rtrim($Part[1]);
//	echo ("<p>BOTKILL $Ticks[$i] $BOTID[$i] $PARENTID[$i] $POS[$i] $numbotkills</p>\n");
	$BKline[$numbotkills] = $i ; 
	++$numbotkills;
}
?>
