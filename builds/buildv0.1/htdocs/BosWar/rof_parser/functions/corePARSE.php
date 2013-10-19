<?php
// =69.GIAP=TUSHKA
// 
// This is the parser function, as if you couldn't have guessed
// more like a deconstructor... it breaks the lines into their core categories
// for further deconstruction into meaningful elements
// at the moment the data goes into in-memory arrays
// later we'll put much of this into a DB for permanent storage of campaign missions

// require the functions called by PARSE
// START
require ('rof_parser/functions/parseSTART.php');
// HIT
require ('rof_parser/functions/parseHIT.php');
// DAMAGE
require ('rof_parser/functions/parseDAMAGE.php');
// KILL
require ('rof_parser/functions/parseKILL.php');
// PLAYER_MISSION_END
require ('rof_parser/functions/parsePLAYER_MISSION_END.php');
// TAKEOFF
require ('rof_parser/functions/parseTAKEOFF.php');
// LANDING
require ('rof_parser/functions/parseLANDING.php');
// MISSION_END
require ('rof_parser/functions/parseMISSION_END.php');
// MISSION_OBJECTIVE
require ('rof_parser/functions/parseMISSION_OBJECTIVE.php');
// AIRFIELD
require ('rof_parser/functions/parseAIRFIELD.php');
// PLAYERPLANE
require ('rof_parser/functions/parsePLAYERPLANE.php');
// GROUPINIT
require ('rof_parser/functions/parseGROUPINIT.php');
// GAMEOBJECTINVOLVED
require ('rof_parser/functions/parseGAMEOBJECTINVOLVED.php');
// INFLUENCEAREA_HEADER
require ('rof_parser/functions/parseINFLUENCEAREA_HEADER.php');
// INFLUENCEAREA_BOUNDARY
require ('rof_parser/functions/parseINFLUENCEAREA_BOUNDARY.php');
// VERSION
require ('rof_parser/functions/parseVERSION.php');
// BOTID
require ('rof_parser/functions/parseBOTID.php');
// UNKNOWN
require ('rof_parser/functions/parseUNKNOWN.php');


function PARSE($numlines) {
   global $numlines; // number of log lines
   global $Log; // log lines
   global $Ticks; // time since start of mission in 1/50 sec ticks - begins each log line
   global $Startticks; // time mission started (expected to be 0)
   global $endticks; // time mission ended
   global $Part; // array to hold parts of log lines passed to functions
   global $AType; // category of information contained in this line

   // grab one line at a time from the Log array and process it from the top
   // use functions to parse the lines into global data arrays as we go along

   for ($i=0; $i<$numlines; $i++) {

      // get time for each log line
      // $Ticks is the time in 1/50 sec increments since mission start
      $Log[$i] = substr($Log[$i],2); // trim the "T:" leader off each line
      $Part = explode(" AType:",$Log[$i],2); // split line into time and remainder at " AType"
      $Ticks[$i] = $Part[0];
      $Part = explode(" ",$Part[1],2); // split into AType and remainder at space
      $AType[$i] = $Part[0];

      // there are only seventeen types of lines to parse, the ATypes
      if ("$AType[$i]" == "0") { START($i); }
      elseif ("$AType[$i]" == "1") { HIT($i); }
      elseif ("$AType[$i]" == "2") { DAMAGE($i); }
      elseif ("$AType[$i]" == "3") { KILL($i); }
      elseif ("$AType[$i]" == "4") { PLAYER_MISSION_END($i); }
      elseif ("$AType[$i]" == "5") { TAKEOFF($i); }
      elseif ("$AType[$i]" == "6") { LANDING($i); }
      elseif ("$AType[$i]" == "7") { MISSION_END($i); }
      elseif ("$AType[$i]" == "8") { MISSION_OBJECTIVE($i); }
      elseif ("$AType[$i]" == "9") { AIRFIELD($i); }
      elseif ("$AType[$i]" == "10") { PLAYERPLANE($i); }
      elseif ("$AType[$i]" == "11") { GROUPINIT($i); }
      elseif ("$AType[$i]" == "12") { GAMEOBJECTINVOLVED($i); }
      elseif ("$AType[$i]" == "13") { INFLUENCEAREA_HEADER($i); }
      elseif ("$AType[$i]" == "14") { INFLUENCEAREA_BOUNDARY($i); }
      elseif ("$AType[$i]" == "15") { VERSION($i); }
      elseif ("$AType[$i]" == "16") { BOTID($i); }
      else { UNKNOWN($i); }
   } // end of for loop
} // end of parse function
?>
