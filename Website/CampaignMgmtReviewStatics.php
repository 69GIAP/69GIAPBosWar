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
                
				// require displayStaticGroups.php
				require ('functions/displayStaticGroups.php');	

				// require getCoalitionname.php
				require ('functions/getCoalitionname.php');

				// require getCountryadj.php
				require ('functions/getCountryadj.php');

				// require getPointname.php
				require ('functions/getPointname.php');

				// action determines what we do next
				if (!isset($_POST['action'])) {
					echo "<h1>Review Static Groups</h1>\n";
					echo "<p>You have defined static groups in the BOSWAR campaign manager.  Now you will review these groups, then export them as two separate group files, one for each coalition.</p>\n"; 
					echo "<p>If you need to edit a static group, select it and then choose \"Edit Group\".  Similarly if you want to clone a group, select it and choose \"Clone Group\"otherwise select \"Export Static Groups\"</p>\n";

					echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";

					// display columns for each coalition
					display_staticgroups(1);
					display_staticgroups(2);

					// include prepareColumnsForDownload.php
					// include ('includes/prepareColumnsForDownload.php');
				
					echo "<br />&nbsp<br />\n";
					
					// EDIT GROUP BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" id=\"submitHalfsize1\" value =\"edit\" name=\"action\">Edit Group</button>\n";
					echo "	</fieldset>\n";
					echo "</form>\n";

					// CLONE GROUP BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "		<button type=\"submit\" id=\"submitHalfsize1\" value =\"clone\" name = \"action\">Clone Group</button>\n";
					echo "	</fieldset>\n";
					echo "</form>\n";

					echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
					// EXPORT GROUP BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "<input type=\"hidden\" name=\"action\" value = \"export\">\n";	
					echo "		<button type=\"submit\" id=\"registerSubmit\" value ='' >Export Static Groups</button>\n";
					echo "	</fieldset>\n";
					echo "</form>\n";
				} else {
					$action = $_POST['action'];
					if ($action == 'edit') { 
						if (!isset($_POST['columnID'])) {
/*
							echo "<p><b><font color = \"red\">You did not select a group to edit.</font></b></p>\n";
							
							echo "<form id=\"campaignMgmtReviewStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
							echo "<fieldset id=\"actions\">\n";	
							echo "		<button type=\"submit\" id=\"submitHalfsize1\" >Continue</button>\n";
							echo "	</fieldset>\n";	

						} else {
								$columnID = $_POST['columnID'];
							// require editColumn.php 
							require ('functions/editColumn.php');
							edit_column($columnID);

 */
							echo "The Edit Static Group pages will be written *after* the export is working.<br />\n";

						}

					} elseif ($action == 'clone') {
						echo "The Clone Static Group pages are not yet written.<br />\n";
					} elseif ($action == 'export') {

						// require getAbbrv.php
						require ('functions/getAbbrv.php');

						// require getPointXPos.php
						require ('functions/getPointXPos.php');

						// require getPointZPos.php
						require ('functions/getPointZPos.php');

						// require getGroundAILevel.php
						require ('functions/getGroundAILevel.php');

						// require getGroundspacing.php
						require ('functions/getGroundspacing.php');

               			// require exportStaticGroups.php                
						require ('functions/exportStaticGroups.php');

						// export static groups seperately for each coalition
						export_staticgroups(1);
						export_staticgroups(2);


					}
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
