<?php
function import_points($path,$file) {
// import supply points and control points from a group file
// =69.GIAP=TUSHKA
// Nov 8, 2013
// BOSWAR version 1.2
// Nov 16, 2013 dropped coalition name from control point names,
// changed table name to key_points and
// column supplypointName to pointName
// Stenka 14/5/14 updating rwstation for BoS

	global $camp_link; // link to campaign db
	global $sim;

	// included required functions
	require ('functions/getCoalition.php');
	require ('functions/getCoalitionname.php');

	// initialize
	$j = 0; // index for supply points
	$k = 0; // index for control points
	$sp0 = 0; // index for neutral supply points
	$sp1 = 0; // index for coalition 1 supply points
	$sp2 = 0; // index for coalition 2 supply points
	$cp = 0; // index for control points

	// get the mission file as an array of lines
	$line = file("$path/$file");
	foreach ($line as $i => $value ) {
		// find an rwstation (supply point)
		if ($sim == "RoF")
		{
			if (preg_match('/rwstation.txt/',$value)) 
			{
			// filter out neutral rwstations
				if (!preg_match('/^  Country = 0/', $line[$i+1])) 
				{
					$spline[$j++] = $i;  // save its line number
				}
			}
		}
		else
		{
			if (preg_match('/rwstation_s2.txt/',$value)) 
			{
			// filter out neutral rwstations
				if (!preg_match('/^  Country = 0/', $line[$i+1])) 
				{
					$spline[$j++] = $i;  // save its line number
				}
			}
		}
		// find a flag (control point)
		if (preg_match('/flag.txt/',$value)) {
			$cpline[$k++] = $i;  // save its line number
		}
	}

	// start with clean table
	$query1 = "TRUNCATE key_points;";
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
			$query2 = "INSERT INTO key_points (xPos, zPos, CoalID, pointName) VALUES ('$XPos', '$ZPos', '$CoalID', '$Coalitionname Supply Point $sp0');";
		} elseif ($CoalID == 1) {
			++$sp1;	
			$query2 = "INSERT INTO key_points (xPos, zPos, CoalID, pointName) VALUES ('$XPos', '$ZPos', '$CoalID', '$Coalitionname Supply Point $sp1');";
		} elseif ($CoalID == 2) {
			++$sp2;	
			$query2 = "INSERT INTO key_points (xPos, zPos, CoalID, pointName) VALUES ('$XPos', '$ZPos', '$CoalID', '$Coalitionname Supply Point $sp2');";
		}
		if(!$result = $camp_link->query($query2)) {
			echo "$query2<br />\n";
			die('importPoints query2 error [' . $camp_link->error . ']');
		}
	}
	if ($sp0 > 0 ) {
		$Coalitionname = get_coalitionname(0);
	   	echo "$sp0 $Coalitionname supply points imported<br/>\n";
	}
	if ($sp1 > 0 ) {
		$Coalitionname = get_coalitionname(1);
	   	echo "$sp1 $Coalitionname supply points imported<br/>\n";
	}
	if ($sp2 > 0 ) {
		$Coalitionname = get_coalitionname(2);
	   	echo "$sp2 $Coalitionname supply points imported<br/>\n";
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

		++$cp;	
		$query3 = "INSERT INTO key_points (xPos, zPos, CoalID, pointName) VALUES ('$XPos', '$ZPos', '$CoalID', 'Control Point $cp');";
		if(!$result = $camp_link->query($query3)) {
			echo "$query3<br />\n";
			die('importPoints query3 error [' . $camp_link->error . ']');
		}
	}
	echo "$cp control points imported<br/>\n";
}
?>
