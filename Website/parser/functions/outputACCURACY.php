<?php
function ACCURACY($i, $j) {
// determine shooting and bombing accuracy for a player
// this needs rewriting because it doesn't subtract a
// player gunner's bullets from the pilot's total
// In this case the DB is our friend.  We can store
// information there temporarily and retrieve it later
// =69.GIAP=TUSHKA
// 2011-2013
// BOSWAR version 1.01
// Dec 15, 2013	

	// $i is playernumber
	// $j is linenumber defining that player.

	global $End; // player ended (or not)
	global $NAME; // player profile name
	global $TYPE; // gameobject type in this context
	global $ShotBUL; // shot bullets
	global $HitBUL; // bullet hits
	global $BOMB; // # of bombs
	global $DroppedBOMB; // dropped bombs
	global $HitBOMB; // bomb hits

	if (!$End[$i]) { // we have no end data
		echo "Note: $NAME[$j] has no player-mission-end data, so assume no ammo expended<br>\n";
	}
	if (preg_match('/^Turret/',$TYPE[$j])) { // player is a gunner
		if (!$ShotBUL[$i]) { // no bullets shot
			echo "gunner $NAME[$j] shot no bullets<br>\n";
		} else { // can calculate bullet stats
			$bulletaccuracy = ( 100 * $HitBUL[$i] / $ShotBUL[$i] );
			$bulletaccuracy = sprintf("%.2f",$bulletaccuracy);
			echo "gunner $NAME[$j] shot $ShotBUL[$i] bullets with $HitBUL[$i] hits for $bulletaccuracy% accuracy<br>\n";
		}
	}
	elseif (!$BOMB[$j]) { // no bombs aboard
		if (!$ShotBUL[$i]) { // no bullets shot
			echo "pilot $NAME[$j] shot no bullets and carried no bombs<br>\n";
		} else { // can calculate bullet stats
			$bulletaccuracy = ( 100 * $HitBUL[$i] / $ShotBUL[$i] );
			$bulletaccuracy = sprintf("%.2f",$bulletaccuracy);
			echo "pilot $NAME[$j] shot $ShotBUL[$i] bullets with $HitBUL[$i] hits for $bulletaccuracy% accuracy<br>\n";
		}
	} elseif (!$ShotBUL[$i]) { // no bullets shot
		if (!$DroppedBOMB[$i]) { // carried bombs, but didn't drop them
			echo "pilot $NAME[$j] shot no bullets and dropped no bombs<br>\n";
		} else { // can calculate bomb stats
			$bombaccuracy = ( 100 * $HitBOMB[$i] / $DroppedBOMB[$i] );
			$bombaccuracy = sprintf("%.2f",$bombaccuracy);
			echo "pilot $NAME[$j] shot no bullets but dropped $DroppedBOMB[$i] bombs with $HitBOMB[$i] hits for $bombaccuracy% accuracy<br>\n";
	   	}
	} elseif (!$DroppedBOMB[$i]) { // shot but didn't drop
		$bulletaccuracy = ( 100 * $HitBUL[$i] / $ShotBUL[$i] );
		$bulletaccuracy = sprintf("%.2f",$bulletaccuracy);
		echo "pilot $NAME[$j] shot $ShotBUL[$i] bullets with $HitBUL[$i] hits for $bulletaccuracy% accuracy and dropped no bombs.<br>\n";
	} else { // shot and dropped
		$bulletaccuracy = ( 100 * $HitBUL[$i] / $ShotBUL[$i] );
		$bulletaccuracy = sprintf("%.2f",$bulletaccuracy);
		$bombaccuracy = ( 100 * $HitBOMB[$i] / $DroppedBOMB[$i] );
		$bombaccuracy = sprintf("%.2f",$bombaccuracy);
		echo "pilot $NAME[$j] shot $ShotBUL[$i] bullets with $HitBUL[$i] hits for $bulletaccuracy% accuracy and dropped $DroppedBOMB[$i] bombs with $HitBOMB[$i] hits for $bombaccuracy% accuracy<br>\n";
	}
}
?>

