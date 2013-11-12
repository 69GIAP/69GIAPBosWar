<?php
// getClassRoleDescription.php
// given object class, get description of that class's role
// =69.GIAP=TUSHKA
// Nov 11, 2013
// BOSWAR version 1.0

function get_class_role_description($unit_class) {
	global $camp_link; // link to campaign db

	$query = "SELECT role_description from object_roles 
		WHERE unit_class = '$unit_class';";
	if($result = $camp_link->query($query)) {
		while ($obj = $result->fetch_object()) {
			return($obj->role_description);
		}
	} else {
		echo "$query<br />\n";
		die('getClassRoleDescription query error [' . $camp_link->error . ']');
	}
	$result->free();
}
?>
