<?php
function import_bridges($path,$file) {
// import bridges from a group file
// =69.GIAP=TUSHKA
// Nov 15, 2013
// BOSWAR version 1.0
# stenka correction 22/11/13 when loading a damaged bridge convert text variable to integer
# stenka correction to replace statement 13/12/13

	global $camp_link; // link to campaign db

	// included required functions
//	require ('functions/getCoalition.php');

	// initialize
	$j = 0; // index for bridge number

	// get the mission file as an array of lines
	$line = file("$path/$file");
	foreach ($line as $linenumber => $value ) {
		// find a bridge and save it's line number 
		if (preg_match('/^Bridge/',$value)) {
			$bline[$j++] = $linenumber;
		}
	}

	// start with clean table
	$query1 = "TRUNCATE bridges;";
	if(!$result = $camp_link->query($query1)) {
		die('importBridges query1 error [' . $camp_link->error . ']');
	}

	// process the supply points
	for ($l=0; $l<$j; ++$l) {
		// XPos is 5 lines later
		$XPos =  $line[$bline[$l]+5];	
		// ignore leading stuff, part[0]
		$part = explode(' = ', $XPos);
		// trim off semicolon and EOL
		$XPos = rtrim($part[1],"\x3B\r\n");

		// ZPos is 7 lines later
		$ZPos =  $line[$bline[$l]+7];	
		// ignore leading stuff, part[0]
		$part = explode(' = ', $ZPos);
		// trim off semicolon and EOL
		$ZPos = rtrim($part[1],"\x3B\r\n");
		
		//YOri is 9 lines later
		$YOri =  $line[$bline[$l]+9];	
		// ignore leading stuff, part[0]
		$part = explode(' = ', $YOri);
		// trim off semicolon and EOL
		$YOri = rtrim($part[1],"\x3B\r\n");
		
		//Model is 11 lines later
		$Model =  $line[$bline[$l]+11];	
		// ignore leading stuff, part[0]
		$part = explode('"', $Model);
		// trim off "graphics\bridges\"
		$Model = substr($part[1],17);
		// trim off ".mgm"
		$Model = preg_replace('/\.mgm$/','',"$Model");
		
		//Country is 13 lines later
		$Country =  $line[$bline[$l]+13];	
		// ignore leading stuff, part[0]
		$part = explode(' = ', $Country);
		// trim off semicolon and EOL
		$Country = rtrim($part[1],"\x3B\r\n");

		$Coalition = get_coalition($Country);
		
		//Desc is 14 lines later
		$Desc =  $line[$bline[$l]+14];	
		// ignore leading stuff, part[0]
		$part = explode(' = ', $Desc);
		// trim off double quote, semicolon and EOL
		$Desc = trim($part[1],"\x3B\r\n");
		if ("$Desc" == "\"\"") { $Desc = '';}
//		echo "\$Desc: $Desc<br />\n";

		// if "Damaged" exists, it is 19 lines later
		$d1 = ''; // initialize span 1 damage, etc
		$d2 = '';
		$d3 = '';
		$d4 = '';
		$d5 = '';
		$d6 = '';
		$d7 = '';
		$d8 = '';
		$d9 = '';
		$d10 = '';
		if (preg_match('/^  Damaged/',$line[$bline[$l]+19] )) {
			$m = 0; // index for damaged segments
			for ($m = $bline[$l]+21; ; $m++) {
				if (preg_match('/\}/', $line[$m])) { break; }
					// split at ' = '
					$part = explode(' = ', $line[$m]);
//					echo "\$part[0]=$part[0], \$part[1]=$part[1]<br />\n";
					// trim off semicolon and EOL
					$dn = trim($part[0]);
					// trim off semicolon and EOL and assign
					if ($dn == '1') { $d1 = rtrim($part[1],'\x3B\r\n'); }
					elseif ($dn == '2') { $d2 = rtrim($part[1],'\x3B\r\n'); }
					elseif ($dn == '3') { $d3 = rtrim($part[1],'\x3B\r\n'); }
					elseif ($dn == '4') { $d4 = rtrim($part[1],'\x3B\r\n'); }
					elseif ($dn == '5') { $d5 = rtrim($part[1],'\x3B\r\n'); }
					elseif ($dn == '6') { $d6 = rtrim($part[1],'\x3B\r\n'); }
					elseif ($dn == '7') { $d7 = rtrim($part[1],'\x3B\r\n'); }
					elseif ($dn == '8') { $d8 = rtrim($part[1],'\x3B\r\n'); }
					elseif ($dn == '9') { $d9 = rtrim($part[1],'\x3B\r\n'); }
					elseif ($dn == '10') { $d10 = rtrim($part[1],'\x3B\r\n'); }
			}
		}
		$num = $l + 1;
		$name = "Bridge $num";
//		echo "$name: \$XPos=$XPos, \$ZPos=$ZPos, \$YOri=$YOri, 
//			\$Model=$Model, \$Country=$Country, \$Coalition=$Coalition,
//			\$Desc=$Desc<br />\n";
# stenka correction 22/11/13
		$d1 = intval($d1); 
		$d2 = intval($d2);
		$d3 = intval($d3);
		$d4 = intval($d4);
		$d5 = intval($d5);
		$d6 = intval($d6);
		$d7 = intval($d7);
		$d8 = intval($d8);
		$d9 = intval($d9);
		$d10 = intval($d10);
#

		$query = "REPLACE bridges SET Name='$name', XPos='$XPos',
			ZPos='$ZPos', YOri='$YOri', Model ='$Model', 
			Country='$Country', CoalID='$Coalition',
		   	damage_1='$d1', damage_2='$d2',
			damage_3='$d3', damage_4='$d4', damage_5='$d5',
			damage_6='$d6', damage_7='$d7', damage_8='$d8',
			damage_9='$d9', damage_10='$d10', Description='$Desc'
			";

//		echo "$query<br />\n";
		if(!$result = $camp_link->query($query)) {
			echo "$query<br />\n";
   			die('importBridges query error [' . $camp_link->error . ']');
		
		}
	} // end main for loop
	echo "$j bridges imported<br />\n";
}
?>
