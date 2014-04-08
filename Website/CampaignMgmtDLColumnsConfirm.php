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
				// require connect2CampaignFunction.php
				require ( 'functions/connect2Campaign.php' );

				// include getCampaignVariables.php
				include ( 'includes/getCampaignVariables.php' );
		
				// use this information to connect to campaign 
				$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

				if (isset($_POST['action'])) {
					$action = $_POST['action'];
				} else {
					echo "Warning: action not set<br />\n";
				}

				// require getAbbrv.php
				require ('functions/getAbbrv.php');

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

					// export columns seperately for each coalition
					export_columns(1);
					export_columns(2);

					echo "<form id=\"campaignMgmtDLColumnsConfirm\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtDLColumnsConfirm.php?btn=campStp&sde=campCol\" method=\"post\">\n";
					// NEXT BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "<input type=\"hidden\" name=\"action\" value = \"next\">\n";	
					echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Next</button>\n";
					echo "	</fieldset>\n";
					echo "</form>\n";
				} else {
					// actually do the downloads
					echo "The files have been created on the server, you now need to download them to your PC so that you can work on them with the mission editor.<br><br />\n";
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
