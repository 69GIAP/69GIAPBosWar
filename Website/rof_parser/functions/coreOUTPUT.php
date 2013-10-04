<?php
// OUTPUT
// =69.GIAP=TUSHKA
// output simple text report and calculate some stats for the db
// BOSWAR version 1.04
// Oct 3, 2013

function OUTPUT() {
// what follows is an almost complete collection of global variables
// some of these variables are needed just for the debugging section
// others may not be needed here at all
   global $DEBUG; // are we debugging?
   global $Log; // log lines
   global $numlines; // number of log lines
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Startticks; // time mission started (expected to be 0)
   global $numstart; // number of starts (hopefully just 1)
   global $Sline; // line number for each start
   global $endticks; // time mission ended
   global $Part; // array to hold parts of log lines
   global $AType; // category of information contained in this line
   global $GDate; // game date at start of mission e.g. 1917.9.23
   global $GTime; // game time at start of mission e.g. 6:30:0
   global $MFile; // mission file location and name
   global $MID; // unknown - perhaps a mission ID?
   global $GType; // game type 0 = single, 1 = coop, 2 = dogfight, 3 = custom
   global $CNTRS; // countries and their coalitions as a string
   global $SETTS; // game settings where 0 = off 1 = on
   global $MODS; // mods 0 = off, 1 = on
   global $MissionID; // mission ID (name-date-time)
   global $PLID; // player plane id 
   global $PID; // plane ID (whether bot or player)
   global $BUL; // # of bullets
   global $SH; // unknown
   global $BOMB; // # of bombs
   global $RCT; // unknown
   global $POS; // position x,y,z
   global $IDS; // player profile ID/ plane ID
   global $LOGIN; // player account ID
   global $NAME; // player profile name
   global $TYPE; // type of plane, object, or objective - primary or secondary
   global $COUNTRY; // country ID
   global $CoalID; // coalition ID
   global $FORM; // unknown - perhaps formation?
   global $FIELD; // unknown - perhaps type of field?
   global $INAIR; // unknown - perhaps airstart?
   global $PARENT; // unkown
   global $ID; // object ID
   global $OBJID; // objective ID
   global $COAL; // coalition ID
   global $RES; // result - objective achieved or not
   global $AMMO; // what hit
   global $AID; // attacker ID or airfield ID or area ID
   global $TID; // target ID
   global $DMG; // damage
   global $ENABLED; // influence area enabled or not
   global $BC; // By Coalition inflight count of planes in area
   global $BP; // boundary points
   global $VER; // version (of what?)
   global $Startticks; // game start time in number of ticks since midnight
   global $clocktime; // 24 hr time
   global $playername; // player name from PLID
   global $objectname; // object name from PID/AID/TID
   global $objecttype; // object type from PID/AID/TID
   global $objectclass; // object class from rof_object_properties
   global $objectvalue; // object value from rof_object_properties
   global $countryname; // country name
   global $countryid; // country id
   global $countryadj;  // adjective form of country name  
   global $Coalitions; // array of coalition names
   global $CoCoal; // array of countries and their coalitions
   global $Coalitionname; // this coalition name 
   global $posx; // X coordinate
   global $posz; // Z coordinate
   global $where; // position in english
   global $numevents; // number of mission events
   global $EVline; // lines that define mission events
   global $numtakeoffs; // number of takeoffs
   global $Tline;  // takeoff lines
   global $numlandings; // number of landings
   global $Lline;  // landing lines
   global $numplayers; // number of players
   global $Pline;  // lines that define players
   global $numgroups; // total number of groups
   global $Gline; // lines defining groups
   global $numgobjects; // number of game objects involved
   global $GOline; // lines defining game objects
   global $numkills; // number of kills
   global $Kline; //  lines that define kills
   global $numhits; // number of hits
   global $Hline; // lines that define hits
   global $numdamage; // number of damage events
   global $Dline;  // lines that define damage events
   global $numends; // number of mission ends
   global $Eline; // lines that define mission ends
   global $Death; // dead players numbers
   global $Deathticks; // ticks when died
   global $Deathpos; // position where died
   global $dead; // true or false
   global $crashed; // player's plane has crashed, true or false
   global $End; // player ended (or not)
   global $EndBUL; // unexpended bullets
   global $EndBOMB; // undropped bombs
   global $ShotBUL; // shot bullets
   global $DroppedBOMB; // dropped bombs
   global $HitBOMB; // bomb hits
   global $HitBUL; // bullet hits
   global $Lasthitbyid; // ID of last attacker to hit player
   global $Lasthitby; // name or type of last attacker to hit player
   global $Wound; // array holding severity of wound
   global $Woundticks; // ticks when last wounded
   global $Woundpos; // position where last wounded
   global $flying;  // on ground, flying, crashing, or already landed/crashed
   global $anora; // an or a
   global $Gunner; // gunner type, if set
   global $Gunnerticks; // time became gunner
   global $Whosegunner; // player piloting this gunner
   global $Kcountryid; // country id of a killed object
   global $numententelosses; // number of entente losses
   global $numcplosses; // number of central powers losses
   global $GID; // group ID
   global $LID; // lead plane ID
   global $FinishFlightOnlyLanded; // true or false setting
   global $map_locations;  // name of campaign locations table
   global $numiaheaders; // number of influence area headers
   global $IAHline; // lines defining Influence Area Headers
   global $Bline; // lines defining area boundaries
   global $side; // "friendly", "enemy" or "neutral"
   global $BotName; // BotGunner description
   global $camp_link; // link to campaign db
   global $StatsCommand; // do, undo, or ignore
   globaL $camp_db; // campaign db

   # require the is-point-in-area borrowed CLASS
   # pointLocation
   require ('rof_parser/classes/pointLocation.php');

   # require the FUNCTIONS called by OUTPUT
   # ACCURACY
   require ('rof_parser/functions/outputACCURACY.php');
   # ANORA
   require ('rof_parser/functions/outputANORA.php');
   # BOTGUNNER
   require ('rof_parser/functions/outputBOTGUNNER.php');
   # CLOCKTIME
   require ('rof_parser/functions/outputCLOCKTIME.php');
   # COALITIONNAME
   require ('rof_parser/functions/outputCOALITIONNAME.php');
   # CRASHED
   require ('rof_parser/functions/outputCRASHED.php');
   # DEAD
   require ('rof_parser/functions/outputDEAD.php');
   # FATES
   require ('rof_parser/functions/outputFATES.php');
   # FLYING
   require ('rof_parser/functions/outputFLYING.php');
   # LANDINGSIDE
   require ('rof_parser/functions/outputLANDINGSIDE.php');
   # LOSSES
   require ('rof_parser/functions/outputLOSSES.php');
   # TOFROM
   require ('rof_parser/functions/outputTOFROM.php');
   # TURRETGUNNER 
   require ('rof_parser/functions/outputTURRETGUNNER.php');
   # WHERE
   require ('rof_parser/functions/outputWHERE.php');
   # WHOSEGUNNER
   require ('rof_parser/functions/outputWHOSEGUNNER.php');
   # XYZ
   require ('rof_parser/functions/outputXYZ.php');

   echo "<p><b>REPORT OF SELECTED RESULTS:</b></p>\n"; 

   echo ("<p>Mission ID = $MissionID</p>\n");

   echo "<p>Lines in mission log: $numlines</p>\n";

   // for the moment assume only one start but warn if different
   if ($numstart != 1) {
      echo "WARNING: Have $numstart start lines!<br>\n";
   }
   // present in same order as in current version settings page
   // updated and verified correct as of version 1.030b
   $anyon = 0; // are any settings ON?
   echo "SETTINGS:<br>\n";
   if (substr($SETTS,0,1)) { echo "Show Objects icons: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,1,1)) { echo "Navigation icons: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,2,1)) { echo "Far objects icons on map: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,4,1)) { echo "Aiming Help: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,5,1)) { echo "Padlock: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,3,1)) { echo "Simple gauges: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,23,1)) { echo "Allow Spectators: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,24,1)) { echo "Subtitles: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,19,1)) { echo "Simplified physics: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,20,1)) { echo "No wind: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,18,1)) { echo "No misfire: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,17,1)) { echo "Safety collisions: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,16,1)) { echo "Invulnerability against weapons: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,22,1)) { echo "Unlimited fuel: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,21,1)) { echo "Unlimited ammo: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,14,1)) { echo "No engine overflow: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,15,1)) { echo "Warmed up engine: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,13,1)) { echo "Easy piloting: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,6,1)) { echo "Autorudder: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,11,1)) { echo "Cruise control: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,8,1)) { echo "Autopilot: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,12,1)) { echo "Automatic RPM limiter: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,7,1)) { echo "Automatic mixture: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,9,1)) { echo "Automatic radiator: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,10,1)) { echo "Automatic engine start: ON<br>\n"; $anyon = 1; } 
   if (substr($SETTS,25,1)) { echo "UNKNOWN SETTING: ON<br>\n"; $anyon = 1; } 

   if ($anyon == 0) { echo "All settings reported in log: OFF<br>&nbsp;<br>\n";
   } else {
   echo "All other settings reported in log: OFF<br>&nbsp<br>\n";
   }
   if ($FinishFlightOnlyLanded) { echo "Finish Flight only landed: ON<br>\n"; }
   if ($map_locations == "rof_westernfront_locations") {echo "Map: Western Front<br>&nbsp;<br>\n";}
   elseif ($map_locations == "rof_channel_locations") {echo "Map: Channel<br>&nbsp;<br>\n";}
   elseif ($map_locations == "rof_verdun_locations") {echo "Map: Verdun<br>&nbsp;<br>\n";}
   elseif ($map_locations == "rof_lake_locations") {echo "Map: Lake<br>&nbsp;<br>\n";}
   // Players
   echo "=-=-=-=-= Players and Their Fates =-=-=-=-=-=<br>\n";
   echo "There were $numplayers player positions.<br>&nbsp;<br>\n";
   // count each coalition's pilots
   $numentente = 0;
   $numcentralpowers = 0;
   // loop through those players using $Pline index
   for ($i = 0; $i < $numplayers; ++$i) {
      $j = $Pline[$i];
      COALITION($COUNTRY[$j]);
      if ($CoalID == 1) {
        ++$numentente;
      }
      elseif ($CoalID == 2) {
        ++$numcentralpowers;
      }
      else {
         echo "Player #$i is neither Entente nor Central Powers!<br>\n";
      }
   }
   // first show Entente players
   COALITIONNAME(1);
   echo "$numentente $Coalitionname:<br>\n";	
   // loop through all players using $Pline index
   for ($i = 0; $i < $numplayers; ++$i) {
      $j = $Pline[$i];
      COALITION($COUNTRY[$j]);
      if ($CoalID == 1) {
         FATES($i,$j);
      }
   }

   // now show Central Powers players
   COALITIONNAME(2);
   echo "<br>$numcentralpowers $Coalitionname:<br>\n";	
   // loop through all players using $Pline index
   for ($i = 0; $i < $numplayers; ++$i) {
      $j = $Pline[$i];
      COALITION($COUNTRY[$j]);
      if ($CoalID == 2) {
         FATES($i,$j);
      }
   }

   // Shooting and Bombing Accuracy
   echo "<br>=-=-=-=-=-= Shooting and Bombing Accuracy =-=-=-=-=-=<br>\n";
   echo "There were $numplayers player positions.<br>&nbsp;<br>\n";
   // first show Entente players
   COALITIONNAME(1);
   echo "$numentente $Coalitionname:<br>\n";	
   // loop through all players using $Pline index
   for ($i = 0; $i < $numplayers; ++$i) {
      $j = $Pline[$i];
      COALITION($COUNTRY[$j]);
      if ($CoalID == 1) {
         ACCURACY($i,$j);
      }
   }

   // now show Central Powers players
   COALITIONNAME(2);
   echo "<br>$numcentralpowers $Coalitionname:<br>\n";	
   // loop through all players using $Pline index
   for ($i = 0; $i < $numplayers; ++$i) {
      $j = $Pline[$i];
      COALITION($COUNTRY[$j]);
      if ($CoalID == 2) {
         ACCURACY($i,$j);
      }
   }

   // Losses
   echo "<br>=-=-=-=-=-= Losses =-=-=-=-=-=<br>\n";
   echo "There were $numkills losses.<br>&nbsp;<br>\n";
   // first show Entente losses
   COALITIONNAME(1);
   if ($numententelosses == 1){
      echo "The $Coalitionname suffered a single loss:<br>\n";	
   }
   else {
         echo "The $Coalitionname suffered $numententelosses losses:<br>\n";	
   }
   // loop through kills
   for ($i = 0; $i < $numkills; ++$i) {
      COALITION(@$Kcountryid[$i]); // @ suppresses notices
      if ($CoalID == 1) {
         LOSSES($i);
      }
   }
   // then show Central Powers losses
   COALITIONNAME(2);
   if ($numcplosses == 1){
      echo "The $Coalitionname suffered a single loss:<br>\n";	
   }
   else {
      echo "<br>The $Coalitionname suffered $numcplosses losses:<br>\n";	
   }
   // loop through kills
   for ($i = 0; $i < $numkills; ++$i) {
      COALITION(@$Kcountryid[$i]);  // @ supresses notices
      if ($CoalID == 2) {
            LOSSES($i);
      }
   } 
