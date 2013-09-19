<?php
# getRadiobuttonForStats
# =69.GIAP=TUSHKA
# Sept 18, 2013
# version 1.0

# define the function 
function get_radiobutton_for_stats($db_link,$query) {
if(!$result = $db_link->query($query))
   { die('There was an error running the query [' . $db_link->error . ']'); }
	
if ($result = mysqli_query($db_link, $query))
	{
		 /* fetch associative array */
		 while ($obj = mysqli_fetch_object($result)) 
		{
			$campaign	=($obj->campaign);
			$camp_db	=($obj->camp_db);
			$map		=($obj->map);
			$simulation	=($obj->simulation);
			echo "<p><input type=\"radio\" name=\"camp_db\" value=$camp_db>";
			echo "<b>".$campaign."</b> -  ".$map." map (".$simulation.")<br></p>\n";
		}
	}
}
?>
