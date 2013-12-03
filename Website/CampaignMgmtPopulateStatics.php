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
					
				// get POST variables
				$ckey = $_POST['ckey'];
				$newStaticGroupName = $_POST['newStaticGroupName'];
				$action = $_POST['action'];

				if ($action == 'populate') {

					// require getCoalition.php
					require ('functions/getCoalition.php');
					$CoalID = get_coalition($ckey);
//					echo "\$CoalID: $CoalID<br />\n";
	
					// require getCountryadj.php
					require ('functions/getCountryadj.php');
					$countryadj = get_countryadj($ckey);

					// require getCoalitionname.php
					require ('functions/getCoalitionname.php');
					$Coalition = get_coalitionname($CoalID);
//					echo "\$Coalition: $Coalition<br />\n";
		
					// require getCountriesInCoalition.php
					require ('functions/getCountriesInCoalition.php');
	
					// First step: select an object to include
					echo "<form id=\"campaignMgmtSetupStatics\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtPopulateStatics.php?btn=campStp&sde=campCol\" method=\"post\">\n";

					echo "<h2>Populate $newStaticGroupName</h2>\n";
					echo "<p>Check each object that you want to include in this group.  You will set their numbers later.</p>\n";
					// include getStaticObjectsList.php
					include ('includes/getStaticObjectsList.php');

					$action = 'record';
				
					// NEXT BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "	<input type=\"hidden\" name=\"ckey\" name=\"action\" value=\"$ckey\">\n";
					echo "	<input type=\"hidden\" name=\"newStaticGroupName\" name=\"action\" value=\"$newStaticGroupName\">\n";
					echo "	<input type=\"hidden\" name=\"action\" value=\"$action\">\n";
					echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Next</button>\n";
					echo "	</fieldset>\n";
				
				} else {
						echo "Next step: record these choices in the statics table, then edit the group to set numbers of units.<br />\n";
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
	$dbc->close();

	# Include the footer
	include ( 'includes/footer.php' );
?>
