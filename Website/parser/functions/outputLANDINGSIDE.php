<?php
function LANDINGSIDE($pid,$posx,$posz){
// determine if player landed on friendly, enemy or neutral territory
// =69.GIAP=TUSHKA
// 2011-2014
// BOSWAR version 1.02
// Apr 21, 2014

	global $PLID; // player plane id 
	global $numplayers; // number of players
	global $Pline;  // lines that define players
	global $COUNTRY; // country ID
	global $CoalID; // coalition ID
	global $numiaheaders; // number of influence area headers
	global $IAHline; // lines defining Influence Area Headers
	global $numB; // number of boundary definitions
	global $Bline; // lines defining area boundaries
	global $AID; // area ID in this context
	global $BoundaryArray; // array of point pairs defining a boundary

	if ($numiaheaders < 2 ) { // don't have two sides
		$side = "neutral";
		return $side;
	}

	// format location the way the pointLocation class needs
	$location = "$posx $posz";

	// get player's country from PLAYERPLANE lines
	// loop through PLAYERPLANE lines to get the country.
	for ($i = 0; $i < $numplayers; ++$i) {
		$j = $Pline[$i];
		if ( $pid == $PLID[$j] ) {
			$pcountry = $COUNTRY[$j];
		}
	}

	// get playerplane's coalition
	COALITION($pcountry); 
	$pcoalition = $CoalID;
//	echo "LANDINGSIDE A: pcountry = $pcountry, pcoalition = $pcoalition<br>\n";

	// get influence areas' countries and coalitions 
	// get  country of each area
	for ($i = 0; $i < $numB; ++$i) {
		$j = $Bline[$i];
		for ($k = 0; $k < $numB; ++$k) {  // peek at each of the IAHlines
			$l = $IAHline[$k];
//			echo "LANDINGSIDE B0: i = $i, AreaID[$i] = $AID[$j]<br>\n";
//			echo "LANDINGSIDE B0.1:  IAHeader AreaID[$i] = $AID[$l]<br>\n";
			if ($AID[$j] == $AID[$l]) {
//				echo "LANDINGSIDE B0.2:   $AID[$j] = $AID[$l]<br>\n";
//				echo "LANDINGSIDE B0.3:   k=$k, l=$l, COUNTRY[l]=$COUNTRY[$l]<br>\n";
				if (isset($COUNTRY[$l])) {
					@$acountry[$k] == $COUNTRY[$l]; // @ suppresses notices
					COALITION($COUNTRY[$l]);   
					$acoalition[$k] = $CoalID;
				}
			}
		}
//		echo "LANDINGSIDE B1: i = $i, AreaID[$i] = $AID[$j]<br>\n";
//		echo "LANDINGSIDE B2: areacountry[$i] = $acluntry[$i], acoalition[$i] = $acoalition[$i]<br>\n";
	}

	// New logic
	// loop through defined boundaries using the $numB index

	for ($i = 0; $i < $numB; ++$i) {
		// define the current polygon
		$polygon = $BoundaryArray[$i];

		// Now test whether landed inside this polygon
// in situ test: "20 20" is "inside" this polygon
//$polygon = array("10 0", "0 10", "0 20", "10 30", "20 30", "30 20", "30 10", "20 0", "10 0");
//$location = "20 20";
		$pointLocation = new pointLocation();
//		echo "($location) is " . $pointLocation->pointInPolygon($location, $polygon) . "<br>";
		$place = $pointLocation->pointInPolygon($location, $polygon);

		// interpret result
		if ($place == "inside") {
//			echo "i = $i ,LANDINGSIDE reports inside.<br>\n";
			if ($pcoalition == @$acoalition[$i]) { // @ suppresses notices
				$side = "friendly"; 
				$i = $numB; // we are done
				$k = $numB; // we are done
			} else {
				$side = "enemy"; 
				$i = $numB; // we are done
				$k = $numB; // we are done
			}
		} else { // if not in either area, must be neutral
			$side = "neutral"; // but keep checking until done
		}
	}
//	echo "LANDINGSIDE reports $side<br>\n";
	return $side;
}
?>
