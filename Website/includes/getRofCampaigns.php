<?php
// getCampaigns.php
// Get Campaign list for viewing stats
// 69giaptushka
// ver 1.1
// Sept 13, 2012
//
echo "<h2>Active Rise of Flight Campaigns</h2>\n";
# get active campaigns
$query = "SELECT * FROM campaigns where state = 3";
	
if(!$result = $dbc->query($query))
   { die('There was an error running the query [' . $dbc->error . ']'); }
	
if ($result = mysqli_query($dbc, $query)) {
     /* fetch associative array */
     while ($obj = mysqli_fetch_object($result)) {
        $campaign=($obj->campaign);
	$map=($obj->map);
	$simulation=($obj->simulation);
	echo "<b>".$campaign."</b> -  ".$map." map (".$simulation.")<br>\n";
   }
}

echo "<h2>Completed Campaigns</h2>\n";
# get completed campaigns
$query = "SELECT * FROM campaigns where state = 2";
	
if(!$result = $dbc->query($query))
   { die('There was an error running the query [' . $dbc->error . ']'); }
	
if ($result = mysqli_query($dbc, $query)) {
     /* fetch associative array */
     while ($obj = mysqli_fetch_object($result)) {
        $campaign=($obj->campaign);
	$map=($obj->map);
	$simulation=($obj->simulation);
	echo "<b>".$campaign."</b> -  ".$map." map (".$simulation.")<br>\n";
   }
}
?>
