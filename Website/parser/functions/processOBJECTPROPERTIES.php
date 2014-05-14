<?php
// OBJECTPROPERTIES
// get object's properties from object_properties
// called from processLASTHIT and coreOUTPUT
// =69.GIAP=TUSHKA
// 2013-2014
// ver 1.13
// May 13, 2014

function OBJECTPROPERTIES($objecttype) {
   global $camp_link; // link to campaign db
   global $object_class; // object class from object_properties
   global $object_desc; // object description from object_properties
   global $object_value; // object value from object_properties
   
   // our query to the campaign db
   $query = "SELECT * from object_properties where object_type = '$objecttype'";
	if ($result = $camp_link->query($query)) {
		$count = mysqli_num_rows($result);
		// use result (should be just one)
		if ($count == 1) {
			// get results
			// use result or complain
			while ($obj = $result->fetch_object()) {
				$object_class = $obj->object_class;
				$object_value = $obj->object_value;
				$object_desc = $obj->object_desc;
			}
		} elseif ($count > 1) {
			echo "duplicate $objecttype found in object_properties!<br>\n";
		} else { // count must be zero
			echo "$objecttype not found in object_properties!<br>\n";
		}
		// close result set
		$result->close();
	} else { 
		die('OBJECTPROPERTIES query error [' . $camp_link->error . ']');
	}
}
?>

