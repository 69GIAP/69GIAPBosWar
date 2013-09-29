<?php
function TURRETGUNNER($j){
// given linenumber, determine if gunner and if so, what description to use
   global $TYPE; // type of plane, object, or objective - primary or secondary
   global $Ticks; // time since start of mission in 1/50 sec ticks - begins each log line
   global $numgobjects; // number of gameobjects
   global $GOline; // lines defining game objects
   global $PLID; // player plane id 
   global $ID; // object ID
   global $countryadj;  // adjective form of country name  
   global $Gunner; // gunner type, if set
   global $Gunnerticks; // time became gunner
   global $Log; // log lines (for debugging this one)
   $Gunner = ""; 
   $Gunnerticks = "";

//   echo "GUNNER: $TYPE[$j]<br>\n";
   if ($TYPE[$j] == "TurretGothaG5_1") { // used in DFW also
      $Gunner = "gunner";
   } elseif ($TYPE[$j] == "TurretGothaG5_2") { // used in DFW also
      $Gunner = "gunner";
   } elseif (($TYPE[$j] == "TurretGothaG5_2_WM_Twin_Parabellum") ||
      ($TYPE[$j] == "TurretGothaG5_1_WM_Becker_AP")) { 
      $Gunner = "Gotha G.V gunner";
   } elseif ($TYPE[$j] == "TurretGothaG5_1_WM_Twin_Parabellum") {
      $Gunner = "Gotha G.V gunner";
   } elseif ($TYPE[$j] == "TurretHalberstadtCL2_1") {
      $Gunner = "Halberstadt CL.II gunner";
   } elseif ($TYPE[$j] == "TurretHalberstadtCL2au_1_WM_TwinPar") {
      $Gunner = "Halberstadt CLIIau gunner";
   } elseif (($TYPE[$j] == "TurretHP400_1") || ($TYPE[$j] == "TurretHP400_1_WM")) { // just a guess as to which gunner is which - edit if needed
      $Gunner = "Handley Page 0/400 nose gunner";
   } elseif (($TYPE[$j] == "TurretHP400_2") || ($TYPE[$j] == "TurretHP400_2_WM")) { // just a guess as to which gunner is which - edit if needed
      $Gunner = "Handley Page 0/400 dorsal gunner";
   } elseif ($TYPE[$j] == "TurretHP400_3") { // just a guess as to which gunner is which - edit if needed
      $Gunner = "Handley Page 0/400 ventral gunner";
   } elseif ($TYPE[$j] == "TurretDFWC_1") {
      $Gunner = "DFW C.V gunner";
   } elseif ($TYPE[$j] == "TurretDFWC_1_WM_Twin_Parabellum") {
      $Gunner = "DFW C.V gunner";
   } elseif ($TYPE[$j] == "TurretDFWC_1_WM_Becker_HEAP") {
      $Gunner = "DFW C.V gunner";
   } elseif ($TYPE[$j] == "TurretBreguet14_1") { // also used in Bristol and F.E.2b
      $Gunner = "$countryadj Breguet 14.B2 gunner";
   } elseif ($TYPE[$j] == "TurretBristolF2B_1") {
      $Gunner = "Bristol F2.B gunner";
   } elseif ($TYPE[$j] == "TurretBristolF2BF2_1_WM2") {
      $Gunner = "Bristol F2.B gunner";
   } elseif ($TYPE[$j] == "TurretBristolF2BF3_1_WM2") {
      $Gunner = "Bristol F2.B gunner";
   } elseif ($TYPE[$j] == "TurretRE8_1") {
      $Gunner = "R.E.8 gunner";
   } elseif ($TYPE[$j] == "TurretRE8_1_WM2") {
      $Gunner = "R.E.8 gunner";
   } elseif ($TYPE[$j] == "TurretDH4_1_WM") {
      $Gunner = "D.H.4 gunner";
   } elseif ($TYPE[$j] == "TurretDH4_1") {
      $Gunner = "D.H.4 gunner";
   } elseif ($TYPE[$j] == "TurretFe2b_1") {
      $Gunner = "F.E.2b gunner";
   } elseif ($TYPE[$j] == "TurretFe2b_1_WM") {
      $Gunner = "F.E.2b gunner";
   } elseif ($TYPE[$j] == "TurretFelixF2A_2") {
      $Gunner = "Felixstowe F2A gunner";
   } elseif ($TYPE[$j] == "TurretFelixF2A_3") {
      $Gunner = "Felixstowe F2A gunner";
   } elseif ($TYPE[$j] == "TurretFelixF2A_3_WM") {
      $Gunner = "Felixstowe F2A gunner";
   } elseif ($TYPE[$j] == "BotGunnerFelix_top-twin") {
      $Gunner = "Felixstowe F2A top gunner";
   } elseif ($TYPE[$j] == "TurretBW12_1_WM_Twin_Parabellum") {
      $Gunner = "Brandenburg W12 gunner";
   } elseif ($TYPE[$j] == "TurretRolandC2a_1") {
      $Gunner = "Roland C.IIa gunner";
   } elseif ($TYPE[$j] == "TurretRolandC2a_1_WM_TwinPar") {
      $Gunner = "Roland C.IIa gunner";
   } elseif ($TYPE[$j] == "TurretRE8") {
      $Gunner = "gunner";
   } elseif (preg_match('/^Turret/',$TYPE[$j])) {
      // something new
      $Gunner = "unexpected $TYPE[$j] gunner"; 
   }

   if ($Gunner) { 
   // Gunnerticks may not be doing what it is expected to.  May need to redefine it.
   // yes.. should use time from GAMEOBJECTINVOLVED, not current time.
   // match PLID of current PLAYERPLANE line to ID of GAMEOBJECTINVOLVED
   // and take time from there
   // still not convinced I have it right.
//      $Gunnerticks = $Ticks[$j]; 
//      echo "GUNNER: $Log[$j]<br>\n";
      for ($i = 0; $i < $numgobjects; ++$i) {
         $k = $GOline[$i];
         if ($PLID[$j] == $ID[$k]) { // if player ID matches gameobject ID
            $Gunnerticks = $Ticks[$k];
// echo "GUNNER: TYPE[$j] = $TYPE[$j], Ticks[$j] = $Ticks[$j], GUNNER = $Gunner, PLID[$j] = $PLID[$j], ID[$k] = $ID[$k], Gunnerticks = $Gunnerticks<br>\n";
         }
      }
   }

//    echo "GUNNER: linenum = $j TYPE = $TYPE[$j], Gunner = $Gunner<br>\n";
}
?>
