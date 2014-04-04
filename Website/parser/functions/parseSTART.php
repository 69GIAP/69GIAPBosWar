<?php
// parseSTART.php
// parse the AType:0 line 
// =69.GIAP=TUSHKA
// 2011-2014
// BOSWAR version 0.12
// Apr 4, 2014

function START($i) { // AType:0
	global $sim; // simulation
	global $numstart; // number of starts (hopefully just 1)
	global $Sline; // line number for each start
	global $numevents; // number of mission events
	global $EVline; // lines that define mission events
	global $Ticks; // time since start of mission in 1/50 sec ticks
	global $Startticks; // time mission started (expected to be 0)
	global $Part; // parts of log lines
	global $GDate; // game date at start of mission e.g. 1917.9.23
	global $GTime; // game time at start of mission e.g. 6:30:0
	global $MFile; // mission file location and name
	global $MID; // unknown - perhaps a mission ID?
	global $GType; // game type 0 = single, 1 = coop, 2 = dogfight, 3 = custom
	global $CNTRS; // countries and their coalitions as a string
	global $SETTS; // game settings where 0 = off 1 = on
	global $MODS; // mods 0 = off, 1 = on
	global $PRESET; // ?
	global $MissionID; // mission ID (name-date-time)

	// RoF example:
// T:0 AType:0 GDate:1917.9.23 GTime:6:30:0 MFile:Multiplayer/Cooperative/September-storm-1v2.msnbin MID: GType:1 CNTRS:0:0,101:1,102:1,103:1,104:1,105:1,501:2,502:2,600:7,610:3,620:4,630:5,640:6 SETTS:00000001000000000100000000 MODS:0
	// BoS (QMB) example:
//T:0 AType:0 GDate:1942.12.24 GTime:12:0:0 MFile:Missions\_gen.msnbin MID: GType:703 CNTRS:0:0,101:1,201:2 SETTS:1101000111101001000000011 MODS:0 PRESET:1

	$Startticks = $Ticks[$i];
	// nibble away from the left end of the line, extracting data as we go
	$Part[0] = substr($Part[1],6); // trim the "GDate:" leader off this line
	$Part = explode(" GTime:",$Part[0],2); // split into GDate and remainder at " GTime:"
	$GDate = $Part[0];
	$Part = explode(" MFile:",$Part[1],2); // split into GTime and remainder at " MFile:"
	$GTime = $Part[0];
	$Part = explode(" MID:",$Part[1],2); // split into MFile and remainder at " MID:"
	$MFile = $Part[0];
	$Part = explode(" GType:",$Part[1],2); // split into MID and remainder at " GType"
	$MID = $Part[0];
	$Part = explode(" CNTRS:",$Part[1],2); // split into GType and remainder at " CNTRS:"
	$GType = $Part[0];
	$Part=explode(" SETTS:",$Part[1],2); // split into CNTRS and remainder at " SETTS:"
	$CNTRS = $Part[0];
	$Part=explode(" MODS:",$Part[1],2); // split into SETTS and remainder at " MODS:
	$SETTS = $Part[0];
	if ($sim == 'BoS') {
		$Part=explode(" PRESET:",$Part[1],2); // split into PRESET and remainder at PRESET:
		$MODS = ($Part[0]); 
		$PRESET = rtrim($Part[1]); 
	} else {
		$MODS = rtrim($Part[1]); 
	}
	// construct a mission ID from components 
	$Part = explode("/",$MFile,3); // split $MID into three parts at "/"
	$Part = explode(".msnbin",$Part[2],2); // trim off the .msnbin safely
	$MissionID = $Part[0] . "-" . $GDate . "-" . $GTime; // append date and time
	$Sline[$numstart] = $i ;
	++$numstart;
	$EVline[$numevents] = $i ;
	++$numevents;
}
?>
