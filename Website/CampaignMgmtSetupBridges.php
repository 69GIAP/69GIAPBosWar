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
				# require connect2CampaignFunction.php
				require ( 'functions/connect2Campaign.php' );

				# include getCampaignVariables.php
				include ( 'includes/getCampaignVariables.php' );
		
				# use this information to connect to campaign 
				$camp_link = connect2campaign("$camp_host","$camp_user","$camp_passwd","$loadedCampaign");

				$query = "SELECT * from campaign_settings;";
				if(!$result = $camp_link->query($query)) {
					die('CampaignMgmtSetup.php query error [' . $dbc->error . ']');
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
					echo "<h1>Setup Bridges</h1>\n";

					echo "<p>We do this in the Mission Editor.  Reopen it and select <b>$abbrv-template.Mission</b> if it is not already open.</p>\n";
					if ($map == 'Verdun' || $map == 'Lake') {
						echo "<p>You have already loaded all infrastructure including the bridges.</p>\n";
					}elseif ($map == 'Western Front' || $map == 'Channel') {
						echo "<h2>The Big Import</h2>\n";
						echo "<p>At this stage (after supply/control points have been defined and removed) the template contains little but defined Influence Areas.  We will now populate our map with all the infrastructure that we have been missing, including, most importantly, the bridges.</p>\n"; 
						echo "<p>In the mission editor \"File\" menu select \"Import From File...\" and go to: directory <b>Rise of Flight/data/Template/</b></p>\n";
						if ($map = 'Western Front') {
							echo "<p>Select the Base-for-trunc.Group file.  This file holds the villages and farms and special buildings and the bridges for the entire Western Front map.  This file is much larger than the one you loaded earlier, so loading this file will take even more time.  Be patient.</p>\n";
						} else {
							echo "<p>Select the Base-for-trunc-channel.Group file.  This file holds the villages and farms and special buildings and the bridges for the entire Channel map.  This file is much larger than the one you loaded earlier, so loading this file will take even more time.  Be patient.</p>\n";
						}
						echo "<p>Wait until the 'Please wait until operation is finished' popup disappears. If the load hangs near the end, quit and reload the file which should now be a quick process.</p>\n";
					} else { // none of the supported maps
							echo "<p>We have not yet created a locations file for the \"$map\" map.</p>\n";
					}
					echo "<h2>Refine the Template</h2>\n";
					echo "<p>Obviously we do not want to keep all these objects in our  mission file, so we will get rid of the unneeded ones as before.</p>\n";
					echo "<p>On the top icon bar is a button for the object filter abbreviated as \"OBJ FILT\".  Select that, then \"Select All\" then select \"OK\".</p>\n";
					echo "<p>Click the bottom left of the influence areas and holding the left mouse button drag from bottom left of our sector to top right of our sector. This will highlight all objects in our sector.  Be sure this includes all the defined influence areas.  Better to be slightly generous than slightly stingy here.</p>\n";
					echo "<p>Next in the File menu, select \"Save selection to File\", navigate back to your <b>$abbrv-groups</b> directory, give this file the File Name <b>$abbrv-for-trunc.Group</b>, and Save as type \"Group Files\", then click \"Save\".</p>\n";
					echo "<p>Left click outside the area to unselect it.</p>
					<p>Now go to the \"Search and Select\" menu, select \"Select All Objects in Mission\" then press the \"Delete\" key on your keyboard. There will be a pause (have patience) and all the objects will disappear.</p>
					<p>We can now load back in only those objects that were in our sector with File, Import from File, select your <b>$abbrv-groups</b> directory and load the file <b>$abbrv-for-trunc.Group</b>.  You should now have just the objects in your sector (including bridges).</p> 
					<p>\"File\", \"Save As...\" <b>$abbrv-template2.Mission</b> (as type \"Mission Files\") to be sure we do not lose it.</p>\n";
					echo "<h2>Save the Bridges</h2>\n";
				    echo "<p>For some scenarios it may be important to define bridges which can be destroyed or repaired as important elements of the campaign.  We haven't yet written the code to support bridge damage and repair, but we have decided how we will import them... and you will do that now.</b>\n";
					echo "<p>Go back to the object filter (OBJ FILT button) at the top, click on \"Clear All\" then click on \"Bridges\" (a checkmark will appear) and \"OK\".  Now on the map you should see bridges only.</p>\n";
					echo "<p>\"Select All Visible Objects\" (the bridges) then \"File\", \"Save Selection to File\", select your <b>$abbrv-groups</b> directory and save as <b>$abbrv-bridges.Group</b> (type \"Group Files\").</p>\n";
					echo "<h2>Delete the Bridges</h2>\n";
					echo "<p>Once the bridges have been saved, remove them from template2 by pressing the \"Delete\" key on your keyboard.  All the bridges will disappear.</p>\n";
					echo "<p>Then \"File\", \"Save\" to save $abbrv-template2.Mission which now has all objects in our sector except for airfields and bridges - both of which will be handled by our BOSWAR campaign manager.</p>\n";

					echo "<h2>Upload and Import</h2>\n";

					# require pickFile.php
					require ('functions/pickFile.php');

					echo "<p>You will now upload your bridges group file to the BOSWAR campaign manager.</p>\n";

					echo "<p>Navigate to your <b>$abbrv-groups</b> directory.</p>\n";
					echo "<p>Choose <b>$abbrv-bridges.Group.</b><br />
					Then click \"Upload File\".</p>\n";

					$returnpage = 'CampaignMgmtSetupBridges.php';

					# go
					pickFile($returnpage);

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
