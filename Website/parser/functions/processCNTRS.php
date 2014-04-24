<?php
function CNTRS($CNTRS) {
// assign countries to their coalitions
// presuming only one start line
   global $CNTRS; // countries and their coalitions as a string
   global $COUNTRY; // country ID
   global $COAL; // coalition ID
   global $CoCoal; // array of countries and their coalitions
   
// Redvo's example:
//0:0,101:2,102:1,103:2,104:1,105:1,501:2,502:2,600:0,610:0,620:0,630:0,640:0

   // split into country:coalition pair at the commas.  There will be 13.
   $arr = explode(",",$CNTRS,13); 
   // now split the pairs at the colon and assign to the $CoCal array.
   for ($i = 0; $i < 13; ++$i) {
     $arr2 = explode(":",$arr[$i],2);
     $CoCoal[$arr2[0]]=$arr2[1];
   }
}
?>
