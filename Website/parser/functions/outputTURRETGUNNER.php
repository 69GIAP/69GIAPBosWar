<?php
// TURRETGUNNER
// given linenumber of a player get object_class and object_desc
// =69.GIAP=TUSHKA
// 2011-2013
// BOSWAR version 1.3
// Oct 28, 2013

function TURRETGUNNER($j){
	global $TYPE; // type of plane, object, or objective - primary or secondary
	global $camp_link; // link to campaign db
	global $object_class; // object class from rof_object_properties
	global $object_desc; // object description from rof_object_properties

	$query = "SELECT object_class, object_desc FROM rof_object_properties WHERE object_type = '$TYPE[$j]'";
	if ($result = $camp_link->query($query)) {
		// get results
		while ($obj = $result->fetch_object()) {
			$object_class	= ($obj->object_class);
			$object_desc	= ($obj->object_desc);
		}
		// free result set, object oriented style
		$result->close(); 
} else { 
		die('TURRETGUNNER query entry [' . $camp_link->error . ']');
	}
}
?>
