<?php
// getSupplyPoints
// =69.GIAP=TUSHKA
// Nov 16, 2013

echo "		<div class=\"radio\">\n"; 

$i = 0;
$query = "SELECT * from key_points HAVING CoalID = $CoalID AND pointName LIKE '%Supply Point%' ";
if ($result = $camp_link->query($query)) {
	while ($obj = $result->fetch_object()) {
		$pointID = $obj->id;
		$pointName = $obj->pointName;
		echo "			<input id=\"a$i\" type=\"radio\" name=\"pointID\" value=\"$pointID\">\n";
		echo "			<label for=\"a$i\"><b>".$pointName."</b></label><br />\n";
		++$i;
	}
} else {
		echo "$query<br />\n";
	die('getSupplyPoints.php query error [' . $dbc->error . ']');
}

echo "		</div>\n";

$result->free();

if ($i == 0) {
	echo "<b><font color=\"red\">You must define at least one supply point before you can create a column.</font><br />(See \"Setup\" to the left.)</b><br />\n";
}

?>
