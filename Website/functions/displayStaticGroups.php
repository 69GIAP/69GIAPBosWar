<?php
// displayStaticGroups.php
// display static groups belonging to a particular coalition
// =69.GIAP=TUSHKA
// Dec 5, 2013
// BOSWAR ver 1.0
// Note: calling page must require getCoalitionname.php, getCountryadj.php,
// and getPointname.php

function display_staticgroups($CoalID) {

	global $camp_link;

	$coalition = get_coalitionname($CoalID);

	$query = "SELECT id, name, description, ckey, Supplypoint from static_groups WHERE CoalID = '$CoalID';";

	if(!$result = $camp_link->query($query)){
		echo "$query1<br />\n";
		die('displayStaticGroups query error:' . $camp_link->error);
	}

	echo "<h3>$coalition Static Groups:</h3><br />\n";

	while ($obj = $result->fetch_object()) {
		$id		=	$obj->id;
		$Name	=	$obj->name;
		$Description =	$obj->description;
		$ckey		 =	$obj->ckey;
		$Supplypoint =	$obj->Supplypoint;

		$countryadj = get_countryadj($ckey);
		$pointName	= get_pointname($Supplypoint);

//		echo "$Name: $Description ($country_name) in Supply Point $Supplypoint<br />\n";
		echo "<div class=\"radio\">\n";
		echo "<input id=\"$id\" type=\"radio\" name=\"columnID\" value=\"$id\">";
		echo "<label for=\"$id\"><b>$Name: $Description ($countryadj) in $pointName</label><br />\n";
		echo "</div>\n";
	}
}
?>
