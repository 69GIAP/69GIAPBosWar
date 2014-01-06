<?php
// TURRETGUNNER
// given linenumber of a player get object_class and object_desc
// =69.GIAP=TUSHKA
// 2011-2014
// BOSWAR version 1.05
// Jan 6, 2014

function TURRETGUNNER($j){
	global $TYPE; // type of plane, object, or objective - primary or secondary
	global $camp_link; // link to campaign db
	global $object_class; // object class from object_properties
	global $object_desc; // object description from object_properties

	$query = "SELECT object_class, object_desc FROM object_properties WHERE object_type = '$TYPE[$j]'";
//	echo "$query<br />\n";
	if ($result = $camp_link->query($query)) {
		// get results
		while ($obj = $result->fetch_object()) {
			$object_class	= ($obj->object_class);
			$object_desc	= ($obj->object_desc);
		}
		$result->close(); 
} else { 
		echo "$query<br />\n";
		die('TURRETGUNNER query entry [' . $camp_link->error . ']');
	}
}
?>
