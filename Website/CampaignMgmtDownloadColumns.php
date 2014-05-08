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
                
				// require displayColumns.php
				require ('functions/displayColumns.php');	

				// require getCoalitionname.php
				require ('functions/getCoalitionname.php');

				// require getCountryadj.php
				require ('functions/getCountryadj.php');

				// require getPointname.php
				require ('functions/getPointname.php');

				// action determines what we do next
				if (!isset($_POST['action'])) {
					echo "<h1>Edit Columns</h1>\n";
					echo "<p>You have defined columns in the BOSWAR campaign manager.  Now you will review these columns.</p>\n"; 
					echo "<p>If you need to edit a column, select it and then choose \"Edit Column\", otherwise proceed with \"Create Statics\" or \"Download Columns & Statics to Template\" in the side menu</p>\n";

					echo "<form id=\"campaignMgmtDownloadColumns\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtDownloadColumns.php?btn=campStp&sde=campCol\" method=\"post\">\n";

					// display columns for each coalition
					display_columns(1);
					display_columns(2);

					// include prepareColumnsForDownload.php
					// include ('includes/prepareColumnsForDownload.php');
				
					echo "<br />&nbsp<br />\n";
					
					// EDIT BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "<input type=\"hidden\" name=\"action\" value = \"edit\">\n";	
					echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Edit Column</button>\n";
					echo "	</fieldset>\n";
					echo "</form>\n";

#					echo "<form id=\"campaignMgmtDownloadColumns\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtDLColumnsConfirm.php?btn=campStp&sde=campCol\" method=\"post\">\n";
#					
#					// EXPORT BUTTON
#					echo "<fieldset id=\"actions\">\n";	
#					echo "<input type=\"hidden\" name=\"action\" value = \"export\">\n";	
#					echo "		<button type=\"submit\" id=\"downloadColumns\" value ='' >Export Columns to Group Files</button>\n";
#					echo "	</fieldset>\n";
#					echo "</form>\n";
				} else {
					$action = $_POST['action'];
					if ($action == 'edit') { 
						if (!isset($_POST['columnID'])) {
							echo "<p><b><font color = \"red\">You did not select a column to edit.</font></b></p>\n";
							
							echo "<form id=\"campaignMgmtForm\" name=\"objectSetup\" action=\"CampaignMgmtDownloadColumns.php?btn=campStp&sde=campCol\" method=\"post\">\n";
							echo "<fieldset id=\"actions\">\n";	
							echo "		<button type=\"submit\" id=\"submitHalfsize1\" >Continue</button>\n";
							echo "	</fieldset>\n";	

						} else {
								$columnID = $_POST['columnID'];
							// require editColumn.php 
							require ('functions/editColumn.php');
							edit_column($columnID);

							// echo "The Edit Column pages need to be written.<br />\n";
						}

					} elseif ($action == 'download') {
						echo "The Download Column pages are a work in progress.<br />\n";
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
