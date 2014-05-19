<?php 

# Make a mysqli connection to the central BOSWAR database
	require ( 'functions/connectBOSWAR.php' );
	$dbc = connectBOSWAR();
		
# Include the webside header
	include ( 'includes/header.php' );
	
# Include the navigation on top
	include ( 'includes/navigation.php' );

?>

	<div id="wrapper">

        <div id="container">
    
            <div id="content">
            
				<?php
					# include connect2CampaignFunction.php
					include ( 'functions/connect2Campaign.php' );

					# include getCampaignVariables.php
					include ( 'includes/getCampaignVariables.php' );
	
					# use this information to connect to campaign 
					$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");
					global $camp_link; // so functions can use it
					
					if (!isset($_GET['fi'])) {
						$fi = 'airfields';
					} else {
						$fi = $_GET['fi'];
					}
//					echo "\$fi: $fi<br />\n";

					echo "<h2>Import $campaign Campaign Columns and Statics from mission planner</h2>";
					$query = "SELECT * from campaign_settings;";
					if(!$result = $camp_link->query($query)) {
						die('CampaignMgmtSetup.php query error [' . $camp_link->error . ']');
					}
		
					if ($result = $camp_link->query($query)) {
						while ($obj = $result->fetch_object()) {
								$map=($obj->map);
						}
					}
					$result->free();

					// require selectBOSWARfile.php
					require ('functions/selectBOSWARfile.php');

                    // configure
					$SaveToDir = "uploads/";


					echo "<p>We will now use the mission file we recently uploaded to the server.</p>\n";
					// start form
					echo "<form id=\"campaignMgmtImportForm\" name=\"campaignImport\" action=\"CampaignMgmtImportConfirm3.php?btn=campStp&sde=MgmtUlFrmMsnPlnrs\" method=\"post\">\n";

					if ($fi == 'airfields') {
						echo "<p>This will update Z X destination of columns and the position of Static groups for the mission</p>\n";
						echo "<p>Select the file and click \"Update\".</p>\n";
						$returnpage = "CampaignMgmtImport2.php";
						echo "<input type=\"hidden\" name=\"SaveToDir\" value=\"$SaveToDir\">\n";
						echo "<input type=\"hidden\" name=\"returnpage\" value=\"$returnpage\">\n";

						selectBOSWARfile($abbrv,$SaveToDir);

						# BUTTON
						echo "<fieldset id=\"actions\">\n";	
						echo "		<button type=\"submit\" name =\"templateImport\" id=\"updateCamp\" value =\"1\" >Update</button>\n"; # the value defines the action after the button was pressed
						echo "	</fieldset>\n";

						}
					echo "</form>\n";

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
    // close $dbc
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
