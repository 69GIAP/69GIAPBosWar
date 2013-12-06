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
				$pointID = $_POST['pointID'];
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
		
					// First step: select objects to include
					echo "<form id=\"campaignMgmtSetupStatics\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtPopulateStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";

					echo "<h2>Populate $newStaticGroupName</h2>\n";
					echo "<p>Check each object that you want to include in this group.  You will set their numbers later.</p>\n";
					// include getStaticObjectsList.php
					// this will create an array named Model
					include ('includes/getStaticObjectsList.php');

					$action = 'enumerate';
				
					// NEXT BUTTON
					echo "<fieldset id=\"actions\">\n";	
					echo "	<input type=\"hidden\" name=\"ckey\" name=\"action\" value=\"$ckey\">\n";
					echo "	<input type=\"hidden\" name=\"pointID\" name=\"action\" value=\"$pointID\">\n";
					echo "	<input type=\"hidden\" name=\"newStaticGroupName\" name=\"action\" value=\"$newStaticGroupName\">\n";
					echo "	<input type=\"hidden\" name=\"action\" value=\"$action\">\n";
					echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Next</button>\n";
					echo "	</fieldset>\n";
				
				} elseif($action == 'enumerate') {
					//Second step, choose how many of each object will be in the group
					$pointID = $_POST['pointID'];

					// require getObjectdescription2.php
					require ('functions/getObjectdescription2.php');

					echo "<h3>How Many of Each?</h3>\n";
					echo "<p>Next step: set numbers (1-8) of each type in group, then record group in static table.</p>\n";
					echo "<form id=\"campaignMgmtSetupStatics\" name=\"campaignDownloadColumns\" action=\"CampaignMgmtPopulateStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
					if (isset($_POST['Model'])) {
						$Model = $_POST['Model'];
						// this will create an array named objnum
						foreach($Model as $i => $value) {
							$description = get_objectdescription2($value);

							echo "	<fieldset id=\"inputs\" class=\"narrow\">\n";
							$maxnum = 8;
							echo "		<select name=\"objnum[]\" id=\"number\">\n";
							echo "		<option selected value=\"1\">1</option>\n";

							for ($j = 1; $j < $maxnum+1; ++$j) {
								echo "		<option value=\"$j\">$j</option>\n";
							}

							echo "		</select>\n";
							echo " <b>$description</b>\n";
							echo "\$i: $i ";
							echo "\$value: $value<br />\n";
//							echo "\$description: $description<br />\n";
							echo "	</fieldset>\n";
							echo "	<input type=\"hidden\" name=\"Model[]\" value=\"$value\">\n";

						}
						$action = 'record';

						// NEXT BUTTON
						echo "<fieldset id=\"actions\">\n";	
						echo "	<input type=\"hidden\" name=\"ckey\" name=\"action\" value=\"$ckey\">\n";
						echo "	<input type=\"hidden\" name=\"pointID\" name=\"action\" value=\"$pointID\">\n";
						echo "	<input type=\"hidden\" name=\"newStaticGroupName\" name=\"action\" value=\"$newStaticGroupName\">\n";
						echo "	<input type=\"hidden\" name=\"action\" value=\"$action\">\n";
						echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Next</button>\n";
						echo "	</fieldset>\n";

					}
				} else { // record
					if (isset($_POST['Model'])) {

						// require getCoalition.php
						require ('functions/getCoalition.php');
						$CoalID = get_coalition($ckey);

						// require getFamily.php
						require ('functions/getFamily.php');

						// require getObjectdescription2.php
						require ('functions/getObjectdescription2.php');

						echo "Now record this static group in the static table.<br />\n";
						$pointID = $_POST['pointID'];
						// get the two arrays
						$Model = $_POST['Model'];
						$objnum = $_POST['objnum'];
						foreach($Model as $i => $value) {
//							echo "\$objnum[$i]: $objnum[$i] \n";	
//							echo "\$value: $value<br />\n";	
							$family = get_family($value);
							$description = get_objectdescription2($value);
							for ($k=0; $k <$objnum[$i]; ++$k) {
								$query = "INSERT INTO static (static_Name, static_Model, static_Type, static_Desc, 
								static_Country, static_coalition, static_supplypoint)
								VALUES
								('$newStaticGroupName', '$value', '$family', '$description', 
								'$ckey', '$CoalID', '$pointID')";
							    echo "$query<br />\n";
								if(!$result = $camp_link->query($query)){
							    	echo "$query<br />\n";
									die('CampaignMgmtSetupStatics.php query error [' . $camp_link->error . ']');
								}
							}
						}
						echo "<form id=\"campaignMgmtSetupStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtSetupStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
						// CREATE ANOTHER BUTTON
						echo "<fieldset id=\"actions\">\n";	
						echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Create Another</button>\n";
						echo "	</fieldset>\n";
						echo "</form>\n";

						echo "<b>Or if you have enough groups:</b><br />\n";
						echo "<form id=\"campaignMgmtSetupStatics\" name=\"ReviewStatics\" action=\"CampaignMgmtReviewStatics.php?btn=campStp&sde=campStat\" method=\"post\">\n";
						// REVIEW GROUPS BUTTON
						echo "<fieldset id=\"actions\">\n";	
						echo "		<button type=\"submit\" id=\"submitHalfsize1\" value ='' >Review Groups</button>\n";
						echo "	</fieldset>\n";
					}
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
