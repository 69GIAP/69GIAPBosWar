<?php
// BOTGUNNER
// translate BotGunner into more natural description
// BOSWAR version 1.4
// Oct 17, 2013
function BOTGUNNER($type) {
   global $camp_link; // link to campaign db
   global $object_desc; // object description

   $query = "SELECT object_desc FROM rof_object_properties WHERE object_type = '$type'";
   if ($result = mysqli_query($camp_link, $query)) {
      // get results
      while ($obj = mysqli_fetch_object($result)) {
      $object_desc = ($obj->object_desc);
   }
      // free result set
      mysqli_free_result($result); 
   } else { 
      die('There was an error running the query [' . $camp_link->error . ']');
   }
}
?>
