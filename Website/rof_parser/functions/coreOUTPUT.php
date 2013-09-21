<?php

function OUTPUT() {
// temporarily output simple text report
// eventually this will be a web page
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
   global $LOCATIONSFILE; // which map locations are we using?
   global $numiaheaders; // number of influence area headers
   global $IAHline; // lines defining Influence Area Headers
   global $Bline; // lines defining area boundaries
   global $side; // "friendly", "enemy" or "neutral"

   # require the is-point-in-area borrowed class
   require ('rof_parser/classes/pointLocation.php');

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
   if ($LOCATIONSFILE == "RoF_locations.csv") {echo "Map: Western Front<br>&nbsp;<br>\n";}
   if ($LOCATIONSFILE == "Verdun_locations.csv") {echo "Map: Verdun<br>&nbsp;<br>\n";}
   if ($LOCATIONSFILE == "Lake_locations.csv") {echo "Map: Lake<br>&nbsp;<br>\n";}
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

   // Mission Event Chronology
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
         PLAYERNAME($TID[$j],$Ticks[$j]);
         OBJECTNAME($TID[$j],$Ticks[$j]);
         OBJECTCOUNTRYNAME($TID[$j],$Ticks[$j]);
         FLYING($TID[$j],$Ticks[$j]);
         XYZ($POS[$j]);
         WHERE($posx,$posz,0);
//         echo "$i in line # $j, $AID[$j] $TID[$j] in $POS[$j]<br>\n";
//         echo "attackertype = $attackertype, attackerobject = $attackerobject, aplayername= $aplayername, objecttype = $objecttype, playername = $playername, objectname = $objectname<br>\n";
         ANORA($objecttype);
         $a = $anora;
         ANORA($countryadj);
         $ca = $anora;
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
               if ($objecttype == "Common Bot") {
                  echo ("$clocktime $playername was killed $where<br>\n");
               } elseif ($objecttype == "BotGunnerG5_1") { // used in DFW also GK1:
                  echo ("$clocktime $ca $countryadj gunner ($playername) was killed $where<br>\n");
               } elseif ($objecttype == "BotGunnerG5_2") { //GK2:
                  echo ("$clocktime $ca $countryadj gunner ($playername) was killed $where<br>\n"); // used in DFW also
               } elseif ($objecttype == "BotGunnerDavis") { //GK2:
                  echo ("$clocktime $ca $countryadj gunner ($playername) was killed $where<br>\n"); // used in HP and Felixstow 
               } elseif ($objecttype == "BotGunnerBacker") { 
                  echo ("$clocktime $ca $countryadj Gotha G.V gunner ($playername) was killed $where<br>\n"); // is this particular Becker used elsewhere?
               } elseif ($objecttype == "BotGunnerBW12") { 
                  echo ("$clocktime $ca $countryadj Brandenburg W12 gunner ($playername) was killed $where<br>\n");
               } elseif ($objecttype == "BotGunnerHCL2") { 
                  echo ("$clocktime $ca $countryadj Halberstadt CL.II gunner ($playername) was killed $where<br>\n"); // is this particular Becker used elsewhere?
               } elseif ($objecttype == "BotGunnerHP400_1") {
                  echo ("$clocktime a Handley Page 0/400 nose gunner ($playername) was killed $where<br>\n");
               } elseif ($objecttype == "BotGunnerHP400_2") {
                  echo ("$clocktime a Handley Page 0/400 dorsal gunner ($playername) was killed $where<br>\n");
               } elseif ($objecttype == "BotGunnerHP400_2_WM") {
                  echo ("$clocktime a Handley Page 0/400 dorsal gunner ($playername) was killed $where<br>\n");
               } elseif ($objecttype == "BotGunnerHP400_3") {
                  echo ("$clocktime a Handley Page 0/400 ventral gunner ($playername) was killed $where<br>\n");
               } elseif ($objecttype == "BotGunnerBreguet14") { // also used in Bristol F2B and F.E.2b
                  echo ("$clocktime $ca $countryadj Breguet 14.B2 gunner ($playername) was killed $where<br>\n");
               } elseif ($objecttype == "BotGunnerRE8") {
                  echo ("$clocktime $ca $countryadj gunner ($playername) was killed $where<br>\n");
               } elseif ($objecttype == "BotGunnerFelix_top-twin") {
                  echo ("$clocktime a FelixStowe F2A top gunner ($playername) was killed $where<br>\n");
               } elseif ($objecttype == "BotGunnerFe2_sing") {
                  echo ("$clocktime an F.E.2b gunner ($playername) was killed $where<br>\n");

               } elseif ($objectname == "Plane") {
                  if ($flying == 2) { $action = "crashed";}
                  elseif ($flying == 1) { $action = "crashed";}
                  elseif ($flying == 0) { $action = "crashed on takeoff";}
                  elseif ($flying == 3) { $action = "crashed";}
                  echo ("$clocktime $playername's $objecttype $action $where<br>\n");
               } elseif (($objectname == "Aerostat") || ($objectname == "Train" ) ||
                  ($objectname == "Vehicle") || ($objectname == "Wagon")) {
                  echo ("$clocktime $a $objecttype ($objectname) was destroyed $where<br>\n");
               } else { // U1:
                  echo ("$clocktime $playername's $objecttype ($objectname) was rendered unserviceable $where<br>\n");
               }
            } else {
               if ($objecttype == "Common Bot") {
                  // A:
                  ANORA($Lasthitby[$tonum]);
                  $a3 = $anora;
                  echo ("$clocktime $a3 $Lasthitby[$tonum] killed $playername $where<br>\n");
               } elseif ($objecttype == "BotGunnerG5_1") { // used in DFW also
                  // B0:
                  echo ("$clocktime $Lasthitby[$tonum] killed $ca $countryadj gunner ($playername) $where<br>\n");
               } elseif ($objecttype == "BotGunnerG5_2") { // used in DFW also
                  // B1:
                  echo ("$clocktime $Lasthitby[$tonum] killed $ca $countryadj gunner($playername)  $where<br>\n");
               } elseif ($objecttype == "BotGunnerBacker") {
                  // B1b1:
                  echo ("$clocktime $Lasthitby[$tonum] killed a Gotha G.V gunner ($playername) $where<br>\n");
               } elseif ($objecttype == "BotGunnerBW12") {
                  // B1b2:
                  echo ("$clocktime $Lasthitby[$tonum] killed a Brandenburg W12 gunner ($playername) $where<br>\n");
               } elseif ($objecttype == "BotGunnerHCL2") {
                  // B1c:
                  echo ("$clocktime $Lasthitby[$tonum] killed a Halberstadt CL.II gunner ($playername) $where<br>\n");
               } elseif ($objecttype == "BotGunnerHP400_1") {
                  // B2:
                  echo ("$clocktime $Lasthitby[$tonum] killed a Handley Page 0/400 nose gunner ($playername) $where<br>\n");
               } elseif ($objecttype == "BotGunnerHP400_2") {
                  // B3a:
                  echo ("$clocktime $Lasthitby[$tonum] killed a Handley Page 0/400 dorsal gunner ($playername) $where<br>\n");
               } elseif ($objecttype == "BotGunnerHP400_2_WM") {
                  // B3b:
                  echo ("$clocktime $Lasthitby[$tonum] killed a Handley Page 0/400 dorsal gunner ($playername) $where<br>\n");
               } elseif ($objecttype == "BotGunnerHP400_3") {
                  // B4:
                  echo ("$clocktime $Lasthitby[$tonum] killed a Handley Page 0/400 ventral gunner ($playername) $where<br>\n");
               } elseif ($objecttype == "BotGunnerFelix_top-twin") {
                  // B5:
                  echo ("$clocktime $Lasthitby[$tonum] killed a Felixstow F2A top gunner ($playername) $where<br>\n");
               } elseif ($objecttype == "BotGunnerFe2_sing") {
                  // B5:
                  echo ("$clocktime $Lasthitby[$tonum] killed an F.E.2b gunner ($playername) $where<br>\n");
               } else {
//                  echo "flying = $flying<br>\n";
                  ANORA($Lasthitby[$tonum]);
                  $a2 = $anora;
                  if ($flying == 2) { $action = "shot down";}
                  elseif ($flying == 1) { $action = "shot down";}
                  elseif ($flying == 0) { $action = "destroyed";}
                  elseif ($flying == 3) { $action = "shot down";}
                  if ($TID[$j] == $Lasthitbyid[$tonum]) { $action = "crashed";}
                  if (preg_match("/^Turret/",$Lasthitby[$tonum])) { // a gunner
                     WHOSEGUNNER($Lasthitbyid[$tonum]);
                     if (($objectname == "Plane") || ($objectname == $objecttype)) { // C1:
                        echo ("$clocktime $Whosegunner gunner $action $a $objecttype $where<br>\n");
                     } else { // D1
                        echo ("$clocktime $Whosegunner gunner $action $a $objecttype ($objectname) $where<br>\n");
                     }
                  } elseif ($objectname == "Plane") { // C2:
                     echo ("C2: $clocktime $a2 $Lasthitby[$tonum] $action $a $objecttype $where<br>\n");
//                     echo ":$i in line # $j, $AID[$j] $TID[$j] in $POS[$j]<br>\n";
                   } elseif ($objectname == $objecttype) { // C3:
                     if ($objecttype == "BotGunnerG5_1") { // used in DFW also
                       echo ("$clocktime $a2 $lasthitby[$tonum] $action $ca $countryadj gunner ($playername)<br>\n");
                     } elseif ($objecttype == "BotGunnerG5_2") { // used in DFW also
                       echo ("$clocktime $a2 $Lasthitby[$tonum] $action $ca $countryadj gunner ($playername)<br>\n");
                     } elseif ($objecttype == "BotGunnerBacker") {
                       echo ("$clocktime $a2 $Lasthitby[$tonum] $action a Gotha G.V gunner ($playername)<br>\n");
                     } elseif ($objecttype == "BotGunnerBW12") {
                       echo ("$clocktime $a2 $Lasthitby[$tonum] $action a Brandenburg W12 gunner ($playername)<br>\n");
                     } elseif ($objecttype == "BotGunnerHCL2") {
                       echo ("$clocktime $a2 $Lasthitby[$tonum] $action a Halberstadt CL.II gunner ($playername)<br>\n");
                     } elseif ($objecttype == "BotGunnerHP400_1") {
                       echo ("$clocktime $a2 $Lasthitby[$tonum] $action a Handley Page 0/400 nose gunner ($playername)<br>\n");
                     } elseif ($objecttype == "BotGunnerHP400_2") {
                       echo ("$clocktime $a2 $Lasthitby[$tonum] $action a Handley Page 0/400 dorsal gunner ($playername)<br>\n");
                     } elseif ($objecttype == "BotGunnerHP400_2_WM") {
                       echo ("$clocktime $a2 $Lasthitby[$tonum] $action a Handley Page 0/400 dorsal gunner ($playername)<br>\n");
                     } elseif ($objecttype == "BotGunnerHP400_3") {
                       echo ("$clocktime $a2 $Lasthitby[$tonum] $action a Handley Page 0/400 ventral gunner ($playername)<br>\n");
                     } elseif ($objecttype == "BotGunnerBreguet14") { // also used in Bristol F2B and F.E.2b
                     } elseif ($objecttype == "BotGunnerFelix_top-twin") {
                       echo ("$clocktime $a2 $Lasthitby[$tonum] $action a Felixstowe F2A top gunner ($playername)<br>\n");
                     } elseif ($objecttype == "BotGunnerFe2_sing") {
                       echo ("$clocktime $a2 $Lasthitby[$tonum] $action an F.E.2b gunner ($playername)<br>\n");
                     } else { // D1:
                     echo ("$clocktime $a2 $Lasthitby[$tonum] $action $a $objecttype $where<br>\n");
                     }
                  } else { // D2:
                     echo ("$clocktime $a2 $Lasthitby[$tonum] $action $a $objecttype ($objectname) $where<br>\n");
//            echo "Lasthitby[$tonum] = $Lasthitby[$tonum]<br>\n";
//            echo "TID flying = $flying<br>\n";
                  }
               }
            }
         } else {
//             echo "flying = $flying<br>\n";
//             echo "attackertype = $attackertype, attackerobject = $attackerobject, aplayername= $aplayername, objecttype = $objecttype, playername = $playername, objectname = $objectname<br>\n";
            // if flying or if objectname is aerostat, "shot down" else destroyed
            if ($objecttype == "BotGunnerG5_1") { $objecttype = "$countryadj gunner"; } // used in DFW also
            elseif ($objecttype == "BotGunnerG5_2") { $objecttype = "$countryadj gunner"; } // used in DFW also
            elseif ($objecttype == "BotGunnerHP400_1") { $objecttype =  "$countryadj nose gunner";} // also used in Felixstowe F2A
            elseif ($objecttype == "BotGunnerHP400_2") { $objecttype =  "Handley Page 0/400 dorsal gunner";}
            elseif ($objecttype == "BotGunnerHP400_2_WM") { $objecttype =  "Handley Page 0/400 dorsal gunner";}
            elseif ($objecttype == "BotGunnerHP400_3") { $objecttype =  "Handley Page 0/400 ventral gunner";}
            elseif ($objecttype == "BotGunnerBreguet14") { $objecttype = "$countryadj gunner"; } // also used in Bristol F2B and F.E.2b
            elseif ($objecttype == "BotGunnerFelix_top-twin") { $objecttype = "Felixstowe F2A top gunner"; } 
            elseif ($objecttype == "BotGunnerFe2_sing") { $objecttype = "F.E.2b gunner"; } 
            elseif ($objecttype == "BotGunnerBW12") { $objecttype = "Brandenburg W12 gunner"; } 
            elseif ($objecttype == "BotGunnerHCL2") { $objecttype = "Halberstadt CL.II gunner"; } 
            ANORA($objecttype);
            $a = $anora;
            if (($flying == 2) || ($objectname == "Aerostat")) { $action = "shot down";}
            elseif ($flying == 1) { $action = "shot down";}
            elseif ($flying == 0) { $action = "destroyed";}
            elseif ($flying == 3) { $action = "shot down";}
            if ("$aplayername" == "Vehicle") { $aplayername = $attackertype;} 
            if ($aplayername == "TurretDH4_1") {$aplayername = "D.H.4 gunner";}
            if ($aplayername == "TurretDH4_1_WM") {$aplayername = "D.H.4 gunner";}
            if ($aplayername == "TurretDFWC_1") {$aplayername = "DFW C.V gunner";}
            if ($aplayername == "TurretDFWC_1_WM_Twin_Parabellum") {$aplayername = "DFW C.V gunner";}
            if ($aplayername == "TurretDFWC_1_WM_Becker_HEAP") {$aplayername = "DFW C.V gunner";}
            if ($aplayername == "TurretRE8_1") {$aplayername = "R.E.8 gunner";}
            if ($aplayername == "TurretRE8_1_WM2") {$aplayername = "R.E.8 gunner";}
            if ($aplayername == "TurretHalberstadtCL2_1") {$aplayername = "Halberstadt CL.II gunner";}
            if ($aplayername == "TurretHalberstadtCL2au_1_WM_TwinPar") {$aplayername = "Halberstadt CLIIau gunner";}
            if ($aplayername == "TurretBristolF2B_1") {$aplayername = "Bristol F2.B gunner";}
            if ($aplayername == "TurretBristolF2BF2_1_WM2") {$aplayername = "Bristol F2.B gunner";}
		    if ($aplayername == "TurretBristolF2BF3_1_WM2") {$aplayername = "Bristol F2.B gunner";}
            if ($aplayername == "TurretFe2b_1") {$aplayername = "F.E.2b gunner";}
            if ($aplayername == "TurretFe2b_1_WM") {$aplayername = "F.E.2b gunner";}
            if ($aplayername == "TurretFelixF2A_2") {$aplayername = "Felixstowe F2A gunner";}
            if ($aplayername == "TurretFelixF2A_3") {$aplayername = "Felixstowe F2A gunner";}
            if ($aplayername == "TurretFelixF2A_3_WM") {$aplayername = "Felixstowe F2A gunner";}
            if ($aplayername == "TurretBW12_1_WM_Twin_Parabellum") {$aplayername = "Brandenburg W12 gunner";}
            if ($aplayername == "TurretRolandC2a_1") {$aplayername = "Roland C.IIa gunner";}
            if ($aplayername == "TurretRolandC2a_1_WM_TwinPar") {$aplayername = "Roland C.IIa gunner";}
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
