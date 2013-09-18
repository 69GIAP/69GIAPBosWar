<form name="input" action="Statistics.php" method="post">
<?php
// getCampaigns.php
// Get Campaign list for viewing stats
// 69giaptushka
// 69giapmyata
// ver 1.4
// Sept 17, 2013
// latest change - make radio selection menu
echo "<h2>Active $game Campaigns</h2>\n";

# get active campaigns dependent on the chosen application
$query = "SELECT * FROM campaign_settings where status = 3 and simulation = '$game' ";
	
if(!$result = $dbc->query($query))
   { die('There was an error running the query [' . $dbc->error . ']'); }
	
if ($result = mysqli_query($dbc, $query)) 
	{
		/* fetch associative array */
		while ($obj = mysqli_fetch_object($result)) 
	 	{
			$campaign	=($obj->campaign);
			$camp_db	=($obj->camp_db);
			$map		=($obj->map);
			$simulation	=($obj->simulation);
# debugging
echo "camp_db = $camp_db<br>\n";
			echo "<input type=\"radio\" name=\"db\" value=$camp_db>";
			echo "<b>".$campaign."</b> -  ".$map." map (".$simulation.")</a><br>\n";
		}
	}

echo "<h2>Completed $game Campaigns</h2>\n";

# get completed campaigns dependent on the chosen application
$query = "SELECT * FROM campaign_settings where status = 2  and simulation = '$game' ";
	
if(!$result = $dbc->query($query))
   { die('There was an error running the query [' . $dbc->error . ']'); }
	
if ($result = mysqli_query($dbc, $query))
	{
		 /* fetch associative array */
		 while ($obj = mysqli_fetch_object($result)) 
		{
			$campaign	=($obj->campaign);
			$camp_db	=($obj->camp_db);
			$map		=($obj->map);
			$simulation	=($obj->simulation);
			echo "<input type=\"radio\" name=\"db\" value=$camp_db>";
			echo "<b>".$campaign."</b> -  ".$map." map (".$simulation.")<br>\n";
		}
	}
?>
<input type="submit" value="Submit">
</form>
