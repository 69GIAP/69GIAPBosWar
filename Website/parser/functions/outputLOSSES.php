<?php
// LOSSES
// list kills of all types, and record them in post_mortem
// =69.GIAP=TUSHKA
// 2011-2013
// BOSWAR version 1.02
// May 16, 2014

function LOSSES($i) {
	// $i is kill number
	global $Kline; //  lines that define kills
	global $Ticks; // time since start of mission in 1/50 sec ticks
	global $clocktime; // 24 hr time
	global $TID; // target ID
	global $objecttype; // object type from PID/AID/TID
	global $objectname; // object name from PID/AID/TID
	global $playername; // player name from PLID
	global $countryid; // country id
	global $countryadj;  // adjective form of country name 
	global $anora; // an or a
	global $object_desc; // object description from rof_object_properties
	global $CoalID; // coalition ID
	global $mission_number;  // current mission number
	global $camp_link; // link to campaign db
	global $StatsCommand; // do, undo, or ignore
	global $camp_db; // campaign db


	$j = $Kline[$i];
	CLOCKTIME($Ticks[$j]);
	OBJECTTYPE($TID[$j],$Ticks[$j]);
	PLAYERNAME($TID[$j],$Ticks[$j]);
	OBJECTNAME($TID[$j],$Ticks[$j]);
	OBJECTPROPERTIES($objecttype);
	OBJECTCOUNTRYNAME($TID[$j],$Ticks[$j]);

	ANORA($countryadj);
	$a = $anora;

	if ("$objectname" == "Common Bot")  {
		echo ("$clocktime  $countryadj pilot $playername<br>\n");
	} else { // not a player
		echo ("$clocktime $a $countryadj $object_desc ($objectname)<br>\n");
		$model = get_ObjectModel($objecttype);
		if ($model) {
			if ($StatsCommand == 'do') { // generate an INSERT query
				$query = "INSERT into post_mortem (Name,Model,coalition,country,mission_no,damage) VALUES
					('$objectname','$model','$CoalID','$countryid','$mission_number','9')";
			} elseif ($StatsCommand == 'undo') {  // generate a DELETE query
				$query = "DELETE from post_mortem where mission_no='$mission_number' AND Model='$model' AND country='$countryid' LIMIT 1";
			}
			if (($StatsCommand == 'do') || ($StatsCommand == 'undo')) {
				// process the query
				if (!$camp_link->query($query)) {
					echo "$query<br />\n";
					printf("outputLOSSES error: %s<br>\n", $camp_link->error);
				}
			}
		}
	}
}
?>
