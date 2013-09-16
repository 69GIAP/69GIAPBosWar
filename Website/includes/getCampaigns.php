<?php
// getCampaigns.php
// Get Campaign list for viewing stats
// 69giaptushka
// 69giapmyata
// ver 1.3
// Sept 16, 2013
// latest change - link to unintegrated parser
echo "<h2>Active $game Campaigns</h2>\n";

# get active campaigns dependent on the chosen application
$query = "SELECT * FROM campaigns where status = 3 and simulation = '$game' ";
	
if(!$result = $dbc->query($query))
   { die('There was an error running the query [' . $dbc->error . ']'); }
	
if ($result = mysqli_query($dbc, $query)) 
	{
		/* fetch associative array */
		while ($obj = mysqli_fetch_object($result)) 
	 	{
			$campaign	=($obj->campaign);
			$map		=($obj->map);
			$simulation	=($obj->simulation);
			echo "<b><a href=\"rof_parse_log.php\">".$campaign."</b> -  ".$map." map (".$simulation.")</a><br>\n";
		}
	}

echo "<h2>Completed $game Campaigns</h2>\n";

# get completed campaigns dependent on the chosen application
$query = "SELECT * FROM campaigns where status = 2  and simulation = '$game' ";
	
if(!$result = $dbc->query($query))
   { die('There was an error running the query [' . $dbc->error . ']'); }
	
if ($result = mysqli_query($dbc, $query))
	{
		 /* fetch associative array */
		 while ($obj = mysqli_fetch_object($result)) 
		{
			$campaign	=($obj->campaign);
			$map		=($obj->map);
			$simulation	=($obj->simulation);
			echo "<b>".$campaign."</b> -  ".$map." map (".$simulation.")<br>\n";
		}
	}
?>
