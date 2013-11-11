<?php
function import_points($path,$file) {
	// import supply points and control points from a group file
	// =69.GIAP=TUSHKA
	// Nov 8, 2013
	// BOSWAR version 1.0

	global $camp_link; // link to campaign db

	// included required functions
	require ('functions/getCoalition.php');
	require ('functions/getCoalitionname.php');


	// initialize
	$j = 0; // index for supply points
	$k = 0; // index for control points
	$sp0 = 0; // index for neutral supply points
	$sp1 = 0; // index for coalition 1 supply points
	$sp2 = 0; // index for coalition 2 supply points
	$cp0 = 0; // index for neutral control points
	$cp1 = 0; // index for coalition 1 control points
	$cp2 = 0; // index for coalition 2 control points

	// get the mission file as an array of lines
	$line = file("$path/$file");
	foreach ($line as $i => $value ) {
		// find an rwstation (supply point)
		if (preg_match('/rwstation.txt/',$value)) {
			$spline[$j++] = $i;
//			echo "found supply point $j<br />\n";
		// find a flag (control point)
		} elseif (preg_match('/flag.txt/',$value)) {
			$cpline[$k++] = $i;
//			echo "found control point $k<br />\n";
		}
	}

	// start with clean table
	$query1 = "TRUNCATE supply_points;";
	if(!$result = $camp_link->query($query1)) {
		die('importPoints query1 error [' . $camp_link->error . ']');
	}

	// process the supply points
	for ($l=0; $l<$j; ++$l) {
		// Xpos is 7 lines earlier
		$XPos =  $line[$spline[$l]-7];	
		// ignore leading stuff, part[0]
		$part = explode(' = ', $XPos);
		// trim off semicolon and EOL
		$XPos = rtrim($part[1],"\x3B\r\n");
		// round to closest meter
		$XPos = round($XPos);

		// Zpos is 5 lines earlier
		$ZPos =  $line[$spline[$l]-5];	
		// ignore leading stuff, part[0]
		$part = explode(' = ', $ZPos);
		// trim off semicolon and EOL
		$ZPos = rtrim($part[1],"\x3B\r\n");
		// round to closest meter
		$ZPos = round($ZPos);
		
		// the country is in the line after
		$country = $line[$spline[$l]+1];
		// ignore leading stuff, part[0]
		$part = explode(' = ', $country);
		// trim off semicolon and EOL
		$country = rtrim($part[1],"\x3B\r\n");
		$CoalID = get_coalition($country);
		$Coalitionname = get_coalitionname($CoalID);
	
		if ($CoalID == 0) {
			++$sp0;	
			$query2 = "INSERT INTO supply_points (xPos, zPos, CoalID, supplypointName) VALUES ('$XPos', '$ZPos', '$CoalID', '$Coalitionname Supply Point $sp0');";
		} elseif ($CoalID == 1) {
			++$sp1;	
			$query2 = "INSERT INTO supply_points (xPos, zPos, CoalID, supplypointName) VALUES ('$XPos', '$ZPos', '$CoalID', '$Coalitionname Supply Point $sp1');";
		} elseif ($CoalID == 2) {
			++$sp2;	
			$query2 = "INSERT INTO supply_points (xPos, zPos, CoalID, supplypointName) VALUES ('$XPos', '$ZPos', '$CoalID', '$Coalitionname Supply Point $sp2');";
		}
		echo "$query2<br />\n";
		if(!$result = $camp_link->query($query2)) {
			die('importPoints query2 error [' . $camp_link->error . ']');
		}

	}

	// process the control points
	for ($l=0; $l<$k; ++$l) {
		// Xpos is 8 lines earlier
		$XPos =  $line[$cpline[$l]-8];	
		// ignore leading stuff, part[0]
		$part = explode(' = ', $XPos);
		// trim off semicolon and EOL
		$XPos = rtrim($part[1],"\x3B\r\n");
		// round to closest meter
		$XPos = round($XPos);

		// Zpos is 6 lines earlier
		$ZPos =  $line[$cpline[$l]-6];	
		// ignore leading stuff, part[0]
		$part = explode(' = ', $ZPos);
		// trim off semicolon and EOL
		$ZPos = rtrim($part[1],"\x3B\r\n");
		// round to closest meter
		$ZPos = round($ZPos);

		// the country is in the line after
		$country = $line[$cpline[$l]+1];
		// ignore leading stuff, part[0]
		$part = explode(' = ', $country);
		// trim off semicolon and EOL
		$country = rtrim($part[1],"\x3B\r\n");
		$CoalID = get_coalition($country);
		$Coalitionname = get_coalitionname($CoalID);

		if ($CoalID == 0) {
			++$cp0;	
			$query3 = "INSERT INTO supply_points (xPos, zPos, CoalID, supplypointName) VALUES ('$XPos', '$ZPos', '$CoalID', '$Coalitionname Control Point $cp0');";
		} elseif ($CoalID == 1) {
			++$cp1;	
			$query3 = "INSERT INTO supply_points (xPos, zPos, CoalID, supplypointName) VALUES ('$XPos', '$ZPos', '$CoalID', '$Coalitionname Control Point $cp1');";
		} elseif ($CoalID == 2) {
			++$cp2;	
			$query3 = "INSERT INTO supply_points (xPos, zPos, CoalID, supplypointName) VALUES ('$XPos', '$ZPos', '$CoalID', '$Coalitionname Control Point $cp2');";
		}
		echo "$query3<br />\n";
		if(!$result = $camp_link->query($query3)) {
			die('importPoints query2 error [' . $camp_link->error . ']');
		}

	}
	
}
?>