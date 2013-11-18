<?php

// choose country
// this will determine column name
// choose object
// choose number of objects
// choose which supply point
// press "propose"
// show result and ask "OK?"
// ask "another column?"

// choose country
// show names of coalitions 1 and 2 over two columns
// under them give radio buttons for appropriate country choice
// Once chosen, refresh page.

// get coalitions.
$query = "SELECT * from coalitions WHERE CoalID = '1' OR COALID = '2';";
if ($result = $camp_link->query($query)) {
	while ($obj = $result->fetch_object()) {
		if ($obj->CoalID == '1') { $coalition_name1 = $obj->Coalitionname; }
		if ($obj->CoalID == '2') { $coalition_name2 = $obj->Coalitionname; }
	}
} else {
		echo "$query<br />\n";
	die('CampaignMgmtSetupColumns.php query error [' . $dbc->error . ']');
}
$result->free();
	
echo "<h2>First, Select Country</h2>\n";
echo "<div class=\"radio\">\n"; 
echo "	<div class=\"left\"><p><b>$coalition_name1</b></p>\n";

$i = 0;
$query = "SELECT * from countries WHERE CoalID = '1';";
if ($result = $camp_link->query($query)) {
	while ($obj = $result->fetch_object()) {
		$ckey = $obj->ckey;
		$countryname = $obj->countryname;
		++$i;
		echo "<input id=\"$i\" type=\"radio\" name=\"ckey\" value=$ckey>";
		echo "<label for=\"$i\"><b>".$countryname."</b></label><br />\n";

	}
} else {
		echo "$query<br />\n";
	die('CampaignMgmtSetupColumns.php query error [' . $dbc->error . ']');
}
echo "	</div>\n"; 
$result->free();

echo "	<div class=\"right\"><p><b>$coalition_name2</b></p>\n";
$query = "SELECT * from countries WHERE CoalID = '2';";
if ($result = $camp_link->query($query)) {
	while ($obj = $result->fetch_object()) {
		$ckey = $obj->ckey;
		$countryname = $obj->countryname;
		++$i;
		echo "<input id=\"$i\" type=\"radio\" name=\"ckey\" value=$ckey>";
		echo "<label for=\"$i\"><b>".$countryname."</b></label><br />\n";

	}
} else {
		echo "$query<br />\n";
	die('CampaignMgmtSetupColumns.php query error [' . $dbc->error . ']');
}

echo "	</div>\n"; 
echo "</div>\n";
echo "<div id=\"clearing\"></div>\n";

?>

