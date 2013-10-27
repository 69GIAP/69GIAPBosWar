<?php
// getMinMaxXZ
// Get default min and max X and Z values
// out of campaign db
// =69.GIAP=TUSHKA
// Oct 27, 2013
// ver 1.1

$query = "SELECT * FROM campaign_settings";
	if(!$result = $camp_link->query($query)){
		die('getMinMaxXZ: query error ' . mysqli_error($camp_linkj));
	}
	while ($obj = mysqli_fetch_object($result)) {
		$min_x = ($obj->min_x);
		$min_z = ($obj->min_z);
		$max_x = ($obj->max_x);
		$max_z = ($obj->max_z);
	}

echo "	<h3>Combat Sector Borders (in meters)</h3>\n";
echo "	<fieldset id=\"inputs\">\n";
echo "		<input id=\"map\" type=\"text\" name=\"bottomLeftX\" value=$min_x autofocus >	<b>minimum X value (southernmost)</b><br>\n"; 
echo "		<input id=\"map\" type=\"text\" name=\"bottomLeftZ\" value=$min_z autofocus >	<b>minimum Z value (westernmost)</b><br>\n"; 
echo "		<input id=\"map\" type=\"text\" name=\"topRightX\" value=$max_x autofocus >	<b>maximum X value (northernmost)</b><br>\n"; 
echo "		<input id=\"map\" type=\"text\" name=\"topRightZ\" value=$max_z autofocus >	<b>maximum Z value (easternmost)</b><br>\n"; 
echo "	</fieldset>\n";

// free result set
mysqli_free_result($result);
?>