//   if ($CoalID  != 1 ) && ($CoalID != 2 ) {
//      echo "Other Losses<br>/n";
//      LOSSES($i);
//   }

   // Mission Event Chronology (& kill scoring)
   echo "<br>=-=-=-=-=-= Mission Event Chronology =-=-=-=-=-=<br>\n";
   echo "There were $numevents Notable events during this mission.<br>Here are all except any landings by dead pilots:<br>&nbsp;<br>\n";
   // loop through mission events using EVline index
   for ($i = 0; $i < $numevents; ++$i) {
      $j = $EVline[$i];
      CLOCKTIME($Ticks[$j]);
// for debugging missing events
//      echo "EVENT $i, line $j, $Ticks[$j], Type $AType[$j]<br>\n";
      if ($AType[$j] == "0") { // START
         echo "$clocktime Mission Start<br>\n";
      } elseif ($AType[$j] == "3") { // KILL
//         echo "$clocktime KILL<br>\n";
         CLOCKTIME($Ticks[$j]);
         OBJECTTYPE($AID[$j],$Ticks[$j]);
         $attackertype = $objecttype;
         OBJECTNAME($AID[$j],$Ticks[$j]);
         $attackerobject = $objectname;
         PLAYERNAME($AID[$j],$Ticks[$j]);
         $aplayername = $playername;
         OBJECTTYPE($TID[$j],$Ticks[$j]);
         OBJECTNAME($TID[$j],$Ticks[$j]);
	 OBJECTPROPERTIES($objecttype);
         OBJECTCOUNTRYNAME($TID[$j],$Ticks[$j]);
	 COALITION($countryid);
         PLAYERNAME($TID[$j],$Ticks[$j]);
         FLYING($TID[$j],$Ticks[$j]);
         XYZ($POS[$j]);
         WHERE($posx,$posz,0);
//         echo "$i in line # $j, $AID[$j] $TID[$j] in $POS[$j]<br>\n";
//         echo "attackertype = $attackertype, attackerobject = $attackerobject, aplayername= $aplayername, objecttype = $objecttype, playername = $playername, objectname = $objectname<br>\n";
//	 echo "$objecttype is $objectclass<br>\n";
         ANORA($objecttype);
         $a = $anora;
         ANORA($countryadj);
         $ca = $anora;
	 $query = ""; // make sure have empty query
         // get objectnumber for target
	 // NOTE: gameobject ID is NOT NECESSARILY UNIQUE.  See AT13 -
	 // Caquot destroyed at beginning and a Camel have the same
	 // ID!  So the ID is unique at any particular time, but not
	 // over all mission time.  So the following fails in that
	 // case...  reporting a Camel rather than a Caquot.
         // need to add a time factor to make it correct.
	 // Ah... use time of death for object.
         for ($k = 0; $k < $numgobjects; ++$k) {
            $l = $GOline[$k];
            //if (($ID[$l] == $TID[$j]) && ($Deathticks[$l] >= $Ticks[$j])) {
            if (($ID[$l] == $TID[$j])) {
               $tonum = $k;
//               echo "j = $j k = $k l = $l ID[l] = $ID[$l] TID[j] = $TID[$j] Ticks[l] = $Ticks[$l] Ticks[j] = $Ticks[$j]<br>\n";
            }
         }
         if (($AID[$j] == "-1") || ($aplayername == "Intrinsic")) { // AI attacker
//            echo "Lasthitby[$tonum] = $Lasthitby[$tonum]<br>\n";
//            echo "flying = $flying<br>\n";
            if ($Lasthitby[$tonum] == "" ) { // self-inflicted?
               if ($objecttype == "Common Bot") { // SD1 (rare)
		  // already accounted for in FATES
                  echo ("$clocktime $playername was killed $where<br>\n");
               } elseif (preg_match('/^BotGunner/',$playername)) { // SD2a
		  // AI gunner so no need to score
		  BOTGUNNER($objectname);
		  $objecttype = "$countryadj $BotName";
                  echo ("$clocktime $ca $objecttype ($playername) was killed $where<br>\n");

               } elseif (preg_match('/^BotGunner/',$objecttype)) { // SD2b
		  // already accounted for in FATES
		  BOTGUNNER($objecttype);
		  $objecttype = "$countryadj $BotName";
                  echo ("$clocktime $objecttype $playername was killed $where<br>\n");
	       // check if target object is an airplane (Plane)
               } elseif (preg_match('/^P/',$objectclass)) { 
                  if ($flying == 2) { $action = "crashed";}
                  elseif ($flying == 1) { $action = "crashed";}
                  elseif ($flying == 0) { $action = "crashed on takeoff";}
                  elseif ($flying == 3) { $action = "crashed";}
		  // SD3:	
		  echo ("$clocktime $playername's $objecttype $action $where<br>\n");
	 	  if ($StatsCommand == 'do') { // generate an INSERT query	  
//		     echo "\$countryid = $countryid, \$CoalID = $CoalID<br>\n";
		     $query = "INSERT into rof_kills (MissionID,clocktime,attackerID,attackerName,action,targetID,targetName,targetCountryID,targetCoalID) VALUES ('$MissionID','$clocktime','$AID[$j]','$aplayername','$action','$TID[$j]','$objecttype','$countryid','$CoalID')";
//		     echo "$query<br>\n";
		  } elseif ($StatsCommand == 'undo') {  // generate a DELETE query
		     $query = "DELETE from rof_kills where MissionID = '$MissionID' and clocktime = '$clocktime' and targetID = '$TID[$j]'";
		  }
	       // not an airplane
               } else { // SD4:
                  $action = "self-destructed";
                  echo ("$clocktime $ca $countryadj $objecttype ($objectname) $action $where<br>\n");
	 	  if ($StatsCommand == 'do') { // generate an INSERT query	  
//		     echo "\$countryid = $countryid, \$CoalID = $CoalID<br>\n";
		     $query = "INSERT into rof_kills (MissionID,clocktime,attackerID,attackerName,action,targetID,targetName,targetCountryID,targetCoalID) VALUES ('$MissionID','$clocktime','$AID[$j]','$aplayername','$action','$TID[$j]','$objecttype','$countryid','$CoalID')";
//		     echo "$query<br>\n";
		  } elseif ($StatsCommand == 'undo') {  // generate a DELETE query
		     $query = "DELETE from rof_kills where MissionID = '$MissionID' and clocktime = '$clocktime' and targetID = '$TID[$j]'";
		  }
               }
            } else { // hit by someone else - not self-inflicted
               if ($objecttype == "Common Bot") {
                  // A:
                  ANORA($Lasthitby[$tonum]);
                  $a3 = $anora;
                  echo ("$clocktime $a3 $Lasthitby[$tonum] killed $playername $where<br>\n");
               } elseif (preg_match('/^BotGunner/',$objecttype)) {
		  BOTGUNNER($objecttype);
		  $objecttype = "$countryadj $BotName";
                  // B0:
                  echo ("$clocktime $Lasthitby[$tonum] killed $ca $objecttype ($playername) $where<br>\n");
		// not botgunner, perhaps airplane?
               } elseif(preg_match('/^P/',$objectclass)) {
//                  echo "flying = $flying<br>\n";
                  ANORA($Lasthitby[$tonum]);
                  $a2 = $anora;
                  if ($flying == 2) { $action = "shot down";}
                  elseif ($flying == 1) { $action = "shot down";}
                  elseif ($flying == 0) { $action = "destroyed";}
                  elseif ($flying == 3) { $action = "shot down";}
                  if ($TID[$j] == $Lasthitbyid[$tonum]) { $action = "crashed";}
// the following code is either unused or very rarely used - perhaps because not crediting gunner with last hit?
// check on it
                  if (preg_match("/^Turret/",$Lasthitby[$tonum])) { // a player gunner?
                     WHOSEGUNNER($Lasthitbyid[$tonum]);
                     if ( $objectname == $objecttype ) { // C1a (used rarely)
                        echo ("$clocktime $Whosegunner's gunner $aplayername $action $a $objecttype $where<br>\n");
                     } else { // C1b (used rarely)
                        echo ("$clocktime $Whosegunner's gunner $aplayername $action $a $objecttype ($objectname) $where<br>\n");
                     }
                  } else { // D2:
                   echo ("$clocktime $a2 $Lasthitby[$tonum] $action $a $objecttype ($objectname) $where<br>\n");
//            echo "Lasthitby[$tonum] = $Lasthitby[$tonum]<br>\n";
//            echo "TID flying = $flying<br>\n";
		  } 
		// end of elseif airplane, is target a ship?
               } elseif(preg_match('/^S/',$objectclass)) {
		   $action = "sank";
                   echo ("D3:$clocktime $a2 $Lasthitby[$tonum] $action $a $objecttype ($objectname) $where<br>\n");
               } else { // infrastructure is about all that remains 
		   $action = "destroyed";
                   echo ("$clocktime $a2 $Lasthitby[$tonum] $action $a $objecttype ($objectname) $where<br>\n");
               }
	       
            }  // end of not self-inflicted 
         // end of AI attacker
         } else { // must be a human attacker
//             echo "flying = $flying<br>\n";
//             echo "attackertype = $attackertype, attackerobject = $attackerobject, aplayername= $aplayername, objecttype = $objecttype, playername = $playername, objectname = $objectname<br>\n";
            // if flying or if objectname is aerostat, "shot down" else destroyed
            if (preg_match("/^BotGunner/",$objecttype)) {
               BOTGUNNER($objecttype);
	       $objecttype = "$countryadj $BotName";
	    }
            ANORA($objecttype);
            $a = $anora;
            if (($flying == 2) || ($objectname == "Aerostat")) { $action = "shot down";}
            elseif ($flying == 1) { $action = "shot down";}
            elseif ($flying == 0) { $action = "destroyed";}
            elseif ($flying == 3) { $action = "shot down";}
            ANORA($aplayername);
            $a1 = $anora;

            if ("$objectname" == "Common Bot") {
               $objectname = $playername;
               $action = "killed";
               // E:
               echo ("$clocktime $a1 $aplayername $action $objectname $where<br>\n");
            } else {
            ANORA($aplayername);
            $a3 = $anora;
            if (preg_match('/ship/',$objecttype)) { $action = "sank";
               if ($objecttype == "ship_stat_pass") {$objecttype = "stationary passenger ship";}
               if ($objecttype == "ship_stat_tank") {$objecttype = "stationary tanker ship";}
               if ($objecttype == "ship_stat_cargo") {$objecttype = "stationary cargo ship";}
            }
            if ($objecttype == "HMS submarine") { $action = "sank";
            $objecttype = "surfaced $countryadj submarine";}
            if ($objecttype == "GER submarine") { $action = "sank";
            $objecttype = "surfaced $countryadj submarine";}
            if ($objecttype == "ger_med") {
            $objecttype = "$countryadj airfield";}
            if ($objecttype == "GER Ship Searchlight") {$objecttype = "$countryadj ship searchlight";}
            if ($objecttype == "HMS Ship Searchlight") {$objecttype = "$countryadj ship searchlight";}
            if ($objecttype == "GBR Searchlight") {$objecttype = "$countryadj searchlight";}
            // F:
            // F:
            echo ("$clocktime $a3 $aplayername $action $a $objecttype ($objectname) $where<br>\n");
            }
         }
//         echo ("G: $clocktime $attackertype $attackername $aplayername $objecttype $objectname $playername $where<br>\n");
	  
//	 echo "OUTPUT: \$StatsCommnand = $StatsCommand<br>\n";
	 // do we have db work to do?
	 if (($StatsCommand == 'do') || ($StatsCommand == 'undo')) {
	    if ($query) {
	       // process the query
	       if (!mysqli_query($camp_link, $query)) {
	          printf("Error: %s<br>\n", mysqli_sqlstate($camp_link));
		}
	    }
         }
	// end of if KILL
      } elseif ($AType[$j] == "5") { // TAKEOFF
//         echo "$clocktime TAKEOFF<br>\n";
         OBJECTTYPE($PID[$j],$Ticks[$j]);
         PLAYERNAME($PID[$j],$Ticks[$j]);
         ANORA($playername);
         $a = $anora;
         XYZ($POS[$j]);
         WHERE($posx,$posz,1);
         TOFROM($where);
//         echo "$clocktime TAKEOFF<br>\n"; //T1:
         echo "$clocktime $a $playername took off $where<br>\n";
      } elseif ($AType[$j] == "6") { // LANDING
         // T:71580 AType:6 PID:223245 POS(243148.469, 24.424, 57384.961)
         DEAD($PID[$j],$Ticks[$j]);
         if (!$dead) {
            CLOCKTIME($Ticks[$j]);
            OBJECTTYPE($PID[$j],$Ticks[$j]);
            PLAYERNAME($PID[$j],$Ticks[$j]);
            ANORA($playername);
            $a = $anora;
            XYZ($POS[$j]);
            WHERE($posx,$posz,0);
            CRASHED($PID[$j],$Ticks[$j]);
            LANDINGSIDE($PID[$j],$posx,$posz);
            if (!$crashed) { // L1:
               echo ("$clocktime $a $playername landed $where in $side territory<br>\n");
            } else {
               echo ("$clocktime $playername survived a forced/crash landing $where in $side territory<br>\n");
            }
         } else {
// SPECIAL DEBUGGING
//            echo ("pilot is dead<br>\n");
         }
      } elseif ($AType[$j] == "7") { // MISSION_END
         echo "$clocktime Mission End<br>\n";
      }
   }

   if ($DEBUG) {
      echo "<p>DUMP OF SLIGHTLY PROCESSED PARSING RESULTS BY AType<br>DEBUG = $DEBUG</p>\n";
   }

   if ($DEBUG == 1 || $DEBUG == 100) {
      // from START AType:0
      echo ("<p>AType:0 START<br>Ticks, Game Date, Game Time, Mission File, MID(null),<br>Game type, Coalitions, Settings, Mods</p>\n");
      echo ("0 $GDate $GTime $MFile $MID<br>$GType $CNTRS $SETTS $MODS<br>\n");
   }

   if ($DEBUG == 1 || $DEBUG == 101) {
      // from HIT AType:1
         echo ("<p>AType:1 HIT<br>Ticks, AMMO, AID, TID<br>Clock Time, AMMO, Attacker Type, Attacker Name,
         Attacker Pilot, Target Type, Target Name, Target Pilot</p>\n");
      for ($i = 0; $i < $numhits; ++$i) {
         $j = $Hline[$i];
         CLOCKTIME($Ticks[$j]);
         OBJECTTYPE($AID[$j],$Ticks[$j]);
         $attackertype = $objecttype;
         OBJECTNAME($AID[$j],$Ticks[$j]);
         $attackername = $objectname;
         PLAYERNAME($AID[$j],$Ticks[$j]);
         $aplayername = $playername;
         OBJECTTYPE($TID[$j],$Ticks[$j]);
         PLAYERNAME($TID[$j],$Ticks[$j]);
         OBJECTNAME($TID[$j],$Ticks[$j]);
         echo ("$Ticks[$j] $AMMO[$j] $AID[$j] $TID[$j]<br>\n");
         echo ("$clocktime $AMMO[$j] $attackertype $attackername $aplayername $objecttype $objectname $playername<br>\n");
      }
   }
 

   if ($DEBUG == 1 || $DEBUG == 102) {
      // from DAMAGE AType:2
         echo ("<p>AType:2 DAMAGE<br>Ticks, DMG, AID, TID, POS<br>Clock Time, Damage, Attacker Type,
         Attacker Name, Attacker Pilot, Target Type, Target Name, Target Pilot, Position</p>\n");
      for ($i = 0; $i < $numdamage; ++$i) {
         $j = $Dline[$i];
         CLOCKTIME($Ticks[$j]);
         OBJECTTYPE($AID[$j],$Ticks[$j]);
         $attackertype = $objecttype;
         OBJECTNAME($AID[$j],$Ticks[$j]);
         $attackername = $objectname;
         PLAYERNAME($AID[$j],$Ticks[$j]);
         $aplayername = $playername;
         OBJECTTYPE($TID[$j],$Ticks[$j]);
         PLAYERNAME($TID[$j],$Ticks[$j]);
         OBJECTNAME($TID[$j],$Ticks[$j]);
         XYZ($POS[$j]);
         WHERE($posx,$posz,0);
         echo ("$Ticks[$j] $DMG[$j] $AID[$j] $TID[$j] $POS[$j]<br>\n");
         echo ("$clocktime $DMG[$j] $attackertype $attackername $aplayername $objecttype $objectname $playername $where<br>\n");
      }
   }

   if ($DEBUG == 1 || $DEBUG == 103) {
      // from KILL AType:3
         echo ("<p>AType:3 KILL<br>Ticks, AID, TID, POS<br> Clock Time, Attacker Type, Attacker Name,
         Attacker Pilot, Target Type, Target Name, Target Pilot, Position</p>\n");

      for ($i = 0; $i < $numkills; ++$i) {
         $j = $Kline[$i];
         CLOCKTIME($Ticks[$j]);
         OBJECTTYPE($AID[$j],$Ticks[$j]);
         $attackertype = $objecttype;
         OBJECTNAME($AID[$j],$Ticks[$j]);
         $attackername = $objectname;
         PLAYERNAME($AID[$j],$Ticks[$j]);
         $aplayername = $playername;
         OBJECTTYPE($TID[$j],$Ticks[$j]);
         PLAYERNAME($TID[$j],$Ticks[$j]);
         OBJECTNAME($TID[$j],$Ticks[$j]);
         XYZ($POS[$j]);
         WHERE($posx,$posz,0);
         echo ("$Ticks[$j] $AID[$j] $TID[$j] $POS[$j]<br>\n");
         echo ("$clocktime $attackertype $attackername $aplayername $objecttype $objectname $playername $where<br>\n");
      }
   } // close DEBUGKILL wrapper

   if ($DEBUG == 1 || $DEBUG == 104) {
      // from PLAYER_MISSION_END AType:4
         echo ("<p>AType:4 PLAYER_MISSION_END<br>Ticks, PLID, PID, Bullets, Bombs, Position<br>
                Clock Time, Plane, Pilot, Bullets left, Bombs left, Position</p>\n");
      for ($i = 0; $i < $numends; ++$i) {
         $j = $Eline[$i];
         CLOCKTIME($Ticks[$j]);
         PLAYERNAME($PLID[$j],$Ticks[$j]);
         OBJECTTYPE($PLID[$j],$Ticks[$j]);
         XYZ($POS[$j]);
         WHERE($posx,$posz,0);
         echo ("$Ticks[$j] $PLID[$j] $PID[$j] $BUL[$j] $BOMB[$j] $POS[$j]<br>\n");
         echo ("$clocktime $objecttype $playername $BUL[$j] $BOMB[$j] $where<br>\n");
      }
   }

   if ($DEBUG == 1 || $DEBUG == 105) {
      // from TAKEOFF AType:5
         echo ("<p>AType:5 TAKEOFF<br>Ticks, PID, POS<br>
                Clock Time, Plane, Pilot, Position </p>\n");
         for ($i = 0; $i < $numtakeoffs; ++$i) {
         $j = $Tline[$i];
         CLOCKTIME($Ticks[$j]);
         OBJECTTYPE($PID[$j],$Ticks[$j]);
         PLAYERNAME($PID[$j],$Ticks[$j]);
         XYZ($POS[$j]);
         WHERE($posx,$posz,1);
         echo ("$Ticks[$j] $PID[$j] $POS[$j]<br>\n");
         echo ("$clocktime $objecttype $playername $where<br>\n");
      }
   }

   if ($DEBUG == 1 || $DEBUG == 106) {
      // from LANDING AType:6
         echo ("<p>AType:6 LANDING<br>Ticks, PID, POS<br>
                Clock Time, Plane, Pilot, Position</p>\n");
      for ($i = 0; $i < $numlandings; ++$i) {
         $j = $Lline[$i];
         CLOCKTIME($Ticks[$j]);
         OBJECTTYPE($PID[$j],$Ticks[$j]);
         PLAYERNAME($PID[$j],$Ticks[$j]);
         XYZ($POS[$j]);
         WHERE($posx,$posz,0); // the "0" specifies airfields only
         echo ("$Ticks[$j] $PID[$j] $POS[$j]<br>\n");
         echo ("$clocktime $objecttype $playername $where<br>\n");
      }
   }

   if ($DEBUG == 1 || $DEBUG == 107) {
      // from MISSION_END AType:7
      echo ("<p>AType:7 MISSION_END</p>\n");
      CLOCKTIME($endticks);
      echo ("endticks clocktime<br>\n");
      echo ("$endticks $clocktime<br>\n");
   }

   if ($DEBUG == 1 || $DEBUG == 108) {
      // from MISSION_OBJECTIVE AType:8
      echo ("<p>AType:8 MISSION_OBJECTIVE<br>Ticks, Objective ID, Position, Coalition, Type, Result</p>\n");
      for ($i = 0; $i < $numlines; ++$i) {
         if ("$AType[$i]" == "8") {
            XYZ($POS[$i]);
            WHERE($posx,$posz,0);
            echo ("$Ticks[$i] $OBJID[$i] $POS[$i] $COAL[$i] $TYPE[$i] $RES[$i]<br>\n");
            echo ("$Ticks[$i] $OBJID[$i] $where $COAL[$i] $TYPE[$i] $RES[$i]<br>\n");
         }
      }
   }

   if ($DEBUG == 1 || $DEBUG == 109) {
      // from AIRFIELD AType:9
      echo ("<p>AType:9 AIRFIELD<br>Airfield ID, Country, Position, IDs of players stationed here?</p>\n");
      for ($i = 0; $i < $numlines; ++$i) {
         if ("$AType[$i]" == "9") {
            XYZ($POS[$i]);
            WHERE($posx,$posz,0);
            COUNTRYNAME($COUNTRY[$i]); 
            echo ("$AID[$i] $COUNTRY[$i] $POS[$i] $IDS[$i]<br>\n");
            echo ("$AID[$i] $countryname $where $IDS[$i]<br>\n");
         }
      }
   }

   if ($DEBUG == 1 || $DEBUG == 110) {
      // from PLAYERPLANE AType:10
      //   echo ("<p>PLAYERPLANE # $Ticks[$i] $PLID[$i] $PID[$i] $BUL[$i] $SH[$i] $BOMB[$i] $RCT[$i] $POS[$i] $IDS[$i] $LOGIN[$i] $NAME[$i] $TYPE[$i] $COUNTRY[$i] $FORM[$i] $FIELD[$i] $INAIR[$i] $PARENT[$i]<p>\n");
      echo ("<p>AType:10 PLAYERPLANE, # $numplayers Players<br># Clock Time, Player Name, PLID, PID, BUL, BOMB, Plane Type, Country</p>\n");
      for ($i = 0; $i < $numplayers; ++$i) {
         $j = $Pline[$i];
         CLOCKTIME($Ticks[$j]);
         COUNTRYNAME($COUNTRY[$j]); 
//         echo ("$i $clocktime $NAME[$j] $PLID[$j] $PID[$j] $BUL[$j] $BOMB[$j] $TYPE[$j] $COUNTRY[$j]<br>\n");
         echo ("$i $clocktime $NAME[$j] $PLID[$j] $PID[$j] $BUL[$j] $BOMB[$j] $TYPE[$j] $countryname<br>\n");
      }
   }

   if ($DEBUG == 1 || $DEBUG == 111) {
      // from GROUPINIT AType:11
      echo ("<p>AType:11 GROUPINIT<br># Clock Time  GID  IDS  LID</p>\n");
      for ($i = 0; $i < $numgroups; ++$i) {
         $j = $Gline[$i]; 
         CLOCKTIME($Ticks[$j]);
         echo ("<p>$i $clocktime $GID[$j] $IDS[$j] $LID[$j]</p>\n");
      }
   }

   if ($DEBUG == 1 || $DEBUG == 112) {
      // from GAMEOBJECTINVOLVED AType:12
      echo ("<p>AType:12 GAMEOBJECTINVOLVED<br># Clock Time, ID, TYPE, NAME, Country, PID</p>\n");
      for ($i = 0; $i < $numgobjects; ++$i) {
         $j = $GOline[$i]; 
         CLOCKTIME($Ticks[$j]);
         COUNTRYNAME($COUNTRY[$j]); 
         OBJECTTYPE($ID[$j],$Ticks[$j]); 
         OBJECTNAME($ID[$j],$Ticks[$j]);
         echo ("$i $clocktime $ID[$j] $TYPE[$j] $NAME[$j] $countryname $PID[$j]<br>\n");
      }
   }

   if ($DEBUG == 1 || $DEBUG == 113) {
      // from INFLUENCEAREA_HEADER AType:13
      echo ("<p>AType:13 INFLUENCEAREA_HEADER<br>Clock Time, Area ID, Country, Enabled, By Coalition Inflight Count <br>(Neutral,Entente,Central Powers,War Dogs,Mercenaries,Corsairs,Future)</p>\n");
      for ($i = 0; $i < $numlines; ++$i) {
         if ("$AType[$i]" == "13") {
            CLOCKTIME($Ticks[$i]);
            echo ("$clocktime $AID[$i] $COUNTRY[$i] $ENABLED[$i] $BC[$i]<br>\n");
         }
      }
   }

   if ($DEBUG == 1 || $DEBUG == 114) {
      // from INFLUENCEAREA_BOUNDARY AType:14
      echo ("<p>AType:14 INFLUENCEAREA_BOUNDARY<br>Ticks, Area ID, Boundary Points</p>\n");
      for ($i = 0; $i < $numlines; ++$i) {
         if ("$AType[$i]" == "14") {
         echo ("$Ticks[$i] $AID[$i] $BP[$i]<br>\n");
         }
      }
   }

   if ($DEBUG == 1 || $DEBUG == 115) {
      // from VERSION AType:15
      echo ("<p>AType:15 VERSION<br>Ticks, Version</p><p>0 15 (over and over again) :)</p>\n");
   //   for ($i = 0; $i < $numlines; ++$i) {
   //      if ("$AType[$i]" == "15") {
   //      echo ("$Ticks[$i] $VER[$i]<br>\n");
   //      }
   //   }
   } // final $DEBUG ... haven't found a use for AType 15 or 16.
}
?>
