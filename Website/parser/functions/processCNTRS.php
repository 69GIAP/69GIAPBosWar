<?php
// processCNTRS
// assign countries to their coalitions
// presuming only one start line, or if not, use the latest
// =69.GIAP=TUSHKA
// 2011-2014
// BOSWAR version 0.33
// Apr 6, 2014

function CNTRS($CNTRS) {

   global $CNTRS; // countries and their coalitions as a string
   global $COUNTRY; // country ID
   global $COAL; // coalition ID
   global $CoCoal; // array of countries and their coalitions
   
// Redvo's example:
//0:0,101:2,102:1,103:2,104:1,105:1,501:2,502:2,600:0,610:0,620:0,630:0,640:0
// BoS example:
//0:0,101:1,201:2

   // count the commas
   $commas = substr_count($CNTRS,',');
   // split into country:coalition pairs at the commas.
   // There will be 13 for RoF, and 3 for BoS.
   $arr = explode(",",$CNTRS,$commas+1); 
   // now split the pairs at the colon and assign to the $CoCoal array.
   for ($i = 0; $i < $commas+1; ++$i) {
     $arr2 = explode(":",$arr[$i],2);
     $CoCoal[$arr2[0]]=$arr2[1];
   }
}
?>

