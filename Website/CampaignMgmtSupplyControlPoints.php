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

				if (!isset($_GET['fi'])) {
					$fi = 'unset';
				} else {
					$fi = $_GET['fi'];
				}
				if ($fi == "unset") {
				?>
				<p><font color='blue'>Stenka: We must be able to create and move both supply points and control points.
				In the Editor we will use the Railway station object to represent a supply point and another "to be chosen" object to represent the control point.
				Positioning will be by exchange of group files. This is needed for Beta but not for Alpha</font></p>
				<p><font color='red'>Tushka: here is my suggestion.  Nothing appears on the final mission template.  If a point needs to be moved, a commander can note the original and new locations and the admin can just edit the appropriate table.</font></p>

				<h1>Define Supply and Control Points</h1>

				<p>We do this in the Mission Editor.  Reopen it and select <b><?php echo $abbrv ?>-template.Mission</b> if it is not already open.</p>

				<h2>Supply Points</h2>

				<p>At this stage (after the airfields have been removed) the template has little but defined Influence Areas.  If your campaign involves supply of new ground units during the campaign then you will need to define some ground supply points for each side.  The number is up to you, but three is a good starting point.  Choose clear locations near roads and/or railroads far from the front line and near the edge of an Influence Area.  These represent units coming in from "off map".<p>  
				<p>We will use the "rwstation" block as a temporary token for a supply point, so select "Blocks" and then "rwstation".   Place it with a left click and move it so that no stands of trees are within 200 m.  (This will ensure that units placed there don't spawn into trees).  Right click and select "Properties...".  Click on "Create Linked Entity" to activate it.   Right click on the icon again and select "Advanced Properties...".  Set the country as appropriate and click on "OK".  Repeat until all supply points are placed.</p>


				<h2>Control Points</h2>

				<p>For some scenarios it may be important to define control points, points which may be disputed, defended, captured, or re-captured as important elements of the campaign.  We haven't yet written the code to support control points, but we have decided how we will define them... by placing flags.</b>

                 <p>To define a control point in the Mission Editor select "Flags" and then "flag".  Place it with a left click. Right click on the flag icon and select "Properties...".  Click on "Create Linked Entity" to activate it.  Right click on the icon again and select "Advanced Properties...".  Set the country as appropriate and click on "OK".  Repeat until all control points are placed.</p>

				<h2>Save The Points</h2>

				<p>Once you have placed all your supply points and control points (if any), go to the object filter "OBJ FiLT" at the top and select "Clear All".  Then select "blocks" and "flags".  Now go to the "Search and Select" menu and select "Select All Visible Objects.</p>
				<p>Then in the File menu, select "Save selection to File", and navigate back to your <b><?php echo $abbrv ?>-groups</b> directory, give this file the File Name <b><?php echo $abbrv ?>-points</b>, and Save as type "Group Files", then click "Save".</p>
				<h2>Upload and Import</h2>
				<?php
					# require pickFile.php
					require ('functions/pickFile.php');

					echo "<p>You will now upload your points group file to the BOSWAR campaign manager.</p>\n";

					echo "<p>Navigate to your <b>$abbrv-groups</b> directory.</p>\n";
					echo "<p>Choose <b>$abbrv-points.Group.</b><br />
					Then click \"Upload File\".</p>\n";

					$returnpage = 'CampaignMgmtSupplyControlPoints.php';

					# go
					pickFile($returnpage);

				} // end if (fi == unset) - points file has been uploaded

				if ($fi == 'points') {
					# require importPoints.php
					require ('functions/importPoints.php');

                	echo "<h1>Define Supply and Control Points</h1>\n";
					echo "<h2>Import The Points</h2>\n";

					$SaveToDir = "C:/BOSWAR";
					$file = "$abbrv-points.Group";
					import_points($SaveToDir,$file);

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
					echo "<h2>Delete the Tokens from Template</h2>\n";
					echo "<p>Back to the Mission Editor!</p>\n";
					echo "<p>If you still have the points selected, great!</p>\n";
					echo "<p>Otherwise, go to the object filter \"OBJ FiLT\" at the top and select \"Clear All\".  Then select \"blocks\" and \"flags\".  Now go to the \"Search and Select\" menu and select \"Select All Visible Objects\".</p>\n";
					echo "<p>To remove the selected objects press the \"Delete\" key on your keyboard.</p>\n";
					echo "<p>Note, there is no need to save the template as we haven't changed the template.</p>\n";
										echo "<p>Once you are ready to proceed, click \"Next\"</p>\n";

					echo "<form id=\"campaignMgmtSupplyControlDone\" name=\"campaignSetup\" action=\"CampaignMgmtSetupBridges.php?btn=campMgmt\" method=\"post\">\n";
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
