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

				$query = "SELECT * from campaign_settings;";
				if(!$result = $camp_link->query($query)) {
					die('CampaignMgmtSetupColumns.php query error [' . $dbc->error . ']');
				}

				if ($result = $camp_link->query($query)) {
					while ($obj = $result->fetch_object()) {
							$map=($obj->map);
					}
				}
				$result->free();

				if (!isset($_GET['fi'])) {
					$fi = 'unset';
				} else {
					$fi = $_GET['fi'];
				}
				if ($fi == "unset") {
					echo "<h1>Create a Column</h1>\n";

					// start form
					echo "<form id=\"campaignMgmtSetupColumns\" name=\"campaignSetupColumns\" action=\"CampaignMgmtSetupColumnsConfirm.php?btn=campStp\" method=\"post\">\n";
					// include setupColumns.php
					include ('includes/setupColumns.php');

					# BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" id=\"countrySubmit\" value ='' >Select Country</button>\n";
					echo "	</fieldset>\n";
					
					echo "</form>\n";
					
                    // close $camp_link
					$camp_link->close();

					$returnpage = 'CampaignMgmtSetupColumns.php';

				} // end if (fi == unset) - points file has been uploaded

				if ($fi == 'bridges') {
					# require importBridges.php
					require ('functions/importBridges.php');

					echo "<h2>Import The Bridges</h2>\n";

					$SaveToDir = "C:/BOSWAR";
					$file = "$abbrv-bridges.Group";
					import_bridges($SaveToDir,$file);

					// Now delete the file
					$filename = $SaveToDir.'/'.$file;
					if (file_exists($filename)) {
						// delete the file
						unlink("$filename");	
						echo "$filename deleted<br />\n";
					} else {
						echo "$filename not found or read-only<br />\n";
					}

					$fi == '';
					$returnpage = 'CampaignMgmtSupplyControlPoints.php'; //next page
										echo "<p>To proceed, click \"Next\"</p>\n";

					echo "<form id=\"campaignMgmtSupplyControlDone\" name=\"campaignSetup\" action=\"CampaignMgmtAirfields.php?btn=campStp\" method=\"post\">\n";
					# BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" name =\"Setup\" id=\"SetupDone\" value =\"true\" >Next</button>\n"; # the value defines the action after the button was pressed
					echo "	</fieldset>\n";
					echo "</form>\n";


				}
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
