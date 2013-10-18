<?php
// OBJECTPROPERTIES
// =69.GIAP=TUSHKA
// ver 1.1
// Oct 17, 2013
// get object's properties from rof_object_properties
// called from processLASTHIT and coreOUTPUT

function OBJECTPROPERTIES($objecttype) {
   global $camp_link; // link to campaign db
   global $object_class; // object class from rof_object_properties
   global $object_desc; // object description from rof_object_properties
   global $object_value; // object value from rof_object_properties
   
   // our query to the campaign db
   $query = "SELECT * from rof_object_properties where object_type = '$objecttype'";

   // get result and count
   $result = mysqli_query($camp_link, $query);
   $count = mysqli_num_rows($result);

   // use result (should be just one)
   if ($count == 1) {
	// use result or complain
	$row = mysqli_fetch_row($result);
	$object_class = $row[2];
	$object_value = $row[3];
	$object_desc = $row[4];
   } elseif ($count > 1) {
	echo "duplicate $objecttype found in rof_object_properties!<br>\n";
   } else { // count must be zero
        echo "$objecttype not found in rof_object_properties!<br>\n";
   }

   // close result set
   mysqli_free_result($result);
   
//   debugging
//   echo "\$object_class = $object_class, \$object_value = $object_value, \$object_desc = $object_desc<br?\n";

}
?>

