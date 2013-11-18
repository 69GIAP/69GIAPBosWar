<?php
// getNextColumnID.php
// given coalition ID, get next ColumnID in sequence.
// =69.GIAP=TUSHKA
// Nov 17, 2013
// BOSWAR version 1.0 

function get_nextcolumnid($CoalID) {
global $camp_link; // link to campaign db
global $column_name; // column name

	$i = 0;
	$maxid = 110; // lowest columnID is 111
	$query = "SELECT columnID FROM columns WHERE CoalID = '$CoalID';";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			if ($obj->columnID > $maxid) { 
				$maxid = $obj->columnID; 
				++$i;
			}
		}
	// free result set
	$result->free();

	// now do the calculation
//	echo "\$maxid: $maxid<br />\n";
	for ($num = $maxid+1; $num < 1000; ++$num) {
		// convert number to string by putting quotes around it
		$string = "$num";
		if (!$string[2] == "0") {
			if (!$string[1] == "0") {
				if ($CoalID == '1') {
					$column_name = "Bat $string[0] Co $string[1] Pl $string[2]";
				} else {
				   	$column_name = "Abt $string[0] Ko $string[1] Zug $string[2]";
				}
//				echo "$column_name<br />\n";
				return($num);
			}
		}
	}

	} else {
		if ($CoalID == '1') {
			$column_name = "Bat 1 Co 1 Pl 1";
		} else {
		   	$column_name = "Abt 1 Ko 1 Zug 1";
		}
//		echo "\$maxid: $maxid<br />\n";
		return('111');
	}
}
?>
