<?php
function OBJECTCOUNTRYNAME ($id,$ticks) {
// given ID, find a game object's country name
   global $numgobjects; // number of game objects involved
   global $GOline; // lines defining game objects
   global $ID; // object ID
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $COUNTRY; // country ID
   global $countryid; // country id

   for ($i = 0; $i < $numgobjects; ++$i) {
      $j = $GOline[$i];
      if (($ID[$j] == $id ) && ($Ticks[$j] <= $ticks)) {
         $countryid = $COUNTRY[$j];
      }
//      echo "id = $id, ID[$j] = $ID[$j], ticks = $ticks, Ticks[$j] = $Ticks[$j]<br>\n";
   }
   COUNTRYNAME($countryid);
}
?>
