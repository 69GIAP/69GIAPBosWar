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

					echo "<h2>Import $campaign Campaign Template</h2>";
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
					$SaveToDir = "C:/BOSWAR";


					echo "<p>We will now use the template file we recently uploaded to the server.</p>\n";
					// start form
					echo "<form id=\"campaignMgmtImportForm\" name=\"campaignImport\" action=\"CampaignMgmtImportConfirm.php?btn=campMgmt\" method=\"post\">\n";

					if ($fi == 'airfields') {
						echo "<h3>Update Combat Areas, Countries and Coalitions, Active and Inactive Airfields</h3>\n";
						echo "<p>The template file will be used to define a rectangular combat area that includes all defined Influence Areas, and will also import your settings for countries, coalitions, and the airfields to be used in each mission.</p>\n";
						echo "<p>Select <b>$abbrv-template.Mission</b> and click \"Update\".</p>\n";
						$returnpage = "CampaignMgmtImport.php";
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
