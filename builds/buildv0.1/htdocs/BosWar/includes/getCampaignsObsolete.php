
<?php
// getObsoleteCampaigns.php
// Get only Proposed and Hidden Campaigns to delete obsolete data
// 69giapmyata
// ver 1.0
// Oct 06, 2013

	# include the fuction that makes a radio button
	include 'functions/getRadiobuttonForStats.php';
	
	if ($userRole == "administrator" or $userRole == "commander")
		{
			echo "<form id=\"campaignForm\" name=\"input\" action=\"includes/campaignDrop.php\" method=\"post\">\n";
	
			if ($userRole == "administrator")
				{
					# get proposed campaigns
					echo "<h3 id=\"h3Form\">Proposed $game Campaigns</h3>\n";				
					$query = "SELECT * FROM campaign_settings where status = 4 and simulation = '$game' ";
	
					# get the radio buttons
					get_radiobutton_for_stats($dbc,$query);
					
					echo "<h3 id=\"h3Form\">Hidden $game Campaigns</h3>\n";
					# get active campaigns
					$query = "SELECT * FROM campaign_settings where status = 1 and simulation = '$game' ";
	
					# get the radio buttons
					get_radiobutton_for_stats($dbc,$query);
					
					echo "	<fieldset id=\"actions\">\n";		
											
					# create form button
					echo "		<input id =\"loginSubmit\" type=\"submit\" value=\"!! DROP !!\"><br>\n";
					echo "	</fieldset>\n";
					echo "</form>\n";
			}
	if ($userRole == "commander" or $userRole == "viewer" or $userRole == "")
			{
				echo "<p>You have no rights to drop a database!</p>\n";
			}
	
	}

?>

