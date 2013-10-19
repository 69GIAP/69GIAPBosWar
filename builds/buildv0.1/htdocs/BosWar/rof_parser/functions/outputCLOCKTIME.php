<?php
function CLOCKTIME($ticks) {
// convert $Ticks into 24 hr game time
   global $Startticks; // game start time in number of ticks since midnight
   global $clocktime; // 24 hr time
   
   // use a 24 hr clock
   if (($Startticks + $ticks) > 4320000) {
      $Totalticks = ($Startticks + $ticks) - 4320000;
   }  else {
      $Totalticks = $Startticks + $ticks;
   }
   $hr = (int)(($Totalticks) / 180000);
   $min = (int)((($Totalticks) - ($hr * 180000)) / 3000);
   $sec = (int)((($Totalticks) - ($hr * 180000) - ($min * 3000)) / 50);
   $clocktime = sprintf("%02d",$hr) . ":" . sprintf("%02d",$min) . ":" . sprintf("%02d",$sec); 
}
?>
