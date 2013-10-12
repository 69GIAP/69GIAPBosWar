<?PHP
// rof_parse_log.php 
// a simple-minded parser/stats/events reporter for combined RoF
// mission report text files
// written by =69.GIAP=TUSHKA
// 2011-2013
// Version 69GIAPBoSWar 0.5
// Sat Sep 21 2013
//

// the main program 

//record the starting time
$start=microtime();
$start=explode(" ",$start);
$start=$start[1]+$start[0];

// Debugging variables for individual PARSE functions
$DEBUG = 0;  // set to 1 for a complete debugging report, 0 for off.
// 100 for START, 101 for HIT, 102 for DAMAGE, 103 for KILL,
// 104 for PLAYER_MISSION_END, 105 for TAKEOFF, 106 for LANDING,
// 107 for MISSION_END, 108 for MISSION_OBJECTIVE, 109 for AIRFIELD,
// 110 for PLAYERPLANE, 111 for GROUPINIT, 112 for GAMEOBJECTINVOLVED
// 113 for INFLUENCEAREA_HEADER, 114 for INFLUENCEAREA_BOUNDARY,
// 115 for VERSION (nothing yet for BOTID... haven't found its use)

// Get individual variable from $_POST, but set it here for the moment

// Get Individual variables from the campaign's campaign_settings table
$query = "SELECT * FROM campaign_settings";
if(!$result = $camp_link->query($query))
   { die('There was an error running the query [' . $camp_link->error . ']'); }
	
if ($result = mysqli_query($camp_link, $query)) {
	 // get results
	 while ($obj = mysqli_fetch_object($result)) {
		$SHOWAF	=($obj->show_airfield);
		$FinishFlightOnlyLanded = ($obj->finish_flight_only_landed);
		$map_locations	=($obj->map_locations);
		$LOGPATH	=($obj->logpath);
		$kia_pilot	=($obj->kia_pilot);
		$mia_pilot	=($obj->mia_pilot);
		$critical_w_pilot	=($obj->critical_w_pilot);
		$serious_w_pilot	=($obj->serious_w_pilot);
		$light_w_pilot	=($obj->light_w_pilot);
		$kia_gunner	=($obj->kia_gunner);
		$mia_gunner	=($obj->mia_gunner);
		$critical_w_gunner	=($obj->critical_w_gunner);
		$serious_w_gunner	=($obj->serious_w_gunner);
		$light_w_gunner	=($obj->light_w_gunner);
		$healthy	=($obj->healthy);
	}
        // free result set
	mysqli_free_result($result);
}

// debugging
//if (true){
if ($DEBUG){
   print "DEBUG rof_parse_log.php parser configuration:<br>\n";
   print "SHOWAF = $SHOWAF<br>\n";
   print "FinishFlightOnlyLanded = $FinishFlightOnlyLanded<br>\n";
   print "map_locations = $map_locations<br>\n";
   print "LOGPATH = $LOGPATH<br>\n";
   print "LOGFILE = $LOGFILE<br>\n";
   print "\$critical_w_gunner = $critical_w_gunner<br>\n";
}

// Declare global variables.
// This permits us to see these in functions without using them as
// arguments to the functions.  Lazy but effective!
global $camp_db;  // campaign db
global $camp_link;  // link to campaign db
global $map_locations;  // name of campaign locations file

// get $camp_db from SESSION
$camp_db =  $_SESSION['camp_db'];

// Set path to logfile relative to parser
$LOGFILE = $LOGPATH."/".$LOGFILE;

// End individual variables

//End Configuration
// Don't edit anything below this line unless you know what you are doing.

// initialize counting variables to zero
$numstart = 0 ; // number of starts (hopefully just 1)
$numhits = 0 ; // total number of hits
$numdamage = 0; // total number of damage events
$numkills = 0 ; // total number of kills
$numends = 0; // total number of mission end events
$numtakeoffs = 0 ; // total number of takeoffs
$numlandings = 0 ; // total number of landings
$numplayers = 0 ; // total number of players
$numgobjects = 0; // total number of game objects involved
$numevents = 0; // total number of events
$numgroups = 0; // total number of groups
$numB = 0; // number of boundary definitions
$numiaheaders = 0; // number of influence area headers

// require core functions called by the main program
// READLOG
require ('rof_parser/functions/coreREADLOG.php');
// PARSE
require ('rof_parser/functions/corePARSE.php');
// PROCESS
require ('rof_parser/functions/corePROCESS.php');
// OUTPUT
require ('rof_parser/functions/coreOUTPUT.php');

// now get to work
if (file_exists("$LOGFILE")) {
   // the main program is simple - only four stages
   READLOG($LOGFILE); // read the logfile
   PARSE($numlines); // parse the logfile 
   PROCESS($numlines); // manipulate the data to extract the stats we want
   OUTPUT(); // display a mission report
} else {
   echo("Could not open $LOGFILE");
}
// mission report output done
// note the ending time and report elapsed time
$end=microtime();
$end=explode(" ",$end);
$end=$end[1]+$end[0];
printf("<p>Report generated in %.1f seconds</p>\n",$end-$start); 

// Thus endeth the main program 
// the remainder is just functions and a borrowed class.
// Of course, that is where the interesting stuff happens.
?>
