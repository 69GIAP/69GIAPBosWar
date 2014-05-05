#Stenka 1/4/14 moving export of columns to separate menu option<?php 
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
			echo "This session is used in the process of creating a Template.
The campaign template will contain the Z X starting positions and angle of both static groups and columns at the start of the very first mission.
An administrator may set this for one or both sides or may send the group files to the Allied or Central planners by E-mail.<br><br>
Once .Group files have been loaded into the mission editor you will find the columns represented by a single vehicle and objects within the static groups positionned at the relevant supply points.
These can be moved to their starting positions as defined by the campaign rules by selection and drag. Rotation to give a starting angle is by rotating the small red marker at the bottom right of the green object square.<br><br>
Once positioned the objects should be output to a .Mission file which planners may send by E-Mail to the administrator. The .Mission file should be named so that it is easy to recognise
which campaign and which coalition is concerned. The administrator will then use the appropriate
function to load the new Z X and angle position back into the database.";
				// require connect2CampaignFunction.php
				require ( 'functions/connect2Campaign.php' );

				// include getCampaignVariables.php
				include ( 'includes/getCampaignVariables.php' );
		
				// use this information to connect to campaign 
				$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
				echo " Peter database is : $loadedCampaign <br>";
				if (isset($_POST['action'])) {
					$action = $_POST['action'];
				} else {
					echo "Warning: action not set<br />\n";
				}

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

                	// require exportColumns.php                
					require ('functions/exportColumns.php');

                	// require exportStaticGroups.php                
					require ('functions/exportStaticGroups.php');
					
					
					// export columns seperately for each coalition
					export_columns(1);
					echo "<br>Allied Columns output to group file<br>";
					export_columns(2);
					echo "<br>Central Columns output to group file<br>";
					export_staticgroups(1);
					echo "<br>Allied Statics output to group file<br>";					
					export_staticgroups(2);					
					echo "<br>Central Statics output to group file<br>";
					echo "<form id=\"campaignMgmtDLColumnsConfirm\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtDLColumnsConfirm.php?btn=campStp&sde=MgmtDlClmsStcs\" method=\"post\">\n";
					// NEXT BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "<input type=\"hidden\" name=\"action\" value = \"next\">\n";	
					echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Next</button>\n";
					echo "	</fieldset>\n";
					echo "</form>\n";
				} else {
					// actually do the downloads
					echo "OK, time to download for real!<br />\n";
					echo "<form id=\"campaignMgmtDLFile\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtDLFile.php?btn=campStp&sde=MgmtDlClmsStcs\" method=\"post\">\n";
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
