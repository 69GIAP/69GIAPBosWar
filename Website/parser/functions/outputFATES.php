<?php
// FATES
// report player fates
// =69.GIAP=TUSHKA
// 2011-2014
// BOSWAR version 1.06
// Jan 6, 2014

function FATES($i,$j) {
	// $i is playernumber
	// $j is linenumber defining that player.
	global $DEBUG; // are we debugging?
	global $COUNTRY; // country ID
	global $countryname; // country name
	global $CoalID; // coalition ID
	global $TYPE; // type of plane in this context
	global $anora; // an or a
	global $Whosegunner; // player piloting this gunner
	global $Wound; // array holding severity of wound
	global $Woundticks; // ticks when last wounded
	global $Woundpos; // position where last wounded
	global $Death; // dead players numbers
	global $Deathticks; // ticks when died
	global $Deathpos; // position where died
	global $Eline; // lines that define mission ends
	global $numends; // number of mission ends
	global $posx; // X coordinate
	global $posz; // Z coordinate
	global $side; // "friendly", "enemy" or "neutral"
	global $NAME; // player profile name
	global $numlandings; // number of landings
	global $numtakeoffs; // number of takeoffs
	global $Lline;  // landing lines
	global $Tline;  // takeoff lines
	global $PID; // plane ID (whether bot or player)
	global $PLID; // player plane id
	global $Ticks; // time since start of mission in 1/50 sec ticks
	global $POS; // position x,y,z
	global $MissionID; // mission ID (name-date-time)
	global $camp_link; // link to campaign db
	global $StatsCommand; // do, undo, or ignore
	global $camp_db; // campaign db
	global $object_class; // object class from object_properties
	global $object_desc; // object description

	// PlayerFate ($fate):
	// 0 = did not take off
	// 1 = landed (pilot) / survived (gunner)
	// 2 = did not land
	// 3 = crashed (not set in this function)
	// 4 = was captured (not set in this function)
	// 5 = was killed
 
	// PlayerHealth ($health)
	// 0 = fit as a fiddle
	// 1 = minor injuries
	// 2 = serious injuries
	// 3 = critical injuries
	// 4 = dead
 
//if (true){
//if ($DEBUG){
//	print "DEBUG FATES configuration:<br>\n";
//	print "FinishFlightOnlyLanded = ".FinishFlightOnlyLanded."<br>\n";
//	print "critical_w_gunner = ".critical_w_gunner."<br>\n";
//}

	// initialize $fate and $health
	$Whosegunner = '';
	$fate = 0;
	$health = 0;

	// get "", "a" or "an" right for the plane
	ANORA($TYPE[$j]);
	$a = $anora;
	// save player id
	$plid = $PLID[$j];
	// get player's country name
	COUNTRYNAME($COUNTRY[$j]);
	// get object_class and object_desc
	TURRETGUNNER($j);
	WHOSEGUNNER($plid);   
	ANORA($object_desc);
	$ag = $anora;

	// now print out the fate of the player
	if ($Death[$i]) { // player has been killed
		$clocktime = CLOCKTIME($Deathticks[$i]);
		XYZ($Deathpos[$i]);
		$where = WHERE($posx,$posz,0);
		$fate = 5;
		$health = 4;
		if ($object_class == 'TUR') { //G1:
			echo "$NAME[$j] as $ag $object_desc for $countryname was killed at $clocktime $where<br>\n";
		} else { // not gunner so must be pilot
			echo "$NAME[$j] piloting $a $TYPE[$j] for $countryname was killed at $clocktime $where<br>\n";
		}
	} elseif ($Wound[$i]) { // player is alive but has been wounded
		$clocktime = CLOCKTIME($Woundticks[$i]);
		XYZ($Woundpos[$i]);
		$where = WHERE($posx,$posz,0);
		// how seriously wounded?
		if ($Wound[$i] > .66) {
			$health = 3;
			$injuries = "critical injuries";
		}
		else if ($Wound[$i] > .33) {
			$health = 2;
			$injuries = "serious injuries";
		} else {
			$health = 1;
			$injuries = "minor injuries";
		}
		if ($object_class == 'TUR') { //G2:
			echo "$NAME[$j] as $ag $object_desc for $countryname suffered $injuries at $clocktime $where<br>\n";
		} else { // not gunner so must be pilot
			echo "$NAME[$j] piloting $a $TYPE[$j] for $countryname suffered $injuries at $clocktime $where<br>\n";
		}
	}  else { // player is unwounded
		// loop through landings to report landing
//		echo "landing loop<br>\n";
		$landed = "";
		for ($k = 0; $k < $numlandings; ++$k) {
			$l = $Lline[$k];
			if ($PLID[$j] == $PID[$l]) {
				$clocktime = CLOCKTIME($Ticks[$l]);
				XYZ($POS[$l]);
				$where = WHERE($posx,$posz,0);
//				echo "PID[$j] = $PID[$j], PLID[$j] = $PLID[$j], PID[$l] = $PID[$l]<br>\n";
				// check whether captured - but what about spy/pilot rescue?
				// perhaps should only check if can't take off again.
//					    if ($side == 'enemy') {
//							$fate = 4;
//							$landed = "landed and was captured at $clocktime $where";
//						} else {
				$fate = 1;
				$landed = "landed at $clocktime $where";
//						}
			}
		} // end landing check

		if (($landed == "") && (FinishFlightOnlyLanded == 'true')) {
//		echo "FD check<br>\n";
		// this is the "FD" check.  Twice in a row his landings were not reported.
		// loop through reported finishes... only possible if landed.
			for ($k = 0; $k < $numends; ++$k) {
				$l = $Eline[$k]; 
				if ($PLID[$j] == $PLID[$l]) {
					$clocktime = CLOCKTIME($Ticks[$l]);
					XYZ($POS[$l]);
					$where = WHERE($posx,$posz,0);
//					echo "PLID[$j] = $PLID[$j], PLID[$j] = $PLID[$j]<br>\n";
					$fate = 1;
					$landed = "landed at $clocktime $where";
				}
			}
		} // end FinishFlightOnlyLanded landing check

		if ($landed == "") { // player never landed
			// loop through takeoffs to make sure player took off
			$tookoff = 0;
			for ($k = 0; $k < $numtakeoffs; ++$k) {
				$l = $Tline[$k];
				if ($PLID[$j] == $PID[$l]) {
					$tookoff = 1;
				}
			}
			if ($tookoff == 0) { // player never took off
				$fate = 0;
				$landed = "did not take off, surviving to fight another day";
			} else {
				$fate = 2;
				$landed = "did not land";
			}
		} // end takeoff check

		if ($object_class == 'TUR') { // gunners do not take off or land independently G3:
			echo "$NAME[$j] as $ag $object_desc for $countryname survived safe and sound<br>\n";
		} else { //  pilot player took off and landed
			echo "$NAME[$j] piloting $a $TYPE[$j] for $countryname $landed<br>\n";
		}
	} // end unwounded
	// record stats for pilot/gunner fates
	   // first get coalition for player's country
	   COALITION($COUNTRY[$j]);
//	   echo "\$j = $j; \$COUNTRY[\$j] = $COUNTRY[$j], \$CoalID = $CoalID<br>\n";

	   if ($StatsCommand == 'do') { // generate an INSERT query
			if ($object_class == 'TUR') { // gunner
				if ($health == 4 ) { // dead gunner
					$GunnerNegScore = kia_gunner;
				} elseif ($health == 3) { // critically wounded gunner
					$GunnerNegScore = critical_w_gunner;
				} elseif ($health == 2) { // seriously wounded gunner
					$GunnerNegScore = serious_w_gunner;
				} elseif ($health == 1) { // lightly wounded gunner
					$GunnerNegScore = light_w_gunner;
				} else { // healthy gunner - no deduction 
					$GunnerNegScore = healthy;
				}
				$query = "INSERT into gunner_scores
					(MissionID,CoalID,country,GunnerName,plid,GunningFor,GunnerFate,GunnerHealth,GunnerNegScore) VALUES 
					('$MissionID','$CoalID','$COUNTRY[$j]','$NAME[$j]','$plid','$Whosegunner','$fate','$health','$GunnerNegScore')";
			} else { // pilot
				if ($health == 4 ) { // dead pilot
					$PilotNegScore = kia_pilot;
				} elseif ($health == 3) { // critically wounded pilot
					$PilotNegScore = critical_w_pilot;
				} elseif ($health == 2) { // seriously wounded pilot
					$PilotNegScore = serious_w_pilot;
				} elseif ($health == 1) { // lightly wounded pilot
					$PilotNegScore = light_w_pilot;
				} else { // healthy pilot - no deduction
					$PilotNegScore = healthy;
				}
				$query = "INSERT into pilot_scores 
					(MissionID,CoalID,country,PilotName,plid,PilotFate,PilotHealth,PilotNegScore) VALUES 
					('$MissionID','$CoalID','$COUNTRY[$j]','$NAME[$j]','$plid','$fate','$health','$PilotNegScore')";
			}
		} elseif ($StatsCommand == 'undo') {  // generate a DELETE query
		if ($object_class == 'TUR') {
			$query = "DELETE from gunner_scores WHERE MissionID='$MissionID' AND GunnerName='$NAME[$j]' AND plid='$plid'";
		} else { // pilot
			$query = "DELETE from pilot_scores WHERE MissionID='$MissionID' AND PilotName='$NAME[$j]' AND plid='$plid'";
		}
	}

	   if (($StatsCommand == 'do') || ($StatsCommand == 'undo')) {
			// process the query
			if (!$camp_link->query($query)) {
				echo "$query<br />\n";
			printf("outputFATES error: %s<br>\n", $camp_link->error);
	
		}
	}
} // end function
?>
