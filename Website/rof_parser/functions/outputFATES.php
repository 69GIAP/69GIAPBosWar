<?php
function FATES($i,$j) {
   // $i is playernumber
   // $j is linenumber defining that player.
   global $COUNTRY; // country ID
   global $countryname; // country name
   global $CoalID; // coalition ID
   global $TYPE; // type of plane in this context
   global $anora; // an or a
   global $Gunner; // gunner type, if set
   global $Gunnerticks; // time became gunner
   global $Wound; // array holding severity of wound
   global $Woundticks; // ticks when last wounded
   global $Woundpos; // position where last wounded
   global $clocktime; // 24 hr time
   global $Death; // dead players numbers
   global $Deathticks; // ticks when died
   global $Deathpos; // position where died
   global $Eline; // lines that define mission ends
   global $numends; // number of mission ends
   global $posx; // X coordinate
   global $posz; // Z coordinate
   global $where; // position in english
   global $NAME; // player profile name
   global $numlandings; // number of landings
   global $numtakeoffs; // number of takeoffs
   global $Lline;  // landing lines
   global $Tline;  // takeoff lines
   global $PID; // plane ID (whether bot or player)
   global $PLID; // player plane id
   global $Ticks; // time since start of mission in 1/50 sec ticks
   global $POS; // position x,y,z
   global $FinishFlightOnlyLanded; // true or false setting

   // get "", "a" or "an" right for the plane
   ANORA($TYPE[$j]);
   $a = $anora;
   // get player's country name
   COUNTRYNAME($COUNTRY[$j]);
   // is this player a pilot or gunner?
   GUNNER($j);

   // if gunner, ignore wounds acquired before becoming this gunner
   if ($Gunner) {
      ANORA($Gunner);
      $ag = $anora;
      if ($Woundticks[$i] < $Gunnerticks) {
         $Wound[$i] = 0;
      }
   }

   // now print out the fate of the player
   if ($Death[$i]) { // player has been killed
      CLOCKTIME($Deathticks[$i]);
      XYZ($Deathpos[$i]);
      WHERE($posx,$posz,0);
      if ($Gunner) { //G1:
//         echo "Woundticks[$i] = $Woundticks[$i], Gunnerticks = $Gunnerticks<br>\n";
         echo "$NAME[$j] as $ag $Gunner for $countryname was killed at $clocktime $where<br>\n";
      } else { // not gunner so must be pilot
         echo "$NAME[$j] piloting $a $TYPE[$j] for $countryname was killed at $clocktime $where<br>\n";
      }
   } elseif ($Wound[$i]) { // player is alive but has been wounded
      CLOCKTIME($Woundticks[$i]);
      XYZ($Woundpos[$i]);
      WHERE($posx,$posz,0);
      // how seriously wounded?
      if ($Wound[$i] > .66) {
         $injuries = "critical injuries";
      }
      else if ($Wound[$i] > .33) {
         $injuries = "serious injuries";
      } else {
         $injuries = "minor injuries";
      }
      if ($Gunner) { //G2:
//         echo "Woundticks[$i] = $Woundticks[$i], Gunnerticks = $Gunnerticks<br>\n";
         echo "$NAME[$j] as $ag $Gunner for $countryname suffered $injuries at $clocktime $where<br>\n";
      } else { // not gunner so must be pilot
         echo "$NAME[$j] piloting $a $TYPE[$j] for $countryname suffered $injuries at $clocktime $where<br>\n";
      }
   }  else { // player is unwounded
      // loop through landings to report landing
//      echo "landing loop<br>\n";
      $landed = "";
      for ($k = 0; $k < $numlandings; ++$k) {
         $l = $Lline[$k];
         if ($PLID[$j] == $PID[$l]) {
            CLOCKTIME($Ticks[$l]);
            XYZ($POS[$l]);
            WHERE($posx,$posz,0);
//            echo "PID[$j] = $PID[$j], PLID[$j] = $PLID[$j], PID[$l] = $PID[$l]<br>\n";
            $landed = "landed at $clocktime $where";
         }
      } // end landing check

      if (($landed == "") && ($FinishFlightOnlyLanded)) {
//      echo "FD check<br>\n";
      // this is the "FD" check.  Twice in a row his landings were not reported.
      // loop through reported finishes... only possible if landed.
         for ($k = 0; $k < $numends; ++$k) {
            $l = $Eline[$k]; 
            if ($PLID[$j] == $PLID[$l]) {
               CLOCKTIME($Ticks[$l]);
               XYZ($POS[$l]);
               WHERE($posx,$posz,0);
//               echo "PLID[$j] = $PLID[$j], PLID[$j] = $PLID[$j]<br>\n";
               $landed = "landed at $clocktime $where";
            }
         }
      } // end FinishFlightOnlyLanded landing check

      if ($landed == "") { // player never landed
         // loop through takeoffs to make sure player took off
         $tookoff = 0;
         for ($k = 0; $k < $numtakeoffs; ++$k) {
            $l = $Tline[$k];
            if ($PLID[$j] == $PID[$l]) {
              $tookoff = 1;
            }
         }
         if ($tookoff == 0) { // player never took off
            $landed = "did not take off, surviving to fight another day";
         } else {
            $landed = "did not land";
         }
      } // end takeoff check

      if ($Gunner) { // gunners do not take off or land independently G3:
         echo "$NAME[$j] as $ag $Gunner for $countryname survived safe and sound<br>\n";
      } else { //  pilot player took off and landed
         echo "$NAME[$j] piloting $a $TYPE[$j] for $countryname $landed<br>\n";
      }
   } // end unwounded
} // end function
?>
