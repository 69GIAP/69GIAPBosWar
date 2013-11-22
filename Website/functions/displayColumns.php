<?php
// displayColumns.php
// display columns belonging to a particular coalition
// =69.GIAP=TUSHKA
// Nov 21, 2013
// BOSWAR ver 0.1

function display_columns($CoalID) {

	global $camp_link;

	$coalition = get_coalitionname($CoalID);

	$query = "SELECT id, Name, Description, ckey, Supplypoint from columns WHERE CoalID = '$CoalID';";

	if(!$result = $camp_link->query($query)){
		echo "$query1<br />\n";
		die('displayColumns query error:' . $camp_link->error);
	}

	echo "<h3>$coalition Columns:</h3><br />\n";

	while ($obj = $result->fetch_object()) {
		$id		=	$obj->id;
		$Name		=	$obj->Name;
		$Description	=	$obj->Description;
		$ckey		=	$obj->ckey;
		$Supplypoint	=	$obj->Supplypoint;

		$countryadj = get_countryadj($ckey);
		$pointName = get_pointname($Supplypoint);

//		echo "$Name: $Description ($country_name) in Supply Point $Supplypoint<br />\n";
		echo "<div class=\"radio\">\n";
		echo "<input id=\"$id\" type=\"radio\" name=\"columnID\" value=\"$id\">";
		echo "<label for=\"$id\"><b>$Name: $Description ($countryadj) in $pointName</label><br />\n";
		echo "</div>\n";
	}
}
?>
