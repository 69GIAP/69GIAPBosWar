<?php 

# Incorporate the MySQL connection script.
	require ( '../connect_db.php' );
		
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

					# initialize variable $returnpage if non existing
					if (empty($returnpage)) {
						$returnpage = '';
					}
					
					if (!isset($_GET['fi'])) {
						$fi = 'airfields';
					} else {
						$fi = $_GET['fi'];
					}
//					echo "\$fi: $fi<br />\n";

					echo "<h2>Upload $campaign Campaign Files</h2>";
					$query = "SELECT * from campaign_settings;";
					if(!$result = $dbc->query($query)) {
						die('CampaignMgmtSetup.php query error [' . $dbc->error . ']');
					}
		
					if ($result = $dbc->query($query)) {
						/* fetch associative array */
						while ($obj = $result->fetch_object()) {
								$map=($obj->map);
						}
					}
					$result->free();

					# require pickFile.php
					require ('functions/pickFile.php');

					if ($fi == 'airfields') { // now processed first
						echo "<p>We will now upload both our airfields group file and our template missions file to the BOSWAR campaign manager.</p>\n";

						echo "<p>Start by navigating to your <b>$abbrv-groups</b> directory.</p>\n";
						echo "<p>Choose <b>$abbrv-airfields.Group.</b><br />
						Then click \"Upload File\".</p>\n";
					$returnpage = 'CampaignMgmtUpload.php';

					} elseif ($fi == 'template') {// now processed second	
						echo "<p>We will now upload our template mission file to the BOSWAR campaign manager.</p>\n";
						echo "<p>Select <b>$abbrv-template.Mission</b><br />
						Then click \"Upload File\".</p>\n";

					# Done (for now) with uploads
					$returnpage = 'CampaignMgmtUpload.php?btn=campMgmt';

					}


					# go
					pickFile($returnpage);

					# start form
					echo "<form id=\"campaignMgmtUploadForm\" name=\"campaignSetup\" action=\"CampaignMgmtUploadDone.php?btn=campMgmt\" method=\"post\">\n";

					/*
					echo "<p>Once both files are safely uploaded and you are ready to proceed, click \"Next\"</p>\n";
					# BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" name =\"Upload\" id=\"UploadDone\" value =\"true\" >Next</button>\n"; # the value defines the action after the button was pressed
					echo "	</fieldset>\n";
					 */

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
