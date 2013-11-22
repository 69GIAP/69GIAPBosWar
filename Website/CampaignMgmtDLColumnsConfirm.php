<?php 

// Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
		
// Include the webside header
	include ( 'includes/header.php' );
	
// Include the navigation on top
	include ( 'includes/navigation.php' );

// Include Post variable debugging
	include ( 'includes/debugging/debuggingPostVariables.php');

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

					export_columns(1);
					export_columns(2);

					echo "<form id=\"campaignMgmtDLColumnsConfirm\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtDLColumnsConfirm.php?btn=campStp\" method=\"post\">\n";
					// NEXT BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "<input type=\"hidden\" name=\"action\" value = \"done\">\n";	
					echo "		<button type=\"submit\" id=\"downloadColumns\" value ='' >Next</button>\n";
					echo "	</fieldset>\n";
					echo "</form>\n";
				} else {
					// actually do the downloads
					echo "OK, time to download for real!<br />\n";
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
