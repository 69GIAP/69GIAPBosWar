<?php
// differentiateAirfields.php
// if two airfields have the same name, differentiate them by number
// later worry about Verdun where can use locations file to name them
// =69.GIAP=TUSHKA
// BOSWAW version 1.0
// Nov 7, 2013

$query1 = "SELECT airfield_Name, COUNT(*) c FROM airfields GROUP BY airfield_Name HAVING c > 1;";
//echo "$query1<br />\n";

if ($result1 = $camp_link->query($query1)) {
	while ($row = $result1->fetch_row()) {
//		printf("%s (%s)\n", $row[0], $row[1]);
		$name = $row[0];
		$c = $row[1];
		for ($j = 1; $j < $c+1; ++$j) {
			$query = "UPDATE airfields
			SET airfield_Name = '$name $j' 
			WHERE airfield_Name = '$name' LIMIT 1;";
			if(!$result = mysqli_query($camp_link, $query)) {
				die('differentiateAirfields query error [' . $camp_link->error . ']');
			}
		}
	echo "<br />Differentiated $c $name<br />\n";
	}
} else {
	die('differentiateAirfields query error [' . $camp_link->error . ']');
}
$result1->close();
?>
