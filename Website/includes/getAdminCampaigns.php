<?php
// getAdminCampaigns.php
// Get Campaign list for administrator
// 69giaptushka
// ver 1.0
// Sept 14, 2012
//
echo "<h2>Proposed Campaigns</h2>\n";
# get active campaigns
$query = "SELECT * FROM campaigns where state = 4";
	
if(!$result = $dbc->query($query))
   { die('There was an error running the query [' . $dbc->error . ']'); }
	
if ($result = mysqli_query($dbc, $query)) {
     /* fetch associative array */
     while ($obj = mysqli_fetch_object($result)) {
        $campaign=($obj->campaign);
        $db_name=($obj->db_name);
	$map=($obj->map);
	$simulation=($obj->simulation);
	echo "<b>".$campaign."</b> -  ".$db_name." db - ".$map." map (".$simulation.")<br>\n";
   }
}

echo "<h2>Active Campaigns</h2>\n";
# get active campaigns
$query = "SELECT * FROM campaigns where state = 3";
	
if(!$result = $dbc->query($query))
   { die('There was an error running the query [' . $dbc->error . ']'); }
	
if ($result = mysqli_query($dbc, $query)) {
     /* fetch associative array */
     while ($obj = mysqli_fetch_object($result)) {
        $campaign=($obj->campaign);
        $db_name=($obj->db_name);
	$map=($obj->map);
	$simulation=($obj->simulation);
	echo "<b>".$campaign."</b> -  ".$db_name." db - ".$map." map (".$simulation.")<br>\n";
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
        $db_name=($obj->db_name);
	$map=($obj->map);
	$simulation=($obj->simulation);
	echo "<b>".$campaign."</b> -  ".$db_name." db - ".$map." map (".$simulation.")<br>\n";
   }
}
echo "<h2>Hidden Campaigns</h2>\n";
# get active campaigns
$query = "SELECT * FROM campaigns where state = 1";
	
if(!$result = $dbc->query($query))
   { die('There was an error running the query [' . $dbc->error . ']'); }
	
if ($result = mysqli_query($dbc, $query)) {
     /* fetch associative array */
     while ($obj = mysqli_fetch_object($result)) {
        $campaign=($obj->campaign);
        $db_name=($obj->db_name);
	$map=($obj->map);
	$simulation=($obj->simulation);
	echo "<b>".$campaign."</b> -  ".$db_name." db - ".$map." map (".$simulation.")<br>\n";
   }
}

?>
