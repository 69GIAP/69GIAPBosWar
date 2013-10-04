<?php
// OBJECTPROPERTIES
// =69.GIAP=TUSHKA
// ver 1.0
// Sept 27, 2013
// get object's properties from rof_object_properties
// called from processLASTHIT and coreOUTPUT

function OBJECTPROPERTIES($objecttype) {
   global $camp_link; // link to campaign db
   global $objectclass; // object class from rof_object_properties
   global $objectvalue; // object value from rof_object_properties
   
   // our query to the campaign db
   $query = "SELECT * from rof_object_properties where object_type = '$objecttype'";

   // get result and count
   $result = mysqli_query($camp_link, $query);
   $count = mysqli_num_rows($result);

   // use result (should be just one)
   if ($count == 1) {
	// use result or complain
	$row = mysqli_fetch_row($result);
	$objectclass = $row[2];
	$objectvalue = $row[3];
   } elseif ($count > 1) {
	echo "duplicate $objecttype found in rof_object_properties!<br>\n";
   } else { // count must be zero
        echo "$objecttype not found in rof_object_properties!<br>\n";
   }

   // close result set
   mysqli_free_result($result);

}
?>

