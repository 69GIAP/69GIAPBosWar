<?php
// getRadiobuttonForStats
// =69.GIAP=TUSHKA
// Sept 18, 2013
// revised Oct 28, 2013
// version 1.2

// define the function 
function get_radiobutton_for_stats($db_link,$query) {
if(!$result = $db_link->query($query))
   { die('There was an error running the query [' . $db_link->error . ']'); }
	
if ($result = $db_link->query($query)) {
   echo "<div class=\"radio\">\n"; 
   $i = rand(); 
   // 
   while ($obj = $result->fetch_object()) {
      $campaign	=($obj->campaign);
      $camp_db	=($obj->camp_db);
      $map		=($obj->map);
      $simulation	=($obj->simulation);
      echo "	<input id=\"$i\" type=\"radio\" name=\"camp_db\" value=$camp_db>";
      echo "	<label for=\"$i\"><b>".$campaign."</b> -  ".$camp_db." db - ".$map." map </label>  \n";
      $i++;
   }
   // free result set,object oriented style
   $result->close();
   echo "</div>\n";
   }
}
?>
