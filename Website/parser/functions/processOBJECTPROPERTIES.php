<?php
// OBJECTPROPERTIES
// get object's properties from rof_object_properties
// called from processLASTHIT and coreOUTPUT
// =69.GIAP=TUSHKA
// 2013
// ver 1.2
// Oct 28, 2013

function OBJECTPROPERTIES($objecttype) {
   global $camp_link; // link to campaign db
   global $object_class; // object class from rof_object_properties
   global $object_desc; // object description from rof_object_properties
   global $object_value; // object value from rof_object_properties
   
   // our query to the campaign db
   $query = "SELECT * from rof_object_properties where object_type = '$objecttype'";
	if ($result = $camp_link->query($query)) {
		$count = mysqli_num_rows($result);
		// use result (should be just one)
		if ($count == 1) {
			// get results
			// use result or complain
			$row = $result->fetch_row();
			$object_class = $row[2];
			$object_value = $row[3];
			$object_desc = $row[4];
		} elseif ($count > 1) {
			echo "duplicate $objecttype found in rof_object_properties!<br>\n";
		} else { // count must be zero
			echo "$objecttype not found in rof_object_properties!<br>\n";
		}
		// close result set
		$result->close();
	} else { 
		die('BOTGUNNER query error [' . $camp_link->error . ']');
	}
}
?>

