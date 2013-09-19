<form name="input" action="Campaign_Admin2.php" method="post">
<?php
# getAdminCampaigns.php
# Get Campaign list for administrator
# 69giaptushka
# ver 1.0
# Sept 14, 2012
#
# this whole thing is a single form to pass a database name, etc
# try it as a radio button list
echo "<h2>Proposed Campaigns</h2>\n";
# get active campaigns
$query = "SELECT * FROM campaign_settings where status = 4 and simulation = '$game' ";
	
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
			echo "<b>".$campaign."</b> -  ".$camp_db." db - ".$map." map (".$simulation.")<br>\n";
		}
	}

echo "<h2>Active Campaigns</h2>\n";
# get active campaigns
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
			echo "<input type=\"radio\" name=\"db\" value=$camp_db>";
			echo "<b>".$campaign."</b> -  ".$camp_db." db - ".$map." map (".$simulation.")<br>\n";
		}
	}

echo "<h2>Completed Campaigns</h2>\n";
# get completed campaigns
$query = "SELECT * FROM campaign_settings where status = 2 and simulation = '$game' ";
	
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
			echo "<b>".$campaign."</b> -  ".$camp_db." db - ".$map." map (".$simulation.")<br>\n";
	}
}
echo "<h2>Hidden Campaigns</h2>\n";
# get active campaigns
$query = "SELECT * FROM campaign_settings where status = 1 and simulation = '$game' ";
	
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
			echo "<b>".$campaign."</b> -  ".$camp_db." db - ".$map." map (".$simulation.")<br>\n";
		}
	}
?>
<input type="submit" value="Submit">
</form>
