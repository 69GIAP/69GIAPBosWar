<?php
// editStatic.php
// edit a static group
// =69.GIAP=TUSHKA
// Dec 13, 2013
// BOSWAR version 1.0

function edit_static($id) {
	global $camp_link;

	$query1 = "SELECT * FROM static_groups WHERE id = '$id';";

	if(!$result = $camp_link->query($query1)){
		echo "$query1<br />\n";
		die('editStatic query1 error:' . $camp_link->error);
	}

	while ($obj = $result->fetch_object()) {
		$name		=	$obj->name;
		$Supplypoint	= $obj->Supplypoint;
		$pointname	= get_pointname($Supplypoint);
		$description	= $obj->description;
		$CoalID		= $obj->CoalID;
	}
	$result->free();

	echo "<h3>Edit $name</h3><br />\n";

		 
	echo "<p>You can add or remove a unit in this group and/or change its Supply Point.</p>\n";
	echo "<p>To add another unit, select it and press \"Add Unit\".<br />To remove a unit select it and press \"Remove Unit\".<br />\n";
	echo "To change the supply point, select a different one and press \"Update Location\".<br />If you want to make other changes, delete this group and create a new one.</p>\n";

	echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
	echo "<p><b>$name - $description</b></p>\n";
	$query2 = "SELECT id, static_Desc FROM static WHERE static_Name = '$name';";

	if(!$result = $camp_link->query($query2)){
		echo "$query2<br />\n";
		die('editStatic query2 error:' . $camp_link->error);
	}
	echo "<fieldset id=\"actions\">\n";	
	echo "<div class=\"radio\">\n"; 
	$i = 0;
	while ($obj	= $result->fetch_object()) {
		$objectID	= $obj->id;
		$objectDesc	= $obj->static_Desc;
		
		echo "	<input id=\"$i\" type = \"radio\" name = \"objectID\" value=\"$objectID\">\n";
		echo "	<label for=\"$i\"><b>".$objectDesc."</b></label><br />\n";
		$i++;
	}
	$result->free();
	echo "</div>\n";
	echo "<br />&nbsp<br />\n";
	//ADD UNIT BUTTON
	echo "		<button type=\"submit\" id=\"back\" name = 'action' value ='addunit' >Add Unit</button>\n";
	echo "	</fieldset>\n";
	echo "<fieldset id=\"actions\">\n";	
	//REMOVE UNIT BUTTON
	echo "		<button type=\"submit\" id=\"back\" name = 'action' value ='removeunit' >Remove Unit</button>\n";
	echo "	</fieldset>\n";
	echo "</form>\n";

	echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";

	$pointName = get_pointname($Supplypoint);

	echo "<p>This group is destined for <b>$pointName</b></p>\n";
	echo "<p><b>NEW SUPPLY POINT:</b></p>\n";

	$query3 = "SELECT id, pointName 
			FROM key_points 
			WHERE CoalID='$CoalID' 
			AND pointName LIKE '% Supply %' 
			GROUP BY pointName;";

	if(!$result = $camp_link->query($query3)){
		echo "$query3<br />\n";
		die('editStatic query3 error:' . $camp_link->error);
	}


	echo "	<fieldset id=\"inputs\">\n";
	echo "		<select name=\"supplypoint\" id=\"world\">\n"; echo "		<option selected value=\"$Supplypoint\">Selected: $pointName</option>\n";
	while ($obj	= $result->fetch_object()) {
		$pointID	= $obj->id;
		$pntName	= $obj->pointName;
		
		echo "		<option value=\"$pointID\">$pntName</option>\n";
	}
	$result->free();
	echo "		</select>\n";
	echo "	</fieldset>\n";
	echo "<br />&nbsp<br />\n";
	// UPDATE LOCATION BUTTON
	echo "<input type=\"hidden\" name=\"groupID\" value = \"$id\">\n";	
	echo "		<button type=\"submit\" id=\"back\" name = 'action' value ='updatelocation' >Update Location</button>\n";
	echo "	</fieldset>\n";
	echo "</form>\n";
	echo "<p>&nbsp</p>\n";
	echo "<p>&nbsp</p>\n";

	echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
	// DELETE BUTTON
	echo "<fieldset id=\"actions\">\n";	
	echo "<input type=\"hidden\" name=\"action\" value = \"delete\">\n";	
	echo "<input type=\"hidden\" name=\"groupID\" value = \"$id\">\n";	
	echo "		<button type=\"submit\" id=\"back\" value ='' >Delete Group</button>\n";
	echo "	</fieldset>\n";

	echo "</form>\n";
}
?>
