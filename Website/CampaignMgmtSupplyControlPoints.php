<?php 
#Stenka 16/11/13 definition of control and supply points has been moved to campaign creation
#here we merely need a screen to update them
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

				if (!isset($_GET['fi'])) {
					$fi = 'unset';
				} else {
					$fi = $_GET['fi'];
				}
                if ($fi == "airfields") {
					echo "<h2>Clean Up the Template</h2>\n";
					echo "<h3>Delete Airfields</h3>\n";
					echo "<p>Back to the Mission Editor!</p>\n";
					echo "<p>Go back to the object filter (\"OBJ FILT\" button) at the top, click on \"Clear All\" then click on \"Airfields\" (a checkmark will appear) and \"OK\".  Now you should see only airfields on the map.</p>\n";
					echo "<p>\"Select All Visible Objects\" (the airfields) and remove them from the template by pressing the \"Delete\" key on your keyboard.  All the airfields will disappear.</p>\n";
					echo "<h3>Delete Bridges</h3>\n";
					echo "<p>In the object filter (\"OBJ FILT\"), click on \"Bridges\" and \"OK\".  Now you should see only bridges.</p>\n";
					echo "<p>\"Select All Visible Objects\" (the bridges) and remove them by pressing the \"Delete\" key on your keyboard.  The bridges will vanish.</p>\n";
					echo "<h3>Delete Control Points (Flags)</h3>\n";
					echo "<p>If you have defined Control Points, click on \"Flags\" and \"OK\" in the object filter.  Only flags are displayed, and these flags represent control points.  (Windsocks will be dealt with later under \"Statics\").</p>\n";
					echo "<p>\"Select All Visible Objects\" (the flags) and press the \"Delete\" key on your keyboard.  All the flags will go away.</p>\n";
					echo "<h3>Delete Supply Points (rwstation blocks)</h3>\n";
					echo "<p>Now for something completely different.  Keep your fingers off the \"Delete\" key this time.  In the object filter, click on \"Blocks\" and \"OK\".  Now you will see many \"blocks\" on the map, but only the Supply Points will be red or blue (because you defined their nationalities).  One by one select each with a left click, check that it is a rwstation (Model says graphics\\blocks\\rwstation.mgm), then right click \"cut\" to remove it.</p><p>In the object filter \"Select All\" to see all that remains.</p>\n";

					echo "<h3>Save As Clean Template</h3>\n";
					echo "<p>Then \"File\", \"Save As\" and save with the name <b>$abbrv-cleantemplate.Mission</b>.  The CLEAN template has your Influence Areas and all pre-defined infrastructure other than airfields and bridges and has no tokens for supply or control points.  From now on the BOSWAR campaign manager will take care of the airfields, bridges, supply and control points.</p><p>Note that you still have the full $abbrv-template.Mission in case you want to change your selection of active airfields, or supply or control points before initializing the campaign's first mission.  These are all now irrelevant to our $abbrv-cleantemplate.Mission.  Please do not confuse the two.\n";
					echo "<form id=\"campaignMgmtSupplyAirfieldsDone\" name=\"campaignSetup\" action=\"CampaignMgmtSupplyControlPoints.php?btn=campMgmt\" method=\"post\">\n";
					# BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" name =\"Setup\" id=\"SetupDone\" value =\"true\" >Next</button>\n"; # the value defines the action after the button was pressed
					echo "	</fieldset>\n";
					echo "</form>\n";

				}
				if ($fi == "unset") {
				?>
<!--
				<p><font color='blue'>Stenka: We must be able to create and move both supply points and control points.
				In the Editor we will use the Railway station object to represent a supply point and another "to be chosen" object to represent the control point.
				Positioning will be by exchange of group files. This is needed for Beta but not for Alpha</font></p>
				<p><font color='red'>Tushka: here is my suggestion.  Nothing appears on the final mission template.  If a point needs to be moved, a commander can note the original and new locations and the admin can just edit the appropriate table.</font></p>
-->
				<h1>Update Supply and Control Points</h1>

				<p>These were defined in the campaign creation sequence but we may wish to correct their position or ownership during a campaign</p>

				<h2>Supply Points</h2>

				<p>Here we need a list of the supply points in the database with their country, X and Z positions. You can edit the X and Z positions to move them.<p>  

				<h2>Control Points</h2>

				<p>Here we need a list of the control points with their country, X and Z positions. You can edit X, Z and Country.</p>
#				
#				<?php
#					# require pickFile.php
#					require ('functions/pickFile.php');
#
#					echo "<p>You will now upload your points group file to the BOSWAR campaign manager.</p>\n";
#
#					echo "<p>Navigate to your <b>$abbrv-groups</b> directory.</p>\n";
#					echo "<p>Choose <b>$abbrv-points.Group.</b><br />
#					Then click \"Upload File\".</p>\n";
#
#					$returnpage = 'CampaignMgmtSupplyControlPoints.php';
#
					# go
#					pickFile($returnpage);
#
#				} // end if (fi == unset) - points file has been uploaded
#
#				if ($fi == 'points') {
#					# require importPoints.php
#					require ('functions/importPoints.php');
#
 #               	echo "<h1>Define Supply and Control Points</h1>\n";
	#				echo "<h2>Import The Points</h2>\n";
#
#					$SaveToDir = "C:/BOSWAR";
#					$file = "$abbrv-points.Group";
#					import_points($SaveToDir,$file);
#
#
#					// Now delete the file
#					$filename = $SaveToDir.'/'.$file;
#					if (file_exists($filename)) {
#						// delete the file
#						unlink("$filename");	
#						echo "$filename deleted<br />\n";
#					} else {
#						echo "$filename not found or read-only<br />\n";
#					}
#					$fi == '';
#					$returnpage = 'CampaignMgmtSupplyControlPoints.php'; //next page
#					echo "<h2>Delete the Tokens from Template</h2>\n";
#					echo "<p>Back to the Mission Editor!</p>\n";
#					echo "<p>If you still have the points selected, great!</p>\n";
#					echo "<p>Otherwise, go to the object filter \"OBJ FiLT\" at the top and select \"Clear All\".  Then select \"blocks\" and \"flags\".  Now go to the \"Search and Select\" menu and select \"Select All Visible Objects\".</p>\n";
#					echo "<p>To remove the selected objects press the \"Delete\" key on your keyboard.</p>\n";
#					echo "<p>Note, there is no need to save the template as we haven't changed the template.</p>\n";
#										echo "<p>Once you are ready to proceed, click \"Next\"</p>\n";
#
#					echo "<form id=\"campaignMgmtSupplyControlDone\" name=\"campaignSetup\" action=\"CampaignMgmtSetupBridges.php?btn=campMgmt\" method=\"post\">\n";
#					# BUTTON
#					echo "<fieldset id=\"actions\">\n";	
#					echo "		<button type=\"submit\" name =\"Setup\" id=\"SetupDone\" value =\"true\" >Next</button>\n"; # the value defines the action after the button was pressed
#					echo "	</fieldset>\n";
#					echo "</form>\n";


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
