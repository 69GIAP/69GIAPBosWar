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
		echo "<table width=\"auto\" align=\"left\" cellpadding=\"2px\" >\n";
		
		echo "	<colgroup>\n";
		echo "		<col width=\"15px\"		\>\n";
		echo "		<col width=\"180px\"	\>\n";
		echo "		<col width=\"180px\"	\>\n";
		echo "		<col width=\"100px\"	\>\n";
		echo "	</colgroup>\n";	
					
		echo "	<tr>\n";
		echo "		<th align=\"left\"> <font color=\"#A8A8A8\" >			</font></th>\n";
		echo "		<th align=\"left\"> <font color=\"#A8A8A8\" >Campaign	</font></th>\n";
		echo "		<th align=\"left\"> <font color=\"#A8A8A8\" >Database	</font></th>\n";		
		echo "		<th align=\"left\"> <font color=\"#A8A8A8\" >Map		</font></th>\n";
		echo "	</tr>\n";		
		 /* fetch associative array */
		 while ($obj = mysqli_fetch_object($result)) 
		{
			$campaign	=($obj->campaign);
			$camp_db	=($obj->camp_db);
			$map		=($obj->map);
			$simulation	=($obj->simulation);

			echo "	<tr>\n";
			echo "		<td><input type=\"radio\" name=\"camp_db\" value=$camp_db></td>\n";
			echo "		<td><b>".$campaign.	"</b></td>\n";
			echo "		<td>"	.$camp_db.	"</td>\n";
			echo "		<td>"	.$map.		"</td>\n";
			echo "	</tr>\n";
		}
		echo "</table><br>\n";
	}
}
?>
