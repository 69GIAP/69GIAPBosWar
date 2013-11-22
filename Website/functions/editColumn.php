<?php
// editColumn.php
// edit a column
// =69.GIAP=TUSHKA
// Nov 21, 2013

function edit_column($id) {
	global $camp_link;

	$query1 = "SELECT Name, Model, Description, ckey, CoalID, Supplypoint,
		Quantity FROM columns WHERE id = '$id';";

	if(!$result = $camp_link->query($query1)){
		echo "$query1<br />\n";
		die('editColumn query1 error:' . $camp_link->error);
	}

	while ($obj = $result->fetch_object()) {
		$Name			=	$obj->Name;
		$Model			=	$obj->Model;
		$Description	=	$obj->Description;
		$ckey			=	$obj->ckey;
		$CoalID			=	$obj->CoalID;
		$Supplypoint	=	$obj->Supplypoint;
		$Quantity		=	$obj->Quantity;

		$countryadj = get_countryadj($ckey);
	}
	$result->free();

	$coalition = get_coalitionname($CoalID);

	echo "<h3>$coalition Column: $Name</h3><br />\n";
		 
	echo "<p>All you can change for this column is the Quantity and/or the Supply Point.<br />If you want to make major changes, delete this column and create a new one.</p>\n";
	
	echo "<p>Currently have <b>$Description ($countryadj)</b></p>
			<p>NEW QUANTITY:</p>\n";
	echo "<form id=\"editColumnForm\" name=\"editColumn\" action=\"CampaignMgmtEditColumnConfirm.php?btn=campStp&sde=campSet\" method=\"post\">\n";
	echo "	<fieldset id=\"inputs\">\n";
	$maxnum = 16;
	echo "		<select name=\"objnum\" id=\"number\">\n";
		echo "		<option selected value=\"$Quantity\">$Quantity</option>\n";
	for ($i = 1; $i < $maxnum+1; ++$i) {
		echo "		<option value=\"$i\">$i</option>\n";
	}
	echo "		</select>\n";
	echo "	</fieldset>\n";

	$pointName = get_pointname($Supplypoint);

	echo "<br />&nbsp;<br /><p>This column is destined for <b>$pointName</b></p>\n";
	echo "<p>NEW SUPPLY POINT:</p>\n";

	$query2 = "SELECT id, pointName FROM key_points WHERE CoalID='$CoalID' AND pointName LIKE '% Supply %';";

	if(!$result = $camp_link->query($query2)){
		echo "$query2<br />\n";
		die('editColumn query2 error:' . $camp_link->error);
	}

	echo "<form id=\"editColumnForm\" name=\"editColumn\" action=\"CampaignMgmtEditColumnConfirm.php?btn=campStp&sde=campSet\" method=\"post\">\n";
	echo "	<fieldset id=\"inputs\">\n";
	echo "		<select name=\"supplypoint\" id=\"point\">\n";
	echo "		<option selected value=\"$Supplypoint\">$pointName</option>\n";
	while ($obj	= $result->fetch_object()) {
		$pointID	= $obj->id;
		$pntName		= $obj->pointName;
		echo "		<option value=\"$pointID\">$pntName</option>\n";
	}
	$result->free();
	echo "		</select>\n";
	echo "	</fieldset>\n";

	echo "<br />&nbsp<br />\n";
	// UPDATE BUTTON
	echo "<fieldset id=\"actions\">\n";	
	echo "<input type=\"hidden\" name=\"action\" value = \"update\">\n";	
	echo "<input type=\"hidden\" name=\"col_id\" value = \"$id\">\n";	
	echo "<input type=\"hidden\" name=\"model\" value = \"$Model\">\n";	
	echo "		<button type=\"submit\" id=\"editColumns\" value ='' >Update Column</button>\n";
	echo "	</fieldset>\n";
	echo "</form>\n";

	echo "<form id=\"campaignMgmtDownloadColumns\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtEditColumnConfirm.php?btn=campStp\" method=\"post\">\n";
	// DELETE BUTTON
	echo "<fieldset id=\"actions\">\n";	
	echo "<input type=\"hidden\" name=\"action\" value = \"delete\">\n";	
	echo "<input type=\"hidden\" name=\"col_id\" value = \"$id\">\n";	
	echo "		<button type=\"submit\" id=\"downloadColumns\" value ='' >Delete Column</button>\n";
	echo "	</fieldset>\n";

	echo "</form>\n";
}
?>
