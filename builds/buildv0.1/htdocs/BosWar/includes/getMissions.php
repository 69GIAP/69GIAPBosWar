
<?php
// getMissions.php
// Get Mission list for viewing stats

// 69giapmyata
// ver 1.0
// Oct 18, 2013

# load Missions	
echo "<form id=\"campaignForm\" name=\"input\" action=\"CampaignStatistics.php?btn=home\" method=\"post\">\n";	

echo "	<h3 id=\"h3Form\">Flown Missions</h3>\n";
echo "	<fieldset id=\"inputs\">\n";
# get campaign missions
$query = "SELECT distinct(MissionID) FROM rof_kills	ORDER BY MissionID asc";

# Get Missions.
if(!$result = $camp_link->query($query))
   { die('There was an error running the query [' . $camp_link->error . ']'); }
	
if ($result = mysqli_query($camp_link, $query))
	{
		echo "	<div class=\"radio\">\n"; 
		$i = rand(); 
		/* fetch associative array */
		 while ($obj = mysqli_fetch_object($result)) 
		{
			$MissionID	=($obj->MissionID);
			
			# using TUSHKAS hack to hand 2 variables over to next page
			echo "		<input id=\"$i\" type=\"radio\" name=\"camp_db_mission\" value=\"".$camp_db."+".$MissionID."\">";
			echo "		<label for=\"$i\"><b>".$MissionID."</b></label>\n";
			$i ++;
		}
		echo "	</div>\n";
	}
echo "	</fieldset>\n";	
echo "	<fieldset id=\"actions\">\n";		
echo "		<input id =\"loginSubmit\" type=\"submit\" value=\"Get Stats\">\n";
echo "	</fieldset>\n";
echo "</form>\n";

?>

