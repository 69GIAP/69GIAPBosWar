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

					# initialise variables
					echo "<h1>Import $campaign Campaign Files</h1>";
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

					
					echo "<p>We will now use the files we recently uploaded to the server.</p>\n";
					echo "<p>The template file will be used to determine the minimum and maximum coordinates of your combat sector from the influence areas you have defined, and to enter the combatant's countries and coalitions into the $campaign database.</p>\n";
					echo "<p>The template_to_airfields file will be used to define the airfields to be used in each mission.</p>\n";

					// Include selectBOSWARfile.php
					require ('functions/selectBOSWARfile.php');

                    // configure
					$SaveToDir = "C:/BOSWAR";

					echo "<h3>Update Combat Area, Countries and Coalitions</h3>\n";

					// start form
					echo "<form id=\"campaignMgmtImportForm\" name=\"campaignImport\" action=\"CampaignMgmtImportConfirm.php?btn=campMgmt\" method=\"post\">\n";
					echo "<input type=\"hidden\" name=\"SaveToDir\" value=\"$SaveToDir\">\n";
					$returnpage = "CampaignMgmtImport.php";
					echo "<input type=\"hidden\" name=\"returnpage\" value=\"$returnpage\">\n";
					echo "<p>Select $abbrv-template.Mission and click \"Update CAC&C\".</p>\n";

					selectBOSWARfile($abbrv,$SaveToDir);

					// BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" name =\"templateImport\" id=\"updateCamp\" value =\"1\" >Update CAC&C</button>\n"; # the value defines the action after the button was pressed
					echo "	</fieldset>\n";

					echo "<p>Then select $abbrv-template_to_airfield.Group and click \"Update Airfields\".</p>\n";
					$returnpage = "CampaignMgmtImport.php";
					echo "<input type=\"hidden\" name=\"returnpage\" value=\"$returnpage\">\n";

					selectBOSWARfile($abbrv,$SaveToDir);

					# BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" name =\"templateImport\" id=\"updateCamp\" value =\"2\" >Update Airfields</button>\n"; # the value defines the action after the button was pressed
					echo "	</fieldset>\n";


/*
					echo "<p>We can now load this group file into our Campaign Manager by clicking on the \"Template to Airfields\" big Button.</p>\n";
					
					# This launches inbox.sql then inbox_to_airfield
					# BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" name =\"updateCampaignParameters\" id=\"loginSubmit\" value =\"2\" >Template to Airfields</button>\n"; # the value defines the action after the button was pressed
					echo "	</fieldset>\n";
					
					echo "<p>If the airfields load into the BOSWAR campaign manager correctly we can now return to the mission editor and 
 */
/*
					# after this point will be added the population of bridges into the template grouping and send to the Campaign Manager 
					# again they will be managed in the Campaign manager an sent to the Mission Editor for assembly into each mission.  
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
