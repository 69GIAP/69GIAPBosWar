#Stenka 23/4/14 <?php 
<?php 

// Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
		
// Include the webside header
	include ( 'includes/header.php' );
	
// Include the navigation on top
	include ( 'includes/navigation.php' );


?>
	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
			<?php
			echo "This session is the first step in the creation of a mission.
The database contains the Z X starting positions and angle of both static groups and columns at the start of the next mission. Now planners for the allied and central
sides need to set the destination Z X for columns and move static groups if the rules allow this.<br><br> 
The .Group files will be identified by the campaign abbreviation, coalition and 2planner tag.<br><br>
Either the planners will have their own login and manage this via their menus or an administrator may generate the group files and send them to the Allied and Central planners by E-mail.<br><br>
Once .Group files have been loaded into the mission editor you will find the columns represented by a single vehicle plus a waypoint and objects within the static groups positionned individualy.
Move the waypoint for a column to the destination that you wish by selection and drag. Set a destination that is realistic for the timeframe of a mission. You can set a waypoint hundreds of miles away but 
when we generate the mission it will moved to a nearer position that is achievable in the time and with the transit speed available. Columns will try to follow roads where possible 
but they are not very clever and will happily throw themselves into a lake or river if that is what you tell them to do.<br><br>

Static groups have each object individually identifiable in the mission editor. The planner may move them if the campaign rules allow by selection and drag. Rotation to give a starting angle is by rotating the small red marker at the bottom right of the green object square. 
All of the objects of a group should be within a reasonably close area. For example all the objects to defend an airfield should be within a half a kilometre of that airfield not scattered over the four corners of the map. This is
because we will link the group to triggers which will wake them up when players or objects are in the proximity.<br><br>
Once positioned the objects should be output to a .Mission file which planners may send by E-Mail back to the administrator. The filename should identify the campaign, coalition and the mission number to make identification easy. The administrator will then use the appropriate
function to load the planning information back into the database before generating the actual mission files.";
				// require connect2CampaignFunction.php
				require ( 'functions/connect2Campaign.php' );

				// include getCampaignVariables.php
				include ( 'includes/getCampaignVariables.php' );
		
				// use this information to connect to campaign 
				$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

#				if (isset($_POST['action'])) {
#					$action = $_POST['action'];
#				} else {
#					echo "Warning: action not set<br />\n";
#				}

				// require getAbbrv.php
				require ('functions/getAbbrv.php');

				$action = "export";
				if ($action == "export") {
					// require getPointXPos.php
					require ('functions/getPointXPos.php');

					// require getPointZPos.php
					require ('functions/getPointZPos.php');

					// require getGroundAILevel.php
					require ('functions/getGroundAILevel.php');

					// require getGroundspacing.php
					require ('functions/getGroundspacing.php');

					// require getCoalitionname.php
					require ('functions/getCoalitionname.php');

                	// require exportColumns2planner.php                
					require ('functions/exportColumns2planner.php');

                	// require exportStaticGroups2planner.php                
					require ('functions/exportStaticGroups2planner.php');
					
					
					// export columns seperately for each coalition
					export_columns2planner(1);
					echo "<br>Allied Columns output to group file<br>";
					export_columns2planner(2);
					echo "<br>Central Columns output to group file<br>";
					export_staticgroups2planner(1);
					echo "<br>Allied Statics output to group file<br>";					
					export_staticgroups2planner(2);					
					echo "<br>Central Statics output to group file<br>";
					echo "<form id=\"campaignMgmtDLColumnsConfirm\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtDLColumnsConfirm2.php?btn=campStp&sde=campCol\" method=\"post\">\n";
					// NEXT BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "<input type=\"hidden\" name=\"action\" value = \"next\">\n";	
					echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Next</button>\n";
					echo "	</fieldset>\n";
					echo "</form>\n";
				} else {
					// actually do the downloads
					echo "OK, time to download for real!<br />\n";
					echo "<form id=\"campaignMgmtDLFile\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtDLFile.php?btn=campStp&sde=campCol\" method=\"post\">\n";
					$DownloadDir = 'downloads/';
					print "<select name=\"dlfile\">\n";
					
					// get list of files as array, removing '.' and '..' from the list
					$files=array_diff(scandir($DownloadDir), array('.','..'));
					
					// sort the array in natural fashion
					natsort($files);
					
					// print the list of files that contains $abbrv
					// make each an element of a pulldown list
					echo "<option value=\"\">Select file to download</option>\n";
					$abbrv = get_abbrv();

					while (list ($key, $value) = each ($files)) {
					   if (preg_match("/^$abbrv/","$value")) {
						  echo "<option value=\"$value\">$value</option>\n";
					   }
					}
					echo "</p><input type=\"submit\" value=\"Go\"><br>\n";
				}


				// close $camp_link
				$camp_link->close();

			?>

            </div>
    
        </div>

		<?php
            # Include the general sidebar
            include ( 'includes/sidebar.php' );
        ?>	

		<div id="clearing"></div>
	</div>

<?php
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
