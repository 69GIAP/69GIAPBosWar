<?php
// TRAINS
// translate railroad object type into more natural description
// 2013
// BOSWAR version 1.2
// Oct 28, 2013
function TRAINS($type) {
	global $camp_link; // link to campaign db
	global $object_class; // object class from rof_object_properties
	global $object_desc; // object description

	$query = "SELECT object_class, object_desc FROM rof_object_properties WHERE object_type = '$type'";
	if ($result = $camp_link->query($query)) {
		// get results
		while ($obj = $result->fetch_object()) {
			$object_class	= ($obj->object_class);
			$object_desc	= ($obj->object_desc);
		}
		// free result set, object oriented style
		$result->close(); 
	} else { 
		die('TRAINS query error [' . $camp_link->error . ']');
	}
}
?>
