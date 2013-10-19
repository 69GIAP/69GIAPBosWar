
<?php
// getCampaigns.php
// Get Campaign list for viewing stats
// 69giaptushka
// 69giapmyata
// ver 1.6
// Sept 18, 2013
// latest change - use external function for radio buttons

# include the fuction that makes a radio button
include 'functions/getRadiobuttonForStats.php';

if ($userRole == "administrator" or $userRole == "commander")
	{
		echo "<form id=\"campaignForm\" name=\"input\" action=\"includes/campaignSelect.php\" method=\"post\">\n";

		if ($userRole == "administrator")
			{
				# get proposed campaigns
				echo "<h3 id=\"h3Form\">Proposed $game Campaigns</h3>\n";				
				$query = "SELECT * FROM campaign_settings where status = 4 and simulation = '$game' ";

				# get the radio buttons
				get_radiobutton_for_stats($dbc,$query);
				
				echo "<h3 id=\"h3Form\">Active $game Campaigns</h3>\n";
				# get active campaigns
				$query = "SELECT * FROM campaign_settings where status = 3 and simulation = '$game' ";

				# get the radio buttons
				get_radiobutton_for_stats($dbc,$query);
				
				echo "<h3 id=\"h3Form\">Completed $game Campaigns</h3>\n";
				# get completed campaigns
				$query = "SELECT * FROM campaign_settings where status = 2 and simulation = '$game' ";

				# get the radio buttons
				get_radiobutton_for_stats($dbc,$query);
				
				echo "<h3 id=\"h3Form\">Hidden $game Campaigns</h3>\n";
				# get active campaigns
				$query = "SELECT * FROM campaign_settings where status = 1 and simulation = '$game' ";

				# get the radio buttons
				get_radiobutton_for_stats($dbc,$query);
				
				echo "	<fieldset id=\"actions\">\n";		
										
				# create form button
				echo "		<input id =\"loginSubmit\" type=\"submit\" value=\"Connect\"><br>\n";
				echo "	</fieldset>\n";
				echo "</form>\n";
			}
		if ($userRole == "commander")
			{
			echo "<h3 id=\"h3Form\">Active $game Campaigns</h3>\n";

			# check if commander is assigned to any active campaign
			$query = "SELECT * FROM campaign_settings c
						JOIN campaign_users u
						ON  c.camp_db = u.camp_db
						AND c.status = 3
						AND c.simulation = '$game'
						AND u.user_id = '$userId'";
	
			# get the radio buttons
			get_radiobutton_for_stats($dbc,$query);
			
			# create form button
			echo "	<fieldset id=\"actions\">\n";			
			echo "		<input id =\"loginSubmit\" type=\"submit\" id=\"loginSubmit\" value=\"Connect\"><br>\n";
			echo "	</fieldset>\n";
			echo "</form>\n";
			echo "<p>If you miss your campaign in the list or you not even see a list, then please contact your administrator to assign you as commander!</p>\n";
			}
	}

# load statistics	
if ($userRole == "viewer" or $userRole == "")
	{
		echo "<form id=\"campaignForm\" name=\"input\" action=\"CampaignStatisticsMissions.php?btn=home\" method=\"post\">\n";	

		echo "		<h3 id=\"h3Form\">Active $game Campaigns</h3>\n";
		
		# get active campaigns dependent on the chosen application
		$query = "SELECT * FROM campaign_settings where status = 3 and simulation = '$game' ";
		
		# Use the function.  Arguments are an open link and a query.
		get_radiobutton_for_stats($dbc,$query);
		
		echo "		<h3 id=\"h3Form\">Completed $game Campaigns</h3>\n";
		
		# get completed campaigns dependent on the chosen application
		$query = "SELECT * FROM campaign_settings where status = 2  and simulation = '$game' ";
		
		# Use the function again
		get_radiobutton_for_stats($dbc,$query);

		echo "	<fieldset id=\"actions\">\n";		
		echo "		<input id =\"loginSubmit\" type=\"submit\" value=\"Get Stats\">\n";
		echo "	</fieldset>\n";
		echo "</form>\n";
	
	}

?>

