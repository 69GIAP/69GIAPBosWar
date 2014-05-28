<?php
// parseGAMEOBJECTINVOLVED.php
// parse the AType:12 line 
// =69.GIAP=TUSHKA
// 2011-2014
// BOSWAR version 0.02
// May 28, 2014

function GAMEOBJECTINVOLVED($i) { // AType:12
	global $sim; // simulation
	global $Ticks; // time since start of mission in 1/50 sec ticks
	global $Part; // parts of log lines
	global $ID; // object ID
	global $TYPE; // type of object in this context
	global $COUNTRY; // country ID
	global $NAME; // player profile name
	global $PID; // plane ID (whether bot or player)
	global $numgobjects; // number of game objects involved
	global $GOline; // lines defining game objects

// sample lines - note, first is a RoF airfield, second is BoS static_obj
// T:112473 AType:12 ID:14336 TYPE:fr_med COUNTRY:102 NAME:Bruay PID:-1^M
// T:2703 AType:12 ID:70655 TYPE:static_Yak1[6,0] COUNTRY:101 NAME:Block PID:-1

	$Part[1] = substr($Part[1],3); // trim the "ID:" leader off this line
	$Part = explode(" TYPE:",$Part[1],2); // split into ID (objectID) and remainder at " TYPE:"
	$ID[$i] = $Part[0];
	$Part = explode(" COUNTRY:",$Part[1],2); // split into TYPE and remainder at " COUNTRY:"
	$TYPE[$i] = $Part[0];
	$Part = explode(" NAME:",$Part[1],2); // split into COUNTY and remainder at " NAME:"
	$COUNTRY[$i] = $Part[0];
	$Part = explode(" PID:",$Part[1],2); // split into NAME and remainder at " PID:"
	$NAME[$i] = $Part[0];
	$PID[$i] = rtrim($Part[1]);
	// note which line number refers to this game object
	$GOline[$numgobjects] = $i ;
	// add one to running total of game objects
	++$numgobjects;

	// get rid of pesky indices on BoS static objects
	if ($sim == "BoS") {
		if (substr_count($TYPE[$i],'[') == 1) {
			$Part = explode('[',$TYPE[$i],2);
			$TYPE[$i] = $Part[0];
		}
	}

//	echo ("<p>GAMEOBJECTINVOLVED Ticks = $Ticks[$i] ID = $ID[$i] TYPE = $TYPE[$i] COUNTRY = $COUNTRY[$i] NAME = $NAME[$i] PID = $PID[$i]<br>\n");
}
?>
