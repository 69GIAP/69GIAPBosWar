<?php
// TRAINS
// translate railroad object type into more natural description
// BOSWAR version 1.1
// Oct 17, 2013
function TRAINS($type) {
   global $camp_link; // link to campaign db
   global $object_class; // object class from rof_object_properties
   global $object_desc; // object description

   $query = "SELECT object_class, object_desc FROM rof_object_properties WHERE object_type = '$type'";
   if ($result = mysqli_query($camp_link, $query)) {
      // get results
      while ($obj = mysqli_fetch_object($result)) {
      $object_class	= ($obj->object_class);
      $object_desc	= ($obj->object_desc);
   }
      // free result set
      mysqli_free_result($result); 
   } else { 
      die('There was an error running the query [' . $camp_link->error . ']');
   }
}
?>
