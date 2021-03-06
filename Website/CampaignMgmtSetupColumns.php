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

				//echo "\$sim: $sim<br />\n";

				echo "<h1>Create a Column</h1>\n";
					
				echo "<p>Ground forces are supplied and resupplied by means of columns which are placed in Supply Points.</p>\n";
				echo "<p>A column will be made up of either vehicles which have their own motive power, 
				artillery which when it is moving is loaded into trucks or trains which have their own motive power.</p>\n";
				echo "<p>Special note on trains: A train is in effect a special column in its own right made up of carriages. For this reason the quantity 
				of a train column should always be 1. If you set the quantity higher it will be ignored. At the moment we allocate a train a standard set of carriages 
				you will in the future be able to define a different set of carriages for each train. Planning movement of a train is slightly different from other vehicles 
				in that you must carefully position the train on the railway tracks and place the destination waypoint on the tracks at a point that can be reached across the railway junctions inbetween.</p>\n";
				if ($sim == 'RoF') {
				echo "<p>In Rise of Flight the ground forces are French or German by default.  You can, of course, edit the campaign's object_properties table to give other assignments.<p>\n"; 
				} else {
				echo "<p>In Battle of Stalingrad the ground forces are Russian or German by default, of course.<p>\n"; 
				}

				// start form
				echo "<form id=\"campaignMgmtSetupColumns\" name=\"campaignSetupColumns\" action=\"CampaignMgmtSetupColumnsConfirm.php?btn=campStp&sde=campCol\" method=\"post\">\n";
				// include setupColumns.php
				include ('includes/setupColumns.php');

				# SELECT COUNTRY BUTTON
				echo "<fieldset id=\"actions\">\n";	
				echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Select Country</button>\n";
				echo "	</fieldset>\n";
					
				echo "</form>\n";

				echo "<form id=\"campaignMgmtSetupColumns\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtDownloadColumns.php?btn=campStp&sde=campCol\" method=\"post\">\n";
				# NEXT BUTTON
				echo "<fieldset id=\"actions\">\n";	
				echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Next</button>\n";
				echo "	</fieldset>\n";
					
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
