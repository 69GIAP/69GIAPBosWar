<?php
function XYZ($POS) {
// Break POS into X, Y and Z.
   global $posx; // X coordinate
   global $posy; // Y coordinate (altitude)
   global $posz; // Z coordinate

   // remove slashes and spaces
   $POS = preg_replace("/\(/","",$POS);
   $POS = preg_replace("/\)/","",$POS);
   $POS = preg_replace("/ /","",$POS);
   $Part = explode(",",$POS,3); // split into X, Y and Z at ","
   $posx = trim($Part[0]);
   $posy = trim($Part[1]);
   $posz = trim($Part[2]);
}
?>
