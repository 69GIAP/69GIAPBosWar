<?php
// TURRETGUNNER
// given linenumber of a player get object_class and object_desc
// =69.GIAP=TUSHKA
// BOSWAR version 1.2
// Oct 17, 2013
// now seems to be misnamed.  :)
// starting to think of player as just another object.

function TURRETGUNNER($j){
   global $TYPE; // type of plane, object, or objective - primary or secondary
   global $camp_link; // link to campaign db
   global $object_class; // object class from rof_object_properties
   global $object_desc; // object description from rof_object_properties

   $query = "SELECT object_class, object_desc FROM rof_object_properties WHERE object_type = '$TYPE[$j]'";
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
