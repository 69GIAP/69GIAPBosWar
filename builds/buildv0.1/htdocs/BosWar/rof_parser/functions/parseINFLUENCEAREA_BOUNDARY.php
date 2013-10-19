<?php
function INFLUENCEAREA_BOUNDARY($i) { // AType:14
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $Part; // parts of log lines
   global $AID; // area ID in this context
   global $BP; // boundary points
   global $numB; // number of boundary definitions
   global $Bline; // lines defining area boundaries
   global $Boundary0; // array of point pairs defining boundary 0
   global $Boundary1; // array of point pairs defining boundary 1
   global $BoundaryArray; // array of point pairs defining boundary

// example
//T:1 AType:14 AID:1241088 BP((200850.4,118.1,61015.1),(186052.6,118.1,52807.5),(185346.4,118.1,2427.4),(281753.6,118.1,4016.5),(281168.5,118.1,68537.0),(273736.8,118.1,72267.7),(254926.8,118.1,64523.4),(245927.2,118.1,58008.8),(238328.3,118.1,58978.3),(231793.4,118.1,60857.7),(221480.8,118.1,61415.5),(211645.6,118.1,64372.1))
   // note: T and AType have already been trimmed off

   $Part[1] = substr($Part[1],4); // trim the "AID:" leader off this line
   $Part = explode(" BP",$Part[1],2); // split into AID and BP at " BP"
   $AID[$i] = $Part[0];
   $BP[$i] = rtrim($Part[1]);
//   echo ("<p>INFLUENCEAREA_BOUNDARY $Ticks[$i] $AID[$i] $BP[$i] </p>\n");
   // OK, now we need to convert the $BP[$i]s into the kind of arrays that
   // the pointLocation class is expecting.
   $BPA = preg_replace ("/,/", " ", $BP[$i]);
   //echo "$BPA<br>\n";
   // replace internal floating-point numbers with spaces
   $BPA = preg_replace ("/ \d+\D\d+ /", " ", $BPA);
   //echo "$BPA<br>\n";
   // replace point separators ") (" with spaces
   $BPA = preg_replace ("/\) \(/", ",", $BPA);
   //echo "$BPA<br>\n";
   // eliminate closing "))"
   $BPA = preg_replace ("/\)\)/", "", $BPA);
   //echo "$BPA<br>\n";
   // eliminate opening "(("
   $BPA = preg_replace ("/\(\(/", "", $BPA);
   //echo "$BPA<br>\n";
   $numpoints = substr_count($BPA, ",") +1;
   //echo "$numpoints numpoints<br>\n";
   $Boundary = explode(",",$BPA);

   // add last point = first point to close the loop
   $Boundary[$numpoints] = $Boundary[0];

   $BoundaryArray[$numB] = $Boundary;

   // debugging
   //for ($j = 0; $j < $numpoints; ++$j ){
   //   echo "Boundary = $Boundary[$j]<br>\n";
   //}
   //echo "Boundary = $Boundary[$numpoints]<br>\n";

   $Bline[$numB] = $i;
   ++$numB;
   //  echo "numB = $numB<br>\n";
}
?>
