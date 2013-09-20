<form name="input" action="Statistics.php" method="post">
<?php
// getCampaigns.php
// Get Campaign list for viewing stats
// 69giaptushka
// 69giapmyata
// ver 1.5
// Sept 18, 2013
// latest change - use external function for radio buttons

# include the fuction that makes a radio button
include 'functions/getRadiobuttonForStats.php';

echo "<h3>Active $game Campaigns</h3>\n";

# get active campaigns dependent on the chosen application
$query = "SELECT * FROM campaign_settings where status = 3 and simulation = '$game' ";

# Use the function.  Arguments are an open link and a query.
get_radiobutton_for_stats($dbc,$query);

echo "<h3>Completed $game Campaigns</h3>\n";

# get completed campaigns dependent on the chosen application
$query = "SELECT * FROM campaign_settings where status = 2  and simulation = '$game' ";

# Use the function again
get_radiobutton_for_stats($dbc,$query);

?>
<input type="submit" value="Submit">
</form>
